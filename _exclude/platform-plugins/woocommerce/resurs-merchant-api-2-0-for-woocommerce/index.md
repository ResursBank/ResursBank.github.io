---
layout: page
title: Resurs Merchant Api 2.0 For Woocommerce
permalink: /platform-plugins/woocommerce/resurs-merchant-api-2.0-for-woocommerce/
parent: Woocommerce
grand_parent: Platform Plugins
---



# Resurs Merchant API 2.0 for WooCommerce 
Created by Thomas Tornevall, last modified on 2023-12-07
- [Plugin basics and
  information](Plugin-basics-and-information_91029973.html)
- [Trouble shooting and error
  handling](Trouble-shooting-and-error-handling_91030061.html)
- [Installation from WordPress plugin
  repository](Installation-from-WordPress-plugin-repository_91029967.html)
- [Manually installing plugin](Manually-installing-plugin_91029909.html)
- [Store configuration
  requirements](Store-configuration-requirements_91029884.html)
- [Plugin configuration](Plugin-configuration_91029886.html)
- [Order management](Order-management_91029950.html)
- [Part payment widget](Part-payment-widget_91029758.html)
- [MAPI Checkout Flow](MAPI-Checkout-Flow_91029720.html)
- [MAPI-WC - Customizations](MAPI-WC---Customizations_91030072.html)
- [Requirements](#ResursMerchantAPI2.0forWooCommerce-Requirements)
- [Upgrade
  information](#ResursMerchantAPI2.0forWooCommerce-Upgradeinformation)
- [Download/install the
  plugin](#ResursMerchantAPI2.0forWooCommerce-Download/installtheplugin)
- [FAQ & Generic
  questions](#ResursMerchantAPI2.0forWooCommerce-FAQ&Genericquestions)
  - [Can I change the order number
    sequence?](#ResursMerchantAPI2.0forWooCommerce-CanIchangetheordernumbersequence?)
This section is reserved for the new WooCommerce plugin from Resurs
bank.
# Requirements
- **At least** PHP 8.1
- **At least** WooCommerce 7.6.0
- SSL-connectivity (preferably OpenSSL)
- CURL (ext-curl with necessary libraries) 7.61.0 or higher
- **Curl with CURLAUTH_BEARER-support**
*If you run Ubuntu (bionic) the lowest available curl version will
probably be 7.58.0 (focal is currently - aug22 - on 7.68) and in many
systems bearers was introduced in 7.61.0 - however, you need to make
sure it is really present in newer releases too.*
# Upgrade information
Are you installing this module over the prior release (2.2-series)? Make
sure you uninstall the old plugin before installing this. We've seen
conflicts between the both releases, for where the old plugin overrides
parts of the new by stating that the CURLAUTH_BEARER is missing, even
though the old wp-admin layout is still seen. This is very common when
the both plugins are active side by side.
# Download/install the plugin
Install the plugin via WordPress plugin repository (the plugin manager
in wp-admin). It is NOT recommended to install the plugin manually since
you will miss all automatic upgrades.
Url to the plugin itself is
[https://wordpress.org/plugins/resurs-bank-payments-for-woocommerce/](https://wordpress.org/plugins/resurs-bank-payments-for-woocommerce/)
  
# FAQ & Generic questions
## Can I change the order number sequence?
Yes!
To update the order number sequence, update the database auto increment
number like this:
**UPDATE database**
``` syntaxhighlighter-pre
ALTER TABLE `wp-database`.`wp_posts` AUTO_INCREMENT = 200000000;
```
Change **wp-database** to your database name and set the
**AUTO_INCREMENT** number to something that suits you.
  
