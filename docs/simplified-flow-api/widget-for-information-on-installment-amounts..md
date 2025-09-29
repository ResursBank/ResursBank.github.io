---
layout: page
title: Widget For Information On Installment Amounts.
permalink: /simplified-flow-api/widget-for-information-on-installment-amounts./
parent: Simplified Flow API
---


# Widget for information on installment amounts. 

If you want to dislay a "pay from xx per month" information on the
product pages, a good idea is to create a widget for configuration.

In this widget the admin will chose a payment method that shall form the
base for the installment information. The admin will then chose the
installment plan (number of months) without interest for this payment
method that gives the lowest amount. The annuity factor for this
selected installment plan shall then be multiplied with each product's
price to get the amount to present at the product pages.

The widget must:

1.  Have the possibility to be switched on and off, if this shall be
    used in the shop or not.
2.  Only show the payment methods available for part payment, that is
    only display methods with tag
    \<specificType\>PART_PAYMENT\</specificType\> or
    \<specificType\>REVOLVING_CREDIT\</specificType\> for selection.
3.  Present the different number of months/installment plans for the
    payment method selected in step 2.
4.  Have a configurable minimum price. The widget shall only be
    displayed for products which price, including VAT, is within the
    price range of this given minimum price and the amount from tag
    maxLimit from getPaymentMethods. This minimum price is to ensure
    that the monthly installment isn't below SEK 150, which is the lower
    limit for which a bill is sent from Resurs.
The prices should be rounded up to the next even amount.

You can collect available annuity factors by the ECom library.

Cache as much as possible to avoid unnecessary calls to ECom.

