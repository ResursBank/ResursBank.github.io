<?php
/*
 *   Code Purpose  : Rewrite checkout block of onestep for submitLimitapplication
 *
 *    @package  Resursbank
 *    @author   Creavalent
 *
 */

class Resursbank_Resursbank_Block_Checkout extends Idev_OneStepCheckout_Block_Checkout
{
    public function _handlePostData()
    {
		$param =$this->getRequest()->getParams(); 
		$hasHandlePostdata = false;
		if(!empty($param))
		{
			$payment = $this->getRequest()->getPost('payment');
			if(preg_match('/resurspayment/', $payment['method']))
			{
				$paymentId = str_replace('resurspayment','',$payment['method']);
				$fromData = $this->getRequest()->getPost($paymentId);
				if(empty($fromData))
				{
					$this->formErrors['payment_method_error'] = true;
					$this->formErrors['resursbank_error'] = $this->__('Choose a payment method in the list to load the form');
				}
				else
				{
					$customerId    = Mage::getSingleton('checkout/session')->getQuote()->getCustomerId();
					$fromData['amount'] = Mage::getSingleton('checkout/session')->getQuote()->getGrandTotal();
					$xmlformdata = $this->formDataXml($fromData);
					$paymentSessionId = Mage::getSingleton('checkout/session')->getResursPaymentSession();
					
					$currentCountry = strtolower($_POST['billing']['country_id']);
					$slaAddress = array();
                    if (isset($_POST['billing']['firstname']) && trim($_POST['billing']['firstname']) != "") {$slaAddress['firstName'] = $_POST['billing']['firstname'];}
                    if (isset($_POST['billing']['lastname']) && trim($_POST['billing']['lastname']) != "") {$slaAddress['lastName'] = $_POST['billing']['lastname'];}
                    if (isset($_POST['billing']['street'][0]) && trim($_POST['billing']['street'][0]) != "") {$slaAddress['addressRow1'] = $_POST['billing']['street'][0];}
                    if (isset($_POST['billing']['street'][1]) && trim($_POST['billing']['street'][1]) != "") {$slaAddress['addressRow2'] = $_POST['billing']['street'][1];}
                    if (isset($_POST['billing']['postcode']) && trim($_POST['billing']['postcode']) != "") {$slaAddress['postalCode'] = $_POST['billing']['postcode'];}
                    if (isset($_POST['billing']['city']) && trim($_POST['billing']['city']) != "") {$slaAddress['postalArea'] = $_POST['billing']['city'];}
                    if (isset($_POST['billing']['country_id']) && trim($_POST['billing']['country_id']) != "") {$slaAddress['country'] = $_POST['billing']['country_id'];}

					// Forcera adressdata för norska kunder är inte tillåtet, utan här vill vi använda de uppgifter som kunden själv skickar.
					// Kontrollera NO innan submitLimitApplication skickas - är detta ett norskt ombud, skicka billingdata från kund till SLA i stället (ovanstående $slaAddress).
					// Denna ändring #35108 kräver att Api.php också är uppdaterad så att vi kan bypassa $slaAddress till submitlimitapplication.
					$limitResult = Mage::getModel('resursbank/api')->submitLimitApplication($paymentSessionId,$customerId,$xmlformdata, $slaAddress);
					$newbillingaddress = isset($limitResult['addressdata']) ? $limitResult['addressdata'] : null;

					if (isset($limitResult['addressdata']) && $currentCountry != "no")
					{
						if (($limitResult['result']!='error') && ($limitResult['result']=='success' and $limitResult['message'] == 'granted'))
						{
							$useuc = true;  // Make everything returned in ucwords-format on true
							unset($_POST['billing']['street']);     // Reset street address since the array is based on pushing.
							
							// Temporary
							//if (!isset($newbillingaddress->addressRow1)) {$newbillingaddress->addressRow1 = "";}
							//if (!isset($newbillingaddress->addressRow2)) {$newbillingaddress->addressRow2 = "";}
							
							if (isset($newbillingaddress->firstName)) {$_POST['billing']['firstname'] = ($useuc ? ucwords(strtolower($newbillingaddress->firstName)) : $newbillingaddress->firstName);}
							if (isset($newbillingaddress->lastName)) {$_POST['billing']['lastname'] = ($useuc ? ucwords(strtolower($newbillingaddress->lastName)) : $newbillingaddress->lastName);}
							if (isset($newbillingaddress->addressRow1)) {$_POST['billing']['street'][] = ($useuc ? ucwords(strtolower($newbillingaddress->addressRow1)) : $newbillingaddress->addressRow1);}
							if (isset($newbillingaddress->addressRow2)) {$_POST['billing']['street'][] = ($useuc ? ucwords(strtolower($newbillingaddress->addressRow2)) : $newbillingaddress->addressRow2);}
							if (isset($newbillingaddress->postalCode)) {$_POST['billing']['postcode'] = ($useuc ? ucwords(strtolower($newbillingaddress->postalCode)) : $newbillingaddress->postalCode);}
							if (isset($newbillingaddress->postalArea)) {$_POST['billing']['city'] = ($useuc ? ucwords(strtolower($newbillingaddress->postalArea)) : $newbillingaddress->postalArea);}
							if (isset($newbillingaddress->country)) {$_POST['billing']['country'] = ($useuc ? strtoupper($newbillingaddress->country) : $newbillingaddress->country);}
							if (isset($newbillingaddress->country)) {$_POST['billing']['country_id'] = ($useuc ? strtoupper($newbillingaddress->country) : $newbillingaddress->country);}
							unset($_POST['billing_address_id']);
							// In magento 1.8, forced shipping stops working.
							if(Mage::getSingleton('checkout/session')->getQuote()->getShippingAddress()->getData('same_as_billing')=='1')
							{
								unset($_POST['shipping']['street']);     // Reset street address since the array is based on pushing.
								if (isset($newbillingaddress->firstName)) {$_POST['shipping']['firstname'] = ($useuc ? ucwords(strtolower($newbillingaddress->firstName)) : $newbillingaddress->firstName);}
								if (isset($newbillingaddress->lastName)) {$_POST['shipping']['lastname'] = ($useuc ? ucwords(strtolower($newbillingaddress->lastName)) : $newbillingaddress->lastName);}
								if (isset($newbillingaddress->addressRow1)) {$_POST['shipping']['street'][] = ($useuc ? ucwords(strtolower($newbillingaddress->addressRow1)) : $newbillingaddress->addressRow1);}
								if (isset($newbillingaddress->addressRow2)) {$_POST['shipping']['street'][] = ($useuc ? ucwords(strtolower($newbillingaddress->addressRow2)) : $newbillingaddress->addressRow2);}
								if (isset($newbillingaddress->postalCode)) {$_POST['shipping']['postcode'] = ($useuc ? ucwords(strtolower($newbillingaddress->postalCode)) : $newbillingaddress->postalCode);}
								if (isset($newbillingaddress->postalArea)) {$_POST['shipping']['city'] = ($useuc ? ucwords(strtolower($newbillingaddress->postalArea)) : $newbillingaddress->postalArea);}
								if (isset($newbillingaddress->country)) {$_POST['shipping']['country'] = ($useuc ? strtoupper($newbillingaddress->country) : $newbillingaddress->country);}
								if (isset($newbillingaddress->country)) {$_POST['shipping']['country_id'] = ($useuc ? strtoupper($newbillingaddress->country) : $newbillingaddress->country);}
							}
						}
					}
					
					if($limitResult['result']=='error')
					{
						$this->formErrors['payment_method_error'] = true;
						$this->formErrors['resursbank_error'] = $limitResult['message'];
						return;	// Continue to the end will give you problems
					}
					else if($limitResult['result']=='success' and $limitResult['message'] == 'not granted')
					{
						Mage::getSingleton('checkout/session')->setDisablePaymentMethodId($paymentId);
						$this->formErrors['payment_method_error'] = true;
						if ($limitResult['customerError'] != "")
						{
							$errorMessage = html_entity_decode($this->__($limitResult['customerError']));
						}
						else
						{
							if(Mage::helper('resursbank')->isSingleResursPayment() > 1)
							{
								$errorMessage = html_entity_decode($this->__('Message from Resurs Bank: This payment method is not available for you. Please choose another payment method'));
							}
							else
							{
								$errorMessage = html_entity_decode($this->__('Message from Resurs Bank: This payment method is not available for you, or you could try with different credentials'));
							}
						}
						$this->formErrors['resursbank_error'] = $errorMessage;
						return;	// Continue to the end will give you problems
					}
					else
					{
						$hasHandlePostdata = true;
						parent::_handlePostData();
					}
				}
			}
		}
		// Since this a globally handled method, we'd pass this throught to anyone that wants to continue handle post data, but only if if it's not already handled above.
		$post = $this->getRequest()->getPost();
		if (!$hasHandlePostdata && $post)
		{
			parent::_handlePostData();
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
