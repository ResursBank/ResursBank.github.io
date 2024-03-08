---
layout: page
title: Bookpaymentstatus
permalink: /development/api-types/bookpaymentstatus/
parent: Api Types
grand_parent: Development
---



# bookPaymentStatus 
Created by Joachim Andersson, last modified by Benny on 2017-02-22
The different status that can be returned when using the [Simplified
Flow API](simplified-flow-api)

| Status Code | Description                                                                                                                                            |
|-------------|--------------------------------------------------------------------------------------------------------------------------------------------------------|
| FINALIZED   | The payment is finalized.                                                                                                                              |
| BOOKED      | The payment is booked and you will have to finalize it on your own. To finalize booked payments automatically you could set a flag in the bookPayment. |
| FROZEN      | The payment is currently frozen. This typically means that there is something that needs further investigation before the payment can be finalized.    |
| SIGNING     | The payment requires signing.                                                                                                                          |
| DENIED      | The payment is denied.                                                                                                                                 |

