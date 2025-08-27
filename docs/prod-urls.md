---
layout: page
title: Go Live URLs
permalink: /prod-urls/
---

# Go Live URLs

[Test URLs](/testing/test-urls/)

## Checklist for go live
- Request user name and password to services and to Resurs Payment Admin
  respectively in production.
&nbsp;
- Change all URLs to the corresponding ones for production. If a plugin
  from Resurs is used both links will be there and you choose which one
  that shall be active.
&nbsp;
- Check the price info and standard economic information document (SEKKI
  in Sweden) to see that agreed upon details are present.
&nbsp;
- Amounts must be treated as in the test environment. You can't add a
  cost in production without including it as a order row with its cost.
&nbsp;
- Do not round the amounts in production because it looks "neat" if the
  rounding is not validated in the test environment.
&nbsp;
- Register callbacks with your production URL.
&nbsp;
- Send in the IP of the end customer in the call, not yours as the
  agent.  

## Firewalli

How to configure firewalls
**Do you have a strictly configured environment? [Take a
look here](faq/index.md) to
get proper settings for your firewall/web services.**  
Link:
[FAQ](faq/index.md)


# MAPI / Merchant API

See [MAPI documentation here](/merchant-api-2-0) for more information.

[https://merchant-api.resurs.com](https://merchant-api.resurs.com)

## Payment Admin

[Resurs Merchant Portal](https://merchantportal.resurs.com/login)

  
