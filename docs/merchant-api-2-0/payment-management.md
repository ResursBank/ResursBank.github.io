---
layout: page
title: Payment Management
permalink: /merchant-api-2-0/payment-management/
parent: Merchant Api 2.0
---


# Payment Management 
Created by Sara Wintherfrid Josefsson, last modified by Patric Johnsson
on 2023-07-04

| Callback Status | Possible Actions                                 |
|:----------------|:-------------------------------------------------|
| AUTHORIZED      | CAPTURE CANCEL                                   |
| CAPTURED        | REFUND                                           |
| FROZEN          | await for callback-status AUTHORIZED or REJECTED |

**What can I find here?**
- [Capture payment](#paymentmanagement-capturepayment)
- [Refund payment](#paymentmanagement-refundpayment)
- [Cancel payment](#paymentmanagement-cancelpayment)
- [Postman-collection of the requests
  above](#paymentmanagement-postman-collectionoftherequestsabove)

# **Capture payment**
This call is used to capture a payment after the payment is created.  
If no order lines are supplied, then all not yet captured order lines
will be captured. 

URL to capture payment:
[https://merchant-api.integration.resurs.com/v2/payments/](https://merchant-api.integration.resurs.com/v2/payments/){payment_id}/capture/captureture

Link to the call in swagger documentation: **[Capture
Payment](https://merchant-api.integration.resurs.com/docs/v2/merchant_payments_v2#/Payment%20management/capturePayment)**

**Curl to capture the payment**

> curl --location --request POST
> 'https://merchant-api.integration.resurs.com/v2/payments/{payment_id}/capture/c'--header
> 'Content-Type: application/json' \\-header 'Authorization: Bearer
> \<TOKEN\>' \\-data-raw '{ "creator": "fictive@resurs.com",
> "orderLines": \[ { "description": "Book", "quantity": 1,
> "quantityUnit": "pcs", "vatRate": 25, "totalAmountIncludingVat": 500.0
> } \] }

# **Refund payment**
This call is used to refund a payment that is captured.   
If no order lines are supplied, then all captured not yet refunded order
lines will be refunded. 

URL to refund payment:
[https://merchant-api.integration.resurs.com/v2/payments/](https://merchant-api.integration.resurs.com/v2/payments/){payment_id}[/](https://web-integration-mock-merchant-api-portal.integration.resurs.com/v2/payments/%7Bpayment_id%7D/capture)refund

Link to the call in swagger documentation: **[Refund
Payment](https://merchant-api.integration.resurs.com/docs/v2/merchant_payments_v2#/Payment%20management/refundPayment)**

**Curl to refund the payment**

> curl --location --request POST
> 'https://merchant-api.integration.resurs.com/v2/payments/{payment_id}/refund'--header
> 'Content-Type: application/json' \\-header 'Authorization: Bearer
> \<TOKEN\>' \\-data-raw '{ "creator": "fictive@resurs.com",
> "orderLines": \[ { "description": "Book", "quantity": 1,
> "quantityUnit": "pcs", "vatRate": 25, "totalAmountIncludingVat": 500.0
> } \] }

# **Cancel payment**
This call is used to cancel a payment that is created but not yet
captured.   
If no order lines are supplied, everything that can be canceled will be
canceled.  

URL to cancel payment:
[https://merchant-api.integration.resurs.com/v2/payments/](https://merchant-api.integration.resurs.com/v2/payments/){payment_id}[/ca](https://web-integration-mock-merchant-api-portal.integration.resurs.com/v2/payments/%7Bpayment_id%7D/capture)ncel

Link to the call in swagger documentation: **[Cancel
Payment](https://merchant-api.integration.resurs.com/docs/v2/merchant_payments_v2#/Payment%20management/cancel)**

**Curl to cancel the payment**

> curl --location --request POST
> 'https://merchant-api.integration.resurs.com/v2/payments/{payment_id}/cancel'--header
> 'Content-Type: application/json' \\-header 'Authorization: Bearer
> \<TOKEN\>' \\-data-raw '{ "creator": "fictive@resurs.com",
> "orderLines": \[ { "description": "Book", "quantity": 1,
> "quantityUnit": "pcs", "vatRate": 25, "totalAmountIncludingVat": 500.0
> } \] }

# **Postman-collection of the requests above**
**[![](download/resources/com.atlassian.confluence.plugins.confluence-view-file-macro:view-file-macro-resources/images/placeholder-medium-file.png)Merchant
API2 Payment
management.json](/docs/download/attachments/91029652/Merchant%20API2%20Payment%20management.json?version=1&modificationDate=1688462138000&api=v2)**

