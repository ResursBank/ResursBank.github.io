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

## Firewalling
How to configure firewalls
**Do you have a strictly configured environment?** [**Take a
look **](https://test.resurs.com/docs/display/ecom/FAQ#FAQ-HowdoIconfiguremyfirewall/network)**[here](FAQ_328016.html) to
get proper settings for your firewall/web services.**  
Link:
[FAQ#HowdoIconfiguremyfirewall/network](FAQ_328016.html#FAQ-HowdoIconfiguremyfirewall/network)
  
  
## Payment Admin
[Resurs Merchant Portal](https://merchantportal.resurs.com/login)
## Live URLs
### Resurs Checkout
For Resurs Checkout go to:  
[https://checkout.resurs.com/checkout](https://checkout.resurs.com/checkout)
## Hosted Flow
For hosted flow go to:  
[https://ecommerce-hosted.resurs.com/back-channel](https://ecommerce-hosted.resurs.com/back-channel)
## Webservices
### WSDL files
#### Simplified Shop Flow:
[https://ecommerce.resurs.com/ws/V4/SimplifiedShopFlowService?wsdl](https://ecommerce.resurs.com/ws/V4/SimplifiedShopFlowService?wsdl)
#### After Shop Flow:
[https://ecommerce.resurs.com/ws/V4/AfterShopFlowService?wsdl](https://ecommerce.resurs.com/ws/V4/AfterShopFlowService?wsdl)
#### Configuration:
[https://ecommerce.resurs.com/ws/V4/ConfigurationService?wsdl](https://ecommerce.resurs.com/ws/V4/ConfigurationService?wsdl)
#### Developer:
[https://ecommerce.resurs.com/ws/V4/DeveloperWebService?wsdl](https://ecommerce.resurs.com/ws/V4/DeveloperWebService?wsdl)
### Service endpoints
#### Simplified Shop Flow:
[https://ecommerce.resurs.com/ws/V4/SimplifiedShopFlowService](https://ecommerce.resurs.com/ws/V4/SimplifiedShopFlowService?wsdl)
#### After Shop Flow:
[https://ecommerce.resurs.com/ws/V4/AfterShopFlowService](https://ecommerce.resurs.com/ws/V4/AfterShopFlowService?wsdl)
#### Configuration:
[https://ecommerce.resurs.com/ws/V4/ConfigurationService](https://ecommerce.resurs.com/ws/V4/ConfigurationService?wsdl)
#### Developer:
[https://ecommerce.resurs.com/ws/V4/DeveloperWebService](https://ecommerce.resurs.com/ws/V4/DeveloperWebService?wsdl)
  
  
