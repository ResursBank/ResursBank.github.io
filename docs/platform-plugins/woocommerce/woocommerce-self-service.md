---
layout: page
title: WooCommerce Self Service
permalink: /platform-plugins/woocommerce/woocommerce-self-service
parent: Woocommerce
grand_parent: Platform Plugins
nav_order: 13
has_children: false
has_toc: false
---

# Disclaimer

This section of the documentation is not formally endorsed or supported by Resurs Bank. The content is provided strictly
for informational purposes, and the examples included should be regarded as potential workarounds rather than official
implementation guidance.

While this documentation contains code samples that are generally outside the scope of Resurs Bank’s official support,
it demonstrates how developers may independently take action where necessary. In some cases, filters and similar
mechanisms have been deliberately implemented to allow developers to address specific issues without modifying the
plugin’s core code. These instances are clearly indicated within the documentation to distinguish them from unsupported
examples.

## Table of Contents

* [Custom pricing in part payment widget logic using filters](#custom-pricing-in-part-payment-widget-logic-using-filters)
* [Understanding rounding with decimals in WooCommerce](#understanding-rounding-with-decimals-in-woocommerce)
    * [How quantity and discounts impact rounding](#how-quantity-and-discounts-impact-rounding)
    * [Hiding decimals in store display](#hiding-decimals-in-store-display)
    * [Plugin example: Trim zeros](#plugin-example-trim-zeros)
* [Rounding issues with high PHP precision settings](#rounding-issues-with-high-php-precision-settings)
    * [Why PHP precision is a problem](#why-php-precision-is-a-problem)
    * [Workaround: Rounding to the nearest quarter](#workaround-rounding-to-the-nearest-quarter)
    * [Plugin example: Quarter rounding](#plugin-example-quarter-rounding)
    * [Important notes](#important-notes)

# Custom pricing in part payment widget logic using filters

In some environments, product page pricing may differ from the checkout total if external sources or custom logic are
involved. For example, a product widget might show a lower or outdated price compared to the checkout, creating
confusion for end users.

To address this, the plugin provides a filter that lets developers override how prices are calculated before they are
passed into part payment widgets. This approach allows the implementation of external price sources, adjustments for
tax, or other custom logic without modifying the plugin core.

**Generic example:**

```php
add_filter('resursbank_pp_price_data', function($price, $product) {
    // Example: Fetch a custom external price or run validation logic
    $custom_price = my_custom_price_lookup($product->get_sku());

    if ($custom_price > 0) {
        // Calculate tax if needed
        $tax_rates = wc_get_product_tax_class($product)
            ? WC_Tax::get_rates($product->get_tax_class())
            : WC_Tax::get_rates('');
        $taxes = WC_Tax::calc_tax($custom_price, $tax_rates, false);
        return $custom_price + array_sum($taxes);
    }

    return $price; // fallback to default logic
}, 10, 2);
```

By using this filter, partners can ensure that the part payment calculations remain consistent between product pages
and checkout, while also preserving plugin compatibility across future updates.

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

# Rounding issues with high PHP precision settings

**This section is written for those that are unable, due to business logic, to change the precision settings
in php.ini (for which the default precision is 14 decimals).**

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
