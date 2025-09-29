---
layout: page
title: submitApplicationExt NO
permalink: /consumer-loan-api/submitapplicationext-no/
parent: Consumer Loan API
---


## submitApplicationExt NO 

## Norway NO
### Request: submitApplicationExt
```xml
<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:app="http://consumerloan.resurs.com/v1/msg/application">
  <soapenv:Header/>
  <soapenv:Body>
     <app:submitApplicationExt>
        <xml><![CDATA[<resurs-response>
   <amount>100000</amount>
   <time>120</time>
   <applicant-government-id>05128727908</applicant-government-id>
   <applicant-mobile-number>22563733</applicant-mobile-number>
   <applicant-email-address>test@resurs.se</applicant-email-address>
   <purpose-of-loan>HOUSING_MORTGAGE_LOAN</purpose-of-loan>
   <applicant-marital-status>MARRIED</applicant-marital-status>
   <number-children-not-of-age>1</number-children-not-of-age>
   <applicant-habitation-form>DETACHED_HOUSE</applicant-habitation-form>
   <applicant-employment-type>FAST_ANSTALLD</applicant-employment-type>
   <applicant-nationality>NORWEGIAN</applicant-nationality>
   <applicant-monthly-income-gross>32000</applicant-monthly-income-gross>
   <applicant-monthly-income-net>27000</applicant-monthly-income-net>
   <applicant-mortgage-debt>1200</applicant-mortgage-debt>
   <applicant-car-loan-sum>10000</applicant-car-loan-sum>
   <applicant-student-loan-sum>10000</applicant-student-loan-sum>
   <applicant-credit-card-sum>3200</applicant-credit-card-sum>
   <applicant-monthly-debt-repayment>5000</applicant-monthly-debt-repayment>
   <finance-other-loans>true</finance-other-loans>
   <approve-conditions>true</approve-conditions>
   <agreement-sign-type>MAIL</agreement-sign-type>
</resurs-response>]]></xml>
        <consumerIp>1.2.3.4</consumerIp>
        <!--Optional:-->
        <externalReference>onboarding1</externalReference>
     </app:submitApplicationExt>
  </soapenv:Body>
</soapenv:Envelope>
```
### Validation for Norway
```xml
<resurs-form>
    <!-- ***** Lånebelopp -->
    <element java-property="amount">
        <label>Lånebeløp</label>
        <description></description>
        <name>amount</name>
        <is-mandatory>true</is-mandatory>
        <type>integer</type>
        <min-value>1000</min-value>
        <max-value>500000</max-value>
        <unit>money</unit>
    </element>
    <element java-property="paymentTerms">
        <label>Nedbetalingstid</label>
        <description></description>
        <name>time</name>
        <type>list</type>
        <is-mandatory>true</is-mandatory>
        <unit>time</unit>
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
                <label>10</label>
                <value>120</value>
            </item>
            <item>
                <label>12</label>
                <value>144</value>
            </item>
        </items>
        <format>^(12|24|36|48|60|72|84|96|120|144)$</format>
    </element>
    <!-- ***** Huvudsökande - Personalia -->
    <element java-property="applicant.governmentId">
        <label>Fødselsnummer</label>
        <description>Oppgi ditt fødselsnummer (format DDMMÅÅXXXXX).</description>
        <name>applicant-government-id</name>
        <is-mandatory>true</is-mandatory>
        <type>string</type>
        <length>11</length>
        <format>^([0][1-9]|[1-2][0-9]|3[0-1])(0[1-9]|1[0-2])([0-9]{2})([0-9]{5})$</format>
        <format-message>Ugyldig fødselsnummer. Oppgi ditt fødselsnummer i formatet DDMMÅÅXXXXX.</format-message>
    </element>
    <element java-property="applicant.mobilePhoneNumber">
        <label>Mobilnummer</label>
        <description>Oppgi ditt mobil telefonnummer.</description>
        <name>applicant-mobile-number</name>
        <is-mandatory>true</is-mandatory>
        <type>string</type>
        <length>16</length>
        <format>^((\\+47|0047|)?[ |-]?[2-9]([ |-]?[0-9]){7,7})?$</format>
        <format-message>Oppgi ditt mobil telefonnummer.</format-message>
    </element>
    <element java-property="applicant.emailAddress">
        <label>E-postadresse</label>
        <description>Oppgi din e-postadresse.</description>
        <name>applicant-email-address</name>
        <is-mandatory>true</is-mandatory>
        <type>string</type>
        <length>50</length>
        <format>^[A-Za-z0-9!#%&'*+/=?^_`~-]+(\\.[A-Za-z0-9!#%&'*+/=?^_`~-]+)*@([A-Za-z0-9]+)(([\\.\\-]?[a-zA-Z0-9]+)*)\\.([A-Za-z]{2,})$</format>
        <format-message>Oppgi din e-postadresse.</format-message>
    </element>
    <!-- ***** Medsökande - Personalia -->
    <element java-property="coApplicant.governmentId">
        <label>Fødselsnummer</label>
        <description>Oppgi ditt fødselsnummer (format DDMMÅÅXXXXX).</description>
        <name>coapplicant-government-id</name>
        <is-mandatory>false</is-mandatory>
        <type>string</type>
        <length>11</length>
        <format>^([0][1-9]|[1-2][0-9]|3[0-1])(0[1-9]|1[0-2])([0-9]{2})([0-9]{5})$</format>
        <format-message>Ugyldig fødselsnummer. Oppgi ditt fødselsnummer i formatet DDMMÅÅXXXXX.</format-message>
    </element>
    <element java-property="coApplicant.mobilePhoneNumber">
        <label>Mobilnummer</label>
        <description>Oppgi ditt mobil telefonnummer.</description>
        <name>coapplicant-mobile-number</name>
        <is-mandatory>false</is-mandatory>
        <depends-on>coapplicant-government-id</depends-on>
        <type>string</type>
        <length>16</length>
        <format>^((\\+47|0047|)?[ |-]?[2-9]([ |-]?[0-9]){7,7})?$</format>
        <format-message>Oppgi ditt mobil telefonnummer.</format-message>
    </element>
    <element java-property="coApplicant.emailAddress">
        <label>E-postadresse</label>
        <description>Oppgi din e-postadresse.</description>
        <name>coapplicant-email-address</name>
        <is-mandatory>false</is-mandatory>
        <depends-on>coapplicant-government-id</depends-on>
        <type>string</type>
        <length>50</length>
        <format>^[A-Za-z0-9!#%&'*+/=?^_`~-]+(\\.[A-Za-z0-9!#%&'*+/=?^_`~-]+)*@([A-Za-z0-9]+)(([\\.\\-]?[a-zA-Z0-9]+)*)\\.([A-Za-z]{2,})$</format>
        <format-message>Oppgi din e-postadresse.</format-message>
    </element>
    <element java-property="coApplicant.consentEmailMarketing">
        <name>coapplicant-consent-email-marketing</name>
        <label>Jeg ønsker fremtidige tilbud fra Resurs Bank på e-post.</label>
        <type>checkbox</type>
        <is-mandatory>false</is-mandatory>
        <items>
            <item>
                <label></label>
                <value>true</value>
            </item>
        </items>
        <format>^(true|)$</format>
    </element>
    <element java-property="coApplicant.employmentType">
        <label>Arbeidsforhold</label>
        <description></description>
        <name>coapplicant-employment-type</name>
        <is-mandatory>false</is-mandatory>
        <depends-on>coapplicant-government-id</depends-on>
        <type>radio</type>
        <default></default>
        <items>
            <item>
                <label>Fast ansatt</label>
                <value>FAST_ANSTALLD</value>
            </item>
            <item>
                <label>Midlertidig ansatt/vikar</label>
                <value>VIKARIAT</value>
            </item>
            <item>
                <label>Selvstendig næringsdrivende</label>
                <value>EGEN_FORETAGARE</value>
            </item>
            <item>
                <label>Pensjonist</label>
                <value>PENSIONAR</value>
            </item>
            <item>
                <label>Student</label>
                <value>STUDENT</value>
            </item>
            <item>
                <label>Uføretrygd</label>
                <value>SJUKPENSIONAR</value>
            </item>
            <item>
                <label>Arbeidsledig</label>
                <value>ARBETSLOS</value>
            </item>
            <item>
                <label>Arbeidsavklaringspenger</label>
                <value>REHABILITATION</value>
            </item>
            <item>
                <label>Annet</label>
                <value>LONG_TERM_SICKNESS</value>
            </item>
        </items>
        <format>^(FAST_ANSTALLD|VIKARIAT|EGEN_FORETAGARE|PENSIONAR|STUDENT|SJUKPENSIONAR|ARBETSLOS|REHABILITATION|LONG_TERM_SICKNESS)$</format>
        <format-message>Velg et av alternativene.</format-message>
    </element>
    <element java-property="coApplicant.grossMonthlyIncome">
        <label>Månedsinntekt før skatt </label>
        <description>Oppgi din månedsinntekt før skatt.</description>
        <name>coapplicant-monthly-income-gross</name>
        <is-mandatory>false</is-mandatory>
        <depends-on>coapplicant-government-id</depends-on>
        <type>integer</type>
        <min-value>0</min-value>
        <max-value>9999999</max-value>
        <unit>money</unit>
        <format-message>Oppgi gyldig verdi (0 - 9999999 kr).</format-message>
    </element>
    <element java-property="coApplicant.netMonthlyIncome">
        <label>Månedsinntekt etter skatt</label>
        <description>Oppgi din månedsinntekt etter skatt.</description>
        <name>coapplicant-monthly-income-net</name>
        <is-mandatory>false</is-mandatory>
        <depends-on>coapplicant-government-id</depends-on>
        <type>integer</type>
        <min-value>0</min-value>
        <max-value>9999999</max-value>
        <unit>money</unit>
        <format-message>Oppgi gyldig verdi (0 - 9999999 kr).</format-message>
    </element>
    <element java-property="coApplicant.mortgageDebt">
        <label>Bolig/hyttelån – lånesaldo (medsøkers andel)</label>
        <description>Fyll ut hvor mye medsøker har i boliglån (kun medsøkers andel dersom medsøker deler med noen andre)..</description>
        <name>coapplicant-mortgage-debt</name>
        <is-mandatory>false</is-mandatory>
        <default>0</default>
        <type>integer</type>
        <min-value>0</min-value>
        <max-value>99999999</max-value>
        <unit>money</unit>
        <length>8</length>
        <format-message>Oppgi gyldig verdi (0 - 99999999 kr).</format-message>
    </element>
    <element java-property="coApplicant.mortgageMonthlyCost">
        <label>Bolig/hyttelån – månedskostnad (medsøkers andel)</label>
        <description>Fyll ut hvor mye medsøker betaler på boliglån hver måned (kun medsøkers andel dersom medsøker deler med noen andre).</description>
        <name>coapplicant-mortgage-monthly-cost</name>
        <is-mandatory>false</is-mandatory>
        <default>0</default>
        <type>integer</type>
        <min-value>0</min-value>
        <max-value>99999999</max-value>
        <unit>money</unit>
        <length>8</length>
        <format-message>Oppgi gyldig verdi (0 - 99999999 kr).</format-message>
    </element>
    <element java-property="coApplicant.carLoanSum">
        <label>Bil/MC/Båt – lånesaldo (medsøkers andel)</label>
        <description>Fyll ut hvor mye medsøker har i lån med pant I bil eller andre kjøretøy (kun medsøkers andel dersom medsøker deler med noen andre).</description>
        <name>coapplicant-car-loan-sum</name>
        <is-mandatory>false</is-mandatory>
        <default>0</default>
        <type>integer</type>
        <min-value>0</min-value>
        <max-value>9999999</max-value>
        <unit>money</unit>
        <length>7</length>
        <format-message>Oppgi gyldig verdi (0 - 9999999 kr).</format-message>
    </element>
    <element java-property="coApplicant.carLoanMonthlyCost">
        <label>Bil/MC/Båt – månedskostnad (medsøkers andel)</label>
        <description>Fyll ut hvor mye medsøker betaler på lån med pant I bil eller andre kjøretøy hver måned (kun medsøkers andel dersom medsøker deler med noen andre).</description>
        <name>coapplicant-car-loan-monthly-cost</name>
        <is-mandatory>false</is-mandatory>
        <default>0</default>
        <type>integer</type>
        <min-value>0</min-value>
        <max-value>9999999</max-value>
        <unit>money</unit>
        <length>7</length>
        <format-message>Oppgi gyldig verdi (0 - 9999999 kr).</format-message>
    </element>
    <element java-property="coApplicant.studentLoanSum">
        <label>Studielån – lånesaldo</label>
        <description>Fyll ut hvor mye medsøker har i studielån</description>
        <name>coapplicant-student-loan-sum</name>
        <is-mandatory>false</is-mandatory>
        <default>0</default>
        <type>integer</type>
        <min-value>0</min-value>
        <max-value>9999999</max-value>
        <unit>money</unit>
        <length>7</length>
        <format-message>Oppgi gyldig verdi (0 - 9999999 kr).</format-message>
    </element>
    <element java-property="coApplicant.studentLoanMonthlyCost ">
        <label>Studielån – månedskostnad</label>
        <description>Fyll ut hvor mye medsøker betaler på studielånet hver måned.</description>
        <name>coapplicant-student-loan-monthly-cost</name>
        <is-mandatory>false</is-mandatory>
        <default>0</default>
        <type>integer</type>
        <min-value>0</min-value>
        <max-value>9999999</max-value>
        <unit>money</unit>
        <length>7</length>
        <format-message>Oppgi gyldig verdi (0 - 9999999 kr).</format-message>
    </element>
    <element java-property="coApplicant.creditCardSum">
        <label>Kredittkortgjeld/forbrukslån - lånesaldo</label>
        <description>Fyll ut medsøkers samlede kredittkortgjeld/forbrukslån (inkluder ubenyttede kreditter dersom medsøker har dette)</description>
        <name>coapplicant-credit-card-sum</name>
        <is-mandatory>false</is-mandatory>
        <default>0</default>
        <type>integer</type>
        <min-value>0</min-value>
        <max-value>9999999</max-value>
        <unit>money</unit>
        <length>7</length>
        <format-message>Oppgi gyldig verdi (0 - 9999999 kr).</format-message>
    </element>
    <element java-property="coApplicant.creditCardMonthlyCost">
        <label>Kredittkortgjeld/forbrukslån – månedskostnad</label>
        <description>Fyll ut hvor mye medsøker betaler på hver måned på medsøkers kredittkortgjeld og forbrukslån.</description>
        <name>coapplicant-credit-card-monthly-cost</name>
        <is-mandatory>false</is-mandatory>
        <default>0</default>
        <type>integer</type>
        <min-value>0</min-value>
        <max-value>9999999</max-value>
        <unit>money</unit>
        <length>7</length>
        <format-message>Oppgi gyldig verdi (0 - 9999999 kr).</format-message>
    </element>
    <element java-property="loanPurpose">
        <label>Formålet med lånet</label>
        <description></description>
        <name>purpose-of-loan</name>
        <type>radio</type>
        <is-mandatory>true</is-mandatory>
        <items>
            <item>
                <label>Bil/MC</label>
                <value>MOTOR</value>
            </item>
            <item>
                <label>Bryllup</label>
                <value>WEDDING</value>
            </item>
            <item>
                <label>Båt</label>
                <value>BOAT</value>
            </item>
            <item>
                <label>Investering (f. eks aksjer)</label>
                <value>INVESTMENT</value>
            </item>
            <item>
                <label>Førerkort</label>
                <value>DRIVERS_LICENSE</value>
            </item>
            <item>
                <label>Innredning (f.eks møbler, elektronikk)</label>
                <value>INTERIOR</value>
            </item>
            <item>
                <label>Oppussing/Renovering</label>
                <value>RENOVATION</value>
            </item>
            <item>
                <label>Reise/Fritid</label>
                <value>TRAVEL</value>
            </item>
            <item>
                <label>Samle lån/kreditt</label>
                <value>CONSOLIDATE_LOANS</value>
            </item>
            <item>
                <label>Helse/tannpleie</label>
                <value>DENTAL_OR_OTHER_CARE</value>
            </item>
            <item>
                <label>Studier</label>
                <value>STUDIES</value>
            </item>
            <item>
                <label>Øvrig konsum</label>
                <value>OTHER</value>
            </item>
            <item>
                <label>Kjøp av bolig</label>
                <value>HOUSING_MORTGAGE_LOAN</value>
            </item>
        </items>
        <format>^(MOTOR|WEDDING|BOAT|HOUSING_MORTGAGE_LOAN|INVESTMENT|DRIVERS_LICENSE|INTERIOR|RENOVATION|TRAVEL|CONSOLIDATE_LOANS|DENTAL_OR_OTHER_CARE|STUDIES|OTHER)$</format>
        <format-message>Velg et av alternativene.</format-message>
    </element>
    <!-- ***** Huvudsökande - Civilstånd -->
    <element java-property="applicant.maritalStatus">
        <label>Sivilstatus</label>
        <description></description>
        <name>applicant-marital-status</name>
        <type>radio</type>
        <default></default>
        <is-mandatory>true</is-mandatory>
        <items>
            <item>
                <label>Gift/Registrert partnerskap</label>
                <value>MARRIED</value>
            </item>
            <item>
                <label>Samboer</label>
                <value>DOMESTIC_PARTNER</value>
            </item>
            <item>
                <label>Skilt/separert</label>
                <value>DIVORCED</value>
            </item>
            <item>
                <label>Aleneboende</label>
                <value>SINGLE</value>
            </item>
            <item>
                <label>Enke-/mann</label>
                <value>WIDOW</value>
            </item>
        </items>
        <format>^(MARRIED|DOMESTIC_PARTNER|SINGLE|DIVORCED|WIDOW)$</format>
        <format-message>Velg et av alternativene.</format-message>
    </element>
    <element java-property="householdNoOfChildren">
        <label>Antall barn under 18 år</label>
        <description>Om du ikke har barn, oppgi 0.</description>
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
                <label>10</label>
                <value>10</value>
            </item>
            <item>
                <label>11</label>
                <value>11</value>
            </item>
            <item>
                <label>12</label>
                <value>12</value>
            </item>
            <item>
                <label>13</label>
                <value>13</value>
            </item>
            <item>
                <label>14</label>
                <value>14</value>
            </item>
            <item>
                <label>15</label>
                <value>15</value>
            </item>
            <item>
                <label>16</label>
                <value>16</value>
            </item>
            <item>
                <label>17</label>
                <value>17</value>
            </item>
            <item>
                <label>18</label>
                <value>18</value>
            </item>
            <item>
                <label>19</label>
                <value>19</value>
            </item>
            <item>
                <label>20</label>
                <value>20</value>
            </item>
        </items>
        <unit>kpl</unit>
        <format>^([01]?[0-9]|20)$</format>
        <format-message>Oppgi et gyldig antall barn under 18 (mellom 0 og 20).</format-message>
    </element>
        <element java-property="applicant.habitationType">
        <label>Boform</label>
        <description></description>
        <name>applicant-habitation-form</name>
        <is-mandatory>true</is-mandatory>
        <type>radio</type>
        <default></default>
        <items>
            <item>
                <label>Eier leilighet/bolig</label>
                <value>DETACHED_HOUSE</value>
            </item>
            <item>
                <label>Borettslag</label>
                <value>CONDOMINIUM</value>
            </item>
            <item>
                <label>Leier</label>
                <value>APARTMENT</value>
            </item>
            <item>
                <label>Bor hos foreldre</label>
                <value>BY_PARENTS</value>
            </item>
        </items>
        <format>^(DETACHED_HOUSE|APARTMENT|CONDOMINIUM|BY_PARENTS)$</format>
        <format-message>Velg et av alternativene.</format-message>
    </element>
    <!-- ***** Huvudsökande - Arbete -->
    <element java-property="applicant.employmentType">
        <label>Arbeidsforhold</label>
        <description></description>
        <name>applicant-employment-type</name>
        <is-mandatory>true</is-mandatory>
        <type>radio</type>
        <default></default>
        <items>
            <item>
                <label>Fast ansatt</label>
                <value>FAST_ANSTALLD</value>
            </item>
            <item>
                <label>Midlertidig ansatt/vikar</label>
                <value>VIKARIAT</value>
            </item>
            <item>
                <label>Selvstendig næringsdrivende</label>
                <value>EGEN_FORETAGARE</value>
            </item>
            <item>
                <label>Pensjonist</label>
                <value>PENSIONAR</value>
            </item>
            <item>
                <label>Student</label>
                <value>STUDENT</value>
            </item>
            <item>
                <label>Uføretrygd</label>
                <value>SJUKPENSIONAR</value>
            </item>
            <item>
                <label>Arbeidsledig</label>
                <value>ARBETSLOS</value>
            </item>
            <item>
                <label>Arbeidsavklaringspenger</label>
                <value>REHABILITATION</value>
            </item>
            <item>
                <label>Annet</label>
                <value>LONG_TERM_SICKNESS</value>
            </item>
        </items>
        <format>^(FAST_ANSTALLD|VIKARIAT|EGEN_FORETAGARE|PENSIONAR|STUDENT|SJUKPENSIONAR|ARBETSLOS|REHABILITATION|LONG_TERM_SICKNESS)$</format>
        <format-message>Velg et av alternativene.</format-message>
    </element>
    <element java-property="applicant.citizenship">
        <label>Norsk statsborger</label>
        <description>Stasborgerskap</description>
        <name>applicant-nationality</name>
        <type>radio</type>
        <default></default>
        <is-mandatory>true</is-mandatory>
        <items>
            <item>
                <label>Norsk</label>
                <value>NORWEGIAN</value>
            </item>
            <item>
                <label>Utenlandsk</label>
                <value>FOREIGN</value>
            </item>
        </items>
        <format>^(NORWEGIAN|FOREIGN)$</format>
    </element>
    <element java-property="applicant.grossMonthlyIncome">
        <label>Månedsinntekt før skatt </label>
        <description>Oppgi din månedsinntekt før skatt.</description>
        <name>applicant-monthly-income-gross</name>
        <is-mandatory>true</is-mandatory>
        <type>integer</type>
        <min-value>0</min-value>
        <max-value>9999999</max-value>
        <unit>money</unit>
        <format-message>Oppgi gyldig verdi (0 - 9999999 kr).</format-message>
    </element>
    <element java-property="applicant.netMonthlyIncome">
        <label>Månedsinntekt etter skatt</label>
        <description>Oppgi din månedsinntekt etter skatt.</description>
        <name>applicant-monthly-income-net</name>
        <is-mandatory>true</is-mandatory>
        <type>integer</type>
        <min-value>0</min-value>
        <max-value>9999999</max-value>
        <unit>money</unit>
        <format-message>Oppgi gyldig verdi (0 - 9999999 kr).</format-message>
    </element>
    <element java-property="applicant.otherMonthlyIncome">
        <label>Annen månedsinntekt</label>
        <description>Oppgi ekstra månedsinntekt som barnebidrag, leieinntekter etc</description>
        <name>applicant-monthly-income-other</name>
        <is-mandatory>false</is-mandatory>
        <type>integer</type>
        <min-value>0</min-value>
        <max-value>9999999</max-value>
        <unit>money</unit>
        <format-message>Oppgi gyldig verdi (0 - 9999999 kr).</format-message>
    </element>
    <element java-property="applicant.monthlyRentalCost">
        <label>Husleie/Fellesutgifter pr måned</label>
        <description>Oppgi dine totale månedlige husleie/fellesutgifter per måned.</description>
        <name>applicant-monthly-rental-cost</name>
        <is-mandatory>false</is-mandatory>
        <type>integer</type>
        <min-value>0</min-value>
        <max-value>9999999</max-value>
        <format-message></format-message>
    </element>
    <element java-property="applicant.mortgageDebt">
        <label>Bolig/hyttelån lånesaldo</label>
        <description>Husholdningens samlede lån</description>
        <name>applicant-mortgage-debt</name>
        <is-mandatory>true</is-mandatory>
        <type>integer</type>
        <min-value>0</min-value>
        <max-value>99999999</max-value>
        <unit>nok</unit>
        <format-message>Oppgi gyldig verdi (0 - 99999999 kr).</format-message>
    </element>
    <element java-property="applicant.mortgageMonthlyCost">
        <label>Bolig/hyttelån – månedskostnad (din andel)</label>
        <description>Fyll ut hvor mye du betaler på boliglån hver måned (kun din andel dersom du deler med noen andre).</description>
        <name>applicant-mortgage-monthly-cost</name>
        <is-mandatory>false</is-mandatory>
        <default>0</default>
        <type>integer</type>
        <min-value>0</min-value>
        <max-value>99999999</max-value>
        <unit>money</unit>
        <length>8</length>
        <format-message>Oppgi gyldig verdi (0 - 99999999 kr).</format-message>
    </element>
    <element java-property="consolidatedLoansTenor">
        <label>Nedbetalingstid på lån du skal refinansiere</label>
        <description>Om flere lån, gjennomsnittlig ant år legges inn</description>
        <name>consolidated-loans-tenor</name>
        <is-mandatory>false</is-mandatory>
        <min-value>0</min-value>
        <max-value>9999999</max-value>
        <type>integer</type>
    </element>
    <element java-property="applicant.mortgageDebtCeiling">
        <label>Kredittramme bolig/hyttelån</label>
        <description>Sett inn den avtalte øvre lånegrensen for din kredittramme</description>
        <name>applicant-mortgage-debt-ceiling</name>
        <is-mandatory>false</is-mandatory>
        <type>integer</type>
        <min-value>0</min-value>
        <max-value>49999999</max-value>
        <format-message>Oppgi gyldig verdi (0 - 49.999.999 kr).</format-message>
    </element>
    <element java-property="applicant.creditCardDebtCeiling">
        <label>Kredittramme forbrukslån og kredittkort</label>
        <description>Sett inn den avtalte øvre kredittgrensen for kredittkort/forbrukslån</description>
        <name>applicant-credit-card-debt-ceiling</name>
        <is-mandatory>false</is-mandatory>
        <type>integer</type>
        <min-value>0</min-value>
        <max-value>4999999</max-value>
        <format-message>Oppgi gyldig verdi (0 - 4.999.999 kr).</format-message>
    </element>
    <element java-property="applicant.carLoanSum">
        <label>Bil/MC/båtlån lånesaldo</label>
        <description>Husholdningens samlede lån</description>
        <name>applicant-car-loan-sum</name>
        <is-mandatory>true</is-mandatory>
        <type>integer</type>
        <min-value>0</min-value>
        <max-value>9999999</max-value>
        <unit>nok</unit>
        <format-message>Oppgi gyldig verdi (0 - 9999999 kr).</format-message>
    </element>
    <element java-property="applicant.carLoanMonthlyCost">
        <label>Bil/MC/Båt – månedskostnad (din andel)</label>
        <description>Fyll ut hvor mye du betaler på lån med pant I bil eller andre kjøretøy hver måned (kun din andel dersom du deler med noen andre).</description>
        <name>applicant-car-loan-monthly-cost</name>
        <is-mandatory>false</is-mandatory>
        <default>0</default>
        <type>integer</type>
        <min-value>0</min-value>
        <max-value>9999999</max-value>
        <unit>money</unit>
        <length>7</length>
        <format-message>Oppgi gyldig verdi (0 - 9999999 kr).</format-message>
    </element>
    <element java-property="applicant.studentLoanSum">
        <label>Studielån lånesaldo</label>
        <description>Søker sin(e) samlede studielån</description>
        <name>applicant-student-loan-sum</name>
        <is-mandatory>true</is-mandatory>
        <type>integer</type>
        <min-value>0</min-value>
        <max-value>9999999</max-value>
        <unit>nok</unit>
        <format-message>Oppgi gyldig verdi (0 - 9999999 kr).</format-message>
    </element>
    <element java-property="applicant.studentLoanMonthlyCost ">
        <label>Studielån – månedskostnad</label>
        <description>Fyll ut hvor mye du betaler på studielånet hver måned.</description>
        <name>applicant-student-loan-monthly-cost</name>
        <is-mandatory>false</is-mandatory>
        <default>0</default>
        <type>integer</type>
        <min-value>0</min-value>
        <max-value>9999999</max-value>
        <unit>money</unit>
        <length>7</length>
        <format-message>Oppgi gyldig verdi (0 - 9999999 kr).</format-message>
    </element>
    <element java-property="applicant.creditCardSum">
        <label>Kredittkortgjeld/forbrusklån lånesaldo</label>
        <description>Søker sin(e) samlede kredittkort-/forbrukslån gjeld</description>
        <name>applicant-credit-card-sum</name>
        <is-mandatory>true</is-mandatory>
        <type>integer</type>
        <min-value>0</min-value>
        <max-value>9999999</max-value>
        <unit>nok</unit>
        <format-message>Oppgi gyldig verdi (0 - 9999999 kr).</format-message>
    </element>
    <element java-property="applicant.creditCardMonthlyCost">
        <label>Kredittkortgjeld/forbrukslån – månedskostnad</label>
        <description>Fyll ut hvor mye du betaler hver måned på din kredittkortgjeld og dine forbrukslån.</description>
        <name>applicant-credit-card-monthly-cost</name>
        <is-mandatory>false</is-mandatory>
        <default>0</default>
        <type>integer</type>
        <min-value>0</min-value>
        <max-value>9999999</max-value>
        <unit>money</unit>
        <length>7</length>
        <format-message>Oppgi gyldig verdi (0 - 9999999 kr).</format-message>
    </element>
    <element java-property="applicant.monthlyDebtRepayment">
        <label>Totale månedskostnader alle lån</label>
        <description></description>
        <name>applicant-monthly-debt-repayment</name>
        <is-mandatory>true</is-mandatory>
        <type>integer</type>
        <min-value>0</min-value>
        <max-value>9999999</max-value>
        <unit>nok</unit>
        <format-message>Oppgi gyldig verdi (0 - 9999999 kr).</format-message>
    </element>
    <element java-property="applicant.creditRemarks">
        <name>applicant-credit-remarks</name>
        <label>Har du gjeld hos inkassoselskap?</label>
        <type>radio</type>
        <is-mandatory>false</is-mandatory>
        <items>
            <item>
                <label>Ja</label>
                <value>true</value>
            </item>
            <item>
                <label>Nei</label>
                <value>false</value>
            </item>
        </items>
        <format>^(?:true|false)$</format>
    </element>
    <element java-property="payoutAccountNo">
        <label></label>
        <name>payout-account-number</name>
        <is-mandatory>false</is-mandatory>
        <type>string</type>
        <length>11</length>
        <format>^[\\d]{11}$</format>
        <format-message>Oppgi gyldig verdi - 11 siffer uten tegn.</format-message>
    </element>
    <element java-property="isFinancingOtherLoan">
        <label>Vil du refinansiere/samle gjeld?</label>
        <description></description>
        <name>finance-other-loans</name>
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
    <element java-property="balanceOfConsolidatedLoans">
        <label>Hvor mye vil du refinansiere?</label>
        <description></description>
        <name>finance-other-loans-balance-of-loans</name>
        <is-mandatory>false</is-mandatory>
        <type>integer</type>
        <min-value>0</min-value>
        <max-value>999999</max-value>
        <unit>€</unit>
        <format-message>Oppgi gyldig verdi (0 - 999999 kr).</format-message>
    </element>
    <element>
        <type>group</type>
        <label>Betalingsforsikring</label>
        <description>Forsikringen skal gi deg og din familie trygghet om du skulle bli utsatt for langtidssykemelding,
            ufrivillig arbeidsledighet/permittering, sykehusinnleggelse eller dødsfall på grunn av ulykke. Premien er
            0,67% av din aktuelle lånesaldo. Forsikringen dekker din månedskostnad på lånet inntil 12 måneder. Ved
            dødsfall som følge av en ulykke betaler forsikringen gjelden på tidspunktet for dødsfallet (opptil
            50 000 kr).</description>
    </element>
    <element java-property="isInsured">
        <label>Ja takk! Jeg vil tegne betalingsforsikring. Send meg mer informasjon og søknad.</label>
        <description></description>
        <name>insurance</name>
        <type>confirmation</type>
        <is-mandatory>false</is-mandatory>
        <items>
            <item>
                <label></label>
                <value>true</value>
            </item>
        </items>
        <format>^(true|)$</format>
    </element>
    <element java-property="campaignCode">
        <label>Kampanjekode</label>
        <description></description>
        <name>campaign-code</name>
        <is-mandatory>false</is-mandatory>
        <type>string</type>
        <length>10</length>
        <format>^([A-ZÅÄÖÜ\\-\\.\\S\\d a-zåäöü]{2,5})?$</format>
        <format-message></format-message>
    </element>
    <element java-property="termsAgreedTo">
        <label>
            Ved å inngå avtale med Resurs Bank inngår du i Resurskonsernets kunderegister. Hovedformålet med vår behandling av personopplysninger er å samle inn, kontrollere og registrere de opplysningene som kreves før avtaleinngåelse samt dokumentere, administrere og gjennomføre avtalen. Personopplysninger kan også benyttes for markedsføringsformål. Når behandling skjer for markedsføringsformål kan også profilering forekomme for å rette tilpassede tilbud til deg hvorved du kan tilbys alternativt produkt eller kontaktes av en av Resurs Banks samarbeidspartnere. Fullstendig informasjon om vår behandling av personopplysninger finner du i våre vilkår for behandling av personopplysninger.
            Jeg er innforstått med at jeg gjennom å kontakte Resurs Bank kan reservere meg mot direkte markedsføring. Undertegnede låntaker(e) erkjenner med dette å skylde banken det lånebeløp som er angitt ovenfor. Beløpet med tillegg av renter og omkostninger, beregnet på grunnlag av de satser som til enhver tid gjelder i låneperioden, tilbakebetales i samsvar med betingelsene ovenfor og de alminnelige vilkår. Jeg forsikrer at oppgitte opplysninger er riktige og fullstendige og tillater at søknaden kredittprøves og at arbeidsgiver kan komme til å kontaktes. Jeg forsikrer videre at jeg før jeg søkte har mottatt og lest Standardiserte europeiske opplysninger om forbrukerkreditt (SEF-skjema) og Resurs Banks alminnelige vilkår for privat konto- og kortkreditt samt forbrukslån for Norge, hvilke bestemmelser herved vedtas. Avtalen, som består av dette dokumentet og ovenstående dokumenter, er tilgjengelig på «Mine Sider» på www.resursbank.no. Inndrivelse kan skje uten søksmål, jf. tvangsfullbyrdelsesloven § 7-2 bokstav a eller g, som også omfatter renter og utenrettslige inndrivingskostnader.
        </label>
        <name>approve-conditions</name>
        <is-mandatory>true</is-mandatory>
        <type>confirmation</type>
        <items>
            <item>
                <label></label>
                <value>true</value>
            </item>
        </items>
        <format>^(true)$</format>
        <format-message>Dette feltet er obligatorisk.</format-message>
    </element>
    <element java-property="applicant.consentEmailMarketing">
        <name>applicant-consent-email-marketing</name>
        <label>Jeg ønsker fremtidige tilbud fra Resurs Bank på e-post.</label>
        <type>checkbox</type>
        <is-mandatory>false</is-mandatory>
        <items>
            <item>
                <label></label>
                <value>true</value>
            </item>
        </items>
        <format>^(true|)$</format>
    </element>
    <element>
        <type>group</type>
        <label>Välj signeringsmetod</label>
    </element>
    <element java-property="agreementSignType">
        <label>Signeringsmetode</label>
        <description></description>
        <name>agreement-sign-type</name>
        <type>radio</type>
        <is-mandatory>true</is-mandatory>
        <items>
            <item>
                <label>Elektronisk signering</label>
                <value>E_SIGN</value>
            </item>
            <item>
                <label>Post</label>
                <value>MAIL</value>
            </item>
        </items>
        <format>^(MAIL|E_SIGN)$</format>
        <format-message>Vennligst velg signeringsmetode.</format-message>
    </element>
    <!-- ***** Avslutning -->
    <element>
        <label>Send søknad</label>
        <imagesrc/>
        <name>send-application</name>
        <type>submit</type>
    </element>
</resurs-form>
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
