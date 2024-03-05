---
layout: page
title: Weblink
permalink: /development/api-types/weblink/
parent: Api Types
grand_parent: Development
---



# webLink 
Created by Benny, last modified on 2017-02-27
  
Represents a link to be placed on a page. Usage (if appendPriceLast is
`false`): \<a href="url"\>endUserDescription\</a\>. If appendPriceLast
is `true`, the page that is linked is expected to show some information
based on a particular amount, such as the price of a given product, and
the URL is to be completed by appending the price of that product to the
URL.  
Contains elements as defined in the following table.
 
  
| Component          | Type                                                | Occurs | Nillable? | Description                                                                                                                                                                                                                                                                                                                            |
|--------------------|-----------------------------------------------------|--------|-----------|----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| appendPriceLast    | boolean                                             | 1..1   | No        |  Whether or not the URL needs to be suffixed by an amount. Note: the amount is an integer! The web link URL "[http://site.com/cgi?param1=1&price=](http://site.com/cgi?param1=1&price=)" and an amount of SEK 999.90 would give the complete URL "[http://site.com/cgi?param1=1&price=1000](http://site.com/cgi?param1=1&price=1000)". |
| endUserDescription | **[nonEmptyString](Simple-Types..._1475653.html)**  | 1..1   | No        |  The link description. (\<a href="url"\>endUserDescription\</a\>)                                                                                                                                                                                                                                                                      |
| url                | [**nonEmptyString**](Simple-Types..._1475653.html)  | 1..1   | No        | The possibly incomplete URL to link to. See appendPriceLast for more details!                                                                                                                                                                                                                                                          |
  
  
  
