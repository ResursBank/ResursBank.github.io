---
layout: page
title: The Problems With Wpmu (Wordpress Network) And Resurs Webservices
nav_exclude: true
permalink: /platform-plugins/woocommerce/resurs-bank-payment-gateway-for-woocommerce--v2-2--resurs-checkout---simplified-flow/71794948/
parent: Woocommerce
grand_parent: Platform Plugins
---

Problems With Wpmu

# The problems with WPMU (Wordpress Network) and Resurs webservices

This page has been added to describe why multisite setups - where
**several sites handles one webservice account** - will never work
properly. Please be aware that this is not the same solution as if you
were running WPML (the multilingual plugin).

First of all, the problem does not actually lies within the plugin but
in Resurs Bank - it is actually Resurs Bank that does not support
multisite accounts. There are some issues that is simply not supported
here:

## Order ID numbering

Normally, the plugin are connecting an order to its order ID in the
platform by a datestamp. You can also run the plugin by setting the
order id as the incremental post ID for the multisite. If you tend to
follow an incremental id and initialize your first site with order
number sequence 1000, your second with 2000, and so on, those order
numbers will at some point in time collide.

When orders are created like this on Resurs Bank where the same
webservice account are used over several sites, your sites may be able
to sort this issue out. On Resurs Bank this won't happen as all orders
are created on the same account. When your first site reaches 1999 and
tries to switch over to sequence 2000, the webservice will stop working
as an exception will be thrown at bookPayment level - saying that order
id 2000 already exists. You could of course use a higher sequence as
this is only an example. However, at some point - mentioned above -
there might be a risk of conflicts between your sites.

## Callbacks: Only one site will be able to handle callbacks as the database tables are split up to be running each site separately

When the plugin are registering callbacks it is very site specific. In a
WP Network only one URL will be registered without the ability to
identify which site the callback is intended to land on. In theory you
may make this work by handling each callback by its order id. However,
this is not recommended (see the section about Order ID numbering).

### The callback URLs is also a problem

When callbacks are registered, salt keys are also registered at the
webservice endpoint. Those salt keys are stored at the site where they
were registered. By means, if you have four sites and register callback
with site 2, the other sites will be unable to handle the callbacks due
to the different saltkeying. Besides, your site 2 may register different
URL's compared to your other sites. This is a limitation that resides at
Resurs Bank.

