---
layout: page
title: Development
permalink: /development/
has_children: true
has_toc: false
---


# Development 
**Getting started with self made integrations.**

**Table of contents**
**Table of contents**

- [Downloadables](#downloadables)
- [Source code and support](#source-code-and-support)

**Subpages**

- [Errors, problem solving and corner cases](/development/errorsproblemsolvingandcornercases/)
- [General: Integration development](/development/generalintegrationdevelopment/)
- [PHP and development libraries](/development/php-and-development-libraries/)
- [API Types](/development/api-types/)
- [Create part payment widget](/development/create-part-payment-widget/)
- [Customer data - Regular
  expressions](/development/customer-data---regular-expressions/)
- [Rounding](/development/rounding/)
- [Recognized metadata](/development/recognized-metadata/)
- [Payment providers in simplified
  flow](/development/payment-providers-in-simplified-flow/)
- [Permissions and passwords - Platform
  access](/development/permissions-and-passwords---platform-access/)

> [!IMPORTANT]
> Important about staging versus productionIf you are planning to
> develop (or install) plugins, it is required that you are running both
> a test and a production environment. In this way you will first be
> able to test that everything work properly in a controlled environment
> before a production release.If this is the case, also make sure that
> your test and production environment are identical. By doing this you
> will minimize the risk to have different results in your test compared
> to your production. For example: Running PHP 7.0 in test and an older
> version like PHP 5.6 or even 5.4, in production will probably generate
> unexpected results depending on the product you are using.

# Downloadables
We're hosting logos and images for our markdown documents
that follows in our bitbucket-repos.

# Source code and support
We
use [Bitbucket](https://bitbucket.org/resursbankplugins/?visibility=public)
and
[JIRA](https://resursbankplugins.atlassian.net/secure/Dashboard.jspa).

You can find our public source code repositories
at [https://bitbucket.org/resursbankplugins/?visibility=public](https://bitbucket.org/resursbankplugins/?visibility=public).

To report any problems and view our current projects and issues, please
visit JIRA
at [https://resursbankplugins.atlassian.net/secure/Dashboard.jspa](https://resursbankplugins.atlassian.net/secure/Dashboard.jspa).


Are you building your platform with callbacks? Be cautious; callbacks
can be sent to your platform ***rapidly***. By means, several callbacks
can arrive to your platform the exact same time, causing race conditions
in your platform - either in your backend parts or directly with your
database. If you are fortunate, callbacks will be handled separately in
a "standard" plugin. However, sometimes the best practice is to receive
a callback and then handle them with a separate queue since database
updates may not be fast enough to have the proper data when it is time
to handle the next request.

