---
layout: page
title: Callbacks
permalink: /configuration-service/callbacks/
has_children: true
---


# Callbacks 
  
- [Status and callback chart](#Callbacks-Statusandcallbackchart)
- [Available Callbacks](#Callbacks-AvailableCallbacks)
- [What's a callback?](#Callbacks-What'sacallback?)
- [Digest and checksum](#Callbacks-Digestandchecksumdigest)
- [Register Callback](#Callbacks-RegisterCallback)
- [Authentication](#Callbacks-Authentication)
- [Fallback - resending failed
  callbacks](#Callbacks-Fallback-resendingfailedcallbacks)
User-Agent notice
Generally callbacks are also sent with two different user-agents, to
secure that callbacks are really delivered. Some hosting providers
usually blocks traffic from clients that are identified as a Java
client.
  
Polling the e-commerce service for status changes would prevent scaling
of the service, and it would prevent efficient handling. The answer is
callbacks, simple HTTP calls initiated by Resurs Bank.
  
![](../../attachments/1475264/128286751.png)
  
  
### Status and callback chart
Click here to expand flow chart for callback events with
waitForFraudControl set to FALSE in bookPayment...
 
  
|     |
|-----|
  
Click here to expand flow chart for callback events with
waitForFraudControl set to TRUE in bookPayment...
  
|     |
|-----|
  
  
Click here to expand flow chart for callback events with Resurs
Checkout...
  
|     |
|-----|
  
Click here to expand flow chart for callback events with Resurs self
service checkout...
  
|     |
|-----|
  
### Available Callbacks
- [BOOKED ](https://test.resurs.com/docs/display/ecom/BOOKED)- The order
  is created in Resurs Bank system. (Note! Order can be in a FROZEN
  state.)
- [AUTOMATIC_FRAUD_CONTROL](AUTOMATIC_FRAUD_CONTROL_1147049.html) - A
  payment has automatically been fraud screened
- [UNFREEZE](UNFREEZE_1147040.html) - A payment is "thawed" from a
  FROZEN status.
- [ANNULMENT ](ANNULMENT_1147045.html)- A payment is fully annulled.
- [FINALIZATION](FINALIZATION_1476415.html) - Resurs Bank finalizes a
  payment. (Note! Only applicable if finilizedIfBooked parameter is set
  to true.)
- [UPDATE](UPDATE_5013983.html) - A payment is updated. 
- [TEST](TEST_1147047.html) - Is used to test the callback machinery
### What's a callback?
A callback is a simple HTTP call **from** Resurs Bank **to** the
representative (not necessary the shop). This is in opposite direction
of the "normal" communication, where the representative makes calls to
Resurs Bank. The main reason to resort to a callback solution is that
it's not possible in practicality for the representative to poll for
different status changes in the e-commerce service in most cases. (It is
reminiscent of Paypals IPN)
The representative *registers* a callback URL with the web service. When
the event occurs, Resurs Bank will make a simple HTTP/GET call with
query parameters (defined by the callback type) to that URL. If a status
below 300 is returned to Resurs Bank that event will be considered
delivered, otherwise several more tries will be carried out. 
  
- When receiving an event, please return an OK status (HTTP 2xx).
  Otherwise the e-commerce service will continue to try to inform until
  the timeout is reached.
- We do not, for the time being, follow redirects correctly (302, 303)
  
A callback type is defined by an identity that is a common string. This
allows us to easily create new callbacks without breaking the interface.
The callback can have any number of parameters. It is the information to
be communicated to the representative when a callback event occurs. The
Respresentative register a URI that Resurs Bank will call, with
placeholders for each parameter. 
Here's an example of a callback URI

``` syntaxhighlighter-pre
https://ws.host.com/Resursbank.aspx?orderId={paymentId}&status=UNFREEZE&partnerId=Resursbank&digest={digest} 
```

Apparently, this event-type has two parameters: *paymentId* and
*digest*. Read more about digest and checksums below.
When the call is done, we take the URI, and populate the placeholders
with the actual values, and makes the call. All callbacks are HTTP/GET's
with the exception of BOOKED and UPDATE that are HTTP/POST's. If we get
a status that is less than 300 back, we consider the event conveyed.
Otherwise, it lands in a queue with a fall-off mechanism: The gap
between callback attempts increases until a month has passed, after
which the callback is lost.
### Digest and checksum 
A representative can also request a checksum attached as a parameter in
the call. This parameter is called `digest` (always, regardless of event
type) and the agent specifies the parameters to be included in the
checksum. He also indicates which algorithm is used (SHA-1 or MD5), and
possibly a `salt`.
If we use the above URI such as:
``` syntaxhighlighter-pre
SALT: iCanHasCheezeburger
ALGORITM: MD5
CALLBACK URI: https://ws.host.com/Resursbank.aspx?orderId={paymentId}&status=UNFREEZE&partnerId=Resursbank&digest={digest} 
PARAMETERS WHICH SHOULD BE USED IN CHECKSUM CALCULATION: paymentId
paymentId: lePayment
 
This whould give the following string: lePaymentiCanHasCheezeburger
MD5 for this string is ED3381936CCAA2659CF3089F4AA83007
 
This would result in a call to
 
https://ws.host.com/Resursbank.aspx?orderId=lePayment&status=UNFREEZE&partnerId=Resursbank&digest=ED3381936CCAA2659CF3089F4AA83007  
```
The checksum is in **UPPERCASE**!
  
### Register Callback
You can use either [SOAP](/configuration-service/register-event-callbacks) or
REST to register callbacks.
### Authentication
When the representative registers a callback, it´s optional to provide a
username and password. These will be used by Resurs Bank to perform a
Basic Authentication at the merchant's site when doing a callback.   
Alternatively is your site is open for calls.
Other authentication methods are not supported. Please note that the
usage of a salt will be more secure if the channel isn't encrypted
(SSL/TLS) (since basic authentication is plain text). For extra safety
you can send in an unique SALT with every call.
### Fallback - resending failed callbacks
When we try to send a callback and it fails, either if we can't contact
the callback service or the correct status aren’t returned, we will try
to resend it 19 times, after the first failed one.
  
| Attempt | Delay between attempts |
|:-------:|:----------------------:|
|    1    |           0            |
|    2    |         30 sec         |
|    3    |         45 sec         |
|    4    |         1 min          |
|    5    |        1,5 min         |
|    6    |        2,5 min         |
|    7    |         4 min          |
|    8    |        5,5 min         |
|    9    |        8,5 min         |
|   10    |         13 min         |
|   11    |         20 min         |
|   12    |         30 min         |
|   13    |         45 min         |
|   14    |          1 h           |
|   15    |         1,5 h          |
|   16    |         2,5 h          |
|   17    |          4 h           |
|   18    |          5 h           |
|   19    |          8 h           |
|   20    |    12 h(total 36 h)    |
  
  
  
  
