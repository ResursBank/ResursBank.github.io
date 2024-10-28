---
layout: page
title: Gift Card Service
permalink: /gift-card-service/
---

# Gift Card Service 

The Gift Card Service provides services for gift card related operations
such as loading and canceling a gift card.
The examples below demonstrates how to interact with the Gift Card
Service. For a full description of the API, please refer to the [Gift
Card
Service](https://test.resurs.com/docs/download/attachments/327709/ResursBank_GiftCardService.pdf?version=1&modificationDate=1464702737000&api=v2) manual.
Giftcard
Test: [https://](http://bs.cte.loc/ws-22/giftcard/GiftCardService)[test.resurs.com](https://test.resurs.com/ws-22/application/ApplicationService)[/ws-22/giftcard/GiftCardService](http://bs.cte.loc/ws-22/giftcard/GiftCardService)
Giftcard
Prod: [https://ws.butiksservice.resurs.com/ws-22/giftcard/GiftCardService](https://ws.butiksservice.resurs.com/ws-22/giftcard/GiftCardService)
Basic Auth:  
Username: User#StoreNbr#SE  
Pw: password set for user
1.  Loading a card with a specified amount
2.  Canceling a card, making it non-usable
3.  Getting a card's balance
4.  Annul a load
#### 1. Loading a card with a specified amount
This example shows how to load a card with a specified amount. To load a
card you need to specify two parameters, *cardNumber* and *amount*.
The *cardNumber* parameters is the card's identity which is typically
found on the card.
The *amount* parameters specifies the amount.
**Load request**
``` syntaxhighlighter-pre
<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:giftcard="http://butiksservice.resurs.com/msg/giftcard">
   <soapenv:Header/>
   <soapenv:Body>
      <giftcard:load>
         <cardNumber>1234567890123456</cardNumber>
         <amount>200</amount>
      </giftcard:load>
   </soapenv:Body>
</soapenv:Envelope>
```
If the request was successful you should receive a response similar to
the one below:
**Load response**
``` syntaxhighlighter-pre
<soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
   <soap:Body>
      <ns3:loadResponse xmlns:ns3="http://butiksservice.resurs.com/msg/giftcard" xmlns:ns2="http://butiksservice.resurs.com/msg/exception">
         <loadResult>
            <currentAmount>200.00</currentAmount>
            <authorizationId>135246</authorizationId>
            <expireDate>2015-10-04T00:00:00+02:00</expireDate>
         </loadResult>
      </ns3:loadResponse>
   </soap:Body>
</soap:Envelope>
```
The response contains the card's current amount, the card's expire date
and an authorization id. The authorization id can be used annul the
load.
*It's a good idea to store the authorizationId to a persistent storage
for later retrieval if needed.*
#### 2. Canceling a card, making it non-usable
This example shows how to cancel a card. After a successful call to
the *cancel* operation, the card is not usable anymore.
The *cancel* operation takes one parameter, *cardNumber*, which
specifies the card that should be cancelled. 
**Cancel request**
``` syntaxhighlighter-pre
<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:giftcard="http://butiksservice.resurs.com/msg/giftcard">
   <soapenv:Header/>
   <soapenv:Body>
      <giftcard:cancel>
         <cardNumber>1234567890123456</cardNumber>
      </giftcard:cancel>
   </soapenv:Body>
</soapenv:Envelope>
```
If the request was successful you should receive a response similar to
the one below:
**Cancel reposonse**
``` syntaxhighlighter-pre
<soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
   <soap:Body>
      <ns3:cancelResponse xmlns:ns3="http://butiksservice.resurs.com/msg/giftcard" xmlns:ns2="http://butiksservice.resurs.com/msg/exception">
         <cancelResult>
            <authorizationId>224506000</authorizationId>
         </cancelResult>
      </ns3:cancelResponse>
   </soap:Body>
</soap:Envelope>
```
The response contains an authorization id for the cancellation.
#### 3. Getting a card's balance
This example shows how to read out the card's current balance. The
operation will also return the card's expire date.
The *getBalance* operation takes one parameter, cardNumber, which
specifies the card.
**Get Balance request**
``` syntaxhighlighter-pre
<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:giftcard="http://butiksservice.resurs.com/msg/giftcard">
   <soapenv:Header/>
   <soapenv:Body>
      <giftcard:getBalance>
         <cardNumber>1234567890123456</cardNumber>
      </giftcard:getBalance>
   </soapenv:Body>
</soapenv:Envelope>
```
If the request was successful you should receive a response similar to
the one below: 
**getBalance response**
``` syntaxhighlighter-pre
<soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
   <soap:Body>
      <ns2:getBalanceResponse xmlns:ns3="http://butiksservice.resurs.com/msg/exception" xmlns:ns2="http://butiksservice.resurs.com/msg/giftcard">
         <balanceResult>
            <balance>400.00</balance>
            <expireDate>2015-08-26T00:00:00+02:00</expireDate>
         </balanceResult>
      </ns2:getBalanceResponse>
   </soap:Body>
</soap:Envelope>
```
The response contains the card's balance and expire date. The expire
date is formatted according to [ISO
8601](http://en.wikipedia.org/wiki/ISO_8601).
#### 4. Annul a load
This example shows how to annul a load. Two parameters is required to
annul a load, *cardNumber* and *authorizationId*.
*AuthorizationId* should be the authorization id you received from a
*load* request.
**Annul request**
``` syntaxhighlighter-pre
<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:giftcard="http://butiksservice.resurs.com/msg/giftcard">
   <soapenv:Header/>
   <soapenv:Body>
      <giftcard:annul>
         <cardNumber>1234567890123456</cardNumber>
         <authorizationId>135246</authorizationId>
      </giftcard:annul>
   </soapenv:Body>
</soapenv:Envelope>
```
If the request was successful you should receive a response similar to
the one below:
**Annul response**
``` syntaxhighlighter-pre
<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:giftcard="http://butiksservice.resurs.com/msg/giftcard">
   <soapenv:Header/>
   <soapenv:Body>
      <giftcard:annulResponse>
         <annulResult>
            <authorizationId>1234567</authorizationId>
         </annulResult>
      </giftcard:annulResponse>
   </soapenv:Body>
</soapenv:Envelope>
```
The response contains an authorization id for the annul.
