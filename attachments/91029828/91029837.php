<?php
 /*
Plugin Name: WooCommerce price trim zeros
*/
 /**
 * Trim zeros in price decimals
 **/
 add_filter( 'woocommerce_price_trim_zeros', '__return_true' );