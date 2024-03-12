---
layout: page
title: updateApplication
permalink: /consumer-loan-api/updateapplication/
parent: Consumer Loan Api
---


## updateApplication 

### One or several fields can be sent / updated in the request. **(This request must be done prior to accepting the offer.)**

Fields that can be updated are:
-   applicantEmail
-   coApplicantEmail
-   account\>clearing  
     - If the clearing consists of 5 digits and where the last digit is
  a control number it must be included, the control number cannot be
  omitted.
-   account\>number  
     - Control number must be included, it cannot be omitted.
-   iban 
-   requestedSigningMethod

  > E_SIGN Clearing- & account numberIf customer is to choose E_SIGN as
  > signing method, it is mandatory to input clearing- and account
  > number in either submitApplicationExt or updateApplication prior to
  > acceptQuote. Email is also mandatory since link for signing will be
  > sent by email.

```xml
<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:app="http://consumerloan.resurs.com/v1/msg/application">
   <soapenv:Header/>
   <soapenv:Body>
      <app:updateApplication>
         <applicationReference>?</applicationReference>
         <application>
            <!--Optional:-->
            <applicantEmail>?</applicantEmail>
            <!--Optional:-->
            <coApplicantEmail>?</coApplicantEmail>
            <!--Optional:-->
            <account>
               <clearing>?</clearing>
               <number>?</number>
            </account>
            <!--Optional:-->
            <iban>?</iban>
            <!--Optional:-->
            <requestedSigningMethod>?</requestedSigningMethod>
         </application>
      </app:updateApplication>
   </soapenv:Body>
</soapenv:Envelope>
```
```xml
<updateApplicationResult>
    <updated>true</updated>
    <message>Applicationupdated</message>
</updateApplicationResult>
```

