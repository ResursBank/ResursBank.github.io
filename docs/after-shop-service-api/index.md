---
layout: page
title: After Shop Service Api
permalink: /after-shop-service-api/
has_children: true
---


# After Shop Service API 
Created by Tobias, last modified by Patric Johnsson on 2021-06-27
**Content of this page**
- [Annulling (Cancel order) & Crediting (Refund) - annulPayment &
  creditPayment](/after-shop-service-api/annulling/)
- [Debit order -
  finalizePayment](/after-shop-service-api/finalize-payment/)
- [Make a new, additional debit on an existing order -
  additionalDebitOfPayment](/after-shop-service-api/additional-debit-of-payment/)
- [Add meta data to order -
  addMetaData](/after-shop-service-api/metadata-aftershop/)
- [Search for payments -
  findPayments](/after-shop-service-api/find-payments/)
- [Get detailed information about order -
  getPayment](/after-shop-service-api/get-payment/)
- [Get a specified document from order (PDF) -
  getPaymentDocument](#aftershopserviceapi-getaspecifieddocumentfromorder(pdf)-getpaymentdocument)
- [Get names of all documents for an order -
  getPaymentDocumentNames](/after-shop-service-api/getpaymentdocument/)
- [Issue cutomer identification token -
  issueCustomerIdentificationToken](/after-shop-service-api/#issue-cutomer-identification-token)
- [Invalidate Customer Identification Token -
  invalidateCustomerIdentificationToken](#aftershopserviceapi-invalidatecustomeridentificationtoken-invalidatecustomeridentificationtoken)
- [Available actions, depending on status and
  amount.](#aftershopserviceapi-availableactions,dependingonstatusandamount.)
- [General setup for orderstatus at Resurs
  Bank.](#aftershopserviceapi-generalsetupfororderstatusatresursbank.)

When the customer completes a purchase and a order is created at Resurs
Bank, the order is autherized and debitable.  
In order for the money to be transferred to the merchant's bank
account the order has to be finalized (debited).

This page describes how a order can be handled after its creation and
how you finalize the order.

You can do all this from Resurs Bank
[**paymentAdmin**](payment-administration-gui) , a web-based
interface.  
Or you can use the after shop webservices described below.

WSDL: [https://test.resurs.com/ecommerce-test/ws/V4/AfterShopFlowService?wsdl  
](https://test.resurs.com/ecommerce-test/ws/V4/AfterShopFlowService?wsdl)Service
Endpoint: [https://test.resurs.com/ecommerce-test/ws/V4/AfterShopFlowService](https://test.resurs.com/ecommerce-test/ws/V4/AfterShopFlowService)

### Annulling (Cancel order) & Crediting (Refund) - [annulPayment](annulling) & [creditPayment](1474902) 
Should you need to undo a payment, then you should use the
[annulPayment](annulling) method.  
If the order has been **finalized** then you must use the
[creditPayment](1474902) method instead.  
When to use what? Learn more about [Annulment and
Crediting](concepts-and-domain)

### Debit order -  [finalizePayment](finalize-payment)
When the order is complete, you call this method, the money is then
transferred from the customer account to yours.

### Make a new, additional debit on an existing order - [additionalDebitOfPayment](additional-debit-of-payment)
For creating an additional debit of the payment.

### Add meta data to order - [addMetaData](metadata-aftershop)
If you wish to add more meta data to the payment. This can be used to
register additional information about the payment,  
and they may also be used for searching.

### Search for payments - [findPayments](find-payments)
If you want to search for specific payments.  
To get the size of the searchresult, use
[**calculateResultSize**](calculate-searchresult-size) which for
example can be used for paging.

### Get detailed information about order - [getPayment](get-payment)
Returns the details of a payment.

### Get a specified document from order (PDF) - [getPaymentDocument](1474974)
Retrieves a specified document from the payment as a pdf. [  
 ](1474974)

### Get names of all documents for an order - [getPaymentDocumentNames](get-payment-document-names)
Retrieves the document names available for the payment.

### Issue cutomer identification token
Issues a customer identification token that can identify this customer
in further operations.  
These functions do require the customer to be identified, and they
require either a token, or information to identify the customer.  
Tokens are intended to be saved with the user profile in the webshop.  
In this way we delegate identification of the customer to the webshop
after the initial identification is done.

### Invalidate Customer Identification Token - [invalidateCustomerIdentificationToken](/docs/pages/createpage.action?spaceKey=ecom&title=Invalidate+Customer+Identification+Token&linkCreation=true&fromPageId=327799)
Invalidates customer identification token(s).

** **

### Available actions, depending on status and amount.

|      **getPayment**      | getPaymentResponse\<status\>DEBITABLE\<status\> | getPaymentResponse\<status\>CREDITABLE\<status\> | getPaymentResponse \<status\>DEBITABLE\<status\>\<status\>CREDITABLE\<status\> |
|:------------------------:|:-----------------------------------------------:|:------------------------------------------------:|:------------------------------------------------------------------------------:|
| additionalDebitOfPayment |                       YES                       |                       YES                        |                                      YES                                       |
|       annulPayment       |                       YES                       |                        NO                        |                                      YES                                       |
|     finalizePayment      |                       YES                       |                        NO                        |                                      YES                                       |
|      creditPayment       |                       NO                        |                       YES                        |                                      YES                                       |

| Maximum amount for:      | is                                                                           |
|--------------------------|------------------------------------------------------------------------------|
| additionalDebitOfPayment | limit - totalAmount                                                          |
| annulPayment             | sum(AUTHORIZE.totalAmount) - sum(DEBIT.totalAmount) - sum(ANNUL.totalAmount) |
| finalizePayment          | sum(AUTHORIZE.totalAmount) - sum(DEBIT.totalAmount) - sum(ANNUL.totalAmount) |
| creditPayment            | sum(DEBIT.totalAmount) - sum(CREDIT.totalAmount)                             |

> In order to be able to charge more than the authenticated amount
> (maximum up to the requested limit) you must first make an
> additionalDebitOfPayment,this will increase the authenticated amount.
> Note that to update existing order line, "artNo", "description" and
> "unitAmountWithoutVat" have to match.Example:The order is
> authenticated for 2 products at a price of 100 sek / pcs, ie a total
> of 200 sek.To increase the number of products to 3, you send
> additionalDebitOfPayment with the increase, in this case 1 pcs (This
> provided that the current limit allows it).Then you can debit
> (finalizePayment) 3 items with a sum of 300 sek.NOTE! In order to use
> this feature, this need to be arranged with the partner's KAM. This
> "shadow limit" can be applied either for a fixed amount, e.q. 2000SEK,
> or a percentage of the checkout value, e.q. 10%.

| After shop event            | Resurs Invoice | Resurs partpayment | Resurs Card/Account | Visa/MasterCard | Bank payments directly from account to account:*Swish, Trustly* |
|-----------------------------|:--------------:|:------------------:|:-------------------:|:---------------:|:---------------------------------------------------------------:|
| Debiting whole order        |      YES       |        YES         |         YES         |       YES       |                               NO                                |
| Debiting part order         |      YES       |        YES         |         YES         |       YES       |                               NO                                |
| Crediting whole order       |      YES       |        YES         |         YES         |       YES       |                               YES                               |
| Crediting part order        |      YES       |        YES         |         YES         |       YES       |                               YES                               |
| Annulment whole order       |      YES       |        YES         |         YES         |       YES       |                               NO                                |
| Annulment part order        |      YES       |        YES         |         YES         |       NO        |                               NO                                |
| Additional Debit of Payment |      YES       |        YES         |         YES         |       NO        |                               NO                                |

### General setup for *orderstatus* at Resurs Bank.
You can use this when mapping your own system´s orderstatus to Resurs
*orderstatus*.  
Make a
[SOAP](get-payment) or [REST](https://test.resurs.com/docs/display/ecom/Resurs+Checkout#ResursCheckout-/payments/%7BorderReference%7D-GET) for
current order, to determine the current order status.

| Orderstatus at Resurs               | Case                                                                                                       |
|-------------------------------------|------------------------------------------------------------------------------------------------------------|
| On-Hold (Pending)                   | getPaymentResponse.frozen=true                                                                             |
| Processing (Ready/Confirmed Resurs) | getPaymentResponse.status:"DEBITABLE"=true                                                                 |
| Completed                           | getPaymentResponse.status: "IS_DEBITED"=true AND"DEBITABLE"=false ANDgetPaymentResponse.totalAmount \> 0   |
| Cancelled (Annulled)                | getPaymentResponse.status:"IS_ANNULLED"=true AND"IS_CREDITED"=false AND getPaymentResponse.totalAmount = 0 |
| Refunded (Credited)                 | getPaymentResponse.status:"IS_CREDITED"=true ANDgetPaymentResponse.totalAmount = 0                         |

> Payment type Swish (SE) is automatically finalized as default.

