---
layout: page
title: Part Payment Widget
permalink: /platform-plugins/woocommerce/resurs-merchant-api-2-0-for-woocommerce/part-payment-widget/
parent: Woocommerce
grand_parent: Platform Plugins
---



# Part payment widget 
This feature of the plugin allows your store to display a small widget
on individual product pages with information about available part
payment options including a modal iframe popup with more detailed
information.

![Widget
appearance](../../../../attachments/91029758/91029756.png "Widget appearance")![Modal
appearance](../../../../attachments/91029758/91029757.png "Modal appearance")

## Configuration
The widget configuration options can be found on the `Part payment` tab
*under* `WooCommerce → Settings → Resurs Bank`.

Before configuring the widget you need to set the global plugin
configuration on the `API` Settings tab.

![Configuration
form](../../../../attachments/91029758/91029759.png "Configuration form")

### Part payment widget enabled
Toggle this setting to enable or disable the widget.

### Payment method
This option allows you to choose which of your payment method to use for
the widget.

Only payment methods that support part payment will be available here.

### Annuity period
Controls how long of a payment period to calculate the monthly cost for.

Like with the payment method setting only supported periods will be
shown.

### Limit
Sets a lower monthly installment limit under which the widget will not
be displayed.

If you to set the limit higher than the payment method's maximum
configured purchase price you will see a warning message after saving
your settings.

You should set this value high enough that the monthly cost is at least
SEK 150 (Sweden) or EUR 15 (Finland).

