---
layout: page
title: bookSignedPayment
permalink: /simplified-flow-api/booksignedpayment/
parent: Simplified Flow API
---


# bookSignedPayment 
*Books a payment that has been signed.*

**Input (Literal)**

| Name      | Type                        | Occurs | Nillable? | Description            |
|-----------|-----------------------------|--------|-----------|------------------------|
| paymentId | **[id](/development/api-types/simple-types/)** | 1..1   | No        | The ID for the payment |

**Output (Literal)**

| Name   | Type                                     | Occurs | Nillable? | Description                        |
|--------|------------------------------------------|--------|-----------|------------------------------------|
| return |  [bookPaymentResult](/development/api-types/bookpaymentresult/)  | 1..1   | No        | The result of the payment booking. |

**Faults**

| Name                     | Content                                  | Description                                        |
|--------------------------|------------------------------------------|----------------------------------------------------|
| ECommerceErrorException  | **[ECommerceError](/development/api-types/ecommerceerror/)**     | Failed to book the payment. See error for details. |

```xml
   <soapenv:Body>
      <sim:bookSignedPayment>
         <paymentId>1</paymentId>
      </sim:bookSignedPayment>
   </soapenv:Body>
```
