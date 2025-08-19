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

| E-Commerce Platforms                                     | Magento v2.4.4+ | WooCommerce v7.6.0- | PrestaShop v8.2.0- | 
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
| Handle invoice fee                                       | NO              | YES                 | NO                 |
| Handle discount                                          | YES             | YES                 | YES                |
| Handle shipping fee                                      | YES             | YES                 | YES                |
| **Other**                                                |                 |                     |                    |
| Display monthly cost with Resurs Bank in product catalog | YES             | YES                 | YES                |
| Use platform order number as reference in Resurs Bank    | YES             | YES                 | YES                |
| Supports multistore                                      | YES             | NO                  | NO                 |

<!---
| E-Commerce Platforms                                        | Magentov2.3.x-v2.4.x                                    | WooCommerceRead more                          | OpenCartv1.5.x - v3.x End of life: September, 2023     | PrestaShopv1.6.1.x / v1.7.7.x End of life: October 1, 2022 | PrestaShopv1.7.7.x End of life: September, 2023 |
|-------------------------------------------------------------|---------------------------------------------------------|-----------------------------------------------|--------------------------------------------------------|------------------------------------------------------------|------------------------------------------------|
| **Shop flow**                                               |                                                         |                                               |                                                        |                                                            |                                                |
| Resurs Checkout                      | YES (Not Denmark)  | NO   | YES (Not Denmark) | YES (Not Denmark)     | NO    |
| Simplified Flow  | YES              | NO   | NO            | NO                | YES     |
| Resurs Merchant API 2.0](merchant-api-2.0)                 | NO             | YES    | NO            | NO                | NO    |
|  **After shop**                                             |                                                         |                                               |                                                        |                                                            |                                                |
|  Debiting whole order                                       | YES              | YES    | NO            | NO                | YES     |
|  Debiting part order                                        | NO             | NO   | NO            | NO                | NO    |
| Crediting whole order                                       | YES              | YES    | NO            | NO                | YES     |
|  Crediting part order                                       | YES              | YES \* | NO            | NO                | YES     |
|  Annulment whole order                                      | YES              | YES    | NO            | NO                | YES     |
|  Annulment part order                                       | NO             | YES \* | NO            | NO                | YES     |
|  Additional Debit of Payment                                | NO             | NO   | NO            | NO                | NO    |
| ** Callback support**                                       |                                                         |                                               |                                                        |                                                            |                                                |
|  Callbacks report to shop                                   | YES              | YES    | YES             | YES                 | YES     |
| **Discounts and fees  **                                    |                                                         |                                               |                                                        |                                                            |                                                |
|  Handle gift card                                           | NO             | NO   |  YES            | NO                | NO    |
|  Handle invoice fee                                         | NO             | YES    |  NO           | NO                | NO    |
|  Handle discount                                            | YES              | YES    |  YES            | YES                 | YES     |
|  Handle shipping fee                                        | YES              | YES    |  YES            | YES                 | YES     |
| **Other**                                                   |                                                         |                                               |                                                        |                                                            |                                                |
| Display monthly cost with Resurs Bank in product catalog    | YES              | YES    | YES             | YES                 | YES     |
| Use platform order number as reference in Resurs Bank       | YES              | YES    | YES             | YES                 | YES     |
|  Supports multistore                                        | YES              | NO   | YES             | NO                | NO    |
-->

## SSL Certificate https and certificates

### Remember to check your certificates! [See the FAQ](/faq/)

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
