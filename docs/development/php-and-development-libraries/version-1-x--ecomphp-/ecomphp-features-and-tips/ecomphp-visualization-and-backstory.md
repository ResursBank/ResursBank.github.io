---
layout: page
title: Ecomphp Visualization And Backstory
permalink: /development/php-and-development-libraries/version-1-x--ecomphp-/ecomphp-features-and-tips/ecomphp-visualization-and-backstory/
parent: Php And Development Libraries
grand_parent: Development
---



# EComPHP Visualization and backstory 
Created by Thomas Tornevall, last modified on 2021-08-21

**Table of contents**
\[ [Communication
drivers](#ecomphpvisualizationandbackstory-communicationdrivers) \] \[
[Overlapping flows](#ecomphpvisualizationandbackstory-overlappingflows)
\] \[ [getPayment
Magics](#ecomphpvisualizationandbackstory-getpaymentmagics) \] \[
[Aftershop Flow
Magics](#ecomphpvisualizationandbackstory-aftershopflowmagics) \] \[
[Was and is -
Backstory](#ecomphpvisualizationandbackstory-wasandis-backstory) \]

## Communication drivers
This image shows what EComPHP actually is in a visual style. Observe
that SoapClient has an entry - "internal curl" - in this scenario. The
reason is that SoapClient is internally using curl to communicate with
Resurs Bank Webservices (SOAP).

## Overlapping flows
The below view is a shortened (as EComPHP do much more than this)
overview on how the payment flows may overlap each other, when EComPHP
is fully integrated into a system.

As you can see here, there are mixed communication environments:

- The simplified flow and hosted flow allows checkouts, but parts in
  hosted flow can use the simplified system. For example: If the
  checkout that uses the hosted flow, needs to show payment methods
  dynamically, the simplified flow is used to fetch and list the payment
  methods
- If your store allows separate "pay from NNN SEK" for each item in the
  store, the simplified flow is used, even if you have Resurs Checkout
  or Hosted flow configured
- If your store runs the checkout with rest-only in the shop, but you
  want to handle all payments from the shops internal order
  administration, SOAP and aftershop services are still required (unless
  you find it more comfortable to use Resurs Payment admin)
- Callbacks has to be configured somewhere, if you want to handle events
  that occurs in payment admin. It could be done either via [rest
  (checkout)](https://test.resurs.com/docs/display/ecom/Resurs+Checkout#ResursCheckout-Callbacks)
  or [SOAP (fully supported as the rest does not support
  UPDATE)](https://test.resurs.com/docs/display/ecom/Callbacks)

## getPayment Magics
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
  block). When the payment does not exist, the error code is 8.
- getPayment, on failures, in the REST-API does not throw a soapfault
  (of course), but an HTTP HEAD error 404 (not found) which contains an
  extended body with the "more correct error response" (which also might
  confuse exception handling)

The fact that the rest functions actually returns a http-404 might
confuse a bit, as this error type is actually used for more than just
unexistent payments. If you build tests based on getPayment with rest,
you need to consider that there's also an extended json-based body, when
you're using the call and gets errors.

## Aftershop Flow Magics
Coming soon.

# Was and is - Backstory
EComPHP was, historical, built around a number of stub files generated
by wsdl2phpgenerator as this was a recommended way of simplify
communication with Resurs Bank Ecommerce. Using the stubs directly
sometimes was a bit tricky to get along with, so the ending result was
EComPHP, that handled all basic communication for the developer. There
was several methods built in, that EComPHP handled, and the goal was to
simplify the flows that much, so only one method call was needed to
initiate a payment - and even if the shop flows changed, all initiations
should be identical since some fields in the payload sometimes
mismatched between the flows. EComPHP fixed this too, and still are.

Time passed and Resurs Bank different shop flows was extended with the
hosted flow and Resurs Checkout which, in difference to the simplified
flow, uses rest calls.

> Community supportIf something does not work properly in EComPHP, feel
> free to join the community via bitbucket, or contact us at
> onboarding@resurs.se. EComPHP is updated continuously to improve
> functionality.

