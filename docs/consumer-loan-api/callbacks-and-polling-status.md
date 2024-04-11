---
layout: page
title: Callbacks And Polling Status
permalink: /consumer-loan-api/callbacks-and-polling-status/
parent: Consumer Loan Api
---


# Callbacks and polling status 

There are two ways to get information regarding the loan status - to
poll the loan application reference or to register a callbackURL which
will automatically send you an update when a change is made to the
status.

The following events will trigger a callback; CREDIT_DECISION_UPDATED,
SIGNED, WAITING_FOR_ADDITION and PAID_OUT.

Below is both methods explained with example requests & responses.  

> Important!In order to test callback properly, you'll need to use your
> specific webservice-credentials that has been sent to you. testse,
> testno, testdk, testfi will not work, since integrators will overwrite
> eachothers callback-url.

## Retrieve status change with callback
### Register the callback-URL
To set a callbackURL, you send in the desired URL in xml-format. The
callbackUrl is to be sent in only once! See example below.  
There is also an option to set credentials for the callback, this is
optional. The auth methods are either BASIC and BEARER, with a base 64
encoded credentials

**setCallback-example request**
```xml
<setCallback>
    <callbackConfiguration>
            <callbackUrl>http://agent.com/url-to-callback</callbackUrl>
            <callbackCredentials>#The base64 encoded credentials#</callbackCredentials>
            <callbackAuthMethod>(BASIC|BEARER)</callbackAuthMethod>
     </callbackConfiguration>
</setCallback>
```
**setCallback-example response**
```xml
<setCallbackResponse>
    <setCallbackResult>
        <callbackSet>true</callbackSet>
        <message>Set callback successful</message>
    </setCallbackResult>
</setCallbackResponse>
```
### How to trigger a callback in test environment with Postman-example
On the following Swagger-link, you can find how to setup the triggering
of a callback with a GET -
[https://apigw.integration.resurs.com/api_docs/external_test_utils](https://apigw.integration.resurs.com/api_docs/external_test_utils)  
To trigger a specific callback, the applicationReference from the
submitApplicationExt-response must be provided.  
If you run your test thru Postman, simply configure GET and insert the
end point; no authorization nor body is required - see the example
below;

![](../../attachments/29491203/59342879.png)

> NOTE! Once one or more callbacks has been triggered, the application
> may not be treated as normal since there can be side effects due the
> “manual” triggering

### Example callbacks - all sent in JSON-format
#### SIGNED – when the signed agreement is received
> SIGNED
```xml
{
  "externalApplicationEvent" : {
    "applicationReference" : "ABC-123",
    "applicationEventType" : "SIGNED"
  },
  "jwsData" : "eyJOXAiOLADikz.eyJpc3MiJgbDQrm4.djjft4CP-mbW1"
}
```

#### CREDIT_DECISION_UPDATED – APPROVED – when initial credit decision manual_inspection is changed to approved
> CREDIT_DECISION_UPDATED – APPROVED
```xml
{
  "externalApplicationEvent" : {
    "applicationReference" : "abc-123-def-567",
    "applicationEventType" : "CREDIT_DECISION_UPDATED",
    "creditDecision" : {
        "creditDecision" : "APPROVED",
        "approvedAmount" : 10000,
        "interest" : 12.3,
        "tenor" : 12,
        "effectiveInterest" : 23.3,
        "monthlyCost" : 1234,
        "consolidationDemand" : 2300,
        "adminFee" : 199,
        "arrangementFee" : 599.99,
        "totalRepaymentAmount" : 13000,
        "monthlyAccountFee" : 0,
        "totalFeesAndInterest": 3000.00,
        "documentTypes" : [ "ID", "PAYMENT_SLIP" ]
    }
  },
  "jwsData" : " eyJOXAiOLADikz.eyJpc3MiJgbDQrm4.djjft4CP-mbW1"
}
```

#### CREDIT_DECISION_UPDATED – REJECTED – when initial credit decision manual_inspection is changed to rejected
> CREDIT_DECISION_UPDATED – REJECTED
```xml
{
  "externalApplicationEvent" : {
    "applicationReference" : "abc-123-def-567",
    "applicationEventType" : "CREDIT_DECISION_UPDATED",
    "creditDecision" : {
        "creditDecision" : "REJECTED",
        "approvedAmount" : 0
    }
  },
  "jwsData" : " eyJOXAiOLADikz.eyJpc3MiJgbDQrm4.djjft4CP-mbW1"
}
```

#### WAITING_FOR_ADDITION – when we are awaiting additional information from the customer
> WAITING_FOR_ADDITION
```xml
{
  "externalApplicationEvent" : {
    "requiredDocuments" : [ "ID" ],
    "applicationReference" : "abc-123-def-567",
    "applicationEventType" : "WAITING_FOR_ADDITION"
  },
  "jwsData" : " eyJOXAiOLADikz.eyJpc3MiJgbDQrm4.djjft4CP-mbW1"
}
```

#### PAID_OUT - When Resurs has paid out the loan. (Disclaimer! This callback cannot be generated in test environment)
> PAID_OUT
```xml
{
  "externalApplicationEvent" : {
    "applicationReference" : "ABC-123",
    "applicationEventType" : "PAID_OUT"
  },
  "jwsData" : " eyJOXAiOLADikz.eyJpc3MiJgbDQrm4.djjft4CP-mbW1"
}
```

### jwsData
> ObserveUsing jwsData is optional!All questions regarding jwsData or
> API-key is to be sent to support@resurs.se, not our usual email
> onboarding@resurs.se

The value in jwsData is a signed and serialized JWT, known as a JWS
(JSON Web Signature). jwsData is a data structure cryptographically
securing a JWS Header and a JWS Payload with a JWS Signature
(graphically explained below).

![](../../attachments/29491203/29491242.png)

If you want to verify the JWS, you are to download our public keys
from *[https://apigw.resurs.com/api/auth_service/jwks](https://apigw.resurs.com/api/auth_service/jwks)*.
Note that you must use an API-key, which is handed out by us, in order
to call the mentioned URL.  
For test environment, you can download the public key
from [https://apigw.integration.resurs.com/api/auth_service/jwks](https://apigw.integration.resurs.com/api/auth_service/jwks). 

Below is an example of verification 

**Example-request for verification**
```xml
curl -X GET "https://apigw.integration.resurs.com/api/auth_service/jwks" -H "accept: application/json" -H "apikey: e3331b3687xxxxxxxxxxd9d4197f30b9
```
Found below is an example layout of a public key.

**Example layout of a public key**
```xml
{
    "keys": [
        {
            "kty": "RSA",
            "e": "AQAB",
            "use": "sig",
            "kid": "1cb06a4a-3465-4f11-ac3d-d8bb2bdb1eb7",
            "alg": "RS256",
            "n": "lLtFi6baHG0yJfWKCFlfY5hMlqUoqvTWwFyjsKckuI62WVwv-GJ1vTPnCk9cptRjqGltQ4IJxv8FYOPPjaRi98li53BnaHRmg6pITF68OAIbnTpMn3_hqctSS_6XM2s-PFMfctbFuSj_W4IzC2f1FmCXJSONz16zxy6kvlyC-ZVBLbN1WpWsheufGqR7tWibj780lgA8nwTQNHUXhdlydOU3CVfGEgs9IRx8vB53n0nTHwBdMI5i5ta9wEe2f7r6I4YqganJL_q_ilYfrbAB2yOCQz4AiWOpQzrhZCV54tiSGfz4lVfVS_oJOy17LapdSqxnBmJwX_R4uTR0g7BLWw"
        },
        {
            "kty": "RSA",
            "e": "AQAB",
            "use": "sig",
            "kid": "e434a27b-e1fb-4f7f-89d6-fb4e95619aac",
            "alg": "RS256",
            "n": "vUUYiYxqYwCHreCGlCBn0YjCBoLa-jrqfEhSLAWafCxaGFs5mAXrzb6Zzc_cfzNptNQMtA4x2qhF68copSbGyXxq8ZQl-10J0cjLJ2HW98-5jJiGit3MIR5cEGEjMrRzdaltCFiGSIeussdJMOvNtJk7-OGMQgxMVMJ6PK5zARsNauj85WuB2UyOg6EDBRP7pfmQ9V4bBRGM-s3PQZbBCD-       Mcr1K0tQTc60wftRiC78AxlVubF60jpj6l1bcvpsdld8uF1wVIrU8gjh65CL9KTXMmb261PLrv-op8TSjFMT-DPw4Jb54RxqjbEO9ze6b6BJo-0eU7_suqzitMT4JaQ"
        }
    ]
}
```

## **To poll the application reference**
Simply enter the application reference, which was retrieved in the
submitApplicationExt-response, to see whether an update has been made.
See example request & response below.

**getApplicationStatus-request**
```xml
<getApplicationStatus>
    <applicationReference>14321-21234-445674-434344-345445</applicationReference>
</getApplicationStatus>
```
**getApplicationStatusResponse-example**
```xml
<getApplicationStatusResponse>
    <waitingForAddition>true|false</waitingForAddition>
    <signedWithMethod>E_SIGN|ANALOG</signedWithMethod>
    <requestedSigningMethod>E_SIGN|MANUAL</requestedSigningMethod>
    <paidOut>true|false</paidOut>
</getApplicationStatusResponse>
```

