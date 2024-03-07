---
layout: page
title: Paymentdata
permalink: /development/api-types/paymentdata/
parent: Api Types
grand_parent: Development
---



# paymentData 
Created by Joachim Andersson, last modified by Gert on 2022-01-12
The data for the payment during a Simplified Basic Show Flow.
  
  
| Component              | Type                                   | Occurs | Nillable? | Description                                                                                                                                                                                                                                                                                                                                                                                                                                        |
|------------------------|----------------------------------------|--------|-----------|----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| preferredId            | **[id](Simple-Types..._1475653.html)** | 0..1   | Yes       | The preferred payment ID for the payment, usually the order ID. This ID has to be unique per representative and payment. If nothing is specified, the system will generate an unique ID. This ID will in both cases be returned in the bookPaymentResult as paymentId.If you are to offer Swish (SE) or card payment via Nets through Resurs Bank, the maximum characters are 35 (Swish) and 32 (Nets) and *allowed characters are a-z A-Z 0-9 - * |
| paymentMethodId        | **[id](Simple-Types..._1475653.html)** | 1..1   | No        | The payment method to be used when doing a payment.                                                                                                                                                                                                                                                                                                                                                                                                |
| preferredTransactionId | **[id](Simple-Types..._1475653.html)** | 0..1   | Yes       | An identifier which is reported back in economic reports. Can thus be used as a key to track transactions. It's optional. Only to be used when finalizeIfBooked is set to `true`, else use this parameter in [finalizePayment](Finalize-Payment_1474883.html)!                                                                                                                                                                                     |
| customerIpAddress      | string                                 | 1...1  | No        | The IP address of the customer of the payment.                                                                                                                                                                                                                                                                                                                                                                                                     |
| waitForFraudControl    | boolean                                | 0..1   | Yes       | If the system should wait to return a response until the fraud control has run. If you set waitForFraudControl to `false` you will have to register the callback [`AUTOMATIC_FRAUD_CONTROL`](AUTOMATIC_FRAUD_CONTROL_1147049.html) to get notified when the control is finished, with result `FROZEN` or `THAWED`. [Read more...](Parameters-and-Callbacks_5014323.html) **Default: true.**                                                        |
| annulIfFrozen          | boolean                                | 0..1   | Yes       | If the fraud freezes a payment, it will automatically annul the payment. Set it to `true` if you cannot wait for the order to be thawed before delivering the purchased items. **Default: false**.                                                                                                                                                                                                                                                 |
| finalizeIfBooked       | boolean                                | 0..1   | Yes       | Will automatically finalize (debit) the payment if you will get an okay from the fraud control. If you set the waitForFraudControl to false you need to register the callback `FINALIZATION` if you want to get notified when a payment is finalized. **Default: false.**                                                                                                                                                                          |
  