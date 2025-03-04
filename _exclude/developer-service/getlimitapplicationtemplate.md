---
layout: page
title: Getlimitapplicationtemplate
permalink: /developer-service/getlimitapplicationtemplate/
parent: Developer Service
---


# getLimitApplicationTemplate 

# *getLimitApplicationTemplate*
*Retrieves the limit application response template. Normally this is not
necessary, as the form creates this itself. However, if the*
*representative decides to implement the form functionality locally,
without using the features provided by Resurs Bank, this method will
show* *the format of a valid response.*
**Input (Literal)**
  
| Name            | Type                                                | Occurs | Nillable? | Description                        |
|-----------------|-----------------------------------------------------|--------|-----------|------------------------------------|
| paymentMethodId | **[id](Simple-Types..._1475653.html)**              | 1..1   | No        | The identity of the payment method |
| sum             | **[positiveDecimal](Simple-Types..._1475653.html)** | 1..1   | No        | The limit amount.                  |
  
**Output (Literal)**
  
| Name   | Type   | Occurs | Nillable? | Description                                   |
|--------|--------|--------|-----------|-----------------------------------------------|
| return | string | 1..1   | No        | The limit application form response template. |
  
  
**Faults**
  
| Name                    | Content                                             | Description                                                                       |
|-------------------------|-----------------------------------------------------|-----------------------------------------------------------------------------------|
| ECommerceErrorException | **[ECommerceError](ECommerceError_1475945.html)**   | Failed to retrieve the limit application response template. Seeerror for details. |
  
  
  
