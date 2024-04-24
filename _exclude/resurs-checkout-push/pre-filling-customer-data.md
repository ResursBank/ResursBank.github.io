---
layout: page
title: Pre-Filling Customer Data
permalink: /resurs-checkout-push/pre-filling-customer-data/
parent: Resurs Checkout Push
---


# Pre-filling customer data 

  
### Optimize the Checkout for Returning Customers
Customers are more likely to complete purchases if they can checkout
quickly and accurately. Resurs Bank creates a fast and accurate checkout
experience by prefilling, auto-completing and validating personal
details.
The customer information is sent in the inital POST and will be
auto-populated when the iFrame is presented in the customer's browser.
  
##### Customer-defined fields that can be pre-populated:
governmentId, mobile number, email, name and address.
  
**POST-example containing customer data**
POST-example containing customer data
`{`  
`    ``"orderLines"``: [`  
`        ``{`  
`            ``"artNo"``:`` ``"ART123"``,`  
`            ``"description"``:`` ``"Product description"``,`  
`            ``"quantity"``:`` ``2``,`  
`            ``"unitMeasure"``:`` ``"kg"``,`  
`            ``"unitAmountWithoutVat"``:`` ``200``,`  
`            ``"vatPct"``:`` ``25`  
`        ``}`  
`    ``],`  
`    ``"customer"``: {`  
`        ``"governmentId"``:`` ``"``198305147715``"``,`  
`        ``"mobile"``:`` ``"``0771112233``"``,`  
`        ``"email"``:`` ``"test@`[`resurs.se`](http://resurs.se)`"``,`  
`        ``"deliveryAddress"``: {`  
`            ``"fullName"``:`` ``"``Vincent Williamsson Alexandersson``"` `,`  
`            ``"firstName"``:`` ``"``Vincent ``"``,`  
`            ``"lastName"``:`` ``"``Williamsson Alexandersson``"``,`  
`            ``"addressRow1"``:`` ``"``Glassgatan 15``"``,`  
`            ``"addressRow2"``:`` ``null``,`  
`            ``"postalArea"``:`` ``"``Göteborg``"``,`  
`            ``"postalCode"``:`` ``"``41655``"``,`  
`            ``"countryCode"``:`` ``"SE"`  
`        ``}`  
`    ``},`  
`    ``"successUrl"``:`` ``"`[`http://google.com`](http://google.com/)`"``,`  
`    ``"backUrl"``:`` ``"`[`http://failblog.cheezburger.com/`](http://failblog.cheezburger.com/)`"`  
`}`
