---
layout: page
title: Test Data - Sweden
permalink: /testing/test-data---sweden/
parent: Testing
---

# Test Data - Sweden 

\[ [Persons](#testdatasweden-persons) \] \[
[Organisations](#testdatasweden-organisations) \] \[
[Cards](#testdatasweden-cards) \] \[ [Account](#testdatasweden-account)
\] \[ [Parameters when using Hosted
flow](#testdatasweden-parameterswhenusinghostedflow) \] \[ [Cards
Payment Providers](#testdatasweden-cardspaymentproviders) \]

> Phone number 0701-112233

### Persons
Persons to use when testing. 

> If you use waitForFraudControl=false the booking will get frozen
> automatically and you must register the
> callback automaticFraudControl to get informed when the booking is
> thawed.


| Civic number | Get address response|  [Simplified shop flow](/simplified-flow-api/)  | Merchant API | Exception  |
|--------:|:----------------|----------------------------------|-------------------------------------------|-----------------------------|
| 198305147715 | Vincent Williamsson Alexandersson<br>Glassgatan 15<br>41655 Göteborg | [bookPayment](/simplified-flow-api/bookpayment/) returns bookPaymentStatus=BOOKED or FINALIZED | [Get payment](https://merchant-api.resurs.com/docs/v2/merchant_payments_v2#/Payment%20information/getPayment) returns status ACCEPTED<br>Callback AUTHORIZATION will be sent with status AUTHORIZED<br>if callbacks are in use | Do not use this civic number when testing new- and existing card. |
| 197211072793 | Oliver Williamsson Alexandersson<br>Makadamg 5<br>25024 Helsingborg    | [bookPayment](/simplified-flow-api/bookpayment/) returns bookPaymentStatus=DENIED                                                                                       | [Get payment](https://merchant-api.resurs.com/docs/v2/merchant_payments_v2#/Payment%20information/getPayment) returns status REJECTED<br>Callback AUTHORIZATION will be sent with status REJECTED                                    |                                                                   |
| 198209123705 |  Julia Liamsson Liamsson<br>Makadamg 17<br>25024 Helsingborg      | [bookPayment](/simplified-flow-api/bookpayment/)  returns bookPaymentStatus=FROZEN<br>The payment will never be unfrozen.                                                   | [Get payment](https://merchant-api.resurs.com/docs/v2/merchant_payments_v2#/Payment%20information/getPayment) returns status FROZEN<br>Callback AUTHORIZATION will be sent with status FROZEN | Do not use this civic number when testing new- and existing card. |
| 198001010001 |  Stella Liamsson Eliassson<br>Makadamg 3<br>41655 Göteborg      | [bookPayment](/simplified-flow-api/bookpayment/)  returns bookPaymentStatus=FROZEN<br>After 5 seconds the payment is **unfrozen.**<br>Requires `waitForFraudControl=true`      | [Get payment](https://merchant-api.resurs.com/docs/v2/merchant_payments_v2#/Payment%20information/getPayment) returns status FROZEN<br>After 5 seconds the payment is **unfrozen**<br>Callback AUTHORIZATION will be sent with status FROZEN then AUTHORIZED<br>Requires handleFrozenPayments is true      | Do not use this civic number when testing new- and existing card. |
| 197801069241 |  Elsa Liamsson Alexandersson<br>Ekslingan 20<br>11521 Stockholm    | [bookPayment](/simplified-flow-api/bookpayment/)  returns bookPaymentStatus=FROZEN<br>After 5 seconds the payment is **annulled**                                          | [Get payment](https://merchant-api.resurs.com/docs/v2/merchant_payments_v2#/Payment%20information/getPayment) returns status FROZEN<br>After 5 seconds the payment is **annulled**<br>Callback AUTHORIZATION will be sent with status FROZEN then REJECTED<br>Requires handleFrozenPayments is true     | Do not use this civic number when testing new- and existing card. |
| Coming soon |  Elsa Williamsson Williamsson<br>Ekslingan 11<br>41655 Göteborg    | [bookPayment](/simplified-flow-api/bookpayment/) returns bookPaymentStatus=FROZEN<br>After 10 minutes the payment is **unfrozen**<br>Requires `waitForFraudControl=true`      | [Get payment](https://merchant-api.resurs.com/docs/v2/merchant_payments_v2#/Payment%20information/getPayment) returns status FROZEN<br>After 10 minutes the payment is **unfrozen**<br>Callback AUTHORIZATION will be sent with status FROZEN then AUTHORIZED<br>Requires handleFrozenPayments is true   | Do not use this civic number when testing new- and existing card. |
| 198909194451 |  Vincent Liamsson Williamsson<br>Glassgatan 12<br>11521 Stockholm   | [bookPayment](/simplified-flow-api/bookpayment/) returns bookPaymentStatus=FROZENAfter 10 minutes the payment is **annulled.**                                          | [Get payment](https://merchant-api.resurs.com/docs/v2/merchant_payments_v2#/Payment%20information/getPayment) returns status FROZEN<br>After 10 minutes the payment is **annulled**<br>Callback AUTHORIZATION will be sent with status FROZEN then REJECTED<br>Requires handleFrozenPayments is true   | Do not use this civic number when testing new- and existing card. |
| 195004269741 |  Stella Liamsson Williamsson<br>Makadamg 16<br>11521 Stockholm    | [bookPayment](/simplified-flow-api/bookpayment/) returns bookPaymentStatus=DENIED                                                                                       | [Get payment](https://merchant-api.resurs.com/docs/v2/merchant_payments_v2#/Payment%20information/getPayment) returns status REJECTED<br>Callback AUTHORIZATION will be sent with status REJECTED                                                                                    | Do not use this civic number when testing new- and existing card. |
| 198801082382 | Liam Liamsson Williamsson<br>Makadamg 6<br>21149 Malmö  | [bookPayment](/simplified-flow-api/bookpayment/) returns bookPaymentStatus=BOOKED or FINALIZED  |  [Get payment](https://merchant-api.resurs.com/docs/v2/merchant_payments_v2#/Payment%20information/getPayment) returns status ACCEPTED<br>Callback AUTHORIZATION will be sent with status AUTHORIZED   |   customer got no cards/accounts which allow **new account**      |

###  Organisations
Organisations to use when testing.

> The first two digits of the organization number are optional:
>   - for legal entity: 16 + the company's assigned organization number (10 digits)
>   - for a natural person: century digits 18, 19 or 20 + social security number (10 digits)

| Organisation number | Civic number |                   Get address                   | [Simplified shop flow](/simplified-flow-api/)                     | ~~Shop Flow~~ (deprecated)                             |
|---------------------|--------------|:-----------------------------------------------:|-----------------------------------------------------------------|---------------------------------------------------------------------------------------------------------------------|
| 166997368573        | 198305147715 | Pilsnerbolaget HB<br>Glassgatan 17<br>25024 Helsingborg |                                                                 |                                                                                                                     |
| 169468958195        | 198305147715 |      Grisfarmen<br>Makadamg 12<br>11521 Stockholm      | [bookPayment](/simplified-flow-api/bookpayment/) returns bookPaymentStatus=DENIED     | submitLimitApplication returns decision=DENIED  |
| 162177385255        | 198305147715 | Pilsnerbolaget HB<br>Glassgatan 5<br>25024 Helsingborg |  [bookPayment](/simplified-flow-api/bookpayment/)   returns bookPaymentStatus=DENIED  | submitLimitApplication returns decision=TRIAL   |
| 162830419400        | 198305147715 |       Grisfarmen<br>Makadamg 15<br>41655 Göteborg       |  [bookPayment](/simplified-flow-api/bookpayment/)  returns bookPaymentStatus=FROZEN   |                                                                                                                     |

## Cards
Card to use when testing.

| Test card numbers   | Government ID | Maximum limit / purchase |
|---------------------|---------------|-------------------------:|
| 9000 0000 0000 0000 | 194601136098  |                        0 |
| 9000 0000 0000 5000 | 194601136098  |                    5 000 |
| 9000 0000 0001 0000 | 194601136098  |                   10 000 |
| 9000 0000 0001 5000 | 194601136098  |                   15 000 |
| 9000 0000 0002 0000 | 194601136098  |                   20 000 |
| 9000 0000 0002 5000 | 194601136098  |                   25 000 |
| 9000 0000 0005 0000 | 194601136098  |                   50 000 |

#### To test VISA/Mastercard please see [https://developers.nets.eu/netaxept/en-EU/docs/test-environment/#build-test-cards](https://developers.nets.eu/netaxept/en-EU/docs/test-environment/#build-test-cards)

### Account
Account, with the option set in the payment method to use only
government ID: If agreed upon with Resurs Bank, the merchant can let the
customer use an existing account without entering an account number, the
government ID will fetch the account number and signing is mandatory in
this case.

#### Parameters when using Hosted flow
The flag `allowCardPaymentWithoutCardNumber` set to `true `will only
display the input field for government ID.  
`allowCardPaymentWithoutCardNumber` set to `false` will display both the
government ID and card number fields and the customer must enter a card
number.

| Government IDAccount  | Account number     | Result                                                                    |
|-----------------------|--------------------|---------------------------------------------------------------------------|
|  6706222616           |  9578405010835835  | [bookPayment](/simplified-flow-api/bookpayment/)  returns bookPaymentStatus=BOOKED or FINALIZED |
| 6611096337            | 9578105010831111   | [bookPayment](/simplified-flow-api/bookpayment/) returns bookPaymentStatus=DENIED               |

### Cards Payment Providers
[For NETS, see this page.](https://developers.nets.eu/netaxept/en-EU/docs/test-environment/)

| Card number         | Expire date  | CVC          | Result                |
|---------------------|--------------|--------------|-----------------------|
| 4925 0000 0000 0004 | \> today     | Any 3 digits | Success               |
| 4925 0000 0000 0087 | \> today     | Any 3 digits | Reservation will fail |
|                     |              |              |                       |

