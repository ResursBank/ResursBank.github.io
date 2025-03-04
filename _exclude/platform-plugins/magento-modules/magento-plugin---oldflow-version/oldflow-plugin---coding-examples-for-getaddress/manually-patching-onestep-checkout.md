---
layout: page
title: Manually Patching Onestep Checkout
nav_exclude: true
permalink: /platform-plugins/magento-modules/magento-plugin---oldflow-version/oldflow-plugin---coding-examples-for-getaddress/manually-patching-onestep-checkout/
parent: Magento Modules
grand_parent: Platform Plugins
---



# Manually patching Onestep checkout 

1.  In
    app/design/frontend/base/default/template/onestepcheckout/checkout.phtml, Look
    around line 181, After ...  

    **Payment method errors**
    ```xml
                <?php if(isset($this->formErrors['payment_method']) && $this->formErrors['payment_method']): ?>
                    <div class="onestepcheckout-error onestepcheckout-payment-method-error">
                        <?php echo $this->__('Please choose a payment method.'); ?>
                    </div>
                <?php else: ?>
    ```

    **Replace this code**
    ```xml
                    <?php if(isset($this->formErrors['payment_method_error'])): ?>
                        <div class="onestepcheckout-error onestepcheckout-payment-method-error">
                            <?php echo $this->__('Please enter valid details below.'); ?>
                        </div>
                    <?php endif; ?>
    ```

    **... with this code ...**
    ```xml
                        <!-- Begin display Resursbank Error -->
                       <?php if(isset($this->formErrors['payment_method_error']) && !empty($this->formErrors['resursbank_error'])): ?>
                            <div class="onestepcheckout-error onestepcheckout-payment-method-error">
                                <?php echo $this->formErrors['resursbank_error'];?>
                            </div>
                        <?php elseif(isset($this->formErrors['payment_method_error'])): ?>
                            <div class="onestepcheckout-error onestepcheckout-payment-method-error">
                                <?php echo $this->__('Please enter valid details below.'); ?>
                            </div>
                        <?php endif; ?>
                        <!-- End display Resursbank Error -->
    ```
2.  In the bottom of the file, add the code below. In this example
    disabling of the payment method is remarked, so the customer may
    choose the payment method again, immediately after a payment method
    error.  

    **Resurs Bank Code Block**
    ```xml
    <!-- Begin Resursbank Block -->
    <?php
        if($paymentId = Mage::getSingleton('checkout/session')->getDisablePaymentMethodId())
        {
            echo "<script type='text/javascript'>
                  \$j = jQuery.noConflict();  
                   document.getElementById('p_method_resurspayment$paymentId').checked = false;
                  </script>";
            Mage::getSingleton('checkout/session')->setDisablePaymentMethodId('');
        }
    ?>
    <!-- End Resursbank Block -->
    ```
