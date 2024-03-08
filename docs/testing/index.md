---
layout: page
title: Testing
permalink: /testing/
has_children: true
---


# Testing 
Created by User2, last modified by Patric Johnsson on 2021-11-04
> TESTING IN PRODUCTION ENVIRONMENTSAvoid running tests in the live
> environment. Read more below.Usually representatives and integrators
> are tempted to run tests in the live enviroment. Please don't The main
> consequence is that credit applications are made and these are saved
> by credit agencies (like UC). Later, when new credits are considered,
> these old applications will be weighted in. A lot of credit
> applications in a short period of time looks suspicious.  

> PS!Note that the test data does not work for Store Solution API, only
> our ecommerce flows as well as Resurs Checkout POS/PUSH.

Resources for testing the integration are collected here.

- [Test URLs](test-urls)
- [Verify integration](verify-integration)
- [Test Data - Sweden](test-data---sweden)
- [Test Data - Denmark](test-data---denmark)
- [Test Data - Finland](test-data---finland)
- [Test Data - Norway](test-data---norway)
- [Customer Field Validation (regex)](32833653)

### SoapUI testing
Resurs Bank provides a set of public soapUI test cases to get you up and
running quickly. soupUI is the leading free test tool for interaction
with SOAP based WebServices.

By executing (and understanding) these test cases, you will gain a good
understanding of how the Resurs Bank eCommerce service works, which will
make the actual integration much easier.

Download suite:

[ecommerce-public-tests.xml](../../attachments/327817/6520981.xml)  

