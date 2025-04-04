---
layout: page
title: Woocommerce
permalink: /platform-plugins/woocommerce/
nav_order: 41
parent: Platform Plugins
has_children: true
---

# WooCommerce

## The checkout for WooCommerce Blocks is currently unsupported

**Please note that there is a known problem with WooCommerce blocks for the checkout for which payment methods are not
properly displayed. This can be fixed by removing the content in the checkout-page blocks and add the
shortcode [woocommerce_checkout] instead.**

## Resurs Merchant API 2.0 for WooCommerce

> This is the latest version of the plugin for WooCommerce.

[Click **here** for full documentation and installation instructions for Resurs Merchant API 2.0 for WooCommerce](resurs-merchant-api-for-woocommerce.md).

### Requirements

- **At least** PHP 8.1
- **At least** WooCommerce 7.6.0
- SSL-connectivity (preferably OpenSSL)
- CURL (ext-curl with necessary libraries) 7.61.0 or higher
- **Curl with CURLAUTH_BEARER-support**

### Download/install the plugin

Install the plugin via WordPress plugin repository (the plugin manager
in wp-admin).

-------------------

## Resurs Bank Payment Gateway for WooCommerce v2.2.x (**end of life**)

Development has ended. Last update was for FI Taxes only (aug 2024). Plugin has not been updated since 2023-03-27.
Please use the MAPI version (above) instead.

For further information: [Check out the legacy page here](version22.md).
