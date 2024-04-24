---
layout: page
title: Api Reference
permalink: /invoice-service-2-0/api-reference/
parent: Invoice Service 2 0
---


# API Reference 

 
- [Methods](#APIReference-Methods)
  - [List payment alternatives](#APIReference-Listpaymentalternatives)
  - [Verify credit](#APIReference-Verifycredit)
  - [Sell invoice](#APIReference-Sellinvoice)
  - [Credit invoice](#APIReference-Creditinvoice)
  - [Configure invoice data](#APIReference-Configureinvoicedata)
  - [Retrieve invoice data
    configuration](#APIReference-Retrieveinvoicedataconfiguration)
- [Common API-types](#APIReference-CommonAPI-types)
  - [Payment alternative](#APIReference-Paymentalternative)
  - [Contact information](#APIReference-Contactinformation)
  - [Invoice line](#APIReference-Invoiceline)
  - [Pdf](#APIReference-Pdf)
  - [Error message](#APIReference-Errormessage)
The API is accessible in test and production via the following
endpoints:
Test:
[https://test.resurs.com/invoice-ws-v2](https://test.resurs.com/invoice-ws-v2)
Production:
[https://ws.butiksservice.resurs.com/invoice-v2](https://butiksservice.resurs.com/invoice-v2)
# Methods
## List payment alternatives** **
Use this to get a list of all available payment alternatives. This
should be called before making a purchase.
The payment alternatives can change (the id, description, etc.) and
should not be cached.
 
#### Operation
``` syntaxhighlighter-pre
GET /payment_alternatives?amount={amount}
```
#### Parameters
  
| Name   | Type    | Mandatory | Constraints     | Description                                                                   |
|--------|---------|-----------|-----------------|-------------------------------------------------------------------------------|
| amount | decimal |           | Positive number | If specified, only payment alternatives matching the amount will be returned. |
  
#### Response
  
| Name                 | Type                                                             | Mandatory | Constraints | Description |
|----------------------|------------------------------------------------------------------|-----------|-------------|-------------|
| payment_alternatives | array of [payment_alternative](#APIReference-PaymentAlternative) |           |             |             |
  
#### Response sample
``` syntaxhighlighter-pre
{
    "payment_alternatives": [
        {
            "id": "AF682069",
            "description": "SOVA FAKTURA TEST",
            "customer_type": "NATURAL",
            "min_amount": 1000,
            "max_amount": 50000
        },
        {
            "id": "LG686069",
            "description": "TEST FAKTURA MED DELBET",
            "customer_type": "NATURAL",
            "min_amount": 10,
            "max_amount": 50000
        },
        {
            "id": "NZ690101",
            "description": "TEST FÖRETAGSFAKTURA MT",
            "customer_type": "LEGAL",
            "min_amount": 1,
            "max_amount": 50000
        }
    ]
}
```
## Verify credit** **
Use this to verify the credit worthiness of an applicant. The request
should be made before submitting a sell request in order to verify that
the customer is ok. If the returned decision is "APPROVED" the purchase
flow can be continued and a subsequent sell request can be made. Making
a sell request when verify credibility returns a decision of anything
else than APPROVED will result in an error.  If the returned decision is
"MANUAL_INSPECTION" the PoS-system should inform the store staff  to
contact Resurs Bank customer service for inspection of the application.
If the application is approved this will be reflected on further calls
to verify credibility.
#### Operation
``` syntaxhighlighter-pre
POST /customer/verify_credibility
```
#### Request
  
| Name                   | Type                                                     | Mandatory |      Constraints      | Description                                                                                                                                                                                                                                                                                      |
|------------------------|----------------------------------------------------------|:---------:|:---------------------:|--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| payment_alternative_id | string                                                   |    x      |                       | The id of [payment_alternative](#APIReference-PaymentAlternative)                                                                                                                                                                                                                                |
| requested_amount       | decimal                                                  |     x     |    Positive number    | The requested amount of the credit application                                                                                                                                                                                                                                                   |
| government_id          | string                                                   |     x     | A valid government id | The government id of the liable payer. Either an organisation number or a national identification number. Use [www.personnummer.nu](http://www.personnummer.nu) to generate numbers. Please note that a date in the second, or higher, quarter shall be used due to test filter characteristics. |
| contact_information    | [contact_information](#APIReference-ContactInformation)  |     x     |                       | The contact persons information                                                                                                                                                                                                                                                                  |
  
#### Request sample
``` syntaxhighlighter-pre
{
    "payment_alternative_id": "AF682069",
    "government_id": "19910125-3905",
    "contact_information": {
        "email": "test@resurs.se",
        "phone": "0708-123456",
        "national_identification_number": "19910125-3905"
    },
    "requested_amount": 10000
}
```
#### Response
  
| Name            | Type    | Mandatory | Constraints                                 | Description                                                                                                                      |
|-----------------|---------|-----------|---------------------------------------------|----------------------------------------------------------------------------------------------------------------------------------|
| decision        | string  | x         | "APPROVED", "MANUAL_INSPECTION", "REJECTED" | Decision of the evaluation of the credit worthyness of the applicant. An invoice can only be sold if the decision is "APPROVED". |
| approved_amount | decimal | x         | Positive number.                            | Will never be greater than requested amount, and always zero if decision is anything else than APPROVED                          |
  
#### Response sample
``` syntaxhighlighter-pre
{
    "decision": "APPROVED",
    "approved_amount": 10000
}
```
## **Sell invoice**
Use this to make a purchase in the form of an invoice. In addition to
returning the invoice-PDF in the response the invoice can also be
delivered via e-mail (as attachment) or postal mail. The delivery option
is configured by setting the invoice_delivery_option.
Do not call sell invoice if verify credibility returned anything else
than APPROVED.
The amount fields on the invoice lines are not validated against total
amount.
 
**Operation  
**
``` syntaxhighlighter-pre
POST /invoice/sell
```
#### Request
  
| Name                     | Type                                                    | Mandatory | Constraints                                               | Description                                                                                                                                                                                                                                                                                                                                                                                                                              |
|--------------------------|---------------------------------------------------------|:---------:|-----------------------------------------------------------|------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| external_reference       | string                                                  |    x      | Unique per chain.a-z, A-Z, 0-9, "\_" and "-" are allowed. | Payment reference.**This identifier will be reported back in economic reports.Use an identifier that can easily be traced back to your system, such as order id.**                                                                                                                                                                                                                                                                       |
| payment_alternative_id   | string                                                  |     x     |                                                           | The id of [payment_alternative](#APIReference-PaymentAlternative)                                                                                                                                                                                                                                                                                                                                                                        |
| government_id            | string                                                  |     x     | A valid government id                                     | The government id of the liable payer. Either an organisation number or a national identification number                                                                                                                                                                                                                                                                                                                                 |
| contact_information      | [contact_information](#APIReference-ContactInformation) |     x     |                                                           | The contact persons information                                                                                                                                                                                                                                                                                                                                                                                                          |
| invoice_lines            | array of [invoice_line](#APIReference-InvoiceLine)      |     x     | Must contain at least one element                         |                                                                                                                                                                                                                                                                                                                                                                                                                                          |
| total_amount_without_vat | decimal                                                 |     x     |                                                           | Total amount without VAT                                                                                                                                                                                                                                                                                                                                                                                                                 |
| total_vat_amount         | decimal                                                 |     x     |                                                           | Total VAT amount                                                                                                                                                                                                                                                                                                                                                                                                                         |
| total_amount_with_vat    | decimal                                                 |     x     |                                                           | Total amount with VAT                                                                                                                                                                                                                                                                                                                                                                                                                    |
| invoice_number           | long                                                    |     x     | Positive number                                           |                                                                                                                                                                                                                                                                                                                                                                                                                                          |
| invoice_delivery_option  | string                                                  |     x     | "POSTAL", "EMAIL", "NONE"                                 | This determines how the invoice will be delivered to the customer. The "POSTAL"-option means that the invoice will be mailed by postal mail to the customer's address. The "EMAIL"-option means that the invoice will be delivered by e-mail to the supplied customer email. The "NONE"-option will not do any of the above. This option does not affect the response, which always contains the invoice PDF if the call was successful. |
| invoice_extra_data       | string                                                  |           |                                                           | Free-text field on the invoice                                                                                                                                                                                                                                                                                                                                                                                                           |
  
#### Request sample
``` syntaxhighlighter-pre
{
    "external_reference" : "79faa780-7b8e-11e4-82f8-0800200c9a66",
    "payment_alternative_id" : "NZ690101",
    "government_id": "19910125-3905",
    "contact_information": {
        "email": "test@resurs.se",
        "phone": "0708-123456",
        "national_identification_number": "19910125-3905"
    },
    "invoice_lines" : [
        {
            "article_id" : "sk-1",
            "article_number" : "1",
            "description" : "Lång smal skruv",
            "quantity" : 4,         
            "unit_measure" : "paket",           
            "unit_amount_without_vat" : 250.00,
            "vat_percentage" : 25,
            "total_vat_amount" : 252,
            "total_amount_with_vat" : 1252 
        },
        {
            "article_id" : "bit-2",
            "article_number" : "2",
            "description" : "Blandade bits för hemmasnickaren",
            "quantity" : 1,
            "unit_measure" : "st",
            "unit_amount_without_vat" : 103.92,
            "vat_percentage" : 25,
            "total_vat_amount" : 25.98,
            "total_amount_with_vat" : 129.9
        }
    ],
    "total_amount_without_vat" : 1103.92,
    "total_vat_amount" : 275.98,
    "total_amount_with_vat" : 1379.9,
    "invoice_number" : "103",
    "invoice_delivery_option" : "NONE",
    "invoice_extra_data" : "Data från kunden"
 }
```
#### Response
  
| Name | Type                     | Mandatory | Constraints | Description                    |
|------|--------------------------|:---------:|-------------|--------------------------------|
| pdf  | [Pdf](#APIReference-Pdf) |     x     |             | Invoice PDF encoded in base 64 |
  
#### Sample response
``` syntaxhighlighter-pre
{
    "pdf": {
        "pdfData": <base64 encoded pdf>
    }
}
```
## Credit invoice
Use this to credit an invoice.
#### Operation
``` syntaxhighlighter-pre
POST /invoice/credit
```
#### Request
  
| Name                     | Type                                               | Mandatory | Constraints                                                                                            | Description                                                                                                                                                                                                                                                                                                                                                                                                                                                  |
|--------------------------|----------------------------------------------------|:---------:|--------------------------------------------------------------------------------------------------------|--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| external_reference       | string                                             |    x      | This can be the same as the external reference from the sell request, but it must be unique otherwise. |                                                                                                                                                                                                                                                                                                                                                                                                                                                              |
| sell_reference           | string                                             |     x     |                                                                                                        | External reference from the invoice sell request                                                                                                                                                                                                                                                                                                                                                                                                             |
| invoice_lines            | array of [invoice_line](#APIReference-InvoiceLine) |     x     | Must contain at least one element                                                                      |                                                                                                                                                                                                                                                                                                                                                                                                                                                              |
| total_amount_without_vat | decimal                                            |     x     | Total amount without VAT                                                                               |                                                                                                                                                                                                                                                                                                                                                                                                                                                              |
| total_vat_amount         | decimal                                            |     x     | Total VAT amount                                                                                       |                                                                                                                                                                                                                                                                                                                                                                                                                                                              |
| total_amount_with_vat    | decimal                                            |     x     | Total amount with VAT                                                                                  |                                                                                                                                                                                                                                                                                                                                                                                                                                                              |
| invoice_number           | long                                               |     x     | Must be a positive number                                                                              |                                                                                                                                                                                                                                                                                                                                                                                                                                                              |
| invoice_delivery_option  | string                                             |     x     | "POSTAL", "EMAIL", "NONE"                                                                              | This determines how the invoice will be delivered to the customer. The "POSTAL"-option means that the invoice will be mailed by postal mail to the customer's address. The "EMAIL"-option means that the invoice will be delivered by e-mail to the supplied customer email in the sell request. The "NONE"-option will not do any of the above. This option does not affect the response, which always contains the invoice PDF if the call was successful. |
| invoice_extra_data       | string                                             |           |                                                                                                        | Free-text field on the invoice                                                                                                                                                                                                                                                                                                                                                                                                                               |
  
#### Sample request
``` syntaxhighlighter-pre
{
    "sell_reference" : "79faa780-7b8e-11e4-82f8-0800200c9a66",
    "external_reference" : "23aef167-4a1c-70a1-82f8-6775126a1c21",
    "invoice_lines" : [
        {
            "article_id" : "sk-1",
            "article_number" : "1",
            "description" : "Lång smal skruv",
            "quantity" : 4,         
            "unit_measure" : "paket",           
            "unit_amount_without_vat" : 250.00,
            "vat_percentage" : 25,
            "total_vat_amount" : 252,
            "total_amount_with_vat" : 1252 
        },
        {
            "article_id" : "bit-2",
            "article_number" : "2",
            "description" : "Blandade bits för hemmasnickaren",
            "quantity" : 1,
            "unit_measure" : "st",
            "unit_amount_without_vat" : 103.92,
            "vat_percentage" : 25,
            "total_vat_amount" : 25.98,
            "total_amount_with_vat" : 129.9
        }
    ],
    "total_amount_without_vat" : 1103.92,
    "total_vat_amount" : 275.98,
    "total_amount_with_vat" : 1379.9,
    "invoice_number" : 104
    "invoice_delivery_option" : "EMAIL",
    "invoice_extra_data" : "Data från kunden"
 }
```
#### Response
  
| Name | Type                     | Mandatory | Constraints | Description                    |
|------|--------------------------|:---------:|-------------|--------------------------------|
| pdf  | [Pdf](#APIReference-Pdf) |     x     |             | Invoice PDF encoded in base 64 |
  
#### Sample response
``` syntaxhighlighter-pre
{
    "pdf": {
        "pdfData": <base64 encoded pdf>
    }
}
```
## Configure invoice data
Use this to configure the information that should be printed on the
invoice. Each store must configure this information before making a sell
request.
#### **Operation**
``` syntaxhighlighter-pre
POST /configuration/store
```
#### Request
  
| Name           | Type     | Mandatory | Constraints  | Description          |
|----------------|----------|:---------:|:------------:|----------------------|
| name           | string   |    x      |              |                      |
| street         | string   |     x     |              |                      |
| zipcode        | string   |     x     | Only numbers |                      |
| city           | string   |     x     |              |                      |
| country        | string   |     x     |              |                      |
| phone          | string   |     x     |              |                      |
| fax            | string   |           |              |                      |
| email          | string   |     x     |              |                      |
| homepage       | string   |     x     |              |                      |
| vatreg         | string   |     x     |              |                      |
| orgnr          | string   |     x     | Only numbers |                      |
| companytaxnote | boolean  |     x     |              |                      |
| logotype       | byte\[\] |     x     |              | base64 encoded image |
  
#### Sample request
``` syntaxhighlighter-pre
{
    "name": "Resurs Bank",
    "street": "Ekslingan 9",
    "zipcode": "25467",
    "city": "Helsingborg",
    "country": "Sweden",
    "phone": "0727556898",
    "fax": "123456789",
    "email": "mail@resurs.se",
    "homepage": "www.resurs.se",
    "vatreg": "24598789",
    "orgnr": "25879945987",
    "companytaxnote": true,
    "logotype": "/9j/4AAQSkZJRgA.... base64 encoded image"
}
```
## Retrieve invoice data configuration
Use this to retrieve the stored invoice configuration of the store.
#### **Operation **
``` syntaxhighlighter-pre
GET /configuration/store
```
#### Sample response
``` syntaxhighlighter-pre
{
    "name": "Resurs Bank",
    "street": "Ekslingan 9",
    "zipcode": "25467",
    "city": "Helsingborg",
    "country": "Sweden",
    "phone": "0727556898",
    "fax": "123456789",
    "email": "mail@resurs.se",
    "homepage": "www.resurs.se",
    "vatreg": "24598789",
    "orgnr": "25879945987",
    "companytaxnote": true,
    "logotype": <base64 encoded image>
}
```
# Common API-types
## Payment alternative
Payment alternative
  
| Property Name | Type    | Mandatory | Constraints    | Description                                                                                                                                              |
|---------------|---------|-----------|----------------|----------------------------------------------------------------------------------------------------------------------------------------------------------|
| id            | string  | x         |                | Payment alternative id. Use this id to specify payment alternative id in verify credibility and sell call.                                               |
| description   | string  | x         |                | Description of the payment alternative                                                                                                                   |
| customer_type | string  | x         | NATURAL, LEGAL |                                                                                                                                                          |
| min_amount    | decimal | x         |                | The minimum allowed amount for this payment alternative. Applying for an amount with a payment alternative less than min_amount will result in an error. |
| max_amount    | decimal | x         |                | The maximum allowed amount for this payment alternative. Applying for an amount with a payment alternative more than max_amount will result in an error. |
  
## Contact information
Holds information about the contact person.
If the liable payer is an organisation, the contact person may be
different from the liable payer.
  
| Property Name                  | Type   | Mandatory | Constraints            | Description                                         |
|--------------------------------|--------|-----------|------------------------|-----------------------------------------------------|
| email                          | string | x         | A valid email address. | The contact persons email address.                  |
| phone                          | string | x         | A valid phone number.  | The contact persons phone number.                   |
| national_identification_number | string |           |                        | The contact persons national identification number. |
  
#### Sample
``` syntaxhighlighter-pre
{
    "email" : "customer@mail.com",
    "phone" : "0700-123456",
    "national_identification_number" : "85052312345"
}
```
## Invoice line
Representation of an invoice line.
  
| Property Name           | Type   | Mandatory | Constraints                  | Description                                   |
|-------------------------|--------|-----------|------------------------------|-----------------------------------------------|
| article_id              | string | x         | Min length: 1                | The line identity                             |
| article_number          | string | x         | Min length: 1Max length: 30  | Article number of the item.                   |
| description             | string | x         | Min length: 1Max length: 100 | A description of the product.                 |
| quantity                | double | x         |                              | The quantity of the product.                  |
| unit_measure            | string | x         | Min length: 1Max length: 10  | The unit the product quantity is measured in. |
| unit_amount_without_vat | double | x         |                              | The amount with VAT per unit.                 |
| vat_percentage          | double | x         | Min value: 0Max value: 100   |                                               |
| total_vat_amount        | double | x         |                              | The total item VAT amount.                    |
| total_amount_with_vat   | double | x         |                              | The total item amount, including VAT.         |
  
#### Example
``` syntaxhighlighter-pre
{
  "article_id" : "sc-001",
  "article_number" : "1"
  "description" : "Screws 40x8 200/package",
  "quantity" : 5,
  "unit_measure" : "package",
  "unit_amount_without_vat" : 200.0,
  "vat_percentage" : 25,
  "total_vat_amount" : 250
  "total_amount_with_vat" : 1250
}
```
## Pdf
  
| Property Name | Type   | Mandatory | Constraints | Description            |
|---------------|--------|-----------|-------------|------------------------|
| pdfData       | string | x         |             | base 64 encoded string |
  
#### Example
``` syntaxhighlighter-pre
{
  "pdfData" :  <base64 encoded pdf>
}
```
## Error message
Errors (HTTP-status 4xx or 5xx) are structured as a message with the
following structure.
  
| Property Name | Type   | Mandatory | Constraints                                                                                                                              | Description                  |
|---------------|--------|:---------:|------------------------------------------------------------------------------------------------------------------------------------------|------------------------------|
| error_type    | string |     x     | "SELL_INVOICE_ERROR", "PAYMENT_ALTERNATIVE_ERROR", "CREDIT_INVOICE_ERROR", "VERIFY_CREDIBILITY_ERROR", "ARGUMENT_ERROR", "UNKNOWN_ERROR" |                              |
| error_message | string |     x     |                                                                                                                                          | Message describing the error |
  
