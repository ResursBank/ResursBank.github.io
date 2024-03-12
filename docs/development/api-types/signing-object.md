---
layout: page
title: Signing Object
permalink: /development/api-types/signing-object/
parent: Api Types
grand_parent: Development
---



# signing object 

The signing URLs when a signing is required.

> The URL's must not contain pipes ("\|") since they will not work in
> redirects.

| Component  | Type   | Occurs | Nillable? | Description                                                |
|------------|--------|--------|-----------|------------------------------------------------------------|
| successUrl | string | 1..1   | No        | The URL to return the customer to when a signing succeeds. |
| failUrl    | string | 1..1   | No        | The URL to return the customer to when a signing fails.    |

