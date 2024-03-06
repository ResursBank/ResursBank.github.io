---
layout: page
title: Annulment
permalink: /callbacks/annulment/
parent: Callbacks
---


# ANNULMENT 
Created by Tobias, last modified by Thomas Tornevall on 2023-12-21
  
|           | Name        | Description                                                                            |
|-----------|-------------|----------------------------------------------------------------------------------------|
| ID        | `ANNULMENT` | The annulment event ID.                                                                |
| Parameter | `paymentId` | Payment ID (was sent to us as` `**`preferredPaymentId`**` ` in the `bookPayment` call) |
  
### Trigger
Will be sent once a payment is *fully* annulled at Resurs Bank, for
example when manual fraud screening implies fraudulent usage. Annulling
part of the payment *will not* trigger this event.
If the representative is not listening to this callback orders might be
orphaned (i.e. without connected payment) and products bound to these
orders never released.
**Example**
``` syntaxhighlighter-pre
<S:Envelope xmlns:S="http://schemas.xmlsoap.org/soap/envelope/">
  <S:Body>
    <ns0:registerEventCallback xmlns:ns0="http://ecommerce.resurs.com/v4/msg/configuration" xmlns:ns1="http://ecommerce.resurs.com/v4/msg/exception">
      <eventType>ANNULMENT</eventType>
      <uriTemplate>https://host.com/rest/resursbank_checkout/annulment/paymentId/{paymentId}/digest/{digest}</uriTemplate>
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
Resurs Bank will make a HTTP/GET call with query parameters (defined by
the callback type) to the registered URL:
[https://host.com/?merchant=ResursBank&event-type=ANNULMENT&paymentId=10000016&digest=4b6f2ddec947e6e5b6c4c3998081f3d7bce1f40d](https://host.com/?merchant=ResursBank&event-type=ANNULMENT&paymentId=10000016&digest=4b6f2ddec947e6e5b6c4c3998081f3d7bce1f40d)
  
