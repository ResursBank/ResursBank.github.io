---
layout: page
title: Bookpaymentresult
permalink: /development/api-types/bookpaymentresult/
parent: Api Types
grand_parent: Development
---



# bookPaymentResult 
Created by Joachim Andersson, last modified by Benny on 2017-02-22

The response type when using [Simplified Basic Show Flow
Service](simplified-flow-api)**  
**

| Name               | Type                                   | Occurs | Nillable? | Description                                                                                           |
|--------------------|----------------------------------------|--------|-----------|-------------------------------------------------------------------------------------------------------|
| paymentId          | [id](simple-types...)                  | 1..1   | No        | The ID for the payment, same as preferredId if that is specified, else it is an auto generated value. |
| bookPaymentStatus  | [bookPaymentStatus](bookpaymentstatus) | 1..1   | No        | The status of the payment.                                                                            |
| signingUrl         | String                                 | 0..1   | Yes       | If the bookPaymentStatus is SIGNING then this will contain the signing URL.                           |
| approvedAmount     | [positiveDecimal](simple-types...)     | 1..1   | No        | The approved credit amount.                                                                           |
| customer           | [customer](customer)                   | 0..1   | Yes       | The address of the customer.                                                                          |

