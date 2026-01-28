---
layout: page
title: Development
permalink: /development/
nav_order: 61
has_children: true
has_toc: false
nav_exclude: true
---

# Development

**Getting started with self-made integrations**

---

## Table of contents

* [Downloadables](#downloadables)
* [Source code and support](#source-code-and-support)

### Subpages

* [Errors, problem solving and corner cases](/development/errorsproblemsolvingandcornercases/)
* [General: Integration development](/development/generalintegrationdevelopment/)
* [PHP and development libraries](/development/php-and-development-libraries/)
* [API Types](/development/api-types/)
* [Create part payment widget](/development/create-part-payment-widget/)
* [Rounding](/development/rounding/)
* [Recognized metadata](/development/recognized-metadata/)
* [Payment providers in simplified flow](/development/payment-providers-in-simplified-flow/)
* [Permissions and passwords – Platform access](/development/permissions-and-passwords---platform-access/)

> [!IMPORTANT]
> **Important about staging versus production**
> If you are planning to develop or install plugins, you must run both a **test** and a **production** environment. This allows you to verify functionality in a controlled setting before release.
> Ensure your test and production environments are identical to minimize differences in behavior.
> **Note:** Our PHP libraries no longer support PHP 5–7. All integrations should use PHP 8 or later. The current standard requirement for ECom and related libraries is **PHP 8.1 or higher**. However, as PHP 8.1 is gradually becoming **deprecated**—meaning it only receives limited security updates and will soon lose active support from frameworks and community—future requirements may shift to newer PHP versions.

---

## Downloadables

We host logos and images for our markdown documents within our Bitbucket repositories.

---

## Source code and support

We use [Bitbucket](https://bitbucket.org/resursbankplugins/?visibility=public) for public source code hosting.
Our previous [JIRA instance](https://resursbankplugins.atlassian.net/secure/Dashboard.jspa) has been **deprecated** and is no longer in active use. While some historical records remain accessible, it will eventually be discontinued.
An internal issue management platform has replaced it.

You can find our public repositories here:
[https://bitbucket.org/resursbankplugins/?visibility=public](https://bitbucket.org/resursbankplugins/?visibility=public)

---

### Callback handling

With the introduction of **MAPI**, callback handling has been redesigned. Rapid callback issues that could previously cause race conditions are no longer expected.

Instead of registering a generic callback URL for all requests, MAPI now registers **specific callbacks per purchase** during each transaction. This ensures safer, more predictable, and event-specific communication between systems.
