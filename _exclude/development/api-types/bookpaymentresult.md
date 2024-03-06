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
Service](Simplified-Flow-API_1476359.html)**  
**
  
| Name               | Type                                                | Occurs | Nillable? | Description                                                                                           |
|--------------------|-----------------------------------------------------|--------|-----------|-------------------------------------------------------------------------------------------------------|
| paymentId          | [id](Simple-Types..._1475653.html)                  | 1..1   | No        | The ID for the payment, same as preferredId if that is specified, else it is an auto generated value. |
| bookPaymentStatus  | [bookPaymentStatus](bookPaymentStatus_1476387.html) | 1..1   | No        | The status of the payment.                                                                            |
| signingUrl         | String                                              | 0..1   | Yes       | If the bookPaymentStatus is SIGNING then this will contain the signing URL.                           |
| approvedAmount     | [positiveDecimal](Simple-Types..._1475653.html)     | 1..1   | No        | The approved credit amount.                                                                           |
| customer           | [customer](customer_1475725.html)                   | 0..1   | Yes       | The address of the customer.                                                                          |
  
