---
layout: page
title: Payment
permalink: /development/api-types/payment/
parent: Api Types
grand_parent: Development
---



# payment 
Created by Benny, last modified on 2017-02-27

The detailed payment information. In addition to the overall information
about the payment, it also contains full details about all part payments
associated with the payment. The part payments are the complete history
of the payment. (The current state of the payment, if needed, must be
calculated client side.)  
Contains elements as defined in the following table.

| Component         | Type                                                               | Occurs | Nillable? | Description                                                                                                                                                                    |
|-------------------|--------------------------------------------------------------------|--------|-----------|--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| id                | **[id](simple-types...)**                                          | 1..1   | No        | The payment identity.                                                                                                                                                          |
| totalAmount       | **[positiveDecimal](simple-types...)**                             | 1..1   | No        | The current total amount of the part payments making up this payment.                                                                                                          |
| metaData          | **[mapEntry](mapentry)**                                           | 0..\*  | No        | The meta data associated with the payment as key/value pairs.                                                                                                                  |
| limit             | **[positiveDecimal](simple-types...)**                             | 1..1   | No        | The limit (if any) associated with the payment. This could for instance be the credit amount applied for.                                                                      |
| paymentDiffs      | **[paymentDiff](paymentdiff)**                                     | 0..\*  | No        | The parts that make up this payment.                                                                                                                                           |
| customer          | **[customer](customer)**                                           | 1..1   | No        | The payment customer information.                                                                                                                                              |
| deliveryAddress   | **[address](address)**                                             | 0..1   | No        | The delivery address, if one has been specified.                                                                                                                               |
| booked            | [dateTime](http://www.w3schools.com/schema/schema_dtypes_date.asp) | 1..1   | No        | The timestamp of the payment booking.                                                                                                                                          |
| finalized         | [dateTime](http://www.w3schools.com/schema/schema_dtypes_date.asp) | 0..1   | No        | The timestamp of the latest payment finalization.                                                                                                                              |
| paymentMethodId   | **[id](simple-types...)**                                          | 1..1   | No        | The identity of the payment method used for the payment.                                                                                                                       |
| paymentMethodName | String                                                             | 0..1   | Yes       | The name of the payment method.                                                                                                                                                |
| fraud             | boolean                                                            | 1..1   | No        | Whether or not the payment has been flagged as fraudulent.                                                                                                                     |
| frozen            | boolean                                                            | 1..1   | No        | Whether or not the payment has been frozen by the fraud system for a more detailed control.                                                                                    |
| status            | **[paymentStatus](paymentstatus)**                                 | 0..100 | No        | The status of the payment as a list of status values.                                                                                                                          |
| storeId           | **[id](simple-types...)**                                          | 0..1   | No        | The identity of the actual store for the representative. This ID is defined by Resurs Bank. You can receive the list of stores tied to your user (representative) if you wish. |
| paymentMethodType | **[paymentMethodType](paymentmethodtype)**                         | 1..1   | No        | The type the payment, i e invoice, new account etc.                                                                                                                            |
| totalBonusPoints  | nonNegativeInteger                                                 | 1..1   | No        | The current sum of bonus points of the payment's diffs making up this payment.                                                                                                 |

