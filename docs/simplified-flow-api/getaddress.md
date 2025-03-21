---
layout: page
title: getAddress (Se)
permalink: /simplified-flow-api/getaddress/
parent: Simplified Flow Api
---


## getAddress (SE) 

**customerType**

Description: The type of customer.

| Value   | Description                                        |
|---------|----------------------------------------------------|
| LEGAL   | The customer is a legal customer, i.e. a company.  |
| NATURAL | The customer is a natural customer, i.e. a person. |

> This function is only available in Sweden! (due to legal reasons)

### Introduction
This function is offered as a service, since most webshops collect
address information early in the check out flow. This function fetches
address information about an individual or a company. If the customer
exists, its registered address is returned. If the customer is of type
LEGAL (organization/company) firstname and lastname will be null
(empty). This address my be used as billing - and delivery address. The
customerIpAddress is to prevent address harvesting. We allow only a
limited number of queries within a time frame. Bashing will result in an
[error](/development/errors--problem-solving-and-corner-cases/resurs-error-codes/) when the threshold is exceeded.

# *getAddress*
*Retrieves address information. Note that the customerType parameter is
optional right now, but in short notice this will be required
(minOccurs=1)*

**Input (Literal)**

| Name              | Type                             | Occurs | Nillable? | Description                                                                                                                                                                                                                                                          |
|-------------------|----------------------------------|--------|-----------|----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| governmentId      | string                           | 1..1   | No        | The government identity of the customer for which to retrieve the address.                                                                                                                                                                                           |
| customerType      | **[customerType](/development/api-types/customertype/)** | 0..1   | No        | The type of customer to retrieve. In many cases, this is easily determined from the government identity, but for Swedish companies in sole proprietorship, the same identity is used for both the person as a natural customer, and the company as a legal customer. |
| customerIpAddress | string                           | 0..1   | No        | The IP address from which the customer has accessed the service. To prevent bashing. This parameter is mandatory even if it has minOccurs set to zero.                                                                                                               |

**Output(Literal)**

| Name   | Type                   | Occurs | Nillabel? | Description                                     |
|--------|------------------------|--------|-----------|-------------------------------------------------|
| return | **[address](/development/api-types/address/)** | 1..1   | No        | If a match could be made, the customer address. |

**Faults**

| Name                    | Content                                  | Description                                                        |
|-------------------------|------------------------------------------|--------------------------------------------------------------------|
| ECommerceErrorException | **[ECommerceError](/development/api-types/ecommerceerror/)**     | Failed to retrieve the address information. See error for details. |

The `customerType` and `customerIpAddress` parameters are **mandatory**
even if the schema says they're not. (They where late additions, and we
had to do this way not to break compatibility)

### Code Examples - Request & Response
**getAddress**
```xml
<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:shop="http://ecommerce.resurs.com/v4/msg/simplifiedshopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <shop:getAddress>
         <governmentId>7312195873</governmentId>
         <customerType>NATURAL</customerType>
         <customerIpAddress>80.80.80.80</customerIpAddress>
      </shop:getAddress>
   </soapenv:Body>
</soapenv:Envelope>
```

If the customer exists, its registered address is returned. If the
customer is of type LEGAL (an
organization/comapny) `firstName` and `lastName` will be null

**getAddressResponse**
```xml
<soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
   <soap:Body>
      <ns3:getAddressResponse xmlns:ns3="http://ecommerce.resurs.com/v4/msg/shopflow" xmlns:ns2="http://ecommerce.resurs.com/v4/msg/exception">
         <return>
            <fullName>Lastname Firstname</fullName>
            <firstName>Firstname</firstName>
            <lastName>Lastname</lastName>
            <addressRow1>Street XX</addressRow1>
            <postalArea>City</postalArea>
            <postalCode>12345</postalCode>
            <country>SE</country>
         </return>
      </ns3:getAddressResponse>
   </soap:Body>
</soap:Envelope>
```
