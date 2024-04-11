---
layout: page
title: Store Configuration Requirements
nav_exclude: true
permalink: /platform-plugins/woocommerce/resurs-merchant-api-2-0-for-woocommerce/store-configuration-requirements/
parent: Resurs Merchant Api 2.0 For Woocommerce
grand_parent: Woocommerce
---



# Store configuration requirements 
## Stock Keeping Unit (SKU)
In order for the order management functionality built into the plugin to
work as intended all products sold in your shop need to have a SKU
configured.

The setting for this can be found in the `Inventory`  tab in the
`Product data`  box on each product.

![Product data
box](../../../../attachments/91029884/91029882.png "Product data box")

## Number of decimals
By default WooCommerce is configured to show prices with zero decimals,
for certain technical reasons this can occasionally cause rounding
errors so we strongly recommend that you change this setting so to two
decimals.

This setting can be changed by going to `WooCommerce` → `Settings`  →
`General`  and scrolling to the `Currency options`  section. It's called
`Number of decimals`  and should be at the very bottom of the section.

![Currency options
section](../../../../attachments/91029884/91029883.png "Currency options section")  

