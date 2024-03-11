---
layout: page
title: Annulling
permalink: /after-shop-service-api/annulling/
parent: After Shop Service Api
---


# Annulling 

# annulPayment
*Annuls the payment. This removes the reservation on the customer's
account. NB: For a payment to be annulled, it must be booked. If it has
been finalized, it can no longer be annulled. (Finalized payments have
to be credited.)*

**Input (Literal)**

| Name             | Type                                    | Occurs | Nillable? | Description                                          |
|------------------|-----------------------------------------|--------|-----------|------------------------------------------------------|
| paymentId        | **[id](/development/api-types/simple-types/)**               | 1..1   | No        | The identity of the payment.                         |
| partPaymentSpec  |  [**paymentSpec**](/development/api-types/paymentspec/)         | 0..1   | No        | The specification of the payment annulment.          |
| createdBy        |  [**nonEmptyString**](/development/api-types/simple-types/)  | 0..1   | No        | The username of the person performing the operation. |

**Faults**

| Name                     | Content                                  | Description                                         |
|--------------------------|------------------------------------------|-----------------------------------------------------|
| ECommerceErrorException  | **[ECommerceError](/development/api-types/ecommerceerror/)**     | Failed to annul the payment. See error for details. |

### Introduction
Annuls the payment. This removes the reservation on the customer's
account. A payment can only be annulled if it's booked. If it has been
booked and then finalized, it can no longer be annulled. (Finalized
payments have to be credited).


![](../../attachments/1475429/128286739.png)

### What is a PaymentSpec
Expand to learn more about paymentSpec
The payment details. In it's simplest form it's just sum, i.e.
totalAmount and totalVatAmount are set, but there are no specLines. If
nothing else is said you shall send specLines .  
Contains elements as defined in the following table.

| Component      | Type                                                                                     | Occurs | Nillable? | Description                                                                                                                                                                                                                  |
|----------------|------------------------------------------------------------------------------------------|--------|-----------|------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| specLines      | **[specLine](/development/api-types/specline/)**                       | 0..\*  | No        | The list of payment lines. In the case you're sending a simple payment, without lines, this parameter should be left empty. Sending payment lines may, or may not, be mandatory, depending on the contract with Resurs Bank. |
| totalAmount    | **[positiveDecimal](/development/api-types/simple-types/)** | 1..1   | No        | The total payment amount. The sum of all line amounts (if there are lines supplied) including VAT. If this payment is without lines this is the only value to be set on the payment spec.                                    |
| totalVatAmount | decimal                                                                                  | 0..1   | Yes       | The total VAT amount of the payment when there are specification lines supplied. If there are no lines this fileld must be empty (null).                                                                                     |

### Paymentspec - speclines
> Observe that in order to have an invoice with specified order data,
> make sure to include the speclines in the web service call.

specLines are not mandatory for processing payments.

specLines can vary between start, finalize, credit and annul. It doesn't
matter. Only the sum matter.

specLines make better invoices and help the merchant

The code below shows an example of one paymentSpec row when calling
startPaymentSession method

**paymentSpec example in bookPayment**

### Paymentspec - rounding
[see Rounding](/development/rounding/)

###  annulPayment - code example
**annulPayment** Expand source
```xml
<!-- Fully Specified -->
<soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema">   
  <soap:Body>     
    <annulPayment xmlns="http://ecommerce.resurs.com/v4/msg/aftershopflow">       
      <paymentId>300007457</paymentId>       
      <partPaymentSpec xmlns="">         
        <specLines>           
          <id>shippingfee</id>           
          <artNo>shippingfee</artNo>           
          <description>Fraktgebyr</description>           
          <quantity>1</quantity>           
          <unitMeasure>st</unitMeasure>           
          <unitAmountWithoutVat>95</unitAmountWithoutVat>           
          <vatPct>0</vatPct>           
          <totalVatAmount>0</totalVatAmount>           
          <totalAmount>95</totalAmount>         
        </specLines>         
        <totalAmount>95</totalAmount>         
        <totalVatAmount>0</totalVatAmount>       
      </partPaymentSpec>       
      <createdBy>IntegrationService</createdBy>     
    </annulPayment>   
  </soap:Body> 
</soap:Envelope>

<!-- Unspecified --> 
<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:aft="http://ecommerce.resurs.com/v4/msg/aftershopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <aft:annulPayment>
         <paymentId>12345</paymentId>
            <createdBy>Aftershop_annulPayment</createdBy>
      </aft:annulPayment>
   </soapenv:Body>
</soapenv:Envelope>
```
> Specified vs unspecified annulmentIf you use the unspecified call
> without specline or amount, the annulment row in the Payment admin
> will have a VAT of 20% (0,199999) instead of 25%. The total amount is
> however correct. If you want also the annulment row to be correct, you
> will have to use the fully specified call.

> Partial annullment on VISA/MastercardPartial annullment cannot be done
> on VISA/Mastercard payment method. If the full amount is not to be
> debited the customer - you need to finalize this amount and then use
> creditPayment

