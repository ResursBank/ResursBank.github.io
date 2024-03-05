---
layout: page
title: Test Data - Sweden
permalink: /testing/test-data---sweden/
parent: Testing
---


# Test Data - Sweden 
Created by Joachim Andersson, last modified by Sara Wintherfrid
Josefsson on 2024-01-15
**Quick find**
\[ [Persons](#TestDataSweden-Persons) \] \[
[Organisations](#TestDataSweden-Organisations) \] \[
[Cards](#TestDataSweden-Cards) \] \[ [Account](#TestDataSweden-Account)
\] \[ [Parameters when using Hosted
flow](#TestDataSweden-ParameterswhenusingHostedflow) \] \[ [Cards
Payment Providers](#TestDataSweden-CardsPaymentProviders) \]
  
| Phone number | 0701-112233 |
|--------------|-------------|
  
### Persons
Persons to use when testing. 
If you use `waitForFraudControl=false` the booking will get frozen
automatically and you must register the
callback `automaticFraudControl `to get informed when the booking is
thawed.
  
| Birthday       | Gender | Civic number |                     Get address response                     |  [Simplified shop flow](Simplified-Flow-API_1476359.html)                                                                                                      | Merchant API                                                                                                                                                                                                              | Exception                                                         |
|----------------|--------|--------------|:------------------------------------------------------------:|----------------------------------------------------------------------------------------------------------------------------------------------------------------|---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|-------------------------------------------------------------------|
| 1983-05-14     | M      | 198305147715 | Vincent Williamsson AlexanderssonGlassgatan 1541655 Göteborg | [bookPayment](bookPayment_1476362.html) returns bookPaymentStatus=BOOKED or FINALIZED                                                                          | [Get payment](https://merchant-api.resurs.com/docs/v2/merchant_payments_v2#/Payment%20information/getPayment) returns status = ACCEPTEDCallback AUTHORIZED is received if callbacks are in use                            | Do not use this civic number when testing new- and existing card. |
| 1950-12-02     | M      | 195012026430 |   Oliver Liamsson WilliamssonMakadamg 1 25024 Helsingborg    | [bookPayment](bookPayment_1476362.html) returns bookPaymentStatus=DENIED                                                                                       | [Get payment](https://merchant-api.resurs.com/docs/v2/merchant_payments_v2#/Payment%20information/getPayment) returns status =Callback REJECTED is received if callbacks are in use                                       |                                                                   |
| 1982-09-12     | F      | 198209123705 |     Julia Liamsson LiamssonMakadamg 1725024 Helsingborg      | [bookPayment](bookPayment_1476362.html)  returns bookPaymentStatus=FROZENThe payment will never be unfrozen.                                                   | [Get payment](https://merchant-api.resurs.com/docs/v2/merchant_payments_v2#/Payment%20information/getPayment) returns status = FROZEN                                                                                     | Do not use this civic number when testing new- and existing card. |
| 1980-01-01     | F      | 198001010001 |      Stella Liamsson EliasssonMakadamg 3 41655 Göteborg      | [bookPayment](bookPayment_1476362.html)  returns bookPaymentStatus=FROZENAfter 5 seconds the payment is **unfrozen.** Requires `waitForFraudControl=true`      | [Get payment](https://merchant-api.resurs.com/docs/v2/merchant_payments_v2#/Payment%20information/getPayment) returns status = FROZENAfter 5 seconds the payment is **unfrozen**.Requires handleFrozenPayments= true      | Do not use this civic number when testing new- and existing card. |
| 1978-01-06     | F      | 197801069241 |    Elsa Liamsson AlexanderssonEkslingan 2011521 Stockholm    | [bookPayment](bookPayment_1476362.html)  returns bookPaymentStatus=FROZENAfter 5 seconds the payment is **annulled.**                                          | [Create payment](https://merchant-api.resurs.com/docs/v2/merchant_payments_v2#/Payment%20authorization/createPayment) returns status =After 5 seconds the payment is **annulled.**Requires handleFrozenPayments= true     | Do not use this civic number when testing new- and existing card. |
| 1981-01-01     | F      | Coming soon  |   Elsa Williamsson WilliamssonEkslingan 11 41655 Göteborg    | [bookPayment](bookPayment_1476362.html) returns bookPaymentStatus=FROZENAfter 10 minutes the payment is **unfrozen.** Requires `waitForFraudControl=true`      | [Create payment](https://merchant-api.resurs.com/docs/v2/merchant_payments_v2#/Payment%20authorization/createPayment) returns status = After 10 minutes the payment is **unfrozen.**Requires handleFrozenPayments= true   | Do not use this civic number when testing new- and existing card. |
| 1989-09-19     | M      | 198909194451 |   Vincent Liamsson WilliamssonGlassgatan 1211521 Stockholm   | [bookPayment](bookPayment_1476362.html) returns bookPaymentStatus=FROZENAfter 10 minutes the payment is **annulled.**                                          | [Create payment](https://merchant-api.resurs.com/docs/v2/merchant_payments_v2#/Payment%20authorization/createPayment) returns status = After 10 minutes the payment is **annulled.**Requires handleFrozenPayments= true   | Do not use this civic number when testing new- and existing card. |
| 1950-04-26     | F      | 195004269741 |    Stella Liamsson WilliamssonMakadamg 16 11521 Stockholm    | [bookPayment](bookPayment_1476362.html) returns bookPaymentStatus=DENIED                                                                                       | [Create payment](https://merchant-api.resurs.com/docs/v2/merchant_payments_v2#/Payment%20authorization/createPayment) returns status =                                                                                    | Do not use this civic number when testing new- and existing card. |
| 1988-03-08     | M      | 198801082382 |        Liam Liamsson WilliamssonMakadamg 621149 Malmö        | customer got no cards/accounts which allow **new card/account**                                                                                                | customer got no cards/accounts which allow **new account**                                                                                                                                                                |                                                                   |
  
###  Organisations
Organisations to use when testing.
  
| Organisation number | Gender | Civic number |                   Get address                   | [Simplified shop flow](Simplified-Flow-API_1476359.html)                     | ~~[Shop Flow](https://test.resurs.com/docs/display/DD/Shop+Flow+Service)~~ (deprecated)                             |
|---------------------|--------|--------------|:-----------------------------------------------:|------------------------------------------------------------------------------|---------------------------------------------------------------------------------------------------------------------|
| 166997368573        | M      | 198305147715 | Pilsnerbolaget HBGlassgatan 1725024 Helsingborg |                                                                              |                                                                                                                     |
| 169468958195        | M      | 198305147715 |      Grisfarmen Makadamg 1211521 Stockholm      | [bookPayment](bookPayment_1476362.html) returns bookPaymentStatus=DENIED     | [submitLimitApplication](https://test.resurs.com/docs/display/DD/Submit+Limit+Application) returns decision=DENIED  |
| 162177385255        | M      | 198305147715 | Pilsnerbolaget HB Glassgatan 525024 Helsingborg |  [bookPayment](bookPayment_1476362.html)   returns bookPaymentStatus=DENIED  | [submitLimitApplication](https://test.resurs.com/docs/display/DD/Submit+Limit+Application) returns decision=TRIAL   |
| 162830419400        | M      | 198305147715 |       GrisfarmenMakadamg 1541655 Göteborg       |  [bookPayment](bookPayment_1476362.html)  returns bookPaymentStatus=FROZEN   |                                                                                                                     |
  
  
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
  
**To test VISA/Mastercard ** please see
[https://developers.nets.eu/netaxept/en-EU/docs/test-environment/#build-test-cards](https://developers.nets.eu/netaxept/en-EU/docs/test-environment/#build-test-cards)
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
  
  
| Government IDAccount  | Account number     | Result                                                                                 |
|-----------------------|--------------------|----------------------------------------------------------------------------------------|
|  6706222616           |  9578405010835835  | [bookPayment](bookPayment_1476362.html)  returns bookPaymentStatus=BOOKED or FINALIZED |
| 6611096337            | 9578105010831111   | [bookPayment](bookPayment_1476362.html) returns bookPaymentStatus=DENIED               |
  
## **Cards Payment Providers**
[For NETS, see this
page.](https://developers.nets.eu/netaxept/en-EU/docs/test-environment/)
  
| Card number         | Expire date  | CVC          | Result                |
|---------------------|--------------|--------------|-----------------------|
| 4925 0000 0000 0004 | \> today     | Any 3 digits | Success               |
| 4925 0000 0000 0087 | \> today     | Any 3 digits | Reservation will fail |
|                     |              |              |                       |
  
