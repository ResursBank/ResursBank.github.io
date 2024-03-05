---
layout: page
title: Permissions And Passwords - Platform Access
permalink: /development/permissions-and-passwords---platform-access/
parent: Development
---


# Permissions and passwords - Platform access 
Created by Benny, last modified by Thomas Tornevall on 2023-12-27
This page only talks about web service security, not [Payment
administration GUI](Payment-administration-GUI_327748.html) security.
## Authentication
The Resurs e-Commerce service is protected by the simple [http basic
authentication
mechanism](http://en.wikipedia.org/wiki/Basic_access_authentication).
Behind a TLS/SSL protected channel this is an acceptable level of
security.
We've chosen this solution in favour of the more
complex [WS-Security](http://en.wikipedia.org/wiki/WS-Security) which
still have some compatibility issues. With our solution the
authorization is configured in a layer separate from the web service
client.
Please, **enable preemptive authentication** to avoid unnecessary
roundtrips (request, response). The standard mode in most HTTP client
implementations is to try accessing the HTTP resource, and first when
confronted with a 401, redo the request *with* credentials. This double
roundtrip is a waste of precious milliseconds which risks make your
webshop seem sluggish.
  
