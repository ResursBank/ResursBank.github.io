---
layout: page
title: Magento Modules
permalink: /platform-plugins/magento-modules/
parent: Platform Plugins
nav_order: 11
has_children: true
---



# Magento modules 

Modules in this section is used for integrating Resurs Bank payment
solutions with Magento based e-commerce stores.

## Plugin versions

| Flow/Name                                                                                      | Magento Version | PHP        | Details                                     | Country    | Documentation                                                                                                                   | Links and downloadables                                                        | Support     |
|------------------------------------------------------------------------------------------------|-----------------|------------|---------------------------------------------|------------|---------------------------------------------------------------------------------------------------------------------------------|--------------------------------------------------------------------------------|-------------|
| ~~Resurs Checkout - Magento 1~~                                     | CE 1.9.x        | \>= 5.6    | Resurs Checkout | SE, FI, NO | [ResursCheckout/Magento 1.7-1.9](https://test.resurs.com/docs/display/ecom/Resurs+Bank+Magento+1+module+Checkout+documentation) | [Bitbucket](https://bitbucket.org/resursbankplugins/resurs-checkout-magento1)  | END OF LIFE |
| Resurs Checkout - Magento 2                                     | CE 2.2-2.3      | \>= 5.5.22 | Resurs Checkout | SE, FI, NO | [ResursCheckout/Magento 2.x](https://test.resurs.com/docs/display/ecom/Resurs+Bank+Magento+2+payment+gateway+documentation)     | [Bitbucket](https://bitbucket.org/resursbankplugins/resurs-checkout-magento2)  | END OF LIFE |
| Resurs Checkout - Magento 2                                     | CE 2.4+         | \>= 8.1    | Resurs Checkout | SE, FI, NO | [ResursCheckout/Magento 2.4+](71794717)[RB/Magento 2.4+ Installation Instruction](71794809)                                     | [Marketplace](https://marketplace.magento.com/resursbank-magento-all.html)     | SUPPORTED   |
| ~~Resurs Hosted Flow Plugin~~ | CE 1.7-1.9      | \>= 5.4    |                                             | DK         |                                                                                                                                 | [Bitbucket](https://bitbucket.org/resursbankplugins/resurs-hostedflow-magento) | END OF LIFE |

### Flags
#### END OF LIFE
The EOL flag above is a way for us to mark how our support works and
when there is an **E**nd **O**f **L**ife for each plugin.

For our Resurs OldFlow Plugin, there is an end of life that have been
passed, where no new development are initiated. In the case of OldFlow
plugin, it has also been taking out of maintenance. No patches has been
released [since february
2016](https://bitbucket.org/resursbankplugins/resurs-oldflow-plugin-magento1/src/24c27b1335522a952802ba935f776f953d728c0d/CHANGELOG?at=master&fileviewer=file-view-default#CHANGELOG-3)
as many of the functions in the last release has been replaced by other
plugins (see the list above). Most of the plugins are still technically
supported (i.e. by the flow), but patching the is something we avoid.

## Deprecation notice\*
As Magento development flies forward in time, we're about to leave
especially the 1.7-universe. Our new modules has a target version of
1.9 - 2.x, so running on older versions might break something. Magento
1.7 is the oldest version that we recently supported. The new releases
of our modules is not guaranteed to work properly. Our "Resurs
Checkout"-module MIGHT work for 1.7, but it has not been fully tested.

## Requirements and support
- For supported PHP platforms, see above.
- Merchant credentials from Resurs Bank (ID and Password)
- For Magento, *at least* community edition (the commercial releases are
  not officially supported)

### Magento 2.0
[Resurs Bank Installation
Instructions](../../../attachments/1476277/68812805.pdf)

## Known problems
### Slow BOOKED callback
The problem might be caused by rendered templates. Depending on the
template some responses could be very slow and cause timeouts. Full
description is located at the [FAQ](faq).

