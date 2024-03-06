---
layout: page
title: Mapi Checkout Flow
permalink: /platform-plugins/woocommerce/resurs-merchant-api-2-0-for-woocommerce/mapi-checkout-flow/
parent: Woocommerce
grand_parent: Platform Plugins
---



# MAPI Checkout Flow 
Created by Thomas Tornevall, last modified on 2022-12-21
Reserved space for the described MAPI-flow. It very much looks like the
prior flow, with a few enhancements.
## Purchasing with the new Merchant API.
The Merchant API is, like the former simplified shopflow, made to go
with a platform default rules but with some improvements. The
WooCommerce order will (as before) be created first (in *Pending*
status), then Resurs order is placed and finally - depending on the
result - updated to *Processing*. The procedure looks like this:
1.  Purchase button is clicked. WooCommerce starts handling the order,
    setting the first Pending status.
2.  When WooCommerce checks (stock count, etc) are finished, Resurs
    plugin takes over to create the payment. During this process,
    signing the payment also occurs.
3.  When Resurs is done, the order can be either accepted
    (*processing*), rejected (*failed*) or paused (*on-hold*). Depending
    on the outcome, Resurs will redirect customers back, either to the
    final order received-page ("thank you") or a failure-page (if Resurs
    rejects the order, customers redirected to a fail-page will render
    the order to be *canceled*).
4.  Side by side with the above steps, callbacks are also sent from
    Resurs, in case that the customer fails to return to the thank you
    page. This makes sure that the statuses are properly set.
### Visualized Flow
  
|     |
|-----|
  
## How callbacks works
1.  When a purchase is completed and the payment is ready to be handled
    at Resurs side a few callbacks are executed synchronously from
    Resurs. You can see the flow and more information [about the
    callbacks
    here](https://merchant-api.integration.resurs.com/docs/v2/merchant_payments_v2/options#callbacks).
2.  To make sure that the callback received from Resurs is correct, the
    plugin will make a secure request with Resurs to confirm the order
    status, before handling the order locally at WooCommerce side.
3.  When an order is synchronized with Resurs, the order status will
    update to either *processing, on-hold* or *failed*. If t he order is
    set to *on-hold*, this means that more actions could follow. For
    example, an order at Resurs can be temporarily frozen (which is the
    cause of on-hold) and will be pushed further (to *processing*) when
    ready to handle.
