---
layout: page
title: Booked
permalink: /callbacks/booked/
parent: Callbacks
---


# BOOKED 
Created by Benny, last modified by Patric Johnsson on 2021-07-23
\[ [Trigger](#BOOKED-Trigger) \] \[ [Callback with dual
requests](#BOOKED-Callbackwithdualrequests) \]
  
|           | Name        | Description                                                                                                                                |
|-----------|-------------|--------------------------------------------------------------------------------------------------------------------------------------------|
| ID        | `BOOKED`    | The booking event ID.                                                                                                                      |
| Parameter | `paymentId` | Payment ID (was sent to us as` `**`preferredPaymentId`**` ` in the `bookPayment` call or *orderReference* in the POST for Resurs Checkout) |
  
### Trigger
The order has been created in Resurs Bank system.
Resurs Bank will do a both a conditional POST and GET request call to a
system with this callback registered. By means, if the POST request is
successful, the GET won't fire up.
Parameters added to the URL is **`paymentId`** and the JSON below for
[paymentSpec](paymentSpec_1474947.html) (when the callback is based on
method POST).
  
**Example registerEventCallback**
``` syntaxhighlighter-pre
<S:Envelope xmlns:S="http://schemas.xmlsoap.org/soap/envelope/">
  <S:Body>
    <ns0:registerEventCallback xmlns:ns0="http://ecommerce.resurs.com/v4/msg/configuration" xmlns:ns1="http://ecommerce.resurs.com/v4/msg/exception">
      <eventType>BOOKED</eventType>
      <uriTemplate>https://host.com/rest/resursbank_checkout/booked/paymentId/{paymentId}/digest/{digest}</uriTemplate>
      <basicAuthUserName>UserNameIfBasicAccessAuthenticationIsUsed</basicAuthUserName>
      <basicAuthPassword>PasswordIfBasicAccessAuthenticationIsUsed</basicAuthPassword>
      <digestConfiguration>
        <digestAlgorithm>SHA1</digestAlgorithm>
        <digestParameters>paymentId</digestParameters>
        <digestSalt>SecretHashSalt</digestSalt>
      </digestConfiguration>
    </ns0:registerEventCallback>
  </S:Body>
</S:Envelope> 
```
  
Resurs Bank will make a HTTP/POST
call: https://host.com/rest/resursbank_checkout/booked/paymentId/11111111/digest/digest123xyz
 Content-Type application/Json
**Example of a POST call**
``` syntaxhighlighter-pre
{
    "addedPaymentSpecificationLines": []
}
--* Or like this where fee is added in Resurs payment administration gui*--
{
    "addedPaymentSpecificationLines": [
        {
            "id": "9999999",
            "artNo": "fff_999",
            "description": "Invoice fee",
            "quantity": 1,
            "unitMeasure": "pcs",
            "unitAmountWithoutVat": 16.00000,
            "vatPct": 25,
            "totalVatAmount": 4.00000,
            "totalAmount": 20.00000
        }
    ]
}
 
```
## Callback with dual requests
The dual calls from this callback thay may be observed in webserver logs
is much about not breaking compatibility, where POST is a bit modern
than the GET.
Usually there's a regular GET for the BOOKED with no parameters inside.
The only thing it should do is to report that the order is booked.
The second POST is delivered with extra fees if they are present as
shown above (this variant is currently unsupported by for example the
Magento plugin).
Generally callbacks are also sent with two different user-agents, to
secure that callbacks are really delivered. Some hosting providers
usually blocks traffic from clients that are identified as a Java
client.
