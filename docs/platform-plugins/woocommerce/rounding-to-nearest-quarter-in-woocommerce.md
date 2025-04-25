---
layout: page
title: Rounding to nearest quarter in WooCommerce
permalink: /platform-plugins/woocommerce/rounding-to-nearest-quarter-in-woocommerce
parent: Full Documentation
grand_parent: Platform Plugins
nav_order: 14
has_children: false
has_toc: false
---

## Table of Contents

* [Rounding issues with high PHP precision settings](#rounding-issues-with-high-php-precision-settings)
    * [Why is PHP precision a problem here?](#why-is-php-precision-a-problem-here)
    * [Example workaround: Rounding prices to the nearest quarter](#example-workaround-rounding-prices-to-the-nearest-quarter)
    * [Example plugin implementation](#example-plugin-implementation)
    * [Important notes](#important-notes)

# Disclaimer

This section of the documentation is not endorsed or supported by Resurs Bank. However, the underlying case is explained
for informational purposes. The provided example is intended as a workaround and should not be considered official
guidance.

**This section is written for those that are unable, due to business logic, to change the precision settings
in php.ini (for which the default precision is 14 decimals).**

# Rounding issues with high PHP precision settings

When working with WooCommerce integrations and certain payment gateways like Resurs Bank, you might encounter rounding
problems due to PHP's internal floating-point precision. In particular, if the `precision` value in PHP is set too
high (e.g., 30), it can result in floating-point artifacts such as `199.98999999999998` instead of the
expected `199.99`. These minor differences can cause mismatches between the order total in WooCommerce and the values
expected by the payment provider.

## Why is PHP precision a problem here?

The PHP `ini_set('precision', ...)` setting controls how many significant digits are used for floating-point numbers. If
this is set too high, floating-point calculations might introduce small rounding errors that become problematic when
totals are validated by external systems. Payment APIs like Resurs Bank often expect two decimal places, no more, no
less.

WooCommerce's default behavior may not handle this perfectly if your PHP configuration allows for higher precision. Even
if WooCommerce itself limits price display to two decimals, the underlying calculations may still retain floating-point
inaccuracies.

## Example workaround: Rounding prices to the nearest quarter

In order to avoid these rounding issues and comply with the requirements of the Resurs Bank API, we recommend rounding
prices in the cart to the nearest quarter (0.25) **before** totals are calculated. This workaround is especially useful
when rounding discrepancies prevent the payment from being processed successfully.

The following example demonstrates how to implement this logic using a WooCommerce hook combined with a Resurs Bank
payment method check.

## Example plugin implementation

Add a plugin file under your `wp-content/plugins/` with the content below.
[Or download this snippet file and install it](nearest-quarter.php)

```php
<?php
/**
 * Plugin Name: WooCommerce Quarter Decimal Rounding for Resurs Bank
 * Description: Rounds product prices in the cart to the nearest quarter (0.25) before totals are calculated.
 * Version: 1.0.0
 */

add_action('plugins_loaded', function () {
    if (!class_exists('Resursbank\\Ecom\\Lib\\Attribute\\Validation\\FloatValue')) {
        return; // Do nothing if FloatValue class does not exist
    }

    // Used for testing.
    // ini_set('precision', 30);

    if (!defined('ABSPATH')) {
        exit; // Exit if accessed directly
    }

    function round_cart_item_prices($cart)
    {
        $precision = ini_get('precision');

        if ((is_admin() && !defined('DOING_AJAX')) || $precision <= 14) {
            return;
        }

        if (!is_object($cart) || !$cart->get_cart_contents_count()) {
            return;
        }

        $chosen_gateway = WC()->session->get('chosen_payment_method');
        $methodTest = null;

        try {
            $methodTest = Resursbank\Ecom\Module\PaymentMethod\Repository::getById(
                paymentMethodId: $chosen_gateway
            );
        } catch (Throwable) {
            $methodTest = null;
        }

        if (!$methodTest instanceof \Resursbank\Ecom\Lib\Model\PaymentMethod) {
            return;
        }

        $floatValue = new Resursbank\Ecom\Lib\Attribute\Validation\FloatValue();

        foreach ($cart->get_cart() as $cart_item_key => $cart_item) {
            $price = $cart_item['data']->get_price();

            try {
                $floatValue->validate(name: 'test', value: $price);
            } catch (Throwable $e) {
                $quantity = $cart_item['quantity'] ?? 1;
                $quantity = max(1, intval($quantity));

                $line_total     = $price * $quantity;
                $rounded_total  = round($line_total * 4) / 4;
                $rounded_price  = $rounded_total / $quantity;

                $cart_item['data']->set_price($rounded_price);
            }
        }
    }

    add_action('woocommerce_before_calculate_totals', 'round_cart_item_prices', 20, 1);
});
```

## Important notes

- This solution does not universally fit all systems and should be tested thoroughly in your environment.
- The rounding logic specifically targets the Resurs Bank payment gateway. Other gateways might require different
  adjustments.
- The plugin validates whether the Resurs Bank integration is present before executing the rounding logic.
- Use of `ini_set('precision', 30)` is only for testing purposes. In production, ensure your PHP configuration aligns
  with your gateway's requirements.
