---
layout: page
title: Submitapplicationext Fi
permalink: /consumer-loan-api/submitapplicationext-fi/
parent: Consumer Loan Api
---


# submitApplicationExt FI 

## Finland FI
### Request: submitApplicationExt
```xml
<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:app="http://consumerloan.resurs.com/v1/msg/application">
  <soapenv:Header/>
  <soapenv:Body>
     <app:submitApplicationExt>
        <xml><![CDATA[<resurs-response>
   <amount>10000</amount>
   <time>120</time>
   <applicant-government-id>020189-074E</applicant-government-id>
   <applicant-mobile-number>+3585005555127</applicant-mobile-number>
   <applicant-email-address>test@resurs.se</applicant-email-address>
   <purpose-of-loan>HOUSING_MORTGAGE_LOAN</purpose-of-loan>
   <applicant-marital-status>MARRIED</applicant-marital-status>
   <applicant-habitation-form>DETACHED_HOUSE</applicant-habitation-form>
   <applicant-habitation-year>2010</applicant-habitation-year>
   <applicant-employment-type>FAST_ANSTALLD</applicant-employment-type>
   <applicant-monthly-income-gross>3200</applicant-monthly-income-gross>
   <household-monthly-income>6400</household-monthly-income>
   <household-living-expenses>300</household-living-expenses>
   <household-mortgage-debt>10000</household-mortgage-debt>
   <household-other-loan-expenses>200</household-other-loan-expenses>
   <other-expenses>400</other-expenses>
   <household-mortgage-total-amount>10000</household-mortgage-total-amount>
   <household-mortgage-monthly-cost>200</household-mortgage-monthly-cost>
   <insurance>false</insurance>
   <confirm-legal-documents>true</confirm-legal-documents>
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
### Validation for Finland
```xml
<?xml version="1.0" encoding="UTF-8"?>
<resurs-form>
    <!-- ***** Lånebelopp -->
    <element java-property="amount">
        <label>Lainasumma</label>
        <description>Täytä toivomasi luottoraja (€)</description>
        <name>amount</name>
        <is-mandatory>true</is-mandatory>
        <type>integer</type>
        <min-value>100</min-value>
        <max-value>40000</max-value>
        <format-message>Kenttään on täytettävä haettava summa!</format-message>
        <unit>money</unit>
    </element>
    <element java-property="paymentTerms">
        <label>Takaisinmaksuaika</label>
        <description>Toivottu takaisinmaksuaika.</description>
        <name>time</name>
        <type>radio</type>
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
        </items>
        <format>^(12|24|36|48|60|72|84|96|108|120|132|144)$</format>
    </element>
    <!-- ***** Huvudsökande - Personalia -->
    <element java-property="applicant.governmentId">
        <label>Henkilötunnus</label>
        <description>Täytä henkilötunnus muodossa PPKKVVYXXXX</description>
        <name>applicant-government-id</name>
        <is-mandatory>true</is-mandatory>
        <type>string</type>
        <length>11</length>
        <format>^([\\d]{6})[\\+\\-A]([\\d]{3})([0123456789ABCDEFHJKLMNPRSTUVWXY])$</format>
        <format-message>Kenttään on täytettävä henkilötunnus muodossa PPKKVV-XXXX tai PPKKVVAXXXX!</format-message>
    </element>
    <element java-property="applicant.mobilePhoneNumber">
        <label>Matkapuhelin</label>
        <description>Varmista, että matkapuhelinnumerosi on oikein.</description>
        <name>applicant-mobile-number</name>
        <is-mandatory>true</is-mandatory>
        <type>string</type>
        <length>16</length>
        <format>^((\\+358|00358|0)[-| ]?(1[1-9]|[2-9]|[1][0][1-9]|201|2021|[2][0][2][4-9]|[2][0][3-8]|29|[3][0][1-9]|71|73|[7][5][0][0][3-9]|[7][5][3][0][3-9]|[7][5][3][2][3-9]|[7][5][7][5][3-9]|[7][5][9][8][3-9]|[5][0][0-9]{0,2}|[4][0-9]{1,3})([-| ]?[0-9]){3,10})$</format>
        <format-message>Tarkista puhelinnumerosi.</format-message>
    </element>
    <element java-property="applicant.emailAddress">
        <label>Sähköpostiosoite</label>
        <description>Varmista, että sähköpostiosoitteesi on oikein.</description>
        <name>applicant-email-address</name>
        <is-mandatory>true</is-mandatory>
        <type>string</type>
        <length>50</length>
        <format>^[A-Za-z0-9!#%&'*+/=?^_`~-]+(\\.[A-Za-z0-9!#%&'*+/=?^_`~-]+)*@([A-Za-z0-9]+)(([\\.\\-]?[a-zA-Z0-9]+)*)\\.([A-Za-z]{2,})$</format>
        <format-message>Tarkista sähköpostiosoitteesi.</format-message>
    </element>
    <element java-property="loanPurpose">
        <label>Lainan käyttötarkoitus</label>
        <description>Lainan käyttötarkoitus</description>
        <name>purpose-of-loan</name>
        <type>radio</type>
        <is-mandatory>true</is-mandatory>
        <items>
            <item>
                <label>Auto / Moottoripyörä</label>
                <value>MOTOR</value>
            </item>
            <item>
                <label>Häät</label>
                <value>WEDDING</value>
            </item>
            <item>
                <label>Vene</label>
                <value>BOAT</value>
            </item>
            <item>
                <label>Asunto-omaisuuden hankkiminen</label>
                <value>HOUSING_MORTGAGE_LOAN</value>
            </item>
            <item>
                <label>Sijoittaminen (esim. osakkeet)</label>
                <value>INVESTMENT</value>
            </item>
            <item>
                <label>Ajokortti</label>
                <value>DRIVERS_LICENSE</value>
            </item>
            <item>
                <label>Sisustus (esim. huonekalut, kodin elektroniikka)</label>
                <value>INTERIOR</value>
            </item>
            <item>
                <label>Remontointi, kunnostaminen</label>
                <value>RENOVATION</value>
            </item>
            <item>
                <label>Matkailu, vapaa-aika</label>
                <value>TRAVEL</value>
            </item>
            <item>
                <label>Lainojen ja/tai luottojen yhdistäminen</label>
                <value>CONSOLIDATE_LOANS</value>
            </item>
            <item>
                <label>Terveyden- tai hampaidenhoito</label>
                <value>DENTAL_OR_OTHER_CARE</value>
            </item>
            <item>
                <label>Opiskelu</label>
                <value>STUDIES</value>
            </item>
            <item>
                <label>Muu kulutus</label>
                <value>OTHER</value>
            </item>
        </items>
        <format>^(MOTOR|WEDDING|BOAT|HOUSING_MORTGAGE_LOAN|INVESTMENT|DRIVERS_LICENSE|INTERIOR|RENOVATION|TRAVEL|CONSOLIDATE_LOANS|DENTAL_OR_OTHER_CARE|STUDIES|OTHER)$</format>
    </element>
    <element java-property="applicant.maritalStatus">
        <label>Siviilisääty</label>
        <description>Valitse siviilisääty valikon vaihtoehdoista</description>
        <name>applicant-marital-status</name>
        <type>radio</type>
        <default></default>
        <is-mandatory>true</is-mandatory>
        <items>
            <item>
                <label>Avioliitto / Rekisteröity parisuhde</label>
                <value>MARRIED</value>
            </item>
            <item>
                <label>Naimaton</label>
                <value>SINGLE</value>
            </item>
            <item>
                <label>Avoliitto</label>
                <value>DOMESTIC_PARTNER</value>
            </item>
            <item>
                <label>Eronnut</label>
                <value>DIVORCED</value>
            </item>
            <item>
                <label>Leski</label>
                <value>WIDOW</value>
            </item>
        </items>
        <format>^(MARRIED|DOMESTIC_PARTNER|SINGLE|DIVORCED|WIDOW)$</format>
    </element>
    <element java-property="applicant.habitationType">
        <label>Asumismuoto</label>
        <description>Valitse asumismuoto valikon vaihtoehdoista</description>
        <name>applicant-habitation-form</name>
        <is-mandatory>true</is-mandatory>
        <type>radio</type>
        <default></default>
        <items>
            <item>
                <label>Omistusasunto</label>
                <value>DETACHED_HOUSE</value>
            </item>
            <item>
                <label>Vuokra-asunto</label>
                <value>APARTMENT</value>
            </item>
            <item>
                <label>Asumisoikeusasunto</label>
                <value>CONDOMINIUM</value>
            </item>
            <item>
                <label>Osaomistusasunto</label>
                <value>CONDOMINIUM_PARTLY_OWNED</value>
            </item>
            <item>
                <label>Alivuokralainen</label>
                <value>BY_PARENTS</value>
            </item>
            <item>
                <label>Työsuhdeasunto</label>
                <value>OFFICIAL_RESIDENCE</value>
            </item>
            <item>
                <label>Muu</label>
                <value>OTHER</value>
            </item>
        </items>
        <format>^(DETACHED_HOUSE|APARTMENT|CONDOMINIUM|CONDOMINIUM_PARTLY_OWNED|BY_PARENTS|OFFICIAL_RESIDENCE|OTHER)$</format>
    </element>
    <element java-property="applicant.habitationDate">
        <label>Asunut nykyisessä osoitteessa alkaen</label>
        <description>Valitse muuttovuosi- ja kuukausi.</description>
        <name>applicant-habitation-year</name>
        <is-mandatory>true</is-mandatory>
        <type>string</type>
        <length>4</length>
        <format>^([0-9]{2})(0[1-9]|1[012])$</format>
        <format-message>Pakollinen kenttä</format-message>
    </element>
    <element>
        <name>coapplicant-toggle</name>
        <type>checkbox</type>
        <label>Haen lainaa toisen henkilön kanssa</label>
        <is-mandatory>false</is-mandatory>
        <items>
            <item>
                <label></label>
                <value>true</value>
            </item>
        </items>
        <format>^(true|)$</format>
    </element>
    <element java-property="coApplicant.governmentId">
        <label>Henkilötunnus</label>
        <description>Täytä henkilötunnus muodossa PPKKVVYXXXX tai PPKKVVAXXXX.</description>
        <name>coapplicant-government-id</name>
        <is-mandatory>false</is-mandatory>
        <type>string</type>
        <length>11</length>
        <format>^([\\d]{6})[\\+\\-A]([\\d]{3})([0123456789ABCDEFHJKLMNPRSTUVWXY])$</format>
        <format-message>Kenttään on täytettävä henkilötunnus muodossa PPKKVV-XXXX tai PPKKVVAXXXX!</format-message>
    </element>
    <element java-property="coApplicant.mobilePhoneNumber">
        <label>Matkapuhelin</label>
        <description>Varmista, että matkapuhelinnumerosi on oikein.</description>
        <name>coapplicant-mobile-number</name>
        <is-mandatory>false</is-mandatory>
        <depends-on>coapplicant-government-id</depends-on>
        <type>string</type>
        <length>16</length>
        <format>^((\\+358|00358|0)[-| ]?(1[1-9]|[2-9]|[1][0][1-9]|201|2021|[2][0][2][4-9]|[2][0][3-8]|29|[3][0][1-9]|71|73|[7][5][0][0][3-9]|[7][5][3][0][3-9]|[7][5][3][2][3-9]|[7][5][7][5][3-9]|[7][5][9][8][3-9]|[5][0][0-9]{0,2}|[4][0-9]{1,3})([-| ]?[0-9]){3,10})$</format>
        <format-message>Tarkista puhelinnumerosi.</format-message>
    </element>
    <element java-property="coApplicant.emailAddress">
        <label>Sähköposti</label>
        <description>Varmista, että sähköpostiosoitteesi on oikein.</description>
        <name>coapplicant-email-address</name>
        <is-mandatory>false</is-mandatory>
        <depends-on>coapplicant-government-id</depends-on>
        <type>string</type>
        <length>50</length>
        <format>^([A-Za-z0-9!#%&'*+/=?^_`~-]+(\\.[A-Za-z0-9!#%&'*+/=?^_`~-]+)*@([A-Za-z0-9]+)(([\\.\\-]?[a-zA-Z0-9]+)*)\\.([A-Za-z]{2,}))?$</format>
        <format-message>Tarkista sähköpostiosoitteesi.</format-message>
    </element>
<element java-property="coApplicant.lastMonthIncomeNet">
        <label>kk:n nettotulo</label>
        <description>Edeltävän kk:n nettotulo</description>
        <name>coapplicant-last-month-income-net</name>
        <is-mandatory>false</is-mandatory>
        <type>integer</type>
        <min-value>0</min-value>
        <max-value>99999</max-value>
        <unit>money</unit>
        <format-message>Tarkista kuukausitulosi (0-99 999 €).</format-message>
    </element>
    <element java-property="coApplicant.sixMonthsAverageIncomeNet">
        <label>6 kk:n nettotulo</label>
        <description>Edeltävän 6 kk:n keskimääräinen nettotulo</description>
        <name>coapplicant-six-months-average-income-net</name>
        <is-mandatory>false</is-mandatory>
        <type>integer</type>
        <min-value>0</min-value>
        <max-value>99999</max-value>
        <unit>money</unit>
        <format-message>Tarkista kuukausitulosi (0-99 999 €).</format-message>
    </element>
      <!-- ***** Huvudsökande - Arbete -->
    <element java-property="applicant.employmentType">
        <label>Hakijan työsuhteen muoto</label>
        <description>Valitse työmuoto valikon vaihtoehdoista</description>
        <name>applicant-employment-type</name>
        <is-mandatory>true</is-mandatory>
        <type>radio</type>
        <default></default>
        <items>
            <item>
                <label>Vakituinen</label>
                <value>FAST_ANSTALLD</value>
            </item>
            <item>
                <label>Määräaikainen</label>
                <value>VIKARIAT</value>
            </item>
            <item>
                <label>Osa-aikainen</label>
                <value>PART_TIME</value>
            </item>
            <item>
                <label>Eläkkeellä</label>
                <value>PENSIONAR</value>
            </item>
            <item>
                <label>Työkyvyttömyys- tai varhaiseläkkeellä</label>
                <value>SJUKPENSIONAR</value>
            </item>
            <item>
                <label>Yrittäjä</label>
                <value>EGEN_FORETAGARE</value>
            </item>
            <item>
                <label>Opiskelija</label>
                <value>STUDENT</value>
            </item>
            <item>
                <label>Työtön</label>
                <value>ARBETSLOS</value>
            </item>
            <item>
                <label>Maanviljelijä</label>
                <value>FARMER</value>
            </item>
        </items>
        <format>^(FAST_ANSTALLD|VIKARIAT|PART_TIME|PENSIONAR|SJUKPENSIONAR|EGEN_FORETAGARE|STUDENT|ARBETSLOS|FARMER)$</format>
    </element>
    <element java-property="applicant.employedSince">
        <label>Nykyinen työsuhde alkoi</label>
        <description>Valitse aloitusvuosi ja –kuukausi.</description>
        <name>applicant-employment-year-from</name>
        <is-mandatory>false</is-mandatory>
        <type>string</type>
        <length>4</length>
        <format>^([0-9]{2})(0[1-9]|1[012])$</format>
        <format-message>Pakollinen kenttä</format-message>
    </element>
    <element java-property="applicant.employedTo">
        <label>Työsuhde päättyy</label>
        <description>Valitse päättymisvuosi ja –kuukausi.</description>
        <name>applicant-employment-year-until</name>
        <is-mandatory>false</is-mandatory>
        <type>string</type>
        <length>4</length>
        <format>^([0-9]{2})(0[1-9]|1[012])$</format>
        <format-message>Pakollinen kenttä</format-message>
    </element>
    <element java-property="applicant.employerName">
        <label>Työnantaja</label>
        <description>Ilmoita työnantajasi nimi</description>
        <name>applicant-employer</name>
        <is-mandatory>false</is-mandatory>
        <type>string</type>
        <length>100</length>
        <format>^[\\s\\S]{0,100}$</format>
        <format-message>Täydennä työntantajasi nimi</format-message>
    </element>
    <element java-property="applicant.profession">
        <label>Ammatti</label>
        <description>Ilmoita ammattisi</description>
        <name>applicant-profession</name>
        <is-mandatory>false</is-mandatory>
        <type>string</type>
        <length>100</length>
        <format>^[\\s\\S]{0,100}$</format>
        <format-message>Ilmoita ammattisi</format-message>
    </element>
    <element java-property="applicant.grossMonthlyIncome">
        <label>Omat kuukausitulot brutto</label>
        <description>Omat kuukausitulot ennen veroja.</description>
        <name>applicant-monthly-income-gross</name>
        <is-mandatory>true</is-mandatory>
        <type>integer</type>
        <min-value>0</min-value>
        <max-value>99999</max-value>
        <unit>money</unit>
        <format-message>Tarkista kuukausitulosi (0-99 999 €).</format-message>
    </element>
<element java-property="applicant.lastMonthIncomeNet">
        <label>Hakijan kk:n nettotulo</label>
        <description>Edeltävän kk:n nettotulo</description>
        <name>applicant-last-month-income-net</name>
        <is-mandatory>false</is-mandatory>
        <type>integer</type>
        <min-value>0</min-value>
        <max-value>99999</max-value>
        <unit>money</unit>
        <format-message>Tarkista kuukausitulosi (0-99 999 €).</format-message>
    </element>
    <element java-property="applicant.sixMonthsAverageIncomeNet">
        <label>Hakijan 6 kk:n nettotulo</label>
        <description>Edeltävän 6 kk:n keskimääräinen nettotulo</description>
        <name>applicant-six-months-average-income-net</name>
        <is-mandatory>false</is-mandatory>
        <type>integer</type>
        <min-value>0</min-value>
        <max-value>99999</max-value>
        <unit>money</unit>
        <format-message>Tarkista kuukausitulosi (0-99 999 €).</format-message>
    </element>
    <element java-property="householdIncome">
        <label>Talouden kuukausitulot netto</label>
        <description>Talouden yhteenlasketut kuukausitulot verojen jälkeen.</description>
        <name>household-monthly-income</name>
        <is-mandatory>true</is-mandatory>
        <type>integer</type>
        <min-value>0</min-value>
        <max-value>99999</max-value>
        <unit>money</unit>
        <format-message>Tarkista talouden kuukausitulot (0-99 999 €).</format-message>
    </element>
    <element java-property="householdLivingExpenses">
        <label>Omat asumiskustannukset kuukaudessa (sis. asuntolainan)</label>
        <description>Asumiskustannuksesi sisältäen osuutesi asuntolainan lyhennyksestä, vuokrasta/vastikkeesta, sähköstä ja lämmityksestä kuukaudessa.</description>
        <name>household-living-expenses</name>
        <is-mandatory>true</is-mandatory>
        <type>integer</type>
        <min-value>0</min-value>
        <max-value>9999</max-value>
        <unit>money</unit>
        <format-message>Tarkista omat asumiskustannuksesi (0-9 999 €).</format-message>
    </element>
    <element java-property="creditCardMasterCard">
        <label>MasterCard</label>
        <description>MasterCard</description>
        <name>credit-cards-master-card</name>
        <type>checkbox</type>
        <is-mandatory>false</is-mandatory>
        <items>
            <item>
                <label>Kyllä</label>
                <value>true</value>
            </item>
        </items>
        <format>^(true|)$</format>
    </element>
    <element java-property="creditCardVisa">
        <label>VISA</label>
        <description>VISA</description>
        <name>credit-cards-visa</name>
        <type>checkbox</type>
        <is-mandatory>false</is-mandatory>
        <items>
            <item>
                <label>Kyllä</label>
                <value>true</value>
            </item>
        </items>
        <format>^(true|)$</format>
    </element>
    <element java-property="creditCardAmericanExpress">
        <label>American Express</label>
        <description>American Express</description>
        <name>credit-cards-american-express</name>
        <type>checkbox</type>
        <is-mandatory>false</is-mandatory>
        <items>
            <item>
                <label>Kyllä</label>
                <value>true</value>
            </item>
        </items>
        <format>^(true|)$</format>
    </element>
    <element java-property="creditCardDinersClub">
        <label>Diners Club</label>
        <description>Diners Club</description>
        <name>credit-cards-diners-club</name>
        <type>checkbox</type>
        <is-mandatory>false</is-mandatory>
        <items>
            <item>
                <label>Kyllä</label>
                <value>true</value>
            </item>
        </items>
        <format>^(true|)$</format>
    </element>
    <element java-property="creditCardOthers">
        <label>Muut</label>
        <description>Muut</description>
        <name>credit-cards-others</name>
        <type>checkbox</type>
        <is-mandatory>false</is-mandatory>
        <items>
            <item>
                <label>Kyllä</label>
                <value>true</value>
            </item>
        </items>
        <format>^(true|)$</format>
    </element>
    <element java-property="mortgageDebt">
        <label>Oma osuus asuntolainasta</label>
        <description>Jäljellä oleva oma osuutesi koko asuntolainasta.</description>
        <name>household-mortgage-debt</name>
        <is-mandatory>true</is-mandatory>
        <type>integer</type>
        <min-value>0</min-value>
        <max-value>999999</max-value>
        <unit>money</unit>
        <format-message>Tarkista summa (0-999 999 €).</format-message>
    </element>
    <element java-property="householdLoanExpenses">
        <label>Omat muut lainat ja luottokorttilainat yhteensä</label>
        <description>Luottokorttilainat ja muut lainat kuin asuntolaina.</description>
        <name>household-other-loan-expenses</name>
        <is-mandatory>true</is-mandatory>
        <type>integer</type>
        <min-value>0</min-value>
        <max-value>999999</max-value>
        <unit>money</unit>
        <format-message>Tarkista summa (0-999 999 €).</format-message>
    </element>
    <element java-property="otherExpenses">
        <label>Omat lainojen lyhennykset kuukaudessa (ei asuntolaina)</label>
        <description>Muiden lainojen kuin asuntolainan lyhennykset kuukaudessa yhteensä.</description>
        <name>other-expenses</name>
        <is-mandatory>true</is-mandatory>
        <type>integer</type>
        <min-value>0</min-value>
        <max-value>9999</max-value>
        <unit>money</unit>
        <format-message>Tarkista summa (0-9 999 €).</format-message>
    </element>
    <element java-property="mortgageTotalAmount">
        <label>Talouden kaikki lainat yhteensä</label>
        <description>Kanssasi samassa taloudessa asuvien kaikki lainat yhteensä.</description>
        <name>household-mortgage-total-amount</name>
        <is-mandatory>true</is-mandatory>
        <type>integer</type>
        <min-value>0</min-value>
        <max-value>999999</max-value>
        <unit>money</unit>
        <format-message>Tarkista summa (0-999 999 €).</format-message>
    </element>
    <element java-property="monthlyMortgageCost">
        <label>Talouden kaikkien lainojen lyhennykset kuukaudessa</label>
        <description>Kanssasi samassa taloudessa asuvien kaikkien lainojen lyhennykset kuukaudessa yhteensä.</description>
        <name>household-mortgage-monthly-cost</name>
        <is-mandatory>true</is-mandatory>
        <type>integer</type>
        <min-value>0</min-value>
        <max-value>9999</max-value>
        <unit>money</unit>
        <format-message>Tarkista summa (0-9 999 €).</format-message>
    </element>
    <element java-property="isFinancingOtherLoan">
        <label>Haluan yhdistää nykyisiä lainojani</label>
        <name>finance-other-loans</name>
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
    <element java-property="nbrOfLoansToConsolidate">
        <label>Yhdistettävien lainojen lukumäärä</label>
        <description>Anna lunastettavien lainojen ja luottokorttien lukumäärä</description>
        <name>finance-other-loans-nbr-of-loans</name>
        <is-mandatory>false</is-mandatory>
        <type>integer</type>
        <min-value>1</min-value>
        <max-value>20</max-value>
        <unit>kpl</unit>
        <format-message>Voit yhdistää enintään 20 lainaa</format-message>
    </element>
    <element java-property="balanceOfConsolidatedLoans">
        <label>Yhdistettävien lainojen yhteissumma</label>
        <description>Anna yhdistettävien lainojen ja luottokorttilainojen yhteissumma</description>
        <name>finance-other-loans-balance-of-loans</name>
        <is-mandatory>false</is-mandatory>
        <type>integer</type>
        <min-value>0</min-value>
        <max-value>99999</max-value>
        <unit>money</unit>
        <format-message>Voit yhdistää lainoja (0 - 99 999 €).</format-message>
    </element>
    <element java-property="monthlyCostOfConsolidatedLoans">
        <label>Yhdistettävien lainojen lyhennykset kuukaudessa</label>
        <description>Anna lunastettavien lainojen ja luottokorttien yhteenlaskettu kuukausimaksu</description>
        <name>finance-other-loans-monthly-cost-of-loans</name>
        <is-mandatory>false</is-mandatory>
        <type>integer</type>
        <min-value>0</min-value>
        <max-value>9999</max-value>
        <unit>money</unit>
        <format-message>Yhdistettävien lainojen lyhennykset kuukaudessa voivat olla 0 - 9 999 €.</format-message>
    </element>
    <element java-property="financeOtherLoansConsentToConsolidate">
        <label>Hyväksyn ja annan toimeksiannon yhdistettävien lainojeni poismaksuun</label>
        <description>Hyväksyn ja annan toimeksiannon yhdistettävien lainojeni poismaksuun</description>
        <name>finance-other-loans-consolidation-consent</name>
        <type>radio</type>
        <is-mandatory>false</is-mandatory>
        <items>
            <item>
                <label>Kyllä</label>
                <value>true</value>
            </item>
            <item>
                <label>Ei</label>
                <value>false</value>
            </item>
        </items>
        <format>^(true|false)$</format>
    </element>
    <element java-property="payoutAccountNo">
        <label>Tilinumero IBAN-muodossa</label>
        <name>payout-account-number</name>
        <is-mandatory>false</is-mandatory>
        <type>string</type>
        <length>18</length>
        <format>^[A-Z0-9]{18}$</format>
        <format-message>Tarkista tilinumerosi, sen pitäisi olla IBAN-muodossa: FI01234567890000000.</format-message>
    </element>
    <element java-property="isInsured">
        <label>Haluan liittää lainaani Maksuvakuutuksen.</label>
        <description></description>
        <name>insurance</name>
        <type>radio</type>
        <is-mandatory>true</is-mandatory>
        <items>
            <item>
                <label>Kyllä</label>
                <value>true</value>
            </item>
            <item>
                <label>Ei</label>
                <value>false</value>
            </item>
        </items>
        <format>^(true|false)$</format>
    </element>
    <element>
        <type>checkbox</type>
        <name>campaign-code-toggle</name>
        <label>Lisää kampanjakoodi</label>
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
        <label>Kampanjakoodi</label>
        <description>Jos sinulla on kampanjakoodi, täytä se tähän.</description>
        <name>campaign-code</name>
        <is-mandatory>false</is-mandatory>
        <type>string</type>
        <length>10</length>
        <format>^([A-ZÅÄÖÜ\\-\\.\\S\\d a-zåäöü]{2,10})?$</format>
        <format-message>Ystävällisesti tarkistakaa että kamppanjakoodi on oikein.</format-message>
    </element>
    <element java-property="confirmRegisterConsent">
        <name>confirm-register-concent</name>
        <label>Hyväksyn tietojeni käsittelyn</label>
        <description>Annan/Annamme toimeksiannon Resurs Bankille kerätä ja käsitellä muilta luotonantajilta
            saatavia tietoja luotoistani luottohakemuksen käsittelyä varten. Annan suostumukseni
            siihen, että luotonantajat luovuttavat minua koskevia tietoja luotoistani.
            Näitä tietoja Resurs Bank kysyy Suomen Asiakastieto Oy:n ylläpitämän
            kyselyjärjestelmän avulla järjestelmään osallistuvilta yrityksiltä.</description>
        <type>checkbox</type>
        <is-mandatory>false</is-mandatory>
        <items>
            <item>
                <label>Annan/Annamme toimeksiannon Resurs Bankille kerätä ja käsitellä muilta luotonantajilta
                    saatavia tietoja luotoistani luottohakemuksen käsittelyä varten. Annan suostumukseni
                    siihen, että luotonantajat luovuttavat minua koskevia tietoja luotoistani.
                    Näitä tietoja Resurs Bank kysyy Suomen Asiakastieto Oy:n ylläpitämän
                    kyselyjärjestelmän avulla järjestelmään osallistuvilta yrityksiltä.</label>
                <value>true</value>
            </item>
        </items>
        <format>^(true|)$</format>
    </element>
    <element java-property="confirmLegalDocuments">
        <name>confirm-legal-documents</name>
        <label>Vahvistan tietoni ja hyväksyn ehdot</label>
        <description>Vakuutan, että antamani tiedot ovat oikeat. Olen tutustunut Vakiomuotoiset
            eurooppalaiset kuluttajaluottotiedot -lomakkeeseen (VEK) sekä Resurs Bankin
            yksityisiä tili- ja korttiluottoja sekä yksityislainoja koskeviin yleisiin
            ehtoihin, ja hyväksyn ne.</description>
        <type>checkbox</type>
        <is-mandatory>true</is-mandatory>
        <items>
            <item>
                <label>Vakuutan, että antamani tiedot ovat oikeat. Olen tutustunut Vakiomuotoiset
                    eurooppalaiset kuluttajaluottotiedot -lomakkeeseen (VEK) sekä Resurs Bankin
                    yksityisiä tili- ja korttiluottoja sekä yksityislainoja koskeviin yleisiin
                    ehtoihin, ja hyväksyn ne.</label>
                <value>true</value>
            </item>
        </items>
        <format-message>Sinun on hyväksyttävä ehdot edetä.</format-message>
        <format>^(true)$</format>
    </element>
    <element java-property="termsAgreedTo">
        <label>Annan suostumukseni henkilötietojeni käsittelyyn</label>
        <description>
            Tehdessäsi sopimuksen Resurs Bankin kanssa sinut rekisteröidään Resurskonsernin asiakasrekisteriin. Pääasialliset henkilötietojen käyttötarkoituksemme ovat sopimuksen tekemisen edellyttämien tietojen kerääminen, tarkastaminen ja rekisteröinti sekä tekemäsi sopimuksen dokumentointi, hallinnointi ja toimeenpano. Henkilötietoja voidaan käsitellä myös markkinoinnissa. Kun henkilötietoja käsitellään markkinointitarkoituksessa, voidaan suorittaa myös profilointia sinulle soveltuvien tuote-ehdotusten tekemiseksi, jolloin sinulle voidaan tarjota vaihtoehtoisia tuotteitamme tai voit saada yhteydenoton Resurs Bankin yhteistyökumppaneilta, mihin annan suostumukseni. Kattavat tiedot henkilötietojemme käsittelystä ja sinun oikeuksistasi saat henkilötietojen käsittelyä koskevista sopimusehdoistamme. Ymmärrän, että voin kieltää suoramarkkinoinnin ilmoittamalla asiasta Resurs Bankille.
            Vakuutan, että annetut tiedot ovat oikein ja täydellisiä ja annan suostumukseni hakemukseni luottoharkintaa varten. Luotonantaja pitää itsellään vapaan harkintaoikeuden. Vakuutan lisäksi, että olen saanut tiedon ja tutustunut asiakirjoihin Vakiomuotoiset eurooppalaiset kuluttajaluottotiedot voimassaolevine erikoismaksuehtoineen sekä Resurs Bankin yksityisiä tili- ja korttiluottoja sekä yksityislainoja koskeviin yleisiin ehtoihin, mitkä sopimusehdot täten hyväksyn. Nämä asiakirjat ja asiakaskohtainen sopimus tallennetaan ja ovat saatavilla Omat Sivut – palvelussa www.resursbank.fi
        </description>
        <name>approve-conditions</name>
        <is-mandatory>true</is-mandatory>
        <type>confirmation</type>
        <items>
            <item>
                <label>Allekirjoittaessasi sopimuksen Resurs Bankin kanssa tallennetaan henkilötietosi
                    asiakasrekisteriin. Samalla annat suostumuksesi siihen, että luottohakemusta
                    käsitellessä saadaan käyttää henkilötietojasi. Henkilötietojasi voidaan käyttää
                    ja luovuttaa suoramarkkinointitarkoituksiin. Sinulla on oikeus kieltää
                    henkilötietojesi käsittely suoramarkkinointitarkoituksiin ilmoittamalla siitä
                    Resurs Bankin asiakaspalveluun. Siinä tapauksessa, että hakemuksesi hylätään,
                    Resurs Bankin yhteistyökumppani voi tarjota sinulle vastaavanlaista tuotetta.</label>
                <value>true</value>
            </item>
        </items>
        <format-message>Sinun on hyväksyttävä ehdot edetä.</format-message>
        <format>^(true)$</format>
    </element>
    <element java-property="consentEmailMarketing">
        <name>consent-email-marketing</name>
        <label></label>
        <description>Annan suostumukseni siihen, että Resurs Bank
            voi lähettää minulle tarjouksia sähköpostitse.</description>
        <type>checkbox</type>
        <is-mandatory>false</is-mandatory>
        <items>
            <item>
                <label>Annan suostumukseni siihen, että Resurs Bank
                    voi lähettää minulle tarjouksia sähköpostitse.</label>
                <value>true</value>
            </item>
        </items>
        <format>^(true|)$</format>
    </element>
    <element java-property="agreementSignType">
        <label>Valitse allekirjoitustapa</label>
        <description>Valitse allekirjoitustapa</description>
        <name>agreement-sign-type</name>
        <type>radio</type>
        <is-mandatory>true</is-mandatory>
        <items>
            <item>
                <label>Pankkitunnuksilla</label>
                <value>E_SIGN</value>
            </item>
            <item>
                <label>Postitse</label>
                <value>MAIL</value>
            </item>
        </items>
        <format>^(MAIL|E_SIGN)$</format>
    </element>
    <!-- ***** mediaCode -->
    <element java-property="mediaCode">
        <type>hidden</type>
        <name>mediacode</name>
        <is-mandatory>false</is-mandatory>
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
                <approvedAmount>10000</approvedAmount>
                <interest>22.30</interest>
                <tenor>72</tenor>
                <effectiveInterest>25.31</effectiveInterest>
                <monthlyCost>259.00</monthlyCost>
                <consolidationDemand>1000.0</consolidationDemand>
                <adminFee>2.00</adminFee>
                <arrangementFee>39.00</arrangementFee>
                <documentTypes>ID</documentTypes>
                <documentTypes>PAYMENT_SLIP</documentTypes>
                <totalRepaymentAmount>18700.00</totalRepaymentAmount>
                <monthlyAccountFee>0</monthlyAccountFee>
                <totalFeesAndInterest>8700.00</totalFeesAndInterest>
                <topUpAmount>9000.0</topUpAmount>
                <monthlyCostTopUp>169.0</monthlyCostTopUp>
                </submitApplicationExtResult>
        </ns2:submitApplicationExtResponse>
    </soap:Body>
</soap:Envelope>  
```
