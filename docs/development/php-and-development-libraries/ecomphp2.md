---
layout: page
title: ECom V2
permalink: /development/php-and-development-libraries/ecomphp2/
parent: Php And Development Libraries
grand_parent: Development
---

# ECom V2

Library to communicate with **Resurs Bank APIs**.  
This library aims to provide **complete API coverage**, including Merchant API (MAPI), PriceSignage, Store management,
and callback handling. It replaces all previous EComPHP releases and serves as the foundation for modern Resurs
integrations in PHP.

The library is written for **PHP 8.1 or higher** and is actively maintained in the `resursbankplugins/ecom2`
repository.  
It follows a modular structure with standalone components for payment handling, configuration, logging, caching, and
widget rendering.

Full documentation, including examples, module breakdowns, and JavaScript integration details, can be found at:  
[https://bitbucket.org/resursbankplugins/ecom2/src/master/README.md](https://bitbucket.org/resursbankplugins/ecom2/src/master/README.md)

---

### Quick summary

- **Supported PHP:** 8.1+ (older versions no longer supported)
- **Primary API:** [Merchant API (MAPI)](/merchant-api-2.0/)
- **Removed flows:** All legacy and SOAP-based integrations have been deprecated.
- **Active repository:** [bitbucket.org/resursbankplugins/ecom2](https://bitbucket.org/resursbankplugins/ecom2)

---

ECom V2 is continuously developed and updated.  
This page provides a summary reference for developers working on integrations or reviewing implementation details. For
the full technical reference and changelog, always refer to the Bitbucket documentation above.
