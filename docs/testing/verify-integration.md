---
layout: page
title: Verify Integration
permalink: /testing/verify-integration/
parent: Testing
---


# Verify integration 
Created by Gert, last modified by Benny on 2017-03-07
The following page is a checklist to define when an integration can
be considered "Done".

### Technical requirements
- XML validation - When using our services live, do not enable strict
  XML Schema validation as minor changes on our side can cause the
  integration to fail.
- Enable [preemptive
  authentication](https://test.resurs.com/docs/pages/viewpage.action?pageId=1475179)
  in your HTTP client.

### Legal requirements
- [Legal
  requirements](https://test.resurs.com/docs/display/ecom/Legal+requirements)

### Tests that should be performed by the integrator:
### - Full integration where orders are fully managed in the integrating ERP system.

[TABLE]

### - Integration where Resurs Payment admin GUI will be used to manage orders.

[TABLE]

