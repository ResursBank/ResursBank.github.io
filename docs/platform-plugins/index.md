---
layout: page
title: Platform Plugins
permalink: /platform-plugins/
has_children: true
---


# Platform Plugins 
Created by Benny, last modified by Gert on 2023-10-16
**Content of this page**
- [Supported open source e-commerce website
  platforms](#platformplugins-supportedopensourcee-commercewebsiteplatforms)
- [E-Commerce Platforms](#platformplugins-e-commerceplatforms)
  - [SSL Certificate, https and
    certificates](#platformplugins-sslcertificate,httpsandcertificates)
    - [Do not forget to check your certificates! See FAQ for more
      information.](#platformplugins-donotforgettocheckyourcertificates!seeformoreinformation.)

  - [Maintaining
    Compatibility](#platformplugins-maintainingcompatibility)
  - [PHP Platform
    Requirements](#platformplugins-phpplatformrequirements)
    - [Avoid PHP 5.6, try push your PHP platform upwards - not
      downwards.](#platformplugins-avoidphp5.6,trypushyourphpplatformupwards-notdownwards.)

  - [Autotesting](#platformplugins-autotesting)

[Issue tracking](#platformplugins-issuetracking)

- [Magento modules](magento-modules)
- [OpenCart](opencart)
- [PrestaShop Payment Gateways](prestashop-payment-gateways)
- [WooCommerce](woocommerce)

# Supported open source e-commerce website platforms

| E-Commerce Platforms                                        | Magentov2.3.x-v2.4.x                                    | WooCommerceRead more                          | OpenCartv1.5.x - v3.x End of life: September, 2023     | PrestaShopv1.6.1.x / v1.7.7.x End of life: October 1, 2022 | PrestaShopv1.7.7.xEnd of life: September, 2023 |
|-------------------------------------------------------------|---------------------------------------------------------|-----------------------------------------------|--------------------------------------------------------|------------------------------------------------------------|------------------------------------------------|
| **Shop flow**                                               |                                                         |                                               |                                                        |                                                            |                                                |
| [Resurs Checkout](resurs-checkout-web)                      | :white_check_mark: Not Denmark  | :x:   | :white_check_mark: Not Denmark | :white_check_mark: Not Denmark     | :x:    |
| [Simplified Flow](simplified-flow-api)End of life: Q1, 2024 | :white_check_mark:              | :x:   | :x:            | :x:                | :white_check_mark:     |
| [Resurs Merchant API 2.0](merchant-api-2.0)                 | :x:             | :white_check_mark:    | :x:            | :x:                | :x:    |
|  **After shop**                                             |                                                         |                                               |                                                        |                                                            |                                                |
|  Debiting whole order                                       | :white_check_mark:              | :white_check_mark:    | :x:            | :x:                | :white_check_mark:     |
|  Debiting part order                                        | :x:             | :x:   | :x:            | :x:                | :x:    |
| Crediting whole order                                       | :white_check_mark:              | :white_check_mark:    | :x:            | :x:                | :white_check_mark:     |
|  Crediting part order                                       | :white_check_mark:              | :white_check_mark: \* | :x:            | :x:                | :white_check_mark:     |
|  Annulment whole order                                      | :white_check_mark:              | :white_check_mark:    | :x:            | :x:                | :white_check_mark:     |
|  Annulment part order                                       | :x:             | :white_check_mark: \* | :x:            | :x:                | :white_check_mark:     |
|  Additional Debit of Payment                                | :x:             | :x:   | :x:            | :x:                | :x:    |
| ** Callback support**                                       |                                                         |                                               |                                                        |                                                            |                                                |
|  Callbacks report to shop                                   | :white_check_mark:              | :white_check_mark:    | :white_check_mark:             | :white_check_mark:                 | :white_check_mark:     |
| **Discounts and fees  **                                    |                                                         |                                               |                                                        |                                                            |                                                |
|  Handle gift card                                           | :x:             | :x:   |  :white_check_mark:            | :x:                | :x:    |
|  Handle invoice fee                                         | :x:             | :white_check_mark:    |  :x:           | :x:                | :x:    |
|  Handle discount                                            | :white_check_mark:              | :white_check_mark:    |  :white_check_mark:            | :white_check_mark:                 | :white_check_mark:     |
|  Handle shipping fee                                        | :white_check_mark:              | :white_check_mark:    |  :white_check_mark:            | :white_check_mark:                 | :white_check_mark:     |
| **Other**                                                   |                                                         |                                               |                                                        |                                                            |                                                |
| Display monthly cost with Resurs Bank in product catalog    | :white_check_mark:              | :white_check_mark:    | :white_check_mark:             | :white_check_mark:                 | :white_check_mark:     |
| Use platform order number as reference in Resurs Bank       | :white_check_mark:              | :white_check_mark:    | :white_check_mark:             | :white_check_mark:                 | :white_check_mark:     |
|  Supports multistore                                        | :white_check_mark:              | :x:   | :white_check_mark:             | :x:                | :x:    |

## SSL Certificate, https and certificates
### Do not forget to check your certificates! See [FAQ](faq) for more information.
## Maintaining Compatibility
**The more plugins you activate that handles your layout - and changes
the default** **behavior** **of regular styling - the more the risk that
the plugin won't work as intended.**

## PHP Platform Requirements
#### **Avoid PHP 5.6, try push your PHP platform upwards - not downwards.**
- We officially only support PHP versions which are actively maintained.
  Support for legacy versions is not guaranteed.
- JSON / ext-json
- Soap / ext-xml

### Autotesting
All tests related to PHP releases older than 7.3 has been dropped. Our
**[Pipelines](https://bitbucket.org/resursbankplugins/resurs-ecomphp/addon/pipelines/home)**
runs with 7.3, 7.4 and 8.0.
**[Bamboo](http://bamboo.resurs.it/browse/RB-RBT)** dropped all tests,
except for 7.3 for several reasons.

We have dropped all our testings for older PHP releases.  only runs with
PHP 7.3, 7.4 and 8.0 - ** **as an extra test suite, only runs  on 7.3.
Since the market changes rapidly we realized that we had to drop all old
tests, as the started to break while we were going forward.

# Issue tracking
Have a look at the landing page for [Development](development).

> The plugins listed and provided from this page are open source and
> community-driven software. By means, it is software that could be used
> by merchants for their ecommerce.The community solution opens up for
> developers to make special adaptations, forks and features. You don't
> have to use them and many developers choosed to write their own
> integrations. It is your responsibility to test and make control that
> the plugins works properly within your platform. If it doesn't work,
> feel free to contact us via onboarding@resurs.se. Do not publish our
> plugins straight into a production server, before those steps. The
> plugins on this page are written generically and supposed to work with
> many solutions. This said, it is not guaranteed to fit or work with
> all solutions.Also, if you feel you want to modify the plugins and
> share it, fork the projects from Bitbucket and create your pull
> request for us.

