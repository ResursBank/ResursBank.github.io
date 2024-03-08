---
layout: page
title: Extendedcustomer
permalink: /development/api-types/customer/extendedcustomer/
parent: Api Types
grand_parent: Development
---



# extendedCustomer 
Created by Joachim Andersson, last modified by Thomas Tornevall on
2023-12-21
Extended Customer is an extension of the Customer, it is used in the
Simplified Shop Flow

> Occurrences of fields below adhere to the xsd requirements.Beware that
> some fields are required by the bank product the client and Resurs
> agreed upon.

| Component           | Type               | Occurs | Nillable? | Description                                                                                                                                                                                      |
|---------------------|--------------------|--------|-----------|--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| cellPhone           | string             | 0..1   | false     | The customer's cell phone number is specified here. Is mandatory if you are using Swish payment method via Resurs Bank                                                                           |
| yourCustomerId      | string             | 0..1   | true      | Your internal customer ID, if you want it on invoice etc.                                                                                                                                        |
| deliveryAddress     | [address](address) | 0..1   | true      | If the delivery address should be changed, specify a new delivery address here else leave it empty.                                                                                              |
| contactGovernmentId | string             | 0..1   | true      | If your customer is of LEGAL type (company), set the contact person for the payment. If a none LEGAL (i.e. NATURAL) leave it empty.Contact civic number. **Company applicable only for Sweden**. |

Details about a (potential) customer, be it natural or legal.  
Contains elements as defined in the following table.

| Component    | Type                                                                                    | Occurs | Nillable? | Description                                                                                                                                    |
|--------------|-----------------------------------------------------------------------------------------|--------|-----------|------------------------------------------------------------------------------------------------------------------------------------------------|
| governmentId | **[nonEmptyString](https://test.resurs.com/docs/pages/viewpage.action?pageId=1475653)** | 0..1   | No        | Identifies a customer uniquely within the country.• SE: Personnummer/Organisationsnummer• DK: CPR-number• NO: Fødselsnummer• FI: Henkilötunnus |
| address      | **[address](https://test.resurs.com/docs/display/ecom/address)**                        | 1..1   | No        | The customer address. It's only used for fraud control. billingAddress will always be the customers registered address.                        |
| cellPhone    | string                                                                                  | 0..1   | No        | The customer's cell phone number is specified here. Mandatory if Swish is to be used as payment method                                         |
| email        | **[nonEmptyString](https://test.resurs.com/docs/pages/viewpage.action?pageId=1475653)** | 0..1   | No        | The customer email address.                                                                                                                    |
| type         | **[customerType](https://test.resurs.com/docs/display/ecom/customerType)**              | 1..1   | No        | The customer type.                                                                                                                             |

```xml
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

