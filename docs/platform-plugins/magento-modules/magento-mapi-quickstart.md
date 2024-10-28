---
layout: page
title: Magento 2 for MAPI QuickStart
permalink: /platform-plugins/magento-modules/magento-mapi-quickstart/
nav_order: 11
parent: Magento Modules
grand_parent: Platform Plugins
---

# Resurs Bank - Magento 2 module for MAPI integration

This module integrates MAPI (**M**erchant **API**) with Magento 2. It use the
**Ecom** library (https://bitbucket.org/resursbankplugins/ecom2/) for this.

This document describes how to install and configure the module, and various
features made available by the module.

## Installation

You can use Magento MarketPlace to simplify installation. Doing so will
effectively do the same thing as installing the *resursbank/magento-all*
package using *Composer*:

```bash
composer require resursbank/magento-all
```

Which will install all Resurs Bank modules and their dependencies. This may
include packages containing features/API integrations you may not need. If you
only need the MAPI module, you can install it separately using *Composer*:

```bash
composer require resursbank/magento-mapi
```

The command above will install only the MAPI module and its dependencies:

* `resursbank/ecom`
* `resursbank/magento-mapi`
* `resursbank/magento-core`
* `resursbank/magento-ordermanagement`

Please note that you may also wish to install the
`resursbank/magento-partpayment` package if you wish to display the part
payment widget on your product pages. This widget is covered briefly below
as it has its own documentation.

## Configuration

Once installed you will need to enter your API credentials and select a *Store*
to use with the module. You can do this by navigating to the *Resurs Bank*
Payment Method configuration page in the Magento Admin Panel:

1. Navigate to *Stores* > *Configuration* > *Sales* > *Payment Methods*.
2. Click on the *Resurs Bank* tab to expand it.
3. Click on the *Resurs Bank API* tab to expand it.

Please configure the following:

* Checkout Type: Select **MAPI**
* Environment: Select **Production** or **Test**, depending on whether this is
  a production or test environment.
* Client ID: Enter your Resurs Bank *API Client ID*.
* Client Secret: Enter your Resurs Bank *API Client Secret*.

![Resurs Bank](Documentation/1.png)

**Note: you use different accounts for production and test environments. Never
use your production credentials in a test environment.**

Now click on the **Fetch stores** button to fetch the *stores* available on your
API account. These will be added to the select-box just below the button. Select
the store you wish to use with the module.

**Note: store in this context refers to stores configured on your API account
at Resurs Bank, it has nothing to do with the *Stores* in Magento.**

Click the **Save Config** button at the top of the page to save your settings.
You should now take a moment to validate your configuration:

### Confirm that payment methods are resolved

The list displaying payment methods available for your API account and Store
should now be populated.

![Resurs Bank](Documentation/2.png)

Note that the content of this list is individual to your API account and Store.

### Confirm callbacks work

*Callbacks* are used to notify your Magento store of changes to the payment at
Resurs Bank. This is important for updating the order status in Magento when
the payment status changes at Resurs Bank.

The configuration includes the capability to test that these callbacks can reach
your Magento store. Firstly, you must a **Store View** to operate under:

![Resurs Bank](Documentation/3.png)

This is because a Magento installation *may* consist of multiple *Store Views*,
each with its own URL (https://eacmple.org.se/ for one store view, and
https://example.org.no/ for another).

In order for us to know which URL to use for the callback, you must select to
view the configuration in the context of a specific *Store View*.

Having done this, click on the **Perform Test** button in the
**Callback Settings** section as shown below.

![Resurs Bank](Documentation/4.png)

We've blurred the URL in the screenshot above, but you should see the URL of
your Magento store listed above. The outcome of the last test callback is listed
directly below the button.

Please note that this module will only make use of the **Authorization**
callbacks. These are sent during the checkout process when an order is created.

**Management** callbacks are sent to you when specific events occur on a payment
at Resurs Bank. Such as the payment being debited. We do not implement these
callbacks in this module because it's difficult to generalize the handling of
them in the context of Magento.

However, should you have any special needs (such as an *ERP* system or likewise
that needs notifying of these events), you can implement this yourself by
looking at our implementation of the **Authorization** callbacks, and referring
to the **Ecom** library (our library for API communication) documentation.

### Additional API settings

You will also find the following settings in the **Resurs Bank API** section:

* Swish maximum order total: The maximum order total for which Swish is
  available as a payment method.
* Order management: Enable / disable API calls to Resurs Bank when invoices, etc.
  are created in Magento. *Order management* capabilities will be covered in a separate section below.
* Automatically create invoices: Automatically create an invoice in Magento for
  orders paid using direct payment methods (such as card payments or Swish).

## Part payment widget

Requires the composer package `resursbank/magento-partpayment`

This widget will be displayed on your product pages to give customers an idea of
what the monthly cost would be if they choose to pay using a part payment
based method.

![Resurs Bank](Documentation/5.png)

The calculation of the monthly cost is based on a pre-configured *Payment Method*
and *Period* in the admin panel.

![Resurs Bank](Documentation/6.png)

The **Limit** should not be set below 150 (SEK, NOK, DKK) and 15 EUR in Finland.
This is the minimum monthly instalment payment limit set by Resurs.

**Please note that this example renders the widget for a Swedish API account.
Hence the currency is SEK.**

The price calculated in the widget changes on the fly as the customer selects
potential options for the product or change the quantity.

Clicking the **Read More** link at the bottom of the widget content will display
a modal with more information about the payment method in context to configured
product price.

![Resurs Bank](Documentation/7.png)

## Order placement

When a customer proceeds to checkout they will have the option to fetch their
address information using their social security number (or organization number
for companies).

![Resurs Bank](Documentation/8.png)

In the next step they will select their desired method of payment and place the
order.

![Resurs Bank](Documentation/9.png)

This will redirect them to the gateway, where they will complete the payment.

![Resurs Bank](Documentation/10.png)

Depending on the outcome of the payment the customer will now be redirected to
one of three potential places in Magento:

1. The payment succeeded and the customer is redirected to the order success
   page.
2. The payment failed and the customer is redirected back to the checkout page,
   an error message is displayed, and their cart is rebuilt, so they can try a different payment method.
3. There is an error while attempting to rebuild the customers shopping cart in Magento. In this case the customer is redirected to the order failure page.

## Order management

When visiting the order view page in Magento you will see an information widget
at the top of the page, containing a brief summary of the payment in its current
state at Resurs Bank.

The same widget will be displayed on other relevant pages, such as various
invoice and creditmemo pages.

![Resurs Bank](Documentation/11.png)

### Capturing a payment

This is the action of capturing the payment from the customer. This is done when
the invoice (receipt) is created in Magento.

![Resurs Bank](Documentation/12.png)

You can perform several captures, if you wish to only debit a few items at a
time.

If you wish to avoid the API call for any reason (for example the API might be
temporarily offline), you can capture the payment offline. This means the
receipt is created in Magento, but no API call is made to Resurs Bank. You can
later capture the payment manually at Resurs Bank through **Merchant Portal**.

![Resurs Bank](Documentation/13.png)

### Refunding a payment

Creating a **creditmemo** in Magento will likewise refund the payment at Resurs
Bank. As with capture, you can choose to only refund a part of the invoice.

![Resurs Bank](Documentation/14.png)

Again, as with capture, you can choose to refund the payment offline.

![Resurs Bank](Documentation/15.png)

### Canceling a payment

Clicking the **Cancel** button on an order will cancel the payment at Resurs
Bank in its entirety.

![Resurs Bank](Documentation/16.png)


### Order management settings

Finally, you can choose to enable or disable the order management features in
the **Resurs Bank API** section of the configuration.

The module will create an invoice in Magento for all Direct debit payment
methods (Swish, Trustly, Vipps).

![Resurs Bank](Documentation/17.png)

## Payment history

At the bottom of the order view page we've added a **Payment History* button.

![Resurs Bank](Documentation/18.png)

Clicking this button will open a modal, showing actions taken on the order in
relation to the payment at Resurs Bank.

![Resurs Bank](Documentation/19.png)

Please note that order **state** and **status** is only manipulated by us during
the order creation. Once the checkout process has been completed we never alter
these values directly.

## Troubleshooting

While we strive to make the module as robust as possible a conflict with another
module, misconfiguration of ours, or a custom modification on your end may cause
issues. Since Magento is a modular system you wil probably have the most luck
by letting your own developer research a problem before contacting us.

First make sure that **logging** is enabled and that the loglevel is set to
**error** or higher, **debug** being the most verbose.

![Resurs Bank](Documentation/20.png)

All logs in `var/log` prefixed with `resursbank_` are related to our modules.
The Ecom library has its very own logfiles, stored in `var/log/resursbank`.

Keep an eye on the logfiles are you recreate your issue. If you can't find the
issue in the logs and/or believe it to be a malfunction in our module, please
contact us, and please include the information listed in the **About** section
to help us speed up the process of resolving the issue.

![Resurs Bank](Documentation/21.png)

You can also choose to **enable developers mode** to enable xDebug for incoming
requests from the API, such as callbacks. **Never enable this in production
environments**.

![Resurs Bank](Documentation/22.png)

## Advanced settings

This section briefly covers some optional settings you can utilise.

![Resurs Bank](Documentation/23.png)

### Delete aborted orders

When a customer performs a purchase the **order** is created within Magento
*before* the customer is sent to the gateway to complete the payment. If the
customer cancels the payment at the gateway, or if the payment fails, the order
is left in Magento.

By applying this setting you can choose to delete these orders automatically,
avoiding unnecessary clutter in the order list.

### Clean up pending orders

This controls whether you wish to delete orders left as **pending** at regular
intervals.

### Clean up frequency

This setting controls how often the cleanup process should run.

### Start time for cleanup

This setting controls when the cleanup process should run.

### Minimum order age in hours

This setting controls how old an order must be before it is considered for
cleanup.

## Cache

The module adds a custom cache option which governs everything that is
specifically cached through our module.
