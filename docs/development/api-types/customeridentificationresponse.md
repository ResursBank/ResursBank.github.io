---
layout: page
title: Customeridentificationresponse
permalink: /development/api-types/customeridentificationresponse/
parent: Api Types
grand_parent: Development
---



# customerIdentificationResponse 


| Component      | Type                | Occurs | Nillable? | Description                                                                                                               |
|----------------|---------------------|--------|-----------|---------------------------------------------------------------------------------------------------------------------------|
| token          | identificationToken | 1..1   | No        | A string used to identify a customer. Alphanumerical characters, 100 characters long.                                     |
| expirationDate | dateTime            | 1..1   | No        | When this token expires. It cannot be used after that date. This date should at least be a couple of years in the future. |

