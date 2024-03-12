---
layout: page
title: submitApplicationExt DK
permalink: /consumer-loan-api/submitapplicationext-dk/
parent: Consumer Loan Api
---


# submitApplicationExt DK 

## Denmark DK
### Request: submitApplicationExt
```xml
<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:app="http://consumerloan.resurs.com/v1/msg/application">
   <soapenv:Header/>
   <soapenv:Body>
      <app:submitApplicationExt>
        <xml><![CDATA[<resurs-response>
        <applicant-credit-status-consent>true</applicant-credit-status-consent>
        <amount>10000</amount>
        <time>60</time>
        <purpose-of-loan>OTHER</purpose-of-loan>
        <purpose-of-loan-other>HOUSING_MORTGAGE_LOAN</purpose-of-loan-other>

        <applicant-government-id>2111929591</applicant-government-id>
        <applicant-mobile-number>666 77 888</applicant-mobile-number>
        <applicant-email-address>test@resurs.se</applicant-email-address>

        <applicant-nationality>OTHER</applicant-nationality>
        <applicant-in-denmark-since-year>0101</applicant-in-denmark-since-year>
        <applicant-resident-permit>F</applicant-resident-permit>
        <applicant-resident-permit-valid-date>0123</applicant-resident-permit-valid-date>
        <applicant-ancestral-homeland>DK</applicant-ancestral-homeland>
        <applicant-marital-status>SEPERATED</applicant-marital-status>
        <applicant-number-of-children-in-age-group1>2</applicant-number-of-children-in-age-group1>
        <applicant-number-of-children-in-age-group3>1</applicant-number-of-children-in-age-group3>
        <applicant-habitation-form>WITH_PARENTS</applicant-habitation-form>
        <applicant-share-of-expenses>50</applicant-share-of-expenses>
        <applicant-employment-type>TRAINEE</applicant-employment-type>
        <applicant-employment-year-from>0101</applicant-employment-year-from>

        <applicant-monthly-income-gross>10000</applicant-monthly-income-gross>
        <applicant-monthly-income-net>8000</applicant-monthly-income-net>
        <applicant-monthly-rental-cost>5000</applicant-monthly-rental-cost>
        <household-living-expenses>1000</household-living-expenses>
        <household-other-loan-expenses>1000</household-other-loan-expenses>

        <applicant-dankort></applicant-dankort>
        <debit-cards-master-card>true</debit-cards-master-card>
        <credit-cards-master-card>true</credit-cards-master-card>
        <credit-cards-visa>true</credit-cards-visa>
        <credit-cards-diners-club></credit-cards-diners-club>
        <credit-cards-petrol>true</credit-cards-petrol>                
        <finance-other-loans-balance-of-loans>100000</finance-other-loans-balance-of-loans>
        <finance-other-loans-monthly-cost-of-loans>3000</finance-other-loans-monthly-cost-of-loans>
        <payout-clearing-number>1234</payout-clearing-number>
        <payout-account-number>1234567891</payout-account-number>
        <approve-conditions>true</approve-conditions>
        <agreement-sign-type>E_SIGN</agreement-sign-type>
        </resurs-response>]]></xml>
         <consumerIp>1.2.3.4</consumerIp>
         <!--Optional:-->
         <externalReference>1234</externalReference>
      </app:submitApplicationExt>
   </soapenv:Body>
   </soapenv:Envelope>
```
### Response: submitApplicationExtResponse
```xml
<soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
    <soap:Body>
        <ns2:submitApplicationExtResponse xmlns:ns2="http://consumerloan.resurs.com/v1/msg/application" xmlns:ns3="http://consumerloan.resurs.com/v1/msg/exception">
            <submitApplicationExtResult>
                <applicationReference>1acca31b-c4c8-466a-9f7e-51c8c06591dd</applicationReference>
                <decision>APPROVED</decision>
                <approvedAmount>100000</approvedAmount>
                <interest>22.30</interest>
                <tenor>72</tenor>
                <effectiveInterest>25.31</effectiveInterest>
                <monthlyCost>2598.00</monthlyCost>
                <consolidationDemand>10000.0</consolidationDemand>
                <adminFee>19.00</adminFee>
                <arrangementFee>399.00</arrangementFee>
                <documentTypes>ID</documentTypes>
                <documentTypes>PAYMENT_SLIP</documentTypes>
                <totalRepaymentAmount>187007.00</totalRepaymentAmount>
                <monthlyAccountFee>0</monthlyAccountFee>
                <totalFeesAndInterest>87007.00</totalFeesAndInterest>
            </submitApplicationExtResult>
        </ns2:submitApplicationExtResponse>
    </soap:Body>
</soap:Envelope>
```
