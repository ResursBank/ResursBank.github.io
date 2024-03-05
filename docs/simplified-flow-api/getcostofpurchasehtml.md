---
layout: page
title: Getcostofpurchasehtml
permalink: /simplified-flow-api/getcostofpurchasehtml/
parent: Simplified Flow Api
---


# getCostOfPurchaseHtml 
Created by Benny, last modified by Thomas Tornevall on 2023-12-27
# *getCostOfPurchaseHtml    *   **
  
*Retrieves detailed cost of purchase information in HTML format. Resurs
Bank is legally obliged to show this information everywhere its payment
methods are marketed. This information can either be fetched with this
method or linked. If linking is preferred, the links returned by the
payment method ([getPaymentMethods](getPaymentMethods_950328.html)) are
to be used. Returns a styleable HTML table containing the cost of
purchase information.  
*
**Input (Literal)**  
  
| Name            | Type                                            | Occurs | Nillable? | Description                                                                                         |
|-----------------|-------------------------------------------------|--------|-----------|-----------------------------------------------------------------------------------------------------|
| paymentMethodId | id                                              | 1..1   | No        | The identity of the payment method for which to retrieve the detailed cost of purchase information. |
| amount          | [positiveDecimal](Simple-Types..._1475653.html) | 1..1   | No        | The amount on which to base the calculations.                                                       |
  
**Output (Literal)**
  
| Name   | Type   | Occurs | Nillable? | Description                                                         |
|--------|--------|--------|-----------|---------------------------------------------------------------------|
| return | String | 1..1   | No        | A styleable HTML table containing the cost of purchase information. |
  
  
**Faults**
  
| Name                    | Content                                           | Description                                                                 |
|-------------------------|---------------------------------------------------|-----------------------------------------------------------------------------|
| ECommerceErrorException | **[ECommerceError](ECommerceError_1475945.html)** | Failed to retrieve the cost of purchase information. See error for details. |
  
  
### Example Code - Request & Response
**getCostOfPurchaseHtml**
``` syntaxhighlighter-pre
<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:sim="http://ecommerce.resurs.com/v4/msg/simplifiedshopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <sim:getCostOfPurchaseHtml>
         <paymentMethodId>INVOICE</paymentMethodId>
         <amount>1000</amount>
      </sim:getCostOfPurchaseHtml>
   </soapenv:Body>
</soapenv:Envelope>
```
More about [legal requirements](Legal-requirements_1476296.html)
**The data in our test environment does not always match the data you
will be getting in our live environment. This operation can return
different answers depending on your live setup.**
  
 
**getCostOfPurchaseHtmlResponse**
``` syntaxhighlighter-pre
<soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
   <soap:Body>
      <ns3:getCostOfPurchaseHtmlResponse xmlns:ns3="http://ecommerce.resurs.com/v4/msg/simplifiedshopflow" xmlns:ns2="http://ecommerce.resurs.com/v4/msg/exception">
         <return><p>
  <h3 class="headHeader"></h3><br/>
  <span class="headText">Kreditkostnader och månadsbelopp - kredit (SEK): 3600.00<br/></span>
  <table class="priceTable">
                <tr class="oddRow">
    <td class="header">Kreditbelopp (SEK)</td>
        <td class="content">3600</td>
    <td class="content">3600</td>
    <td class="content">3600</td>
    <td class="content">3600</td>
    <td class="content">3600</td>
    <td class="content">3600</td>
    <td class="content">3600</td>
      </tr>
          <tr class="evenRow">
    <td class="header">Betalningsalternativ</td>
        <td class="content">3 MÅN</td>
    <td class="content">6 MÅN</td>
    <td class="content">12 MÅN</td>
    <td class="content">24 MÅN</td>
    <td class="content">36 MÅN</td>
    <td class="content">48 MÅN</td>
    <td class="content">72 MÅN</td>
      </tr>
          <tr class="oddRow">
    <td class="header">Löptid (mån)</td>
        <td class="content">3</td>
    <td class="content">6</td>
    <td class="content">12</td>
    <td class="content">24</td>
    <td class="content">36</td>
    <td class="content">48</td>
    <td class="content">72</td>
      </tr>
          <tr class="evenRow">
    <td class="header">Kreditränta [rörlig årsränta] (%)</td>
        <td class="content">0,00</td>
    <td class="content">0,00</td>
    <td class="content">0,00</td>
    <td class="content">0,00</td>
    <td class="content">9,7</td>
    <td class="content">16,72</td>
    <td class="content">17,96</td>
      </tr>
          <tr class="oddRow">
    <td class="header">Administrations- avgift (SEK/månad)</td>
        <td class="content">29</td>
    <td class="content">29</td>
    <td class="content">29</td>
    <td class="content">29</td>
    <td class="content">29</td>
    <td class="content">29</td>
    <td class="content">29</td>
      </tr>
          <tr class="evenRow">
    <td class="header">Uppläggningsavgift*                          (SEK)</td>
        <td class="content">0,00</td>
    <td class="content">0,00</td>
    <td class="content">0,00</td>
    <td class="content">0,00</td>
    <td class="content">0,00</td>
    <td class="content">0,00</td>
    <td class="content">0,00</td>
      </tr>
          <tr class="oddRow">
    <td class="header">Ordinarie månadsbelopp** (SEK)</td>
        <td class="content">1229</td>
    <td class="content">629</td>
    <td class="content">329</td>
    <td class="content">179</td>
    <td class="content">129</td>
    <td class="content">134</td>
    <td class="content">112</td>
      </tr>
      </table>
  <p>
 
  <span class="tailText">
  *Ev. Uppläggningsavgift betalas månaden efter val.<br/>
  <br>
  Exemplet förutsätter att räntan och avgifterna är oförändrade under hela kreditperioden. Andra sätt att utnyttja krediten kan leda till såväl en högre som lägre effektiv ränta. Den effektiva räntan är beräknad i enlighet med Konsumentverkets riktlinjer.<br>Enligt kontovillkoren kan det finnas krav på lägsta inbetalningsbelopp, vilket kan medföra högre månadsbelopp än vad som annars skulle blivit fallet. I sådana fall förkortas i stället återbetalningstiden. RB kreditprövar ansökan enlig lag. Vid inhämtande av uppgifter från extern databas erhålles kopia av lämnade uppgifter från kreditupplysningsföretaget. RB förbehåller sig fri prövningsrätt.
  </span>
 
  <br/>
  <p>
  Standardiserad europeisk konsumentkreditinformation (SEKKI):
    <a class="legalInfoLink" href="https://test.resurs.com/sekki-mock/sekki?bankProductId=LG686069&chainId=107&countryCode=SE&language=sv&storeId=107&amount=3600" target="_blank">Svenska (öppnas i nytt fönster)</a>
    </p>
<p>
  Allmänna villkor:
    <a class="legalInfoLink" href="https://test.resurs.com/documenthandler/Dokument.pdf?customerType=natural&docType=commonTerms&land=SE&language=sv" target="_blank">Svenska (öppnas i nytt fönster)</a>
    </p></return>
      </ns3:getCostOfPurchaseHtmlResponse>
   </soap:Body>
</soap:Envelope>
```
  
  
  
  
