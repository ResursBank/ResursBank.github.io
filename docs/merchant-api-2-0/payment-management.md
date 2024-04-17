---
layout: page
title: Payment Management
permalink: /merchant-api-2-0/payment-management/
parent: Merchant Api 2.0
nav_order: 31
---


## Payment Management 


| Callback Status | Possible Actions                                 |
|:----------------|:-------------------------------------------------|
| AUTHORIZED      | CAPTURE CANCEL                                   |
| CAPTURED        | REFUND                                           |
| FROZEN          | await for callback-status AUTHORIZED or REJECTED |

**What can I find here?**
- [Capture payment](#capture-payment)
- [Refund payment](#refund-payment)
- [Cancel payment](#cancel-payment)
- [Postman-collection of the requests
  above](#postman-collection-of-the-requests-above)

## Capture payment
This call is used to capture a payment after the payment is created.  
If no order lines are supplied, then all not yet captured order lines
will be captured. 

URL to capture payment:
[https://merchant-api.integration.resurs.com/v2/payments/](https://merchant-api.integration.resurs.com/v2/payments/){payment_id}/capture/captureture

Link to the call in swagger documentation: **[Capture
Payment](https://merchant-api.integration.resurs.com/docs/v2/merchant_payments_v2#/Payment%20management/capturePayment)**

**Curl to capture the payment**

> curl --location --request POST
> 'https://merchant-api.integration.resurs.com/v2/payments/{payment_id}/capture/c'--header
> 'Content-Type: application/json' \\-header 'Authorization: Bearer
> \<TOKEN\>' \\-data-raw '{ "creator": "fictive@resurs.com",
> "orderLines": \[ { "description": "Book", "quantity": 1,
> "quantityUnit": "pcs", "vatRate": 25, "totalAmountIncludingVat": 500.0
> } \] }

## Refund payment
This call is used to refund a payment that is captured.   
If no order lines are supplied, then all captured not yet refunded order
lines will be refunded. 

URL to refund payment:
[https://merchant-api.integration.resurs.com/v2/payments/](https://merchant-api.integration.resurs.com/v2/payments/){payment_id}[/](https://web-integration-mock-merchant-api-portal.integration.resurs.com/v2/payments/%7Bpayment_id%7D/capture)refund

Link to the call in swagger documentation: **[Refund
Payment](https://merchant-api.integration.resurs.com/docs/v2/merchant_payments_v2#/Payment%20management/refundPayment)**

**Curl to refund the payment**

> curl --location --request POST
> 'https://merchant-api.integration.resurs.com/v2/payments/{payment_id}/refund'--header
> 'Content-Type: application/json' \\-header 'Authorization: Bearer
> \<TOKEN\>' \\-data-raw '{ "creator": "fictive@resurs.com",
> "orderLines": \[ { "description": "Book", "quantity": 1,
> "quantityUnit": "pcs", "vatRate": 25, "totalAmountIncludingVat": 500.0
> } \] }

## Cancel payment
This call is used to cancel a payment that is created but not yet
captured.   
If no order lines are supplied, everything that can be canceled will be
canceled.  

URL to cancel payment:
[https://merchant-api.integration.resurs.com/v2/payments/](https://merchant-api.integration.resurs.com/v2/payments/){payment_id}[/ca](https://web-integration-mock-merchant-api-portal.integration.resurs.com/v2/payments/%7Bpayment_id%7D/capture)ncel

Link to the call in swagger documentation: **[Cancel
Payment](https://merchant-api.integration.resurs.com/docs/v2/merchant_payments_v2#/Payment%20management/cancel)**

**Curl to cancel the payment**

> curl --location --request POST
> 'https://merchant-api.integration.resurs.com/v2/payments/{payment_id}/cancel'--header
> 'Content-Type: application/json' \\-header 'Authorization: Bearer
> \<TOKEN\>' \\-data-raw '{ "creator": "fictive@resurs.com",
> "orderLines": \[ { "description": "Book", "quantity": 1,
> "quantityUnit": "pcs", "vatRate": 25, "totalAmountIncludingVat": 500.0
> } \] }

### Postman collection of the requests above

<details>
  <summary>Expand</summary>


```json
{
	"info": {
		"_postman_id": "57f6d60b-5681-4400-a608-29cd81f37add",
		"name": "Payment management for partners",
		"schema": "https://schema.getpostman.com/json/collection/v2.1.0/collection.json"
	},
	"item": [
		{
			"name": "Capture Payment",
			"event": [
				{
					"listen": "test",
					"script": {
						"exec": [
							"",
							""
						],
						"type": "text/javascript"
					}
				},
				{
					"listen": "prerequest",
					"script": {
						"exec": [
							"console.log('Capture payment v2');",
							""
						],
						"type": "text/javascript"
					}
				}
			],
			"request": {
				"auth": {
					"type": "bearer",
					"bearer": [
						{
							"key": "token",
							"value": "{{myTokenPaymentV2}}",
							"type": "string"
						}
					]
				},
				"method": "POST",
				"header": [],
				"body": {
					"mode": "raw",
					"raw": "{\n  \"creator\": \"salesperson/system\",\n  \"orderLines\": [\n    {\n        \"description\": \"Book\",\n        \"quantity\": 1,\n        \"quantityUnit\": \"pcs\",\n        \"vatRate\": 25,\n        \"totalAmountIncludingVat\": 500.0\n        }\n  ]\n}",
					"options": {
						"raw": {
							"language": "json"
						}
					}
				},
				"url": {
					"raw": "https://merchant-api.integration.resurs.com/v2/payments/{{payment_id}}/capture",
					"protocol": "https",
					"host": [
						"merchant-api",
						"integration",
						"resurs",
						"com"
					],
					"path": [
						"v2",
						"payments",
						"{{payment_id}}",
						"capture"
					]
				}
			},
			"response": []
		},
		{
			"name": "Refund Payment",
			"event": [
				{
					"listen": "test",
					"script": {
						"exec": [
							""
						],
						"type": "text/javascript"
					}
				},
				{
					"listen": "prerequest",
					"script": {
						"exec": [
							"console.log('Capture payment v2');",
							""
						],
						"type": "text/javascript"
					}
				}
			],
			"request": {
				"auth": {
					"type": "bearer",
					"bearer": [
						{
							"key": "token",
							"value": "{{myTokenPaymentV2}}",
							"type": "string"
						}
					]
				},
				"method": "POST",
				"header": [],
				"body": {
					"mode": "raw",
					"raw": "{\n  \"creator\": \"salesperson/system\",\n  \"orderLines\": [\n    {\n        \"description\": \"Book\",\n        \"quantity\": 1,\n        \"quantityUnit\": \"pcs\",\n        \"vatRate\": 25,\n        \"totalAmountIncludingVat\": 500.0\n        }\n  ]\n}",
					"options": {
						"raw": {
							"language": "json"
						}
					}
				},
				"url": {
					"raw": "https://merchant-api.integration.resurs.com/v2/payments/{{payment_id}}/refund",
					"protocol": "https",
					"host": [
						"merchant-api",
						"integration",
						"resurs",
						"com"
					],
					"path": [
						"v2",
						"payments",
						"{{payment_id}}",
						"refund"
					]
				}
			},
			"response": []
		},
		{
			"name": "Cancel Payment",
			"event": [
				{
					"listen": "test",
					"script": {
						"exec": [
							""
						],
						"type": "text/javascript"
					}
				},
				{
					"listen": "prerequest",
					"script": {
						"exec": [
							"console.log('Cancel payment v2');",
							""
						],
						"type": "text/javascript"
					}
				}
			],
			"request": {
				"auth": {
					"type": "bearer",
					"bearer": [
						{
							"key": "token",
							"value": "{{myTokenPaymentV2}}",
							"type": "string"
						}
					]
				},
				"method": "POST",
				"header": [],
				"body": {
					"mode": "raw",
					"raw": "{\n  \"creator\": \"salesperson/system\",\n  \"orderLines\": [\n    {\n        \"description\": \"Book\",\n        \"quantity\": 1,\n        \"quantityUnit\": \"pcs\",\n        \"vatRate\": 25,\n        \"totalAmountIncludingVat\": 500.0\n        }\n  ]\n}",
					"options": {
						"raw": {
							"language": "json"
						}
					}
				},
				"url": {
					"raw": "https://merchant-api.integration.resurs.com/v2/payments/{{payment_id}}/cancel",
					"protocol": "https",
					"host": [
						"merchant-api",
						"integration",
						"resurs",
						"com"
					],
					"path": [
						"v2",
						"payments",
						"{{payment_id}}",
						"cancel"
					]
				}
			},
			"response": []
		}
	]
}
```

</details>
