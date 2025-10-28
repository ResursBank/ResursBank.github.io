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

_Sign an agreement with Resurs Bank to get credentials for production._

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

# 1. Acquire test credentials

Contact Resurs Bank to request your test credentials. Make sure that your system meets all technical requirements before
proceeding with the integration.

# 2. Installation

Download and install the plugin ([resursbank.zip](download/resursbank.zip) - updated 2025-10-28).

### Older versions

- [v1.0.0](download/resursbank-1.0.0.zip) - 2025-09-29.
- v1.0.1 (not released).
- [v1.0.2](download/resursbank-1.0.2.zip) - 2025-10-01.
- [v1.0.3](download/resursbank-1.0.3.zip) - 2025-10-28.

# 3. Configuration

For full documentation, read [the repository README's](https://bitbucket.org/resursbankplugins/psmapi/src/master/)

# 4. Perform test purchase using our test data to ensure everything works

[Resurs Bank Test Data](https://developers.resurs.com/testing/)

## Known problems

In some rare cases, upgrades may cause unexpected behavior. This is normal due to how PrestaShop handles cache and
configuration. From v1.0.3 and higher, this should be less common.

Usually, a module reset resolves the problem:

```bash
php bin/console prestashop:module reset resursbank
```

For detailed information and alternative solutions, see the full
documentation: [Known Problems – Resurs Merchant API for PrestaShop](resurs-merchant-api-for-prestashop#known-problems)
