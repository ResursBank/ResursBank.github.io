---
layout: page
title: Limitdecision
permalink: /development/api-types/limitdecision/
parent: Api Types
grand_parent: Development
---



# limitDecision 
Created by Benny, last modified by Tobias on 2013-09-10
The possible decisions returned by a limit application.
  
| Value   | Description                                                            |
|---------|------------------------------------------------------------------------|
| DENIED  | No limit at all is given.                                              |
| GRANTED | The applied limit or more is given.                                    |
| TRIAL   | This would not normaly be returned, but if it is, handle it as DENIED. |
  
