---
layout: page
title: Merchant Api Pos
permalink: /merchant-api-2-0/merchant-api-pos/
parent: Merchant Api 2 0
---


# Merchant API POS 
Created by Sara Wintherfrid Josefsson, last modified by Patric Johnsson
on 2024-01-25
> Generic, explanational documentationPlease note that the flow and its
> requests below is an example and other flows or variations may exist.
> Please advice with onboarding@resurs.se regarding specific actions
> prior to mapping up any logic or beginning any coding.

**What can I find here?**
- [Basic API flow](#merchantapipos-basicapiflow)
  - [Authentication](#merchantapipos-authentication)
  - [Get Store ID](#merchantapipos-getstoreid)
  - [Get available payment
    methods](#merchantapipos-getavailablepaymentmethods)

- [Create Payment](#merchantapipos-createpayment)
  - [Create payment](#merchantapipos-createpayment)
    - [Create payment-responses and what to do
      next](#merchantapipos-createpayment-responsesandwhattodonext)

- [Postman-collection of the requests
  above](#merchantapipos-postman-collectionoftherequestsabove)

# **Basic API flow**
## **Authentication**
Every request requires an authorization header with a Bearer-token. A
token lasts for 3599 seconds. To get a token you may use your
test-credentials received from Resurs Bank.

URL to get token:
[https://merchant-api.integration.resurs.com/oauth2/token](https://merchant-api.integration.resurs.com/oauth2/token)

- Client ID
- Client Secret
- Scope= mock-merchant-api

Link to the call in swagger documentation: **[Get
Token](https://merchant-api.integration.resurs.com/docs/oauth2#/Oauth2%20token%20resource/authorizeObject_1_1)**

**Curl to get token**

> curl --location --request POST
> 'https://merchant-api.integration.resurs.com/oauth2/token'--header
> 'accept: application/json' \\-header 'Content-Type:
> application/x-www-form-urlencoded' \\-data-urlencode 'client_id=fill
> out client_id' \\-data-urlencode 'client_secret=fill out
> client_secret' \\-data-urlencode 'scope=mock-merchant-api'
> \\-data-urlencode 'grant_type=client_credentials'

## **Get Store ID**
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

## **Get available payment methods**
A store may have multiple payment methods available. The list of
available payment methods will show what payment methods there are to
apply from at the chosen store.  
Each payment method has a paymentmethod id, wich will be used in the
next step, when the application is created. 

URL to get available payment methods:
[https://merchant-api.integration.resurs.com/v2/stores/{store_id}/payment_methods](https://merchant-api.integration.resurs.com/v2/stores/%7Bstore_id%7D/payment_methods)

Link to the call in swagger documentation: **[Get Payment
Methods](https://merchant-api.integration.resurs.com/docs/v2/merchant_stores_v2#/Payment%20methods%20information/getPaymentMethodsByStore)**

**Curl to get available payment methods**

> curl --location --request POST
> 'https://merchant-api.integration.resurs.com/v2/stores/{store_id}/payment_methods'--header
> 'Content-Type: application/json' \\-header 'Authorization: Bearer
> \<TOKEN\>'

# **Create Payment**
## **Create payment**
The body below is an example used to create a new payment and authorize
the payment. Note that more fields exist and options can vary depending
on user-case. See the Swagger-documentation linked below for more
information.

- orderReference = your internal order reference, if it's not provided
  by you it will be set by Resurs Bank

- initiatedOnCustomersDevice = if clerk has asked for, investigated and
  confirmed that customer ID is OK, this setting can be set as *false*.
  If not, or you want Resurs to be responsible for ID'ing the customer,
  set this option as *true*.
- deliverLinks = instructs whether or not to deliver links to the
  customer in case customer interaction like consents or contract
  signing is required
- handleFrozenPayments = payments may be frozen for a short time due to
  fraud controls. When a payment is frozen  the goods shall not be
  delivered to the customer until the payment is captured
- handlemanualinspection = if handling manual inspection, the flow may
  be stopped and the customer must talk to Resurs Bank personnel before
  the credit can be approved

For further information about orderReference, InitiatedOnCustomersDevice
and handleFrozenPayments, please go to "Schema" → "CreatePaymentRequest"
→ "Options" [Create Payment
Options](https://merchant-api.resurs.com/docs/v2/merchant_payments_v2#/Payment%20authorization/createPayment)

URL to create payment:
[https://merchant-api.integration.resurs.com/v2/payments](https://merchant-api.integration.resurs.com/v2/payments)

Link to the call in swagger documentation: **[Create
Payments](https://merchant-api.integration.resurs.com/docs/v2/merchant_payments_v2#/Payment%20authorization/createPayment)**

**Curl to create payment**

> curl --location --request POST
> 'https://merchant-api.integration.resurs.com/v2/payments' \\-header
> 'Authorization: Bearer \<TOKEN\>' \\-header 'Content-Type:
> application/json' \\-data-raw { "storeId": "{{store_id}}",
> "paymentMethodId": "{{payment_method_id}}", "order": { "orderLines":
> \[ { "description": "Book", "quantity": 1, "quantityUnit": "pcs",
> "vatRate": 25, "totalAmountIncludingVat": 500.0 } \],
> "orderReference": "{{orderref}}" }, "customer": { "customerType":
> "NATURAL", "governmentId": "xxxxx", "email": "test@resurs.com",
> "mobilePhone": "xxxxx"   }, "options": { "initiatedOnCustomersDevice":
> true, "deliverLinks": true, "handleManualInspection":
> false,"automaticCapture": true, "callbacks": { "authorization": {
> "url": "{{callback_url_authorization}}" }, "management": { "url":
> "{{callback_url_management}}" } }, "redirectionUrls": { "customer": {
> "failUrl": "{{fail_url_customer}}", "successUrl":
> "{{success_url_customer}}" }, "timeToLiveInMinutes": 120 } }

### **Create payment-responses and what to do next**
TASK_REDIRECTION_REQUIRED → The customer is to be redicreted to
"customerUrl" either sent by you or by Resurs (depending whether
options.deliverLinks is true/false). Callbacks with callback-status
AUTHORIZED, REJECTED, FROZEN or CAPTURED can be received before or after
redirection is performed. 

If you want to check if the payment has been *Authorized* without
redirecting (it may be that successUrl is shown directly in the
*customerUrl* and an authentification is not needed), then call GET
/v2/payments/{payment_id} and check for *status: ACCEPTED*

If paper signing is to be used (For Finland only) for signing an
application/payment, see [Physical Agreement
Finland](physical-agreement-finland)

# **Postman-collection of the requests above**
**[![](download/resources/com.atlassian.confluence.plugins.confluence-view-file-macro:view-file-macro-resources/images/placeholder-medium-file.png)Merchant
API2
POS.json](/docs/download/attachments/71794842/Merchant%20API2%20POS.json?version=1&modificationDate=1688461853000&api=v2)**

