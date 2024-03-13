---
layout: page
title: paymentDiffType
permalink: /development/api-types/paymentdifftype/
parent: Api Types
grand_parent: Development
---



# paymentDiffType 
#### The type of payment part.

| Value     | Description                                   |
|-----------|-----------------------------------------------|
| AUTHORIZE | The payment part is an authorization request. |
| DEBIT     | The payment part is a debit request.          |
| CREDIT    | The payment part is a credit request.         |
| ANNUL     | The payment part is an annulment request.     |

#### Types of payment diffs
Today, the system supports the following types of payment diffs:

| Type      | Description                                        | Banking system                                                                  | Order value | When is it used?                        | Comments                                                                                   |
|-----------|----------------------------------------------------|---------------------------------------------------------------------------------|-------------|-----------------------------------------|--------------------------------------------------------------------------------------------|
| AUTHORIZE | Reservation of part / whole of the allotted limit. | Authorization of amounts in accounts.                                           | Increases   | When a purchase is booked.              | In earlier drafts DEBIT has had dual functions, authorization and billing has been done by |
| DEBIT     | Making of a debit.                                 | Transaction of the amount on account.New authorization on the remaining amount. | Unchanged   | When goods are shipped to the customer. | See above                                                                                  |
| CREDIT    | Effecting a crediting.                             | Crediting the amount of the account.                                            | Reduced     | When a return is received.              |                                                                                            |
| ANNUL     | Annulment of the reservation amount.               | New authorization on the remaining amount.                                      | Reduced     | When a booked purchase is canceled.     |                                                                                            |

