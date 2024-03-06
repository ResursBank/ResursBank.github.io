---
layout: page
title: Basicpayment
permalink: /development/api-types/basicpayment/
parent: Api Types
grand_parent: Development
---



# basicPayment 
Created by Benny, last modified on 2017-02-22
The basic payment information returned by a search. It does not contain
all payment details, but enough to be presented in a list of links to
the full details.  
Contains elements as defined in the following table.
  
| Component         | Type                                                | Occurs | Nillable? | Description                                                                                                                                                      |
|-------------------|-----------------------------------------------------|--------|-----------|------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| paymentId         | **[id](Simple-Types..._1475653.html)**              | 1..1   | No        | The payment identity.                                                                                                                                            |
| paymentMethodId   | **[id](Simple-Types..._1475653.html)**              | 1..1   | No        | The payment method identity.                                                                                                                                     |
| paymentMethodName | **[nonEmptyString](Simple-Types..._1475653.html)**  | 1..1   | No        | The payment method name.                                                                                                                                         |
| governmentId      | **[nonEmptyString](Simple-Types..._1475653.html)**  | 1..1   | No        | The customer government identity.                                                                                                                                |
| fullName          | string                                              | 1..1   | No        | The full (possibly composite name) of the customer.                                                                                                              |
| booked            | dateTime                                            | 1..1   | No        | The timestamp of the payment booking.                                                                                                                            |
| modified          | dateTime                                            | 0..1   | No        | The timestamp of latest payment modification.                                                                                                                    |
| finalized         | dateTime                                            | 0..1   | No        | The timestamp of the latest payment finalization.                                                                                                                |
| totalAmount       | **[positiveDecimal](Simple-Types..._1475653.html)** | 1..1   | No        | The total payment amount. Please be aware that this is the current total payment amount, i.e. taking into consideration the status of the various payment parts. |
| frozen            | boolean                                             | 1..1   | No        | Whether or not the payment has been frozen by the fraud system for a more detailed control.                                                                      |
| status            | **[paymentStatus](paymentStatus_1475845.html)**     | 0..100 | No        | The status of the payment as a list of status values.                                                                                                            |
  
