---
layout: page
title: Plugin Hotfixes
nav_exclude: true
permalink: /platform-plugins/magento-modules/magento-plugin---oldflow-version/plugin-hotfixes/
parent: Magento Modules
grand_parent: Platform Plugins
---



# Plugin Hotfixes 

This page contains hotfixes for the OldFlow release.

## 2016-02-11
A problem discovered in the finalization process that affects payment
methods that is not of the type "INVOICE". This can be manually fixed by
editing the file
**./app/code/lcoal/Resursbank/Resursbank/Model/Api.php:**

Look up:

public function finalizePayment(Varien_Object \$payment)

Find this code:

**finalizePaymentArray**
```xml
$finalizePayment = array(
   'paymentId' => $additionalData,
   'preferredTransactionId' => $orderId,
   'partPaymentSpec' => $paymentSpec,
   'createdBy' => 'SHOP_FLOW',
   'orderId' => $orderId,
   'orderDate' => date('Y-m-d', time()),
   'invoiceId' => $invoiceId,
   'invoiceDate' => date('Y-m-d', time()),
   'ourReference' => utf8_encode($order->getStore()->getWebsite()->getName()),
   'yourReference' => utf8_encode($billing->getFirstname() . " " . $billing->getLastname())
);
```
Replace with this code:

**finalizePaymentArray-Fix**
```xml
/* #62183 - Begin - Finalization with or without type INVOICE */
$isInvoice = false;
$methodType = null;
   try {
      $methodCode = $payment->getMethodInstance()->getCode();
      $methodInformation = Mage::getModel('resursbank/methods')->getCollection();
      $methodInformation->addFieldToFilter('payment_id', str_replace('resurspayment', '', $methodCode));
      foreach ($methodInformation as $method) {
         $methodType = $method->getPaymentType();
         if (!empty($methodType)) {break;}
      }
   } catch (Exception $e) {}
if (strtoupper($methodType) === "INVOICE") { $isInvoice = true;    }
$finalizePayment = array(
   'paymentId' => $additionalData,
   'preferredTransactionId' => $orderId,
   'partPaymentSpec' => $paymentSpec,
   'createdBy' => 'SHOP_FLOW',
   'orderId' => $orderId,
   'ourReference' => utf8_encode($order->getStore()->getWebsite()->getName()),
   'yourReference' => utf8_encode($billing->getFirstname() . " " . $billing->getLastname())
);
if ($isInvoice) {
   $finalizePayment['orderDate'] = date('Y-m-d', time());
   $finalizePayment['invoiceId'] = $invoiceId;
   $finalizePayment['invoiceDate'] = date('Y-m-d', time());
}
/* #62183 - Finish */
```

# 2015-02-26
Some Magento-instances (primary the one step checkout) doesn't accept
the ucwords()-translation that belongs to the strict validation, so from
now on they are set to uppercase in submitlimitapplication. Checkout.php
and OnepageController.php has been patched and will be released with
v1.3.8.1 (find the files below)

# 2015-01-19
Stricter validation from ecommerce generates errors on "place order".
This is fixed from version 1.3.6, but is not yet released. Currently,
test environment are affected.

For Firecheckout, [patch files are updated
here](manually-patching-firecheckout).

For Vanilla and the Onestep-checkout, edit
app/code/local/Resursbank/Resursbank/Block/Checkout.php around line 36,
find following code:

**Original code \< 1.3.6**
```xml
                   $slaAddress = array(
                            'firstName' => (isset($_POST['billing']['firstname']) ? $_POST['billing']['firstname'] : ""),
                            'lastName' => (isset($_POST['billing']['lastname']) ? $_POST['billing']['lastname'] : ""),
                            'addressRow1' => (isset($_POST['billing']['street'][0]) ? $_POST['billing']['street'][0] : ""),
                            'addressRow2' => (isset($_POST['billing']['street'][1]) ? $_POST['billing']['street'][1] : ""),
                            'postalCode' => (isset($_POST['billing']['postcode']) ? $_POST['billing']['postcode'] : ""),
                            'postalArea' => (isset($_POST['billing']['city']) ? $_POST['billing']['city'] : ""),
                            'country' => (isset($_POST['billing']['country_id']) ? $_POST['billing']['country_id'] : "")
                        );
```
Replace with:

**Changed code \>= 1.3.6**
```xml
                    $slaAddress = array();
                    if (isset($_POST['billing']['firstname']) && trim($_POST['billing']['firstname']) != "") {$slaAddress['firstName'] = $_POST['billing']['firstname'];}
                    if (isset($_POST['billing']['lastname']) && trim($_POST['billing']['lastname']) != "") {$slaAddress['lastName'] = $_POST['billing']['lastname'];}
                    if (isset($_POST['billing']['street'][0]) && trim($_POST['billing']['street'][0]) != "") {$slaAddress['addressRow1'] = $_POST['billing']['street'][0];}
                    if (isset($_POST['billing']['street'][1]) && trim($_POST['billing']['street'][1]) != "") {$slaAddress['addressRow2'] = $_POST['billing']['street'][1];}
                    if (isset($_POST['billing']['postcode']) && trim($_POST['billing']['postcode']) != "") {$slaAddress['postalCode'] = $_POST['billing']['postcode'];}
                    if (isset($_POST['billing']['city']) && trim($_POST['billing']['city']) != "") {$slaAddress['postalArea'] = $_POST['billing']['city'];}
                    if (isset($_POST['billing']['country_id']) && trim($_POST['billing']['country_id']) != "") {$slaAddress['country'] = $_POST['billing']['country_id'];}
```
*Do the same for
app/code/local/Resursbank/Resursbank/controllers/Checkout/OnepageController.php* 
(around line 259)

You can also download the updated files [here
(Checkout.php)](../../../../attachments/3441280/4161547.php) and [here
(OnepageController.php)](../../../../attachments/3441280/4161546.php)  

