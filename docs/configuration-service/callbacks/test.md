---
layout: page
title: Test
permalink: /configuration-service/callbacks/test/
parent: Callbacks
grand_parent: Configuration Service
---


# TEST 
Test the callback mechanism. Can be used in integration testing to
assure that communication works. A call is made
to [DeveloperService](https://test.resurs.com/docs/x/XIUW) (`triggerTestEvent`)
and Resurs Bank immediately does a callback. Note that TEST callback
must be registered in the same way as all the other callbacks before it
can be used.
  
|           | Name                                             | Description                                          |
|-----------|--------------------------------------------------|------------------------------------------------------|
| ID        | `TEST`                                           | The test event ID.                                   |
| Parameter | `param1`, `param2`, `param3`, `param4`, `param5` | Parameters to test a succesful roundtrip (see below) |
  
### Using the test callback

If a representative calls `DeveloperService.triggerTestEvent(...)` with
param1 = 1 param2 = 2, param3 = 3, param4 = 4, param5 = 5, and he has
previously registered the following URL:

``` syntaxhighlighter-pre
http://hosten.se/kontexten/funktionen.html?first={param1}&nr2={param2}&nr3={param3}&nr4={param4}&last={param5}
```

with no digest or checksum, then he will get a call to:

``` syntaxhighlighter-pre
http://hosten.se/kontexten/funktionen.html?first=1&nr2=2&nr3=3&nr4=4&last=5
```

Note that the test event is placed in the queue, just like all other
events. If they can not be delivered immediately, the system continues
to try for a month ...

**Example**

``` syntaxhighlighter-pre
<!--Register callback TEST-->
<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:con="http://ecommerce.resurs.com/v4/msg/configure">
   <soapenv:Header/>
   <soapenv:Body>
      <con1:registerEventCallback xmlns:con1="http://ecommerce.resurs.com/v4/msg/configuration">
       <eventType xmlns="">TEST</eventType>
       <uriTemplate xmlns="">http://host.com/?merchant=ResursBank&amp;event-type=TEST&amp;par1={param1}&amp;par2={param2}&amp;par3={param3}&amp;par4={param4}&amp;par5={param5}</uriTemplate>
       </con1:registerEventCallback>
   </soapenv:Body>
</soapenv:Envelope>
 
<!--Get callback TEST-->
<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:con="http://ecommerce.resurs.com/v4/msg/configuration">
   <soapenv:Header/>
   <soapenv:Body>
      <con:getRegisteredEventCallback>
         <eventType>TEST</eventType>
      </con:getRegisteredEventCallback>
   </soapenv:Body>
</soapenv:Envelope>
<!--Trigger callback TEST-->
<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:dev="http://ecommerce.resurs.com/v4/msg/developer">
   <soapenv:Header/>
   <soapenv:Body>
      <dev:triggerEvent>
         <eventType>TEST</eventType>
         <param>Alfa</param>
         <param>Bravo</param>
         <param>Charlie</param>
         <param>Delta</param>
         <param>Echo</param>
      </dev:triggerEvent>
   </soapenv:Body>
</soapenv:Envelope>
<!--Result: http://host.com/?merchant=ResursBank&event-type=TEST&par1=Alfa&par2=Bravo&par3=Charlie&par4=Delta&par5=Echo -->
<!--Remove callback TEST-->
<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:con="http://ecommerce.resurs.com/v4/msg/configure">
   <soapenv:Header/>
   <soapenv:Body>
      <con1:unregisterEventCallback xmlns:con1="http://ecommerce.resurs.com/v4/msg/configuration">
         <eventType>TEST</eventType>
      </con1:unregisterEventCallback>
   </soapenv:Body>
</soapenv:Envelope>
```
