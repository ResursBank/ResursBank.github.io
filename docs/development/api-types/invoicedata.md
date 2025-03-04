---
layout: page
title: invoiceData
permalink: /development/api-types/invoicedata/
parent: Api Types
grand_parent: Development
---



# invoiceData 

invoiceData is used when you specify the data when a paymentmethod is an
Invoice.

> Find out if the payment methode is an invoice by making a
> getPaymentMethods. If \<specificType\>INVOICE\</specificType\> in
> getPaymentMethodsResponse, payment methode is an invoice.

This should only be used when the finalizeIfBooked
in [paymentData](/development/api-types/paymentdata/) is set to true.

| Component           | Type                                           | Occurs | Nillable? | Description                                                                                                                                                                            |
|---------------------|------------------------------------------------|--------|-----------|----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| invoiceId           | **[id](/development/api-types/simple-types/)**                      | 0..1   | Yes       | The invoice number. To be used if finalizeIfBooked is set to `true`. This will be printed on the invoice. For payment methods other than INVOICE, setting this will generate an error. |
| invoiceDate         | dateTime                                       | 0..1   | Yes       | The invoice date. This will be printed on the invoice. For payment methods other than INVOICE, setting this will generate an error.                                                    |
| invoiceDeliveryType | **[invoiceDeliveryType](/development/api-types/invoicedeliverytype/)** | 0..1   | Yes       | This option will let you decide how the INVOICE should be delivered. NONE, EMAIL or by POST. **Default: EMAIL**                                                                        |

