---
layout: page
title: FAQ
permalink: /faq/
has_children: true
---

# FAQ

## How do I start using MAPI?

[Magento Quick Start Guide](../platform-plugins/magento-modules/resurs-bank-magento2-module-for-mapi-quick-start)

[WooCommerce Quick Start Guide](../platform-plugins/woocommerce/woocommerce-quickstart)

## My environment seems to be unavailable for Resurs

Here's a checklist for what you should test before reporting problems to
Resurs

- ### Are your site available from internet?
  Make sure your site are publicly available from internet (DNS
  configuration). Please see the section about local networks below.
- ### Are you using ngrok?
  ngrok is a reverse-proxy service that many times helps testing things
  without having a publicly available server. However, ngrok has low
  reputation which also means that the host is blocked on firewall level
  at Resurs. Make sure you do not use ngrok when testing your API's. If
  the url is present in a payload, the traffic will be dropped by
  default.
- ### Are you using proxy?
  In some cases, proxies are - at least in test - not supported. As of
  december 2021, proxy support is only available in production
  environments.
- ### Are you hard blocking unknown traffic in your firewall?
  See below, how you should configure your firewall to receive traffic
  from Resurs.
- ### Are you allowing traffic from certain traffic in your webserver?
  Like in the matter of firewalls, a webserver could also block traffic
  from unknown locations. See the firewall section how to configure
  this.
- ### Are you using correct TLS version?
  As shown above, TLS below version 1.2 is not supported.

## How do I configure my firewall/network?

If you have restricted firewalls that explicitly need to define what
communication is allowed, you should consider open for the
[CIDR](https://sv.wikipedia.org/wiki/Classless_Inter-Domain_Routing)-blocks
below.
***Please note that the primary ports for a web-server should be 443
(https) as Resurs no longer support plain text callbacks at port 80.***

| Network CIDR-block | Range equivalent                | Broadcast       | Netmask       | Allow ports | AS Number                            |
|-------------------|---------------------------------|-----------------|---------------|-------------|--------------------------------------|
| 192.121.110.0/24  | 192.121.110.1 - 192.121.110.254 | 192.121.110.255 | 255.255.255.0 | 443 (https) | [AS35814](https://ipinfo.io/AS35814) |
| 194.68.237.0/24   | 194.68.237.1 - 194.68.237.254   | 194.68.237.255  | 255.255.255.0 | 443 (https) | [AS35814](https://ipinfo.io/AS35814) |
| 91.198.202.0/24   | 91.198.202.1 - 91.198.202.254   | 91.198.202.255  | 255.255.255.0 | 443 (https) | [AS35814](https://ipinfo.io/AS35814) |
| 13.50.187.51/32   | Single address not in a range   | -               | -             | 443 (https) | [AS16509](https://ipinfo.io/AS16509) |
| 51.21.32.255/32   | Single address not in a range   | -               | -             | 443 (https) | [AS16509](https://ipinfo.io/AS16509) |

### Whitelisting Callbacks from Resurs

Callbacks has historically been sent from 192.121.110.100 but after some network changes, callbacks may now also come from the listed IP's below.

    192.121.110.100
    13.50.187.51
    51.21.32.255

## Local networks / Hosts (or "your callbacks is not working")

If you are using local networks during tests, be aware that all
teststings does not work. There are a few rules to consider for
"locals":

- Local networks like 192.168.0.0/16,172.16.0.0/16, 10.0.0.0/8, etc
  (see [https://en.wikipedia.org/wiki/Private_network](https://en.wikipedia.org/wiki/Private_network))
  are unreachable. Testing callbacks on such networks won't work.
- Hostnames assigned by local isolated DNS servers only does not work -
  we won't be able to resolve them unless they reside on a reachable
  internet connection. This includes local zones like localhost
  (example: my-dev.localhost, my-site.dev, etc).

## First step of error checking

Make sure that you're checked with [The "not a bug" list](16056903.md)
before considering the problem as a remote error. You can also take a
look at [Errors, problem-solving and corner cases](16056453.html), to
see if it might be other problems that can be "self solvable".
XML validation
When using our services live, do not enable strict XML Schema validation
as minor changes on our side can cause the integration to fail.
Signing troubles
When you implement our signing requirement, please *redirect* the
customer to the link the `prepareSigning` function provides. **Do
not** try to embed the signing page in the webshop as an `iframe`.

## The jungle of SSL

Do NOT use TLS 1.1 or lower!
**TLS *below* TLSv1.2 is no longer supported.** Trying to connect to our
services with lower versions will fail!

### Where and what's about SSL

Callbacks over non-SSL links
When this FAQ is written, we still allow callbacks over http, but this
will change soon.
It is necessary that your entire site runs with SSL support active
(https), both in test and production. The reason is that our callbacks
does not support http-calls.
I have certificate here, issued by myself. Is this OK?

**No!**

Resurs Bank does not communication with self signed certificates.
Neither we do with invalidated (revoked) or expired certificates, so
make sure you get it from a verified issuer. But here's some examples:

- [Digicert](https://www.digicert.com/)
- [Network Solutions](https://www.networksolutions.com/)
- [Godaddy / Starfield Technologies](https://www.godaddy.com)
- [Letsencrypt](https://letsencrypt.org/) (Issues free certificates,
  supports wildcard certificates, but requires renewal every three
  months)

### Where do I find a verified issuer?

There's a lots of issuers available on the internet, so there's nearly
impossible to recommend a verified issuer.

### Swish för Handel - Resurs Technical supplier

In order to offer Swish for the customers, there are a few steps that needs to be done prior to the payment method is
available on your production account;

1. Verify with your salesperson that Swish is available for your chosen/designated integration
2. Sign an agreement with your bank for Swish för Handel and choose Resurs as technical supplier at your bank. (
   Selecting Resurs bank as
   technical provider is done through the bank that you have an agreement with.)
3. When done, Swish will automatically send an email to the Integration-team (onboarding@resurs.se) that your
   organizational number now has
   connected to Resurs for Swish för Handel
4. Resurs configures the payment method and uploads it to your production account
   Depending on your integration, you may need to update/fetch your payment methods in order for the payment method to
   appear. If uncertain that is required in your unique case, please email onboarding@resurs.se

## Missing a question? [Contact us!](Contact_327926.html)
