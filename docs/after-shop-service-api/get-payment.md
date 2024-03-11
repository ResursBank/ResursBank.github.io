---
layout: page
title: Get Payment
permalink: /after-shop-service-api/get-payment/
parent: After Shop Service Api
---


# Get Payment 

## getPayment
*Retrieves detailed information about the payment.*
  
**Input (Literal)**

| Name       | Type                      | Occurs | Nillable? | Description                  |
|------------|---------------------------|--------|-----------|------------------------------|
| paymentId  | **[id](/development/api-types/simple-types/)** | 1..1   | No        | The identity of the payment. |

**Output (Literal)**

| Name    | Type                    | Occurs | Nillable? | Description          |
|---------|-------------------------|--------|-----------|----------------------|
| return  | [**payment**](/development/api-types/payment/)  | 1..1   | No        | The payment details. |

**Faults**

| Name                     | Content                                | Description                                                    |
|--------------------------|----------------------------------------|----------------------------------------------------------------|
| ECommerceErrorException  | **[ECommerceError](/development/api-types/ecommerceerror/)**   | Failed to retrieve the payment details. See error for details. |

### Introduction
Retrieves detailed information about a specific payment. You need the
paymentId for the payment you want to have information about. To get all
available payments you should use the
**[findPayments](/after-shop-service-api/find-payments/) **method.

### Example
An example showing request/response for a get payment

**Request**
```xml
<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:aft="http://ecommerce.resurs.com/v4/msg/aftershopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <aft:getPayment>
         <paymentId>Pay-1372762301644-3166</paymentId> <!-- Seraching for payment with id in the exshop-->
      </aft:getPayment>
   </soapenv:Body>
</soapenv:Envelope>
```
**Response**
```xml
<soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
   <soap:Body>
      <ns2:getPaymentResponse xmlns:ns3="http://ecommerce.resurs.com/v4/msg/exception" xmlns:ns2="http://ecommerce.resurs.com/v4/msg/aftershopflow">
         <return>
            <id>Pay-1372762301644-3166</id>
            <totalAmount>0.00000000000000000000</totalAmount>
            <metaData>
               <key>Expressfrakt</key>
               <value>true</value>
            </metaData>
            <limit>3030.00000</limit>
            <paymentDiffs>
               <type>AUTHORIZE</type>
               <created>2013-07-02T12:51:51+02:00</created>
               <createdBy>SHOP_FLOW</createdBy>
               <paymentSpec>
                  <specLines>
                     <id>BOLT-002</id>
                     <artNo>BOLT-002</artNo>
                     <description>Bolt (M8x125mm)</description>
                     <quantity>10.00000</quantity>
                     <unitMeasure>st</unitMeasure>
                     <unitAmountWithoutVat>1.60000</unitAmountWithoutVat>
                     <vatPct>25.00000</vatPct>
                     <totalVatAmount>4.000000000000000</totalVatAmount>
                     <totalAmount>20.000000000000000</totalAmount>
                  </specLines>
                  <specLines>
                     <id>NUT-001</id>
                     <artNo>NUT-001</artNo>
                     <description>Nut (M8)</description>
                     <quantity>10.00000</quantity>
                     <unitMeasure>st</unitMeasure>
                     <unitAmountWithoutVat>0.80000</unitAmountWithoutVat>
                     <vatPct>25.00000</vatPct>
                     <totalVatAmount>2.000000000000000</totalVatAmount>
                     <totalAmount>10.000000000000000</totalAmount>
                  </specLines>
                  <totalAmount>30.000000000000000</totalAmount>
                  <totalVatAmount>6.000000000000000</totalVatAmount>
               </paymentSpec>
            </paymentDiffs>
            <paymentDiffs>
               <type>DEBIT</type>
               <transactionId>TrD-1372762301644-3166</transactionId>
               <created>2013-07-02T12:51:51+02:00</created>
               <paymentSpec>
                  <totalAmount>30.0000000000</totalAmount>
                  <totalVatAmount>6.0000000000</totalVatAmount>
               </paymentSpec>
               <orderId>Ord-1372762301644-3166</orderId>
               <invoiceId>DebInv-1372762301644-3166</invoiceId>
            </paymentDiffs>
            <paymentDiffs>
               <type>CREDIT</type>
               <transactionId>TrC-1372762301644-3166</transactionId>
               <created>2013-07-02T12:51:52+02:00</created>
               <paymentSpec>
                  <totalAmount>30.0000000000</totalAmount>
                  <totalVatAmount>6.0000000000</totalVatAmount>
               </paymentSpec>
               <invoiceId>CrN-1372762301644-3166</invoiceId>
            </paymentDiffs>
            <customer>
               <governmentId>8305147715</governmentId>
               <address>
                  <fullName>Vincent Williamsson Alexandersson</fullName>
                  <firstName>Vincent</firstName>
                  <lastName>Williamsson Alexandersson</lastName>
                  <addressRow1>Glassgatan 15</addressRow1>
                  <postalArea>Göteborg</postalArea>
                  <postalCode>41655</postalCode>
                  <country>SE</country>
               </address>
               <phone>0707123456</phone>
               <email>testdata@resurs.se</email>
               <type>NATURAL</type>
            </customer>
            <booked>2013-07-02T12:51:49+02:00</booked>
            <finalized>2013-07-02T12:51:51+02:00</finalized>
            <paymentMethodId>Faktura</paymentMethodId>
            <fraud>false</fraud>
            <frozen>false</frozen>
            <status>IS_DEBITED</status>
            <status>IS_CREDITED</status>
            <paymentMethodType>INVOICE</paymentMethodType>
         </return>
      </ns2:getPaymentResponse>
   </soap:Body>
</soap:Envelope>
```

### Error example
When trying to get a payment that doesn´t exist you get this error with
the fixableByYou flag set to true.

```xml
<soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
   <soap:Body>
      <soap:Fault>
         <faultcode>soap:Server</faultcode>
         <faultstring>This order group do not exists</faultstring>
         <detail>
            <ns3:ECommerceError xmlns:ns2="http://ecommerce.resurs.com/v4/msg/aftershopflow" xmlns:ns3="http://ecommerce.resurs.com/v4/msg/exception">
               <errorTypeDescription>REFERENCED_DATA_DONT_EXISTS</errorTypeDescription>
               <errorTypeId>8</errorTypeId>
               <fixableByYou>true</fixableByYou>
               <userErrorMessage>Efterfrågad order/betalning (Pay-1372762301644-31656) kan inte hittas i databasen.</userErrorMessage>
            </ns3:ECommerceError>
         </detail>
      </soap:Fault>
   </soap:Body>
</soap:Envelope>
```
