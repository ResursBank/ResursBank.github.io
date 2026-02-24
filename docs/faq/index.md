---
layout: page
title: FAQ
permalink: /faq/
has_children: true
---

# FAQ

## Table of Contents

- [How do I start using MAPI?](#how-do-i-start-using-mapi)
- [My environment seems to be unavailable for Resurs](#my-environment-seems-to-be-unavailable-for-resurs)
    - [Is your site available from internet?](#is-your-site-available-from-internet)
    - [Are you using tunneling services or proxies?](#are-you-using-tunneling-services-or-proxies)
    - [Are you blocking or restricting inbound traffic?](#are-you-blocking-or-restricting-inbound-traffic)
    - [Are you using correct TLS version?](#are-you-using-correct-tls-version)
- [How do I configure my firewall/network?](#how-do-i-configure-my-firewallnetwork)
    - [Your outbound traffic](#your-outbound-traffic)
    - [Your inbound traffic](#your-inbound-traffic)
- [Local networks / Hosts (or "your callbacks is not working")](#local-networks--hosts-or-your-callbacks-is-not-working)
- [First step of error checking](#first-step-of-error-checking)
- [The jungle of SSL](#the-jungle-of-ssl)
    - [Where and what's about SSL](#where-and-whats-about-ssl)
    - [Where do I find a verified issuer?](#where-do-i-find-a-verified-issuer)
- [Swish för Handel - Resurs Technical supplier](#swish-för-handel---resurs-technical-supplier)
- [Appendix A - Resurs owned network IP details](#appendix-a---resurs-owned-network-ip-details)
    - [CIDR overview](#cidr-overview)

---

## How do I start using MAPI?

[Magento Quick Start Guide](../platform-plugins/magento-modules/resurs-bank-magento2-module-for-mapi-quick-start)

[WooCommerce Quick Start Guide](../platform-plugins/woocommerce/woocommerce-quickstart)

---

## My environment seems to be unavailable for Resurs

Here's a checklist for what you should test before reporting problems to Resurs

### Is your site available from internet?

Make sure your site is publicly available from internet (DNS configuration). Please see the section about local networks
below.

### Are you using tunneling services or proxies?

ngrok and similar tunneling tools act as temporary reverse-proxy endpoints. These services often have a poor security
reputation and are frequently abused, which means they are **blocked** at Resurs’ firewall.

Standard proxy setups used in development or staging may also fail, as proxy support is **only guaranteed in production
environments**.

If your integration uses any form of tunneling, temporary URL service or non-production proxy, callbacks or API
communication may be rejected automatically.

### Are you blocking or restricting inbound traffic?

Both firewalls and webservers can block requests if they are configured to only allow known or trusted sources. If
either component rejects traffic from Resurs, callbacks and API communication will fail.

Ensure that both your **firewall rules** and your **webserver access controls** allow inbound traffic from Resurs’
callback IP addresses. See the firewall section below for details.

### Are you using correct TLS version?

As shown above, TLS below version 1.2 is not supported.

---

## How do I configure my firewall/network?

### Your outbound traffic

For standard use cases, we recommend accessing Resurs Bank’s services using the FQDNs (Fully Qualified Domain Names)
provided to you. An FQDN ensures that API endpoints remain stable even if the underlying IP addresses change.

Note that this applies **only to outbound traffic** where Resurs publishes hostnames. For inbound traffic, such as
callback IPs originating from AWS infrastructure, reverse DNS names are not guaranteed and should not be relied upon.

### Your inbound traffic

Resurs Bank will send callbacks from the following IP addresses. These must be whitelisted:

* 192.121.110.100 (Resurs)
* 13.50.187.51 (Cloud)
* 51.21.32.255 (Cloud)
* 51.21.206.32 (Cloud)
* 51.21.39.192 (Cloud)

> **Note:** The cloud based addresses originate from an external infrastructure. Unlike the fixed ranges owned by
> Resurs (see Appendix A below), those networks are large and shared across many services. **Do not whitelist entire AWS
ranges**- only the specific IPs listed above should be allowed.

All callbacks require HTTPS (port 443).

For full network ranges owned by Resurs,
see [Appendix A - Resurs owned network IP details](#appendix-a---resurs-owned-network-ip-details).

---

## Local networks / Hosts (or "your callbacks is not working")

If you are using local networks during tests, be aware that certain functionality will not work. This is because Resurs
cannot reach systems that are placed behind private address spaces or hostnames that cannot be resolved externally.

* Private network ranges such as 192.168.0.0/16, 172.16.0.0/16 and 10.0.0.0/8 are not routable from the public internet.
  Callback traffic to these addresses will therefore always fail.
* Hostnames that rely on internal-only DNS (for example local zones, development domains or names that are not published
  publicly) cannot be resolved by Resurs systems. A hostname must resolve through publicly reachable DNS to be
  accessible.

In short: If the address is not reachable or resolvable from the internet, callbacks and remote communication will not
work.

---

## First step of error checking

This section mainly applies to older flows (such as *simplifiedShopFlow*) but the information is still useful as general
guidance when troubleshooting.

Before reporting an issue, verify the following:

* Review the ["not a bug" list](16056903.md) to rule out common configuration mistakes.
* Check [Errors, problem-solving and corner cases](16056453.html) for issues that can often be resolved without external
  support.

**XML validation**: Avoid enabling strict XML Schema validation in production environments, as even minor schema changes
may cause failures.

**Signing flows**: When using signing, always redirect the customer to the URL returned by `prepareSigning`. Do **not**
embed the signing page in an iframe.

---

## The jungle of SSL

Using outdated TLS versions is not permitted. All integrations must use **TLS 1.2 or higher**, as older protocols such
as TLS 1.1 and TLS 1.0 are deprecated and no longer accepted. Any attempt to connect with unsupported versions will fail
immediately.

### Where and what's about SSL

Your entire site must use valid SSL/TLS certificates and be fully accessible over HTTPS. Certificates that are
self-signed, expired, revoked or otherwise untrusted by standard certificate authorities are not accepted, as they
prevent secure communication and will cause integrations to fail.

Below are examples of commonly used and trusted certificate authorities:

* [https://www.digicert.com/](https://www.digicert.com/)
* [https://www.networksolutions.com/](https://www.networksolutions.com/)
* [https://www.godaddy.com/](https://www.godaddy.com/)
* [https://letsencrypt.org/](https://letsencrypt.org/)

### Where do I find a verified issuer?

There are many issuers available.

---

## Swish för Handel - Resurs Technical supplier

To offer Swish for your customers, complete the following steps before activation:

1. Verify with your salesperson that Swish is available for your chosen/designated integration.
2. Sign an agreement with your bank for Swish för Handel and choose Resurs as technical supplier.
3. After banking approval, Swish automatically emails [onboarding@resurs.se](mailto:onboarding@resurs.se) that your
   organisation number is connected.
4. Resurs configures the payment method in your production account. Depending on your integration, you may need to
   update/fetch payment methods.

---

# Appendix A - Resurs owned network IP details

## CIDR overview

If you need to whitelist entire network ranges owned by Resurs Bank, use the following details:

| Network CIDR-block | Broadcast       | Netmask       | AS Number                            |
| ------------------ | --------------- | ------------- | ------------------------------------ |
| 192.121.110.0/24   | 192.121.110.255 | 255.255.255.0 | [AS35814](https://ipinfo.io/AS35814) |
| 194.68.237.0/24    | 194.68.237.255  | 255.255.255.0 | [AS35814](https://ipinfo.io/AS35814) |
| 91.198.202.0/24    | 91.198.202.255  | 255.255.255.0 | [AS35814](https://ipinfo.io/AS35814) |

***
HÄR
***

## Environment unavailable for Resurs

Troubleshooting checklist when Resurs cannot reach your environment.

Before reporting issues to Resurs, walk through the following checklist. Many availability problems are caused by network configuration, tunneling tools, or restricted traffic.

---

### 1. Is your site available from the internet?

Ensure that your site is:

- publicly reachable  
- correctly configured in DNS  
- accessible without VPN requirements  
- not limited to a local network  

> **⚠️ Warning**  
> If the environment is hosted behind a firewall or inside a private network, Resurs will not be able to access it.

See the [Local Networks](#local-networks--hosts) section for more information.

---

### 2. Are you using tunneling services or proxies?

Tools such as **ngrok**, **LocalTunnel**, or similar tunneling services act as temporary reverse‑proxy endpoints. These are:

- frequently abused  
- considered insecure  
- **blocked by Resurs' firewall**

Standard proxies used in development or staging may also fail, because **proxy support is only guaranteed in production environments**.

> **⚠️ Warning**  
> If your integration depends on tunneling tools, temporary URL services, or non‑production proxy routes, callbacks or API requests may be automatically rejected.

---

### 3. Are you blocking or restricting inbound traffic?

Check if your firewall or web server is restricting inbound requests. Make sure that:

- your firewall allows traffic from Resurs' callback IP addresses  
- web server access controls are not rejecting unknown sources  
- security layers (WAF, rate‑limiting, IP filtering) are not blocking Resurs  

> **ℹ️ Info**  
> If inbound traffic is blocked at any level, callbacks and API communication will fail.  
> See the [Firewall Requirements](#your-inbound-traffic) section for allowed IP ranges.

---

### 4. Are you using the correct TLS version?

Resurs requires **TLS 1.2 or higher**.

> **⚠️ Warning**  
> Any TLS version below 1.2 is not supported. Connections will fail during the handshake.

---

## Still having issues?

### Before contacting support

- Your site is publicly reachable  
- No tunneling services are in use  
- Inbound traffic from Resurs IPs is allowed  
- TLS 1.2+ is enabled  

If all checks pass, contact **onboarding@resurs.se** with your environment URL, logs, timestamps, and sample requests.

---

## How do I configure my firewall/network?

### Your outbound traffic

For standard use cases, we recommend accessing Resurs Bank's services using the FQDNs (hostnames) provided to you.

> **Note**  
> This applies only to outbound traffic. For inbound traffic, reverse DNS names are not guaranteed and should not be relied upon.

---

### Your inbound traffic

Resurs Bank sends callbacks from the following IPs. These **must be whitelisted**:

- 192.121.110.100 (Resurs)  
- 13.50.187.51 (Cloud)  
- 51.21.32.255 (Cloud)  
- 51.21.206.32 (Cloud)  
- 51.21.39.192 (Cloud)

> **⚠️ Warning**  
> Do **not** whitelist entire AWS ranges. Only allow the specific IPs above.

All callbacks are sent via HTTPS (port 443).

See [Appendix A](#appendix-a---resurs-owned-network-ip-details) for full Resurs‑owned IP ranges.

---

## Local Networks / Hosts

Why callbacks fail from local networks and how to resolve it.

> **Note**  
> *Or: "Why are my callbacks not working?"*

Resurs cannot reach systems hosted behind private IP ranges or behind internal‑only DNS.

### Private Networks Are Not Publicly Routable

These private IP ranges are unreachable from the internet:

- `192.168.0.0/16`  
- `172.16.0.0/16`  
- `10.0.0.0/8`  

> **⚠️ Warning**  
> Callback traffic to these addresses will always fail.

### Internal‑Only Hostnames Cannot Be Resolved

Examples include:

- local dev hostnames  
- DNS zones only available inside your LAN  
- internal domains not published publicly  

> **ℹ️ Info**  
> A hostname must resolve through **public DNS** to be reachable.

### If It's Not Publicly Accessible, It Won't Work

If your callback URL is not reachable from the internet or not resolvable publicly, callbacks will fail.

> **💡 Tip**  
> Use a publicly reachable staging environment or expose your system externally.

---

## The Jungle of SSL / TLS Requirements

### TLS Requirements

All integrations require **TLS 1.2+**.

> **⚠️ Warning**  
> Older TLS versions fail during handshake.

---

## SSL/TLS Certificate Requirements

Your site must use a **valid and trusted certificate**.

The following are **not accepted**:

### Invalid Certificates

- Self‑signed  
- Expired  
- Revoked  

### Configuration Issues

- Wrong domain  
- Missing chain  
- Untrusted CA  

> **ℹ️ Info**  
> These will cause the integration to fail.

---

## Examples of Trusted Certificate Authorities

| Certificate Authority | Type       |
| --------------------- | ---------- |
| DigiCert              | Commercial |
| Network Solutions     | Commercial |
| GoDaddy               | Commercial |
| Let's Encrypt         | Free       |

> **Note**  
> Not an exhaustive list.

---

## Where Can I Find a Verified Issuer?

### Commercial Providers
DigiCert, GoDaddy, Network Solutions

### Cloud Platform CAs
AWS ACM, Azure App Service Certificates, Google Cloud managed SSL

### Free Providers
Let's Encrypt

### Registrars & Hosts
Many hosting companies bundle SSL certificates.

> **💡 Tip** Choose a CA trusted by major browsers.

---

## Swish för Handel – Resurs Technical Supplier

### Steps to activate Swish

1. **Verify availability** with your salesperson  
2. **Sign agreement** with your bank choosing Resurs as technical supplier  
3. **Await confirmation** — Swish notifies onboarding@resurs.se  
4. **Configuration** — Resurs enables the payment method in production  

---

# Appendix A – Resurs owned network IP details

## CIDR overview

| Network CIDR-block | Broadcast       | Netmask       | AS Number                       |
| ------------------ | --------------- | ------------- | ------------------------------- |
| 192.121.110.0/24   | 192.121.110.255 | 255.255.255.0 | AS35814 |
| 194.68.237.0/24    | 194.68.237.255  | 255.255.255.0 | AS35814 |
| 91.198.202.0/24    | 91.198.202.255  | 255.255.255.0 | AS35814 |
