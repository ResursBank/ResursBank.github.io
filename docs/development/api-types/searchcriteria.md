---
layout: page
title: Searchcriteria
permalink: /development/api-types/searchcriteria/
parent: Api Types
grand_parent: Development
---



# searchCriteria 
Created by Benny, last modified by Daniel on 2020-02-10
A set of search criteria.  
Contains elements as defined in the following table.
  
| Component       | Type                                                             | Occurs | Nillable? | Description                                                                                                                                                                                                                                                                                                                                                    |
|-----------------|------------------------------------------------------------------|--------|-----------|----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| anyId           | **[id](Simple-Types..._1475653.html)**                           | 0..1   | No        | Any identity associated with the payment, not just the payment identity. This includes the transaction identity, the invoice and credit note numbers, as well as the order number of any payment part belonging to the payment. If the exact payment identity is known, it is generally a better idea to use the getPayment() method as that is a lot quicker. |
| paymentMethodId | **[id](Simple-Types..._1475653.html)**                           | 0..1   | No        | The identity of the payment method.                                                                                                                                                                                                                                                                                                                            |
| governmentId    | **[nonEmptyString](Simple-Types..._1475653.html)**               | 0..1   | No        | The desired customer government identity.                                                                                                                                                                                                                                                                                                                      |
| customerName    | string                                                           | 0..1   | No        | The desired customer name. Please be aware that searches will be performed on the full (possibly composite name) of the customer.                                                                                                                                                                                                                              |
| bookedFrom      | [dateTime](https://www.w3schools.com/xml/schema_dtypes_date.asp) | 0..1   | No        | The earliest desired payment booking timestamp.                                                                                                                                                                                                                                                                                                                |
| bookedTo        | [dateTime](https://www.w3schools.com/xml/schema_dtypes_date.asp) | 0..1   | No        | The latest desired payment booking timestamp.                                                                                                                                                                                                                                                                                                                  |
| modifiedFrom    | [dateTime](https://www.w3schools.com/xml/schema_dtypes_date.asp) | 0..1   | No        | The earliest desired payment modification timestamp.                                                                                                                                                                                                                                                                                                           |
| modifiedTo      | [dateTime](https://www.w3schools.com/xml/schema_dtypes_date.asp) | 0..1   | No        | The latest desired payment modification timestamp.                                                                                                                                                                                                                                                                                                             |
| finalizedFrom   | [dateTime](https://www.w3schools.com/xml/schema_dtypes_date.asp) | 0..1   | No        | No The earliest desired payment finalization timestamp.                                                                                                                                                                                                                                                                                                        |
| finalizedTo     | [dateTime](https://www.w3schools.com/xml/schema_dtypes_date.asp) | 0..1   | No        | The latest desired payment finalization timestamp.                                                                                                                                                                                                                                                                                                             |
| amountFrom      | **[positiveDecimal](Simple-Types..._1475653.html)**              | 0..1   | No        | The minimum desired total payment amount. Please be aware that searches will be performed on the current total payment amount, i.e. taking taking into consideration the status of the various payment parts                                                                                                                                                   |
| amountTo        | **[positiveDecimal](Simple-Types..._1475653.html)**              | 0..1   | No        | The maximum desired total payment amount. Please be aware that searches will be performed on the current total payment amount, i.e. taking taking into consideration the status of the various payment parts.                                                                                                                                                  |
| bonusFrom       | nonNegativeInteger                                               | 0..1   | Yes       | The minimum desired total payment bonus amount. Please be aware that searches will be performed on the current total payment bonus amount, i.e. not taking into consideration the status of the various payment diffs.                                                                                                                                         |
| bonusTo         | nonNegativeInteger                                               | 0..1   | Yes       | The maximum desired total payment bonus amount. Please be aware that searches will be performed on the current total payment bonus amount, i.e. not taking into consideration the status of the various payment diffs.                                                                                                                                         |
| frozen          | boolean                                                          | 0..1   | No        | The payment freeze status.                                                                                                                                                                                                                                                                                                                                     |
| withMetaData    | **[withMetaData](withMetaData_1475826.html)**                    | 0..1   | No        | The desired meta data.                                                                                                                                                                                                                                                                                                                                         |
| statusSet       | **[paymentStatus](paymentStatus_1475845.html)**                  | 0..100 | No        | List of the statuses the payment must have.                                                                                                                                                                                                                                                                                                                    |
| statusNotSet    | **[paymentStatus](paymentStatus_1475845.html)**                  | 0..100 | No        | List of the statuses the payment must not have                                                                                                                                                                                                                                                                                                                 |
  