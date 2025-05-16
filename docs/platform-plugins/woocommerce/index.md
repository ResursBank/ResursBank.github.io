---
layout: page
title: Woocommerce
permalink: /platform-plugins/woocommerce/
nav_order: 41
parent: Platform Plugins
has_children: true
---

# WooCommerce

## Resurs Merchant API 2.0 for WooCommerce

> This is the latest version of the plugin for WooCommerce.

[Click **here** for full documentation and installation instructions for Resurs Merchant API 2.0 for WooCommerce](resurs-merchant-api-for-woocommerce.md).

### Requirements

- **At least** PHP 8.1
- **At least** WooCommerce 7.6.0
- SSL-connectivity (preferably OpenSSL)
- CURL (ext-curl with necessary libraries) 7.61.0 or higher
- **Curl with CURLAUTH_BEARER-support**
- **Decimal precision:** PHP’s default precision (php.ini default precision = 14) is usually sufficient. Increasing this
  value too high may cause unexpected rounding errors due to floating point representation issues. Recommended to keep
  precision at standard levels to ensure correct two-decimal rounding.

### Download/install the plugin

Install the plugin via WordPress plugin repository (the plugin manager
in wp-admin).
