---
layout: page
title: Merchant Api E-Commerce
permalink: /merchant-api-2-0/merchant-api-e-commerce/
parent: Merchant Api 2.0
---


# Merchant API E-Commerce 


> Generic, explanational documentationPlease note that the flow and its
> requests below is an example and other flows or variations may exist.
> Please advice with onboarding@resurs.se regarding specific actions
> prior to mapping up any logic or beginning any coding.

**What can I find here?**
- [Basic API flow](#basic-api-flow)
  - [Authentication](#authentication)
  - [Get Store ID](#get-store-id)
  - [Get available payment
    methods](#get-available-payment-methods)

- [Create Payment](#create-payment)
  - [Create payment](#create-payment)
    - [Create payment-responses and what to do
      next](#create-payment-responses-and-what-to-do-next)

- [Postman-collection of the requests
  above](#postman-collection-of-the-requests-above)

![](../../attachments/mapiEcom.png)

## Basic API flow
### **Authentication**
Every request requires an authorization header with a Bearer-token. A
token lasts for 3599 seconds. To get a token you may use your
test-credentials received from Resurs Bank.

URL to get token:
[https://merchant-api.integration.resurs.com/oauth2/token](https://merchant-api.integration.resurs.com/oauth2/token)

- Client ID
- Client Secret
- Scope= merchant-api

Link to the call in swagger documentation: **[Get
Token](https://merchant-api.integration.resurs.com/docs/oauth2#/Oauth2%20token%20resource/authorizeObject_1_1)**

**Curl to get token**

> curl --location --request POST
> 'https://merchant-api.integration.resurs.com/oauth2/token'--header
> 'accept: application/json' \\-header 'Content-Type:
> application/x-www-form-urlencoded' \\-data-urlencode 'client_id=fill
> out client_id' \\-data-urlencode 'client_secret=fill out
> client_secret' \\-data-urlencode 'scope=merchant-api'
> \\-data-urlencode 'grant_type=client_credentials'

### Get Store ID
**Get available stores**

A client may have access to multiple stores, therefore we need to know
which store to make the application or payment for.  
This can be done by getting the available stores. Each store has a
store-id. This id will be used in the next step to specify for which
store we would like to get the payment methods.

URL to get available stores:
[https://merchant-api.integration.resurs.com/v2/stores](https://merchant-api.integration.resurs.com/v2/stores?sort=popularName,asc&sort=nationalStoreId,desc&size=2000)

Link to the call in swagger documentation: **[Get
Stores](https://merchant-api.integration.resurs.com/docs/v2/merchant_stores_v2#/Store%20information/getStores)**

**Curl to get available stores**

> curl --location --request GET
> 'https://merchant-api.integration.resurs.com/v2/stores'--header
> 'Authorization: Bearer \<TOKEN\>'

### Get available payment methods
A store may have multiple payment methods available. The list of
available payment methods will show what payment methods there are to
use from at the chosen store. Do not forget to sort out the payment
methods which min-/max purchase limit are outside the cart value. If you
input an amont in the request, the API will automatically not show the
unavailable payment methods for you - you do not need to sort out
payment methods yourselves.  
Each payment method has a paymentmethod id, which will be used in the
next step, when the payment is created.  
When presenting the payment methods to the customer, please note that by
law you are required to display our terms/link to our terms regarding
the credit payment methods. The link is found in this same request with
"*type: PRICE_INFO*"

URL to get available payment methods:
[https://merchant-api.integration.resurs.com/v2/stores/{store_id}/payment_methods](https://merchant-api.integration.resurs.com/v2/stores/%7Bstore_id%7D/payment_methods)

Link to the call in swagger documentation**: [Get Payment
Methods](https://merchant-api.integration.resurs.com/docs/v2/merchant_stores_v2#/Payment%20methods%20information/getPaymentMethodsByStore)**

**Curl to get available payment methods**

> curl --location --request POST
> 'https://merchant-api.integration.resurs.com/v2/stores/{store_id}/payment_methods'--header
> 'Content-Type: application/json' \\-header 'Authorization: Bearer
> \<TOKEN\>'

## **Create Payment**
### **Create payment**
The call below is used to create a new payment and authorize the
payment.

- orderReference = your internal order reference, if it's not provided
  by you it will be set by Resurs Bank. Will be provided in accounting
  file if not another value is provided in capture-request later on.

- initiatedOnCustomersDevice = true becuase the payment in the webshop's
  checkout is initiated on the customers device
- handleFrozenPayments = payments may be frozen for a short time due to
  fraud controls. When a payment is frozen the customer is informed that
  the purchase is ready, but the goods shall not be shipped until the
  payment is captured

For further information regarding initiatedOnCustomersDevice and
handleFrozenPayments, please go to "Schema" → "CreatePaymentRequest" →
"Options" ; [Create Payment
Options](https://merchant-api.resurs.com/docs/v2/merchant_payments_v2#/Payment+authorization/createPayment)

URL to create payment:
[https://merchant-api.integration.resurs.com/v2/payments](https://merchant-api.integration.resurs.com/v2/payments)

Link to the call in swagger documentation: **[Create
Payment](https://merchant-api.integration.resurs.com/docs/v2/merchant_payments_v2#/Payment%20authorization/createPayment)**

**Curl to create payment**

> curl --location --request POST
> 'https://merchant-api.integration.resurs.com/v2/payments' \\-header
> 'Authorization: Bearer \<TOKEN\>' \\-header 'Content-Type:
> application/json' \\-data-raw { "storeId": "{{store_id}}",
> "paymentMethodId": "{{payment_method_id}}", "order": { "orderLines":
> \[ { "description": "Book", "quantity": 1, "quantityUnit": "pcs",
> "vatRate": 25, "totalAmountIncludingVat": 500.0 } \],
> "orderReference": "orderref-12345" }, "customer": { "customerType":
> "NATURAL", "governmentId": "xxxxx", "email": "xxx@yyy.com",
> "mobilePhone": "xxxxx"   }, "options": { "initiatedOnCustomersDevice":
> true, "handleFrozenPayments": true, "callbacks": { "authorization": {
> "url": "{{callback_url_authorization}}" }, "management": { "url":
> "{{callback_url_management}}" } }, "redirectionUrls": { "customer": {
> "failUrl": "{{fail_url_customer}}", "successUrl":
> "{{success_url_customer}}" }, "timeToLiveInMinutes": 120 } }

#### Create payment responses and what to do next
status:
TASK_REDIRECTION_REQUIRED → redirect customer to "customerUrl" and await callback. 
Callbacks with callback-status AUTHORIZED, REJECTED, FROZEN or CAPTURED can be received before or after redirection is performed. 

### **Postman collection of the requests above**
```json
{
	"info": {
		"_postman_id": "3e1bf2a2-f31d-46a6-996d-01b817717d05",
		"name": "Payment v2",
		"schema": "https://schema.getpostman.com/json/collection/v2.1.0/collection.json",
		"_exporter_id": "5532416"
	},
	"item": [
		{
			"name": "Get token",
			"event": [
				{
					"listen": "test",
					"script": {
						"exec": [
							"const response = pm.response.json();",
							"pm.globals.set(\"myTokenPaymentV2\", response.access_token);",
							"pm.test(\"Status code is 200\", function () {",
							"    pm.response.to.have.status(200);",
							"});"
						],
						"type": "text/javascript"
					}
				},
				{
					"listen": "prerequest",
					"script": {
						"exec": [
							"console.log('Create Token');",
							"",
							"        ",
							"        ",
							"        "
						],
						"type": "text/javascript"
					}
				}
			],
			"request": {
				"method": "POST",
				"header": [],
				"body": {
					"mode": "raw",
					"raw": "{\n    \"client_id\":\"atesta_mapi\",\n    \"client_secret\":\"resurs123\",\n    \"scope\":\"mock-merchant-api\",\n    \"grant_type\":\"client_credentials\"\n}",
					"options": {
						"raw": {
							"language": "json"
						}
					}
				},
				"url": {
					"raw": "{{baseUrl}}/oauth2/token",
					"host": [
						"{{baseUrl}}"
					],
					"path": [
						"oauth2",
						"token"
					]
				}
			},
			"response": []
		},
		{
			"name": "stores  AND clear global variable",
			"event": [
				{
					"listen": "test",
					"script": {
						"exec": [
							"const stores = pm.response.json();",
							"// pm.globals.set(\"myStore\", stores.content[0].id);",
							"for (var i = 0 ; i < stores.content.length ; i ++) {",
							"     if (stores.content[i][\"nationalStoreId\"] == \"1016\") {",
							"        pm.globals.set(\"myStorePaymentV2\", stores.content[i].id);",
							"        console.log(stores.content[i].name)",
							"        break;",
							"    }",
							"    }",
							"",
							"pm.test(\"Status code is 200\", function () {",
							"    pm.response.to.have.status(200);",
							"     });",
							"     "
						],
						"type": "text/javascript"
					}
				},
				{
					"listen": "prerequest",
					"script": {
						"exec": [
							"console.log('Hämta StoreId');",
							"pm.globals.unset(\"myStorePaymentV2\");",
							"pm.globals.unset(\"mycountryCodePaymentV2\");",
							"pm.globals.unset(\"myfirstNamePaymentV2\");",
							"pm.globals.unset(\"mylastNamePaymentV2\");",
							"pm.globals.unset(\"mycustomerTypePayment2\");",
							"pm.globals.unset(\"mypostalCodePaymentV2\");",
							"pm.globals.unset(\"mygovernmentIdPayment2\");",
							"pm.globals.unset(\"myfindPaymentIdPaymentV2\");",
							"pm.globals.unset(\"myPaymentMethodPaymentV2\");",
							"pm.globals.unset(\"myOrderReferencePayment2\");",
							"pm.globals.unset(\"myPaymentIdPaymentV2\");",
							"pm.globals.unset(\"mysearchPaymentIdPaymentV2\");",
							"",
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
				"method": "GET",
				"header": [],
				"url": {
					"raw": "{{baseUrl}}/v2/stores?sort=name,asc",
					"host": [
						"{{baseUrl}}"
					],
					"path": [
						"v2",
						"stores"
					],
					"query": [
						{
							"key": "page",
							"value": "0",
							"description": "Zero-based page index (0..N)",
							"disabled": true
						},
						{
							"key": "sort",
							"value": "name,asc"
						}
					]
				}
			},
			"response": [
				{
					"name": "Bad Request",
					"originalRequest": {
						"method": "GET",
						"header": [
							{
								"description": "Added as a part of security scheme: bearer",
								"key": "Authorization",
								"value": "Bearer <token>"
							}
						],
						"url": {
							"raw": "{{baseUrl}}/stores?page=0&size=20&sort=<string>&sort=<string>",
							"host": [
								"{{baseUrl}}"
							],
							"path": [
								"stores"
							],
							"query": [
								{
									"key": "page",
									"value": "0"
								},
								{
									"key": "size",
									"value": "20"
								},
								{
									"key": "sort",
									"value": "<string>"
								},
								{
									"key": "sort",
									"value": "<string>"
								}
							]
						}
					},
					"status": "Bad Request",
					"code": 400,
					"_postman_previewlanguage": "json",
					"header": [
						{
							"key": "Content-Type",
							"value": "application/json"
						}
					],
					"cookie": [],
					"body": "{\n \"code\": \"400\",\n \"message\": \"Validation error\",\n \"timestamp\": \"2019-11-21T09:52:34.678\",\n \"traceId\": \"033c6a06-1d2c-498f-81a0-02b5f8aac79e\",\n \"validationErrors\": [\n  {\n   \"fieldName\": \"email\",\n   \"message\": \"Email address must contain '@' character.\"\n  },\n  {\n   \"fieldName\": \"email\",\n   \"message\": \"Email address must contain '@' character.\"\n  }\n ]\n}"
				},
				{
					"name": "Internal Server Error",
					"originalRequest": {
						"method": "GET",
						"header": [
							{
								"description": "Added as a part of security scheme: bearer",
								"key": "Authorization",
								"value": "Bearer <token>"
							}
						],
						"url": {
							"raw": "{{baseUrl}}/stores?page=0&size=20&sort=<string>&sort=<string>",
							"host": [
								"{{baseUrl}}"
							],
							"path": [
								"stores"
							],
							"query": [
								{
									"key": "page",
									"value": "0"
								},
								{
									"key": "size",
									"value": "20"
								},
								{
									"key": "sort",
									"value": "<string>"
								},
								{
									"key": "sort",
									"value": "<string>"
								}
							]
						}
					},
					"status": "Internal Server Error",
					"code": 500,
					"_postman_previewlanguage": "json",
					"header": [
						{
							"key": "Content-Type",
							"value": "application/json"
						}
					],
					"cookie": [],
					"body": "{\n \"code\": \"400\",\n \"message\": \"Validation error\",\n \"timestamp\": \"2019-11-21T09:52:34.678\",\n \"traceId\": \"033c6a06-1d2c-498f-81a0-02b5f8aac79e\"\n}"
				},
				{
					"name": "OK",
					"originalRequest": {
						"method": "GET",
						"header": [
							{
								"description": "Added as a part of security scheme: bearer",
								"key": "Authorization",
								"value": "Bearer <token>"
							}
						],
						"url": {
							"raw": "{{baseUrl}}/stores?page=0&size=20&sort=<string>&sort=<string>",
							"host": [
								"{{baseUrl}}"
							],
							"path": [
								"stores"
							],
							"query": [
								{
									"key": "page",
									"value": "0"
								},
								{
									"key": "size",
									"value": "20"
								},
								{
									"key": "sort",
									"value": "<string>"
								},
								{
									"key": "sort",
									"value": "<string>"
								}
							]
						}
					},
					"status": "OK",
					"code": 200,
					"_postman_previewlanguage": "json",
					"header": [
						{
							"key": "Content-Type",
							"value": "application/json"
						}
					],
					"cookie": [],
					"body": "{\n \"content\": [\n  {\n   \"id\": \"93389a11-392c-f22e-bf10-6ac7d7638234\",\n   \"nationalStoreId\": 107,\n   \"countryCode\": \"DK\",\n   \"tradeName\": \"dolor in\",\n   \"popularName\": \"Lorem ipsum velit quis\",\n   \"representativeId\": \"2a7e01a9-990c-ea87-18d4-52f0da8ce601\"\n  },\n  {\n   \"id\": \"urn:uuid:e72e2823-15e2-91e2-8fbc-b2de9c6d4d44\",\n   \"nationalStoreId\": 107,\n   \"countryCode\": \"SE\",\n   \"tradeName\": \"cillum non\",\n   \"popularName\": \"quis labore est mollit\",\n   \"representativeId\": \"urn:uuid:c09bcbef-e7cb-534f-2e90-b005092d7c79\"\n  }\n ],\n \"page\": {\n  \"number\": 1,\n  \"size\": 10,\n  \"totalElements\": 100,\n  \"totalPages\": 10\n }\n}"
				},
				{
					"name": "Forbidden",
					"originalRequest": {
						"method": "GET",
						"header": [
							{
								"description": "Added as a part of security scheme: bearer",
								"key": "Authorization",
								"value": "Bearer <token>"
							}
						],
						"url": {
							"raw": "{{baseUrl}}/stores?page=0&size=20&sort=<string>&sort=<string>",
							"host": [
								"{{baseUrl}}"
							],
							"path": [
								"stores"
							],
							"query": [
								{
									"key": "page",
									"value": "0"
								},
								{
									"key": "size",
									"value": "20"
								},
								{
									"key": "sort",
									"value": "<string>"
								},
								{
									"key": "sort",
									"value": "<string>"
								}
							]
						}
					},
					"status": "Forbidden",
					"code": 403,
					"_postman_previewlanguage": "json",
					"header": [
						{
							"key": "Content-Type",
							"value": "application/json"
						}
					],
					"cookie": [],
					"body": "{\n \"code\": \"400\",\n \"message\": \"Validation error\",\n \"timestamp\": \"2019-11-21T09:52:34.678\",\n \"traceId\": \"033c6a06-1d2c-498f-81a0-02b5f8aac79e\"\n}"
				},
				{
					"name": "Not Found",
					"originalRequest": {
						"method": "GET",
						"header": [
							{
								"description": "Added as a part of security scheme: bearer",
								"key": "Authorization",
								"value": "Bearer <token>"
							}
						],
						"url": {
							"raw": "{{baseUrl}}/stores?page=0&size=20&sort=<string>&sort=<string>",
							"host": [
								"{{baseUrl}}"
							],
							"path": [
								"stores"
							],
							"query": [
								{
									"key": "page",
									"value": "0"
								},
								{
									"key": "size",
									"value": "20"
								},
								{
									"key": "sort",
									"value": "<string>"
								},
								{
									"key": "sort",
									"value": "<string>"
								}
							]
						}
					},
					"status": "Not Found",
					"code": 404,
					"_postman_previewlanguage": "json",
					"header": [
						{
							"key": "Content-Type",
							"value": "application/json"
						}
					],
					"cookie": [],
					"body": "{\n \"code\": \"400\",\n \"message\": \"Validation error\",\n \"timestamp\": \"2019-11-21T09:52:34.678\",\n \"traceId\": \"033c6a06-1d2c-498f-81a0-02b5f8aac79e\"\n}"
				},
				{
					"name": "Unauthorized",
					"originalRequest": {
						"method": "GET",
						"header": [
							{
								"description": "Added as a part of security scheme: bearer",
								"key": "Authorization",
								"value": "Bearer <token>"
							}
						],
						"url": {
							"raw": "{{baseUrl}}/stores?page=0&size=20&sort=<string>&sort=<string>",
							"host": [
								"{{baseUrl}}"
							],
							"path": [
								"stores"
							],
							"query": [
								{
									"key": "page",
									"value": "0"
								},
								{
									"key": "size",
									"value": "20"
								},
								{
									"key": "sort",
									"value": "<string>"
								},
								{
									"key": "sort",
									"value": "<string>"
								}
							]
						}
					},
					"status": "Unauthorized",
					"code": 401,
					"_postman_previewlanguage": "json",
					"header": [
						{
							"key": "Content-Type",
							"value": "application/json"
						}
					],
					"cookie": [],
					"body": "{\n \"code\": \"400\",\n \"message\": \"Validation error\",\n \"timestamp\": \"2019-11-21T09:52:34.678\",\n \"traceId\": \"033c6a06-1d2c-498f-81a0-02b5f8aac79e\"\n}"
				}
			]
		},
		{
			"name": "payment_methods",
			"event": [
				{
					"listen": "test",
					"script": {
						"exec": [
							"const payMet = pm.response.json();",
							"pm.globals.unset(\"myPaymentIdPaymentV2\");",
							"pm.globals.unset(\"myPaymentMethodNamePaymentV2\");",
							"for (var i = 0 ; i < payMet.content.length ; i ++) {",
							"     if (payMet.content[i][\"name\"] == \"Numerisk Faktura (mapi)\") {",
							"         pm.globals.set(\"myPaymentMethodPaymentV2\", payMet.content[i].id);",
							"        pm.globals.set(\"myPaymentMethodNamePaymentV2\", payMet.content[i].name);",
							"        console.log('myPaymentMethodNamePaymentV2: ' + pm.globals.get(\"myPaymentMethodNamePaymentV2\"))",
							"        break;",
							"    }",
							"    ",
							"}",
							"",
							"pm.test(\"Status code is 200\", function () {",
							"    pm.response.to.have.status(200);",
							"});",
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
							"console.log('Get PaymentMethodId');"
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
				"method": "GET",
				"header": [],
				"url": {
					"raw": "{{baseUrl}}/v2/stores/{{myStorePaymentV2}}/payment_methods",
					"host": [
						"{{baseUrl}}"
					],
					"path": [
						"v2",
						"stores",
						"{{myStorePaymentV2}}",
						"payment_methods"
					]
				}
			},
			"response": [
				{
					"name": "Unauthorized",
					"originalRequest": {
						"method": "GET",
						"header": [
							{
								"description": "Added as a part of security scheme: bearer",
								"key": "Authorization",
								"value": "Bearer <token>"
							}
						],
						"url": {
							"raw": "{{baseUrl}}/stores/:store_id/payment_methods?amount=<number>",
							"host": [
								"{{baseUrl}}"
							],
							"path": [
								"stores",
								":store_id",
								"payment_methods"
							],
							"query": [
								{
									"key": "amount",
									"value": "<number>"
								}
							],
							"variable": [
								{
									"key": "store_id"
								}
							]
						}
					},
					"status": "Unauthorized",
					"code": 401,
					"_postman_previewlanguage": "json",
					"header": [
						{
							"key": "Content-Type",
							"value": "application/json"
						}
					],
					"cookie": [],
					"body": "{\n \"code\": \"400\",\n \"message\": \"Validation error\",\n \"timestamp\": \"2019-11-21T09:52:34.678\",\n \"traceId\": \"033c6a06-1d2c-498f-81a0-02b5f8aac79e\"\n}"
				},
				{
					"name": "Not Found",
					"originalRequest": {
						"method": "GET",
						"header": [
							{
								"description": "Added as a part of security scheme: bearer",
								"key": "Authorization",
								"value": "Bearer <token>"
							}
						],
						"url": {
							"raw": "{{baseUrl}}/stores/:store_id/payment_methods?amount=<number>",
							"host": [
								"{{baseUrl}}"
							],
							"path": [
								"stores",
								":store_id",
								"payment_methods"
							],
							"query": [
								{
									"key": "amount",
									"value": "<number>"
								}
							],
							"variable": [
								{
									"key": "store_id"
								}
							]
						}
					},
					"status": "Not Found",
					"code": 404,
					"_postman_previewlanguage": "text",
					"header": [
						{
							"key": "Content-Type",
							"value": "*/*"
						}
					],
					"cookie": [],
					"body": ""
				},
				{
					"name": "Forbidden",
					"originalRequest": {
						"method": "GET",
						"header": [
							{
								"description": "Added as a part of security scheme: bearer",
								"key": "Authorization",
								"value": "Bearer <token>"
							}
						],
						"url": {
							"raw": "{{baseUrl}}/stores/:store_id/payment_methods?amount=<number>",
							"host": [
								"{{baseUrl}}"
							],
							"path": [
								"stores",
								":store_id",
								"payment_methods"
							],
							"query": [
								{
									"key": "amount",
									"value": "<number>"
								}
							],
							"variable": [
								{
									"key": "store_id"
								}
							]
						}
					},
					"status": "Forbidden",
					"code": 403,
					"_postman_previewlanguage": "json",
					"header": [
						{
							"key": "Content-Type",
							"value": "application/json"
						}
					],
					"cookie": [],
					"body": "{\n \"code\": \"400\",\n \"message\": \"Validation error\",\n \"timestamp\": \"2019-11-21T09:52:34.678\",\n \"traceId\": \"033c6a06-1d2c-498f-81a0-02b5f8aac79e\"\n}"
				},
				{
					"name": "Bad Request",
					"originalRequest": {
						"method": "GET",
						"header": [
							{
								"description": "Added as a part of security scheme: bearer",
								"key": "Authorization",
								"value": "Bearer <token>"
							}
						],
						"url": {
							"raw": "{{baseUrl}}/stores/:store_id/payment_methods?amount=<number>",
							"host": [
								"{{baseUrl}}"
							],
							"path": [
								"stores",
								":store_id",
								"payment_methods"
							],
							"query": [
								{
									"key": "amount",
									"value": "<number>"
								}
							],
							"variable": [
								{
									"key": "store_id"
								}
							]
						}
					},
					"status": "Bad Request",
					"code": 400,
					"_postman_previewlanguage": "text",
					"header": [
						{
							"key": "Content-Type",
							"value": "*/*"
						}
					],
					"cookie": [],
					"body": ""
				},
				{
					"name": "OK",
					"originalRequest": {
						"method": "GET",
						"header": [
							{
								"description": "Added as a part of security scheme: bearer",
								"key": "Authorization",
								"value": "Bearer <token>"
							}
						],
						"url": {
							"raw": "{{baseUrl}}/stores/:store_id/payment_methods?amount=<number>",
							"host": [
								"{{baseUrl}}"
							],
							"path": [
								"stores",
								":store_id",
								"payment_methods"
							],
							"query": [
								{
									"key": "amount",
									"value": "<number>"
								}
							],
							"variable": [
								{
									"key": "store_id"
								}
							]
						}
					},
					"status": "OK",
					"code": 200,
					"_postman_previewlanguage": "text",
					"header": [
						{
							"key": "Content-Type",
							"value": "*/*"
						}
					],
					"cookie": [],
					"body": ""
				},
				{
					"name": "Internal Server Error",
					"originalRequest": {
						"method": "GET",
						"header": [
							{
								"description": "Added as a part of security scheme: bearer",
								"key": "Authorization",
								"value": "Bearer <token>"
							}
						],
						"url": {
							"raw": "{{baseUrl}}/stores/:store_id/payment_methods?amount=<number>",
							"host": [
								"{{baseUrl}}"
							],
							"path": [
								"stores",
								":store_id",
								"payment_methods"
							],
							"query": [
								{
									"key": "amount",
									"value": "<number>"
								}
							],
							"variable": [
								{
									"key": "store_id"
								}
							]
						}
					},
					"status": "Internal Server Error",
					"code": 500,
					"_postman_previewlanguage": "json",
					"header": [
						{
							"key": "Content-Type",
							"value": "application/json"
						}
					],
					"cookie": [],
					"body": "{\n \"code\": \"400\",\n \"message\": \"Validation error\",\n \"timestamp\": \"2019-11-21T09:52:34.678\",\n \"traceId\": \"033c6a06-1d2c-498f-81a0-02b5f8aac79e\"\n}"
				}
			]
		},
		{
			"name": "price_signage monthly cost",
			"event": [
				{
					"listen": "test",
					"script": {
						"exec": [
							"const payMet = pm.response.json();",
							"",
							"pm.test(\"Status code is 200\", function () {",
							"    pm.response.to.have.status(200);",
							"});",
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
							"console.log('Get Monthly Cost');"
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
				"method": "GET",
				"header": [],
				"url": {
					"raw": "{{baseUrl}}/v2/stores/{{myStorePaymentV2}}/payment_methods/{{myPaymentMethodPaymentV2}}/price_signage?amount=5000",
					"host": [
						"{{baseUrl}}"
					],
					"path": [
						"v2",
						"stores",
						"{{myStorePaymentV2}}",
						"payment_methods",
						"{{myPaymentMethodPaymentV2}}",
						"price_signage"
					],
					"query": [
						{
							"key": "amount",
							"value": "5000"
						}
					]
				}
			},
			"response": [
				{
					"name": "OK",
					"originalRequest": {
						"method": "GET",
						"header": [
							{
								"description": "Added as a part of security scheme: bearer",
								"key": "Authorization",
								"value": "Bearer <token>"
							}
						],
						"url": {
							"raw": "{{baseUrl}}/stores/:store_id/payment_methods?amount=<number>",
							"host": [
								"{{baseUrl}}"
							],
							"path": [
								"stores",
								":store_id",
								"payment_methods"
							],
							"query": [
								{
									"key": "amount",
									"value": "<number>"
								}
							],
							"variable": [
								{
									"key": "store_id"
								}
							]
						}
					},
					"status": "OK",
					"code": 200,
					"_postman_previewlanguage": "text",
					"header": [
						{
							"key": "Content-Type",
							"value": "*/*"
						}
					],
					"cookie": [],
					"body": ""
				},
				{
					"name": "Bad Request",
					"originalRequest": {
						"method": "GET",
						"header": [
							{
								"description": "Added as a part of security scheme: bearer",
								"key": "Authorization",
								"value": "Bearer <token>"
							}
						],
						"url": {
							"raw": "{{baseUrl}}/stores/:store_id/payment_methods?amount=<number>",
							"host": [
								"{{baseUrl}}"
							],
							"path": [
								"stores",
								":store_id",
								"payment_methods"
							],
							"query": [
								{
									"key": "amount",
									"value": "<number>"
								}
							],
							"variable": [
								{
									"key": "store_id"
								}
							]
						}
					},
					"status": "Bad Request",
					"code": 400,
					"_postman_previewlanguage": "text",
					"header": [
						{
							"key": "Content-Type",
							"value": "*/*"
						}
					],
					"cookie": [],
					"body": ""
				},
				{
					"name": "Unauthorized",
					"originalRequest": {
						"method": "GET",
						"header": [
							{
								"description": "Added as a part of security scheme: bearer",
								"key": "Authorization",
								"value": "Bearer <token>"
							}
						],
						"url": {
							"raw": "{{baseUrl}}/stores/:store_id/payment_methods?amount=<number>",
							"host": [
								"{{baseUrl}}"
							],
							"path": [
								"stores",
								":store_id",
								"payment_methods"
							],
							"query": [
								{
									"key": "amount",
									"value": "<number>"
								}
							],
							"variable": [
								{
									"key": "store_id"
								}
							]
						}
					},
					"status": "Unauthorized",
					"code": 401,
					"_postman_previewlanguage": "json",
					"header": [
						{
							"key": "Content-Type",
							"value": "application/json"
						}
					],
					"cookie": [],
					"body": "{\n \"code\": \"400\",\n \"message\": \"Validation error\",\n \"timestamp\": \"2019-11-21T09:52:34.678\",\n \"traceId\": \"033c6a06-1d2c-498f-81a0-02b5f8aac79e\"\n}"
				},
				{
					"name": "Forbidden",
					"originalRequest": {
						"method": "GET",
						"header": [
							{
								"description": "Added as a part of security scheme: bearer",
								"key": "Authorization",
								"value": "Bearer <token>"
							}
						],
						"url": {
							"raw": "{{baseUrl}}/stores/:store_id/payment_methods?amount=<number>",
							"host": [
								"{{baseUrl}}"
							],
							"path": [
								"stores",
								":store_id",
								"payment_methods"
							],
							"query": [
								{
									"key": "amount",
									"value": "<number>"
								}
							],
							"variable": [
								{
									"key": "store_id"
								}
							]
						}
					},
					"status": "Forbidden",
					"code": 403,
					"_postman_previewlanguage": "json",
					"header": [
						{
							"key": "Content-Type",
							"value": "application/json"
						}
					],
					"cookie": [],
					"body": "{\n \"code\": \"400\",\n \"message\": \"Validation error\",\n \"timestamp\": \"2019-11-21T09:52:34.678\",\n \"traceId\": \"033c6a06-1d2c-498f-81a0-02b5f8aac79e\"\n}"
				},
				{
					"name": "Not Found",
					"originalRequest": {
						"method": "GET",
						"header": [
							{
								"description": "Added as a part of security scheme: bearer",
								"key": "Authorization",
								"value": "Bearer <token>"
							}
						],
						"url": {
							"raw": "{{baseUrl}}/stores/:store_id/payment_methods?amount=<number>",
							"host": [
								"{{baseUrl}}"
							],
							"path": [
								"stores",
								":store_id",
								"payment_methods"
							],
							"query": [
								{
									"key": "amount",
									"value": "<number>"
								}
							],
							"variable": [
								{
									"key": "store_id"
								}
							]
						}
					},
					"status": "Not Found",
					"code": 404,
					"_postman_previewlanguage": "text",
					"header": [
						{
							"key": "Content-Type",
							"value": "*/*"
						}
					],
					"cookie": [],
					"body": ""
				},
				{
					"name": "Internal Server Error",
					"originalRequest": {
						"method": "GET",
						"header": [
							{
								"description": "Added as a part of security scheme: bearer",
								"key": "Authorization",
								"value": "Bearer <token>"
							}
						],
						"url": {
							"raw": "{{baseUrl}}/stores/:store_id/payment_methods?amount=<number>",
							"host": [
								"{{baseUrl}}"
							],
							"path": [
								"stores",
								":store_id",
								"payment_methods"
							],
							"query": [
								{
									"key": "amount",
									"value": "<number>"
								}
							],
							"variable": [
								{
									"key": "store_id"
								}
							]
						}
					},
					"status": "Internal Server Error",
					"code": 500,
					"_postman_previewlanguage": "json",
					"header": [
						{
							"key": "Content-Type",
							"value": "application/json"
						}
					],
					"cookie": [],
					"body": "{\n \"code\": \"400\",\n \"message\": \"Validation error\",\n \"timestamp\": \"2019-11-21T09:52:34.678\",\n \"traceId\": \"033c6a06-1d2c-498f-81a0-02b5f8aac79e\"\n}"
				}
			]
		},
		{
			"name": "annuity_factors",
			"event": [
				{
					"listen": "test",
					"script": {
						"exec": [
							"const payMet = pm.response.json();",
							"",
							"",
							"pm.test(\"Status code is 200\", function () {",
							"    pm.response.to.have.status(200);",
							"});",
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
							"console.log('Get Monthly Cost');"
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
				"method": "GET",
				"header": [],
				"url": {
					"raw": "{{baseUrl}}/v2/stores/{{myStorePaymentV2}}/payment_methods/{{myPaymentMethodPaymentV2}}/annuity_factors",
					"host": [
						"{{baseUrl}}"
					],
					"path": [
						"v2",
						"stores",
						"{{myStorePaymentV2}}",
						"payment_methods",
						"{{myPaymentMethodPaymentV2}}",
						"annuity_factors"
					]
				}
			},
			"response": [
				{
					"name": "Bad Request",
					"originalRequest": {
						"method": "GET",
						"header": [
							{
								"description": "Added as a part of security scheme: bearer",
								"key": "Authorization",
								"value": "Bearer <token>"
							}
						],
						"url": {
							"raw": "{{baseUrl}}/stores/:store_id/payment_methods?amount=<number>",
							"host": [
								"{{baseUrl}}"
							],
							"path": [
								"stores",
								":store_id",
								"payment_methods"
							],
							"query": [
								{
									"key": "amount",
									"value": "<number>"
								}
							],
							"variable": [
								{
									"key": "store_id"
								}
							]
						}
					},
					"status": "Bad Request",
					"code": 400,
					"_postman_previewlanguage": "text",
					"header": [
						{
							"key": "Content-Type",
							"value": "*/*"
						}
					],
					"cookie": [],
					"body": ""
				},
				{
					"name": "Internal Server Error",
					"originalRequest": {
						"method": "GET",
						"header": [
							{
								"description": "Added as a part of security scheme: bearer",
								"key": "Authorization",
								"value": "Bearer <token>"
							}
						],
						"url": {
							"raw": "{{baseUrl}}/stores/:store_id/payment_methods?amount=<number>",
							"host": [
								"{{baseUrl}}"
							],
							"path": [
								"stores",
								":store_id",
								"payment_methods"
							],
							"query": [
								{
									"key": "amount",
									"value": "<number>"
								}
							],
							"variable": [
								{
									"key": "store_id"
								}
							]
						}
					},
					"status": "Internal Server Error",
					"code": 500,
					"_postman_previewlanguage": "json",
					"header": [
						{
							"key": "Content-Type",
							"value": "application/json"
						}
					],
					"cookie": [],
					"body": "{\n \"code\": \"400\",\n \"message\": \"Validation error\",\n \"timestamp\": \"2019-11-21T09:52:34.678\",\n \"traceId\": \"033c6a06-1d2c-498f-81a0-02b5f8aac79e\"\n}"
				},
				{
					"name": "Forbidden",
					"originalRequest": {
						"method": "GET",
						"header": [
							{
								"description": "Added as a part of security scheme: bearer",
								"key": "Authorization",
								"value": "Bearer <token>"
							}
						],
						"url": {
							"raw": "{{baseUrl}}/stores/:store_id/payment_methods?amount=<number>",
							"host": [
								"{{baseUrl}}"
							],
							"path": [
								"stores",
								":store_id",
								"payment_methods"
							],
							"query": [
								{
									"key": "amount",
									"value": "<number>"
								}
							],
							"variable": [
								{
									"key": "store_id"
								}
							]
						}
					},
					"status": "Forbidden",
					"code": 403,
					"_postman_previewlanguage": "json",
					"header": [
						{
							"key": "Content-Type",
							"value": "application/json"
						}
					],
					"cookie": [],
					"body": "{\n \"code\": \"400\",\n \"message\": \"Validation error\",\n \"timestamp\": \"2019-11-21T09:52:34.678\",\n \"traceId\": \"033c6a06-1d2c-498f-81a0-02b5f8aac79e\"\n}"
				},
				{
					"name": "OK",
					"originalRequest": {
						"method": "GET",
						"header": [
							{
								"description": "Added as a part of security scheme: bearer",
								"key": "Authorization",
								"value": "Bearer <token>"
							}
						],
						"url": {
							"raw": "{{baseUrl}}/stores/:store_id/payment_methods?amount=<number>",
							"host": [
								"{{baseUrl}}"
							],
							"path": [
								"stores",
								":store_id",
								"payment_methods"
							],
							"query": [
								{
									"key": "amount",
									"value": "<number>"
								}
							],
							"variable": [
								{
									"key": "store_id"
								}
							]
						}
					},
					"status": "OK",
					"code": 200,
					"_postman_previewlanguage": "text",
					"header": [
						{
							"key": "Content-Type",
							"value": "*/*"
						}
					],
					"cookie": [],
					"body": ""
				},
				{
					"name": "Unauthorized",
					"originalRequest": {
						"method": "GET",
						"header": [
							{
								"description": "Added as a part of security scheme: bearer",
								"key": "Authorization",
								"value": "Bearer <token>"
							}
						],
						"url": {
							"raw": "{{baseUrl}}/stores/:store_id/payment_methods?amount=<number>",
							"host": [
								"{{baseUrl}}"
							],
							"path": [
								"stores",
								":store_id",
								"payment_methods"
							],
							"query": [
								{
									"key": "amount",
									"value": "<number>"
								}
							],
							"variable": [
								{
									"key": "store_id"
								}
							]
						}
					},
					"status": "Unauthorized",
					"code": 401,
					"_postman_previewlanguage": "json",
					"header": [
						{
							"key": "Content-Type",
							"value": "application/json"
						}
					],
					"cookie": [],
					"body": "{\n \"code\": \"400\",\n \"message\": \"Validation error\",\n \"timestamp\": \"2019-11-21T09:52:34.678\",\n \"traceId\": \"033c6a06-1d2c-498f-81a0-02b5f8aac79e\"\n}"
				},
				{
					"name": "Not Found",
					"originalRequest": {
						"method": "GET",
						"header": [
							{
								"description": "Added as a part of security scheme: bearer",
								"key": "Authorization",
								"value": "Bearer <token>"
							}
						],
						"url": {
							"raw": "{{baseUrl}}/stores/:store_id/payment_methods?amount=<number>",
							"host": [
								"{{baseUrl}}"
							],
							"path": [
								"stores",
								":store_id",
								"payment_methods"
							],
							"query": [
								{
									"key": "amount",
									"value": "<number>"
								}
							],
							"variable": [
								{
									"key": "store_id"
								}
							]
						}
					},
					"status": "Not Found",
					"code": 404,
					"_postman_previewlanguage": "text",
					"header": [
						{
							"key": "Content-Type",
							"value": "*/*"
						}
					],
					"cookie": [],
					"body": ""
				}
			]
		},
		{
			"name": "application_data_specification",
			"event": [
				{
					"listen": "test",
					"script": {
						"exec": [
							"const payMet = pm.response.json();",
							"console.log(payMet);",
							"",
							"// pm.globals.set(\"myPaymentMethod\", payMet.paymentMethods[0].id);",
							"// pm.globals.set(\"myPaymentMethodName\", payMet.paymentMethods[0].description);",
							"",
							"pm.test(\"Status code is 200\", function () {",
							"    pm.response.to.have.status(200);",
							"});",
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
							"console.log('Get Application Data Specification');"
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
				"method": "GET",
				"header": [],
				"url": {
					"raw": "{{baseUrl}}/v2/stores/{{myStorePaymentV2}}/payment_methods/{{myPaymentMethodPaymentV2}}/application_data_specification?amount=1000",
					"host": [
						"{{baseUrl}}"
					],
					"path": [
						"v2",
						"stores",
						"{{myStorePaymentV2}}",
						"payment_methods",
						"{{myPaymentMethodPaymentV2}}",
						"application_data_specification"
					],
					"query": [
						{
							"key": "amount",
							"value": "1000"
						}
					]
				}
			},
			"response": [
				{
					"name": "Bad Request",
					"originalRequest": {
						"method": "GET",
						"header": [
							{
								"description": "Added as a part of security scheme: bearer",
								"key": "Authorization",
								"value": "Bearer <token>"
							}
						],
						"url": {
							"raw": "{{baseUrl}}/stores/:store_id/payment_methods?amount=<number>",
							"host": [
								"{{baseUrl}}"
							],
							"path": [
								"stores",
								":store_id",
								"payment_methods"
							],
							"query": [
								{
									"key": "amount",
									"value": "<number>"
								}
							],
							"variable": [
								{
									"key": "store_id"
								}
							]
						}
					},
					"status": "Bad Request",
					"code": 400,
					"_postman_previewlanguage": "text",
					"header": [
						{
							"key": "Content-Type",
							"value": "*/*"
						}
					],
					"cookie": [],
					"body": ""
				},
				{
					"name": "Forbidden",
					"originalRequest": {
						"method": "GET",
						"header": [
							{
								"description": "Added as a part of security scheme: bearer",
								"key": "Authorization",
								"value": "Bearer <token>"
							}
						],
						"url": {
							"raw": "{{baseUrl}}/stores/:store_id/payment_methods?amount=<number>",
							"host": [
								"{{baseUrl}}"
							],
							"path": [
								"stores",
								":store_id",
								"payment_methods"
							],
							"query": [
								{
									"key": "amount",
									"value": "<number>"
								}
							],
							"variable": [
								{
									"key": "store_id"
								}
							]
						}
					},
					"status": "Forbidden",
					"code": 403,
					"_postman_previewlanguage": "json",
					"header": [
						{
							"key": "Content-Type",
							"value": "application/json"
						}
					],
					"cookie": [],
					"body": "{\n \"code\": \"400\",\n \"message\": \"Validation error\",\n \"timestamp\": \"2019-11-21T09:52:34.678\",\n \"traceId\": \"033c6a06-1d2c-498f-81a0-02b5f8aac79e\"\n}"
				},
				{
					"name": "Unauthorized",
					"originalRequest": {
						"method": "GET",
						"header": [
							{
								"description": "Added as a part of security scheme: bearer",
								"key": "Authorization",
								"value": "Bearer <token>"
							}
						],
						"url": {
							"raw": "{{baseUrl}}/stores/:store_id/payment_methods?amount=<number>",
							"host": [
								"{{baseUrl}}"
							],
							"path": [
								"stores",
								":store_id",
								"payment_methods"
							],
							"query": [
								{
									"key": "amount",
									"value": "<number>"
								}
							],
							"variable": [
								{
									"key": "store_id"
								}
							]
						}
					},
					"status": "Unauthorized",
					"code": 401,
					"_postman_previewlanguage": "json",
					"header": [
						{
							"key": "Content-Type",
							"value": "application/json"
						}
					],
					"cookie": [],
					"body": "{\n \"code\": \"400\",\n \"message\": \"Validation error\",\n \"timestamp\": \"2019-11-21T09:52:34.678\",\n \"traceId\": \"033c6a06-1d2c-498f-81a0-02b5f8aac79e\"\n}"
				},
				{
					"name": "OK",
					"originalRequest": {
						"method": "GET",
						"header": [
							{
								"description": "Added as a part of security scheme: bearer",
								"key": "Authorization",
								"value": "Bearer <token>"
							}
						],
						"url": {
							"raw": "{{baseUrl}}/stores/:store_id/payment_methods?amount=<number>",
							"host": [
								"{{baseUrl}}"
							],
							"path": [
								"stores",
								":store_id",
								"payment_methods"
							],
							"query": [
								{
									"key": "amount",
									"value": "<number>"
								}
							],
							"variable": [
								{
									"key": "store_id"
								}
							]
						}
					},
					"status": "OK",
					"code": 200,
					"_postman_previewlanguage": "text",
					"header": [
						{
							"key": "Content-Type",
							"value": "*/*"
						}
					],
					"cookie": [],
					"body": ""
				},
				{
					"name": "Not Found",
					"originalRequest": {
						"method": "GET",
						"header": [
							{
								"description": "Added as a part of security scheme: bearer",
								"key": "Authorization",
								"value": "Bearer <token>"
							}
						],
						"url": {
							"raw": "{{baseUrl}}/stores/:store_id/payment_methods?amount=<number>",
							"host": [
								"{{baseUrl}}"
							],
							"path": [
								"stores",
								":store_id",
								"payment_methods"
							],
							"query": [
								{
									"key": "amount",
									"value": "<number>"
								}
							],
							"variable": [
								{
									"key": "store_id"
								}
							]
						}
					},
					"status": "Not Found",
					"code": 404,
					"_postman_previewlanguage": "text",
					"header": [
						{
							"key": "Content-Type",
							"value": "*/*"
						}
					],
					"cookie": [],
					"body": ""
				},
				{
					"name": "Internal Server Error",
					"originalRequest": {
						"method": "GET",
						"header": [
							{
								"description": "Added as a part of security scheme: bearer",
								"key": "Authorization",
								"value": "Bearer <token>"
							}
						],
						"url": {
							"raw": "{{baseUrl}}/stores/:store_id/payment_methods?amount=<number>",
							"host": [
								"{{baseUrl}}"
							],
							"path": [
								"stores",
								":store_id",
								"payment_methods"
							],
							"query": [
								{
									"key": "amount",
									"value": "<number>"
								}
							],
							"variable": [
								{
									"key": "store_id"
								}
							]
						}
					},
					"status": "Internal Server Error",
					"code": 500,
					"_postman_previewlanguage": "json",
					"header": [
						{
							"key": "Content-Type",
							"value": "application/json"
						}
					],
					"cookie": [],
					"body": "{\n \"code\": \"400\",\n \"message\": \"Validation error\",\n \"timestamp\": \"2019-11-21T09:52:34.678\",\n \"traceId\": \"033c6a06-1d2c-498f-81a0-02b5f8aac79e\"\n}"
				}
			]
		},
		{
			"name": "Get address",
			"event": [
				{
					"listen": "prerequest",
					"script": {
						"exec": [
							"console.log('Get address');",
							"",
							"pm.globals.set(\"mygovernmentIdPayment2\", \"198305147715\");",
							"pm.globals.set(\"mycustomerTypePayment2\", \"NATURAL\");"
						],
						"type": "text/javascript"
					}
				},
				{
					"listen": "test",
					"script": {
						"exec": [
							"const response = pm.response.json();",
							"pm.globals.set(\"myfullNamePaymentV2\", response.address.fullName);",
							"pm.globals.set(\"myfirstNamePaymentV2\", response.address.firstName);",
							"pm.globals.set(\"mylastNamePaymentV2\", response.address.lastName);",
							"pm.globals.set(\"myaddressRow1PaymentV2\", response.address.addressRow1);",
							"pm.globals.set(\"myaddressRow2PaymentV2\", response.address.addressRow2);",
							"pm.globals.set(\"mypostalAreaPaymentV2\", response.address.postalArea);",
							"pm.globals.set(\"mypostalCodePaymentV2\", response.address.postalCode);",
							"pm.globals.set(\"mycountryCodePaymentV2\", response.address.countryCode);",
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
					"raw": "{\n  \"storeId\": \"{{myStorePaymentV2}}\",\n  \"customerIp\": \"192.168.0.1\",\n  \"governmentId\": \"{{mygovernmentIdPayment2}}\",\n  \"customerType\": \"{{mycustomerTypePayment2}}\"\n}\n",
					"options": {
						"raw": {
							"language": "json"
						}
					}
				},
				"url": {
					"raw": "{{baseUrl}}/v2/customers/address/by_government_id",
					"host": [
						"{{baseUrl}}"
					],
					"path": [
						"v2",
						"customers",
						"address",
						"by_government_id"
					]
				}
			},
			"response": []
		},
		{
			"name": "personalized payment methods",
			"event": [
				{
					"listen": "prerequest",
					"script": {
						"exec": [
							"console.log('Get address');",
							"",
							"pm.globals.set(\"mygovernmentIdPayment2\", \"198909194451\");",
							"pm.globals.set(\"mycustomerTypePayment2\", \"NATURAL\");"
						],
						"type": "text/javascript"
					}
				},
				{
					"listen": "test",
					"script": {
						"exec": [
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
					"raw": "{\n  \"governmentId\": \"197906023457\",\n  \"amount\": 0\n}\n",
					"options": {
						"raw": {
							"language": "json"
						}
					}
				},
				"url": {
					"raw": "{{baseUrl}}/v2/stores/{{myStorePaymentV2}}/payment_methods/personalized",
					"host": [
						"{{baseUrl}}"
					],
					"path": [
						"v2",
						"stores",
						"{{myStorePaymentV2}}",
						"payment_methods",
						"personalized"
					]
				}
			},
			"response": []
		},
		{
			"name": "Create Payment",
			"event": [
				{
					"listen": "test",
					"script": {
						"exec": [
							"const response = pm.response.json();",
							"pm.globals.set(\"myPaymentIdPaymentV2\", response.id);",
							"console.log('paymentId = ' + response.id)",
							"console.log('orderReference = ' + response.order.orderReference)",
							""
						],
						"type": "text/javascript"
					}
				},
				{
					"listen": "prerequest",
					"script": {
						"exec": [
							"console.log('Create payment v2');",
							"var today = new Date();",
							"var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();",
							"pm.globals.set(\"myOrderReferencePayment2\",date+'-'+ _.random(000001, 999999));",
							"",
							"",
							"pm.globals.set(\"myJson\",(JSON.toString({\"state_from\": \"YES\", \"state_to\":  \"NO\"})));"
						],
						"type": "text/javascript"
					}
				}
			],
			"protocolProfileBehavior": {
				"disabledSystemHeaders": {
					"content-type": true
				}
			},
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
				"header": [
					{
						"key": "Content-Type",
						"type": "text",
						"value": "application/json"
					},
					{
						"key": "resurs-request-id",
						"value": "{{myOrderReferencePayment2}}",
						"type": "text",
						"disabled": true
					}
				],
				"body": {
					"mode": "raw",
					"raw": "{\n  \"storeId\": \"{{myStorePaymentV2}}\",\n  \"paymentMethodId\": \"{{myPaymentMethodPaymentV2}}\",\n  \n  \"order\": {\n    \n    \"orderLines\": [\n     {\n        \"type\" : \"NORMAL\",\n        \"quantity\" : 1,\n        \"quantityUnit\" : \"st\",\n        \"vatRate\" : 25,\n        \"totalAmountIncludingVat\" : 4400.00,\n        \"description\" : \"Push It Messenger Bag\",\n        \"reference\" : \"24wb04\"\n     }\n    ],\n    \"orderReference\": \"{{myOrderReferencePayment2}}\"\n  },\n  \"application\": {  \n    \"applicationData\": {\n    }\n  },\n   \"customer\": {\n    \"customerType\": \"NATURAL\",\n    \"governmentId\" : \"8305147715\",\n    \"email\": \"gert.larsson@resurs.se\",\n    \"mobilePhone\": \"0707987987\",\n    \n     \"deliveryAddress\" : {\n      \"fullName\" : \"Lelle Laverans\",\n      \"firstName\" : \"\",\n      \"lastName\" : \"\",\n      \"addressRow1\" : \"Solstolen 77\",\n      \"addressRow2\" : \"\",\n      \"postalArea\" : \"Torekov\",\n      \"postalCode\" : \"25024\",\n      \"countryCode\" : \"SE\"\n    },\n    \"deviceInfo\": {\n      \"ip\": \"192.168.0.1\",\n      \"userAgent\": \"This is a test using postman xxxx8888\"\n    }\n  },\n    \"metadata\": {\n    \"creator\": \"gert_l_creator\",\n       \"custom\": [\n      {\n        \"key\": \"externalInvoiceReference\",\n        \"value\": \"my reference\"\n      },\n      {\n        \"key\": \"externalCustomerId\",\n        \"value\": \"Customer Id 22-33-44\"\n      },\n      {\n        \"key\": \"_resurs_platform\",\n        \"value\": \"gelaPlatfom\"\n      },\n      \n      {\n        \"key\": \"_resurs_platform_version\",\n        \"value\": \"gelaPlatfom\"\n      },\n      {\n        \"key\": \"_resurs_platform_plugin_version\",\n        \"value\": \"modulVersion-1.0\"\n      },\n      {\n        \"key\": \"_resurs_platform_php_version\",\n        \"value\": \"PHP-8.1.27\"\n      },\n      {\n        \"key\": \"_resurs_platform_resurs_core_version\",\n        \"value\": \"core-1.0.1\"\n      },\n      {\n        \"key\": \"_resurs_platform_resurs_ecom_2_version\",\n        \"value\": \"ECom2-1.0.1\"\n      }\n    ]\n  },\n  \"options\": {\n    \"initiatedOnCustomersDevice\": true,\n    \"deliverLinks\": false,\n    \"handleFrozenPayments\": true,\n    \"handleManualInspection\": false,\n    \"automaticCapture\": false,\n    \"handlePhysicalAgreement\": false,\n    \"callbacks\": {\n      \"authorization\": {\n        \"url\": \"https://webhook.site/45a8cdff-7222-465f-b0e5-ab16d430f41e\"\n      },\n      \"management\": {\n        \"url\": \"https://webhook.site/45a8cdff-7222-465f-b0e5-ab16d430f41e\"\n      },\n      \"creditApplication\": {\n        \"url\": \"https://webhook.site/45a8cdff-7222-465f-b0e5-ab16d430f41e\"\n      }\n    },\n    \"redirectionUrls\": {\n      \"customer\": {\n      }\n    },\n    \"timeToLiveInMinutes\": 1\n  }\n}\n",
					"options": {
						"raw": {
							"language": "json"
						}
					}
				},
				"url": {
					"raw": "{{baseUrl}}/v2/payments",
					"host": [
						"{{baseUrl}}"
					],
					"path": [
						"v2",
						"payments"
					]
				}
			},
			"response": []
		},
		{
			"name": "Create Payment resurs-request-id",
			"event": [
				{
					"listen": "test",
					"script": {
						"exec": [
							"const response = pm.response.json();",
							"pm.globals.set(\"myPaymentIdPaymentV2\", response.id);",
							"console.log('paymentId = ' + response.id)",
							"console.log('orderReference = ' + response.order.orderReference)",
							""
						],
						"type": "text/javascript"
					}
				},
				{
					"listen": "prerequest",
					"script": {
						"exec": [
							"console.log('Create payment v2');",
							"var today = new Date();",
							"var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();",
							"pm.globals.set(\"myOrderReferencePayment2\",date+'-'+ _.random(000001, 999999));",
							"",
							"",
							"pm.globals.set(\"myJson\",(JSON.toString({\"state_from\": \"YES\", \"state_to\":  \"NO\"})));"
						],
						"type": "text/javascript"
					}
				}
			],
			"protocolProfileBehavior": {
				"disabledSystemHeaders": {
					"content-type": true
				}
			},
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
				"header": [
					{
						"key": "Content-Type",
						"type": "text",
						"value": "application/json"
					},
					{
						"key": "resurs-request-id",
						"value": "231011001",
						"type": "text"
					}
				],
				"body": {
					"mode": "raw",
					"raw": "{\n  \"storeId\": \"{{myStorePaymentV2}}\",\n  \"paymentMethodId\": \"{{myPaymentMethodPaymentV2}}\",\n  \n  \"order\": {\n    \n    \"orderLines\": [\n      {\n        \"quantity\" : 1,\n        \"quantityUnit\" : \"st\",\n        \"vatRate\" : 25,\n        \"totalAmountIncludingVat\" : 1000.91,\n        \"description\" : \"Produkten\",\n        \"reference\" : \"p-123\",\n        \"type\" : \"PHYSICAL_GOODS\"\n     },\n     {\n        \"quantity\" : 1,\n        \"quantityUnit\" : \"st\",\n        \"vatRate\" : 25,\n        \"totalAmountIncludingVat\" : 100,\n        \"description\" : \"Produkt 2\",\n        \"reference\" : \"102\",\n        \"type\" : \"NORMAL\"\n     },\n     {\n        \"quantity\" : 1,\n        \"quantityUnit\" : \"st\",\n        \"vatRate\" : 25,\n        \"totalAmountIncludingVat\" : -20,\n        \"description\" : \"Vårrabatt\",\n        \"reference\" : \"901\",\n        \"type\" : \"DISCOUNT\"\n     },\n    {\n        \"quantity\" : 1,\n        \"quantityUnit\" : \"st\",\n        \"vatRate\" : 25,\n        \"totalAmountIncludingVat\" : 0,\n        \"description\" : \"shipping and handling\",\n        \"reference\" : \"901\",\n        \"type\" : \"SHIPPING\"\n     }\n    ],\n    \"orderReference\": \"mittOrdernr001\"\n  },\n  \"application\": {  \n    \"applicationData\": {\n    }\n  },\n   \"customer\": {\n    \"customerType\": \"NATURAL\",\n    \"governmentId\" : \"198305147715\",\n    \"email\": \"gert.larsson@resurs.se\",\n    \"mobilePhone\": \"0707000000\",\n    \n     \"deliveryAddress\" : {\n      \"fullName\" : \"Stella Eliassson\",\n      \"firstName\" : \"Stella\",\n      \"lastName\" : \"Eliassson\",\n      \"addressRow1\" : \"Glassgatan 17\",\n      \"addressRow2\" : \"\",\n      \"postalArea\" : \"Helsingborg\",\n      \"postalCode\" : \"25024\",\n      \"countryCode\" : \"SE\"\n    },\n    \"deviceInfo\": {\n      \"ip\": \"192.168.0.1\",\n      \"userAgent\": \"This is a test using postman xxxx8888\"\n    }\n  },\n    \"metadata\": {\n    \"creator\": \"gert_l_creator\",\n       \"custom\": [\n      {\n        \"key\": \"externalInvoiceReference\",\n        \"value\": \"my reference\"\n      },\n      {\n        \"key\": \"externalCustomerId\",\n        \"value\": \"Customer Id 22-33-44\"\n      }\n    ]\n  },\n  \"options\": {\n    \"initiatedOnCustomersDevice\": true,\n    \"deliverLinks\": false,\n    \"handleFrozenPayments\": true,\n    \"handleManualInspection\": false,\n    \"automaticCapture\": false,\n    \"handlePhysicalAgreement\": false,\n    \"callbacks\": {\n      \"authorization\": {\n        \"url\": \"https://webhook.site/7d641b8c-dd09-451f-9f99-bb4cf181e59d\"\n      },\n      \"management\": {\n        \"url\": \"https://webhook.site/7d641b8c-dd09-451f-9f99-bb4cf181e59d\"\n      },\n      \"creditApplication\": {\n        \"url\": \"https://webhook.site/7d641b8c-dd09-451f-9f99-bb4cf181e59d\"\n      }\n    },\n    \"redirectionUrls\": {\n      \"customer\": {\n       \"failUrl\": \"https://hd.se/fail\",\n        \"successUrl\": \"https://hd.se\"\n      }\n    },\n    \"timeToLiveInMinutes\": 1\n  }\n}\n",
					"options": {
						"raw": {
							"language": "json"
						}
					}
				},
				"url": {
					"raw": "{{baseUrl}}/v2/payments",
					"host": [
						"{{baseUrl}}"
					],
					"path": [
						"v2",
						"payments"
					]
				}
			},
			"response": []
		},
		{
			"name": "Create Payment POS fi",
			"event": [
				{
					"listen": "test",
					"script": {
						"exec": [
							"const response = pm.response.json();",
							"pm.globals.set(\"myPaymentIdPaymentV2\", response.id);",
							"console.log('paymentId = ' + response.id)",
							"console.log('orderReference = ' + response.order.orderReference)",
							""
						],
						"type": "text/javascript"
					}
				},
				{
					"listen": "prerequest",
					"script": {
						"exec": [
							"console.log('Create payment v2');",
							"var today = new Date();",
							"var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();",
							"pm.globals.set(\"myOrderReferencePayment2\",date+'-'+ _.random(000001, 999999));",
							"pm.globals.set(\"mygovernmentIdPayment2\", \"150987-069L\");",
							"",
							"pm.globals.set(\"myJson\",(JSON.toString({\"state_from\": \"YES\", \"state_to\":  \"NO\"})));"
						],
						"type": "text/javascript"
					}
				}
			],
			"protocolProfileBehavior": {
				"disabledSystemHeaders": {
					"content-type": true
				}
			},
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
				"header": [
					{
						"key": "Content-Type",
						"type": "text",
						"value": "application/json-strict"
					}
				],
				"body": {
					"mode": "raw",
					"raw": "{\n  \"storeId\": \"{{myStorePaymentV2}}\",\n  \"paymentMethodId\": \"{{myPaymentMethodPaymentV2}}\",\n  \"order\": {\n    \n    \"orderLines\": [\n     {\n        \"quantity\" : 1,\n        \"quantityUnit\" : \"st\",\n        \"vatRate\" : 25,\n        \"totalAmountIncludingVat\" : 1500,\n        \"description\" : \"Kvitto total\",\n        \"reference\" : \"101\",\n        \"type\" : \"PHYSICAL_GOODS\"\n     }\n    ],\n    \"orderReference\": \"{{myOrderReferencePayment2}}\"\n  },\n  \"application\": {\n    \"applicationData\": {\n    }\n  },\n   \"customer\": {\n    \"customerType\": \"NATURAL\",\n    \"governmentId\": \"{{mygovernmentIdPayment2}}\",\n    \"email\": \"gert.larsson@resurs.se\",\n    \"mobilePhone\": \"+3585005555127\",\n    \"deviceInfo\": {\n      \"ip\": \"192.168.0.1\",\n      \"userAgent\": \"This is a test using postman xxxx8888\"\n    }\n  },\n    \"metadata\": {\n    \"creator\": \"gert_l_creator\",\n       \"custom\": [\n      {\n        \"key\": \"externalInvoiceReference\",\n        \"value\": \"my reference\"\n      },\n      {\n        \"key\": \"externalCustomerId\",\n        \"value\": \"Customer Id 22-33-44\"\n      }\n    ]\n  },\n  \"options\": {\n    \"initiatedOnCustomersDevice\": false,\n    \"deliverLinks\": false,\n    \"handleFrozenPayments\": false,\n    \"handleManualInspection\": false,\n    \"automaticCapture\": true,\n    \"handlePhysicalAgreement\": true,\n    \"callbacks\": {\n      \"authorization\": {\n        \"url\": \"https://shop.representative.com/callbackUrl/authorization?id={{myOrderReferencePayment2}}\"\n      },\n      \"management\": {\n        \"url\": \"https://shop.representative.com/callbackUrl/management?id={{myOrderReferencePayment2}}\"\n      }\n    },\n    \"redirectionUrls\": {\n      \"customer\": {\n        \"failUrl\": \"https://hd.se/{{myOrderReferencePayment2}}/fail\",\n        \"successUrl\": \"https://hd.se\"\n      }\n    },\n    \"timeToLiveInMinutes\": 120\n  }\n}\n",
					"options": {
						"raw": {
							"language": "json"
						}
					}
				},
				"url": {
					"raw": "{{baseUrl}}/v2/payments",
					"host": [
						"{{baseUrl}}"
					],
					"path": [
						"v2",
						"payments"
					]
				}
			},
			"response": []
		},
		{
			"name": "Create Payment payload från centrallog",
			"event": [
				{
					"listen": "test",
					"script": {
						"exec": [
							"const response = pm.response.json();",
							"pm.globals.set(\"myPaymentIdPaymentV2\", response.id);",
							"console.log('paymentId = ' + response.id)",
							"console.log('orderReference = ' + response.order.orderReference)",
							""
						],
						"type": "text/javascript"
					}
				},
				{
					"listen": "prerequest",
					"script": {
						"exec": [
							"console.log('Create payment v2');",
							"var today = new Date();",
							"var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();",
							"pm.globals.set(\"myOrderReferencePayment2\",date+'-'+ _.random(000001, 999999));",
							"",
							"",
							"pm.globals.set(\"myJson\",(JSON.toString({\"state_from\": \"YES\", \"state_to\":  \"NO\"})));"
						],
						"type": "text/javascript"
					}
				}
			],
			"protocolProfileBehavior": {
				"disabledSystemHeaders": {
					"content-type": true
				}
			},
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
				"header": [
					{
						"key": "Content-Type",
						"value": "application/json-strict",
						"type": "text"
					}
				],
				"body": {
					"mode": "raw",
					"raw": "{\n  \"storeId\" : \"1728c7ae-80e8-4fc2-90e4-80781076d981\",\n  \"paymentMethodId\" : \"917983f9-3ec8-4dec-8bbd-a75e74f4a3de\",\n  \"order\" : {\n    \"orderLines\" : [ {\n      \"quantity\" : 1,\n      \"quantityUnit\" : \"st\",\n      \"vatRate\" : 25,\n      \"totalAmountIncludingVat\" : 4500,\n      \"description\" : \"Hoodie with Logo\",\n      \"reference\" : \"woo-hoodie-with-logo\",\n      \"type\" : \"NORMAL\",\n      \"unitAmountIncludingVat\" : null,\n      \"totalVatAmount\" : null\n    }, {\n      \"quantity\" : 1,\n      \"quantityUnit\" : \"st\",\n      \"vatRate\" : 25,\n      \"totalAmountIncludingVat\" : 31,\n      \"description\" : \"Frakt\",\n      \"reference\" : \"frakt\",\n      \"type\" : \"SHIPPING\",\n      \"unitAmountIncludingVat\" : null,\n      \"totalVatAmount\" : null\n    } ],\n    \"orderReference\" : \"204\"\n  },\n  \"customer\" : {\n    \"deliveryAddress\" : {\n      \"addressRow1\" : \"Makadamg 6\",\n      \"postalArea\" : \"Malmö\",\n      \"postalCode\" : \"21149\",\n      \"countryCode\" : \"SE\",\n      \"fullName\" : \"Liam Williamsson\",\n      \"firstName\" : \"Liam\",\n      \"lastName\" : \"Williamsson\",\n      \"addressRow2\" : \"\"\n    },\n    \"customerType\" : \"NATURAL\",\n    \"contactPerson\" : \"\",\n    \"email\" : \"xACCEPT@test.se\",\n    \"governmentId\" : \"198801192470\",\n    \"mobilePhone\" : \"0707111111\",\n    \"deviceInfo\" : {\n      \"ip\" : \"172.21.0.2\",\n      \"userAgent\" : \"Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36\"\n    }\n  },\n  \"metadata\" : {\n    \"custom\" : [ {\n      \"key\" : \"externalCustomerId\",\n      \"value\" : \"1\"\n    } ]\n  },\n  \"options\" : {\n    \"initiatedOnCustomerDevice\" : true,\n    \"handleManualInspection\" : false,\n    \"handleFrozenPayments\" : true,\n    \"automaticCapture\" : null,\n    \"redirectionUrls\" : {\n      \"customer\" : {\n        \"failUrl\" : \"https://ecompress.onboarding.resurs.com/?page_id=6&cancel_order=true&order=wc_order_l0YmM84QZ27rm&order_id=204&redirect&_wpnonce=085c9388f3\",\n        \"successUrl\" : \"https://ecompress.onboarding.resurs.com/?page_id=7&order-received=204&key=wc_order_l0YmM84QZ27rm\"\n      },\n      \"coApplicant\" : null,\n      \"merchant\" : null\n    },\n    \"callbacks\" : {\n      \"authorization\" : {\n        \"url\" : \"https://ecompress.onboarding.resurs.com/?wc-api=ResursDefault&mapi-callback=AUTHORIZATION\",\n        \"description\" : \"Authorization callback\"\n      },\n      \"management\" : {\n        \"url\" : \"https://ecompress.onboarding.resurs.com/?wc-api=ResursDefault&mapi-callback=MANAGEMENT\",\n        \"description\" : \"Management callback\"\n      }\n    },\n    \"timeToLiveInMinutes\" : 120,\n    \"intValidation\" : { }\n  }\n}\n}",
					"options": {
						"raw": {
							"language": "json"
						}
					}
				},
				"url": {
					"raw": "{{baseUrl}}/v2/payments",
					"host": [
						"{{baseUrl}}"
					],
					"path": [
						"v2",
						"payments"
					]
				}
			},
			"response": []
		},
		{
			"name": "agreements Create",
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
					"raw": "{\n  \"paymentId\": \"{{myPaymentIdPaymentV2}}\",\n  \"applicantIdentification\": {\n    \"type\": \"ID\",\n    \"reference\": \"myReference\"\n  },\n  \"coApplicantIdentification\": {\n    \"type\": \"ID\",\n    \"reference\": \"coReference\"\n  }\n}",
					"options": {
						"raw": {
							"language": "json"
						}
					}
				},
				"url": {
					"raw": "{{baseUrl}}/v2/agreements",
					"host": [
						"{{baseUrl}}"
					],
					"path": [
						"v2",
						"agreements"
					]
				}
			},
			"response": []
		},
		{
			"name": "agreements Unsigned",
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
					"raw": "{\n  \"storeId\": \"{{myStorePaymentV2}}\",\n  \"governmentId\": \"{{mygovernmentIdPayment2}}\"\n}",
					"options": {
						"raw": {
							"language": "json"
						}
					}
				},
				"url": {
					"raw": "{{baseUrl}}/v2/agreements/unsigned",
					"host": [
						"{{baseUrl}}"
					],
					"path": [
						"v2",
						"agreements",
						"unsigned"
					]
				}
			},
			"response": []
		},
		{
			"name": "agreements Sign",
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
					"raw": "{\n  \"paymentId\": \"{{myPaymentIdPaymentV2}}\",\n  \"applicantIdentification\": {\n    \"type\": \"ID\",\n    \"reference\": \"myReference\"\n  },\n  \"creator\": \"gert_l\"\n}",
					"options": {
						"raw": {
							"language": "json"
						}
					}
				},
				"url": {
					"raw": "{{baseUrl}}/v2/agreements/sign",
					"host": [
						"{{baseUrl}}"
					],
					"path": [
						"v2",
						"agreements",
						"sign"
					]
				}
			},
			"response": []
		},
		{
			"name": "update order_reference",
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
							"console.log('update order resference');",
							"",
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
				"method": "PUT",
				"header": [],
				"body": {
					"mode": "raw",
					"raw": "{\n  \"newOrderReference\": \"new2309291\"\n}",
					"options": {
						"raw": {
							"language": "json"
						}
					}
				},
				"url": {
					"raw": "{{baseUrl}}/v2/payments/{{myPaymentIdPaymentV2}}/order/order_reference",
					"host": [
						"{{baseUrl}}"
					],
					"path": [
						"v2",
						"payments",
						"{{myPaymentIdPaymentV2}}",
						"order",
						"order_reference"
					]
				}
			},
			"response": []
		},
		{
			"name": "metadata",
			"event": [
				{
					"listen": "prerequest",
					"script": {
						"exec": [
							"console.log('metadate');",
							"",
							""
						],
						"type": "text/javascript"
					}
				},
				{
					"listen": "test",
					"script": {
						"exec": [
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
				"method": "PUT",
				"header": [],
				"body": {
					"mode": "raw",
					"raw": "{\n   \"custom\": [\n      {\n        \"key\": \"externalInvoiceReference\",\n        \"value\": \"my reference\"\n      },\n      {\n        \"key\": \"externalCustomerId\",\n        \"value\": \"Customer Id 22-33-44\"\n      }\n    ]\n}",
					"options": {
						"raw": {
							"language": "json"
						}
					}
				},
				"url": {
					"raw": "{{baseUrl}}/v2/payments/{{myPaymentIdPaymentV2}}/metadata",
					"host": [
						"{{baseUrl}}"
					],
					"path": [
						"v2",
						"payments",
						"{{myPaymentIdPaymentV2}}",
						"metadata"
					]
				}
			},
			"response": []
		},
		{
			"name": "Create Payment SWISH",
			"event": [
				{
					"listen": "test",
					"script": {
						"exec": [
							"const response = pm.response.json();",
							"pm.globals.set(\"myPaymentIdPaymentV2\", response.id);",
							""
						],
						"type": "text/javascript"
					}
				},
				{
					"listen": "prerequest",
					"script": {
						"exec": [
							"console.log('Create payment v2');",
							"",
							"pm.globals.set(\"myOrderReferencePayment2\", _.random(000001, 999999));"
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
					"raw": "{\n  \"storeId\": \"{{myStorePaymentV2}}\",\n  \"paymentMethodId\": \"{{myPaymentMethodPaymentV2}}\",\n  \"order\": {\n    \"orderLines\": [\n      {\n        \"description\": \"Product one\",\n        \"quantity\": 1,\n        \"reference\": \"TST-101\",\n        \"type\": \"NORMAL\",\n        \"quantityUnit\": \"st\",\n        \"unitAmountIncludingVat\": 625.00,\n        \"vatRate\": 25,\n        \"totalAmountIncludingVat\": 625.00,\n        \"totalVatAmount\": 125\n      },\n      {\n        \"description\": \"Product one\",\n        \"quantity\": 1,\n        \"reference\": \"TST-101\",\n        \"type\": \"NORMAL\",\n        \"quantityUnit\": \"st\",\n        \"unitAmountIncludingVat\": 625.00,\n        \"vatRate\": 25,\n        \"totalAmountIncludingVat\": 625.00,\n        \"totalVatAmount\": 125\n      },\n      {\n        \"description\": \"Discount one\",\n        \"quantity\": 1,\n        \"reference\": \"DC-101\",\n        \"type\": \"NORMAL\",\n        \"quantityUnit\": \"st\",\n        \"unitAmountIncludingVat\": -25.00,\n        \"vatRate\": 0,\n        \"totalAmountIncludingVat\": -25.00,\n        \"totalVatAmount\": 0\n      }\n    ],\n    \"orderReference\": \"{{myOrderReferencePayment2}}\"\n  },\n \n  \"customer\": {\n    \"customerType\": \"NATURAL\",\n    \"governmentId\": \"198305147715\",\n    \"deliveryAddress\": {\n      \"fullName\": \"Gert Larsson\",\n      \"firstName\": \"Wilhelm\",\n      \"lastName\": \"lastName\",\n      \"addressRow1\": \"Sommarstugan 33\",\n      \"addressRow2\": \"Adress 2\",\n      \"postalArea\": \"Franska rivieran\",\n      \"postalCode\": \"11122\",\n      \"countryCode\": \"FR\"\n    },\n    \"email\": \"test@resurs.se\",\n    \"mobilePhone\": \"+46707115599\",\n    \"deviceInfo\": {\n      \"ip\": \"192.168.0.1\",\n      \"userAgent\": \"This is a test using postman xxxx8888\"\n    }\n  },\n  \"information\": {\n    \"creator\": \"gert_l\",\n    \"metaData\": {\n      \"key_1\": \"value_1\",\n      \"key_2\": \"value_2\"\n    }\n  },\n  \"options\": {\n    \"initiatedOnCustomersDevice\": true,\n    \"handleFrozenPayments\": true,\n    \"handleManualInspection\": true,\n    \"callbacks\": {\n      \"authorization\": {\n        \"url\": \"https://shop.representative.com/callbackUrl/authorization?id={{myOrderReferencePayment2}}\"\n      },\n      \"management\": {\n        \"url\": \"https://shop.representative.com/callbackUrl/management?id={{myOrderReferencePayment2}}\"\n      }\n    },\n    \"redirectionUrls\": {\n      \"customer\": {\n        \"failUrl\": \"https://shop.representative.com/order/{{myOrderReferencePayment2}}/fail\",\n        \"successUrl\": \"https://shop.representative.com/order/{{myOrderReferencePayment2}}/success\"\n      }\n    },\n    \"timeToLiveInMinutes\": 120\n  }\n}\n",
					"options": {
						"raw": {
							"language": "json"
						}
					}
				},
				"url": {
					"raw": "{{baseUrl}}/payments",
					"host": [
						"{{baseUrl}}"
					],
					"path": [
						"payments"
					]
				}
			},
			"response": []
		},
		{
			"name": "Search payments",
			"event": [
				{
					"listen": "test",
					"script": {
						"exec": [
							"const response = pm.response.json();",
							"pm.globals.set(\"mysearchPaymentIdPaymentV2\", response.results[0].id);",
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
							"console.log('Find payment_id');",
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
					"raw": "{\n  \"storeId\": \"{{myStorePaymentV2}}\",\n  \"orderReference\": \"864301\"\n}",
					"options": {
						"raw": {
							"language": "json"
						}
					}
				},
				"url": {
					"raw": "{{baseUrl}}/v2/payments/search",
					"host": [
						"{{baseUrl}}"
					],
					"path": [
						"v2",
						"payments",
						"search"
					]
				}
			},
			"response": []
		},
		{
			"name": "send_links",
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
							"console.log('send_links');"
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
					"raw": "{\n  \"customer\": {\n    \"sendByEmail\": true,\n    \"emailOverride\": \"gert.larsson@resurs.se\",\n    \"sendBySms\": false,\n    \"smsOverride\": \"+46702222222\"\n  }\n}",
					"options": {
						"raw": {
							"language": "json"
						}
					}
				},
				"url": {
					"raw": "{{baseUrl}}/payments/{{myPaymentIdPaymentV2}}/tasks/send_links",
					"host": [
						"{{baseUrl}}"
					],
					"path": [
						"payments",
						"{{myPaymentIdPaymentV2}}",
						"tasks",
						"send_links"
					]
				}
			},
			"response": [
				{
					"name": "Internal Server Error",
					"originalRequest": {
						"method": "GET",
						"header": [
							{
								"description": "Added as a part of security scheme: bearer",
								"key": "Authorization",
								"value": "Bearer <token>"
							}
						],
						"url": {
							"raw": "{{baseUrl}}/stores/:store_id/payment_methods?amount=<number>",
							"host": [
								"{{baseUrl}}"
							],
							"path": [
								"stores",
								":store_id",
								"payment_methods"
							],
							"query": [
								{
									"key": "amount",
									"value": "<number>"
								}
							],
							"variable": [
								{
									"key": "store_id"
								}
							]
						}
					},
					"status": "Internal Server Error",
					"code": 500,
					"_postman_previewlanguage": "json",
					"header": [
						{
							"key": "Content-Type",
							"value": "application/json"
						}
					],
					"cookie": [],
					"body": "{\n \"code\": \"400\",\n \"message\": \"Validation error\",\n \"timestamp\": \"2019-11-21T09:52:34.678\",\n \"traceId\": \"033c6a06-1d2c-498f-81a0-02b5f8aac79e\"\n}"
				},
				{
					"name": "Forbidden",
					"originalRequest": {
						"method": "GET",
						"header": [
							{
								"description": "Added as a part of security scheme: bearer",
								"key": "Authorization",
								"value": "Bearer <token>"
							}
						],
						"url": {
							"raw": "{{baseUrl}}/stores/:store_id/payment_methods?amount=<number>",
							"host": [
								"{{baseUrl}}"
							],
							"path": [
								"stores",
								":store_id",
								"payment_methods"
							],
							"query": [
								{
									"key": "amount",
									"value": "<number>"
								}
							],
							"variable": [
								{
									"key": "store_id"
								}
							]
						}
					},
					"status": "Forbidden",
					"code": 403,
					"_postman_previewlanguage": "json",
					"header": [
						{
							"key": "Content-Type",
							"value": "application/json"
						}
					],
					"cookie": [],
					"body": "{\n \"code\": \"400\",\n \"message\": \"Validation error\",\n \"timestamp\": \"2019-11-21T09:52:34.678\",\n \"traceId\": \"033c6a06-1d2c-498f-81a0-02b5f8aac79e\"\n}"
				},
				{
					"name": "Not Found",
					"originalRequest": {
						"method": "GET",
						"header": [
							{
								"description": "Added as a part of security scheme: bearer",
								"key": "Authorization",
								"value": "Bearer <token>"
							}
						],
						"url": {
							"raw": "{{baseUrl}}/stores/:store_id/payment_methods?amount=<number>",
							"host": [
								"{{baseUrl}}"
							],
							"path": [
								"stores",
								":store_id",
								"payment_methods"
							],
							"query": [
								{
									"key": "amount",
									"value": "<number>"
								}
							],
							"variable": [
								{
									"key": "store_id"
								}
							]
						}
					},
					"status": "Not Found",
					"code": 404,
					"_postman_previewlanguage": "text",
					"header": [
						{
							"key": "Content-Type",
							"value": "*/*"
						}
					],
					"cookie": [],
					"body": ""
				},
				{
					"name": "OK",
					"originalRequest": {
						"method": "GET",
						"header": [
							{
								"description": "Added as a part of security scheme: bearer",
								"key": "Authorization",
								"value": "Bearer <token>"
							}
						],
						"url": {
							"raw": "{{baseUrl}}/stores/:store_id/payment_methods?amount=<number>",
							"host": [
								"{{baseUrl}}"
							],
							"path": [
								"stores",
								":store_id",
								"payment_methods"
							],
							"query": [
								{
									"key": "amount",
									"value": "<number>"
								}
							],
							"variable": [
								{
									"key": "store_id"
								}
							]
						}
					},
					"status": "OK",
					"code": 200,
					"_postman_previewlanguage": "text",
					"header": [
						{
							"key": "Content-Type",
							"value": "*/*"
						}
					],
					"cookie": [],
					"body": ""
				},
				{
					"name": "Unauthorized",
					"originalRequest": {
						"method": "GET",
						"header": [
							{
								"description": "Added as a part of security scheme: bearer",
								"key": "Authorization",
								"value": "Bearer <token>"
							}
						],
						"url": {
							"raw": "{{baseUrl}}/stores/:store_id/payment_methods?amount=<number>",
							"host": [
								"{{baseUrl}}"
							],
							"path": [
								"stores",
								":store_id",
								"payment_methods"
							],
							"query": [
								{
									"key": "amount",
									"value": "<number>"
								}
							],
							"variable": [
								{
									"key": "store_id"
								}
							]
						}
					},
					"status": "Unauthorized",
					"code": 401,
					"_postman_previewlanguage": "json",
					"header": [
						{
							"key": "Content-Type",
							"value": "application/json"
						}
					],
					"cookie": [],
					"body": "{\n \"code\": \"400\",\n \"message\": \"Validation error\",\n \"timestamp\": \"2019-11-21T09:52:34.678\",\n \"traceId\": \"033c6a06-1d2c-498f-81a0-02b5f8aac79e\"\n}"
				},
				{
					"name": "Bad Request",
					"originalRequest": {
						"method": "GET",
						"header": [
							{
								"description": "Added as a part of security scheme: bearer",
								"key": "Authorization",
								"value": "Bearer <token>"
							}
						],
						"url": {
							"raw": "{{baseUrl}}/stores/:store_id/payment_methods?amount=<number>",
							"host": [
								"{{baseUrl}}"
							],
							"path": [
								"stores",
								":store_id",
								"payment_methods"
							],
							"query": [
								{
									"key": "amount",
									"value": "<number>"
								}
							],
							"variable": [
								{
									"key": "store_id"
								}
							]
						}
					},
					"status": "Bad Request",
					"code": 400,
					"_postman_previewlanguage": "text",
					"header": [
						{
							"key": "Content-Type",
							"value": "*/*"
						}
					],
					"cookie": [],
					"body": ""
				}
			]
		},
		{
			"name": "Get Payment",
			"event": [
				{
					"listen": "test",
					"script": {
						"exec": [
							"// test",
							"pm.test(\"test\", function() {",
							"    var status = pm.response.json().status",
							"    var isFrozen = status === 'FROZEN'",
							"    var { possibleActions, capturedAmount, authorizedAmount, canceledAmount, totalOrderAmount, refundedAmount } = pm.response.json().order || {}",
							"    var canCapture = possibleActions.findIndex(({ action }) => action === 'CAPTURE') !== -1",
							"       // Fryst",
							"    if (isFrozen) {",
							"        pm.globals.set(\"statusFrozen\", \"yep\")",
							"    } else {",
							"        pm.globals.set(\"statusFrozen\", \"nope\")",
							"    }",
							"     // Processing",
							"    if (canCapture) {",
							"        pm.globals.set(\"statusProcessing\", \"yep\")",
							"    } else {",
							"        pm.globals.set(\"statusProcessing\", \"nope\")",
							"    }",
							"    // Completed",
							"    if (!canCapture && authorizedAmount === 0 && capturedAmount > 0 && capturedAmount !== refundedAmount) {",
							"        pm.globals.set(\"statusCompleted\", \"yep\")",
							"    } else {",
							"        pm.globals.set(\"statusCompleted\", \"nope\")",
							"    }",
							"    // Canceled",
							"    if (authorizedAmount === 0 && canceledAmount === totalOrderAmount) {",
							"        pm.globals.set(\"statusCanceled\", \"yep\")",
							"    } else {",
							"        pm.globals.set(\"statusCanceled\", \"nope\")",
							"    }",
							"    // Krediterad",
							"        if (capturedAmount > 0 && authorizedAmount === 0 && capturedAmount === refundedAmount) {",
							"        pm.globals.set(\"statusRefunded\", \"yep\")",
							"    } else {",
							"        pm.globals.set(\"statusRefunded\", \"nope\")",
							"    }",
							"",
							"    pm.globals.set(\"status\", status)",
							"})",
							"",
							"console.log('statusProcessing = ' + pm.globals.get(\"statusProcessing\"))",
							"console.log('statusCompleted = ' + pm.globals.get(\"statusCompleted\"))",
							"console.log('statusCanceled = ' + pm.globals.get(\"statusCanceled\"))",
							"console.log('statusRefunded = ' + pm.globals.get(\"statusRefunded\"))",
							"console.log('statusFrozen = ' + pm.globals.get(\"statusFrozen\"))",
							"console.log('status = ' + pm.globals.get(\"status\"))",
							"",
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
							"console.log('Get Payment');"
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
				"method": "GET",
				"header": [],
				"url": {
					"raw": "{{baseUrl}}/v2/payments/{{myPaymentIdPaymentV2}}",
					"host": [
						"{{baseUrl}}"
					],
					"path": [
						"v2",
						"payments",
						"{{myPaymentIdPaymentV2}}"
					]
				}
			},
			"response": [
				{
					"name": "Not Found",
					"originalRequest": {
						"method": "GET",
						"header": [
							{
								"description": "Added as a part of security scheme: bearer",
								"key": "Authorization",
								"value": "Bearer <token>"
							}
						],
						"url": {
							"raw": "{{baseUrl}}/stores/:store_id/payment_methods?amount=<number>",
							"host": [
								"{{baseUrl}}"
							],
							"path": [
								"stores",
								":store_id",
								"payment_methods"
							],
							"query": [
								{
									"key": "amount",
									"value": "<number>"
								}
							],
							"variable": [
								{
									"key": "store_id"
								}
							]
						}
					},
					"status": "Not Found",
					"code": 404,
					"_postman_previewlanguage": "text",
					"header": [
						{
							"key": "Content-Type",
							"value": "*/*"
						}
					],
					"cookie": [],
					"body": ""
				},
				{
					"name": "Unauthorized",
					"originalRequest": {
						"method": "GET",
						"header": [
							{
								"description": "Added as a part of security scheme: bearer",
								"key": "Authorization",
								"value": "Bearer <token>"
							}
						],
						"url": {
							"raw": "{{baseUrl}}/stores/:store_id/payment_methods?amount=<number>",
							"host": [
								"{{baseUrl}}"
							],
							"path": [
								"stores",
								":store_id",
								"payment_methods"
							],
							"query": [
								{
									"key": "amount",
									"value": "<number>"
								}
							],
							"variable": [
								{
									"key": "store_id"
								}
							]
						}
					},
					"status": "Unauthorized",
					"code": 401,
					"_postman_previewlanguage": "json",
					"header": [
						{
							"key": "Content-Type",
							"value": "application/json"
						}
					],
					"cookie": [],
					"body": "{\n \"code\": \"400\",\n \"message\": \"Validation error\",\n \"timestamp\": \"2019-11-21T09:52:34.678\",\n \"traceId\": \"033c6a06-1d2c-498f-81a0-02b5f8aac79e\"\n}"
				},
				{
					"name": "OK",
					"originalRequest": {
						"method": "GET",
						"header": [
							{
								"description": "Added as a part of security scheme: bearer",
								"key": "Authorization",
								"value": "Bearer <token>"
							}
						],
						"url": {
							"raw": "{{baseUrl}}/stores/:store_id/payment_methods?amount=<number>",
							"host": [
								"{{baseUrl}}"
							],
							"path": [
								"stores",
								":store_id",
								"payment_methods"
							],
							"query": [
								{
									"key": "amount",
									"value": "<number>"
								}
							],
							"variable": [
								{
									"key": "store_id"
								}
							]
						}
					},
					"status": "OK",
					"code": 200,
					"_postman_previewlanguage": "text",
					"header": [
						{
							"key": "Content-Type",
							"value": "*/*"
						}
					],
					"cookie": [],
					"body": ""
				},
				{
					"name": "Bad Request",
					"originalRequest": {
						"method": "GET",
						"header": [
							{
								"description": "Added as a part of security scheme: bearer",
								"key": "Authorization",
								"value": "Bearer <token>"
							}
						],
						"url": {
							"raw": "{{baseUrl}}/stores/:store_id/payment_methods?amount=<number>",
							"host": [
								"{{baseUrl}}"
							],
							"path": [
								"stores",
								":store_id",
								"payment_methods"
							],
							"query": [
								{
									"key": "amount",
									"value": "<number>"
								}
							],
							"variable": [
								{
									"key": "store_id"
								}
							]
						}
					},
					"status": "Bad Request",
					"code": 400,
					"_postman_previewlanguage": "text",
					"header": [
						{
							"key": "Content-Type",
							"value": "*/*"
						}
					],
					"cookie": [],
					"body": ""
				},
				{
					"name": "Internal Server Error",
					"originalRequest": {
						"method": "GET",
						"header": [
							{
								"description": "Added as a part of security scheme: bearer",
								"key": "Authorization",
								"value": "Bearer <token>"
							}
						],
						"url": {
							"raw": "{{baseUrl}}/stores/:store_id/payment_methods?amount=<number>",
							"host": [
								"{{baseUrl}}"
							],
							"path": [
								"stores",
								":store_id",
								"payment_methods"
							],
							"query": [
								{
									"key": "amount",
									"value": "<number>"
								}
							],
							"variable": [
								{
									"key": "store_id"
								}
							]
						}
					},
					"status": "Internal Server Error",
					"code": 500,
					"_postman_previewlanguage": "json",
					"header": [
						{
							"key": "Content-Type",
							"value": "application/json"
						}
					],
					"cookie": [],
					"body": "{\n \"code\": \"400\",\n \"message\": \"Validation error\",\n \"timestamp\": \"2019-11-21T09:52:34.678\",\n \"traceId\": \"033c6a06-1d2c-498f-81a0-02b5f8aac79e\"\n}"
				},
				{
					"name": "Forbidden",
					"originalRequest": {
						"method": "GET",
						"header": [
							{
								"description": "Added as a part of security scheme: bearer",
								"key": "Authorization",
								"value": "Bearer <token>"
							}
						],
						"url": {
							"raw": "{{baseUrl}}/stores/:store_id/payment_methods?amount=<number>",
							"host": [
								"{{baseUrl}}"
							],
							"path": [
								"stores",
								":store_id",
								"payment_methods"
							],
							"query": [
								{
									"key": "amount",
									"value": "<number>"
								}
							],
							"variable": [
								{
									"key": "store_id"
								}
							]
						}
					},
					"status": "Forbidden",
					"code": 403,
					"_postman_previewlanguage": "json",
					"header": [
						{
							"key": "Content-Type",
							"value": "application/json"
						}
					],
					"cookie": [],
					"body": "{\n \"code\": \"400\",\n \"message\": \"Validation error\",\n \"timestamp\": \"2019-11-21T09:52:34.678\",\n \"traceId\": \"033c6a06-1d2c-498f-81a0-02b5f8aac79e\"\n}"
				}
			]
		},
		{
			"name": "Get Payment id från centrallog",
			"event": [
				{
					"listen": "test",
					"script": {
						"exec": [
							"// test",
							"pm.test(\"test\", function() {",
							"    var status = pm.response.json().status",
							"    var isFrozen = status === 'FROZEN'",
							"    var { possibleActions, capturedAmount, authorizedAmount, canceledAmount, totalOrderAmount, refundedAmount } = pm.response.json().order || {}",
							"    var canCapture = possibleActions.findIndex(({ action }) => action === 'CAPTURE') !== -1",
							"       // Fryst",
							"    if (isFrozen) {",
							"        pm.globals.set(\"statusFrozen\", \"yep\")",
							"    } else {",
							"        pm.globals.set(\"statusFrozen\", \"nope\")",
							"    }",
							"     // Processing",
							"    if (canCapture) {",
							"        pm.globals.set(\"statusProcessing\", \"yep\")",
							"    } else {",
							"        pm.globals.set(\"statusProcessing\", \"nope\")",
							"    }",
							"    // Completed",
							"    if (!canCapture && authorizedAmount === 0 && capturedAmount > 0 && capturedAmount !== refundedAmount) {",
							"        pm.globals.set(\"statusCompleted\", \"yep\")",
							"    } else {",
							"        pm.globals.set(\"statusCompleted\", \"nope\")",
							"    }",
							"    // Canceled",
							"    if (authorizedAmount === 0 && canceledAmount === totalOrderAmount) {",
							"        pm.globals.set(\"statusCanceled\", \"yep\")",
							"    } else {",
							"        pm.globals.set(\"statusCanceled\", \"nope\")",
							"    }",
							"    // Krediterad",
							"        if (capturedAmount > 0 && authorizedAmount === 0 && capturedAmount === refundedAmount) {",
							"        pm.globals.set(\"statusRefunded\", \"yep\")",
							"    } else {",
							"        pm.globals.set(\"statusRefunded\", \"nope\")",
							"    }",
							"",
							"    pm.globals.set(\"status\", status)",
							"})",
							"",
							"console.log('statusProcessing = ' + pm.globals.get(\"statusProcessing\"))",
							"console.log('statusCompleted = ' + pm.globals.get(\"statusCompleted\"))",
							"console.log('statusCanceled = ' + pm.globals.get(\"statusCanceled\"))",
							"console.log('statusRefunded = ' + pm.globals.get(\"statusRefunded\"))",
							"console.log('statusFrozen = ' + pm.globals.get(\"statusFrozen\"))",
							"console.log('status = ' + pm.globals.get(\"status\"))",
							"",
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
							"console.log('Get Payment');",
							"",
							"pm.globals.set(\"myPaymentIdPaymentV2\", \"8ab85df3-d3cf-4808-b241-e3e8b4c60aca\");"
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
				"method": "GET",
				"header": [],
				"url": {
					"raw": "{{baseUrl}}/v2/payments/{{myPaymentIdPaymentV2}}",
					"host": [
						"{{baseUrl}}"
					],
					"path": [
						"v2",
						"payments",
						"{{myPaymentIdPaymentV2}}"
					]
				}
			},
			"response": [
				{
					"name": "Bad Request",
					"originalRequest": {
						"method": "GET",
						"header": [
							{
								"description": "Added as a part of security scheme: bearer",
								"key": "Authorization",
								"value": "Bearer <token>"
							}
						],
						"url": {
							"raw": "{{baseUrl}}/stores/:store_id/payment_methods?amount=<number>",
							"host": [
								"{{baseUrl}}"
							],
							"path": [
								"stores",
								":store_id",
								"payment_methods"
							],
							"query": [
								{
									"key": "amount",
									"value": "<number>"
								}
							],
							"variable": [
								{
									"key": "store_id"
								}
							]
						}
					},
					"status": "Bad Request",
					"code": 400,
					"_postman_previewlanguage": "text",
					"header": [
						{
							"key": "Content-Type",
							"value": "*/*"
						}
					],
					"cookie": [],
					"body": ""
				},
				{
					"name": "OK",
					"originalRequest": {
						"method": "GET",
						"header": [
							{
								"description": "Added as a part of security scheme: bearer",
								"key": "Authorization",
								"value": "Bearer <token>"
							}
						],
						"url": {
							"raw": "{{baseUrl}}/stores/:store_id/payment_methods?amount=<number>",
							"host": [
								"{{baseUrl}}"
							],
							"path": [
								"stores",
								":store_id",
								"payment_methods"
							],
							"query": [
								{
									"key": "amount",
									"value": "<number>"
								}
							],
							"variable": [
								{
									"key": "store_id"
								}
							]
						}
					},
					"status": "OK",
					"code": 200,
					"_postman_previewlanguage": "text",
					"header": [
						{
							"key": "Content-Type",
							"value": "*/*"
						}
					],
					"cookie": [],
					"body": ""
				},
				{
					"name": "Not Found",
					"originalRequest": {
						"method": "GET",
						"header": [
							{
								"description": "Added as a part of security scheme: bearer",
								"key": "Authorization",
								"value": "Bearer <token>"
							}
						],
						"url": {
							"raw": "{{baseUrl}}/stores/:store_id/payment_methods?amount=<number>",
							"host": [
								"{{baseUrl}}"
							],
							"path": [
								"stores",
								":store_id",
								"payment_methods"
							],
							"query": [
								{
									"key": "amount",
									"value": "<number>"
								}
							],
							"variable": [
								{
									"key": "store_id"
								}
							]
						}
					},
					"status": "Not Found",
					"code": 404,
					"_postman_previewlanguage": "text",
					"header": [
						{
							"key": "Content-Type",
							"value": "*/*"
						}
					],
					"cookie": [],
					"body": ""
				},
				{
					"name": "Internal Server Error",
					"originalRequest": {
						"method": "GET",
						"header": [
							{
								"description": "Added as a part of security scheme: bearer",
								"key": "Authorization",
								"value": "Bearer <token>"
							}
						],
						"url": {
							"raw": "{{baseUrl}}/stores/:store_id/payment_methods?amount=<number>",
							"host": [
								"{{baseUrl}}"
							],
							"path": [
								"stores",
								":store_id",
								"payment_methods"
							],
							"query": [
								{
									"key": "amount",
									"value": "<number>"
								}
							],
							"variable": [
								{
									"key": "store_id"
								}
							]
						}
					},
					"status": "Internal Server Error",
					"code": 500,
					"_postman_previewlanguage": "json",
					"header": [
						{
							"key": "Content-Type",
							"value": "application/json"
						}
					],
					"cookie": [],
					"body": "{\n \"code\": \"400\",\n \"message\": \"Validation error\",\n \"timestamp\": \"2019-11-21T09:52:34.678\",\n \"traceId\": \"033c6a06-1d2c-498f-81a0-02b5f8aac79e\"\n}"
				},
				{
					"name": "Unauthorized",
					"originalRequest": {
						"method": "GET",
						"header": [
							{
								"description": "Added as a part of security scheme: bearer",
								"key": "Authorization",
								"value": "Bearer <token>"
							}
						],
						"url": {
							"raw": "{{baseUrl}}/stores/:store_id/payment_methods?amount=<number>",
							"host": [
								"{{baseUrl}}"
							],
							"path": [
								"stores",
								":store_id",
								"payment_methods"
							],
							"query": [
								{
									"key": "amount",
									"value": "<number>"
								}
							],
							"variable": [
								{
									"key": "store_id"
								}
							]
						}
					},
					"status": "Unauthorized",
					"code": 401,
					"_postman_previewlanguage": "json",
					"header": [
						{
							"key": "Content-Type",
							"value": "application/json"
						}
					],
					"cookie": [],
					"body": "{\n \"code\": \"400\",\n \"message\": \"Validation error\",\n \"timestamp\": \"2019-11-21T09:52:34.678\",\n \"traceId\": \"033c6a06-1d2c-498f-81a0-02b5f8aac79e\"\n}"
				},
				{
					"name": "Forbidden",
					"originalRequest": {
						"method": "GET",
						"header": [
							{
								"description": "Added as a part of security scheme: bearer",
								"key": "Authorization",
								"value": "Bearer <token>"
							}
						],
						"url": {
							"raw": "{{baseUrl}}/stores/:store_id/payment_methods?amount=<number>",
							"host": [
								"{{baseUrl}}"
							],
							"path": [
								"stores",
								":store_id",
								"payment_methods"
							],
							"query": [
								{
									"key": "amount",
									"value": "<number>"
								}
							],
							"variable": [
								{
									"key": "store_id"
								}
							]
						}
					},
					"status": "Forbidden",
					"code": 403,
					"_postman_previewlanguage": "json",
					"header": [
						{
							"key": "Content-Type",
							"value": "application/json"
						}
					],
					"cookie": [],
					"body": "{\n \"code\": \"400\",\n \"message\": \"Validation error\",\n \"timestamp\": \"2019-11-21T09:52:34.678\",\n \"traceId\": \"033c6a06-1d2c-498f-81a0-02b5f8aac79e\"\n}"
				}
			]
		},
		{
			"name": "Get Payment Status",
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
							"console.log('Get PaymentMethodId');"
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
				"method": "GET",
				"header": [],
				"url": {
					"raw": "{{baseUrl}}/payments/{{myPaymentIdPaymentV2}}/tasks/status",
					"host": [
						"{{baseUrl}}"
					],
					"path": [
						"payments",
						"{{myPaymentIdPaymentV2}}",
						"tasks",
						"status"
					]
				}
			},
			"response": [
				{
					"name": "Forbidden",
					"originalRequest": {
						"method": "GET",
						"header": [
							{
								"description": "Added as a part of security scheme: bearer",
								"key": "Authorization",
								"value": "Bearer <token>"
							}
						],
						"url": {
							"raw": "{{baseUrl}}/stores/:store_id/payment_methods?amount=<number>",
							"host": [
								"{{baseUrl}}"
							],
							"path": [
								"stores",
								":store_id",
								"payment_methods"
							],
							"query": [
								{
									"key": "amount",
									"value": "<number>"
								}
							],
							"variable": [
								{
									"key": "store_id"
								}
							]
						}
					},
					"status": "Forbidden",
					"code": 403,
					"_postman_previewlanguage": "json",
					"header": [
						{
							"key": "Content-Type",
							"value": "application/json"
						}
					],
					"cookie": [],
					"body": "{\n \"code\": \"400\",\n \"message\": \"Validation error\",\n \"timestamp\": \"2019-11-21T09:52:34.678\",\n \"traceId\": \"033c6a06-1d2c-498f-81a0-02b5f8aac79e\"\n}"
				},
				{
					"name": "OK",
					"originalRequest": {
						"method": "GET",
						"header": [
							{
								"description": "Added as a part of security scheme: bearer",
								"key": "Authorization",
								"value": "Bearer <token>"
							}
						],
						"url": {
							"raw": "{{baseUrl}}/stores/:store_id/payment_methods?amount=<number>",
							"host": [
								"{{baseUrl}}"
							],
							"path": [
								"stores",
								":store_id",
								"payment_methods"
							],
							"query": [
								{
									"key": "amount",
									"value": "<number>"
								}
							],
							"variable": [
								{
									"key": "store_id"
								}
							]
						}
					},
					"status": "OK",
					"code": 200,
					"_postman_previewlanguage": "text",
					"header": [
						{
							"key": "Content-Type",
							"value": "*/*"
						}
					],
					"cookie": [],
					"body": ""
				},
				{
					"name": "Not Found",
					"originalRequest": {
						"method": "GET",
						"header": [
							{
								"description": "Added as a part of security scheme: bearer",
								"key": "Authorization",
								"value": "Bearer <token>"
							}
						],
						"url": {
							"raw": "{{baseUrl}}/stores/:store_id/payment_methods?amount=<number>",
							"host": [
								"{{baseUrl}}"
							],
							"path": [
								"stores",
								":store_id",
								"payment_methods"
							],
							"query": [
								{
									"key": "amount",
									"value": "<number>"
								}
							],
							"variable": [
								{
									"key": "store_id"
								}
							]
						}
					},
					"status": "Not Found",
					"code": 404,
					"_postman_previewlanguage": "text",
					"header": [
						{
							"key": "Content-Type",
							"value": "*/*"
						}
					],
					"cookie": [],
					"body": ""
				},
				{
					"name": "Unauthorized",
					"originalRequest": {
						"method": "GET",
						"header": [
							{
								"description": "Added as a part of security scheme: bearer",
								"key": "Authorization",
								"value": "Bearer <token>"
							}
						],
						"url": {
							"raw": "{{baseUrl}}/stores/:store_id/payment_methods?amount=<number>",
							"host": [
								"{{baseUrl}}"
							],
							"path": [
								"stores",
								":store_id",
								"payment_methods"
							],
							"query": [
								{
									"key": "amount",
									"value": "<number>"
								}
							],
							"variable": [
								{
									"key": "store_id"
								}
							]
						}
					},
					"status": "Unauthorized",
					"code": 401,
					"_postman_previewlanguage": "json",
					"header": [
						{
							"key": "Content-Type",
							"value": "application/json"
						}
					],
					"cookie": [],
					"body": "{\n \"code\": \"400\",\n \"message\": \"Validation error\",\n \"timestamp\": \"2019-11-21T09:52:34.678\",\n \"traceId\": \"033c6a06-1d2c-498f-81a0-02b5f8aac79e\"\n}"
				},
				{
					"name": "Bad Request",
					"originalRequest": {
						"method": "GET",
						"header": [
							{
								"description": "Added as a part of security scheme: bearer",
								"key": "Authorization",
								"value": "Bearer <token>"
							}
						],
						"url": {
							"raw": "{{baseUrl}}/stores/:store_id/payment_methods?amount=<number>",
							"host": [
								"{{baseUrl}}"
							],
							"path": [
								"stores",
								":store_id",
								"payment_methods"
							],
							"query": [
								{
									"key": "amount",
									"value": "<number>"
								}
							],
							"variable": [
								{
									"key": "store_id"
								}
							]
						}
					},
					"status": "Bad Request",
					"code": 400,
					"_postman_previewlanguage": "text",
					"header": [
						{
							"key": "Content-Type",
							"value": "*/*"
						}
					],
					"cookie": [],
					"body": ""
				},
				{
					"name": "Internal Server Error",
					"originalRequest": {
						"method": "GET",
						"header": [
							{
								"description": "Added as a part of security scheme: bearer",
								"key": "Authorization",
								"value": "Bearer <token>"
							}
						],
						"url": {
							"raw": "{{baseUrl}}/stores/:store_id/payment_methods?amount=<number>",
							"host": [
								"{{baseUrl}}"
							],
							"path": [
								"stores",
								":store_id",
								"payment_methods"
							],
							"query": [
								{
									"key": "amount",
									"value": "<number>"
								}
							],
							"variable": [
								{
									"key": "store_id"
								}
							]
						}
					},
					"status": "Internal Server Error",
					"code": 500,
					"_postman_previewlanguage": "json",
					"header": [
						{
							"key": "Content-Type",
							"value": "application/json"
						}
					],
					"cookie": [],
					"body": "{\n \"code\": \"400\",\n \"message\": \"Validation error\",\n \"timestamp\": \"2019-11-21T09:52:34.678\",\n \"traceId\": \"033c6a06-1d2c-498f-81a0-02b5f8aac79e\"\n}"
				}
			]
		},
		{
			"name": "Get Payment Action",
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
							"console.log('Get PaymentAction');"
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
				"method": "GET",
				"header": [],
				"url": {
					"raw": "{{baseUrl}}/v2/payments/{{myPaymentIdPaymentV2}}/actions/{{myActionId}}",
					"host": [
						"{{baseUrl}}"
					],
					"path": [
						"v2",
						"payments",
						"{{myPaymentIdPaymentV2}}",
						"actions",
						"{{myActionId}}"
					]
				}
			},
			"response": [
				{
					"name": "Unauthorized",
					"originalRequest": {
						"method": "GET",
						"header": [
							{
								"description": "Added as a part of security scheme: bearer",
								"key": "Authorization",
								"value": "Bearer <token>"
							}
						],
						"url": {
							"raw": "{{baseUrl}}/stores/:store_id/payment_methods?amount=<number>",
							"host": [
								"{{baseUrl}}"
							],
							"path": [
								"stores",
								":store_id",
								"payment_methods"
							],
							"query": [
								{
									"key": "amount",
									"value": "<number>"
								}
							],
							"variable": [
								{
									"key": "store_id"
								}
							]
						}
					},
					"status": "Unauthorized",
					"code": 401,
					"_postman_previewlanguage": "json",
					"header": [
						{
							"key": "Content-Type",
							"value": "application/json"
						}
					],
					"cookie": [],
					"body": "{\n \"code\": \"400\",\n \"message\": \"Validation error\",\n \"timestamp\": \"2019-11-21T09:52:34.678\",\n \"traceId\": \"033c6a06-1d2c-498f-81a0-02b5f8aac79e\"\n}"
				},
				{
					"name": "Not Found",
					"originalRequest": {
						"method": "GET",
						"header": [
							{
								"description": "Added as a part of security scheme: bearer",
								"key": "Authorization",
								"value": "Bearer <token>"
							}
						],
						"url": {
							"raw": "{{baseUrl}}/stores/:store_id/payment_methods?amount=<number>",
							"host": [
								"{{baseUrl}}"
							],
							"path": [
								"stores",
								":store_id",
								"payment_methods"
							],
							"query": [
								{
									"key": "amount",
									"value": "<number>"
								}
							],
							"variable": [
								{
									"key": "store_id"
								}
							]
						}
					},
					"status": "Not Found",
					"code": 404,
					"_postman_previewlanguage": "text",
					"header": [
						{
							"key": "Content-Type",
							"value": "*/*"
						}
					],
					"cookie": [],
					"body": ""
				},
				{
					"name": "Bad Request",
					"originalRequest": {
						"method": "GET",
						"header": [
							{
								"description": "Added as a part of security scheme: bearer",
								"key": "Authorization",
								"value": "Bearer <token>"
							}
						],
						"url": {
							"raw": "{{baseUrl}}/stores/:store_id/payment_methods?amount=<number>",
							"host": [
								"{{baseUrl}}"
							],
							"path": [
								"stores",
								":store_id",
								"payment_methods"
							],
							"query": [
								{
									"key": "amount",
									"value": "<number>"
								}
							],
							"variable": [
								{
									"key": "store_id"
								}
							]
						}
					},
					"status": "Bad Request",
					"code": 400,
					"_postman_previewlanguage": "text",
					"header": [
						{
							"key": "Content-Type",
							"value": "*/*"
						}
					],
					"cookie": [],
					"body": ""
				},
				{
					"name": "Forbidden",
					"originalRequest": {
						"method": "GET",
						"header": [
							{
								"description": "Added as a part of security scheme: bearer",
								"key": "Authorization",
								"value": "Bearer <token>"
							}
						],
						"url": {
							"raw": "{{baseUrl}}/stores/:store_id/payment_methods?amount=<number>",
							"host": [
								"{{baseUrl}}"
							],
							"path": [
								"stores",
								":store_id",
								"payment_methods"
							],
							"query": [
								{
									"key": "amount",
									"value": "<number>"
								}
							],
							"variable": [
								{
									"key": "store_id"
								}
							]
						}
					},
					"status": "Forbidden",
					"code": 403,
					"_postman_previewlanguage": "json",
					"header": [
						{
							"key": "Content-Type",
							"value": "application/json"
						}
					],
					"cookie": [],
					"body": "{\n \"code\": \"400\",\n \"message\": \"Validation error\",\n \"timestamp\": \"2019-11-21T09:52:34.678\",\n \"traceId\": \"033c6a06-1d2c-498f-81a0-02b5f8aac79e\"\n}"
				},
				{
					"name": "OK",
					"originalRequest": {
						"method": "GET",
						"header": [
							{
								"description": "Added as a part of security scheme: bearer",
								"key": "Authorization",
								"value": "Bearer <token>"
							}
						],
						"url": {
							"raw": "{{baseUrl}}/stores/:store_id/payment_methods?amount=<number>",
							"host": [
								"{{baseUrl}}"
							],
							"path": [
								"stores",
								":store_id",
								"payment_methods"
							],
							"query": [
								{
									"key": "amount",
									"value": "<number>"
								}
							],
							"variable": [
								{
									"key": "store_id"
								}
							]
						}
					},
					"status": "OK",
					"code": 200,
					"_postman_previewlanguage": "text",
					"header": [
						{
							"key": "Content-Type",
							"value": "*/*"
						}
					],
					"cookie": [],
					"body": ""
				},
				{
					"name": "Internal Server Error",
					"originalRequest": {
						"method": "GET",
						"header": [
							{
								"description": "Added as a part of security scheme: bearer",
								"key": "Authorization",
								"value": "Bearer <token>"
							}
						],
						"url": {
							"raw": "{{baseUrl}}/stores/:store_id/payment_methods?amount=<number>",
							"host": [
								"{{baseUrl}}"
							],
							"path": [
								"stores",
								":store_id",
								"payment_methods"
							],
							"query": [
								{
									"key": "amount",
									"value": "<number>"
								}
							],
							"variable": [
								{
									"key": "store_id"
								}
							]
						}
					},
					"status": "Internal Server Error",
					"code": 500,
					"_postman_previewlanguage": "json",
					"header": [
						{
							"key": "Content-Type",
							"value": "application/json"
						}
					],
					"cookie": [],
					"body": "{\n \"code\": \"400\",\n \"message\": \"Validation error\",\n \"timestamp\": \"2019-11-21T09:52:34.678\",\n \"traceId\": \"033c6a06-1d2c-498f-81a0-02b5f8aac79e\"\n}"
				}
			]
		},
		{
			"name": "Get Payment Action från Management callback",
			"event": [
				{
					"listen": "test",
					"script": {
						"exec": [
							"const payAct = pm.response.json();",
							"pm.globals.set(\"myType\", payAct.type);",
							"let theSum = 0",
							"for (var i = 0 ; i < payAct.orderLines.length ; i ++) {",
							"    {",
							"        theSum += payAct.orderLines[i].totalAmountIncludingVat; ",
							"    }    ",
							"}",
							"/* Bättre lösning:",
							"    The reduce() method executes a user-supplied \"reducer\" callback function on each element of the array, in order, passing in the return value from the calculation on the preceding element. The final result of running the reducer across all elements of the array is a single value.",
							"*/",
							"let totalSum = payAct.orderLines.reduce((myAccumulator, myCurrentValue) => myAccumulator + myCurrentValue.totalAmountIncludingVat, 0)",
							"",
							"pm.globals.set(\"myActionSum\", theSum);",
							"console.log(    'Summa orderLines.totalAmountIncludingVat för aktuell action: '",
							"                + pm.globals.get(\"myActionSum\") ",
							"                + ' Type: ' ",
							"                + pm.globals.get(\"myType\"), totalSum); ",
							""
						],
						"type": "text/javascript"
					}
				},
				{
					"listen": "prerequest",
					"script": {
						"exec": [
							"console.log('Get PaymentAction');",
							"",
							"pm.globals.set(\"myPaymentIdPaymentV2\", \"6245688c-06c9-47eb-8412-7ce689ce4130\");",
							"pm.globals.set(\"myActionId\", \"364e9100-89fa-4b01-9d4f-355c51b4de6c\");"
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
				"method": "GET",
				"header": [],
				"url": {
					"raw": "{{baseUrl}}/v2/payments/{{myPaymentIdPaymentV2}}/actions/{{myActionId}}",
					"host": [
						"{{baseUrl}}"
					],
					"path": [
						"v2",
						"payments",
						"{{myPaymentIdPaymentV2}}",
						"actions",
						"{{myActionId}}"
					]
				}
			},
			"response": [
				{
					"name": "Internal Server Error",
					"originalRequest": {
						"method": "GET",
						"header": [
							{
								"description": "Added as a part of security scheme: bearer",
								"key": "Authorization",
								"value": "Bearer <token>"
							}
						],
						"url": {
							"raw": "{{baseUrl}}/stores/:store_id/payment_methods?amount=<number>",
							"host": [
								"{{baseUrl}}"
							],
							"path": [
								"stores",
								":store_id",
								"payment_methods"
							],
							"query": [
								{
									"key": "amount",
									"value": "<number>"
								}
							],
							"variable": [
								{
									"key": "store_id"
								}
							]
						}
					},
					"status": "Internal Server Error",
					"code": 500,
					"_postman_previewlanguage": "json",
					"header": [
						{
							"key": "Content-Type",
							"value": "application/json"
						}
					],
					"cookie": [],
					"body": "{\n \"code\": \"400\",\n \"message\": \"Validation error\",\n \"timestamp\": \"2019-11-21T09:52:34.678\",\n \"traceId\": \"033c6a06-1d2c-498f-81a0-02b5f8aac79e\"\n}"
				},
				{
					"name": "Unauthorized",
					"originalRequest": {
						"method": "GET",
						"header": [
							{
								"description": "Added as a part of security scheme: bearer",
								"key": "Authorization",
								"value": "Bearer <token>"
							}
						],
						"url": {
							"raw": "{{baseUrl}}/stores/:store_id/payment_methods?amount=<number>",
							"host": [
								"{{baseUrl}}"
							],
							"path": [
								"stores",
								":store_id",
								"payment_methods"
							],
							"query": [
								{
									"key": "amount",
									"value": "<number>"
								}
							],
							"variable": [
								{
									"key": "store_id"
								}
							]
						}
					},
					"status": "Unauthorized",
					"code": 401,
					"_postman_previewlanguage": "json",
					"header": [
						{
							"key": "Content-Type",
							"value": "application/json"
						}
					],
					"cookie": [],
					"body": "{\n \"code\": \"400\",\n \"message\": \"Validation error\",\n \"timestamp\": \"2019-11-21T09:52:34.678\",\n \"traceId\": \"033c6a06-1d2c-498f-81a0-02b5f8aac79e\"\n}"
				},
				{
					"name": "Bad Request",
					"originalRequest": {
						"method": "GET",
						"header": [
							{
								"description": "Added as a part of security scheme: bearer",
								"key": "Authorization",
								"value": "Bearer <token>"
							}
						],
						"url": {
							"raw": "{{baseUrl}}/stores/:store_id/payment_methods?amount=<number>",
							"host": [
								"{{baseUrl}}"
							],
							"path": [
								"stores",
								":store_id",
								"payment_methods"
							],
							"query": [
								{
									"key": "amount",
									"value": "<number>"
								}
							],
							"variable": [
								{
									"key": "store_id"
								}
							]
						}
					},
					"status": "Bad Request",
					"code": 400,
					"_postman_previewlanguage": "text",
					"header": [
						{
							"key": "Content-Type",
							"value": "*/*"
						}
					],
					"cookie": [],
					"body": ""
				},
				{
					"name": "OK",
					"originalRequest": {
						"method": "GET",
						"header": [
							{
								"description": "Added as a part of security scheme: bearer",
								"key": "Authorization",
								"value": "Bearer <token>"
							}
						],
						"url": {
							"raw": "{{baseUrl}}/stores/:store_id/payment_methods?amount=<number>",
							"host": [
								"{{baseUrl}}"
							],
							"path": [
								"stores",
								":store_id",
								"payment_methods"
							],
							"query": [
								{
									"key": "amount",
									"value": "<number>"
								}
							],
							"variable": [
								{
									"key": "store_id"
								}
							]
						}
					},
					"status": "OK",
					"code": 200,
					"_postman_previewlanguage": "text",
					"header": [
						{
							"key": "Content-Type",
							"value": "*/*"
						}
					],
					"cookie": [],
					"body": ""
				},
				{
					"name": "Forbidden",
					"originalRequest": {
						"method": "GET",
						"header": [
							{
								"description": "Added as a part of security scheme: bearer",
								"key": "Authorization",
								"value": "Bearer <token>"
							}
						],
						"url": {
							"raw": "{{baseUrl}}/stores/:store_id/payment_methods?amount=<number>",
							"host": [
								"{{baseUrl}}"
							],
							"path": [
								"stores",
								":store_id",
								"payment_methods"
							],
							"query": [
								{
									"key": "amount",
									"value": "<number>"
								}
							],
							"variable": [
								{
									"key": "store_id"
								}
							]
						}
					},
					"status": "Forbidden",
					"code": 403,
					"_postman_previewlanguage": "json",
					"header": [
						{
							"key": "Content-Type",
							"value": "application/json"
						}
					],
					"cookie": [],
					"body": "{\n \"code\": \"400\",\n \"message\": \"Validation error\",\n \"timestamp\": \"2019-11-21T09:52:34.678\",\n \"traceId\": \"033c6a06-1d2c-498f-81a0-02b5f8aac79e\"\n}"
				},
				{
					"name": "Not Found",
					"originalRequest": {
						"method": "GET",
						"header": [
							{
								"description": "Added as a part of security scheme: bearer",
								"key": "Authorization",
								"value": "Bearer <token>"
							}
						],
						"url": {
							"raw": "{{baseUrl}}/stores/:store_id/payment_methods?amount=<number>",
							"host": [
								"{{baseUrl}}"
							],
							"path": [
								"stores",
								":store_id",
								"payment_methods"
							],
							"query": [
								{
									"key": "amount",
									"value": "<number>"
								}
							],
							"variable": [
								{
									"key": "store_id"
								}
							]
						}
					},
					"status": "Not Found",
					"code": 404,
					"_postman_previewlanguage": "text",
					"header": [
						{
							"key": "Content-Type",
							"value": "*/*"
						}
					],
					"cookie": [],
					"body": ""
				}
			]
		},
		{
			"name": "Get callback stream by paymnetId",
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
							"console.log('Get callbackStream');",
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
				"method": "GET",
				"header": [],
				"url": {
					"raw": "{{baseUrl}}/v2/callbacks/payments/{{myPaymentIdPaymentV2}}/stream",
					"host": [
						"{{baseUrl}}"
					],
					"path": [
						"v2",
						"callbacks",
						"payments",
						"{{myPaymentIdPaymentV2}}",
						"stream"
					]
				}
			},
			"response": [
				{
					"name": "Not Found",
					"originalRequest": {
						"method": "GET",
						"header": [
							{
								"description": "Added as a part of security scheme: bearer",
								"key": "Authorization",
								"value": "Bearer <token>"
							}
						],
						"url": {
							"raw": "{{baseUrl}}/stores/:store_id/payment_methods?amount=<number>",
							"host": [
								"{{baseUrl}}"
							],
							"path": [
								"stores",
								":store_id",
								"payment_methods"
							],
							"query": [
								{
									"key": "amount",
									"value": "<number>"
								}
							],
							"variable": [
								{
									"key": "store_id"
								}
							]
						}
					},
					"status": "Not Found",
					"code": 404,
					"_postman_previewlanguage": "text",
					"header": [
						{
							"key": "Content-Type",
							"value": "*/*"
						}
					],
					"cookie": [],
					"body": ""
				},
				{
					"name": "Forbidden",
					"originalRequest": {
						"method": "GET",
						"header": [
							{
								"description": "Added as a part of security scheme: bearer",
								"key": "Authorization",
								"value": "Bearer <token>"
							}
						],
						"url": {
							"raw": "{{baseUrl}}/stores/:store_id/payment_methods?amount=<number>",
							"host": [
								"{{baseUrl}}"
							],
							"path": [
								"stores",
								":store_id",
								"payment_methods"
							],
							"query": [
								{
									"key": "amount",
									"value": "<number>"
								}
							],
							"variable": [
								{
									"key": "store_id"
								}
							]
						}
					},
					"status": "Forbidden",
					"code": 403,
					"_postman_previewlanguage": "json",
					"header": [
						{
							"key": "Content-Type",
							"value": "application/json"
						}
					],
					"cookie": [],
					"body": "{\n \"code\": \"400\",\n \"message\": \"Validation error\",\n \"timestamp\": \"2019-11-21T09:52:34.678\",\n \"traceId\": \"033c6a06-1d2c-498f-81a0-02b5f8aac79e\"\n}"
				},
				{
					"name": "Unauthorized",
					"originalRequest": {
						"method": "GET",
						"header": [
							{
								"description": "Added as a part of security scheme: bearer",
								"key": "Authorization",
								"value": "Bearer <token>"
							}
						],
						"url": {
							"raw": "{{baseUrl}}/stores/:store_id/payment_methods?amount=<number>",
							"host": [
								"{{baseUrl}}"
							],
							"path": [
								"stores",
								":store_id",
								"payment_methods"
							],
							"query": [
								{
									"key": "amount",
									"value": "<number>"
								}
							],
							"variable": [
								{
									"key": "store_id"
								}
							]
						}
					},
					"status": "Unauthorized",
					"code": 401,
					"_postman_previewlanguage": "json",
					"header": [
						{
							"key": "Content-Type",
							"value": "application/json"
						}
					],
					"cookie": [],
					"body": "{\n \"code\": \"400\",\n \"message\": \"Validation error\",\n \"timestamp\": \"2019-11-21T09:52:34.678\",\n \"traceId\": \"033c6a06-1d2c-498f-81a0-02b5f8aac79e\"\n}"
				},
				{
					"name": "OK",
					"originalRequest": {
						"method": "GET",
						"header": [
							{
								"description": "Added as a part of security scheme: bearer",
								"key": "Authorization",
								"value": "Bearer <token>"
							}
						],
						"url": {
							"raw": "{{baseUrl}}/stores/:store_id/payment_methods?amount=<number>",
							"host": [
								"{{baseUrl}}"
							],
							"path": [
								"stores",
								":store_id",
								"payment_methods"
							],
							"query": [
								{
									"key": "amount",
									"value": "<number>"
								}
							],
							"variable": [
								{
									"key": "store_id"
								}
							]
						}
					},
					"status": "OK",
					"code": 200,
					"_postman_previewlanguage": "text",
					"header": [
						{
							"key": "Content-Type",
							"value": "*/*"
						}
					],
					"cookie": [],
					"body": ""
				},
				{
					"name": "Bad Request",
					"originalRequest": {
						"method": "GET",
						"header": [
							{
								"description": "Added as a part of security scheme: bearer",
								"key": "Authorization",
								"value": "Bearer <token>"
							}
						],
						"url": {
							"raw": "{{baseUrl}}/stores/:store_id/payment_methods?amount=<number>",
							"host": [
								"{{baseUrl}}"
							],
							"path": [
								"stores",
								":store_id",
								"payment_methods"
							],
							"query": [
								{
									"key": "amount",
									"value": "<number>"
								}
							],
							"variable": [
								{
									"key": "store_id"
								}
							]
						}
					},
					"status": "Bad Request",
					"code": 400,
					"_postman_previewlanguage": "text",
					"header": [
						{
							"key": "Content-Type",
							"value": "*/*"
						}
					],
					"cookie": [],
					"body": ""
				},
				{
					"name": "Internal Server Error",
					"originalRequest": {
						"method": "GET",
						"header": [
							{
								"description": "Added as a part of security scheme: bearer",
								"key": "Authorization",
								"value": "Bearer <token>"
							}
						],
						"url": {
							"raw": "{{baseUrl}}/stores/:store_id/payment_methods?amount=<number>",
							"host": [
								"{{baseUrl}}"
							],
							"path": [
								"stores",
								":store_id",
								"payment_methods"
							],
							"query": [
								{
									"key": "amount",
									"value": "<number>"
								}
							],
							"variable": [
								{
									"key": "store_id"
								}
							]
						}
					},
					"status": "Internal Server Error",
					"code": 500,
					"_postman_previewlanguage": "json",
					"header": [
						{
							"key": "Content-Type",
							"value": "application/json"
						}
					],
					"cookie": [],
					"body": "{\n \"code\": \"400\",\n \"message\": \"Validation error\",\n \"timestamp\": \"2019-11-21T09:52:34.678\",\n \"traceId\": \"033c6a06-1d2c-498f-81a0-02b5f8aac79e\"\n}"
				}
			]
		},
		{
			"name": "Capture Payment",
			"event": [
				{
					"listen": "test",
					"script": {
						"exec": [
							"var CaptueId = pm.globals.get(\"myCaptureId\")",
							"var theItem = pm.response.json().order.actionLog.find(logItem => logItem.transactionId === CaptueId)",
							"pm.globals.set(\"myActionId\", theItem ? theItem.actionId : null);",
							"console.log('myActionId: ' + pm.globals.get(\"myActionId\"))",
							"",
							"pm.test(\"Status code is 200\", function () {",
							"    pm.response.to.have.status(200);",
							"});",
							"",
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
							"console.log('Capture payment mapi');",
							"var today = new Date();",
							"var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();",
							"pm.globals.set(\"myCaptureId\",\"Capture\"+date+'-'+ _.random(000001, 999999));",
							"",
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
					"raw": "{\n  \"transactionId\": \"{{myCaptureId}}\",\n  \"creator\": \"gert_l\"\n}",
					"options": {
						"raw": {
							"language": "json"
						}
					}
				},
				"url": {
					"raw": "{{baseUrl}}/v2/payments/{{myPaymentIdPaymentV2}}/capture",
					"host": [
						"{{baseUrl}}"
					],
					"path": [
						"v2",
						"payments",
						"{{myPaymentIdPaymentV2}}",
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
							"var RefundId = pm.globals.get(\"myRefundId\")",
							"var theItem = pm.response.json().order.actionLog.find(logItem => logItem.transactionId === RefundId)",
							"pm.globals.set(\"myActionId\", theItem ? theItem.actionId : null);",
							"console.log('myActionId: ' + pm.globals.get(\"myActionId\"))",
							"",
							"pm.test(\"Status code is 200\", function () {",
							"    pm.response.to.have.status(200);",
							"});",
							""
						],
						"type": "text/javascript"
					}
				},
				{
					"listen": "prerequest",
					"script": {
						"exec": [
							"console.log('Refund payment mapi');",
							"var today = new Date();",
							"var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();",
							"pm.globals.set(\"myRefundId\",\"Refund\"+date+'-'+ _.random(000001, 999999));",
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
					"raw": "{\n  \"transactionId\": \"{{myRefundId}}\",\n  \"creator\": \"gert_l\"\n}",
					"options": {
						"raw": {
							"language": "json"
						}
					}
				},
				"url": {
					"raw": "{{baseUrl}}/v2/payments/{{myPaymentIdPaymentV2}}/refund",
					"host": [
						"{{baseUrl}}"
					],
					"path": [
						"v2",
						"payments",
						"{{myPaymentIdPaymentV2}}",
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
							"pm.test(\"Status code is 200\", function () {",
							"    pm.response.to.have.status(200);",
							"});"
						],
						"type": "text/javascript"
					}
				},
				{
					"listen": "prerequest",
					"script": {
						"exec": [
							"console.log('Cancel payment mapi');",
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
					"raw": "{\n  \"creator\": \"gert_l\",\n  \"orderLines\": [\n                    {\n                        \"description\": \"Hoodie with Logo\",\n                        \"quantity\": 1,\n                        \"reference\": \"woo-hoodie-with-logo\",\n                        \"type\": \"NORMAL\",\n                        \"quantityUnit\": \"st\",\n                        \"unitAmountIncludingVat\": 4500.00,\n                        \"vatRate\": 25,\n                        \"totalAmountIncludingVat\": 4500.00,\n                        \"totalVatAmount\": 900.00\n                    },\n                    {\n                        \"description\": \"Rabatt\",\n                        \"quantity\": 1,\n                        \"reference\": \"discount_25\",\n                        \"type\": \"DISCOUNT\",\n                        \"quantityUnit\": \"st\",\n                        \"unitAmountIncludingVat\": -450.00,\n                        \"vatRate\": 25,\n                        \"totalAmountIncludingVat\": -450.00,\n                        \"totalVatAmount\": -90.00\n                    }\n                ]\n}",
					"options": {
						"raw": {
							"language": "json"
						}
					}
				},
				"url": {
					"raw": "{{baseUrl}}/v2/payments/{{myPaymentIdPaymentV2}}/cancel",
					"host": [
						"{{baseUrl}}"
					],
					"path": [
						"v2",
						"payments",
						"{{myPaymentIdPaymentV2}}",
						"cancel"
					]
				}
			},
			"response": []
		},
		{
			"name": "Add orderline / update order",
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
					"raw": "{\n    \"orderLines\": [\n       {\n        \"quantity\" : 1,\n        \"quantityUnit\" : \"st\",\n        \"vatRate\" : 25,\n        \"totalAmountIncludingVat\" : 1000,\n        \"description\" : \"Produkt 1\",\n        \"reference\" : \"101\",\n        \"type\" : \"PHYSICAL_GOODS\"\n     }\n    ]\n}",
					"options": {
						"raw": {
							"language": "json"
						}
					}
				},
				"url": {
					"raw": "{{baseUrl}}/v2/payments/{{myPaymentIdPaymentV2}}/order",
					"host": [
						"{{baseUrl}}"
					],
					"path": [
						"v2",
						"payments",
						"{{myPaymentIdPaymentV2}}",
						"order"
					]
				}
			},
			"response": []
		},
		{
			"name": "Create Callback",
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
							"console.log('create callback');",
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
					"raw": "{\n  \"stores\": [\n    \"{{myStorePaymentV2}}\"\n  ],\n  \"callbacks\": {\n    \"authorization\": {\n      \"url\": \"https://yourdomain/callbacks/alksjs1231?id={payment_id}\"\n    },\n    \"management\": {\n      \"url\": \"https://yourdomain/callbacks/alksjs1231?id={payment_id}\"\n    }\n  }\n}",
					"options": {
						"raw": {
							"language": "json"
						}
					}
				},
				"url": {
					"raw": "{{baseUrl}}/v2/callbacks",
					"host": [
						"{{baseUrl}}"
					],
					"path": [
						"v2",
						"callbacks"
					]
				}
			},
			"response": []
		},
		{
			"name": "Get Callback",
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
							"console.log('create callback');",
							""
						],
						"type": "text/javascript"
					}
				}
			],
			"protocolProfileBehavior": {
				"disableBodyPruning": true
			},
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
				"method": "GET",
				"header": [],
				"body": {
					"mode": "raw",
					"raw": "",
					"options": {
						"raw": {
							"language": "json"
						}
					}
				},
				"url": {
					"raw": "{{baseUrl}}/v2/callbacks",
					"host": [
						"{{baseUrl}}"
					],
					"path": [
						"v2",
						"callbacks"
					]
				}
			},
			"response": []
		},
		{
			"name": "Get Callback Copy",
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
							"console.log('create callback');",
							""
						],
						"type": "text/javascript"
					}
				}
			],
			"protocolProfileBehavior": {
				"disableBodyPruning": true
			},
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
				"method": "GET",
				"header": [],
				"body": {
					"mode": "raw",
					"raw": "",
					"options": {
						"raw": {
							"language": "json"
						}
					}
				},
				"url": {
					"raw": "{{baseUrl}}/v2/callbacks",
					"host": [
						"{{baseUrl}}"
					],
					"path": [
						"v2",
						"callbacks"
					]
				}
			},
			"response": []
		}
	],
	"event": [
		{
			"listen": "prerequest",
			"script": {
				"type": "text/javascript",
				"exec": [
					""
				]
			}
		},
		{
			"listen": "test",
			"script": {
				"type": "text/javascript",
				"exec": [
					""
				]
			}
		}
	],
	"variable": [
		{
			"key": "baseUrl",
			"value": "https://merchant-api.integration.resurs.com"
		}
	]
}
```
