---
layout: page
title: Getapplicationquote
permalink: /consumer-loan-api/getapplicationquote/
parent: Consumer Loan Api
---


# getApplicationQuote 

```xml
<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:app="http://consumerloan.resurs.com/v1/msg/application">
   <soapenv:Header/>
   <soapenv:Body>
      <app:getApplicationQuote>
         <applicationReference>eabea8be-abda-432b-97ec-8199232d2613</applicationReference>
      </app:getApplicationQuote>
   </soapenv:Body>
</soapenv:Envelope>
```
```xml
<soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
   <soap:Body>
      <ns2:getApplicationQuoteResponse xmlns:ns2="http://consumerloan.resurs.com/v1/msg/application" xmlns:ns3="http://consumerloan.resurs.com/v1/msg/exception">
         <applicationQuoteResult>
            <applicationReference>eabea8be-abda-432b-97ec-8199232d2613</applicationReference>
            <decision>APPROVED</decision>
            <approvedAmount>10000</approvedAmount>
            <interest>8.02</interest>
            <tenor>72</tenor>
            <effectiveInterest>14.05</effectiveInterest>
            <monthlyCost>202.00</monthlyCost>
            <consolidationDemand>1000.0</consolidationDemand>
            <adminFee>19.00</adminFee>
            <arrangementFee>399.00</arrangementFee>
            <documentTypes>ID</documentTypes>
            <documentTypes>PAYMENT_SLIP</documentTypes>
            <monthlyAccountFee>0</monthlyAccountFee>
         </applicationQuoteResult>
      </ns2:getApplicationQuoteResponse>
   </soap:Body>
</soap:Envelope>
```
