---
layout: page
title: Additional Debit Of Payment
permalink: /after-shop-service-api/additional-debit-of-payment/
parent: After Shop Service Api
---


# Additional Debit of Payment 
Created by Benny, last modified by Thomas Tornevall on 2023-12-27
  
# additionalDebitOfPayment
*Makes a new, additional debit on an existing payment. This reserves the
amount on the customer's account. NB: If it is a credit payment, there
must be room for the additional debit within the limit.*
  
**Input (Literal)**
  
| Name         | Type                                                 | Occurs | Nillable? | Description                                                       |
|--------------|------------------------------------------------------|--------|-----------|-------------------------------------------------------------------|
| paymentId    | **[id](Simple-Types..._1475653.html)**               | 1..1   | No        | The identity of the payment to which to make an additional debit. |
| paymentSpec  |  [**paymentSpec**](paymentSpec_1474947.html)         | 0..1   | No        | The specification of the additional payment.                      |
| createdBy    |  [**nonEmptyString**](Simple-Types..._1475653.html)  | 0..1   | No        | The username of the person performing the operation.              |
  
  
**Faults**
  
| Name                     | Content                                               | Description                                                               |
|--------------------------|-------------------------------------------------------|---------------------------------------------------------------------------|
| ECommerceErrorException  | **[ECommerceError](ECommerceError_1475945.html)**     | Failed to make an additional debit on the payment. See error for details. |
  
  
### Introduction
If the customer wants to add a product on an existing order that has not
yet been shipped, you can add it with help of additionalDebitOfPayment.
AdditionalDebitOfPayment makes a new, additional debit on an existing
payment/order. This reserves the amount on the customer's account. If it
is a credit payment, there must be room for the additional debit within
the limit. If the payment method on the other hand is not a card there
is an extra room for later debits/purchases when the limit application
form was filled by the customer.
It´s also possible to make part debits of a payment. For example, if the
customer has ordered 5 products, it's possible to debit and ship 3 of
these products and wait for the rest of them for unknown circumstances.
This can also be made from **[Payment administration @ Resurs
Bank](Payment-administration-GUI_327748.html).**
Restrictions
additionalDebitOfPayment cannot be done on external payment methods such
as Swish and card transactions (VISA/Mastercard) via Nets/d2i
  
### What is paymentSpec?
Click here to read more about paymentSpec
The payment details. In it's simplest form it's just sum, i.e.
totalAmount and totalVatAmount are set, but there are no specLines. If
nothing else is said you shall send specLines .  
Contains elements as defined in the following table.
  
| Component      | Type                                                                                     | Occurs | Nillable? | Description                                                                                                                                                                                                                  |
|----------------|------------------------------------------------------------------------------------------|--------|-----------|------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| specLines      | **[specLine](https://test.resurs.com/docs/display/ecom/specLine)**                       | 0..\*  | No        | The list of payment lines. In the case you're sending a simple payment, without lines, this parameter should be left empty. Sending payment lines may, or may not, be mandatory, depending on the contract with Resurs Bank. |
| totalAmount    | **[positiveDecimal](https://test.resurs.com/docs/pages/viewpage.action?pageId=1475653)** | 1..1   | No        | The total payment amount. The sum of all line amounts (if there are lines supplied) including VAT. If this payment is without lines this is the only value to be set on the payment spec.                                    |
| totalVatAmount | decimal                                                                                  | 0..1   | Yes       | The total VAT amount of the payment when there are specification lines supplied. If there are no lines this fileld must be empty (null).                                                                                     |
  
### Paymentspec - speclines
Observe that in order to have an invoice with specified order data, make
sure to include the speclines in the web service call.
  
specLines are not mandatory for processing payments.
specLines can vary between start, finalize, credit and annul. It doesn't
matter. Only the sum matter.
specLines make better invoices and help the merchant
The code below shows an example of one paymentSpec row when calling
startPaymentSession method
**paymentSpec example in bookPayment**
  
### Paymentspec - rounding
[see Rounding](https://test.resurs.com/docs/display/ecom/Rounding)
  
  
  
### additionalDebitOfPayment - code example
**additionalDebitOfPayment**
``` syntaxhighlighter-pre
<soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema">   
  <soap:Body>     
    <additionalDebitOfPayment xmlns="http://ecommerce.resurs.com/v4/msg/aftershopflow">       
      <paymentId>300007457</paymentId>       
      <paymentSpec>         
        <specLines>           
          <id>106</id>           
          <artNo>106</artNo>           
          <description>Frakt Norge</description>           
          <quantity>1</quantity>           
          <unitMeasure/>           
          <unitAmountWithoutVat>76</unitAmountWithoutVat>           
          <vatPct>25</vatPct>           
          <totalVatAmount>19</totalVatAmount>           
          <totalAmount>95</totalAmount>         
        </specLines>         
        <totalAmount>95</totalAmount>         
        <totalVatAmount>19</totalVatAmount>       
      </paymentSpec>       
      <createdBy>User</createdBy>     
    </additionalDebitOfPayment>   
  </soap:Body> 
</soap:Envelope>
```
  
  
