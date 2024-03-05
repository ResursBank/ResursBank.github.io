---
layout: page
title: Limit
permalink: /development/api-types/limit/
parent: Api Types
grand_parent: Development
---



# limit 
Created by Benny, last modified on 2017-02-27
Detailed information about the limit.  
Contains elements as defined in the following table.
  
| Component      | Type                                                | Occurs | Nillable? | Description                                                                                                                                                                         |
|----------------|-----------------------------------------------------|--------|-----------|-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| approvedAmount | **[positiveDecimal](Simple-Types..._1475653.html)** | 1..1   | No        | The amount that has been approved.                                                                                                                                                  |
| decision       | **[limitDecision](limitDecision_1475720.html)**     | 1..1   | No        | The limit decision.                                                                                                                                                                 |
| customer       | **[customer](customer_1475725.html)**               | 1..1   | No        | The customer details.                                                                                                                                                               |
| limitRequestId | **[id](Simple-Types..._1475653.html)**              | 1..1   | No        | Identifies this limit request uniquely, whether it's granted or not. It can be used to request more information, by phone, about the application from Resurs Bank in special cases. |
  
``` syntaxhighlighter-pre
<soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
   <soap:Body>
      <ns3:submitLimitApplicationResponse xmlns:ns3="http://ecommerce.resurs.com/v4/msg/shopflow" xmlns:ns2="http://ecommerce.resurs.com/v4/msg/exception">
         <return>
            <approvedAmount>3030</approvedAmount>
            <decision>GRANTED</decision>
            <customer>
               <governmentId>7312195873</governmentId>
               <address>
                  <fullName>Asgeirsen Asgeir</fullName>
                  <firstName>Asgeir</firstName>
                  <lastName>Asgeirsen</lastName>
                  <addressRow1/>
                  <postalArea>Inøja</postalArea>
                  <postalCode>1234</postalCode>
                  <country>SE</country>
               </address>
               <phone/>
               <email>javatest@resurs.se</email>
               <type>NATURAL</type>
            </customer>
         </return>
      </ns3:submitLimitApplicationResponse>
   </soap:Body>
</soap:Envelope>
```
  
  
