---
layout: page
title: Unregister Event Callback
permalink: /configuration-service/unregister-event-callback/
parent: Configuration Service
---

# Unregister Event Callback 
````
unregisterEventCallback
````
Unregisters an existing event callback.
  
**Input(Literal)**
  
| Name      | Type | Occurs | Nillable? | Description |
|-----------|------|--------|-----------|-------------|
| eventType | id   | 1..1   | No        |             |
  
  
**Faults**
  
| Name                    | Content                                             | Description                                                 |
|-------------------------|-----------------------------------------------------|-------------------------------------------------------------|
| ECommerceErrorException | **[ECommerceError](/development/api-types/ecommerceerror)**   | Failed to unregister event callback. See error for details. |
  
### Introduction
This method is to unregister a callback event. For more on how this is
done please read about Callbacks **[here](/callbacks)**.
