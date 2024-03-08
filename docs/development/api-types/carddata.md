---
layout: page
title: Carddata
permalink: /development/api-types/carddata/
parent: Api Types
grand_parent: Development
---



# cardData 
Created by Joachim Andersson, last modified by Thomas Tornevall on
2023-12-27
 The card payment specification data. Can be used for both card and
account.

> Only set one of CardNumber and Amount, both should never be
> specified.If agreed upon with Resurs Bank, the merchant can let the
> customer use an existing card without entering a card number, Resurs
> Bank will retrieve the card/account from the system and charge it. In
> this case both fields should be left empty, only the governmental ID
> is sent in and an e-signing will be raised.

| Component  | Type                                  | Occurs | Nillable? | Description                                                                                                                                    |
|------------|---------------------------------------|--------|-----------|------------------------------------------------------------------------------------------------------------------------------------------------|
| cardNumber | string                                | 0..1   | Yes       | If it is a purchase with an existing card specify the card/account number here.                                                                |
| amount     | **[nonEmptyString](simple-types...)** | 0..1   | Yes       | If customer applies for a new card/account, specify the credit amount that is applied for. If it is purchase with existing card omit this tag. |

