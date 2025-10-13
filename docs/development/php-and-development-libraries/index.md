---
layout: page
title: Php And Development Libraries
permalink: /development/php-and-development-libraries/
parent: Development
has_children: true
has_toc: false
--------------

# PHP and Development Libraries

---

## Table of contents

* [Supported code and links](#supported-code-and-links)
* [Discontinued releases](#discontinued-releases)

---

## Supported code and links

| Name / Docs      | Link                                                                           | Version         | Status                     | Support | Dependencies                        | Shop APIs                           |
|------------------|--------------------------------------------------------------------------------|-----------------|----------------------------|---------|-------------------------------------|-------------------------------------|
| **ECom (ECOM2)** | [Bitbucket Repository](https://bitbucket.org/resursbankplugins/ecom2)          | 3.3.x (current) | ACTIVE                     | 2023–   | PHP ≥ 8.1                           | MAPI                                |
| **ECom v1.x**    | [Bitbucket Repository](https://bitbucket.org/resursbankplugins/resurs-ecomphp) | 1.3             | DISCONTINUED (Limited LTS) | 2017–   | PHP ≥ 7.3, SOAP/XML, curl + netcurl | SIMPLIFIED, RESURS CHECKOUT, HOSTED |

> [!NOTE]
> **ECom (ECOM2)**
> ECom2 is the **current active version** under continuous development. All older flow types except **MAPI** have been
> deprecated and removed from the codebase.
> The repository follows its own release schedule and is currently in the **3.3.x** branch.
> The previous link `php-and-development-libraries/81887258` is no longer valid.
>
> **PHP requirements**
> ECom2 requires **PHP 8.1 or higher**, though future releases may increase this requirement as PHP 8.1 nears
> deprecation. Older versions (PHP 5–7) are not supported.
> **ECom v1.3** remains **discontinued**, with limited LTS maintenance possible only if legacy plugins are still active.
> External dependencies may continue receiving maintenance independently.

---

## Discontinued releases

| Name       | Version | Status                     | Notes                                                                                                                           |
|------------|---------|----------------------------|---------------------------------------------------------------------------------------------------------------------------------|
| **ECom 1** | 1.3     | DISCONTINUED (Limited LTS) | Still partially supported if active plugins exist. No direct maintenance for years; external libraries may still be maintained. |
| **ECom 1** | 1.2     | REMOVED                    | Transitional bridge between 1.1 and 1.3. *Codebase removed.*                                                                    |
| **ECom 1** | 1.1     | DISCONTINUED               | No longer supported. Last confirmed stable version: 1.1.50                                                                      |
| **ECom 1** | 1.0     | DISCONTINUED               | No longer supported. Last confirmed stable version: 1.1.50                                                                      |
