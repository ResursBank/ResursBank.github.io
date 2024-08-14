---
layout: page
title: Woocommerce
permalink: /platform-plugins/woocommerce/
nav_order: 41
parent: Platform Plugins
has_children: true
has_toc: false
---

# WooCommerce 

## Latest version (**Resurs Bank Payments for WooCommerce**)

> This is the lastest version of the plugin for WooCommerce

[Click **here** for full documentation and installation instructions for Resurs Merchant API 2.0 for WooCommerce](resurs-merchant-api-2-0-for-woocommerce/index.md).



-------------------

## Resurs Bank Payment Gateway for WooCommerce v2.2.x (**end of life**)

Resurs Bank Payment Gateway for WooCommerce 2.2 has been revoked. 2.2.105 is the last official release and is no longer supported.

> Do not use the old release - Payment flows in this plugin is deprecated at
> Resurs Bank.Be aware that the older Resurs Checkout-API's (RCO
> Legacy/Facelift) are no longer supported in the merchant API - to keep
> using RCO Legacy, you need to stay on the 2.2 release.
>
> [For old references - docs for v2.2 has been moved here.](resurs-bank-payment-gateway-for-woocommerce--v2-2--resurs-checkout---simplified-flow/index.md)

### Tax rate in finland (25.5%) and WooCommerce

In the deprecated WooCommerce plugin, there is a known issue with the calculation of tax rates involving decimals (e.g., 25.5% in Finland, which will be updated in September 2024). This issue primarily affects shipping calculations and, in rare cases, coupons. For more details, [read here](https://resursbankplugins.atlassian.net/browse/WOO-1320).

If you are using version 2.2.105 or older, it is crucial to upgrade to the latest MAPI-supported plugin as soon as possible - do not patch your current release unless you really need it.

### Emergency upgrading to 2.2.106

**Plan for Full Upgrade: While this patch provides a temporary fix, it is essential to plan for a complete upgrade to the latest MAPI-supported plugin version to ensure full compatibility and continued support.**

You can either upload the zip file to WordPress and let WordPress handle the magics or, if you have a customized site with plugin uploading/installing disabled - do it manually:

* Download the zip file: [v2.2.106](/attachments/resurs-bank-payment-gateway-for-woocommerce-2.2.106.zip)
* Unzip the File: Extract the contents of the downloaded ZIP file. Inside, you will find a directory named /resurs-bank-payment-gateway-for-woocommerce.
* Navigate to your WordPress installation directory on your server.
* Go to /wp-content/plugins/.
* Locate the folder named resurs-bank-payment-gateway-for-woocommerce corresponding to the old plugin version.
* Replace its contents with the extracted files from the new version.
* Verify the upgrade.
