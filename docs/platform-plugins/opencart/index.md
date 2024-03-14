---
layout: page
title: Opencart
permalink: /platform-plugins/opencart/
parent: Platform Plugins
has_children: true
---



# OpenCart 

## Requirements
- Working with localhost/127.0.0.1 or any local IP while testing will
  not work as Resurs Bank needs to be able to contact your OpenCart
  installation.
- You need an account with configured payment methods from Resurs Bank.
- The currency must match for current country, so for Sweden you must
  use SEK to enable the payment method in the cart. I.E. make sure that
  EUR is properly configured for the final order sum.
- SoapClient and curl must be installed on your server (i.e. ext-soap
  and ext-curl, etc).
- Your site has to be SSL/HTTPS ready.
- You need to have a valid SSL certificate for your OpenCart
  installation.

## Support & Help
- Plugin intended to work with both Opencart 2.3+ and 3.x.
- Do not forget to configure the plugin with credentials, language and
  order statuses for callbacks.
- To activate the checkout, follow the instructions below - by editing
  necessary templates.
- The plugin are always shown as "disabled" in the admin panel,
  regardless of activation. This is cause by the way the checkout is
  implemented.

## Installation
### Downloading
The git repo used is [located
here](https://bitbucket.org/resursbankplugins/resurs-checkout-opencart2/).
You can either clone the repository, checkout a specific tag or simply
download a specific version. Downloading specific versions [can be done
from this
location](https://bitbucket.org/resursbankplugins/resurs-checkout-opencart2/downloads/?tab=tags) where
the latest tag should be considered the latest stable.

### Default method
1.  Place all of the files from the upload folder in it's correct
    folders of your opencart installation.
2.  Log into your admin panel and go to Extensions and then enable the
    Resurs Checkout payment extension. Note: The section in the admin
    panel may look disabled, even though it is not.
3.  Edit Resurs Checkout and fill in your environment (test or
    production).
4.  Add yours credentials. Because Opencart plugin supports different
    credentials based on the language selected you need to add the
    language.
5.  Click on the button "Update callbacks". This will then also list
    your registered callbacks for you to double check.
6.  Add the different statuses that the order should be placed in
    depending on events from Resurs Bank.
7.  When you hit Save everything should be setup for you and you could
    go to
    yoursite.test/index.php?route=extension/payment/resurs_checkout_checkout
### Upgrading using default method
1.  Like the first step, replace the files that you copied from the
    upload-folder the first time, with the new files.
2.  For the system library files, you can replace "resurs-ecomphp"
    entirely with the new files from the upload directory.
### Installing and/or upgrading using developer mindset
1.  Place the repository in a separate folder. Make sure that your
    webserver can reach the files.
2.  Run the symlink.sh-script, using first parameter as your site root
    (i.e. path to your siteroot path).
3.  When you need to upgrade the plugin, you only have to replace the
    files in the "repository folder" (or do a git pull).
4.  Follow the regular instructions above to continue installing the
    plugin.

------------------------------------------------------------------------
## Payment method administration
- Install the plugin.

- Setup what status that should be matched when an action occurs.

- Select the country you have an account for and enter the username and
  password.

- If you enter a correct username and password, payment methods should
  be loaded and shown as inactive payment methods.

- Enable the ones you want to be used. If you want to use a custom
  payment method text in the checkout, fill in "Custom name to be
  displayed as PaymentMethodName".

- A default image will be shown even if you don't enter any image URL.
  If you want to use a custom image, fill in the whole URL in the "Image
  url" and set the image size in "image width" and "image height".

- After you done this, go to order totals to fill in what you want to
  charge for the payment method.

- Set the sorting order of the Payment Method Resurs Bank, this will
  only sort them among the other payment methods, all the payment
  methods from Resurs Bank will come after each other and be sorted by
  the ID given from Resurs Bank in ascending order.

- Enable the Resurs Bank OpenCart-plugin by setting it to "Enable" and
  you should now see the payment methods in your shop's checkout phase.

## Order Totals Admin - Resurs Bank Fee
- If you have correctly set up the "Payment method administration" there
  should be payment methods showing.

- Fill in how much you should charge for the payment method without any
  TAX, and select the corresponding TAX Class.

- Under "Invoice Line", fill in both what should be shown on the Invoice
  and on the Check Out line.

## Sales Order
You can view the Resurs Bank payment flow for an order under history.
## Get Address
Instructions about our getAdress-functionality is located in the
getAddress folder, both how to enable it manually and how to enable it
with VQmod. Only Sweden is supported.
## Log
The Resurs Bank OpenCart-plugin logs to "System-\>Error Loggs"
## Not supported
- Multi store support for different countries

------------------------------------------------------------------------
### Changing default checkout to Resurs Checkout
In some installations you have to change the urls to Resurs Checkout
manually. Files you want to change is listed below.

#### catalog/controller/common/cart.php
##### Change
```xml
    $data['checkout'] = $this->url->link('checkout/checkout', '', true); 
```
##### To
```xml
    $data['checkout'] = $this->url->link('extension/payment/resurs_checkout', '', true); 
```
    catalog/controller/common/header.php
##### Change
```xml
    $data['checkout'] = $this->url->link('checkout/checkout', '', true); 
```
    To
```xml
    $data['checkout'] = $this->url->link('extension/payment/resurs_checkout', '', true); 
```
    catalog/controller/checkout/checkout.php
##### Change
```xml
    $data['breadcrumbs'][] = array(
        'text' => $this->language->get('heading_title'),
        'href' => $this->url->link('checkout/checkout', '', true)
    ); 
```
    To
```xml
    $data['breadcrumbs'][] = array(
        'text' => $this->language->get('heading_title'),
        'href' => $this->url->link('extension/payment/resurs_checkout', '', true)
    ); 
```
#### catalog/controller/checkout/cart.php
##### Change
```xml
    $data['checkout'] = $this->url->link('checkout/checkout', '', true); 
```
##### To
```xml
    $data['checkout'] = $this->url->link('extension/payment/resurs_checkout', '', true); 
```
    Installation of Partial Payments
The partial payments ("Pay X/month") has it's functionality in a
different controller. You need to add the controller
resurs-checkout-opencart/catalog/controller/product/resurs_partial_payment.php
from this repository and also add the view
resurs-checkout-opencart/catalog/view/theme/default/template/product/resurs_partial_payment.tpl
to the correct locations on your website.

After you have added these files and activated partial payments in the
admin area everything should be installed. What you now need is a
snippet to place on the product details view where you want the partial
payments to show. The snippet should be added somewhere in
catalog/view/theme/default/product/prodcut.tpl on your website (where
you want it to be shown).

The snippet is:

```xml
<?php if ($resurs_partial_payment) { ?>
  <li><?php echo $resurs_partial_payment; ?></li>
<?php } ?>
```

And we need to make the \$resurs_partial_payment variable available on
the product page so on the products controller
(catalog/controller/product/product.php) you need to load in the partial
payments controller as a data variable so it is available on the view
(approx. line 475 in version 2.3.0.1).

```xml
$data['resurs_partial_payment'] = $this->load->controller('product/resurs_partial_payment');
```

*That should be it.*

### Usage
Go to the Resurs Checkout by going
to [`www.example.com/extension/payments/resurs_checkout`](http://www.example.com/extension/payments/resurs_checkout) or [`www.example.com/index.php?route=extension/payment/resurs_checkout`](http://www.example.com/index.php?route=extension/payment/resurs_checkout) depending
on what type of Url structure is set up. This is the checkout that you
should link all of your links like "Proceed to checkout". Important to
notice is that you can't add shipping, gift cards or update your cart on
the checkout page. This should be done on the cart page as a two-step
checkout process.

### Adding shipping, gift cards etc on the checkout page
Natively the plugin do not let you change anything about your order
while on the checkout page. This page only shows an order summary and
adds the Resurs Checkout iframe to capture the payment. If you want to
add support for shipping method or other things that will affect the
price you can make use of the function `updateCheckout` that is located
in `upload\catalog\controller\extension\payment\resurs_checkout.php`. By
calling this method with the `reference` that you have access to
as `$reference` in `upload\catalog\view\theme\default\template\extension\resurs_checkout.tpl|twig` it
will update the iframe to use the new price.

### Giftvoucher
In your stores settings under the tab "Alterative" there is a section
where you can select what status(es) an order has to be before the
giftvoucher is valid. This means that the giftcard will not be valid
until the order that purchased the giftcard is set to this status. For
example the order may need to have status "Complete" before the giftcard
will be valid. Once the order (giftcard) is valid you need to send out
the email to the recipient of the giftcard. You do that within Gift
Vouchers -\> click to edit the voucher -\> top-right corner is a "Send
Email" button. Now the recipient of the gift voucher has received an
email containing the giftvoucher code and the order that purchased the
voucher is completed. This means that the user can now use the voucher
in the checkout.

