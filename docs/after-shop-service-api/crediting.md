---
layout: page
title: Crediting / Refunding
permalink: /after-shop-service-api/Crediting/
parent: After Shop Service Api
---


# Crediting / Refunding 

# creditPayment
> Credits the payment. This returns the payment amount from the
> representative to the customer's account. NB: For a payment to be
> credited, it must be finalized. (Non-finalized payments have to be
> annulled.)

**Input (Literal)**

| Name                    | Type                                                             | Occurs | Nillable? | Description                                                                                                                                                                            |
|-------------------------|------------------------------------------------------------------|--------|-----------|----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| paymentId               |  [**id**](/development/api-types/simple-types/)                                       | 1..1   | No        | The identity of the payment.                                                                                                                                                           |
| preferredTransactionId  | [**id**](/development/api-types/simple-types/)                                        | 0..1   | No        | Will be printed on the accounting summary. Can be used to track the transaction. If not set it will fallback on paymentId for this value.                                              |
| partPaymentSpec         |  [**paymentSpec**](/development/api-types/paymentspec/)                                  | 0..1   | No        | The specification of the payment crediting. **PS! Mandatory if payment method is INVOICE**                                                                                             |
| createdBy               |  [**nonEmptyString**](/development/api-types/simple-types/)                           | 0..1   | No        | The username of the person performing the operation.                                                                                                                                   |
| creditNoteId            | [**id**](/development/api-types/simple-types/)                                        | 0..1   | No        | The credit note number. This will be printed on the credit note. For payment methods other than INVOICE, setting this will generate an error.                                          |
| creditNoteDate          |  date  | 0..1   | No        | The credit note date. This will be printed on the credit note. For payment methods other than INVOICE, setting this will generate an error.Note: use the format "yyyy-MM-dd" for date. |
| invoiceDeliveryType     | [**invoiceDeliveryType**](/development/api-types/invoicedeliverytype/)                   | 0..1   | Yes       | How the credit invoice should be delivered to the customer. **Default: EMAIL**                                                                                                         |

**Faults**

| Name                     | Content                                  | Description                                          |
|--------------------------|------------------------------------------|------------------------------------------------------|
| ECommerceErrorException  | [**ECommerceError** ](/development/api-types/ecommerceerror/)    | Failed to credit the payment. See error for details. |

### Introduction
Credits the payment. This returns <code>the payment</code> amount from the
representative to the customer's account. For a payment to be credited,
it must be finalized. (Non-finalized payments have to be annulled.) If
you are unsure when to use this method, read more about [Annulment and
Crediting.](concepts-and-domain)

![](../../attachments/1475429/128286739.png)

### What is a paymentSpec
Expand to read more about paymentSpec
The payment details. In it's simplest form it's just sum, i.e.
totalAmount and totalVatAmount are set, but there are no specLines. If
nothing else is said you shall send specLines .  
Contains elements as defined in the following table.

| Component      | Type                                                                                     | Occurs | Nillable? | Description                                                                                                                                                                                                                  |
|----------------|------------------------------------------------------------------------------------------|--------|-----------|------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| specLines      | [**specLine**](/development/api-types/specline/)                       | 0..\*  | No        | The list of payment lines. In the case you're sending a simple payment, without lines, this parameter should be left empty. Sending payment lines may, or may not, be mandatory, depending on the contract with Resurs Bank. |
| totalAmount    | [**positiveDecimal**](/development/api-types/simple-types/) | 1..1   | No        | The total payment amount. The sum of all line amounts (if there are lines supplied) including VAT. If this payment is without lines this is the only value to be set on the payment spec.                                    |
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

### Credit Payment - code example
**creditPayment**
```xml
<SOAP-ENV:Envelope xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:ns1="http://ecommerce.resurs.com/v4/msg/aftershopflow">   
  <SOAP-ENV:Body>     
    <ns1:creditPayment>       
      <paymentId>100100446</paymentId>       
      <preferredTransactionId xsi:nil="true"/>       
      <partPaymentSpec>         
        <specLines>           
          <id>1</id>           
          <artNo>other</artNo>           
          <description>Other</description>           
          <quantity>1</quantity>           
          <unitMeasure/>           
          <unitAmountWithoutVat>199</unitAmountWithoutVat>           
          <vatPct>0</vatPct>           
          <totalVatAmount>0</totalVatAmount>           
          <totalAmount>199</totalAmount>         
        </specLines>         
        <totalAmount>199</totalAmount>         
        <totalVatAmount>0</totalVatAmount>       
      </partPaymentSpec>       
      <createdBy>User</createdBy>       
      <creditNoteId>100100446-CR1</creditNoteId>       
      <creditNoteDate>2015-11-21</creditNoteDate>     
    </ns1:creditPayment>   
  </SOAP-ENV:Body> 
</SOAP-ENV:Envelope> 
```
**creditPayment with discount**
```xml
<SOAP-ENV:Envelope xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:ns1="http://ecommerce.resurs.com/v4/msg/aftershopflow"> 
 <SOAP-ENV:Body> 
  <ns1:creditPayment> 
   <paymentId>creditexample1</paymentId> 
   <preferredTransactionId xsi:nil="true"/> 
    <partPaymentSpec>
     <specLines>
        <id>1</id>
        <artNo>1111</artNo>
        <description>Shoes</description>
        <quantity>1.00</quantity>
        <unitMeasure>st</unitMeasure>
        <unitAmountWithoutVat>800.00000</unitAmountWithoutVat>
        <vatPct>25</vatPct>
        <totalVatAmount>200.00</totalVatAmount>
        <totalAmount>1000.00</totalAmount>
     </specLines>
     <specLines>
        <id>2</id>
        <artNo>1112</artNo>
        <description>Socks</description>
        <quantity>1.00000</quantity>
        <unitMeasure>st</unitMeasure>
        <unitAmountWithoutVat>200.00000</unitAmountWithoutVat>
        <vatPct>25.00000</vatPct>
        <totalVatAmount>50.000000000000000</totalVatAmount>
        <totalAmount>250.0000000000</totalAmount>
     </specLines>
     <specLines>
        <id>3</id>
        <artNo>1113</artNo>
        <description>Rabatt</description>
        <quantity>1.00000</quantity>
        <unitMeasure>st</unitMeasure>
        <unitAmountWithoutVat>-120.00000</unitAmountWithoutVat>
        <vatPct>25.00000</vatPct>
        <totalVatAmount>-30.000000000000000</totalVatAmount>
        <totalAmount>-150.0000000000</totalAmount>
     </specLines>
         <totalAmount>1100</totalAmount>
         <totalVatAmount>220</totalVatAmount>
     </partPaymentSpec> 
        <createdBy>Partner Integration</createdBy> 
        <creditNoteId>1001022226-PI2</creditNoteId> 
        <creditNoteDate>2021-02-16</creditNoteDate> 
    </ns1:creditPayment> 
  </SOAP-ENV:Body>
</SOAP-ENV:Envelope> 
```

