---
layout: page
title: Test Data - Finland
permalink: /testing/test-data---finland/
parent: Testing
---


# Test Data - Finland 


> Phone number +3585005555127

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

| Civic number    | Address                                                        | Merchant API                                                                                              |
| --------------- | -------------------------------------------------------------- | --------------------------------------------------------------------------------------------------------- |
| **230580‑7335** | Olavi Korhonen Nieminen<br>Kansakoulukatu 90<br>00100 Helsinki | **GetPayment** returns **ACCEPTED**<br>Callback **AUTHORIZATION** will be sent with status **AUTHORIZED** |
| **220950‑9256** | Juhani Korhonen Mäkelä<br>Kalevankatu 15<br>00100 Helsinki     | **GetPayment** returns **REJECTED**<br>Callback **AUTHORIZATION** will be sent with status **REJECTED**   |
| **180650‑344E** | Kaarina Virtanen Virtanen<br>Kalevankatu 7<br>00100 Helsinki   | **GetPayment** returns **REJECTED**<br>Callback **AUTHORIZATION** will be sent with status **REJECTED**   |
| **150987‑069L** | Customer has no cards/accounts allowing **new card/account**   | **GetPayment** returns **ACCEPTED**<br>Callback **AUTHORIZATION** will be sent with status **AUTHORIZED** |

***

## 🔒 Records with status `FROZEN`


| Civic number    | Address                                                        | Merchant API                                                                                                                                                                                             |
| --------------- | -------------------------------------------------------------- | -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| **140584‑4785** | Anneli Korhonen Korhonen<br>Kalevankatu 1<br>00100 Helsinki    | **GetPayment** returns **FROZEN**<br>Callback **AUTHORIZATION** will be sent with status **FROZEN**                                                                                                      |
| **020681‑1008** | Johanna Virtanen Virtanen<br>Fredrikinkatu 7<br>00100 Helsinki | **GetPayment** returns **FROZEN**<br>After 5 seconds the payment becomes **unfrozen**<br>Callback **AUTHORIZATION** will be sent with **FROZEN → AUTHORIZED**<br>Requires `handleFrozenPayments = true`  |
| **300881‑051B** | Juhani Korhonen Nieminen<br>Kalevankatu 9<br>00100 Helsinki    | **GetPayment** returns **FROZEN**<br>After 5 seconds the payment is **annulled**<br>Callback **AUTHORIZATION** will be sent with **FROZEN → REJECTED**<br>Requires `handleFrozenPayments = true`         |
| **100980‑576X** | Maria Korhonen Korhonen<br>Kansakoulukatu 1<br>00100 Helsinki  | **GetPayment** returns **FROZEN**<br>After 10 minutes the payment becomes **unfrozen**<br>Callback **AUTHORIZATION** will be sent with **FROZEN → AUTHORIZED**<br>Requires `handleFrozenPayments = true` |
| **230982‑3064** | Helena Virtanen Mäkelä<br>Fredrikinkatu 10<br>33100 Tampere    | **GetPayment** returns **FROZEN**<br>After 10 minutes the payment is **annulled**<br>Callback **AUTHORIZATION** will be sent with **FROZEN → REJECTED**<br>Requires `handleFrozenPayments = true`        |

***

### Organisations

| Organisation number | SSN | Behavior  | Scenario  |
|---------------------|--------------|-------------------------------------------|--------------------------------------------------------------------------------------------------------------------|
| 5333901-6 | 080779-1213 | Organisation has no account. Credit applications are approved and the applicant can sign alone. | Approved standalone credit application where the applicant can sign alone |
| 5333901-6 | 080779-1213 | Organisation has no account. Credit applications are approved and the applicant can sign alone. | Approved credit application in combination with purchase  where the applicant can sign alone |
| 8878318-4 | 050578-2382 | Organisation has no account. Denied credit | Denied credit application |
| 1039562-4 | 050407A4603 | Organisation has an account. The contact person is allowed to purchase. | Purchase on existing account |
| 1039562-4 | 080503A0685 | Organisation has an account. The contact person is not allowed to purchase. | Not allowed to purchase on existing account. |


