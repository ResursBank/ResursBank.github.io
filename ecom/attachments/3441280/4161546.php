<?php
include_once("Mage/Checkout/controllers/OnepageController.php");

class Resursbank_Resursbank_Checkout_OnepageController extends Mage_Checkout_OnepageController
{
	public function savePaymentAction()
	{
		$data = $this->getRequest()->getPost('payment', array());
		$prevStep = $this->getRequest()->getParam('prevStep', false);
		$methodCode = isset($data['method']) ? $data['method'] : null;
		$methodId = preg_replace("/^resurspayment/", '', $methodCode);

		if(preg_match('/resurspayment/', $methodCode))
		{
			if ($this->_expireAjax())
			{
				return;
			}
			try
			{
				if (!$this->getRequest()->isPost())
				{
					$this->_ajaxRedirectResponse();
					return;
				}
				$paymentId = str_replace('resurspayment','',$methodCode);

				$disabledMethods = '';
				if(isset($data['disabled_methods']) && !empty($data['disabled_methods']))
				{
					$disabledMethods = $data['disabled_methods'];
				}

				$checkout        = Mage::getSingleton('checkout/session')->getQuote();
				$billingAddress  = $checkout->getBillingAddress();
				$quoteAmount     = $checkout->getGrandTotal();
                
				$customer = Mage::getSingleton('customer/session')->getCustomer();
				if(Mage::getSingleton('customer/session')->isLoggedIn())
				{
					$email = $customer->getEmail();
				}
				else
				{
					$email = $billingAddress->getEmail();
				}
				$dynamicFormHtml = null;
				$isDynamicFormLoaded = $this->getRequest()->getPost('is_dynamic_form_loaded');
				if (!$isDynamicFormLoaded)
				{
					$routename = Mage::app()->getRequest()->getRouteName();
					// Apply special rules for Vanilla!
					if ($routename == "checkout")
					{
						$isDynamicFormLoaded = $this->getRequest()->getPost('is_dynamic_form_loaded_' . $methodId);
						$setQuoteAmount = true;
						$useCheckoutSpecialRules = true;
						$useSsnMethodId = $methodId;
					}
				}
				if(!$isDynamicFormLoaded)
				{
					$data = $this->getRequest()->getPost('payment', array());
					$this->getOnepage()->savePayment($data);

					$dynamicFormHtml .= "<form id='theForm$paymentId'>
						<input name='payment[amount]' type='hidden' value='$quoteAmount' >";

					$paymentSession = Mage::getModel('resursbank/api')->startPaymentSession($paymentId,$checkout);
					$dynamicFormHtml .= '<ul class="resurs-dynamic-form-list form-list">';
					$javascriptValidationHtml = '';
                    
					if(!$paymentSession->return->limitApplicationFormAsObjectGraph->formElement)
					{
						throw new Mage_Payment_Model_Info_Exception(wordwrap($paymentSession['message'], 81));
					}

					Mage::getSingleton('checkout/session')->setResursPaymentSession($paymentSession->return->id);
					foreach($paymentSession->return->limitApplicationFormAsObjectGraph->formElement as $row)
					{
						$dynamicFormHtml .= '<li>';
						switch ($row->type)
						{
							case 'text':

								$data_format = str_replace('\\\\', '\\', $row->format);
								$dynamicFormHtml .= '<div class="resurs-dynamic-form-input-field">';

								if ($row->name == 'applicant-telephone-number')
								{
									$type  = " type='text' value='{$billingAddress->getTelephone()}'";
								}
								elseif($row->name == 'applicant-email-address')
								{
									$type  = " type='text' value='{$email}'";
								}
								else
								{
									$type  = "type='text'";
								}

								$dynamicFormHtml .= '<label'.(isset($row->mandatory) && $row->mandatory == 1 ? ' class="required"':'').' for="'.$row->name.'">';
								$dynamicFormHtml .= (isset($row->mandatory) && $row->mandatory == 1 ? '<em>*</em>':'').''.$row->label;
								$dynamicFormHtml .= '</label>';

								$errorMessagePleaseEnter = $row->description;

								$javascriptValidationHtml .= "Validation.add('resursbank-validate-{$row->name}','{$errorMessagePleaseEnter}',function(value){";
								if(!isset($row->mandatory) || $row->mandatory == 0)
								{
									$javascriptValidationHtml .= "if(value.length > 0){return /$data_format/.test(value);}else{return true;}";
								}
								else
								{
									$javascriptValidationHtml .= "return /$data_format/.test(value);";
								}
								$javascriptValidationHtml .= "});";
								$styleclass = "class='input-box resursbank-validate-{$row->name}'";

								$dynamicFormHtml .= "<input 
									$styleclass";
								$dynamicFormHtml .= " $type ";
								$dynamicFormHtml .= 'maxlength="'.(isset($row->length) ? $row->length : 32).'"
									data-mandatory="'.$row->mandatory.'"
									id="'.$row->name.'"
									name="payment['.$row->name.']"';
								$dynamicFormHtml .= ' />';
								$dynamicFormHtml .= '</div>';
						}
						$dynamicFormHtml .= '</li>';
					}
					$dynamicFormHtml .= '</ul></form>';
					$dynamicFormHtml .= '<input type="hidden" name="is_dynamic_form_loaded" value="1">';
					$dynamicFormHtml .="<script type='text/javascript'>
						try
						{
							// Inject ssn from GetAddresField
							if (ga_ssn != '') {document.getElementById('applicant-government-id').value = ga_ssn;}
						}
						catch (e) {}
						var theForm =  new VarienForm('theForm$paymentId',true);
						$javascriptValidationHtml
						</script>";

					$placeHolder = '<div class="resurs-payment-form" id="resurs-payment-form'.$paymentId.'" style="display: none">Payment Form</div>';
					$paymentMethodHtml = $this->_getPaymentMethodsHtml();
					$paymentMethodHtml = str_replace($placeHolder, $dynamicFormHtml, $paymentMethodHtml);
					$ssn_address = (Mage::getSingleton('checkout/session')->getSsnAddress() != null ? Mage::getSingleton('checkout/session')->getSsnAddress() : null);
					// This stuff fails on empty ssn
					if ($ssn_address)
					{
						$dom = new DOMDocument();
						$dom->loadHTML($ssn_address);
						$xpath = new DOMXPath($dom);
						$tags = $xpath->query('//p[@class="address-from-resurs-name"]');
						$customerName = '';
						foreach ($tags as $tag)
							$customerName = $tag->nodeValue;
					}
					$customerName2 = $billingAddress->getFirstname().' '.$billingAddress->getLastname();

					if($ssn_address and ($customerName==$customerName2))
					{
						$paymentMethodHtml = str_replace('class="payment-method-list-first-half payment-method-list-first-half'.$paymentId.'"', 'class="payment-method-list-first-half payment-method-list-first-half'.$paymentId.'" style="display:none"', $paymentMethodHtml);
						$placeHolder2 = '<div class="ssn-address-container" id="ssn-address-container'.$paymentId.'"></div>';
						$paymentMethodHtml = str_replace($placeHolder2, $ssn_address, $paymentMethodHtml);
					}
					$disabledMethodArr = explode(',',$disabledMethods);
					$disabledMethodArr = array_filter($disabledMethodArr);
					$disabledMethodArr = array_unique($disabledMethodArr);
					if(count($disabledMethodArr) > 0)
					{
						$disabledMethods = implode(',',$disabledMethodArr);
						$disabledContent = "<script type='text/javascript'>";
						foreach($disabledMethodArr as $methodDisabledCode)
						{
							$disabledContent .= "var paymentTag =  \$jRB('#p_method_resurspayment{$methodDisabledCode}');
								/*
								paymentTag.attr('disabled','disabled');
								paymentTag.next().addClass('disabled');
								\$jRB('#payment_form_resurspayment{$methodDisabledCode}').parent().hide();
								\$jRB('#payment_disabled_methods').remove();
								*/
								if(document.getElementById('p_method_resurspayment{$methodDisabledCode}') != null)
								{
									document.getElementById('p_method_resurspayment{$methodDisabledCode}').checked = false;
								}
							";
							$disabledMethods .= ','.$methodDisabledCode;
						}
						$disabledContent .= "\$jRB(\"<input  type='hidden' name='payment[disabled_methods]' id='#payment_disabled_methods' value='{$disabledMethods}'/>\").prependTo('#co-payment-form');
						</script>";
						$paymentMethodHtml .= $disabledContent;
					}

					// ProgressBlockPatch for v1.8 - Due to restructures in v1.8+ this is not being done properly in the regular steps, so we add it into ours instead.
					$magentoVersion = explode(".", Mage::getVersion());
					if ($magentoVersion[0] >= 1 && $magentoVersion[1] >= 8)
					{
						$paymentMethodHtml .= "<script>
						if (checkout)
						{
							checkout.reloadProgressBlock('billing');
							checkout.reloadProgressBlock('shipping');
						}
						</script>";
					}

					$result['goto_section'] = 'payment';
					$result['update_section'] = array(
						'name' => 'payment-method',
						'html' => $paymentMethodHtml
					);
					$this->getOnepage()->getQuote()->collectTotals()->save();
					$this->getResponse()->setBody(Mage::helper('core')->jsonEncode($result));
				}
				else
				{
					$result = array();
					$data = $this->getRequest()->getPost('payment', array());
					$scope = Mage::app()->getWebsite()->getId();
					$currentRepresentative = Mage::getStoreConfig('payment/store_credentials/customer_represtantive_id', $scope);
					if ($setQuoteAmount && $useCheckoutSpecialRules)
					{
						$data['amount'] = $quoteAmount;
						// Check if we have other arrays that match better
						if ($useSsnMethodId != "") // Should not be > 0
						{
							// Get those variables in a new array, if exist ...
							$newdata = $this->getRequest()->getPost($useSsnMethodId, array());
							// ... and make sure it's an array
							if (is_array($newdata))
							{
								// Also make sure that everything really is valid
								if ($data['method'] == "resurspayment" . $useSsnMethodId)
								{
									foreach ($newdata as $postparam => $postvalue)
									{
										// ... and make sure we're not overwriting something that already may exist here...
										if (!isset($data[$postparam]))
										{
											// Put the new data into the correct data array
											$data[$postparam] = $postvalue;
										}
									}
								}
							}
						}
					}
					$result = $this->getOnepage()->savePayment($data);

					/* submitLimitApplication() Method Call Start Here */
					$customerId    = Mage::getSingleton('checkout/session')->getQuote()->getCustomerId();
					$formdata = $this->formDataXml($data);

					// Data that has to get fetched from session, since postdata can not reach here
					$billingAddress = Mage::getSingleton('checkout/session')->getQuote()->getBillingAddress()->getData();
					// Always submit this to SLA below
					$slaAddress = array();
					if (isset($_POST['billing']['firstname']) && trim($_POST['billing']['firstname']) != "") {$slaAddress['firstName'] = $_POST['billing']['firstname'];}
					if (isset($_POST['billing']['lastname']) && trim($_POST['billing']['lastname']) != "") {$slaAddress['lastName'] = $_POST['billing']['lastname'];}
					if (isset($_POST['billing']['street'][0]) && trim($_POST['billing']['street'][0]) != "") {$slaAddress['addressRow1'] = $_POST['billing']['street'][0];}
					if (isset($_POST['billing']['street'][1]) && trim($_POST['billing']['street'][1]) != "") {$slaAddress['addressRow2'] = $_POST['billing']['street'][1];}
					if (isset($_POST['billing']['postcode']) && trim($_POST['billing']['postcode']) != "") {$slaAddress['postalCode'] = $_POST['billing']['postcode'];}
					if (isset($_POST['billing']['city']) && trim($_POST['billing']['city']) != "") {$slaAddress['postalArea'] = $_POST['billing']['city'];}
					if (isset($_POST['billing']['country_id']) && trim($_POST['billing']['country_id']) != "") {$slaAddress['country'] = $_POST['billing']['country_id'];}

					$paymentSessionId = Mage::getSingleton('checkout/session')->getResursPaymentSession();
					$limitResult = Mage::getModel('resursbank/api')->submitLimitApplication($paymentSessionId, $customerId, $formdata, $slaAddress);
					if($limitResult['result']=='success' and $limitResult['message'] == 'not granted')
					{
						$paymentMethodHtml = $this->_getPaymentMethodsHtml();
						/* Disable method */
						if ($limitResult['customerError'] != "")
						{
							$errorMessage = utf8_decode(html_entity_decode($this->__($limitResult['customerError'])));
						}
						else
						{
							$errorMessage = html_entity_decode($this->__('Message from Resurs Bank: This payment method is not available for you. Please choose another payment method'));
						}
						$disabledMethodArr = explode(',',$disabledMethods);
						$disabledMethodArr = array_filter($disabledMethodArr);
						$disabledMethodArr = array_unique($disabledMethodArr);
						$disabledContent = null;
						if(count($disabledMethodArr) > 0)
						{
							$disabledMethods = implode(',',$disabledMethodArr);
							$disabledContent = "<script type='text/javascript'>";
							foreach($disabledMethodArr as $methodDisabledCode)
							{
								$disabledContent .= "var paymentTag_".$methodDisabledCode." =  \$jRB('#p_method_resurspayment{$methodDisabledCode}');
										/*
											paymentTag_".$methodDisabledCode.".attr('disabled','disabled');
											paymentTag_".$methodDisabledCode.".next().addClass('disabled');
											\$('#dynamicForm{$methodDisabledCode}').remove();
											\$jRB('#payment_form_resurspayment{$methodDisabledCode}').parent().hide();
											\$jRB('#payment_disabled_methods').remove();
										*/
										if(document.getElementById('p_method_resurspayment{$methodDisabledCode}') != null)
										{
												document.getElementById('p_method_resurspayment{$methodDisabledCode}').checked = false;
										}
									";
								$disabledMethods .= ','.$methodDisabledCode;
							}
							$disabledContent .= "</script>";
							$paymentMethodHtml .= $disabledContent;
						}
						if ($paymentId != "")
						{
							$disabledContent = "<script type='text/javascript'>
										var paymentTag_".$paymentId." =  \$jRB('#p_method_resurspayment".$paymentId."');
										document.getElementById('p_method_resurspayment".$paymentId."').checked = false;
										/*
										document.getElementById('payment_form_resurspayment" . $paymentId."').innerHTML = '';
										paymentTag_".$paymentId.".parent().hide();
										paymentTag_".$paymentId.".parent().remove();
										\$jRB('#payment_form_resurspayment" . $paymentId . "').hide();
										\$jRB('#payment_form_resurspayment" . $paymentId . "').remove();
										\$jRB('#p_method_resurspayment".$paymentId."').attr('disabled','disabled');
										\$jRB('#p_method_resurspayment".$paymentId."').next().addClass('disabled');
										*/
									" . ($errorMessage != '' ? "alert(unescape('".rawurlencode($errorMessage) ."'));" : "alert('Fail')") . "
									</script>
								";
						}

						$paymentMethodHtml .= $disabledContent;

						$result['goto_section'] = 'payment';
						$result['update_section'] = array(
							'name' => 'payment-method',
							'html' => $paymentMethodHtml
						);
						$this->getOnepage()->getQuote()->collectTotals()->save();
						$this->getResponse()->setBody(Mage::helper('core')->jsonEncode($result));
						//if ($errorMessage != "") {throw new Mage_Payment_Model_Info_Exception(utf8_encode($errorMessage));}
					}
					elseif ($limitResult['result']=='error')
					{
						throw new Mage_Payment_Model_Info_Exception(wordwrap($limitResult['message'], 81));
					}
					else
					{
						// But we require confirmation anyway, just to be sure of the response
						if ($limitResult['message'] == "granted")
						{
							$routename = Mage::app()->getRequest()->getRouteName();
							if (isset($limitResult['addressdata']) && $routename == "checkout")
							{
								$newbillingaddress = $limitResult['addressdata'];
								$useuc = true;  // Make everything returned in ucwords-format on true
								unset($_POST['billing']['street']);     // Reset street address since the array is based on pushing.

								$addressRow1 = (isset($newbillingaddress->addressRow1) ? $newbillingaddress->addressRow1 : "");
								$addressRow2 = (isset($newbillingaddress->addressRow2) ? $newbillingaddress->addressRow2 : "");
								$firstName = (isset($newbillingaddress->firstName) ? $newbillingaddress->firstName : "");
								$lastName = (isset($newbillingaddress->lastName) ? $newbillingaddress->lastName : "");
								$postalCode = (isset($newbillingaddress->postalCode) ? $newbillingaddress->postalCode : "");
								$postalArea = (isset($newbillingaddress->postalArea) ? $newbillingaddress->postalArea : "");
								
								if (strtolower($newbillingaddress->country) == "no")
								{
									$reviewHTML = '';
								}
								else
								{
									$reviewHTML = '
									<script>
										var billingFirstname = $jRB(\'body\').children().find(\'input[name="billing[firstname]"]\');
										var billingLastname = $jRB(\'body\').children().find(\'input[name="billing[lastname]"]\');
										// jQuery does strangely not understand this...
										if (null != document.getElementById("billing:street1"))
										{
											document.getElementById("billing:street1").value = "'.($useuc ? ucwords(strtolower($addressRow1)) : $addressRow1).'";
										}
										if (null != document.getElementById("billing:street2"))
										{
											document.getElementById("billing:street2").value = "'.($useuc ? ucwords(strtolower($addressRow2)) : $addressRow2).'";
										}
										var billingPostcode = $jRB(\'body\').children().find(\'input[name="billing[postcode]"]\');
										var billingCity = $jRB(\'body\').children().find(\'input[name="billing[city]"]\');
										billingFirstname.val("'.($useuc ? ucwords(strtolower($firstName)) : $firstName).'");
										billingLastname.val("'.($useuc ? ucwords(strtolower($lastName)) : $lastName).'");
										billingPostcode.val("'.($useuc ? ucwords(strtolower($postalCode)) : $postalCode).'");
										billingCity.val("'.($useuc ? strtoupper($postalArea) : $postalArea).'");
										billing.onSave = function(transport)
										{
											if (checkout)
											{
												checkout.reloadProgressBlock(\'billing\');
												checkout.reloadProgressBlock(\'shipping\');
											}
										};
										billing.save();
									</script>
									';
								}
							}
						}
						// submitLimitApplication() grants end here
						$redirectUrl = $this->getOnepage()->getQuote()->getPayment()->getCheckoutRedirectUrl();

						if (empty($result['error']) && !$redirectUrl)
						{
							$this->loadLayout('checkout_onepage_review');
							$result['goto_section'] = 'review';
							$result['update_section'] = array(
								'name' => 'review',
								'html' => $reviewHTML . $this->_getReviewHtml()
							);
						}
						if ($redirectUrl)
						{
							$result['redirect'] = $redirectUrl;
						}
					}
					/* submitLimitApplication() Method Call Ends Here */
				}
			}
			catch (Mage_Core_Exception $e)
			{
				$result['error'] = $e->getMessage();
			}
			catch (Exception $e)
			{
				Mage::logException($e);
				$result['error'] = $this->__('Unable to set Payment Method.');
			}
			$this->getResponse()->setBody(Mage::helper('core')->jsonEncode($result));
		}
		else
		{
			parent::savePaymentAction();
		}
	}
   
    protected function formDataXml($formdata)
    {
        $domDoc = new DOMDocument;
        $rootElt = $domDoc->createElement('resurs-response');
        $rootNode = $domDoc->appendChild($rootElt);
        
        unset($formdata['method']);
        unset($formdata['disabled_methods']);
        foreach($formdata as $key=>$value)
        {
            $subElt = $domDoc->createElement($key);
            $subNode = $rootNode->appendChild($subElt);
            $textNode = $domDoc->createTextNode($value);
            $subNode->appendChild($textNode);
        }
        return $domDoc->saveXML();
    }
}
?>
