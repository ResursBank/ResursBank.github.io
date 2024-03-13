---
layout: page
title: Errors, Problem Solving And Corner Cases
permalink: /development/errorsproblemsolvingandcornercases/
parent: Development
has_children: true
has_toc: false
---


# Errors, problem solving and corner cases 
**Table of contents**
- [EComPHP custom errorcodes](/development/errors--problem-solving-and-corner-cases/ecomphp-custom-errorcodes/)
- [Error handling (Resurs error codes)](/development/errors--problem-solving-and-corner-cases/resurs-error-codes/)

This section covers known problems, fixes for them, workarounds and
other things related to solving problems.

> Using ngrok or proxies?Do not use publicly available proxies for your
> developing, like ngrok, and sites that are known to also spread
> malicious code and software as they normally is banned in our
> firewall.This covers callbacks, but could affect other functions
> too.One main reason could be that you are using a host or domain name
> that is flagged malicious in our systems. Ngrok is one of those that
> is usually scored to be blocked in outbound communications. If is
> highly recommended that you don't use such sites.

## How to handle errors
As we do have more flows than one, with different "calling techniques"
error handling may vary a bit between the flows. In its simplest way,
you can say that HTTP-HEAD responses partially covers exceptions,
however by only listening to a code from the http header may not reveal
the cause many times. EComPHP covers most of the error handling in
different steps, and an advice is to do something similar in other
software too - if possible.

For example, SOAP errors can be handled by checking both head and body.
Some exceptions sends a http head code above 500 (internal server error,
and similar). This might give a part of the error, so in this case, you
should consider checking for SoapExceptions too. In th body, details
about the errors usually reside in the detail element, under an
ECommerceError tag. Extracting this value could give you further
information about the error. Such errors are documented at [Error
handling (Resurs error codes)](/development/errors--problem-solving-and-corner-cases/resurs-error-codes/). EComPHP extracts this kind of
errors to find the root cause, and when unable to find an error it uses
its own - see [EComPHP custom errorcodes](/development/errors--problem-solving-and-corner-cases/ecomphp-custom-errorcodes/).

For the rest section, you could normally just check the http head
responses.

