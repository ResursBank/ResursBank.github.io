---
layout: page
title: limitDecision
permalink: /development/api-types/limitdecision/
parent: Api Types
grand_parent: Development
---



# limitDecision 
The possible decisions returned by a limit application.

| Value   | Description                                                            |
|---------|------------------------------------------------------------------------|
| DENIED  | No limit at all is given.                                              |
| GRANTED | The applied limit or more is given.                                    |
| TRIAL   | This would not normaly be returned, but if it is, handle it as DENIED. |

