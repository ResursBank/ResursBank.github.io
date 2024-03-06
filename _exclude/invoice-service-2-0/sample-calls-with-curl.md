---
layout: page
title: Sample Calls With Curl
permalink: /invoice-service-2-0/sample-calls-with-curl/
parent: Invoice Service 2 0
---


# Sample calls with cURL 
Created by User2, last modified by User10 on 2015-01-26
## Initial store configuration
Before an invoice can be generated the contact information and logotype
must be configured for the store. The logotype must be encoded in
base64.
**POST configuration/store** Expand source
``` syntaxhighlighter-pre
$ curl -v <endpoint>/configuration/store -H 'Content-Type:application/json' -H 'Authorization:<credentials>' -d
'{
    "name": "Resurs Bank",
    "street": "Ekslingan 9",
    "zipcode": "25467",
    "city": "Helsingborg",
    "country": "Sweden",
    "phone": "042-382000",
    "fax": "042-202972",
    "email": "test@resurs.se",
    "homepage": "www.resurs.se",
    "vatreg": "24598789",
    "orgnr": "25879945987",
    "companytaxnote": true,
    "logotype": "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"
}'
```
You can also verify the information with a GET request to the same
resource:
**GET configuration/store**
``` syntaxhighlighter-pre
$ curl -v -X GET <endpoint>/configuration/store -H "Content-Type:application/json" -H"Authorization:<credentials>"
```
 
Continue to the next step if everything went ok.
 
 
## Sell invoice
Start by listing the payment alternatives:
**GET payment_alternatives**
``` syntaxhighlighter-pre
 $ curl -v -X GET <endpoint>/payment_alternatives -H "Content-Type:application/json" -H"Authorization:<credentials>"
```
The response contains all available payment methods:
**GET payment_alternatives Response**
``` syntaxhighlighter-pre
{"payment_alternatives":[{"id":"M3310115","description":"TEST FTG BUTIKSSERVICE","customer_type":"LEGAL","min_amount":1000.00,"max_amount":100000.00},{"id":"AF682069","description":"FAKTURA TEST","customer_type":"NATURAL","min_amount":1000.00,"max_amount":50000.00},{"id":"LG686069","description":"TEST FAKTURA MED DELBET","customer_type":"NATURAL","min_amount":10.00,"max_amount":50000.00},{"id":"NZ690101","description":"TEST FÖRETAGSFAKTURA MT","customer_type":"LEGAL","min_amount":1.00,"max_amount":50000.00}]}
```
We choose payment alternative "AF682069" and next we call
verify_credibility:
**POST verify_credibility**
``` syntaxhighlighter-pre
$ curl -v <endpoint>/customer/verify_credibility -H 'Content-Type:application/json' -H 'Authorization:<credentials>' -d
'{
    "payment_alternative_id" : "AF682069",
    "requested_amount" : 1488,
    "government_id" : "<government-id>",
    "contact_information" : {
        "email" : "test@resurs.se",
        "phone" : "0708-123456"
    }
}'
```
We get the following response:
**POST verify_credibility Response**
``` syntaxhighlighter-pre
{"decision":"APPROVED","approved_amount":1488}
```
Because we got decision "APPROVED" we continue with sell:
**POST invoice/sell**
``` syntaxhighlighter-pre
$ curl -v <endpoint>/invoice/sell -H 'Content-Type:application/json' -H 'Authorization:<credentials>' -d
'{  
    "payment_alternative_id" : "AF682069",
    "government_id" : "<government-id>",
    "contact_information" : {
        "email" : "test@resurs.se",
        "phone" : "0708-123456"
    },
    "external_reference" : "TEST0000001",  
    "invoice_number" : 100000001,
    "invoice_lines" : [
        {
            "article_id" : "BOLT-012",
            "description" : "Bolt (M8x125mm)",
            "unit_measure" : "st",
            "quantity" : 300,
            "unit_amount_without_vat" : 3.98,
            "unit_vat_amount" : 1.00
        },
        {
            "article_id" : "NUT-001",
            "description" : "Nut (M8)",
            "unit_measure" : "st",
            "quantity" : 300,
            "unit_amount_without_vat" : 0.98,
            "unit_vat_amount" : 0.25
        } 
    ],
    "total_amount_without_vat" : 1488,
    "total_vat_amount" : 372,
    "total_amount_with_vat" : 1860,
    "invoice_delivery_option" : "NONE",
    "invoice_extra_data" : "Data från kunden"
}'
```
The response contains the [invoice PDF](../../attachments/3441365/3801167.pdf)
encoded in base 64.
 
**POST invoice/sell Response**
``` syntaxhighlighter-pre
 {"pdf":{"pdfData":<base64 encoded PDF>}}
```
## Credit invoice
To credit the invoice a sell reference must be supplied. This is the
external_reference from the sell payload. To credit an invoice make the
following request:
**POST invoice/credit**
``` syntaxhighlighter-pre
$ curl -v <endpoint>/invoice/credit -H 'Content-Type:application/json' -H 'Authorization:<credentials>' -d
'{  
    "sell_reference" : "TEST0000001",  
    "external_reference" : "TEST0000002",  
    "invoice_number" : 100000002,
    "invoice_lines" : [
        {
            "article_id" : "BOLT-012",
            "description" : "Bolt (M8x125mm)",
            "unit_measure" : "st",
            "quantity" : 300,
            "unit_amount_without_vat" : 3.98,
            "unit_vat_amount" : 1.00
        },
    ],
    "total_amount_without_vat" : 1194,
    "total_vat_amount" : 298.50,
    "total_amount_with_vat" : 1492.50,
    "invoice_delivery_option" : "NONE",
    "invoice_extra_data" : "Data från kunden"
}'
```
And the response contains the [invoice
PDF](../../attachments/3441365/3801168.pdf) encoded in base 64.
**POST invoice/credit Response**
``` syntaxhighlighter-pre
 {"pdf":{"pdfData":<base64 encoded PDF>}}
```
