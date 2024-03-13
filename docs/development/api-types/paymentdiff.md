---
layout: page
title: paymentDiff
permalink: /development/api-types/paymentdiff/
parent: Api Types
grand_parent: Development
---



# paymentDiff 
Detailed information about this part of the payment.  
Contains elements as defined in the following table.

| Component     | Type                                                                   | Occurs | Nillable? | Description                                                                                                                                                           |
|---------------|------------------------------------------------------------------------|--------|-----------|-----------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| type          | **[paymentDiffType](/development/api-types/paymentdifftype/)**                                 | 1..1   | No        | The type of payment part.                                                                                                                                             |
| transactionId | **[id](/development/api-types/simple-types/)**                                              | 0..1   | No        | This ID will be presented on the payment specifications sent from Resurs Bank. It can be left out, and in that case Resurs will use the payment ID as transaction ID. |
| created       | **dateTime** | 1..1   | No        | The timestamp of the payment part creation.                                                                                                                           |
| createdBy     | string                                                                 | 0..1   | No        | Who created the payment part.                                                                                                                                         |
| paymentSpec   | **[paymentSpec](/development/api-types/paymentspec/)**                                         | 1..1   | No        | The full specification details of the payment part.                                                                                                                   |
| orderId       | **[id](/development/api-types/simple-types/)**                                              | 0..1   | No        | The order number as specified by the representative.                                                                                                                  |
| invoiceId     | **[id](/development/api-types/simple-types/)**                                              | 0..1   | No        | The invoice number as specified by the representative.                                                                                                                |
| documentNames | **[nonEmptyString](/development/api-types/simple-types/)**                                  | 0..\*  | No        | The names of the documents associated with this payment part.                                                                                                         |

