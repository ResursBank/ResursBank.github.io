---
layout: page
title: WooCommerce Observations
permalink: /platform-plugins/woocommerce/woocommerce-observations
parent: Full Documentation
grand_parent: Platform Plugins
nav_order: 99
has_children: false
has_toc: false
---

# WooCommerce Observations

This document lies outside the ordinary support scope and is only used for "observations" that has been done, when we
don't use WooCommerce as intended.

In short: Developers sometimes meets unexpected behaviour due to the very much development testing in a platform. This
document is made for this kind of information.

---

## Legacy checkout with company field vs Checkout Blocks

Running WooCommerce with both legacy and blocks as checkout normally works quite fine. It is however never recommended using direct links to blocks if you use legacy, or vice versa. As you select the page template in the wp-admin console (advanced tab under WooCommerce settings), WooCommerce tracks which checkout page is set to be active. Bypassing this may lead to unexpected behaviour, even though Resurs’ own plugin works with this setup too. You should however avoid this, as other plugins may not behave correctly.

If you like to switch often between legacy and blocks (mostly to maintain compatibility for the plugin), you'll notice that the checkout fields may act strange. For example: disabling the "Company" field in the Blocks checkout editor will also remove the "Company" field from the legacy "hardcoded" templates. As most of the customer input fields are dynamically rendered, the block checkout will have priority over the legacy content too.

According to deeper investigation, this is **not** a bug, but expected behaviour introduced in WooCommerce 9.6 (January 2025).

> It’s not a bug – it’s the new logic introduced with WooCommerce 9.6 in January 2025. Since that version, all visibility and required-state settings for the “Company name” field are stored as global field entities. The same flag is used across the Block checkout, the old shortcode-based checkout, the My Account address section, and the Store API.

**Testcase:** WordPress 6.8.1, WooCommerce 8.2.2 → upgraded to WooCommerce 9.8.4

**Scenario:**
Legacy checkout active via `[woocommerce_checkout]`. WooCommerce upgraded to 9.8.4.

At this point, even reinstalling templates or running WooCommerce’s onboarding will not auto-replace the legacy checkout page. The shortcode will remain until manually removed.

However, if both legacy and blocks are accessible, and you disable the "Company" field from the block-based editor, it will also disable it for legacy. So if you're testing company-based purchases, make sure this field is enabled in Blocks – or it won’t show anywhere.

**Explanation:**
The visibility of the "Company" field is controlled by the global setting `woocommerce_checkout_company`. Both block and legacy checkouts share this configuration.

**Conclusion:**
This is not a bug – it’s by design. Avoid mixing legacy and blocks unless you explicitly manage shared options.

**Reference:** [WooCommerce Docs – Checkout Blocks](https://woocommerce.com/document/using-the-new-block-based-checkout/)

*Note: Upgrading WooCommerce does not automatically activate Checkout Blocks. You must insert the new block manually.*
