---
layout: page
title: Mapi-Wc - Customizations
nav_exclude: true
permalink: /platform-plugins/woocommerce/resurs-merchant-api-2-0-for-woocommerce/mapi-wc---customizations/
parent: Resurs Merchant Api 2.0 For Woocommerce
grand_parent: Woocommerce
---



# MAPI-WC - Customizations 
This section contains a set of examples of how you can code with the
module on your own. Much of the codebase is modular which means that you
practically can use the same hooks as we do. Please be aware of the fact
that our module follows a lot of standard practices, so some things may
not be supported or compatible with your platform **if** you have own
customizations.

The methods and examples on this page is not actually supported by
Resurs and reside here only to be initial examples of other ways of
coding.

## Custom customer type handling
Normally, in at least Sweden, we use a widget called getAddress that we
pick up customer information based on the customer type (private
person - NATURAL, or company - LEGAL). If you decide to not use it but
still need to update payment methods based on other sections that picks
up customer types, you can use the hooks that we use with the standard
getAddress requests. The trigger will prepare internal session values to
change the customer type so that the payment methods can update with
correct data.

The urls generated in this example very much follows the standards of
WordPress' permalinks, so if you can you would want to look for the
frontend variable set called **rbCustomerTypeData**. In our basic front
end we usually look up the customer type by what's entered in the
company name (in the billing forms). Like this:

```xml
rbCustomerTypeData['apiUrl'] + '&customerType=' + (rbIsCompany() ? 'LEGAL' : 'NATURAL'),
```
If you know how to set up frontend-hooks by binding html-elements you
can easily bind your own request like this:

```xml
// Code to bind a function, for example radio button triggers goes here.
//
// In your header with scripts or similar put up function like the one below.
// Just make sure you can access rbCustomerTypeData.
// The URL usually looks like this:
// /?resursbank=set-customer-type&customerType=NATURAL
// 
function customizedRbUpdateCustomerType(setCustomerTypeValue) {
    jQuery.ajax(
        {
            url: rbCustomerTypeData['apiUrl'] + '&customerType=' + (setCustomerTypeValue === 'LEGAL' ? 'LEGAL' : 'NATURAL'),
        }
    ).done(
        function (result) {
            // When the request is completed, retrigger wooCommerce checkout features with the internal trigger.
            if (typeof result === 'object' && result['update']) {
                jQuery('body').trigger('update_checkout');
            } else {
                alert("Unable to update customer type.");
            }
        }
    )
}
```
