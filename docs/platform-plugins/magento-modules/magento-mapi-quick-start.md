---
layout: page
title: QuickStart Guide
permalink: /platform-plugins/magento-modules/resurs-bank-magento2-module-for-mapi-quick-start/
parent: Magento Modules
grand_parent: Platform Plugins
nav_order: 11
---

# Quick Start Guide Magento

[Full documentation](/platform-plugins/magento-modules/resurs-bank-magento2-module-for-mapi),
refer to this for more detailed explanations of the various installation
and configuration options.

# 1. Acquire test credentials

Contact Resurs Bank to get your test credentials.

# 2. Installation

The recommended installation method is using Composer. To install the complete
set of Resurs Bank modules simply install the `resursbank/magento-all` package:

```bash
composer require resursbank/magento-all
composer update
```

If you only require the Resurs Merchant-API package and its requirements you can replace
`magento-all` with `magento-mapi`.

# 3. Configuration

The configuration for the module can be found under 
`Stores > Configuration > Sales > Payment Methods`.

To quickly get the module up and running the important settings to configure are
the Checkout Type, Environment, Client ID, Client Secret and Store.

If you are unsure of any of
the configuration options you should check
[the complete manual](/platform-plugins/magento-modules/resurs-bank-magento2-module-for-mapi)
for the module.

# 4. Perform test purchase using our test data to ensure everything works

[Resurs Bank Test Data](https://developers.resurs.com/testing/)

# 5. Acquire production credentials

When you have finished testing the integration and Resurs Bank have cleared
your store to go live you should also have received your production credentials.
