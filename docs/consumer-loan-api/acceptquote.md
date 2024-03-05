---
layout: page
title: Acceptquote
permalink: /consumer-loan-api/acceptquote/
parent: Consumer Loan Api
---


# acceptQuote 
Created by Daniel, last modified on 2020-08-12
## To accept an offer with the ACCEPT decision, the function "acceptQuote" should be used.
### If information needs to be updated, use the ”[updateApplication](updateApplication_29491214.html)” operation. (**This needs to be done before acceptQuote)**
  
``` syntaxhighlighter-pre
<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:app="http://consumerloan.resurs.com/v1/msg/application">
   <soapenv:Header/>
   <soapenv:Body>
      <app:acceptQuote>
         <applicationReference>reference-obtained-when-submitting-application</applicationReference>
      </app:acceptQuote>
   </soapenv:Body>
</soapenv:Envelope>
```
``` syntaxhighlighter-pre
<acceptQuoteResult>
    <accepted>true</accepted>
    <message>Offer accepted</message>
</acceptQuoteResult>
```
