---
layout: page
title: paymentMethodType
permalink: /development/api-types/paymentmethodtype/
parent: Api Types
grand_parent: Development
---



# paymentMethodType 
Payment methods are divided into groups. This information can be used to
retrieve orders based on which payment method type was used.

| Value            | Description                                                                                                                                                                                                                                                                                                                                                                                 |
|------------------|---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| INVOICE          | The customer wants to have an invoice sent to him, where he's able to pay the whole amount at once.                                                                                                                                                                                                                                                                                         |
| REVOLVING_CREDIT | The customer wants to start a new account, and finance the purchase with that account's credit limit. The purchase can be paid in a series of installments. In most cases there will be made a branded card sent to customer, depending on how your collaboration with Resurs Bank looks like. A credit application will need to be made, and the customer needs to sign a credit contract. |
| CARD             | Every card issued by Resurs Bank falls into this group, while cards from other banks or credit institutions do NOT! This means that customers which have a branded Resurs card from another of Resurs representatives still can use it in your webshop.                                                                                                                                     |
| BONUS            | Not implemented.                                                                                                                                                                                                                                                                                                                                                                            |

