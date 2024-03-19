---
layout: page
title: Get Payment Document Names
permalink: /after-shop-service-api/get-payment-document-names/
parent: After Shop Service Api
---


# Get Payment Document Names 

## getPaymentDocumentNames
> Retrieves the names of all documents associated with the payments.
> These include, but are not necessarily limited to, previously generated
> invoices and credit notes sent to the customer.

**Input (Literal)**

| Name      | Type                      | Occurs | Nillable? | Description                  |
|-----------|---------------------------|--------|-----------|------------------------------|
| paymentId | **[id](/development/api-types/simple-types/)** | 1..1   | No        | The identity of the payment. |

**Output (Literal)**

| Name   | Type   | Occurs | Nillable? | Description                                             |
|--------|--------|--------|-----------|---------------------------------------------------------|
| return | string | 0..\*  | No        | The names of all documents associated with the payment. |

**Faults**

| Name                    | Content                                | Description                                                                  |
|-------------------------|----------------------------------------|------------------------------------------------------------------------------|
| ECommerceErrorException | **[ECommerceError](/development/api-types/ecommerceerror/)**   | Failed to retrieve the list of payment document names. See error for details |

### Introduction
This method retrieves all available documents that are associated with
the payment, the invoice document for example. This method retrieves the
names of the available document which you then use in the
[**getPaymentDocument**](/after-shop-service-api/getpaymentdocument/) method along with the paymentId to
retrieve the requested document.

![](../../attachments/1476098/128286757.png)

### Example
This example shows the request/response when trying to get available
document names for a specific payment.

**Request**
```xml
<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:aft="http://ecommerce.resurs.com/v4/msg/aftershopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <aft:getPaymentDocumentNames>
         <paymentId>Pay-1372762113890-5677</paymentId> <!-- get available document names with paymentid in exshop -->
      </aft:getPaymentDocumentNames>
   </soapenv:Body>
</soapenv:Envelope>
```
**Response**
```xml
<soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
   <soap:Body>
      <ns2:getPaymentDocumentNamesResponse xmlns:ns3="http://ecommerce.resurs.com/v4/msg/exception" xmlns:ns2="http://ecommerce.resurs.com/v4/msg/aftershopflow">
         <return>INVOICE_20130702-124247_1514</return>
         <return>INVOICE_CREDITNOTE_20130702-124248_1515</return>
      </ns2:getPaymentDocumentNamesResponse>
   </soap:Body>
</soap:Envelope>
```
