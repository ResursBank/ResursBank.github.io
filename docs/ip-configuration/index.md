---
layout: page
title: IP-configuration
permalink: /ip-configuration/
nav_order: 65
has_children: false
has_toc: false
---

# IP-configuration 

## Your outbound traffic 

For standard use cases, we recommend that you access Resurs Bank’s services using the FQDNs provided to you. This ensures that your integration remains unaffected if the underlying IP addresses associated with these FQDNs change. 
We therefore encourage you to remove any IP whitelisting configured for your outbound traffic towards Resurs Bank’s resources using FQDN. 
If you have a compelling reason to maintain IP whitelisting for your outbound traffic, please contact us — we will provide guidance on how to do so properly. 

## Your inbound traffic 

For certain application flows, Resurs bank will send you Callbacks. For you to be able to receive these callbacks, you may need to whitelist the following IP address for Inbound traffic to your network: 

192.121.110.100 

13.50.187.51 

51.21.32.255 
