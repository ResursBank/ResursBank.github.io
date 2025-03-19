---
layout: page
title: Verify Integration
permalink: /testing/verify-integration/
parent: Testing
---


# Verify integration 
The following page is a checklist to define when an integration can
be considered "Done".

### Technical requirements
- XML validation - When using our services live, do not enable strict
  XML Schema validation as minor changes on our side can cause the
  integration to fail.
- Enable [preemptive
  authentication](https://test.resurs.com/docs/pages/viewpage.action?pageId=1475179)
  in your HTTP client.

### Legal requirements
- [Legal
  requirements](https://test.resurs.com/docs/display/ecom/Legal+requirements)

### 1. Go-live checklist Resurs e-commerce Integration

#### General Settings:
- JWT (token) management: Get new token on every request to Resurs, or using "expires_in".
- StoreId management: Get StoreId using Merchant API, or buit-in StoreId
- PaymentMethodId management: Get PaymentMethodId using Merchant API, or buit-in PaymentMethodId.

#### Billing and Delivery Address:
- Enter customer information. (Regular expressions / pattern is used for different fields)
- Is it possible to enter shipping address

#### Payment Method:
- Display Payment methods depending on order value and min- and max- purchase limit
- Sortorder payment methods according to Merchant Portal (debit first if used)
- Legal requirements, payment methods with the corresponding price information links
- Konsumentverket (SE) regulations on merchants obligation to provide information when marketing consumer credit. [Read more](https://publikationer.konsumentverket.se/produkter-och-tjanster/finansiella-tjanster/kovfs-20251-konsumentverkets-foreskrifter-om-naringsidkares-upplysningsskyldighet-vid-marknadsforing-av-konsumentkrediter)

#### Complete Purchase:
- Confirm of purchase with checkbox, text or by mandatory open legal links
- Success page
- Handle "falied" payment. Like "Credit denied", with fail page or message in chckout with necessary information for customer and with the option of trying to complete the purchase again.

#### Specifics for a completed purchase:
- Check payment in Resurs Merchant Portal
- Customized orderReference
- Handle frozen payments is set to true: Check if the order is handled correct, namely the order is set to "pending Resurs", waiting for outcome from Resurs and then updated to AUTHORIZED, CAPTURED or REJECTED.
- If Handle Manual Inspection is enabled the flow may be stopped and the customer or salesperson needs talk to Resurs Bank customer service before the credit can be approved. This can be handled in the redirection flow by the customer and the customer will get a reminder when the credit is approved.
- Check orderlines: best practice, use ("type", "quantity", "quantityUnit", "vatRate", "totalAmountIncludingVat", "description", "reference")             
- IP address mandatory
- timeToLiveInMinutes setting or default

#### Order management:
- Confirm payment: Using callback / get payments / webhook
- Confirm order managenent status
- Capture is successful (check in Merchant Portal)
- Annulment is successful (check in Merchant Portal)
- Refund is successful (check in Merchant Portal)
- It is not possible to capture when the order status at Resurs is frozen

#### Optional for order management:
- Part capture
- Part refund
