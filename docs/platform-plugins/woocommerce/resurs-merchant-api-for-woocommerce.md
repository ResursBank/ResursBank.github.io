---
layout: page
title: Full Documentation
permalink: /platform-plugins/woocommerce/resurs-merchant-api-for-woocommerce
parent: Woocommerce
grand_parent: Platform Plugins
nav_order: 12
has_children: true
has_toc: false
---

# Resurs Merchant API 2.0 for WooCommerce

## Table of Contents

* [Requirements](#requirements)
* [Download/install the plugin](#downloadinstall-the-plugin)
* [Installation from WordPress plugin repository](#installation-from-wordpress-plugin-repository)
* [Manually installing plugin](#manually-installing-plugin)
* [Store configuration requirements](#store-configuration-requirements)
* [Plugin basics and information](#plugin-basics-and-information)
* [Order management](#order-management)
* [MAPI Checkout Flow](#mapi-checkout-flow)
* [Resurs Mail Flow Explained](#resurs-mail-flow-explained)

# Requirements

- **At least** PHP 8.1
- **At least** WooCommerce 7.6.0
- SSL-connectivity (preferably OpenSSL)
- CURL (ext-curl with necessary libraries) 7.61.0 or higher
- **Curl with CURLAUTH_BEARER-support**

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

```xml
ALTER TABLE `wp-database`.`wp_posts` AUTO_INCREMENT = 200000000;
```

Change **wp-database** to your database name and set the
**AUTO_INCREMENT** number to something that suits you.

# Installation from WordPress plugin repository

This page contains information about how to install the plugin properly.

The official release is located at
[https://www.wordpress.org/plugins/resurs-bank-payments-for-woocommerce/](https://www.wordpress.org/plugins/resurs-bank-payments-for-woocommerce/)
and can be installed directly from the plugin installation system in
WordPress.

![](../../../../attachments/files/rb_plugin_install.png)

# Manually installing plugin

Manually installing WordPress plugins can be risky because changing the plugin slug can prevent crucial updates from
being applied. This opens up vulnerabilities that hackers can exploit, potentially giving them access to your site
through outdated versions. You should avoid this if possible.

1. Download the plugin from a trusted source.
2. Extract the ZIP file locally.
3. Upload the plugin folder to `wp-content/plugins/` via FTP.
4. Activate the plugin via the WordPress dashboard.
5. Verify the plugin slug to ensure updates work correctly.

## Dual plugins (how to act on it)

Did you run the old simplified version? Please don't. Uninstall it completely.

![](../../../../attachments/91029909/91029913.png)

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

In some platforms WooCommerce is configured to show prices with zero decimals.
For certain technical reasons this can occasionally cause rounding
errors, so we **strongly recommend that you change this setting so to two
decimals**.

This setting can be changed by going to `WooCommerce` → `Settings`  →
`General`  and scrolling to the `Currency options`  section. It's called
`Number of decimals`  and should be at the very bottom of the section.

![Currency options
section](../../../../attachments/91029884/91029883.png "Currency options section")

# Plugin basics and information

This is planned space for Resurs for WooCommerce MAPI Release v1.0. The
MAPI-Commerce package is a rebuild of Resurs for WooCommerce that is
adapted into the latest Resurs API (MAPIv2, as of 2022). All old flows
has been disconnected from this plugin and since it will be a huge
breaking change due to this among other features, it will be released
separately from the old plugin.

- [Old plugin vs new plugin (side by
  side/migration)](#Pluginbasicsandinformation-Oldpluginvsnewplugin(sidebyside/migration))
- [Zero decimals in
  WooCommerce](#pluginbasicsandinformation-zerodecimalsinwoocommerce)
- [Changing the payment method
  configuration](#pluginbasicsandinformation-changingthepaymentmethodconfiguration)

# Old plugin vs new plugin (side by side/migration)

![](../../../../attachments/91029973/91029969.png)

As of the latest master branch it is possible to run both the new
version and old version side by side. It is however **not** recommended
to do so as both modules are fetching and handling payment methods
differently. Best practice is to never run the plugins simultaneous, to
avoid problems such as duplicate getAddress-fields and/or payment
methods in the checkout. You can not only set the old plugin disabled by
the "Enabled"-checkbox.

![Do not disable the plugin at this
level](../../../../attachments/91029973/91029970.png "Do not disable the plugin at this level")

![This is where the plugins should be
handled](../../../../attachments/91029973/91029971.png "This is where the plugins should be handled")

# Zero decimals in WooCommerce

In newer installs of WooCommerce the setting for number of decimals to
use in the checkout may be set to 0 as the default value. This is
usually what you *do not want*, due to problems with roundings. If you
are new to WooCommerce, make sure to look this up and change it if
necessary. The recommended settings here is 2 decimals (***Resurs do not
fully support more than 2***).

If you want to run with 0 decimals regardless of the warnings, you can
[check out this page](0-decimals-in-woocommerce) for a proper solution.

![](../../../../attachments/91029973/91029972.png)

# Changing the payment method configuration

When making any changes to payment methods at Resurs Bank it is strongly
recommended that you clear the cache in the [Plugin
configuration](plugin-configuration) to avoid potential problems.

### Understanding Customer Link Expiration (TTL)

Customer links will, by default, expire after 120 minutes. If a customer attempts to complete a payment after this time,
the transaction will be rejected. This expiration can be handled through WooCommerce's stock management system,
specifically using the **Hold Stock (minutes)** setting.

When stock management is enabled, WooCommerce reserves the product for the specified time in the **Hold Stock** setting,
preventing others from purchasing the item while the order remains unpaid. Once the set time (e.g., 120 minutes)
elapses, WooCommerce automatically cancels the unpaid order and releases the reserved stock back into inventory.

If stock management is **not** enabled, the system defaults to 120 minutes. This ensures that the reserved stock doesn't
remain indefinitely held for unpaid orders, providing a balanced and controlled inventory management system.

The default TTL can be configured between 1 and 43200 minutes (up to 30 days), depending on the store’s requirements.

This setting can be found under:
**WooCommerce > Settings > Products > Inventory > Hold Stock (minutes)**.

![](../../../../attachments/woocommerce-stock-management-ttl.jpg)

## Basic configuration

1. Go to `WooCommerce` → `Settings` and click on the `Resurs Bank` tab

2. Enter your credentials in the `API Settings`  tab
3. Choose the correct Store ID for your store from the dropdown

4. Save the settings

## Detailed configuration information

### Understanding Customer Link Expiration (TTL)

Customer links will, by default, expire after 120 minutes. If a customer attempts to complete a payment after this time,
the transaction will be rejected. This expiration can be handled through WooCommerce's stock management system,
specifically using the **Hold Stock (minutes)** setting.

When stock management is enabled, WooCommerce reserves the product for the specified time in the **Hold Stock** setting,
preventing others from purchasing the item while the order remains unpaid. Once the set time (e.g., 120 minutes)
elapses, WooCommerce automatically cancels the unpaid order and releases the reserved stock back into inventory.

If stock management is **not** enabled, the system defaults to 120 minutes. This ensures that the reserved stock doesn't
remain indefinitely held for unpaid orders, providing a balanced and controlled inventory management system.

The default TTL can be configured between 1 and 43200 minutes (up to 30 days), depending on the store’s requirements.

This setting can be found under:
**WooCommerce > Settings > Products > Inventory > Hold Stock (minutes)**.

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

#### HANDLING ERRORS WITH CREDENTIALS

If you enter incorrect credentials:

1. **Fetching Store Failure**:
    - An error message will display, indicating that the credentials are incorrect.
    - The store list will not appear.

2. **Session Handling**:
    - Incorrect credentials may also impact session handling. If the session fails due to invalid credentials, the admin
      view will alert you, and no further actions can be taken until the correct credentials are entered.

3. **Invalid Scope Warnings**:
    - If you switch between environments (Test and Production), there may be warnings about scope. These occur when
      WooCommerce tries to use previously saved data that conflicts with the current environment.
    - Fetching the store list again with the correct credentials will resolve these issues, ensuring that the correct
      environment data is stored.

#### SWITCHING BETWEEN ENVIRONMENTS

When switching from **Test** to **Production** or vice versa:

1. You must fetch the store data again using the **Fetch Stores** button.
2. Ensure that the correct environment credentials are entered before fetching the store data.
3. Once the store list is successfully retrieved, you can proceed to save the credentials for the new environment.
4. The store list for the previous environment will no longer be available, and you must fetch new store data before
   proceeding.

#### REMEMBER!

1. **Always Verify Credentials**: Ensure that the credentials you enter are accurate before attempting to fetch store
   data. This avoids unnecessary errors and ensures smooth functionality.

2. **Fetch Stores After Environment Switch**: Whenever you switch between environments, remember to fetch the store data
   again to ensure that the credentials are properly updated for the selected environment.

3. **Check Error Messages**: If you encounter any issues while saving or fetching stores, check for error messages
   related to invalid credentials or session handling. Address these issues before proceeding.

#### SUMMARY OF WORKFLOW

1. Enter credentials in the appropriate fields.
2. Fetch store data to verify the credentials.
3. Once the store list is retrieved, save the credentials.
4. If switching environments, fetch the store data for the new environment before saving.
5. Ensure no "invalid scope" or "bad credentials" warnings appear after saving. If these occur, re-enter credentials and
   fetch the store data again.

By following these guidelines, the credentials management process in WooCommerce will be streamlined, ensuring smooth
transitions between environments and avoiding common credential-related errors.

### Payment Methods

This tab has no settings on it but allows you to see which payment
methods have been configured for your account. Example:

![](../../../../attachments/91029886/131006472.png)

### Part Payment

[Part payment widget](part-payment-widget)

### Order Management

Here you can enable/disable the different order management features of
the plugin.

![](../../../../attachments/91029886/91029889.png)

### Callbacks

Callbacks are notifications sent to a specified URL when a payment
reaches a certain status, such as authorization or rejection.

![](../../../../attachments/91029886/91029987.png)

### Advanced

This tab contains more advanced settings such as logging and cache
settings. As a general rule it is recommended to keep the cache enabled
as it significantly reduces the number of requests made to the API (and
thus improves performance under most circumstances).

![](../../../../attachments/91029886/131006469.png)

# Part payment widget

This feature of the plugin allows your store to display a small widget
on individual product pages with information about available part
payment options including a modal iframe popup with more detailed
information.

![Widget
appearance](../../../../attachments/91029758/91029756.png "Widget appearance")![Modal
appearance](../../../../attachments/91029758/regexp.png "Modal appearance")

## Configuration

The widget configuration options can be found on the `Part payment` tab
*under* `WooCommerce → Settings → Resurs Bank`.

Before configuring the widget you need to set the global plugin
configuration on the `API` Settings tab.

![Configuration
form](../../../../attachments/91029758/91029759.png "Configuration form")

### Part payment widget enabled

Toggle this setting to enable or disable the widget.

### Payment method

This option allows you to choose which of your payment method to use for
the widget.

Only payment methods that support part payment will be available here.

### Annuity period

Controls how long of a payment period to calculate the monthly cost for.

Like with the payment method setting only supported periods will be
shown.

### Limit

Sets a lower monthly installment limit under which the widget will not
be displayed.

If you to set the limit higher than the payment method's maximum
configured purchase price you will see a warning message after saving
your settings.

You should set this value high enough that the monthly cost is at least
SEK 150 (Sweden) or EUR 15 (Finland).

# Order management

The plugin has functionality built into it for automatically updating
the payment at Resurs Bank when the order is manually edit/updated in
WooCommerce order view.

By default all of these features are enabled when the plugin is enabled
but can be disabled in the settings under
`WooCommerce → Settings → Resurs Bank → Order Management`.

![](../../../../attachments/91029950/91029949.png)

# Enable Capture

When this setting is enabled the payment will be automatically captured
when the order status is set to `Completed` in WooCommerce.

Once an order has been set to Completed it can no longer be reverted to
another status.

*The module does not support partial captures.*

An order which has been partially captured using the Merchant Portal can
still have the remaining order amount captured from WooCommerce.

# Enable Cancel

This feature works much like the `Enable Capture `setting in that it
automatically cancels the payment when an order is cancelled in
WooCommerce. Similarly, once an order has been cancelled it can't be
reverted to another status but a payment that's been partially cancelled
through the Merchant Portal can still have its remaining order lines
cancelled through the order view.

# Enable Refund

Like the `Enable Capture `and `Enable Cancel `features this feature will
both automatically handle refunds of the payment when a refund is
applied to the order in WooCommerce and once an order has been refunded
it can't be reverted to another status and allow complete refunds of the
payment when a partial refund has already been applied through the
Merchant Portal.

# Enable Modify

With this feature enabled changes you make to an order will be reflected
on the payment.

However, there are some caveats. First of all, this only works if the
payment can be captured, cancelled or if it has been fully cancelled.
Furthermore, if the sum total for the changed order are equal to what
they were before changing the order no call will be made to Resurs Bank.
E.g. if you substitute one product for another with the exact same price
then the change will not be transmitted to the payment.

One workaround for this issue is to cancel the payment through the
Merchant Portal before editing the order in WooCommerce as this changes
the authorized amount on the order to 0.

It should also be noted that it's not possible to exceed the credit
limit which has been authorized for the payment. Instead the customer
should place a new order.

Should the modify action fail it can sometimes result in the payment
being cancelled despite the order not being cancelled. If this happens
you can click the `Recalculate `button to update the order state as this
also pushes the order update to the payment at Resurs.

> Please also note that changes made from Resurs Merchant Portal will
> not reflect back to the WooCommerce system and have to be made there
> as well.

# MAPI Checkout Flow

Reserved space for the described MAPI-flow. It very much looks like the
prior flow, with a few enhancements.

## Purchasing with the new Merchant API.

The Merchant API is, like the former simplified shopflow, made to go
with a platform default rules but with some improvements. The
WooCommerce order will (as before) be created first (in *Pending*
status), then Resurs order is placed and finally - depending on the
result - updated to *Processing*. The procedure looks like this:

1. Purchase button is clicked. WooCommerce starts handling the order,
   setting the first Pending status.
2. When WooCommerce checks (stock count, etc) are finished, Resurs
   plugin takes over to create the payment. During this process,
   signing the payment also occurs.
3. When Resurs is done, the order can be either accepted
   (*processing*), rejected (*failed*) or paused (*on-hold*). Depending
   on the outcome, Resurs will redirect customers back, either to the
   final order received-page ("thank you") or a failure-page (if Resurs
   rejects the order, customers redirected to a fail-page will render
   the order to be *canceled*).
4. Side by side with the above steps, callbacks are also sent from
   Resurs, in case that the customer fails to return to the thank you
   page. This makes sure that the statuses are properly set.

### Visualized Flow

## How callbacks works

1. When a purchase is completed and the payment is ready to be handled
   at Resurs side a few callbacks are executed synchronously from
   Resurs. You can see the flow and more information [about the
   callbacks
   here](https://merchant-api.integration.resurs.com/docs/v2/merchant_payments_v2/options#callbacks).
2. To make sure that the callback received from Resurs is correct, the
   plugin will make a secure request with Resurs to confirm the order
   status, before handling the order locally at WooCommerce side.
3. When an order is synchronized with Resurs, the order status will
   update to either *processing, on-hold* or *failed*. If t he order is
   set to *on-hold*, this means that more actions could follow. For
   example, an order at Resurs can be temporarily frozen (which is the
   cause of on-hold) and will be pushed further (to *processing*) when
   ready to handle.

# Trouble shooting and error handling

From time to time, you'll need to handle problems with the plugin.
Before you contact us with error reporting, make sure the below settings
tab are correctly filled in. To avoid us to break your platform, the
field for **log path** is by default empty. If your system can't write
logs to the log path defined there, it may not work at all (which is why
logging is disabled by default). Best practice here is to use you
**path-to-wordpress/wp-content/uploads/wc-logs** which is where
WooCommerce is normally writing their ownlogs. You can look at the
example screen dump below.

By using the same path as your wc-logs directory, you will be able to
look at the log files the same way that you browse WooCommerce logs.

![](../../../../attachments/91030061/91030060.png)

When logging is enabled with the above "practices", you will be able to
see the logs inside the wordpress platform under WooCommerce logs
section like this:

![](../../../../attachments/91030061/91030064.png)

# Figuring out remote ip for whitelisting

In tests, we sometimes need to whitelist your server's IP address, for example when your server is located in a country
outside the Nordic region.

Normally, it is not very difficult to figure out which IP address needs to be whitelisted. There are many services
available on the internet that can fetch the proper address, or you could simply run a console-based command like this
from your server. Example:

```html
curl https://ipv4.netcurl.org/ip.php
91.198.202.76
```

# Resurs Mail Flow Explained

This section explains how the mail flow is integrated with the plugin. The plugin itself does not trigger or manipulate
emails but relies on WooCommerce order status updates to control when emails are sent. These updates help prevent issues
such as orders being canceled if left in "Pending Payment" for too long, depending on how WooCommerce is configured. For
example, stock handling may automatically cancel orders in pending status after a set period. We also avoid using the "
On Hold" status to pause orders while waiting for customer action, ensuring a smoother and more reliable order flow.
Here's an outline of what happens during a payment:

1. **Customer initiates checkout and completes the payment:**

   The order is first created in WooCommerce.

2. **Customer is redirected to an external page:**

   On this page, the customer completes tasks such as signing or confirming the payment. During this process, the order
   is already created in WooCommerce and is automatically set to "Pending Payment," which is the default initial status
   for an order.

3. **No further action occurs until the payment is completed:**

   Once the customer returns to the "Thank You" page, the WooCommerce order is updated to "Processing." At this point,
   WooCommerce automatically sends the first confirmation email to the customer.

### Alternative Scenario:

1. **Customer is redirected to an external page:**

   On this page, the customer completes signing, payment via credit card (e.g., Visa/Mastercard), etc.

2. **Customer exits the browser before returning to the success page:**

   If the customer closes their browser before being redirected back to the "Thank You" page, Resurs Bank initiates a
   callback to the shop.

3. **Callback process and status update instead of customer success page:**

   A callback registers the payment completion in the system but is delayed briefly to avoid conflicts with the
   customer's actions. This cooldown ensures that if the customer reaches the "Thank You" page during this time, the
   callback and customer actions do not interfere, allowing the order status to update correctly and the confirmation
   email to send without errors. This system is built to prevent duplicate email sending without the use
   of [WC Worker Queue](https://github.com/woocommerce/woocommerce/wiki/WC_Queue---WooCommerce-Worker-Queue).

### A Third Scenario Based on Merchant Errors:

1. **Customer begins the process as described above:**

   The customer is redirected to an internal page but decides to abandon the process without explicitly canceling the
   payment. As a result, the payment remains in a "Pending" state in the system.

2. **Merchant manually changes the order status incorrectly:**

   If the merchant mistakenly updates the order status to "Processing" in the WooCommerce order editor, WooCommerce will
   send a confirmation email to the customer. However, since the payment remains incomplete, the transaction is not
   finalized until the customer confirms and completes the payment.
