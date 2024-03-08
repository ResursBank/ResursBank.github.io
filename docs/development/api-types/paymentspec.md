---
layout: page
title: Paymentspec
permalink: /development/api-types/paymentspec/
parent: Api Types
grand_parent: Development
---



# paymentSpec 
Created by Benny, last modified by Thomas Tornevall on 2023-12-21
The payment details. In it's simplest form it's just sum, i.e.
totalAmount and totalVatAmount are set, but there are no specLines. If
nothing else is said you shall send specLines .  
Contains elements as defined in the following table.

| Component      | Type                                   | Occurs | Nillable? | Description                                                                                                                                                                                                                  |
|----------------|----------------------------------------|--------|-----------|------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| specLines      | **[specLine](specline)**               | 0..\*  | No        | The list of payment lines. In the case you're sending a simple payment, without lines, this parameter should be left empty. Sending payment lines may, or may not, be mandatory, depending on the contract with Resurs Bank. |
| totalAmount    | **[positiveDecimal](simple-types...)** | 1..1   | No        | The total payment amount. The sum of all line amounts (if there are lines supplied) including VAT. If this payment is without lines this is the only value to be set on the payment spec.                                    |
| totalVatAmount | decimal                                | 0..1   | Yes       | The total VAT amount of the payment when there are specification lines supplied. If there are no lines this fileld must be empty (null).                                                                                     |

### Paymentspec - speclines
> Observe that in order to have an invoice with specified order data,
> make sure to include the speclines in the web service call.

specLines are not mandatory for processing payments.

specLines can vary between start, finalize, credit and annul. It doesn't
matter. Only the sum matter.

specLines make better invoices and help the merchant

The code below shows an example of one paymentSpec row when calling
startPaymentSession method

**paymentSpec example in bookPayment**

### Paymentspec - rounding
[see Rounding](rounding)

