---
layout: page
title: Manually Patching Firecheckout
nav_exclude: true
permalink: /platform-plugins/magento-modules/magento-plugin---oldflow-version/oldflow-plugin---coding-examples-for-getaddress/manually-patching-firecheckout/
parent: Magento Modules
grand_parent: Platform Plugins
---



# Manually patching Firecheckout 

1.  In the folder firecheckout/controllers, edit IndexController.php,
    and find saveOrderAction() (In firecheckout 2.57 it's around row
    1244):

    **saveOrderAction()**
    ```xml
    public function saveOrderAction()
    {
    ```
2.  Put the code from
    [MagentoFC_Patch.txt](../../../../../attachments/3440805/5013600.txt) (last update
    2015-09-10) right after this code:

    **expireAjax**
    ```xml
    if ($this->_expireAjax()) {
    return;
    }
    ```
3.  Save the file

## What was changed?
### 2015-09-10
In some exclusive cases 'customerinfo' fails (mostly if logging to
display is active), so we've changed this row (in our patchfile located
at row 1307 - may differ depending on how your set up looks):

```xml
$customerinfo = (isset($limitResult['customerinfo'])) ? $limitResult['customerinfo'] : array();
```
```xml
$customerinfo = (isset($limitResult) && !empty($limitResult) && isset($limitResult['customerinfo']) && !empty($limitResult)) ? $limitResult['customerinfo'] : array();
```

