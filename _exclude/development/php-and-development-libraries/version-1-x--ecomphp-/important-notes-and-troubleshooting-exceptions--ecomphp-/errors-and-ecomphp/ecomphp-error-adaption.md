---
layout: page
title: Ecomphp Error Adaption
permalink: /development/php-and-development-libraries/version-1-x--ecomphp-/important-notes-and-troubleshooting-exceptions--ecomphp-/errors-and-ecomphp/ecomphp-error-adaption/
parent: Php And Development Libraries
grand_parent: Development
---



# EComPHP Error Adaption 
Created by Thomas Tornevall on 2019-05-10
EComPHP has been built to follow and normalize Resurs flows (and when
it's needed convert unsupported data to valid supported data), so that
we in the end always get the same kind of answers regardless of what
we'd like to do with Resurs API.

As described in [the notices about
updatePaymentReference-section](updatepaymentreference-notices) it is
highly valued that everything looks the same way all the time. However,
depending on the flow, the acting might differ a bit. This also includes
error handling. The later versions of EComPHP is written to be able to
handle stringified exception codes. Normally, [the Exception-class in
PHP](https://www.php.net/manual/en/exception.construct.php) only accept
long integers as a valid error code when exceptions are thrown. In some
cases Resurs Bank may throw exceptions that is against this standard,
with alpha numeric instead. EComPHP tries to handle this, with an
extended exception class.

## Default exception constructor
public Exception::\_\_construct (\[ string `$message` =
"" \[, int `$code` =
0 \[, [Throwable](https://www.php.net/manual/en/class.throwable.php) `$previous` = `NULL` \]\]\]
)

## EComPHP exception constructor
As of version 1.3.18 (or 1.1.45 in the older branches) out intention is
to start reusing our recent ResursException again (meaning, it is no
longer deprecated). The syntax for ResursException looks like this:

```xml
public function __construct(
    $message = 'Unknown exception',
    $code = 0,
    \Exception $previous = null,
    $stringifiedCode,
    $fromFunction = ''
)
```
## ResursExceptions parameters

| Parameter       | Description                                                                            |
|-----------------|----------------------------------------------------------------------------------------|
| message         | The regular error message thrown in exceptions.                                        |
| code            | The regular error code thrown in exceptions.                                           |
| previous        | The regular previous exception that was thrown in inherited exceptions.                |
| stringifiedCode | Everything that may be thrown by an API that is not a long integer.                    |
| fromFunction    | Extra variable that allows backtracing of the function where the exception was thrown. |

## Examples
With this exception handler we may be able to bypass exceptions that is
normally not allowed to use by PHP. It is still possible, referring to
our tests, to catch this exception with the standard exception syntax,
like this (from the test suite):

```xml
try {
    throw new \ResursException('Fail', 0, null, 'TEST_ERROR_CODE_AS_STRING', __FUNCTION__);
} catch (\Exception $e) {
    $firstCode = $e->getCode();
}
try {
    throw new \ResursException('Fail', 0, null, 'TEST_ERROR_CODE_AS_STRING_WITHOUT_CONSTANT', __FUNCTION__);
} catch (\Exception $e) {
    $secondCode = $e->getCode();
}
```
When running those two exceptions in the test, the responses should look
like this, in the end:

| code                                       | \$exception-\>getCode() result             | Why?                                                                                                                                                                                                                                        |
|--------------------------------------------|--------------------------------------------|---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| TEST_ERROR_CODE_AS_STRING                  | 1007                                       | Every constant that exists in the RESURS_EXCEPTIONS class will be translated to a numeric.                                                                                                                                                  |
| TEST_ERROR_CODE_AS_STRING_WITHOUT_CONSTANT | TEST_ERROR_CODE_AS_STRING_WITHOUT_CONSTANT | If the constant does not exist in the RESURS_EXCEPTIONS class EComPHP will leave the error code as it was from its initial state. The purpose is to keep compatibility intact if Resurs Ecommerce ever adds more error codes in the future. |

This exception however, supports to directly ask for the stringified
code by something like this: \$e-\>getStringifiedCode(). But to be
absolutely sure that we're not breaking anyting, the output will be
pushed through the regular getCode()-method.

