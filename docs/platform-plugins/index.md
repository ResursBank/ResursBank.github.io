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

| E-Commerce Platforms                                        | Magento v2.3.x-v2.4.x                                    | WooCommerce                          |
|-------------------------------------------------------------|---------------------------------------------------------|-----------------------------------------------|
| **Shop flow**                                               |                                                         |                                               | 
| Resurs Checkout                      | YES (Not Denmark)  | NO   |
| Simplified Flow  | YES              | NO   |
| Resurs Merchant API 2.0                 | NO             | YES    |
|  **After shop**                                             |                                                         |                                               |                                               
|  Debiting whole order                                       | YES              | YES    |
|  Debiting part order                                        | NO             | NO   |
| Crediting whole order                                       | YES              | YES    |
|  Crediting part order                                       | YES              | YES \* |
|  Annulment whole order                                      | YES              | YES    |
|  Annulment part order                                       | NO             | YES \* |
|  Additional Debit of Payment                                | NO             | NO   |
| ** Callback support**                                       |                                                         |                                               |
|  Callbacks report to shop                                   | YES              | YES    |
| **Discounts and fees  **                                    |                                                         |                                               |
|  Handle gift card                                           | NO             | NO   |
|  Handle invoice fee                                         | NO             | YES    |
|  Handle discount                                            | YES              | YES    |
|  Handle shipping fee                                        | YES              | YES    |
| **Other**                                                   |                                                         |                                               |
| Display monthly cost with Resurs Bank in product catalog    | YES              | YES    |
| Use platform order number as reference in Resurs Bank       | YES              | YES    |
|  Supports multistore                                        | YES              | NO   |


<!---
| E-Commerce Platforms                                        | Magentov2.3.x-v2.4.x                                    | WooCommerceRead more                          | OpenCartv1.5.x - v3.x End of life: September, 2023     | PrestaShopv1.6.1.x / v1.7.7.x End of life: October 1, 2022 | PrestaShopv1.7.7.x End of life: September, 2023 |
|-------------------------------------------------------------|---------------------------------------------------------|-----------------------------------------------|--------------------------------------------------------|------------------------------------------------------------|------------------------------------------------|
| **Shop flow**                                               |                                                         |                                               |                                                        |                                                            |                                                |
| Resurs Checkout                      | YES (Not Denmark)  | NO   | YES (Not Denmark) | YES (Not Denmark)     | NO    |
| Simplified Flow  | YES              | NO   | NO            | NO                | YES     |
| Resurs Merchant API 2.0](merchant-api-2.0)                 | NO             | YES    | NO            | NO                | NO    |
|  **After shop**                                             |                                                         |                                               |                                                        |                                                            |                                                |
|  Debiting whole order                                       | YES              | YES    | NO            | NO                | YES     |
|  Debiting part order                                        | NO             | NO   | NO            | NO                | NO    |
| Crediting whole order                                       | YES              | YES    | NO            | NO                | YES     |
|  Crediting part order                                       | YES              | YES \* | NO            | NO                | YES     |
|  Annulment whole order                                      | YES              | YES    | NO            | NO                | YES     |
|  Annulment part order                                       | NO             | YES \* | NO            | NO                | YES     |
|  Additional Debit of Payment                                | NO             | NO   | NO            | NO                | NO    |
| ** Callback support**                                       |                                                         |                                               |                                                        |                                                            |                                                |
|  Callbacks report to shop                                   | YES              | YES    | YES             | YES                 | YES     |
| **Discounts and fees  **                                    |                                                         |                                               |                                                        |                                                            |                                                |
|  Handle gift card                                           | NO             | NO   |  YES            | NO                | NO    |
|  Handle invoice fee                                         | NO             | YES    |  NO           | NO                | NO    |
|  Handle discount                                            | YES              | YES    |  YES            | YES                 | YES     |
|  Handle shipping fee                                        | YES              | YES    |  YES            | YES                 | YES     |
| **Other**                                                   |                                                         |                                               |                                                        |                                                            |                                                |
| Display monthly cost with Resurs Bank in product catalog    | YES              | YES    | YES             | YES                 | YES     |
| Use platform order number as reference in Resurs Bank       | YES              | YES    | YES             | YES                 | YES     |
|  Supports multistore                                        | YES              | NO   | YES             | NO                | NO    |
-->

## SSL Certificate https and certificates
### Do not forget to check your certificates! [FAQ](/faq/)
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

