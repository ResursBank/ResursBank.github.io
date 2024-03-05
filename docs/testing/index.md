---
layout: page
title: Testing
permalink: /testing/
has_children: true
---


# Testing 
Created by User2, last modified by Patric Johnsson on 2021-11-04
TESTING IN PRODUCTION ENVIRONMENTS
**Avoid running tests in the live environment. Read more below.**
**Usually representatives and integrators are tempted to run tests in
the live enviroment.**
****![(warning)](images/icons/emoticons/warning.svg)** Please don't
**![(warning)](images/icons/emoticons/warning.svg)****
***The main consequence is that credit applications are made and these
are saved by credit agencies (like UC). Later, when new credits are
considered, these old applications will be weighted in. A lot of credit
applications in a short period of time looks suspicious.
 ![(warning)](images/icons/emoticons/warning.svg)***
PS!
Note that the test data does not work for Store Solution API, only our
ecommerce flows as well as Resurs Checkout POS/PUSH.
  
Resources for testing the integration are collected here.
- [Test URLs](Test-URLs_2097164.html)
- [Verify integration](Verify-integration_5013539.html)
- [Test Data - Sweden](Test-Data---Sweden_2097257.html)
- [Test Data - Denmark](Test-Data---Denmark_2097264.html)
- [Test Data - Finland](Test-Data---Finland_2097262.html)
- [Test Data - Norway](Test-Data---Norway_2097260.html)
- [Customer Field Validation (regex)](32833653.html)
### SoapUI testing
Resurs Bank provides a set of public soapUI test cases to get you up and
running quickly. soupUI is the leading free test tool for interaction
with SOAP based WebServices.
By executing (and understanding) these test cases, you will gain a good
understanding of how the Resurs Bank eCommerce service works, which will
make the actual integration much easier.
Download suite:
[ecommerce-public-tests.xml](../../attachments/327817/6520981.xml)  
