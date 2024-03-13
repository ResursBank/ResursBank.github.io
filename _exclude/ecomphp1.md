---
layout: page
title: Version 1.X (Ecomphp)
permalink: /development/php-and-development-libraries/ecomphp1/
parent: Php And Development Libraries
grand_parent: Development
---



# Version 1.x (EComPHP) 
Created by Thomas Tornevall, last modified on 2023-05-12
This document covers information about EComPHP 1.x (Currently 1.3.x).

> Resurs Bank in the communityIf something does not work properly in
> EComPHP, feel free to join the community via bitbucket, or contact us
> at onboarding@resurs.se. EComPHP is updated continuously to improve
> functionality.To speed up the wsdl requests make sure you use
> setWsdlCache(true) on runs.

# Description
Resurs EComPHP Gateway is a simplifier for our webservices, with
functionality enough to getting started fast. It communicates with
the [Simplified Flow API](simplified-flow-api) for booking
payments, [Configuration Service](configuration-service) and the [After
Shop Service API](after-shop-service-api) for finalizing, crediting and
annulments etc. This full version of the gateway communicates
with [Hosted Payment
Flow](https://test.resurs.com/docs/display/ecom/Hosted+Payment+Flow)
and [Resurs Checkout Web](resurs-checkout-web) (supporting both REST and
SOAP). A PHP-reference for EComPHP is located
at [https://test.resurs.com/autodocs](https://test.resurs.com/autodocs/),
if you want to take a look at our automatically generated documentation.

As EComPHP is continuously developed, you should take a look at our
bitbucket repo to keep this information updated. It can be found
at [https://bitbucket.org/resursbankplugins/resurs-ecomphp](https://bitbucket.org/resursbankplugins/resurs-ecomphp).

# Branches
**Red branches is obsolete and no longer officially maintained.**  
1.3  
1.1  
1.0

## Make sure to always upgrade!
EComPHP is continuosly delivering upgrades that makes things work
better. The current 1.3 is not fully PSR4-compliant, but our goal is to
get rid of non-PSR4 code (which takes time). Below follows a list of
some major non-breaking changes that takes us closer to such compliance.

- v1.3.47: Internal curlwrapper calls are now using proper class calls
  instead of deprecated classes from 6.0 - this also means that we no
  longer has to verify that they do exist before loading them. They are
  called on fly.

# Preparing the library
## Download
Take a look at the ongoing project
at [https://bitbucket.org/resursbankplugins/resurs-ecomphp](https://bitbucket.org/resursbankplugins/resurs-ecomphp)

## Requirements and dependencies
- Use composer
- Do not use other versions than EComPHP 1.3 as the prior versions is no
  longer guaranteed to work.
- PHP 7.3 - 8.0 are supported, the dialect is written for 5.6
- Even if you plan to only use Resurs Checkout, features are widely
  spread between many flows, which we also recommend to install the
  library so it can fully use all flows.
- [OpenSSL](https://www.openssl.org/): For reaching Resurs Bank
  REST/SOAP
- [curl](https://curl.haxx.se/): php-curl with SSL support
- php-xml and streams (For the SOAP parts)
- EComPHP uses [NetCURL](https://www.netcurl.org) for calls via both
  SOAP and REST. The packagist component is located
  [here](https://www.netcurl.org/packagist)

### Installing curl, xml, soapclient, etc
For Ubuntu, you can quickly fetch those with apt-get like below, if your
system is missing them:

```xml
apt-get install php-curl php-xml php-soap
```
## Installation
As mentioned above, we recommend that you use composer to install. How
you install with composer is a bit up to you. But with all dependencies
available, installing may look like this, depending on how you'd like to
follow the release branches:

```xml
# Either this:
composer require resursbank/ecomphp:1.3.*
# Or this:
composer require resursbank/ecomphp:^1.3
```
In it simplest form, composer.json could look like this:

**composer.json**
```xml
{
    "require": {
        "resursbank/ecomphp": "^1.3"
    }
}
```
### Deploying plugins with EComPHP bulked
If you need to release a plugin with EComPHP, you can use composer to
prefer-dist like the example below. However, the prefer-dist may not be
entirely safe and components could be missing out. To be sure that
everything stays put, the below example also shows how to clean up
repoistories that still contains a git reference.

**Deploy and redeploy**
```xml
 #!/bin/bash
 composer clearcache
 rm -rf vendor composer.lock
 composer install --prefer-dist
 find vendor/ -type d -name .git -exec rm -rf {} \; >/dev/null 2>&1
 find vendor/ -name .gitignore -exec rm {} \; >/dev/null 2>&1
```
# Start building - minor examples
At its simplest level, this is the way how to start talking with the
API. If you need detailed documents, take a look at the subsections in
this space.

**Simple start**
```xml
use \Resursbank\RBEcomPHP\ResursBank;
// [...] Other usages, like RESURS_ENVIRONMENTS, ETC [...]
require_once("vendor/autoload.php");
$flow = new ResursBank('storeUsername', 'storePassword', ResursEnvironments::ENVIRONMENT_TEST);
// Since v1.3.40 caching wsdl has been made easier.
$flow->setWsdlCache(true);
$flow->getPaymentMethods();
// [...] more code [...]
$flow->getPayment('orderIdOfThePaymentYouJustCreated');
```
### Registering callbacks
setRegisterCallback is set, by default, to register callbacks through
REST instead of SOAP (to avoid using SoapClient).

Make sure that the callback digest key are saved in your endpoint also,
so that it can be tested on incoming calls. Also make sure you are
really using a secure URL configuration (i.e. you need to use the digest
to make sure your orders can not be manipulated by someone).

**getPaymentMethods**
```xml
require_once(__DIR__ . "/classes/rbapiloader.php");
$flow = new \Resursbank\RBEcomPHP\ResursBank('storeUsername', 'storePassword');
$flow->setWsdlCache(true);
$this->flow->setCallbackDigestSalt('St0res4lTkeY');
$paymentMethodObject = $this->flow->setCallback(ResursCallbackTypes::UNFREEZE, "http://shop.test.com/callbacks/?paymentId={paymentId}&digest={digest}");
```
