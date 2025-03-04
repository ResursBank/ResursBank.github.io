---
layout: page
title: Find Payments
permalink: /after-shop-service-api/find-payments/
parent: After Shop Service Api
---


# Find Payments 

## findPayments
> Searches for payments that match the specified requirements.

**Input (Literal)**

| Name            | Type                                  | Occurs | Nillable? | Description                             |
|-----------------|---------------------------------------|--------|-----------|-----------------------------------------|
| searchCriteria  | [**searchCriteria**](/development/api-types/searchcriteria/)  | 1..1   | No        | The search criteria.                    |
| pageNumber      | positiveInteger                       | 0..1   | No        | The desired page number.                |
| itemsPerPage    | positiveInteger                       | 0..1   | No        | The number of items to return per page. |
| sortBy          | [**sortOrder**](/development/api-types/sortorder/)            | 0..1   | No        | The sort order of the results.          |

**Output (Literal)**

| Name   | Type                              | Occurs | Nillable? | Description                                             |
|--------|-----------------------------------|--------|-----------|---------------------------------------------------------|
| return | [**basicPayment**](/development/api-types/basicpayment/)  | 0..\*  | No        | The of payments matching the specified search criteria. |

**Faults**

| Name                     | Content                                | Description                                           |
|--------------------------|----------------------------------------|-------------------------------------------------------|
| ECommerceErrorException  | **[ECommerceError](/development/api-types/ecommerceerror/)**   | Failed to search for payments. See error for details. |

Searches for payments that matches the specified requirements and
returns the payments matching the specified search criteria. If you know
the identity of the payment you are looking for, it is better to use the
[getPayment method](/after-shop-service-api/get-payment/).

The search may consist of information like governmentId, customer name,
paymentmethodId etc. You can specify the search criteria as much or as
little you want to help you find what payment(s) you are looking for. 

### Sort order
Can be sorted by these options:

| Value                  | Description                                                                                 |
|------------------------|---------------------------------------------------------------------------------------------|
| PAYMENT_ID             | Sort the result on payment identity.                                                        |
| CUSTOMER_GOVERNMENT_ID | Sort the result on customer government identity.                                            |
| CUSTOMER_NAME          | Sort the result on customer name.                                                           |
| BOOKED_TIME            | Sort the result on payment booking time.                                                    |
| MODIFIED_TIME          | Sort the result on payment modification time.                                               |
| FINALIZED_TIME         | Sort the result on payment finalization time.                                               |
| AMOUNT                 | Sort the result on total payment amount, taking into consideration the payment part status. |

### Example
The example below shows a very simple search for payments that has been
paid with paymentMethod 'Nytt Kort'

**findPaymentRequest**
```xml
<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:aft="http://ecommerce.resurs.com/v4/msg/aftershopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <aft:findPayments>
         <searchCriteria>
            <paymentMethodId>NYTT_KORT</paymentMethodId>
            <statusSet>DEBITABLE</statusSet>
            <statusNotSet>IS_DEBITED</statusNotSet>
         </searchCriteria>
      </aft:findPayments>
   </soapenv:Body>
</soapenv:Envelope>
```
**findPaymentResponse**
```xml
<soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
   <soap:Body>
      <ns2:findPaymentsResponse xmlns:ns3="http://ecommerce.resurs.com/v4/msg/exception" xmlns:ns2="http://ecommerce.resurs.com/v4/msg/aftershopflow">
         <return>
            <paymentId>Sess-1346079637802-2201</paymentId>
            <paymentMethodId>NYTT_KORT</paymentMethodId>
            <paymentMethodName>Nytt kort</paymentMethodName>
            <governmentId>7409208423</governmentId>
            <fullName>Palma Manuela</fullName>
            <booked>2012-08-27T17:00:26+02:00</booked>
            <modified>2012-08-27T17:00:26+02:00</modified>
            <totalAmount>30.00000</totalAmount>
            <frozen>false</frozen>
            <status>DEBITABLE</status>
         </return>
         <return>
            <paymentId>Sess-1346079643364-6334</paymentId>
            <paymentMethodId>NYTT_KORT</paymentMethodId>
            <paymentMethodName>Nytt kort</paymentMethodName>
            <governmentId>7301021528</governmentId>
            <fullName>Mohammed Ayham</fullName>
            <booked>2012-08-27T17:00:31+02:00</booked>
            <modified>2012-08-27T17:00:31+02:00</modified>
            <totalAmount>30.00000</totalAmount>
            <frozen>false</frozen>
            <status>DEBITABLE</status>
         </return>
      </ns2:findPaymentsResponse>
   </soap:Body>
</soap:Envelope>
```
