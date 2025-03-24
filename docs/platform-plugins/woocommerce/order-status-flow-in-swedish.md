---
layout: page
title: Förenklat Orderstatus-flöde i WooCommerce
permalink: /platform-plugins/woocommerce/order-status-flow-in-swedish
parent: Full Documentation
grand_parent: Platform Plugins
nav_order: 13
has_children: false
has_toc: false
---

### OrderStatusFlöde (Förenklad)

Full dokumentation för orderstatusflödet i WooCommerce
finns [här](https://developers.resurs.com/platform-plugins/woocommerce/resurs-merchant-api-for-woocommerce#order-status-flow).

Pluginet uppdaterar orderstatusar baserat på betalningssvar från Resurs Bank. Processen ser ut så här:

1. **Validering:**

- Kontrollerar om betalningen är en giltig Resurs-betalning som kan hanteras.

2. **Hämtning av betalningsdetaljer:**

- Hämtar betalningsdata från Resurs Payments Repository.

3. **Validering av betalningsstatus och kontroll:**

- Jämför den aktuella statusen från WooCommerce med den förväntade statusen från Resurs Bank.
- Om statusarna inte matchar och orderstatusen inte är `pending`, avbryts processen här och ingen statusuppdatering
  sker.
- Valideringen (`validatePaymentAction`) avgör om betalningen är `ACCEPTED` eller `REJECTED` och om
  WooCommerce-orderstatusen är `pending`.
- Om valideringen misslyckas, fortsätter inte processen till statusuppdateringen.

4. **Orderstatusuppdatering:**

- Om betalningen är `ACCEPTED` sätts statusen till `processing`.
- Om betalningen är `REJECTED` hanteras den av `updateRejected`, som avgör om statusen blir `failed` eller `cancelled`
  baserat på task status details.
- Om statusen är något annat än förväntat sätts orderstatusen
  till `on-hold` (`TASK_REDIRECTION_REQUIRED`, `INSPECTION`, `SUPPLEMENTING_REQUIRED`, `FROZEN`).

5. **updateRejected-metoden:**

- Kontrollerar task status details (`completed`-flaggan) från Resurs för att avgöra om statusen ska vara `failed` (om
  true) eller `cancelled` (om false).
- `rejectedReason` kan användas för bättre felsökning men detta görs inte i dagsläget.
