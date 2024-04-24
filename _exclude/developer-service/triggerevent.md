---
layout: page
title: Triggerevent
permalink: /developer-service/triggerevent/
parent: Developer Service
---


# triggerEvent 

# *triggerEvent*
*Triggers a test event. This is for testing the callback functionality.*
**Input (Literal)**
  
| Name      | Type                                                                 | Occurs | Nillable? | Description                                    |
|-----------|----------------------------------------------------------------------|--------|-----------|------------------------------------------------|
| eventType | **[i](paymentMethod_1475649.html)[d](Simple-Types..._1475653.html)** | 1..1   | No        | The type of event to be triggered.             |
| param     | string                                                               | 0..\*  | No        | The data to be used when triggering the event. |
  
**Output (Literal)  
***None** ***
**Faults**
  
| Name                    | Content                                             | Description                                                   |
|-------------------------|-----------------------------------------------------|---------------------------------------------------------------|
| ECommerceErrorException | **[ECommerceError](ECommerceError_1475945.html)**   | Failed to trigger the specified event. See error for details. |
  
  
  
For available callback-types please see the [**callback
page**](Callbacks_327724.html) and scroll down to Available
callback-type
