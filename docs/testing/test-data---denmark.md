---
layout: page
title: Test Data - Denmark
permalink: /testing/test-data---denmark/
parent: Testing
---


# Test Data - Denmark 

> Phone number +4525557585

### Persons
Persons to use when testing.

| Civic number | Address |  Merchant API  |
|------------:|:--------|:-------------------------------|
| 140285-3877  | Gorm Anker Bøgh<br>Strøget 15<br>3100 Hornbæk | [Get payment](https://merchant-api.resurs.com/docs/v2/merchant_payments_v2#/Payment%20information/getPayment) returns status ACCEPTED<br>Callback AUTHORIZATION will be sent with status AUTHORIZED  |
| 021250-0003  | Kaj Anker Anker<br>Frederiksberggade 1<br>1620 København | [Get payment](https://merchant-api.resurs.com/docs/v2/merchant_payments_v2#/Payment%20information/getPayment) returns status REJECTED<br>Callback AUTHORIZATION will be sent with status REJECTED |
| 060580-3736  | Kristen Bager Anker<br>Frederiksberggade 16<br>1620 København |[Get payment](https://merchant-api.resurs.com/docs/v2/merchant_payments_v2#/Payment%20information/getPayment) returns status FROZEN<br>Callback AUTHORIZATION will be sent with status FROZEN |
| 140481-9652  | Grethe Anker Anker<br>Østergade 16<br>1620 København | [Get payment](https://merchant-api.resurs.com/docs/v2/merchant_payments_v2#/Payment%20information/getPayment) returns status FROZEN<br>After 5 seconds the payment is **unfrozen**<br>Callback AUTHORIZATION will be sent with status FROZEN then AUTHORIZED<br>Requires handleFrozenPayments is true  |
| 100677-2605  | Preben Bager Anker<br>Frederiksberggade 16<br>1620 København |  [Get payment](https://merchant-api.resurs.com/docs/v2/merchant_payments_v2#/Payment%20information/getPayment) returns status FROZEN<br>After 5 seconds the payment is **annulled**<br>Callback AUTHORIZATION will be sent with status FROZEN then REJECTED<br>Requires handleFrozenPayments is true |
| 011183-1432  | Vibeke Anker Anker<br>Strøget 16<br>1620 København |  [Get payment](https://merchant-api.resurs.com/docs/v2/merchant_payments_v2#/Payment%20information/getPayment) returns status FROZEN<br>After 10 minutes the payment is **unfrozen**<br>Callback AUTHORIZATION will be sent with status FROZEN then AUTHORIZED<br>Requires handleFrozenPayments is true |
| 240384-4340  | Vibeke Anker Anker<br>Strøget 2<br>3000 Helsingør | [Get payment](https://merchant-api.resurs.com/docs/v2/merchant_payments_v2#/Payment%20information/getPayment) returns status FROZEN<br>After 10 minutes the payment is **annulled**<br>Callback AUTHORIZATION will be sent with status FROZEN then REJECTED<br>Requires handleFrozenPayments is true |
| 290550-1913  | Preben Anker Dunker<br>Strøget 9<br>3250 Gilleleje |  [Get payment](https://merchant-api.resurs.com/docs/v2/merchant_payments_v2#/Payment%20information/getPayment) returns status REJECTED<br>Callback AUTHORIZATION will be sent with status REJECTED  |
| 2304881898   |  customer got no cards/accounts which allow **new card/account**                                                                                                               | [Get payment](https://merchant-api.resurs.com/docs/v2/merchant_payments_v2#/Payment%20information/getPayment) returns status ACCEPTED<br>Callback AUTHORIZATION will be sent with status AUTHORIZED  |


