---
layout: page
title: Figuring Out Remote Ip For Whitelisting
permalink: /platform-plugins/woocommerce/figuring-out-remote-ip-for-whitelisting/
nav_order: 31
parent: Woocommerce
grand_parent: Platform Plugins
---

# Figuring out remote ip for whitelisting

In tests, we sometimes need to whitelist your server's IP address, for example when your server is located in a country
outside the Nordic region.

Normally, it is not very difficult to figure out which IP address needs to be whitelisted. There are many services
available on the internet that can fetch the proper address, or you could simply run a console-based command like this
from your server. Example:

```html
curl https://ipv4.netcurl.org/ip.php
91.198.202.76
```
