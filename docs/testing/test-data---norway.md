---
layout: page
title: Test Data - Norway
permalink: /testing/test-data---norway/
parent: Testing
has_children: true
---



# Test Data - Norway 

> Phone number 49999999

> All phone numbers are intended for test of functionality between the
> merchant and Resurs, not for tests between the merchant and end
> customer point. At creation time they are tested not to be real but at
> any time, without notice, they might be picked up for use by tele
> companies. If they then are used for tests, real people might get
> notifications, depending on use. The numbers have no logical
> functionality at Resurs other than to fetch an address, so if you want
> to test towards end customer point you can use your own private
> numbers.

### Persons
Persons to use when testing.

| Civic number | Merchant API  |
| ------------:| :-----------------|
| 180872-48794 | [Get payment](https://merchant-api.resurs.com/docs/v2/merchant_payments_v2#/Payment%20information/getPayment) returns status ACCEPTED<br>Callback AUTHORIZATION will be sent with status AUTHORIZED  |
| 010249-24986 | [Get payment](https://merchant-api.resurs.com/docs/v2/merchant_payments_v2#/Payment%20information/getPayment) returns status REJECTED<br>Callback AUTHORIZATION will be sent with status REJECTED |
| 020849-29428 |  [Get payment](https://merchant-api.resurs.com/docs/v2/merchant_payments_v2#/Payment%20information/getPayment) returns status FROZEN<br>Callback AUTHORIZATION will be sent with status FROZEN |
| 230682-01608 | [Get payment](https://merchant-api.resurs.com/docs/v2/merchant_payments_v2#/Payment%20information/getPayment) returns status FROZEN<br>After 5 seconds the payment is **unfrozen**<br>Callback AUTHORIZATION will be sent with status FROZEN then AUTHORIZED<br>Requires handleFrozenPayments is true |
| 050178-18440 | [Get payment](https://merchant-api.resurs.com/docs/v2/merchant_payments_v2#/Payment%20information/getPayment) returns status FROZEN<br>After 5 seconds the payment is **annulled**<br>Callback AUTHORIZATION will be sent with status FROZEN then REJECTED<br>Requires handleFrozenPayments is true |
| 010782-12868 | [Get payment](https://merchant-api.resurs.com/docs/v2/merchant_payments_v2#/Payment%20information/getPayment) returns status FROZEN<br>After 10 minutes the payment is **unfrozen**<br>Callback AUTHORIZATION will be sent with status FROZEN then AUTHORIZED<br>Requires handleFrozenPayments is true |
| 030477-05311 | [Get payment](https://merchant-api.resurs.com/docs/v2/merchant_payments_v2#/Payment%20information/getPayment) returns status FROZEN<br>After 10 minutes the payment is **annulled**<br>Callback AUTHORIZATION will be sent with status FROZEN then REJECTED<br>Requires handleFrozenPayments is true |
| 260249-14002 | [Get payment](https://merchant-api.resurs.com/docs/v2/merchant_payments_v2#/Payment%20information/getPayment) returns status REJECTED<br>Callback AUTHORIZATION will be sent with status REJECTED |
| 270288-09552 | customer got no cards/accounts which allow **new card/account** | [Get payment](https://merchant-api.resurs.com/docs/v2/merchant_payments_v2#/Payment%20information/getPayment) returns status ACCEPTED<br>Callback AUTHORIZATION will be sent with status AUTHORIZED |

### Organisations
No payment methods for Norwegian orgainsations exist today. Contact your
Resurs Bank sales representative if you want to support Norwegian
organisations.

| Organisation number | Gender | Civic number | [Simplified shop flow](simplified-flow-api)  |
|-------------------|--------|--------------|------------------------------------------------|
| 892831270         | M      | 180872-48794 |  | 
| 996030962         | M      | 180872-48794 | [bookPayment](/simplified-flow-api/bookpayment/) returns bookPaymentStatus=DENIED |
| 950576839         | M      | 180872-48794 | [bookPayment](/simplified-flow-api/bookpayment/) returns bookPaymentStatus=DENIED |

### Cards
**To test VISA/Mastercard ** please see:
[https://shop.nets.eu/web/partners/test-cards](https://shop.nets.eu/web/partners/test-cards)

### Vipps
To test Vipps, please follow the steps on the below link. When completed, you can create a new Vipps-payment via Resurs and complete the purchase in your installed Vipps Test-app: [App installation Vipps MobilePay ](https://developer.vippsmobilepay.com/docs/knowledge-base/test-environment/#test-apps)

> When installing the Vipps Test-app use:
> **Social security number:** 48076734537;
> **Phone number:** +47 93089608


