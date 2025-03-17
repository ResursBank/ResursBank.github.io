---
layout: page
title: Zero Decimals with Resurs Bank in WooCommerce
permalink: /platform-plugins/woocommerce/zero-decimals-with-resurs-bank-in-woocommerce
parent: Woocommerce
grand_parent: Platform Plugins
nav_order: 12
has_children: true
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

# Understanding rounding with decimals in WooCommerce

Under *General settings* in WooCommerce, there is a section called *Currency options*. Here you can set the store
currency and how the currency symbol should be positioned. There is also a setting that lets you choose how many decimal
points you want prices to be displayed with.

At first glance, this setting may appear to be purely cosmetic—simply making your prices look neater. However, setting
decimals to 0 can cause real issues for your store.

When the price for a product is rounded and stored in the order, it can be difficult to recreate the same kind of
rounding in an external system, as it adheres closely to WooCommerce's rounding rules. However, Resurs doesn't support decimals over 2, so changing the value to either too high or too low (0 decimals) may cause discrepancies in order totals, incorrect tax calculations, or mismatches between WooCommerce and payment provider expectations, potentially leading to transaction failures.

A product has a price of 49 EUR including 25% VAT. This means a net price of 39.2 EUR with a tax of 9.8 EUR. If you set
the decimal points to 0, WooCommerce will round this to a net price of 39 and a tax of 10.

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

With this code, 49.00 will be displayed as 49. If your store only has whole-number prices and displays prices including
VAT, then only the VAT will appear with two decimal places. This ensures accurate price and VAT calculations while
eliminating unnecessary decimal points.

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
