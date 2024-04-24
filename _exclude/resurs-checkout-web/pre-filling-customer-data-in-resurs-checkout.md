---
layout: page
title: Pre-Filling Customer Data In Resurs Checkout
permalink: /resurs-checkout-web/pre-filling-customer-data-in-resurs-checkout/
parent: Resurs Checkout Web
---


# Pre-filling customer data in Resurs Checkout 

  
### Optimize the Checkout for Returning Customers
Customers are more likely to complete purchases if they can checkout
quickly and accurately. Resurs Bank creates a fast and accurate checkout
experience by prefilling, auto-completing and validating personal
details.
Send us the customer’s information, if you already have it, just before
you render the checkout. When you create the order you may choose to add
data about the customer. We recommended this feature for customers who
have already registered with your website.
If you choose to add customer data, the customer-defined fields on the
checkout form will be pre-populated, which will increase your
conversion.
  
##### Customer-defined fields that can be pre-populated:
governmentId -\>
mobile -\> Mobile phone number
email -\> E-mail address
firstName -\> Given name
lastName -\> Family name
addressRow1 -\> Street address, first line.
addressRow2 -\> Street address, second line.
postalCode -\> Postal/post code
postalArea -\> City
countryCode -\> ISO 3166 alpha-2. Country. Has to be same country as the
webservice-account is created for
  
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
`    ``"backUrl"``:`` ``"`[`http://failblog.cheezburger.com/`](http://failblog.cheezburger.com/)`"``,`  
`    ``"paymentCreatedCallbackUrl"``:`` ``"`[`https://test.se`](https://test.se/)`"``,`  
`    ``"shopUrl"``:`` ``"`[`https://test.se`](https://test.se/)`"`  
`}`
