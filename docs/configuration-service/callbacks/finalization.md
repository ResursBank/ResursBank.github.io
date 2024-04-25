---
layout: page
title: Finalization
permalink: /configuration-service/callbacks/finalization/
parent: Callbacks
---

# FINALIZATION 
This event is triggered when a paymnet is automatically finalized at
Resurs Bank.  
i.e.:
- finalizeIfBooked set to TRUE in bookPayment method (Simplified Shop
  Flow Service and Resurs Hosted flow).
- Payment type is Swish (SE)
Once a payment is finalized automatically at Resurs Bank, for this will
trigger this event, when the parameter finalizeIfBooked parmeter is set
to true in [paymentData](/development/api-types/paymentdata).
  
|           | Name           | Description                                                                            |
|-----------|----------------|----------------------------------------------------------------------------------------|
| ID        | `FINALIZATION` | The finalization event ID.                                                             |
| Parameter | `paymentId`    | Payment ID (was sent to us as` `**`preferredPaymentId`**` ` in the `bookPayment` call) |
  
**Example**
```xml
<S:Envelope xmlns:S="http://schemas.xmlsoap.org/soap/envelope/">
  <S:Body>
    <ns0:registerEventCallback xmlns:ns0="http://ecommerce.resurs.com/v4/msg/configuration" xmlns:ns1="http://ecommerce.resurs.com/v4/msg/exception">
      <eventType>FINALIZATION</eventType>
      <uriTemplate>https://host.com/rest/resursbank_checkout/finalization/paymentId/{paymentId}/digest/{digest}</uriTemplate>
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
[https://host.com/?merchant=ResursBank&event-type=FINALIZATION&paymentId=10000016&digest=4b6f2ddec947e6e5b6c4c3998081f3d7bce1f40d](https://host.com/?merchant=ResursBank&event-type=FINALIZATION&paymentId=10000016&digest=4b6f2ddec947e6e5b6c4c3998081f3d7bce1f40d)
