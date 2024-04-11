---
layout: page
title: Resurs Merchant Api 2.0 For Woocommerce
nav_exclude: true
permalink: /platform-plugins/woocommerce/resurs-merchant-api-2.0-for-woocommerce/
av_order: 11
parent: Woocommerce
grand_parent: Platform Plugins
has_toc: false
---

# Resurs Bank Payments for WooCommerce 

- [Plugin basics and information](/platform-plugins/woocommerce/resurs-merchant-api-2-0-for-woocommerce/plugin-basics-and-information/)
- [Trouble shooting and error
  handling](/platform-plugins/woocommerce/resurs-merchant-api-2-0-for-woocommerce/trouble-shooting-and-error-handling/)
- [Installation from WordPress plugin
  repository](/platform-plugins/woocommerce/resurs-merchant-api-2-0-for-woocommerce/installation-from-wordpress-plugin-repository/)
- [Manually installing plugin](/platform-plugins/woocommerce/resurs-merchant-api-2-0-for-woocommerce/manually-installing-plugin/)
- [Store configuration requirements](/platform-plugins/woocommerce/resurs-merchant-api-2-0-for-woocommerce/store-configuration-requirements/)
- [Plugin configuration](/platform-plugins/woocommerce/resurs-merchant-api-2-0-for-woocommerce/plugin-configuration/)
- [Order management](/platform-plugins/woocommerce/resurs-merchant-api-2-0-for-woocommerce/order-management/)
- [Part payment widget](/platform-plugins/woocommerce/resurs-merchant-api-2-0-for-woocommerce/part-payment-widget/)
- [MAPI Checkout Flow](/platform-plugins/woocommerce/resurs-merchant-api-2-0-for-woocommerce/mapi-checkout-flow/)
- [MAPI-WC - Customizations](/platform-plugins/woocommerce/resurs-merchant-api-2-0-for-woocommerce/mapi-wc---customizations/)

- [Requirements](#requirements)
- [Upgrade
  information](#upgrade-information)
- [Download/install the
  plugin](#downloadinstall-the-plugin)
- [FAQ & Generic
  questions](#faq--generic-questions)
    - [Can I change the order number
      sequence?](#can-i-change-the-order-number-sequence)


## Resurs Merchant API 2.0 for WooCommerce - Requirements

- **At least** PHP 8.1.
- **At least** WooCommerce 7.6.0.
- A WooCommerce compatible theme.
- SSL-connectivity (preferably OpenSSL).
- CURL (ext-curl with necessary libraries) 7.61.0 or higher.
- **Curl with CURLAUTH_BEARER-support!**

*If you run Ubuntu (bionic) the lowest available curl version will
probably be 7.58.0 (focal is currently - aug22 - on 7.68) and in many
systems bearers was introduced in 7.61.0 - however, you need to make
sure it is really present in newer releases too.*

# Upgrade from a prior package

Are you installing this module over the prior release (2.2-series)? Make
sure you **uninstall** the old plugin before installing this. We've seen
conflicts between the both releases, for where the old plugin overrides
parts of the new by stating that the CURLAUTH_BEARER is missing, even
though the old wp-admin layout is still seen. This is very common when
the both plugins are active side by side.

# Download/install the plugin

Install the plugin via WordPress plugin repository (the plugin manager
in wp-admin). It is NOT recommended to install the plugin manually since
you will miss all automatic upgrades. The new name to look for in the
plugin search (in wp-admin) is **Resurs Bank Payments for
WooCommerce**.

## Manually installing the plugin

If you prefer to install the plugin manually, you can always find the latest version in the official location at
[https://wordpress.org/plugins/resurs-bank-payments-for-woocommerce/](https://wordpress.org/plugins/resurs-bank-payments-for-woocommerce/).
However it is not recommended to do any installation manually since you may miss the opportunity to automatically
upgrade the plugin when new releases are commited.

# FAQ & Generic questions

## Can I change the order number sequence?

Yes!

To update the order number sequence, update the database auto increment
number like this:

**UPDATE database**

```xml
ALTER TABLE `wp-database`.`wp_posts` AUTO_INCREMENT = 200000000;
```

Change **wp-database** to your database name and set the
**AUTO_INCREMENT** number to something that suits you.

