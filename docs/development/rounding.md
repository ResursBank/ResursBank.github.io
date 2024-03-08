---
layout: page
title: Rounding
permalink: /development/rounding/
parent: Development
---


# Rounding 
Created by Gert, last modified by Thomas Tornevall on 2023-12-27
> Please, do not round numbers on your side. If calculations result in
> more than 2 decimals, please supply all decimals in the invocations of
> our service.Later, the API will return five (5) decimals in the
> getPayment-response - no matter how many decimals where sent in
> earlier.

The rounding of purchase and VAT values is carried out by Resurs Bank’s
web services, based on a set of rules, and thus is not mandatory.

We always respect the price values (except VAT values) as total amount
in each row and the payment's total amount, sent to us by the
representative.  
However, there has to be a consistency between the received values and
the ones we calculate ourselves taking into account of the rounding
rules.

The service compensates for errors less than, or equal to, 0.05 currency
units (i.e. no matter which currency).  
This error threshold must be respected in both the “**specLines**”
values and in the “**totalAmount**” and “**totalVatAmount**” values
within the “**paymentSpect**” XML tag, [see paymentSpec](paymentspec).

To summarize:  

**1.** Representatives should send in the price and VAT values as is,
without rounding, and let us calculate them.  
Precision is not an issue as our routines are capable of dealing with a
great number of decimals.

**2.** If you perform rounding calculations before invoking the
e-Commerce service, it may produce an error if the error margin is
exceeded.  
We will perform rounding calculations in any case as described below.  

**The web services rounding rules are:**

**- Individual items\*:**  
`Given Item Net Price (without VAT) = Given row value / ( ( 1 + VAT percent / 100 ) * Quantity )`  
`Given Total VAT Amount = ( VAT percent / 100 ) * Total !Calculated! Item’s Net Price`  

**- Total Amount:**  
`Given Total Price Amount with VAT = Σ ( Given Total Individual Price Amount )`  
`Given Total VAT Amount = Σ ( Given Total Individual VAT Amount )`  

\* Refers to each “specLines” entry.

**Example:**  
One of the most common sources of \[rounding\] errors is the
representative adding the sales price with VAT and sending that sum to
us.  
A representative sells the following item: 1'' x 4'' building board,
price: 15.71 SEK (includes VAT).  
Upon receiving this value we recalculate it to a net price: 15,71 / 1,25
= 12,568.  
Now, say that the following is set within one “specLines” XML tag:  

| Quantity                  | 1000              |
|---------------------------|-------------------|
| Net Price per Item        | 12,57 (!= 12,568) |
| VAT                       |  25%              |
| Total VAT                 |  3142,00          |
| Total Price including VAT | 15710,00          |

**Upon recalculation:**  
\* 15710,00 / (1,25 \* 1000 ) = 12,568 (!= 12,57)  
\* 0,25 \* 1000 \* 12,568 = 3142,00 = 3142,00

The difference between the received and calculated net price is:  12,57
– 12,568 = 0,002.  
This difference, being within the error margin, leads to 12,568 being
used instead of 12,57. 

