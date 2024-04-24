---
layout: page
title: Customercard
permalink: /development/api-types/customercard/
parent: Api Types
grand_parent: Development
---



# customerCard 


| Component    | Type                         | Occurs | Nillable? | Description                                                                 |
|--------------|------------------------------|--------|-----------|-----------------------------------------------------------------------------|
| SEQUENCE     |                              | 1..1   |           |                                                                             |
| governmentId | string                       | 1..1   | No        | The government identity of the customer for which to retrieve bonus points. |
| customerType | [customerType](/development/api-types/customertype/) | 0..1   | No        | The type of customer to retrieve.                                           |
| cardNumber   | string                       | 1..1   | No        | A card number tied to the supplied government ID in Resurs Bank.            |

