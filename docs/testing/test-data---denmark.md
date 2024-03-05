---
layout: page
title: Test Data - Denmark
permalink: /testing/test-data---denmark/
parent: Testing
---


# Test Data - Denmark 
Created by Joachim Andersson, last modified by Patric Johnsson on
2021-07-04
  
| Phone number | 39131600 |
|--------------|----------|
  
### Persons
Persons to use when testing.
  
[TABLE]
  
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
  
  
| Government IDAccount  | Account number     | Result                                                                                 |
|-----------------------|--------------------|----------------------------------------------------------------------------------------|
|  2503550949           |  9578205010835835  | [bookPayment](bookPayment_1476362.html)  returns bookPaymentStatus=BOOKED or FINALIZED |
| 0505599889            | 9578105010831111   | [bookPayment](bookPayment_1476362.html) returns bookPaymentStatus=DENIED               |
  
  
  
