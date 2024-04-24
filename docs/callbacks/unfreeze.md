---
layout: page
title: Unfreeze
permalink: /callbacks/unfreeze/
parent: Callbacks
---

# UNFREEZE 

Informs when an payment is unfrozen after manual fraud screening. This
means that the payment may be debited (captured) and the goods can be
delivered.
  
|           | Name        | Description                                                                            |
|-----------|-------------|----------------------------------------------------------------------------------------|
| ID        | `UNFREEZE`  | The unfreeze event ID.                                                                 |
| Parameter | `paymentId` | Payment ID (was sent to us as ` `**`preferredPaymentId`**` `in the `bookPayment` call) |
  
**Example**

```xml
<S:Envelope xmlns:S="http://schemas.xmlsoap.org/soap/envelope/">
  <S:Body>
    <ns0:registerEventCallback xmlns:ns0="http://ecommerce.resurs.com/v4/msg/configuration" xmlns:ns1="http://ecommerce.resurs.com/v4/msg/exception">
      <eventType>UNFREEZE</eventType>
      <uriTemplate>https://host.com/rest/resursbank_checkout/unfreeze/paymentId/{paymentId}/digest/{digest}</uriTemplate>
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
the callback type) to the registered URL:
[https://host.com/?merchant=ResursBank&event-type=UNFREEZE&paymentId=10000016&digest=4b6f2ddec947e6e5b6c4c3998081f3d7bce1f40d](https://host.com/?merchant=ResursBank&event-type=UNFREEZE&paymentId=10000016&digest=4b6f2ddec947e6e5b6c4c3998081f3d7bce1f40d)
  
