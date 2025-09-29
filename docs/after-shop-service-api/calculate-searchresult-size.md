---
layout: page
title: Calculate Searchresult Size
permalink: /after-shop-service-api/calculate-searchresult-size/
parent: After Shop Service API
---


# Calculate Searchresult Size 

## *calculateResultSize*  
> Returns the number of payments that match the specified requirements.
> Can be used for paging of the results.

**Input (Literal)**

| Name            | Type                                 | Occurs | Nillable? | Description          |
|-----------------|--------------------------------------|--------|-----------|----------------------|
| searchCriteria  | **[searchCriteria](/development/api-types/searchcriteria/)** | 1..1   | No        | The search criteria. |

**Output (Literal)**

| Name    | Type | Occurs | Nillable? | Description                                                    |
|---------|------|--------|-----------|----------------------------------------------------------------|
| return  | int  | 1..1   | No        | The number of payments matching the specified search criteria. |

**Faults**

| Name                     | Content                                  | Description                                                       |
|--------------------------|------------------------------------------|-------------------------------------------------------------------|
| ECommerceErrorException  | **[ECommerceError](/development/api-types/ecommerceerror/)**     | Failed to calculate the search result size. See error for details |

### Introduction
Returns the number of payments that match the specified search
requirements. Can be used for paging of the results.

### Example
**Request**
```xml
<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:aft="http://ecommerce.resurs.com/v4/msg/aftershopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <aft:calculateResultSize>
        <searchCriteria>
            <paymentMethodId>8</paymentMethodId>
            <statusSet>DEBITABLE</statusSet>
            <statusNotSet>IS_DEBITED</statusNotSet>
         </searchCriteria>
      </aft:calculateResultSize>
   </soapenv:Body>
</soapenv:Envelope>
```
**Response**
```xml
<soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
   <soap:Body>
      <ns2:calculateResultSizeResponse xmlns:ns3="http://ecommerce.resurs.com/v4/msg/exception" xmlns:ns2="http://ecommerce.resurs.com/v4/msg/aftershopflow">
         <return>56</return>
      </ns2:calculateResultSizeResponse>
   </soap:Body>
</soap:Envelope>
```
