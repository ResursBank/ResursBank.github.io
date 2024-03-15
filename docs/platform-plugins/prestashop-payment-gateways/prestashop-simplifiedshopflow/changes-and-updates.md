---
layout: page
title: Prestashop Simplified- Changes And Updates
permalink: /platform-plugins/prestashop-payment-gateways/prestashop-simplifiedshopflow/77365438/
parent: Prestashop Simplifiedshopflow
grand_parent: Prestashop Payment Gateways
---

# PrestaShop Simplified: Changes and updates 

## About the RCO module
The prior module that handled Resurs Checkout will over time be replaced
with this new module and is therefore no longer maintained the same way
it has been. There's a few things to think of if you plan to upgrade in
the future.

### Will government ID's be stored in the new module the way it was handled in the old module?
***Yes, but there are changes in the prior behaviour.***

According to
[![](https://resursbankplugins.atlassian.net/rest/api/2/universal_avatar/view/type/issuetype/avatar/10318?size=medium)P17-169](https://resursbankplugins.atlassian.net/browse/P17-169?src=confmacro) -
Hantering av personnummer (möjlighet att fånga dessa med en hook för
försäkringsbolag) Done , the same hook that handled the ability to store
government id's in the platform is still there. It is mostly - as in the
old version - not supported more than by an execution. The hook trigger
itself looks like this and can be found in the rco-module too, the same
way:

```xml
                    Hook::exec(
                        'UpdateResursSsn',
                        [
                            'order' => $order,
                            'vat_number' => $currentResursPayment->customer->governmentId,
                        ]
                    );
```
In the simplified module, this trigger can be triggered multiple times,
depending on the "way in". The trigger itself is placed in one method
that has always a guarantee to run - getSynchronizedAddress(). This
method is called from the moment when bookPayment gets "BOOKED" as
response from Resurs and the moment after bookSignedPayment has been
running. If both events happens to occur, there will also be two calls
to the hook.

Note: Auto debited and finalized orders are only handled on the
UPDATE-callback since there is high risk of race conditions when several
callbacks are sent simultaneously and there's currently no solution for
handle them in order (queue by cron for example), since this method is
more or less a non-standard solution.

