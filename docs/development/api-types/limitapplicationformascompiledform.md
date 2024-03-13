---
layout: page
title: limitApplicationFormasCompiledForm
permalink: /development/api-types/limitapplicationformascompiledform/
parent: Api Types
grand_parent: Development
---



# limitApplicationFormAsCompiledForm 

A complete limit application form in HTML format for embedding in the
webshop page. Upon submission, the form itself will generate the
application data to be submitted to Resurs Bank. The form contains HTML
elements and JavaScript based validation will be performed when the form
is submitted.  
Contains elements as defined in the following table.

| Component  | Type                                  | Occurs | Nillable? | Description                                                                                                                                                                                                                                                                       |
|------------|---------------------------------------|--------|-----------|-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| form       | **[nonEmptyString](/development/api-types/simple-types/)** | 1..1   | No        | The main form content. It should be placed somewhere in the HTML BODY element of the page. Note: The form contents are URL encoded and must be decoded before insertion into the page.                                                                                            |
| formHeader | string                                | 1..1   | No        | The form header data. It should be placed as a child of the HTML HEAD element of the page. Note: The form header is URL encoded and must be decoded before insertion into the page.                                                                                               |
| formOnLoad | string                                | 1..1   | No        | A JavaScript function call that needs to be performed once the page has been fully rendered. This is done by placing it as an on-load event of the HTML BODY element of the page. Note: The form on-load event is URL encoded and must be decoded before insertion into the page. |

