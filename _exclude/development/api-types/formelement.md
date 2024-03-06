---
layout: page
title: Formelement
permalink: /development/api-types/formelement/
parent: Api Types
grand_parent: Development
---



# formElement 
Created by Benny, last modified on 2017-02-27
The detailed specification of the form element. While new form elements
might pop up, [we have a few which you can look out
for](Concepts-and-Domain_950279.html#ConceptsandDomain-Anchor_LimitApplications)
(if you happen to have the data the form element requests, or need the
data from a particular form element). 
# Attributes
  
| Name      | Type         | Required? |
|-----------|--------------|-----------|
| type      | string       | Yes       |
| name      | string       | No        |
| mandatory | boolean      | No        |
| length    | int          | No        |
| Min       | int          | No        |
| Max       | int          | No        |
| uint      | string       | No        |
| level     | unsignedByte | No        |
  
  
Contains elements as defined in the following table.
  
| Component      | Type                              | Occurs | Nillable? | Description                                                                                                                                                                                                              |
|----------------|-----------------------------------|--------|-----------|--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| label          | string                            | 0..1   | No        | The form element label. Typically, this is displayed as the field header.                                                                                                                                                |
| description    | string                            | 0..1   | No        | A textual description of the form element. Typically, this is displayed when the user hovers the mouse pointer over the element.                                                                                         |
| format         | string                            | 0..1   | No        | The form element format as a regular expression. When submitted, the form element will be validated against this, and it may be a good idea to use this to validate the value of the element already on the client side. |
| format-message | string                            | 0..1   | No        | The message to be presented when the format validation fails.                                                                                                                                                            |
| default-value  | string                            | 0..1   | No        | The default value.                                                                                                                                                                                                       |
| option         | **[option](option_1475765.html)** | 0..\*  | No        | If the form element has a predefined set of possible values, these are presented as a list.                                                                                                                              |
  
