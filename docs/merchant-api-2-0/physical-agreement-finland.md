---
layout: page
title: Physical Agreement Finland
permalink: /merchant-api-2-0/physical-agreement-finland/
parent: Merchant Api 2.0
nav_order: 51
---


## Physical Agreement Finland 

> ExamplePlease note that the flow is only applicable for partners and
> customers in Finland and can only be set up in agreement with Key
> Account Manager

**What can I find here?**
- [Create an agreement](#create-an-agreement)
- [Sign an agreement](#sign-an-agreement)

## Create an agreement
In order to print a physical agreement the agreement must first be
created. 

URL to create physical agreement:
[https://merchant-api.integration.resurs.com/v2/agreements](https://merchant-api.integration.resurs.com/v2/agreements)

Link to the call in swagger documentation: **[Create physical
agreement](https://merchant-api.integration.resurs.com/docs/v2/merchant_physical_agreement_v2#/Agreement%20creation/createAgreement)**

**Curl to create agreement**

> curl --location --request POST
> 'https://merchant-api.integration.resurs.com/v2/agreements' \\
> --header 'Authorization: Bearer Token' \\ --header 'Content-Type:
> application/json' \\ --data-raw '{ "applicationId": "",
> "applicantIdentification": { "type": "ID", "reference": "reference" }
> }'

## Sign an agreement
After creating an agreement, the agreement must be signed and printed. 

URL to sign physical agreement:
[https://merchant-api.integration.resurs.com/v2/agreements](https://merchant-api.integration.resurs.com/v2/agreements)/sign

Link to the call in swagger documentation: **[Sign Physical
Agreement](https://merchant-api.integration.resurs.com/docs/v2/merchant_physical_agreement_v2#/Sign%20Agreement/signAgreement)**

**Curl to sign agreement**

> curl --location --request POST
> 'https://merchant-api.integration.resurs.com/v2/agreements/sign' \\
> --header 'Authorization: Bearer Token' \\-header 'Content-Type:
> application/json' \\ --data-raw '{ "paymentId": "",
> "applicantIdentification": { "type": "ID", "reference": "reference" }
> }'

