---
layout: page
title: Set Invoice Data
permalink: /configuration-service/set-invoice-data/
parent: Configuration Service
---

# Set Invoice Data 
  
# setInvoiceData

Sets the representative data that will be used on the invoices. The data
will be set once and will be used on all future invoices until the
representative calls setInvoice again.
The invoice is generated after you finalize the payment and will contain
the invoiceData and the specLines submitted in the finalization.
 
**Input(Literal)**
  
| Name           | Type           | Occurs | Nillable? | Description                                                                  |
|----------------|----------------|--------|-----------|------------------------------------------------------------------------------|
| name           | nonEmptyString | 1..1   | No        | The representative's name.                                                   |
| street         | nonEmptyString | 1..1   | No        | The representative's street name.                                            |
| zipcode        | nonEmptyString | 1..1   | No        | The representative's zip-code.                                               |
| city           | nonEmptyString | 1..1   | No        | The representative's city.                                                   |
| country        | nonEmptyString | 1..1   | No        | The representative's country.                                                |
| phone          | nonEmptyString | 1..1   | No        | The representative's phone number.                                           |
| fax            | nonEmptyString | 0..1   | No        | The representative's fax.                                                    |
| email          | nonEmptyString | 1..1   | No        | The representative's e-mail.                                                 |
| homepage       | nonEmptyString | 1..1   | No        | The representative's homepage.                                               |
| vatreg         | nonEmptyString | 1..1   | No        | The representative's vat registration number.                                |
| orgno          | nonEmptyString | 1..1   | No        | The representative's organization number.                                    |
| companytaxnote | boolean        | 1..1   | No        | Whether or not the company has a company tax note (Not available in Norway). |
| logotype       | base64Binary   | 1..1   | No        | The representative's logotype.                                               |
| modifiedby     | string         | 1..1   | No        | The name of the user that last modified the data.                            |
