---
layout: page
title: bookPaymentResult
permalink: /development/api-types/bookpaymentresult/
parent: Api Types
grand_parent: Development
---



# bookPaymentResult 

The response type when using [Simplified Basic Show Flow
Service](/simplified-flow-api/)

| Name               | Type                                   | Occurs | Nillable? | Description                                                                                           |
|--------------------|----------------------------------------|--------|-----------|-------------------------------------------------------------------------------------------------------|
| paymentId          | [id](/development/api-types/simple-types/)                  | 1..1   | No        | The ID for the payment, same as preferredId if that is specified, else it is an auto generated value. |
| bookPaymentStatus  | [bookPaymentStatus](/development/api-types/bookpaymentstatus/) | 1..1   | No        | The status of the payment.                                                                            |
| signingUrl         | String                                 | 0..1   | Yes       | If the bookPaymentStatus is SIGNING then this will contain the signing URL.                           |
| approvedAmount     | [positiveDecimal](/development/api-types/simple-types/)     | 1..1   | No        | The approved credit amount.                                                                           |
| customer           | [customer](/development/api-types/customer/)                   | 0..1   | Yes       | The address of the customer.                                                                          |

