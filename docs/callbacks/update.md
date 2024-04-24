---
layout: page
title: Update
permalink: /callbacks/update/
parent: Callbacks
---


# UPDATE 
  
|           | Name        | Description                                                                            |
|-----------|-------------|----------------------------------------------------------------------------------------|
| ID        | `UPDATE`    | The update event ID.                                                                   |
| Parameter | `paymentId` | Payment ID (was sent to us as` `**`preferredPaymentId`**` ` in the `bookPayment` call) |
  
### Trigger
Will be sent when a payment is updated. 
  
Resurs Bank will do a HTTP/POST call with parameter `paymentId` and the
JSON for [paymentDiff](/development/api-types/paymentdiff) to the registered URL.

**Example registerEventCallback**
```xml
<S:Envelope xmlns:S="http://schemas.xmlsoap.org/soap/envelope/">
  <S:Body>
    <ns0:registerEventCallback xmlns:ns0="http://ecommerce.resurs.com/v4/msg/configuration" xmlns:ns1="http://ecommerce.resurs.com/v4/msg/exception">
      <eventType>UPDATE</eventType>
      <uriTemplate>https://host.com/rest/resursbank_checkout/update/paymentId/{paymentId}/digest/{digest}</uriTemplate>
      <basicAuthUserName>UserNameIfBasicAccessAuthenticationIsUsed</basicAuthUserName>
      <basicAuthPassword>PasswordIfBasicAccessAuthenticationIsUsed</basicAuthPassword>
      <digestConfiguration>
        <digestAlgorithm>SHA1</digestAlgorithm>
        <digestParameters>paymentId</digestParameters>
        <digestSalt>SecretHashSalt</digestSalt>
      </digestConfiguration>
    </ns0:registerEventCallback>
  </S:Body>
</S:Envelope>   
```
  
Resurs Bank will make a HTTP/POST call:
*https://host.com/rest/resursbank_checkout/update/paymentId/10000016/digest/C60345B6E58FD0B363FD2904A39EBB03442CF778*
[](https://host.com/rest/resursbank_checkout/update/paymentId/10000016/digest/C60345B6E58FD0B363FD2904A39EBB03442CF778)

**Example of a POST call**

```json lines
--* Example 1 *--
{
    "paymentDiff": {
        "type": "ANNUL",
        "transactionId": null,
        "created": 1473258094600,
        "createdBy": null,
        "paymentSpecification": {
            "paymentSpecificationLines": null,
            "totalAmount": 24,
            "totalVatAmount": 6,
            "bonusPoints": 0
        },
        "orderId": null,
        "invoiceId": null
    }
}
--* Exempel 2 *--
{
    "paymentDiff": {
        "type": "DEBIT",
        "transactionId": "TrD-1473258203595-2404",
        "created": 1473258212019,
        "createdBy": "B User",
        "paymentSpecification": {
            "paymentSpecificationLines": [
                {
                    "id": "1",
                    "artNo": "NUT-001",
                    "description": "Nut (M8)",
                    "quantity": 10,
                   "unitMeasure": "st",
                    "unitAmountWithoutVat": 0.8,
                    "vatPct": 25,
                    "totalVatAmount": 2,
                    "totalAmount": 8
                },
                {
                    "id": "2",
                    "artNo": "BOLT-002",
                    "description": "Bolt (M8x125mm)",
                    "quantity": 10,
                    "unitMeasure": "st",
                    "unitAmountWithoutVat": 1.6,
                    "vatPct": 25,
                    "totalVatAmount": 4,
                    "totalAmount": 16
                }
            ],
            "totalAmount": null,
            "totalVatAmount": 6,
            "bonusPoints": 0
        },
        "orderId": "Ord-1473258203595-2404",
        "invoiceId": null
    }
}
```
