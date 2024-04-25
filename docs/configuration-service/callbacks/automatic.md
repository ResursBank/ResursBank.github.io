---
layout: page
title: Automatic_Fraud_Control
permalink: /configuration-service/callbacks/automatic/
parent: Callbacks
---

# AUTOMATIC_FRAUD_CONTROL 
Occurs when the automatic fraud control has been preformed. This will
occur seconds after the `bookPayment` call.
If the shop needs this information the representative can either listen
for this callback or run bookPayment in synchronous mode.
  
|           | Name                      | Description                                                                            |
|-----------|---------------------------|----------------------------------------------------------------------------------------|
| ID        | `AUTOMATIC_FRAUD_CONTROL` | The automatic fraud control event ID.                                                  |
| Parameter | `paymentId`               | Payment ID (was sent to us as` `**`preferredPaymentId`**` ` in the `bookPayment` call) |
| Parameter | `result`                  | The result of the automatic fraud control. Either `FROZEN` or `THAWED`.                |
  
**Example**

```xml
<S:Envelope xmlns:S="http://schemas.xmlsoap.org/soap/envelope/">
  <S:Body>
    <ns0:registerEventCallback xmlns:ns0="http://ecommerce.resurs.com/v4/msg/configuration" xmlns:ns1="http://ecommerce.resurs.com/v4/msg/exception">
      <eventType>AUTOMATIC_FRAUD_CONTROL</eventType>
      <uriTemplate>https://host.com/rest/resursbank_checkout/automatic_fraud_control/paymentId/{paymentId}/result/{result}/digest/{digest}</uriTemplate>
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
the callback type) to the
registered URL: [https://host.com/?merchant=ResursBank&event-type=AUTOMATIC_FRAUD_CONTROL&paymentId=10000016&result=FROZEN&digest=4b6f2ddec947e6e5b6c4c3998081f3d7bce1f40d](https://host.com/?merchant=ResursBank&event-type=AUTOMATIC_FRAUD_CONTROL&paymentId=10000016&result=FROZEN&digest=4b6f2ddec947e6e5b6c4c3998081f3d7bce1f40d)
  
