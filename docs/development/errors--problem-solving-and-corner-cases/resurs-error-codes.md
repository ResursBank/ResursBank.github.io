---
layout: page
title: Error Handling (Resurs Error Codes)
permalink: /development/errors--problem-solving-and-corner-cases/resurs-error-codes/
parent: Errors, Problem Solving And Corner Cases
grand_parent: Development
---


# Error handling (Resurs error codes) 

## Other errors
We do have another collection of errors that might be good to take a
look at that covers internal server problems and external errorhandlers
that might warn you about the internal errors. See the list below.

## The "not a bug" list

| Error / Code | Description | Solution (Eventually) |
|-----|-----|-----|
|error: **14090086**: SSL routines: ssl3_get_server_certificate:certificate verify failed|Root certificate bundles are missing on your server, or is placed in a path where your server is not looking.|For PHP cases, this can be fixed by editing your server's php.ini: See the variables for openssl.cafile, openssl.capath. Another solution is to try to add the missing files. In many cases, the missing file is ca-certificates.crt, and in a "standard" Ubuntu platform, they are located in /etc/ssl/certs - openssl usually delivers this file by the dependency ca-certificates (apt-get install ca-certificates).|
|error: **14094410**: SSL routines:ssl3_read_bytes: sslv3 alert handshake failure|SSL handshake errors due to unsupported SSL version. This usually happens when your client tries to communicate with a disabled or non-existent SSL version.|Upgrade openssl and/or your platform.|
|ERROR: Error 35: error: **14077458**: SSL routines: SSL23_GET_SERVER_HELLO:reason(1112)|Almost like the one above. SSL protocol error.|Make sure your ssl supports the right protocol.|
|SOAP-ERROR: Parsing WSDL: Couldn't load from 'url?wsdl' : failed to load external entity "url?wsdl"|If this error is a "standalone" where only this message is visible, there might be an SSL problem again.|This is normally either a credential error or a sign that your system is missing enabled ssl-drivers. The [EComPHP-library]( /development/php-and-development-libraries/) is normally trying to defeat this error message by revealing the "true" error since credential errors, especially on older PHP-systems, tend to hide such error messages when credentials are used. This is a bug in PHP, known since 2006 where 401-Unauthorized errors are being handled as notices rather than a "real" exceptions, and is normally not catched by PHP. This is probably not fixed since PHP 7+ should be able to handle this better (unconfirmed).|


## SOAP related errors
All errors/exception are returned as ECommerceError  
Contains elements as defined in the following table. 

