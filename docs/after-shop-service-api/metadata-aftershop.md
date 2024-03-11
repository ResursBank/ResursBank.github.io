---
layout: page
title: Metadata Aftershop
permalink: /after-shop-service-api/metadata-aftershop/
parent: After Shop Service Api
---


# MetaData AfterShop 

## addMetaData
*Adds meta data to the payment. The meta data can be used to register
additional information about the payment, and they may also be used for
searching. Currently, meta data cannot be removed from a payment.
However, existing values can be over-written.*

**Input (Literal)**

| Name       | Type                      | Occurs | Nillable? | Description                  |
|------------|---------------------------|--------|-----------|------------------------------|
| paymentId  | **[id](/development/api-types/simple-types/)** | 1..1   | No        | The identity of the payment. |
| key        | string                    | 1..1   | No        | The meta data key.           |
| value      | string                    | 0..1   | No        | The meta data value.         |

**Faults**

| Name                     | Content                                  | Description                                                    |
|--------------------------|------------------------------------------|----------------------------------------------------------------|
| ECommerceErrorException  | **[ECommerceError](/development/api-types/ecommerceerror/)**     | Failed to add meta data to the payment. See error for details. |

### What & why
Key/value data and its additional information in an order, determined by
the e-retailer. This can be added to the order and can later be useful
when [searching](/after-shop-service-api/find-payments/) for a payment. It can be anything, like
information about the shipment. You can manage metadata through
[**Merchant Portal**] or using the **[aftershop
webservice](/after-shop-service-api/)**

#### What is metadata?
In short, it is key/value data piggybacked on the payment.

Read here: [Associated metadata](concepts-and-domain)

#### Recognized keys and meaning
Generally we don't look at the metadata. Listed below are the exceptions
to that rule.

| Key name      | Expected format   | Description                                                                                                                                                                                                    |
|---------------|-------------------|----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| invoiceExtRef | String. 46 chars. | In the case that the payment generates invoices and credit notes this value will be printed as 'Your reference', for example the sales person responsible. Mostly for company invoices. |
| CustomerId    | String. 20 chars. | In the case that the payment generates invoices and credit notes this value will be printed as 'Customer Id'                                                                            |

![](../../attachments/3440674/5570827.png)

### Introduction
Adds meta data to the payment. The meta data can be used to register
additional information about the payment, and they may also be used for
searching. Currently, meta data cannot be removed from a payment.
However, existing values can be over-written.

**Example**
```xml
<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:aft="http://ecommerce.resurs.com/v4/msg/aftershopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <aft:addMetaData>
         <paymentId>Sess-1346079637802-2201</paymentId>
         <key>Transport</key>
         <!--Optional:-->
         <value>Use airline transport</value>
      </aft:addMetaData>
   </soapenv:Body>
</soapenv:Envelope>
```
