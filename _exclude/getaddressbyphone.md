---
layout: page
title: getAddressByPhone (No)
permalink: /simplified-flow-api/getaddressbyphone/
parent: Simplified Flow Api
---


# getAddressByPhone (NO) 
Created by Patric Johnsson, last modified by Thomas Tornevall on
2023-12-27
> This function is only available in Norway!

# getAddressByPhone
*Retrieves address information.*

**Input (Literal)**

| Name              | Type   | Occurs | Nillable? | Description                                                                           |
|-------------------|--------|--------|-----------|---------------------------------------------------------------------------------------|
| phoneNumber       | string | 1..1   | No        | The government identity of the customer for which to retrieve the address.            |
| customerIpAddress | string | 0..1   | Yes       | The IP address from which the customer has accessed the service. To prevent bashing.  |

**  
**

**Output(Literal)**

| Name   | Type                   | Occurs | Nillabel? | Description                                     |
|--------|------------------------|--------|-----------|-------------------------------------------------|
| return | **[address](address)** | 1..1   | No        | If a match could be made, the customer address. |

**Faults**

| Name                    | Content                                  | Description                                                        |
|-------------------------|------------------------------------------|--------------------------------------------------------------------|
| ECommerceErrorException | **[ECommerceError](ecommerceerror)**     | Failed to retrieve the address information. See error for details. |

### Introduction
This function is offered as a service, since most webshops collect
address information early in the checkout flow. This function fetches
address information. If we get a match on the phone number, its
registered address is returned. This address may be used as billing- and
delivery address. The customerIpAddress is to prevent address
harvesting. We allow only a limited number of queries within a time
frame. Bashing will result in an [error](328078) when the threshold is
exceeded.

### Code Examples - Request & Response
**getAddressByPhone**
```xml
<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:sim="http://ecommerce.resurs.com/v4/msg/simplifiedshopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <sim:getAddressByPhone>
         <phoneNumber>40000001</phoneNumber>
         <customerIpAddress>80.80.80.80</customerIpAddress>
      </sim:getAddressByPhone>
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
      <ns3:getAddressResponse xmlns:ns3="http://ecommerce.resurs.com/v4/msg/simplifiedshopflow" xmlns:ns2="http://ecommerce.resurs.com/v4/msg/exception">
         <return>
            <fullName>Bjarne Bock Krohg</fullName>
            <firstName>Bjarne</firstName>
            <lastName>Krohg</lastName>
            <addressRow1>Prinsens Gate 14</addressRow1>
            <postalArea>Bergen</postalArea>
            <postalCode>5014</postalCode>
            <country>NO</country>
         </return>
      </ns3:getAddressResponse>
   </soap:Body>
</soap:Envelope>
```
