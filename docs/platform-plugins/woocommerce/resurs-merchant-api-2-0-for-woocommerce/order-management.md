---
layout: page
title: Order Management
permalink: /platform-plugins/woocommerce/resurs-merchant-api-2-0-for-woocommerce/order-management/
parent: Resurs Merchant Api 2.0 For Woocommerce
grand_parent: Platform Plugins
---



# Order management 
The plugin has functionality built into it for automatically updating
the payment at Resurs Bank when the order is manually edit/updated in
WooCommerce order view.

By default all of these features are enabled when the plugin is enabled
but can be disabled in the settings under
`WooCommerce → Settings → Resurs Bank → Order Management`.

![](../../../../attachments/91029950/91029949.png)

# Enable Capture
When this setting is enabled the payment will be automatically captured
when the order status is set to `Completed` in WooCommerce.

Once an order has been set to Completed it can no longer be reverted to
another status.

*The module does not support partial captures.*

An order which has been partially captured using the Merchant Portal can
still have the remaining order amount captured from WooCommerce.

# Enable Cancel
This feature works much like the `Enable Capture `setting in that it
automatically cancels the payment when an order is cancelled in
WooCommerce. Similarly, once an order has been cancelled it can't be
reverted to another status but a payment that's been partially cancelled
through the Merchant Portal can still have its remaining order lines
cancelled through the order view.

# Enable Refund
Like the `Enable Capture `and `Enable Cancel `features this feature will
both automatically handle refunds of the payment when a refund is
applied to the order in WooCommerce and once an order has been refunded
it can't be reverted to another status and allow complete refunds of the
payment when a partial refund has already been applied through the
Merchant Portal.

# Enable Modify
With this feature enabled changes you make to an order will be reflected
on the payment.

However, there are some caveats. First of all, this only works if the
payment can be captured, cancelled or if it has been fully cancelled.
Furthermore, if the sum total for the changed order are equal to what
they were before changing the order no call will be made to Resurs Bank.
E.g. if you substitute one product for another with the exact same price
then the change will not be transmitted to the payment.

One workaround for this issue is to cancel the payment through the
Merchant Portal before editing the order in WooCommerce as this changes
the authorized amount on the order to 0.

It should also be noted that it's not possible to exceed the credit
limit which has been authorized for the payment. Instead the customer
should place a new order.

Should the modify action fail it can sometimes result in the payment
being cancelled despite the order not being cancelled. If this happens
you can click the `Recalculate `button to update the order state as this
also pushes the order update to the payment at Resurs.

> Please also note that changes made from Resurs Merchant Portal will
> not reflect back to the WooCommerce system and have to be made there
> as well.

