---
layout: page
title: Test Data - Sweden
permalink: /testing/test-data---sweden/
parent: Testing
---

# Test Data - Sweden 

> Phone number 0701-112233

### Persons
Persons to use when testing. 


> If you use `handleFrozenPayments=true`, payments may be frozen due to fraud controls. If you want as many approved payments as possible, you should handle frozen payments. But in some cases it is not possible to handle frozen payments, for example when booking a flight there may not be a way to cancel the booking if the frozen payment does not get authorized. Register the callback `AUTHORIZATION` to get informed when the payment is authorized.


# Status **FROZEN** – Sunset Information

## 🔔 Sunset Notice

The status value **`FROZEN`** is **deprecated** and will be removed from the payment flow.  
It is only used during a transitional period and should not be relied upon in new implementations.

New integrations must instead use the final status values, such as:

*   `AUTHORIZED`
*   `REJECTED`
*   `ANNULLED`

***

## 🔒 Records with status `FROZEN`

This section can be expanded and collapsed to improve readability.

<details>
<summary><strong>Click to show/hide FROZEN records</strong></summary>

<br>

| Civic number     | Address                                                          | Merchant API                                                                                               | Note                                   |
| ---------------- | ---------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------- | -------------------------------------- |
| **198209123705** | Julia Liamsson Liamsson<br>Makadamg 17<br>25024 Helsingborg      | `GetPayment` → **FROZEN**<br>Callback AUTHORIZATION → **FROZEN**                                           |                                        |
| **198001010001** | Stella Liamsson Eliassson<br>Makadamg 3<br>41655 Göteborg        | `GetPayment` → **FROZEN**<br>After 5 seconds → *unfrozen*<br>Callback AUTHORIZATION → FROZEN → AUTHORIZED  | Requires `handleFrozenPayments = true` |
| **197801069241** | Elsa Liamsson Alexandersson<br>Ekslingan 20<br>11521 Stockholm   | `GetPayment` → **FROZEN**<br>After 5 seconds → *annulled*<br>Callback AUTHORIZATION → FROZEN → REJECTED    | Requires `handleFrozenPayments = true` |
| **199401012381** | Ebba Liamsson Williamsson<br>Glassgatan 11<br>41655 Göteborg     | `GetPayment` → **FROZEN**<br>After 10 minutes → *unfrozen*<br>Callback AUTHORIZATION → FROZEN → AUTHORIZED | Requires `handleFrozenPayments = true` |
| **198909194451** | Vincent Liamsson Williamsson<br>Glassgatan 12<br>11521 Stockholm | `GetPayment` → **FROZEN**<br>After 10 minutes → *annulled*<br>Callback AUTHORIZATION → FROZEN → REJECTED   | Requires `handleFrozenPayments = true` |

</details>

***

## ✔ Records without `FROZEN`

| Civic number | Address                                                              | Merchant API          | Note                                                  |
| ------------ | -------------------------------------------------------------------- | --------------------- | ----------------------------------------------------- |
| 198305147715 | Vincent Williamsson Alexandersson<br>Glassgatan 15<br>41655 Göteborg | ACCEPTED → AUTHORIZED |                                                       |
| 197211072793 | Oliver Williamsson Alexandersson<br>Makadamg 5<br>25024 Helsingborg  | REJECTED → REJECTED   |                                                       |
| 195004269741 | Stella Liamsson Williamsson<br>Makadamg 16<br>11521 Stockholm        | REJECTED → REJECTED   |                                                       |
| 198801082382 | Olivia Williamsson Alexandersson<br>Ekslingan 10<br>21149 Malmö      | ACCEPTED → AUTHORIZED | Customer has no cards/accounts allowing *new account* |

***

###  Organisations
Organisations to use when testing.

> The first two digits of the organization number are optional:
>   - for legal entity: 16 + the company's assigned organization number (10 digits)
>   - for a natural person: century digits 18, 19 or 20 + social security number (10 digits)

| Organisation number | Civic number |                   Get address                   | [Simplified shop flow](/simplified-flow-api/)                     | 
|---------------------|--------------|:-----------------------------------------------:|-----------------------------------------------------------------|
| 166997368573        | 198305147715 | Pilsnerbolaget HB<br>Glassgatan 17<br>25024 Helsingborg |                                                                 |                                                                                                                     |
| 169468958195        | 198305147715 |      Grisfarmen<br>Makadamg 12<br>11521 Stockholm      | [bookPayment](/simplified-flow-api/bookpayment/) returns bookPaymentStatus=DENIED     | 
| 162177385255        | 198305147715 | Pilsnerbolaget HB<br>Glassgatan 5<br>25024 Helsingborg |  [bookPayment](/simplified-flow-api/bookpayment/)   returns bookPaymentStatus=DENIED  | 
| 162830419400        | 198305147715 |       Grisfarmen<br>Makadamg 15<br>41655 Göteborg       |  [bookPayment](/simplified-flow-api/bookpayment/)  returns bookPaymentStatus=FROZEN   |  


### Cards Payment Providers
[For NETS, see this page.](https://developers.nets.eu/netaxept/en-EU/docs/test-environment/)

| Card number         | Expire date  | CVC          | Result                |
|---------------------|--------------|--------------|-----------------------|
| 4925 0000 0000 0004 | \> today     | Any 3 digits | Success               |
| 4925 0000 0000 0087 | \> today     | Any 3 digits | Reservation will fail |
|                     |              |              |                       |

