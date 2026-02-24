---
layout: page
title: Test Data - Norway
permalink: /testing/test-data---norway/
parent: Testing
has_children: true
---



# Test Data - Norway 

> Phone number 49999999

***

# Status **FROZEN** – Sunset Information

## 🔔 Sunset Notice

The status value **`FROZEN`** is **deprecated** and will be removed from the payment flow.  
It is only used during a transitional period and should not be relied upon in new implementations.

New integrations must instead use the final status values, such as:

*   `AUTHORIZED`
*   `REJECTED`
*   `ANNULLED`
*   `CAPTURED`
  
***

## ✔ Records without `FROZEN`

| Civic number     | Merchant API                                                                                                                                                              |
| ---------------- | ------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| **180872‑48794** | **GetPayment** returns **ACCEPTED**<br>Callback **AUTHORIZATION** will be sent with status **AUTHORIZED**                                                                 |
| **010249‑24986** | **GetPayment** returns **REJECTED**<br>Callback **AUTHORIZATION** will be sent with status **REJECTED**                                                                   |
| **260249‑14002** | **GetPayment** returns **REJECTED**<br>Callback **AUTHORIZATION** will be sent with status **REJECTED**                                                                   |
| **270288‑09552** | Customer has no cards/accounts allowing **new card/account**<br>**GetPayment** returns **ACCEPTED**<br>Callback **AUTHORIZATION** will be sent with status **AUTHORIZED** |

***

## 🔒 Records with status `FROZEN`


| Civic number     | Merchant API                                                                                                                                                                                                        |
| ---------------- | ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| **020849‑29428** | **GetPayment** returns **FROZEN**<br>Callback **AUTHORIZATION** will be sent with status **FROZEN**                                                                                                                 |
| **230682‑01608** | **GetPayment** returns **FROZEN**<br>After 5 seconds the payment becomes **unfrozen**<br>Callback **AUTHORIZATION** will be sent with status **FROZEN** → **AUTHORIZED**<br>Requires `handleFrozenPayments = true`  |
| **050178‑18440** | **GetPayment** returns **FROZEN**<br>After 5 seconds the payment is **annulled**<br>Callback **AUTHORIZATION** will be sent with status **FROZEN** → **REJECTED**<br>Requires `handleFrozenPayments = true`         |
| **010782‑12868** | **GetPayment** returns **FROZEN**<br>After 10 minutes the payment becomes **unfrozen**<br>Callback **AUTHORIZATION** will be sent with status **FROZEN** → **AUTHORIZED**<br>Requires `handleFrozenPayments = true` |
| **030477‑05311** | **GetPayment** returns **FROZEN**<br>After 10 minutes the payment is **annulled**<br>Callback **AUTHORIZATION** will be sent with status **FROZEN** → **REJECTED**<br>Requires `handleFrozenPayments = true`        |

***

### Organisations

| Organisation number | Gender | Civic number | [Simplified shop flow](simplified-flow-api)  |
|-------------------|--------|--------------|------------------------------------------------|
| 892831270         | M      | 180872-48794 |  | 
| 996030962         | M      | 180872-48794 | [bookPayment](/simplified-flow-api/bookpayment/) returns bookPaymentStatus=DENIED |
| 950576839         | M      | 180872-48794 | [bookPayment](/simplified-flow-api/bookpayment/) returns bookPaymentStatus=DENIED |

### Cards
**To test VISA/Mastercard ** please see:
[https://shop.nets.eu/web/partners/test-cards](https://shop.nets.eu/web/partners/test-cards)

### Vipps
To test Vipps, please follow the steps on the below link. When completed, you can create a new Vipps-payment via Resurs and complete the purchase in your installed Vipps Test-app: [App installation Vipps MobilePay ](https://developer.vippsmobilepay.com/docs/knowledge-base/test-environment/#test-apps)

> When installing the Vipps Test-app use:
> **Social security number:** 48076734537;
> **Phone number:** +47 93089608


