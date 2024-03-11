---
layout: page
title: Ecommerceerror
permalink: /development/api-types/ecommerceerror/
parent: Api Types
grand_parent: Development
---



# ECommerceError 
All errors/exception are returned as ECommerceError  
Contains elements as defined in the following table. 

| Component            | Type                                  | Occurs | Nillable? | Description                                                                           |
|----------------------|---------------------------------------|--------|-----------|---------------------------------------------------------------------------------------|
| errorTypeDescription | **[nonEmptyString](simple-types...)** | 1..1   | No        | The textual description of the error type.                                            |
| errorTypeId          | int                                   | 1..1   | No        | Indicates wich kind of error this is.                                                 |
| fixableByYou         | boolean                               | 1..1   | No        | "If this error has been avoided with some other input" = "It's a Resurs Bank problem" |
| userErrorMessage     | **[nonEmptyString](simple-types...)** | 1..1   | No        | An error message intended for the user of the web shop. This message must be shown!   |

