---
layout: page
title: Best Practices for Handling Merchant API Callbacks
permalink: /merchant-api-2-0/Handling_MerchantAPI_Callbacks/
parent: Merchant API 2.0
nav_order: 61
nav_exclude: true
---

# Best Practices for Handling Merchant API Callbacks

> [!IMPORTANT]
> Callbacks should be treated as **notifications that an event has occurred**, not as the authoritative source of truth for a payment's current state.
>
> Always verify payment information through the Merchant API before performing any business-critical actions.

---

## Overview

Resurs Merchant API uses callbacks to notify merchants and integrators about changes throughout a payment's lifecycle, including:

- Payment approval
- Payment rejection
- Capture events
- Refunds
- Other payment state changes

To ensure a secure, reliable, and resilient integration, callback information should always be validated against Merchant API before updating orders, delivering goods, or executing other business-critical workflows.

---

## Core Principle

### Never Trust the Callback Alone

When a callback is received:

1. Receive the callback.
2. Extract the payment identifier (for example, `paymentId`).
3. Retrieve the latest payment information from Merchant API.
4. Verify the current payment status.
5. Execute business logic.
6. Return `HTTP 200 OK`.

### Recommended Flow

```text
Resurs Callback
      │
      ▼
Merchant System
      │
      ▼
GET /payments/{paymentId}
      │
      ▼
Verify Current Status
      │
      ▼
Execute Business Logic
```

---

## 🔒 Always Use HTTPS

Callback endpoints should only be exposed over HTTPS.

This ensures that communication between Resurs and the receiving system is encrypted and protected against interception or manipulation during transit.

### ✅ Recommended

```text
https://merchant.example.com/api/resurs/callback
```

### ❌ Avoid

```text
http://merchant.example.com/api/resurs/callback
```

---

## ✅ Always Verify Payment Status Through Merchant API

A callback should be treated as a notification that new information is available.

When a callback is received, retrieve the latest payment information directly from Merchant API:

```http
GET /v2/payments/{paymentId}
```

Before updating an order, verify:

- Payment status
- Amount
- Payment type
- Capture status
- Refund information

> [!TIP]
> Business decisions should always be based on the latest state maintained by Resurs, not on callback payload data alone.

---

## 🔄 Implement Idempotent Callback Handling

Integrations should assume that the same callback may be delivered multiple times.

Common causes include:

- Network interruptions
- Timeouts
- Retry mechanisms
- Message redelivery

### Recommendation

Store information such as:

```text
paymentId
status
receivedTimestamp
```

If the same payment status has already been processed for the same payment, ignore the callback.

### Example

```text
CAPTURED
CAPTURED
CAPTURED
```

Expected result:

✅ Only one order update is performed.

---

## 🚦 Allow Only Valid Status Transitions

Order statuses should never be updated without validation.

### Valid Transitions

```text
PENDING
  │
  ├──► ACCEPTED
  │
  └──► REJECTED

ACCEPTED
  │
  └──► CAPTURED
```

### Invalid Transition Example

```text
CAPTURED
  │
  └──► PENDING
```

> [!WARNING]
> Invalid status transitions can lead to inconsistent order states and unexpected business behavior.

---

## ⚡ Separate Callback Reception from Business Logic

The callback endpoint should be lightweight, responsive, and resilient.

### Recommended Architecture

```text
Receive Callback
      │
      ▼
Validate Payload
      │
      ▼
Store in Queue / Database
      │
      ▼
Return HTTP 200 OK
      │
      ▼
Process Business Logic Asynchronously
```

### Benefits

- Reduced risk of request timeouts
- Fewer duplicate callback deliveries
- Faster callback responses
- Improved system scalability

---

## 📝 Log Callback Events

All callback activity should be logged for troubleshooting, monitoring, and auditing purposes.

### Recommended Information to Log

- Timestamp
- Payment ID
- Callback payload
- Payment status retrieved from Merchant API
- Processing result
- Error details (if applicable)

### Avoid Logging

- API credentials
- Access tokens
- Sensitive personal information (PII)

> [!CAUTION]
> Logs should contain sufficient diagnostic information while avoiding sensitive security or customer data.

---

## 🛡️ Handle Unknown Callback Data Gracefully

Merchant APIs evolve over time.

Integrations should therefore:

- Ignore unknown fields
- Remain compatible with new attributes
- Log unexpected data for analysis

### Example

```json
{
  "paymentId": "123456",
  "status": "CAPTURED",
  "newFutureField": "someValue"
}
```

Unknown fields should not cause callback processing to fail.

---

## ✅ Recommended Security Model

Resurs recommends the following approach:

| Recommendation | Status |
|---------------|--------|
| Expose callback endpoints only over HTTPS | ✅ |
| Treat callbacks as notifications, not the source of truth | ✅ |
| Verify payment information using Merchant API | ✅ |
| Implement idempotent processing | ✅ |
| Log callback activity | ✅ |
| Validate status transitions | ✅ |
| Process business logic asynchronously | ✅ |
| Monitor and handle processing failures | ✅ |

---

## Architecture Overview

```text
                    ┌─────────────────┐
                    │ Resurs Callback │
                    └────────┬────────┘
                             │
                             ▼
              ┌──────────────────────────┐
              │ Callback Endpoint (HTTPS)│
              └────────┬─────────────────┘
                       │
                       ▼
              ┌──────────────────────────┐
              │ Validate & Store Event   │
              └────────┬─────────────────┘
                       │
                       ▼
                Return HTTP 200
                       │
                       ▼
              ┌──────────────────────────┐
              │ Async Processing Worker  │
              └────────┬─────────────────┘
                       │
                       ▼
                GET Payment Details
                       │
                       ▼
              Verify Current State
                       │
                       ▼
                Update Business Logic
```

---

## Summary

> The most secure and reliable way to handle Merchant API callbacks is to treat the callback as a notification that a payment has changed and then retrieve the latest payment information directly from Merchant API before performing any business
