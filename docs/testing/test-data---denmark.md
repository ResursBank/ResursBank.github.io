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

| Birthday   | Gender | Civic number | Address                                               |  Results                                                                                                                                           | ~~Shop flow~~ (deprecated)                                                                                                                                     |
|------------|--------|--------------|-------------------------------------------------------|----------------------------------------------------------------------------------------------------------------------------------------------------|-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| 1985-02-14 | M      | 140285-3877  | Gorm Anker BøghStrøget 153100 Hornbæk                 | [bookPayment](/simplified-flow-api/bookpayment/)  returns bookPaymentStatus=BOOKED or FINALIZED                                                                          | submitLimitApplication returns decision=GRANTED bookPayment returns fraudControlStatus=NOT_FROZEN |
| 1950-12-02 | M      | 021250-0003  | Kaj Anker AnkerFrederiksberggade 11620 København      | [bookPayment](/simplified-flow-api/bookpayment/) returns bookPaymentStatus=DENIED                                                                                        | submitLimitApplication returns decision=TRIAL                                                                                                           |
| 1980-05-06 | F      | 060580-3736  | Kristen Bager AnkerFrederiksberggade 161620 København | [bookPayment](/simplified-flow-api/bookpayment/) returns bookPaymentStatus=FROZEN The payment will never be unfrozen.Requires `waitForFraudControl=true`                 | bookPayment returns fraudControlStatus=FROZEN The payment will never be unfrozen.Requires `waitForFraudControl=true`                                                |
| 1981-04-14 | F      | 140481-9652  | Grethe Anker Anker Østergade 16 1620 København        | [bookPayment](/simplified-flow-api/bookpayment/) returns bookPaymentStatus=FROZEN After 5 seconds the payment is **unfrozen.** Requires `waitForFraudControl=true`       | bookPayment returns bookPaymentStatus=FROZEN After 5 seconds the payment is **unfrozen.** Requires `waitForFraudControl=true`                                      |
| 1977-06-10 | M      | 100677-2605  | Preben Bager AnkerFrederiksberggade 161620 København  | [bookPayment](/simplified-flow-api/bookpayment/) returns bookPaymentStatus=FROZEN After 5 seconds the payment is **annulled.**                                           | bookPayment returns bookPaymentStatus=FROZEN After 5 seconds the payment is **annulled.**                                                                          |
| 1983-11-01 | F      | 011183-1432  | Vibeke Anker AnkerStrøget 161620 København            | [bookPayment](/simplified-flow-api/bookpayment/) returns bookPaymentStatus=FROZEN After 10 minutes the payment is **unfrozen.**                                          | bookPayment returns bookPaymentStatus=FROZEN After 10 minutes the payment is **unfrozen.**                                                                          |
| 1984-03-24 | F      | 240384-4340  | Vibeke Anker AnkerStrøget 23000 Helsingør             | [bookPayment](/simplified-flow-api/bookpayment/) returns bookPaymentStatus=FROZEN After 10 minutes the payment is **annulled.**                                          | bookPayment returns bookPaymentStatus=FROZEN After 10 minutes the payment is **annulled.**                                                                          |
| 1976-12-02 | M      | 290550-1913  | Preben Anker DunkerStrøget 93250 Gilleleje            | [bookPayment](/simplified-flow-api/bookpayment/) returns bookPaymentStatus=DENIED                                                                                        | submitLimitApplication returns decision=DENIED                                                                                                          |
| 1988-04-23 | M      | 2304881898   |                                                       | customer got no cards/accounts which allow **new card/account**                                                                                    | customer got no cards/accounts which allow **new card/account**                                                                                                                                                             |

### Cards
Card to use when testing.

| Test card numbers   | Government ID | Maximum limit / purchase |
|---------------------|---------------|-------------------------:|
| 9000 0000 0000 0000 | 1502640867    |                        0 |
| 9000 0000 0000 5000 | 1502640867    |                    5 000 |
| 9000 0000 0001 0000 | 1502640867    |                   10 000 |
| 9000 0000 0001 5000 | 1502640867    |                   15 000 |
| 9000 0000 0002 0000 | 1502640867    |                   20 000 |
| 9000 0000 0002 5000 | 1502640867    |                   25 000 |
| 9000 0000 0005 0000 | 1502640867    |                   50 000 |

### Account
Account, with the option set in the payment method to use only
government ID: If agreed upon with Resurs Bank, the merchant can let the
customer use an existing account without entering an account number, the
government ID will fetch the account and signing is mandatory in this
case.

#### Parameters when using Hosted flow
The flag `allowCardPaymentWithoutCardNumber` set to `true `will only
display the input field for government ID.  
`allowCardPaymentWithoutCardNumber` set to `false` will display both the
government ID and card number fields and the customer must enter a card
number.

| Government IDAccount  | Account number     | Result                                                                    |
|-----------------------|--------------------|---------------------------------------------------------------------------|
|  2503550949           |  9578205010835835  | [bookPayment](/simplified-flow-api/bookpayment/)  returns bookPaymentStatus=BOOKED or FINALIZED |
| 0505599889            | 9578105010831111   | [bookPayment](/simplified-flow-api/bookpayment/) returns bookPaymentStatus=DENIED               |

