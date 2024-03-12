---
layout: page
title: bookPayment
permalink: /simplified-flow-api/bookpayment/
parent: Simplified Flow Api
---


# bookPayment 
*Books the payment.*

**Input (Literal)**

| Name         | Type                                     | Occurs | Nillable? | Description                                                                                                           |
|--------------|------------------------------------------|--------|-----------|-----------------------------------------------------------------------------------------------------------------------|
| paymentData  | **[paymentData](/development/api-types/paymentdata/)**           | 1..1   | No        | The data that is for the payment, e.g. payment method etc.                                                            |
| orderData    | **[paymentSpec](/development/api-types/paymentspec/)**           | 1..1   | No        | The payment specifications. What the payment should handle, the amounts, spec lines etc.                              |
| metaData     |  [**mapEntry**](/development/api-types/mapentry/)                | 0..\*  | Yes       | Extra meta data for the payment. [Recognized metadata](/development/recognized-metadata/).                                          |
| customer     | **[extendedCustomer](/development/api-types/customer/extendedcustomer/)** | 1..1   | No        | The customer data. Here you specify the billing address, delivery address etc.                                        |
| card         | **[cardData](/development/api-types/carddata/)**                 | 0..1   | Yes       | If the payment is related to a card/account, or if you apply for a new card/account.                                  |
| signing      | **[signing](/development/api-types/signing-object/)**            | 1..1   | No        | For when a payment requires a Signing, contains customer URLs for a successful or failed signing.                     |
| invoiceData  | **[invoiceData](/development/api-types/invoicedata/)**           | 0..1   | Yes       | The data for the invoice.                                                                                             |
| storeId      | storeId                                  | 0..1   | No        | Used with permission from Resurs Bank, if you have a chain of stores. storeID defines which store in the chain it is. |

**Output (Literal)**

| Name   | Type                                     | Occurs | Nillable? | Description                        |
|--------|------------------------------------------|--------|-----------|------------------------------------|
| return |  [bookPaymentResult](/development/api-types/bookpaymentresult/)  | 1..1   | No        | The result of the payment booking. |

**Faults**

| Name                     | Content                                  | Description                                        |
|--------------------------|------------------------------------------|----------------------------------------------------|
| ECommerceErrorException  | **[ECommerceError](/development/api-types/ecommerceerror/)**     | Failed to book the payment. See error for details. |

**Response** 
```xml
 <soapenv:Body>
      <sim:bookPayment>
         <paymentData>
            <!--Optional:-->
            <preferredId>12345</preferredId>
            <preferredTransactionId>Transaction id 10</preferredTransactionId>
            <paymentMethodId>Invoice</paymentMethodId>
            <customerIpAddress>127.0.0.1</customerIpAddress>
            <!--Optional:-->
            <waitForFraudControl>true</waitForFraudControl>
            <!--Optional:-->
            <annulIfFrozen>false</annulIfFrozen>
            <!--Optional:-->
            <finalizeIfBooked>false</finalizeIfBooked>
         </paymentData>
         <orderData>
            <!--Zero or more repetitions:-->
            <specLines>
               <id>1</id>
               <artNo>1</artNo>
               <description>test</description>
               <quantity>1</quantity>
               <unitMeasure>st</unitMeasure>
               <unitAmountWithoutVat>100</unitAmountWithoutVat>
               <vatPct>25</vatPct>
               <totalVatAmount>25</totalVatAmount>
               <totalAmount>125</totalAmount>
            </specLines>
            <totalAmount>125</totalAmount>
            <!--Optional:-->
            <totalVatAmount>25</totalVatAmount>
         </orderData>
         <!--Zero or more repetitions:-->
         <metaData>
            <key>xxx</key>
            <!--Optional:-->
            <value>tttt</value>
         </metaData>
         <metaData>
            <key>CustomerId</key>
            <value>String 20 chars</value>
         </metaData>
         <metaData>
            <key>invoiceExtRef</key>
            <value>String 46 chars</value>
         </metaData>
         <customer>
            <!--Optional:-->
            <governmentId>${#TestCase#GovernmentID}</governmentId>
            <address>
               <!--Optional:-->
               <fullName>Test Testsson</fullName>
               <!--Optional:-->
               <firstName>Test</firstName>
               <!--Optional:-->
               <lastName>Testsson</lastName>
               <addressRow1>TEST </addressRow1>
               <!--Optional:-->
               <addressRow2>Test3</addressRow2>
               <postalArea>Helsingborg</postalArea>
               <postalCode>25220</postalCode>
               <country>SE</country>
            </address>
            <!--Optional:-->
             <email>test@test.com</email>
            <type>NATURAL</type>
            <cellPhone>0707112233</cellPhone>
            <!--Optional:-->
            <yourCustomerId>Cust-1000</yourCustomerId>
            <!--Optional:-->
            <deliveryAddress>
               <fullName>Test Testsson</fullName>
               <firstName>Test</firstName>
               <lastName>Testsson</lastName>
               <addressRow1>Test gatan 25</addressRow1>
               <postalArea>Helsingborg</postalArea>
               <postalCode>25220</postalCode>
               <country>SE</country>
            </deliveryAddress>
         </customer>
         <signing>
            <successUrl>https://shop.representative.com/order/12345/success/</successUrl>
            <failUrl>https://shop.representative.com/order/12345/fail/</failUrl>
         </signing>
         <!--Optional:-->
     <invoiceData>
            <invoiceId>Invoice-id 1000</invoiceId>
            <invoiceDate>2013-12-02</invoiceDate>
            <invoiceDeliveryType>NONE</invoiceDeliveryType>
         </invoiceData>
         <!--Optional:-->
         <storeId>?</storeId>
      </sim:bookPayment>
   </soapenv:Body>
```

> Using Swish payment method?Note that if you are using Swish as a
> payment method via Resurs, you must include the customer's cellphone
> number in the \<cellPhone\>-row. Using \<phone\> will result in an
> error in production

