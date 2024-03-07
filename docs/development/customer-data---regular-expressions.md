---
layout: page
title: Customer Data - Regular Expressions
permalink: /development/customer-data---regular-expressions/
parent: Development
---


# Customer data - Regular expressions 
Created by Joachim Andersson, last modified by Benny on 2021-09-17
Note!
If you are using Resurs Checkout, note that the customer input is
country specific for the test-/production account that you are using. If
you are unsure of which country your account is setup for, please
contact us.
### GovernmentId Legal
  
| Country | Expression                                                                 |
|---------|----------------------------------------------------------------------------|
| Sweden  | `^(16\d{2}|18\d{2}|19\d{2}|20\d{2}|\d{2})(\d{2})(\d{2})(\-|\+)?([\d]{4})$` |
| Norway  | `^([89]([ |-]?[0-9]){8})$`                                                 |
| Finland | `^((\d{7})(\-)?\d)$`                                                       |
| Denmark |                                                                            |
  
### Natural
  
| Country | Expression                                                                                                                                           |
|---------|------------------------------------------------------------------------------------------------------------------------------------------------------|
| Sweden  | ` ``^(18\d{2}|19\d{2}|20\d{2}|\d{2})(0[1-9]|1[0-2])([0][1-9]|[1-2][0-9]|3[0-1])(\-|\+)?([\d]{4})$`` `                                                |
| Norway  | ` ``^([0][1-9]|[1-2][0-9]|3[0-1])(0[1-9]|1[0-2])(\d{2})(\-)?([\d]{5})$`` `                                                                           |
| Finland | `^([\d]{``6``})[\+\-A]([\d]{``3``})([0123456789ABCDEFHJKLMNPRSTUVWXY])$`                                                                             |
| Denmark | `^((``3``[``0``-``1``])|([``1``-``2``][``0``-``9``])|(``0``[``1``-``9``]))((``1``[``0``-``2``])|(``0``[``1``-``9``]))(\d{``2``})(\-)?([\d]{``4``})$` |
  
  
------------------------------------------------------------------------
### Phone number
  
| Country | Expression                                                                                                                                                                                                                                                                                                                         |
|---------|------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| Sweden  | ~~`^(0|\+46|0046)[ |-]?(200|20|70|73|76|74|[1-9][0-9]{0,2})([ |-]?[0-9]){5,8}$`~~^(\\+46\|0046\|0\|)\[ \|-\]?(200\|20\|70\|73\|76\|74\|46\|4\[0-5,7-9\]\[0-9\]?\|\[1-3,5-9\]\[0-9\]{0,2})(\[ \|-\]?\[0-9\]){5,8}\$ - OBS. the double backslahes (\\) are needed when using the reg.exp in JavaScript since JavaScript removes one. |
| Norway  | `^(\+47|0047|)?[ |-]?[2-9]([ |-]?[0-9]){7,7}$`                                                                                                                                                                                                                                                                                     |
| Finland | `^((\+358|00358|0)[-| ]?(1[1-9]|[2-9]|[1][0][1-9]|201|2021|[2][0][2][4-9]|[2][0][3-8]|29|[3][0][1-9]|71|73|[7][5][0][0][3-9]|[7][5][3][0][3-9]|[7][5][3][2][3-9]|[7][5][7][5][3-9]|[7][5][9][8][3-9]|[5][0][0-9]{0,2}|[4][0-9]{1,3})([-| ]?[0-9]){3,10})?$`                                                                        |
| Denmark | `^(\+45|0045|)?[ |-]?[2-9]([ |-]?[0-9]){7,``7}$`                                                                                                                                                                                                                                                                                   |
  
  
### E-mail
  
[TABLE]
  
  
### Card number
  
| Country | Expression                                                          |
|---------|---------------------------------------------------------------------|
| All     | `^([1-9][0-9]{3}[ ]{0,1}[0-9]{4}[ ]{0,1}[0-9]{4}[ ]{0,1}[0-9]{4})$` |
  