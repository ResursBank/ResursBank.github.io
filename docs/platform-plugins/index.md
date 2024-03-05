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
  platforms](#PlatformPlugins-Supportedopensourcee-commercewebsiteplatforms)
- [E-Commerce Platforms](#PlatformPlugins-E-CommercePlatforms)
  - [SSL Certificate, https and
    certificates](#PlatformPlugins-SSLCertificate,httpsandcertificates)
    - [Do not forget to check your certificates! See FAQ for more
      information.](#PlatformPlugins-Donotforgettocheckyourcertificates!Seeformoreinformation.)
  - [Maintaining
    Compatibility](#PlatformPlugins-MaintainingCompatibility)
  - [PHP Platform
    Requirements](#PlatformPlugins-PHPPlatformRequirements)
    - [Avoid PHP 5.6, try push your PHP platform upwards - not
      downwards.](#PlatformPlugins-AvoidPHP5.6,trypushyourPHPplatformupwards-notdownwards.)
  - [Autotesting](#PlatformPlugins-Autotesting)
[Issue tracking](#PlatformPlugins-Issuetracking)
- [Magento modules](Magento-modules_1476277.html)
- [OpenCart](OpenCart_3441572.html)
- [PrestaShop Payment
  Gateways](PrestaShop-Payment-Gateways_12189753.html)
- [WooCommerce](WooCommerce_2588830.html)
# Supported open source e-commerce website platforms
  
  
| E-Commerce Platforms                                                     | Magentov2.3.x-v2.4.x                                    | WooCommerceRead more                          | OpenCartv1.5.x - v3.x End of life: September, 2023     | PrestaShopv1.6.1.x / v1.7.7.x End of life: October 1, 2022 | PrestaShopv1.7.7.xEnd of life: September, 2023 |
|--------------------------------------------------------------------------|---------------------------------------------------------|-----------------------------------------------|--------------------------------------------------------|------------------------------------------------------------|------------------------------------------------|
| **Shop flow**                                                            |                                                         |                                               |                                                        |                                                            |                                                |
| [Resurs Checkout](Resurs-Checkout-Web_5014022.html)                      | ![(tick)](images/icons/emoticons/check.svg)Not Denmark  | ![(error)](images/icons/emoticons/error.svg)  | ![(tick)](images/icons/emoticons/check.svg)Not Denmark | ![(tick)](images/icons/emoticons/check.svg)Not Denmark     | ![(error)](images/icons/emoticons/error.svg)   |
| [Simplified Flow](Simplified-Flow-API_1476359.html)End of life: Q1, 2024 | ![(tick)](images/icons/emoticons/check.svg)             | ![(error)](images/icons/emoticons/error.svg)  | ![(error)](images/icons/emoticons/error.svg)           | ![(error)](images/icons/emoticons/error.svg)               | ![(tick)](images/icons/emoticons/check.svg)    |
| [Resurs Merchant API 2.0](Merchant-API-2.0_91029586.html)                | ![(error)](images/icons/emoticons/error.svg)            | ![(tick)](images/icons/emoticons/check.svg)   | ![(error)](images/icons/emoticons/error.svg)           | ![(error)](images/icons/emoticons/error.svg)               | ![(error)](images/icons/emoticons/error.svg)   |
|  **After shop**                                                          |                                                         |                                               |                                                        |                                                            |                                                |
|  Debiting whole order                                                    | ![(tick)](images/icons/emoticons/check.svg)             | ![(tick)](images/icons/emoticons/check.svg)   | ![(error)](images/icons/emoticons/error.svg)           | ![(error)](images/icons/emoticons/error.svg)               | ![(tick)](images/icons/emoticons/check.svg)    |
|  Debiting part order                                                     | ![(error)](images/icons/emoticons/error.svg)            | ![(error)](images/icons/emoticons/error.svg)  | ![(error)](images/icons/emoticons/error.svg)           | ![(error)](images/icons/emoticons/error.svg)               | ![(error)](images/icons/emoticons/error.svg)   |
| Crediting whole order                                                    | ![(tick)](images/icons/emoticons/check.svg)             | ![(tick)](images/icons/emoticons/check.svg)   | ![(error)](images/icons/emoticons/error.svg)           | ![(error)](images/icons/emoticons/error.svg)               | ![(tick)](images/icons/emoticons/check.svg)    |
|  Crediting part order                                                    | ![(tick)](images/icons/emoticons/check.svg)             | ![(tick)](images/icons/emoticons/check.svg)\* | ![(error)](images/icons/emoticons/error.svg)           | ![(error)](images/icons/emoticons/error.svg)               | ![(tick)](images/icons/emoticons/check.svg)    |
|  Annulment whole order                                                   | ![(tick)](images/icons/emoticons/check.svg)             | ![(tick)](images/icons/emoticons/check.svg)   | ![(error)](images/icons/emoticons/error.svg)           | ![(error)](images/icons/emoticons/error.svg)               | ![(tick)](images/icons/emoticons/check.svg)    |
|  Annulment part order                                                    | ![(error)](images/icons/emoticons/error.svg)            | ![(tick)](images/icons/emoticons/check.svg)\* | ![(error)](images/icons/emoticons/error.svg)           | ![(error)](images/icons/emoticons/error.svg)               | ![(tick)](images/icons/emoticons/check.svg)    |
|  Additional Debit of Payment                                             | ![(error)](images/icons/emoticons/error.svg)            | ![(error)](images/icons/emoticons/error.svg)  | ![(error)](images/icons/emoticons/error.svg)           | ![(error)](images/icons/emoticons/error.svg)               | ![(error)](images/icons/emoticons/error.svg)   |
| ** Callback support**                                                    |                                                         |                                               |                                                        |                                                            |                                                |
|  Callbacks report to shop                                                | ![(tick)](images/icons/emoticons/check.svg)             | ![(tick)](images/icons/emoticons/check.svg)   | ![(tick)](images/icons/emoticons/check.svg)            | ![(tick)](images/icons/emoticons/check.svg)                | ![(tick)](images/icons/emoticons/check.svg)    |
| **Discounts and fees  **                                                 |                                                         |                                               |                                                        |                                                            |                                                |
|  Handle gift card                                                        | ![(error)](images/icons/emoticons/error.svg)            | ![(error)](images/icons/emoticons/error.svg)  |  ![(tick)](images/icons/emoticons/check.svg)           | ![(error)](images/icons/emoticons/error.svg)               | ![(error)](images/icons/emoticons/error.svg)   |
|  Handle invoice fee                                                      | ![(error)](images/icons/emoticons/error.svg)            | ![(tick)](images/icons/emoticons/check.svg)   |  ![(error)](images/icons/emoticons/error.svg)          | ![(error)](images/icons/emoticons/error.svg)               | ![(error)](images/icons/emoticons/error.svg)   |
|  Handle discount                                                         | ![(tick)](images/icons/emoticons/check.svg)             | ![(tick)](images/icons/emoticons/check.svg)   |  ![(tick)](images/icons/emoticons/check.svg)           | ![(tick)](images/icons/emoticons/check.svg)                | ![(tick)](images/icons/emoticons/check.svg)    |
|  Handle shipping fee                                                     | ![(tick)](images/icons/emoticons/check.svg)             | ![(tick)](images/icons/emoticons/check.svg)   |  ![(tick)](images/icons/emoticons/check.svg)           | ![(tick)](images/icons/emoticons/check.svg)                | ![(tick)](images/icons/emoticons/check.svg)    |
| **Other**                                                                |                                                         |                                               |                                                        |                                                            |                                                |
| Display monthly cost with Resurs Bank in product catalog                 | ![(tick)](images/icons/emoticons/check.svg)             | ![(tick)](images/icons/emoticons/check.svg)   | ![(tick)](images/icons/emoticons/check.svg)            | ![(tick)](images/icons/emoticons/check.svg)                | ![(tick)](images/icons/emoticons/check.svg)    |
| Use platform order number as reference in Resurs Bank                    | ![(tick)](images/icons/emoticons/check.svg)             | ![(tick)](images/icons/emoticons/check.svg)   | ![(tick)](images/icons/emoticons/check.svg)            | ![(tick)](images/icons/emoticons/check.svg)                | ![(tick)](images/icons/emoticons/check.svg)    |
|  Supports multistore                                                     | ![(tick)](images/icons/emoticons/check.svg)             | ![(error)](images/icons/emoticons/error.svg)  | ![(tick)](images/icons/emoticons/check.svg)            | ![(error)](images/icons/emoticons/error.svg)               | ![(error)](images/icons/emoticons/error.svg)   |
  
  
## SSL Certificate, https and certificates
### Do not forget to check your certificates! See [FAQ](FAQ_328016.html) for more information.
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
Have a look at the landing page
for [Development](Development_950386.html).
  
The plugins listed and provided from this page are open source and
community-driven software. By means, it is software that *could* be used
by merchants for their ecommerce.
The community solution opens up for developers to make special
adaptations, forks and features. You don't have to use them and many
developers choosed to write their own integrations. It is your
responsibility to test and make control that the plugins works properly
within your platform. If it doesn't work, feel free to contact us via
[onboarding@resurs.se](mailto:onboarding@resurs.se). ****Do not****
publish our plugins straight into a production server, before those
steps. The plugins on this page are written generically and supposed to
work with many solutions. This said, it is not guaranteed to fit or work
with all solutions.
Also, if you feel you want to modify the plugins and share it, fork the
projects from Bitbucket and create your pull request for us.
