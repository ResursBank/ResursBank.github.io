---
layout: page
title: WooCommerce Quick-Start
permalink: /platform-plugins/woocommerce/resurs-merchant-api-for-woocommerce
nav_order: 11
parent: Platform Plugins
---

# Quick Installing WooCommerce

For full documentation, see [this section](resurs-merchant-api-for-woocommerce.md)

# Requirements

- **At least** PHP 8.1
- **At least** WooCommerce 7.6.0
- SSL-connectivity (preferably OpenSSL)
- CURL (ext-curl with necessary libraries) 7.61.0 or higher
- **Curl with CURLAUTH_BEARER-support**

# Proper installation

Install the plugin via WordPress plugin repository (the plugin manager
in wp-admin). It is NOT recommended to install the plugin manually since
you will miss all automatic upgrades.

![](../../../../attachments/91029967/wp_download.png)

Url to the plugin itself is
[https://wordpress.org/plugins/resurs-bank-payments-for-woocommerce/](https://wordpress.org/plugins/resurs-bank-payments-for-woocommerce/)


### Manually installing the plugin

Manually installing WordPress plugins can be risky because changing the plugin slug can prevent crucial updates from being applied. This opens up vulnerabilities that hackers can exploit, potentially giving them access to your site through outdated versions. You should avoid this if possible.

1. Download the plugin from a trusted source.
2. Extract the ZIP file locally.
3. Upload the plugin folder to `wp-content/plugins/` via FTP.
4. Activate the plugin via the WordPress dashboard.
5. Verify the plugin slug to ensure updates work correctly.
