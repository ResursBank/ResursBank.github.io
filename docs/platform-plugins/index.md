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
| [Resurs Checkout](resurs-checkout-web)                      | ![(tick)](images/icons/emoticons/check.svg)Not Denmark  | ![(error)](images/icons/emoticons/error.svg)  | ![(tick)](images/icons/emoticons/check.svg)Not Denmark | ![(tick)](images/icons/emoticons/check.svg)Not Denmark     | ![(error)](images/icons/emoticons/error.svg)   |
| [Simplified Flow](simplified-flow-api)End of life: Q1, 2024 | ![(tick)](images/icons/emoticons/check.svg)             | ![(error)](images/icons/emoticons/error.svg)  | ![(error)](images/icons/emoticons/error.svg)           | ![(error)](images/icons/emoticons/error.svg)               | ![(tick)](images/icons/emoticons/check.svg)    |
| [Resurs Merchant API 2.0](merchant-api-2.0)                 | ![(error)](images/icons/emoticons/error.svg)            | ![(tick)](images/icons/emoticons/check.svg)   | ![(error)](images/icons/emoticons/error.svg)           | ![(error)](images/icons/emoticons/error.svg)               | ![(error)](images/icons/emoticons/error.svg)   |
|  **After shop**                                             |                                                         |                                               |                                                        |                                                            |                                                |
|  Debiting whole order                                       | ![(tick)](images/icons/emoticons/check.svg)             | ![(tick)](images/icons/emoticons/check.svg)   | ![(error)](images/icons/emoticons/error.svg)           | ![(error)](images/icons/emoticons/error.svg)               | ![(tick)](images/icons/emoticons/check.svg)    |
|  Debiting part order                                        | ![(error)](images/icons/emoticons/error.svg)            | ![(error)](images/icons/emoticons/error.svg)  | ![(error)](images/icons/emoticons/error.svg)           | ![(error)](images/icons/emoticons/error.svg)               | ![(error)](images/icons/emoticons/error.svg)   |
| Crediting whole order                                       | ![(tick)](images/icons/emoticons/check.svg)             | ![(tick)](images/icons/emoticons/check.svg)   | ![(error)](images/icons/emoticons/error.svg)           | ![(error)](images/icons/emoticons/error.svg)               | ![(tick)](images/icons/emoticons/check.svg)    |
|  Crediting part order                                       | ![(tick)](images/icons/emoticons/check.svg)             | ![(tick)](images/icons/emoticons/check.svg)\* | ![(error)](images/icons/emoticons/error.svg)           | ![(error)](images/icons/emoticons/error.svg)               | ![(tick)](images/icons/emoticons/check.svg)    |
|  Annulment whole order                                      | ![(tick)](images/icons/emoticons/check.svg)             | ![(tick)](images/icons/emoticons/check.svg)   | ![(error)](images/icons/emoticons/error.svg)           | ![(error)](images/icons/emoticons/error.svg)               | ![(tick)](images/icons/emoticons/check.svg)    |
|  Annulment part order                                       | ![(error)](images/icons/emoticons/error.svg)            | ![(tick)](images/icons/emoticons/check.svg)\* | ![(error)](images/icons/emoticons/error.svg)           | ![(error)](images/icons/emoticons/error.svg)               | ![(tick)](images/icons/emoticons/check.svg)    |
|  Additional Debit of Payment                                | ![(error)](images/icons/emoticons/error.svg)            | ![(error)](images/icons/emoticons/error.svg)  | ![(error)](images/icons/emoticons/error.svg)           | ![(error)](images/icons/emoticons/error.svg)               | ![(error)](images/icons/emoticons/error.svg)   |
| ** Callback support**                                       |                                                         |                                               |                                                        |                                                            |                                                |
|  Callbacks report to shop                                   | ![(tick)](images/icons/emoticons/check.svg)             | ![(tick)](images/icons/emoticons/check.svg)   | ![(tick)](images/icons/emoticons/check.svg)            | ![(tick)](images/icons/emoticons/check.svg)                | ![(tick)](images/icons/emoticons/check.svg)    |
| **Discounts and fees  **                                    |                                                         |                                               |                                                        |                                                            |                                                |
|  Handle gift card                                           | ![(error)](images/icons/emoticons/error.svg)            | ![(error)](images/icons/emoticons/error.svg)  |  ![(tick)](images/icons/emoticons/check.svg)           | ![(error)](images/icons/emoticons/error.svg)               | ![(error)](images/icons/emoticons/error.svg)   |
|  Handle invoice fee                                         | ![(error)](images/icons/emoticons/error.svg)            | ![(tick)](images/icons/emoticons/check.svg)   |  ![(error)](images/icons/emoticons/error.svg)          | ![(error)](images/icons/emoticons/error.svg)               | ![(error)](images/icons/emoticons/error.svg)   |
|  Handle discount                                            | ![(tick)](images/icons/emoticons/check.svg)             | ![(tick)](images/icons/emoticons/check.svg)   |  ![(tick)](images/icons/emoticons/check.svg)           | ![(tick)](images/icons/emoticons/check.svg)                | ![(tick)](images/icons/emoticons/check.svg)    |
|  Handle shipping fee                                        | ![(tick)](images/icons/emoticons/check.svg)             | ![(tick)](images/icons/emoticons/check.svg)   |  ![(tick)](images/icons/emoticons/check.svg)           | ![(tick)](images/icons/emoticons/check.svg)                | ![(tick)](images/icons/emoticons/check.svg)    |
| **Other**                                                   |                                                         |                                               |                                                        |                                                            |                                                |
| Display monthly cost with Resurs Bank in product catalog    | ![(tick)](images/icons/emoticons/check.svg)             | ![(tick)](images/icons/emoticons/check.svg)   | ![(tick)](images/icons/emoticons/check.svg)            | ![(tick)](images/icons/emoticons/check.svg)                | ![(tick)](images/icons/emoticons/check.svg)    |
| Use platform order number as reference in Resurs Bank       | ![(tick)](images/icons/emoticons/check.svg)             | ![(tick)](images/icons/emoticons/check.svg)   | ![(tick)](images/icons/emoticons/check.svg)            | ![(tick)](images/icons/emoticons/check.svg)                | ![(tick)](images/icons/emoticons/check.svg)    |
|  Supports multistore                                        | ![(tick)](images/icons/emoticons/check.svg)             | ![(error)](images/icons/emoticons/error.svg)  | ![(tick)](images/icons/emoticons/check.svg)            | ![(error)](images/icons/emoticons/error.svg)               | ![(error)](images/icons/emoticons/error.svg)   |

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