| Component            | Type                                                                                    | Occurs | Nillable? | Description                                                                           |
|----------------------|-----------------------------------------------------------------------------------------|--------|-----------|---------------------------------------------------------------------------------------|
| errorTypeDescription | **[nonEmptyString](https://test.resurs.com/docs/pages/viewpage.action?pageId=1475653)** | 1..1   | No        | The textual description of the error type.                                            |
| errorTypeId          | int                                                                                     | 1..1   | No        | Indicates wich kind of error this is.                                                 |
| fixableByYou         | boolean                                                                                 | 1..1   | No        | "If this error has been avoided with some other input" = "It's a Resurs Bank problem" |
| userErrorMessage     | **[nonEmptyString](https://test.resurs.com/docs/pages/viewpage.action?pageId=1475653)** | 1..1   | No        | An error message intended for the user of the web shop. This message must be shown!   |

Always use `user ErrorMessage` to inform the customer about the error.
It's translated to the shops language. The fault string should be logged
to help the shop owner to diagnose errors.

Do not under *any* circumstance show the `faultString` to the customer.
It may contain sensitive information. But do log it!

```xml
<soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
   <soap:Body>
      <soap:Fault>
         <faultcode>soap:Server</faultcode>
         <faultstring>Government identity invalid! : Malformed government id</faultstring>
         <detail>
            <ns2:ECommerceError xmlns:ns2="http://ecommerce.resurs.com/v4/msg/exception" xmlns:ns3="http://ecommerce.resurs.com/v4/msg/shopflow">
               <errorTypeDescription>ILLEGAL_ARGUMENT</errorTypeDescription>
               <errorTypeId>1</errorTypeId>
               <fixableByYou>true</fixableByYou>
               <userErrorMessage>Personnummer/Organisationsnummer 9999999999 verkar vara inkorrekt</userErrorMessage>
            </ns2:ECommerceError>
         </detail>
      </soap:Fault>
   </soap:Body>
</soap:Envelope>
```
### Remarks
All kind of errors will generate this kind of exception, but different
groups of errors can be distinguished by their errorTypeId. For example,
the errorTypeId 1 is "Invalid argument". You might want to take
different actions depending on the erroTypeId, especially if the
fixableByYou flag is true.

These are the current errorTypes, more might be added as time goes, but
old error codes will remain unchanged.

| Error Type Id | Error Type Description                | Occurs                                                                                      | Notes                           |
|:-------------:|---------------------------------------|---------------------------------------------------------------------------------------------|---------------------------------|
|       1       | ILLEGAL_ARGUMENT                      |                                                                                             |                                 |
|       3       | INTERNAL_ERROR                        | Error server side, contact Resurs Bank.                                                     |                                 |
|       4       | NOT_ALLOWED                           | You're not allowed to perform the requested action.                                         |                                 |
|       8       | REFERENCED_DATA_DONT_EXISTS           | The data you're trying to use/get doesn't exist.                                            |                                 |
|       9       | ~~NOT_ALLOWED_IN_ORDER_STATE~~        |                                                                                             | Lost from xsd.                  |
|      10       | CREDITAPPLICATION_FAILED              |                                                                                             |                                 |
|      11       | NOT_IMPLEMENTED                       | The function is not implemented yet.                                                        |                                 |
|      14       | INVALID_CREDITAPPLICATION_SUBMISSION  | Something is wrong with credit/limit application                                            |                                 |
|      15       | SIGNING_REQUIRED                      | When signing is required and must be done to continue current operation.                    |                                 |
|      17       | AUTHORIZATION_FAILED                  | Could not authorize debit on card/account.                                                  |                                 |
|      18       | APPLICATION_VALIDATION_ERROR          |                                                                                             |                                 |
|      19       | OBJECT_WITH_ID_ALREADY_EXIST          |                                                                                             |                                 |
|      20       | NOT_ALLOWED_IN_PAYMENT_STATE          |                                                                                             | *NOT_ALLOWED_IN_ORDER_STATE*    |
|      21       | CUSTOMER_CONFIGURATION_EXCEPTION      |                                                                                             |                                 |
|      22       | SERVICE_CONFIGURATION_EXCEPTION       |                                                                                             |                                 |
|      23       | INVALID_CREDITING                     |                                                                                             |                                 |
|      24       | LIMIT_PER_TIME_EXCEEDED               |                                                                                             |                                 |
|     *25*      | NOT_ALLOWED_IN_CURRENT_STATE          |                                                                                             |                                 |
|      26       | INVALID_FINALIZATION                  |                                                                                             |                                 |
|      27       | FORM_PARSING                          |                                                                                             |                                 |
|      28       | NOT_ALLOWED_INVOICE_ID                |                                                                                             |                                 |
|      29       | ALREADY_EXISTS_INVOICE_ID             |                                                                                             |                                 |
|      30       | INVALID_IDENTIFICATION                |                                                                                             |                                 |
|      31       | TO_MANY_TOKENS                        |                                                                                             | *Yes, the constant has a typo.* |
|      32       | CUSTOMER_ALREADY_HAVE_VALID_CARD      |                                                                                             |                                 |
|      33       | CUSTOMER_HAS_NO_VALID_CARD            |                                                                                             |                                 |
|      34       | CUSTOMER_HAS_MORE_THAN_ONE_VALID_CARD |                                                                                             |                                 |
|      35       | INVALID_AUTHENTICATION                |                                                                                             |                                 |
|      36       | ANNUL_FAILED                          |                                                                                             |                                 |
|      37       | CUSTOMER_HAS_NO_VALID_ACCOUNT         |                                                                                             |                                 |
|      99       | LEGACY_EXCEPTION                      |                                                                                             |                                 |
|      502      | WEAK_PASSWORD                         | When changing password and the new one is to weak to be accepted                            |                                 |
|      503      | NOT_AUTHORIZED                        | When trying to do something that requires *authenticated* (yeah, the code is wrong, bummer) |                                 |

The fixableByYou flag means that the system works as intended, and that
some other input could have prevented the error from happening. For
example, a customer not having enough funds on his card account renders
an ECommerceException with the fixableByYou set to `true`. If, on the
other hand, we have problems communicating with the database, the
fixableByYou flag should be `false`. When this flag is `false` there is
nothing you can do except showing the customer the error
userErrorMessage.

The exception contains two error messages. One of them, the exception
message, the faultString, is a technical description of what went wrong,
and it´s not suitable to show to the end user. Just log it, and use it
for diagnosing and development. The userErrorMessage on the other hand,
we more or less require you to show to the customer if something went
wrong. The reason for requiring you to show it is that some of the
messages we return have a legal meaning not to be fiddle with.

