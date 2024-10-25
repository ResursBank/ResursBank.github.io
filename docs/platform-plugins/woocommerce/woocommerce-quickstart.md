---
layout: page
title: WooCommerce Quick-Start
permalink: /platform-plugins/woocommerce/woocommerce-quickstart
parent: Woocommerce
grand_parent: Platform Plugins
nav_order: 11
has_children: false
has_toc: false
---

# Quick Installing WooCommerce

For full documentation, see [this section](resurs-merchant-api-for-woocommerce.md)

# Installing the plugin

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
2. Locate the **Credentials** section, where you will be able to input, update, and verify your credentials.
3. The credentials fields include **API Key**, **API Secret**, and **Store ID**. These are essential for connecting the
   WooCommerce store to the external system.

#### INPUTTING CREDENTIALS

When entering your credentials:

1. **Fill in the API Key, API Secret, and Store ID** fields.
    - Ensure that the credentials you enter are correct and valid, as incorrect credentials will prevent the store from
      functioning properly.

2. **Fetching Store Data**:
    - After entering the credentials, click the **Fetch Stores** button to retrieve the store list associated with the
      entered credentials.
    - The store list will appear if the credentials are valid. If the credentials are invalid, an error message will
      display, and no stores will be fetched.