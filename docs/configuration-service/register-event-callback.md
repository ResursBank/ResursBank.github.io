---
layout: page
title: Register Event Callback
permalink: /configuration-service/register-event-callback/
parent: Configuration Service
---


# Register Event Callback 
````
registerEventCallback
````
*Registers a new event callback.*
  
**Input(Literal)**
  
| Name                 | Type                                                                  | Occurs | Nillable? | Description                                                                                                                                                                                                                                                                                                                                                                                               |
|----------------------|-----------------------------------------------------------------------|--------|-----------|-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| eventType            | **[id](Simple-Types..._1475653.html)**                                | 1..1   | No        | The type of event call-back being registered. Typical example is UNFREEZE for notification of frozen payments being thawed after manual fraud control. For full details on the call-back events available, please contact Resurs Bank.                                                                                                                                                                    |
| uriTemplate          | [**nonEmptyString**](Simple-Types..._1475653.html)                    | 1..1   | No        | The call-back event URI template, with placeholders for the parameters to be returned. All placeholders are supplied in curly brackets, i.e. {} The actual placeholders depend on the type of call-back event. However, there is one common: digest. For further information on URIs and placeholders, please contact Resurs Bank. Example:  http://www.resurs.se/?id={identifier}&rep=4&digest={digest } |
| basicAuthUserName    | [**nonEmptyString**](/development/api-types/simple-types)             | 0..1   | No        | If Basic Access Authentication is to be used, the user name.                                                                                                                                                                                                                                                                                                                                              |
| basicAuthPassword    | [**nonEmptyString**](/development/api-types/simple-types)             | 0..1   | No        | If Basic Access Authentication is to be used, the password.                                                                                                                                                                                                                                                                                                                                               |
| digestConfiguration  | [**digestConfiguration**](/development/api-types/digestconfiguration) | 0..1   | No        | If a digest is to be used to confirm that the call-back is actually issued by Resurs Bank, the configuration of that digest.                                                                                                                                                                                                                                                                              |
  
  
**Faults**
  
| Name                    | Content                                               | Description                                               |
|-------------------------|-------------------------------------------------------|-----------------------------------------------------------|
| ECommerceErrorException | **[ECommerceError](/development/api-types/ecommerceerror)**     | Failed to register event callback. See error for details. |
  
  
### Callbacks

Read more about callbacks **[here.](/callbacks)**

### Example

**Request**

```xml
<soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
  <soap:Body>
    <ns3:registerEventCallback xmlns:ns2="http://ecommerce.resurs.com/v4/msg/exception" xmlns:ns3="http://ecommerce.resurs.com/v4/msg/configuration">
      <eventType>BOOKED</eventType>
      <uriTemplate>http://host.com/?wc-api=WC_Resurs_Bank&amp;event-type=BOOKED&amp;paymentId={paymentId}&amp;digest={digest}</uriTemplate>
      <basicAuthUserName xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:nil="true"/>
      <basicAuthPassword xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:nil="true"/>
      <digestConfiguration>
        <digestAlgorithm>SHA1</digestAlgorithm>
        <digestParameters>paymentId</digestParameters>
        <digestSalt>11624530085b7bddc2646326</digestSalt>
      </digestConfiguration>
    </ns3:registerEventCallback>
  </soap:Body>
</soap:Envelope>
```
  
  
