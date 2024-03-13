---
layout: page
title: Prestashop Simplifiedshopflow
permalink: /platform-plugins/prestashop-payment-gateways/prestashop-simplifiedshopflow/
parent: Prestashop Payment Gateways
grand_parent: Platform Plugins
---



# PrestaShop SimplifiedShopFlow 
Created by Thomas Tornevall, last modified on 2022-08-04

- [System
  requirements](#prestashopsimplifiedshopflow-systemrequirements)
- [Installing and
  uninstalling](#prestashopsimplifiedshopflow-installinganduninstalling)
  - [Preferred Installation
    Method](#prestashopsimplifiedshopflow-preferredinstallationmethod)
  - [Unsupported Installation
    Method](#prestashopsimplifiedshopflow-unsupportedinstallationmethod)

- [Upgrading and other "self helping"
  support](#prestashopsimplifiedshopflow-upgradingandother%22selfhelping%22support)

*Simplified ShopFlow for PrestaShop is intended to be built as a
stand-alone checkout module for PrestaShop 1.7.7 and above. It is
delivered partially with the help from composer, and it is highly
preferred to install the module with composer. Please see below for
instructions.*

# System requirements
- **PHP 7.3  
  Note: Prior prestashop instances may try to enforce a lower
  requirement than this, so running the plugin with 7.1 will crash your
  site.**
- SSL (preferrably OpenSSL)
- **ext-soap  
  ***XML (SoapClient)*
- Curl or php streams for other communications, regarding rest etc.
- **Are you using nginx? Make sure that you configure the
  buffers/buffer_size to something appropriate (see below) or there may
  be trouble at some point.** We haven't seen this issue in apache
  environments (yet) but in case you see similar problems there, make
  sure that you use the same setup there.
- **Customer phone number is a mandatory** field for payments, so that
  field must be properly configured, so it cannot be ignored**.**

# Installing and uninstalling
Modules can be installed / uninstalled / disabled / enabled separately.
No module can be installed / enabled without Core being installed and
enabled. Any action invoked on the Core module (such as installing it)
will automatically be invoked on all other available Resurs Bank modules
(such as Order Management, Part Payment or Simplified).

### Preferred Installation Method
The preferred installation method is based on PrestaShop composer
builds.

1.  Go to your prestashop root folder.
2.  Depending on your packages you want, run the following commands
    (depends on that you have composer installed!). The package psrbcore
    is required for all the others to work properly. Just keep in mind,
    that you can't just only install the core module.  

    **composer require resursbank/psrbcore**  
    composer require resursbank/psrbordermanagement  
    composer require resursbank/psrbsimplified  
    composer require resursbank/psrbpartpayment
3.  Jump into the prestashop module catalog, choose to install the core
    module. The process is as described in this document very much
    automatic and will - if they are present - also activate
    psrbsimplified, psrbpartpayment and psrbordermanagement.
### Unsupported Installation Method
This is the manual way, which is also stated by PrestaShop as
kind-of-deprecated. As PrestaShop is moving forward to 1.7.8 and beyound
they are also leaving manually unzipping modules, and instead using the
same installation mehod as our above preferred. This method is
unsupported and may not be guaranteed to work properly,

The method though is straight forward.

1.  Start with downloading the bundle package from
    [https://bitbucket.org/resursbankplugins/psrbbundle](https://bitbucket.org/resursbankplugins/psrbbundle)
    (git clone) or
    [https://bitbucket.org/resursbankplugins/psrbbundle/downloads/?tab=downloads](https://bitbucket.org/resursbankplugins/psrbbundle/downloads/?tab=downloads)
    (download zip-package).
2.  Unzip the package and make sure the modules- and vendor package is
    put into your prestashop root. In the end you should have
    \[prestaroot\]/modules/psrbcore, etc and a
    \[prestaroot\]/vendor/resursbank, etc.
3.  Jump into the prestashop module catalog, choose to install the core
    module. The process is as described in this document very much
    automatic and will - if they are present - also activate
    psrbsimplified, psrbpartpayment and psrbordermanagement.

# Upgrading and other "self helping" support
- When upgrading our module, make sure you really run the upgrade
  process (or reset, even if this requires you to reconfigure some parts
  of the modules). By a proper upgrade/reset procedure you will also get
  to register eventually new hooks and features that has been
  implemented since the last release. Without this, your newly upgraded
  plugin will run without all such features.

