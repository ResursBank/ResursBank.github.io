---
layout: page
title: Peek Invoice Sequence
permalink: /configuration-service/peek-invoice-sequence/
parent: Configuration Service
---


# Peek Invoice Sequence 
````
peekInvoiceSequence
````
*Returns the next invoice number to be used for automatic generation of
invoice numbers.*
  
**Output(Literal)**
  
| Name              | Type    | Occurs | Nillable? | Description                                                                     |
|-------------------|---------|--------|-----------|---------------------------------------------------------------------------------|
| nextInvoiceNumber | integer | 0..1   | No        | The next invoice number to be used for automatic generation of invoice numbers. |
  
  
**Faults**
  
| Name                    | Content                                             | Description                                                     |
|-------------------------|-----------------------------------------------------|-----------------------------------------------------------------|
| ECommerceErrorException | **[ECommerceError](ECommerceError_1475945.html)**   | Failed to return invoice number sequence. See error for details |
  
### Introduction

This function returns the next invoice number that will be used for
automatic generation of invoice number. You can change the invoice
number manually by calling
**[setInvoiceSequence](set-invoice-sequence) **with the
wanted invoice number. You can do this from
the paymentAdmin, a
web-based interface to handle payments and orders or by using the
webservice.

### Example

**Request**

```xml
<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:con="http://ecommerce.resurs.com/v4/msg/configuration">
   <soapenv:Header/>
   <soapenv:Body>
      <con:peekInvoiceSequence/>
   </soapenv:Body>
</soapenv:Envelope>
```

**Response**
```xml
<soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
   <soap:Body>
      <ns3:peekInvoiceSequenceResponse xmlns:ns3="http://ecommerce.resurs.com/v4/msg/configuration" xmlns:ns2="http://ecommerce.resurs.com/v4/msg/exception">
         <nextInvoiceNumber>444</nextInvoiceNumber>
      </ns3:peekInvoiceSequenceResponse>
   </soap:Body>
</soap:Envelope>
```
