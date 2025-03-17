---
layout: page
title: Zero Decimals with Resurs Bank in WooCommerce
permalink: /platform-plugins/woocommerce/zero-decimals-with-resurs-bank-in-woocommerce
parent: Woocommerce
grand_parent: Platform Plugins
nav_order: 12
has_children: true
has_toc: false
---

# Zero decimals with Resurs Bank in WooCommerce

## Decimals in WooCommerce

Under *General settings* in WooCommerce, there is a section called *Currency options*. Here you can set the store
currency and how the currency symbol should be positioned. There is also a setting that lets you choose how many decimal
points you want prices to be displayed with.

At first glance, this setting may appear to be purely cosmetic—simply making your prices look neater. However, setting
decimals to 0 can cause real issues for your store.

## Why don't the payment gateways calculate like WooCommerce?

If you are using a payment gateway that sends each order row individually to the payment provider, or have an extension
that connects to your accounting/ERP system, then the calculation of the order total might differ between the systems.

When the price for a product is rounded and stored in the order, it can be difficult to recreate the same kind of
rounding in an external system.

### Understanding the rounding issue

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
