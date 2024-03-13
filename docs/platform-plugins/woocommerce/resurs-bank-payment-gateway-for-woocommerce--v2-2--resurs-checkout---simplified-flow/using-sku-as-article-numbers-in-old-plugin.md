---
layout: page
title: Using Sku As Article Numbers In Old Plugin
permalink: /platform-plugins/woocommerce/resurs-bank-payment-gateway-for-woocommerce--v2-2--resurs-checkout---simplified-flow/using-sku-as-article-numbers-in-old-plugin/
parent: Woocommerce
grand_parent: Platform Plugins
---



# Using sku as article numbers in old plugin 
Created by Thomas Tornevall, last modified on 2023-09-13
The old module once **had** support for sku-values as articlenumbers on
order rows, but has since the evolving of our plugins been removed from
the configuration panel due to decisions. The old plugin is currently
explicitly using id/permalinks for the order rows instead. At the time,
this was more safe than the opposite option as sku's very often was
missing from old products.

However, the ability to use woocommerce sku-id's instead of post-id
(when they exist) is still available in the plugin, but not as an active
configurable setting. SInce it is not included in the configuration
array anymore, you are therefore also unable to override it normally.
The setting itself will (when enabled) is actively using the sku instead
of the regular id, and fail over to the regular id if sku is not set -
if you still manage to enable the setting.

Yes. There is a solution.

## Temporary override sku feature plugin
Create a file in your plugin directory (**/wp-content/plugins**) in your
platform, for example named resurs-force-sku.php - the file should
contain the code below.

Save it and activate it as a standalone plugin in your store.

To remove and disable this feature (as it also saves the value
**useSku** in the database), disable this plugin from your plugin
manager. Then go to the Resurs Bank-tabs and save the configuration
again.

**resurs-force-sku.php**
```xml
<?php
/**
 * Plugin Name: Force sku usage for resurs-bank-payment-gateway-for-woocommerce (v2.2.105 and above)
 * Description: Restores the usage of sku names in orders.
 * Version: 1.0.0
 * Author:
 */
  add_action('plugins_loaded', function () {
    add_filter('resurs_bank_form_fields', function ($formFields, $sectionName) {
        if (
            (preg_match('/resurs_bank/i', $sectionName) || $sectionName === 'defaults') &&
            !isset($formFields['useSku'])
        ) {
            $ns = 'woocommerce_resurs-bank_settings';
            // Validate prior options in case useSku has been saved as disabled.
            $optionCheck = get_option($ns);
            if (isset($optionCheck['useSku']) && $optionCheck['useSku'] === 'no') {
                $optionCheck['useSku'] = 'yes';
                // Update the options if that's the case.
                update_option($ns, $optionCheck);
            }
            // Return useSku to the plugin as if it was still configurable, to convince
            // woocommece to bring it to storefront.
            $formFields['useSku'] = [
                'id' => 'useSku',
                'title' => __(
                    'Use sku instead of id, when available',
                    'resurs-bank-payment-gateway-for-woocommerce'
                ),
                'type' => 'checkbox',
                'default' => 'yes',
                'description' => __(
                    'Enforcing sku as artno instead of id, when it is available.',
                    'resurs-bank-payment-gateway-for-woocommerce'
                ),
            ];
        }
        return $formFields;
    }, 11, 2);
});
```
