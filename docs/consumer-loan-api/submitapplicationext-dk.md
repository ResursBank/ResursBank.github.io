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

<resurs-form
        title="Privatlån Danmark (Agent)"
        java-class="com.resurs.multiupplys.data.locale.dk.pp.DKConsumerLoanApplication"
        locale="DK"
        resource-path="../">


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


    <element>
        <type>subtitle</type>
        <name>loan-block</name>
        <label>Lån</label>
    </element>

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

    <element>
        <type>subtitle</type>
        <name>personal-block</name>
        <label></label>
    </element>

    <element>
        <type>group</type>
        <name>loan-purpose-group</name>
        <label>Formål med lånet</label>
    </element>

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

    <element>
        <type>group</type>
        <name>personal-contact-group</name>
        <label>Personlige oplysninger</label>
    </element>

    <!-- ***** Huvudsökande - Personalia -->
    <element java-property="applicant.governmentId">
        <label>CPR-nummer</label>
        <name>applicant-government-id</name>
        <is-mandatory>true</is-mandatory>
        <type>string</type>
        <length>10</length>
        <format>^((3[0-1])|([1-2][0-9])|(0[1-9]))((1[0-2])|(0[1-9]))(\\d{2})([\\d]{4})$</format>
    </element>

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
            <item>
                <label>P</label>
                <value>P</value>
            </item>
            <item>
                <label>R</label>
                <value>R</value>
            </item>
            <item>
                <label>Z</label>
                <value>Z</value>
            </item>
        </items>
        <format>^([A-H]|[J-L]|P|R|Z)$</format>
        <format-message>Venligst vælg et alternativ</format-message>
    </element>

    <element java-property="applicant.validityDateOfTheResidentPermit">
        <label>Hvornår udløber din opholdstilladelse? </label>
        <description>Angiv hvornår din opholdstilladelse udløber</description>
        <name>applicant-resident-permit-valid-date</name>
        <is-mandatory>false</is-mandatory>
        <type>string</type>
        <length>4</length>
        <format>^(0[1-9]|1[012])([0-9]{2})$</format>
    </element>

    <element java-property="applicant.ancestralHomeland">
        <label>I hvilket land er du født </label>
        <description>Vælg venligst</description>
        <name>applicant-ancestral-homeland</name>
        <is-mandatory>true</is-mandatory>
        <type>list</type>
        <items>
            <item> <value></value> <label>Vælg venligst</label> </item>
            <item> <value>DK</value> <label>Danmark</label> </item>
            <item> <value>FI</value> <label>Finland</label> </item>
            <item> <value>IS</value> <label>Island</label> </item>
            <item> <value>NO</value> <label>Norge</label> </item>
            <item> <value>SE</value> <label>Sverige</label> </item>
            <item> <value>AL</value> <label>Albanien</label> </item>
            <item> <value>AD</value> <label>Andorra</label> </item>
            <item> <value>BE</value> <label>Belgien</label> </item>
            <item> <value>BA</value> <label>Bosnien-Hercegovina</label> </item>
            <item> <value>BG</value> <label>Bulgarien</label> </item>
            <item> <value>CY</value> <label>Cypern</label> </item>
            <item> <value>EE</value> <label>Estland</label> </item>
            <item> <value>FR</value> <label>Frankrig</label> </item>
            <item> <value>FO</value> <label>Færøerne</label> </item>
            <item> <value>GI</value> <label>Gibraltar</label> </item>
            <item> <value>GR</value> <label>Grækenland</label> </item>
            <item> <value>GG</value> <label>Guernsey</label> </item>
            <item> <value>NL</value> <label>Holland</label> </item>
            <item> <value>BY</value> <label>Hviderusland</label> </item>
            <item> <value>IE</value> <label>Irland</label> </item>
            <item> <value>IM</value> <label>Isle of Man</label> </item>
            <item> <value>IT</value> <label>Italien</label> </item>
            <item> <value>JE</value> <label>Jersey</label> </item>
            <item> <value>XK</value> <label>Kosovo</label> </item>
            <item> <value>HR</value> <label>Kroatien</label> </item>
            <item> <value>LV</value> <label>Letland</label> </item>
            <item> <value>LI</value> <label>Liechtenstein</label> </item>
            <item> <value>LT</value> <label>Litauen</label> </item>
            <item> <value>LU</value> <label>Luxembourg</label> </item>
            <item> <value>MT</value> <label>Malta</label> </item>
            <item> <value>MC</value> <label>Monaco</label> </item>
            <item> <value>ME</value> <label>Montenegro</label> </item>
            <item> <value>PL</value> <label>Polen</label> </item>
            <item> <value>PT</value> <label>Portugal</label> </item>
            <item> <value>MK</value> <label>Republikken Makedonien</label> </item>
            <item> <value>MD</value> <label>Republikken Moldova</label> </item>
            <item> <value>RO</value> <label>Rumænien</label> </item>
            <item> <value>RU</value> <label>Rusland</label> </item>
            <item> <value>SM</value> <label>San Marino</label> </item>
            <item> <value>CH</value> <label>Schweiz</label> </item>
            <item> <value>RS</value> <label>Serbien</label> </item>
            <item> <value>CS</value> <label>Serbien og Montenegro</label> </item>
            <item> <value>SK</value> <label>Slovakiet</label> </item>
            <item> <value>SI</value> <label>Slovenien</label> </item>
            <item> <value>ES</value> <label>Spanien</label> </item>
            <item> <value>GB</value> <label>Storbritannien</label> </item>
            <item> <value>SJ</value> <label>Svalbard og Jan Mayen</label> </item>
            <item> <value>CZ</value> <label>Tjekkiet</label> </item>
            <item> <value>DE</value> <label>Tyskland</label> </item>
            <item> <value>UA</value> <label>Ukraine</label> </item>
            <item> <value>HU</value> <label>Ungarn</label> </item>
            <item> <value>VA</value> <label>Vatikanstaten</label> </item>
            <item> <value>AX</value> <label>Åland</label> </item>
            <item> <value>AT</value> <label>Østrig</label> </item>

            <item> <value>DZ</value> <label>Algeriet</label> </item>
            <item> <value>AO</value> <label>Angola</label> </item>
            <item> <value>BJ</value> <label>Benin</label> </item>
            <item> <value>BW</value> <label>Botswana</label> </item>
            <item> <value>BF</value> <label>Burkina Faso</label> </item>
            <item> <value>BI</value> <label>Burundi</label> </item>
            <item> <value>CM</value> <label>Cameroun</label> </item>
            <item> <value>CF</value> <label>Centralafrikanske Republik</label> </item>
            <item> <value>KM</value> <label>Comorerne</label> </item>
            <item> <value>CG</value> <label>Congo</label> </item>
            <item> <value>CD</value> <label>Congo-Kinshasa</label> </item>
            <item> <value>DJ</value> <label>Djibouti</label> </item>
            <item> <value>EG</value> <label>Egypten</label> </item>
            <item> <value>CI</value> <label>Elfenbenskysten</label> </item>
            <item> <value>ER</value> <label>Eritrea</label> </item>
            <item> <value>ET</value> <label>Etiopien</label> </item>
            <item> <value>GA</value> <label>Gabon</label> </item>
            <item> <value>GM</value> <label>Gambia</label> </item>
            <item> <value>GH</value> <label>Ghana</label> </item>
            <item> <value>GN</value> <label>Guinea</label> </item>
            <item> <value>GW</value> <label>Guinea-Bissau</label> </item>
            <item> <value>CV</value> <label>Kap Verde</label> </item>
            <item> <value>KE</value> <label>Kenya</label> </item>
            <item> <value>LS</value> <label>Lesotho</label> </item>
            <item> <value>LR</value> <label>Liberia</label> </item>
            <item> <value>LY</value> <label>Libyen</label> </item>
            <item> <value>MG</value> <label>Madagaskar</label> </item>
            <item> <value>MW</value> <label>Malawi</label> </item>
            <item> <value>ML</value> <label>Mali</label> </item>
            <item> <value>MA</value> <label>Marokko</label> </item>
            <item> <value>MR</value> <label>Mauretanien</label> </item>
            <item> <value>MU</value> <label>Mauritius</label> </item>
            <item> <value>YT</value> <label>Mayotte</label> </item>
            <item> <value>MZ</value> <label>Mozambique</label> </item>
            <item> <value>NA</value> <label>Namibia</label> </item>
            <item> <value>NE</value> <label>Niger</label> </item>
            <item> <value>NG</value> <label>Nigeria</label> </item>
            <item> <value>RE</value> <label>Reunion</label> </item>
            <item> <value>RW</value> <label>Rwanda</label> </item>
            <item> <value>ST</value> <label>Sao Tome og Principe</label> </item>
            <item> <value>SN</value> <label>Senegal</label> </item>
            <item> <value>SC</value> <label>Seychellerne</label> </item>
            <item> <value>SL</value> <label>Sierra Leone</label> </item>
            <item> <value>SO</value> <label>Somalia</label> </item>
            <item> <value>SH</value> <label>St. Helena</label> </item>
            <item> <value>SD</value> <label>Sudan</label> </item>
            <item> <value>SZ</value> <label>Swaziland</label> </item>
            <item> <value>ZA</value> <label>Sydafrika</label> </item>
            <item> <value>TZ</value> <label>Tanzania</label> </item>
            <item> <value>TD</value> <label>Tchad</label> </item>
            <item> <value>TG</value> <label>Togo</label> </item>
            <item> <value>TN</value> <label>Tunesien</label> </item>
            <item> <value>UG</value> <label>Uganda</label> </item>
            <item> <value>EH</value> <label>Vestsahara</label> </item>
            <item> <value>ZM</value> <label>Zambia</label> </item>
            <item> <value>ZW</value> <label>Zimbabwe</label> </item>
            <item> <value>GQ</value> <label>Ækvatorialguinea</label> </item>

            <item> <value>AI</value> <label>Anguilla</label> </item>
            <item> <value>AG</value> <label>Antigua og Barbuda</label> </item>
            <item> <value>AR</value> <label>Argentina</label> </item>
            <item> <value>AW</value> <label>Aruba</label> </item>
            <item> <value>BS</value> <label>Bahamas</label> </item>
            <item> <value>BB</value> <label>Barbados</label> </item>
            <item> <value>BZ</value> <label>Belize</label> </item>
            <item> <value>BM</value> <label>Bermuda</label> </item>
            <item> <value>BO</value> <label>Bolivia</label> </item>
            <item> <value>BR</value> <label>Brasilien</label> </item>
            <item> <value>CA</value> <label>Canada</label> </item>
            <item> <value>KY</value> <label>Caymanøerne</label> </item>
            <item> <value>CL</value> <label>Chile</label> </item>
            <item> <value>CO</value> <label>Colombia</label> </item>
            <item> <value>CR</value> <label>Costa Rica</label> </item>
            <item> <value>CU</value> <label>Cuba</label> </item>
            <item> <value>VI</value> <label>De amerikanske jomfruøer</label> </item>
            <item> <value>VG</value> <label>De britiske jomfruøer</label> </item>
            <item> <value>DO</value> <label>Den Dominikanske Republik</label> </item>
            <item> <value>DM</value> <label>Dominica</label> </item>
            <item> <value>EC</value> <label>Ecuador</label> </item>
            <item> <value>SV</value> <label>El Salvador</label> </item>
            <item> <value>FK</value> <label>Falklandsøerne</label> </item>
            <item> <value>GF</value> <label>Fransk Guyana</label> </item>
            <item> <value>GD</value> <label>Grenada</label> </item>
            <item> <value>GL</value> <label>Grønland</label> </item>
            <item> <value>GP</value> <label>Guadeloupe</label> </item>
            <item> <value>GT</value> <label>Guatemala</label> </item>
            <item> <value>GY</value> <label>Guyana</label> </item>
            <item> <value>HT</value> <label>Haiti</label> </item>
            <item> <value>AN</value> <label>Hollandske Antiller</label> </item>
            <item> <value>HN</value> <label>Honduras</label> </item>
            <item> <value>JM</value> <label>Jamaica</label> </item>
            <item> <value>MQ</value> <label>Martinique</label> </item>
            <item> <value>MX</value> <label>Mexico</label> </item>
            <item> <value>MS</value> <label>Montserrat</label> </item>
            <item> <value>NI</value> <label>Nicaragua</label> </item>
            <item> <value>PA</value> <label>Panama</label> </item>
            <item> <value>PY</value> <label>Paraguay</label> </item>
            <item> <value>PE</value> <label>Peru</label> </item>
            <item> <value>PR</value> <label>Puerto Rico</label> </item>
            <item> <value>BL</value> <label>Saint Barthélemy</label> </item>
            <item> <value>KN</value> <label>Saint Kitts og Nevis</label> </item>
            <item> <value>LC</value> <label>Saint Lucia</label> </item>
            <item> <value>MF</value> <label>Saint Martin</label> </item>
            <item> <value>PM</value> <label>Saint Pierre og Miquelon</label> </item>
            <item> <value>VC</value> <label>St. Vincent og Grenadinerne</label> </item>
            <item> <value>SR</value> <label>Surinam</label> </item>
            <item> <value>TT</value> <label>Trinidad og Tobago</label> </item>
            <item> <value>TC</value> <label>Turks- og Caicosøerne</label> </item>
            <item> <value>US</value> <label>USA</label> </item>
            <item> <value>UY</value> <label>Uruguay</label> </item>
            <item> <value>VE</value> <label>Venezuela</label> </item>

            <item> <value>AF</value> <label>Afghanistan</label> </item>
            <item> <value>AM</value> <label>Armenien</label> </item>
            <item> <value>AZ</value> <label>Aserbajdsjan</label> </item>
            <item> <value>BH</value> <label>Bahrain</label> </item>
            <item> <value>BD</value> <label>Bangladesh</label> </item>
            <item> <value>BT</value> <label>Bhutan</label> </item>
            <item> <value>BN</value> <label>Brunei Darussalam</label> </item>
            <item> <value>KH</value> <label>Cambodja</label> </item>
            <item> <value>CY</value> <label>Cypern</label> </item>
            <item> <value>PS</value> <label>De palæstinensiske områder</label> </item>
            <item> <value>PH</value> <label>Filippinerne</label> </item>
            <item> <value>AE</value> <label>Forenede Arabiske Emirater</label> </item>
            <item> <value>GE</value> <label>Georgien</label> </item>
            <item> <value>IN</value> <label>Indien</label> </item>
            <item> <value>ID</value> <label>Indonesien</label> </item>
            <item> <value>IQ</value> <label>Irak</label> </item>
            <item> <value>IR</value> <label>Iran</label> </item>
            <item> <value>IL</value> <label>Israel</label> </item>
            <item> <value>JP</value> <label>Japan</label> </item>
            <item> <value>JO</value> <label>Jordan</label> </item>
            <item> <value>KZ</value> <label>Kasakhstan</label> </item>
            <item> <value>CN</value> <label>Kina</label> </item>
            <item> <value>KG</value> <label>Kirgisistan</label> </item>
            <item> <value>KW</value> <label>Kuwait</label> </item>
            <item> <value>LA</value> <label>Laos</label> </item>
            <item> <value>LB</value> <label>Libanon</label> </item>
            <item> <value>MY</value> <label>Malaysia</label> </item>
            <item> <value>MV</value> <label>Maldiverne</label> </item>
            <item> <value>MN</value> <label>Mongoliet</label> </item>
            <item> <value>MM</value> <label>Myanmar</label> </item>
            <item> <value>NP</value> <label>Nepal</label> </item>
            <item> <value>KP</value> <label>Nordkorea</label> </item>
            <item> <value>OM</value> <label>Oman</label> </item>
            <item> <value>PK</value> <label>Pakistan</label> </item>
            <item> <value>QA</value> <label>Qatar</label> </item>
            <item> <value>HK</value> <label>SAR Hongkong</label> </item>
            <item> <value>MO</value> <label>SAR Macao</label> </item>
            <item> <value>SA</value> <label>Saudi-Arabien</label> </item>
            <item> <value>SG</value> <label>Singapore</label> </item>
            <item> <value>LK</value> <label>Sri Lanka</label> </item>
            <item> <value>KR</value> <label>Sydkorea</label> </item>
            <item> <value>SY</value> <label>Syrien</label> </item>
            <item> <value>TJ</value> <label>Tadsjikistan</label> </item>
            <item> <value>TW</value> <label>Taiwan</label> </item>
            <item> <value>TH</value> <label>Thailand</label> </item>
            <item> <value>TL</value> <label>Timor-Leste</label> </item>
            <item> <value>TM</value> <label>Turkmenistan</label> </item>
            <item> <value>TR</value> <label>Tyrkiet</label> </item>
            <item> <value>UZ</value> <label>Usbekistan</label> </item>
            <item> <value>VN</value> <label>Vietnam</label> </item>
            <item> <value>YE</value> <label>Yemen</label> </item>

            <item> <value>AS</value> <label>Amerikansk Samoa</label> </item>
            <item> <value>AQ</value> <label>Antarktis</label> </item>
            <item> <value>AU</value> <label>Australien</label> </item>
            <item> <value>BV</value> <label>Bouvetø</label> </item>
            <item> <value>CC</value> <label>Cocosøerne</label> </item>
            <item> <value>CK</value> <label>Cook-øerne</label> </item>
            <item> <value>UM</value> <label>De Mindre Amerikanske Oversøiske Øer</label> </item>
            <item> <value>IO</value> <label>Det Britiske Territorium i Det Indiske Ocean</label> </item>
            <item> <value>FJ</value> <label>Fiji-øerne</label> </item>
            <item> <value>PF</value> <label>Fransk Polynesien</label> </item>
            <item> <value>TF</value> <label>Franske Besiddelser i Det Sydlige Indiske Ocean</label> </item>
            <item> <value>GU</value> <label>Guam</label> </item>
            <item> <value>HM</value> <label>Heard- og McDonald-øerne</label> </item>
            <item> <value>CX</value> <label>Juleøen</label> </item>
            <item> <value>KI</value> <label>Kiribati</label> </item>
            <item> <value>MH</value> <label>Marshalløerne</label> </item>
            <item> <value>FM</value> <label>Mikronesiens Forenede Stater</label> </item>
            <item> <value>NR</value> <label>Nauru</label> </item>
            <item> <value>NZ</value> <label>New Zealand</label> </item>
            <item> <value>NU</value> <label>Niue</label> </item>
            <item> <value>MP</value> <label>Nordmarianerne</label> </item>
            <item> <value>NF</value> <label>Norfolk Island</label> </item>
            <item> <value>NC</value> <label>Ny Caledonien</label> </item>
            <item> <value>PW</value> <label>Palau</label> </item>
            <item> <value>PG</value> <label>Papua Ny Guinea</label> </item>
            <item> <value>PN</value> <label>Pitcairn</label> </item>
            <item> <value>SB</value> <label>Salomonøerne</label> </item>
            <item> <value>WS</value> <label>Samoa</label> </item>
            <item> <value>GS</value> <label>South Georgia og De Sydlige Sandwichøer</label> </item>
            <item> <value>TK</value> <label>Tokelau</label> </item>
            <item> <value>TO</value> <label>Tonga</label> </item>
            <item> <value>TV</value> <label>Tuvalu</label> </item>
            <item> <value>VU</value> <label>Vanuatu</label> </item>
            <item> <value>WF</value> <label>Wallis og Futunaøerne</label> </item>
        </items>
        <format>^.{2,50}$</format>
        <format-message>Venligst vælg et alternativ</format-message>
    </element>

    <!-- ***** Huvudsökande - Civilstånd -->
    <element>
        <type>group</type>
        <name>applicant-living-group</name>
        <label></label>
    </element>

    <element java-property="applicant.maritalStatus">
        <label>Civilstand</label>
        <name>applicant-marital-status</name>
        <type>radio</type>
        <is-mandatory>true</is-mandatory>
        <items>
            <item>
                <label>Alene</label>
                <value>SINGLE</value>
            </item>
            <item>
                <label>Gift</label>
                <value>MARRIED</value>
            </item>
            <item>
                <label>Samlevende</label>
                <value>COHABITING</value>
            </item>
            <item>
                <label>Skilt</label>
                <value>DIVORCED</value>
            </item>
            <item>
                <label>Separeret</label>
                <value>SEPERATED</value>
            </item>
            <item>
                <label>Enke/enkemand</label>
                <value>WIDOW</value>
            </item>
        </items>
        <format>^(MARRIED|COHABITING|SINGLE|DIVORCED|SEPERATED|WIDOW)$</format>
        <format-message>Venligst vælg et alternativ</format-message>
    </element>

    <element>
        <label>Antal hjemmeboende børn</label>
        <type>group</type>
        <name>group-children</name>
    </element>

    <element java-property="applicant.numberOfChildrenInAgeGroup1">
        <label>Børn mellem 0-1 år</label>
        <name>applicant-number-of-children-in-age-group1</name>
        <type>integer</type>
        <min-value>0</min-value>
        <max-value>10</max-value>
    </element>

    <element java-property="applicant.numberOfChildrenInAgeGroup2">
        <label>Børn mellem 2-6 år</label>
        <name>applicant-number-of-children-in-age-group2</name>
        <type>integer</type>
        <min-value>0</min-value>
        <max-value>10</max-value>
    </element>

    <element java-property="applicant.numberOfChildrenInAgeGroup3">
        <label>Børn mellem 7-17 år</label>
        <name>applicant-number-of-children-in-age-group3</name>
        <type>integer</type>
        <min-value>0</min-value>
        <max-value>10</max-value>
    </element>

    <element java-property="applicant.numberOfChildrenInAgeGroup4">
        <label>Børn 18 år eller ældre </label>
        <name>applicant-number-of-children-in-age-group4</name>
        <type>integer</type>
        <min-value>0</min-value>
        <max-value>10</max-value>
    </element>

    <element java-property="applicant.accomodationType">
        <label>Nuværende boligform</label>
        <name>applicant-habitation-form</name>
        <is-mandatory>true</is-mandatory>
        <type>radio</type>
        <default></default>
        <items>
            <item>
                <label>Eget hus</label>
                <value>OWN_PROPERTY</value>
            </item>
            <item>
                <label>Ejerlejlighed</label>
                <value>CONDOMINIUM</value>
            </item>
            <item>
                <label>Lejebolig</label>
                <value>RENTAL</value>
            </item>
            <item>
                <label>Andelsbolig</label>
                <value>HOUSING_COOPERATIVE</value>
            </item>
            <item>
                <label>Hjemmeboende</label>
                <value>WITH_PARENTS</value>
            </item>
            <item>
                <label>Lejet værelse/kollegie</label>
                <value>ROOMER</value>
            </item>
            <item>
                <label>Anden</label>
                <value>OTHER</value>
            </item>
        </items>
        <format>^(OWN_PROPERTY|CONDOMINIUM|RENTAL|HOUSING_COOPERATIVE|WITH_PARENTS|ROOMER|OTHER)$</format>
        <format-message>Venligst vælg et alternativ</format-message>
    </element>

    <element java-property="applicant.shareOfExpenses">
        <label>Hvor stor en del af husstandens samlede udgifter betaler du (%)?</label>
        <name>applicant-share-of-expenses</name>
        <is-mandatory>true</is-mandatory>
        <type>integer</type>
        <min-value>0</min-value>
        <max-value>100</max-value>
        <format-message>Du kan maksimalt betale 100% af husstandens udgifter. Hvis du deler udgifterne med din partner skal du fx skrive 50.</format-message>
    </element>

    <element>
        <type>subtitle</type>
        <name>financial-block</name>
        <label></label>
    </element>

    <!-- ***** Huvudsökande - Arbete -->
    <element>
        <type>group</type>
        <name>applicant-employment-group</name>
        <label>Ansættelse</label>
    </element>

    <element java-property="applicant.employmentType">
        <label>Status på arbejdsmarkedet</label>
        <description>Vælg ansættelsesforhold</description>
        <name>applicant-employment-type</name>
        <is-mandatory>true</is-mandatory>
        <type>list</type>
        <items>
            <item>
                <label>Vælg venligst</label>
                <value></value>
            </item>
            <item>
                <label>Funktionær/Lønmodtager</label>
                <value>WHITE_COLLAR_WORKER</value>
            </item>
            <item>
                <label>Timelønnet</label>
                <value>PAID_BY_HOUR</value>
            </item>
            <item>
                <label>Førtidspensionist</label>
                <value>PRE_PENSIONER</value>
            </item>
            <item>
                <label>Pensionist</label>
                <value>PENSIONAR</value>
            </item>
            <item>
                <label>Hjemmegående</label>
                <value>STAYING_AT_HOME</value>
            </item>
            <item>
                <label>Studerende</label>
                <value>STUDENT</value>
            </item>
            <item>
                <label>Elev/Lærling</label>
                <value>TRAINEE</value>
            </item>
            <item>
                <label>Direktør</label>
                <value>MANAGER</value>
            </item>
            <item>
                <label>Selvstændig</label>
                <value>EGEN_FORETAGARE</value>
            </item>
            <item>
                <label>Midlertidigt job</label>
                <value>VIKARIAT</value>
            </item>
            <item>
                <label>Ledig</label>
                <value>ARBETSLOS</value>
            </item>
            <item>
                <label>Anden ansættelse</label>
                <value>OTHER</value>
            </item>
        </items>
        <format>^(WHITE_COLLAR_WORKER|PAID_BY_HOUR|PRE_PENSIONER|EGEN_FORETAGARE|STUDENT|MANAGER|ARBETSLOS|PENSIONAR|STAYING_AT_HOME|TRAINEE|VIKARIAT|OTHER)$</format>
        <format-message>Venligst vælg et alternativ</format-message>
    </element>

    <element java-property="applicant.employedSince">
        <label>Ansat/selvstændig siden</label>
        <description>Ansat i nuværende job siden</description>
        <name>applicant-employment-year-from</name>
        <is-mandatory>true</is-mandatory>
        <type>string</type>
        <length>4</length>
        <format>^(0[1-9]|1[012])([0-9]{2})$</format>
        <format-message>Angiv hvornår du begyndte dit nuværende job</format-message>
    </element>

    <element>
        <type>group</type>
        <name>financial-situation-group</name>
        <label>Din personlige økonomi</label>
    </element>

    <element java-property="applicant.grossMonthlyIncome">
        <label>Indkomst før skat pr. måned</label>
        <description>Indkomst før skat pr. måned skal angives</description>
        <name>applicant-monthly-income-gross</name>
        <is-mandatory>true</is-mandatory>
        <type>integer</type>
        <length>6</length>
        <min-value>0</min-value>
        <max-value>999999</max-value>
        <unit>money</unit>
        <format-message>Feltet kan maksimalt indeholde 6 cifre</format-message>
    </element>

    <element java-property="applicant.netMonthlyIncome">
        <label>Udbetalt pr. måned</label>
        <description>Indkomst efter skat pr. måned skal angives</description>
        <name>applicant-monthly-income-net</name>
        <is-mandatory>true</is-mandatory>
        <type>integer</type>
        <length>6</length>
        <min-value>0</min-value>
        <max-value>999999</max-value>
        <unit>money</unit>
        <format-message>Feltet kan maksimalt indeholde 6 cifre</format-message>
    </element>

    <element java-property="applicant.monthlyRentalCost">
        <label>Husleje pr. måned (kun leje eller boligafgiften)</label>
        <description>Den månedlige husleje skal angives. Har du ingen månedlig husleje indtast da et 0.</description>
        <name>applicant-monthly-rental-cost</name>
        <is-mandatory>true</is-mandatory>
        <type>integer</type>
        <length>6</length>
        <min-value>0</min-value>
        <max-value>999999</max-value>
        <unit>money</unit>
        <format-message>Feltet kan maksimalt indeholde 6 cifre</format-message>
    </element>

    <element java-property="householdLivingExpenses">
        <label>Betalinger til realkredit eller boliglån pr. måned</label>
        <description>Den samlede betaling til realkredit og boliglån pr. måned skal angives. Har du ingen betalinger hertil indtast da et 0.</description>
        <name>household-living-expenses</name>
        <is-mandatory>true</is-mandatory>
        <type>integer</type>
        <length>6</length>
        <min-value>0</min-value>
        <max-value>999999</max-value>
        <unit>money</unit>
        <format-message>Feltet kan maksimalt indeholde 6 cifre</format-message>
    </element>

    <element java-property="householdLoanExpenses">
        <label>Betalinger til andre forbrugslån eller kreditter pr. måned</label>
        <description>Betalinger til forbrugslån pr. måned skal angives. Har du ingen indtast da et 0.</description>
        <name>household-other-loan-expenses</name>
        <is-mandatory>true</is-mandatory>
        <type>integer</type>
        <length>6</length>
        <min-value>0</min-value>
        <max-value>999999</max-value>
        <unit>money</unit>
        <format-message>Feltet kan maksimalt indeholde 6 cifre</format-message>
    </element>

    <element>
        <type>group</type>
        <name>credit-cards-group</name>
        <label>Hvilke købe- og kreditkort har du</label>
    </element>

    <element java-property="applicant.dankort">
        <label>Dankort eller Visa/Dankort</label>
        <description>Dankort/Visa Dankort</description>
        <name>applicant-dankort</name>
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

    <element java-property="applicant.debitCardMasterCard">
        <label>MasterCard debit</label>
        <description>MasterCard debit</description>
        <name>debit-cards-master-card</name>
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

    <element java-property="applicant.creditCardMasterCard">
        <label>MasterCard</label>
        <description>MasterCard</description>
        <name>credit-cards-master-card</name>
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

    <element java-property="applicant.creditCardVisa">
        <label>VISA</label>
        <description>VISA</description>
        <name>credit-cards-visa</name>
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

    <element java-property="applicant.creditCardDinersClub">
        <label>Diners Club</label>
        <description>Diners Club</description>
        <name>credit-cards-diners-club</name>
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


    <element java-property="applicant.petrolCard">
        <label>Benzinkort</label>
        <description>Benzinkort</description>
        <name>credit-cards-petrol</name>
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

    <element>
        <type>group</type>
        <name>other-loans-group</name>
        <label>Ønsker du at samle lån/kreditter?</label>
    </element>

    <element java-property="financeOtherLoansAmount">
        <label>Angiv hvilket beløb du ønsker at samle</label>
        <name>finance-other-loans-balance-of-loans</name>
        <description>Angiv det totale beløb for de lån/kreditter, som du ønsker at samle i et nyt lån</description>
        <is-mandatory>false</is-mandatory>
        <type>integer</type>
        <min-value>0</min-value>
        <max-value>300000</max-value>
        <unit>money</unit>
        <format-message>Indtast venligst en værdi i tal (0 - 300.000)</format-message>
    </element>

    <element java-property="monthlyCostOfConsolidatedLoans">
        <label>Tilbagebetaling af de sammenlagte lån per måned</label>
        <description>Indtast den samlede månedlige betaling på lån/kreditter, som skal indfries</description>
        <name>finance-other-loans-monthly-cost-of-loans</name>
        <is-mandatory>false</is-mandatory>
        <type>integer</type>
        <min-value>0</min-value>
        <max-value>99999</max-value>
        <unit>money</unit>
        <format-message>De månedlige tilbagebetalinger af lån, der skal samles, skal være fra 0 - 99.999</format-message>
    </element>

    <element>
        <type>group</type>
        <name>payout-account-group</name>
        <label>Betaling</label>
        <description>Tilmeld din konto til Betalingsservice.
            Din månedlige betaling til lånet skal betales via Betalingsservice</description>
    </element>

    <element java-property="payoutClearingNo">
        <label>Reg. nr.</label>
        <description>Reg. nr. skal udfyldes</description>
        <name>payout-clearing-number</name>
        <is-mandatory>true</is-mandatory>
        <type>string</type>
        <length>4</length>
        <format>^[\\d]{3,4}$</format>
        <format-message>Feltet skal indeholde 3 eller 4 tal</format-message>
    </element>

    <element java-property="payoutAccountNo">
        <label>Kontonr.</label>
        <description>Kontonr. skal udfyldes</description>
        <name>payout-account-number</name>
        <is-mandatory>true</is-mandatory>
        <type>string</type>
        <length>10</length>
        <format>^[\\d]{5,10}$</format>
        <format-message>Feltet skal indeholde 10 tal</format-message>
    </element>

    <!-- ***** Medsökande - Personalia -->
    <element>
        <label>Medansøger</label>
        <name>coapplicant-block</name>
        <type>subtitle</type>
    </element>

    <element java-property="coApplicant.creditStatusConsent">
        <label>Samtykke til kredit status</label>
        <name>coapplicant-credit-status-consent</name>
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

    <!-- ***** Medsökande - Personalia -->
    <element java-property="coApplicant.governmentId">
        <label>CPR-nummer</label>
        <name>coapplicant-government-id</name>
        <is-mandatory>false</is-mandatory>
        <type>string</type>
        <length>10</length>
        <format>^((3[0-1])|([1-2][0-9])|(0[1-9]))((1[0-2])|(0[1-9]))(\\d{2})([\\d]{4})$</format>
    </element>

    <element java-property="coApplicant.mobilePhoneNumber">
        <label>Mobilnummer</label>
        <description>Indtast venligst dit mobilnummer</description>
        <name>coapplicant-mobile-number</name>
        <is-mandatory>false</is-mandatory>
        <depends-on>coapplicant-government-id</depends-on>
        <type>string</type>
        <length>15</length>
        <format>^(\\+45|0045|)?[ |-]?[2-9]([ |-]?[0-9]){7,7}$</format>
        <format-message>Venligst kontrollere dit mobilnummer</format-message>
    </element>

    <element java-property="coApplicant.emailAddress">
        <label>E-mail adresse</label>
        <description>Indtast venligst din e-mail adresse</description>
        <name>coapplicant-email-address</name>
        <is-mandatory>false</is-mandatory>
        <depends-on>coapplicant-government-id</depends-on>
        <type>string</type>
        <length>50</length>
        <format>^[A-Za-z0-9!#%&amp;'*+/=?^_`~-]+(\\.[A-Za-z0-9!#%&amp;'*+/=?^_`~-]+)*@([A-Za-z0-9]+)(([\\.\\-]?[a-zA-Z0-9]+)*)\\.([A-Za-z]{2,})$</format>
        <format-message>Venligst kontrollere din e-mail adresse</format-message>
    </element>

    <element java-property="coApplicant.employmentType">
        <label>Status på arbejdsmarkedet</label>
        <description>Vælg ansættelsesforhold</description>
        <name>coapplicant-employment-type</name>
        <is-mandatory>false</is-mandatory>
        <depends-on>coapplicant-government-id</depends-on>
        <type>list</type>
        <items>
            <item>
                <label>Vælg venligst</label>
                <value></value>
            </item>
            <item>
                <label>Funktionær/Lønmodtager</label>
                <value>WHITE_COLLAR_WORKER</value>
            </item>
            <item>
                <label>Timelønnet</label>
                <value>PAID_BY_HOUR</value>
            </item>
            <item>
                <label>Førtidspensionist</label>
                <value>PRE_PENSIONER</value>
            </item>
            <item>
                <label>Pensionist</label>
                <value>PENSIONAR</value>
            </item>
            <item>
                <label>Hjemmegående</label>
                <value>STAYING_AT_HOME</value>
            </item>
            <item>
                <label>Studerende</label>
                <value>STUDENT</value>
            </item>
            <item>
                <label>Elev/Lærling</label>
                <value>TRAINEE</value>
            </item>
            <item>
                <label>Direktør</label>
                <value>MANAGER</value>
            </item>
            <item>
                <label>Selvstændig</label>
                <value>EGEN_FORETAGARE</value>
            </item>
            <item>
                <label>Midlertidigt job</label>
                <value>VIKARIAT</value>
            </item>
            <item>
                <label>Ledig</label>
                <value>ARBETSLOS</value>
            </item>
            <item>
                <label>Anden ansættelse</label>
                <value>OTHER</value>
            </item>
        </items>
        <format>^(WHITE_COLLAR_WORKER|PAID_BY_HOUR|PRE_PENSIONER|EGEN_FORETAGARE|MANAGER|STUDENT|ARBETSLOS|PENSIONAR|STAYING_AT_HOME|TRAINEE|VIKARIAT|OTHER)$</format>
        <format-message>Venligst vælg et alternativ</format-message>
    </element>

    <element java-property="coApplicant.grossMonthlyIncome">
        <label>Indkomst før skat pr. måned</label>
        <description>Indkomst før skat pr. måned skal angives</description>
        <name>coapplicant-monthly-income-gross</name>
        <is-mandatory>false</is-mandatory>
        <depends-on>coapplicant-government-id</depends-on>
        <type>integer</type>
        <length>6</length>
        <min-value>0</min-value>
        <max-value>999999</max-value>
        <unit>money</unit>
        <format-message>Feltet kan maksimalt indeholde 6 cifre</format-message>
    </element>

    <element java-property="coApplicant.netMonthlyIncome">
        <label>Udbetalt pr. måned</label>
        <description>Indkomst efter skat pr. måned skal angives.</description>
        <name>coapplicant-monthly-income-net</name>
        <is-mandatory>false</is-mandatory>
        <depends-on>coapplicant-government-id</depends-on>
        <type>integer</type>
        <length>6</length>
        <min-value>0</min-value>
        <max-value>999999</max-value>
        <unit>money</unit>
        <format-message>Feltet kan maksimalt indeholde 6 cifre</format-message>
    </element>

    <element>
        <type>subtitle</type>
        <name>summary-block</name>
        <label>Oversigt</label>
        <description>Kontroller at dine oplysninger er korrekte inden du sender låneansøgningen. Hvis du har behov for at ændre noget, kan du gøre det her.</description>
    </element>


    <!-- editable? previous blocks … -->
    <element>
        <type>group</type>
        <label>Godkend betingelser</label>
    </element>
    <element java-property="termsAgreedTo">
        <label>Jeg accepterer Resurs Banks generelle vilkår</label>
        <description>
            Resurs Bank (RB) tilbyder en specialkontoordning med fordelagtige gebyrer og renter, når betaling sker i henhold til specialkontoplaner,
            se vedlagte Standardiserede Europæiske Forbrugerkreditoplysninger (SEF).
            Sker betalingen ikke i henhold til den valgte afdragsordning, gælder RB's alm. rente- og gebyrbestemmelser (Basiskonto).
            Renter tilskrives kontoen fra den dag, hvor et køb foretages.

            Jeg er myndig og erklærer på tro og love at ovenstående oplysninger er korrekte, at den oplyste adresse er min faste bopæl i Danmark,
            at der må indhentes kreditoplysninger i et kreditoplysningsbureau, samt oplysninger fra CPR-registret,
            og at disse oplysninger må blive registreret hos RB, samt at jeg skriftligt og på "MineSider" på resursbank.dk har modtaget,
            læst og godkendt gældende SEF med særlige kontovilkår, "Almindelige kontobetingelser For Private Aftaler Om Kontokredit Samt Privatlån for Danmark", samt kreditaftalen fra RB.

            Kopi af aftalen, SEF og kontobetingelser er tilgængelige på MineSider på resursbank.dk.

            Ved indgåelse af en aftale med RB indgår jeg i RBs kunderegister. Mine personlige oplysninger kan benyttes og distribueres til brug for markedsføring.
            Jeg kan frabede mig dette ved meddelelse herom til forretningen og/eller RB Kundeservice.
        </description>
        <name>approve-conditions</name>
        <is-mandatory>true</is-mandatory>
        <type>confirmation</type>
        <items>
            <item>
                <label>
                    Ja
                </label>
                <value>true</value>
            </item>
        </items>
        <format-message>Venligst godkend betingelser</format-message>
        <format>^(true)$</format>
    </element>


    <!-- ***** sign type -->
    <element java-property="agreementSignType">
        <label>Signeringsmetod</label>
        <name>agreement-sign-type</name>
        <type>checkbox</type>
        <is-mandatory>true</is-mandatory>
        <items>
            <item>
                <label>E-signering</label>
                <value>E_SIGN</value>
            </item>
        </items>
        <format>^(E_SIGN)$</format>
    </element>

</resurs-form>


```

