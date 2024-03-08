---
layout: page
title: Submitapplicationext Se
permalink: /consumer-loan-api/submitapplicationext-se/
parent: Consumer Loan Api
---


# submitApplicationExt SE 
Created by Daniel, last modified on 2023-11-10
# **SE**
Click here to expand submitApplicationExt for Sweden
```xml
<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:app="http://consumerloan.resurs.com/v1/msg/application">
  <soapenv:Header/>
  <soapenv:Body>
     <app:submitApplicationExt>
        <xml><![CDATA[<resurs-response>
   <amount>10000</amount>
   <time>120</time>
   <applicant-government-id>ENTER GOVID</applicant-government-id>
   <applicant-mobile-number>0708123456</applicant-mobile-number>
   <applicant-email-address>test@resurs.se</applicant-email-address>
   <purpose-of-loan>HOUSING_MORTGAGE_LOAN</purpose-of-loan>
   <applicant-marital-status>MARRIED</applicant-marital-status>
   <number-children-not-of-age>1</number-children-not-of-age>
   <applicant-habitation-form>DETACHED_HOUSE</applicant-habitation-form>
   <applicant-employment-type>FAST_ANSTALLD</applicant-employment-type>
   <applicant-employer>Resurs Bank</applicant-employer>
   <applicant-employment-year-from>1011</applicant-employment-year-from>
   <applicant-employment-year-until>2002</applicant-employment-year-until>
   <applicant-monthly-income-gross>32000</applicant-monthly-income-gross>
   <household-living-expenses>8950</household-living-expenses>
   <household-other-loan-expenses>1200</household-other-loan-expenses>
   <approve-conditions>true</approve-conditions>
   <agreement-sign-type>MAIL</agreement-sign-type>
</resurs-response>]]></xml>
        <consumerIp>1.2.3.4</consumerIp>
        <!--Optional:-->
        <externalReference>?</externalReference>
     </app:submitApplicationExt>
  </soapenv:Body>
</soapenv:Envelope>
```
Click here to view form validation for Sweden
```xml
<?xml version="1.0" encoding="UTF-8"?>
<resurs-form>
    <!-- ***** Lånebelopp -->
    <element>
        <label>Lånebelopp</label>
        <name>subtitle-terms</name>
        <type>subtitle</type>
    </element>
    <element java-property="amount">
        <label>Lånebelopp</label>
        <name>amount</name>
        <type>integer</type>
        <is-mandatory>true</is-mandatory>
        <unit>kr</unit>
        <min-value>10000</min-value>
        <max-value>500000</max-value>
    </element>
    <element java-property="paymentTerms">
        <label>Önskad avbetalningstid</label>
        <description>Välj den önskade avbetalningstiden i listan.</description>
        <name>time</name>
        <type>list</type>
        <is-mandatory>true</is-mandatory>
        <default>144</default>
        <unit>år</unit>
        <items>
            <item>
                <label>1</label>
                <value>12</value>
            </item>
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
        <format>^(12|24|36|48|60|72|84|96|108|120|132|144|156|168|180)$</format>
    </element>
    <!-- ***** Huvudsökande - Personalia -->
    <element>
        <label>Huvudsökande</label>
        <name>subtitle-applicant</name>
        <type>subtitle</type>
    </element>
    <element java-property="applicant.governmentId">
        <label>Personnummer</label>
        <description>Vänligen ange i format ÅÅMMDD-XXXX</description>
        <name>applicant-government-id</name>
        <is-mandatory>true</is-mandatory>
        <type>string</type>
        <length>11</length>
        <format>^([0-9]{2})(0[1-9]|1[0-2])([0][1-9]|[1-2][0-9]|3[0-1])(\\-|\\+)?([\\d]{4})$</format>
        <format-message>Ogiltigt personnummer. Vänligen ange ditt personnummer med 10 siffror, ÅÅMMDD-XXXX.</format-message>
    </element>
    <element java-property="applicant.mobilePhoneNumber">
        <label>Mobilnummer</label>
        <description>Vänligen skriv in endast siffror</description>
        <name>applicant-mobile-number</name>
        <is-mandatory>true</is-mandatory>
        <type>string</type>
        <length>16</length>
        <format>^((0|\\+46||0046)[ |-]?(200|20|70|73|76|74|[1-9][0-9]{0,2})([ |-]?[0-9]){5,8})?$</format>
        <format-message>Vänligen kontrollera ditt mobilnummer, endast siffror ska skrivas in.</format-message>
    </element>
    <element java-property="applicant.emailAddress">
        <label>E-postadress</label>
        <description>Vänligen ange din e-postadress</description>
        <name>applicant-email-address</name>
        <is-mandatory>true</is-mandatory>
        <type>string</type>
        <length>50</length>
        <format>^([A-Za-z0-9!#%&'*+/=?^_`~-]+(\\.[A-Za-z0-9!#%&'*+/=?^_`~-]+)*@([A-Za-z0-9]+)(([\\.\\-]?[a-zA-Z0-9]+)*)\\.([A-Za-z]{2,}))?$</format>
        <format-message>Vänligen kontrollera din e-postadress</format-message>
    </element>
    <element java-property="loanPurpose">
        <label>Syfte med lån?</label>
        <name>purpose-of-loan</name>
        <type>list</type>
        <is-mandatory>true</is-mandatory>
        <items>
            <item>
                <label>Bil/MC</label>
                <value>MOTOR</value>
            </item>
            <item>
                <label>Bröllop</label>
                <value>WEDDING</value>
            </item>
            <item>
                <label>Båt</label>
                <value>BOAT</value>
            </item>
            <item>
                <label>Investering (t.ex. aktier)</label>
                <value>INVESTMENT</value>
            </item>
            <item>
                <label>Körkort</label>
                <value>DRIVERS_LICENSE</value>
            </item>
            <item>
                <label>Inredning (t.ex. möbler, hemelektronik)</label>
                <value>INTERIOR</value>
            </item>
            <item>
                <label>Renovering</label>
                <value>RENOVATION</value>
            </item>
            <item>
                <label>Resa/Fritid</label>
                <value>TRAVEL</value>
            </item>
            <item>
                <label>Samla lån/kredit</label>
                <value>CONSOLIDATE_LOANS</value>
            </item>
            <item>
                <label>Sjuk- eller tandvård</label>
                <value>DENTAL_OR_OTHER_CARE</value>
            </item>
            <item>
                <label>Studier</label>
                <value>STUDIES</value>
            </item>
            <item>
                <label>Övrig konsumtion</label>
                <value>OTHER</value>
            </item>
            <item>
                <label>Köp av bostad</label>
                <value>HOUSING_MORTGAGE_LOAN</value>
            </item>
        </items>
        <format>^(MOTOR|WEDDING|BOAT|INVESTMENT|DRIVERS_LICENSE|INTERIOR|RENOVATION|TRAVEL|CONSOLIDATE_LOANS|DENTAL_OR_OTHER_CARE|STUDIES|OTHER|HOUSING_MORTGAGE_LOAN)$</format>
        <format-message>Vänligen välj ett alternativ</format-message>
    </element>
    <element java-property="applicant.maritalStatus">
        <label>Civilstånd</label>
        <name>applicant-marital-status</name>
        <type>list</type>
        <is-mandatory>true</is-mandatory>
        <items>
            <item>
                <label>Gift/Registrerad partner</label>
                <value>MARRIED</value>
            </item>
            <item>
                <label>Sambo</label>
                <value>DOMESTIC_PARTNER</value>
            </item>
            <item>
                <label>Singel</label>
                <value>SINGLE</value>
            </item>
        </items>
        <format>^(SINGLE|MARRIED|DOMESTIC_PARTNER)$</format>
        <format-message>Vänligen välj ett alternativ</format-message>
    </element>
    <element java-property="applicant.numberChildrenNotOfAge">
        <label>Antal barn under 18 år</label>
        <description>Om du inte har barn, vänligen ange 0.</description>
        <name>number-children-not-of-age</name>
        <is-mandatory>true</is-mandatory>
        <type>list</type>
        <items>
            <item>
                <label>0</label>
                <value>0</value>
            </item>
            <item>
                <label>1</label>
                <value>1</value>
            </item>
            <item>
                <label>2</label>
                <value>2</value>
            </item>
            <item>
                <label>3</label>
                <value>3</value>
            </item>
            <item>
                <label>4</label>
                <value>4</value>
            </item>
            <item>
                <label>5</label>
                <value>5</value>
            </item>
            <item>
                <label>6</label>
                <value>6</value>
            </item>
            <item>
                <label>7</label>
                <value>7</value>
            </item>
            <item>
                <label>8</label>
                <value>8</value>
            </item>
            <item>
                <label>9</label>
                <value>9</value>
            </item>
            <item>
                <label>10 eller fler</label>
                <value>10</value>
            </item>
        </items>
        <format>^(0|1|2|3|4|5|6|7|8|9|10)$</format>
        <format-message>Vänligen ange  ett giltigt antal barn under 18 (mellan 0 och 10 eller fler)</format-message>
    </element>
    <element java-property="applicant.habitationType">
        <label>Boendeform</label>
        <name>applicant-habitation-form</name>
        <type>list</type>
        <is-mandatory>true</is-mandatory>
        <items>
            <item>
                <label>Hyresrätt</label>
                <value>APARTMENT</value>
            </item>
            <item>
                <label>Bostadsrätt</label>
                <value>CONDOMINIUM</value>
            </item>
            <item>
                <label>Egen fastighet</label>
                <value>DETACHED_HOUSE</value>
            </item>
        </items>
        <format>^(DETACHED_HOUSE|APARTMENT|CONDOMINIUM)$</format>
        <format-message>Vänligen välj ett alternativ</format-message>
    </element>
    <!-- ***** Huvudsökande - Arbete -->
    <element java-property="applicant.employmentType">
        <label>Anställningsform</label>
        <name>applicant-employment-type</name>
        <type>list</type>
        <is-mandatory>true</is-mandatory>
        <items>
            <item>
                <label>Fast anställd</label>
                <value>FAST_ANSTALLD</value>
            </item>
            <item>
                <label>Visstidsansställd</label>
                <value>VIKARIAT</value>
            </item>
            <item>
                <label>Eget företag</label>
                <value>EGEN_FORETAGARE</value>
            </item>
            <item>
                <label>Pensionär</label>
                <value>PENSIONAR</value>
            </item>
            <item>
                <label>Saknar arbete</label>
                <value>ARBETSLOS</value>
            </item>
        </items>
        <format>^(FAST_ANSTALLD|VIKARIAT|EGEN_FORETAGARE|PENSIONAR|ARBETSLOS)$</format>
        <format-message>Vänligen välj ett alternativ</format-message>
    </element>
    <element java-property="applicant.employmentTypeQualifying">
        <label>Är din visstidsanställning inom utbildning eller vård & omsorg?</label>
        <name>applicant-employment-type-qualifying</name>
        <type>radio</type>
        <is-mandatory>false</is-mandatory>
        <items>
            <item>
                <label>Ja</label>
                <value>true</value>
            </item>
            <item>
                <label>Nej</label>
                <value>false</value>
            </item>
        </items>
        <format>^(true|false)$</format>
    </element>
    <element java-property="applicant.employerName">
        <label>Arbetsgivare</label>
        <description>Vänligen ange företagsnamnet</description>
        <name>applicant-employer</name>
        <is-mandatory>false</is-mandatory>
        <type>string</type>
        <length>100</length>
        <format>^[\\s\\S]{0,100}$</format>
        <format-message>Vänligen skriv in din arbetsgivare</format-message>
    </element>
    <element java-property="applicant.employedSince">
        <label>Anställd/Eget företag/Pensionär sedan</label>
        <description>Vänligen ange i format ÅÅMM. Välj år och månad för nuvarande anställning, när du startade eget eller blev pensionär.</description>
        <name>applicant-employment-year-from</name>
        <is-mandatory>false</is-mandatory>
        <type>string</type>
        <length>4</length>
        <format>^([0-9]{2})(0[1-9]|1[012])$</format>
        <format-message>Vänligen välj ett alternativ</format-message>
    </element>
    <element java-property="applicant.employedTo">
        <label>Anställd t  o m</label>
        <description>Vänligen välj år och månad då du slutar din visstidsanställning</description>
        <name>applicant-employment-year-until</name>
        <is-mandatory>false</is-mandatory>
        <type>string</type>
        <length>4</length>
        <format>^([0-9]{2})(0[1-9]|1[012])$</format>
        <format-message>Vänligen välj ett alternativ</format-message>
    </element>
    <element java-property="applicant.grossMonthlyIncome">
        <label>Inkomst per månad före skatt</label>
        <description>Vänligen skriv in endast siffror</description>
        <name>applicant-monthly-income-gross</name>
        <is-mandatory>true</is-mandatory>
        <type>integer</type>
        <min-value>0</min-value>
        <max-value>999999</max-value>
        <unit>kr</unit>
        <format-message>Vänligen ange din inkomst per månad före skatt i siffror (0 - 999999)</format-message>
    </element>
    <element java-property="householdLivingExpenses">
        <label>Boendekostnad per månad</label>
        <description>Vänligen ange din del av boendekostnad (hyra, bolåneränta, amortering, avgift, el, värme) per månad i siffror.</description>
        <name>household-living-expenses</name>
        <is-mandatory>true</is-mandatory>
        <type>integer</type>
        <min-value>0</min-value>
        <max-value>99999</max-value>
        <unit>kr</unit>
        <format-message>Vänligen ange ett värde i siffror (0-99999)</format-message>
    </element>
    <element java-property="householdLoanExpenses">
        <label>Kostnader övriga lån/krediter per månad exkl. bolån</label>
        <description>Vänligen ange din del av månadskostnad för övriga lån/krediter, exkl. bolån.</description>
        <name>household-other-loan-expenses</name>
        <is-mandatory>true</is-mandatory>
        <type>integer</type>
        <min-value>0</min-value>
        <max-value>99999</max-value>
        <unit>kr</unit>
        <format-message>Vänligen ange ett värde i siffror (0-99999)</format-message>
    </element>
    <element java-property="financeOtherLoansAmount">
        <label>Ange vilket belopp du vill samla</label>
        <name>finance-other-loans-balance-of-loans</name>
        <is-mandatory>false</is-mandatory>
        <type>integer</type>
        <min-value>0</min-value>
        <max-value>500000</max-value>
        <unit>money</unit>
        <format-message>Vänligen ange ett värde i siffror (0-500000)</format-message>
    </element>
    <element java-property="payoutClearingNo">
        <label>Clearingnummer</label>
        <description>Ett clearingnummer består av 4 eller 5 siffror. För att kunna e-signera ditt avtal måste du uppge clearingnummer.</description>
        <name>payout-clearing-number</name>
        <is-mandatory>false</is-mandatory>
        <type>string</type>
        <length>5</length>
        <format>^[\\d]{4,5}$</format>
        <format-message>Vänligen ange ett giltigt clearing nummer (4 eller 5 siffror)</format-message>
    </element>
    <element java-property="payoutAccountNo">
        <label>Kontonummer</label>
        <description>Vänligen ange ditt kontonummer utan bindestreck eller punkter. För att kunna e-signera ditt avtal måste du uppge kontonummer.</description>
        <name>payout-account-number</name>
        <is-mandatory>false</is-mandatory>
        <type>string</type>
        <length>12</length>
        <format>^[\\d]{6,12}$</format>
        <format-message>Vänligen fyll i ett giltigt kontonummer (utan bindestreck eller punkter)</format-message>
    </element>
     <element java-property="payoutClearingNo">
        <label>Clearingnummer</label>
        <description>Partners clearingnummer för hybridlån. Ett clearingnummer består av 4 eller 5 siffror. För att kunna e-signera ditt avtal måste du uppge clearingnummer.</description>
        <name>partner-clearing-number</name>
        <is-mandatory>false</is-mandatory>
        <type>string</type>
        <length>5</length>
        <format>^[\\d]{4,5}$</format>
        <format-message>Vänligen ange ett giltigt clearing nummer (4 eller 5 siffror)</format-message>
    </element>
    <element java-property="payoutAccountNo">
        <label>Kontonummer</label>
        <description>Partners kontonummer för hybridlån. Vänligen ange ditt kontonummer utan bindestreck eller punkter. För att kunna e-signera ditt avtal måste du uppge kontonummer.</description>
        <name>partner-disbursement-account-number</name>
        <is-mandatory>false</is-mandatory>
        <type>string</type>
        <length>12</length>
        <format>^[\\d]{6,12}$</format>
        <format-message>Vänligen fyll i ett giltigt kontonummer (utan bindestreck eller punkter)</format-message>
    </element> 
    <!-- ***** Medsökande - Personalia -->
    <element>
        <label>Eventuell medsökande</label>
        <name>subtitle-coapplicant</name>
        <type>subtitle</type>
    </element>
    <element java-property="coApplicant.governmentId">
        <label>Personnummer</label>
        <description>Vänligen ange i format ÅÅMMDD-XXXX</description>
        <name>coapplicant-government-id</name>
        <is-mandatory>false</is-mandatory>
        <type>string</type>
        <length>11</length>
        <format>^([0-9]{2})(0[1-9]|1[0-2])([0][1-9]|[1-2][0-9]|3[0-1])(\\-|\\+)?([\\d]{4})$</format>
        <format-message>Ogiltigt personnummer. Vänligen ange ditt personnummer med 10 siffror, ÅÅMMDD-XXXX.</format-message>
    </element>
    <element java-property="coApplicant.mobilePhoneNumber">
        <label>Mobilnummer</label>
        <description>Vänligen skriv in endast siffror</description>
        <name>coapplicant-mobile-number</name>
        <is-mandatory>false</is-mandatory>
        <type>string</type>
        <length>16</length>
        <format>^((0|\\+46||0046)[ |-]?(200|20|70|73|76|74|[1-9][0-9]{0,2})([ |-]?[0-9]){5,8})?$</format>
        <format-message>Vänligen kontrollera ditt mobilnummer, endast siffror ska skrivas in.</format-message>
        <depends-on>coapplicant-government-id</depends-on>
    </element>
    <element java-property="coApplicant.emailAddress">
        <label>E-postadress</label>
        <description>Vänligen ange din e-postadress</description>
        <name>coapplicant-email-address</name>
        <is-mandatory>false</is-mandatory>
        <type>string</type>
        <length>50</length>
        <format>^([A-Za-z0-9!#%&'*+/=?^_`~-]+(\\.[A-Za-z0-9!#%&'*+/=?^_`~-]+)*@([A-Za-z0-9]+)(([\\.\\-]?[a-zA-Z0-9]+)*)\\.([A-Za-z]{2,}))?$</format>
        <format-message>Vänligen ange din e-postadress</format-message>
        <depends-on>coapplicant-government-id</depends-on>
    </element>
    <!-- ***** Medsökande - Civilstånd -->
    <element java-property="coApplicant.maritalStatus">
        <label>Civilstånd</label>
        <name>coapplicant-marital-status</name>
        <is-mandatory>false</is-mandatory>
        <type>list</type>
        <is-mandatory>false</is-mandatory>
        <items>
            <item>
                <label>Gift registrerard partner</label>
                <value>MARRIED</value>
            </item>
            <item>
                <label>Sambo</label>
                <value>DOMESTIC_PARTNER</value>
            </item>
            <item>
                <label>Singel</label>
                <value>SINGLE</value>
            </item>
        </items>
        <format>^(MARRIED|DOMESTIC_PARTNER|SINGLE)?$</format>
        <depends-on>coapplicant-government-id</depends-on>
    </element>
    <!-- ***** Medsökande - Bostad -->
    <element java-property="coApplicant.habitationType">
        <label>Boendeform</label>
        <name>coapplicant-habitation-form</name>
        <is-mandatory>false</is-mandatory>
        <type>list</type>
        <items>
            <item>
                <label>Hyresrätt</label>
                <value>APARTMENT</value>
            </item>
            <item>
                <label>Bostadsrätt</label>
                <value>CONDOMINIUM</value>
            </item>
            <item>
                <label>Egen fastighet</label>
                <value>DETACHED_HOUSE</value>
            </item>
        </items>
        <format>^(DETACHED_HOUSE|APARTMENT|CONDOMINIUM)$</format>
        <format-message>Vänligen välj ett alternativ</format-message>
        <depends-on>coapplicant-government-id</depends-on>
    </element>
    <!-- ***** Medsökande - Arbete -->
    <element java-property="coApplicant.employmentType">
        <label>Anställningsform</label>
        <name>coapplicant-employment-type</name>
        <is-mandatory>false</is-mandatory>
        <type>list</type>
        <items>
            <item>
                <label>Fast anställd</label>
                <value>FAST_ANSTALLD</value>
            </item>
            <item>
                <label>Visstidsansställd</label>
                <value>VIKARIAT</value>
            </item>
            <item>
                <label>Eget företag</label>
                <value>EGEN_FORETAGARE</value>
            </item>
            <item>
                <label>Pensionär</label>
                <value>PENSIONAR</value>
            </item>
            <item>
                <label>Saknar arbete</label>
                <value>ARBETSLOS</value>
            </item>
        </items>
        <format>^(FAST_ANSTALLD|VIKARIAT|EGEN_FORETAGARE|PENSIONAR|ARBETSLOS)$</format>
        <format-message>Vänligen välj ett alternativ</format-message>
        <depends-on>coapplicant-government-id</depends-on>
    </element>
    <element java-property="coApplicant.employmentTypeQualifying">
        <label>Är din visstidsanställning inom utbildning eller vård & omsorg?</label>
        <name>coapplicant-employment-type-qualifying</name>
        <type>radio</type>
        <is-mandatory>false</is-mandatory>
        <items>
            <item>
                <label>Ja</label>
                <value>true</value>
            </item>
            <item>
                <label>Nej</label>
                <value>false</value>
            </item>
        </items>
        <format>^(true|false)$</format>
    </element>
    <element java-property="coApplicant.employerName">
        <label>Arbetsgivare</label>
        <description>Vänligen ange företagsnamnet</description>
        <name>coapplicant-employer</name>
        <is-mandatory>false</is-mandatory>
        <type>string</type>
        <length>100</length>
        <format>^[\\s\\S]{0,100}$</format>
        <format-message>Vänligen skriv in din arbetsgivare</format-message>
        <depends-on>coapplicant-government-id</depends-on>
    </element>
    <element java-property="coApplicant.employedSince">
        <label>Anställd/Eget företag/Pensionär sedan</label>
        <description>Vänligen ange i format ÅÅMM. Välj år och månad för nuvarande anställning, när du startade eget eller blev pensionär.</description>
        <name>coapplicant-employment-year-from</name>
        <is-mandatory>false</is-mandatory>
        <type>string</type>
        <length>4</length>
        <format>^(([0-9]{2})(0[1-9]|1[012]))?$</format>
        <format-message>Vänligen välj ett alternativ</format-message>
        <depends-on>coapplicant-government-id</depends-on>
    </element>
    <element java-property="coApplicant.employedTo">
        <label>Anställd t  o m</label>
        <description>Vänligen välj år och månad då du slutar din visstidsanställning</description>
        <name>coapplicant-employment-year-until</name>
        <is-mandatory>false</is-mandatory>
        <type>string</type>
        <length>4</length>
        <format>^([0-9]{2})(0[1-9]|1[012])$</format>
        <format-message>Vänligen välj ett alternativ</format-message>
        <depends-on>coapplicant-government-id</depends-on>
    </element>
    <element java-property="coApplicant.grossMonthlyIncome">
        <label>Inkomst per månad före skatt</label>
        <description>Vänligen skriv in endast siffror</description>
        <name>coapplicant-monthly-income-gross</name>
        <is-mandatory>false</is-mandatory>
        <type>integer</type>
        <min-value>0</min-value>
        <max-value>999999</max-value>
        <unit>kr</unit>
        <format-message>Vänligen ange din inkomst per månad före skatt i siffror (0 - 999999)</format-message>
        <depends-on>coapplicant-government-id</depends-on>
    </element>
    <element java-property="isInsured">
        <label>Låneskydd</label>
        <name>insurance</name>
        <type>checkbox</type>
        <is-mandatory>false</is-mandatory>
        <items>
            <item>
                <label>Ja</label>
                <value>true</value>
            </item>
        </items>
        <format>^(true|)$</format>
    </element>
    <!-- ***** Godkännande -->
    <element>
        <label>Villkor</label>
        <name>subtitle-conditions</name>
        <type>subtitle</type>
    </element>
    <element java-property="termsAgreedTo">
        <format-message>Du måste godkänna villkoren för att kunna gå vidare.</format-message>
        <label>Villkorsbekräftelse</label>
        <name>approve-conditions</name>
        <is-mandatory>true</is-mandatory>
        <type>confirmation</type>
        <items>
            <item>
                <label>
                    Jag accepterar Resurs Banks allmänna villkor.
                    Vid tecknande av avtal med Resurs Bank ingår du i Resurskoncernens kundregister.
                    Inhämtade personuppgifter kan användas och distribueras för marknadsföring.
                    Jag är införstådd med att jag genom att kontakta Resurs Bank kan förbjuda behandling
                    av personuppgifter för marknadsföring. Jag försäkrar att de uppgifter som lämnats är
                    riktiga, fullständiga och att jag uppfyller de allmänna förutsättningarna för
                    Privatlån. Jag tillåter kreditgivaren att göra sedvanlig kreditprövning varvid
                    arbetsgivaren kan komma att kontaktas. Kreditgivaren förbehåller sig fri
                    prövningsrätt. Jag godkänner även att jag vid avslag kan komma att erbjudas
                    alternativ produkt eller kontaktas av en av Resurs Banks samarbetspartners. Jag
                    försäkrar vidare att jag skriftligen eller på www.resursbank.se tagit del av samt
                    mottagit kopia av vid tidpunkten för detta avtals ingående gällande Standardiserad
                    europeisk konsumentkreditinformation (SEKKI) med aktuella Specialkontovillkor samt
                    Resurs Banks allmänna villkor för privat konto- och kortkredit samt privatlån för
                    Sverige, vars bestämmelser härmed accepteras.
                </label>
                <value>true</value>
            </item>
        </items>
        <format>^(true)$</format>
    </element>
    <element java-property="agreementSignType">
        <label>Signeringsmetod</label>
        <name>agreement-sign-type</name>
        <type>radio</type>
        <is-mandatory>true</is-mandatory>
        <items>
            <item>
                <label>E-signering</label>
                <value>E_SIGN</value>
            </item>
            <item>
                <label>Postalt avtal</label>
                <value>MAIL</value>
            </item>
        </items>
        <format>^(MAIL|E_SIGN)$</format>
        <format-message>Vänligen välj signeringsmetod</format-message>
    </element>
    <element>
        <label>Skicka</label>
        <imagesrc></imagesrc>
        <name>send-application</name>
        <type>submit</type>
    </element>
</resurs-form>
```
Click here to expand submitApplicationExtResponse example for Sweden
```xml
<soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
   <soap:Body>
      <ns2:submitApplicationExtResponse xmlns:ns2="http://consumerloan.resurs.com/v1/msg/application" xmlns:ns3="http://consumerloan.resurs.com/v1/msg/exception">
         <submitApplicationExtResult>
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
            <totalFeesAndInterest>1000.00</totalFeesAndInterest>
         </submitApplicationExtResult>
      </ns2:submitApplicationExtResponse>
   </soap:Body>
</soap:Envelope>
```
Click here to expand deliveryComplete for Sweden
PUT /api/callback/delivery-complete

```xml
{
    "publicApplicationReferenceId": "e99ea389-584f-49a9-bbc1-f51bcb62ff5e"
}
```
