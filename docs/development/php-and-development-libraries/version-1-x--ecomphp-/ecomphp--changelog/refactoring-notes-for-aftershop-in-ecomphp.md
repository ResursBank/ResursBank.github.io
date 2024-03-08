---
layout: page
title: Refactoring Notes For Aftershop In Ecomphp
permalink: /development/php-and-development-libraries/version-1-x--ecomphp-/ecomphp--changelog/refactoring-notes-for-aftershop-in-ecomphp/
parent: Php And Development Libraries
grand_parent: Development
---



# Refactoring Notes for AfterShop in EComPHP 
Created by Thomas Tornevall, last modified on 2017-09-21
There is currently a plan of refactor EComPHP regarding to how it
handles the AfterShop flow today. This page is a bunch of notes, that
documents the old behaviour and the upcoming solution for a new flow.

- [Developer
  notes](#refactoringnotesforaftershopinecomphp-developernotes)
- [Things that happened during the finalization flow in EComPHP \<
  1.1.22:](#refactoringnotesforaftershopinecomphp-thingsthathappenedduringthefinalizationflowinecomphp%3C1.1.22:)
- [Things that happens during the renderPaymentSpecContainer()
  \[deprecation\] in a
  finalization](#refactoringnotesforaftershopinecomphp-thingsthathappensduringtherenderpaymentspeccontainer()%5Bdeprecation%5Dinafinalization)
- [Methods for new
  release](#refactoringnotesforaftershopinecomphp-methodsfornewrelease)
  - [sanitizeAfterShopSpec()](#refactoringnotesforaftershopinecomphp-sanitizeaftershopspec())
    - [FINALIZE](#refactoringnotesforaftershopinecomphp-finalize)
    - [CREDIT](#refactoringnotesforaftershopinecomphp-credit)
    - [ANNUL](#refactoringnotesforaftershopinecomphp-annul)
    - [UPDATE
      (OBSOLETE)](#refactoringnotesforaftershopinecomphp-update(obsolete))

## Developer notes
- None of the renderers are supporting the fact that not only artNo may
  differ. If there's more identical artNo with different
  description/price, they might be handled equally - so there might
  occur corner cases that are not handled by this engine.  
  This is normally not an issue as long as the renderers does not take
  care of very specific attributes.
- The behaviour of the getPaymentSpecByStatus should reflect what has
  once been created, so identical articles should not be a problem since
  they are keyed on artNo, description, price at Resurs Bank
- The magento plugin behaviour uses the methods that is about to get
  deprecated, so the old methods will probably be untouched until we
  reach at least v1.2

  ```xml
  if (!$connection->creditPayment($reference, $this->getCreditMemoItems($subject), array(), false, true)) {}
  ```
- The easiest way to do future afterShop is to use the same method as
  the additionalDebitOfPayment is using, by simply adding the product
  rows into the internal payload.  
  *This method should however support the prior payload system that sets
  a manual payload. By doing this, we could also add custom objects into
  the aftershop method.*

## Things that happened during the finalization flow in EComPHP \< 1.1.22:
1.  Adds metadata to the current order, that gets reflected to the
    invoice (CustomerId)
2.  The inbound orderLine-array validates to match an array when only
    one article is sent inbound (and in the wrong way)
3.  The payment id requested to finalize is fetched from Resurs
4.  The payment specification from the client gets rendered, based on
    the fetched payment \[**Why?**\]  
    ***PARAMS( \$paymentId, ResursAfterShopRenderTypes::FINALIZE,
    \$paymentArray, \$clientPaymentSpec, \$finalizeParams,
    \$quantityMatch, \$useSpecifiedQuantity )***  
    renderPaymentSpecContainer() - What does this do? See below in the 

5.  The new rendered payment container are posted to the
    finalizePayment-service during a try-catch moment

##  Things that happens during the renderPaymentSpecContainer() \[deprecation\] in a finalization
**Parameters received**

*( \$paymentId, ResursAfterShopRenderTypes::FINALIZE, \$paymentArray,
\$clientPaymentSpec, \$finalizeParams, \$quantityMatch,
\$useSpecifiedQuantity );*

- - The payment id
  - The type that should be rendered
  - The customer client payment request
  - *Finalizing parameters*
  - *QuantityMatchSetup*
  - *SpecifiedQuantitySetup*

**Old behaviour**

The renderer should not only render a correct payment specification.

1.  Function is initialized with a specline render (renderSpecLine) for
    the original payment spec.  
    The specline renderer do the exact same as getPaymentSpecByStatus,
    except for that it also sanitiezes orderlines based on their
    statuses.  
    **Example**: *On finalizations, order rows that is not annulled or
    credited should be included in the payment spec. On annullments,
    rows that is not debited nor credited should be included.*
2.  Once finished with the primary renderer, the payment spec requested
    should be validated so that each row really exists in the
    specification.  
    A lot of logic are now calculated depending on prices, amounts and
    quantity that is probably not needed in this form.
3.  A new totalAmount+totalVatAmount are now recalculated and store in
    the new "compiled" payment spec
4.  If the payment method is based on invoicing, further data are now
    included in the final payment specifcation:  
    ***createdBy, orderDate, invoiceDate, invoiceId (if not exists,
    create one by getNextInvoiceNumber())***  
    **Note**: ourReference, yourReference, preferredTransactionId,
    orderId was *never included* in the first version.
##  Methods for new release
###  sanitizeAfterShopSpec()
This sanitizing function should, at least for unmanaged payment specs
(full handling), make sure that each orderLine-bulk are clean.
Sanitizing works much like getPaymentSpecByStatus(). However, this
function should match a payment and filter out a specific set of
orderLines. For example - for finalization, there's only one valid list
of orderLines, and therefore each AUTHORIZE should be matched against
what's in the other status blocks (DEBIT, ANNUL, CREDIT) - and if they
do exist there in those blocks, they should not be added into the final
reutning AUTHORIZE block - so that only AUTHORIZE-only-rows remain.

#### FINALIZE
**Read from block**

**AUTHORIZE**

**Sanitize**

**DEBIT**, **ANNUL**, **CREDIT** (Everything in the AUTHORIZE list, that
is not yet in DEBIT, ANNUL, CREDIT)

#### CREDIT
**Read from block**

**DEBIT**

**Sanitize**

**ANNUL**, **CREDIT** (Everything in the DEBIT list, that is not yet
ANNUL, CREDIT)

#### ANNUL
**Read from block**

**AUTHORIZE**

**Sanitize**

**DEBIT**, **ANNUL**, **CREDIT** (Everything that is not yet DEBIT,
ANNUL, CREDIT

#### ~~UPDATE (OBSOLETE)~~
*Returns AUTHORIZE (is still even active?)*

