---
layout: page
title: Create Part Payment Widget
permalink: /development/create-part-payment-widget/
parent: Development
---


# Create part payment widget 
## Create a widget which displays the suggested part payment price on product pages.

### You need to be able to configure the following:
1.  **On/Off**:  
    Ability to turn feature on/off.
2.  **Min.price:**  
    Only display the widget for products which price, incl. tax, is
    within the given range.  
    Where productPrice between Min.price and
    \<maxLimit\>50000.00\</maxLimit\>  
    Get maxLimit using api [getPaymentMethods](/simplified-flow-api/getpaymentmethods/)
3.  **Payment method:**  
    You should be able to configure which payment method part payment
    data is based on.  
    Only show payment methods that are eligible for installment.  
    Where \<specificType\>PART_PAYMENT\</specificType\> or
    \<specificType\>REVOLVING_CREDIT\</specificType\>  
    Get specificType using api [getPaymentMethods](/simplified-flow-api/getpaymentmethods/)
4.  **Months:**  
    Choose number of months for the selected payment method in step 3.  
    Get available annuity factors using api
    [getAnnuityFactors](/simplified-flow-api/getannuityfactors/)

### On product pages.
"Installment from 129 SEK - 12 month. *Read more...*"

- The payment method used for part payments include a min. max. amount
  on its own, which we also need to check before displaying the widget.
- Prices should be rounded to next integer.
- Read more.. can be a Pop-Up window
  populated using [getCostOfPurchaseHtml](/simplified-flow-api/getcostofpurchasehtml/).

