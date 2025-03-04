---
layout: page
title: Resurscheckoutjs Legacy
permalink: /resurs-checkout-web/iframe-communication--v2api-/resurscheckoutjs-legacy/
parent: Resurs Checkout Web
---


# ResursCheckoutJS Legacy 

**Table of contents**
- [Requirements](#ResursCheckoutJSLegacy-Requirements)
  - [Dependencies and script
    support](#ResursCheckoutJSLegacy-Dependenciesandscriptsupport)
- [What this script can do](#ResursCheckoutJSLegacy-Whatthisscriptcando)
  - [The moment 22](#ResursCheckoutJSLegacy-Themoment22)
    - [tldr; Take a look at this page if the description below is too
      complex.](#ResursCheckoutJSLegacy-tldr;Takealookatthispageifthedescriptionbelowistoocomplex.)
- [What this script can't
  do](#ResursCheckoutJSLegacy-Whatthisscriptcan'tdo)
- [What you should be careful
  with](#ResursCheckoutJSLegacy-Whatyoushouldbecarefulwith)
- [Can I use
  updatePaymentReference?](#ResursCheckoutJSLegacy-CanIuseupdatePaymentReference?)
- [Can I change the look of the
  iframe?](#ResursCheckoutJSLegacy-CanIchangethelookoftheiframe?)
- [The events in the JS
  module](#ResursCheckoutJSLegacy-TheeventsintheJSmodule)
[Download](#ResursCheckoutJSLegacy-Download)
[CHANGELOG](#ResursCheckoutJSLegacy-CHANGELOG)
- [Version 0.09](#ResursCheckoutJSLegacy-Version0.09)
- [Version 0.08](#ResursCheckoutJSLegacy-Version0.08)
- [Version 0.07](#ResursCheckoutJSLegacy-Version0.07)
[Usage examples](#ResursCheckoutJSLegacy-Usageexamples)
- [Common handlers](#ResursCheckoutJSLegacy-Commonhandlers)
- [Catching customer data before the checkout
  button](#ResursCheckoutJSLegacy-Catchingcustomerdatabeforethecheckoutbutton)
- [Failing purchases](#ResursCheckoutJSLegacy-Failingpurchases)
- [Change the shape of the
  iframe](#ResursCheckoutJSLegacy-Changetheshapeoftheiframe)
- [Sending own messages to the
  iframe](#ResursCheckoutJSLegacy-Sendingownmessagestotheiframe)
[Script debugging](#ResursCheckoutJSLegacy-Scriptdebugging)
RCOJS continuity
**Project is discontinued.**
## Requirements
- A pre-set
  js-variable: `RESURSCHECKOUT_IFRAME_URL` (*`OMNICHECKOUT_IFRAME_URL` are
  kept for backwards compatibility*) needs to be set from your store, to
  define where events are sent from.  
  ***Note: If you're using a
  document.ready-control, RESURSCHECKOUT_IFRAME_URL must be set before
  this***
- Make sure that shopUrl is sent and matches with the target iframe URL
  (not the complete one, you only need the first parts for
  example ***[https://http.host.name](https://http.host.name)*** without
  trailing slashes), when creating the iframe at API level.
- A html element, with an id, that holds the iframe (default id:
  resurs-checkout-container)
### Dependencies and script support
ResursCheckoutJS has *no external* dependencies like jQuery, etc, since
we want to be sure that the script fits in any web store you implement
it in. The target browser must however support JSON-parsing
([JSON.stringify](https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/JSON/stringify)).
## What this script can do
### The moment 22
#### **[tldr; Take a look at this page if the description below is too complex.](Handling-checkout-flows-bottle-necks_39190697.html)**
To create an order at Resurs Bank, Resurs Bank requires an order id,
preferrably from the store. Sometimes, store platforms can't return the
order id before, the order has been created in the store first. This
might be a problem, since creating an order this way, first, does not
give very much information about the customer itself.  
  
Resurs Checkout has a communication interface, that allows a web store
to pick up data from the checkout-iframe and place the order as soon as
the customer has been confirmed "OK" at Resurs Bank. However, the store
still needs to return a valid order id. To get around this problem, your
store plugin may create a temporary order id first, that it use to
initiate a payment at Resurs Bank. As the communication interface in the
checkout allows background activities, it is also possible to create the
order as soon as the customer confirms the payment at checkout. At this
moment, the backend plugin has the chance to synchronize the proper
order id, created by the store, with the temporary initiated order id at
Resurs Bank.
ResursCheckoutJS is a small framework-like script, that handles the
primary part of those issues. ResursCheckoutJS has \*no external
dependencies\* like jQuery, etc, since we want to be sure that the
script fits in any web store and plugin you decide to use it in. The
script is written so that you can put it on a webpage without having it
primarily activated (to avoid colliding with other scripts). It utilizes
the message handler in the Resurs Checkout iframe, so that you can push
an order into the store in the background, as the checkout is completed
at Resurs Bank.  
  
Communicating with the iframe is however not required in any matter,
unless you are planning to book the order as describe above, \*before\*
the booking is made at Resurs Bank. This means that you actually can
live completely without this interactivity.
## What this script can't do
- It does not update the iframe summary if the cart changes. This should
  be backend
  (See https://test.resurs.com/docs/x/BoJM#ResursCheckout-/checkout/payments/{orderReference}-PUT)
## What you should be careful with
Be aware of expected behaviour glitches
Running in "interceptor"-mode might be, if you do not take some
precautions, unsafe. Always make sure that you, during an intercepted
booking synchronize your checkout cart in the store with Resurs Bank.
This can be best done by, before creating the order in the webstore and
before releasing the interceptor handle to Resurs Bank, by an extra PUT
([read
here!](https://test.resurs.com/docs/display/ecom/Resurs+Checkout#ResursCheckout-/payments/%7BorderReference%7D-PUT))
as content can be changed for example in other browser tabs during the
checkout. Since the iframe does not know what's going on in your store
while it is open, it is highly recommended to secure this.
## Can I use updatePaymentReference?
Yes. If you have needs to update your payment reference (orderid) before
sending order confirmation to ecommerce (via the confirm order button),
you can do an updatePaymentReference call first in, for example, your
backend environment. As this reference has to be created before the
order is created in Resurs Bank, you could use the setBookingCallback()
function in ResursCheckoutJS to trigger this update event, when your
order has been created locally.
## Can I change the look of the iframe?
Yes and no. It depends on what you are planning to change. Fonts and
button colors are primary possible to change, but you have to tell
Resurs Bank about it. As of ResursCheckoutJS 0.09, there is however a
event callback available, that gives you the opportunity to change the
iframe style. This normally includes the iframe body background and the
border shape.
## The events in the JS module
Events that this module catches from Resurs Checkout (and other events
sent from the checkout):  
  
- **checkout:loaded** - Handled by this script when the iFrame has
  loaded and is ready  
  Available callback function: ***resursCheckoutIframeReady***
- **checkout:user-info-change** - Stored until checkout is finished  
  Available callback function: **setCustomerChangedEventCallback**
- **checkout:payment-method-change** - Stored until checkout is
  finished  
  Available callback function: ***setCustomerChangedEventCallback***
- **checkout:booking-order** - Passed with necessary customer data to a
  callback, or dropped if no callback is set  
  Available callback function: ***setBookingCallback***
- **checkout:purchase-failed** - If there is a problem with the payment
  at Resurs Bank, this event will be sent back from the iframe**  
  **Available callback function:* **setPurchaseFailCallback***
- **checkout:purchase-denied**- If there is a problem with the payment
  at Resurs Bank customer level, this event will be sent back from the
  iframe**  
  **Available callback function:* **setPurchaseDeniedCallback***
- **puchase-button-clicked** - Event that runs on the
  purchase-button-click ***(mind the typo, this is the current event
  name that is sent from the checkout)***.
# Download
Latest version is always available
at [https://bitbucket.org/resursbankplugins/resurscheckoutjs](https://bitbucket.org/resursbankplugins/resurscheckoutjs)
# CHANGELOG
### Version 0.09
  
|                                                                                   |                                                                                                              |                                                                                                                                                                                                    |            |            |     |            |                  |                                                                                       |        |            |
|:----------------------------------------------------------------------------------|:-------------------------------------------------------------------------------------------------------------|:---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|:-----------|:-----------|:----|:-----------|:-----------------|:--------------------------------------------------------------------------------------|:-------|:-----------|
| Key                                                                               | Summary                                                                                                      | T                                                                                                                                                                                                  | Created    | Updated    | Due | Assignee   | Reporter         | P                                                                                     | Status | Resolution |
| [RCOJS-12](https://resursbankplugins.atlassian.net/browse/RCOJS-12?src=confmacro) | [JS-event callback for loaded iframe](https://resursbankplugins.atlassian.net/browse/RCOJS-12?src=confmacro) | [![Task](https://resursbankplugins.atlassian.net/rest/api/2/universal_avatar/view/type/issuetype/avatar/10318?size=medium)](https://resursbankplugins.atlassian.net/browse/RCOJS-12?src=confmacro) | 2017-06-02 | 2017-06-02 |     | Unassigned | Thomas Tornevall | ![Medium](https://resursbankplugins.atlassian.net/images/icons/priorities/medium.svg) |  Done  | Done       |
  
[1
issue](https://resursbankplugins.atlassian.net/secure/IssueNavigator.jspa?reset=true&jqlQuery=fixVersion+%3D+0.09+&src=confmacro "View all matching issues in Jira.")
### Version 0.08
  
|                                                                                   |                                                                                                                                 |                                                                                                                                                                                                   |            |            |     |                 |                  |                                                                                         |        |            |
|:----------------------------------------------------------------------------------|:--------------------------------------------------------------------------------------------------------------------------------|:--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|:-----------|:-----------|:----|:----------------|:-----------------|:----------------------------------------------------------------------------------------|:-------|:-----------|
| Key                                                                               | Summary                                                                                                                         | T                                                                                                                                                                                                 | Created    | Updated    | Due | Assignee        | Reporter         | P                                                                                       | Status | Resolution |
| [RCOJS-10](https://resursbankplugins.atlassian.net/browse/RCOJS-10?src=confmacro) | [Safari browsers might fail trigging on checkout events](https://resursbankplugins.atlassian.net/browse/RCOJS-10?src=confmacro) | [![Bug](https://resursbankplugins.atlassian.net/rest/api/2/universal_avatar/view/type/issuetype/avatar/10303?size=medium)](https://resursbankplugins.atlassian.net/browse/RCOJS-10?src=confmacro) | 2017-05-17 | 2017-05-17 |     | Marcus Gullberg | Thomas Tornevall | ![Highest](https://resursbankplugins.atlassian.net/images/icons/priorities/highest.svg) |  Done  | Done       |
  
[1
issue](https://resursbankplugins.atlassian.net/secure/IssueNavigator.jspa?reset=true&jqlQuery=fixVersion+%3D+0.08+&src=confmacro "View all matching issues in Jira.")
### Version 0.07
  
|                                                                                 |                                                                                                                              |                                                                                                                                                                                                   |            |            |     |                  |                  |                                                                                       |        |            |
|:--------------------------------------------------------------------------------|:-----------------------------------------------------------------------------------------------------------------------------|:--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|:-----------|:-----------|:----|:-----------------|:-----------------|:--------------------------------------------------------------------------------------|:-------|:-----------|
| Key                                                                             | Summary                                                                                                                      | T                                                                                                                                                                                                 | Created    | Updated    | Due | Assignee         | Reporter         | P                                                                                     | Status | Resolution |
| [RCOJS-9](https://resursbankplugins.atlassian.net/browse/RCOJS-9?src=confmacro) | [Support multiple iframe-elements on page](https://resursbankplugins.atlassian.net/browse/RCOJS-9?src=confmacro)             | [![Task](https://resursbankplugins.atlassian.net/rest/api/2/universal_avatar/view/type/issuetype/avatar/10318?size=medium)](https://resursbankplugins.atlassian.net/browse/RCOJS-9?src=confmacro) | 2017-04-10 | 2017-04-11 |     | Thomas Tornevall | Thomas Tornevall | ![Medium](https://resursbankplugins.atlassian.net/images/icons/priorities/medium.svg) |  Done  | Done       |
| [RCOJS-8](https://resursbankplugins.atlassian.net/browse/RCOJS-8?src=confmacro) | [Securing backwards compatibility by element scanning](https://resursbankplugins.atlassian.net/browse/RCOJS-8?src=confmacro) | [![Task](https://resursbankplugins.atlassian.net/rest/api/2/universal_avatar/view/type/issuetype/avatar/10318?size=medium)](https://resursbankplugins.atlassian.net/browse/RCOJS-8?src=confmacro) | 2017-04-08 | 2017-04-11 |     | Thomas Tornevall | Thomas Tornevall | ![High](https://resursbankplugins.atlassian.net/images/icons/priorities/high.svg)     |  Done  | Done       |
  
[2
issues](https://resursbankplugins.atlassian.net/secure/IssueNavigator.jspa?reset=true&jqlQuery=fixVersion+%3D+0.07+&src=confmacro "View all matching issues in Jira.")
# Usage examples
### Common handlers
Make sure omnicheckout.js (or the minified version) loads first, so put
it between the \<head\>\</head\>-tags. Initialization of the iframe
communication works like the example below.
**Initialization**
``` syntaxhighlighter-pre
// The RESURSCHECKOUT_IFRAME_URL should be dynamically set up, but this is an example, so we have put a static url here, to test environment.
// Make sure you are not using this example in your production environment, since that will fail.
var RESURSCHECKOUT_IFRAME_URL = "https://omnitest.resurs.com";
var resursCheckout = ResursOmni();
resursCheckout.init();
```
To catch data from the iframe, you need a callback function set up on
your client side. You may either register this callback or use a default
function, to catch the data. Creating the function that handles bookings
may look like this:
**Hande iframe communication**
``` syntaxhighlighter-pre
/**
 * Handle booking event from OmniCheckout frame
 * @param omniJsObject
 */
function omniBookEvent(checkoutJsObject) {
    // start handling your bookings here
    // -- ajax calls and stuff --
    // on success, confirm the booking back to the iframe here
    ResursOmni.confirmOrder(true);
}
```
    The omniJsObject is received from the iframe and normally contains enough data (ssn, address and deliveryaddress) to book the order on the client side store. Deliveryaddress is empy if it matches with the regular address (billing).
To use your own callback function you could so something like this
instead:
**Defining own callback for bookings**
``` syntaxhighlighter-pre
ResursOmni.setBookingCallback(
    function(checkoutJsObject) {
        // My own callback for handling bookpayment
    }
);
```
### Catching customer data before the checkout button
In some cases, a shop needs to fetch address data before the checkout is
being made, to make sure that shipping is properly set up. For example,
depending on where you live (postal codes), you might want to update
your shop with valid delivery options for the city the customer lives
in. As of v0.06 you can set up a callback in ResursCheckoutJS to handle
customer data through your backend, long before the customer clicks on
the checkout button. This set up is as easy as setBookingCallback:
**Defining own callback for bookings**
``` syntaxhighlighter-pre
ResursOmni.setCustomerChangedEventCallback(
    function(checkoutCustomerData) {
        // My own callback for handling backend upgrades, preferrably through an AJAX call to yourself
    }
);
```
"Remember me"
*Customer data will also be available, if the customer has checked the
"Remember me"-option.*
### Failing purchases
The feature for sending back messages to the shop, that has been added
in v0.04 works as the above setBookingCallback. If a purchase failes,
because of for example a credit denial, Resurs Checkout will now send
back a purchase-failed message to the parent page, that OmniJS can
catch. If the function is set with **setPurchaseFailCallback()**, you
can make your store cancel the current order and eventually restart with
a new in cases where your store does not support automatic
cancellations.
**setPurchaseFailCallback**
``` syntaxhighlighter-pre
ResursOmni.setBookingCallback(
    function() {
        // My own callback for handling automatic cancellations if the payment fails
    }
);
```
### Change the shape of the iframe
Directly after the init()-function you could set up a function that
looks like something like this:
``` syntaxhighlighter-pre
resursCheckout.setOnIframeReady(function(iframeElement) {
    iframeElement.setAttribute('style', 'border-radius:10px; box-shadow:10px 5px 5px #990000; border:1px solid black; background:#FFFF00;');
});
```
The event is, as you can see, sending over the element of where the
iframe is located - so everything that is not cross-site-scripting
related can actually be done here. Normally, the only things covered
here, is the look of the iframe. This means, at least, that you can
change the background color and the border shape of the iframe.
### Sending own messages to the iframe
Since the iframe already supports extended communication like updates of
the order summary, accepted terms and conditions, etc - and OmniJS
currently don't - there is an implementation of sending your own
messages to the iframe that may solve your request.
This example is an alternative to the confirmOrder()-call above:
**Send own messages to the iframe**
``` syntaxhighlighter-pre
ResursOmni.postFrame({
    eventType: 'checkout:order-status',
    orderReady: true
});
```
  
## Script debugging
Data that comes from the iframe, can be debugged, by enabling debug mode
like this:
**Debug mode**
``` syntaxhighlighter-pre
omniCheckout.setDebug(true);
```
