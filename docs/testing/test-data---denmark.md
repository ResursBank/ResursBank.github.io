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

| Civic number | Address |  [Simplified shop flow](/simplified-flow-api/)  | Merchant API  |
|------------:|:--------|:----------|:-------------------------------|
| 140285-3877  | Gorm Anker Bøgh<br>Strøget 15<br>3100 Hornbæk | [bookPayment](/simplified-flow-api/bookpayment/)  returns bookPaymentStatus=BOOKED or FINALIZED  | [Get payment](https://merchant-api.resurs.com/docs/v2/merchant_payments_v2#/Payment%20information/getPayment) returns status ACCEPTED<br>Callback AUTHORIZATION will be sent with status AUTHORIZED  |
| 021250-0003  | Kaj Anker Anker<br>Frederiksberggade 1<br>1620 København | [bookPayment](/simplified-flow-api/bookpayment/) returns bookPaymentStatus=DENIED | [Get payment](https://merchant-api.resurs.com/docs/v2/merchant_payments_v2#/Payment%20information/getPayment) returns status REJECTED<br>Callback AUTHORIZATION will be sent with status REJECTED |
| 060580-3736  | Kristen Bager Anker<br>Frederiksberggade 16<br>1620 København | [bookPayment](/simplified-flow-api/bookpayment/) returns bookPaymentStatus=FROZEN The payment will never be unfrozen.<br>Requires `waitForFraudControl=true` | [Get payment](https://merchant-api.resurs.com/docs/v2/merchant_payments_v2#/Payment%20information/getPayment) returns status FROZEN<br>Callback AUTHORIZATION will be sent with status FROZEN |
| 140481-9652  | Grethe Anker Anker<br>Østergade 16<br>1620 København | [bookPayment](/simplified-flow-api/bookpayment/) returns bookPaymentStatus=FROZEN<br>After 5 seconds the payment is **unfrozen.**<br>Requires `waitForFraudControl=true`       | [Get payment](https://merchant-api.resurs.com/docs/v2/merchant_payments_v2#/Payment%20information/getPayment) returns status FROZEN<br>After 5 seconds the payment is **unfrozen**<br>Callback AUTHORIZATION will be sent with status FROZEN then AUTHORIZED<br>Requires handleFrozenPayments is true  |
| 100677-2605  | Preben Bager Anker<br>Frederiksberggade 16<br>1620 København | [bookPayment](/simplified-flow-api/bookpayment/) returns bookPaymentStatus=FROZEN<br>After 5 seconds the payment is **annulled.**  | [Get payment](https://merchant-api.resurs.com/docs/v2/merchant_payments_v2#/Payment%20information/getPayment) returns status FROZEN<br>After 5 seconds the payment is **annulled**<br>Callback AUTHORIZATION will be sent with status FROZEN then REJECTED<br>Requires handleFrozenPayments is true |
| 011183-1432  | Vibeke Anker Anker<br>Strøget 16<br>1620 København | [bookPayment](/simplified-flow-api/bookpayment/) returns bookPaymentStatus=FROZEN<br>After 10 minutes the payment is **unfrozen.** | [Get payment](https://merchant-api.resurs.com/docs/v2/merchant_payments_v2#/Payment%20information/getPayment) returns status FROZEN<br>After 10 minutes the payment is **unfrozen**<br>Callback AUTHORIZATION will be sent with status FROZEN then AUTHORIZED<br>Requires handleFrozenPayments is true |
| 240384-4340  | Vibeke Anker Anker<br>Strøget 2<br>3000 Helsingør | [bookPayment](/simplified-flow-api/bookpayment/) returns bookPaymentStatus=FROZEN<br>After 10 minutes the payment is **annulled.**  | [Get payment](https://merchant-api.resurs.com/docs/v2/merchant_payments_v2#/Payment%20information/getPayment) returns status FROZEN<br>After 10 minutes the payment is **annulled**<br>Callback AUTHORIZATION will be sent with status FROZEN then REJECTED<br>Requires handleFrozenPayments is true |
| 290550-1913  | Preben Anker Dunker<br>Strøget 9<br>3250 Gilleleje | [bookPayment](/simplified-flow-api/bookpayment/) returns bookPaymentStatus=DENIED  | [Get payment](https://merchant-api.resurs.com/docs/v2/merchant_payments_v2#/Payment%20information/getPayment) returns status REJECTED<br>Callback AUTHORIZATION will be sent with status REJECTED  |
| 2304881898   |       | customer got no cards/accounts which allow **new card/account** | [Get payment](https://merchant-api.resurs.com/docs/v2/merchant_payments_v2#/Payment%20information/getPayment) returns status ACCEPTED<br>Callback AUTHORIZATION will be sent with status AUTHORIZED  |

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

