---
layout: page
title: Customeridentification
permalink: /development/api-types/customeridentification/
parent: Api Types
grand_parent: Development
---



# customerIdentification 
Created by User2, last modified on 2014-07-17
Information used to identify the customer, in order to be able to
retrieve its bonus.
  
| Component       | Type                                      | Occurs | Nillable? | Description                                                                                                           |
|-----------------|-------------------------------------------|--------|-----------|-----------------------------------------------------------------------------------------------------------------------|
| CHOICE          |                                           | 1..1   |           |                                                                                                                       |
| token           | identificationToken                       | 1..1   | No        | The identification token created by the identifyCustomer function. If the token isn't valid a fault will be returned. |
| customerAccount | [customerCard](customerCard_3440716.html) | 1..1   | No        | Information used to identify the customer, in order to be able to retrieve its bonus.                                 |
  
 
 
 
