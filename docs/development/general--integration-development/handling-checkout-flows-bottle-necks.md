---
layout: page
title: Handling Checkout-Flows Bottle Necks
permalink: /development/general--integration-development/handling-checkout-flows-bottle-necks/
grand_parent: Development
parent: General - Integration Development
---


# Handling checkout-flows bottle necks 
Created by Thomas Tornevall, last modified on 2020-11-30
As described at the [Resurs Checkout page, there might be some
bottlenecks (moment
22)](https://test.resurs.com/docs/pages/viewpage.action?pageId=5570788#Iframecommunication(ResursCheckoutJS)-Themoment22)
to solve in some flows. This page is trying to visualize the respective
flow. 

*Many stores are designed to take payment before creating an order. 
Bankwire and Check modules are designed to create an order, before the
customer is able to pay, and that should be fairly obvious why, but real
time payment methods (like paypal or credit card), an order is created
AFTER the payment is completed ([Full quote source from
Prestashop](https://www.prestashop.com/forums/topic/362916-problem-prestashop-sends-order-confirmation-email-before-payment/?tab=comments#comment-1855962)).*

#### This said, Resurs Bank Simplified flow is by best practice the flow that handles payment in a proper way:

#### Meanwhile RCO runs a more uncommon way

