---
layout: page
title: 0 Decimals In Woocommerce
permalink: /platform-plugins/woocommerce/0-decimals-in-woocommerce/
parent: Woocommerce
grand_parent: Platform Plugins
---



# 0 decimals in WooCommerce 
Created by Thomas Tornevall, last modified by Gert on 2023-01-19
- [Decimals in
  WooCommerce](#decimals-in-woocommerce)
- [Why doesn’t the payment gateways calculate as
  WooCommerce?](#why-doesnt-the-payment-gateways-calculate-as-woocommerce)
- [Time for some math](#time-for-some-math)
- [Order row quantity and
  coupons](#order-row-quantity-and-coupons)
- [But I don’t want to display decimals in my store – how do I
  do?](#but-i-dont-want-to-display-decimals-in-my-store--how-do-i-do)
- [I want to do this as a plugin - how would it
  look?](#i-want-to-do-this-as-a-plugin---how-would-it-look)

Under *General settings* in WooCommerce there is a section
called *Currency options*. Here you can set the store currency and how
the currency symbol should be positioned. There is also a setting that
lets you choose how many decimal points you want prices to be displayed
with.

At a first glance this setting only appear to be a display option. A
setting that makes your prices look a little bit fancier. But to set the
decimals to 0 can cause some real problems for you and your store.

## Decimals in WooCommerce
When you set the number of decimals to 0 WooCommerce starts rounding
product prices. Or to be a bit more specific – the ratio between the net
pice and the VAT. If you are using a payment gateway that sends each
order row individually to the payment provider, or have an extension
that connects to your accounting/erp system, then the calculation of
order total might differ between the systems.

## Why doesn’t the payment gateways calculate as WooCommerce?
You might think that this is something we as extension developers should
solve so that the figures added to the WooCommerce order is the same as
the ones sent to the payment provider.

The problem is that when the price for a product is rounded and stored
in the order it can be difficult to recreate the same kind of rounding
in an external system. Let me give you an example.

## Time for some math
A product has the price of 49 EUR including 25% VAT. This means a net
price of 39.2 with a tax of 9.8 EUR. If you set the decimal points to 0,
WooCommerce will round this to a net price of 39 and and a tax of 10.

If we now imagine a payment provider who wants us to send each order row
with the product price excluding tax plus the tax rate, this would mean
39 and 25%. But if you add 25% to 39 you will get a price including tax
that equals 48,75.

In many cases when each order line is sent to the payment provider,
order total is also sent as a parameter. When the sum of the order rows
is compared to order total, these two figures don’t match. Usually the
payment provider answers with an error message and the purchase can’t be
finalized.

## Order row quantity and coupons
In some cases it will work with this type of rounding. Instead problems
might occur if the customer buys a number of items of a specific
product. The payment provider usually wants the unit price plus the
number of items purchased but WooCommerce does the rounding after the
entire order row has been calculated. Another scenario that could cause
similar problems is when using coupons.

## But I don’t want to display decimals in my store – how do I do?
Luckily there are ways to avoid displaying decimals a long as it’s about
prices with whole numbers (integers). Set the decimal points to 2 in the
currency settings and then add this code snippet to your themes
functions.php or or in a separate plugin.

```xml
/**
 * Trim zeros in price decimals
 **/
 add_filter( 'woocommerce_price_trim_zeros', '__return_true' );
```

With this code 49,00 will be displayed as 49. If you only have prices
with whole numbers in your store and you’re displaying prices including
VAT, then it’s only the VAT that actually will be displayed with 2
decimals. This results in a more correct calculation of prices and VAT
in your store while you don’t have to display unnecessary decimal
points.

## I want to do this as a plugin - how would it look?
This is how a plugin could look like. A file like this can be placed
directly in wp-content/plugins, and then activated from the plugin
manager.

**Example
\<WP-root\>/wp-content/plugins/woocommerce-price-trim-zeros.php**

```xml
<?php
/*
Plugin Name: WooCommerce price trim zeros
*/
 /**
  * Trim zeros in price decimals
  **/
 add_filter( 'woocommerce_price_trim_zeros', '__return_true' );
```
Download:

```php
<?php
 /*
Plugin Name: WooCommerce price trim zeros
*/
 /**
 * Trim zeros in price decimals
 **/
 add_filter( 'woocommerce_price_trim_zeros', '__return_true' );
```

