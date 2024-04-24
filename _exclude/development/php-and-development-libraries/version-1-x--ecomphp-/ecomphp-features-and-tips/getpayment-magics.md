---
layout: page
title: Getpayment-Magics
permalink: /development/php-and-development-libraries/version-1-x--ecomphp-/ecomphp-features-and-tips/getpayment-magics/
parent: Php And Development Libraries
grand_parent: Development
---



# getPayment-magics 

When using our API's you'll soon realize that the checkout/hosted-flow
API contains most of the functions you actually need. There are however
exceptions when you have to fall over to SOAP-calls - getPaymentMethods,
and such methods only exists in the webservices API (SOAP).

getPayment however, exists in both environments, but the two API's works
slightly different.

- getPayment in the SOAP-call and the REST-API gives you the same
  information when orders exists at Resurs Bank
- getPayment, on failures, in the SOAP-call will most likely throw a
  soapfault with extended information about the error (in a details
  block). When the payment does not exist, the error code is **8**.
- getPayment, on failures, in the REST-API does not throw a soapfault
  (of course), but an HTTP HEAD error **404** (not found) or internal
  code **3** which contains an extended body with the "more correct
  error response" (which also might confuse exception handling)

The fact that the rest functions actually returns a http-404 might
confuse a bit, as this error type is actually used for more than just
unexistent payments. If you build tests based on getPayment with rest,
you need to consider that there's also an extended json-based body, when
you're using the call and gets errors.

