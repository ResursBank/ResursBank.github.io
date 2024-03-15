---
layout: page
title: Developer Notes
permalink: /platform-plugins/prestashop-payment-gateways/prestashop-simplifiedshopflow/developer-notes/
parent: Prestashop Simplifiedshopflow
grand_parent: Prestashop Payment Gateways
---

# Developer Notes 

## Forwarding specific errors to front end
The below pull request may be a perfect example of how to forward
specific errors to front page. This makes the plugin, instead of
notifying customers about "something went wrong", render a proper error
message on screen. The excptions being made is API error, which is a bit
more verbose than the standard problems.

[https://bitbucket.org/resursbankplugins/psrbsimplified/pull-requests/54](https://bitbucket.org/resursbankplugins/psrbsimplified/pull-requests/54)

The errors that we want to push forward to screen is the moment where
customers forget or do not enter government id's on the checkout page
for Resurs Bank internal payment methods, which is a requirement. This
starts with [InvalidGovIdException on row
316](https://bitbucket.org/resursbankplugins/psrbsimplified/pull-requests/54#Lsrc/Service/Api.phpT316).
At this moment, we throw a specific exception that can later be
identified as a "verbose point" in the module. We also throws an error
code on each exception so the plugin will be able to handle all errors
(if necessary) based on the code. However, for this case we only pick up
the exeption classname at [the OrderHandler from
getProperOrderException](https://bitbucket.org/resursbankplugins/psrbsimplified/pull-requests/54#Lsrc/Service/OrderHandler.phpT156)
where we can define which of the exceptions that should be handled
specifically eas "customer messages".

## Customer Data Fields
As of 
[![](https://resursbankplugins.atlassian.net/rest/api/2/universal_avatar/view/type/issuetype/avatar/10303?size=medium)P17-226](https://resursbankplugins.atlassian.net/browse/P17-226?src=confmacro) -
Få ordning på setCustomer Done we are changing the way customer data
fields are behaving in the checkout. We usually don't have to collect
both phone and mobile in the checkout steps, and as phone number is the
absolute default in a newly installed PrestaShop store we use the
internal phone-field as the primary target. 
[![](https://resursbankplugins.atlassian.net/rest/api/2/universal_avatar/view/type/issuetype/avatar/10303?size=medium)P17-223](https://resursbankplugins.atlassian.net/browse/P17-223?src=confmacro) -
Do we really need 2 phone numbers on validation? Done and 
[![](https://resursbankplugins.atlassian.net/rest/api/2/universal_avatar/view/type/issuetype/avatar/10318?size=medium)P17-225](https://resursbankplugins.atlassian.net/browse/P17-225?src=confmacro) -
RCO streamline phone numbers Done also includes requests for being more
streamlined in the checkout, the same way as Resurs Checkout.

Instead of always fetching [all required
fields](https://test.resurs.com/docs/display/ecom/General%3A+Integration+development#General:Integrationdevelopment-Thecheckoutandformsthatneedstobefilledin),
we instead try to centralize one of the two requirements by simply
cloning the best value from phone and mobile:

- If phone is empy, use mobile and vice versa.
- If both fields are empty, initiate the checkout form with phone only -
  and ask the customer for this part.
- When running next step (validate.php), we will now set higher priority
  on the entered phone number in the final checkout step and use the one
  entered as both phone and mobile since Resurs still requires a phone
  number. Since shipping tracking is very common today, a majority of
  customers is also said to be using mobile numbers.

To properly handle phone numbers as mandatory, it is highly recommended
to configure the fields in PrestaShop to be enforcing, not optional.

