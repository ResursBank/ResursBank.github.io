---
layout: page
title: Zero Decimals with Resurs Bank in WooCommerce
permalink: /platform-plugins/woocommerce/zero-decimals-with-resurs-bank-in-woocommerce
parent: Full Documentation
grand_parent: Platform Plugins
nav_order: 13
has_children: false
has_toc: true
---

## Table of Contents

* [Zero decimals with Resurs Bank in WooCommerce](#zero-decimals-with-resurs-bank-in-woocommerce)
    * [Decimals in WooCommerce](#decimals-in-woocommerce)
    * [Why don't the payment gateways calculate like WooCommerce?](#why-dont-the-payment-gateways-calculate-like-woocommerce)
        * [Understanding the rounding issue](#understanding-the-rounding-issue)
    * [How quantity and discounts impact rounding](#how-quantity-and-discounts-impact-rounding)
    * [What if I don’t want to display decimals in my store—how can I achieve this?](#what-if-i-dont-want-to-display-decimals-in-my-store-how-can-i-achieve-this)
    * [Example plugin implementation](#example-plugin-implementation)

# Disclaimer

This section of the documentation is not endorsed or supported by Resurs Bank. However, the underlying case is explained
for informational purposes. In general, this method is not recommended. The information provided here is for reference
only and should not be considered official guidance.

# Understanding rounding with decimals in WooCommerce

In *General settings* under *Currency options*, WooCommerce lets you set the store currency and decimal precision. While
it may seem cosmetic, setting decimals to 0 can cause issues.

WooCommerce rounds prices using its internal rules, but Resurs Bank doesn't support more than 2 decimals. If values are
rounded too high or too low, order totals may not match, leading to incorrect tax calculations and potential payment
failures.

For example, a product priced at 49 EUR (including 25% VAT) has a net price of 39.2 EUR and a tax of 9.8 EUR. If
decimals are set to 0, WooCommerce rounds it to 39 EUR net and 10 EUR tax, which may cause discrepancies with the
payment.

Now, let's consider a payment provider that requires each order row to be sent with the product price excluding tax
along with the applicable tax rate. In this case, it would be 39 EUR and 25%. However, adding 25% tax to 39 EUR results
in a total price of 48.75 EUR.

In many cases, when each order line is sent to the payment provider, the order total is also sent as a parameter. When
the sum of the order rows is compared to the order total, these two figures don't match. Usually, the payment provider
responds with an error message, and the purchase can't be finalized.

## How quantity and discounts impact rounding

In some cases, this type of rounding will work. However, problems might occur if the customer buys multiple units of a
specific product. The payment provider usually expects the unit price and quantity separately, whereas WooCommerce
applies rounding after the entire order row has been calculated. Similar discrepancies can also arise when using
coupons.

## What if I don’t want to display decimals in my store—how can I achieve this?

Fortunately, there are ways to avoid displaying decimals as long as prices remain whole numbers. Set the decimal points
to 2 in the currency settings and then add this code snippet to your theme's `functions.php` or in a separate plugin.

```php
/**
 * Trim zeros in price decimals
 **/
add_filter( 'woocommerce_price_trim_zeros', '__return_true' );
```

This ensures that 49.00 appears as 49. However, some currencies (e.g., JPY, IDR) use large numerical values, making
small rounding differences significant. When comparing EUR to SEK, minor decimal shifts in EUR can result in larger
rounding differences due to exchange rates.

## Example plugin implementation

Here's an example of how the plugin could be structured. A file like this can be placed directly
in `wp-content/plugins/` and then activated via the plugin manager.

**Example: `<WP-root>/wp-content/plugins/woocommerce-price-trim-zeros.php`**

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
