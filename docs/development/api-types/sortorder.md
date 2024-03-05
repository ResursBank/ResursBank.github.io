---
layout: page
title: Sortorder
permalink: /development/api-types/sortorder/
parent: Api Types
grand_parent: Development
---



# sortOrder 
Created by Benny, last modified by Gert on 2016-12-13
How the search results should be ordered.  
Contains elements as defined in the following table.
  
| Component   | Type                                                | Occurs | Nillable? | Description                                                                     |
|-------------|-----------------------------------------------------|--------|-----------|---------------------------------------------------------------------------------|
| ascending   | boolean                                             | 1..1   | No        | Whether or not the results are to be sorted in ascending order.                 |
| sortColumns | **[sortAlternative](sortAlternative_1475835.html)** | 1..\*  | No        | On which columns, and in which order of importance, the result is to be sorted. |
  
### SortAlternativie
The sort columns available.
  
| Value                  | Description                                                                                |
|------------------------|--------------------------------------------------------------------------------------------|
| PAYMENT_ID             | Sort the result on payment identity.                                                       |
| CUSTOMER_GOVERNMENT_ID | Sort the result on customer government identity.                                           |
| CUSTOMER_NAME          | Sort the result on customer name.                                                          |
| BOOKED_TIME            | Sort the result on payment booking time.                                                   |
| MODIFIED_TIME          | Sort the result on payment modification time.                                              |
| FINALIZED_TIME         | Sort the result on payment finalization time.                                              |
| AMOUNT                 | Sort the result on total payment amount, taking into consideration the payment part status |
  
  
  
  
  
  
  
  
