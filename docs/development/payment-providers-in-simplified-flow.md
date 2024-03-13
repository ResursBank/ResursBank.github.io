---
layout: page
title: Payment Providers In Simplified Flow
permalink: /development/payment-providers-in-simplified-flow/
parent: Development
---


# Payment providers in simplified flow 
## Field validation with PAYMENT_PROVIDER
In normal cases, for Resurs "internal" payment methods, fields that is
shown in the store during the checkout process should be validated
against [our regular expression
schemes](/development/customer-data---regular-expressions/). However, there is a
condition for payment methods with the type PAYMENT_PROVIDER (PSP) that
does not need such validation: government id/SSN. Since PSP redirects
customers to external partners the government id does not need to
forward those fields. As of EComPHP (example) v1.3.12 this behaviour is
supported by either sending an empty string (or null) as government id -
or a normal value. Both will be properly treated: If it is empty, the
variable will be removed from the payload. If not, it will be passed
through (even if it might not be handled by any partner).

Our WooCommerce plugin uses a (deprecated) method to load and show
necessary customer fields that validates both "internal" payment methods
and external PSP methods. However, it is only PSP that allows empty
variables. This has been solved with a method
called getCanSkipGovernmentIdValidation:

```xml
if ($fieldName == 'applicant-government-id' && empty($_REQUEST[$fieldName]) && $flow->getCanSkipGovernmentIdValidation()) {
 continue;
}
```
If the boolean of this method is true, the module knows it doesn't have
to validate the content of the field, so it can be skipped. By doing
this, the module does not need to be rewritten due to the structure
changes (even if there are plans of making those parts independent).

