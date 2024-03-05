---
layout: page
title: Calculate Searchresult Size
permalink: /after-shop-service-api/calculate-searchresult-size/
parent: After Shop Service Api
---


# Calculate Searchresult Size 
Created by Benny, last modified by Thomas Tornevall on 2023-12-21
# *calculateResultSize *  
*Returns the number of payments that match the specified requirements.
Can be used for paging of the results.*
  
**Input (Literal)**
  
| Name            | Type                                              | Occurs | Nillable? | Description          |
|-----------------|---------------------------------------------------|--------|-----------|----------------------|
| searchCriteria  | **[searchCriteria](searchCriteria_1475824.html)** | 1..1   | No        | The search criteria. |
  
  
**Output (Literal)**
  
| Name    | Type | Occurs | Nillable? | Description                                                    |
|---------|------|--------|-----------|----------------------------------------------------------------|
| return  | int  | 1..1   | No        | The number of payments matching the specified search criteria. |
  
  
**Faults**
  
| Name                     | Content                                               | Description                                                       |
|--------------------------|-------------------------------------------------------|-------------------------------------------------------------------|
| ECommerceErrorException  | **[ECommerceError](ECommerceError_1475945.html)**     | Failed to calculate the search result size. See error for details |
  
  
  
### Introduction
Returns the number of payments that match the specified search
requirements. Can be used for paging of the results.
### Example
**Request**
``` syntaxhighlighter-pre
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
``` syntaxhighlighter-pre
<soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
   <soap:Body>
      <ns2:calculateResultSizeResponse xmlns:ns3="http://ecommerce.resurs.com/v4/msg/exception" xmlns:ns2="http://ecommerce.resurs.com/v4/msg/aftershopflow">
         <return>56</return>
      </ns2:calculateResultSizeResponse>
   </soap:Body>
</soap:Envelope>
```
