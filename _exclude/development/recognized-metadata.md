---
layout: page
title: Recognized Metadata
permalink: /development/recognized-metadata/
parent: Development
---


# Recognized metadata 
Created by Tobias, last modified by Benny on 2017-03-02
### What is metadata?
In short, it is key/value data piggybacked on the payment.
Read here: [Associated
metadata](Concepts-and-Domain_950279.html#ConceptsandDomain-Anchor_AssociatedMetadata)
### Recognized keys and meaning
Generally we don't look at the metadata. Listed below are the exceptions
to that rule.
  
| Key name      | Expected format   | Description                                                                                                                                                                                                                                                                |
|---------------|-------------------|----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| invoiceExtRef | String. 46 chars. | In the case that the payment generates [invoices and credit notes](Concepts-and-Domain_950279.html#ConceptsandDomain-Anchor_InvoicesAndCreditNotes) this value will be printed as 'Your reference', for example the sales person responsible. Mostly for company invoices. |
| CustomerId    | String. 20 chars. | In the case that the payment generates [invoices and credit notes](Concepts-and-Domain_950279.html#ConceptsandDomain-Anchor_InvoicesAndCreditNotes) this value will be printed as 'Customer Id'                                                                            |
  
 
![](../../attachments/3440674/5570827.png)
