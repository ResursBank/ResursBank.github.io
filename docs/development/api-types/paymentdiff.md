---
layout: page
title: Paymentdiff
permalink: /development/api-types/paymentdiff/
parent: Api Types
grand_parent: Development
---



# paymentDiff 
Created by Benny, last modified on 2017-02-27
Detailed information about this part of the payment.  
Contains elements as defined in the following table.

| Component     | Type                                                                   | Occurs | Nillable? | Description                                                                                                                                                           |
|---------------|------------------------------------------------------------------------|--------|-----------|-----------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| type          | **[paymentDiffType](paymentdifftype)**                                 | 1..1   | No        | The type of payment part.                                                                                                                                             |
| transactionId | **[id](simple-types...)**                                              | 0..1   | No        | This ID will be presented on the payment specifications sent from Resurs Bank. It can be left out, and in that case Resurs will use the payment ID as transaction ID. |
| created       | **[dateTime](http://www.w3schools.com/schema/schema_dtypes_date.asp)** | 1..1   | No        | The timestamp of the payment part creation.                                                                                                                           |
| createdBy     | string                                                                 | 0..1   | No        | Who created the payment part.                                                                                                                                         |
| paymentSpec   | **[paymentSpec](paymentspec)**                                         | 1..1   | No        | The full specification details of the payment part.                                                                                                                   |
| orderId       | **[id](simple-types...)**                                              | 0..1   | No        | The order number as specified by the representative.                                                                                                                  |
| invoiceId     | **[id](simple-types...)**                                              | 0..1   | No        | The invoice number as specified by the representative.                                                                                                                |
| documentNames | **[nonEmptyString](simple-types...)**                                  | 0..\*  | No        | The names of the documents associated with this payment part.                                                                                                         |

