---
layout: page
title: Get Payment Document (Pdf)
permalink: /after-shop-service-api/getpaymentdocument/
parent: After Shop Service Api
---


# Get Payment Document (PDF) 


## getPaymentDocument
> Retrieves a specified document from the payment.

**Input (Literal)**

| Name          | Type                                   | Occurs | Nillable? | Description                  |
|---------------|----------------------------------------|--------|-----------|------------------------------|
| paymentId     | **[id](/development/api-types/simple-types/)**              | 1..1   | No        | The identity of the payment. |
| documentName  | [**nonEmptyString**](/development/api-types/simple-types/)  | 1..1   | No        | The name of the document.    |

**Output (Literal)**

| Name    | Type           | Occurs | Nillable? | Description   |
|---------|----------------|--------|-----------|---------------|
| return  | **[pdf](/development/api-types/pdf/)** | 0..\*  | No        | The document. |

**Faults**

| Name                     | Content                                | Description                                                              |
|--------------------------|----------------------------------------|--------------------------------------------------------------------------|
| ECommerceErrorException  | **[ECommerceError](/development/api-types/ecommerceerror/)**   | Failed to retrieve the specified payment document. See error for details |

### Introduction
Retrieves a specified document from the payment as a pdf, for example
the invoice. You can get the available document names for a payment by
calling the [**getPaymentDocumentNames**](/after-shop-service-api/get-payment-document-names/)
method.  
When trying to get the requested document, the invoice for example, you
send in the paymentId and the documentName as parameters.

![](../../attachments/1476098/128286757.png)

### Example
This example shows request/response from the exshop account.

**Request**
```xml
<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:aft="http://ecommerce.resurs.com/v4/msg/aftershopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <aft:getPaymentDocument>
         <paymentId>Pay-1372762113890-5677</paymentId>
         <documentName>INVOICE_20130702-124247_1514</documentName> <!-- a documentname wich I got from getDocuumentNames in exshop with the paymentId -->
      </aft:getPaymentDocument>
   </soapenv:Body>
</soapenv:Envelope>
```
**Response**
```xml
<soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
   <soap:Body>
      <ns2:getPaymentDocumentResponse xmlns:ns3="http://ecommerce.resurs.com/v4/msg/exception" xmlns:ns2="http://ecommerce.resurs.com/v4/msg/aftershopflow">
         <return>
            <name>INVOICE_20130702-124247_1514</name>
            <pdfData>JVBERi0xLjQKJeLjz9MKNiAwIG9iago8PC9UeXBlL1hPYmplY3QvQ29sb3JTcGFjZS9....etc</pdfData> <!-- Have shortened the response because of to the length -->
         </return>
      </ns2:getPaymentDocumentResponse>
   </soap:Body>
</soap:Envelope>
```
