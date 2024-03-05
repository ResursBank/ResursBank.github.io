---
layout: page
title: Test Data - Finland
permalink: /testing/test-data---finland/
parent: Testing
---


# Test Data - Finland 
Created by Joachim Andersson, last modified by Patric Johnsson on
2022-08-31
  
| Phone number | +3585005555127 |
|--------------|----------------|
  
### Persons
Persons to use when testing.
  
[TABLE]
  
### Organisations
No payment methods for Finish orgainsations exist today. Contact your
Resurs Bank sales representative if you want to support Finish
organisations.
  
| Organisation number | Gender | Civic number | Get address                               | [Shop Flow](https://test.resurs.com/docs/display/DD/Shop+Flow+Service)                                             | [Simplified shop flow](Simplified-Flow-API_1476359.html)                 |
|---------------------|--------|--------------|-------------------------------------------|--------------------------------------------------------------------------------------------------------------------|--------------------------------------------------------------------------|
| 6014969-1           | M      | 230580-7335  | Sika MaatilaFredrikinkatu 300100 Helsinki |                                                                                                                    |                                                                          |
| 4967996-6           | M      | 230580-7335  | OlutpanimoKansakoulukatu 900100 Helsinki  | [submitLimitApplication](https://test.resurs.com/docs/display/DD/Submit+Limit+Application) returns decision=DENIED | [bookPayment](bookPayment_1476362.html) returns bookPaymentStatus=DENIED |
| 1105814-4           | M      | 230580-7335  | OlutpanimoKansakoulukatu 500100 Helsinki  | [submitLimitApplication](https://test.resurs.com/docs/display/DD/Submit+Limit+Application) returns decision=TRIAL  | [bookPayment](bookPayment_1476362.html) returns bookPaymentStatus=DENIED |
  
  
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
  
**To test VISA/Mastercard ** please see
:[https://shop.nets.eu/web/partners/test-cards](https://shop.nets.eu/web/partners/test-cards)
  
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
  
  
| Government IDAccount  | Account number     | Result                                                                                 |
|-----------------------|--------------------|----------------------------------------------------------------------------------------|
|  260781-3930          |  9578105010835835  | [bookPayment](bookPayment_1476362.html)  returns bookPaymentStatus=BOOKED or FINALIZED |
| 140863-121M           | 9578105010831111   | [bookPayment](bookPayment_1476362.html) returns bookPaymentStatus=DENIED               |
  
