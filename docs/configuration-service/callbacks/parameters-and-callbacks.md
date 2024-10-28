---
layout: page
title: Parameters And Callbacks
permalink: /configuration-service/callbacks/parameters-and-callbacks/
parent: Callbacks
grand_parent: Configuration Service
---

# Parameters and Callbacks 

Depending on what value you use for the parameter
`waitForFraudControl` in `bookPayment` you will have to implement
different callbacks, if you are not monitoring the orders manually with
the web tool Payment
Administration. The answer you
get from `bookPayment` will differ depending on if you use the
Simplified flow or the Hosted flow.

### SIMPLIFIED FLOW

####  waitForFraudControl=FALSE 

With this setting in the call `bookPayment` you run asynchronously and
do not wait for the answer of the control.  
In `bookPaymentResponse` you will instead get an intermediate
status `FROZEN` (in the old deprecated flow you will get
`CONTROL_IN_PROGRESS`) or you will get `DENIED`.
When the automatic control has finished the order will get one of these
statuses:
- `BOOKED` in the system - the control shows nothing wrong and you can
  debit the order. The callback `AUTOMATIC_FRAUD_CONTROL` is sent and
  says `THAWED`.
- `FROZEN` in the system - something is suspicious and the order goes to
  manual handling. The callback `AUTOMATIC_FRAUD_CONTROL` is sent and
  says `FROZEN`.
When an order is manually inspected it's also here two outcomes, both
send their own callback that you have to listen to:
- The order is okay for debiting - this callback is sent: `UNFREEZE`.
- Something is wrong or suspicious - this callback is sent: `ANNULMENT`.

#### waitForFraudControl=TRUE

With this setting in the call `bookPayment` you run synchronously and
wait for the control to run.  
In `bookPaymentResponse` you will get one of these statuses:
- `BOOKED` - the control shows nothing and you can debit the order.
- `FROZEN` - something is suspicious and it will be a manual inspection.
When an order is manually inspected it's also here two outcomes, both
send their own callback that you have to listen to:
- The order is okay for debiting - this callback is sent: `UNFREEZE`.
- Something is wrong or suspicious - this callback is sent: `ANNULMENT`.
[Our
callbacks](/callbacks).
 
### HOSTED FLOW

#### waitForFraudControl=FALSE

With this setting in the call `bookPayment` you run asynchronously and
do not wait for the answer of the control.  
The order will get an intermediate status `FROZEN` and you will only get
back your `successUrl`.
When the automatic control has finished the order will get one of these
statuses:
- `BOOKED` in the system - the control shows nothing wrong and you can
  debit the order. The callback `AUTOMATIC_FRAUD_CONTROL` is sent and
  says `THAWED`.
- `FROZEN` in the system - something is suspicious and the order goes to
  manual handling. The callback `AUTOMATIC_FRAUD_CONTROL` is sent and
  says `FROZEN`.
When an order is manually inspected it's also here two outcomes, both
send their own callback that you have to listen to:
- The order is okay for debiting - this callback is sent: `UNFREEZE`.
- Something is wrong or suspicious - this callback is sent: `ANNULMENT`.

#### waitForFraudControl=TRUE

With this setting in the call `bookPayment` you run synchronously and
wait for the control which will set the order in one of two statuses:  
You will only get your `successUrl` back and have to listen to callback
`AUTOMATIC_FRAUD_CONTROL` to know which status the control has set the
order in out of these two:
- `BOOKED` - the control shows nothing and you can debit the order.
- `FROZEN` - something is suspicious and it will be a manual inspection.
When an order is manually inspected it's also here two outcomes, both
send their own callback that you have to listen to:
- The order is okay for debiting - this callback is sent: `UNFREEZE`.
- Something is wrong or suspicious - this callback is sent: `ANNULMENT`.
If you use the payment method "existing card" the automatic fraud
control is not run, a control was made when you applied for the card.  
This means that you can regard the `successUrl` as a successful booking
it that is returned.  
You might still be denied to place the order due to using a higher
amount than your are allowed to.

[Our
  callbacks](/callbacks).
 
