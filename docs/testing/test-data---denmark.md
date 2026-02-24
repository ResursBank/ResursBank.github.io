---
layout: page
title: Test Data - Denmark
permalink: /testing/test-data---denmark/
parent: Testing
---


# Test Data - Denmark 

> Phone number +4525557585

***

# Status **FROZEN** – Sunset Information

## 🔔 Sunset Notice

The status value **`FROZEN`** is **deprecated** and will be removed from the payment flow.  
It may still appear during a transitional period, but **should not be used** in new implementations.

All new integrations must rely on final status values such as:

*   `AUTHORIZED`
*   `REJECTED`
*   `ANNULLED`
*   `CAPTURED`

***

## ✔ Records without `FROZEN`

| Civic number    | Address                                                      | Merchant API                                                                                              |
| --------------- | ------------------------------------------------------------ | --------------------------------------------------------------------------------------------------------- |
| **140285‑3877** | Gorm Anker Bøgh<br>Strøget 15<br>3100 Hornbæk                | **GetPayment** returns **ACCEPTED**<br>Callback **AUTHORIZATION** will be sent with status **AUTHORIZED** |
| **021250‑0003** | Kaj Anker Anker<br>Frederiksberggade 1<br>1620 København     | **GetPayment** returns **REJECTED**<br>Callback **AUTHORIZATION** will be sent with status **REJECTED**   |
| **290550‑1913** | Preben Anker Dunker<br>Strøget 9<br>3250 Gilleleje           | **GetPayment** returns **REJECTED**<br>Callback **AUTHORIZATION** will be sent with status **REJECTED**   |
| **2304881898**  | Customer has no cards/accounts allowing **new card/account** | **GetPayment** returns **ACCEPTED**<br>Callback **AUTHORIZATION** will be sent with status **AUTHORIZED** |

***

## 🔒 Records with status `FROZEN`

| Civic number    | Address                                                       | Merchant API                                                                                                                                                                                             |
| --------------- | ------------------------------------------------------------- | -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| **060580‑3736** | Kristen Bager Anker<br>Frederiksberggade 16<br>1620 København | **GetPayment** returns **FROZEN**<br>Callback **AUTHORIZATION** will be sent with status **FROZEN**                                                                                                      |
| **140481‑9652** | Grethe Anker Anker<br>Østergade 16<br>1620 København          | **GetPayment** returns **FROZEN**<br>After 5 seconds the payment becomes **unfrozen**<br>Callback **AUTHORIZATION** will be sent with **FROZEN → AUTHORIZED**<br>Requires `handleFrozenPayments = true`  |
| **100677‑2605** | Preben Bager Anker<br>Frederiksberggade 16<br>1620 København  | **GetPayment** returns **FROZEN**<br>After 5 seconds the payment is **annulled**<br>Callback **AUTHORIZATION** will be sent with **FROZEN → REJECTED**<br>Requires `handleFrozenPayments = true`         |
| **011183‑1432** | Vibeke Anker Anker<br>Strøget 16<br>1620 København            | **GetPayment** returns **FROZEN**<br>After 10 minutes the payment becomes **unfrozen**<br>Callback **AUTHORIZATION** will be sent with **FROZEN → AUTHORIZED**<br>Requires `handleFrozenPayments = true` |
| **240384‑4340** | Vibeke Anker Anker<br>Strøget 2<br>3000 Helsingør             | **GetPayment** returns **FROZEN**<br>After 10 minutes the payment is **annulled**<br>Callback **AUTHORIZATION** will be sent with **FROZEN → REJECTED**<br>Requires `handleFrozenPayments = true`        |


***


