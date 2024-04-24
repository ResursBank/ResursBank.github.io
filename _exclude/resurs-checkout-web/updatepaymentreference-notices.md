---
layout: page
title: Updatepaymentreference Notices
permalink: /resurs-checkout-web/updatepaymentreference-notices/
parent: Resurs Checkout Web
---


# updatePaymentReference notices 

The rest call updatePaymentReference usually accept updates of
references without any further notices except for a HTTP code 200
(success). However, there's a few ways to handle exceptions at it throws
a bit different content depending on what happens in the flow.
Unfortunately, due to long-time-development, the exceptions may be a bit
inconsequent. The below examples explains how the errors are returned
from the rest API. Another thing to know about this flow is that our
library component EComPHP can usually parry those exceptions and give
back a proper response regardless of the outcome.
  
| Event                             | Description                                                                                                                                               | JSON content                                                       | Code                                   | EComPHP comments                                                                                                                                                                                                                                                                                                                                                                      |
|-----------------------------------|-----------------------------------------------------------------------------------------------------------------------------------------------------------|--------------------------------------------------------------------|----------------------------------------|---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| Successful updatePaymentReference | No further explanation. We are successful.                                                                                                                |                                                                    | **200**                                | Will return success                                                                                                                                                                                                                                                                                                                                                                   |
| Colliding updatePaymentReference  | When you run same credentials over more platforms or for some reason, you are trying to update a payment reference that is already created at Resurs Bank | {"errorCode":intValue,"description":"errorMessage"}                | **8**                                  | Initially throws 40X, but catches extended error messages in the http error body. Will throw exception with code 8.                                                                                                                                                                                                                                                                   |
| Second updatePaymentReference     | Running updatePaymentReference where the reference is already updated.                                                                                    | {"errorCode": "stringBasedCode", "detailedMessage":"errorMessage"} | **404**or**PAYMENT_SESSION_NOT_FOUND** | Error body contains an extended error message.However, since the errorCode is usually **PAYMENT_SESSION_NOT_FOUND**, PHP does not support this with a standard Exception(errorString, errorCode) as errorCode must be defined as a long value.EComPHP will in this case fall back to the http-head error (404), with only the error string intact ("payment session does not exist"). |
  
As we can see here, the errors are always different, so trying to
implement this in your own solution should not be very hard as long as
you listen to all of the alternatives . However, if you only parse the
http head, you won't be able to match the correct exception since many
of the rest calls is using the **404 not found**-method. By using
EComPHP (*1.3.18 or above!*) in this case (if it is possible) you could
probably trust both 8 and 404 since they mean different things (404 can
probably always be considered a successful update for example).
# Handling above exceptions with extended libraries like EComPHP
See [EComPHP Error Adaption](EComPHP-Error-Adaption_16057078.html).
