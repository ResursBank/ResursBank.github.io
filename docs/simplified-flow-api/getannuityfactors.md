---
layout: page
title: Getannuityfactors
permalink: /simplified-flow-api/getannuityfactors/
parent: Simplified Flow Api
---


# getAnnuityFactors 
Created by Benny, last modified by Thomas Tornevall on 2023-12-27
# getAnnuityFactors
Retrieves the annuity factors for a given payment method. The duration
is given is months. While this makes most sense for payment methods that
consist of part payments (i.e. new account), it is possible to use for
all types. It returns a list of with one annuity factor per payment plan
of the payment method. There are typically between three and six payment
plans per payment method.  
* *

*  * **Input (Literal)**

| Name            | Type | Occurs | Nillable? | Description                                                                                                                                                                                                                                                                                |
|-----------------|------|--------|-----------|--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| paymentMethodId | id   | 1..1   | No        | The identity of the payment method for which to retrieve the annuity factors.  While this makes most sense for payment methods involving part payments, it is possible to use for all types. (See [paymentMethodType](paymentmethodtype) for more information about payment method types.) |

**  
**

**Output (Literal)**

| Name   | Type          | Occurs | Nillable? | Description                                                                                                                                         |
|--------|---------------|--------|-----------|-----------------------------------------------------------------------------------------------------------------------------------------------------|
| return | annuityFactor | 0..\*  | No        | A list with one annuity factor per payment plan of the payment method.  There are typically between three and six payment plans per payment method. |

* **  
**  * **Faults**

| Name                    | Content                              | Description                                                    |
|-------------------------|--------------------------------------|----------------------------------------------------------------|
| EcommerceErrorException | **[EcommerceError](ecommerceerror)** | Failed to retrieve the annuity factors. See error for details. |

> The data in our test environment does not always match the data you
> will be getting in our live environment. This operation can return
> different answers depending on your live setup.

**  
**

> The annuity factor multiplied with the total cost of a product is the
> monthly cost using that payment plan.

Request example for payment method PARTPAYMENT

```xml
<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:sim="http://ecommerce.resurs.com/v4/msg/simplifiedshopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <sim:getAnnuityFactors>
         <paymentMethodId>PARTPAYMENT</paymentMethodId>
      </sim:getAnnuityFactors>
   </soapenv:Body>
</soapenv:Envelope>
```

Response example for payment method PARTPAYMENT

```xml
<soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
   <soap:Body>
      <ns3:getAnnuityFactorsResponse xmlns:ns2="http://ecommerce.resurs.com/v4/msg/exception" xmlns:ns3="http://ecommerce.resurs.com/v4/msg/simplifiedshopflow">
         <return>
            <factor>0.3333333333</factor>
            <duration>3</duration>
            <paymentPlanName>3 Månader - 0% ränta</paymentPlanName>
         </return>
         <return>
            <factor>0.1666666667</factor>
            <duration>6</duration>
            <paymentPlanName>6 Månader - 0% ränta</paymentPlanName>
         </return>
         <return>
            <factor>0.0833333333</factor>
            <duration>12</duration>
            <paymentPlanName>12 Månader - 0% ränta</paymentPlanName>
         </return>
         <return>
            <factor>0.0416666667</factor>
            <duration>24</duration>
            <paymentPlanName>24 Månader - 0% ränta</paymentPlanName>
         </return>
         <return>
            <factor>0.0290571842</factor>
            <duration>48</duration>
            <paymentPlanName>48 Månader - 16,72% ränta</paymentPlanName>
         </return>
         <return>
            <factor>0.0230808901</factor>
            <duration>72</duration>
            <paymentPlanName>72 Månader - 17,96% ränta</paymentPlanName>
         </return>
      </ns3:getAnnuityFactorsResponse>
   </soap:Body>
</soap:Envelope>
```

