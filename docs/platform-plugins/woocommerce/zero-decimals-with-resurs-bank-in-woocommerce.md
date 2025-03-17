---
layout: page
title: Full Documentation
permalink: /platform-plugins/woocommerce/zero-decimals-with-resurs-bank-in-woocommerce
parent: Woocommerce
grand_parent: Platform Plugins
nav_order: 12
has_children: true
has_toc: false
---

# Zero decimals with Resurs Bank in WooCommerce

## Decimals in WooCommerce

Under *General settings* in WooCommerce, there is a section called *Currency options*. Here you can set the store currency and how the currency symbol should be positioned. There is also a setting that lets you choose how many decimal points you want prices to be displayed with.

At first glance, this setting may seem like just a display option - making your prices look a bit fancier. However, setting decimals to 0 can cause real issues for your store.

## Why doesn't the payment gateways calculate like WooCommerce?

If you are using a payment gateway that sends each order row individually to the payment provider, or have an extension that connects to your accounting/ERP system, then the calculation of the order total might differ between the systems.

When the price for a product is rounded and stored in the order, it can be difficult to recreate the same kind of rounding in an external system.

### Time for some math

A product has a price of 49 EUR including 25% VAT. This means a net price of 39.2 EUR with a tax of 9.8 EUR. If you set the decimal points to 0, WooCommerce will round this to a net price of 39 and a tax of 10.

If we now imagine a payment provider who wants us to send each order row with the product price excluding tax plus the tax rate, this would mean 39 and 25%. But if you add 25% to 39, you will get a price including tax that equals 48.75.

In many cases, when each order line is sent to the payment provider, the order total is also sent as a parameter. When the sum of the order rows is compared to the order total, these two figures don't match. Usually, the payment provider responds with an error message, and the purchase can't be finalized.

## Order row quantity and coupons

In some cases, this type of rounding will work. Instead, problems might occur if the customer buys multiple items of a specific product. The payment provider usually wants the unit price plus the number of items purchased, but WooCommerce does the rounding after the entire order row has been calculated. Another scenario that could cause similar problems is when using coupons.

## But I don't want to display decimals in my store - how do I do?

Luckily, there are ways to avoid displaying decimals as long as it's about prices with whole numbers (integers). Set the decimal points to 2 in the currency settings and then add this code snippet to your theme's `functions.php` or in a separate plugin.

```php
/**
 * Trim zeros in price decimals
 **/
add_filter( 'woocommerce_price_trim_zeros', '__return_true' );
```

With this code, 49.00 will be displayed as 49. If you only have prices with whole numbers in your store and you're displaying prices including VAT, then it's only the VAT that will actually be displayed with 2 decimals. This results in a more accurate calculation of prices and VAT in your store while avoiding unnecessary decimal points.

## I want to do this as a plugin - how would it look?

This is how a plugin could look like. A file like this can be placed directly in `wp-content/plugins/` and then activated from the plugin manager.

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
