---
layout: page
title: Resurs Merchant Api for Woocommerce
permalink: /platform-plugins/woocommerce/resurs-merchant-api-for-woocommerce/
nav_order: 11
parent: Woocommerce
grand_parent: Platform Plugins
---



# Resurs Merchant API 2.0 for WooCommerce 

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

![](../../../../attachments/91029967/wp_download.png)

 


# Manually installing plugin 
If you plan to install a development version **or** not directly from
WordPress plugin manager, this is the place to look at. If you plan to
run this plugin in a "production state", please install it properly
within the WordPress plugin manager. This page currently only has
information for git installs.

# Installations with zip file (most similar to the WordPress Plugin Repository)
> About the current-zip fileCurrently, there are no stable tag present
> in the repository. When there is a stable tag, the "current" file will
> always contain the most recent release. While waiting, the code
> structure in this zip is based on the master branch.

1\. Upload the plugin
([resurs-bank-payment-gateway-for-woocommerce-current.zip](../../../../attachments/91029909/91030034.zip) -
1.0.0, **last update 2023-04-27**) archive to the "/wp-content/plugins/"
directory.  
2. Activate the plugin through the "Plugins" menu in WordPress.  
3. Configure the plugin via Resurs Bank control panel in admin.

# Installations with git
Go to your WordPress plugin structure (normally located in
**\[WP-ROOT\]**/wp-content/plugins and run this command:

```xml
git clone --recurse-submodules -j8 https://bitbucket.org/resursbankplugins/resursbank-woocommerce.git
```
The slug (path) used by this repository is not the proper name standard
for the module. While writing this, the official slug is not entirely
set yet, but there should be no problems installing it with another slug
name than the default. However, if you use another path than the
default, [be aware of the security issues that may come with
this](https://vavkamil.cz/2021/11/25/wordpress-plugin-confusion-update-can-get-you-pwned/).

The above command will ensure you get all requirements installed in your
structure, but primarily with the master branch installed. You should
consider checking out a stable tag if you really need to use this
install method. In this case you'll also need to check for updates
manually and do manual checkouts.

This kind of installation neither guarantee that submodules are updated
properly. In some cases, you'll need to update lib/ecom manually, with
an extra git pull.

## Dual plugins (how to act on it)
This is how it may look if you run the old version and just installed
the new one. It is always recommended to deactivate the old one before
activating the new one (and vice versa) before you start running them.
The namespaces in the plugins are different to each other, so they
should not crash the platform **if** you enable both of them in the same
time.

![](../../../../attachments/91029909/91029913.png)

## Creating your own zip-release from git
Clone the repository as shown above. Run a script similar like this. You
need rsync and git installed. Observe that this is only a simplified
example. The important thing is to make sure that the codebase has both
the module and lib/ecom merged. The script below will do this, and also
make sure that the latest ecom2-release is present. **Currently, ecom2
don't have any stable tag!**

**Example script**
```xml
#!/bin/bash
branch="master"
if [ "" = "$1" ] ; then
    branch="$1"
fi
src="resurs-bank-payments-for-woocommerce-bitbucket"
dest="zip/resurs-bank-payment-gateway-for-woocommerce"
if [ ! -d $dest ] ; then
    mkdir $dest
fi
echo "Synchronize $src with $dest"
rsync -a --info=progress1,progress2 --delete $src/ $dest
cd $dest
git checkout $branch
git pull
cd lib/ecom
git pull origin master
cd ../..
echo "Bundle by cleanup ..."
find . -name .gitignore -exec rm -v {} \; >/dev/null 2>&1
find . -type d -name .git -exec rm -rvf {} \; >/dev/null 2>&1
cd ..
echo "Archiving ..."
zip -r resurs-bank-payment-gateway-for-woocommerce.zip resurs-bank-payment-gateway-for-woocommerce
```

 


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

  



# Plugin configuration 
This page contains information on the configuration of the plugin.

## Basic configuration
1.  Go to `WooCommerce` → `Settings` and click on the `Resurs Bank` tab

2.  Enter your credentials in the `API Settings`  tab
3.  Choose the correct Store ID for your store from the dropdown 

4.  Save the settings
## Detailed configuration information
### API Settings
This tab is for basic connection settings and is where you enter your
credential from Resurs Bank, whether to use the Production or Test API.

![](../../../../attachments/91029886/91029981.png)

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

1.  Purchase button is clicked. WooCommerce starts handling the order,
    setting the first Pending status.
2.  When WooCommerce checks (stock count, etc) are finished, Resurs
    plugin takes over to create the payment. During this process,
    signing the payment also occurs.
3.  When Resurs is done, the order can be either accepted
    (*processing*), rejected (*failed*) or paused (*on-hold*). Depending
    on the outcome, Resurs will redirect customers back, either to the
    final order received-page ("thank you") or a failure-page (if Resurs
    rejects the order, customers redirected to a fail-page will render
    the order to be *canceled*).
4.  Side by side with the above steps, callbacks are also sent from
    Resurs, in case that the customer fails to return to the thank you
    page. This makes sure that the statuses are properly set.
### Visualized Flow

## How callbacks works
1.  When a purchase is completed and the payment is ready to be handled
    at Resurs side a few callbacks are executed synchronously from
    Resurs. You can see the flow and more information [about the
    callbacks
    here](https://merchant-api.integration.resurs.com/docs/v2/merchant_payments_v2/options#callbacks).
2.  To make sure that the callback received from Resurs is correct, the
    plugin will make a secure request with Resurs to confirm the order
    status, before handling the order locally at WooCommerce side.
3.  When an order is synchronized with Resurs, the order status will
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
