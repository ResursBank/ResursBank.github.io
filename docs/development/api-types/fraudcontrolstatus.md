---
layout: page
title: fraudControlStatus
permalink: /development/api-types/fraudcontrolstatus/
parent: Api Types
grand_parent: Development
---



# fraudControlStatus 

The status of the payment fraud control.

| Value               | Description                                                                                                                                                                                                             |
|---------------------|-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| FROZEN              | The payment is currently frozen. This typically means that there is something that needs further investigation before the payment can be finalized.                                                                     |
| BOOKED              | The payment is not frozen, and may be finalized at any time.                                                                                                                                                            |
| CONTROL_IN_PROGRESS | *The deprecated flow*: the **automatic** fraud control is still in progress. It will result in FROZEN or BOOKED.In the simplified flow you will get an intermediate status of FROZEN when the control is still running. |

