---
layout: page
title: Platform Plugins
permalink: /platform-plugins/
nav_order: 31
has_children: true
has_toc: false
---

# Platform Plugins

# Supported open source e-commerce website platforms

| E-Commerce Platforms                                     | Magento v2.4.4+ | WooCommerce v7.6.0+ | PrestaShop v8.2.0- |
|----------------------------------------------------------|-----------------|---------------------|--------------------|
| **Shop flow**                                            |                 |                     |                    | 
| Resurs Merchant API 2.0                                  | YES             | YES                 | YES                |
| **After shop**                                           |                 |                     |                    |                                               
| Debiting whole order                                     | YES             | YES                 | YES                |
| Debiting part order                                      | NO              | NO                  | NO                 |
| Crediting whole order                                    | YES             | YES                 | YES                |
| Crediting part order                                     | YES             | YES \*              | YES                |
| Annulment whole order                                    | YES             | YES                 | YES                |
| Annulment part order                                     | NO              | YES \*              | YES                |
| Additional Debit of Payment                              | NO              | NO                  | NO                 |
| **Callback support**                                     |                 |                     |                    |
| Callbacks report to shop                                 | YES             | YES                 | YES                |
| **Discounts and fees**                                   |                 |                     |                    |
| Handle gift card                                         | NO              | NO                  | NO                 |
| Handle invoice fee                                       | NO              | NO                  | NO                 |
| Handle discount                                          | YES             | YES                 | YES                |
| Handle shipping fee                                      | YES             | YES                 | YES                |
| **Other**                                                |                 |                     |                    |
| Display monthly cost with Resurs Bank in product catalog | YES             | YES                 | YES                |
| Use platform order number as reference in Resurs Bank    | YES             | YES                 | YES                |
| Supports multistore                                      | YES             | NO                  | NO                 |

### Fee notes

*Fees are supported in WooCommerce in the way that if you add fees with an external plugin, they will be added to the
order sent to Resurs Bank. However, the plugin does not handle fees itself.*

## SSL Certificate https and certificates

### Remember to check your certificates!

[See the FAQ](/faq/)

## Maintaining Compatibility

**The more plugins you activate that handles your layout - and changes
the default** **behavior** **of regular styling - the more the risk that
the plugin won't work as intended.**

## PHP Platform Requirements

Most of our new plugins work with Merchant API. Merchant API are in PHP cases driven with Ecom2, our library that
handles the communication with MAPI. Ecom2 requires PHP 8.1 or higher versions. For MAPI, you also need a token
compatible version of cURL. Make sure **CURLAUTH_BEARER** is available.

> The plugins listed and provided from this page are open source and
> community-driven software. By means, it is software that could be used
> by merchants for their ecommerce. The community solution opens up for
> developers to make special adaptations, forks, and features. You don't
> have to use them, and many developers choose to write their own
> integrations as part of their IT job.
>
> It is your sole responsibility to test and make control that
> the plugin works properly within your platform. If it doesn't work,
> feel free to contact us via onboarding@resurs.se. Do not launch our
> plugins straight into a production server, before checking those steps.
>
> The plugins on this page are written as generic solutions, and are
> supposed to work with many solutions.
>
> That said, it is not a guarantee that it fits or works with
> all solutions. Also, if you feel you want to modify the plugins and
> share it, fork the projects from Bitbucket and create your pull
> request for us. The things you do may be useful for others.


# ECom2 PHP-lib

Library to communicate with **Resurs Bank APIs**.  
This library aims to provide **complete API coverage**, including Merchant API (MAPI), PriceSignage, Store management,
and callback handling. It replaces all previous EComPHP releases and serves as the foundation for modern Resurs
integrations in PHP.

The library is written for **PHP 8.1 or higher** and is actively maintained in the `resursbankplugins/ecom2`
repository.  
It follows a modular structure with standalone components for payment handling, configuration, logging, caching, and
widget rendering.

Full documentation, including examples, module breakdowns, and JavaScript integration details, can be found at:  
[https://bitbucket.org/resursbankplugins/ecom2/src/master/README.md](https://bitbucket.org/resursbankplugins/ecom2/src/master/README.md)

---

### Quick summary

- **Supported PHP:** 8.1+ (older versions no longer supported)
- **Primary API:** [Merchant API (MAPI)](/merchant-api-2.0/)
- **Removed flows:** All legacy and SOAP-based integrations have been deprecated.
- **Active repository:** [bitbucket.org/resursbankplugins/ecom2](https://bitbucket.org/resursbankplugins/ecom2)

---

ECom V2 is continuously developed and updated.  
This page provides a summary reference for developers working on integrations or reviewing implementation details. For
the full technical reference and changelog, always refer to the Bitbucket documentation above.

