---
layout: page
title: specLine
permalink: /development/api-types/specline/
parent: Api Types
grand_parent: Development
---



# specLine 
The payment line (item) specification. These can be used to provide
detailed information about the contents of the payment.  
Contains elements as defined in the following table.

| Component            | Type                           | Occurs | Nillable? | Description                                      |
|----------------------|--------------------------------|--------|-----------|--------------------------------------------------|
| id                   | **[id](/development/api-types/simple-types/)**      | 1..1   | No        | The line identity                                |
| artNo                | string                         | 1..1   | No        | Article number of the item. (Max 100 characters) |
| description          | string                         | 1..1   | Yes       | The item description.                            |
| quantity             | decimal                        | 1..1   | No        | The line quantity.                               |
| unitMeasure          | string                         | 1..1   | No        |                                                  |
| unitAmountWithoutVat | decimal                        | 1..1   | No        | The unit amount without VAT.                     |
| vatPct               | **[percent](/development/api-types/simple-types/)** | 1..1   | No        | The VAT percentage.                              |
| totalVatAmount       | decimal                        | 1..1   | No        | The total item VAT amount.                       |
| totalAmount          | decimal                        | 1..1   | No        | The total item amount, including VAT.            |
| deliveryDate         | date                           | 0..1   | No        | Estimated delivery date                          |

```xml
<paymentSpec>
    <specLines>
        <id>1</id>
        <artNo>NUT-001</artNo>
        <description>Nut (M8)</description>
        <quantity>10</quantity>
        <unitMeasure>st</unitMeasure>
        <unitAmountWithoutVat>0.80</unitAmountWithoutVat>
        <vatPct>25</vatPct>
        <totalVatAmount>2.00</totalVatAmount>
        <totalAmount>10.00</totalAmount>
        <deliveryDate>yyyyMMdd</deliveryDate>
    </specLines>
</paymentSpec>
```
