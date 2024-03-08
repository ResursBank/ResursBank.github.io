---
layout: page
title: Paymentsession
permalink: /development/api-types/paymentsession/
parent: Api Types
grand_parent: Development
---



# paymentSession 
Created by Benny, last modified on 2017-02-27
The detailed information about the payment session.  
Contains elements as defined in the following table.

| Component                          | Type                                                                         | Occurs | Nillable? | Description                                                                                                                                                                                 |
|------------------------------------|------------------------------------------------------------------------------|--------|-----------|---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| id                                 | **[id](simple-types...)**                                                    | 1..1   | No        | The identity of the payment session. If one was specified by the representative, it will be used, otherwise it will be generated.                                                           |
| expirationTime                     | [dateTime](http://www.w3schools.com/schema/schema_dtypes_date.asp)           | 1..1   | No        | When the payment session expires. Sessions will be automatically pruned after the expiration time, and if the payment is still valid, a new session must be created.                        |
| limitApplicationFormAsObjectGraph  | **[limitApplicationFormAsObjectGraph](limitapplicationformasobjectgraph)**   | 1..1   | No        | The limit application form as a graph of object. This is for use by representatives that want to generate the form themselves.                                                              |
| limitApplicationFormAsCompiledForm | **[limitApplicationFormAsCompiledForm](limitapplicationformascompiledform)** | 1..1   | No        | The limit application form as compiled HTML. This is for use by representatives that want to use the form created by Resurs Bank. Note: if no form action was supplied, this will be empty. |

