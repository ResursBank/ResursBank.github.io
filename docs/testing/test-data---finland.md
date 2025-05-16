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

| Civic number | Address |  [Simplified shop flow](/simplified-flow-api/)  | Merchant API  |
| --------: | :-------------------- | :-------------------------|:--------------|
| 230580-7335  | Olavi Korhonen Nieminen<br>Kansakoulukatu 90<br>0100 Helsinki   | [bookPayment](/simplified-flow-api/bookpayment/)   returns bookPaymentStatus=BOOKED or FINALIZED  | [Get payment](https://merchant-api.resurs.com/docs/v2/merchant_payments_v2#/Payment%20information/getPayment) returns status ACCEPTED<br>Callback AUTHORIZATION will be sent with status AUTHORIZED |
| 220950-9256  | Juhani Korhonen Mäkelä<br>Kalevankatu 15<br>00100 Helsinki      | [bookPayment](/simplified-flow-api/bookpayment/) returns bookPaymentStatus=DENIED   | [Get payment](https://merchant-api.resurs.com/docs/v2/merchant_payments_v2#/Payment%20information/getPayment) returns status REJECTED<br>Callback AUTHORIZATION will be sent with status REJECTED |
| 140584-4785  | Anneli Korhonen Korhonen<br>Kalevankatu 1<br>00100 Helsinki     | [bookPayment](/simplified-flow-api/bookpayment/)  returns bookPaymentStatus=FROZEN  | [Get payment](https://merchant-api.resurs.com/docs/v2/merchant_payments_v2#/Payment%20information/getPayment) returns status FROZEN<br>Callback AUTHORIZATION will be sent with status FROZEN   |
| 020681-1008  | Johanna Virtanen Virtanen<br>Fredrikinkatu 7<br>00100 Helsinki | [bookPayment](/simplified-flow-api/bookpayment/) returns bookPaymentStatus=FROZEN<br>After 5 seconds the payment is **unfrozen**<br>Requires `waitForFraudControl=true`    | [Get payment](https://merchant-api.resurs.com/docs/v2/merchant_payments_v2#/Payment%20information/getPayment) returns status FROZEN<br>After 5 seconds the payment is **unfrozen**<br>Callback AUTHORIZATION will be sent with status FROZEN then AUTHORIZED<br>Requires handleFrozenPayments is true   |
| 300881-051B  | Juhani Korhonen Nieminen<br>Kalevankatu 9<br>00100 Helsinki     | [bookPayment](/simplified-flow-api/bookpayment/) returns bookPaymentStatus=FROZEN<br>After 5 seconds the payment is **annulled**   | [Get payment](https://merchant-api.resurs.com/docs/v2/merchant_payments_v2#/Payment%20information/getPayment) returns status FROZEN<br>After 5 seconds the payment is **annulled**<br>Callback AUTHORIZATION will be sent with status FROZEN then REJECTED<br>Requires handleFrozenPayments is true |
| 100980-576X  | Maria Korhonen Korhonen<br>Kansakoulukatu 1<br>00100 Helsinki  | [bookPayment](/simplified-flow-api/bookpayment/) returns bookPaymentStatus=FROZEN<br>After 10 minutes the payment is **unfrozen**<br>Requires `waitForFraudControl=true`     | [Get payment](https://merchant-api.resurs.com/docs/v2/merchant_payments_v2#/Payment%20information/getPayment) returns status FROZEN<br>After 10 minutes the payment is **unfrozen**<br>Callback AUTHORIZATION will be sent with status FROZEN then AUTHORIZED<br>Requires handleFrozenPayments is true  |
| 230982-3064  | Helena Virtanen Mäkelä<br>Fredrikinkatu 10<br>33100 Tampere    | [bookPayment](/simplified-flow-api/bookpayment/) returns bookPaymentStatus=FROZEN<br>After 10 minutes the payment is **annulled**  | [Get payment](https://merchant-api.resurs.com/docs/v2/merchant_payments_v2#/Payment%20information/getPayment) returns status FROZEN<br>After 10 minutes the payment is **annulled**<br>Callback AUTHORIZATION will be sent with status FROZEN then REJECTED<br>Requires handleFrozenPayments is true  |
| 180650-344E  | Kaarina Virtanen Virtanen<br>Kalevankatu 7<br>00100 Helsinki    | [bookPayment](/simplified-flow-api/bookpayment/) returns bookPaymentStatus=DENIED   | [Get payment](https://merchant-api.resurs.com/docs/v2/merchant_payments_v2#/Payment%20information/getPayment) returns status REJECTED<br>Callback AUTHORIZATION will be sent with status REJECTED  |
| 150987-069L  |                                                         | customer got no cards/accounts which allow **new card/account**    | [Get payment](https://merchant-api.resurs.com/docs/v2/merchant_payments_v2#/Payment%20information/getPayment) returns status ACCEPTED<br>Callback AUTHORIZATION will be sent with status AUTHORIZED   |

### Organisations
No payment methods for Finish orgainsations exist today. Contact your
Resurs Bank sales representative if you want to support Finish
organisations.

| Organisation number | Civic number | Get address                               | ~~[Shop Flow](https://test.resurs.com/docs/display/DD/Shop+Flow+Service)~~                                             | [Simplified shop flow](simplified-flow-api)                 |
|---------------------|--------------|-------------------------------------------|--------------------------------------------------------------------------------------------------------------------|-------------------------------------------------------------|
| 6014969-1           | 230580-7335  | Sika MaatilaFredrikinkatu 300100 Helsinki |                                                                                                                    |                                                             |
| 4967996-6           | 230580-7335  | OlutpanimoKansakoulukatu 900100 Helsinki  | submitLimitApplication returns decision=DENIED | [bookPayment](/simplified-flow-api/bookpayment/) returns bookPaymentStatus=DENIED |
| 1105814-4           | 230580-7335  | OlutpanimoKansakoulukatu 500100 Helsinki  | submitLimitApplication returns decision=TRIAL  | [bookPayment](/simplified-flow-api/bookpayment/) returns bookPaymentStatus=DENIED |

| Organisation number | SSN | Behavior  | Scenario  |
|---------------------|--------------|-------------------------------------------|--------------------------------------------------------------------------------------------------------------------|
| 5333901-6 | 080779-1213 | Organisation has no account. Credit applications are approved and the applicant can sign alone. | Approved standalone credit application where the applicant can sign alone |
| 5333901-6 | 080779-1213 | Organisation has no account. Credit applications are approved and the applicant can sign alone. | Approved credit application in combination with purchase  where the applicant can sign alone |
| 8878318-4 | 050578-2382 | Organisation has no account. Denied credit | Denied credit application |
| 1039562-4 | 050407A4603 | Organisation has an account. The contact person is allowed to purchase. | Purchase on existing account |
| 1039562-4 | 080503A0685 | Organisation has an account. The contact person is not allowed to purchase. | Not allowed to purchase on existing account. |


### Cards
Card to use when testing.

Maximum limit / purchase is € 5000.

| Test card numbers   | Government ID   |    € |
|---------------------|-----------------|-----:|
| 9000 0000 0000 0000 | 100370-897V     |    0 |
| 9000 0000 0000 0500 |  100370-897V    |  500 |
| 9000 0000 0000 1000 | 100370-897V     | 1000 |
| 9000 0000 0000 1500 | 100370-897V     | 1500 |
| 9000 0000 0000 2000 | 100370-897V     | 2000 |
| 9000 0000 0000 2500 | 100370-897V     | 2500 |
| 9000 0000 0000 5000 | 100370-897V     | 5000 |

#### To test VISA/Mastercard please see :[https://shop.nets.eu/web/partners/test-cards](https://shop.nets.eu/web/partners/test-cards)

### Account
Account, with the option set in the payment method to use only
government ID: If agreed upon with Resurs Bank, the merchant can let the
customer use an existing account without entering an account number, the
government ID will fetch the account number and signing is mandatory in
this case.

#### Parameters when using Hosted flow
The flag `allowCardPaymentWithoutCardNumber` set to `true `will only
display the input field for government ID.  
`allowCardPaymentWithoutCardNumber` set to `false` will display both the
government ID and account number fields and the customer must enter a
account number.

| Government IDAccount  | Account number     | Result                                                                    |
|-----------------------|--------------------|---------------------------------------------------------------------------|
|  260781-3930          |  9578105010835835  | [bookPayment](simplified-flow-api/bookpayment/)  returns bookPaymentStatus=BOOKED or FINALIZED |
| 140863-121M           | 9578105010831111   | [bookPayment](simplified-flow-api/bookpayment/) returns bookPaymentStatus=DENIED               |

