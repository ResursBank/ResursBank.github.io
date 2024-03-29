---
layout: page
title: bookingResult
permalink: /development/api-types/bookingresult/
parent: Api Types
grand_parent: Development
---



# bookingResult 

The result of the payment booking attempt.  
Contains elements as defined in the following table.

| Component          | Type                                         | Occurs | Nillable? | Description                                                                                         |
|--------------------|----------------------------------------------|--------|-----------|-----------------------------------------------------------------------------------------------------|
| paymentId          | **[id](/development/api-types/simple-types/)**                    | 1..1   | No        | The identity of the payment. Note: this is not the same as the payment session identity.            |
| fraudControlStatus | **[fraudControlStatus](/development/api-types/fraudcontrolstatus/)** | 1..1   | No        | The result of the fraud control. This is only available if the fraud control was made synchronously |

