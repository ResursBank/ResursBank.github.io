---
layout: page
title: Issigned
permalink: /developer-service/issigned/
parent: Developer Service
---


# isSigned 

# *isSigned*
*Determines whether or not a specific agreement has been successfully
signed.*
**Input (Literal)**
  
| Name      | Type                                   | Occurs | Nillable? | Description                                                                                         |
|-----------|----------------------------------------|--------|-----------|-----------------------------------------------------------------------------------------------------|
| signingId | **[id](Simple-Types..._1475653.html)** | 1..1   | No        | The identity of the signing session. Please note that this has to be from the signing URL directly. |
  
**Output (Literal)**
  
| Name   | Type    | Occurs | Nillable? | Description                              |
|--------|---------|--------|-----------|------------------------------------------|
| return | boolean | 1..1   | No        | Whether or not the agreement was signed. |
  
  
**Faults**
  
| Name                    | Content                                             | Description                                                                                     |
|-------------------------|-----------------------------------------------------|-------------------------------------------------------------------------------------------------|
| ECommerceErrorException | **[ECommerceError](ECommerceError_1475945.html)**   | Failed to determine whether or not the agreement wassuccessfully signed. See error for details. |
  
### Introduction
A function to see if the
[signing](Concepts-and-Domain_950279.html#ConceptsandDomain-Anchor_Signing)
has been made. The
[signing](Concepts-and-Domain_950279.html#ConceptsandDomain-Anchor_Signing)
is for completing a purchase when Resurs Bank says
[signing](Concepts-and-Domain_950279.html#ConceptsandDomain-Anchor_Signing)
is required. 
