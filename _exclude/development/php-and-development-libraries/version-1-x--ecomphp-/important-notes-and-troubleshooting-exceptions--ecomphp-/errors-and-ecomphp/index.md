---
layout: page
title: Errors And Ecomphp
permalink: /development/php-and-development-libraries/version-1-x--ecomphp-/important-notes-and-troubleshooting-exceptions--ecomphp-/errors-and-ecomphp/
parent: Php And Development Libraries
grand_parent: Development
---



# Errors and EComPHP 
Created by Thomas Tornevall, last modified on 2018-05-24
EComPHP is not only a ecommerce wrapper/helper, for making orders. It
also assures that you get as accurate error information as properly.
Different flows has different ways to handle errors. We will try to
explain how errors are thrown from ecommerce and how they will be
handled by EComPHP. In newer releases of EComPHP we aim at helping
furthermore to throw correct errors throught the interfaces.
**Table of contents**
- [HTTP Errors](#ErrorsandEComPHP-HTTPErrors)
  - [Extended HTTP Errors](#ErrorsandEComPHP-ExtendedHTTPErrors)
- [SOAP Errors](#ErrorsandEComPHP-SOAPErrors)
  - [Extended SoapFaults](#ErrorsandEComPHP-ExtendedSoapFaults)
- [Other standard errors](#ErrorsandEComPHP-Otherstandarderrors)
## HTTP Errors
If nothing else than a HTTP error code can be fetched, this will be
primarily used. Such exceptions will first try to fetch the code and the
message received in the HTTP header. For example,
HTTP/1.1 400 Bad Request
can be catched like this:
``` syntaxhighlighter-pre
catch (\Exception $e) {
  $e->getMessage();  // Bad Request
  $e->getCode();     // 400
}
```
### Extended HTTP Errors
However, in some cases, when HTTP 400 errors are thrown (for example)
there might also be a body delivered with the error that is not empty.
Such errors is mostly common in the rest interfaces and might look like
this:
``` syntaxhighlighter-pre
{"timestamp":1527160469786,"status":400,"error":"Bad Request","exception":"java.lang.IllegalArgumentException","message":"totalAmount '340284' must not be greater than minLimit '50000.00'"}
```
If EComPHP catches a HTTP error, it will also check the body for this
kind of JSON-strings and extend the errors thrown to the integrated
platform.
Available from EComPHP 1.3.11, 1.0.38, 1.1.38 (and 2.0.0)
## SOAP Errors
When running through SOAP, several errors might occur. The most common
way to catch errors is through SoapClient standard error interface
(which can be handled as a regualr Exception or a SoapFault).
### Extended SoapFaults
SoapFaults might in some cases be extended by ecommerce itself (See the
constant codes at [Error handling (Resurs error codes)](328078.html)).
If this part of the exception exists in a SoapFault, EComPHP will set
its priority to those parts. It will also add the popular string
"fixableByYou", that might indicate if the problem has been created by
you or if it comes from ecommerce (in some cases there might however be
false alarms).
## Other standard errors
The modules sometimes throw their own exceptions. Some of them are
[listed here](http://www.netcurl.org/exceptions), and covers amongst
others "SOAP Auth Errors", SSL and resolving problems, etc.
