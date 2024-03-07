---
layout: page
title: Development
permalink: /development/
has_children: true
---


# Development 
Created by Tobias, last modified by Thomas Tornevall on 2022-03-25
**Getting started with self made integrations.**
**Table of contents**
**Table of contents**
- [Downloadables](#Development-Downloadables)
- [Source code and support](#Development-Sourcecodeandsupport)
- [Heads up, please!](#Development-Headsup,please!)
**Subpages**
- [Errors, problem solving and corner cases](16056453.html)
- [General: Integration development](5014037.html)
- [PHP and development
  libraries](PHP-and-development-libraries_5014349.html)
- [API Types](API-Types_1475647.html)
- [Create part payment widget](Create-part-payment-widget_15138818.html)
- [Customer data - Regular
  expressions](Customer-data---Regular-expressions_3440819.html)
- [Rounding](Rounding_3441165.html)
- [Recognized metadata](Recognized-metadata_3440674.html)
- [Payment providers in simplified
  flow](Payment-providers-in-simplified-flow_16056537.html)
- [Permissions and passwords - Platform
  access](Permissions-and-passwords---Platform-access_1475179.html)
Important about staging versus production
If you are planning to develop (or install) plugins, it is **required**
that you are running both a test and a production environment. In this
way you will first be able to test that everything work properly in a
controlled environment before a production release.
If this is the case, also **make sure that your test and production
environment are identical**. By doing this you will minimize the risk to
have different results in your test compared to your production. For
example: Running PHP 7.0 in test and an older version like PHP 5.6 or
even 5.4, in production will probably generate unexpected results
depending on the product you are using.
# Downloadables
We're hosting a bunch of logos and images for our markdown documents
that follows in our bitbucket-repos
via [https://test.resurs.com/plugindevelopers/](https://test.resurs.com/plugindevelopers/)
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
# Heads up, please!
Are you building your platform with callbacks? Be cautious; callbacks
can be sent to your platform ***rapidly***. By means, several callbacks
can arrive to your platform the exact same time, causing race conditions
in your platform - either in your backend parts or directly with your
database. If you are fortunate, callbacks will be handled separately in
a "standard" plugin. However, sometimes the best practice is to receive
a callback and then handle them with a separate queue since database
updates may not be fast enough to have the proper data when it is time
to handle the next request.
