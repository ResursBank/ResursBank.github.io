---
layout: page
title: Getpaymentmethods
permalink: /simplified-flow-api/getpaymentmethods/
parent: Simplified Flow Api
---


# getPaymentMethods 
Created by Tobias, last modified by Thomas Tornevall on 2023-10-17
** **
**getPaymentMethods**
*Retrieves detailed information on the payment methods available to the
**[representative](https://test.resurs.com/docs/display/DD/Terminology)**
. *
**Input (Literal)**  
  
| Name           | Type   | Occurs | Nillable? | Description                                                                                                                                                                  |
|----------------|--------|--------|-----------|------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| language       | String | 0..1   | Yes       | The language code as defined by the ISO 639-1 standard, *optional*. If not specified the default language of the representatives country will be used*.'\[sv, no, da, fi\]'* |
| customerType   | String | 0..1   | Yes       | Filter Payment Methods based on the CustomerType, *optional. '\[NATURAL, LEGAL\]'*                                                                                           |
| purchaseAmount | String | 0..1   | Yes       | Filter Payment Method based on the puarchaseAmount, *optional.*                                                                                                              |
  
  
**Output (Literal)**
  
| Name   | Type                                                | Occurs | Nillable? | Description                                                           |
|--------|-----------------------------------------------------|--------|-----------|-----------------------------------------------------------------------|
| return | ** [paymentMethod](paymentMethod_1475649.html) **   | 0..\*  | No        | Return a list of all payment methods available to the representative. |
  
  
**Faults**
  
| Name                    | Content                                           | Description                                                    |
|-------------------------|---------------------------------------------------|----------------------------------------------------------------|
| ECommerceErrorException | **[ECommerceError](ECommerceError_1475945.html)** | Failed to retrieve the payment methods. See error for details. |
  
### Introduction
Each payment consist of:
- An identity
- A description intended for the developer, but can be shown to the
  customer if you wish.
- minLimit & maxLimit: The payment method can only be used for purchases
  between these values.
- A specificType. This might be:
  - INVOICE: Essentially an [installment
    credit](http://en.wikipedia.org/wiki/Installment_credit). Generates
    a PDF invoice when [finalized](After-Shop-Service-API_327799.html)
  - REVOLVING_CREDIT: [Revolving
    credit](http://en.wikipedia.org/wiki/Revolving_credit)s and
    installment payments which do ***not*** generate invoices, in most
    cases this is a new Resurs Bank card.
  - CARD: A Resurs Bank card
  - PART_PAYMENT: You get the first payment slip the month after the
    purchase and you choose the payment plan then. The payment type does
    not generate an invoice.
- Legal info links. Must always be shown (at least the last link) where
  a Resurs Bank payment method is marketed in some way or can
  alternatively show information from getCostOfPurchaseHtml in a popup.
  This is a legal requirement.
Since payment methods do not contain information such as
[**logos**](https://test.resurs.com/docs/display/ecom/Logotypes),
descriptions, fees, etc., it is likely that the webshop has to store the
information about the methods of payment locally. The payment methods
should be cached for about 24 hours to improve user experience by
reducing loading time.
**Resurs Bank may add/remove payment methods. A payment method is
withdrawn from this listing 6 hours before it stops to work.**
### Code example - response from server
**getPaymentMethodsResponse**
``` syntaxhighlighter-pre
<soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
   <soap:Body>
      <ns3:getPaymentMethodsResponse xmlns:ns3="http://ecommerce.resurs.com/v4/msg/shopflow" xmlns:ns2="http://ecommerce.resurs.com/v4/msg/exception">
         <return>
            <id>6</id>
            <description>Company invoice</description>
            <legalInfoLinks>
               <appendPriceLast>false</appendPriceLast>
               <endUserDescription>General terms</endUserDescription>
               <url>https://secure.resurs.se/documenthandler/Dokument.pdf?customerType=legal&amp;docType=commonTerms&amp;land=SE&amp;language=sv</url>
            </legalInfoLinks>
            <legalInfoLinks>
               <appendPriceLast>false</appendPriceLast>
               <endUserDescription>Standardiserad europeisk konsumentkreditinformation (SEKKI)</endUserDescription>
               <url>https://secure.resurs.se/documenthandler/Dokument.pdf?bankprodukt=NZ690101&amp;kedja=107&amp;land=SE;language=sv</url>
            </legalInfoLinks>
            <legalInfoLinks>
               <appendPriceLast>true</appendPriceLast>
               <endUserDescription>Prisinformation</endUserDescription>https://secure.resurs.se/documenthandler/Dokument.pdf?bankprodukt=76189069&kedja=995264&land=SE
               <url>https://secure.resurs.se/priceinfo/prisskyltning.html?countryCode=SE&amp;authorizedBankproductId=NZ690101&amp;representativeId=107&amp;creditAmount=</url>
            </legalInfoLinks>
            <minLimit>1.00</minLimit>
            <maxLimit>50000.00</maxLimit>
            <type>INVOICE</type>
            <specificType>INVOICE</specificType>
            <customerType>LEGAL</customerType>
         </return>
         <return>
            <id>7</id>
            <description>Resurskort</description>
            <minLimit>0</minLimit>
            <maxLimit>2147483647</maxLimit>
            <type>CARD</type>
            <specificType>CARD</specificType>
            <customerType>NATURAL</customerType>
            <customerType>LEGAL</customerType>
         </return>
         <return>
            <id>8</id>
            <description>New card</description>
            <legalInfoLinks>
               <appendPriceLast>false</appendPriceLast>
               <endUserDescription>General terms</endUserDescription>
               <url>https://secure.resurs.se/documenthandler/Dokument.pdf?customerType=natural&amp;docType=commonTerms&amp;land=SE&amp;language=sv</url>
            </legalInfoLinks>
            <legalInfoLinks>
               <appendPriceLast>false</appendPriceLast>
               <endUserDescription>Standardiserad europeisk konsumentkreditinformation (SEKKI)</endUserDescription>
               <url>https://secure.resurs.se/documenthandler/Dokument.pdf?bankprodukt=7B019069&amp;kedja=107&amp;land=SE</url>
            </legalInfoLinks>
            <legalInfoLinks>
               <appendPriceLast>true</appendPriceLast>
               <endUserDescription>Prisinformation</endUserDescription>
               <url>https://secure.resurs.se/priceinfo/prisskyltning.html?countryCode=SE&amp;authorizedBankproductId=7B019069&amp;representativeId=107&amp;creditAmount=</url>
            </legalInfoLinks>
            <minLimit>10.00</minLimit>
            <maxLimit>130000.00</maxLimit>
            <type>REVOLVING_CREDIT</type>
            <specificType>REVOLVING_CREDIT</specificType>
            <customerType>NATURAL</customerType>
         </return>
         <return>
            <id>9</id>
            <description>Invoice</description>
            <legalInfoLinks>
               <appendPriceLast>false</appendPriceLast>
               <endUserDescription>Allmänna villkor</endUserDescription>
               <url>https://secure.resurs.se/documenthandler/Dokument.pdf?customerType=natural&amp;docType=commonTerms&amp;land=SE&amp;language=sv</url>
            </legalInfoLinks>
            <legalInfoLinks>
               <appendPriceLast>false</appendPriceLast>
               <endUserDescription>Standardiserad europeisk konsumentkreditinformation (SEKKI)</endUserDescription>
               <url>https://secure.resurs.se/documenthandler/Dokument.pdf?bankprodukt=LG686069&amp;kedja=107&amp;land=SE</url>
            </legalInfoLinks>
            <legalInfoLinks>
               <appendPriceLast>true</appendPriceLast>
               <endUserDescription>Prisinformation</endUserDescription>
               <url>https://secure.resurs.se/priceinfo/prisskyltning.html?countryCode=SE&amp;authorizedBankproductId=LG686069&amp;representativeId=107&amp;creditAmount=</url>
            </legalInfoLinks>
            <minLimit>10.00</minLimit>
            <maxLimit>50000.00</maxLimit>
            <type>INVOICE</type>
            <specificType>REVOLVING_CREDIT</specificType>
            <customerType>NATURAL</customerType>
         </return>
      </ns3:getPaymentMethodsResponse>
   </soap:Body>
</soap:Envelope> 
```
