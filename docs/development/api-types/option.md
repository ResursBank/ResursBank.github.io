---
layout: page
title: Option
permalink: /development/api-types/option/
parent: Api Types
grand_parent: Development
---



# option 
Created by Benny, last modified on 2017-02-27
An option in a list of predefined values.

### Attributes

| Name    | Type    | Required? |
|---------|---------|-----------|
| checked | boolean | No        |

Contains elements as defined in the following table.

| Component   | Type   | Occurs | Nillable? | Description                                                                                                                     |
|-------------|--------|--------|-----------|---------------------------------------------------------------------------------------------------------------------------------|
| label       | string | 0..1   | No        | The list option label. Typically, this is displayed as the option name.                                                         |
| value       | string | 0..1   | No        | The list option value. Typically, this not shown to the customer.                                                               |
| description | string | 0..1   | No        |  A textual description of the list option. Typically, this is displayed when the user hovers the mouse pointer over the option. |

