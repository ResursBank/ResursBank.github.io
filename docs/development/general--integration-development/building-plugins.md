---
layout: page
title: Building Plugins (Settings)
permalink: /development/general--integration-development/Building Plugins/
grand_parent: Development
parent: General - Integration Development
---


# Building plugins (settings) 


## Configuration - Admin
![](../../../attachments/configAdmin.png)

1.  Option to enable and disable the module.
2.  Option to enable switch between test and production environment at
    Resurs Bank.
3.  End points for [production](/prod-urls/) and [test](/testing/test-urls/)
    environment.
4.  Country of merchant credentials.\*
5.  Usernamn provided by Resurs Bank.
6.  Password provided by Resurs Bank.
7.  Callback implementation.\*\*  
    
    

> [!NOTE] 
> \* Country settingResurs Bank merchant credentials only supports one
> country per credential account. Merchants that allow shopping from
> multiple countries need to have one credential for each country
> (Sweden, Norway, Finland or Denmark). I.e., a Norwegian customer can
> not shop with payment methods in a Swedish store.
>
> \*\* Callback noticesCallbacks must be reachable externally. If you
> are testing your web store in a protected environment and you want to
> test callback functionality, you have to make sure that Resurs can
> reach the callback URLs.

