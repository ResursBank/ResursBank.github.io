---
layout: page
title: Booksignedpayment
permalink: /simplified-flow-api/booksignedpayment/
parent: Simplified Flow Api
---


# bookSignedPayment 
Created by Joachim Andersson, last modified by Thomas Tornevall on
2023-12-27
# bookSignedPayment
*Books a payment that has been signed.  *
  
**Input (Literal)**
  
| Name      | Type                                     | Occurs | Nillable? | Description            |
|-----------|------------------------------------------|--------|-----------|------------------------|
| paymentId | ** [id](Simple-Types..._1475653.html) ** | 1..1   | No        | The ID for the payment |
  
  
**Output (Literal)**
  
| Name   | Type                                                  | Occurs | Nillable? | Description                        |
|--------|-------------------------------------------------------|--------|-----------|------------------------------------|
| return |  [bookPaymentResult](bookPaymentResult_1476388.html)  | 1..1   | No        | The result of the payment booking. |
  
  
**Faults**
  
| Name                     | Content                                               | Description                                        |
|--------------------------|-------------------------------------------------------|----------------------------------------------------|
| ECommerceErrorException  | **[ECommerceError](ECommerceError_1475945.html)**     | Failed to book the payment. See error for details. |
  
``` syntaxhighlighter-pre
   <soapenv:Body>
      <sim:bookSignedPayment>
         <paymentId>1</paymentId>
      </sim:bookSignedPayment>
   </soapenv:Body>
```
