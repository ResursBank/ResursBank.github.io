---
layout: page
title: Api For Retrieving Masked Card Number
permalink: /resurs-checkout-web/api-for-retrieving-masked-card-number/
parent: Resurs Checkout Web
---


# API for retrieving masked card number 
Created by Patric Johnsson on 2019-07-16
Note!
The payment has to been made thru our PSP-partner NETS and the merchant
has be registrered in our interface Merchant Portal. If you are
uncertain about either of these prerequisites, please contact us to
verify.
  
**End-point**
[https://omnitest.resurs.com/checkout/payments/{orderReference}/card_details](https://omnitest.resurs.com/checkout/payments/%7BorderReference%7D/card_details)
Simply enter your requested order reference into the endpoint and run
the request (GET-function)
  
*If there is a card payment for your searched order reference, you will
recieve a 200-response containing the information below*
**Output example - Success**
``` syntaxhighlighter-pre
{
   "maskedCardNumber": "492500******0004"
}
```
  
*If there isn't a card payment for your searched order reference, you
will recieve a 400-response containing the information below*
**Output example - fail**
``` syntaxhighlighter-pre
{
   "detailMessage": "Could not find payment for externalId: {orderReference} Do you find this error strange? E-mail
information about the payment to ehandel@resurs.se
or follow the contact information page here: https://test.resurs.com/docs/x/9gAF",
    "faultInfo": {     
    "errorTypeDescription": "NOT_ALLOWED",
     "errorTypeId": 4,
    "fixableByYou": true,      
    "userErrorMessage": "Tekniskt fel"
    }
}
```
