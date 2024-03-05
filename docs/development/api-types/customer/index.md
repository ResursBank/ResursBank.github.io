---
layout: page
title: Customer
permalink: /development/api-types/customer/
parent: Api Types
grand_parent: Development
---



# customer 
Created by Benny, last modified by Patric Johnsson on 2022-07-06
Details about a (potential) customer, be it natural or legal.  
Contains elements as defined in the following table.
  
| Component    | Type                                               | Occurs | Nillable? | Description                                                                                                                                    |
|--------------|----------------------------------------------------|--------|-----------|------------------------------------------------------------------------------------------------------------------------------------------------|
| governmentId | **[nonEmptyString](Simple-Types..._1475653.html)** | 0..1   | No        | Identifies a customer uniquely within the country.• SE: Personnummer/Organisationsnummer• DK: CPR-number• NO: Fødselsnummer• FI: Henkilötunnus |
| address      | **[address](address_1475687.html)**                | 1..1   | No        | The customer address. It's only used for fraud control. billingAddress will always be the customers registered address.                        |
| cellPhone    | string                                             | 0..1   | No        | The customer's cell phone number is specified here. Mandatory if Swish is to be used as payment method                                         |
| email        | **[nonEmptyString](Simple-Types..._1475653.html)** | 0..1   | No        | The customer email address.                                                                                                                    |
| type         | **[customerType](customerType_1475683.html)**      | 1..1   | No        | The customer type.                                                                                                                             |
  
``` syntaxhighlighter-pre
 <customer>
    <governmentId>7312195873</governmentId>
    <address>
        <fullName>Asgeirsen Asgeir</fullName>
        <firstName>Asgeir</firstName>
        <lastName>Asgeirsen</lastName>
        <addressRow1/>
        <postalArea>Inøja</postalArea>
        <postalCode>1234</postalCode>
        <country>SE</country>
    </address>
    <phone/>
    <email>javatest@resurs.se</email>
    <type>NATURAL</type>
</customer>
```
  
  
  
