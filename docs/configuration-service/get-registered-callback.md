---
layout: page
title: Get Registered Callback
permalink: /configuration-service/get-registered-callback/
parent: Configuration Service
---

# Get registered callback 

# getRegisteredEventCallback
*Retrieves a new event callback.*
  
**Input(Literal)**
  
| Name       | Type                              | Occurs | Nillable? | Description                                                                                                                                                                                                                            |
|------------|-----------------------------------|--------|-----------|----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| eventType  | **[id](/development/api-types/simple-types)** | 1..1   | No        | The type of event call-back being registered. Typical example is UNFREEZE for notification of frozen payments being thawed after manual fraud control. For full details on the call-back events available, please contact Resurs Bank. |
  
  
**Faults**
  
| Name                    | Content                                                     | Description                                               |
|-------------------------|-------------------------------------------------------------|-----------------------------------------------------------|
| ECommerceErrorException | **[ECommerceError](/development/api-types/ecommerceerror)** | Failed to register event callback. See error for details. |
  
### Callbacks
Read more about callbacks **[here.](../callbacks)**
  
**Example: getRegisteredEventCallback**
```xml
<?xml version="1.0" encoding="UTF-8"?>
<SOAP-ENV:Envelope xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/" xmlns:ns1="http://ecommerce.resurs.com/v4/msg/configuration">
   <SOAP-ENV:Body>
      <ns1:getRegisteredEventCallback>
         <eventType>BOOKED</eventType>
      </ns1:getRegisteredEventCallback>
   </SOAP-ENV:Body>
</SOAP-ENV:Envelope>
```
**Example HTML**
```xml
<?xml version="1.0" encoding="UTF-8"?>
<soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
   <soap:Body>
      <ns3:getRegisteredEventCallbackResponse xmlns:ns3="http://ecommerce.resurs.com/v4/msg/configuration" xmlns:ns2="http://ecommerce.resurs.com/v4/msg/exception">
         <uriTemplate>https://www.netcurl.org/?callback=BOOKED&ts=1586864389</uriTemplate>
      </ns3:getRegisteredEventCallbackResponse>
   </soap:Body>
</soap:Envelope>
```
