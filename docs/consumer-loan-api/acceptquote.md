---
layout: page
title: Acceptquote
permalink: /consumer-loan-api/acceptquote/
parent: Consumer Loan Api
---


## acceptQuote 

### To accept an offer with the ACCEPT decision, the function "acceptQuote" should be used.
#### If information needs to be updated, use the ”[updateApplication](/consumer-loan-api/updateapplication/)” operation. (**This needs to be done before acceptQuote)**

```xml
<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:app="http://consumerloan.resurs.com/v1/msg/application">
   <soapenv:Header/>
   <soapenv:Body>
      <app:acceptQuote>
         <applicationReference>reference-obtained-when-submitting-application</applicationReference>
      </app:acceptQuote>
   </soapenv:Body>
</soapenv:Envelope>
```
```xml
<acceptQuoteResult>
    <accepted>true</accepted>
    <message>Offer accepted</message>
</acceptQuoteResult>
```
