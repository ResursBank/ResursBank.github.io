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

### Validation for Denmark
```xml
<?xml version="1.0" encoding="UTF-8"?>
<?xml-stylesheet type="text/xsl" href="../xsl/transform-form.xsl"?>
<!-- Formulär för Privatlån (Agent) Danmark Resurs med huvud- och medsökande -->
​
<resurs-form
        title="Privatlån Danmark (Agent)"
        java-class="com.resurs.multiupplys.data.locale.dk.pp.DKConsumerLoanApplication"
        locale="DK"
        resource-path="../">
​
​
    <element java-property="applicant.creditStatusConsent">
        <label>Samtykke til kredit status</label>
        <name>applicant-credit-status-consent</name>
        <type>checkbox</type>
        <is-mandatory>true</is-mandatory>
        <items>
            <item>
                <label>Ja</label>
                <value>true</value>
            </item>
        </items>
        <format>^(true|)$</format>
    </element>
​
​
    <element>
        <type>subtitle</type>
        <name>loan-block</name>
        <label>Lån</label>
    </element>
​
    <!-- ***** Lånebelopp -->
    <element java-property="amount">
        <label>Lånebeløb</label>
        <description>Ønsket lånebeløb</description>
        <name>amount</name>
        <type>integer</type>
        <is-mandatory>true</is-mandatory>
        <unit>money</unit>
        <min-value>0</min-value>
        <max-value>1000000</max-value>
    </element>
​
    <element java-property="paymentTerms">
        <label>Løbetid</label>
        <description>Ønsket løbetid</description>
        <name>time</name>
        <type>radio</type>
        <unit>time</unit>
        <is-mandatory>true</is-mandatory>
        <items>
            <item>
                <label>2</label>
                <value>24</value>
            </item>
            <item>
                <label>3</label>
                <value>36</value>
            </item>
            <item>
                <label>4</label>
                <value>48</value>
            </item>
            <item>
                <label>5</label>
                <value>60</value>
            </item>
            <item>
                <label>6</label>
                <value>72</value>
            </item>
            <item>
                <label>7</label>
                <value>84</value>
            </item>
            <item>
                <label>8</label>
                <value>96</value>
            </item>
            <item>
                <label>9</label>
                <value>108</value>
            </item>
            <item>
                <label>10</label>
                <value>120</value>
            </item>
            <item>
                <label>11</label>
                <value>132</value>
            </item>
            <item>
                <label>12</label>
                <value>144</value>
            </item>
            <item>
                <label>13</label>
                <value>156</value>
            </item>
            <item>
                <label>14</label>
                <value>168</value>
            </item>
            <item>
                <label>15</label>
                <value>180</value>
            </item>
        </items>
        <format>^(24|36|48|60|72|84|96|108|120|132|144|156|168|180)$</format>
    </element>
​
    <element>
        <type>subtitle</type>
        <name>personal-block</name>
        <label></label>
    </element>
​
    <element>
        <type>group</type>
        <name>loan-purpose-group</name>
        <label>Formål med lånet</label>
    </element>
​
    <element java-property="loanPurpose">
        <label>Formål med lånet</label>
        <name>purpose-of-loan</name>
        <type>radio</type>
        <is-mandatory>true</is-mandatory>
        <items>
            <item>
                <label>Bil, motorcykel, båd eller campingvogn</label>
                <value>MOTOR</value>
            </item>
            <item>
                <label>Elektronik (TV, computer etc.) </label>
                <value>INTERIOR</value>
            </item>
            <item>
                <label>Begivenheder (Bryllup, barnedåb etc.)</label>
                <value>WEDDING</value>
            </item>
            <item>
                <label>Istandsættelse af bolig</label>
                <value>RENOVATION</value>
            </item>
            <item>
                <label>Ferie</label>
                <value>TRAVEL</value>
            </item>
            <item>
                <label>Indfrielse af andre lån og kreditter</label>
                <value>CONSOLIDATE_LOANS</value>
            </item>
            <item>
                <label>Tandlæge eller kirurgi</label>
                <value>DENTAL_OR_OTHER_CARE</value>
            </item>
            <item>
                <label>Andet</label>
                <value>OTHER</value>
            </item>
        </items>
        <format>
            ^(MOTOR|WEDDING|RENOVATION|INTERIOR|TRAVEL|CONSOLIDATE_LOANS|DENTAL_OR_OTHER_CARE|OTHER)$
        </format>
        <format-message>Venligst vælg et alternativ</format-message>
    </element>
​
    <element java-property="loanPurposeOther">
        <label>Andet formål med lånet</label>
        <description>Indtast vad du vil bruge lånet til</description>
        <name>purpose-of-loan-other</name>
        <is-mandatory>false</is-mandatory>
        <type>string</type>
        <length>50</length>
        <format>^[- 0-9a-øA-Ø,.]{2,100}$</format>
        <format-message>Indtast vad du vil bruge lånet til.</format-message>
    </element>
​
    <element>
        <type>group</type>
        <name>personal-contact-group</name>
        <label>Personlige oplysninger</label>
    </element>
​
    <!-- ***** Huvudsökande - Personalia -->
    <element java-property="applicant.governmentId">
        <label>CPR-nummer</label>
        <name>applicant-government-id</name>
        <is-mandatory>true</is-mandatory>
        <type>string</type>
        <length>10</length>
        <format>^((3[0-1])|([1-2][0-9])|(0[1-9]))((1[0-2])|(0[1-9]))(\\d{2})([\\d]{4})$</format>
    </element>
​
    <element java-property="applicant.mobilePhoneNumber">
        <label>Mobilnummer</label>
        <description>Indtast venligst dit mobilnummer</description>
        <name>applicant-mobile-number</name>
        <is-mandatory>true</is-mandatory>
        <type>string</type>
        <length>15</length>
        <format>^(\\+45|0045|)?[ |-]?[2-9]([ |-]?[0-9]){7,7}$</format>
        <format-message>Venligst kontrollere dit mobilnummer</format-message>
    </element>
​
    <element java-property="applicant.emailAddress">
        <label>E-mail adresse</label>
        <description>Indtast venligst din e-mail adresse</description>
        <name>applicant-email-address</name>
        <is-mandatory>true</is-mandatory>
        <type>string</type>
        <length>50</length>
        <format>^[A-Za-z0-9!#%&amp;'*+/=?^_`~-]+(\\.[A-Za-z0-9!#%&amp;'*+/=?^_`~-]+)*@([A-Za-z0-9]+)(([\\.\\-]?[a-zA-Z0-9]+)*)\\.([A-Za-z]{2,})$</format>
        <format-message>Venligst kontrollere din e-mail adresse</format-message>
    </element>
​
    <element java-property="applicant.citizenship">
        <label>Statsborgerskab</label>
        <description>Vælg statsborgerskab</description>
        <name>applicant-nationality</name>
        <is-mandatory>true</is-mandatory>
        <type>list</type>
        <items>
            <item>
                <label>Vælg venligst</label>
                <value></value>
            </item>
            <item>
                <label>Dansk</label>
                <value>DANISH</value>
            </item>
            <item>
                <label>Andet</label>
                <value>OTHER</value>
            </item>
        </items>
        <format>^(DANISH|OTHER)$</format>
        <format-message>Venligst vælg et alternativ</format-message>
    </element>
​
    <element java-property="applicant.inDenmarkSince">
        <label>Hvor længe har du boet i Danmark?</label>
        <description>Angiv hvornår du kom til Danmark</description>
        <name>applicant-in-denmark-since-year</name>
        <is-mandatory>false</is-mandatory>
        <type>string</type>
        <length>4</length>
        <format>^(0[1-9]|1[012])([0-9]{2})$</format>
        <format-message>I Danmark siden</format-message>
    </element>
​
    <element java-property="applicant.residentPermit">
        <label>Hvilken type opholdstilladelse har du?</label>
        <description>Hvilken type opholdstilladelse har du?</description>
        <name>applicant-resident-permit</name>
        <is-mandatory>false</is-mandatory>
        <type>list</type>
        <items>
            <item>
                <label>Vælg venligst</label>
                <value></value>
            </item>
            <item>
                <label>A</label>
                <value>A</value>
            </item>
            <item>
                <label>B</label>
                <value>B</value>
            </item>
            <item>
                <label>C</label>
                <value>C</value>
            </item>
            <item>
                <label>D</label>
                <value>D</value>
            </item>
            <item>
                <label>E</label>
                <value>E</value>
            </item>
            <item>
                <label>F</label>
                <value>F</value>
            </item>
            <item>
                <label>G</label>
                <value>G</value>
            </item>
            <item>
                <label>H</label>
                <value>H</value>
            </item>
            <item>
                <label>J</label>
                <value>J</value>
            </item>
            <item>
                <label>K</label>
                <value>K</value>
            </item>
            <item>
                <label>L</label>
                <value>L</value>
            </item>

```

