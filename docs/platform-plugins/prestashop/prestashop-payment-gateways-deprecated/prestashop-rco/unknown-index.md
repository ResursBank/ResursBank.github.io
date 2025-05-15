---
layout: page
title: Prestashop Payment Gateways
permalink: /platform-plugins/prestashop-payment-gateways/
av_order: 31
parent: Platform Plugins
has_children: true
has_toc: false
nav_exclude: true
---

# PrestaShop  

## Internal error handling i Cart parts

To make sure we can separate "common errors" from the unknown exceptions
we've added a bunch of error codes in the Cart.php-section of the
Prestashop-RCO module. They are mostly self explained, but we're listing
them as is below.

| Code | Exception                                        |
|------|--------------------------------------------------|
| 800  | No shipping address data in session.             |
| 801  | Failed to resolve shipping address.              |
| 802  | No payment session has been created.             |
| 803  | Email missing in customer session data.          |
| 804  | Failed to find order associated with cart \<id\> |
| 805  | Failed to load order with id \<id\>              |

