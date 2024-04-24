---
layout: page
title: Set Invoice Sequence
permalink: /configuration-service/set-invoice-sequence/
parent: Configuration Service
---


# Set Invoice Sequence 

# setInvoiceSequence
*Sets the next invoice number to be used for automatic generation of
invoice numbers.*
  
**Input(Literal)**
  
| Name              | Type    | Occurs | Nillable? | Description                                                                     |
|-------------------|---------|--------|-----------|---------------------------------------------------------------------------------|
| nextInvoiceNumber | integer | 0..1   | No        | The next invoice number to be used for automatic generation of invoice numbers. |
  
  
**Faults**
  
| Name                    | Content                                             | Description                                                       |
|-------------------------|-----------------------------------------------------|-------------------------------------------------------------------|
| ECommerceErrorException | **[ECommerceError](ECommerceError_1475945.html)**   | Failed to set the invoice number sequence. See error for details. |
  
### Introduction
You can set the next number to be used for invoices. The new number can
not be lower than the existing, it must be a higher unused number. For
example if the current invoice number is 223 you can´t set the next
invoice number to be 220. You can do this operation from
the [**paymentAdmin**](Payment-administration-GUI_327748.html), a
web-based interface to handle payments and orders or by using the
webservice
### Example
**Request**
``` syntaxhighlighter-pre
<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:con="http://ecommerce.resurs.com/v4/msg/configuration">
   <soapenv:Header/>
   <soapenv:Body>
      <con:setInvoiceSequence>
         <nextInvoiceNumber>445</nextInvoiceNumber>
      </con:setInvoiceSequence>
   </soapenv:Body>
</soapenv:Envelope> 
```
**Response - void**
``` syntaxhighlighter-pre
<soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
   <soap:Body>
      <ns3:setInvoiceSequenceResponse xmlns:ns3="http://ecommerce.resurs.com/v4/msg/configuration" xmlns:ns2="http://ecommerce.resurs.com/v4/msg/exception"/>
   </soap:Body>
</soap:Envelope>
```
  
### Example Error
When trying to set the invoice number lower or equal to the previous
number
**Error**
``` syntaxhighlighter-pre
<soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
   <soap:Body>
      <soap:Fault>
         <faultcode>soap:Server</faultcode>
         <faultstring>Setting a invoice number lower than last number is not allowed</faultstring>
         <detail>
            <ns2:ECommerceError xmlns:ns2="http://ecommerce.resurs.com/v4/msg/exception" xmlns:ns3="http://ecommerce.resurs.com/v4/msg/configuration">
               <errorTypeDescription>ILLEGAL_ARGUMENT</errorTypeDescription>
               <errorTypeId>1</errorTypeId>
               <fixableByYou>true</fixableByYou>
               <userErrorMessage>Startnummer för faktura får inte vara lägre än tidigare nummer</userErrorMessage>
            </ns2:ECommerceError>
         </detail>
      </soap:Fault>
   </soap:Body>
</soap:Envelope>
```
