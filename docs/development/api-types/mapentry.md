---
layout: page
title: mapEntry
permalink: /development/api-types/mapentry/
parent: Api Types
grand_parent: Development
---



# mapEntry 
A representation of a simple map. WebService frameworks are not good at
supporting maps natively. An instance of this object must be unique in
regard to the key within the list.  
Contains elements as defined in the following table.

| Component | Type                                  | Occurs | Nillable? | Description            |
|-----------|---------------------------------------|--------|-----------|------------------------|
| key       | **[nonEmptyString](/development/api-types/simple-types/)** | 1..1   | No        | The key of the pair.   |
| value     | string                                | 0..1   | No        | The value of the pair. |

