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

| Birthday   | Gender | Civic number | Address                                                 |   [Simplified shop flow](simplified-flow-api)                                                                                                    | ~~[Shop flow](https://test.resurs.com/docs/display/DD/Shop+Flow+Service)~~ (deprecated)                                                                                                                                     |
|------------|--------|--------------|---------------------------------------------------------|--------------------------------------------------------------------------------------------------------------------------------------------------|-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| 1980-05-23 | M      | 230580-7335  | Olavi Korhonen NieminenKansakoulukatu 900100 Helsinki   | [bookPayment](/simplified-flow-api/bookpayment/)   returns bookPaymentStatus=BOOKED or FINALIZED                                                                       | submitLimitApplication returns decision=GRANTED bookPayment returns fraudControlStatus=NOT_FROZEN |
| 1950-12-02 | M      | 220950-9256  | Juhani Korhonen MäkeläKalevankatu 1500100 Helsinki      | [bookPayment](/simplified-flow-api/bookpayment/) returns bookPaymentStatus=DENIED                                                                                      | submitLimitApplication returns decision=TRIAL                                                                                                           |
| 1984-05-14 | F      | 140584-4785  | Anneli Korhonen KorhonenKalevankatu 100100 Helsinki     | [bookPayment](/simplified-flow-api/bookpayment/)  returns bookPaymentStatus=FROZEN                                                                                     | bookPayment returns fraudControlStatus=FROZEN                                                                                                                       |
| 1981-06-02 | F      | 020681-1008  | Johanna Virtanen Virtanen Fredrikinkatu 700100 Helsinki | [bookPayment](/simplified-flow-api/bookpayment/) returns bookPaymentStatus=FROZENAfter 5 seconds the payment is **unfrozen*.*** Requires `waitForFraudControl=true`    | bookPayment returns bookPaymentStatus=FROZEN After 5 seconds the payment is **unfrozen*.*** Requires `waitForFraudControl=true`                                    |
| 1981-06-02 | M      | 300881-051B  | Juhani Korhonen NieminenKalevankatu 900100 Helsinki     | [bookPayment](/simplified-flow-api/bookpayment/) returns bookPaymentStatus=FROZENAfter 5 seconds the payment is **a** **nnulled*.***                                   | bookPayment returns bookPaymentStatus=FROZEN After 5 seconds the payment is **annulled*.***                                                                        |
| 1980-09-10 | F      | 100980-576X  | Maria Korhonen KorhonenKansakoulukatu 1 00100 Helsinki  | [bookPayment](/simplified-flow-api/bookpayment/) returns bookPaymentStatus=FROZENAfter 10 minutes the payment is **unfrozen.** Requires `waitForFraudControl=true`     | bookPayment returns bookPaymentStatus=FROZENAfter 10 minutes the payment is **unfrozen.** Requires `waitForFraudControl=true`                                       |
| 1980-09-10 | F      | 230982-3064  | Helena Virtanen MäkeläFredrikinkatu 10 33100 Tampere    | [bookPayment](/simplified-flow-api/bookpayment/) returns bookPaymentStatus=FROZENAfter 10 minutes the payment is **annulled.**                                         | bookPayment returns bookPaymentStatus=FROZENAfter 10 minutes the payment is **annulled.**                                                                           |
| 1978-01-02 | F      | 180650-344E  | Kaarina Virtanen VirtanenKalevankatu 700100 Helsinki    | [bookPayment](/simplified-flow-api/bookpayment/) returns bookPaymentStatus=DENIED                                                                                      | submitLimitApplication returns decision=DENIED                                                                                                          |
| 1987-09-15 | M      | 150987-069L  |                                                         | customer got no cards/accounts which allow **new card/account**                                                                                  | customer got no cards/accounts which allow **new card/account**                                                                                                                                                             |

### Organisations
No payment methods for Finish orgainsations exist today. Contact your
Resurs Bank sales representative if you want to support Finish
organisations.

| Organisation number | Gender | Civic number | Get address                               | ~~[Shop Flow](https://test.resurs.com/docs/display/DD/Shop+Flow+Service)~~                                             | [Simplified shop flow](simplified-flow-api)                 |
|---------------------|--------|--------------|-------------------------------------------|--------------------------------------------------------------------------------------------------------------------|-------------------------------------------------------------|
| 6014969-1           | M      | 230580-7335  | Sika MaatilaFredrikinkatu 300100 Helsinki |                                                                                                                    |                                                             |
| 4967996-6           | M      | 230580-7335  | OlutpanimoKansakoulukatu 900100 Helsinki  | submitLimitApplication returns decision=DENIED | [bookPayment](/simplified-flow-api/bookpayment/) returns bookPaymentStatus=DENIED |
| 1105814-4           | M      | 230580-7335  | OlutpanimoKansakoulukatu 500100 Helsinki  | submitLimitApplication returns decision=TRIAL  | [bookPayment](/simplified-flow-api/bookpayment/) returns bookPaymentStatus=DENIED |

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
government ID: If agreed upon with Resurs Bank, the merchant can let the
customer use an existing account without entering an account number, the
government ID will fetch the account number and signing is mandatory in
this case.

#### Parameters when using Hosted flow
The flag `allowCardPaymentWithoutCardNumber` set to `true `will only
display the input field for government ID.  
`allowCardPaymentWithoutCardNumber` set to `false` will display both the
government ID and account number fields and the customer must enter a
account number.

| Government IDAccount  | Account number     | Result                                                                    |
|-----------------------|--------------------|---------------------------------------------------------------------------|
|  260781-3930          |  9578105010835835  | [bookPayment](simplified-flow-api/bookpayment/)  returns bookPaymentStatus=BOOKED or FINALIZED |
| 140863-121M           | 9578105010831111   | [bookPayment](simplified-flow-api/bookpayment/) returns bookPaymentStatus=DENIED               |

