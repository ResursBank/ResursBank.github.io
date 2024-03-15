---
layout: page
title: Magento Plugin 1.X - Changelog
nav_exclude: true
permalink: /platform-plugins/magento-modules/magento-plugin---oldflow-version/magento-plugin-1.x---changelog/
parent: Magento Modules
grand_parent: Platform Plugins
---



# Magento Plugin 1.x - Changelog 
Created by Thomas Tornevall, last modified by Tobias on 2016-07-15
# Changelog for Resurs Bank Magento plugin
Deprecated versions can be [viewed here](5014601)

**1.4.1 (Unreleased)**

| Internal issue ID | Description of what's fixed                                                                     | Magento Version (Default: All) |
|-------------------|-------------------------------------------------------------------------------------------------|--------------------------------|
| 57220             | Old forms when switching between payment methods are cleaned up as an extra precaution          |                                |
| 55645             | List of payment methods are now included in the "Save"-action (admin) instead of page reloading |                                |
| 46563             | Logotype images are replaced with new                                                           |                                |
| 58206             | Canceling payments sometimes interferes with other payment methods                              |                                |
| 62183             | Finalization with or without type INVOICE (has hotfix)                                          |                                |
| 60194             | When submitLimitApplication returns unexpected line breaks in address data, the JS fails        |                                |

**1.4.0 (Unreleased)**

| Internal issue ID | Description of what's fixed                                                                                                                                                       | Magento versions (Default all) |
|-------------------|-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|--------------------------------|
| 44045             | Streamline release (hiding fields that are not necessary, and should be inherited from Magento's own form fields)                                                                 |                                |
| 46599             | Information about changing the invoice sequence numbers added                                                                                                                     |                                |
| 44397             | Added row in admin that shows payment method thresholds (min - max)                                                                                                               |                                |
| 49811             | Payment method thresholds are not handled properly in checkout (exceeding min or max will hide method)                                                                            |                                |
| 47333             | getCostPopup in standardcheckout misbehaved and did not pop up properly. Fixed.                                                                                                   |                                |
| 47492             | Checkout problems for logged in users                                                                                                                                             |                                |
| 48000             | Too long article numbers shortened down to the database limit of max 100 characters, if length exceeded                                                                           |                                |
| 48025             | Fixed minor cosmetic defect for Magento 1.9                                                                                                                                       | 1.9                            |
| 49407             | LEGAL address-forcing is not handled properly in confirmation mail (firecheckout patch included)                                                                                  |                                |
| 49782             | Magento 1.9 still using a deprecated getCostPopup method                                                                                                                          | 1.9                            |
| 55041             | Conflicting jQuery, updated framework to comply with 1.9.1 and 1.9.2 requirements**Also \#54763**                                                                                 | 1.9.1                          |
| 55290             | Dynamic forms, issues with phone elements fixed                                                                                                                                   |                                |
| 50564             | Fix for undefined indexes in Block/Checkout (Only visible in development environments)                                                                                            |                                |
| 50036             | Environment variables RESURS_CLEAN_METHODS_CACHE and RESURS_CLEAN_METHODS_CACHE_EXTEND added (Also related to \#49811 and \#48959)**Also \#49949**                                |                                |
| 56088             | *Refactoring of form.phtml, scripts and dynamicForm. Stricter element checking on blurs, reload-issues and recapturing of entered values. Moving out functions out of controller* |                                |
| 56988             | MagentoFieldObject in MagentoResTransField is sometimes catching null. Now using typeof-checking.                                                                                 |                                |
| 55637             | Language updates                                                                                                                                                                  |                                |
| 55646             | Prepared package for Magento up to 1.9.2                                                                                                                                          |                                |
| 55775             | Loader lockups (Related to \#56088) - Primary errors caused when AJAX-calls are timing out.                                                                                       |                                |
| 55920             | The plugin now ignores company fields, due to elements sort order in checkouts                                                                                                    |                                |
| 46777             | Compatibility issues between different jQuery version (notice) - where prop and attr are acting different based on which version we are running                                   |                                |
| 57211             | Sometimes tax is rounded with decimals in a way that ecom does not accept (at least for .fi)                                                                                      |                                |
| 55746             | More elements to remember                                                                                                                                                         |                                |
| 57220             | Forms when switching between payment methods are not cleaned up anymore                                                                                                           |                                |

**[1.3.8.1](../../../../../attachments/3441500/4161554.zip)+1.3.8**

| Internal issue ID | Description of what's fixed                                                                                                                                | Magento versions (Default all) |
|-------------------|------------------------------------------------------------------------------------------------------------------------------------------------------------|--------------------------------|
| 46275             | URL to correct test-environement is finally fixed                                                                                                          |                                |
| 44698             | setInvoiceSequence-support added for finalizer, will set during "save"-click in admin                                                                      |                                |
| 46407             | Products that should be tax-free are not accepted by ecommerce due to null values                                                                          |                                |
| 44711             | jQuery v1.9 conficts with RB distributed jQuery v1.5 on Vanillacheckout                                                                                    |                                |
| 44976             | QuantityCounterBehaviour in extended handler for bundles differs to the simple handler**Also \#44692**                                                     |                                |
| 45039             | Corrected saltkey-generating in configcontroller (the order which the save-method is handling everything has been changed)                                 |                                |
| 44748             | Removed confusing payment method from error messages in admin-view (getPayment)                                                                            |                                |
| 44448             | "Read more" window opening has annoying behaviour. Fixed.                                                                                                  |                                |
| 44928             | ucwords() changed to strtoupper() for country codes set from submitlimitapplication. Some instances does not like the ucwords()-handler                    |                                |
| **1.3.8**         |                                                                                                                                                            |                                |
| 44509             | Strict validations, after-effects fixed (Undefined properties)**Also 44455 and 44493**                                                                     |                                |
| 44110             | Wrong error message started to show up on NO_DECISION and DENIED                                                                                           |                                |
| 44698             | setInvoiceSequence-support added for finalizer                                                                                                             |                                |
| 43777             | Changed magento order admin view to check used payment method against getPayment for an order instead of internal call, to avoid problems with the RB-view |                                |
| 44448             | Read more for payment methods now always calling the same window to keep it topmost                                                                        |                                |
| 44149             | Tax issues fixed from 1.3.5**Also \#44364**                                                                                                                |                                |
| 27148             | Magento orderadmin view adjustments**Also 27252, 43995 and 44657**                                                                                         |                                |

