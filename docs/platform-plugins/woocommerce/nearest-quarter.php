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

    /**
     * Rounds product prices in the WooCommerce cart to the nearest 0.25 before totals calculation.
     * Rounding to nearest quarter solves the rounding issue when PHP precision is too high.
     * It doesn't fit all systems but solves a decimal issue.
     * Using number_format is not enough for this, but is commented out for reference example.
     */
    function round_cart_item_prices($cart)
    {
        $precision = ini_get('precision');

        // Prevent affecting admin area unless doing AJAX
        if ((is_admin() && !defined('DOING_AJAX')) || $precision <= 14) {
            return;
        }

        // Check if cart object exists and has items
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
        }

        // Not Resurs? Then skip this.
        if (!$methodTest instanceof \Resursbank\Ecom\Lib\Model\PaymentMethod) {
            return;
        }

        $floatValue = new Resursbank\Ecom\Lib\Attribute\Validation\FloatValue();

        foreach ($cart->get_cart() as $cart_item_key => $cart_item) {
            $price = $cart_item['data']->get_price();

            try {
                $floatValue->validate(name: 'test', value: $price);
            } catch (Throwable $e) {
                // Rounding to nearest quarter solves the rounding issue when PHP precision is too high.
                // It doesn't fit all systems but solves a decimal issue.
                // Using number_format is not enough for this, but is commented out for reference example.
                // $rounded_price = (float) number_format($price, 2, '.', '');

                $quantity = $cart_item['quantity'] ?? 1; // Protect against division by zero
                $quantity = max(1, intval($quantity)); // Ensure minimum of 1

                $line_total     = $price * $quantity;
                $rounded_total  = round($line_total * 4) / 4;
                $rounded_price  = $rounded_total / $quantity;

                $cart_item['data']->set_price($rounded_price);
            }
        }
    }

    add_action('woocommerce_before_calculate_totals', 'round_cart_item_prices', 20, 1);
});
