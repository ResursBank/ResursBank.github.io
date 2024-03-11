---
layout: page
title: Merchant Api E-Commerce
permalink: /merchant-api-2-0/merchant-api-e-commerce/
parent: Merchant Api 2.0
---


# Merchant API E-Commerce 


> Generic, explanational documentationPlease note that the flow and its
> requests below is an example and other flows or variations may exist.
> Please advice with onboarding@resurs.se regarding specific actions
> prior to mapping up any logic or beginning any coding.

**What can I find here?**
- [Basic API flow](#basic-api-flow)
  - [Authentication](#authentication)
  - [Get Store ID](#get-store-id)
  - [Get available payment
    methods](#get-available-payment-methods)

- [Create Payment](#create-payment)
  - [Create payment](#create-payment)
    - [Create payment-responses and what to do
      next](#create-payment-responses-and-what-to-do-next)

- [Postman-collection of the requests
  above](#postman-collection-of-the-requests-above)

## Basic API flow
### **Authentication**
Every request requires an authorization header with a Bearer-token. A
token lasts for 3599 seconds. To get a token you may use your
test-credentials received from Resurs Bank.

URL to get token:
[https://merchant-api.integration.resurs.com/oauth2/token](https://merchant-api.integration.resurs.com/oauth2/token)

- Client ID
- Client Secret
- Scope= merchant-api

Link to the call in swagger documentation: **[Get
Token](https://merchant-api.integration.resurs.com/docs/oauth2#/Oauth2%20token%20resource/authorizeObject_1_1)**

![](../../attachments/image.png)

**Curl to get token**

> curl --location --request POST
> 'https://merchant-api.integration.resurs.com/oauth2/token'--header
> 'accept: application/json' \\-header 'Content-Type:
> application/x-www-form-urlencoded' \\-data-urlencode 'client_id=fill
> out client_id' \\-data-urlencode 'client_secret=fill out
> client_secret' \\-data-urlencode 'scope=merchant-api'
> \\-data-urlencode 'grant_type=client_credentials'

### Get Store ID
**Get available stores**

A client may have access to multiple stores, therefore we need to know
which store to make the application or payment for.  
This can be done by getting the available stores. Each store has a
store-id. This id will be used in the next step to specify for which
store we would like to get the payment methods.

URL to get available stores:
[https://merchant-api.integration.resurs.com/v2/stores](https://merchant-api.integration.resurs.com/v2/stores?sort=popularName,asc&sort=nationalStoreId,desc&size=2000)

Link to the call in swagger documentation: **[Get
Stores](https://merchant-api.integration.resurs.com/docs/v2/merchant_stores_v2#/Store%20information/getStores)**

**Curl to get available stores**

> curl --location --request GET
> 'https://merchant-api.integration.resurs.com/v2/stores'--header
> 'Authorization: Bearer \<TOKEN\>'

### Get available payment methods
A store may have multiple payment methods available. The list of
available payment methods will show what payment methods there are to
use from at the chosen store. Do not forget to sort out the payment
methods which min-/max purchase limit are outside the cart value. If you
input an amont in the request, the API will automatically not show the
unavailable payment methods for you - you do not need to sort out
payment methods yourselves.  
Each payment method has a paymentmethod id, which will be used in the
next step, when the payment is created.  
When presenting the payment methods to the customer, please note that by
law you are required to display our terms/link to our terms regarding
the credit payment methods. The link is found in this same request with
"*type: PRICE_INFO*"

URL to get available payment methods:
[https://merchant-api.integration.resurs.com/v2/stores/{store_id}/payment_methods](https://merchant-api.integration.resurs.com/v2/stores/%7Bstore_id%7D/payment_methods)

Link to the call in swagger documentation**: [Get Payment
Methods](https://merchant-api.integration.resurs.com/docs/v2/merchant_stores_v2#/Payment%20methods%20information/getPaymentMethodsByStore)**

**Curl to get available payment methods**

> curl --location --request POST
> 'https://merchant-api.integration.resurs.com/v2/stores/{store_id}/payment_methods'--header
> 'Content-Type: application/json' \\-header 'Authorization: Bearer
> \<TOKEN\>'

## **Create Payment**
### **Create payment**
The call below is used to create a new payment and authorize the
payment.

- orderReference = your internal order reference, if it's not provided
  by you it will be set by Resurs Bank. Will be provided in accounting
  file if not another value is provided in capture-request later on.

- initiatedOnCustomersDevice = true becuase the payment in the webshop's
  checkout is initiated on the customers device
- handleFrozenPayments = payments may be frozen for a short time due to
  fraud controls. When a payment is frozen the customer is informed that
  the purchase is ready, but the goods shall not be shipped until the
  payment is captured

For further information regarding initiatedOnCustomersDevice and
handleFrozenPayments, please go to "Schema" → "CreatePaymentRequest" →
"Options" ; [Create Payment
Options](https://merchant-api.resurs.com/docs/v2/merchant_payments_v2#/Payment+authorization/createPayment)

URL to create payment:
[https://merchant-api.integration.resurs.com/v2/payments](https://merchant-api.integration.resurs.com/v2/payments)

Link to the call in swagger documentation: **[Create
Payment](https://merchant-api.integration.resurs.com/docs/v2/merchant_payments_v2#/Payment%20authorization/createPayment)**

**Curl to create payment**

> curl --location --request POST
> 'https://merchant-api.integration.resurs.com/v2/payments' \\-header
> 'Authorization: Bearer \<TOKEN\>' \\-header 'Content-Type:
> application/json' \\-data-raw { "storeId": "{{store_id}}",
> "paymentMethodId": "{{payment_method_id}}", "order": { "orderLines":
> \[ { "description": "Book", "quantity": 1, "quantityUnit": "pcs",
> "vatRate": 25, "totalAmountIncludingVat": 500.0 } \],
> "orderReference": "orderref-12345" }, "customer": { "customerType":
> "NATURAL", "governmentId": "xxxxx", "email": "xxx@yyy.com",
> "mobilePhone": "xxxxx"   }, "options": { "initiatedOnCustomersDevice":
> true, "handleFrozenPayments": true, "callbacks": { "authorization": {
> "url": "{{callback_url_authorization}}" }, "management": { "url":
> "{{callback_url_management}}" } }, "redirectionUrls": { "customer": {
> "failUrl": "{{fail_url_customer}}", "successUrl":
> "{{success_url_customer}}" }, "timeToLiveInMinutes": 120 } }

#### Create payment responses and what to do next
status:
TASK_REDIRECTION_REQUIRED → redirect customer to "customerUrl" and await callback. 
Callbacks with callback-status AUTHORIZED, REJECTED, FROZEN or CAPTURED can be received before or after redirection is performed. 

### **Postman collection of the requests above**
**[![](download/resources/com.atlassian.confluence.plugins.confluence-view-file-macro:view-file-macro-resources/images/placeholder-medium-file.png)Merchant
API2
Ecommerce.json](/docs/download/attachments/91029560/Merchant%20API2%20Ecommerce.json?version=1&modificationDate=1688461337000&api=v2)**

