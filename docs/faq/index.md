---
layout: page
title: FAQ
permalink: /faq/
has_children: true
---

# FAQ

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
