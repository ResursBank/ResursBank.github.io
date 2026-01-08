---
layout: page
title: Test Data - Finland
permalink: /testing/test-data---finland/
parent: Testing
---


# Test Data - Finland 


> Phone number +3585005555127

### Persons
Persons to use when testing.

| Civic number | Address |   Merchant API  |
| --------: | :-------------------- | :--------------|
| 230580-7335  | Olavi Korhonen Nieminen<br>Kansakoulukatu 90<br>00100 Helsinki   |  [Get payment](https://merchant-api.resurs.com/docs/v2/merchant_payments_v2#/Payment%20information/getPayment) returns status ACCEPTED<br>Callback AUTHORIZATION will be sent with status AUTHORIZED |
| 220950-9256  | Juhani Korhonen Mäkelä<br>Kalevankatu 15<br>00100 Helsinki      |  [Get payment](https://merchant-api.resurs.com/docs/v2/merchant_payments_v2#/Payment%20information/getPayment) returns status REJECTED<br>Callback AUTHORIZATION will be sent with status REJECTED |
| 140584-4785  | Anneli Korhonen Korhonen<br>Kalevankatu 1<br>00100 Helsinki     |  [Get payment](https://merchant-api.resurs.com/docs/v2/merchant_payments_v2#/Payment%20information/getPayment) returns status FROZEN<br>Callback AUTHORIZATION will be sent with status FROZEN   |
| 020681-1008  | Johanna Virtanen Virtanen<br>Fredrikinkatu 7<br>00100 Helsinki |  [Get payment](https://merchant-api.resurs.com/docs/v2/merchant_payments_v2#/Payment%20information/getPayment) returns status FROZEN<br>After 5 seconds the payment is **unfrozen**<br>Callback AUTHORIZATION will be sent with status FROZEN then AUTHORIZED<br>Requires handleFrozenPayments is true   |
| 300881-051B  | Juhani Korhonen Nieminen<br>Kalevankatu 9<br>00100 Helsinki     | [Get payment](https://merchant-api.resurs.com/docs/v2/merchant_payments_v2#/Payment%20information/getPayment) returns status FROZEN<br>After 5 seconds the payment is **annulled**<br>Callback AUTHORIZATION will be sent with status FROZEN then REJECTED<br>Requires handleFrozenPayments is true |
| 100980-576X  | Maria Korhonen Korhonen<br>Kansakoulukatu 1<br>00100 Helsinki  | [Get payment](https://merchant-api.resurs.com/docs/v2/merchant_payments_v2#/Payment%20information/getPayment) returns status FROZEN<br>After 10 minutes the payment is **unfrozen**<br>Callback AUTHORIZATION will be sent with status FROZEN then AUTHORIZED<br>Requires handleFrozenPayments is true  |
| 230982-3064  | Helena Virtanen Mäkelä<br>Fredrikinkatu 10<br>33100 Tampere    | [Get payment](https://merchant-api.resurs.com/docs/v2/merchant_payments_v2#/Payment%20information/getPayment) returns status FROZEN<br>After 10 minutes the payment is **annulled**<br>Callback AUTHORIZATION will be sent with status FROZEN then REJECTED<br>Requires handleFrozenPayments is true  |
| 180650-344E  | Kaarina Virtanen Virtanen<br>Kalevankatu 7<br>00100 Helsinki    | [Get payment](https://merchant-api.resurs.com/docs/v2/merchant_payments_v2#/Payment%20information/getPayment) returns status REJECTED<br>Callback AUTHORIZATION will be sent with status REJECTED  |
| 150987-069L  | customer got no cards/accounts which allow **new card/account**    | [Get payment](https://merchant-api.resurs.com/docs/v2/merchant_payments_v2#/Payment%20information/getPayment) returns status ACCEPTED<br>Callback AUTHORIZATION will be sent with status AUTHORIZED   |

### Organisations

| Organisation number | SSN | Behavior  | Scenario  |
|---------------------|--------------|-------------------------------------------|--------------------------------------------------------------------------------------------------------------------|
| 5333901-6 | 080779-1213 | Organisation has no account. Credit applications are approved and the applicant can sign alone. | Approved standalone credit application where the applicant can sign alone |
| 5333901-6 | 080779-1213 | Organisation has no account. Credit applications are approved and the applicant can sign alone. | Approved credit application in combination with purchase  where the applicant can sign alone |
| 8878318-4 | 050578-2382 | Organisation has no account. Denied credit | Denied credit application |
| 1039562-4 | 050407A4603 | Organisation has an account. The contact person is allowed to purchase. | Purchase on existing account |
| 1039562-4 | 080503A0685 | Organisation has an account. The contact person is not allowed to purchase. | Not allowed to purchase on existing account. |


