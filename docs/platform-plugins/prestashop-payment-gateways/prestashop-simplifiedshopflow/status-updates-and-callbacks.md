---
layout: page
title: Status Updates And Callbacks
nav_exclude: true
permalink: /platform-plugins/prestashop-payment-gateways/prestashop-simplifiedshopflow/status-updates-and-callbacks/
parent: Prestashop Simplifiedshopflow
grand_parent: Prestashop Payment Gateways
---



# Status updates and callbacks 
Orders are very much handled through callbacks from Resurs.
The way callbacks works has less meaning as of today, even if PrestaShop
has some exceptions for them. When Resurs is sending out a callback, the
order management module will check for the current order status (via
getPayment) instead of the callback type sent from Resurs and set a
order state based on the response. The states are customizable from the
administration panel (as long as you include order management as a
module).

![](../../../../attachments/81887234/81887236.png)

Each of the above states can freely be customized, but is always
installed with preferred defaults. When a callback are received from
Resurs, the libary EComPHP will set an internal state integer, that is
mapped to a state configured from PrestaShop.

