This space is reserved for the prior WooCommerce plugin named "Resurs Bank Payment Gateway for WooCommerce". If you are looking for the new Merchant API-plugin named "Resurs Bank Payments for WooCommerce", you should look here!

## Download

This plugin is not available at the official WordPress registry as it is not allowed to have two similar plugins available at the same time. This plugin has instead been replaced with a plugin that supports Resurs Merchant API.

Each individual version tag is also available from bitbucket if you have needs to reinstall it, or upgrade it. All installs have to be done manually as of 12 april 2023.

**Download the latest plugin version below**

_Avoid this if possible. Go for the new MAPI based plugin instead._

[2.2.105.zip](/attachments/2588830/2.2.105.zip)

All older versions are considered unstable and no longer available here.

## Requirements

* At least 1 GB memory or above. Preferrably give php (via php.ini) a free amount of memory to play with by setting memory_limit to -1.
* At least PHP 7.1 since WooCommerce itself requires it in newer version.
* [PHP-SoapClient + XML](https://test.resurs.com/docs/display/ecom/PHP+and+development+libraries) (see requirements).
* Curl or access to php streams.
* An SSL client.

[You can also see PHP and development libraries](/docs/development/php-and-development-libraries).

## Multisite/WordPress Networks

The plugin do support WordPress networks (aka multisite), however it does not support running one webservice account over many sites at once. The main rule that Resurs Bank works with is that one webservice account only works for one site. Running multiple sites do require multiple webservice accounts! Read more about this at [The problems with WPMU (Wordpress Network) and Resurs webservices](problems-with-wpmu.md).

## The flow behind the plugin

This WooCommerce-plugin support multiple flows from Resurs Bank depending on your needs (and country)

Simplified flow
Hosted flow (Paypal-like checkout)
Resurs Checkout

## Plugin installation - versions, requirements and issue tracking

It is recommended that you install the plugin via the plugin manager in Wordpress (Example: <site-url>/wp-admin/plugin-install.php?s=Resurs+Bank&tab=search&type=term).

Using the search terms "Resurs Bank" should lead you right:


## Internal behaviours, troubleshooting and known issues

### Compatibility

The plugin are compatible and works together with most of WooCommerce and WordPress platforms. Discoveries has been made, that a few modules might be conflicting, but as of february 2022 we've removed the old list of compatiblity issues as they are outdated. If you find any new conflicts, feel free to report this.

### Disabling fields for getAddress, but some fields are still showing?

This is an expected behaviour and normall occurs when you have mixed payment methods (by means, you have payment methods that covers both NATURAL and LEGAL customers). To be able to switch over to "Legal mode", the radio buttons used at the get address forms is still required or you will be stuck with NATURAL-customers.

### Handling decimals

Setting decimals to 0 in WooCommerce will result in an incorrect rounding of product prices. It is therefore adviced to set decimal points to 2.  [Read more about it here](../0-decimals-in-woocommerce.md).

### Handling discounts and coupons with hosted flow

If you plan to handle discounts and coupons within the hosted flow, make sure that the setting for handling VAT is disabled. Hosted flow does not allow payments with negative tax values.

### Webhosting companies and blocked callbacks

Some web hosting companies tend to block access from web-browsers like "Java". As our callbacks are sent from a Java-client from Resurs Bank, Callbacks might not work properly if your hosting provider blocks access based on the browser identification.

### Aftershop, handling completed orders and discount

In a normal state, without discounts and customized orders in the order administration, each action that renders debiting, refunds, annulments and so on is based on the order content on Resurs Bank side. In short, such actions will make the plugin do a [getPayment](/docs/after-shop-service-api/get-payment.md) first. Just to make sure that correct articles will be handled as they can be customized by title, price and description. When done, the order will get annulled, credited or finalized.

When it comes to discount, orders will be handled differently. As the original price, compared to an added discount, may have changed the properties of each line, the plugin instead honors the content given by WooCommerce. As the price, due to a discount, has changed the plugin now has to trust the data received from woocommerce. Therefore, the payments in Resurs merchant portal could look different compared to the content of woocommerce order admins. For example, if an article is completely discouned (meaning the coupon used has set the article price to 0), that article may not show up in the portal as debited - since the customer does not have to pay for it. If you see such cases, that happens because the plugin consider the order customized by woocommerce.

### Site caching

Sites that uses caching, to get better performance, may experience problems at for example upgrades or code updates - in cases where javascripts are cached by mistake in renderers and browsers.

### Can't update user credentials in wp-admin

From time to time, especially when you do a lot of actions in admin for the Resurs plugin, updates seem to suddenly stop working. Normally, many functions in the admin control is reached but protected by wordpress nonces, which sometimes stops validating properly. If you are in an emergency need, when this happens you can simply use two flags in the settings in the Resurs advanced section (SKIP_NONCE_ERRORS and ADMIN_NONCE_IGNORE). When those flags are enabled, you can save your data safely again.

### Do the plugin handle any e-mail sending

**tldr;**

No.

**Why?**

WooCommerce is handling all the logics behind the e-mail sending. What's really handling the e-mail flow is the status changes. When something happens in the plugin that triggers the order status to change, WooCommerce is handling the rest. If WooCommerce is configured to send e-mail (which can be seen in the Email-section of the admin panel), it will also send an e-mail. Order statuses can however be partially mapped differently.

### Order statuses on callbacks

Some payment methods causes the plugin to instantly finalize the order. By default, this will put the order in "completed" which for some merchants also means that is is delivered. This is more common among travel companies and merchants that sells digital products, besides payment methods like Vipps and Swish. To prevent payment methods like Vipps and Swish to put an order into completed, you should take a look in the advanced sections under "Callbacks". This can change the way statuses, and thereby e-mail, are handled.
