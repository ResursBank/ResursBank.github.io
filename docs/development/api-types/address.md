---
layout: page
title: Address
permalink: /development/api-types/address/
parent: Api Types
grand_parent: Development
---



# address 
Created by Benny, last modified on 2017-02-22
The customer address details.  
Contains elements as defined in the following table.

| Component   | Type                                  | Occurs | Nillable? | Description                                                                                                                                                                   |
|-------------|---------------------------------------|--------|-----------|-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| fullName    | **[nonEmptyString](simple-types...)** | 0..1   | No        | The full (possibly composite name) of the customer. Note: if you use firstName and lastName then fullName is not required                                                     |
| firstName   | **[nonEmptyString](simple-types...)** | 0..1   | No        | If available, the first name of the customer. Note: if you use fullName then firstName and lastName are not required                                                          |
| lastName    | **[nonEmptyString](simple-types...)** | 0..1   | No        | If available, the last name of the customer. Note: if you use fullName then firstName and lastName are not required                                                           |
| addressRow1 | string                                | 1..1   | No        | The first row of the customer address.                                                                                                                                        |
| addressRow2 | **[nonEmptyString](simple-types...)** | 0..1   | No        | The second row of the customer address. In practice: Located as a second line on printouts and graphics, like invoices.Attn. If you are using this tag do not leave it empty! |
| postalArea  | **[nonEmptyString](simple-types...)** | 1..1   | No        | The postal area.                                                                                                                                                              |
| postalCode  | **[nonEmptyString](simple-types...)** | 1..1   | No        | The postal code.                                                                                                                                                              |
| country     | **[countryCode](countrycode)**        | 1..1   | No        | The country in which this address is located.                                                                                                                                 |

> Do not do any logical operations on the strings, for example to
> determine if the customer is a NATURAL or LEGAL.

