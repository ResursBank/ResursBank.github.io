---
layout: page
title: Bookingresult
permalink: /development/api-types/bookingresult/
parent: Api Types
grand_parent: Development
---



# bookingResult 
Created by Benny, last modified on 2017-02-22
The result of the payment booking attempt.  
Contains elements as defined in the following table.

| Component          | Type                                         | Occurs | Nillable? | Description                                                                                         |
|--------------------|----------------------------------------------|--------|-----------|-----------------------------------------------------------------------------------------------------|
| paymentId          | **[id](simple-types...)**                    | 1..1   | No        | The identity of the payment. Note: this is not the same as the payment session identity.            |
| fraudControlStatus | **[fraudControlStatus](fraudcontrolstatus)** | 1..1   | No        | The result of the fraud control. This is only available if the fraud control was made synchronously |

