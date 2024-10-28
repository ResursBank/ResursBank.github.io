---
layout: page
title: WooCommerce Quickstart
permalink: /platform-plugins/woocommerce/woocommerce-quickstart
parent: Woocommerce
grand_parent: Platform Plugins
nav_order: 11
has_children: false
has_toc: false
---

# QuickStart Guide WooCommerce

## Request credentials from Resurs Bank.

## Installing the plugin

Install the plugin via WordPress plugin repository (the plugin manager
in wp-admin). It is NOT recommended to install the plugin manually since
you will miss all automatic upgrades.

![](../../../../attachments/91029967/wp_download.png)

Url to the plugin itself is
[https://wordpress.org/plugins/resurs-bank-payments-for-woocommerce/](https://wordpress.org/plugins/resurs-bank-payments-for-woocommerce/)

### API Settings

This manual provides detailed instructions on how to manage credentials in the WooCommerce admin view for seamless
functionality between environments and to ensure proper handling of user credentials.

![](../../../../attachments/files/wp_credentials.png)

#### ACCESSING THE CREDENTIALS SECTION

To manage credentials in WooCommerce:

1. Navigate to the Resurs API section.
2. WooCommerce > Settings > Resurs Bank > API Settings
3. The credentials fields include **API Key**, **API Secret**, and **Store ID**. These are essential for connecting the
   WooCommerce store to the external system.

#### INPUTTING CREDENTIALS

1. **Fill in the API Key, API Secret** provided by Resurs Bank

2. **Fetching Store Data**

3. **Save settings**

For full documentation, see [this section](resurs-merchant-api-for-woocommerce.md)

### Perform test purchase using our test data to ensure everything works

[Resurs Bank Test Data](https://developers.resurs.com/testing/)

### Sign an agreement with Resurs Bank to get credentials for production.
