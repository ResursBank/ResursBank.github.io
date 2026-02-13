---
layout: page
title: PrestaShop
permalink: /platform-plugins/prestashop/
parent: Platform Plugins
nav_order: 12
has_children: true
has_toc: false
---

# QuickStart Guide PrestaShop

## Requirements

- **PHP version:** Minimum PHP 8.1 (note: PrestaShop allows down to PHP 7.2, but this plugin does not support anything
  below 8.1)
- **PrestaShop version:** Tested with PrestaShop 8.2.0 and compatible with versions 8.x and above
- **SSL connectivity:** Required (preferably using OpenSSL)
- **CURL:** ext-curl must be enabled with a minimum version of 7.61.0
- **CURLAUTH_BEARER support:** Required for token-based authentication
- **Decimal precision:** PHP’s default precision setting (`precision=14` in php.ini) is typically sufficient. Raising
  this value too high may result in floating-point rounding errors. It is recommended to use the default setting to
  ensure proper two-decimal rounding behavior.

## Quick instructions

### 1. Acquire test credentials

Contact Resurs Bank to request your test credentials. Make sure that your system meets all technical requirements before
proceeding with the integration.

### 2. Installation

Download and install the plugin ([resursbank.zip](download/resursbank.zip) - v1.0.9 - updated 2025-12-04).

#### Older versions

- [v1.0.10](download/resursbank-1.0.10.zip) - 2026-02-13.
- [v1.0.9](download/resursbank-1.0.9.zip) - 2025-12-04.
- [v1.0.8](download/resursbank-1.0.8.zip) - 2025-11-18.
- There is no 1.0.7 release package, since it was bundled into 1.0.8.
- [v1.0.6](download/resursbank-1.0.8.zip) - 2025-11-13.

### 3. Configuration

For full documentation, read [the repository README's](https://bitbucket.org/resursbankplugins/psmapi/src/master/)

### 4. Perform test purchase using our test data to ensure everything works

[Resurs Bank Test Data](https://developers.resurs.com/testing/)

## Known problems

There are currently no known issues that require special attention. Most irregularities that may appear after upgrades
are typically resolved by updating to the latest module version or clearing PrestaShop caches.

If unexpected behavior occurs, the recommended first step is to reset the module:

```bash
php bin/console prestashop:module reset resursbank
```

Additional troubleshooting guidance is available in the full
documentation: [Known Problems – Resurs Merchant API for PrestaShop](resurs-merchant-api-for-prestashop#known-problems)

For other questions, see our [FAQ](https://developers.resurs.com/faq/)
