---
layout: page
title: EComPHP Custom ErrorCodes
permalink: /development/errors--problem-solving-and-corner-cases/ecomphp-custom-errorcodes/
parent: Errors, Problem Solving And Corner Cases
grand_parent: Development
---


# EComPHP custom errorcodes 
Created by Thomas Tornevall, last modified on 2019-10-08
EComPHP, when errors occurs, renders own fault codes when something goes
wrong. A sample of what codes that is used can be read [from this
point](https://bitbucket.org/resursbankplugins/resurs-ecomphp/src/master/source/classes/rbapiloader/ResursException.php).
A part of this list includes the SOAP faultcodes
[here](/development/errors--problem-solving-and-corner-cases/resurs-error-codes/).

Except for this EComPHP passes errors from the engine that handles the
communication with ecommerce rest/soap. Those exceptions can be found
[here](https://docs.tornevall.net/x/EgCNAQ) and will not be included
here as third party applications might change over time. This list does
not cover the section ECOMMERCEERROR either, as that section covers
external errors for Resurs Ecommerce.

| CODE | CONSTANT                          | DESCRIPTION                                                                                                                                                                                                                                                                                                                                                                                                         |
|------|-----------------------------------|---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| 1000 | *NOT_IMPLEMENTED*                 | General errors                                                                                                                                                                                                                                                                                                                                                                                                      |
| 1006 | *UNKOWN_SOAP_EXCEPTION_CODE_ZERO* | Exceptions that occurs in EComPHP SOAP caller - postService() - where the postService has reached an exception, checked all possibilites of a proper error message but where the EComPHP for a reason can't catch a code. Instead, EComPHP gets an empty value or the value 0 as the errorcode. In this case, to ensure that the exception is thrown correctly, it generates this code instead of the "real" value. |
| 1501 | *SSL_WRAPPER_MISSING*             | Thrown when EComPHP finds out that PHP is missing a SSL wrapper that is required for the services to work                                                                                                                                                                                                                                                                                                           |
| 6001 | *CALLBACK_TYPE_UNSUPPORTED*       | Occurs when a callback type is called that does not exist in the services or are unsupported                                                                                                                                                                                                                                                                                                                        |
| 6003 | *CALLBACK_SALTDIGEST_MISSING*     | Occurs when salt digest is missing in a callback registration                                                                                                                                                                                                                                                                                                                                                       |
| 7000 | *BOOKPAYMENT_NO_BOOKDATA*         | Occurs when there is no payload to send into a rest- or SOAP service                                                                                                                                                                                                                                                                                                                                                |
| 7009 | *EXSHOP_PROHIBITED*               | Occurs when the user account prohibited exshop user credentials are used                                                                                                                                                                                                                                                                                                                                            |
| 7008 | *CREATEPAYMENT_NO_ID_SET*         | When preparing the payload for resurs chckout is used, and no payment id is properly set                                                                                                                                                                                                                                                                                                                            |
| 7009 | *CREATEPAYMENT_TOO_FAST*          | When flooding prevention system is active and createPayment are running too fast is a shop, createPayment is throttled with this exception                                                                                                                                                                                                                                                                          |

## Exception codes not in use or removed

| CODE | CONSTANT                                              | DESCRIPTION                                                                                                                                                               |
|------|-------------------------------------------------------|---------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| 1001 | *CLASS_REFLECTION_MISSING*                            | **REMOVED** When reflection class could not be instantiated in older ECom-libs where WSDL stubs was included.                                                             |
| 1002 | *WSDL_APILOAD_EXCEPTION*                              | **REMOVED** When WSDL-files could not completely load into the core functions                                                                                             |
| 1003 | *WSDL_PASSTHROUGH_EXCEPTION*                          | **REMOVED** When EComPHP could not pass data through to the WSDL-stub library. Magic methods like \_\_call, was probably involved here                                    |
| 1004 | *REGEX_COUNTRYCODE_MISSINGREGEX_CUSTOMERTYPE_MISSING* | DEPRECATED **When country code or customer type is missing in getRegEx-request for form fields**                                                                          |
| 1005 | *FORMFIELD_CANHIDE_EXCEPTION*                         | DEPRECATED When a formfield is controlled canHideFormField() if it can be hidden or not and throwing exceptions are allowed and the field can not be hidden from the form |
| 1500 | *SSL_PRODUCTION_CERTIFICATE_MISSING*                  | **REMOVED** When EComPHP handled SSL errors internally                                                                                                                    |
| 2000 | *NO_SERVICE_CLASSES_LOADED*                           | **REMOVED**                                                                                                                                                               |
| 2001 | *NO_SERVICE_API_HANDLED*                              | ****REMOVED****                                                                                                                                                           |
| 6000 | *CALLBACK_INSUFFICIENT_DATA*                          | **REMOVED**                                                                                                                                                               |
| 6002 | *CALLBACK_URL_MISMATCH*                               | ****REMOVED****                                                                                                                                                           |
| 2000 | *NO_SERVICE_CLASSES_LOADED*                           | **REMOVED**                                                                                                                                                               |
| 2001 | *NO_SERVICE_API_HANDLED*                              | ****REMOVED****                                                                                                                                                           |
| 7001 | *PAYMENTSPEC_EMPTY*                                   | ****REMOVED****                                                                                                                                                           |
| 7002 | *BOOKPAYMENT_NO_BOOKPAYMENT_CLASS*                    | **REMOVED**                                                                                                                                                               |
| 7003 | *PAYMENT_METHODS_CACHE_DISABLED*                      | **REMOVED**                                                                                                                                                               |
| 7004 | *ANNUITY_FACTORS_CACHE_DISABLED*                      | **REMOVED**                                                                                                                                                               |
| 7005 | *ANNUITY_FACTORS_METHOD_UNAVAILABLE*                  | **REMOVED**                                                                                                                                                               |
| 7006 | *UPDATECART_NOCLASS_EXCEPTION*                        | **REMOVED**                                                                                                                                                               |
| 7006 | *UPDATECARD_DOUBLE_DATA_EXCEPTION*                    | **REMOVED**                                                                                                                                                               |
| 7007 | *PREPARECARD_NUMERIC_EXCEPTION*                       | **REMOVED**                                                                                                                                                               |
| 7008 | *BOOK_CUSTOMERTYPE_MISSING*                           | DEPRECATED Used in form fields generator, where the customertype NATURAL or LEGAL is missed to set                                                                        |

