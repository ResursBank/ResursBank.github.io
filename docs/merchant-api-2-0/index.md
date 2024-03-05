---
layout: page
title: Merchant Api 2.0
permalink: /merchant-api-2.0/
has_children: true
---


# Merchant API 2.0 
Created by Sara Wintherfrid Josefsson, last modified by Daniel on
2023-11-21
  
# [Swagger-documentation for Merchant API](https://merchant-api.resurs.com/)
  
  
# Output in accounting file
  
  
| Api                |      payment_id (set by Resurs)      | orderReference |      transactionId       |           accounting file            |
|--------------------|:------------------------------------:|:--------------:|:------------------------:|:------------------------------------:|
| **Create Payment** | 8b9dab18-e1fe-430e-891b-42edb89ba77a |    ORDER001    |                          |                                      |
| **Capture**        |                                      |                |  transactionId-DEBIT001  |        transactionId-DEBIT001        |
| **Capture**        |                                      |                |  transactionId-DEBIT002  |        transactionId-DEBIT002        |
| **Refund**         |                                      |                |  transactionId-CREDIT001 |       transactionId-CREDIT001        |
|                    |                                      |                |                          |                                      |
| **Create Payment** | 8b9dab18-e1fe-430e-891b-42edb89ba77a |    ORDER001    |                          |                                      |
| **Capture**        |                                      |                |           N/A            |               ORDER001               |
| **Capture**        |                                      |                |           N/A            |               ORDER001               |
| **Refund**         |                                      |                |           N/A            |               ORDER001               |
|                    |                                      |                |                          |                                      |
| **Create Payment** | 8b9dab18-e1fe-430e-891b-42edb89ba77a |      N/A       |                          |                                      |
| **Capture**        |                                      |                |           N/A            | 8b9dab18-e1fe-430e-891b-42edb89ba77a |
| **Capture**        |                                      |                |           N/A            | 8b9dab18-e1fe-430e-891b-42edb89ba77a |
| **Refund**         |                                      |                |           N/A            | 8b9dab18-e1fe-430e-891b-42edb89ba77a |
  
