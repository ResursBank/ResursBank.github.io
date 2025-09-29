---
layout: page
title: Test Data - Sweden
permalink: /testing/test-data---sweden/
parent: Testing
---

# Test Data - Sweden 

> Phone number 0701-112233

### Persons
Persons to use when testing. 

> If you use waitForFraudControl=false the booking will get frozen
> automatically and you must register the
> callback automaticFraudControl to get informed when the booking is
> thawed.


| Civic number | Get address response|  Merchant API | Note  |
|--------:|:----------------|----------------------------------|-----------------------------|
| 198305147715 | Vincent Williamsson Alexandersson<br>Glassgatan 15<br>41655 Göteborg | [Get payment](https://merchant-api.resurs.com/docs/v2/merchant_payments_v2#/Payment%20information/getPayment) returns status ACCEPTED<br>Callback AUTHORIZATION will be sent with status AUTHORIZED<br>if callbacks are in use |  |
| 197211072793 | Oliver Williamsson Alexandersson<br>Makadamg 5<br>25024 Helsingborg    |  [Get payment](https://merchant-api.resurs.com/docs/v2/merchant_payments_v2#/Payment%20information/getPayment) returns status REJECTED<br>Callback AUTHORIZATION will be sent with status REJECTED                                    |                                                                   |
| 198209123705 |  Julia Liamsson Liamsson<br>Makadamg 17<br>25024 Helsingborg      |  [Get payment](https://merchant-api.resurs.com/docs/v2/merchant_payments_v2#/Payment%20information/getPayment) returns status FROZEN<br>Callback AUTHORIZATION will be sent with status FROZEN |  |
| 198001010001 |  Stella Liamsson Eliassson<br>Makadamg 3<br>41655 Göteborg      | [Get payment](https://merchant-api.resurs.com/docs/v2/merchant_payments_v2#/Payment%20information/getPayment) returns status FROZEN<br>After 5 seconds the payment is **unfrozen**<br>Callback AUTHORIZATION will be sent with status FROZEN then AUTHORIZED<br>Requires handleFrozenPayments is true      |  |
| 197801069241 |  Elsa Liamsson Alexandersson<br>Ekslingan 20<br>11521 Stockholm    | [Get payment](https://merchant-api.resurs.com/docs/v2/merchant_payments_v2#/Payment%20information/getPayment) returns status FROZEN<br>After 5 seconds the payment is **annulled**<br>Callback AUTHORIZATION will be sent with status FROZEN then REJECTED<br>Requires handleFrozenPayments is true     | |
| 199401012381 |  Ebba Liamsson Williamsson<br>Glassgatan 11<br>41655 Göteborg    | [Get payment](https://merchant-api.resurs.com/docs/v2/merchant_payments_v2#/Payment%20information/getPayment) returns status FROZEN<br>After 10 minutes the payment is **unfrozen**<br>Callback AUTHORIZATION will be sent with status FROZEN then AUTHORIZED<br>Requires handleFrozenPayments is true   | |
| 198909194451 |  Vincent Liamsson Williamsson<br>Glassgatan 12<br>11521 Stockholm   | [Get payment](https://merchant-api.resurs.com/docs/v2/merchant_payments_v2#/Payment%20information/getPayment) returns status FROZEN<br>After 10 minutes the payment is **annulled**<br>Callback AUTHORIZATION will be sent with status FROZEN then REJECTED<br>Requires handleFrozenPayments is true   |  |
| 195004269741 |  Stella Liamsson Williamsson<br>Makadamg 16<br>11521 Stockholm    | [Get payment](https://merchant-api.resurs.com/docs/v2/merchant_payments_v2#/Payment%20information/getPayment) returns status REJECTED<br>Callback AUTHORIZATION will be sent with status REJECTED                                                                                    |  |
| 198801082382 | Olivia Williamsson Alexandersson<br>Ekslingan 10<br>21149 Malmö  |  [Get payment](https://merchant-api.resurs.com/docs/v2/merchant_payments_v2#/Payment%20information/getPayment) returns status ACCEPTED<br>Callback AUTHORIZATION will be sent with status AUTHORIZED   |   customer got no cards/accounts which allow **new account**      |

###  Organisations
Organisations to use when testing.

> The first two digits of the organization number are optional:
>   - for legal entity: 16 + the company's assigned organization number (10 digits)
>   - for a natural person: century digits 18, 19 or 20 + social security number (10 digits)

| Organisation number | Civic number |                   Get address                   | [Simplified shop flow](/simplified-flow-api/)                     | 
|---------------------|--------------|:-----------------------------------------------:|-----------------------------------------------------------------|
| 166997368573        | 198305147715 | Pilsnerbolaget HB<br>Glassgatan 17<br>25024 Helsingborg |                                                                 |                                                                                                                     |
| 169468958195        | 198305147715 |      Grisfarmen<br>Makadamg 12<br>11521 Stockholm      | [bookPayment](/simplified-flow-api/bookpayment/) returns bookPaymentStatus=DENIED     | 
| 162177385255        | 198305147715 | Pilsnerbolaget HB<br>Glassgatan 5<br>25024 Helsingborg |  [bookPayment](/simplified-flow-api/bookpayment/)   returns bookPaymentStatus=DENIED  | 
| 162830419400        | 198305147715 |       Grisfarmen<br>Makadamg 15<br>41655 Göteborg       |  [bookPayment](/simplified-flow-api/bookpayment/)  returns bookPaymentStatus=FROZEN   |  


### Cards Payment Providers
[For NETS, see this page.](https://developers.nets.eu/netaxept/en-EU/docs/test-environment/)

| Card number         | Expire date  | CVC          | Result                |
|---------------------|--------------|--------------|-----------------------|
| 4925 0000 0000 0004 | \> today     | Any 3 digits | Success               |
| 4925 0000 0000 0087 | \> today     | Any 3 digits | Reservation will fail |
|                     |              |              |                       |

