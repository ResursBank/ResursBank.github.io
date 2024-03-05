---
layout: page
title: Faq
permalink: /faq/
has_children: true
---


# FAQ 
Created by Tobias, last modified by Thomas Tornevall on 2023-12-27
Questions we often receive includes:
- [My environment seems to be unavailable for
  Resurs](#FAQ-MyenvironmentseemstobeunavailableforResurs)
  - [Are your site available from
    internet?](#FAQ-Areyoursiteavailablefrominternet?)
  - [Are you using ngrok?](#FAQ-Areyouusingngrok?)
  - [Are you using proxy?](#FAQ-Areyouusingproxy?)
  - [Are you hard blocking unknown traffic in your
    firewall?](#FAQ-Areyouhardblockingunknowntrafficinyourfirewall?)
  - [Are you allowing traffic from certain traffic in your
    webserver?](#FAQ-Areyouallowingtrafficfromcertaintrafficinyourwebserver?)
  - [Are you using correct TLS
    version?](#FAQ-AreyouusingcorrectTLSversion?)
- [How do I configure my
  firewall/network?](#FAQ-HowdoIconfiguremyfirewall/network?)
  - [Local networks / Hosts (or "your callbacks is not
    working")](#FAQ-Localnetworks/Hosts(or%22yourcallbacksisnotworking%22))
- ["Limitforms"?](#FAQ-%22Limitforms%22?)
- [Payments methods: You mean
  'invoice'?](#FAQ-Paymentsmethods:Youmean'invoice'?)
- [Should I set preferred payment
  ID?](#FAQ-ShouldIsetpreferredpaymentID?)
- [Can I skip the prepare signing
  part?](#FAQ-CanIskipthepreparesigningpart?)
- [Client libraries for my programming language,
  where?](#FAQ-Clientlibrariesformyprogramminglanguage,where?)
- [Good to know](#FAQ-Goodtoknow)
  - [Can I skip registering ANNULMENT and FINALIZATION callback and make
    UPDATE handle the
    work?](#FAQ-CanIskipregisteringANNULMENTandFINALIZATIONcallbackandmakeUPDATEhandlethework?)
  - [Simplified flow and payment
    providers](#FAQ-Simplifiedflowandpaymentproviders)
  - [Signing processes and mismatching orders in the
    interfaces](#FAQ-Signingprocessesandmismatchingordersintheinterfaces)
  - [How long will you wait for callbacks (during the connection itself)
    to
    arrive?](#FAQ-Howlongwillyouwaitforcallbacks(duringtheconnectionitself)toarrive?)
- [Troubleshooting](#FAQ-Troubleshooting)
  - [First step of error checking](#FAQ-Firststepoferrorchecking)
  - [Security warnings](#FAQ-Securitywarnings)
  - [When I add DISCOUNT in hosted flow I'm not allowed to make a
    purchase](#FAQ-WhenIaddDISCOUNTinhostedflowI'mnotallowedtomakeapurchase)
  - [Slow callbacks in Magento 2](#FAQ-SlowcallbacksinMagento2)
- [The jungle of SSL](#FAQ-ThejungleofSSL)
  - [Where and whats about SSL](#FAQ-WhereandwhatsaboutSSL)
    - [Where do I find a verified
      issuer?](#FAQ-WheredoIfindaverifiedissuer?)
  - [Visualization of above](#FAQ-Visualizationofabove)
- [Do we support IPv6?](#FAQ-ipv6DowesupportIPv6?)
  - [Missing a question? Contact us!](#FAQ-Missingaquestion?Contactus!)
Do NOT use TLS 1.1 or lower!
**TLS *below* TLSv1.2 is no longer supported.** Trying to connect to our
services with lower versions will fail!
# My environment seems to be unavailable for Resurs
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
# How do I configure my firewall/network?
If you have restricted firewalls that explicitly need to define what
communication is allowed, you should consider open for the
[CIDR](https://sv.wikipedia.org/wiki/Classless_Inter-Domain_Routing)-blocks
below.
***Please note that the primary ports for a web-server should be 443
(https) as Resurs no longer support plain text callbacks at port 80.***
  
| Network CIDR-block | Range equivalent                | Broadcast       | Netmask       | Firewall settings         | Allow ports | AS Number                            |
|--------------------|---------------------------------|-----------------|---------------|---------------------------|-------------|--------------------------------------|
| 192.121.110.0/24   | 192.121.110.1 - 192.121.110.254 | 192.121.110.255 | 255.255.255.0 | Allow from 192.121.110.\* | 443 (https) | [AS35814](https://ipinfo.io/AS35814) |
| 194.68.237.0/24    | 194.68.237.1 - 194.68.237.254   | 194.68.237.255  | 255.255.255.0 | Allow from 194.68.237.\*  | 443 (https) | [AS35814](https://ipinfo.io/AS35814) |
| 91.198.202.0/24    | 91.198.202.1 - 91.198.202.254   | 91.198.202.255  | 255.255.255.0 | Allow from 91.198.202.\*  | 443 (https) | [AS35814](https://ipinfo.io/AS35814) |
  
## Local networks / Hosts (or "your callbacks is not working")
If you are using local networks during tests, be aware that all
teststings does not work. There are a few rules to consider for
"locals":
- Local networks like 192.168.0.0/16,172.16.0.0/16, 10.0.0.0/8, etc
  (see [https://en.wikipedia.org/wiki/Private_network](https://en.wikipedia.org/wiki/Private_network))
  are unreachable. Testing callbacks on such networks won't work.
- Hostnames assigned by local isolated DNS servers only does not work -
  we won't be able to resolve them unless they reside on a reachable
  internet connection. This includes local zones like localhost
  (example: my-dev.localhost, my-site.dev, etc).
# "Limitforms"?
Our limit forms are a way to handle dynamic input from the customer.
Normally the web service interface would specify which information that
should be sent in when doing a credit application or a card purchase.
We've instead chosen to return a set of fields we would like the
customer to fill in. These fields carries information enough to render a
HTML form in the web shop asking the customer for these values. Upon
POST, these values are to be compiled into a xml document and sent to
us.
In this way we can handle all kind of [Payment
methods](Concepts-and-Domain_950279.html#ConceptsandDomain-Anchor_PaymentMethods)
in **one** flow, and we can request more data if needed.
Because of this, the shop never can assume that a particular field will
or will not show up for a certain payment method. The shop **must**
render the limit form *dynamically*. 
[Read more about limit
applications...](Concepts-and-Domain_950279.html#ConceptsandDomain-Anchor_LimitApplications)
# Payments methods: You mean 'invoice'?
A common misunderstanding is that there is a fixed number of [payment
methods](Concepts-and-Domain_950279.html#ConceptsandDomain-Anchor_PaymentMethods)
Resurs Bank offers, and that these payment methods have different
'flows', i.e. different functions needs to be invoked in, say, a card
purchase and an invoice purchase. This is **not** the case. Resurs Bank
has implemented [**one**
flow](https://test.resurs.com/docs/display/DD/Shop+Flow+Service) which
incorporates all payment methods.
Resurs Bank can add and remove payment methods with configuration. It's
up to the implementor to hard-code payment methods on the client side,
but further programming would, of course, be required to change the
payment method setup in this case.
Due to the dynamic nature of [payment
methods](Concepts-and-Domain_950279.html#ConceptsandDomain-Anchor_PaymentMethods),
payment methods identities used in the [shop
flow](https://test.resurs.com/docs/display/DD/Shop+Flow+Service) might
be different in live versus test! Do not hard-code them!
# Should I set preferred payment ID?
To more easily identify a payment you should always set the
preferredPaymentId to the identity of your order
in [bookPayment](bookPayment_1476362.html). If this is not set, the
payment will be getting a generated identity.
# Can I skip the prepare signing part?
In Resurs Checkout, absolutely! But in simplifiedShopFlow, as signing is
triggered by different rules, you should always implement the signing
flow.
# Client libraries for my programming language, where?
Many integrators expect Resurs Bank to provide client side libraries. Go
check under the section [Development](Development_950386.html) to find
out what we're building in house.
# Good to know
## Can I skip registering ANNULMENT and FINALIZATION callback and make UPDATE handle the work?
Yes. UPDATE is fired each time an order status is changed. This is why
you also can not ignore neither BOOKED (created) nor UNFREEZE (not a
status update), since they don't specifically update the status of a
payment.
## Simplified flow and payment providers
*When we use Swish, we get a redirect-url on SIGNING that leads us to
swish and then back to a success-page, almost like in the case of
INVOICE, etc. Do we have to run a bookSignedPayment in those cases?*
No. The booking of signed payments are completed at Resurs side in such
cases, even if the SIGNING-url is used and is it handled automatically.
When you get a SIGNING where bookSignedPayment **is** required, the
payment will first be redirected a it always do to your signing-page.
## Signing processes and mismatching orders in the interfaces
A rare problem, but still existing, is a case when an order is still
active at Resurs Bank but cancelled in the store platform. This is
something that usually should not be possible due to the way RCO works:
- Customer is completing the order - the normal case (like Woocommerce)
  is that the order is created in the webstore before Resurs Bank.
- If the customer hasn't completed the order in time, there's a slight
  chance that the order is now cancelled in the platform.
- If the customer is required to sign the payment before proceeding, the
  order is in this moment not created at Resurs Bank yet. So if the
  order is cancelled in the platform, it should be in order.
- If the customer signs the payment, it is also created at Resurs Bank.
  A callback is sent back to the platform to update the payment
  regardless if the customer returns to the store on success.
- The order, depending on the platform should be properly updated or
  rejected (Woocommerce updates the cancelled order as successful now).
  So in this case, the order **should** exist in both places.
- If your platform is rejecting cancelled orders they should still be
  there.
## How long will you wait for callbacks (during the connection itself) to arrive?
The default callback timeout are set to 5 seconds as of april 24 2019.
If you wonder for how long we try to resend callbacks to you, [look here
instead](https://test.resurs.com/docs/display/ecom/Callbacks#Callbacks-Fallback-resendingfailedcallbacks).
# Troubleshooting
## First step of error checking
Make sure that you're checked with [The "not a bug" list](16056903.html)
before considering the problem as a remote error. You can also take a
look at [Errors, problem solving and corner cases](16056453.html), to
see if it might be other problems that can be "self solvable".
XML validation
When using our services live, do not enable strict XML Schema validation
as minor changes on our side can cause the integration to fail.
Signing troubles
When you implement our signing requirement, please *redirect* the
customer to the link the `prepareSigning` function provides. **Do
not** try to embed the signing page in the webshop as an `iframe`.
## Security warnings
Check that you use HTTPS and that you have a valid and issued
certificate, not a self signed one. If you run PHP and anything else but
RCO, make sure you also have SoapClient and XML-support installed.
## When I add DISCOUNT in hosted flow I'm not allowed to make a purchase
Did you add VAT to the discount line? If so, this might be the cause.
The flow does not allow negative values when discount is added with VAT.
## Slow callbacks in Magento 2
In some cases (relatively rare), callbacks might feel a bit slow. The
best indicator of this is when the BOOKED callback are triggered from
Resurs Bank and Magento's order status notifications are repeatedly
filled with the same BOOKED notice several times.
This is usually not bound to the plugin itself. Instead most of it is
about the e-mail rendering and how long it takes for a customer
confirmation mail to be sent during the callback. The first bottle neck
can be found in the e-mail sending itself; if the mail server are
misconfigured, this also could cause a noticeable slowdown in the
system. Usually this depends on resolving and the e-mail communication
which can not be fixed by us.
The second problem is bound to the e-mail rendering rather than the
sending. This time the real problem could be found in the template
rendering. A live example we have is the theme "Luma" and the demo store
itself. When the callback BOOKED occurs in the platform, a bunch of
templates starts to render before the e-mail is being sent. In our case,
it all starts
at **vendor/magento/module-sales/view/frontend/email/order_new_guest.html**,
where this row are rendered:
``` syntaxhighlighter-pre
   {{template config_path="design/email/header_template"}}
```
When this happens the template 
**vendor/magento/module-email/view/frontend/email/header.html** is being
read, and amongst others some css-data and variables are fetched. This
might take some time do do, and when we use the Luma theme it gets
slower. We should say there's no other themes that does the same, but
sometimes it could be good to check out the themes also.
The absolutely simplest, but cron-dependent solution is to make Magento
go async. By means, e-mail are not being sent during actions like
callback, but may also be delayed depending on how often cronjobs are
running. *I'd say this solution is highly dependent on functional
cronjobs.*
**Async mode**
``` syntaxhighlighter-pre
bin/magento config:set sales_email/general/async_sending 1
```
To reactivate the synchronous sending again, you instead run this:
**Sync mode**
``` syntaxhighlighter-pre
bin/magento config:set sales_email/general/async_sending 0
```
# The jungle of SSL
Do NOT use TLS 1.1 or lower!
**TLS *below* TLSv1.2 is no longer supported.** Trying to connect to our
services with lower versions will fail!
## Where and whats about SSL
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
[Digicert](https://www.digicert.com/)
[Network Solutions](https://www.networksolutions.com/)
[Godaddy / Starfield Technologies](https://www.godaddy.com)
[Letsencrypt](https://letsencrypt.org/) (Issues free certificates,
supports wildcard certificates, but requires renewal every three
months) 
### Where do I find a verified issuer?
There's a lots of issuers available on the internet, so there's nearly
impossible to recommend a verified issuer.
## Visualization of above
  
|     |
|-----|
  
  
# Do we support IPv6?
*No - and partially yes.*
Resurs Bank is currently running, inbound, on IPv4 layers only. However,
IPv6 are supported **if** your site support both protocols. The support
is based, halfway, on [paymentData](paymentData_1476364.html)
(simplified flow) and [getAddress (SE)](4653085.html) (simplified flow).
"*Half way*" means that you *can* add the customer remote ip address
into the payment information when finishing orders. You can also add the
remote ip during a getAddress-lookup. There are no other connectivity
support than this. It is important to know, that if you run a site with
*IPv6 connectivity **only*** (which is actually fully possible to do as
of today) your solution will fail: *there are no such support available
at all*. Hosted flow and Resurs Checkout is also IPv4 only.
## Missing a question? [Contact us!](Contact_327926.html)
