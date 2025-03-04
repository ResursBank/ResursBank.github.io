---
layout: page
title: Oldflow Plugin - Coding Examples For Getaddress
nav_exclude: true
permalink: /platform-plugins/magento-modules/magento-plugin---oldflow-version/oldflow-plugin---coding-examples-for-getaddress/
parent: Magento Modules
grand_parent: Platform Plugins
---



# OldFlow Plugin - Coding examples for getAddress 

# Validation of Social Security Numbers (Personnummer)
*Example to enable getAddress to autofill address-forms in Firecheckout,
Onestepcheckout and Vanilla checkout (the standard checkout). This is
enabled from v1.2.9*

**Source code:**

**getAddress**
```xml
<?php if (!$this->isCustomerLoggedIn()) : ?>
      <p class="ssn-label">
          <?php echo $this->__('Verify your social security number') ?><br>
          <?php echo $this->__('SSN Format') ?>
      </p>
      <p class="ssn-input-controls">
          <input name="resurs-ssn" id="resurs-ssn" type="text" class="ssn-input-text" />
          <!-- Observe: getAddress is using "natural" as default -->
          <input name="resurs-ssn" id="resurs-ssn-button" type="button"  class="resurs-ssn-input-button" value="<?php echo $this->__('Get Address') ?>" onclick="getAddress('<?php echo $this->getUrl('resursbank/index/getAddress')?>','NATURAL','<?php echo $this->getSkinUrl('images/opc-ajax-loader.gif')?>')" />
      </p>
<div class="resurs-ssn-address-container" id="resurs-ssn-address-container"></div>
<?php endif; ?>
```

**Fire Checkout
(app/design/frontend/base/default/template/PATH-TO-FIRECHECKOUT-TEMPLATES/checkout/billing.phtml):**

Around line 96, just above the li-tag for "billing-new-address-form".

**OneStep Checkout
(app/design/frontend/base/default/template/PATH-TO-ONESTEPCHECKOUT-TEMPLATES/checkout.phtml):**

Around line 53, just after the first p-tag for "onestepcheckout-numbers
onestepcheckout-numbers"

**Vanilla Checkout
(**app/design/frontend/base/default/template/persistent/checkout/onepage/billing.phtml
and/or **app/design/frontend/base/default/template/checkout/onepage/billing.phtml)**

Around line 39, just after the first endif tag (above li for
"billing-new-address-form")

For Magento 1.9 you may also want to look
at app/design/frontend/rwd/default/template/persistent/checkout/onepage/billing.phtml,
in case of different templates.

**Notes:**

Address lookups is set to NATURAL (private customer) in this code
example, since "Company" is normally not filled when entering the
checkout. To make getAddress use of company-lookup (LEGAL) instead of
private, the company field has to be filled in before doing the
getAddress-call. In that case, getAddress will automatically switch to
LEGAL.

