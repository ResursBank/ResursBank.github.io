---
layout: page
title: Test Data - Norway
permalink: /testing/test-data---norway/
parent: Testing
has_children: true
---



# Test Data - Norway 
Created by Joachim Andersson, last modified by Patric Johnsson on
2022-03-08
  
| Phone number | 22563733 |
|--------------|----------|
  
All phone numbers are intended for test of functionality between the
merchant and Resurs, not for tests between the merchant and end customer
point. At creation time they are tested not to be real but at any time,
without notice, they might be picked up for use by tele companies. If
they then are used for tests, real people might get notifications,
depending on use. The numbers have no logical functionality at Resurs
other than to fetch an address, so if you want to test towards end
customer point you can use your own private numbers.
### Persons
Persons to use when testing.
  
[TABLE]
  
### Organisations
No payment methods for Norwegian orgainsations exist today. Contact your
Resurs Bank sales representative if you want to support Norwegian
organisations.
  
| Organisation number | Gender | Civic number | [Shop Flow](https://test.resurs.com/docs/display/DD/Shop+Flow+Service)                                             | [Simplified shop flow](Simplified-Flow-API_1476359.html)                 |
|---------------------|--------|--------------|--------------------------------------------------------------------------------------------------------------------|--------------------------------------------------------------------------|
| 892831270           | M      | 180872-48794 |                                                                                                                    |                                                                          |
| 996030962           | M      | 180872-48794 | [submitLimitApplication](https://test.resurs.com/docs/display/DD/Submit+Limit+Application) returns decision=DENIED | [bookPayment](bookPayment_1476362.html) returns bookPaymentStatus=DENIED |
| 950576839           | M      | 180872-48794 | [submitLimitApplication](https://test.resurs.com/docs/display/DD/Submit+Limit+Application) returns decision=TRIAL  | [bookPayment](bookPayment_1476362.html) returns bookPaymentStatus=DENIED |
  
  
### Cards
Card to use when testing.
  
  
| Test card numbers   | Government ID | Phone number | Maximum limit / purchase |
|---------------------|---------------|--------------|-------------------------:|
| 9000 0000 0000 0000 | 16066405994   | 40000010     |                       0  |
| 9000 0000 0000 5000 | 16066405994   | 40000010     |                    5 000 |
| 9000 0000 0001 0000 | 16066405994   | 40000010     |                   10 000 |
| 9000 0000 0001 5000 | 16066405994   | 40000010     |                   15 000 |
| 9000 0000 0002 0000 | 16066405994   | 40000010     |                   20 000 |
| 9000 0000 0002 5000 | 16066405994   | 40000010     |                   25 000 |
| 9000 0000 0005 0000 | 16066405994   | 40000010     |                   50 000 |
  
**To test VISA/Mastercard ** please see:
[https://shop.nets.eu/web/partners/test-cards](https://shop.nets.eu/web/partners/test-cards)
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
  
  
| Government IDAccount  | Phone number  | Account number     | Result                                                                                 |
|-----------------------|---------------|--------------------|----------------------------------------------------------------------------------------|
|  25019218190          | 40000011      |  9578305010835835  | [bookPayment](bookPayment_1476362.html) returns bookPaymentStatus=BOOKED or FINALIZED  |
| 01046017362           | 40000012      | 9578105010831111   | [bookPayment](bookPayment_1476362.html) returns bookPaymentStatus=DENIED               |
  
  
  
