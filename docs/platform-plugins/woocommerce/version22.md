---
layout: page
title: WooCommerce v2.2 Deprecated Notes
permalink: /platform-plugins/woocommerce/resurs-merchant-api-for-woocommerce/version22
nav_order: 42
parent: Woocommerce Full Documentation
grand_parent: Woocommerce
has_children: false
has_toc: false
---

## Resurs Bank Payment Gateway for WooCommerce 2.2 - Deprecated

The Resurs Bank Payment Gateway for WooCommerce v2.2 has reached end-of-life. Version 2.2.105 is the final official
release and is no longer supported.

> Do not use the outdated release — Payment flows in this plugin are deprecated at Resurs Bank. The older Resurs
> Checkout APIs (RCO Legacy/Facelift) are no longer supported in the merchant API.
>
> [For legacy documentation, access v2.2 docs here.](resurs-bank-payment-gateway-for-woocommerce--v2-2--resurs-checkout---simplified-flow/index.md)

### Tax Rates for Finland (25.5%) in WooCommerce

In the deprecated plugin, a known issue affects the calculation of tax rates with decimals, such as Finland’s 25.5% (
effective from September 2024). This mainly impacts shipping calculations and occasionally, coupon
applications. [Read more here](https://resursbankplugins.atlassian.net/browse/WOO-1320).

Using version 2.2.105 or older? Upgrade to the latest MAPI-supported plugin promptly; only patch the current release if
necessary.

**Note: Do not upgrade if your store operates outside Finland.**

### Emergency Update to 2.2.106

**Full Upgrade Planning: This patch provides a temporary fix, but a complete upgrade to the latest MAPI-supported plugin
is essential for compatibility and support.**

To update:

- **Download**: [v2.2.106 zip file](/attachments/resurs-bank-payment-gateway-for-woocommerce-2.2.106.zip)
- **Unzip**: Extract the file contents to locate `/resurs-bank-payment-gateway-for-woocommerce`
- **Replace**: Access your WordPress installation directory under `/wp-content/plugins/` and replace the old plugin
  version with the new files
- **Verify**: Confirm that the upgrade was successful
