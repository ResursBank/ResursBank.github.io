---
layout: page
title: Testing
permalink: /testing/
nav_order: 81
has_children: true
has_toc: false
---


# Testing 

> TESTING IN PRODUCTION ENVIRONMENTS Avoid running tests in the live
> environment. Read more below.Usually representatives and integrators
> are tempted to run tests in the live enviroment. Please don't The main
> consequence is that credit applications are made and these are saved
> by credit agencies (like UC). Later, when new credits are considered,
> these old applications will be weighted in. A lot of credit
> applications in a short period of time looks suspicious.  

> PS! Note that the test data does not work for Store Solution API, only
> our ecommerce flows as well as Resurs Checkout POS/PUSH.

Resources for testing the integration are collected here.

- [Test URLs](/testing/test-urls/)
- [Verify integration](/testing/verify-integration/)
- [Test Data - Sweden](/testing/test-data---sweden/)
- [Test Data - Denmark](/testing/test-data---denmark/)
- [Test Data - Finland](/testing/test-data---finland/)
- [Test Data - Norway](/testing/test-data---norway/)
- [Customer Field Validation (regex)](/testing/customer-field-validation/)

### SoapUI testing
Resurs Bank provides a set of public soapUI test cases to get you up and
running quickly. soupUI is the leading free test tool for interaction
with SOAP based WebServices.

By executing (and understanding) these test cases, you will gain a good
understanding of how the Resurs Bank eCommerce service works, which will
make the actual integration much easier.

Test suite:
```xml
<?xml version="1.0" encoding="UTF-8"?>
<con:soapui-project name="ecommerce public tests" resourceRoot="" soapui-version="5.0.0" abortOnError="false" runType="SEQUENTIAL" defaultScriptLanguage="Groovy" activeEnvironment="Default" xmlns:con="http://eviware.com/soapui/config"><con:description>The test suites for eHandel 4. Please see the individual suites for more information and documentation.

ExShop l/p: user / passWord
</con:description><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.actions.iface.tools.soapui.TestRunnerAction@values-local"><![CDATA[<xml-fragment xmlns:con="http://eviware.com/soapui/config">
  <con:entry key="Global Properties" value=""/>
  <con:entry key="TestSuite" value="integration"/>
  <con:entry key="Report to Generate" value=""/>
  <con:entry key="Password" value="gO9UaWH38D"/>
  <con:entry key="soapui-setings.xml Password" value=""/>
  <con:entry key="TestRunner Path" value=""/>
  <con:entry key="Tool Args" value=""/>
  <con:entry key="Ignore Errors" value="false"/>
  <con:entry key="Host:Port" value=""/>
  <con:entry key="WSS Password Type" value=""/>
  <con:entry key="Save Project" value="false"/>
  <con:entry key="Enable UI" value="false"/>
  <con:entry key="System Properties" value=""/>
  <con:entry key="Domain" value=""/>
  <con:entry key="Coverage Report" value="false"/>
  <con:entry key="Export JUnit Results" value="false"/>
  <con:entry key="Open Report" value="false"/>
  <con:entry key="Project Properties" value=""/>
  <con:entry key="Project Password" value=""/>
  <con:entry key="Export All" value="false"/>
  <con:entry key="Report Format(s)" value=""/>
  <con:entry key="TestCase" value="Existing Card - Book &amp; change external id"/>
  <con:entry key="Print Report" value="false"/>
  <con:entry key="Username" value="exshop"/>
  <con:entry key="Root Folder" value=""/>
  <con:entry key="Save After" value="false"/>
  <con:entry key="Add Settings" value="false"/>
  <con:entry key="Endpoint" value=""/>
</xml-fragment>]]></con:setting><con:setting id="com.eviware.soapui.impl.wsdl.actions.iface.tools.soapui.LoadTestRunnerAction@values-local"><![CDATA[<xml-fragment xmlns:con="http://eviware.com/soapui/config">
  <con:entry key="TestSuite" value="integration"/>
  <con:entry key="Global Properties" value=""/>
  <con:entry key="Report to Generate" value=""/>
  <con:entry key="Password" value="gO9UaWH38D"/>
  <con:entry key="soapui-setings.xml Password" value=""/>
  <con:entry key="TestRunner Path" value="C:\Program\soapUI4/bin"/>
  <con:entry key="Tool Args" value=""/>
  <con:entry key="LoadTest" value="I-S&amp;C - 10 threads / 60 minutes (simple)"/>
  <con:entry key="Host:Port" value=""/>
  <con:entry key="WSS Password Type" value=""/>
  <con:entry key="Save Project" value="true"/>
  <con:entry key="System Properties" value=""/>
  <con:entry key="Domain" value=""/>
  <con:entry key="Open Report" value="false"/>
  <con:entry key="Print Report Statistics" value="true"/>
  <con:entry key="Project Properties" value=""/>
  <con:entry key="Project Password" value=""/>
  <con:entry key="Report Format(s)" value=""/>
  <con:entry key="TestCase" value="Invoice - Sell &amp; Credit"/>
  <con:entry key="Username" value="exshop"/>
  <con:entry key="Root Folder" value="c:\Source\eHandel3\trunk\not modules\docs\Benchmarking\Test Results\"/>
  <con:entry key="Add Settings" value="true"/>
  <con:entry key="Save After" value="false"/>
  <con:entry key="Endpoint" value=""/>
  <con:entry key="ThreadCount" value=""/>
  <con:entry key="Limit" value=""/>
</xml-fragment>]]></con:setting></con:settings><con:interface xsi:type="con:WsdlInterface" wsaVersion="NONE" name="ShopFlowWebServiceImplPortBinding" type="wsdl" bindingName="{http://ecommerce.resurs.com/v4}ShopFlowWebServiceImplPortBinding" soapVersion="1_1" anonymous="optional" definition="https://test.resurs.com/ecommerce-test/ws/V4/ShopFlowService?wsdl" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:settings/><con:definitionCache type="TEXT" rootPart="https://test.resurs.com/ecommerce-test/ws/V4/ShopFlowService?wsdl"><con:part><con:url>https://test.resurs.com/ecommerce-test/ws/V4/ShopFlowService?wsdl</con:url><con:content><![CDATA[<definitions name="ShopFlowService" targetNamespace="http://ecommerce.resurs.com/v4" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:wsdl="http://schemas.xmlsoap.org/wsdl/" xmlns:tns="http://ecommerce.resurs.com/v4" xmlns:soap="http://schemas.xmlsoap.org/wsdl/soap/" xmlns:msg="http://ecommerce.resurs.com/v4/msg/shopflow" xmlns:exc="http://ecommerce.resurs.com/v4/msg/exception" xmlns="http://schemas.xmlsoap.org/wsdl/">
  <types>
    <xsd:schema targetNamespace="http://ecommerce.resurs.com/v4/shopflow">
      <xsd:import namespace="http://ecommerce.resurs.com/v4/msg/shopflow" schemaLocation="https://test.resurs.com/ecommerce-test/ws/V4/ShopFlowService?xsd=schemas/messages/ShopFlowServiceMessages.xsd"/>
      <xsd:import namespace="http://ecommerce.resurs.com/v4/msg/exception" schemaLocation="https://test.resurs.com/ecommerce-test/ws/V4/ShopFlowService?xsd=schemas/messages/Exceptions.xsd"/>
    </xsd:schema>
  </types>
  <message name="bookPaymentResponse">
    <part element="msg:bookPaymentResponse" name="parameters"></part>
  </message>
  <message name="getCustomerBonus">
    <part element="msg:getCustomerBonus" name="parameters"></part>
  </message>
  <message name="getAnnuityFactorsResponse">
    <part element="msg:getAnnuityFactorsResponse" name="parameters"></part>
  </message>
  <message name="invalidateCustomerIdentificationToken">
    <part element="msg:invalidateCustomerIdentificationToken" name="parameters"></part>
  </message>
  <message name="setDeliveryAddress">
    <part element="msg:setDeliveryAddress" name="parameters"></part>
  </message>
  <message name="issueCustomerIdentificationToken">
    <part element="msg:issueCustomerIdentificationToken" name="parameters"></part>
  </message>
  <message name="getPaymentMethodsResponse">
    <part element="msg:getPaymentMethodsResponse" name="parameters"></part>
  </message>
  <message name="invalidateCustomerIdentificationTokenResponse">
    <part element="msg:invalidateCustomerIdentificationTokenResponse" name="parameters"></part>
  </message>
  <message name="ECommerceErrorException">
    <part element="exc:ECommerceError" name="fault"></part>
  </message>
  <message name="getCostOfPurchaseHtmlResponse">
    <part element="msg:getCostOfPurchaseHtmlResponse" name="parameters"></part>
  </message>
  <message name="getAnnuityFactors">
    <part element="msg:getAnnuityFactors" name="parameters"></part>
  </message>
  <message name="setDeliveryAddressResponse">
    <part element="msg:setDeliveryAddressResponse" name="parameters"></part>
  </message>
  <message name="prepareSigning">
    <part element="msg:prepareSigning" name="parameters"></part>
  </message>
  <message name="startPaymentSessionResponse">
    <part element="msg:startPaymentSessionResponse" name="parameters"></part>
  </message>
  <message name="getAddress">
    <part element="msg:getAddress" name="parameters"></part>
  </message>
  <message name="getAddressResponse">
    <part element="msg:getAddressResponse" name="parameters"></part>
  </message>
  <message name="bookPayment">
    <part element="msg:bookPayment" name="parameters"></part>
  </message>
  <message name="submitLimitApplicationResponse">
    <part element="msg:submitLimitApplicationResponse" name="parameters"></part>
  </message>
  <message name="getPaymentMethods">
    <part element="msg:getPaymentMethods" name="parameters"></part>
  </message>
  <message name="prepareSigningResponse">
    <part element="msg:prepareSigningResponse" name="parameters"></part>
  </message>
  <message name="getCostOfPurchaseHtml">
    <part element="msg:getCostOfPurchaseHtml" name="parameters"></part>
  </message>
  <message name="startPaymentSession">
    <part element="msg:startPaymentSession" name="parameters"></part>
  </message>
  <message name="getCustomerBonusResponse">
    <part element="msg:getCustomerBonusResponse" name="parameters"></part>
  </message>
  <message name="submitLimitApplication">
    <part element="msg:submitLimitApplication" name="parameters"></part>
  </message>
  <message name="issueCustomerIdentificationTokenResponse">
    <part element="msg:issueCustomerIdentificationTokenResponse" name="parameters"></part>
  </message>
  <portType name="ShopFlowWebService">
    <wsdl:documentation xmlns="http://www.w3.org/1999/xhtml">The Shop Flow WebService provides all services available to the representative when the
purchase is still in the shop, i.e. up until the point the purchase is booked.</wsdl:documentation>
    <operation name="getCostOfPurchaseHtml">
      <wsdl:documentation xmlns="http://www.w3.org/1999/xhtml">
        Retrieves detailed cost of purchase information in HTML format.
        <p/>
        Resurs Bank is legaly obliged to show this information everywhere it's payment methods are marketed.
        <p/>
        This information either be fetched with this method or linked. If linking is preferred, the links returned
                with the payment method (
        <code>getPaymentMethods</code>
        ) is to be used.
      </wsdl:documentation>
      <input message="tns:getCostOfPurchaseHtml"></input>
      <output message="tns:getCostOfPurchaseHtmlResponse"></output>
      <fault message="tns:ECommerceErrorException" name="ECommerceErrorException">
        <wsdl:documentation xmlns="http://www.w3.org/1999/xhtml">Failed to retrieve the cost of purchase information. See error for details.</wsdl:documentation>
      </fault>
    </operation>
    <operation name="getPaymentMethods">
      <wsdl:documentation xmlns="http://www.w3.org/1999/xhtml">Retrieves detailed information on the payment methods available to the representative.</wsdl:documentation>
      <input message="tns:getPaymentMethods"></input>
      <output message="tns:getPaymentMethodsResponse"></output>
      <fault message="tns:ECommerceErrorException" name="ECommerceErrorException">
        <wsdl:documentation xmlns="http://www.w3.org/1999/xhtml">Failed to retrieve the payment methods. See error for details.</wsdl:documentation>
      </fault>
    </operation>
    <operation name="getAnnuityFactors">
      <wsdl:documentation xmlns="http://www.w3.org/1999/xhtml">Retrieves the annuity factors for a given payment method.</wsdl:documentation>
      <input message="tns:getAnnuityFactors"></input>
      <output message="tns:getAnnuityFactorsResponse"></output>
      <fault message="tns:ECommerceErrorException" name="ECommerceErrorException">
        <wsdl:documentation xmlns="http://www.w3.org/1999/xhtml">Failed to retrieve the annuity factors. See error for details.</wsdl:documentation>
      </fault>
    </operation>
    <operation name="getAddress">
      <wsdl:documentation xmlns="http://www.w3.org/1999/xhtml">
        Retrieves address information. Currently only works in sweden!
        <br/>
        Note that the
        <code>customerType</code>
        parameter is optional right now, but in short
                notice this will be required (minOccurs=1)
      </wsdl:documentation>
      <input message="tns:getAddress"></input>
      <output message="tns:getAddressResponse"></output>
      <fault message="tns:ECommerceErrorException" name="ECommerceErrorException">
        <wsdl:documentation xmlns="http://www.w3.org/1999/xhtml">Failed to retrieve the address information. See error for details.</wsdl:documentation>
      </fault>
    </operation>
    <operation name="startPaymentSession">
      <wsdl:documentation xmlns="http://www.w3.org/1999/xhtml">Initializes a new payment session.</wsdl:documentation>
      <input message="tns:startPaymentSession"></input>
      <output message="tns:startPaymentSessionResponse"></output>
      <fault message="tns:ECommerceErrorException" name="ECommerceErrorException">
        <wsdl:documentation xmlns="http://www.w3.org/1999/xhtml">Failed to initialize the payment session. See error for details.</wsdl:documentation>
      </fault>
    </operation>
    <operation name="submitLimitApplication">
      <wsdl:documentation xmlns="http://www.w3.org/1999/xhtml">
        Applies for a limit for the purchase.
        <br/>
        <strong>NB:</strong>
        Please note that this may include calling of an external
                credit evaluation service, which in turn may lead to an information letter
                being sent to the customer.
      </wsdl:documentation>
      <input message="tns:submitLimitApplication"></input>
      <output message="tns:submitLimitApplicationResponse"></output>
      <fault message="tns:ECommerceErrorException" name="ECommerceErrorException">
        <wsdl:documentation xmlns="http://www.w3.org/1999/xhtml">Failed to submit the limit application. See error for details.</wsdl:documentation>
      </fault>
    </operation>
    <operation name="setDeliveryAddress">
      <wsdl:documentation xmlns="http://www.w3.org/1999/xhtml">
        Specifies a delivery address for the payment.
        <br/>
        <strong>NB:</strong>
        Please note that changing the delivery address from the
                default one may lead to higher requirements on customer signatures. (It may
                lead to the customer having to sign the purchase electronically.)
      </wsdl:documentation>
      <input message="tns:setDeliveryAddress"></input>
      <output message="tns:setDeliveryAddressResponse"></output>
      <fault message="tns:ECommerceErrorException" name="ECommerceErrorException">
        <wsdl:documentation xmlns="http://www.w3.org/1999/xhtml">Failed to set the delivery address. See error for details.</wsdl:documentation>
      </fault>
    </operation>
    <operation name="prepareSigning">
      <wsdl:documentation xmlns="http://www.w3.org/1999/xhtml">
        Initializes a signing session.
        <br/>
        This is only necessary if there is to
                be a signing. However, calling the method just in case may be a good idea.
      </wsdl:documentation>
      <input message="tns:prepareSigning"></input>
      <output message="tns:prepareSigningResponse"></output>
      <fault message="tns:ECommerceErrorException" name="ECommerceErrorException">
        <wsdl:documentation xmlns="http://www.w3.org/1999/xhtml">Failed to prepare the signing session. See error for details.</wsdl:documentation>
      </fault>
    </operation>
    <operation name="bookPayment">
      <wsdl:documentation xmlns="http://www.w3.org/1999/xhtml">Books the payment. This reserves the purchase amount on the customer's account.
                Effectively, it also ends the shop flow.</wsdl:documentation>
      <input message="tns:bookPayment"></input>
      <output message="tns:bookPaymentResponse"></output>
      <fault message="tns:ECommerceErrorException" name="ECommerceErrorException">
        <wsdl:documentation xmlns="http://www.w3.org/1999/xhtml">Failed to book the payment. See error for details.</wsdl:documentation>
      </fault>
    </operation>
    <operation name="getCustomerBonus">
      <wsdl:documentation xmlns="http://www.w3.org/1999/xhtml">
        Fetches the bonus the customer have, if any.
        <p/>
        <a href="https://test.resurs.com/docs/x/CAAv">Read more about bonus</a>
      </wsdl:documentation>
      <input message="tns:getCustomerBonus"></input>
      <output message="tns:getCustomerBonusResponse"></output>
      <fault message="tns:ECommerceErrorException" name="ECommerceErrorException">
        <wsdl:documentation xmlns="http://www.w3.org/1999/xhtml">If the means of identification (token or card information) is invalid an INVALID_IDENTIFICATION(28)
                    will be returned.</wsdl:documentation>
      </fault>
    </operation>
    <operation name="issueCustomerIdentificationToken">
      <wsdl:documentation xmlns="http://www.w3.org/1999/xhtml">
        Issues a customer identification token that can identify this customer in further operations. These
                functions do require the customer to be identified, and they require either a token, or information
                to identify the customer.
        <p/>
        Tokens are intended to be saved with the user profile in the web shop. In this way we delegate
                identification of the customer to the web shop after the initial identification is done.
      </wsdl:documentation>
      <input message="tns:issueCustomerIdentificationToken"></input>
      <output message="tns:issueCustomerIdentificationTokenResponse"></output>
      <fault message="tns:ECommerceErrorException" name="ECommerceErrorException">
        <wsdl:documentation xmlns="http://www.w3.org/1999/xhtml">If too many tokens are issued, the TOO_MANY_TOKENS(29) fault is returned.</wsdl:documentation>
      </fault>
    </operation>
    <operation name="invalidateCustomerIdentificationToken">
      <wsdl:documentation xmlns="http://www.w3.org/1999/xhtml">Invalidates customer identification token(s).</wsdl:documentation>
      <input message="tns:invalidateCustomerIdentificationToken"></input>
      <output message="tns:invalidateCustomerIdentificationTokenResponse"></output>
      <fault message="tns:ECommerceErrorException" name="ECommerceErrorException">
        <wsdl:documentation xmlns="http://www.w3.org/1999/xhtml">If the token(s) is invalid or does not exist we return INVALID_IDENTIFICATION(28) if no such
                    token(s) exist</wsdl:documentation>
      </fault>
    </operation>
  </portType>
  <binding name="ShopFlowWebServiceImplPortBinding" type="tns:ShopFlowWebService">
    <soap:binding style="document" transport="http://schemas.xmlsoap.org/soap/http"/>
    <operation name="getCostOfPurchaseHtml">
      <soap:operation soapAction=""/>
      <input>
        <soap:body use="literal"/>
      </input>
      <output>
        <soap:body use="literal"/>
      </output>
      <fault name="ECommerceErrorException">
        <soap:fault name="ECommerceErrorException" use="literal"/>
      </fault>
    </operation>
    <operation name="getPaymentMethods">
      <soap:operation soapAction=""/>
      <input>
        <soap:body use="literal"/>
      </input>
      <output>
        <soap:body use="literal"/>
      </output>
      <fault name="ECommerceErrorException">
        <soap:fault name="ECommerceErrorException" use="literal"/>
      </fault>
    </operation>
    <operation name="getAnnuityFactors">
      <soap:operation soapAction=""/>
      <input>
        <soap:body use="literal"/>
      </input>
      <output>
        <soap:body use="literal"/>
      </output>
      <fault name="ECommerceErrorException">
        <soap:fault name="ECommerceErrorException" use="literal"/>
      </fault>
    </operation>
    <operation name="getAddress">
      <soap:operation soapAction=""/>
      <input>
        <soap:body use="literal"/>
      </input>
      <output>
        <soap:body use="literal"/>
      </output>
      <fault name="ECommerceErrorException">
        <soap:fault name="ECommerceErrorException" use="literal"/>
      </fault>
    </operation>
    <operation name="getCustomerBonus">
      <soap:operation soapAction=""/>
      <input>
        <soap:body use="literal"/>
      </input>
      <output>
        <soap:body use="literal"/>
      </output>
      <fault name="ECommerceErrorException">
        <soap:fault name="ECommerceErrorException" use="literal"/>
      </fault>
    </operation>
    <operation name="invalidateCustomerIdentificationToken">
      <soap:operation soapAction=""/>
      <input>
        <soap:body use="literal"/>
      </input>
      <output>
        <soap:body use="literal"/>
      </output>
      <fault name="ECommerceErrorException">
        <soap:fault name="ECommerceErrorException" use="literal"/>
      </fault>
    </operation>
    <operation name="issueCustomerIdentificationToken">
      <soap:operation soapAction=""/>
      <input>
        <soap:body use="literal"/>
      </input>
      <output>
        <soap:body use="literal"/>
      </output>
      <fault name="ECommerceErrorException">
        <soap:fault name="ECommerceErrorException" use="literal"/>
      </fault>
    </operation>
    <operation name="startPaymentSession">
      <soap:operation soapAction=""/>
      <input>
        <soap:body use="literal"/>
      </input>
      <output>
        <soap:body use="literal"/>
      </output>
      <fault name="ECommerceErrorException">
        <soap:fault name="ECommerceErrorException" use="literal"/>
      </fault>
    </operation>
    <operation name="submitLimitApplication">
      <soap:operation soapAction=""/>
      <input>
        <soap:body use="literal"/>
      </input>
      <output>
        <soap:body use="literal"/>
      </output>
      <fault name="ECommerceErrorException">
        <soap:fault name="ECommerceErrorException" use="literal"/>
      </fault>
    </operation>
    <operation name="setDeliveryAddress">
      <soap:operation soapAction=""/>
      <input>
        <soap:body use="literal"/>
      </input>
      <output>
        <soap:body use="literal"/>
      </output>
      <fault name="ECommerceErrorException">
        <soap:fault name="ECommerceErrorException" use="literal"/>
      </fault>
    </operation>
    <operation name="prepareSigning">
      <soap:operation soapAction=""/>
      <input>
        <soap:body use="literal"/>
      </input>
      <output>
        <soap:body use="literal"/>
      </output>
      <fault name="ECommerceErrorException">
        <soap:fault name="ECommerceErrorException" use="literal"/>
      </fault>
    </operation>
    <operation name="bookPayment">
      <soap:operation soapAction=""/>
      <input>
        <soap:body use="literal"/>
      </input>
      <output>
        <soap:body use="literal"/>
      </output>
      <fault name="ECommerceErrorException">
        <soap:fault name="ECommerceErrorException" use="literal"/>
      </fault>
    </operation>
  </binding>
  <service name="ShopFlowService">
    <port binding="tns:ShopFlowWebServiceImplPortBinding" name="ShopFlowWebServiceImplPort">
      <soap:address location="https://test.resurs.com/ecommerce-test/ws/V4/ShopFlowService"/>
    </port>
  </service>
</definitions>]]></con:content><con:type>http://schemas.xmlsoap.org/wsdl/</con:type></con:part><con:part><con:url>https://test.resurs.com/ecommerce-test/ws/V4/ShopFlowService?xsd=schemas/messages/ShopFlowServiceMessages.xsd</con:url><con:content><![CDATA[<schema targetNamespace="http://ecommerce.resurs.com/v4/msg/shopflow" version="4.0" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:types="http://ecommerce.resurs.com/v4/types/shopflow" xmlns:tns="http://ecommerce.resurs.com/v4/msg/shopflow" xmlns:common="http://ecommerce.resurs.com/v4/types/common" xmlns="http://www.w3.org/2001/XMLSchema">
  <import namespace="http://ecommerce.resurs.com/v4/types/shopflow" schemaLocation="https://test.resurs.com/ecommerce-test/ws/V4/ShopFlowService?xsd=schemas/types/shopflow.xsd"/>
  <import namespace="http://ecommerce.resurs.com/v4/types/common" schemaLocation="https://test.resurs.com/ecommerce-test/ws/V4/ShopFlowService?xsd=schemas/types/common.xsd"/>
  <element name="getCostOfPurchaseHtml" type="tns:getCostOfPurchaseHtml"/>
  <element name="getCostOfPurchaseHtmlResponse" type="tns:getCostOfPurchaseHtmlResponse"/>
  <element name="getPaymentMethods" type="tns:getPaymentMethods"/>
  <element name="getPaymentMethodsResponse" type="tns:getPaymentMethodsResponse"/>
  <element name="getAnnuityFactors" type="tns:getAnnuityFactors"/>
  <element name="getAnnuityFactorsResponse" type="tns:getAnnuityFactorsResponse"/>
  <element name="getAddress" type="tns:getAddress"/>
  <element name="getAddressResponse" type="tns:getAddressResponse"/>
  <element name="getCustomerBonus" type="tns:getCustomerBonus"/>
  <element name="getCustomerBonusResponse" type="tns:getCustomerBonusResponse"/>
  <element name="issueCustomerIdentificationToken" type="tns:issueCustomerIdentificationToken"/>
  <element name="issueCustomerIdentificationTokenResponse" type="tns:issueCustomerIdentificationTokenResponse"/>
  <element name="invalidateCustomerIdentificationToken" type="tns:invalidateCustomerIdentificationToken"/>
  <element name="invalidateCustomerIdentificationTokenResponse" type="tns:invalidateCustomerIdentificationTokenResponse"/>
  <element name="startPaymentSession" type="tns:startPaymentSession"/>
  <element name="startPaymentSessionResponse" type="tns:startPaymentSessionResponse"/>
  <element name="submitLimitApplication" type="tns:submitLimitApplication"/>
  <element name="submitLimitApplicationResponse" type="tns:submitLimitApplicationResponse"/>
  <element name="setDeliveryAddress" type="tns:setDeliveryAddress"/>
  <element name="setDeliveryAddressResponse" type="tns:setDeliveryAddressResponse"/>
  <element name="prepareSigning" type="tns:prepareSigning"/>
  <element name="prepareSigningResponse" type="tns:prepareSigningResponse"/>
  <element name="bookPayment" type="tns:bookPayment"/>
  <element name="bookPaymentResponse" type="tns:bookPaymentResponse"/>
  <complexType name="getCostOfPurchaseHtml">
    <sequence>
      <element name="paymentMethodId" type="common:id">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The identity of the payment method for which to retrieve the detailed cost of purchase information.</xsd:documentation>
        </annotation>
      </element>
      <element name="amount" type="common:positiveDecimal">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The amount on which to base the calculations.</xsd:documentation>
        </annotation>
      </element>
    </sequence>
  </complexType>
  <complexType name="getCostOfPurchaseHtmlResponse">
    <sequence>
      <element name="return" type="string">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">A styleable HTML table containing the cost of purchase information.</xsd:documentation>
        </annotation>
      </element>
    </sequence>
  </complexType>
  <complexType name="getPaymentMethods">
    <sequence/>
  </complexType>
  <complexType name="getPaymentMethodsResponse">
    <sequence>
      <element maxOccurs="unbounded" minOccurs="0" name="return" type="types:paymentMethod">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">A list of all payment methods available to the representative.</xsd:documentation>
        </annotation>
      </element>
    </sequence>
  </complexType>
  <complexType name="getAnnuityFactors">
    <sequence>
      <element name="paymentMethodId" type="common:id">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">
            The identity of the payment method for which to retrieve the annuity factors.
            <br/>
            While
                        this makes most sense for payment methods of type NEW_ACCOUNT, it is possible to use for
                        all types. (See PaymentMethodType for more information about payment method types.)
          </xsd:documentation>
        </annotation>
      </element>
    </sequence>
  </complexType>
  <complexType name="getAnnuityFactorsResponse">
    <sequence>
      <element maxOccurs="unbounded" minOccurs="0" name="return" type="types:annuityFactor">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">
            A list of with one annuity factor per payment plan of the payment method.
            <br/>
            There are typically
                        between three and six payment plans per payment method.
          </xsd:documentation>
        </annotation>
      </element>
    </sequence>
  </complexType>
  <complexType name="getAddress">
    <sequence>
      <element name="governmentId" type="string">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The government identity of the customer for which to retrieve the address.</xsd:documentation>
        </annotation>
      </element>
      <element minOccurs="0" name="customerType" type="common:customerType">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">
            The type of customer to retrieve.
            <br/>
            In many cases, this is easily determined from the
                        government identity, but for Swedish companies in sole proprietorship, the same identity is
                        used for both the person as a natural customer, and the company as a legal customer.
          </xsd:documentation>
        </annotation>
      </element>
      <element minOccurs="0" name="customerIpAddress" type="string">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">
            The IP address from which the customer has accessed the service. To prevent bashing. This
                        parameter is
            <b>mandatory</b>
            even if it has minOccurs set to zero.
          </xsd:documentation>
        </annotation>
      </element>
    </sequence>
  </complexType>
  <complexType name="getAddressResponse">
    <sequence>
      <element name="return" type="common:address">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">If a match could be made, the customer address.</xsd:documentation>
        </annotation>
      </element>
    </sequence>
  </complexType>
  <complexType name="getCustomerBonus">
    <sequence>
      <element name="customerIdentification" type="types:customerIdentification">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">Information used to identify the customer, in order to be able to retrieve its bonus.</xsd:documentation>
        </annotation>
      </element>
    </sequence>
  </complexType>
  <complexType name="getCustomerBonusResponse">
    <sequence>
      <element name="return" type="types:bonus">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The number of points the customer have.</xsd:documentation>
        </annotation>
      </element>
    </sequence>
  </complexType>
  <complexType name="issueCustomerIdentificationToken">
    <sequence>
      <element name="customerCard" type="types:customerCard">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">A card tied to a customer. A card number is assumed to only be known by one customer, and thus
                        identifying the customer.</xsd:documentation>
        </annotation>
      </element>
      <element name="customerIpAddress" type="string">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The IP address from which the customer has
                        accessed the service. To prevent bashing, and enable better audit logging.</xsd:documentation>
        </annotation>
      </element>
    </sequence>
  </complexType>
  <complexType name="issueCustomerIdentificationTokenResponse">
    <sequence>
      <element minOccurs="0" name="return" type="types:customerIdentificationResponse">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">
            If the customer could be identified a
            <tt>customerIdentificationResponse</tt>
            is returned. If
                        else no element is returned.
          </xsd:documentation>
        </annotation>
      </element>
    </sequence>
  </complexType>
  <complexType name="invalidateCustomerIdentificationToken">
    <sequence>
      <sequence>
        <element maxOccurs="unbounded" minOccurs="0" name="token" type="types:identificationToken">
          <annotation>
            <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">
              A card tied to a customer. A card number is assumed to only be known by one customer, and thus
                            identifying the customer.
              <p/>
              * Should either set token  or governmentId and customerType.
            </xsd:documentation>
          </annotation>
        </element>
      </sequence>
      <sequence>
        <element minOccurs="0" name="governmentId" type="common:nonEmptyString">
          <annotation>
            <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">A card tied to a customer. A card number is assumed to only be known by one customer, and thus
                            identifying the customer.</xsd:documentation>
          </annotation>
        </element>
        <element minOccurs="0" name="customerType" type="common:customerType">
          <annotation>
            <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">
              The type of customer to retrieve.
              <br/>
              In many cases, this is easily determined from the
                            government identity, but for Swedish companies in sole proprietorship, the same identity is
                            used for both the person as a natural customer, and the company as a legal customer.
              <p/>
              If this value is omitted we will try to parse the government id as a natural first and secondly
                            as a legal entity.
              <p/>
              * Should either set token  or governmentId and customerType.
            </xsd:documentation>
          </annotation>
        </element>
      </sequence>
    </sequence>
  </complexType>
  <complexType name="invalidateCustomerIdentificationTokenResponse">
    <sequence/>
  </complexType>
  <complexType name="startPaymentSession">
    <sequence>
      <element minOccurs="0" name="preferredId" nillable="true" type="common:id">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">
            The preferred identity of the payment session.
            <br/>
            The identity provided here will be used as the key when accessing the payment in any
                        subsequent requests. If no value is given Resurs Bank will generate one (an UUID).
          </xsd:documentation>
        </annotation>
      </element>
      <element name="paymentMethodId" type="common:id">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">
            The identity of the payment method to be used.
            <br/>
            Use
            <code>getPaymentMethods</code>
            to get available payment methods
          </xsd:documentation>
        </annotation>
      </element>
      <element minOccurs="0" name="customerIpAddress" nillable="true" type="string">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">
            The IP address from which the customer has accessed the service.
            <br/>
            Used for audit logging.
          </xsd:documentation>
        </annotation>
      </element>
      <element minOccurs="0" name="formAction" nillable="true" type="common:nonEmptyString">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">
            If a compiled application form (HTML) is to be used, it is possible to provide the form
                        action. This allows the representative to define the URI to which the form data is to be
                        POST:ed. The form data parameter is named
            <code>formdata</code>
            .
          </xsd:documentation>
        </annotation>
      </element>
      <element name="paymentSpec" type="common:paymentSpec">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The payment specification.</xsd:documentation>
        </annotation>
      </element>
    </sequence>
  </complexType>
  <complexType name="startPaymentSessionResponse">
    <sequence>
      <element name="return" type="types:paymentSession">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The payment session details.</xsd:documentation>
        </annotation>
      </element>
    </sequence>
  </complexType>
  <complexType name="submitLimitApplication">
    <sequence>
      <element name="paymentSessionId" type="common:id">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The identity of the payment session.</xsd:documentation>
        </annotation>
      </element>
      <element minOccurs="0" name="yourCustomerId" nillable="true" type="xsd:string">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The representative customer identity.</xsd:documentation>
        </annotation>
      </element>
      <element name="formDataResponse" type="common:nonEmptyString">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">
            The form data as submitted by the compiled form.
            <br/>
            <strong>NB:</strong>
            This can
                        also be generated by the representative site based on the form specification.
          </xsd:documentation>
        </annotation>
      </element>
      <element minOccurs="0" name="billingAddress" nillable="true" type="common:address">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">
            Billing address, i e the address were the payee resides.
            <br/>
            <em>If</em>
            the billing address is collected in the payment flow it is required to be
                        sent in into this field.
            <br/>
            This is true even if the address was fetched with the
            <code>getAddress</code>
            function
            <strong>if</strong>
            the customer can change the address after it's been fetched.
                        If the address isn't acceptable by Resurs Bank the credit will be DENIED. If the address is the
                        address where the customer is registered, the address will be accepted. In other cases it most
                        likely will be rejected.
          </xsd:documentation>
        </annotation>
      </element>
      <element minOccurs="0" name="bonusOverride" nillable="true" type="xsd:nonNegativeInteger">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">
            Bonus correction, will override the the bonus points from startPaymentSession.
            <br/>
            Use this method if bonus is not available in startPaymentSession.
                        Any bonus sent in the payment specifcation of startPaymentSession will be overridden
                        by this number of bonus points.
          </xsd:documentation>
        </annotation>
      </element>
    </sequence>
  </complexType>
  <complexType name="submitLimitApplicationResponse">
    <sequence>
      <element name="return" type="common:limit">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The limit details.</xsd:documentation>
        </annotation>
      </element>
    </sequence>
  </complexType>
  <complexType name="setDeliveryAddress">
    <sequence>
      <element name="paymentSessionId" type="common:id">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The identity of the payment session.</xsd:documentation>
        </annotation>
      </element>
      <element name="address" type="common:address">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The new delivery address.</xsd:documentation>
        </annotation>
      </element>
    </sequence>
  </complexType>
  <complexType name="setDeliveryAddressResponse">
    <sequence/>
  </complexType>
  <complexType name="prepareSigning">
    <sequence>
      <element name="paymentSessionId" type="common:id">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The identity of the payment session.</xsd:documentation>
        </annotation>
      </element>
      <element name="successUrl" type="anyURI">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The URL to which to the eCommerce platform service is to
                        redirect the customer if the signing was successful.</xsd:documentation>
        </annotation>
      </element>
      <element name="failUrl" type="anyURI">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The URL to which to the eCommerce platform service is to
                        redirect the customer if the signing was unsuccessful.</xsd:documentation>
        </annotation>
      </element>
      <element minOccurs="0" name="forceSigning" nillable="true" type="xsd:boolean">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">If true forces the payment to require a signing.
                        If not set or set to false, Resurs Bank will decide if it should be signed or not.</xsd:documentation>
        </annotation>
      </element>
    </sequence>
  </complexType>
  <complexType name="prepareSigningResponse">
    <sequence>
      <element minOccurs="0" name="return" type="anyURI">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">
            The URL to which the customer is to be redirected to perform the signing.
            <br/>
            <strong>NB:</strong>
            If no signing is required, no URL will be returned.
          </xsd:documentation>
        </annotation>
      </element>
    </sequence>
  </complexType>
  <complexType name="bookPayment">
    <sequence>
      <element name="paymentSessionId" type="common:id">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The identity of the payment session.</xsd:documentation>
        </annotation>
      </element>
      <element minOccurs="0" name="preferredPaymentId" nillable="true" type="common:id">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The identity of the payment once booked.</xsd:documentation>
        </annotation>
      </element>
      <element default="false" name="waitForFraudControl" type="boolean">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">Whether or not the service should wait until the fraud control is performed.
                        If not, the fraud control is performed asynchronously.</xsd:documentation>
        </annotation>
      </element>
      <element default="false" name="annulIfFrozen" type="boolean">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">
            Whether or not to automatically annul the payment if the fraud control results
                        in it being frozen.
            <br/>
            This is typically used if the fraud control is performed asynchronously.
          </xsd:documentation>
        </annotation>
      </element>
      <element maxOccurs="unbounded" minOccurs="0" name="metaData" type="common:mapEntry">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">Any metaData that is to be added to the payment.</xsd:documentation>
        </annotation>
      </element>
      <element name="priority" type="int">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The payment priority.</xsd:documentation>
        </annotation>
      </element>
      <element minOccurs="0" name="storeId" nillable="true" type="common:id">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The identity of the actual store for the representative. It determines were the money and
                        store accounting is sent. If no is given we fallback to a default one. You can receive the list of stores
                        tied to your user (representative) if you wish. Normaly this list would just contain one entry, the
                        default store, representing your webshop</xsd:documentation>
        </annotation>
      </element>
    </sequence>
  </complexType>
  <complexType name="bookPaymentResponse">
    <sequence>
      <element name="return" type="types:bookingResult">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The result of the payment booking.</xsd:documentation>
        </annotation>
      </element>
    </sequence>
  </complexType>
</schema>]]></con:content><con:type>http://www.w3.org/2001/XMLSchema</con:type></con:part><con:part><con:url>https://test.resurs.com/ecommerce-test/ws/V4/ShopFlowService?xsd=schemas/types/shopflow.xsd</con:url><con:content><![CDATA[<schema targetNamespace="http://ecommerce.resurs.com/v4/types/shopflow" version="4.0" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:tns="http://ecommerce.resurs.com/v4/types/shopflow" xmlns:common="http://ecommerce.resurs.com/v4/types/common" xmlns="http://www.w3.org/2001/XMLSchema">
  <import namespace="http://ecommerce.resurs.com/v4/types/common" schemaLocation="https://test.resurs.com/ecommerce-test/ws/V4/ShopFlowService?xsd=schemas/types/common.xsd"/>
  <complexType name="paymentMethod">
    <annotation>
      <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">
        Describes a way in which a purchase can be made. Typically, a representative will have two or more
        <a href="https://test.resurs.com/docs/x/7AAF">payment methods.</a>
      </xsd:documentation>
    </annotation>
    <sequence>
      <element name="id" type="common:id">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The identity of the payment method.</xsd:documentation>
        </annotation>
      </element>
      <element name="description" type="string">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">A textual description of the payment method. This is a help to the developer and should not be
                        shown
                        in the shop. That wording the merchant needs to figure out himself.</xsd:documentation>
        </annotation>
      </element>
      <element maxOccurs="unbounded" minOccurs="0" name="legalInfoLinks" type="tns:webLink">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">
            A link to a pages at Resurs Bank displaying miscellaneous legal information, such as
                        annual-percentage-rate (APR) details etc.
            <br/>
            <strong>N.B.</strong>
            The representative
            <strong>must</strong>
            display these links,
            <strong>or</strong>
            embed
                        the output from the
            <code>ShopFlowService.getCostOfPurchaseHtml(...)</code>
            method into their
                        shop. Irrespective of how the representative decides to implement it, the information
            <strong>must</strong>
            be available whenever a Resurs Bank payment method is presented.
          </xsd:documentation>
        </annotation>
      </element>
      <element name="minLimit" type="common:positiveDecimal">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">
            The minimum amount for which a limit application can be performed on this payment method.
                        If the payment amount is less than the this, the limit application will be performed on
                        the minimum amount.
            <br/>
            <strong>N.B.</strong>
            This information
            <strong>must not</strong>
            be presented to the customer.
          </xsd:documentation>
        </annotation>
      </element>
      <element name="maxLimit" type="common:positiveDecimal">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">
            The maximum amount for which a limit application can be performed on this payment method.
                        If the payment amount is greater than this, the payment method may not be used.
            <br/>
            <strong>N.B.</strong>
            This information
            <strong>must not</strong>
            be presented to the customer.
          </xsd:documentation>
        </annotation>
      </element>
      <element name="type" type="common:paymentMethodType">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">Of which type the payment method is. Can be used to group payment methods, and/or, apply some
                        other
                        logic to them.</xsd:documentation>
        </annotation>
      </element>
      <element maxOccurs="unbounded" minOccurs="0" name="customerType" nillable="true" type="common:customerType">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The type of customer the PaymentMethod is valid for.</xsd:documentation>
        </annotation>
      </element>
    </sequence>
  </complexType>
  <complexType name="webLink">
    <annotation>
      <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">
        Represents a link to be placed on a page.
        <br/>
        Usage (if appendPriceLast is false):
        <code>&lt;a href="url">endUserDescription&lt;/a></code>
        <br/>
        If appendPriceLast is true, the page that is linked is expected to show some information based on a
                particular amount, such as the price of a given product, and the URL is to be completed by appending
                the price of that product to the url.
      </xsd:documentation>
    </annotation>
    <sequence>
      <element name="appendPriceLast" type="boolean">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">
            Whether or not the URL needs to be suffixed by an amount.
            <br/>
            <strong>N.B.</strong>
            Please note that the amount is an integer!
            <br/>
            The web link URL "http://site.com/cgi?param1=1&amp;price=" and an amount of SEK 999.90
                        would give the complete URL "http://site.com/cgi?param1=1&amp;price=1000".
          </xsd:documentation>
        </annotation>
      </element>
      <element name="endUserDescription" type="common:nonEmptyString">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The link description. (&lt;a href="url">endUserDescription&lt;/a>)</xsd:documentation>
        </annotation>
      </element>
      <element name="url" type="common:nonEmptyString">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">
            The
            <strong>possibly incomplete</strong>
            URL to link to.
            <br/>
            See appendPriceLast
                        for more details!
          </xsd:documentation>
        </annotation>
      </element>
    </sequence>
  </complexType>
  <complexType name="annuityFactor">
    <annotation>
      <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">
        The annuity factor is a value that when multiplied with an amount will show the monthly
                installment cost, thus making the product appear more affordable to the customer.
        <p>For example:</p>
        <ul>
          <li>factor = 0.083333</li>
          <li>paymentPlanName = 12 months interest free</li>
          <li>productPrice = 10000 SEK</li>
        </ul>
        This means that the installment plan for this payment using the specified payment method
                is
        <i>"833 SEK a month, 12 months interest free!"</i>
        <br/>
        <strong>NB:</strong>
        Please be aware that whenever this kind of information is presented,
                it
        <strong>must</strong>
        be accompanied by the terms of the credit. See
        <tt class="method">PaymentMethodsInfoWebService.getLegalInformation</tt>
        and
        <tt class="data">PaymentMethod#legalInfoLinks</tt>
        for more information.
      </xsd:documentation>
    </annotation>
    <sequence>
      <element name="factor" type="common:positiveDecimal">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The annuity factor, i.e. the number to be multiplied with the payment amount to get
                        the monthly installment. This number can be larger than 1! (1 month payment plan with
                        administrative fees
                        is such an example)</xsd:documentation>
        </annotation>
      </element>
      <element name="duration" type="positiveInteger">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The duration of the installment period in months.</xsd:documentation>
        </annotation>
      </element>
      <element name="paymentPlanName" type="common:nonEmptyString">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The full name of the payment plan. This should be shown after the calculated monthly
                        installment.</xsd:documentation>
        </annotation>
      </element>
    </sequence>
  </complexType>
  <complexType name="paymentSession">
    <annotation>
      <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The detailed information about the payment
                session.</xsd:documentation>
    </annotation>
    <sequence>
      <element name="id" type="common:id">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">
            The identity of the payment session.
            <br/>
            If one was specified by the representative,
                        it will be used, otherwise it will be generated.
          </xsd:documentation>
        </annotation>
      </element>
      <element name="expirationTime" type="dateTime">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">
            When the payment session expires.
            <br/>
            Sessions will be automatically pruned after the
                        expiration time, and if the payment is still valid, a new session must be created.
          </xsd:documentation>
        </annotation>
      </element>
      <element name="limitApplicationFormAsObjectGraph" type="tns:limitApplicationFormAsObjectGraph">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The limit application form as a graph of object. This is for use by representatives that
                        want to generate the form themselves.</xsd:documentation>
        </annotation>
      </element>
      <element minOccurs="0" name="limitApplicationFormAsCompiledForm" type="tns:limitApplicationFormAsCompiledForm">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">
            The limit application form as compiled HTML. This is for use by representatives that want
                        to use the form created by Resurs Bank.
            <br/>
            <strong>NB:</strong>
            If no form action was supplied, this will be empty.
          </xsd:documentation>
        </annotation>
      </element>
    </sequence>
  </complexType>
  <complexType name="bookingResult">
    <annotation>
      <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The result of the payment booking attempt.</xsd:documentation>
    </annotation>
    <sequence>
      <element name="paymentId" type="common:id">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">
            The identity of the payment.
            <br/>
            <strong>NB:</strong>
            This is
            <strong>not</strong>
            the same as the payment session identity.
          </xsd:documentation>
        </annotation>
      </element>
      <element name="fraudControlStatus" type="tns:fraudControlStatus">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The result of the fraud control. This is only available if the fraud control was made
                        synchronously.</xsd:documentation>
        </annotation>
      </element>
    </sequence>
  </complexType>
  <complexType name="limitApplicationFormAsCompiledForm">
    <annotation>
      <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">
        A complete limit application form in HTML format for embedding in web shop page. Upon submission,
                the form itself will generate the application data to be submitted to Resurs Bank.
        <br/>
        The form contains HTML elements and Javascript based validation will be performed when the form is
                submitted.
      </xsd:documentation>
    </annotation>
    <sequence>
      <element name="form" type="common:nonEmptyString">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">
            The main form content. It should be placed somewhere in the HTML BODY element of the page.
            <br/>
            <strong>NB:</strong>
            The form contents are URL encoded and must be decoded before insertion
                        into the page.
          </xsd:documentation>
        </annotation>
      </element>
      <element name="formHeader" type="string">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">
            The form header data. It should be placed as a child of the HTML HEAD element of the page.
            <br/>
            <strong>NB:</strong>
            The form header is URL encoded and must be decoded before insertion
                        into the page.
          </xsd:documentation>
        </annotation>
      </element>
      <element name="formOnLoad" type="string">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">
            A JavaScript function call that needs to be performed once the page has been fully rendered.
                        This is done by placing it as an on-load event of the HTML BODY element of the page.
            <br/>
            <strong>NB:</strong>
            The form on-load event is URL encoded and must be decoded before
                        insertion into the page.
          </xsd:documentation>
        </annotation>
      </element>
    </sequence>
  </complexType>
  <complexType name="limitApplicationFormAsObjectGraph">
    <annotation>
      <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The limit application form as an object graph. All elements to be present on the form
                are returned and need to be rendered accordingly.</xsd:documentation>
    </annotation>
    <sequence>
      <element name="formId" type="string">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">
            The identity of the form.
            <br/>
            If a form has been previously filled in by the customer, and for some reason new
                        application attempt has to be made without any change to the parameters, comparing
                        this to the identity previous form will show if the new form needs to be presented,
                        or the same data can be re-submitted.
          </xsd:documentation>
        </annotation>
      </element>
      <element maxOccurs="unbounded" minOccurs="0" name="formElement" type="tns:formElement">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The list of form elements.</xsd:documentation>
        </annotation>
      </element>
    </sequence>
  </complexType>
  <complexType name="formElement">
    <annotation>
      <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The detailed specification of the form element.</xsd:documentation>
    </annotation>
    <sequence>
      <element minOccurs="0" name="label" type="string">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">
            The form element label.
            <br/>
            Typically, this is displayed as the field header.
          </xsd:documentation>
        </annotation>
      </element>
      <element minOccurs="0" name="description" type="string">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">
            A textual description of the form element.
            <br/>
            Typically, this is displayed
                        when the user hovers the mouse over the element.
          </xsd:documentation>
        </annotation>
      </element>
      <element minOccurs="0" name="format" type="string">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">
            The form element format as a regular expression.
            <br/>
            When submitted, the
                        form element will be validated against this, and it may be a good idea to
                        use this to validate the value the element already on the client side.
          </xsd:documentation>
        </annotation>
      </element>
      <element minOccurs="0" name="format-message" type="string">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The message to be presented when the format validation fails.</xsd:documentation>
        </annotation>
      </element>
      <element minOccurs="0" name="default-value" type="string">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The default value.</xsd:documentation>
        </annotation>
      </element>
      <element maxOccurs="unbounded" minOccurs="0" name="option" type="tns:option">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">If the form element has a predefined set of possible values, these
                        are present as a list.</xsd:documentation>
        </annotation>
      </element>
    </sequence>
    <attribute name="type" type="string" use="required">
      <annotation>
        <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The type of form element.</xsd:documentation>
      </annotation>
    </attribute>
    <attribute name="name" type="string" use="optional">
      <annotation>
        <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The name of the form element.</xsd:documentation>
      </annotation>
    </attribute>
    <attribute name="mandatory" type="boolean" use="optional">
      <annotation>
        <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">Whether or not the form element is mandatory.</xsd:documentation>
      </annotation>
    </attribute>
    <attribute name="length" type="int" use="optional">
      <annotation>
        <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The maximum input length.</xsd:documentation>
      </annotation>
    </attribute>
    <attribute name="min" type="int" use="optional">
      <annotation>
        <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">If a numerical element, the minimum value.</xsd:documentation>
      </annotation>
    </attribute>
    <attribute name="max" type="int" use="optional">
      <annotation>
        <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">If a numerical element, the maximum value.</xsd:documentation>
      </annotation>
    </attribute>
    <attribute name="unit" type="string" use="optional">
      <annotation>
        <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The unit to be presented after the element.</xsd:documentation>
      </annotation>
    </attribute>
    <attribute name="level" type="unsignedByte" use="optional">
      <annotation>
        <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">If a header element, the level of header.</xsd:documentation>
      </annotation>
    </attribute>
  </complexType>
  <complexType name="option">
    <annotation>
      <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">An option in a list of predefined values.</xsd:documentation>
    </annotation>
    <sequence>
      <element minOccurs="0" name="label" type="string">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">
            The list option label.
            <br/>
            Typically, this is displayed as the option name.
          </xsd:documentation>
        </annotation>
      </element>
      <element minOccurs="0" name="value" type="string">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">
            The list option value.
            <br/>
            Typically, this not shown to the customer.
          </xsd:documentation>
        </annotation>
      </element>
      <element minOccurs="0" name="description" type="string">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">
            A textual description of the list option.
            <br/>
            Typically, this is displayed
                        when the user hovers the mouse over the option.
          </xsd:documentation>
        </annotation>
      </element>
    </sequence>
    <attribute name="checked" type="boolean" use="optional">
      <annotation>
        <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">Whether or not this option is prechecked.</xsd:documentation>
      </annotation>
    </attribute>
  </complexType>
  <simpleType name="fraudControlStatus">
    <annotation>
      <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The status of the payment fraud control.</xsd:documentation>
    </annotation>
    <restriction base="string">
      <enumeration value="FROZEN">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The payment is currently frozen. This typically means that there is something that
                        needs further investigation before the payment can be finalized.</xsd:documentation>
        </annotation>
      </enumeration>
      <enumeration value="NOT_FROZEN">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The payment is not frozen, and may be finalized at any time.</xsd:documentation>
        </annotation>
      </enumeration>
      <enumeration value="CONTROL_IN_PROGRESS">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The fraud control is still in progress. Please wait for it to complete.</xsd:documentation>
        </annotation>
      </enumeration>
    </restriction>
  </simpleType>
  <complexType name="customerIdentification">
    <sequence>
      <sequence>
        <element minOccurs="0" name="token" type="tns:identificationToken">
          <annotation>
            <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">
              The identification token created by the
              <pre>identifyCustomer</pre>
              function. If the token
                            isn't valid a fault will be returned.
              <p/>
              * Either set identificationToken, or customerAccount. Both should not be set.
            </xsd:documentation>
          </annotation>
        </element>
      </sequence>
      <sequence>
        <element minOccurs="0" name="customerAccount" type="tns:customerCard">
          <annotation>
            <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">
              Information used to identify the customer, in order to be able to retrieve its bonus.
              <p/>
              * Either set identificationToken, or customerAccount. Both should not be set.
            </xsd:documentation>
          </annotation>
        </element>
      </sequence>
    </sequence>
  </complexType>
  <complexType name="bonus">
    <annotation>
      <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">A holder for all bonus the customer currently have.</xsd:documentation>
    </annotation>
    <sequence>
      <element name="points" type="nonNegativeInteger">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The number of points the customer have.</xsd:documentation>
        </annotation>
      </element>
    </sequence>
  </complexType>
  <complexType name="customerIdentificationResponse">
    <annotation>
      <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">
        A token that can be used to identify a customer against Resurs Bank.
        <p/>
        You may associate and save this token (and its expire date) with an customer account in the web
                shop,
        <i>as long as</i>
        the customer actually have to log in to access it's account. It's up to
                you to secure that log in, so that no other person or organisation indirectly or directly can use this
                token.
      </xsd:documentation>
    </annotation>
    <sequence>
      <element name="token" type="tns:identificationToken">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">A string used to identify a customer. Alphanumerical characters, 100 characters long.</xsd:documentation>
        </annotation>
      </element>
      <element name="expirationDate" type="dateTime">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">
            When this token expires. It cannot be used after that date. This date should
            <i>at least</i>
            be a couple of years in the future.
          </xsd:documentation>
        </annotation>
      </element>
    </sequence>
  </complexType>
  <complexType name="customerCard">
    <sequence>
      <element name="governmentId" type="string">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The government identity of the customer for which to retrieve bonus points.</xsd:documentation>
        </annotation>
      </element>
      <element minOccurs="0" name="customerType" type="common:customerType">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">
            The type of customer to retrieve.
            <br/>
            In many cases, this is easily determined from the
                        government identity, but for Swedish companies in sole proprietorship, the same identity is
                        used for both the person as a natural customer, and the company as a legal customer.
            <p/>
            If this value is omitted we will try to parse the government id as a natural first and secondly
                        as a legal entity.
          </xsd:documentation>
        </annotation>
      </element>
      <element name="cardNumber" type="string">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">
            An card number tied to the supplied government id
            <i>in Resurs Bank</i>
            . We cannot identify
                        customers with cards not present in our own database!
            <p/>
            In certain cases only the four last digits are needed. The API documentation of functions
                        with this lesser requirement will point that out.
          </xsd:documentation>
        </annotation>
      </element>
    </sequence>
  </complexType>
  <simpleType name="identificationToken">
    <annotation>
      <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">
        A string used to identify a customer.
        <p/>
        Created by the
        <pre>identifyCustomer</pre>
        function.
      </xsd:documentation>
    </annotation>
    <restriction base="string">
      <pattern value="[A-Za-z0-9]{100}"/>
    </restriction>
  </simpleType>
</schema>]]></con:content><con:type>http://www.w3.org/2001/XMLSchema</con:type></con:part><con:part><con:url>https://test.resurs.com/ecommerce-test/ws/V4/ShopFlowService?xsd=schemas/types/common.xsd</con:url><con:content><![CDATA[<schema targetNamespace="http://ecommerce.resurs.com/v4/types/common" version="4.0" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:tns="http://ecommerce.resurs.com/v4/types/common" xmlns="http://www.w3.org/2001/XMLSchema">
  <complexType name="customer">
    <annotation>
      <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">Details about a (potential) customer, be it natural or legal.</xsd:documentation>
    </annotation>
    <sequence>
      <element name="governmentId" type="tns:nonEmptyString">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">
            Identifying a customer uniquely within the country.
            <ul>
              <li>SE: Personnummer/Organisationsnummer</li>
              <li>DK: CPR-number</li>
              <li>NO: Fødselsnummer</li>
              <li>FI: Henkilötunnus</li>
            </ul>
          </xsd:documentation>
        </annotation>
      </element>
      <element name="address" type="tns:address">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">Address of the customer.</xsd:documentation>
        </annotation>
      </element>
      <element minOccurs="0" name="phone" type="string">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The customer telephone number.</xsd:documentation>
        </annotation>
      </element>
      <element minOccurs="0" name="email" type="tns:nonEmptyString">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The customer email address.</xsd:documentation>
        </annotation>
      </element>
      <element name="type" type="tns:customerType">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The type of customer.</xsd:documentation>
        </annotation>
      </element>
    </sequence>
  </complexType>
  <complexType name="address">
    <annotation>
      <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The customer address details.</xsd:documentation>
    </annotation>
    <sequence>
      <element minOccurs="0" name="fullName" type="tns:nonEmptyString">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The full (possibly composite name) of the
                        customer.</xsd:documentation>
        </annotation>
      </element>
      <element minOccurs="0" name="firstName" type="tns:nonEmptyString">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">If available, the first name of the
                        customer.</xsd:documentation>
        </annotation>
      </element>
      <element minOccurs="0" name="lastName" type="tns:nonEmptyString">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">If available, the last name of the
                        customer.</xsd:documentation>
        </annotation>
      </element>
      <element name="addressRow1" type="string">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The first row of the customer address.</xsd:documentation>
        </annotation>
      </element>
      <element minOccurs="0" name="addressRow2" type="tns:nonEmptyString">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">
            The second row of the customer address.
            <br/>
            In practice: Located as a second line on printouts and graphics, like invoices.
          </xsd:documentation>
        </annotation>
      </element>
      <element name="postalArea" type="tns:nonEmptyString">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The postal area.</xsd:documentation>
        </annotation>
      </element>
      <element name="postalCode" type="tns:nonEmptyString">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The postal code.</xsd:documentation>
        </annotation>
      </element>
      <element name="country" type="tns:countryCode">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">In which country is this address located?</xsd:documentation>
        </annotation>
      </element>
    </sequence>
  </complexType>
  <complexType name="mapEntry">
    <annotation>
      <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">
        A representation of a simple map. WebService frameworks are not good at supporting maps natively.
        <br/>
        An instance of this object contains
        <tt>{key, value}</tt>
        -pair. If a list of this type is used,
        <tt>keys</tt>
        <strong>must</strong>
        be unique within the list.
      </xsd:documentation>
    </annotation>
    <sequence>
      <element name="key" type="tns:nonEmptyString">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The key of the pair.</xsd:documentation>
        </annotation>
      </element>
      <element minOccurs="0" name="value" type="string">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The value of the pair.</xsd:documentation>
        </annotation>
      </element>
    </sequence>
  </complexType>
  <simpleType name="countryCode">
    <annotation>
      <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The country code as defined by the ISO 3166-1
                standard.</xsd:documentation>
    </annotation>
    <restriction base="string">
      <enumeration value="SE">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">Sweden</xsd:documentation>
        </annotation>
      </enumeration>
      <enumeration value="NO">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">Norway</xsd:documentation>
        </annotation>
      </enumeration>
      <enumeration value="DK">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">Denmark</xsd:documentation>
        </annotation>
      </enumeration>
      <enumeration value="FI">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">Finland</xsd:documentation>
        </annotation>
      </enumeration>
    </restriction>
  </simpleType>
  <simpleType name="id">
    <annotation>
      <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The standard identity type.</xsd:documentation>
    </annotation>
    <restriction base="string">
      <minLength value="1"/>
      <pattern value="[\p{L}0-9 \._/\-]*"/>
    </restriction>
  </simpleType>
  <simpleType name="nonEmptyString">
    <annotation>
      <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">A string that cannot be empty.</xsd:documentation>
    </annotation>
    <restriction base="string">
      <minLength value="1"/>
    </restriction>
  </simpleType>
  <simpleType name="positiveDecimal">
    <annotation>
      <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">A decimal value of at least zero (0).</xsd:documentation>
    </annotation>
    <restriction base="decimal">
      <minInclusive value="0"/>
    </restriction>
  </simpleType>
  <simpleType name="percent">
    <annotation>
      <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">A percentage between 0% and 100%.</xsd:documentation>
    </annotation>
    <restriction base="decimal">
      <minInclusive value="0"/>
      <maxInclusive value="100"/>
    </restriction>
  </simpleType>
  <simpleType name="multiplier">
    <annotation>
      <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">A decimal multiplier used when calculating annuity
                factors. Between 0 and 1.</xsd:documentation>
    </annotation>
    <restriction base="decimal">
      <minInclusive value="0"/>
      <maxInclusive value="1"/>
    </restriction>
  </simpleType>
  <complexType name="paymentSpec">
    <annotation>
      <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">
        The payment details.
        <br/>
        In it's simples form it's just sum, i e
        <code>totalAmount</code>
        and
        <code>totalVatAmount</code>
        is
                set, but there are no
        <code>specLines</code>
        . If nothing else is said you should send
        <code>specLines</code>
        .
      </xsd:documentation>
    </annotation>
    <sequence>
      <element maxOccurs="unbounded" minOccurs="0" name="specLines" type="tns:specLine">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The list of payment lines. In the case you're sending a simple payment, without lines, this
                        parameter should be left empty. Sending payment lines may, or may not, be mandatory, depending
                        on the contract with Resurs Bank.</xsd:documentation>
        </annotation>
      </element>
      <element name="totalAmount" type="tns:positiveDecimal">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">
            The total payment amount. The sum of all line amounts (if there are lines supplied)
            <strong>including vat</strong>
            . If this payment is without lines this is the only value to be
                        set on the
                        payment spec.
          </xsd:documentation>
        </annotation>
      </element>
      <element minOccurs="0" name="totalVatAmount" nillable="true" type="decimal">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">
            The total VAT amount of the payment.
            <br/>
            This field is
            <strong>required</strong>
            when specification lines are supplied and
            <br/>
            <strong>not</strong>
            allowed if no specification lines are supplied.
          </xsd:documentation>
        </annotation>
      </element>
      <element minOccurs="0" name="bonusPoints" type="nonNegativeInteger">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">
            The number of bonus points to use in this purchase.
            <p/>
            <a href="https://test.resurs.com/docs/x/CAAv">Read more about bonus</a>
          </xsd:documentation>
        </annotation>
      </element>
    </sequence>
  </complexType>
  <complexType name="specLine">
    <annotation>
      <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The payment line (item) specification. These can be used to provide detailed information about the
                contents of the payment.</xsd:documentation>
    </annotation>
    <sequence>
      <element name="id" type="tns:id">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The line identity</xsd:documentation>
        </annotation>
      </element>
      <element name="artNo" type="string">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">Article number of the item.</xsd:documentation>
        </annotation>
      </element>
      <element name="description" type="string">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The item description.</xsd:documentation>
        </annotation>
      </element>
      <element name="quantity" type="decimal">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The line quantity.</xsd:documentation>
        </annotation>
      </element>
      <element name="unitMeasure" type="string">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The line unit.</xsd:documentation>
        </annotation>
      </element>
      <element name="unitAmountWithoutVat" type="decimal">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The unit amount without VAT.</xsd:documentation>
        </annotation>
      </element>
      <element name="vatPct" type="tns:percent">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The VAT percentage.</xsd:documentation>
        </annotation>
      </element>
      <element name="totalVatAmount" type="decimal">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The total item VAT amount.</xsd:documentation>
        </annotation>
      </element>
      <element name="totalAmount" type="decimal">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The total item amount, including VAT.</xsd:documentation>
        </annotation>
      </element>
    </sequence>
  </complexType>
  <simpleType name="paymentStatus">
    <annotation>
      <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">Payment status.</xsd:documentation>
    </annotation>
    <restriction base="string">
      <enumeration value="DEBITABLE">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">Can be debited.</xsd:documentation>
        </annotation>
      </enumeration>
      <enumeration value="CREDITABLE">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">Can be credited.</xsd:documentation>
        </annotation>
      </enumeration>
      <enumeration value="IS_DEBITED">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">Is debited.</xsd:documentation>
        </annotation>
      </enumeration>
      <enumeration value="IS_CREDITED">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">Is credited.</xsd:documentation>
        </annotation>
      </enumeration>
      <enumeration value="IS_ANNULLED">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">Is annulled</xsd:documentation>
        </annotation>
      </enumeration>
    </restriction>
  </simpleType>
  <complexType name="limit">
    <annotation>
      <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">Detailed information about the limit.</xsd:documentation>
    </annotation>
    <sequence>
      <element name="approvedAmount" type="tns:positiveDecimal">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The amount that has been approved. This can be the requested amount, or more.</xsd:documentation>
        </annotation>
      </element>
      <element name="decision" type="tns:limitDecision">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The limit decision.</xsd:documentation>
        </annotation>
      </element>
      <element name="customer" type="tns:customer">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The customer details.</xsd:documentation>
        </annotation>
      </element>
      <element name="limitRequestId" type="tns:id">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">Identifies this limit request uniquely, whether it's granted or not. It can be used to request
                        more information, by phone, about the application from Resurs Bank, if there is any questions.</xsd:documentation>
        </annotation>
      </element>
    </sequence>
  </complexType>
  <simpleType name="limitDecision">
    <annotation>
      <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The possible decisions returned by a limit application.</xsd:documentation>
    </annotation>
    <restriction base="string">
      <enumeration value="DENIED">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">No limit at all is given.</xsd:documentation>
        </annotation>
      </enumeration>
      <enumeration value="GRANTED">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">
            The applied limit
            <strong>or more</strong>
            is given.
          </xsd:documentation>
        </annotation>
      </enumeration>
      <enumeration value="TRIAL">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">
            No limit could be
            <strong>immediately</strong>
            approved. Some form of additional information
                        is required before a final decision can be made, and the customer has to contact Resurs
                        Bank.
            <br/>
            If, after a further inspection, the customer limit is approved, it will automatically be used
                        the next time the same customer applies for the same (or lower amount) on the same payment
                        method.
          </xsd:documentation>
        </annotation>
      </enumeration>
    </restriction>
  </simpleType>
  <simpleType name="customerType">
    <annotation>
      <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The type of customer.</xsd:documentation>
    </annotation>
    <restriction base="string">
      <enumeration value="LEGAL">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The customer is a legal customer.</xsd:documentation>
        </annotation>
      </enumeration>
      <enumeration value="NATURAL">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The customer is a natural customer, i.e. a person.</xsd:documentation>
        </annotation>
      </enumeration>
    </restriction>
  </simpleType>
  <simpleType name="paymentMethodType">
    <annotation>
      <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">Payment methods are divided into groups.
                This information can be used to retrieve orders based on which payment method type was used.</xsd:documentation>
    </annotation>
    <restriction base="string">
      <enumeration value="INVOICE">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">
            The customer wants to have an invoice sent to him, where he's able to pay the whole amount at
                        once.
            <p>
              That can be many payment methods of this type. Fetch a list with the function
              <tt class="method">PaymentMethodService.getPaymentMethods</tt>
              .
            </p>
          </xsd:documentation>
        </annotation>
      </enumeration>
      <enumeration value="REVOLVING_CREDIT">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">
            The customer wants to start a new account, and finance the purchase with that account's
                        credit limit. The purchase can be paid in a series of installments. In most cases there will be
                        made a
                        branded card sent to customer, depending on how your collaboration with Resurs Bank looks like.
                        A credit
                        application will need to be made, and the customer needs to sign a credit contract.
            <p>
              There can be many payment methods of this type. Fetch a list with the function
              <tt class="method">ShopFlowService.getPaymentMethods</tt>
              .
            </p>
          </xsd:documentation>
        </annotation>
      </enumeration>
      <enumeration value="CARD">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">
            Every card issued by Resurs Bank falls into this group, while cards from other banks or credit
                        institutions do NOT! This means that customers which have a branded Resurs card from another of
                        Resurs representatives still can use it in your webshop.
            <p>
              The will at most be one payment method of this type. Use the method
              <tt class="method">ShopFlowService.isCardPaymentAvailable</tt>
              to see if you
                            can use it.
            </p>
          </xsd:documentation>
        </annotation>
      </enumeration>
    </restriction>
  </simpleType>
  <simpleType name="invoiceDeliveryTypeEnum">
    <annotation>
      <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">This Enum indicates how a invoice should be delivered, if not specified it should default back to the
                EMAIL type.</xsd:documentation>
    </annotation>
    <restriction base="string">
      <enumeration value="NONE">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">Do not let Resurs Bank deliver the Invoices.</xsd:documentation>
        </annotation>
      </enumeration>
      <enumeration value="EMAIL">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">This option will let Resurs Bank deliver the invoice by mail. This is the default option if
                        nothing is specified.</xsd:documentation>
        </annotation>
      </enumeration>
      <enumeration value="POSTAL">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">This option will let Resurs Bank deliver the invoice by post.</xsd:documentation>
        </annotation>
      </enumeration>
    </restriction>
  </simpleType>
</schema>]]></con:content><con:type>http://www.w3.org/2001/XMLSchema</con:type></con:part><con:part><con:url>https://test.resurs.com/ecommerce-test/ws/V4/ShopFlowService?xsd=schemas/messages/Exceptions.xsd</con:url><con:content><![CDATA[<schema targetNamespace="http://ecommerce.resurs.com/v4/msg/exception" version="4.0" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:tns="http://ecommerce.resurs.com/v4/msg/exception" xmlns:common="http://ecommerce.resurs.com/v4/types/common" xmlns="http://www.w3.org/2001/XMLSchema">
  <import namespace="http://ecommerce.resurs.com/v4/types/common" schemaLocation="https://test.resurs.com/ecommerce-test/ws/V4/ShopFlowService?xsd=schemas/types/common.xsd"/>
  <element name="ECommerceError" type="tns:ECommerceError"/>
  <!--Exceptions-->
  <complexType name="ECommerceError">
    <annotation>
      <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">
        All errors/exceptions are returned as
        <code>ECommerceException</code>
        s.
        <p>
          All kinds of errors will generate this kind of exception, but different groups of errors can be
                    distinguished by their
          <code>errorTypeId</code>
          . For example the errorTypeId 1 is "Invalid argument". You
                    might want to take different actions depending on the
          <code>errorTypeId</code>
          , especially if the
          <code>fixableByYou</code>
          flag is true.
        </p>
        These are the current errorTypes. More might be added as time goes, but old errors codes will remain unchanged.
        <ul>
          <li>ILLEGAL_ARGUMENT(1)</li>
          <li>INTERNAL_ERROR(3)</li>
          <li>NOT_ALLOWED(4)</li>
          <li>REFERENCED_DATA_DONT_EXISTS(8)</li>
          <li>CREDITAPPLICATION_FAILED(10)</li>
          <li>NOT_IMPLEMENTED(11)</li>
          <li>INVALID_CREDITAPPLICATION_SUBMISSION(14)</li>
          <li>SIGNING_REQUIRED(15)</li>
          <li>AUTHORIZATION_FAILED(17)</li>
          <li>APPLICATION_VALIDATION_ERROR(18)</li>
          <li>OBJECT_WITH_ID_ALREADY_EXIST(19)</li>
          <li>NOT_ALLOWED_IN_PAYMENT_STATE(20)</li>
          <li>CUSTOMER_CONFIGURATION_EXCEPTION(21)</li>
          <li>SERVICE_CONFIGURATION_EXCEPTION(22)</li>
          <li>INVALID_CREDITING(23)</li>
          <li>LIMIT_PER_TIME_EXCEEDED(24)</li>
          <li>NOT_ALLOWED_IN_CURRENT_STATE(25)</li>
          <li>INVALID_FINALIZATION(26)</li>
          <li>FORM_PARSING(27)</li>
          <li>INVALID_IDENTIFICATION(28)</li>
          <li>TOO_MANY_TOKENS(29)</li>
          <li>BONUS_AUTHORIZATION_FAILED(30)</li>
          <li>LEGACY_EXCEPTION(99)</li>
          <li>WEAK_PASSWORD(502)</li>
          <li>NOT_AUTHORIZED(503)</li>
        </ul>
        <p>
          The
          <code>fixableByYou</code>
          flag means that the system works as intended, and that some other input could have prevented
                    the error from happening. For example, a customer not having enough funds on his card account renders an
          <code>ECommerceException</code>
          with
                    the
          <code>fixableByYou</code>
          set to
          <tt>true</tt>
          . If, on the other hand, we have problems communicating with the database,
                    the
          <code>fixableByYou</code>
          flag should be false.
          <br/>
          When this flag is false there is nothing you can do except showing the customer the error message.
        </p>
        <p>
          The exception contains two error messages. One of them, the exception message, is a technical description of
                    what went wrong, and
          <strong>it's NOT suitable to show the end user</strong>
          . Just log it, and use it for diagnosing
                    and development.
          <br/>
          The userErrorMessage on the other hand, we more or less require you to show to the customer if something went
                    wrong. The reason for requiring you to show it is that some of the messages we return have a legal meaning not to be
                    fiddled with.
        </p>
      </xsd:documentation>
    </annotation>
    <sequence>
      <element name="errorTypeDescription" type="common:nonEmptyString">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The textual description of the error type. See the list above.</xsd:documentation>
        </annotation>
      </element>
      <element name="errorTypeId" type="int">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">Indicates which kind of error this is. See the list above.</xsd:documentation>
        </annotation>
      </element>
      <element name="fixableByYou" type="boolean">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">
            "If this error have been avoided with some other input" =
            <tt>true</tt>
            <br/>
            "It a Resurs Bank problem" =
            <tt>false</tt>
          </xsd:documentation>
        </annotation>
      </element>
      <element name="userErrorMessage" type="common:nonEmptyString">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">An error message intended for the user of the web shop. This message must be shown!</xsd:documentation>
        </annotation>
      </element>
    </sequence>
  </complexType>
</schema>]]></con:content><con:type>http://www.w3.org/2001/XMLSchema</con:type></con:part></con:definitionCache><con:endpoints><con:endpoint>${#Project#ServiceEndpoint}/ShopFlowService</con:endpoint><con:endpoint>http://localhost:8080/ws/V4/ShopFlowService</con:endpoint><con:endpoint>http://ws.ecom.pte.loc/ws/V4/ShopFlowService</con:endpoint><con:endpoint>https://test.resurs.com/ecommerce-test/ws/V4/ShopFlowService</con:endpoint></con:endpoints><con:operation isOneWay="false" action="" name="bookPayment" bindingOperationName="bookPayment" type="Request-Response" inputName="" receivesAttachments="false" sendsAttachments="false" anonymous="optional"><con:settings/><con:call name="Request 1"><con:settings/><con:encoding>UTF-8</con:encoding><con:endpoint>https://test.resurs.com/ecommerce-test/ws/V4/ShopFlowService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:shop="http://ecommerce.resurs.com/v4/msg/shopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <shop:bookPayment>
         <paymentSessionId>gero et</paymentSessionId>
         <!--Optional:-->
         <preferredPaymentId>?</preferredPaymentId>
         <waitForFraudControl>true</waitForFraudControl>
         <annulIfFrozen>false</annulIfFrozen>
         <!--Zero or more repetitions:-->
         <metaData>
            <key>?</key>
            <!--Optional:-->
            <value>?</value>
         </metaData>
         <priority>100</priority>
         <!--Optional:-->
         <storeId>?</storeId>
      </shop:bookPayment>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:wsaConfig mustUnderstand="NONE" version="200508" action="http://ecommerce.resurs.com/v4/ShopFlowWebService/bookPaymentRequest"/></con:call></con:operation><con:operation isOneWay="false" action="" name="submitLimitApplication" bindingOperationName="submitLimitApplication" type="Request-Response" inputName="" receivesAttachments="false" sendsAttachments="false" anonymous="optional"><con:settings/><con:call name="Request 1"><con:settings/><con:encoding>UTF-8</con:encoding><con:endpoint>https://test.resurs.com/ecommerce-test/ws/V4/ShopFlowService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:shop="http://ecommerce.resurs.com/v4/msg/shopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <shop:submitLimitApplication>
         <paymentSessionId>gero et</paymentSessionId>
         <!--Optional:-->
         <yourCustomerId>?</yourCustomerId>
         <formDataResponse>sonoras imperio</formDataResponse>
         <!--Optional:-->
         <billingAddress>
            <!--Optional:-->
            <fullName>?</fullName>
            <!--Optional:-->
            <firstName>?</firstName>
            <!--Optional:-->
            <lastName>?</lastName>
            <addressRow1>?</addressRow1>
            <!--Optional:-->
            <addressRow2>?</addressRow2>
            <postalArea>?</postalArea>
            <postalCode>?</postalCode>
            <country>?</country>
         </billingAddress>
      </shop:submitLimitApplication>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:wsaConfig mustUnderstand="NONE" version="200508" action="http://ecommerce.resurs.com/v4/ShopFlowWebService/createLimitRequest"/></con:call></con:operation><con:operation isOneWay="false" action="" name="getAnnuityFactors" bindingOperationName="getAnnuityFactors" type="Request-Response" inputName="" receivesAttachments="false" sendsAttachments="false" anonymous="optional"><con:settings/><con:call name="Request 1"><con:settings/><con:encoding>UTF-8</con:encoding><con:endpoint>https://test.resurs.com/ecommerce-test/ws/V4/ShopFlowService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:shop="http://ecommerce.resurs.com/v4/msg/shopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <shop:getAnnuityFactors>
         <paymentMethodId>gero et</paymentMethodId>
      </shop:getAnnuityFactors>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:wsaConfig mustUnderstand="NONE" version="200508" action="http://ecommerce.resurs.com/v4/ShopFlowWebService/getAnnuityFactorsRequest"/></con:call></con:operation><con:operation isOneWay="false" action="" name="getCostOfPurchaseHtml" bindingOperationName="getCostOfPurchaseHtml" type="Request-Response" inputName="" receivesAttachments="false" sendsAttachments="false" anonymous="optional"><con:settings/><con:call name="Request 1"><con:settings/><con:encoding>UTF-8</con:encoding><con:endpoint>https://test.resurs.com/ecommerce-test/ws/V4/ShopFlowService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:shop="http://ecommerce.resurs.com/v4/msg/shopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <shop:getCostOfPurchaseHtml>
         <paymentMethodId>?</paymentMethodId>
         <amount>?</amount>
      </shop:getCostOfPurchaseHtml>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:wsaConfig mustUnderstand="NONE" version="200508" action="http://ecommerce.resurs.com/v4/ShopFlowWebService/getLegalInfoHTMLRequest"/></con:call></con:operation><con:operation isOneWay="false" action="" name="getPaymentMethods" bindingOperationName="getPaymentMethods" type="Request-Response" inputName="" receivesAttachments="false" sendsAttachments="false" anonymous="optional"><con:settings/><con:call name="Request 1"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:encoding>UTF-8</con:encoding><con:endpoint>https://test.resurs.com/ecommerce-test/ws/V4/ShopFlowService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:shop="http://ecommerce.resurs.com/v4/msg/shopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <shop:getPaymentMethods/>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:credentials><con:authType>No Authorization</con:authType></con:credentials><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508" action="http://ecommerce.resurs.com/v4/ShopFlowWebService/getPaymentMethodsRequest"/><con:wsrmConfig version="1.2"/></con:call></con:operation><con:operation isOneWay="false" action="" name="prepareSigning" bindingOperationName="prepareSigning" type="Request-Response" inputName="" receivesAttachments="false" sendsAttachments="false" anonymous="optional"><con:settings/><con:call name="Request 1"><con:settings/><con:encoding>UTF-8</con:encoding><con:endpoint>https://test.resurs.com/ecommerce-test/ws/V4/ShopFlowService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:shop="http://ecommerce.resurs.com/v4/msg/shopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <shop:prepareSigning>
         <paymentSessionId>gero et</paymentSessionId>
         <successUrl>http://www.your.org/aeoliam/quae</successUrl>
         <failUrl>http://www.corp.org/temperat/per</failUrl>
      </shop:prepareSigning>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:wsaConfig mustUnderstand="NONE" version="200508" action="http://ecommerce.resurs.com/v4/ShopFlowWebService/prepareSigningRequest"/></con:call></con:operation><con:operation isOneWay="false" action="" name="setDeliveryAddress" bindingOperationName="setDeliveryAddress" type="Request-Response" inputName="" receivesAttachments="false" sendsAttachments="false" anonymous="optional"><con:settings/><con:call name="Request 1"><con:settings/><con:encoding>UTF-8</con:encoding><con:endpoint>https://test.resurs.com/ecommerce-test/ws/V4/ShopFlowService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:shop="http://ecommerce.resurs.com/v4/msg/shopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <shop:setDeliveryAddress>
         <paymentSessionId>gero et</paymentSessionId>
         <address>
            <!--Optional:-->
            <fullName>?</fullName>
            <!--Optional:-->
            <firstName>?</firstName>
            <!--Optional:-->
            <lastName>?</lastName>
            <addressRow1>sonoras imperio</addressRow1>
            <!--Optional:-->
            <addressRow2>?</addressRow2>
            <postalArea>verrantque per auras</postalArea>
            <postalCode>per auras</postalCode>
            <country>SE</country>
         </address>
      </shop:setDeliveryAddress>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508" action="http://ecommerce.resurs.com/v4/ShopFlowWebService/setDeliveryAddressRequest"/><con:wsrmConfig version="1.2"/></con:call></con:operation><con:operation isOneWay="false" action="" name="startPaymentSession" bindingOperationName="startPaymentSession" type="Request-Response" inputName="" receivesAttachments="false" sendsAttachments="false" anonymous="optional"><con:settings/><con:call name="Request 1"><con:settings/><con:encoding>UTF-8</con:encoding><con:endpoint>https://test.resurs.com/ecommerce-test/ws/V4/ShopFlowService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:shop="http://ecommerce.resurs.com/v4/msg/shopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <shop:startPaymentSession>
         <!--Optional:-->
         <preferredId>?</preferredId>
         <paymentMethodId>sonoras imperio</paymentMethodId>
         <!--Optional:-->
         <customerIpAddress>?</customerIpAddress>
         <!--Optional:-->
         <formAction>?</formAction>
         <paymentSpec>
            <!--Zero or more repetitions:-->
            <specLines>
               <id>?</id>
               <artNo>?</artNo>
               <description>?</description>
               <quantity>?</quantity>
               <unitMeasure>?</unitMeasure>
               <unitAmountWithoutVat>?</unitAmountWithoutVat>
               <vatPct>?</vatPct>
               <totalVatAmount>?</totalVatAmount>
               <totalAmount>?</totalAmount>
            </specLines>
            <totalAmount>1000.00</totalAmount>
            <!--Optional:-->
            <totalVatAmount>?</totalVatAmount>
         </paymentSpec>
      </shop:startPaymentSession>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508" action="http://ecommerce.resurs.com/v4/ShopFlowWebService/startPaymentSessionRequest"/><con:wsrmConfig version="1.2"/></con:call></con:operation><con:operation isOneWay="false" action="" name="getAddress" bindingOperationName="getAddress" type="Request-Response" inputName="" receivesAttachments="false" sendsAttachments="false" anonymous="optional"><con:settings/><con:call name="Request 1"><con:settings/><con:encoding>UTF-8</con:encoding><con:endpoint>https://test.resurs.com/ecommerce-test/ws/V4/ShopFlowService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:shop="http://ecommerce.resurs.com/v4/msg/shopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <shop:getAddress>
         <governmentId>gero et</governmentId>
         <!--Optional:-->
         <customerType>?</customerType>
         <!--Optional:-->
         <customerIpAddress>aeoliam venit</customerIpAddress>
      </shop:getAddress>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:wsaConfig mustUnderstand="NONE" version="200508" action="http://ecommerce.resurs.com/v4/ShopFlowWebService/getAddressRequest"/></con:call></con:operation><con:operation isOneWay="false" action="" name="getCustomerBonus" bindingOperationName="getCustomerBonus" type="Request-Response" inputName="" receivesAttachments="false" sendsAttachments="false" anonymous="optional"><con:settings/><con:call name="Request 1"><con:settings/><con:encoding>UTF-8</con:encoding><con:endpoint>https://test.resurs.com/ecommerce-test/ws/V4/ShopFlowService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:shop="http://ecommerce.resurs.com/v4/msg/shopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <shop:getCustomerBonus>
         <customerIdentification>
            <!--Optional:-->
            <token>?</token>
            <!--Optional:-->
            <customerAccount>
               <governmentId>?</governmentId>
               <!--Optional:-->
               <customerType>?</customerType>
               <cardNumber>?</cardNumber>
            </customerAccount>
         </customerIdentification>
      </shop:getCustomerBonus>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:wsaConfig mustUnderstand="NONE" version="200508" action="http://ecommerce.resurs.com/v4/ShopFlowWebService/getCustomerBonusRequest"/></con:call></con:operation><con:operation isOneWay="false" action="" name="invalidateCustomerIdentificationToken" bindingOperationName="invalidateCustomerIdentificationToken" type="Request-Response" inputName="" receivesAttachments="false" sendsAttachments="false" anonymous="optional"><con:settings/><con:call name="Request 1"><con:settings/><con:encoding>UTF-8</con:encoding><con:endpoint>https://test.resurs.com/ecommerce-test/ws/V4/ShopFlowService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:shop="http://ecommerce.resurs.com/v4/msg/shopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <shop:invalidateCustomerIdentificationToken>
         <!--Zero or more repetitions:-->
         <token>?</token>
         <!--Optional:-->
         <governmentId>?</governmentId>
         <!--Optional:-->
         <customerType>?</customerType>
      </shop:invalidateCustomerIdentificationToken>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:wsaConfig mustUnderstand="NONE" version="200508" action="http://ecommerce.resurs.com/v4/ShopFlowWebService/invalidateCustomerIdentificationTokenRequest"/></con:call></con:operation><con:operation isOneWay="false" action="" name="issueCustomerIdentificationToken" bindingOperationName="issueCustomerIdentificationToken" type="Request-Response" inputName="" receivesAttachments="false" sendsAttachments="false" anonymous="optional"><con:settings/><con:call name="Request 1"><con:settings/><con:encoding>UTF-8</con:encoding><con:endpoint>https://test.resurs.com/ecommerce-test/ws/V4/ShopFlowService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:shop="http://ecommerce.resurs.com/v4/msg/shopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <shop:issueCustomerIdentificationToken>
         <customerCard>
            <governmentId>?</governmentId>
            <!--Optional:-->
            <customerType>?</customerType>
            <cardNumber>?</cardNumber>
         </customerCard>
         <customerIpAddress>?</customerIpAddress>
      </shop:issueCustomerIdentificationToken>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:wsaConfig mustUnderstand="NONE" version="200508" action="http://ecommerce.resurs.com/v4/ShopFlowWebService/issueCustomerIdentificationTokenRequest"/></con:call></con:operation></con:interface><con:interface xsi:type="con:WsdlInterface" wsaVersion="NONE" name="DeveloperWebServiceImplPortBinding" type="wsdl" bindingName="{http://ecommerce.resurs.com/v4}DeveloperWebServiceImplPortBinding" soapVersion="1_1" anonymous="optional" definition="https://test.resurs.com/ecommerce-test/ws/V4/DeveloperWebService?wsdl" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:settings/><con:definitionCache type="TEXT" rootPart="https://test.resurs.com/ecommerce-test/ws/V4/DeveloperWebService?wsdl"><con:part><con:url>https://test.resurs.com/ecommerce-test/ws/V4/DeveloperWebService?wsdl</con:url><con:content><![CDATA[<definitions name="DeveloperService" targetNamespace="http://ecommerce.resurs.com/v4" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:wsdl="http://schemas.xmlsoap.org/wsdl/" xmlns:tns="http://ecommerce.resurs.com/v4" xmlns:soap="http://schemas.xmlsoap.org/wsdl/soap/" xmlns:msg="http://ecommerce.resurs.com/v4/msg/developer" xmlns:exc="http://ecommerce.resurs.com/v4/msg/exception" xmlns="http://schemas.xmlsoap.org/wsdl/">
  <types>
    <xsd:schema targetNamespace="http://ecommerce.resurs.com/v4/developer">
      <xsd:import namespace="http://ecommerce.resurs.com/v4/msg/developer" schemaLocation="https://test.resurs.com/ecommerce-test/ws/V4/DeveloperWebService?xsd=schemas/messages/DeveloperServiceMessages.xsd"/>
      <xsd:import namespace="http://ecommerce.resurs.com/v4/msg/exception" schemaLocation="https://test.resurs.com/ecommerce-test/ws/V4/DeveloperWebService?xsd=schemas/messages/Exceptions.xsd"/>
    </xsd:schema>
  </types>
  <message name="exposeRevision">
    <part element="msg:exposeRevision" name="parameters"></part>
  </message>
  <message name="exposeRevisionResponse">
    <part element="msg:exposeRevisionResponse" name="parameters"></part>
  </message>
  <message name="getLimitApplicationTemplate">
    <part element="msg:getLimitApplicationTemplate" name="parameters"></part>
  </message>
  <message name="isSignedResponse">
    <part element="msg:isSignedResponse" name="parameters"></part>
  </message>
  <message name="getLimitApplicationTemplateResponse">
    <part element="msg:getLimitApplicationTemplateResponse" name="parameters"></part>
  </message>
  <message name="isSigned">
    <part element="msg:isSigned" name="parameters"></part>
  </message>
  <message name="ECommerceErrorException">
    <part element="exc:ECommerceError" name="fault"></part>
  </message>
  <message name="triggerEvent">
    <part element="msg:triggerEvent" name="parameters"></part>
  </message>
  <message name="triggerEventResponse">
    <part element="msg:triggerEventResponse" name="parameters"></part>
  </message>
  <portType name="DeveloperWebService">
    <wsdl:documentation xmlns="http://www.w3.org/1999/xhtml">
      The Developer WebService provides miscellaneous services that can be useful during the
representative integration.
      <br/>
      <strong>NB:</strong>
      The methods provided in here are
      <strong>not</strong>
      for use during normal service operation.
    </wsdl:documentation>
    <operation name="isSigned">
      <wsdl:documentation xmlns="http://www.w3.org/1999/xhtml">Determines whether or not a specific agreement has been successfully signed.</wsdl:documentation>
      <input message="tns:isSigned"></input>
      <output message="tns:isSignedResponse"></output>
      <fault message="tns:ECommerceErrorException" name="ECommerceErrorException">
        <wsdl:documentation xmlns="http://www.w3.org/1999/xhtml">Failed to determine whether or not the agreement was successfully signed. See error for
                    details.</wsdl:documentation>
      </fault>
    </operation>
    <operation name="getLimitApplicationTemplate">
      <wsdl:documentation xmlns="http://www.w3.org/1999/xhtml">
        Retrieves the limit application response template.
        <br/>
        Normally this is not necessary, as the form creates this itself. However, if the representative decides
                to implement the form functionality locally, without using the features provided by Resurs Bank, this
                method will show the format of a valid response.
      </wsdl:documentation>
      <input message="tns:getLimitApplicationTemplate"></input>
      <output message="tns:getLimitApplicationTemplateResponse"></output>
      <fault message="tns:ECommerceErrorException" name="ECommerceErrorException">
        <wsdl:documentation xmlns="http://www.w3.org/1999/xhtml">Failed to retrieve the limit application response template. See error for details.</wsdl:documentation>
      </fault>
    </operation>
    <operation name="triggerEvent">
      <wsdl:documentation xmlns="http://www.w3.org/1999/xhtml">Triggers a test event. This is for testing the callback functionality.</wsdl:documentation>
      <input message="tns:triggerEvent"></input>
      <output message="tns:triggerEventResponse"></output>
      <fault message="tns:ECommerceErrorException" name="ECommerceErrorException">
        <wsdl:documentation xmlns="http://www.w3.org/1999/xhtml">Failed to trigger the specified event. See error for details.</wsdl:documentation>
      </fault>
    </operation>
    <operation name="exposeRevision">
      <wsdl:documentation xmlns="http://www.w3.org/1999/xhtml">Triggers a test event. This is for testing the callback functionality.</wsdl:documentation>
      <input message="tns:exposeRevision"></input>
      <output message="tns:exposeRevisionResponse"></output>
      <fault message="tns:ECommerceErrorException" name="ECommerceErrorException">
        <wsdl:documentation xmlns="http://www.w3.org/1999/xhtml">Failed find revision for package. See error for details.</wsdl:documentation>
      </fault>
    </operation>
  </portType>
  <binding name="DeveloperWebServiceImplPortBinding" type="tns:DeveloperWebService">
    <soap:binding style="document" transport="http://schemas.xmlsoap.org/soap/http"/>
    <operation name="isSigned">
      <soap:operation soapAction=""/>
      <input>
        <soap:body use="literal"/>
      </input>
      <output>
        <soap:body use="literal"/>
      </output>
      <fault name="ECommerceErrorException">
        <soap:fault name="ECommerceErrorException" use="literal"/>
      </fault>
    </operation>
    <operation name="getLimitApplicationTemplate">
      <soap:operation soapAction=""/>
      <input>
        <soap:body use="literal"/>
      </input>
      <output>
        <soap:body use="literal"/>
      </output>
      <fault name="ECommerceErrorException">
        <soap:fault name="ECommerceErrorException" use="literal"/>
      </fault>
    </operation>
    <operation name="triggerEvent">
      <soap:operation soapAction=""/>
      <input>
        <soap:body use="literal"/>
      </input>
      <output>
        <soap:body use="literal"/>
      </output>
      <fault name="ECommerceErrorException">
        <soap:fault name="ECommerceErrorException" use="literal"/>
      </fault>
    </operation>
    <operation name="exposeRevision">
      <soap:operation soapAction=""/>
      <input>
        <soap:body use="literal"/>
      </input>
      <output>
        <soap:body use="literal"/>
      </output>
      <fault name="ECommerceErrorException">
        <soap:fault name="ECommerceErrorException" use="literal"/>
      </fault>
    </operation>
  </binding>
  <service name="DeveloperService">
    <port binding="tns:DeveloperWebServiceImplPortBinding" name="DeveloperWebServiceImplPort">
      <soap:address location="https://test.resurs.com/ecommerce-test/ws/V4/DeveloperWebService"/>
    </port>
  </service>
</definitions>]]></con:content><con:type>http://schemas.xmlsoap.org/wsdl/</con:type></con:part><con:part><con:url>https://test.resurs.com/ecommerce-test/ws/V4/DeveloperWebService?xsd=schemas/messages/DeveloperServiceMessages.xsd</con:url><con:content><![CDATA[<schema targetNamespace="http://ecommerce.resurs.com/v4/msg/developer" version="4.0" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:tns="http://ecommerce.resurs.com/v4/msg/developer" xmlns:common="http://ecommerce.resurs.com/v4/types/common" xmlns="http://www.w3.org/2001/XMLSchema">
  <import namespace="http://ecommerce.resurs.com/v4/types/common" schemaLocation="https://test.resurs.com/ecommerce-test/ws/V4/DeveloperWebService?xsd=schemas/types/common.xsd"/>
  <element name="isSigned" type="tns:isSigned"/>
  <element name="isSignedResponse" type="tns:isSignedResponse"/>
  <element name="getLimitApplicationTemplate" type="tns:getLimitApplicationTemplate"/>
  <element name="getLimitApplicationTemplateResponse" type="tns:getLimitApplicationTemplateResponse"/>
  <element name="triggerEvent" type="tns:triggerEvent"/>
  <element name="triggerEventResponse" type="tns:triggerEventResponse"/>
  <element name="exposeRevision" type="tns:exposeRevision"/>
  <element name="exposeRevisionResponse" type="tns:exposeRevisionResponse"/>
  <complexType name="isSigned">
    <sequence>
      <element name="signingId" type="common:id">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">
            The identity of the signing session.
            <br/>
            Please note that this has to be from the signing URL directly.
          </xsd:documentation>
        </annotation>
      </element>
    </sequence>
  </complexType>
  <complexType name="isSignedResponse">
    <sequence>
      <element name="return" type="boolean">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">Whether or not the agreement was signed.</xsd:documentation>
        </annotation>
      </element>
    </sequence>
  </complexType>
  <complexType name="getLimitApplicationTemplate">
    <sequence>
      <element name="paymentMethodId" type="common:id">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The identity of the payment method</xsd:documentation>
        </annotation>
      </element>
      <element name="sum" type="common:positiveDecimal">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The limit amount.</xsd:documentation>
        </annotation>
      </element>
    </sequence>
  </complexType>
  <complexType name="getLimitApplicationTemplateResponse">
    <sequence>
      <element name="return" type="string">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The limit application form response template.</xsd:documentation>
        </annotation>
      </element>
    </sequence>
  </complexType>
  <complexType name="triggerEvent">
    <sequence>
      <element name="eventType" type="common:id">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The type of event to be triggered.</xsd:documentation>
        </annotation>
      </element>
      <element maxOccurs="unbounded" minOccurs="0" name="param" type="string">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The data to be used when triggering the event.</xsd:documentation>
        </annotation>
      </element>
    </sequence>
  </complexType>
  <complexType name="triggerEventResponse">
    <sequence/>
  </complexType>
  <complexType name="exposeRevision">
    <sequence/>
  </complexType>
  <complexType name="exposeRevisionResponse">
    <sequence>
      <element name="revision" type="string">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">Revision number from SCM system</xsd:documentation>
        </annotation>
      </element>
      <element name="version" type="string">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">Project version from pom file.</xsd:documentation>
        </annotation>
      </element>
    </sequence>
  </complexType>
</schema>]]></con:content><con:type>http://www.w3.org/2001/XMLSchema</con:type></con:part><con:part><con:url>https://test.resurs.com/ecommerce-test/ws/V4/DeveloperWebService?xsd=schemas/types/common.xsd</con:url><con:content><![CDATA[<schema targetNamespace="http://ecommerce.resurs.com/v4/types/common" version="4.0" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:tns="http://ecommerce.resurs.com/v4/types/common" xmlns="http://www.w3.org/2001/XMLSchema">
  <complexType name="customer">
    <annotation>
      <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">Details about a (potential) customer, be it natural or legal.</xsd:documentation>
    </annotation>
    <sequence>
      <element name="governmentId" type="tns:nonEmptyString">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">
            Identifying a customer uniquely within the country.
            <ul>
              <li>SE: Personnummer/Organisationsnummer</li>
              <li>DK: CPR-number</li>
              <li>NO: Fødselsnummer</li>
              <li>FI: Henkilötunnus</li>
            </ul>
          </xsd:documentation>
        </annotation>
      </element>
      <element name="address" type="tns:address">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">Address of the customer.</xsd:documentation>
        </annotation>
      </element>
      <element minOccurs="0" name="phone" type="string">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The customer telephone number.</xsd:documentation>
        </annotation>
      </element>
      <element minOccurs="0" name="email" type="tns:nonEmptyString">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The customer email address.</xsd:documentation>
        </annotation>
      </element>
      <element name="type" type="tns:customerType">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The type of customer.</xsd:documentation>
        </annotation>
      </element>
    </sequence>
  </complexType>
  <complexType name="address">
    <annotation>
      <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The customer address details.</xsd:documentation>
    </annotation>
    <sequence>
      <element minOccurs="0" name="fullName" type="tns:nonEmptyString">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The full (possibly composite name) of the
                        customer.</xsd:documentation>
        </annotation>
      </element>
      <element minOccurs="0" name="firstName" type="tns:nonEmptyString">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">If available, the first name of the
                        customer.</xsd:documentation>
        </annotation>
      </element>
      <element minOccurs="0" name="lastName" type="tns:nonEmptyString">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">If available, the last name of the
                        customer.</xsd:documentation>
        </annotation>
      </element>
      <element name="addressRow1" type="string">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The first row of the customer address.</xsd:documentation>
        </annotation>
      </element>
      <element minOccurs="0" name="addressRow2" type="tns:nonEmptyString">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">
            The second row of the customer address.
            <br/>
            In practice: Located as a second line on printouts and graphics, like invoices.
          </xsd:documentation>
        </annotation>
      </element>
      <element name="postalArea" type="tns:nonEmptyString">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The postal area.</xsd:documentation>
        </annotation>
      </element>
      <element name="postalCode" type="tns:nonEmptyString">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The postal code.</xsd:documentation>
        </annotation>
      </element>
      <element name="country" type="tns:countryCode">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">In which country is this address located?</xsd:documentation>
        </annotation>
      </element>
    </sequence>
  </complexType>
  <complexType name="mapEntry">
    <annotation>
      <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">
        A representation of a simple map. WebService frameworks are not good at supporting maps natively.
        <br/>
        An instance of this object contains
        <tt>{key, value}</tt>
        -pair. If a list of this type is used,
        <tt>keys</tt>
        <strong>must</strong>
        be unique within the list.
      </xsd:documentation>
    </annotation>
    <sequence>
      <element name="key" type="tns:nonEmptyString">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The key of the pair.</xsd:documentation>
        </annotation>
      </element>
      <element minOccurs="0" name="value" type="string">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The value of the pair.</xsd:documentation>
        </annotation>
      </element>
    </sequence>
  </complexType>
  <simpleType name="countryCode">
    <annotation>
      <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The country code as defined by the ISO 3166-1
                standard.</xsd:documentation>
    </annotation>
    <restriction base="string">
      <enumeration value="SE">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">Sweden</xsd:documentation>
        </annotation>
      </enumeration>
      <enumeration value="NO">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">Norway</xsd:documentation>
        </annotation>
      </enumeration>
      <enumeration value="DK">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">Denmark</xsd:documentation>
        </annotation>
      </enumeration>
      <enumeration value="FI">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">Finland</xsd:documentation>
        </annotation>
      </enumeration>
    </restriction>
  </simpleType>
  <simpleType name="id">
    <annotation>
      <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The standard identity type.</xsd:documentation>
    </annotation>
    <restriction base="string">
      <minLength value="1"/>
      <pattern value="[\p{L}0-9 \._/\-]*"/>
    </restriction>
  </simpleType>
  <simpleType name="nonEmptyString">
    <annotation>
      <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">A string that cannot be empty.</xsd:documentation>
    </annotation>
    <restriction base="string">
      <minLength value="1"/>
    </restriction>
  </simpleType>
  <simpleType name="positiveDecimal">
    <annotation>
      <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">A decimal value of at least zero (0).</xsd:documentation>
    </annotation>
    <restriction base="decimal">
      <minInclusive value="0"/>
    </restriction>
  </simpleType>
  <simpleType name="percent">
    <annotation>
      <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">A percentage between 0% and 100%.</xsd:documentation>
    </annotation>
    <restriction base="decimal">
      <minInclusive value="0"/>
      <maxInclusive value="100"/>
    </restriction>
  </simpleType>
  <simpleType name="multiplier">
    <annotation>
      <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">A decimal multiplier used when calculating annuity
                factors. Between 0 and 1.</xsd:documentation>
    </annotation>
    <restriction base="decimal">
      <minInclusive value="0"/>
      <maxInclusive value="1"/>
    </restriction>
  </simpleType>
  <complexType name="paymentSpec">
    <annotation>
      <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">
        The payment details.
        <br/>
        In it's simples form it's just sum, i e
        <code>totalAmount</code>
        and
        <code>totalVatAmount</code>
        is
                set, but there are no
        <code>specLines</code>
        . If nothing else is said you should send
        <code>specLines</code>
        .
      </xsd:documentation>
    </annotation>
    <sequence>
      <element maxOccurs="unbounded" minOccurs="0" name="specLines" type="tns:specLine">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The list of payment lines. In the case you're sending a simple payment, without lines, this
                        parameter should be left empty. Sending payment lines may, or may not, be mandatory, depending
                        on the contract with Resurs Bank.</xsd:documentation>
        </annotation>
      </element>
      <element name="totalAmount" type="tns:positiveDecimal">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">
            The total payment amount. The sum of all line amounts (if there are lines supplied)
            <strong>including vat</strong>
            . If this payment is without lines this is the only value to be
                        set on the
                        payment spec.
          </xsd:documentation>
        </annotation>
      </element>
      <element minOccurs="0" name="totalVatAmount" nillable="true" type="decimal">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">
            The total VAT amount of the payment.
            <br/>
            This field is
            <strong>required</strong>
            when specification lines are supplied and
            <br/>
            <strong>not</strong>
            allowed if no specification lines are supplied.
          </xsd:documentation>
        </annotation>
      </element>
      <element minOccurs="0" name="bonusPoints" type="nonNegativeInteger">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">
            The number of bonus points to use in this purchase.
            <p/>
            <a href="https://test.resurs.com/docs/x/CAAv">Read more about bonus</a>
          </xsd:documentation>
        </annotation>
      </element>
    </sequence>
  </complexType>
  <complexType name="specLine">
    <annotation>
      <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The payment line (item) specification. These can be used to provide detailed information about the
                contents of the payment.</xsd:documentation>
    </annotation>
    <sequence>
      <element name="id" type="tns:id">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The line identity</xsd:documentation>
        </annotation>
      </element>
      <element name="artNo" type="string">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">Article number of the item.</xsd:documentation>
        </annotation>
      </element>
      <element name="description" type="string">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The item description.</xsd:documentation>
        </annotation>
      </element>
      <element name="quantity" type="decimal">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The line quantity.</xsd:documentation>
        </annotation>
      </element>
      <element name="unitMeasure" type="string">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The line unit.</xsd:documentation>
        </annotation>
      </element>
      <element name="unitAmountWithoutVat" type="decimal">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The unit amount without VAT.</xsd:documentation>
        </annotation>
      </element>
      <element name="vatPct" type="tns:percent">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The VAT percentage.</xsd:documentation>
        </annotation>
      </element>
      <element name="totalVatAmount" type="decimal">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The total item VAT amount.</xsd:documentation>
        </annotation>
      </element>
      <element name="totalAmount" type="decimal">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The total item amount, including VAT.</xsd:documentation>
        </annotation>
      </element>
    </sequence>
  </complexType>
  <simpleType name="paymentStatus">
    <annotation>
      <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">Payment status.</xsd:documentation>
    </annotation>
    <restriction base="string">
      <enumeration value="DEBITABLE">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">Can be debited.</xsd:documentation>
        </annotation>
      </enumeration>
      <enumeration value="CREDITABLE">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">Can be credited.</xsd:documentation>
        </annotation>
      </enumeration>
      <enumeration value="IS_DEBITED">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">Is debited.</xsd:documentation>
        </annotation>
      </enumeration>
      <enumeration value="IS_CREDITED">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">Is credited.</xsd:documentation>
        </annotation>
      </enumeration>
      <enumeration value="IS_ANNULLED">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">Is annulled</xsd:documentation>
        </annotation>
      </enumeration>
    </restriction>
  </simpleType>
  <complexType name="limit">
    <annotation>
      <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">Detailed information about the limit.</xsd:documentation>
    </annotation>
    <sequence>
      <element name="approvedAmount" type="tns:positiveDecimal">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The amount that has been approved. This can be the requested amount, or more.</xsd:documentation>
        </annotation>
      </element>
      <element name="decision" type="tns:limitDecision">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The limit decision.</xsd:documentation>
        </annotation>
      </element>
      <element name="customer" type="tns:customer">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The customer details.</xsd:documentation>
        </annotation>
      </element>
      <element name="limitRequestId" type="tns:id">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">Identifies this limit request uniquely, whether it's granted or not. It can be used to request
                        more information, by phone, about the application from Resurs Bank, if there is any questions.</xsd:documentation>
        </annotation>
      </element>
    </sequence>
  </complexType>
  <simpleType name="limitDecision">
    <annotation>
      <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The possible decisions returned by a limit application.</xsd:documentation>
    </annotation>
    <restriction base="string">
      <enumeration value="DENIED">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">No limit at all is given.</xsd:documentation>
        </annotation>
      </enumeration>
      <enumeration value="GRANTED">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">
            The applied limit
            <strong>or more</strong>
            is given.
          </xsd:documentation>
        </annotation>
      </enumeration>
      <enumeration value="TRIAL">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">
            No limit could be
            <strong>immediately</strong>
            approved. Some form of additional information
                        is required before a final decision can be made, and the customer has to contact Resurs
                        Bank.
            <br/>
            If, after a further inspection, the customer limit is approved, it will automatically be used
                        the next time the same customer applies for the same (or lower amount) on the same payment
                        method.
          </xsd:documentation>
        </annotation>
      </enumeration>
    </restriction>
  </simpleType>
  <simpleType name="customerType">
    <annotation>
      <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The type of customer.</xsd:documentation>
    </annotation>
    <restriction base="string">
      <enumeration value="LEGAL">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The customer is a legal customer.</xsd:documentation>
        </annotation>
      </enumeration>
      <enumeration value="NATURAL">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The customer is a natural customer, i.e. a person.</xsd:documentation>
        </annotation>
      </enumeration>
    </restriction>
  </simpleType>
  <simpleType name="paymentMethodType">
    <annotation>
      <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">Payment methods are divided into groups.
                This information can be used to retrieve orders based on which payment method type was used.</xsd:documentation>
    </annotation>
    <restriction base="string">
      <enumeration value="INVOICE">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">
            The customer wants to have an invoice sent to him, where he's able to pay the whole amount at
                        once.
            <p>
              That can be many payment methods of this type. Fetch a list with the function
              <tt class="method">PaymentMethodService.getPaymentMethods</tt>
              .
            </p>
          </xsd:documentation>
        </annotation>
      </enumeration>
      <enumeration value="REVOLVING_CREDIT">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">
            The customer wants to start a new account, and finance the purchase with that account's
                        credit limit. The purchase can be paid in a series of installments. In most cases there will be
                        made a
                        branded card sent to customer, depending on how your collaboration with Resurs Bank looks like.
                        A credit
                        application will need to be made, and the customer needs to sign a credit contract.
            <p>
              There can be many payment methods of this type. Fetch a list with the function
              <tt class="method">ShopFlowService.getPaymentMethods</tt>
              .
            </p>
          </xsd:documentation>
        </annotation>
      </enumeration>
      <enumeration value="CARD">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">
            Every card issued by Resurs Bank falls into this group, while cards from other banks or credit
                        institutions do NOT! This means that customers which have a branded Resurs card from another of
                        Resurs representatives still can use it in your webshop.
            <p>
              The will at most be one payment method of this type. Use the method
              <tt class="method">ShopFlowService.isCardPaymentAvailable</tt>
              to see if you
                            can use it.
            </p>
          </xsd:documentation>
        </annotation>
      </enumeration>
    </restriction>
  </simpleType>
  <simpleType name="invoiceDeliveryTypeEnum">
    <annotation>
      <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">This Enum indicates how a invoice should be delivered, if not specified it should default back to the
                EMAIL type.</xsd:documentation>
    </annotation>
    <restriction base="string">
      <enumeration value="NONE">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">Do not let Resurs Bank deliver the Invoices.</xsd:documentation>
        </annotation>
      </enumeration>
      <enumeration value="EMAIL">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">This option will let Resurs Bank deliver the invoice by mail. This is the default option if
                        nothing is specified.</xsd:documentation>
        </annotation>
      </enumeration>
      <enumeration value="POSTAL">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">This option will let Resurs Bank deliver the invoice by post.</xsd:documentation>
        </annotation>
      </enumeration>
    </restriction>
  </simpleType>
</schema>]]></con:content><con:type>http://www.w3.org/2001/XMLSchema</con:type></con:part><con:part><con:url>https://test.resurs.com/ecommerce-test/ws/V4/DeveloperWebService?xsd=schemas/messages/Exceptions.xsd</con:url><con:content><![CDATA[<schema targetNamespace="http://ecommerce.resurs.com/v4/msg/exception" version="4.0" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:tns="http://ecommerce.resurs.com/v4/msg/exception" xmlns:common="http://ecommerce.resurs.com/v4/types/common" xmlns="http://www.w3.org/2001/XMLSchema">
  <import namespace="http://ecommerce.resurs.com/v4/types/common" schemaLocation="https://test.resurs.com/ecommerce-test/ws/V4/DeveloperWebService?xsd=schemas/types/common.xsd"/>
  <element name="ECommerceError" type="tns:ECommerceError"/>
  <!--Exceptions-->
  <complexType name="ECommerceError">
    <annotation>
      <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">
        All errors/exceptions are returned as
        <code>ECommerceException</code>
        s.
        <p>
          All kinds of errors will generate this kind of exception, but different groups of errors can be
                    distinguished by their
          <code>errorTypeId</code>
          . For example the errorTypeId 1 is "Invalid argument". You
                    might want to take different actions depending on the
          <code>errorTypeId</code>
          , especially if the
          <code>fixableByYou</code>
          flag is true.
        </p>
        These are the current errorTypes. More might be added as time goes, but old errors codes will remain unchanged.
        <ul>
          <li>ILLEGAL_ARGUMENT(1)</li>
          <li>INTERNAL_ERROR(3)</li>
          <li>NOT_ALLOWED(4)</li>
          <li>REFERENCED_DATA_DONT_EXISTS(8)</li>
          <li>CREDITAPPLICATION_FAILED(10)</li>
          <li>NOT_IMPLEMENTED(11)</li>
          <li>INVALID_CREDITAPPLICATION_SUBMISSION(14)</li>
          <li>SIGNING_REQUIRED(15)</li>
          <li>AUTHORIZATION_FAILED(17)</li>
          <li>APPLICATION_VALIDATION_ERROR(18)</li>
          <li>OBJECT_WITH_ID_ALREADY_EXIST(19)</li>
          <li>NOT_ALLOWED_IN_PAYMENT_STATE(20)</li>
          <li>CUSTOMER_CONFIGURATION_EXCEPTION(21)</li>
          <li>SERVICE_CONFIGURATION_EXCEPTION(22)</li>
          <li>INVALID_CREDITING(23)</li>
          <li>LIMIT_PER_TIME_EXCEEDED(24)</li>
          <li>NOT_ALLOWED_IN_CURRENT_STATE(25)</li>
          <li>INVALID_FINALIZATION(26)</li>
          <li>FORM_PARSING(27)</li>
          <li>INVALID_IDENTIFICATION(28)</li>
          <li>TOO_MANY_TOKENS(29)</li>
          <li>BONUS_AUTHORIZATION_FAILED(30)</li>
          <li>LEGACY_EXCEPTION(99)</li>
          <li>WEAK_PASSWORD(502)</li>
          <li>NOT_AUTHORIZED(503)</li>
        </ul>
        <p>
          The
          <code>fixableByYou</code>
          flag means that the system works as intended, and that some other input could have prevented
                    the error from happening. For example, a customer not having enough funds on his card account renders an
          <code>ECommerceException</code>
          with
                    the
          <code>fixableByYou</code>
          set to
          <tt>true</tt>
          . If, on the other hand, we have problems communicating with the database,
                    the
          <code>fixableByYou</code>
          flag should be false.
          <br/>
          When this flag is false there is nothing you can do except showing the customer the error message.
        </p>
        <p>
          The exception contains two error messages. One of them, the exception message, is a technical description of
                    what went wrong, and
          <strong>it's NOT suitable to show the end user</strong>
          . Just log it, and use it for diagnosing
                    and development.
          <br/>
          The userErrorMessage on the other hand, we more or less require you to show to the customer if something went
                    wrong. The reason for requiring you to show it is that some of the messages we return have a legal meaning not to be
                    fiddled with.
        </p>
      </xsd:documentation>
    </annotation>
    <sequence>
      <element name="errorTypeDescription" type="common:nonEmptyString">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The textual description of the error type. See the list above.</xsd:documentation>
        </annotation>
      </element>
      <element name="errorTypeId" type="int">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">Indicates which kind of error this is. See the list above.</xsd:documentation>
        </annotation>
      </element>
      <element name="fixableByYou" type="boolean">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">
            "If this error have been avoided with some other input" =
            <tt>true</tt>
            <br/>
            "It a Resurs Bank problem" =
            <tt>false</tt>
          </xsd:documentation>
        </annotation>
      </element>
      <element name="userErrorMessage" type="common:nonEmptyString">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">An error message intended for the user of the web shop. This message must be shown!</xsd:documentation>
        </annotation>
      </element>
    </sequence>
  </complexType>
</schema>]]></con:content><con:type>http://www.w3.org/2001/XMLSchema</con:type></con:part></con:definitionCache><con:endpoints><con:endpoint>${#Project#ServiceEndpoint}/DeveloperWebService</con:endpoint><con:endpoint>http://ws.ecom.pte.loc/ws/V4/DeveloperWebService</con:endpoint><con:endpoint>https://test.resurs.com/ecommerce-test/ws/V4/DeveloperWebService</con:endpoint></con:endpoints><con:operation isOneWay="false" action="" name="getLimitApplicationTemplate" bindingOperationName="getLimitApplicationTemplate" type="Request-Response" inputName="" receivesAttachments="false" sendsAttachments="false" anonymous="optional"><con:settings/><con:call name="Request 1"><con:settings/><con:encoding>UTF-8</con:encoding><con:endpoint>https://test.resurs.com/ecommerce-test/ws/V4/DeveloperWebService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:dev="http://ecommerce.resurs.com/v4/msg/developer">
   <soapenv:Header/>
   <soapenv:Body>
      <dev:getLimitApplicationTemplate>
         <!--type: id-->
         <paymentMethodId>?</paymentMethodId>
         <!--type: positiveDecimal-->
         <sum>?</sum>
      </dev:getLimitApplicationTemplate>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:wsaConfig mustUnderstand="NONE" version="200508" action="http://ecommerce.resurs.com/v4/DeveloperWebService/getCreditApplicationTemplateRequest"/></con:call></con:operation><con:operation isOneWay="false" action="" name="isSigned" bindingOperationName="isSigned" type="Request-Response" inputName="" receivesAttachments="false" sendsAttachments="false" anonymous="optional"><con:settings/><con:call name="Request 1"><con:settings/><con:encoding>UTF-8</con:encoding><con:endpoint>https://test.resurs.com/ecommerce-test/ws/V4/DeveloperWebService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:dev="http://ecommerce.resurs.com/v4/msg/developer">
   <soapenv:Header/>
   <soapenv:Body>
      <dev:isSigned>
         <!--type: id-->
         <signingId>gero et</signingId>
      </dev:isSigned>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:wsaConfig mustUnderstand="NONE" version="200508" action="http://ecommerce.resurs.com/v4/DeveloperWebService/isSignedRequest"/></con:call></con:operation><con:operation isOneWay="false" action="" name="triggerEvent" bindingOperationName="triggerEvent" type="Request-Response" inputName="" receivesAttachments="false" sendsAttachments="false" anonymous="optional"><con:settings/><con:call name="Request 1"><con:settings/><con:encoding>UTF-8</con:encoding><con:endpoint>https://test.resurs.com/ecommerce-test/ws/V4/DeveloperWebService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:dev="http://ecommerce.resurs.com/v4/msg/developer">
   <soapenv:Header/>
   <soapenv:Body>
      <dev:triggerEvent>
         <!--type: id-->
         <eventType>gero et</eventType>
         <!--Zero or more repetitions:-->
         <!--type: string-->
         <param>sonoras imperio</param>
      </dev:triggerEvent>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:wsaConfig mustUnderstand="NONE" version="200508" action="http://ecommerce.resurs.com/v4/DeveloperWebService/triggerEventRequest"/></con:call></con:operation><con:operation isOneWay="false" action="" name="exposeRevision" bindingOperationName="exposeRevision" type="Request-Response" inputName="" receivesAttachments="false" sendsAttachments="false" anonymous="optional"><con:settings/><con:call name="Request 1"><con:settings/><con:encoding>UTF-8</con:encoding><con:endpoint>https://test.resurs.com/ecommerce-test/ws/V4/DeveloperWebService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:dev="http://ecommerce.resurs.com/v4/msg/developer">
   <soapenv:Header/>
   <soapenv:Body>
      <dev:exposeRevision/>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:wsaConfig mustUnderstand="NONE" version="200508" action="http://ecommerce.resurs.com/v4/DeveloperWebService/exposeRevisionRequest"/></con:call></con:operation></con:interface><con:interface xsi:type="con:WsdlInterface" wsaVersion="NONE" name="AfterShopFlowWebServiceImplPortBinding" type="wsdl" bindingName="{http://ecommerce.resurs.com/v4}AfterShopFlowWebServiceImplPortBinding" soapVersion="1_1" anonymous="optional" definition="https://test.resurs.com/ecommerce-test/ws/V4/AfterShopFlowService?wsdl" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:settings/><con:definitionCache type="TEXT" rootPart="https://test.resurs.com/ecommerce-test/ws/V4/AfterShopFlowService?wsdl"><con:part><con:url>https://test.resurs.com/ecommerce-test/ws/V4/AfterShopFlowService?wsdl</con:url><con:content><![CDATA[<definitions name="AfterShopFlowService" targetNamespace="http://ecommerce.resurs.com/v4" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:wsdl="http://schemas.xmlsoap.org/wsdl/" xmlns:tns="http://ecommerce.resurs.com/v4" xmlns:soap="http://schemas.xmlsoap.org/wsdl/soap/" xmlns:msg="http://ecommerce.resurs.com/v4/msg/aftershopflow" xmlns:exc="http://ecommerce.resurs.com/v4/msg/exception" xmlns="http://schemas.xmlsoap.org/wsdl/">
  <types>
    <xsd:schema targetNamespace="http://ecommerce.resurs.com/v4/aftershopflow">
      <xsd:import namespace="http://ecommerce.resurs.com/v4/msg/aftershopflow" schemaLocation="https://test.resurs.com/ecommerce-test/ws/V4/AfterShopFlowService?xsd=schemas/messages/AfterShopFlowServiceMessages.xsd"/>
      <xsd:import namespace="http://ecommerce.resurs.com/v4/msg/exception" schemaLocation="https://test.resurs.com/ecommerce-test/ws/V4/AfterShopFlowService?xsd=schemas/messages/Exceptions.xsd"/>
    </xsd:schema>
  </types>
  <message name="getPaymentDocumentResponse">
    <part element="msg:getPaymentDocumentResponse" name="parameters"></part>
  </message>
  <message name="creditPaymentResponse">
    <part element="msg:creditPaymentResponse" name="parameters"></part>
  </message>
  <message name="getCustomerBonus">
    <part element="msg:getCustomerBonus" name="parameters"></part>
  </message>
  <message name="findPaymentsResponse">
    <part element="msg:findPaymentsResponse" name="parameters"></part>
  </message>
  <message name="calculateResultSizeResponse">
    <part element="msg:calculateResultSizeResponse" name="parameters"></part>
  </message>
  <message name="calculateResultSize">
    <part element="msg:calculateResultSize" name="parameters"></part>
  </message>
  <message name="ECommerceErrorException">
    <part element="exc:ECommerceError" name="fault"></part>
  </message>
  <message name="getPaymentDocumentNamesResponse">
    <part element="msg:getPaymentDocumentNamesResponse" name="parameters"></part>
  </message>
  <message name="annulPayment">
    <part element="msg:annulPayment" name="parameters"></part>
  </message>
  <message name="addMetaData">
    <part element="msg:addMetaData" name="parameters"></part>
  </message>
  <message name="additionalDebitOfPayment">
    <part element="msg:additionalDebitOfPayment" name="parameters"></part>
  </message>
  <message name="getCustomerBonusResponse">
    <part element="msg:getCustomerBonusResponse" name="parameters"></part>
  </message>
  <message name="finalizePayment">
    <part element="msg:finalizePayment" name="parameters"></part>
  </message>
  <message name="additionalDebitOfPaymentResponse">
    <part element="msg:additionalDebitOfPaymentResponse" name="parameters"></part>
  </message>
  <message name="withdrawBonusPoints">
    <part element="msg:withdrawBonusPoints" name="parameters"></part>
  </message>
  <message name="addMetaDataResponse">
    <part element="msg:addMetaDataResponse" name="parameters"></part>
  </message>
  <message name="insertBonusPoints">
    <part element="msg:insertBonusPoints" name="parameters"></part>
  </message>
  <message name="insertBonusPointsResponse">
    <part element="msg:insertBonusPointsResponse" name="parameters"></part>
  </message>
  <message name="withdrawBonusPointsResponse">
    <part element="msg:withdrawBonusPointsResponse" name="parameters"></part>
  </message>
  <message name="getPaymentDocument">
    <part element="msg:getPaymentDocument" name="parameters"></part>
  </message>
  <message name="creditPayment">
    <part element="msg:creditPayment" name="parameters"></part>
  </message>
  <message name="getPaymentResponse">
    <part element="msg:getPaymentResponse" name="parameters"></part>
  </message>
  <message name="finalizePaymentResponse">
    <part element="msg:finalizePaymentResponse" name="parameters"></part>
  </message>
  <message name="getPaymentDocumentNames">
    <part element="msg:getPaymentDocumentNames" name="parameters"></part>
  </message>
  <message name="findPayments">
    <part element="msg:findPayments" name="parameters"></part>
  </message>
  <message name="getPayment">
    <part element="msg:getPayment" name="parameters"></part>
  </message>
  <message name="annulPaymentResponse">
    <part element="msg:annulPaymentResponse" name="parameters"></part>
  </message>
  <portType name="AfterShopFlowWebService">
    <wsdl:documentation xmlns="http://www.w3.org/1999/xhtml">The After-Shop Flow WebService provides all services available to the representative when the
purchase is past the shop flow, i.e. from the time it has been booked and onwards.</wsdl:documentation>
    <operation name="additionalDebitOfPayment">
      <wsdl:documentation xmlns="http://www.w3.org/1999/xhtml">
        Makes a new, additional debit on an existing payment. This reserves the amount on the customer's
                account.
        <br/>
        <strong>NB:</strong>
        If it is a credit payment, there must be room for the additional
                debit within the limit.
      </wsdl:documentation>
      <input message="tns:additionalDebitOfPayment"></input>
      <output message="tns:additionalDebitOfPaymentResponse"></output>
      <fault message="tns:ECommerceErrorException" name="ECommerceErrorException">
        <wsdl:documentation xmlns="http://www.w3.org/1999/xhtml">Failed to make an additional debit on the payment. See error for details.</wsdl:documentation>
      </fault>
    </operation>
    <operation name="finalizePayment">
      <wsdl:documentation xmlns="http://www.w3.org/1999/xhtml">
        Finalizes a payment. When a payment is finalized, the amount will be transferred from the customer's
                account to that of the representative.
        <br/>
        <strong>NB:</strong>
        For a payment to be finalized, it must be booked and it cannot be frozen.
      </wsdl:documentation>
      <input message="tns:finalizePayment"></input>
      <output message="tns:finalizePaymentResponse"></output>
      <fault message="tns:ECommerceErrorException" name="ECommerceErrorException">
        <wsdl:documentation xmlns="http://www.w3.org/1999/xhtml">Failed to finalize the payment. See error for details.</wsdl:documentation>
      </fault>
    </operation>
    <operation name="annulPayment">
      <wsdl:documentation xmlns="http://www.w3.org/1999/xhtml">
        Annuls the payment
        <strong>or</strong>
        part of it. This removes the reservation on the customer's account.
        <br/>
        <strong>NB:</strong>
        For a payment to be annulled, it must be booked. If it has been finalized,
                it can no longer be annulled. (Finalized payments have to be credited.)
      </wsdl:documentation>
      <input message="tns:annulPayment"></input>
      <output message="tns:annulPaymentResponse"></output>
      <fault message="tns:ECommerceErrorException" name="ECommerceErrorException">
        <wsdl:documentation xmlns="http://www.w3.org/1999/xhtml">Failed to annul the payment. See error for details.</wsdl:documentation>
      </fault>
    </operation>
    <operation name="creditPayment">
      <wsdl:documentation xmlns="http://www.w3.org/1999/xhtml">
        Credits the payment
        <strong>or</strong>
        part of it. This returns payment amount from the representative
                to the customer's account.
        <p>To remove a part</p>
        <br/>
        <strong>NB:</strong>
        For a payment to be credited, it must be finalized.
                (Non-finalized payments have to be annulled.)
      </wsdl:documentation>
      <input message="tns:creditPayment"></input>
      <output message="tns:creditPaymentResponse"></output>
      <fault message="tns:ECommerceErrorException" name="ECommerceErrorException">
        <wsdl:documentation xmlns="http://www.w3.org/1999/xhtml">Failed to credit the payment. See error for details.</wsdl:documentation>
      </fault>
    </operation>
    <operation name="addMetaData">
      <wsdl:documentation xmlns="http://www.w3.org/1999/xhtml">
        Adds meta data to the payment. The meta data can be used to register additional
                information about the payment, and they may also be used for searching.
        <br/>
        <strong>NB:</strong>
        Currently, meta data cannot be removed from a payment.
                However, existing values can be over-written.
      </wsdl:documentation>
      <input message="tns:addMetaData"></input>
      <output message="tns:addMetaDataResponse"></output>
      <fault message="tns:ECommerceErrorException" name="ECommerceErrorException">
        <wsdl:documentation xmlns="http://www.w3.org/1999/xhtml">Failed to add meta data to the payment. See error for details.</wsdl:documentation>
      </fault>
    </operation>
    <operation name="getPayment">
      <wsdl:documentation xmlns="http://www.w3.org/1999/xhtml">Retrieves detailed information about the payment.</wsdl:documentation>
      <input message="tns:getPayment"></input>
      <output message="tns:getPaymentResponse"></output>
      <fault message="tns:ECommerceErrorException" name="ECommerceErrorException">
        <wsdl:documentation xmlns="http://www.w3.org/1999/xhtml">Failed to retrieve the payment details. See error for details.</wsdl:documentation>
      </fault>
    </operation>
    <operation name="getPaymentDocument">
      <wsdl:documentation xmlns="http://www.w3.org/1999/xhtml">Retrieves a specified document from the payment.</wsdl:documentation>
      <input message="tns:getPaymentDocument"></input>
      <output message="tns:getPaymentDocumentResponse"></output>
      <fault message="tns:ECommerceErrorException" name="ECommerceErrorException">
        <wsdl:documentation xmlns="http://www.w3.org/1999/xhtml">Failed to retrieve the specified payment document. See error for details.</wsdl:documentation>
      </fault>
    </operation>
    <operation name="getPaymentDocumentNames">
      <wsdl:documentation xmlns="http://www.w3.org/1999/xhtml">Retrieves the names of all documents associated with the payments. These
                include, but are not necessarily limited to, previously generated invoices
                and credit notes sent to the customer.</wsdl:documentation>
      <input message="tns:getPaymentDocumentNames"></input>
      <output message="tns:getPaymentDocumentNamesResponse"></output>
      <fault message="tns:ECommerceErrorException" name="ECommerceErrorException">
        <wsdl:documentation xmlns="http://www.w3.org/1999/xhtml">Failed to retrieve the list of payment document names. See error for details.</wsdl:documentation>
      </fault>
    </operation>
    <operation name="calculateResultSize">
      <wsdl:documentation xmlns="http://www.w3.org/1999/xhtml">Returns the number of payments that match the specified requirements. Can be
                used for paging of the results.</wsdl:documentation>
      <input message="tns:calculateResultSize"></input>
      <output message="tns:calculateResultSizeResponse"></output>
      <fault message="tns:ECommerceErrorException" name="ECommerceErrorException">
        <wsdl:documentation xmlns="http://www.w3.org/1999/xhtml">Failed to calculate the search result size. See error for details.</wsdl:documentation>
      </fault>
    </operation>
    <operation name="findPayments">
      <wsdl:documentation xmlns="http://www.w3.org/1999/xhtml">
        Searches for payments that match the specified requirements.
        <strong>The result may be a couple of
                minutes old</strong>
        . Do not use this function to locate just booked payments, and prefer getPayment
                if a paymentId is present.
      </wsdl:documentation>
      <input message="tns:findPayments"></input>
      <output message="tns:findPaymentsResponse"></output>
      <fault message="tns:ECommerceErrorException" name="ECommerceErrorException">
        <wsdl:documentation xmlns="http://www.w3.org/1999/xhtml">Failed to search for payments. See error for details.</wsdl:documentation>
      </fault>
    </operation>
    <operation name="insertBonusPoints">
      <wsdl:documentation xmlns="http://www.w3.org/1999/xhtml">Insert bonus points on a specific customer.</wsdl:documentation>
      <input message="tns:insertBonusPoints"></input>
      <output message="tns:insertBonusPointsResponse"></output>
      <fault message="tns:ECommerceErrorException" name="ECommerceErrorException">
        <wsdl:documentation xmlns="http://www.w3.org/1999/xhtml">Failed to insert the points</wsdl:documentation>
      </fault>
    </operation>
    <operation name="withdrawBonusPoints">
      <wsdl:documentation xmlns="http://www.w3.org/1999/xhtml">Withdraw bonus points on a specific customer.</wsdl:documentation>
      <input message="tns:withdrawBonusPoints"></input>
      <output message="tns:withdrawBonusPointsResponse"></output>
      <fault message="tns:ECommerceErrorException" name="ECommerceErrorException">
        <wsdl:documentation xmlns="http://www.w3.org/1999/xhtml">Failed to withdraw the points</wsdl:documentation>
      </fault>
    </operation>
    <operation name="getCustomerBonus">
      <wsdl:documentation xmlns="http://www.w3.org/1999/xhtml">
        Fetches the bonus the customer have, if any.
        <p/>
        <a href="https://test.resurs.com/docs/x/CAAv">Read more about bonus</a>
      </wsdl:documentation>
      <input message="tns:getCustomerBonus"></input>
      <output message="tns:getCustomerBonusResponse"></output>
      <fault message="tns:ECommerceErrorException" name="ECommerceErrorException">
        <wsdl:documentation xmlns="http://www.w3.org/1999/xhtml">Failed to get customer bonus.</wsdl:documentation>
      </fault>
    </operation>
  </portType>
  <binding name="AfterShopFlowWebServiceImplPortBinding" type="tns:AfterShopFlowWebService">
    <soap:binding style="document" transport="http://schemas.xmlsoap.org/soap/http"/>
    <operation name="additionalDebitOfPayment">
      <soap:operation soapAction=""/>
      <input>
        <soap:body use="literal"/>
      </input>
      <output>
        <soap:body use="literal"/>
      </output>
      <fault name="ECommerceErrorException">
        <soap:fault name="ECommerceErrorException" use="literal"/>
      </fault>
    </operation>
    <operation name="finalizePayment">
      <soap:operation soapAction=""/>
      <input>
        <soap:body use="literal"/>
      </input>
      <output>
        <soap:body use="literal"/>
      </output>
      <fault name="ECommerceErrorException">
        <soap:fault name="ECommerceErrorException" use="literal"/>
      </fault>
    </operation>
    <operation name="annulPayment">
      <soap:operation soapAction=""/>
      <input>
        <soap:body use="literal"/>
      </input>
      <output>
        <soap:body use="literal"/>
      </output>
      <fault name="ECommerceErrorException">
        <soap:fault name="ECommerceErrorException" use="literal"/>
      </fault>
    </operation>
    <operation name="creditPayment">
      <soap:operation soapAction=""/>
      <input>
        <soap:body use="literal"/>
      </input>
      <output>
        <soap:body use="literal"/>
      </output>
      <fault name="ECommerceErrorException">
        <soap:fault name="ECommerceErrorException" use="literal"/>
      </fault>
    </operation>
    <operation name="addMetaData">
      <soap:operation soapAction=""/>
      <input>
        <soap:body use="literal"/>
      </input>
      <output>
        <soap:body use="literal"/>
      </output>
      <fault name="ECommerceErrorException">
        <soap:fault name="ECommerceErrorException" use="literal"/>
      </fault>
    </operation>
    <operation name="getPayment">
      <soap:operation soapAction=""/>
      <input>
        <soap:body use="literal"/>
      </input>
      <output>
        <soap:body use="literal"/>
      </output>
      <fault name="ECommerceErrorException">
        <soap:fault name="ECommerceErrorException" use="literal"/>
      </fault>
    </operation>
    <operation name="getPaymentDocumentNames">
      <soap:operation soapAction=""/>
      <input>
        <soap:body use="literal"/>
      </input>
      <output>
        <soap:body use="literal"/>
      </output>
      <fault name="ECommerceErrorException">
        <soap:fault name="ECommerceErrorException" use="literal"/>
      </fault>
    </operation>
    <operation name="getPaymentDocument">
      <soap:operation soapAction=""/>
      <input>
        <soap:body use="literal"/>
      </input>
      <output>
        <soap:body use="literal"/>
      </output>
      <fault name="ECommerceErrorException">
        <soap:fault name="ECommerceErrorException" use="literal"/>
      </fault>
    </operation>
    <operation name="calculateResultSize">
      <soap:operation soapAction=""/>
      <input>
        <soap:body use="literal"/>
      </input>
      <output>
        <soap:body use="literal"/>
      </output>
      <fault name="ECommerceErrorException">
        <soap:fault name="ECommerceErrorException" use="literal"/>
      </fault>
    </operation>
    <operation name="findPayments">
      <soap:operation soapAction=""/>
      <input>
        <soap:body use="literal"/>
      </input>
      <output>
        <soap:body use="literal"/>
      </output>
      <fault name="ECommerceErrorException">
        <soap:fault name="ECommerceErrorException" use="literal"/>
      </fault>
    </operation>
    <operation name="insertBonusPoints">
      <soap:operation soapAction=""/>
      <input>
        <soap:body use="literal"/>
      </input>
      <output>
        <soap:body use="literal"/>
      </output>
      <fault name="ECommerceErrorException">
        <soap:fault name="ECommerceErrorException" use="literal"/>
      </fault>
    </operation>
    <operation name="withdrawBonusPoints">
      <soap:operation soapAction=""/>
      <input>
        <soap:body use="literal"/>
      </input>
      <output>
        <soap:body use="literal"/>
      </output>
      <fault name="ECommerceErrorException">
        <soap:fault name="ECommerceErrorException" use="literal"/>
      </fault>
    </operation>
    <operation name="getCustomerBonus">
      <soap:operation soapAction=""/>
      <input>
        <soap:body use="literal"/>
      </input>
      <output>
        <soap:body use="literal"/>
      </output>
      <fault name="ECommerceErrorException">
        <soap:fault name="ECommerceErrorException" use="literal"/>
      </fault>
    </operation>
  </binding>
  <service name="AfterShopFlowService">
    <port binding="tns:AfterShopFlowWebServiceImplPortBinding" name="AfterShopFlowWebServiceImplPort">
      <soap:address location="https://test.resurs.com/ecommerce-test/ws/V4/AfterShopFlowService"/>
    </port>
  </service>
</definitions>]]></con:content><con:type>http://schemas.xmlsoap.org/wsdl/</con:type></con:part><con:part><con:url>https://test.resurs.com/ecommerce-test/ws/V4/AfterShopFlowService?xsd=schemas/messages/AfterShopFlowServiceMessages.xsd</con:url><con:content><![CDATA[<schema targetNamespace="http://ecommerce.resurs.com/v4/msg/aftershopflow" version="4.0" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:types="http://ecommerce.resurs.com/v4/types/aftershopflow" xmlns:tns="http://ecommerce.resurs.com/v4/msg/aftershopflow" xmlns:common="http://ecommerce.resurs.com/v4/types/common" xmlns="http://www.w3.org/2001/XMLSchema">
  <import namespace="http://ecommerce.resurs.com/v4/types/common" schemaLocation="https://test.resurs.com/ecommerce-test/ws/V4/AfterShopFlowService?xsd=schemas/types/common.xsd"/>
  <import namespace="http://ecommerce.resurs.com/v4/types/aftershopflow" schemaLocation="https://test.resurs.com/ecommerce-test/ws/V4/AfterShopFlowService?xsd=schemas/types/aftershopflow.xsd"/>
  <element name="additionalDebitOfPayment" type="tns:additionalDebitOfPayment"/>
  <element name="additionalDebitOfPaymentResponse" type="tns:additionalDebitOfPaymentResponse"/>
  <element name="finalizePayment" type="tns:finalizePayment"/>
  <element name="finalizePaymentResponse" type="tns:finalizePaymentResponse"/>
  <element name="annulPayment" type="tns:annulPayment"/>
  <element name="annulPaymentResponse" type="tns:annulPaymentResponse"/>
  <element name="creditPayment" type="tns:creditPayment"/>
  <element name="creditPaymentResponse" type="tns:creditPaymentResponse"/>
  <element name="addMetaData" type="tns:addMetaData"/>
  <element name="addMetaDataResponse" type="tns:addMetaDataResponse"/>
  <element name="getPayment" type="tns:getPayment"/>
  <element name="getPaymentResponse" type="tns:getPaymentResponse"/>
  <element name="getPaymentDocumentNames" type="tns:getPaymentDocumentNames"/>
  <element name="getPaymentDocumentNamesResponse" type="tns:getPaymentDocumentNamesResponse"/>
  <element name="getPaymentDocument" type="tns:getPaymentDocument"/>
  <element name="getPaymentDocumentResponse" type="tns:getPaymentDocumentResponse"/>
  <element name="calculateResultSize" type="tns:calculateResultSize"/>
  <element name="calculateResultSizeResponse" type="tns:calculateResultSizeResponse"/>
  <element name="findPayments" type="tns:findPayments"/>
  <element name="findPaymentsResponse" type="tns:findPaymentsResponse"/>
  <element name="insertBonusPoints" type="tns:insertBonusPoints"/>
  <element name="insertBonusPointsResponse" type="tns:insertBonusPointsResponse"/>
  <element name="withdrawBonusPoints" type="tns:withdrawBonusPoints"/>
  <element name="withdrawBonusPointsResponse" type="tns:withdrawBonusPointsResponse"/>
  <element name="getCustomerBonus" type="tns:getCustomerBonus"/>
  <element name="getCustomerBonusResponse" type="tns:getCustomerBonusResponse"/>
  <complexType name="additionalDebitOfPayment">
    <sequence>
      <element name="paymentId" type="common:id">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The identity of the payment to which to make an additional debit.</xsd:documentation>
        </annotation>
      </element>
      <element minOccurs="0" name="paymentSpec" nillable="true" type="common:paymentSpec">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The specification of the additional payment.</xsd:documentation>
        </annotation>
      </element>
      <element minOccurs="0" name="createdBy" nillable="true" type="common:nonEmptyString">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The username of the person performing the operation.</xsd:documentation>
        </annotation>
      </element>
    </sequence>
  </complexType>
  <complexType name="additionalDebitOfPaymentResponse">
    <sequence/>
  </complexType>
  <complexType name="finalizePayment">
    <sequence>
      <element name="paymentId" type="common:id">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The identity of the payment.</xsd:documentation>
        </annotation>
      </element>
      <element minOccurs="0" name="preferredTransactionId" nillable="true" type="common:id">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">An identifier which is reported back in economic reports. Can thus be used as a key to track
                        transactions. It's optional!</xsd:documentation>
        </annotation>
      </element>
      <element minOccurs="0" name="partPaymentSpec" nillable="true" type="common:paymentSpec">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">
            The specification, the specific part of the payment, which should be finalized. Can be
                        omitted in which case the whole payment is finalized.
            <p/>
            If the full payment is finalized, no row information needs to be supplied, only the amount.
          </xsd:documentation>
        </annotation>
      </element>
      <element minOccurs="0" name="createdBy" nillable="true" type="common:nonEmptyString">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">An identifier of a person or entity performing the operation. Used for auditing.</xsd:documentation>
        </annotation>
      </element>
      <element minOccurs="0" name="orderId" nillable="true" type="common:id">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The order number.</xsd:documentation>
        </annotation>
      </element>
      <element minOccurs="0" name="orderDate" nillable="true" type="date">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The order date.</xsd:documentation>
        </annotation>
      </element>
      <element minOccurs="0" name="invoiceId" nillable="true" type="common:id">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">
            The invoice number.
            <br/>
            This will be printed on the invoice. For payment methods other than
            <pre>INVOICE</pre>
            , setting
                        this will generate an error.
          </xsd:documentation>
        </annotation>
      </element>
      <element minOccurs="0" name="invoiceDate" nillable="true" type="date">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">
            The invoice date.
            <br/>
            This will be printed on the invoice. For payment methods other than
                        INVOICE, setting this will generate an error.
          </xsd:documentation>
        </annotation>
      </element>
      <element default="EMAIL" minOccurs="0" name="invoiceDeliveryType" nillable="true" type="common:invoiceDeliveryTypeEnum">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">
            This option will let you decided how the INVOICE should be delivered.
            <pre>NONE</pre>
            ,
            <pre>EMAIL</pre>
            or by
            <pre>POSTAL</pre>
            .
          </xsd:documentation>
        </annotation>
      </element>
    </sequence>
  </complexType>
  <complexType name="finalizePaymentResponse">
    <sequence/>
  </complexType>
  <complexType name="annulPayment">
    <sequence>
      <element name="paymentId" type="common:id">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The identity of the payment.</xsd:documentation>
        </annotation>
      </element>
      <element minOccurs="0" name="partPaymentSpec" nillable="true" type="common:paymentSpec">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The specification, the specific part of the payment, which should be annulled. Can be
                        omitted in which case the whole payment is annulled.</xsd:documentation>
        </annotation>
      </element>
      <element minOccurs="0" name="createdBy" nillable="true" type="common:nonEmptyString">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">An identifier of a person or entity performing the operation. Used for auditing.</xsd:documentation>
        </annotation>
      </element>
    </sequence>
  </complexType>
  <complexType name="annulPaymentResponse">
    <sequence/>
  </complexType>
  <complexType name="creditPayment">
    <sequence>
      <element name="paymentId" type="common:id">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The identity of the payment.</xsd:documentation>
        </annotation>
      </element>
      <element minOccurs="0" name="preferredTransactionId" nillable="true" type="common:id">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">An identifier which is reported back in economic reports. Can thus be used as a key to track
                        transactions. It's optional!</xsd:documentation>
        </annotation>
      </element>
      <element minOccurs="0" name="partPaymentSpec" nillable="true" type="common:paymentSpec">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The specification, the specific part of the payment, which should be credited. Can be
                        omitted in which case all finalized parts of the payment is credited.</xsd:documentation>
        </annotation>
      </element>
      <element minOccurs="0" name="createdBy" nillable="true" type="common:nonEmptyString">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">An identifier of a person or entity performing the operation. Used for auditing.</xsd:documentation>
        </annotation>
      </element>
      <element minOccurs="0" name="creditNoteId" nillable="true" type="common:id">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">
            The credit note number.
            <br/>
            This will be printed on the credit note.
                        For payment methods other than INVOICE, setting this will generate an error.
          </xsd:documentation>
        </annotation>
      </element>
      <element minOccurs="0" name="creditNoteDate" nillable="true" type="date">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">
            The credit note date.
            <br/>
            This will be printed on the credit note.
                        For payment methods other than INVOICE, setting this will generate an error.
          </xsd:documentation>
        </annotation>
      </element>
      <element default="EMAIL" minOccurs="0" name="invoiceDeliveryType" nillable="true" type="common:invoiceDeliveryTypeEnum">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">This option will let you decided how the invoice should be delivered. NONE, EMAIL or by POSTAL.</xsd:documentation>
        </annotation>
      </element>
    </sequence>
  </complexType>
  <complexType name="creditPaymentResponse">
    <sequence/>
  </complexType>
  <complexType name="addMetaData">
    <sequence>
      <element name="paymentId" type="common:id">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The identity of the payment.</xsd:documentation>
        </annotation>
      </element>
      <element name="key" type="string">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The meta data key. If meta data with this key is present on the payment already the data
                        will be replaced with the one sent with this request.</xsd:documentation>
        </annotation>
      </element>
      <element minOccurs="0" name="value" nillable="true" type="string">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">
            The meta data value. Can be
            <pre>null</pre>
            .
          </xsd:documentation>
        </annotation>
      </element>
    </sequence>
  </complexType>
  <complexType name="addMetaDataResponse">
    <sequence/>
  </complexType>
  <complexType name="getPayment">
    <sequence>
      <element name="paymentId" type="common:id">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The identity of the payment.</xsd:documentation>
        </annotation>
      </element>
    </sequence>
  </complexType>
  <complexType name="getPaymentResponse">
    <sequence>
      <element name="return" type="types:payment">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The payment details.</xsd:documentation>
        </annotation>
      </element>
    </sequence>
  </complexType>
  <complexType name="getPaymentDocumentNames">
    <sequence>
      <element name="paymentId" type="common:id">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The identity of the payment.</xsd:documentation>
        </annotation>
      </element>
    </sequence>
  </complexType>
  <complexType name="getPaymentDocumentNamesResponse">
    <sequence>
      <element maxOccurs="unbounded" minOccurs="0" name="return" type="string">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The names of all documents associated with the payment.</xsd:documentation>
        </annotation>
      </element>
    </sequence>
  </complexType>
  <complexType name="getPaymentDocument">
    <sequence>
      <element name="paymentId" type="common:id">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The identity of the payment.</xsd:documentation>
        </annotation>
      </element>
      <element name="documentName" type="common:nonEmptyString">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The name of the document.</xsd:documentation>
        </annotation>
      </element>
    </sequence>
  </complexType>
  <complexType name="getPaymentDocumentResponse">
    <sequence>
      <element name="return" type="types:pdf">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The document. Will cause an error is the payment and/or document doesn't exist.</xsd:documentation>
        </annotation>
      </element>
    </sequence>
  </complexType>
  <complexType name="calculateResultSize">
    <sequence>
      <element name="searchCriteria" type="types:searchCriteria">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The search criteria.</xsd:documentation>
        </annotation>
      </element>
    </sequence>
  </complexType>
  <complexType name="calculateResultSizeResponse">
    <sequence>
      <element name="return" type="int">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The number of payments matching the specified search criteria.</xsd:documentation>
        </annotation>
      </element>
    </sequence>
  </complexType>
  <complexType name="findPayments">
    <sequence>
      <element name="searchCriteria" type="types:searchCriteria">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The search criteria.</xsd:documentation>
        </annotation>
      </element>
      <element minOccurs="0" name="pageNumber" nillable="true" type="unsignedLong">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The desired page number.</xsd:documentation>
        </annotation>
      </element>
      <element minOccurs="0" name="itemsPerPage" nillable="true" type="unsignedLong">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The number of items to return per page.</xsd:documentation>
        </annotation>
      </element>
      <element minOccurs="0" name="sortBy" nillable="true" type="types:sortOrder">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The sort order of the results.</xsd:documentation>
        </annotation>
      </element>
    </sequence>
  </complexType>
  <complexType name="findPaymentsResponse">
    <sequence>
      <element maxOccurs="unbounded" minOccurs="0" name="return" type="types:basicPayment">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">A list of payments matching the specified search criteria. Please observe the data return
                        is more brief than a full payment. To fetch the full payment, use the getPayment function.</xsd:documentation>
        </annotation>
      </element>
    </sequence>
  </complexType>
  <complexType name="insertBonusPoints">
    <sequence>
      <element name="governmentId" type="string">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The government identity of the customer whose account the bonus points shall be inserted to.</xsd:documentation>
        </annotation>
      </element>
      <element minOccurs="0" name="customerType" type="common:customerType">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">
            The type of customer.
            <br/>
            In many cases, this is easily determined from the
                        government identity, but for Swedish companies in sole proprietorship, the same identity is
                        used for both the person as a natural customer, and the company as a legal customer.
            <p/>
            If this value is omitted we will try to parse the government id as a natural first and secondly
                        as a legal entity.
          </xsd:documentation>
        </annotation>
      </element>
      <element name="bonusPoints" type="positiveInteger">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">Number of bonus points to insert.</xsd:documentation>
        </annotation>
      </element>
      <element name="expirationDate" type="date">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The last day to use the bonus points. After the expiration date, the bonus points will removed.</xsd:documentation>
        </annotation>
      </element>
    </sequence>
  </complexType>
  <complexType name="insertBonusPointsResponse">
    <sequence/>
  </complexType>
  <complexType name="withdrawBonusPoints">
    <sequence>
      <element name="governmentId" type="string">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The government identity of the customer whose account the bonus points will be withdrawn from.</xsd:documentation>
        </annotation>
      </element>
      <element minOccurs="0" name="customerType" type="common:customerType">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">
            The type of customer.
            <br/>
            In many cases, this is easily determined from the
                        government identity, but for Swedish companies in sole proprietorship, the same identity is
                        used for both the person as a natural customer, and the company as a legal customer.
            <p/>
            If this value is omitted we will try to parse the government id as a natural first and secondly
                        as a legal entity.
          </xsd:documentation>
        </annotation>
      </element>
      <element name="bonusPoints" type="positiveInteger">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">Number of bonus points to withdraw.</xsd:documentation>
        </annotation>
      </element>
    </sequence>
  </complexType>
  <complexType name="withdrawBonusPointsResponse">
    <sequence/>
  </complexType>
  <complexType name="getCustomerBonus">
    <sequence>
      <element name="governmentId" type="string">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The government identity of the customer whose account the bonus points will be withdrawn from.</xsd:documentation>
        </annotation>
      </element>
      <element minOccurs="0" name="customerType" type="common:customerType">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">
            The type of customer.
            <br/>
            In many cases, this is easily determined from the
                        government identity, but for Swedish companies in sole proprietorship, the same identity is
                        used for both the person as a natural customer, and the company as a legal customer.
            <p/>
            If this value is omitted we will try to parse the government id as a natural first and secondly
                        as a legal entity.
          </xsd:documentation>
        </annotation>
      </element>
    </sequence>
  </complexType>
  <complexType name="getCustomerBonusResponse">
    <sequence>
      <element name="return" type="types:bonus">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The number of points the customer have.</xsd:documentation>
        </annotation>
      </element>
    </sequence>
  </complexType>
</schema>]]></con:content><con:type>http://www.w3.org/2001/XMLSchema</con:type></con:part><con:part><con:url>https://test.resurs.com/ecommerce-test/ws/V4/AfterShopFlowService?xsd=schemas/types/common.xsd</con:url><con:content><![CDATA[<schema targetNamespace="http://ecommerce.resurs.com/v4/types/common" version="4.0" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:tns="http://ecommerce.resurs.com/v4/types/common" xmlns="http://www.w3.org/2001/XMLSchema">
  <complexType name="customer">
    <annotation>
      <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">Details about a (potential) customer, be it natural or legal.</xsd:documentation>
    </annotation>
    <sequence>
      <element name="governmentId" type="tns:nonEmptyString">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">
            Identifying a customer uniquely within the country.
            <ul>
              <li>SE: Personnummer/Organisationsnummer</li>
              <li>DK: CPR-number</li>
              <li>NO: Fødselsnummer</li>
              <li>FI: Henkilötunnus</li>
            </ul>
          </xsd:documentation>
        </annotation>
      </element>
      <element name="address" type="tns:address">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">Address of the customer.</xsd:documentation>
        </annotation>
      </element>
      <element minOccurs="0" name="phone" type="string">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The customer telephone number.</xsd:documentation>
        </annotation>
      </element>
      <element minOccurs="0" name="email" type="tns:nonEmptyString">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The customer email address.</xsd:documentation>
        </annotation>
      </element>
      <element name="type" type="tns:customerType">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The type of customer.</xsd:documentation>
        </annotation>
      </element>
    </sequence>
  </complexType>
  <complexType name="address">
    <annotation>
      <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The customer address details.</xsd:documentation>
    </annotation>
    <sequence>
      <element minOccurs="0" name="fullName" type="tns:nonEmptyString">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The full (possibly composite name) of the
                        customer.</xsd:documentation>
        </annotation>
      </element>
      <element minOccurs="0" name="firstName" type="tns:nonEmptyString">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">If available, the first name of the
                        customer.</xsd:documentation>
        </annotation>
      </element>
      <element minOccurs="0" name="lastName" type="tns:nonEmptyString">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">If available, the last name of the
                        customer.</xsd:documentation>
        </annotation>
      </element>
      <element name="addressRow1" type="string">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The first row of the customer address.</xsd:documentation>
        </annotation>
      </element>
      <element minOccurs="0" name="addressRow2" type="tns:nonEmptyString">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">
            The second row of the customer address.
            <br/>
            In practice: Located as a second line on printouts and graphics, like invoices.
          </xsd:documentation>
        </annotation>
      </element>
      <element name="postalArea" type="tns:nonEmptyString">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The postal area.</xsd:documentation>
        </annotation>
      </element>
      <element name="postalCode" type="tns:nonEmptyString">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The postal code.</xsd:documentation>
        </annotation>
      </element>
      <element name="country" type="tns:countryCode">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">In which country is this address located?</xsd:documentation>
        </annotation>
      </element>
    </sequence>
  </complexType>
  <complexType name="mapEntry">
    <annotation>
      <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">
        A representation of a simple map. WebService frameworks are not good at supporting maps natively.
        <br/>
        An instance of this object contains
        <tt>{key, value}</tt>
        -pair. If a list of this type is used,
        <tt>keys</tt>
        <strong>must</strong>
        be unique within the list.
      </xsd:documentation>
    </annotation>
    <sequence>
      <element name="key" type="tns:nonEmptyString">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The key of the pair.</xsd:documentation>
        </annotation>
      </element>
      <element minOccurs="0" name="value" type="string">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The value of the pair.</xsd:documentation>
        </annotation>
      </element>
    </sequence>
  </complexType>
  <simpleType name="countryCode">
    <annotation>
      <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The country code as defined by the ISO 3166-1
                standard.</xsd:documentation>
    </annotation>
    <restriction base="string">
      <enumeration value="SE">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">Sweden</xsd:documentation>
        </annotation>
      </enumeration>
      <enumeration value="NO">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">Norway</xsd:documentation>
        </annotation>
      </enumeration>
      <enumeration value="DK">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">Denmark</xsd:documentation>
        </annotation>
      </enumeration>
      <enumeration value="FI">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">Finland</xsd:documentation>
        </annotation>
      </enumeration>
    </restriction>
  </simpleType>
  <simpleType name="id">
    <annotation>
      <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The standard identity type.</xsd:documentation>
    </annotation>
    <restriction base="string">
      <minLength value="1"/>
      <pattern value="[\p{L}0-9 \._/\-]*"/>
    </restriction>
  </simpleType>
  <simpleType name="nonEmptyString">
    <annotation>
      <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">A string that cannot be empty.</xsd:documentation>
    </annotation>
    <restriction base="string">
      <minLength value="1"/>
    </restriction>
  </simpleType>
  <simpleType name="positiveDecimal">
    <annotation>
      <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">A decimal value of at least zero (0).</xsd:documentation>
    </annotation>
    <restriction base="decimal">
      <minInclusive value="0"/>
    </restriction>
  </simpleType>
  <simpleType name="percent">
    <annotation>
      <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">A percentage between 0% and 100%.</xsd:documentation>
    </annotation>
    <restriction base="decimal">
      <minInclusive value="0"/>
      <maxInclusive value="100"/>
    </restriction>
  </simpleType>
  <simpleType name="multiplier">
    <annotation>
      <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">A decimal multiplier used when calculating annuity
                factors. Between 0 and 1.</xsd:documentation>
    </annotation>
    <restriction base="decimal">
      <minInclusive value="0"/>
      <maxInclusive value="1"/>
    </restriction>
  </simpleType>
  <complexType name="paymentSpec">
    <annotation>
      <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">
        The payment details.
        <br/>
        In it's simples form it's just sum, i e
        <code>totalAmount</code>
        and
        <code>totalVatAmount</code>
        is
                set, but there are no
        <code>specLines</code>
        . If nothing else is said you should send
        <code>specLines</code>
        .
      </xsd:documentation>
    </annotation>
    <sequence>
      <element maxOccurs="unbounded" minOccurs="0" name="specLines" type="tns:specLine">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The list of payment lines. In the case you're sending a simple payment, without lines, this
                        parameter should be left empty. Sending payment lines may, or may not, be mandatory, depending
                        on the contract with Resurs Bank.</xsd:documentation>
        </annotation>
      </element>
      <element name="totalAmount" type="tns:positiveDecimal">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">
            The total payment amount. The sum of all line amounts (if there are lines supplied)
            <strong>including vat</strong>
            . If this payment is without lines this is the only value to be
                        set on the
                        payment spec.
          </xsd:documentation>
        </annotation>
      </element>
      <element minOccurs="0" name="totalVatAmount" nillable="true" type="decimal">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">
            The total VAT amount of the payment.
            <br/>
            This field is
            <strong>required</strong>
            when specification lines are supplied and
            <br/>
            <strong>not</strong>
            allowed if no specification lines are supplied.
          </xsd:documentation>
        </annotation>
      </element>
      <element minOccurs="0" name="bonusPoints" type="nonNegativeInteger">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">
            The number of bonus points to use in this purchase.
            <p/>
            <a href="https://test.resurs.com/docs/x/CAAv">Read more about bonus</a>
          </xsd:documentation>
        </annotation>
      </element>
    </sequence>
  </complexType>
  <complexType name="specLine">
    <annotation>
      <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The payment line (item) specification. These can be used to provide detailed information about the
                contents of the payment.</xsd:documentation>
    </annotation>
    <sequence>
      <element name="id" type="tns:id">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The line identity</xsd:documentation>
        </annotation>
      </element>
      <element name="artNo" type="string">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">Article number of the item.</xsd:documentation>
        </annotation>
      </element>
      <element name="description" type="string">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The item description.</xsd:documentation>
        </annotation>
      </element>
      <element name="quantity" type="decimal">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The line quantity.</xsd:documentation>
        </annotation>
      </element>
      <element name="unitMeasure" type="string">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The line unit.</xsd:documentation>
        </annotation>
      </element>
      <element name="unitAmountWithoutVat" type="decimal">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The unit amount without VAT.</xsd:documentation>
        </annotation>
      </element>
      <element name="vatPct" type="tns:percent">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The VAT percentage.</xsd:documentation>
        </annotation>
      </element>
      <element name="totalVatAmount" type="decimal">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The total item VAT amount.</xsd:documentation>
        </annotation>
      </element>
      <element name="totalAmount" type="decimal">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The total item amount, including VAT.</xsd:documentation>
        </annotation>
      </element>
    </sequence>
  </complexType>
  <simpleType name="paymentStatus">
    <annotation>
      <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">Payment status.</xsd:documentation>
    </annotation>
    <restriction base="string">
      <enumeration value="DEBITABLE">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">Can be debited.</xsd:documentation>
        </annotation>
      </enumeration>
      <enumeration value="CREDITABLE">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">Can be credited.</xsd:documentation>
        </annotation>
      </enumeration>
      <enumeration value="IS_DEBITED">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">Is debited.</xsd:documentation>
        </annotation>
      </enumeration>
      <enumeration value="IS_CREDITED">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">Is credited.</xsd:documentation>
        </annotation>
      </enumeration>
      <enumeration value="IS_ANNULLED">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">Is annulled</xsd:documentation>
        </annotation>
      </enumeration>
    </restriction>
  </simpleType>
  <complexType name="limit">
    <annotation>
      <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">Detailed information about the limit.</xsd:documentation>
    </annotation>
    <sequence>
      <element name="approvedAmount" type="tns:positiveDecimal">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The amount that has been approved. This can be the requested amount, or more.</xsd:documentation>
        </annotation>
      </element>
      <element name="decision" type="tns:limitDecision">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The limit decision.</xsd:documentation>
        </annotation>
      </element>
      <element name="customer" type="tns:customer">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The customer details.</xsd:documentation>
        </annotation>
      </element>
      <element name="limitRequestId" type="tns:id">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">Identifies this limit request uniquely, whether it's granted or not. It can be used to request
                        more information, by phone, about the application from Resurs Bank, if there is any questions.</xsd:documentation>
        </annotation>
      </element>
    </sequence>
  </complexType>
  <simpleType name="limitDecision">
    <annotation>
      <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The possible decisions returned by a limit application.</xsd:documentation>
    </annotation>
    <restriction base="string">
      <enumeration value="DENIED">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">No limit at all is given.</xsd:documentation>
        </annotation>
      </enumeration>
      <enumeration value="GRANTED">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">
            The applied limit
            <strong>or more</strong>
            is given.
          </xsd:documentation>
        </annotation>
      </enumeration>
      <enumeration value="TRIAL">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">
            No limit could be
            <strong>immediately</strong>
            approved. Some form of additional information
                        is required before a final decision can be made, and the customer has to contact Resurs
                        Bank.
            <br/>
            If, after a further inspection, the customer limit is approved, it will automatically be used
                        the next time the same customer applies for the same (or lower amount) on the same payment
                        method.
          </xsd:documentation>
        </annotation>
      </enumeration>
    </restriction>
  </simpleType>
  <simpleType name="customerType">
    <annotation>
      <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The type of customer.</xsd:documentation>
    </annotation>
    <restriction base="string">
      <enumeration value="LEGAL">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The customer is a legal customer.</xsd:documentation>
        </annotation>
      </enumeration>
      <enumeration value="NATURAL">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The customer is a natural customer, i.e. a person.</xsd:documentation>
        </annotation>
      </enumeration>
    </restriction>
  </simpleType>
  <simpleType name="paymentMethodType">
    <annotation>
      <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">Payment methods are divided into groups.
                This information can be used to retrieve orders based on which payment method type was used.</xsd:documentation>
    </annotation>
    <restriction base="string">
      <enumeration value="INVOICE">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">
            The customer wants to have an invoice sent to him, where he's able to pay the whole amount at
                        once.
            <p>
              That can be many payment methods of this type. Fetch a list with the function
              <tt class="method">PaymentMethodService.getPaymentMethods</tt>
              .
            </p>
          </xsd:documentation>
        </annotation>
      </enumeration>
      <enumeration value="REVOLVING_CREDIT">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">
            The customer wants to start a new account, and finance the purchase with that account's
                        credit limit. The purchase can be paid in a series of installments. In most cases there will be
                        made a
                        branded card sent to customer, depending on how your collaboration with Resurs Bank looks like.
                        A credit
                        application will need to be made, and the customer needs to sign a credit contract.
            <p>
              There can be many payment methods of this type. Fetch a list with the function
              <tt class="method">ShopFlowService.getPaymentMethods</tt>
              .
            </p>
          </xsd:documentation>
        </annotation>
      </enumeration>
      <enumeration value="CARD">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">
            Every card issued by Resurs Bank falls into this group, while cards from other banks or credit
                        institutions do NOT! This means that customers which have a branded Resurs card from another of
                        Resurs representatives still can use it in your webshop.
            <p>
              The will at most be one payment method of this type. Use the method
              <tt class="method">ShopFlowService.isCardPaymentAvailable</tt>
              to see if you
                            can use it.
            </p>
          </xsd:documentation>
        </annotation>
      </enumeration>
    </restriction>
  </simpleType>
  <simpleType name="invoiceDeliveryTypeEnum">
    <annotation>
      <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">This Enum indicates how a invoice should be delivered, if not specified it should default back to the
                EMAIL type.</xsd:documentation>
    </annotation>
    <restriction base="string">
      <enumeration value="NONE">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">Do not let Resurs Bank deliver the Invoices.</xsd:documentation>
        </annotation>
      </enumeration>
      <enumeration value="EMAIL">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">This option will let Resurs Bank deliver the invoice by mail. This is the default option if
                        nothing is specified.</xsd:documentation>
        </annotation>
      </enumeration>
      <enumeration value="POSTAL">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">This option will let Resurs Bank deliver the invoice by post.</xsd:documentation>
        </annotation>
      </enumeration>
    </restriction>
  </simpleType>
</schema>]]></con:content><con:type>http://www.w3.org/2001/XMLSchema</con:type></con:part><con:part><con:url>https://test.resurs.com/ecommerce-test/ws/V4/AfterShopFlowService?xsd=schemas/types/aftershopflow.xsd</con:url><con:content><![CDATA[<schema targetNamespace="http://ecommerce.resurs.com/v4/types/aftershopflow" version="4.0" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:tns="http://ecommerce.resurs.com/v4/types/aftershopflow" xmlns:common="http://ecommerce.resurs.com/v4/types/common" xmlns="http://www.w3.org/2001/XMLSchema">
  <import namespace="http://ecommerce.resurs.com/v4/types/common" schemaLocation="https://test.resurs.com/ecommerce-test/ws/V4/AfterShopFlowService?xsd=schemas/types/common.xsd"/>
  <complexType name="payment">
    <annotation>
      <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">
        The detailed payment information.
        <br/>
        In addition to the overall information about the payment, it also contains full details about
                all diff payments associated with the payment. The payment diffs is the complete history of the payment.
                (The current state of the payment, if needed, must be calculated client side.)
      </xsd:documentation>
    </annotation>
    <sequence>
      <element name="id" type="common:id">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The payment identity.</xsd:documentation>
        </annotation>
      </element>
      <element name="totalAmount" type="common:positiveDecimal">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The current total amount of the payment diffs making up this payment.</xsd:documentation>
        </annotation>
      </element>
      <element maxOccurs="unbounded" minOccurs="0" name="metaData" type="common:mapEntry">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The meta data associated with the payment as key/value pairs.</xsd:documentation>
        </annotation>
      </element>
      <element name="limit" type="common:positiveDecimal">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The limit (if any) associated with the payment. This could for instance be
                        the amount of credit applied for.</xsd:documentation>
        </annotation>
      </element>
      <element maxOccurs="unbounded" minOccurs="0" name="paymentDiffs" type="tns:paymentDiff">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The parts that make up this payment.</xsd:documentation>
        </annotation>
      </element>
      <element name="customer" type="common:customer">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The payment customer information.</xsd:documentation>
        </annotation>
      </element>
      <element minOccurs="0" name="deliveryAddress" type="common:address">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The delivery address, if one has been specified.</xsd:documentation>
        </annotation>
      </element>
      <element name="booked" type="dateTime">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The timestamp of the payment booking.</xsd:documentation>
        </annotation>
      </element>
      <element minOccurs="0" name="finalized" type="dateTime">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The timestamp of the latest payment finalization.</xsd:documentation>
        </annotation>
      </element>
      <element name="paymentMethodId" type="common:id">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The identity of the payment method used for the payment.</xsd:documentation>
        </annotation>
      </element>
      <element name="paymentMethodName" type="string">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The name of the payment method that are used when doing a payment.</xsd:documentation>
        </annotation>
      </element>
      <element name="fraud" type="boolean">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">Whether or not the payment has been flagged as fraudulent.</xsd:documentation>
        </annotation>
      </element>
      <element name="frozen" type="boolean">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">Whether or not the payment has been frozen by the fraud system for a more detailed control.</xsd:documentation>
        </annotation>
      </element>
      <element maxOccurs="unbounded" minOccurs="0" name="status" type="common:paymentStatus">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The status of the payment as a list of status values.</xsd:documentation>
        </annotation>
      </element>
      <element minOccurs="0" name="storeId" type="common:id">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The identity of the actual store for the representative. This id is defined by Resurs Bank. You
                        can receive the list of stores tied to your user (representative) if you wish.</xsd:documentation>
        </annotation>
      </element>
      <element name="paymentMethodType" type="common:paymentMethodType">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">Of which type the payment is, i e invoice, new account etc.</xsd:documentation>
        </annotation>
      </element>
      <element name="totalBonusPoints" type="xsd:nonNegativeInteger">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The current sum of bonus points of the payments diffs making up this payment.</xsd:documentation>
        </annotation>
      </element>
    </sequence>
  </complexType>
  <complexType name="paymentDiff">
    <annotation>
      <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">
        A payment diff (
        <i>difference</i>
        ) is one change of a payment. The list of payment diffs is all changes to
                the payment, including it's creation. In that way the diffs define the payment.
        <p/>
        <a href="https://test.resurs.com/docs/x/jYAR">Read more about payments and payment diffs</a>
      </xsd:documentation>
    </annotation>
    <sequence>
      <element name="type" type="tns:paymentDiffType">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The type of payment part.</xsd:documentation>
        </annotation>
      </element>
      <element minOccurs="0" name="transactionId" type="common:id">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">This id will be present on the payment specifications sent from Resurs Bank. It can be left out, and
                        in that case Resurs will use the payment id as transaction id.</xsd:documentation>
        </annotation>
      </element>
      <element name="created" type="dateTime">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The timestamp of the payment diff creation.</xsd:documentation>
        </annotation>
      </element>
      <element minOccurs="0" name="createdBy" type="string">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">Who created the payment part.</xsd:documentation>
        </annotation>
      </element>
      <element name="paymentSpec" type="common:paymentSpec">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The full specification details of the payment part.</xsd:documentation>
        </annotation>
      </element>
      <element minOccurs="0" name="orderId" type="common:id">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The order number as specified by the representative.</xsd:documentation>
        </annotation>
      </element>
      <element minOccurs="0" name="invoiceId" type="common:id">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The invoice number as specified by the representative.</xsd:documentation>
        </annotation>
      </element>
      <element maxOccurs="unbounded" minOccurs="0" name="documentNames" type="common:nonEmptyString">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The names of the documents associated with this payment part.</xsd:documentation>
        </annotation>
      </element>
    </sequence>
  </complexType>
  <simpleType name="paymentDiffType">
    <annotation>
      <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The type of payment part.</xsd:documentation>
    </annotation>
    <restriction base="string">
      <enumeration value="AUTHORIZE">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The payment part is an authorization request.</xsd:documentation>
        </annotation>
      </enumeration>
      <enumeration value="DEBIT">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The payment diff is a debit request.</xsd:documentation>
        </annotation>
      </enumeration>
      <enumeration value="CREDIT">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The payment diff is a credit request.</xsd:documentation>
        </annotation>
      </enumeration>
      <enumeration value="ANNUL">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The payment diff is an annulment request.</xsd:documentation>
        </annotation>
      </enumeration>
    </restriction>
  </simpleType>
  <complexType name="pdf">
    <annotation>
      <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">A PDF document</xsd:documentation>
    </annotation>
    <sequence>
      <element name="name" type="string">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The name of the document.</xsd:documentation>
        </annotation>
      </element>
      <element name="pdfData" type="base64Binary">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The document data.</xsd:documentation>
        </annotation>
      </element>
    </sequence>
  </complexType>
  <complexType name="searchCriteria">
    <annotation>
      <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">A set of search criteria.</xsd:documentation>
    </annotation>
    <sequence>
      <element minOccurs="0" name="anyId" nillable="true" type="common:id">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">
            Any identity associated with the payment, not just the payment identity. This includes the
                        transaction identity, the invoice and credit note numbers, as well as the order number of any
                        payment diff belonging to the payment.
            <br/>
            If the exact payment identity is known, it is generally a better idea to use the
            <code>getPayment()</code>
            method as that is a lot quicker.
          </xsd:documentation>
        </annotation>
      </element>
      <element minOccurs="0" name="paymentMethodId" nillable="true" type="common:id">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The identity of the payment method.</xsd:documentation>
        </annotation>
      </element>
      <element minOccurs="0" name="governmentId" nillable="true" type="common:nonEmptyString">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The desired customer government identity.</xsd:documentation>
        </annotation>
      </element>
      <element minOccurs="0" name="customerName" nillable="true" type="string">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">
            The desired customer name.
            <br/>
            Please be aware that searches will be performed on the full (possibly composite name) of the customer.
          </xsd:documentation>
        </annotation>
      </element>
      <element minOccurs="0" name="bookedFrom" nillable="true" type="dateTime">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The earliest desired payment booking timestamp.</xsd:documentation>
        </annotation>
      </element>
      <element minOccurs="0" name="bookedTo" nillable="true" type="dateTime">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The latest desired payment booking timestamp.</xsd:documentation>
        </annotation>
      </element>
      <element minOccurs="0" name="modifiedFrom" nillable="true" type="dateTime">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The earliest desired payment modification timestamp.</xsd:documentation>
        </annotation>
      </element>
      <element minOccurs="0" name="modifiedTo" nillable="true" type="dateTime">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The latest desired payment modification timestamp.</xsd:documentation>
        </annotation>
      </element>
      <element minOccurs="0" name="finalizedFrom" nillable="true" type="dateTime">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The earliest desired payment finalization timestamp.</xsd:documentation>
        </annotation>
      </element>
      <element minOccurs="0" name="finalizedTo" nillable="true" type="dateTime">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The latest desired payment finalization timestamp.</xsd:documentation>
        </annotation>
      </element>
      <element minOccurs="0" name="amountFrom" nillable="true" type="common:positiveDecimal">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">
            The minimum desired total payment amount.
            <br/>
            Please be aware that searches will be performed on the current total payment amount,
                        i.e. not taking into consideration the status of the various payment diffs.
          </xsd:documentation>
        </annotation>
      </element>
      <element minOccurs="0" name="amountTo" nillable="true" type="common:positiveDecimal">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">
            The maximum desired total payment amount.
            <br/>
            Please be aware that searches will be performed on the current total payment amount,
                        i.e. not taking into consideration the status of the various payment diffs.
          </xsd:documentation>
        </annotation>
      </element>
      <element minOccurs="0" name="bonusFrom" nillable="true" type="nonNegativeInteger">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">
            The minimum desired total payment bonus amount.
            <br/>
            Please be aware that searches will be performed on the current total payment bonus amount,
                        i.e. not taking into consideration the status of the various payment diffs.
          </xsd:documentation>
        </annotation>
      </element>
      <element minOccurs="0" name="bonusTo" nillable="true" type="nonNegativeInteger">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">
            The maximum desired total payment bonus amount.
            <br/>
            Please be aware that searches will be performed on the current total payment bonus amount,
                        i.e. not taking into consideration the status of the various payment diffs.
          </xsd:documentation>
        </annotation>
      </element>
      <element minOccurs="0" name="frozen" nillable="true" type="boolean">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The payment freeze status.</xsd:documentation>
        </annotation>
      </element>
      <element minOccurs="0" name="withMetaData" nillable="true" type="tns:withMetaData">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The desired meta data.</xsd:documentation>
        </annotation>
      </element>
      <element maxOccurs="unbounded" minOccurs="0" name="statusSet" type="common:paymentStatus">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">List the statuses the payment must have.</xsd:documentation>
        </annotation>
      </element>
      <element maxOccurs="unbounded" minOccurs="0" name="statusNotSet" type="common:paymentStatus">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">List the statuses the payment must not have.</xsd:documentation>
        </annotation>
      </element>
      <element minOccurs="0" name="bonusIsUsed" type="boolean">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">
            Bonus points used in the payment.
            <a href="https://test.resurs.com/docs/x/CAAv">Read more
                    about bonus</a>
          </xsd:documentation>
        </annotation>
      </element>
    </sequence>
  </complexType>
  <complexType name="withMetaData">
    <annotation>
      <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">A set of meta data for searching.</xsd:documentation>
    </annotation>
    <sequence>
      <element name="withMetaDataKey" type="string">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The desired meta data key.</xsd:documentation>
        </annotation>
      </element>
      <element minOccurs="0" name="withMetaDataValue" nillable="true" type="string">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The desired meta data value.</xsd:documentation>
        </annotation>
      </element>
    </sequence>
  </complexType>
  <complexType name="sortOrder">
    <annotation>
      <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">How the search results should be ordered.</xsd:documentation>
    </annotation>
    <sequence>
      <element name="ascending" type="boolean">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">Whether or not the results are to be sorted in ascending order.</xsd:documentation>
        </annotation>
      </element>
      <element maxOccurs="unbounded" name="sortColumns" type="tns:sortAlternative">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">On which columns, and in which order of importance, the result is to be sorted.</xsd:documentation>
        </annotation>
      </element>
    </sequence>
  </complexType>
  <simpleType name="sortAlternative">
    <annotation>
      <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The sort columns available.</xsd:documentation>
    </annotation>
    <restriction base="string">
      <enumeration value="PAYMENT_ID">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">Sort the result on payment identity.</xsd:documentation>
        </annotation>
      </enumeration>
      <enumeration value="CUSTOMER_GOVERNMENT_ID">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">Sort the result on customer government identity.</xsd:documentation>
        </annotation>
      </enumeration>
      <enumeration value="CUSTOMER_NAME">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">Sort the result on customer name.</xsd:documentation>
        </annotation>
      </enumeration>
      <enumeration value="BOOKED_TIME">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">Sort the result on payment booking time.</xsd:documentation>
        </annotation>
      </enumeration>
      <enumeration value="MODIFIED_TIME">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">Sort the result on payment modification time.</xsd:documentation>
        </annotation>
      </enumeration>
      <enumeration value="FINALIZED_TIME">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">Sort the result on payment finalization time.</xsd:documentation>
        </annotation>
      </enumeration>
      <enumeration value="AMOUNT">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">Sort the result on total payment amount, taking into consideration the payment diff status.</xsd:documentation>
        </annotation>
      </enumeration>
      <enumeration value="BONUS_POINTS">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">Sort the result on total payment amount, taking into consideration the payment diff status.</xsd:documentation>
        </annotation>
      </enumeration>
    </restriction>
  </simpleType>
  <complexType name="basicPayment">
    <annotation>
      <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">
        The basic payment information returned by a search. It does not contain all payment
                details, but enough to be presented in a list of links to the full details.
        <a href="https://test.resurs.com/docs/x/jYAR">Read more about payments</a>
      </xsd:documentation>
    </annotation>
    <sequence>
      <element name="paymentId" type="common:id">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The payment identity.</xsd:documentation>
        </annotation>
      </element>
      <element name="paymentMethodId" type="common:id">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The payment method identity.</xsd:documentation>
        </annotation>
      </element>
      <element name="paymentMethodName" type="common:nonEmptyString">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The payment method name.</xsd:documentation>
        </annotation>
      </element>
      <element name="governmentId" type="common:nonEmptyString">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The customer government identity.</xsd:documentation>
        </annotation>
      </element>
      <element name="fullName" type="string">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The full (possibly composite name) of the customer.</xsd:documentation>
        </annotation>
      </element>
      <element name="booked" type="dateTime">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The timestamp of the payment booking.</xsd:documentation>
        </annotation>
      </element>
      <element minOccurs="0" name="modified" type="dateTime">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The timestamp of latest payment modification.</xsd:documentation>
        </annotation>
      </element>
      <element minOccurs="0" name="finalized" type="dateTime">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The timestamp of the latest payment finalization.</xsd:documentation>
        </annotation>
      </element>
      <element name="totalAmount" type="common:positiveDecimal">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">
            The total payment amount.
            <br/>
            Please be aware that this is the current total payment amount, i.e. taking taking into
                        consideration the status of the various payment diffs.
          </xsd:documentation>
        </annotation>
      </element>
      <element name="frozen" type="boolean">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">Whether or not the payment has been frozen by the fraud system for a more detailed control.</xsd:documentation>
        </annotation>
      </element>
      <element maxOccurs="unbounded" minOccurs="0" name="status" type="common:paymentStatus">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The status of the payment as a list of status values.</xsd:documentation>
        </annotation>
      </element>
      <element name="totalBonusPoints" type="nonNegativeInteger">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">
            The total payment bonus points.
            <br/>
            Please be aware that this is the current total payment bonus points, i.e. taking taking into
                        consideration the status of the various payment diffs.
            <p/>
            <a href="https://test.resurs.com/docs/x/CAAv">Read more about bonus</a>
          </xsd:documentation>
        </annotation>
      </element>
    </sequence>
  </complexType>
  <complexType name="bonus">
    <annotation>
      <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">A holder for all bonus the customer currently have.</xsd:documentation>
    </annotation>
    <sequence>
      <element name="points" type="nonNegativeInteger">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The number of points the customer have.</xsd:documentation>
        </annotation>
      </element>
    </sequence>
  </complexType>
</schema>]]></con:content><con:type>http://www.w3.org/2001/XMLSchema</con:type></con:part><con:part><con:url>https://test.resurs.com/ecommerce-test/ws/V4/AfterShopFlowService?xsd=schemas/messages/Exceptions.xsd</con:url><con:content><![CDATA[<schema targetNamespace="http://ecommerce.resurs.com/v4/msg/exception" version="4.0" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:tns="http://ecommerce.resurs.com/v4/msg/exception" xmlns:common="http://ecommerce.resurs.com/v4/types/common" xmlns="http://www.w3.org/2001/XMLSchema">
  <import namespace="http://ecommerce.resurs.com/v4/types/common" schemaLocation="https://test.resurs.com/ecommerce-test/ws/V4/AfterShopFlowService?xsd=schemas/types/common.xsd"/>
  <element name="ECommerceError" type="tns:ECommerceError"/>
  <!--Exceptions-->
  <complexType name="ECommerceError">
    <annotation>
      <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">
        All errors/exceptions are returned as
        <code>ECommerceException</code>
        s.
        <p>
          All kinds of errors will generate this kind of exception, but different groups of errors can be
                    distinguished by their
          <code>errorTypeId</code>
          . For example the errorTypeId 1 is "Invalid argument". You
                    might want to take different actions depending on the
          <code>errorTypeId</code>
          , especially if the
          <code>fixableByYou</code>
          flag is true.
        </p>
        These are the current errorTypes. More might be added as time goes, but old errors codes will remain unchanged.
        <ul>
          <li>ILLEGAL_ARGUMENT(1)</li>
          <li>INTERNAL_ERROR(3)</li>
          <li>NOT_ALLOWED(4)</li>
          <li>REFERENCED_DATA_DONT_EXISTS(8)</li>
          <li>CREDITAPPLICATION_FAILED(10)</li>
          <li>NOT_IMPLEMENTED(11)</li>
          <li>INVALID_CREDITAPPLICATION_SUBMISSION(14)</li>
          <li>SIGNING_REQUIRED(15)</li>
          <li>AUTHORIZATION_FAILED(17)</li>
          <li>APPLICATION_VALIDATION_ERROR(18)</li>
          <li>OBJECT_WITH_ID_ALREADY_EXIST(19)</li>
          <li>NOT_ALLOWED_IN_PAYMENT_STATE(20)</li>
          <li>CUSTOMER_CONFIGURATION_EXCEPTION(21)</li>
          <li>SERVICE_CONFIGURATION_EXCEPTION(22)</li>
          <li>INVALID_CREDITING(23)</li>
          <li>LIMIT_PER_TIME_EXCEEDED(24)</li>
          <li>NOT_ALLOWED_IN_CURRENT_STATE(25)</li>
          <li>INVALID_FINALIZATION(26)</li>
          <li>FORM_PARSING(27)</li>
          <li>INVALID_IDENTIFICATION(28)</li>
          <li>TOO_MANY_TOKENS(29)</li>
          <li>BONUS_AUTHORIZATION_FAILED(30)</li>
          <li>LEGACY_EXCEPTION(99)</li>
          <li>WEAK_PASSWORD(502)</li>
          <li>NOT_AUTHORIZED(503)</li>
        </ul>
        <p>
          The
          <code>fixableByYou</code>
          flag means that the system works as intended, and that some other input could have prevented
                    the error from happening. For example, a customer not having enough funds on his card account renders an
          <code>ECommerceException</code>
          with
                    the
          <code>fixableByYou</code>
          set to
          <tt>true</tt>
          . If, on the other hand, we have problems communicating with the database,
                    the
          <code>fixableByYou</code>
          flag should be false.
          <br/>
          When this flag is false there is nothing you can do except showing the customer the error message.
        </p>
        <p>
          The exception contains two error messages. One of them, the exception message, is a technical description of
                    what went wrong, and
          <strong>it's NOT suitable to show the end user</strong>
          . Just log it, and use it for diagnosing
                    and development.
          <br/>
          The userErrorMessage on the other hand, we more or less require you to show to the customer if something went
                    wrong. The reason for requiring you to show it is that some of the messages we return have a legal meaning not to be
                    fiddled with.
        </p>
      </xsd:documentation>
    </annotation>
    <sequence>
      <element name="errorTypeDescription" type="common:nonEmptyString">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The textual description of the error type. See the list above.</xsd:documentation>
        </annotation>
      </element>
      <element name="errorTypeId" type="int">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">Indicates which kind of error this is. See the list above.</xsd:documentation>
        </annotation>
      </element>
      <element name="fixableByYou" type="boolean">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">
            "If this error have been avoided with some other input" =
            <tt>true</tt>
            <br/>
            "It a Resurs Bank problem" =
            <tt>false</tt>
          </xsd:documentation>
        </annotation>
      </element>
      <element name="userErrorMessage" type="common:nonEmptyString">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">An error message intended for the user of the web shop. This message must be shown!</xsd:documentation>
        </annotation>
      </element>
    </sequence>
  </complexType>
</schema>]]></con:content><con:type>http://www.w3.org/2001/XMLSchema</con:type></con:part></con:definitionCache><con:endpoints><con:endpoint>${#Project#ServiceEndpoint}/AfterShopFlowService</con:endpoint><con:endpoint>http://ws.ecom.pte.loc/ws/V4/AfterShopFlowService</con:endpoint><con:endpoint>https://test.resurs.com/ecommerce-test/ws/V4/AfterShopFlowService</con:endpoint></con:endpoints><con:operation isOneWay="false" action="" name="addMetaData" bindingOperationName="addMetaData" type="Request-Response" inputName="" receivesAttachments="false" sendsAttachments="false" anonymous="optional"><con:settings/><con:call name="Request 1"><con:settings/><con:encoding>UTF-8</con:encoding><con:endpoint>https://test.resurs.com/ecommerce-test/ws/V4/AfterShopFlowService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:aft="http://ecommerce.resurs.com/v4/msg/aftershopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <aft:addMetaData>
         <!--type: id-->
         <paymentId>gero et</paymentId>
         <!--type: string-->
         <key>sonoras imperio</key>
         <!--Optional:-->
         <!--type: string-->
         <value>?</value>
      </aft:addMetaData>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508" action="http://ecommerce.resurs.com/v4/AfterShopFlowWebService/addMetaDataRequest"/><con:wsrmConfig version="1.2"/></con:call></con:operation><con:operation isOneWay="false" action="" name="annulPayment" bindingOperationName="annulPayment" type="Request-Response" inputName="" receivesAttachments="false" sendsAttachments="false" anonymous="optional"><con:settings/><con:call name="Request 1"><con:settings/><con:encoding>UTF-8</con:encoding><con:endpoint>https://test.resurs.com/ecommerce-test/ws/V4/AfterShopFlowService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:aft="http://ecommerce.resurs.com/v4/msg/aftershopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <aft:annulPayment>
         <!--type: id-->
         <paymentId>gero et</paymentId>
         <!--Optional:-->
         <partPaymentSpec>
            <!--Zero or more repetitions:-->
            <specLines>
               <!--type: id-->
               <id>?</id>
               <!--type: string-->
               <artNo>?</artNo>
               <!--type: string-->
               <description>?</description>
               <!--type: decimal-->
               <quantity>?</quantity>
               <!--type: string-->
               <unitMeasure>?</unitMeasure>
               <!--type: decimal-->
               <unitAmountWithoutVat>?</unitAmountWithoutVat>
               <!--type: percent-->
               <vatPct>?</vatPct>
               <!--type: decimal-->
               <totalVatAmount>?</totalVatAmount>
               <!--type: decimal-->
               <totalAmount>?</totalAmount>
            </specLines>
            <!--type: positiveDecimal-->
            <totalAmount>?</totalAmount>
            <!--Optional:-->
            <!--type: decimal-->
            <totalVatAmount>?</totalVatAmount>
         </partPaymentSpec>
         <!--Optional:-->
         <!--type: nonEmptyString-->
         <createdBy>?</createdBy>
      </aft:annulPayment>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:wsaConfig mustUnderstand="NONE" version="200508" action="http://ecommerce.resurs.com/v4/AfterShopFlowWebService/annulPaymentRequest"/></con:call></con:operation><con:operation isOneWay="false" action="" name="calculateResultSize" bindingOperationName="calculateResultSize" type="Request-Response" inputName="" receivesAttachments="false" sendsAttachments="false" anonymous="optional"><con:settings/><con:call name="Request 1"><con:settings/><con:encoding>UTF-8</con:encoding><con:endpoint>https://test.resurs.com/ecommerce-test/ws/V4/AfterShopFlowService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:aft="http://ecommerce.resurs.com/v4/msg/aftershopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <aft:calculateResultSize>
         <searchCriteria>
            <!--Optional:-->
            <!--type: id-->
            <anyId>?</anyId>
            <!--Optional:-->
            <!--type: id-->
            <paymentMethodId>?</paymentMethodId>
            <!--Optional:-->
            <!--type: nonEmptyString-->
            <governmentId>?</governmentId>
            <!--Optional:-->
            <!--type: string-->
            <customerName>?</customerName>
            <!--Optional:-->
            <!--type: dateTime-->
            <bookedFrom>?</bookedFrom>
            <!--Optional:-->
            <!--type: dateTime-->
            <bookedTo>?</bookedTo>
            <!--Optional:-->
            <!--type: dateTime-->
            <modifiedFrom>?</modifiedFrom>
            <!--Optional:-->
            <!--type: dateTime-->
            <modifiedTo>?</modifiedTo>
            <!--Optional:-->
            <!--type: dateTime-->
            <finalizedFrom>?</finalizedFrom>
            <!--Optional:-->
            <!--type: dateTime-->
            <finalizedTo>?</finalizedTo>
            <!--Optional:-->
            <!--type: positiveDecimal-->
            <amountFrom>?</amountFrom>
            <!--Optional:-->
            <!--type: positiveDecimal-->
            <amountTo>?</amountTo>
            <!--Optional:-->
            <!--type: boolean-->
            <frozen>?</frozen>
            <!--Optional:-->
            <withMetaData>
               <!--type: string-->
               <withMetaDataKey>?</withMetaDataKey>
               <!--Optional:-->
               <!--type: string-->
               <withMetaDataValue>?</withMetaDataValue>
            </withMetaData>
            <!--0 to 100 repetitions:-->
            <!--type: paymentStatus - enumeration: [DEBITABLE,CREDITABLE,IS_DEBITED,IS_CREDITED,IS_ANNULLED]-->
            <statusSet>IS_ANNULLED</statusSet>
            <!--0 to 100 repetitions:-->
            <!--type: paymentStatus - enumeration: [DEBITABLE,CREDITABLE,IS_DEBITED,IS_CREDITED,IS_ANNULLED]-->
            <statusNotSet>DEBITABLE</statusNotSet>
         </searchCriteria>
      </aft:calculateResultSize>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:wsaConfig mustUnderstand="NONE" version="200508" action="http://ecommerce.resurs.com/v4/AfterShopFlowWebService/calculateResultSizeRequest"/></con:call></con:operation><con:operation isOneWay="false" action="" name="creditPayment" bindingOperationName="creditPayment" type="Request-Response" inputName="" receivesAttachments="false" sendsAttachments="false" anonymous="optional"><con:settings/><con:call name="Request 1"><con:settings/><con:encoding>UTF-8</con:encoding><con:endpoint>https://test.resurs.com/ecommerce-test/ws/V4/AfterShopFlowService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:aft="http://ecommerce.resurs.com/v4/msg/aftershopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <aft:creditPayment>
         <!--type: id-->
         <paymentId>gero et</paymentId>
         <!--Optional:-->
         <!--type: id-->
         <preferredTransactionId>?</preferredTransactionId>
         <!--Optional:-->
         <partPaymentSpec>
            <!--Zero or more repetitions:-->
            <specLines>
               <!--type: id-->
               <id>?</id>
               <!--type: string-->
               <artNo>?</artNo>
               <!--type: string-->
               <description>?</description>
               <!--type: decimal-->
               <quantity>?</quantity>
               <!--type: string-->
               <unitMeasure>?</unitMeasure>
               <!--type: decimal-->
               <unitAmountWithoutVat>?</unitAmountWithoutVat>
               <!--type: percent-->
               <vatPct>?</vatPct>
               <!--type: decimal-->
               <totalVatAmount>?</totalVatAmount>
               <!--type: decimal-->
               <totalAmount>?</totalAmount>
            </specLines>
            <!--type: positiveDecimal-->
            <totalAmount>?</totalAmount>
            <!--Optional:-->
            <!--type: decimal-->
            <totalVatAmount>?</totalVatAmount>
         </partPaymentSpec>
         <!--Optional:-->
         <!--type: nonEmptyString-->
         <createdBy>?</createdBy>
         <!--Optional:-->
         <!--type: id-->
         <creditNoteId>?</creditNoteId>
         <!--Optional:-->
         <!--type: date-->
         <creditNoteDate>?</creditNoteDate>
      </aft:creditPayment>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:wsaConfig mustUnderstand="NONE" version="200508" action="http://ecommerce.resurs.com/v4/AfterShopFlowWebService/creditPaymentRequest"/></con:call></con:operation><con:operation isOneWay="false" action="" name="finalizePayment" bindingOperationName="finalizePayment" type="Request-Response" inputName="" receivesAttachments="false" sendsAttachments="false" anonymous="optional"><con:settings/><con:call name="Request 1"><con:settings/><con:encoding>UTF-8</con:encoding><con:endpoint>https://test.resurs.com/ecommerce-test/ws/V4/AfterShopFlowService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:aft="http://ecommerce.resurs.com/v4/msg/aftershopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <aft:finalizePayment>
         <!--type: id-->
         <paymentId>gero et</paymentId>
         <!--Optional:-->
         <!--type: id-->
         <preferredTransactionId>?</preferredTransactionId>
         <partPaymentSpec>
            <!--Zero or more repetitions:-->
            <specLines>
               <!--type: id-->
               <id>?</id>
               <!--type: string-->
               <artNo>?</artNo>
               <!--type: string-->
               <description>?</description>
               <!--type: decimal-->
               <quantity>?</quantity>
               <!--type: string-->
               <unitMeasure>?</unitMeasure>
               <!--type: decimal-->
               <unitAmountWithoutVat>?</unitAmountWithoutVat>
               <!--type: percent-->
               <vatPct>?</vatPct>
               <!--type: decimal-->
               <totalVatAmount>?</totalVatAmount>
               <!--type: decimal-->
               <totalAmount>?</totalAmount>
            </specLines>
            <!--type: positiveDecimal-->
            <totalAmount>1000.00</totalAmount>
            <!--Optional:-->
            <!--type: decimal-->
            <totalVatAmount>?</totalVatAmount>
         </partPaymentSpec>
         <!--Optional:-->
         <!--type: nonEmptyString-->
         <createdBy>?</createdBy>
         <!--Optional:-->
         <!--type: id-->
         <orderId>?</orderId>
         <!--Optional:-->
         <!--type: date-->
         <orderDate>?</orderDate>
         <!--Optional:-->
         <!--type: id-->
         <invoiceId>?</invoiceId>
         <!--Optional:-->
         <!--type: date-->
         <invoiceDate>?</invoiceDate>
      </aft:finalizePayment>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:wsaConfig mustUnderstand="NONE" version="200508" action="http://ecommerce.resurs.com/v4/AfterShopFlowWebService/finalizePaymentRequest"/></con:call></con:operation><con:operation isOneWay="false" action="" name="findPayments" bindingOperationName="findPayments" type="Request-Response" inputName="" receivesAttachments="false" sendsAttachments="false" anonymous="optional"><con:settings/><con:call name="Request 1"><con:settings/><con:encoding>UTF-8</con:encoding><con:endpoint>https://test.resurs.com/ecommerce-test/ws/V4/AfterShopFlowService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:aft="http://ecommerce.resurs.com/v4/msg/aftershopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <aft:findPayments>
         <searchCriteria>
            <!--Optional:-->
            <!--type: id-->
            <anyId>?</anyId>
            <!--Optional:-->
            <!--type: id-->
            <paymentMethodId>?</paymentMethodId>
            <!--Optional:-->
            <!--type: nonEmptyString-->
            <governmentId>?</governmentId>
            <!--Optional:-->
            <!--type: string-->
            <customerName>?</customerName>
            <!--Optional:-->
            <!--type: dateTime-->
            <bookedFrom>?</bookedFrom>
            <!--Optional:-->
            <!--type: dateTime-->
            <bookedTo>?</bookedTo>
            <!--Optional:-->
            <!--type: dateTime-->
            <modifiedFrom>?</modifiedFrom>
            <!--Optional:-->
            <!--type: dateTime-->
            <modifiedTo>?</modifiedTo>
            <!--Optional:-->
            <!--type: dateTime-->
            <finalizedFrom>?</finalizedFrom>
            <!--Optional:-->
            <!--type: dateTime-->
            <finalizedTo>?</finalizedTo>
            <!--Optional:-->
            <!--type: positiveDecimal-->
            <amountFrom>?</amountFrom>
            <!--Optional:-->
            <!--type: positiveDecimal-->
            <amountTo>?</amountTo>
            <!--Optional:-->
            <!--type: boolean-->
            <frozen>?</frozen>
            <!--Optional:-->
            <withMetaData>
               <!--type: string-->
               <withMetaDataKey>?</withMetaDataKey>
               <!--Optional:-->
               <!--type: string-->
               <withMetaDataValue>?</withMetaDataValue>
            </withMetaData>
            <!--0 to 100 repetitions:-->
            <!--type: paymentStatus - enumeration: [DEBITABLE,CREDITABLE,IS_DEBITED,IS_CREDITED,IS_ANNULLED]-->
            <statusSet>IS_ANNULLED</statusSet>
            <!--0 to 100 repetitions:-->
            <!--type: paymentStatus - enumeration: [DEBITABLE,CREDITABLE,IS_DEBITED,IS_CREDITED,IS_ANNULLED]-->
            <statusNotSet>DEBITABLE</statusNotSet>
         </searchCriteria>
         <!--Optional:-->
         <!--type: positiveInteger-->
         <pageNumber>?</pageNumber>
         <!--Optional:-->
         <!--type: positiveInteger-->
         <itemsPerPage>?</itemsPerPage>
         <!--Optional:-->
         <sortBy>
            <!--type: boolean-->
            <ascending>?</ascending>
            <!--1 or more repetitions:-->
            <!--type: sortAlternative - enumeration: [PAYMENT_ID,CUSTOMER_GOVERNMENT_ID,CUSTOMER_NAME,BOOKED_TIME,MODIFIED_TIME,FINALIZED_TIME,AMOUNT]-->
            <sortColumns>?</sortColumns>
         </sortBy>
      </aft:findPayments>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:credentials><con:authType>No Authorization</con:authType></con:credentials><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508" action="http://ecommerce.resurs.com/v4/AfterShopFlowWebService/findPaymentsRequest"/><con:wsrmConfig version="1.2"/></con:call><con:call name="Test"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:encoding>UTF-8</con:encoding><con:endpoint>https://test.resurs.com/ecommerce-test/ws/V4/AfterShopFlowService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:aft="http://ecommerce.resurs.com/v4/msg/aftershopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <aft:findPayments>
         <searchCriteria>
            <!--Optional:-->
            <!--type: id-->
            <anyId>?</anyId>
            <!--Optional:-->
            <!--type: id-->
            <paymentMethodId>?</paymentMethodId>
            <!--Optional:-->
            <!--type: nonEmptyString-->
            <governmentId>?</governmentId>
            <!--Optional:-->
            <!--type: string-->
            <customerName>?</customerName>
            <!--Optional:-->
            <!--type: dateTime-->
            <bookedFrom>?</bookedFrom>
            <!--Optional:-->
            <!--type: dateTime-->
            <bookedTo>?</bookedTo>
            <!--Optional:-->
            <!--type: dateTime-->
            <modifiedFrom>?</modifiedFrom>
            <!--Optional:-->
            <!--type: dateTime-->
            <modifiedTo>?</modifiedTo>
            <!--Optional:-->
            <!--type: dateTime-->
            <finalizedFrom>?</finalizedFrom>
            <!--Optional:-->
            <!--type: dateTime-->
            <finalizedTo>?</finalizedTo>
            <!--Optional:-->
            <!--type: positiveDecimal-->
            <amountFrom>?</amountFrom>
            <!--Optional:-->
            <!--type: positiveDecimal-->
            <amountTo>?</amountTo>
            <!--Optional:-->
            <!--type: boolean-->
            <frozen>?</frozen>
            <!--Optional:-->
            <withMetaData>
               <!--type: string-->
               <withMetaDataKey>?</withMetaDataKey>
               <!--Optional:-->
               <!--type: string-->
               <withMetaDataValue>?</withMetaDataValue>
            </withMetaData>
            <!--0 to 100 repetitions:-->
            <!--type: paymentStatus - enumeration: [DEBITABLE,CREDITABLE,IS_DEBITED,IS_CREDITED,IS_ANNULLED]-->
            <statusSet>IS_ANNULLED</statusSet>
            <!--0 to 100 repetitions:-->
            <!--type: paymentStatus - enumeration: [DEBITABLE,CREDITABLE,IS_DEBITED,IS_CREDITED,IS_ANNULLED]-->
            <statusNotSet>DEBITABLE</statusNotSet>
         </searchCriteria>
         <!--Optional:-->
         <!--type: positiveInteger-->
         <pageNumber>?</pageNumber>
         <!--Optional:-->
         <!--type: positiveInteger-->
         <itemsPerPage>?</itemsPerPage>
         <!--Optional:-->
         <sortBy>
            <!--type: boolean-->
            <ascending>?</ascending>
            <!--1 or more repetitions:-->
            <!--type: sortAlternative - enumeration: [PAYMENT_ID,CUSTOMER_GOVERNMENT_ID,CUSTOMER_NAME,BOOKED_TIME,MODIFIED_TIME,FINALIZED_TIME,AMOUNT]-->
            <sortColumns>?</sortColumns>
         </sortBy>
      </aft:findPayments>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:credentials><con:username>${#Project#BasicAuthUser}</con:username><con:password>${#Project#BasicAuthPass}</con:password></con:credentials><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508" action="http://ecommerce.resurs.com/v4/AfterShopFlowWebService/findPaymentsRequest"/><con:wsrmConfig version="1.2"/></con:call></con:operation><con:operation isOneWay="false" action="" name="getPaymentDocument" bindingOperationName="getPaymentDocument" type="Request-Response" inputName="" receivesAttachments="false" sendsAttachments="false" anonymous="optional"><con:settings/><con:call name="Request 1"><con:settings/><con:encoding>UTF-8</con:encoding><con:endpoint>https://test.resurs.com/ecommerce-test/ws/V4/AfterShopFlowService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:aft="http://ecommerce.resurs.com/v4/msg/aftershopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <aft:getPaymentDocument>
         <!--type: id-->
         <paymentId>gero et</paymentId>
         <!--type: nonEmptyString-->
         <documentName>sonoras imperio</documentName>
      </aft:getPaymentDocument>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:wsaConfig mustUnderstand="NONE" version="200508" action="http://ecommerce.resurs.com/v4/AfterShopFlowWebService/getPaymentDocumentRequest"/></con:call></con:operation><con:operation isOneWay="false" action="" name="getPaymentDocumentNames" bindingOperationName="getPaymentDocumentNames" type="Request-Response" inputName="" receivesAttachments="false" sendsAttachments="false" anonymous="optional"><con:settings/><con:call name="Request 1"><con:settings/><con:encoding>UTF-8</con:encoding><con:endpoint>https://test.resurs.com/ecommerce-test/ws/V4/AfterShopFlowService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:aft="http://ecommerce.resurs.com/v4/msg/aftershopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <aft:getPaymentDocumentNames>
         <!--type: id-->
         <paymentId>gero et</paymentId>
      </aft:getPaymentDocumentNames>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:wsaConfig mustUnderstand="NONE" version="200508" action="http://ecommerce.resurs.com/v4/AfterShopFlowWebService/getPaymentDocumentsRequest"/></con:call></con:operation><con:operation isOneWay="false" action="" name="getPayment" bindingOperationName="getPayment" type="Request-Response" inputName="" receivesAttachments="false" sendsAttachments="false" anonymous="optional"><con:settings/><con:call name="Request 1"><con:settings/><con:encoding>UTF-8</con:encoding><con:endpoint>https://test.resurs.com/ecommerce-test/ws/V4/AfterShopFlowService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:aft="http://ecommerce.resurs.com/v4/msg/aftershopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <aft:getPayment>
         <!--type: id-->
         <paymentId>gero et</paymentId>
      </aft:getPayment>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508" action="http://ecommerce.resurs.com/v4/AfterShopFlowWebService/getPaymentRequest"/><con:wsrmConfig version="1.2"/></con:call></con:operation><con:operation isOneWay="false" action="" name="additionalDebitOfPayment" bindingOperationName="additionalDebitOfPayment" type="Request-Response" inputName="" receivesAttachments="false" sendsAttachments="false" anonymous="optional"><con:settings/><con:call name="Request 1"><con:settings/><con:encoding>UTF-8</con:encoding><con:endpoint>https://test.resurs.com/ecommerce-test/ws/V4/AfterShopFlowService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:aft="http://ecommerce.resurs.com/v4/msg/aftershopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <aft:additionalDebitOfPayment>
         <!--type: id-->
         <paymentId>gero et</paymentId>
         <!--Optional:-->
         <paymentSpec>
            <!--Zero or more repetitions:-->
            <specLines>
               <!--type: id-->
               <id>?</id>
               <!--type: string-->
               <artNo>?</artNo>
               <!--type: string-->
               <description>?</description>
               <!--type: decimal-->
               <quantity>?</quantity>
               <!--type: string-->
               <unitMeasure>?</unitMeasure>
               <!--type: decimal-->
               <unitAmountWithoutVat>?</unitAmountWithoutVat>
               <!--type: percent-->
               <vatPct>?</vatPct>
               <!--type: decimal-->
               <totalVatAmount>?</totalVatAmount>
               <!--type: decimal-->
               <totalAmount>?</totalAmount>
            </specLines>
            <!--type: positiveDecimal-->
            <totalAmount>?</totalAmount>
            <!--Optional:-->
            <!--type: decimal-->
            <totalVatAmount>?</totalVatAmount>
         </paymentSpec>
         <!--Optional:-->
         <!--type: nonEmptyString-->
         <createdBy>?</createdBy>
      </aft:additionalDebitOfPayment>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:wsaConfig mustUnderstand="NONE" version="200508" action="http://ecommerce.resurs.com/v4/AfterShopFlowWebService/additionalDebitOfPaymentRequest"/></con:call></con:operation><con:operation isOneWay="false" action="" name="insertBonusPoints" bindingOperationName="insertBonusPoints" type="Request-Response" inputName="" receivesAttachments="false" sendsAttachments="false" anonymous="optional"><con:settings/><con:call name="Request 1"><con:settings/><con:encoding>UTF-8</con:encoding><con:endpoint>https://test.resurs.com/ecommerce-test/ws/V4/AfterShopFlowService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:aft="http://ecommerce.resurs.com/v4/msg/aftershopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <aft:insertBonusPoints>
         <governmentId>?</governmentId>
         <!--Optional:-->
         <customerType>?</customerType>
         <bonusPoints>?</bonusPoints>
         <expirationDate>?</expirationDate>
      </aft:insertBonusPoints>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:wsaConfig mustUnderstand="NONE" version="200508" action="http://ecommerce.resurs.com/v4/AfterShopFlowWebService/insertBonusPointsRequest"/></con:call></con:operation><con:operation isOneWay="false" action="" name="withdrawBonusPoints" bindingOperationName="withdrawBonusPoints" type="Request-Response" inputName="" receivesAttachments="false" sendsAttachments="false" anonymous="optional"><con:settings/><con:call name="Request 1"><con:settings/><con:encoding>UTF-8</con:encoding><con:endpoint>https://test.resurs.com/ecommerce-test/ws/V4/AfterShopFlowService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:aft="http://ecommerce.resurs.com/v4/msg/aftershopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <aft:withdrawBonusPoints>
         <governmentId>?</governmentId>
         <!--Optional:-->
         <customerType>?</customerType>
         <bonusPoints>?</bonusPoints>
      </aft:withdrawBonusPoints>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:wsaConfig mustUnderstand="NONE" version="200508" action="http://ecommerce.resurs.com/v4/AfterShopFlowWebService/withdrawBonusPointsRequest"/></con:call></con:operation><con:operation isOneWay="false" action="" name="getCustomerBonus" bindingOperationName="getCustomerBonus" type="Request-Response" inputName="" receivesAttachments="false" sendsAttachments="false" anonymous="optional"><con:settings/><con:call name="Request 1"><con:settings/><con:encoding>UTF-8</con:encoding><con:endpoint>https://test.resurs.com/ecommerce-test/ws/V4/AfterShopFlowService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:aft="http://ecommerce.resurs.com/v4/msg/aftershopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <aft:getCustomerBonus>
         <governmentId>?</governmentId>
         <!--Optional:-->
         <customerType>?</customerType>
      </aft:getCustomerBonus>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:wsaConfig mustUnderstand="NONE" version="200508" action="http://ecommerce.resurs.com/v4/AfterShopFlowWebService/getCustomerBonusRequest"/></con:call></con:operation></con:interface><con:interface xsi:type="con:WsdlInterface" wsaVersion="NONE" name="ConfigurationWebServiceImplPortBinding" type="wsdl" bindingName="{http://ecommerce.resurs.com/v4}ConfigurationWebServiceImplPortBinding" soapVersion="1_1" anonymous="optional" definition="https://test.resurs.com/ecommerce-test/ws/V4/ConfigurationService?wsdl" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:settings/><con:definitionCache type="TEXT" rootPart="https://test.resurs.com/ecommerce-test/ws/V4/ConfigurationService?wsdl"><con:part><con:url>https://test.resurs.com/ecommerce-test/ws/V4/ConfigurationService?wsdl</con:url><con:content><![CDATA[<definitions name="ConfigurationService" targetNamespace="http://ecommerce.resurs.com/v4" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:wsdl="http://schemas.xmlsoap.org/wsdl/" xmlns:tns="http://ecommerce.resurs.com/v4" xmlns:soap="http://schemas.xmlsoap.org/wsdl/soap/" xmlns:msg="http://ecommerce.resurs.com/v4/msg/configuration" xmlns:exc="http://ecommerce.resurs.com/v4/msg/exception" xmlns="http://schemas.xmlsoap.org/wsdl/">
  <types>
    <xsd:schema targetNamespace="http://ecommerce.resurs.com/v4/configuration">
      <xsd:import namespace="http://ecommerce.resurs.com/v4/msg/configuration" schemaLocation="https://test.resurs.com/ecommerce-test/ws/V4/ConfigurationService?xsd=schemas/messages/ConfigurationServiceMessages.xsd"/>
      <xsd:import namespace="http://ecommerce.resurs.com/v4/msg/exception" schemaLocation="https://test.resurs.com/ecommerce-test/ws/V4/ConfigurationService?xsd=schemas/messages/Exceptions.xsd"/>
    </xsd:schema>
  </types>
  <message name="peekInvoiceSequenceResponse">
    <part element="msg:peekInvoiceSequenceResponse" name="parameters"></part>
  </message>
  <message name="setInvoiceSequenceResponse">
    <part element="msg:setInvoiceSequenceResponse" name="parameters"></part>
  </message>
  <message name="registerEventCallbackResponse">
    <part element="msg:registerEventCallbackResponse" name="parameters"></part>
  </message>
  <message name="setInvoiceDataResponse">
    <part element="msg:setInvoiceDataResponse" name="parameters"></part>
  </message>
  <message name="setInvoiceSequence">
    <part element="msg:setInvoiceSequence" name="parameters"></part>
  </message>
  <message name="addPasswordResponse">
    <part element="msg:addPasswordResponse" name="parameters"></part>
  </message>
  <message name="ECommerceErrorException">
    <part element="exc:ECommerceError" name="fault"></part>
  </message>
  <message name="getInvoiceData">
    <part element="msg:getInvoiceData" name="parameters"></part>
  </message>
  <message name="unregisterEventCallback">
    <part element="msg:unregisterEventCallback" name="parameters"></part>
  </message>
  <message name="peekInvoiceSequence">
    <part element="msg:peekInvoiceSequence" name="parameters"></part>
  </message>
  <message name="getInvoiceDataResponse">
    <part element="msg:getInvoiceDataResponse" name="parameters"></part>
  </message>
  <message name="unregisterEventCallbackResponse">
    <part element="msg:unregisterEventCallbackResponse" name="parameters"></part>
  </message>
  <message name="changePassword">
    <part element="msg:changePassword" name="parameters"></part>
  </message>
  <message name="changePasswordResponse">
    <part element="msg:changePasswordResponse" name="parameters"></part>
  </message>
  <message name="setInvoiceData">
    <part element="msg:setInvoiceData" name="parameters"></part>
  </message>
  <message name="registerEventCallback">
    <part element="msg:registerEventCallback" name="parameters"></part>
  </message>
  <message name="addPassword">
    <part element="msg:addPassword" name="parameters"></part>
  </message>
  <message name="removePassword">
    <part element="msg:removePassword" name="parameters"></part>
  </message>
  <message name="removePasswordResponse">
    <part element="msg:removePasswordResponse" name="parameters"></part>
  </message>
  <portType name="ConfigurationWebService">
    <wsdl:documentation xmlns="http://www.w3.org/1999/xhtml">The Configuration WebService provides all self administration services available to the representative.</wsdl:documentation>
    <operation name="changePassword">
      <wsdl:documentation xmlns="http://www.w3.org/1999/xhtml">
        Changes a password for the representative.
        <br/>
        Please ensure that the password is of sufficient strength. If not, the operation will be rejected.
        <br/>
        <strong>NB:</strong>
        Also see
        <code>addPassword</code>
        for more information on multiple passwords.
      </wsdl:documentation>
      <input message="tns:changePassword"></input>
      <output message="tns:changePasswordResponse"></output>
      <fault message="tns:ECommerceErrorException" name="ECommerceErrorException">
        <wsdl:documentation xmlns="http://www.w3.org/1999/xhtml">Failed to change the password. See error for details.</wsdl:documentation>
      </fault>
    </operation>
    <operation name="addPassword">
      <wsdl:documentation xmlns="http://www.w3.org/1999/xhtml">
        Creates a new additional password to the representative.
        <br/>
        This function can be used to provide multiple, parallel logins for the same representative, 
                something that can be quite useful when accessing the eCommerce platform from different systems 
                that are not always in synch.
        <br/>
        Please ensure that the password is of sufficient strength. If not, the operation will be rejected.
        <br/>
        <strong>NB:</strong>
        Please be aware that separate expiration dates are kept for all the 
                passwords.
      </wsdl:documentation>
      <input message="tns:addPassword"></input>
      <output message="tns:addPasswordResponse"></output>
      <fault message="tns:ECommerceErrorException" name="ECommerceErrorException">
        <wsdl:documentation xmlns="http://www.w3.org/1999/xhtml">Failed to add a new representative password. See error for details.</wsdl:documentation>
      </fault>
    </operation>
    <operation name="removePassword">
      <wsdl:documentation xmlns="http://www.w3.org/1999/xhtml">
        Removes an additional representative password.
        <br/>
        <strong>NB:</strong>
        Please note that the "master" password cannot be removed, only those 
                added using the
        <code>addPassword</code>
        method.
      </wsdl:documentation>
      <input message="tns:removePassword"></input>
      <output message="tns:removePasswordResponse"></output>
      <fault message="tns:ECommerceErrorException" name="ECommerceErrorException">
        <wsdl:documentation xmlns="http://www.w3.org/1999/xhtml">Failed to remove specified representative password. See error for details.</wsdl:documentation>
      </fault>
    </operation>
    <operation name="registerEventCallback">
      <wsdl:documentation xmlns="http://www.w3.org/1999/xhtml">
        Registers a new event callback.
        <br/>
        See separate event documentation for details!
      </wsdl:documentation>
      <input message="tns:registerEventCallback"></input>
      <output message="tns:registerEventCallbackResponse"></output>
      <fault message="tns:ECommerceErrorException" name="ECommerceErrorException">
        <wsdl:documentation xmlns="http://www.w3.org/1999/xhtml">Failed to register event callback. See error for details.</wsdl:documentation>
      </fault>
    </operation>
    <operation name="unregisterEventCallback">
      <wsdl:documentation xmlns="http://www.w3.org/1999/xhtml">Unregisters an existing event callback.</wsdl:documentation>
      <input message="tns:unregisterEventCallback"></input>
      <output message="tns:unregisterEventCallbackResponse"></output>
      <fault message="tns:ECommerceErrorException" name="ECommerceErrorException">
        <wsdl:documentation xmlns="http://www.w3.org/1999/xhtml">Failed to unregister event callback. See error for details.</wsdl:documentation>
      </fault>
    </operation>
    <operation name="peekInvoiceSequence">
      <wsdl:documentation xmlns="http://www.w3.org/1999/xhtml">Returns the next invoice number to be used for automatic generation of invoice numbers.</wsdl:documentation>
      <input message="tns:peekInvoiceSequence"></input>
      <output message="tns:peekInvoiceSequenceResponse"></output>
      <fault message="tns:ECommerceErrorException" name="ECommerceErrorException">
        <wsdl:documentation xmlns="http://www.w3.org/1999/xhtml">Failed to return invoice number sequence. See error for details.</wsdl:documentation>
      </fault>
    </operation>
    <operation name="setInvoiceSequence">
      <wsdl:documentation xmlns="http://www.w3.org/1999/xhtml">Sets the next invoice number to be used for automatic generation of invoice numbers.</wsdl:documentation>
      <input message="tns:setInvoiceSequence"></input>
      <output message="tns:setInvoiceSequenceResponse"></output>
      <fault message="tns:ECommerceErrorException" name="ECommerceErrorException">
        <wsdl:documentation xmlns="http://www.w3.org/1999/xhtml">Failed to set the invoice number sequence. See error for details.</wsdl:documentation>
      </fault>
    </operation>
    <operation name="setInvoiceData">
      <wsdl:documentation xmlns="http://www.w3.org/1999/xhtml">Sets new data to the representative.</wsdl:documentation>
      <input message="tns:setInvoiceData"></input>
      <output message="tns:setInvoiceDataResponse"></output>
      <fault message="tns:ECommerceErrorException" name="ECommerceErrorException"></fault>
    </operation>
    <operation name="getInvoiceData">
      <wsdl:documentation xmlns="http://www.w3.org/1999/xhtml">Gets the representatives data.</wsdl:documentation>
      <input message="tns:getInvoiceData"></input>
      <output message="tns:getInvoiceDataResponse"></output>
      <fault message="tns:ECommerceErrorException" name="ECommerceErrorException"></fault>
    </operation>
  </portType>
  <binding name="ConfigurationWebServiceImplPortBinding" type="tns:ConfigurationWebService">
    <soap:binding style="document" transport="http://schemas.xmlsoap.org/soap/http"/>
    <operation name="changePassword">
      <soap:operation soapAction=""/>
      <input>
        <soap:body use="literal"/>
      </input>
      <output>
        <soap:body use="literal"/>
      </output>
      <fault name="ECommerceErrorException">
        <soap:fault name="ECommerceErrorException" use="literal"/>
      </fault>
    </operation>
    <operation name="addPassword">
      <soap:operation soapAction=""/>
      <input>
        <soap:body use="literal"/>
      </input>
      <output>
        <soap:body use="literal"/>
      </output>
      <fault name="ECommerceErrorException">
        <soap:fault name="ECommerceErrorException" use="literal"/>
      </fault>
    </operation>
    <operation name="removePassword">
      <soap:operation soapAction=""/>
      <input>
        <soap:body use="literal"/>
      </input>
      <output>
        <soap:body use="literal"/>
      </output>
      <fault name="ECommerceErrorException">
        <soap:fault name="ECommerceErrorException" use="literal"/>
      </fault>
    </operation>
    <operation name="registerEventCallback">
      <soap:operation soapAction=""/>
      <input>
        <soap:body use="literal"/>
      </input>
      <output>
        <soap:body use="literal"/>
      </output>
      <fault name="ECommerceErrorException">
        <soap:fault name="ECommerceErrorException" use="literal"/>
      </fault>
    </operation>
    <operation name="unregisterEventCallback">
      <soap:operation soapAction=""/>
      <input>
        <soap:body use="literal"/>
      </input>
      <output>
        <soap:body use="literal"/>
      </output>
      <fault name="ECommerceErrorException">
        <soap:fault name="ECommerceErrorException" use="literal"/>
      </fault>
    </operation>
    <operation name="peekInvoiceSequence">
      <soap:operation soapAction=""/>
      <input>
        <soap:body use="literal"/>
      </input>
      <output>
        <soap:body use="literal"/>
      </output>
      <fault name="ECommerceErrorException">
        <soap:fault name="ECommerceErrorException" use="literal"/>
      </fault>
    </operation>
    <operation name="setInvoiceSequence">
      <soap:operation soapAction=""/>
      <input>
        <soap:body use="literal"/>
      </input>
      <output>
        <soap:body use="literal"/>
      </output>
      <fault name="ECommerceErrorException">
        <soap:fault name="ECommerceErrorException" use="literal"/>
      </fault>
    </operation>
    <operation name="setInvoiceData">
      <soap:operation soapAction=""/>
      <input>
        <soap:body use="literal"/>
      </input>
      <output>
        <soap:body use="literal"/>
      </output>
      <fault name="ECommerceErrorException">
        <soap:fault name="ECommerceErrorException" use="literal"/>
      </fault>
    </operation>
    <operation name="getInvoiceData">
      <soap:operation soapAction=""/>
      <input>
        <soap:body use="literal"/>
      </input>
      <output>
        <soap:body use="literal"/>
      </output>
      <fault name="ECommerceErrorException">
        <soap:fault name="ECommerceErrorException" use="literal"/>
      </fault>
    </operation>
  </binding>
  <service name="ConfigurationService">
    <port binding="tns:ConfigurationWebServiceImplPortBinding" name="ConfigurationWebServiceImplPort">
      <soap:address location="https://test.resurs.com/ecommerce-test/ws/V4/ConfigurationService"/>
    </port>
  </service>
</definitions>]]></con:content><con:type>http://schemas.xmlsoap.org/wsdl/</con:type></con:part><con:part><con:url>https://test.resurs.com/ecommerce-test/ws/V4/ConfigurationService?xsd=schemas/messages/ConfigurationServiceMessages.xsd</con:url><con:content><![CDATA[<schema targetNamespace="http://ecommerce.resurs.com/v4/msg/configuration" version="4.0" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:types="http://ecommerce.resurs.com/v4/types/configuration" xmlns:tns="http://ecommerce.resurs.com/v4/msg/configuration" xmlns:common="http://ecommerce.resurs.com/v4/types/common" xmlns="http://www.w3.org/2001/XMLSchema">
  <import namespace="http://ecommerce.resurs.com/v4/types/common" schemaLocation="https://test.resurs.com/ecommerce-test/ws/V4/ConfigurationService?xsd=schemas/types/common.xsd"/>
  <import namespace="http://ecommerce.resurs.com/v4/types/configuration" schemaLocation="https://test.resurs.com/ecommerce-test/ws/V4/ConfigurationService?xsd=schemas/types/configuration.xsd"/>
  <element name="changePassword" type="tns:changePassword"/>
  <element name="changePasswordResponse" type="tns:changePasswordResponse"/>
  <element name="addPassword" type="tns:addPassword"/>
  <element name="addPasswordResponse" type="tns:addPasswordResponse"/>
  <element name="removePassword" type="tns:removePassword"/>
  <element name="removePasswordResponse" type="tns:removePasswordResponse"/>
  <element name="registerEventCallback" type="tns:registerEventCallback"/>
  <element name="registerEventCallbackResponse" type="tns:registerEventCallbackResponse"/>
  <element name="unregisterEventCallback" type="tns:unregisterEventCallback"/>
  <element name="unregisterEventCallbackResponse" type="tns:unregisterEventCallbackResponse"/>
  <element name="peekInvoiceSequence" type="tns:peekInvoiceSequence"/>
  <element name="peekInvoiceSequenceResponse" type="tns:peekInvoiceSequenceResponse"/>
  <element name="setInvoiceSequence" type="tns:setInvoiceSequence"/>
  <element name="setInvoiceSequenceResponse" type="tns:setInvoiceSequenceResponse"/>
  <element name="setInvoiceData" type="tns:setInvoiceData"/>
  <element name="setInvoiceDataResponse" type="tns:setInvoiceDataResponse"/>
  <element name="getInvoiceData" type="tns:getInvoiceData"/>
  <element name="getInvoiceDataResponse" type="tns:getInvoiceDataResponse"/>
  <complexType name="changePassword">
    <sequence>
      <element minOccurs="0" name="identifier" nillable="true" type="common:id">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">
            The password identifier.
            <br/>
            If none is specified, the master password is assumed.
          </xsd:documentation>
        </annotation>
      </element>
      <element name="newPassword" type="common:nonEmptyString">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The new password.</xsd:documentation>
        </annotation>
      </element>
    </sequence>
  </complexType>
  <complexType name="changePasswordResponse">
    <sequence/>
  </complexType>
  <complexType name="addPassword">
    <sequence>
      <element name="identifier" type="common:id">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">
            The password identifier as defined by the representative.
            <br/>
            This is used to separate the different representative passwords.
          </xsd:documentation>
        </annotation>
      </element>
      <element minOccurs="0" name="description" nillable="true" type="string">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">A textual description of the password.</xsd:documentation>
        </annotation>
      </element>
      <element name="newPassword" type="common:nonEmptyString">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The password.</xsd:documentation>
        </annotation>
      </element>
    </sequence>
  </complexType>
  <complexType name="addPasswordResponse">
    <sequence/>
  </complexType>
  <complexType name="removePassword">
    <sequence>
      <element name="identifier" type="common:id">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The password identifier.</xsd:documentation>
        </annotation>
      </element>
    </sequence>
  </complexType>
  <complexType name="removePasswordResponse">
    <sequence/>
  </complexType>
  <complexType name="registerEventCallback">
    <sequence>
      <element name="eventType" type="common:id">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">
            The type of event call-back being registered.
            <br/>
            Typical examples are PASSWORD_EXPIRATION for the mandatory password expiration event
                        call-back, and UNFREEZE for notification of frozen payments being thawed after manual
                        fraud control.
            <br/>
            For full details on the call-back events available, please contact Resurs Bank.
          </xsd:documentation>
        </annotation>
      </element>
      <element name="uriTemplate" type="common:nonEmptyString">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">
            The call-back event URI template, with placeholders for the parameters to be returned. All
                        placeholders are supplied in curly brackets, i.e. {}
            <br/>
            The actual placeholders depend on the type of call-back event. However, there is
                        one common: digest
            <br/>
            For further information on URIs and placeholders, please contact Resurs Bank.
            <br/>
            Example: http://www.resurs.se/?id={identifier}&amp;rep=4&amp;digest={digest}
          </xsd:documentation>
        </annotation>
      </element>
      <element minOccurs="0" name="basicAuthUserName" nillable="true" type="common:nonEmptyString">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">If Basic Access Authentication is to be used, the user name.</xsd:documentation>
        </annotation>
      </element>
      <element minOccurs="0" name="basicAuthPassword" nillable="true" type="common:nonEmptyString">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">If Basic Access Authentication is to be used, the password.</xsd:documentation>
        </annotation>
      </element>
      <element minOccurs="0" name="digestConfiguration" nillable="true" type="types:digestConfiguration">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">If a digest is to be used to confirm that the call-back is actually issued by Resurs Bank,
                        the configuration of that digest.</xsd:documentation>
        </annotation>
      </element>
    </sequence>
  </complexType>
  <complexType name="registerEventCallbackResponse">
    <sequence/>
  </complexType>
  <complexType name="unregisterEventCallback">
    <sequence>
      <element name="eventType" type="common:id"/>
    </sequence>
  </complexType>
  <complexType name="unregisterEventCallbackResponse">
    <sequence/>
  </complexType>
  <complexType name="peekInvoiceSequence">
    <sequence/>
  </complexType>
  <complexType name="peekInvoiceSequenceResponse">
    <sequence>
      <element minOccurs="0" name="nextInvoiceNumber" type="integer">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">
            The next invoice number to be used for automatic generation of invoice numbers. If no sequence
                        is set, this function returns
            <pre>null</pre>
            .
          </xsd:documentation>
        </annotation>
      </element>
    </sequence>
  </complexType>
  <complexType name="setInvoiceSequence">
    <sequence>
      <element minOccurs="0" name="nextInvoiceNumber" nillable="true" type="integer">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The next invoice number to be used for automatic generation of invoice numbers.</xsd:documentation>
        </annotation>
      </element>
    </sequence>
  </complexType>
  <complexType name="setInvoiceSequenceResponse">
    <sequence/>
  </complexType>
  <complexType name="setInvoiceDataResponse">
    <sequence/>
  </complexType>
  <complexType name="setInvoiceData">
    <sequence>
      <element name="invoiceData" type="types:invoiceData">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">Sets the representative data that will be used in the invoices. The data will be set once and
                        will be used on all future invoices until the representative call setInvoice again.
                        The invoice is generated after you finalize the payment and will contain the invoiceData and the speclines submitted in the finalize.</xsd:documentation>
        </annotation>
      </element>
    </sequence>
  </complexType>
  <complexType name="getInvoiceData">
    <sequence/>
  </complexType>
  <complexType name="getInvoiceDataResponse">
    <sequence>
      <element name="invoiceData" type="types:invoiceData"/>
    </sequence>
  </complexType>
</schema>]]></con:content><con:type>http://www.w3.org/2001/XMLSchema</con:type></con:part><con:part><con:url>https://test.resurs.com/ecommerce-test/ws/V4/ConfigurationService?xsd=schemas/types/common.xsd</con:url><con:content><![CDATA[<schema targetNamespace="http://ecommerce.resurs.com/v4/types/common" version="4.0" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:tns="http://ecommerce.resurs.com/v4/types/common" xmlns="http://www.w3.org/2001/XMLSchema">
  <complexType name="customer">
    <annotation>
      <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">Details about a (potential) customer, be it natural or legal.</xsd:documentation>
    </annotation>
    <sequence>
      <element name="governmentId" type="tns:nonEmptyString">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">
            Identifying a customer uniquely within the country.
            <ul>
              <li>SE: Personnummer/Organisationsnummer</li>
              <li>DK: CPR-number</li>
              <li>NO: Fødselsnummer</li>
              <li>FI: Henkilötunnus</li>
            </ul>
          </xsd:documentation>
        </annotation>
      </element>
      <element name="address" type="tns:address">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">Address of the customer.</xsd:documentation>
        </annotation>
      </element>
      <element minOccurs="0" name="phone" type="string">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The customer telephone number.</xsd:documentation>
        </annotation>
      </element>
      <element minOccurs="0" name="email" type="tns:nonEmptyString">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The customer email address.</xsd:documentation>
        </annotation>
      </element>
      <element name="type" type="tns:customerType">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The type of customer.</xsd:documentation>
        </annotation>
      </element>
    </sequence>
  </complexType>
  <complexType name="address">
    <annotation>
      <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The customer address details.</xsd:documentation>
    </annotation>
    <sequence>
      <element minOccurs="0" name="fullName" type="tns:nonEmptyString">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The full (possibly composite name) of the
                        customer.</xsd:documentation>
        </annotation>
      </element>
      <element minOccurs="0" name="firstName" type="tns:nonEmptyString">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">If available, the first name of the
                        customer.</xsd:documentation>
        </annotation>
      </element>
      <element minOccurs="0" name="lastName" type="tns:nonEmptyString">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">If available, the last name of the
                        customer.</xsd:documentation>
        </annotation>
      </element>
      <element name="addressRow1" type="string">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The first row of the customer address.</xsd:documentation>
        </annotation>
      </element>
      <element minOccurs="0" name="addressRow2" type="tns:nonEmptyString">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">
            The second row of the customer address.
            <br/>
            In practice: Located as a second line on printouts and graphics, like invoices.
          </xsd:documentation>
        </annotation>
      </element>
      <element name="postalArea" type="tns:nonEmptyString">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The postal area.</xsd:documentation>
        </annotation>
      </element>
      <element name="postalCode" type="tns:nonEmptyString">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The postal code.</xsd:documentation>
        </annotation>
      </element>
      <element name="country" type="tns:countryCode">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">In which country is this address located?</xsd:documentation>
        </annotation>
      </element>
    </sequence>
  </complexType>
  <complexType name="mapEntry">
    <annotation>
      <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">
        A representation of a simple map. WebService frameworks are not good at supporting maps natively.
        <br/>
        An instance of this object contains
        <tt>{key, value}</tt>
        -pair. If a list of this type is used,
        <tt>keys</tt>
        <strong>must</strong>
        be unique within the list.
      </xsd:documentation>
    </annotation>
    <sequence>
      <element name="key" type="tns:nonEmptyString">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The key of the pair.</xsd:documentation>
        </annotation>
      </element>
      <element minOccurs="0" name="value" type="string">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The value of the pair.</xsd:documentation>
        </annotation>
      </element>
    </sequence>
  </complexType>
  <simpleType name="countryCode">
    <annotation>
      <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The country code as defined by the ISO 3166-1
                standard.</xsd:documentation>
    </annotation>
    <restriction base="string">
      <enumeration value="SE">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">Sweden</xsd:documentation>
        </annotation>
      </enumeration>
      <enumeration value="NO">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">Norway</xsd:documentation>
        </annotation>
      </enumeration>
      <enumeration value="DK">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">Denmark</xsd:documentation>
        </annotation>
      </enumeration>
      <enumeration value="FI">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">Finland</xsd:documentation>
        </annotation>
      </enumeration>
    </restriction>
  </simpleType>
  <simpleType name="id">
    <annotation>
      <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The standard identity type.</xsd:documentation>
    </annotation>
    <restriction base="string">
      <minLength value="1"/>
      <pattern value="[\p{L}0-9 \._/\-]*"/>
    </restriction>
  </simpleType>
  <simpleType name="nonEmptyString">
    <annotation>
      <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">A string that cannot be empty.</xsd:documentation>
    </annotation>
    <restriction base="string">
      <minLength value="1"/>
    </restriction>
  </simpleType>
  <simpleType name="positiveDecimal">
    <annotation>
      <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">A decimal value of at least zero (0).</xsd:documentation>
    </annotation>
    <restriction base="decimal">
      <minInclusive value="0"/>
    </restriction>
  </simpleType>
  <simpleType name="percent">
    <annotation>
      <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">A percentage between 0% and 100%.</xsd:documentation>
    </annotation>
    <restriction base="decimal">
      <minInclusive value="0"/>
      <maxInclusive value="100"/>
    </restriction>
  </simpleType>
  <simpleType name="multiplier">
    <annotation>
      <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">A decimal multiplier used when calculating annuity
                factors. Between 0 and 1.</xsd:documentation>
    </annotation>
    <restriction base="decimal">
      <minInclusive value="0"/>
      <maxInclusive value="1"/>
    </restriction>
  </simpleType>
  <complexType name="paymentSpec">
    <annotation>
      <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">
        The payment details.
        <br/>
        In it's simples form it's just sum, i e
        <code>totalAmount</code>
        and
        <code>totalVatAmount</code>
        is
                set, but there are no
        <code>specLines</code>
        . If nothing else is said you should send
        <code>specLines</code>
        .
      </xsd:documentation>
    </annotation>
    <sequence>
      <element maxOccurs="unbounded" minOccurs="0" name="specLines" type="tns:specLine">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The list of payment lines. In the case you're sending a simple payment, without lines, this
                        parameter should be left empty. Sending payment lines may, or may not, be mandatory, depending
                        on the contract with Resurs Bank.</xsd:documentation>
        </annotation>
      </element>
      <element name="totalAmount" type="tns:positiveDecimal">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">
            The total payment amount. The sum of all line amounts (if there are lines supplied)
            <strong>including vat</strong>
            . If this payment is without lines this is the only value to be
                        set on the
                        payment spec.
          </xsd:documentation>
        </annotation>
      </element>
      <element minOccurs="0" name="totalVatAmount" nillable="true" type="decimal">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">
            The total VAT amount of the payment.
            <br/>
            This field is
            <strong>required</strong>
            when specification lines are supplied and
            <br/>
            <strong>not</strong>
            allowed if no specification lines are supplied.
          </xsd:documentation>
        </annotation>
      </element>
      <element minOccurs="0" name="bonusPoints" type="nonNegativeInteger">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">
            The number of bonus points to use in this purchase.
            <p/>
            <a href="https://test.resurs.com/docs/x/CAAv">Read more about bonus</a>
          </xsd:documentation>
        </annotation>
      </element>
    </sequence>
  </complexType>
  <complexType name="specLine">
    <annotation>
      <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The payment line (item) specification. These can be used to provide detailed information about the
                contents of the payment.</xsd:documentation>
    </annotation>
    <sequence>
      <element name="id" type="tns:id">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The line identity</xsd:documentation>
        </annotation>
      </element>
      <element name="artNo" type="string">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">Article number of the item.</xsd:documentation>
        </annotation>
      </element>
      <element name="description" type="string">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The item description.</xsd:documentation>
        </annotation>
      </element>
      <element name="quantity" type="decimal">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The line quantity.</xsd:documentation>
        </annotation>
      </element>
      <element name="unitMeasure" type="string">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The line unit.</xsd:documentation>
        </annotation>
      </element>
      <element name="unitAmountWithoutVat" type="decimal">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The unit amount without VAT.</xsd:documentation>
        </annotation>
      </element>
      <element name="vatPct" type="tns:percent">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The VAT percentage.</xsd:documentation>
        </annotation>
      </element>
      <element name="totalVatAmount" type="decimal">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The total item VAT amount.</xsd:documentation>
        </annotation>
      </element>
      <element name="totalAmount" type="decimal">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The total item amount, including VAT.</xsd:documentation>
        </annotation>
      </element>
    </sequence>
  </complexType>
  <simpleType name="paymentStatus">
    <annotation>
      <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">Payment status.</xsd:documentation>
    </annotation>
    <restriction base="string">
      <enumeration value="DEBITABLE">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">Can be debited.</xsd:documentation>
        </annotation>
      </enumeration>
      <enumeration value="CREDITABLE">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">Can be credited.</xsd:documentation>
        </annotation>
      </enumeration>
      <enumeration value="IS_DEBITED">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">Is debited.</xsd:documentation>
        </annotation>
      </enumeration>
      <enumeration value="IS_CREDITED">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">Is credited.</xsd:documentation>
        </annotation>
      </enumeration>
      <enumeration value="IS_ANNULLED">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">Is annulled</xsd:documentation>
        </annotation>
      </enumeration>
    </restriction>
  </simpleType>
  <complexType name="limit">
    <annotation>
      <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">Detailed information about the limit.</xsd:documentation>
    </annotation>
    <sequence>
      <element name="approvedAmount" type="tns:positiveDecimal">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The amount that has been approved. This can be the requested amount, or more.</xsd:documentation>
        </annotation>
      </element>
      <element name="decision" type="tns:limitDecision">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The limit decision.</xsd:documentation>
        </annotation>
      </element>
      <element name="customer" type="tns:customer">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The customer details.</xsd:documentation>
        </annotation>
      </element>
      <element name="limitRequestId" type="tns:id">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">Identifies this limit request uniquely, whether it's granted or not. It can be used to request
                        more information, by phone, about the application from Resurs Bank, if there is any questions.</xsd:documentation>
        </annotation>
      </element>
    </sequence>
  </complexType>
  <simpleType name="limitDecision">
    <annotation>
      <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The possible decisions returned by a limit application.</xsd:documentation>
    </annotation>
    <restriction base="string">
      <enumeration value="DENIED">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">No limit at all is given.</xsd:documentation>
        </annotation>
      </enumeration>
      <enumeration value="GRANTED">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">
            The applied limit
            <strong>or more</strong>
            is given.
          </xsd:documentation>
        </annotation>
      </enumeration>
      <enumeration value="TRIAL">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">
            No limit could be
            <strong>immediately</strong>
            approved. Some form of additional information
                        is required before a final decision can be made, and the customer has to contact Resurs
                        Bank.
            <br/>
            If, after a further inspection, the customer limit is approved, it will automatically be used
                        the next time the same customer applies for the same (or lower amount) on the same payment
                        method.
          </xsd:documentation>
        </annotation>
      </enumeration>
    </restriction>
  </simpleType>
  <simpleType name="customerType">
    <annotation>
      <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The type of customer.</xsd:documentation>
    </annotation>
    <restriction base="string">
      <enumeration value="LEGAL">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The customer is a legal customer.</xsd:documentation>
        </annotation>
      </enumeration>
      <enumeration value="NATURAL">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The customer is a natural customer, i.e. a person.</xsd:documentation>
        </annotation>
      </enumeration>
    </restriction>
  </simpleType>
  <simpleType name="paymentMethodType">
    <annotation>
      <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">Payment methods are divided into groups.
                This information can be used to retrieve orders based on which payment method type was used.</xsd:documentation>
    </annotation>
    <restriction base="string">
      <enumeration value="INVOICE">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">
            The customer wants to have an invoice sent to him, where he's able to pay the whole amount at
                        once.
            <p>
              That can be many payment methods of this type. Fetch a list with the function
              <tt class="method">PaymentMethodService.getPaymentMethods</tt>
              .
            </p>
          </xsd:documentation>
        </annotation>
      </enumeration>
      <enumeration value="REVOLVING_CREDIT">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">
            The customer wants to start a new account, and finance the purchase with that account's
                        credit limit. The purchase can be paid in a series of installments. In most cases there will be
                        made a
                        branded card sent to customer, depending on how your collaboration with Resurs Bank looks like.
                        A credit
                        application will need to be made, and the customer needs to sign a credit contract.
            <p>
              There can be many payment methods of this type. Fetch a list with the function
              <tt class="method">ShopFlowService.getPaymentMethods</tt>
              .
            </p>
          </xsd:documentation>
        </annotation>
      </enumeration>
      <enumeration value="CARD">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">
            Every card issued by Resurs Bank falls into this group, while cards from other banks or credit
                        institutions do NOT! This means that customers which have a branded Resurs card from another of
                        Resurs representatives still can use it in your webshop.
            <p>
              The will at most be one payment method of this type. Use the method
              <tt class="method">ShopFlowService.isCardPaymentAvailable</tt>
              to see if you
                            can use it.
            </p>
          </xsd:documentation>
        </annotation>
      </enumeration>
    </restriction>
  </simpleType>
  <simpleType name="invoiceDeliveryTypeEnum">
    <annotation>
      <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">This Enum indicates how a invoice should be delivered, if not specified it should default back to the
                EMAIL type.</xsd:documentation>
    </annotation>
    <restriction base="string">
      <enumeration value="NONE">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">Do not let Resurs Bank deliver the Invoices.</xsd:documentation>
        </annotation>
      </enumeration>
      <enumeration value="EMAIL">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">This option will let Resurs Bank deliver the invoice by mail. This is the default option if
                        nothing is specified.</xsd:documentation>
        </annotation>
      </enumeration>
      <enumeration value="POSTAL">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">This option will let Resurs Bank deliver the invoice by post.</xsd:documentation>
        </annotation>
      </enumeration>
    </restriction>
  </simpleType>
</schema>]]></con:content><con:type>http://www.w3.org/2001/XMLSchema</con:type></con:part><con:part><con:url>https://test.resurs.com/ecommerce-test/ws/V4/ConfigurationService?xsd=schemas/types/configuration.xsd</con:url><con:content><![CDATA[<schema targetNamespace="http://ecommerce.resurs.com/v4/types/configuration" version="4.0" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:tns="http://ecommerce.resurs.com/v4/types/configuration" xmlns:common="http://ecommerce.resurs.com/v4/types/common" xmlns="http://www.w3.org/2001/XMLSchema">
  <import namespace="http://ecommerce.resurs.com/v4/types/common" schemaLocation="https://test.resurs.com/ecommerce-test/ws/V4/ConfigurationService?xsd=schemas/types/common.xsd"/>
  <complexType name="digestConfiguration">
    <sequence>
      <element name="digestAlgorithm" type="tns:digestAlgorithm">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">
            A digest will be hashed using the specified algorithm.
            <br/>
            The currently supported algorithms are MD5 and SHA1.
          </xsd:documentation>
        </annotation>
      </element>
      <element maxOccurs="unbounded" name="digestParameters" type="string">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">
            The digest will be created by hashing one or more parameters.
            <br/>
            These are the same as those available for specification in the URI.
          </xsd:documentation>
        </annotation>
      </element>
      <element minOccurs="0" name="digestSalt" nillable="true" type="string">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">
            To improve the strength of the hash, it a secret hash salt must be provided.
            <br/>
            The salt will be added
            <strong>after</strong>
            all digest parameters.
          </xsd:documentation>
        </annotation>
      </element>
    </sequence>
  </complexType>
  <simpleType name="digestAlgorithm">
    <restriction base="string">
      <enumeration value="MD5"/>
      <enumeration value="SHA1"/>
    </restriction>
  </simpleType>
  <complexType name="invoiceData">
    <sequence>
      <element name="name" type="common:nonEmptyString">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The representatives name.</xsd:documentation>
        </annotation>
      </element>
      <element name="street" type="common:nonEmptyString">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The representatives street name.</xsd:documentation>
        </annotation>
      </element>
      <element name="zipcode" type="common:nonEmptyString">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The representative zipcode.</xsd:documentation>
        </annotation>
      </element>
      <element name="city" type="common:nonEmptyString">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The representatives city.</xsd:documentation>
        </annotation>
      </element>
      <element name="country" type="common:nonEmptyString">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The representatives country.</xsd:documentation>
        </annotation>
      </element>
      <element name="phone" type="common:nonEmptyString">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The representatives phone number.</xsd:documentation>
        </annotation>
      </element>
      <element minOccurs="0" name="fax" type="common:nonEmptyString">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The representatives fax.</xsd:documentation>
        </annotation>
      </element>
      <element name="email" type="common:nonEmptyString">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The representatives e-mail.</xsd:documentation>
        </annotation>
      </element>
      <element name="homepage" type="common:nonEmptyString">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The representatives homepage.</xsd:documentation>
        </annotation>
      </element>
      <element name="vatreg" type="common:nonEmptyString">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The representatives VAT registration number.</xsd:documentation>
        </annotation>
      </element>
      <element name="orgnr" type="common:nonEmptyString">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The representatives organisation number.</xsd:documentation>
        </annotation>
      </element>
      <element default="true" name="companytaxnote" type="boolean">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">Wheter or not the company have a company tax note (Not available in Norway)</xsd:documentation>
        </annotation>
      </element>
      <element name="logotype" type="base64Binary">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The representatives logotype.</xsd:documentation>
        </annotation>
      </element>
      <element name="modifiedby" type="string">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The name of the user that last modified the data.</xsd:documentation>
        </annotation>
      </element>
    </sequence>
  </complexType>
</schema>]]></con:content><con:type>http://www.w3.org/2001/XMLSchema</con:type></con:part><con:part><con:url>https://test.resurs.com/ecommerce-test/ws/V4/ConfigurationService?xsd=schemas/messages/Exceptions.xsd</con:url><con:content><![CDATA[<schema targetNamespace="http://ecommerce.resurs.com/v4/msg/exception" version="4.0" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:tns="http://ecommerce.resurs.com/v4/msg/exception" xmlns:common="http://ecommerce.resurs.com/v4/types/common" xmlns="http://www.w3.org/2001/XMLSchema">
  <import namespace="http://ecommerce.resurs.com/v4/types/common" schemaLocation="https://test.resurs.com/ecommerce-test/ws/V4/ConfigurationService?xsd=schemas/types/common.xsd"/>
  <element name="ECommerceError" type="tns:ECommerceError"/>
  <!--Exceptions-->
  <complexType name="ECommerceError">
    <annotation>
      <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">
        All errors/exceptions are returned as
        <code>ECommerceException</code>
        s.
        <p>
          All kinds of errors will generate this kind of exception, but different groups of errors can be
                    distinguished by their
          <code>errorTypeId</code>
          . For example the errorTypeId 1 is "Invalid argument". You
                    might want to take different actions depending on the
          <code>errorTypeId</code>
          , especially if the
          <code>fixableByYou</code>
          flag is true.
        </p>
        These are the current errorTypes. More might be added as time goes, but old errors codes will remain unchanged.
        <ul>
          <li>ILLEGAL_ARGUMENT(1)</li>
          <li>INTERNAL_ERROR(3)</li>
          <li>NOT_ALLOWED(4)</li>
          <li>REFERENCED_DATA_DONT_EXISTS(8)</li>
          <li>CREDITAPPLICATION_FAILED(10)</li>
          <li>NOT_IMPLEMENTED(11)</li>
          <li>INVALID_CREDITAPPLICATION_SUBMISSION(14)</li>
          <li>SIGNING_REQUIRED(15)</li>
          <li>AUTHORIZATION_FAILED(17)</li>
          <li>APPLICATION_VALIDATION_ERROR(18)</li>
          <li>OBJECT_WITH_ID_ALREADY_EXIST(19)</li>
          <li>NOT_ALLOWED_IN_PAYMENT_STATE(20)</li>
          <li>CUSTOMER_CONFIGURATION_EXCEPTION(21)</li>
          <li>SERVICE_CONFIGURATION_EXCEPTION(22)</li>
          <li>INVALID_CREDITING(23)</li>
          <li>LIMIT_PER_TIME_EXCEEDED(24)</li>
          <li>NOT_ALLOWED_IN_CURRENT_STATE(25)</li>
          <li>INVALID_FINALIZATION(26)</li>
          <li>FORM_PARSING(27)</li>
          <li>INVALID_IDENTIFICATION(28)</li>
          <li>TOO_MANY_TOKENS(29)</li>
          <li>BONUS_AUTHORIZATION_FAILED(30)</li>
          <li>LEGACY_EXCEPTION(99)</li>
          <li>WEAK_PASSWORD(502)</li>
          <li>NOT_AUTHORIZED(503)</li>
        </ul>
        <p>
          The
          <code>fixableByYou</code>
          flag means that the system works as intended, and that some other input could have prevented
                    the error from happening. For example, a customer not having enough funds on his card account renders an
          <code>ECommerceException</code>
          with
                    the
          <code>fixableByYou</code>
          set to
          <tt>true</tt>
          . If, on the other hand, we have problems communicating with the database,
                    the
          <code>fixableByYou</code>
          flag should be false.
          <br/>
          When this flag is false there is nothing you can do except showing the customer the error message.
        </p>
        <p>
          The exception contains two error messages. One of them, the exception message, is a technical description of
                    what went wrong, and
          <strong>it's NOT suitable to show the end user</strong>
          . Just log it, and use it for diagnosing
                    and development.
          <br/>
          The userErrorMessage on the other hand, we more or less require you to show to the customer if something went
                    wrong. The reason for requiring you to show it is that some of the messages we return have a legal meaning not to be
                    fiddled with.
        </p>
      </xsd:documentation>
    </annotation>
    <sequence>
      <element name="errorTypeDescription" type="common:nonEmptyString">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">The textual description of the error type. See the list above.</xsd:documentation>
        </annotation>
      </element>
      <element name="errorTypeId" type="int">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">Indicates which kind of error this is. See the list above.</xsd:documentation>
        </annotation>
      </element>
      <element name="fixableByYou" type="boolean">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">
            "If this error have been avoided with some other input" =
            <tt>true</tt>
            <br/>
            "It a Resurs Bank problem" =
            <tt>false</tt>
          </xsd:documentation>
        </annotation>
      </element>
      <element name="userErrorMessage" type="common:nonEmptyString">
        <annotation>
          <xsd:documentation xmlns="http://www.w3.org/1999/xhtml">An error message intended for the user of the web shop. This message must be shown!</xsd:documentation>
        </annotation>
      </element>
    </sequence>
  </complexType>
</schema>]]></con:content><con:type>http://www.w3.org/2001/XMLSchema</con:type></con:part></con:definitionCache><con:endpoints><con:endpoint>${#Project#ServiceEndpoint}/ConfigurationService</con:endpoint><con:endpoint>http://ws.ecom.pte.loc/ws/V4/ConfigurationService</con:endpoint><con:endpoint>https://test.resurs.com/ecommerce-test/ws/V4/ConfigurationService</con:endpoint></con:endpoints><con:operation isOneWay="false" action="" name="addPassword" bindingOperationName="addPassword" type="Request-Response" inputName="" receivesAttachments="false" sendsAttachments="false" anonymous="optional"><con:settings/><con:call name="Request 1"><con:settings/><con:encoding>UTF-8</con:encoding><con:endpoint>https://test.resurs.com/ecommerce-test/ws/V4/ConfigurationService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:con="http://ecommerce.resurs.com/v4/msg/configuration">
   <soapenv:Header/>
   <soapenv:Body>
      <con:addPassword>
         <!--type: id-->
         <identifier>gero et</identifier>
         <!--Optional:-->
         <!--type: string-->
         <description>sonoras imperio</description>
         <!--type: nonEmptyString-->
         <newPassword>quae divum incedo</newPassword>
      </con:addPassword>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508" action="http://ecommerce.resurs.com/v4/ConfigurationWebService/addPasswordRequest"/><con:wsrmConfig version="1.2"/></con:call></con:operation><con:operation isOneWay="false" action="" name="changePassword" bindingOperationName="changePassword" type="Request-Response" inputName="" receivesAttachments="false" sendsAttachments="false" anonymous="optional"><con:settings/><con:call name="Request 1"><con:settings/><con:encoding>UTF-8</con:encoding><con:endpoint>https://test.resurs.com/ecommerce-test/ws/V4/ConfigurationService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:con="http://ecommerce.resurs.com/v4/msg/configuration">
   <soapenv:Header/>
   <soapenv:Body>
      <con:changePassword>
         <!--Optional:-->
         <!--type: id-->
         <identifier>gero et</identifier>
         <!--type: nonEmptyString-->
         <newPassword>sonoras imperio</newPassword>
      </con:changePassword>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508" action="http://ecommerce.resurs.com/v4/ConfigurationWebService/changePasswordRequest"/><con:wsrmConfig version="1.2"/></con:call></con:operation><con:operation isOneWay="false" action="" name="registerEventCallback" bindingOperationName="registerEventCallback" type="Request-Response" inputName="" receivesAttachments="false" sendsAttachments="false" anonymous="optional"><con:settings/><con:call name="Request 1"><con:settings/><con:encoding>UTF-8</con:encoding><con:endpoint>https://test.resurs.com/ecommerce-test/ws/V4/ConfigurationService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:con="http://ecommerce.resurs.com/v4/msg/configure">
   <soapenv:Header/>
   <soapenv:Body>
      <con1:registerEventCallback xmlns:con1="http://ecommerce.resurs.com/v4/msg/configuration">
         <!--type: id-->
         <eventType>?</eventType>
         <!--type: nonEmptyString-->
         <uriTemplate>?</uriTemplate>
         <!--Optional:-->
         <!--type: nonEmptyString-->
         <basicAuthUserName>?</basicAuthUserName>
         <!--Optional:-->
         <!--type: nonEmptyString-->
         <basicAuthPassword>?</basicAuthPassword>
         <!--Optional:-->
         <digestConfiguration>
            <!--type: digestAlgorithm - enumeration: [MD5,SHA1]-->
            <digestAlgorithm>?</digestAlgorithm>
            <!--1 or more repetitions:-->
            <!--type: string-->
            <digestParameters>?</digestParameters>
            <!--Optional:-->
            <!--type: string-->
            <digestSalt>?</digestSalt>
         </digestConfiguration>
      </con1:registerEventCallback>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508" action="http://ecommerce.resurs.com/v4/ConfigureWebService/registerEventCallbackRequest"/><con:wsrmConfig version="1.2"/></con:call></con:operation><con:operation isOneWay="false" action="" name="removePassword" bindingOperationName="removePassword" type="Request-Response" inputName="" receivesAttachments="false" sendsAttachments="false" anonymous="optional"><con:settings/><con:call name="Request 1"><con:settings/><con:encoding>UTF-8</con:encoding><con:endpoint>https://test.resurs.com/ecommerce-test/ws/V4/ConfigurationService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:con="http://ecommerce.resurs.com/v4/msg/configuration">
   <soapenv:Header/>
   <soapenv:Body>
      <con:removePassword>
         <!--type: id-->
         <identifier>gero et</identifier>
      </con:removePassword>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508" action="http://ecommerce.resurs.com/v4/ConfigurationWebService/removePasswordRequest"/><con:wsrmConfig version="1.2"/></con:call></con:operation><con:operation isOneWay="false" action="" name="unregisterEventCallback" bindingOperationName="unregisterEventCallback" type="Request-Response" inputName="" receivesAttachments="false" sendsAttachments="false" anonymous="optional"><con:settings/><con:call name="Request 1"><con:settings/><con:encoding>UTF-8</con:encoding><con:endpoint>https://test.resurs.com/ecommerce-test/ws/V4/ConfigurationService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:con="http://ecommerce.resurs.com/v4/msg/configure">
   <soapenv:Header/>
   <soapenv:Body>
      <con1:unregisterEventCallback xmlns:con1="http://ecommerce.resurs.com/v4/msg/configuration">
         <!--type: id-->
         <eventType>?</eventType>
      </con1:unregisterEventCallback>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:wsaConfig mustUnderstand="NONE" version="200508" action="http://ecommerce.resurs.com/v4/ConfigureWebService/unregisterEventCallbackRequest"/></con:call></con:operation><con:operation isOneWay="false" action="" name="peekInvoiceSequence" bindingOperationName="peekInvoiceSequence" type="Request-Response" inputName="" receivesAttachments="false" sendsAttachments="false" anonymous="optional"><con:settings/><con:call name="Request 1"><con:settings/><con:encoding>UTF-8</con:encoding><con:endpoint>https://test.resurs.com/ecommerce-test/ws/V4/ConfigurationService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:con="http://ecommerce.resurs.com/v4/msg/configuration">
   <soapenv:Header/>
   <soapenv:Body>
      <con:peekInvoiceSequence/>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:wsaConfig mustUnderstand="NONE" version="200508" action="http://ecommerce.resurs.com/v4/ConfigurationWebService/peekInvoiceSequenceRequest"/></con:call></con:operation><con:operation isOneWay="false" action="" name="setInvoiceSequence" bindingOperationName="setInvoiceSequence" type="Request-Response" inputName="" receivesAttachments="false" sendsAttachments="false" anonymous="optional"><con:settings/><con:call name="Request 1"><con:settings/><con:encoding>UTF-8</con:encoding><con:endpoint>https://test.resurs.com/ecommerce-test/ws/V4/ConfigurationService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:con="http://ecommerce.resurs.com/v4/msg/configuration">
   <soapenv:Header/>
   <soapenv:Body>
      <con:setInvoiceSequence>
         <!--Optional:-->
         <!--type: integer-->
         <nextInvoiceNumber>100</nextInvoiceNumber>
      </con:setInvoiceSequence>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:wsaConfig mustUnderstand="NONE" version="200508" action="http://ecommerce.resurs.com/v4/ConfigurationWebService/setInvoiceSequenceRequest"/></con:call></con:operation><con:operation isOneWay="false" action="" name="setInvoiceData" bindingOperationName="setInvoiceData" type="Request-Response" inputName="" receivesAttachments="false" sendsAttachments="false" anonymous="optional"><con:settings/><con:call name="Request 1"><con:settings/><con:encoding>UTF-8</con:encoding><con:endpoint>https://test.resurs.com/ecommerce-test/ws/V4/ConfigurationService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:con="http://ecommerce.resurs.com/v4/msg/configuration">
   <soapenv:Header/>
   <soapenv:Body>
      <con:setInvoiceData>
         <invoiceData>
            <name>?</name>
            <street>?</street>
            <zipcode>?</zipcode>
            <city>?</city>
            <country>?</country>
            <phone>?</phone>
            <!--Optional:-->
            <fax>?</fax>
            <email>?</email>
            <homepage>?</homepage>
            <vatreg>?</vatreg>
            <orgnr>?</orgnr>
            <companytaxnote>true</companytaxnote>
            <logotype>cid:269641065781</logotype>
            <modifiedby>?</modifiedby>
         </invoiceData>
      </con:setInvoiceData>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:wsaConfig mustUnderstand="NONE" version="200508" action="http://ecommerce.resurs.com/v4/ConfigurationWebService/setInvoiceDataRequest"/></con:call></con:operation><con:operation isOneWay="false" action="" name="getInvoiceData" bindingOperationName="getInvoiceData" type="Request-Response" inputName="" receivesAttachments="false" sendsAttachments="false" anonymous="optional"><con:settings/><con:call name="Request 1"><con:settings/><con:encoding>UTF-8</con:encoding><con:endpoint>https://test.resurs.com/ecommerce-test/ws/V4/ConfigurationService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:con="http://ecommerce.resurs.com/v4/msg/configuration">
   <soapenv:Header/>
   <soapenv:Body>
      <con:getInvoiceData/>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:wsaConfig mustUnderstand="NONE" version="200508" action="http://ecommerce.resurs.com/v4/ConfigurationWebService/getInvoiceDataRequest"/></con:call></con:operation></con:interface><con:testSuite name="Search"><con:description>Search related test cases.

Please note that these need to be *very* early in the process, or there may be more payments
in the list that is searched.</con:description><con:settings/><con:runType>SEQUENTIAL</con:runType><con:testCase failOnError="true" failTestCaseOnErrors="true" keepSession="false" maxResults="0" name="Get Number of Results" searchProperties="true" id="fed30bf9-80b3-4524-bc1a-d52ffd45723f"><con:settings/><con:testStep type="request" name="Get Number of Results"><con:settings/><con:config xsi:type="con:RequestStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:interface>AfterShopFlowWebServiceImplPortBinding</con:interface><con:operation>calculateResultSize</con:operation><con:request name="Get Number of Results"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:encoding>UTF-8</con:encoding><con:endpoint>${#Project#ServiceEndpoint}/AfterShopFlowService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:aft="http://ecommerce.resurs.com/v4/msg/aftershopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <aft:calculateResultSize>
         <searchCriteria>
            <amountFrom>1050.00</amountFrom>
         </searchCriteria>
      </aft:calculateResultSize>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:assertion type="SOAP Response"/><con:assertion type="Schema Compliance"><con:configuration/></con:assertion><con:assertion type="SOAP Fault Assertion"/><con:assertion type="Simple Contains" name="No of Results OK"><con:configuration><token>&lt;return>43&lt;/return></token><ignoreCase>false</ignoreCase><useRegEx>false</useRegEx></con:configuration></con:assertion><con:credentials><con:username>${#Project#BasicAuthUser}</con:username><con:password>${#Project#BasicAuthPass}</con:password><con:domain/><con:selectedAuthProfile>No Authorization</con:selectedAuthProfile><con:authType>No Authorization</con:authType></con:credentials><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508"/><con:wsrmConfig version="1.2"/></con:request></con:config></con:testStep><con:testStep type="request" name="Get Number of Results (All)"><con:settings/><con:config xsi:type="con:RequestStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:interface>AfterShopFlowWebServiceImplPortBinding</con:interface><con:operation>calculateResultSize</con:operation><con:request name="Get Number of Results (All)"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:encoding>UTF-8</con:encoding><con:endpoint>${#Project#ServiceEndpoint}/AfterShopFlowService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:aft="http://ecommerce.resurs.com/v4/msg/aftershopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <aft:calculateResultSize>
         <searchCriteria>
         </searchCriteria>
      </aft:calculateResultSize>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:assertion type="SOAP Response"/><con:assertion type="Schema Compliance"><con:configuration/></con:assertion><con:assertion type="SOAP Fault Assertion"/><con:credentials><con:username>${#Project#BasicAuthUser}</con:username><con:password>${#Project#BasicAuthPass}</con:password><con:domain/><con:authType>No Authorization</con:authType></con:credentials><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508"/><con:wsrmConfig version="1.2"/></con:request></con:config></con:testStep><con:testStep type="request" name="Get Number of Results (None)"><con:settings/><con:config xsi:type="con:RequestStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:interface>AfterShopFlowWebServiceImplPortBinding</con:interface><con:operation>calculateResultSize</con:operation><con:request name="Get Number of Results (None)"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:encoding>UTF-8</con:encoding><con:endpoint>${#Project#ServiceEndpoint}/AfterShopFlowService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:aft="http://ecommerce.resurs.com/v4/msg/aftershopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <aft:calculateResultSize>
         <searchCriteria>
            <amountTo>10.00</amountTo>
         </searchCriteria>
      </aft:calculateResultSize>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:assertion type="SOAP Response"/><con:assertion type="Schema Compliance"><con:configuration/></con:assertion><con:assertion type="SOAP Fault Assertion"/><con:credentials><con:username>${#Project#BasicAuthUser}</con:username><con:password>${#Project#BasicAuthPass}</con:password><con:domain/><con:authType>No Authorization</con:authType></con:credentials><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508"/><con:wsrmConfig version="1.2"/></con:request></con:config></con:testStep><con:properties><con:property><con:name>ActualPaymentID</con:name><con:value>Sess-1343660762300-4038</con:value></con:property><con:property><con:name>SigningURL</con:name><con:value>http://dummy.esign.pte.loc/sign.html?signId=bfad2f5f-abbd-4a10-95ce-e34bd7d6b5ed&amp;lang=sv</con:value></con:property><con:property><con:name>SignID</con:name><con:value>http://dummy.esign.pte.loc/sign.html?signId=8a4bce96-d6ad-45d8-beb2-d1c84d32ceb3&amp;lang=sv</con:value></con:property><con:property><con:name>StatusChangeURL</con:name><con:value>http://dummy.esign.pte.loc/changeResult.html?signId=bfad2f5f-abbd-4a10-95ce-e34bd7d6b5ed&amp;lang=sv&amp;success=true</con:value></con:property></con:properties></con:testCase><con:testCase failOnError="true" failTestCaseOnErrors="true" keepSession="false" maxResults="0" name="Basic Search" searchProperties="true" id="382ac435-a240-4871-8afb-f8445ceafd38"><con:settings/><con:testStep type="request" name="Search with Any Id (External Id)"><con:settings/><con:config xsi:type="con:RequestStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:interface>AfterShopFlowWebServiceImplPortBinding</con:interface><con:operation>findPayments</con:operation><con:request name="Search with Any Id (External Id)"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:encoding>UTF-8</con:encoding><con:endpoint>${#Project#ServiceEndpoint}/AfterShopFlowService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:aft="http://ecommerce.resurs.com/v4/msg/aftershopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <aft:findPayments>
         <searchCriteria>
            <anyId>Pay</anyId>
         </searchCriteria>
      </aft:findPayments>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:assertion type="SOAP Response"/><con:assertion type="Schema Compliance"><con:configuration/></con:assertion><con:assertion type="SOAP Fault Assertion"/><con:assertion type="XQuery Match" name="XQuery Match"><con:configuration/></con:assertion><con:credentials><con:username>${#Project#BasicAuthUser}</con:username><con:password>${#Project#BasicAuthPass}</con:password><con:domain/><con:authType>No Authorization</con:authType></con:credentials><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508"/><con:wsrmConfig version="1.2"/></con:request></con:config></con:testStep><con:testStep type="request" name="Search with Any Id (Invoice Number)"><con:settings/><con:config xsi:type="con:RequestStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:interface>AfterShopFlowWebServiceImplPortBinding</con:interface><con:operation>findPayments</con:operation><con:request name="Search with Any Id (Invoice Number)"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:encoding>UTF-8</con:encoding><con:endpoint>${#Project#ServiceEndpoint}/AfterShopFlowService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:aft="http://ecommerce.resurs.com/v4/msg/aftershopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <aft:findPayments>
         <searchCriteria>
            <anyId>CrN-1417511588110-9688</anyId>
         </searchCriteria>
      </aft:findPayments>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:assertion type="SOAP Response"/><con:assertion type="Schema Compliance"><con:configuration/></con:assertion><con:assertion type="SOAP Fault Assertion"/><con:credentials><con:username>${#Project#BasicAuthUser}</con:username><con:password>${#Project#BasicAuthPass}</con:password><con:domain/><con:authType>No Authorization</con:authType></con:credentials><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508"/><con:wsrmConfig version="1.2"/></con:request></con:config></con:testStep><con:testStep type="request" name="Search with Any Id (Multiple)"><con:settings/><con:config xsi:type="con:RequestStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:interface>AfterShopFlowWebServiceImplPortBinding</con:interface><con:operation>findPayments</con:operation><con:request name="Search with Any Id (Multiple)"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:encoding>UTF-8</con:encoding><con:endpoint>${#Project#ServiceEndpoint}/AfterShopFlowService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:aft="http://ecommerce.resurs.com/v4/msg/aftershopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <aft:findPayments>
         <searchCriteria>
            <anyId>Ugly</anyId>
         </searchCriteria>
      </aft:findPayments>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:assertion type="SOAP Response"/><con:assertion type="Schema Compliance"><con:configuration/></con:assertion><con:assertion type="SOAP Fault Assertion"/><con:credentials><con:username>${#Project#BasicAuthUser}</con:username><con:password>${#Project#BasicAuthPass}</con:password><con:domain/><con:authType>No Authorization</con:authType></con:credentials><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508"/><con:wsrmConfig version="1.2"/></con:request></con:config></con:testStep><con:testStep type="request" name="Search with Representative Id (i.e. all)"><con:settings/><con:config xsi:type="con:RequestStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:interface>AfterShopFlowWebServiceImplPortBinding</con:interface><con:operation>findPayments</con:operation><con:request name="Search with Representative Id (i.e. all)"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:encoding>UTF-8</con:encoding><con:endpoint>${#Project#ServiceEndpoint}/AfterShopFlowService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:aft="http://ecommerce.resurs.com/v4/msg/aftershopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <aft:findPayments>
         <searchCriteria>
         </searchCriteria>
      </aft:findPayments>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:assertion type="SOAP Response"/><con:assertion type="Schema Compliance"><con:configuration/></con:assertion><con:assertion type="SOAP Fault Assertion"/><con:credentials><con:username>${#Project#BasicAuthUser}</con:username><con:password>${#Project#BasicAuthPass}</con:password><con:domain/><con:authType>No Authorization</con:authType></con:credentials><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508"/><con:wsrmConfig version="1.2"/></con:request></con:config></con:testStep><con:testStep type="request" name="Search with Payment Method Id"><con:settings/><con:config xsi:type="con:RequestStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:interface>AfterShopFlowWebServiceImplPortBinding</con:interface><con:operation>findPayments</con:operation><con:request name="Search with Payment Method Id"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:encoding>UTF-8</con:encoding><con:endpoint>${#Project#ServiceEndpoint}/AfterShopFlowService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:aft="http://ecommerce.resurs.com/v4/msg/aftershopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <aft:findPayments>
         <searchCriteria>
            <paymentMethodId>8</paymentMethodId>
         </searchCriteria>
      </aft:findPayments>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:assertion type="SOAP Response"/><con:assertion type="Schema Compliance"><con:configuration/></con:assertion><con:assertion type="SOAP Fault Assertion"/><con:credentials><con:username>${#Project#BasicAuthUser}</con:username><con:password>${#Project#BasicAuthPass}</con:password><con:domain/><con:authType>No Authorization</con:authType></con:credentials><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508"/><con:wsrmConfig version="1.2"/></con:request></con:config></con:testStep><con:testStep type="request" name="Search with Government Id"><con:settings/><con:config xsi:type="con:RequestStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:interface>AfterShopFlowWebServiceImplPortBinding</con:interface><con:operation>findPayments</con:operation><con:request name="Search with Government Id"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:encoding>UTF-8</con:encoding><con:endpoint>${#Project#ServiceEndpoint}/AfterShopFlowService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:aft="http://ecommerce.resurs.com/v4/msg/aftershopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <aft:findPayments>
         <searchCriteria>
            <governmentId>010101-1010</governmentId>
         </searchCriteria>
      </aft:findPayments>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:assertion type="SOAP Response"/><con:assertion type="Schema Compliance"><con:configuration/></con:assertion><con:assertion type="SOAP Fault Assertion"/><con:assertion type="XPath Match" name="Name #1 is OK" disabled="true"><con:configuration><path>declare namespace ns2='http://ecommerce.resurs.com/v4/msg/exception';
declare namespace soap='http://schemas.xmlsoap.org/soap/envelope/';
declare namespace ns3='http://ecommerce.resurs.com/v4/msg/aftershopflow';
/soap:Envelope/soap:Body/ns3:findPaymentsResponse/return[1]/fullName/text()</path><content>Adam Adamski</content><allowWildcards>false</allowWildcards><ignoreNamspaceDifferences>false</ignoreNamspaceDifferences><ignoreComments>false</ignoreComments></con:configuration></con:assertion><con:assertion type="XPath Match" name="Name #2 is OK" disabled="true"><con:configuration><path>declare namespace ns2='http://ecommerce.resurs.com/v4/msg/exception';
declare namespace soap='http://schemas.xmlsoap.org/soap/envelope/';
declare namespace ns3='http://ecommerce.resurs.com/v4/msg/aftershopflow';
/soap:Envelope/soap:Body/ns3:findPaymentsResponse/return[2]/fullName/text()</path><content>Adam Adamski</content><allowWildcards>false</allowWildcards><ignoreNamspaceDifferences>false</ignoreNamspaceDifferences><ignoreComments>false</ignoreComments></con:configuration></con:assertion><con:credentials><con:username>${#Project#BasicAuthUser}</con:username><con:password>${#Project#BasicAuthPass}</con:password><con:domain/><con:authType>No Authorization</con:authType></con:credentials><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508"/><con:wsrmConfig version="1.2"/></con:request></con:config></con:testStep><con:testStep type="request" name="Search with Name"><con:settings/><con:config xsi:type="con:RequestStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:interface>AfterShopFlowWebServiceImplPortBinding</con:interface><con:operation>findPayments</con:operation><con:request name="Search with Name"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:encoding>UTF-8</con:encoding><con:endpoint>${#Project#ServiceEndpoint}/AfterShopFlowService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:aft="http://ecommerce.resurs.com/v4/msg/aftershopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <aft:findPayments>
         <searchCriteria>
            <customerName>Asgeirsen Asgeir</customerName>
         </searchCriteria>
      </aft:findPayments>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:assertion type="SOAP Response"/><con:assertion type="Schema Compliance"><con:configuration/></con:assertion><con:assertion type="SOAP Fault Assertion"/><con:credentials><con:username>${#Project#BasicAuthUser}</con:username><con:password>${#Project#BasicAuthPass}</con:password><con:domain/><con:authType>No Authorization</con:authType></con:credentials><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508"/><con:wsrmConfig version="1.2"/></con:request></con:config></con:testStep><con:testStep type="request" name="Search with Booking Time (Between)"><con:settings/><con:config xsi:type="con:RequestStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:interface>AfterShopFlowWebServiceImplPortBinding</con:interface><con:operation>findPayments</con:operation><con:request name="Search with Booking Time (Between)"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:encoding>UTF-8</con:encoding><con:endpoint>${#Project#ServiceEndpoint}/AfterShopFlowService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:aft="http://ecommerce.resurs.com/v4/msg/aftershopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <aft:findPayments>
         <searchCriteria>
            <bookedFrom>2010-03-15T00:00:00+01:00</bookedFrom>
            <bookedTo>2010-12-15T12:00:00+01:00</bookedTo>
         </searchCriteria>
      </aft:findPayments>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:assertion type="SOAP Response"/><con:assertion type="Schema Compliance"><con:configuration/></con:assertion><con:assertion type="SOAP Fault Assertion"/><con:credentials><con:username>${#Project#BasicAuthUser}</con:username><con:password>${#Project#BasicAuthPass}</con:password><con:domain/><con:authType>No Authorization</con:authType></con:credentials><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508"/><con:wsrmConfig version="1.2"/></con:request></con:config></con:testStep><con:testStep type="request" name="Search with Booking Time (From)"><con:settings/><con:config xsi:type="con:RequestStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:interface>AfterShopFlowWebServiceImplPortBinding</con:interface><con:operation>findPayments</con:operation><con:request name="Search with Booking Time (From)"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:encoding>UTF-8</con:encoding><con:endpoint>${#Project#ServiceEndpoint}/AfterShopFlowService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:aft="http://ecommerce.resurs.com/v4/msg/aftershopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <aft:findPayments>
         <searchCriteria>
            <bookedFrom>2010-03-15T00:00:00+01:00</bookedFrom>
         </searchCriteria>
      </aft:findPayments>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:assertion type="SOAP Response"/><con:assertion type="Schema Compliance"><con:configuration/></con:assertion><con:assertion type="SOAP Fault Assertion"/><con:credentials><con:username>${#Project#BasicAuthUser}</con:username><con:password>${#Project#BasicAuthPass}</con:password><con:domain/><con:authType>No Authorization</con:authType></con:credentials><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508"/><con:wsrmConfig version="1.2"/></con:request></con:config></con:testStep><con:testStep type="request" name="Search with Booking Time (To)"><con:settings/><con:config xsi:type="con:RequestStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:interface>AfterShopFlowWebServiceImplPortBinding</con:interface><con:operation>findPayments</con:operation><con:request name="Search with Booking Time (To)"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:encoding>UTF-8</con:encoding><con:endpoint>${#Project#ServiceEndpoint}/AfterShopFlowService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:aft="http://ecommerce.resurs.com/v4/msg/aftershopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <aft:findPayments>
         <searchCriteria>
            <bookedTo>2010-12-15T12:00:00+01:00</bookedTo>
         </searchCriteria>
      </aft:findPayments>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:assertion type="SOAP Response"/><con:assertion type="Schema Compliance"><con:configuration/></con:assertion><con:assertion type="SOAP Fault Assertion"/><con:credentials><con:username>${#Project#BasicAuthUser}</con:username><con:password>${#Project#BasicAuthPass}</con:password><con:domain/><con:authType>No Authorization</con:authType></con:credentials><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508"/><con:wsrmConfig version="1.2"/></con:request></con:config></con:testStep><con:testStep type="request" name="Search with Modification Time (Between)"><con:settings/><con:config xsi:type="con:RequestStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:interface>AfterShopFlowWebServiceImplPortBinding</con:interface><con:operation>findPayments</con:operation><con:request name="Search with Modification Time (Between)"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:encoding>UTF-8</con:encoding><con:endpoint>${#Project#ServiceEndpoint}/AfterShopFlowService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:aft="http://ecommerce.resurs.com/v4/msg/aftershopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <aft:findPayments>
         <searchCriteria>
            <modifiedFrom>2010-03-15T00:00:00+01:00</modifiedFrom>
            <modifiedTo>2010-12-15T12:00:00+01:00</modifiedTo>
         </searchCriteria>
      </aft:findPayments>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:assertion type="SOAP Response"/><con:assertion type="Schema Compliance"><con:configuration/></con:assertion><con:assertion type="SOAP Fault Assertion"/><con:credentials><con:username>${#Project#BasicAuthUser}</con:username><con:password>${#Project#BasicAuthPass}</con:password><con:domain/><con:authType>No Authorization</con:authType></con:credentials><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508"/><con:wsrmConfig version="1.2"/></con:request></con:config></con:testStep><con:testStep type="request" name="Search with Modification Time (From)"><con:settings/><con:config xsi:type="con:RequestStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:interface>AfterShopFlowWebServiceImplPortBinding</con:interface><con:operation>findPayments</con:operation><con:request name="Search with Modification Time (From)"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:encoding>UTF-8</con:encoding><con:endpoint>${#Project#ServiceEndpoint}/AfterShopFlowService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:aft="http://ecommerce.resurs.com/v4/msg/aftershopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <aft:findPayments>
         <searchCriteria>
            <modifiedFrom>2010-03-15T00:00:00+01:00</modifiedFrom>
         </searchCriteria>
      </aft:findPayments>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:assertion type="SOAP Response"/><con:assertion type="Schema Compliance"><con:configuration/></con:assertion><con:assertion type="SOAP Fault Assertion"/><con:credentials><con:username>${#Project#BasicAuthUser}</con:username><con:password>${#Project#BasicAuthPass}</con:password><con:domain/><con:authType>No Authorization</con:authType></con:credentials><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508"/><con:wsrmConfig version="1.2"/></con:request></con:config></con:testStep><con:testStep type="request" name="Search with Modification Time (To)"><con:settings/><con:config xsi:type="con:RequestStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:interface>AfterShopFlowWebServiceImplPortBinding</con:interface><con:operation>findPayments</con:operation><con:request name="Search with Modification Time (To)"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:encoding>UTF-8</con:encoding><con:endpoint>${#Project#ServiceEndpoint}/AfterShopFlowService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:aft="http://ecommerce.resurs.com/v4/msg/aftershopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <aft:findPayments>
         <searchCriteria>
            <modifiedTo>2010-12-15T12:00:00+01:00</modifiedTo>
         </searchCriteria>
      </aft:findPayments>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:assertion type="SOAP Response"/><con:assertion type="Schema Compliance"><con:configuration/></con:assertion><con:assertion type="SOAP Fault Assertion"/><con:credentials><con:username>${#Project#BasicAuthUser}</con:username><con:password>${#Project#BasicAuthPass}</con:password><con:domain/><con:authType>No Authorization</con:authType></con:credentials><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508"/><con:wsrmConfig version="1.2"/></con:request></con:config></con:testStep><con:testStep type="request" name="Search with Finalization Time (Between)"><con:settings/><con:config xsi:type="con:RequestStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:interface>AfterShopFlowWebServiceImplPortBinding</con:interface><con:operation>findPayments</con:operation><con:request name="Search with Finalization Time (Between)"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:encoding>UTF-8</con:encoding><con:endpoint>${#Project#ServiceEndpoint}/AfterShopFlowService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:aft="http://ecommerce.resurs.com/v4/msg/aftershopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <aft:findPayments>
         <searchCriteria>
            <finalizedFrom>2010-03-15T00:00:00+01:00</finalizedFrom>
            <finalizedTo>2010-12-15T12:00:00+01:00</finalizedTo>
         </searchCriteria>
      </aft:findPayments>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:assertion type="SOAP Response"/><con:assertion type="Schema Compliance"><con:configuration/></con:assertion><con:assertion type="SOAP Fault Assertion"/><con:credentials><con:username>${#Project#BasicAuthUser}</con:username><con:password>${#Project#BasicAuthPass}</con:password><con:domain/><con:authType>No Authorization</con:authType></con:credentials><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508"/><con:wsrmConfig version="1.2"/></con:request></con:config></con:testStep><con:testStep type="request" name="Search with Finalization Time (From)"><con:settings/><con:config xsi:type="con:RequestStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:interface>AfterShopFlowWebServiceImplPortBinding</con:interface><con:operation>findPayments</con:operation><con:request name="Search with Finalization Time (From)"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:encoding>UTF-8</con:encoding><con:endpoint>${#Project#ServiceEndpoint}/AfterShopFlowService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:aft="http://ecommerce.resurs.com/v4/msg/aftershopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <aft:findPayments>
         <searchCriteria>
            <finalizedFrom>2010-03-15T00:00:00+01:00</finalizedFrom>
         </searchCriteria>
      </aft:findPayments>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:assertion type="SOAP Response"/><con:assertion type="Schema Compliance"><con:configuration/></con:assertion><con:assertion type="SOAP Fault Assertion"/><con:credentials><con:username>${#Project#BasicAuthUser}</con:username><con:password>${#Project#BasicAuthPass}</con:password><con:domain/><con:authType>No Authorization</con:authType></con:credentials><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508"/><con:wsrmConfig version="1.2"/></con:request></con:config></con:testStep><con:testStep type="request" name="Search with Finalization Time (To)"><con:settings/><con:config xsi:type="con:RequestStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:interface>AfterShopFlowWebServiceImplPortBinding</con:interface><con:operation>findPayments</con:operation><con:request name="Search with Finalization Time (To)"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:encoding>UTF-8</con:encoding><con:endpoint>${#Project#ServiceEndpoint}/AfterShopFlowService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:aft="http://ecommerce.resurs.com/v4/msg/aftershopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <aft:findPayments>
         <searchCriteria>
            <finalizedTo>2010-12-15T12:00:00+01:00</finalizedTo>
         </searchCriteria>
      </aft:findPayments>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:assertion type="SOAP Response"/><con:assertion type="Schema Compliance"><con:configuration/></con:assertion><con:assertion type="SOAP Fault Assertion"/><con:credentials><con:username>${#Project#BasicAuthUser}</con:username><con:password>${#Project#BasicAuthPass}</con:password><con:domain/><con:authType>No Authorization</con:authType></con:credentials><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508"/><con:wsrmConfig version="1.2"/></con:request></con:config></con:testStep><con:testStep type="request" name="Search with Amount Time (Between)"><con:settings/><con:config xsi:type="con:RequestStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:interface>AfterShopFlowWebServiceImplPortBinding</con:interface><con:operation>findPayments</con:operation><con:request name="Search with Amount Time (Between)"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:encoding>UTF-8</con:encoding><con:endpoint>${#Project#ServiceEndpoint}/AfterShopFlowService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:aft="http://ecommerce.resurs.com/v4/msg/aftershopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <aft:findPayments>
         <searchCriteria>
            <amountFrom>450</amountFrom>
            <amountTo>950</amountTo>
         </searchCriteria>
      </aft:findPayments>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:assertion type="SOAP Response"/><con:assertion type="Schema Compliance"><con:configuration/></con:assertion><con:assertion type="SOAP Fault Assertion"/><con:credentials><con:username>${#Project#BasicAuthUser}</con:username><con:password>${#Project#BasicAuthPass}</con:password><con:domain/><con:authType>No Authorization</con:authType></con:credentials><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508"/><con:wsrmConfig version="1.2"/></con:request></con:config></con:testStep><con:testStep type="request" name="Search with Amount Time (From)"><con:settings/><con:config xsi:type="con:RequestStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:interface>AfterShopFlowWebServiceImplPortBinding</con:interface><con:operation>findPayments</con:operation><con:request name="Search with Amount Time (From)"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:encoding>UTF-8</con:encoding><con:endpoint>${#Project#ServiceEndpoint}/AfterShopFlowService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:aft="http://ecommerce.resurs.com/v4/msg/aftershopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <aft:findPayments>
         <searchCriteria>
            <amountFrom>450</amountFrom>
         </searchCriteria>
      </aft:findPayments>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:assertion type="SOAP Response"/><con:assertion type="Schema Compliance"><con:configuration/></con:assertion><con:assertion type="SOAP Fault Assertion"/><con:credentials><con:username>${#Project#BasicAuthUser}</con:username><con:password>${#Project#BasicAuthPass}</con:password><con:domain/><con:authType>No Authorization</con:authType></con:credentials><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508"/><con:wsrmConfig version="1.2"/></con:request></con:config></con:testStep><con:testStep type="request" name="Search with Amount Time (To)"><con:settings/><con:config xsi:type="con:RequestStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:interface>AfterShopFlowWebServiceImplPortBinding</con:interface><con:operation>findPayments</con:operation><con:request name="Search with Amount Time (To)"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:encoding>UTF-8</con:encoding><con:endpoint>${#Project#ServiceEndpoint}/AfterShopFlowService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:aft="http://ecommerce.resurs.com/v4/msg/aftershopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <aft:findPayments>
         <searchCriteria>
            <amountTo>950</amountTo>
         </searchCriteria>
      </aft:findPayments>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:assertion type="SOAP Response"/><con:assertion type="Schema Compliance"><con:configuration/></con:assertion><con:assertion type="SOAP Fault Assertion"/><con:credentials><con:username>${#Project#BasicAuthUser}</con:username><con:password>${#Project#BasicAuthPass}</con:password><con:domain/><con:authType>No Authorization</con:authType></con:credentials><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508"/><con:wsrmConfig version="1.2"/></con:request></con:config></con:testStep><con:testStep type="request" name="Search with Freeze Status True"><con:settings/><con:config xsi:type="con:RequestStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:interface>AfterShopFlowWebServiceImplPortBinding</con:interface><con:operation>findPayments</con:operation><con:request name="Search with Freeze Status True"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:encoding>UTF-8</con:encoding><con:endpoint>${#Project#ServiceEndpoint}/AfterShopFlowService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:aft="http://ecommerce.resurs.com/v4/msg/aftershopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <aft:findPayments>
         <searchCriteria>
            <frozen>true</frozen>
         </searchCriteria>
      </aft:findPayments>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:assertion type="SOAP Response"/><con:assertion type="Schema Compliance"><con:configuration/></con:assertion><con:assertion type="SOAP Fault Assertion"/><con:credentials><con:username>${#Project#BasicAuthUser}</con:username><con:password>${#Project#BasicAuthPass}</con:password><con:domain/><con:authType>No Authorization</con:authType></con:credentials><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508"/><con:wsrmConfig version="1.2"/></con:request></con:config></con:testStep><con:testStep type="request" name="Search with Freeze Status False"><con:settings/><con:config xsi:type="con:RequestStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:interface>AfterShopFlowWebServiceImplPortBinding</con:interface><con:operation>findPayments</con:operation><con:request name="Search with Freeze Status False"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:encoding>UTF-8</con:encoding><con:endpoint>${#Project#ServiceEndpoint}/AfterShopFlowService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:aft="http://ecommerce.resurs.com/v4/msg/aftershopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <aft:findPayments>
         <searchCriteria>
            <frozen>false</frozen>
         </searchCriteria>
      </aft:findPayments>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:assertion type="SOAP Response"/><con:assertion type="Schema Compliance"><con:configuration/></con:assertion><con:assertion type="SOAP Fault Assertion"/><con:credentials><con:username>${#Project#BasicAuthUser}</con:username><con:password>${#Project#BasicAuthPass}</con:password><con:domain/><con:authType>No Authorization</con:authType></con:credentials><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508"/><con:wsrmConfig version="1.2"/></con:request></con:config></con:testStep><con:testStep type="request" name="Search with Status Is Debitable True"><con:settings/><con:config xsi:type="con:RequestStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:interface>AfterShopFlowWebServiceImplPortBinding</con:interface><con:operation>findPayments</con:operation><con:request name="Search with Status Is Debitable True"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:encoding>UTF-8</con:encoding><con:endpoint>${#Project#ServiceEndpoint}/AfterShopFlowService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:aft="http://ecommerce.resurs.com/v4/msg/aftershopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <aft:findPayments>
         <searchCriteria>
            <statusSet>DEBITABLE</statusSet>
         </searchCriteria>
      </aft:findPayments>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:assertion type="SOAP Response"/><con:assertion type="Schema Compliance"><con:configuration/></con:assertion><con:assertion type="SOAP Fault Assertion"/><con:assertion type="XPath Match" name="First Match is the Expected"><con:configuration><path>declare namespace soap='http://schemas.xmlsoap.org/soap/envelope/';
declare namespace ns3='http://ecommerce.resurs.com/v4/msg/exception';
declare namespace ns2='http://ecommerce.resurs.com/v4/msg/aftershopflow';

/soap:Envelope/soap:Body/ns2:findPaymentsResponse/return[1]/paymentId/text()</path><content>ee42f1f7-5000-4d38-b91b-cc4ef4593d22</content><allowWildcards>false</allowWildcards><ignoreNamspaceDifferences>false</ignoreNamspaceDifferences><ignoreComments>false</ignoreComments></con:configuration></con:assertion><con:credentials><con:username>${#Project#BasicAuthUser}</con:username><con:password>${#Project#BasicAuthPass}</con:password><con:domain/><con:authType>No Authorization</con:authType></con:credentials><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508"/><con:wsrmConfig version="1.2"/></con:request></con:config></con:testStep><con:testStep type="request" name="Search with Status Is Debitable False"><con:settings/><con:config xsi:type="con:RequestStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:interface>AfterShopFlowWebServiceImplPortBinding</con:interface><con:operation>findPayments</con:operation><con:request name="Search with Status Is Debitable False"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:encoding>UTF-8</con:encoding><con:endpoint>${#Project#ServiceEndpoint}/AfterShopFlowService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:aft="http://ecommerce.resurs.com/v4/msg/aftershopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <aft:findPayments>
         <searchCriteria>
            <statusNotSet>DEBITABLE</statusNotSet>
         </searchCriteria>
      </aft:findPayments>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:assertion type="SOAP Response"/><con:assertion type="Schema Compliance"><con:configuration/></con:assertion><con:assertion type="SOAP Fault Assertion"/><con:assertion type="XPath Match" name="First Match is the Expected"><con:configuration><path>declare namespace soap='http://schemas.xmlsoap.org/soap/envelope/';
declare namespace ns3='http://ecommerce.resurs.com/v4/msg/exception';
declare namespace ns2='http://ecommerce.resurs.com/v4/msg/aftershopflow';

/soap:Envelope/soap:Body/ns2:findPaymentsResponse/return[1]/paymentId/text()</path><content>Pay-1417513205419-7785</content><allowWildcards>false</allowWildcards><ignoreNamspaceDifferences>false</ignoreNamspaceDifferences><ignoreComments>false</ignoreComments></con:configuration></con:assertion><con:credentials><con:username>${#Project#BasicAuthUser}</con:username><con:password>${#Project#BasicAuthPass}</con:password><con:domain/><con:authType>No Authorization</con:authType></con:credentials><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508"/><con:wsrmConfig version="1.2"/></con:request></con:config></con:testStep><con:testStep type="request" name="Search with Status Is Creditable True"><con:settings/><con:config xsi:type="con:RequestStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:interface>AfterShopFlowWebServiceImplPortBinding</con:interface><con:operation>findPayments</con:operation><con:request name="Search with Status Is Creditable True"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:encoding>UTF-8</con:encoding><con:endpoint>${#Project#ServiceEndpoint}/AfterShopFlowService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:aft="http://ecommerce.resurs.com/v4/msg/aftershopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <aft:findPayments>
         <searchCriteria>
            <statusSet>CREDITABLE</statusSet>
         </searchCriteria>
      </aft:findPayments>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:assertion type="SOAP Response"/><con:assertion type="Schema Compliance"><con:configuration/></con:assertion><con:assertion type="SOAP Fault Assertion"/><con:assertion type="XPath Match" name="First Match is the Expected"><con:configuration><path>declare namespace soap='http://schemas.xmlsoap.org/soap/envelope/';
declare namespace ns3='http://ecommerce.resurs.com/v4/msg/exception';
declare namespace ns2='http://ecommerce.resurs.com/v4/msg/aftershopflow';

/soap:Envelope/soap:Body/ns2:findPaymentsResponse/return[1]/paymentId/text()</path><content>Pay-1416324901563-869</content><allowWildcards>false</allowWildcards><ignoreNamspaceDifferences>false</ignoreNamspaceDifferences><ignoreComments>false</ignoreComments></con:configuration></con:assertion><con:credentials><con:username>${#Project#BasicAuthUser}</con:username><con:password>${#Project#BasicAuthPass}</con:password><con:domain/><con:authType>No Authorization</con:authType></con:credentials><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508"/><con:wsrmConfig version="1.2"/></con:request></con:config></con:testStep><con:testStep type="request" name="Search with Status Is Creditable False"><con:settings/><con:config xsi:type="con:RequestStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:interface>AfterShopFlowWebServiceImplPortBinding</con:interface><con:operation>findPayments</con:operation><con:request name="Search with Status Is Creditable False"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:encoding>UTF-8</con:encoding><con:endpoint>${#Project#ServiceEndpoint}/AfterShopFlowService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:aft="http://ecommerce.resurs.com/v4/msg/aftershopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <aft:findPayments>
         <searchCriteria>
            <statusNotSet>CREDITABLE</statusNotSet>
         </searchCriteria>
      </aft:findPayments>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:assertion type="SOAP Response"/><con:assertion type="Schema Compliance"><con:configuration/></con:assertion><con:assertion type="SOAP Fault Assertion"/><con:assertion type="XPath Match" name="First Match is the Expected"><con:configuration><path>declare namespace soap='http://schemas.xmlsoap.org/soap/envelope/';
declare namespace ns3='http://ecommerce.resurs.com/v4/msg/exception';
declare namespace ns2='http://ecommerce.resurs.com/v4/msg/aftershopflow';

/soap:Envelope/soap:Body/ns2:findPaymentsResponse/return[1]/paymentId/text()</path><content>Pay-1417513205419-7785</content><allowWildcards>false</allowWildcards><ignoreNamspaceDifferences>false</ignoreNamspaceDifferences><ignoreComments>false</ignoreComments></con:configuration></con:assertion><con:credentials><con:username>${#Project#BasicAuthUser}</con:username><con:password>${#Project#BasicAuthPass}</con:password><con:domain/><con:authType>No Authorization</con:authType></con:credentials><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508"/><con:wsrmConfig version="1.2"/></con:request></con:config></con:testStep><con:testStep type="request" name="Search with Status Is Debited True"><con:settings/><con:config xsi:type="con:RequestStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:interface>AfterShopFlowWebServiceImplPortBinding</con:interface><con:operation>findPayments</con:operation><con:request name="Search with Status Is Debited True"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:encoding>UTF-8</con:encoding><con:endpoint>${#Project#ServiceEndpoint}/AfterShopFlowService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:aft="http://ecommerce.resurs.com/v4/msg/aftershopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <aft:findPayments>
         <searchCriteria>
            <statusSet>IS_DEBITED</statusSet>
         </searchCriteria>
      </aft:findPayments>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:assertion type="SOAP Response"/><con:assertion type="Schema Compliance"><con:configuration/></con:assertion><con:assertion type="SOAP Fault Assertion"/><con:assertion type="XPath Match" name="First Match is the Expected"><con:configuration><path>declare namespace soap='http://schemas.xmlsoap.org/soap/envelope/';
declare namespace ns3='http://ecommerce.resurs.com/v4/msg/exception';
declare namespace ns2='http://ecommerce.resurs.com/v4/msg/aftershopflow';

/soap:Envelope/soap:Body/ns2:findPaymentsResponse/return[1]/paymentId/text()</path><content>Pay-1417513205419-7785</content><allowWildcards>false</allowWildcards><ignoreNamspaceDifferences>false</ignoreNamspaceDifferences><ignoreComments>false</ignoreComments></con:configuration></con:assertion><con:credentials><con:username>${#Project#BasicAuthUser}</con:username><con:password>${#Project#BasicAuthPass}</con:password><con:domain/><con:authType>No Authorization</con:authType></con:credentials><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508"/><con:wsrmConfig version="1.2"/></con:request></con:config></con:testStep><con:testStep type="request" name="Search with Status Is Debited False"><con:settings/><con:config xsi:type="con:RequestStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:interface>AfterShopFlowWebServiceImplPortBinding</con:interface><con:operation>findPayments</con:operation><con:request name="Search with Status Is Debited False"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:encoding>UTF-8</con:encoding><con:endpoint>${#Project#ServiceEndpoint}/AfterShopFlowService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:aft="http://ecommerce.resurs.com/v4/msg/aftershopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <aft:findPayments>
         <searchCriteria>
            <statusNotSet>IS_DEBITED</statusNotSet>
         </searchCriteria>
      </aft:findPayments>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:assertion type="SOAP Response"/><con:assertion type="Schema Compliance"><con:configuration/></con:assertion><con:assertion type="SOAP Fault Assertion"/><con:assertion type="XPath Match" name="First Match is the Expected"><con:configuration><path>declare namespace soap='http://schemas.xmlsoap.org/soap/envelope/';
declare namespace ns3='http://ecommerce.resurs.com/v4/msg/exception';
declare namespace ns2='http://ecommerce.resurs.com/v4/msg/aftershopflow';

/soap:Envelope/soap:Body/ns2:findPaymentsResponse/return[1]/paymentId/text()</path><content>ee42f1f7-5000-4d38-b91b-cc4ef4593d22</content><allowWildcards>false</allowWildcards><ignoreNamspaceDifferences>false</ignoreNamspaceDifferences><ignoreComments>false</ignoreComments></con:configuration></con:assertion><con:credentials><con:username>${#Project#BasicAuthUser}</con:username><con:password>${#Project#BasicAuthPass}</con:password><con:domain/><con:authType>No Authorization</con:authType></con:credentials><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508"/><con:wsrmConfig version="1.2"/></con:request></con:config></con:testStep><con:testStep type="request" name="Search with Status Is Credited True"><con:settings/><con:config xsi:type="con:RequestStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:interface>AfterShopFlowWebServiceImplPortBinding</con:interface><con:operation>findPayments</con:operation><con:request name="Search with Status Is Credited True"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:encoding>UTF-8</con:encoding><con:endpoint>${#Project#ServiceEndpoint}/AfterShopFlowService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:aft="http://ecommerce.resurs.com/v4/msg/aftershopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <aft:findPayments>
         <searchCriteria>
            <statusSet>IS_CREDITED</statusSet>
         </searchCriteria>
      </aft:findPayments>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:assertion type="SOAP Response"/><con:assertion type="Schema Compliance"><con:configuration/></con:assertion><con:assertion type="SOAP Fault Assertion"/><con:assertion type="XPath Match" name="First Match is the Expected"><con:configuration><path>declare namespace soap='http://schemas.xmlsoap.org/soap/envelope/';
declare namespace ns3='http://ecommerce.resurs.com/v4/msg/exception';
declare namespace ns2='http://ecommerce.resurs.com/v4/msg/aftershopflow';

/soap:Envelope/soap:Body/ns2:findPaymentsResponse/return[1]/paymentId/text()</path><content>Pay-1417513205419-7785</content><allowWildcards>false</allowWildcards><ignoreNamspaceDifferences>false</ignoreNamspaceDifferences><ignoreComments>false</ignoreComments></con:configuration></con:assertion><con:credentials><con:username>${#Project#BasicAuthUser}</con:username><con:password>${#Project#BasicAuthPass}</con:password><con:domain/><con:authType>No Authorization</con:authType></con:credentials><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508"/><con:wsrmConfig version="1.2"/></con:request></con:config></con:testStep><con:testStep type="request" name="Search with Status Is Credited False"><con:settings/><con:config xsi:type="con:RequestStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:interface>AfterShopFlowWebServiceImplPortBinding</con:interface><con:operation>findPayments</con:operation><con:request name="Search with Status Is Credited False"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:encoding>UTF-8</con:encoding><con:endpoint>${#Project#ServiceEndpoint}/AfterShopFlowService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:aft="http://ecommerce.resurs.com/v4/msg/aftershopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <aft:findPayments>
         <searchCriteria>
            <statusNotSet>IS_CREDITED</statusNotSet>
         </searchCriteria>
      </aft:findPayments>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:assertion type="SOAP Response"/><con:assertion type="Schema Compliance"><con:configuration/></con:assertion><con:assertion type="SOAP Fault Assertion"/><con:assertion type="XPath Match" name="First Match is the Expected"><con:configuration><path>declare namespace soap='http://schemas.xmlsoap.org/soap/envelope/';
declare namespace ns3='http://ecommerce.resurs.com/v4/msg/exception';
declare namespace ns2='http://ecommerce.resurs.com/v4/msg/aftershopflow';

/soap:Envelope/soap:Body/ns2:findPaymentsResponse/return[1]/paymentId/text()</path><content>ee42f1f7-5000-4d38-b91b-cc4ef4593d22</content><allowWildcards>false</allowWildcards><ignoreNamspaceDifferences>false</ignoreNamspaceDifferences><ignoreComments>false</ignoreComments></con:configuration></con:assertion><con:credentials><con:username>${#Project#BasicAuthUser}</con:username><con:password>${#Project#BasicAuthPass}</con:password><con:domain/><con:authType>No Authorization</con:authType></con:credentials><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508"/><con:wsrmConfig version="1.2"/></con:request></con:config></con:testStep><con:testStep type="request" name="Search with Status Is Annulled True"><con:settings/><con:config xsi:type="con:RequestStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:interface>AfterShopFlowWebServiceImplPortBinding</con:interface><con:operation>findPayments</con:operation><con:request name="Search with Status Is Annulled True"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:encoding>UTF-8</con:encoding><con:endpoint>${#Project#ServiceEndpoint}/AfterShopFlowService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:aft="http://ecommerce.resurs.com/v4/msg/aftershopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <aft:findPayments>
         <searchCriteria>
            <statusSet>IS_ANNULLED</statusSet>
         </searchCriteria>
      </aft:findPayments>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:assertion type="SOAP Response"/><con:assertion type="Schema Compliance"><con:configuration/></con:assertion><con:assertion type="SOAP Fault Assertion"/><con:assertion type="XPath Match" name="First Match is the Expected"><con:configuration><path>declare namespace soap='http://schemas.xmlsoap.org/soap/envelope/';
declare namespace ns3='http://ecommerce.resurs.com/v4/msg/exception';
declare namespace ns2='http://ecommerce.resurs.com/v4/msg/aftershopflow';

/soap:Envelope/soap:Body/ns2:findPaymentsResponse/return[1]/paymentId/text()</path><content>Sess-1417511605141-8607</content><allowWildcards>false</allowWildcards><ignoreNamspaceDifferences>false</ignoreNamspaceDifferences><ignoreComments>false</ignoreComments></con:configuration></con:assertion><con:credentials><con:username>${#Project#BasicAuthUser}</con:username><con:password>${#Project#BasicAuthPass}</con:password><con:domain/><con:authType>No Authorization</con:authType></con:credentials><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508"/><con:wsrmConfig version="1.2"/></con:request></con:config></con:testStep><con:testStep type="request" name="Search with Status Is Annulled False"><con:settings/><con:config xsi:type="con:RequestStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:interface>AfterShopFlowWebServiceImplPortBinding</con:interface><con:operation>findPayments</con:operation><con:request name="Search with Status Is Annulled False"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:encoding>UTF-8</con:encoding><con:endpoint>${#Project#ServiceEndpoint}/AfterShopFlowService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:aft="http://ecommerce.resurs.com/v4/msg/aftershopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <aft:findPayments>
         <searchCriteria>
            <statusNotSet>IS_ANNULLED</statusNotSet>
         </searchCriteria>
      </aft:findPayments>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:assertion type="SOAP Response"/><con:assertion type="Schema Compliance"><con:configuration/></con:assertion><con:assertion type="SOAP Fault Assertion"/><con:assertion type="XPath Match" name="First Match is the Expected"><con:configuration><path>declare namespace soap='http://schemas.xmlsoap.org/soap/envelope/';
declare namespace ns3='http://ecommerce.resurs.com/v4/msg/exception';
declare namespace ns2='http://ecommerce.resurs.com/v4/msg/aftershopflow';

/soap:Envelope/soap:Body/ns2:findPaymentsResponse/return[1]/paymentId/text()</path><content>Pay-1417513205419-7785</content><allowWildcards>false</allowWildcards><ignoreNamspaceDifferences>false</ignoreNamspaceDifferences><ignoreComments>false</ignoreComments></con:configuration></con:assertion><con:credentials><con:username>${#Project#BasicAuthUser}</con:username><con:password>${#Project#BasicAuthPass}</con:password><con:domain/><con:authType>No Authorization</con:authType></con:credentials><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508"/><con:wsrmConfig version="1.2"/></con:request></con:config></con:testStep><con:properties><con:property><con:name>ActualPaymentID</con:name><con:value>Sess-1343660762300-4038</con:value></con:property><con:property><con:name>SigningURL</con:name><con:value>http://dummy.esign.pte.loc/sign.html?signId=bfad2f5f-abbd-4a10-95ce-e34bd7d6b5ed&amp;lang=sv</con:value></con:property><con:property><con:name>SignID</con:name><con:value>http://dummy.esign.pte.loc/sign.html?signId=8a4bce96-d6ad-45d8-beb2-d1c84d32ceb3&amp;lang=sv</con:value></con:property><con:property><con:name>StatusChangeURL</con:name><con:value>http://dummy.esign.pte.loc/changeResult.html?signId=bfad2f5f-abbd-4a10-95ce-e34bd7d6b5ed&amp;lang=sv&amp;success=true</con:value></con:property></con:properties></con:testCase><con:testCase failOnError="true" failTestCaseOnErrors="true" keepSession="false" maxResults="0" name="Sort, Paging &amp; Limit" searchProperties="true" id="832f6aaa-92c0-48b9-a5ce-c9175278fe1f"><con:settings/><con:testStep type="request" name="Search with Representative Id (i.e. all)"><con:settings/><con:config xsi:type="con:RequestStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:interface>AfterShopFlowWebServiceImplPortBinding</con:interface><con:operation>findPayments</con:operation><con:request name="Search with Representative Id (i.e. all)"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:encoding>UTF-8</con:encoding><con:endpoint>${#Project#ServiceEndpoint}/AfterShopFlowService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:aft="http://ecommerce.resurs.com/v4/msg/aftershopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <aft:findPayments>
         <searchCriteria>
         </searchCriteria>
      </aft:findPayments>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:assertion type="SOAP Response"/><con:assertion type="Schema Compliance"><con:configuration/></con:assertion><con:assertion type="SOAP Fault Assertion"/><con:credentials><con:username>${#Project#BasicAuthUser}</con:username><con:password>${#Project#BasicAuthPass}</con:password><con:domain/><con:authType>No Authorization</con:authType></con:credentials><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508"/><con:wsrmConfig version="1.2"/></con:request></con:config></con:testStep><con:testStep type="request" name="Search with Representative Id (i.e. all) with Sort"><con:settings/><con:config xsi:type="con:RequestStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:interface>AfterShopFlowWebServiceImplPortBinding</con:interface><con:operation>findPayments</con:operation><con:request name="Search with Representative Id (i.e. all) with Sort"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:encoding>UTF-8</con:encoding><con:endpoint>${#Project#ServiceEndpoint}/AfterShopFlowService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:aft="http://ecommerce.resurs.com/v4/msg/aftershopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <aft:findPayments>
         <searchCriteria>
         </searchCriteria>
         <sortBy>
            <ascending>false</ascending>
            <sortColumns>AMOUNT</sortColumns>
            <sortColumns>CUSTOMER_GOVERNMENT_ID</sortColumns>
         </sortBy>
      </aft:findPayments>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:assertion type="SOAP Response"/><con:assertion type="Schema Compliance"><con:configuration/></con:assertion><con:assertion type="SOAP Fault Assertion"/><con:assertion type="XPath Match" name="Correct Payment First"><con:configuration><path>declare namespace ns2='http://ecommerce.resurs.com/v4/msg/exception';
declare namespace soap='http://schemas.xmlsoap.org/soap/envelope/';
declare namespace ns3='http://ecommerce.resurs.com/v4/msg/aftershopflow';
/soap:Envelope/soap:Body/ns3:findPaymentsResponse/return[1]/fullName</path><content>*</content><allowWildcards>true</allowWildcards><ignoreNamspaceDifferences>false</ignoreNamspaceDifferences><ignoreComments>false</ignoreComments></con:configuration></con:assertion><con:assertion type="XPath Match" name="Correct Payment Last"><con:configuration><path>declare namespace ns2='http://ecommerce.resurs.com/v4/msg/exception';
declare namespace soap='http://schemas.xmlsoap.org/soap/envelope/';
declare namespace ns3='http://ecommerce.resurs.com/v4/msg/aftershopflow';
/soap:Envelope/soap:Body/ns3:findPaymentsResponse/return[12]/fullName/text()</path><content>*</content><allowWildcards>true</allowWildcards><ignoreNamspaceDifferences>false</ignoreNamspaceDifferences><ignoreComments>false</ignoreComments></con:configuration></con:assertion><con:credentials><con:username>${#Project#BasicAuthUser}</con:username><con:password>${#Project#BasicAuthPass}</con:password><con:domain/><con:authType>No Authorization</con:authType></con:credentials><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508"/><con:wsrmConfig version="1.2"/></con:request></con:config></con:testStep><con:testStep type="request" name="Search with Representative Id (i.e. all) with Sort; Page 1"><con:settings/><con:config xsi:type="con:RequestStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:interface>AfterShopFlowWebServiceImplPortBinding</con:interface><con:operation>findPayments</con:operation><con:request name="Search with Representative Id (i.e. all) with Sort; Page 1"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:encoding>UTF-8</con:encoding><con:endpoint>${#Project#ServiceEndpoint}/AfterShopFlowService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:aft="http://ecommerce.resurs.com/v4/msg/aftershopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <aft:findPayments>
         <searchCriteria>
         </searchCriteria>
         <pageNumber>1</pageNumber>
         <itemsPerPage>3</itemsPerPage>
         <sortBy>
            <ascending>false</ascending>
            <sortColumns>AMOUNT</sortColumns>
            <sortColumns>CUSTOMER_GOVERNMENT_ID</sortColumns>
         </sortBy>
      </aft:findPayments>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:assertion type="SOAP Response"/><con:assertion type="Schema Compliance"><con:configuration/></con:assertion><con:assertion type="SOAP Fault Assertion"/><con:assertion type="XPath Match" name="No of Results OK"><con:configuration><path>declare namespace ns2='http://ecommerce.resurs.com/v4/msg/exception';
declare namespace soap='http://schemas.xmlsoap.org/soap/envelope/';
declare namespace ns3='http://ecommerce.resurs.com/v4/msg/aftershopflow';
count(/soap:Envelope/soap:Body/ns3:findPaymentsResponse/return)</path><content>3</content><allowWildcards>false</allowWildcards><ignoreNamspaceDifferences>false</ignoreNamspaceDifferences><ignoreComments>false</ignoreComments></con:configuration></con:assertion><con:assertion type="XPath Match" name="Correct Payment First"><con:configuration><path>declare namespace ns2='http://ecommerce.resurs.com/v4/msg/exception';
declare namespace soap='http://schemas.xmlsoap.org/soap/envelope/';
declare namespace ns3='http://ecommerce.resurs.com/v4/msg/aftershopflow';
/soap:Envelope/soap:Body/ns3:findPaymentsResponse/return[1]/fullName</path><content>*</content><allowWildcards>true</allowWildcards><ignoreNamspaceDifferences>false</ignoreNamspaceDifferences><ignoreComments>false</ignoreComments></con:configuration></con:assertion><con:assertion type="XPath Match" name="Correct Payment Last"><con:configuration><path>declare namespace ns2='http://ecommerce.resurs.com/v4/msg/exception';
declare namespace soap='http://schemas.xmlsoap.org/soap/envelope/';
declare namespace ns3='http://ecommerce.resurs.com/v4/msg/aftershopflow';
/soap:Envelope/soap:Body/ns3:findPaymentsResponse/return[3]/fullName/text()</path><content>*</content><allowWildcards>true</allowWildcards><ignoreNamspaceDifferences>false</ignoreNamspaceDifferences><ignoreComments>false</ignoreComments></con:configuration></con:assertion><con:credentials><con:username>${#Project#BasicAuthUser}</con:username><con:password>${#Project#BasicAuthPass}</con:password><con:domain/><con:authType>No Authorization</con:authType></con:credentials><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508"/><con:wsrmConfig version="1.2"/></con:request></con:config></con:testStep><con:testStep type="request" name="Search with Representative Id (i.e. all) with Sort; Page 2"><con:settings/><con:config xsi:type="con:RequestStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:interface>AfterShopFlowWebServiceImplPortBinding</con:interface><con:operation>findPayments</con:operation><con:request name="Search with Representative Id (i.e. all) with Sort; Page 2"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:encoding>UTF-8</con:encoding><con:endpoint>${#Project#ServiceEndpoint}/AfterShopFlowService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:aft="http://ecommerce.resurs.com/v4/msg/aftershopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <aft:findPayments>
         <searchCriteria>
         </searchCriteria>
         <pageNumber>2</pageNumber>
         <itemsPerPage>3</itemsPerPage>
         <sortBy>
            <ascending>false</ascending>
            <sortColumns>AMOUNT</sortColumns>
            <sortColumns>CUSTOMER_GOVERNMENT_ID</sortColumns>
         </sortBy>
      </aft:findPayments>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:assertion type="SOAP Response"/><con:assertion type="Schema Compliance"><con:configuration/></con:assertion><con:assertion type="SOAP Fault Assertion"/><con:assertion type="XPath Match" name="No of Results OK"><con:configuration><path>declare namespace ns2='http://ecommerce.resurs.com/v4/msg/exception';
declare namespace soap='http://schemas.xmlsoap.org/soap/envelope/';
declare namespace ns3='http://ecommerce.resurs.com/v4/msg/aftershopflow';
count(/soap:Envelope/soap:Body/ns3:findPaymentsResponse/return)</path><content>3</content><allowWildcards>false</allowWildcards><ignoreNamspaceDifferences>false</ignoreNamspaceDifferences><ignoreComments>false</ignoreComments></con:configuration></con:assertion><con:assertion type="XPath Match" name="Correct Payment First"><con:configuration><path>declare namespace ns2='http://ecommerce.resurs.com/v4/msg/exception';
declare namespace soap='http://schemas.xmlsoap.org/soap/envelope/';
declare namespace ns3='http://ecommerce.resurs.com/v4/msg/aftershopflow';
/soap:Envelope/soap:Body/ns3:findPaymentsResponse/return[1]/fullName</path><content>*</content><allowWildcards>true</allowWildcards><ignoreNamspaceDifferences>false</ignoreNamspaceDifferences><ignoreComments>false</ignoreComments></con:configuration></con:assertion><con:assertion type="XPath Match" name="Correct Payment Last"><con:configuration><path>declare namespace ns2='http://ecommerce.resurs.com/v4/msg/exception';
declare namespace soap='http://schemas.xmlsoap.org/soap/envelope/';
declare namespace ns3='http://ecommerce.resurs.com/v4/msg/aftershopflow';
/soap:Envelope/soap:Body/ns3:findPaymentsResponse/return[3]/fullName/text()</path><content>*</content><allowWildcards>true</allowWildcards><ignoreNamspaceDifferences>false</ignoreNamspaceDifferences><ignoreComments>false</ignoreComments></con:configuration></con:assertion><con:credentials><con:username>${#Project#BasicAuthUser}</con:username><con:password>${#Project#BasicAuthPass}</con:password><con:domain/><con:authType>No Authorization</con:authType></con:credentials><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508"/><con:wsrmConfig version="1.2"/></con:request></con:config></con:testStep><con:testStep type="request" name="Search with Representative Id (i.e. all) with Sort &amp; Limit"><con:settings/><con:config xsi:type="con:RequestStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:interface>AfterShopFlowWebServiceImplPortBinding</con:interface><con:operation>findPayments</con:operation><con:request name="Search with Representative Id (i.e. all) with Sort &amp; Limit"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:encoding>UTF-8</con:encoding><con:endpoint>${#Project#ServiceEndpoint}/AfterShopFlowService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:aft="http://ecommerce.resurs.com/v4/msg/aftershopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <aft:findPayments>
         <searchCriteria>
         </searchCriteria>
         <itemsPerPage>7</itemsPerPage>
         <sortBy>
            <ascending>false</ascending>
            <sortColumns>AMOUNT</sortColumns>
            <sortColumns>CUSTOMER_GOVERNMENT_ID</sortColumns>
         </sortBy>
      </aft:findPayments>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:assertion type="SOAP Response"/><con:assertion type="Schema Compliance"><con:configuration/></con:assertion><con:assertion type="SOAP Fault Assertion"/><con:assertion type="XPath Match" name="No of Results OK"><con:configuration><path>declare namespace ns2='http://ecommerce.resurs.com/v4/msg/exception';
declare namespace soap='http://schemas.xmlsoap.org/soap/envelope/';
declare namespace ns3='http://ecommerce.resurs.com/v4/msg/aftershopflow';
count(/soap:Envelope/soap:Body/ns3:findPaymentsResponse/return)</path><content>7</content><allowWildcards>false</allowWildcards><ignoreNamspaceDifferences>false</ignoreNamspaceDifferences><ignoreComments>false</ignoreComments></con:configuration></con:assertion><con:assertion type="XPath Match" name="Correct Payment First"><con:configuration><path>declare namespace ns2='http://ecommerce.resurs.com/v4/msg/exception';
declare namespace soap='http://schemas.xmlsoap.org/soap/envelope/';
declare namespace ns3='http://ecommerce.resurs.com/v4/msg/aftershopflow';
/soap:Envelope/soap:Body/ns3:findPaymentsResponse/return[1]/fullName</path><content>*</content><allowWildcards>true</allowWildcards><ignoreNamspaceDifferences>false</ignoreNamspaceDifferences><ignoreComments>false</ignoreComments></con:configuration></con:assertion><con:assertion type="XPath Match" name="Correct Payment Last"><con:configuration><path>declare namespace ns2='http://ecommerce.resurs.com/v4/msg/exception';
declare namespace soap='http://schemas.xmlsoap.org/soap/envelope/';
declare namespace ns3='http://ecommerce.resurs.com/v4/msg/aftershopflow';
/soap:Envelope/soap:Body/ns3:findPaymentsResponse/return[7]/fullName/text()</path><content>*</content><allowWildcards>true</allowWildcards><ignoreNamspaceDifferences>false</ignoreNamspaceDifferences><ignoreComments>false</ignoreComments></con:configuration></con:assertion><con:credentials><con:username>${#Project#BasicAuthUser}</con:username><con:password>${#Project#BasicAuthPass}</con:password><con:domain/><con:authType>No Authorization</con:authType></con:credentials><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508"/><con:wsrmConfig version="1.2"/></con:request></con:config></con:testStep><con:properties><con:property><con:name>ActualPaymentID</con:name><con:value>Sess-1343660762300-4038</con:value></con:property><con:property><con:name>SigningURL</con:name><con:value>http://dummy.esign.pte.loc/sign.html?signId=bfad2f5f-abbd-4a10-95ce-e34bd7d6b5ed&amp;lang=sv</con:value></con:property><con:property><con:name>SignID</con:name><con:value>http://dummy.esign.pte.loc/sign.html?signId=8a4bce96-d6ad-45d8-beb2-d1c84d32ceb3&amp;lang=sv</con:value></con:property><con:property><con:name>StatusChangeURL</con:name><con:value>http://dummy.esign.pte.loc/changeResult.html?signId=bfad2f5f-abbd-4a10-95ce-e34bd7d6b5ed&amp;lang=sv&amp;success=true</con:value></con:property></con:properties></con:testCase><con:properties/></con:testSuite><con:testSuite name="Basic Flows"><con:description>The simplest possible end-to-end flows. Sales is made by amount, while
annulment and crediting is unspecified.

For annulled payments, no preferred payment identity is specified.</con:description><con:settings/><con:runType>SEQUENTIAL</con:runType><con:testCase failOnError="true" failTestCaseOnErrors="true" keepSession="false" maxResults="0" name="Existing Card - Book &amp; Annul" searchProperties="true" id="6175253d-9e5f-4148-81dd-99bceaee5c78"><con:description>Books a card purchase, then annuls it.</con:description><con:settings/><con:testStep type="groovy" name="Generate Parameters"><con:settings/><con:config><script>// *** Set basic parameters
String id = System.currentTimeMillis() + "-" + (int)(Math.random() * 10000);
context.setProperty("ID", id);
context.setProperty("SessionID", "Sess-" + id)
context.setProperty("Date", new Date().format('yyyy-MM-dd'))

// *** Get parameters 
def String[] validCards = testRunner.testCase.testSuite.project.getPropertyValue("Cards_Valid").split(";");

// *** Determine card number and government identity
int index = Math.random() * validCards.length;
String[] cardDetails = validCards[index].split(",");
context.setProperty("GovernmentID", cardDetails[0].trim());
context.setProperty("CardNo", cardDetails[1].trim());

// *** Log parameters
log.info (
	"Starting session " + context.getProperty("SessionID") + " for " + 
	context.getProperty("GovernmentID") + " using " + 
	context.getProperty("CardNo") + " on " + context.getProperty("Date"));
</script></con:config></con:testStep><con:testStep type="request" name="Start Payment Session"><con:settings/><con:config xsi:type="con:RequestStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:interface>ShopFlowWebServiceImplPortBinding</con:interface><con:operation>startPaymentSession</con:operation><con:request name="Start Payment Session"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:encoding>UTF-8</con:encoding><con:endpoint>${#Project#ServiceEndpoint}/ShopFlowService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:shop="http://ecommerce.resurs.com/v4/msg/shopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <shop:startPaymentSession>
         <preferredId>${#SessionID}</preferredId>
         <paymentMethodId>${#Project#PaymentMethodID_Card}</paymentMethodId>
         <customerIpAddress>127.0.0.2</customerIpAddress>
         <formAction>AFormAction</formAction>
         <paymentSpec>
            <specLines>
               <id>1</id>
               <artNo>NUT-001</artNo>
               <description>Nut (M8)</description>
               <quantity>10</quantity>
               <unitMeasure>st</unitMeasure>
               <unitAmountWithoutVat>0.80</unitAmountWithoutVat>
               <vatPct>25</vatPct>
               <totalVatAmount>2.00</totalVatAmount>
               <totalAmount>10.00</totalAmount>
            </specLines>
            <specLines>
               <id>2</id>
               <artNo>BOLT-002</artNo>
               <description>Bolt (M8x125mm)</description>
               <quantity>10</quantity>
               <unitMeasure>st</unitMeasure>
               <unitAmountWithoutVat>1.60</unitAmountWithoutVat>
               <vatPct>25</vatPct>
               <totalVatAmount>4.00</totalVatAmount>
               <totalAmount>20.00</totalAmount>
            </specLines>
            <totalAmount>30.00</totalAmount>
            <totalVatAmount>6.00</totalVatAmount>
         </paymentSpec>
      </shop:startPaymentSession>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:assertion type="SOAP Response"/><con:assertion type="Schema Compliance"><con:configuration/></con:assertion><con:assertion type="SOAP Fault Assertion"/><con:assertion type="Simple Contains" name="Contains Session Identity"><con:configuration><token>&lt;id>${#SessionID}&lt;/id></token><ignoreCase>false</ignoreCase><useRegEx>false</useRegEx></con:configuration></con:assertion><con:assertion type="Simple Contains" name="Contains Limit Application Form as Object"><con:configuration><token>(?s).*&lt;limitApplicationFormAsObjectGraph>[\S\s]*&lt;/limitApplicationFormAsObjectGraph>.*</token><ignoreCase>false</ignoreCase><useRegEx>true</useRegEx></con:configuration></con:assertion><con:assertion type="Simple Contains" name="Contains Limit Application Form as Form"><con:configuration><token>(?s).*&lt;limitApplicationFormAsCompiledForm>[\S\s]*&lt;/limitApplicationFormAsCompiledForm>.*</token><ignoreCase>false</ignoreCase><useRegEx>true</useRegEx></con:configuration></con:assertion><con:credentials><con:username>${#Project#BasicAuthUser}</con:username><con:password>${#Project#BasicAuthPass}</con:password><con:domain/><con:authType>No Authorization</con:authType></con:credentials><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508"/><con:wsrmConfig version="1.2"/></con:request></con:config></con:testStep><con:testStep type="request" name="Create Limit (OK)"><con:settings/><con:config xsi:type="con:RequestStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:interface>ShopFlowWebServiceImplPortBinding</con:interface><con:operation>submitLimitApplication</con:operation><con:request name="Create Limit (OK)"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting><con:setting id="WsdlSettings@enable-mtom">false</con:setting></con:settings><con:encoding>UTF-8</con:encoding><con:endpoint>${#Project#ServiceEndpoint}/ShopFlowService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:shop="http://ecommerce.resurs.com/v4/msg/shopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <shop:submitLimitApplication>
         <paymentSessionId>${#SessionID}</paymentSessionId>
         <yourCustomerId>Cust-${#ID}</yourCustomerId>
         <formDataResponse><![CDATA[
<resurs-response>
    <amount>123</amount>
    <card-number>${#CardNo}</card-number>
    <applicant-government-id>${#GovernmentID}</applicant-government-id>
</resurs-response>
            ]]]]>><![CDATA[</formDataResponse>
      </shop:submitLimitApplication>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:assertion type="SOAP Response"/><con:assertion type="Schema Compliance"><con:configuration/></con:assertion><con:assertion type="SOAP Fault Assertion"/><con:assertion type="Simple Contains" name="Limit is Granted"><con:configuration><token>&lt;decision>GRANTED&lt;/decision></token><ignoreCase>false</ignoreCase><useRegEx>false</useRegEx></con:configuration></con:assertion><con:credentials><con:username>${#Project#BasicAuthUser}</con:username><con:password>${#Project#BasicAuthPass}</con:password><con:domain/><con:authType>No Authorization</con:authType></con:credentials><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508"/><con:wsrmConfig version="1.2"/></con:request></con:config></con:testStep><con:testStep type="request" name="Book Payment"><con:settings/><con:config xsi:type="con:RequestStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:interface>ShopFlowWebServiceImplPortBinding</con:interface><con:operation>bookPayment</con:operation><con:request name="Book Payment"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:encoding>UTF-8</con:encoding><con:endpoint>${#Project#ServiceEndpoint}/ShopFlowService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:shop="http://ecommerce.resurs.com/v4/msg/shopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <shop:bookPayment>
         <paymentSessionId>${#SessionID}</paymentSessionId>
         <waitForFraudControl>true</waitForFraudControl>
         <annulIfFrozen>false</annulIfFrozen>
         <metaData>
            <key>Expressfrakt</key>
            <value>true</value>
         </metaData>
         <priority>100</priority>
      </shop:bookPayment>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:assertion type="SOAP Response"/><con:assertion type="Schema Compliance"><con:configuration/></con:assertion><con:assertion type="SOAP Fault Assertion"/><con:credentials><con:username>${#Project#BasicAuthUser}</con:username><con:password>${#Project#BasicAuthPass}</con:password><con:domain/><con:authType>No Authorization</con:authType></con:credentials><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508"/><con:wsrmConfig version="1.2"/></con:request></con:config></con:testStep><con:testStep type="transfer" name="Get Actual Payment ID"><con:settings/><con:config xsi:type="con:PropertyTransfersStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:transfers setNullOnMissingSource="true" transferTextContent="true" failOnError="true" ignoreEmpty="false" transferToAll="false" useXQuery="false" entitize="false" transferChildNodes="false"><con:name>Payment ID</con:name><con:sourceType>Response</con:sourceType><con:sourceStep>Book Payment</con:sourceStep><con:sourcePath>declare namespace soapenv='http://schemas.xmlsoap.org/soap/envelope/';
declare namespace shop='http://ecommerce.resurs.com/v4/msg/shopflow';
/soapenv:Envelope/soapenv:Body/shop:bookPaymentResponse/return/paymentId</con:sourcePath><con:targetType>ActualPaymentID</con:targetType><con:targetStep>#TestCase#</con:targetStep><con:targetPath/></con:transfers></con:config></con:testStep><con:testStep type="delay" name="Wait (#1)"><con:settings/><con:config><delay>250</delay></con:config></con:testStep><con:testStep type="request" name="Annul Payment (Unspecified)"><con:settings/><con:config xsi:type="con:RequestStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:interface>AfterShopFlowWebServiceImplPortBinding</con:interface><con:operation>annulPayment</con:operation><con:request name="Annul Payment (Unspecified)"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:encoding>UTF-8</con:encoding><con:endpoint>${#Project#ServiceEndpoint}/AfterShopFlowService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:aft="http://ecommerce.resurs.com/v4/msg/aftershopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <aft:annulPayment>
         <paymentId>${#TestCase#ActualPaymentID}</paymentId>
      </aft:annulPayment>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:assertion type="SOAP Response"/><con:assertion type="Schema Compliance"><con:configuration/></con:assertion><con:assertion type="SOAP Fault Assertion"/><con:credentials><con:username>${#Project#BasicAuthUser}</con:username><con:password>${#Project#BasicAuthPass}</con:password><con:domain/><con:authType>No Authorization</con:authType></con:credentials><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508"/><con:wsrmConfig version="1.2"/></con:request></con:config></con:testStep><con:testStep type="delay" name="Wait (#2)"><con:settings/><con:config><delay>250</delay></con:config></con:testStep><con:testStep type="request" name="Get Payment Details"><con:settings/><con:config xsi:type="con:RequestStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:interface>AfterShopFlowWebServiceImplPortBinding</con:interface><con:operation>getPayment</con:operation><con:request name="Get Payment Details"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:encoding>UTF-8</con:encoding><con:endpoint>${#Project#ServiceEndpoint}/AfterShopFlowService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:aft="http://ecommerce.resurs.com/v4/msg/aftershopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <aft:getPayment>
         <paymentId>${#TestCase#ActualPaymentID}</paymentId>
      </aft:getPayment>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:assertion type="SOAP Response"/><con:assertion type="Schema Compliance"><con:configuration/></con:assertion><con:assertion type="SOAP Fault Assertion"/><con:assertion type="XPath Match" name="Contains AUTHORIZE"><con:configuration><path>declare namespace soap='http://schemas.xmlsoap.org/soap/envelope/';
declare namespace ns3='http://ecommerce.resurs.com/v4/msg/exception';
declare namespace ns2='http://ecommerce.resurs.com/v4/msg/aftershopflow';
/soap:Envelope/soap:Body/ns2:getPaymentResponse/return/paymentDiffs[1]/type/text()</path><content>AUTHORIZE</content><allowWildcards>false</allowWildcards><ignoreNamspaceDifferences>false</ignoreNamspaceDifferences><ignoreComments>false</ignoreComments></con:configuration></con:assertion><con:assertion type="XPath Match" name="Contains ANNUL"><con:configuration><path>declare namespace soap='http://schemas.xmlsoap.org/soap/envelope/';
declare namespace ns3='http://ecommerce.resurs.com/v4/msg/exception';
declare namespace ns2='http://ecommerce.resurs.com/v4/msg/aftershopflow';
/soap:Envelope/soap:Body/ns2:getPaymentResponse/return/paymentDiffs[2]/type/text()</path><content>ANNUL</content><allowWildcards>false</allowWildcards><ignoreNamspaceDifferences>false</ignoreNamspaceDifferences><ignoreComments>false</ignoreComments></con:configuration></con:assertion><con:assertion type="XPath Match" name="Total Amount is 0"><con:configuration><path>declare namespace ns2='http://ecommerce.resurs.com/v4/msg/exception';
declare namespace soap='http://schemas.xmlsoap.org/soap/envelope/';
declare namespace ns3='http://ecommerce.resurs.com/v4/msg/aftershopflow';
/soap:Envelope/soap:Body/ns3:getPaymentResponse/return/totalAmount/text()</path><content>0.000000000000000</content><allowWildcards>false</allowWildcards><ignoreNamspaceDifferences>false</ignoreNamspaceDifferences><ignoreComments>false</ignoreComments></con:configuration></con:assertion><con:assertion type="XPath Match" name="Government Id is OK" disabled="true"><con:configuration><path>declare namespace ns2='http://ecommerce.resurs.com/v4/msg/exception';
declare namespace soap='http://schemas.xmlsoap.org/soap/envelope/';
declare namespace ns3='http://ecommerce.resurs.com/v4/msg/aftershopflow';
/soap:Envelope/soap:Body/ns3:getPaymentResponse/return/customer/governmentId/text()</path><content>${#GovernmentID}</content><allowWildcards>false</allowWildcards><ignoreNamspaceDifferences>false</ignoreNamspaceDifferences><ignoreComments>false</ignoreComments></con:configuration></con:assertion><con:assertion type="XPath Match" name="Payment Session Id is OK"><con:configuration><path>declare namespace soap='http://schemas.xmlsoap.org/soap/envelope/';
declare namespace ns3='http://ecommerce.resurs.com/v4/msg/exception';
declare namespace ns2='http://ecommerce.resurs.com/v4/msg/aftershopflow';
/soap:Envelope/soap:Body/ns2:getPaymentResponse/return/id/text()</path><content>${#SessionID}</content><allowWildcards>false</allowWildcards><ignoreNamspaceDifferences>false</ignoreNamspaceDifferences><ignoreComments>false</ignoreComments></con:configuration></con:assertion><con:credentials><con:username>${#Project#BasicAuthUser}</con:username><con:password>${#Project#BasicAuthPass}</con:password><con:domain/><con:authType>No Authorization</con:authType></con:credentials><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508"/><con:wsrmConfig version="1.2"/></con:request></con:config></con:testStep><con:properties><con:property><con:name>ActualPaymentID</con:name><con:value>Sess-1417516497743-5588</con:value></con:property></con:properties></con:testCase><con:testCase failOnError="true" failTestCaseOnErrors="true" keepSession="false" maxResults="0" name="Existing Card - Sell &amp; Credit" searchProperties="true" id="5a9eb58e-cd99-4e2b-aef5-c35b4d7427d8"><con:settings/><con:testStep type="groovy" name="Generate Parameters"><con:settings/><con:config><script>// *** Set basic parameters
String id = System.currentTimeMillis() + "-" + (int)(Math.random() * 10000);
context.setProperty("ID", id);
context.setProperty("SessionID", "Sess-" + id)
context.setProperty("Date", new Date().format('yyyy-MM-dd'))

// *** Get parameters 
def String[] validCards = testRunner.testCase.testSuite.project.getPropertyValue("Cards_Valid").split(";");

// *** Determine card number and government identity
int index = Math.random() * validCards.length;
String[] cardDetails = validCards[index].split(",");
context.setProperty("GovernmentID", cardDetails[0].trim());
context.setProperty("CardNo", cardDetails[1].trim());

// *** Log parameters
log.info (
	"Starting session " + context.getProperty("SessionID") + " for " + 
	context.getProperty("GovernmentID") + " using " + 
	context.getProperty("CardNo") + " on " + context.getProperty("Date"));
</script></con:config></con:testStep><con:testStep type="request" name="Start Payment Session"><con:settings/><con:config xsi:type="con:RequestStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:interface>ShopFlowWebServiceImplPortBinding</con:interface><con:operation>startPaymentSession</con:operation><con:request name="Start Payment Session"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:encoding>UTF-8</con:encoding><con:endpoint>${#Project#ServiceEndpoint}/ShopFlowService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:shop="http://ecommerce.resurs.com/v4/msg/shopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <shop:startPaymentSession>
         <preferredId>${#SessionID}</preferredId>
         <paymentMethodId>${#Project#PaymentMethodID_Card}</paymentMethodId>
         <customerIpAddress>127.0.0.2</customerIpAddress>
         <formAction>AFormAction</formAction>
         <paymentSpec>
            <specLines>
               <id>1</id>
               <artNo>NUT-001</artNo>
               <description>Nut (M8)</description>
               <quantity>10</quantity>
               <unitMeasure>st</unitMeasure>
               <unitAmountWithoutVat>0.80</unitAmountWithoutVat>
               <vatPct>25</vatPct>
               <totalVatAmount>2.00</totalVatAmount>
               <totalAmount>10.00</totalAmount>
            </specLines>
            <specLines>
               <id>2</id>
               <artNo>BOLT-002</artNo>
               <description>Bolt (M8x125mm)</description>
               <quantity>10</quantity>
               <unitMeasure>st</unitMeasure>
               <unitAmountWithoutVat>1.60</unitAmountWithoutVat>
               <vatPct>25</vatPct>
               <totalVatAmount>4.00</totalVatAmount>
               <totalAmount>20.00</totalAmount>
            </specLines>
            <totalAmount>30.00</totalAmount>
            <totalVatAmount>6.00</totalVatAmount>
         </paymentSpec>
      </shop:startPaymentSession>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:assertion type="SOAP Response"/><con:assertion type="Schema Compliance"><con:configuration/></con:assertion><con:assertion type="SOAP Fault Assertion"/><con:assertion type="Simple Contains" name="Contains Session Identity"><con:configuration><token>&lt;id>${#SessionID}&lt;/id></token><ignoreCase>false</ignoreCase><useRegEx>false</useRegEx></con:configuration></con:assertion><con:assertion type="Simple Contains" name="Contains Limit Application Form as Object"><con:configuration><token>(?s).*&lt;limitApplicationFormAsObjectGraph>[\S\s]*&lt;/limitApplicationFormAsObjectGraph>.*</token><ignoreCase>false</ignoreCase><useRegEx>true</useRegEx></con:configuration></con:assertion><con:assertion type="Simple Contains" name="Contains Limit Application Form as Form"><con:configuration><token>(?s).*&lt;limitApplicationFormAsCompiledForm>[\S\s]*&lt;/limitApplicationFormAsCompiledForm>.*</token><ignoreCase>false</ignoreCase><useRegEx>true</useRegEx></con:configuration></con:assertion><con:credentials><con:username>${#Project#BasicAuthUser}</con:username><con:password>${#Project#BasicAuthPass}</con:password><con:domain/><con:authType>No Authorization</con:authType></con:credentials><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508"/><con:wsrmConfig version="1.2"/></con:request></con:config></con:testStep><con:testStep type="request" name="Create Limit (OK)"><con:settings/><con:config xsi:type="con:RequestStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:interface>ShopFlowWebServiceImplPortBinding</con:interface><con:operation>submitLimitApplication</con:operation><con:request name="Create Limit (OK)"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:encoding>UTF-8</con:encoding><con:endpoint>${#Project#ServiceEndpoint}/ShopFlowService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:shop="http://ecommerce.resurs.com/v4/msg/shopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <shop:submitLimitApplication>
         <paymentSessionId>${#SessionID}</paymentSessionId>
         <yourCustomerId>Cust-${#ID}</yourCustomerId>
         <formDataResponse><![CDATA[
<resurs-response>
    <amount></amount>
    <card-number>${#CardNo}</card-number>
    <applicant-government-id>${#GovernmentID}</applicant-government-id>
</resurs-response>
            ]]]]>><![CDATA[</formDataResponse>
      </shop:submitLimitApplication>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:assertion type="SOAP Response"/><con:assertion type="Schema Compliance"><con:configuration/></con:assertion><con:assertion type="SOAP Fault Assertion"/><con:assertion type="Simple Contains" name="Limit is Granted"><con:configuration><token>&lt;decision>GRANTED&lt;/decision></token><ignoreCase>false</ignoreCase><useRegEx>false</useRegEx></con:configuration></con:assertion><con:credentials><con:username>${#Project#BasicAuthUser}</con:username><con:password>${#Project#BasicAuthPass}</con:password><con:domain/><con:authType>No Authorization</con:authType></con:credentials><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508"/><con:wsrmConfig version="1.2"/></con:request></con:config></con:testStep><con:testStep type="request" name="Prepare Signing"><con:settings/><con:config xsi:type="con:RequestStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:interface>ShopFlowWebServiceImplPortBinding</con:interface><con:operation>prepareSigning</con:operation><con:request name="Prepare Signing"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:encoding>UTF-8</con:encoding><con:endpoint>${#Project#ServiceEndpoint}/ShopFlowService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:shop="http://ecommerce.resurs.com/v4/msg/shopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <shop:prepareSigning>
         <paymentSessionId>${#SessionID}</paymentSessionId>
         <successUrl>http://www.google.com/search?q=OK</successUrl>
         <failUrl>http://www.google.com/search?q=NOK</failUrl>
      </shop:prepareSigning>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:assertion type="SOAP Response"/><con:assertion type="Schema Compliance"><con:configuration/></con:assertion><con:assertion type="SOAP Fault Assertion"/><con:assertion type="Simple NotContains" name="Not Contains"><con:configuration><token>&lt;return</token><ignoreCase>false</ignoreCase><useRegEx>false</useRegEx></con:configuration></con:assertion><con:credentials><con:username>${#Project#BasicAuthUser}</con:username><con:password>${#Project#BasicAuthPass}</con:password><con:domain/><con:authType>No Authorization</con:authType></con:credentials><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508"/><con:wsrmConfig version="1.2"/></con:request></con:config></con:testStep><con:testStep type="request" name="Book Payment"><con:settings/><con:config xsi:type="con:RequestStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:interface>ShopFlowWebServiceImplPortBinding</con:interface><con:operation>bookPayment</con:operation><con:request name="Book Payment"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:encoding>UTF-8</con:encoding><con:endpoint>${#Project#ServiceEndpoint}/ShopFlowService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:shop="http://ecommerce.resurs.com/v4/msg/shopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <shop:bookPayment>
         <paymentSessionId>${#SessionID}</paymentSessionId>
         <preferredPaymentId>Pay-${#ID}</preferredPaymentId>
         <waitForFraudControl>true</waitForFraudControl>
         <annulIfFrozen>false</annulIfFrozen>
         <metaData>
            <key>Expressfrakt</key>
            <value>true</value>
         </metaData>
         <priority>100</priority>
      </shop:bookPayment>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:assertion type="SOAP Response"/><con:assertion type="Schema Compliance"><con:configuration/></con:assertion><con:assertion type="SOAP Fault Assertion"/><con:credentials><con:username>${#Project#BasicAuthUser}</con:username><con:password>${#Project#BasicAuthPass}</con:password><con:domain/><con:authType>No Authorization</con:authType></con:credentials><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508"/><con:wsrmConfig version="1.2"/></con:request></con:config></con:testStep><con:testStep type="transfer" name="Get Actual Payment ID"><con:settings/><con:config xsi:type="con:PropertyTransfersStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:transfers setNullOnMissingSource="true" transferTextContent="true" failOnError="true" ignoreEmpty="false" transferToAll="false" useXQuery="false" entitize="false" transferChildNodes="false"><con:name>Payment ID</con:name><con:sourceType>Response</con:sourceType><con:sourceStep>Book Payment</con:sourceStep><con:sourcePath>declare namespace soapenv='http://schemas.xmlsoap.org/soap/envelope/';
declare namespace shop='http://ecommerce.resurs.com/v4/msg/shopflow';
/soapenv:Envelope/soapenv:Body/shop:bookPaymentResponse/return/paymentId</con:sourcePath><con:targetType>ActualPaymentID</con:targetType><con:targetStep>#TestCase#</con:targetStep><con:targetPath/></con:transfers></con:config></con:testStep><con:testStep type="delay" name="Wait (#1)"><con:settings/><con:config><delay>${#Project#Wait_Short}</delay></con:config></con:testStep><con:testStep type="request" name="Finalize Payment (By Amount)"><con:settings/><con:config xsi:type="con:RequestStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:interface>AfterShopFlowWebServiceImplPortBinding</con:interface><con:operation>finalizePayment</con:operation><con:request name="Finalize Payment (By Amount)"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:encoding>UTF-8</con:encoding><con:endpoint>${#Project#ServiceEndpoint}/AfterShopFlowService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:aft="http://ecommerce.resurs.com/v4/msg/aftershopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <aft:finalizePayment>
         <paymentId>${#TestCase#ActualPaymentID}</paymentId>
         <preferredTransactionId>TrD-${#ID}</preferredTransactionId>
         <partPaymentSpec>
            <totalAmount>30.00</totalAmount>
            <!--totalVatAmount>6.00</totalVatAmount-->
         </partPaymentSpec>
         <orderId>Ord-${#ID}</orderId>
      </aft:finalizePayment>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:assertion type="SOAP Response"/><con:assertion type="Schema Compliance"><con:configuration/></con:assertion><con:assertion type="SOAP Fault Assertion"/><con:assertion type="Simple Contains" name="Contains no error"><con:configuration><token>finalizePaymentResponse</token><ignoreCase>false</ignoreCase><useRegEx>false</useRegEx></con:configuration></con:assertion><con:credentials><con:username>${#Project#BasicAuthUser}</con:username><con:password>${#Project#BasicAuthPass}</con:password><con:domain/><con:authType>No Authorization</con:authType></con:credentials><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508"/><con:wsrmConfig version="1.2"/></con:request></con:config></con:testStep><con:testStep type="delay" name="Wait (#2)"><con:settings/><con:config><delay>${#Project#Wait_Short}</delay></con:config></con:testStep><con:testStep type="request" name="Credit Payment (Unspecified)"><con:settings/><con:config xsi:type="con:RequestStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:interface>AfterShopFlowWebServiceImplPortBinding</con:interface><con:operation>creditPayment</con:operation><con:request name="Credit Payment (Unspecified)"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:encoding>UTF-8</con:encoding><con:endpoint>${#Project#ServiceEndpoint}/AfterShopFlowService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:aft="http://ecommerce.resurs.com/v4/msg/aftershopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <aft:creditPayment>
         <paymentId>${#TestCase#ActualPaymentID}</paymentId>
         <preferredTransactionId>TrC-${#ID}</preferredTransactionId>
      </aft:creditPayment>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:assertion type="SOAP Response"/><con:assertion type="Schema Compliance"><con:configuration/></con:assertion><con:assertion type="SOAP Fault Assertion"/><con:credentials><con:username>${#Project#BasicAuthUser}</con:username><con:password>${#Project#BasicAuthPass}</con:password><con:domain/><con:authType>No Authorization</con:authType></con:credentials><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508"/><con:wsrmConfig version="1.2"/></con:request></con:config></con:testStep><con:testStep type="delay" name="Wait (#3)"><con:settings/><con:config><delay>${#Project#Wait_Short}</delay></con:config></con:testStep><con:testStep type="request" name="Get Payment Details"><con:settings/><con:config xsi:type="con:RequestStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:interface>AfterShopFlowWebServiceImplPortBinding</con:interface><con:operation>getPayment</con:operation><con:request name="Get Payment Details"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:encoding>UTF-8</con:encoding><con:endpoint>${#Project#ServiceEndpoint}/AfterShopFlowService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:aft="http://ecommerce.resurs.com/v4/msg/aftershopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <aft:getPayment>
         <paymentId>${#TestCase#ActualPaymentID}</paymentId>
      </aft:getPayment>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:assertion type="SOAP Response"/><con:assertion type="Schema Compliance"><con:configuration/></con:assertion><con:assertion type="SOAP Fault Assertion"/><con:assertion type="XPath Match" name="Contains AUTHORIZE"><con:configuration><path>declare namespace soap='http://schemas.xmlsoap.org/soap/envelope/';
declare namespace ns3='http://ecommerce.resurs.com/v4/msg/exception';
declare namespace ns2='http://ecommerce.resurs.com/v4/msg/aftershopflow';
/soap:Envelope/soap:Body/ns2:getPaymentResponse/return/paymentDiffs[1]/type/text()</path><content>AUTHORIZE</content><allowWildcards>false</allowWildcards><ignoreNamspaceDifferences>false</ignoreNamspaceDifferences><ignoreComments>false</ignoreComments></con:configuration></con:assertion><con:assertion type="XPath Match" name="Contains DEBIT"><con:configuration><path>declare namespace ns2='http://ecommerce.resurs.com/v4/msg/exception';
declare namespace soap='http://schemas.xmlsoap.org/soap/envelope/';
declare namespace ns3='http://ecommerce.resurs.com/v4/msg/aftershopflow';
/soap:Envelope/soap:Body/ns3:getPaymentResponse/return/paymentDiffs[2]/type/text()</path><content>DEBIT</content><allowWildcards>false</allowWildcards><ignoreNamspaceDifferences>false</ignoreNamspaceDifferences><ignoreComments>false</ignoreComments></con:configuration></con:assertion><con:assertion type="XPath Match" name="Contains CREDIT"><con:configuration><path>declare namespace ns2='http://ecommerce.resurs.com/v4/msg/exception';
declare namespace soap='http://schemas.xmlsoap.org/soap/envelope/';
declare namespace ns3='http://ecommerce.resurs.com/v4/msg/aftershopflow';
/soap:Envelope/soap:Body/ns3:getPaymentResponse/return/paymentDiffs[3]/type/text()</path><content>CREDIT</content><allowWildcards>false</allowWildcards><ignoreNamspaceDifferences>false</ignoreNamspaceDifferences><ignoreComments>false</ignoreComments></con:configuration></con:assertion><con:assertion type="XPath Match" name="Total Amount is Zero"><con:configuration><path>declare namespace soap='http://schemas.xmlsoap.org/soap/envelope/';
declare namespace ns3='http://ecommerce.resurs.com/v4/msg/exception';
declare namespace ns2='http://ecommerce.resurs.com/v4/msg/aftershopflow';
/soap:Envelope/soap:Body/ns2:getPaymentResponse/return/totalAmount/number()</path><content>0.0</content><allowWildcards>false</allowWildcards><ignoreNamspaceDifferences>false</ignoreNamspaceDifferences><ignoreComments>false</ignoreComments></con:configuration></con:assertion><con:assertion type="XPath Match" name="Limit is OK"><con:configuration><path>declare namespace soap='http://schemas.xmlsoap.org/soap/envelope/';
declare namespace ns3='http://ecommerce.resurs.com/v4/msg/exception';
declare namespace ns2='http://ecommerce.resurs.com/v4/msg/aftershopflow';
/soap:Envelope/soap:Body/ns2:getPaymentResponse/return/limit/number()</path><content>30.0</content><allowWildcards>false</allowWildcards><ignoreNamspaceDifferences>false</ignoreNamspaceDifferences><ignoreComments>false</ignoreComments></con:configuration></con:assertion><con:assertion type="XPath Match" name="Payment ID is OK"><con:configuration><path>declare namespace soap='http://schemas.xmlsoap.org/soap/envelope/';
declare namespace ns3='http://ecommerce.resurs.com/v4/msg/exception';
declare namespace ns2='http://ecommerce.resurs.com/v4/msg/aftershopflow';
/soap:Envelope/soap:Body/ns2:getPaymentResponse/return/id/text()</path><content>${#TestCase#ActualPaymentID}</content><allowWildcards>false</allowWildcards><ignoreNamspaceDifferences>false</ignoreNamspaceDifferences><ignoreComments>false</ignoreComments></con:configuration></con:assertion><con:assertion type="XPath Match" name="Debit Transaction ID is OK"><con:configuration><path>declare namespace soap='http://schemas.xmlsoap.org/soap/envelope/';
declare namespace ns3='http://ecommerce.resurs.com/v4/msg/exception';
declare namespace ns2='http://ecommerce.resurs.com/v4/msg/aftershopflow';
/soap:Envelope/soap:Body/ns2:getPaymentResponse/return/paymentDiffs[2]/transactionId/text()</path><content>TrD-${#ID}</content><allowWildcards>false</allowWildcards><ignoreNamspaceDifferences>false</ignoreNamspaceDifferences><ignoreComments>false</ignoreComments></con:configuration></con:assertion><con:assertion type="XPath Match" name="Debit Order ID is OK"><con:configuration><path>declare namespace soap='http://schemas.xmlsoap.org/soap/envelope/';
declare namespace ns3='http://ecommerce.resurs.com/v4/msg/exception';
declare namespace ns2='http://ecommerce.resurs.com/v4/msg/aftershopflow';
/soap:Envelope/soap:Body/ns2:getPaymentResponse/return/paymentDiffs[2]/orderId/text()</path><content>Ord-${#ID}</content><allowWildcards>false</allowWildcards><ignoreNamspaceDifferences>false</ignoreNamspaceDifferences><ignoreComments>false</ignoreComments></con:configuration></con:assertion><con:assertion type="XPath Match" name="Credit Transaction ID is OK"><con:configuration><path>declare namespace soap='http://schemas.xmlsoap.org/soap/envelope/';
declare namespace ns3='http://ecommerce.resurs.com/v4/msg/exception';
declare namespace ns2='http://ecommerce.resurs.com/v4/msg/aftershopflow';
/soap:Envelope/soap:Body/ns2:getPaymentResponse/return/paymentDiffs[3]/transactionId/text()</path><content>TrC-${#ID}</content><allowWildcards>false</allowWildcards><ignoreNamspaceDifferences>false</ignoreNamspaceDifferences><ignoreComments>false</ignoreComments></con:configuration></con:assertion><con:credentials><con:username>${#Project#BasicAuthUser}</con:username><con:password>${#Project#BasicAuthPass}</con:password><con:domain/><con:authType>No Authorization</con:authType></con:credentials><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508"/><con:wsrmConfig version="1.2"/></con:request></con:config></con:testStep><con:properties><con:property><con:name>ActualPaymentID</con:name><con:value>Pay-1417516498938-1497</con:value></con:property></con:properties></con:testCase><con:testCase failOnError="true" failTestCaseOnErrors="true" keepSession="false" maxResults="0" name="Invoice - Credit Denied" searchProperties="true" id="e3f5243e-f566-4e98-a4e3-c78fef4db187"><con:description>Attempts to perform an invoice purchase, but is denied any limit.</con:description><con:settings/><con:testStep type="groovy" name="Generate Parameters"><con:settings/><con:config><script>// *** Set basic parameters
String id = System.currentTimeMillis() + "-" + (int)(Math.random() * 10000);
context.setProperty("ID", id);
context.setProperty("SessionID", "Sess-" + id)
context.setProperty("Date", new Date().format('yyyy-MM-dd'))

// *** Get parameters 
def yearFrom = Integer.parseInt(testRunner.testCase.testSuite.project.getPropertyValue("Denied_StartYear"));
def yearTo = Integer.parseInt(testRunner.testCase.testSuite.project.getPropertyValue("Denied_EndYear"));
def String[] ordinals = testRunner.testCase.testSuite.project.getPropertyValue("Ordinals_NotFrozen").split(",");

// *** Generate Swedish government identity
String governmentId = null;
Random random = new Random();
int year = yearFrom + random.nextInt(yearTo - yearFrom);
int dayOfYear = 1 + random.nextInt(365);
Calendar calendar = GregorianCalendar.getInstance();
calendar.set(Calendar.YEAR, year);
calendar.set(Calendar.DAY_OF_YEAR, dayOfYear);
int ordinal = Integer.parseInt(ordinals[random.nextInt(ordinals.length)].trim());
number = random.nextInt(100);
governmentId = String.format("%1\$ty%1\$tm%1\$td%2\$02d%3\$d", calendar.getTime(), number, ordinal);
int sum = 0;
boolean isAlternate = true;
for (int digit = governmentId.length() - 1; digit >= 0; digit--) {
	int value = Integer.parseInt(governmentId.substring(digit, digit + 1));
	if (isAlternate) {
		value *= 2;
		if (value > 9) {
			value = (value % 10) + 1;
		}
	}
sum += value;
isAlternate = !isAlternate 	
} 
int higherDec = (int) (Math.ceil(sum / 10.0f) * 10);
int luhnDigit = higherDec - sum;
governmentId = governmentId + luhnDigit;
context.setProperty("GovernmentID", governmentId);

// *** Log parameters
log.info (
	"Starting session " + context.getProperty("SessionID") + " for " + 
	context.getProperty("GovernmentID") + " on " + context.getProperty("Date"));
</script></con:config></con:testStep><con:testStep type="request" name="Start Payment Session"><con:settings/><con:config xsi:type="con:RequestStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:interface>ShopFlowWebServiceImplPortBinding</con:interface><con:operation>startPaymentSession</con:operation><con:request name="Start Payment Session"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:encoding>UTF-8</con:encoding><con:endpoint>${#Project#ServiceEndpoint}/ShopFlowService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:shop="http://ecommerce.resurs.com/v4/msg/shopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <shop:startPaymentSession>
         <preferredId>${#SessionID}</preferredId>
         <paymentMethodId>${#Project#PaymentMethodID_Invoice}</paymentMethodId>
         <customerIpAddress>127.0.0.2</customerIpAddress>
         <formAction>AFormAction</formAction>
         <paymentSpec>
            <specLines>
               <id>1</id>
               <artNo>NUT-001</artNo>
               <description>Nut (M8)</description>
               <quantity>10</quantity>
               <unitMeasure>st</unitMeasure>
               <unitAmountWithoutVat>0.80</unitAmountWithoutVat>
               <vatPct>25</vatPct>
               <totalVatAmount>2.00</totalVatAmount>
               <totalAmount>10.00</totalAmount>
            </specLines>
            <specLines>
               <id>2</id>
               <artNo>BOLT-002</artNo>
               <description>Bolt (M8x125mm)</description>
               <quantity>10</quantity>
               <unitMeasure>st</unitMeasure>
               <unitAmountWithoutVat>1.60</unitAmountWithoutVat>
               <vatPct>25</vatPct>
               <totalVatAmount>4.00</totalVatAmount>
               <totalAmount>20.00</totalAmount>
            </specLines>
            <totalAmount>30.00</totalAmount>
            <totalVatAmount>6.00</totalVatAmount>
         </paymentSpec>
      </shop:startPaymentSession>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:assertion type="SOAP Response"/><con:assertion type="Schema Compliance"><con:configuration/></con:assertion><con:assertion type="SOAP Fault Assertion"/><con:assertion type="Simple Contains" name="Contains Session Identity"><con:configuration><token>&lt;id>${#SessionID}&lt;/id></token><ignoreCase>false</ignoreCase><useRegEx>false</useRegEx></con:configuration></con:assertion><con:assertion type="Simple Contains" name="Contains Limit Application Form as Object"><con:configuration><token>(?s).*&lt;limitApplicationFormAsObjectGraph>[\S\s]*&lt;/limitApplicationFormAsObjectGraph>.*</token><ignoreCase>false</ignoreCase><useRegEx>true</useRegEx></con:configuration></con:assertion><con:assertion type="Simple Contains" name="Contains Limit Application Form as Form"><con:configuration><token>(?s).*&lt;limitApplicationFormAsCompiledForm>[\S\s]*&lt;/limitApplicationFormAsCompiledForm>.*</token><ignoreCase>false</ignoreCase><useRegEx>true</useRegEx></con:configuration></con:assertion><con:credentials><con:username>${#Project#BasicAuthUser}</con:username><con:password>${#Project#BasicAuthPass}</con:password><con:domain/><con:authType>No Authorization</con:authType></con:credentials><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508"/><con:wsrmConfig version="1.2"/></con:request></con:config></con:testStep><con:testStep type="request" name="Create Limit (NOK)"><con:settings/><con:config xsi:type="con:RequestStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:interface>ShopFlowWebServiceImplPortBinding</con:interface><con:operation>submitLimitApplication</con:operation><con:request name="Create Limit (NOK)"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:encoding>UTF-8</con:encoding><con:endpoint>${#Project#ServiceEndpoint}/ShopFlowService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:shop="http://ecommerce.resurs.com/v4/msg/shopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <shop:submitLimitApplication>
         <paymentSessionId>${#SessionID}</paymentSessionId>
         <yourCustomerId>Cust-${#ID}</yourCustomerId>
         <formDataResponse><![CDATA[
<resurs-response>
    <amount>300.00</amount>
    <applicant-government-id>${#GovernmentID}</applicant-government-id>
    <applicant-telephone-number></applicant-telephone-number>
    <applicant-mobile-number>0705-12 35 46</applicant-mobile-number>
    <applicant-email-address>javatest@resurs.se</applicant-email-address>
</resurs-response>
            ]]]]>><![CDATA[</formDataResponse>
      </shop:submitLimitApplication>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:assertion type="SOAP Response"/><con:assertion type="Schema Compliance"><con:configuration/></con:assertion><con:assertion type="SOAP Fault Assertion"/><con:assertion type="Simple Contains" name="Limit is Denied"><con:configuration><token>&lt;decision>DENIED&lt;/decision></token><ignoreCase>false</ignoreCase><useRegEx>false</useRegEx></con:configuration></con:assertion><con:assertion type="Simple Contains" name="Customer is of Type Natural"><con:configuration><token>&lt;type>NATURAL&lt;/type></token><ignoreCase>false</ignoreCase><useRegEx>false</useRegEx></con:configuration></con:assertion><con:credentials><con:username>${#Project#BasicAuthUser}</con:username><con:password>${#Project#BasicAuthPass}</con:password><con:domain/><con:authType>No Authorization</con:authType></con:credentials><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508"/><con:wsrmConfig version="1.2"/></con:request></con:config></con:testStep><con:properties><con:property><con:name>ActualPaymentID</con:name><con:value>Sess-1345106096003-9805</con:value></con:property><con:property><con:name>SigningURL</con:name><con:value>http://dummy.esign.pte.loc/sign.html?signId=5eeed205-ab65-41ff-9768-297eb49e0867&amp;lang=sv</con:value></con:property><con:property><con:name>SignID</con:name><con:value>http://dummy.esign.pte.loc/sign.html?signId=8a4bce96-d6ad-45d8-beb2-d1c84d32ceb3&amp;lang=sv</con:value></con:property><con:property><con:name>StatusChangeURL</con:name><con:value>http://dummy.esign.pte.loc/changeResult.html?signId=5eeed205-ab65-41ff-9768-297eb49e0867&amp;lang=sv&amp;success=true</con:value></con:property></con:properties></con:testCase><con:testCase failOnError="true" failTestCaseOnErrors="true" keepSession="false" maxResults="0" name="Invoice - Manual inspection" searchProperties="true" id="3346526b-10d1-4ea2-900f-a989f8f3c10d"><con:description>Attempts to perform an invoice purchase, but is initially sent for manual
inspection.

The disabled steps can be used to confirm the full flow where a manual
inspection is approved and the purchase can be completed.</con:description><con:settings/><con:testStep type="groovy" name="Generate Parameters"><con:settings/><con:config><script>// *** Set basic parameters
String id = System.currentTimeMillis() + "-" + (int)(Math.random() * 10000);
context.setProperty("ID", id);
context.setProperty("SessionID", "Sess-" + id)
context.setProperty("Date", new Date().format('yyyy-MM-dd'))

// *** Get parameters 
def yearFrom = Integer.parseInt(testRunner.testCase.testSuite.project.getPropertyValue("Inspection_StartYear"));
def yearTo = Integer.parseInt(testRunner.testCase.testSuite.project.getPropertyValue("Inspection_EndYear"));
def String[] ordinals = testRunner.testCase.testSuite.project.getPropertyValue("Ordinals_NotFrozen").split(",");

// *** Generate Swedish government identity
String governmentId = null;
Random random = new Random();
int year = yearFrom + random.nextInt(yearTo - yearFrom);
int dayOfYear = 1 + random.nextInt(365);
Calendar calendar = GregorianCalendar.getInstance();
calendar.set(Calendar.YEAR, year);
calendar.set(Calendar.DAY_OF_YEAR, dayOfYear);
int ordinal = Integer.parseInt(ordinals[random.nextInt(ordinals.length)].trim());
number = random.nextInt(100);
governmentId = String.format("%1\$ty%1\$tm%1\$td%2\$02d%3\$d", calendar.getTime(), number, ordinal);
int sum = 0;
boolean isAlternate = true;
for (int digit = governmentId.length() - 1; digit >= 0; digit--) {
	int value = Integer.parseInt(governmentId.substring(digit, digit + 1));
	if (isAlternate) {
		value *= 2;
		if (value > 9) {
			value = (value % 10) + 1;
		}
	}
sum += value;
isAlternate = !isAlternate 	
} 
int higherDec = (int) (Math.ceil(sum / 10.0f) * 10);
int luhnDigit = higherDec - sum;
governmentId = governmentId + luhnDigit;
context.setProperty("GovernmentID", governmentId);

// *** Log parameters
log.info (
	"Starting session " + context.getProperty("SessionID") + " for " + 
	context.getProperty("GovernmentID") + " on " + context.getProperty("Date"));
</script></con:config></con:testStep><con:testStep type="request" name="Start Payment Session"><con:settings/><con:config xsi:type="con:RequestStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:interface>ShopFlowWebServiceImplPortBinding</con:interface><con:operation>startPaymentSession</con:operation><con:request name="Start Payment Session"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:encoding>UTF-8</con:encoding><con:endpoint>${#Project#ServiceEndpoint}/ShopFlowService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:shop="http://ecommerce.resurs.com/v4/msg/shopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <shop:startPaymentSession>
         <preferredId>${#SessionID}</preferredId>
         <paymentMethodId>${#Project#PaymentMethodID_Invoice}</paymentMethodId>
         <customerIpAddress>127.0.0.2</customerIpAddress>
         <formAction>AFormAction</formAction>
         <paymentSpec>
            <specLines>
               <id>1</id>
               <artNo>NUT-001</artNo>
               <description>Nut (M8)</description>
               <quantity>10</quantity>
               <unitMeasure>st</unitMeasure>
               <unitAmountWithoutVat>0.80</unitAmountWithoutVat>
               <vatPct>25</vatPct>
               <totalVatAmount>2.00</totalVatAmount>
               <totalAmount>10.00</totalAmount>
            </specLines>
            <specLines>
               <id>2</id>
               <artNo>BOLT-002</artNo>
               <description>Bolt (M8x125mm)</description>
               <quantity>10</quantity>
               <unitMeasure>st</unitMeasure>
               <unitAmountWithoutVat>1.60</unitAmountWithoutVat>
               <vatPct>25</vatPct>
               <totalVatAmount>4.00</totalVatAmount>
               <totalAmount>20.00</totalAmount>
            </specLines>
            <totalAmount>30.00</totalAmount>
            <totalVatAmount>6.00</totalVatAmount>
         </paymentSpec>
      </shop:startPaymentSession>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:assertion type="SOAP Response"/><con:assertion type="Schema Compliance"><con:configuration/></con:assertion><con:assertion type="SOAP Fault Assertion"/><con:assertion type="Simple Contains" name="Contains Session Identity"><con:configuration><token>&lt;id>${#SessionID}&lt;/id></token><ignoreCase>false</ignoreCase><useRegEx>false</useRegEx></con:configuration></con:assertion><con:assertion type="Simple Contains" name="Contains Limit Application Form as Object"><con:configuration><token>(?s).*&lt;limitApplicationFormAsObjectGraph>[\S\s]*&lt;/limitApplicationFormAsObjectGraph>.*</token><ignoreCase>false</ignoreCase><useRegEx>true</useRegEx></con:configuration></con:assertion><con:assertion type="Simple Contains" name="Contains Limit Application Form as Form"><con:configuration><token>(?s).*&lt;limitApplicationFormAsCompiledForm>[\S\s]*&lt;/limitApplicationFormAsCompiledForm>.*</token><ignoreCase>false</ignoreCase><useRegEx>true</useRegEx></con:configuration></con:assertion><con:credentials><con:username>${#Project#BasicAuthUser}</con:username><con:password>${#Project#BasicAuthPass}</con:password><con:domain/><con:authType>No Authorization</con:authType></con:credentials><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508"/><con:wsrmConfig version="1.2"/></con:request></con:config></con:testStep><con:testStep type="request" name="Create Limit (Manual Inspection)"><con:settings/><con:config xsi:type="con:RequestStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:interface>ShopFlowWebServiceImplPortBinding</con:interface><con:operation>submitLimitApplication</con:operation><con:request name="Create Limit (Manual Inspection)"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:encoding>UTF-8</con:encoding><con:endpoint>${#Project#ServiceEndpoint}/ShopFlowService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:shop="http://ecommerce.resurs.com/v4/msg/shopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <shop:submitLimitApplication>
         <paymentSessionId>${#SessionID}</paymentSessionId>
         <yourCustomerId>Cust-${#ID}</yourCustomerId>
         <formDataResponse><![CDATA[
<resurs-response>
    <amount>300.00</amount>
    <applicant-government-id>${#GovernmentID}</applicant-government-id>
    <applicant-telephone-number></applicant-telephone-number>
    <applicant-mobile-number>0705-12 35 46</applicant-mobile-number>
    <applicant-email-address>javatest@resurs.se</applicant-email-address>
</resurs-response>
            ]]]]>><![CDATA[</formDataResponse>
      </shop:submitLimitApplication>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:assertion type="SOAP Response"/><con:assertion type="Schema Compliance"><con:configuration/></con:assertion><con:assertion type="SOAP Fault Assertion"/><con:assertion type="Simple Contains" name="Is Manual Inspection"><con:configuration><token>&lt;decision>TRIAL&lt;/decision></token><ignoreCase>false</ignoreCase><useRegEx>false</useRegEx></con:configuration></con:assertion><con:assertion type="Simple Contains" name="Customer is of Type Natural"><con:configuration><token>&lt;type>NATURAL&lt;/type></token><ignoreCase>false</ignoreCase><useRegEx>false</useRegEx></con:configuration></con:assertion><con:credentials><con:username>${#Project#BasicAuthUser}</con:username><con:password>${#Project#BasicAuthPass}</con:password><con:domain/><con:authType>No Authorization</con:authType></con:credentials><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508"/><con:wsrmConfig version="1.2"/></con:request></con:config></con:testStep><con:testStep type="manualTestStep" name="Manually Approve Limit" disabled="true"><con:description>Approve the limit manually in the limit
handling system for ${#GovernmentID}

Don't change the amount from the default.</con:description><con:settings/><con:config xsi:type="con:ManualTestStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"/></con:testStep><con:testStep type="request" name="Create New Limit (OK)" disabled="true"><con:settings/><con:config xsi:type="con:RequestStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:interface>ShopFlowWebServiceImplPortBinding</con:interface><con:operation>submitLimitApplication</con:operation><con:request name="Create New Limit (OK)"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:encoding>UTF-8</con:encoding><con:endpoint>${#Project#ServiceEndpoint}/ShopFlowService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:shop="http://ecommerce.resurs.com/v4/msg/shopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <shop:submitLimitApplication>
         <paymentSessionId>${#SessionID}</paymentSessionId>
         <yourCustomerId>Cust-${#ID}</yourCustomerId>
         <formDataResponse><![CDATA[
<resurs-response>
    <amount>300.00</amount>
    <applicant-government-id>${#GovernmentID}</applicant-government-id>
    <applicant-telephone-number></applicant-telephone-number>
    <applicant-mobile-number>0705-12 35 46</applicant-mobile-number>
    <applicant-email-address>javatest@resurs.se</applicant-email-address>
</resurs-response>
            ]]]]>><![CDATA[</formDataResponse>
      </shop:submitLimitApplication>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:assertion type="SOAP Response"/><con:assertion type="Schema Compliance"><con:configuration/></con:assertion><con:assertion type="SOAP Fault Assertion"/><con:assertion type="Simple Contains" name="Is Granted"><con:configuration><token>&lt;decision>GRANTED&lt;/decision></token><ignoreCase>false</ignoreCase><useRegEx>false</useRegEx></con:configuration></con:assertion><con:assertion type="Simple Contains" name="Contains"><con:configuration><token>&lt;approvedAmount>3030&lt;/approvedAmount></token><ignoreCase>false</ignoreCase><useRegEx>false</useRegEx></con:configuration></con:assertion><con:assertion type="Simple Contains" name="Customer is of Type Natural"><con:configuration><token>&lt;type>NATURAL&lt;/type></token><ignoreCase>false</ignoreCase><useRegEx>false</useRegEx></con:configuration></con:assertion><con:credentials><con:username>${#Project#BasicAuthUser}</con:username><con:password>${#Project#BasicAuthPass}</con:password><con:domain/><con:authType>No Authorization</con:authType></con:credentials><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508"/><con:wsrmConfig version="1.2"/></con:request></con:config></con:testStep><con:testStep type="request" name="Prepare Signing" disabled="true"><con:settings/><con:config xsi:type="con:RequestStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:interface>ShopFlowWebServiceImplPortBinding</con:interface><con:operation>prepareSigning</con:operation><con:request name="Prepare Signing"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:encoding>UTF-8</con:encoding><con:endpoint>${#Project#ServiceEndpoint}/ShopFlowService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:shop="http://ecommerce.resurs.com/v4/msg/shopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <shop:prepareSigning>
         <paymentSessionId>${#SessionID}</paymentSessionId>
         <successUrl>http://www.google.com/search?q=OK</successUrl>
         <failUrl>http://www.google.com/search?q=NOK</failUrl>
      </shop:prepareSigning>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:assertion type="SOAP Response"/><con:assertion type="Schema Compliance"><con:configuration/></con:assertion><con:credentials><con:username>${#Project#BasicAuthUser}</con:username><con:password>${#Project#BasicAuthPass}</con:password><con:domain/><con:authType>No Authorization</con:authType></con:credentials><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508"/><con:wsrmConfig version="1.2"/></con:request></con:config></con:testStep><con:testStep type="goto" name="Is Bad Customer" disabled="true"><con:settings/><con:config xsi:type="con:GotoStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:condition><con:name>Is Bad Customer</con:name><con:type>XPATH</con:type><con:expression>declare namespace soap='http://schemas.xmlsoap.org/soap/envelope/';
declare namespace ns3='http://ecommerce.resurs.com/v4/msg/exception';
declare namespace ns2='http://ecommerce.resurs.com/v4/msg/shopflow';
contains(/soap:Envelope/soap:Body/soap:Fault/detail/ns3:ECommerceError/userErrorMessage/text(), "Oklarheter kring existerande krediter")</con:expression><con:targetStep>Generate Parameters</con:targetStep></con:condition></con:config></con:testStep><con:testStep type="transfer" name="Extract Signing URL" disabled="true"><con:settings/><con:config xsi:type="con:PropertyTransfersStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:transfers setNullOnMissingSource="true" transferTextContent="true" failOnError="true" ignoreEmpty="false" transferToAll="false" useXQuery="false" entitize="false" transferChildNodes="false" disabled="false"><con:name>Retrieve Signing URL</con:name><con:sourceType>Response</con:sourceType><con:sourceStep>Prepare Signing</con:sourceStep><con:sourcePath>declare namespace soap='http://schemas.xmlsoap.org/soap/envelope/';
declare namespace ns3='http://ecommerce.resurs.com/v4/msg/shopflow';
//soap:Envelope/soap:Body/ns3:prepareSigningResponse/return/text()</con:sourcePath><con:targetType>SigningURL</con:targetType><con:targetStep>#TestCase#</con:targetStep><con:targetPath>
</con:targetPath></con:transfers></con:config></con:testStep><con:testStep type="groovy" name="Process Signing URL" disabled="true"><con:settings/><con:config><script>// *** Convert the signing URL to the sign OK/NOK URL
def fullURL = testRunner.testCase.getPropertyValue( "SigningURL" )
def statusChangeURL = fullURL.replaceAll("sign.html", "changeResult.html");
statusChangeURL=statusChangeURL+"&amp;success=true";
//log.info "statusChangeURL = " + statusChangeURL;
testRunner.testCase.setPropertyValue("StatusChangeURL", statusChangeURL);
</script></con:config></con:testStep><con:testStep type="httprequest" name="Sign Agreement (OK)" disabled="true"><con:settings/><con:config method="GET" xsi:type="con:HttpRequest" name="Sign Agreement (OK)" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:endpoint>${#TestCase#StatusChangeURL}</con:endpoint><con:request/><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:parameters/></con:config></con:testStep><con:testStep type="request" name="Book Payment" disabled="true"><con:settings/><con:config xsi:type="con:RequestStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:interface>ShopFlowWebServiceImplPortBinding</con:interface><con:operation>bookPayment</con:operation><con:request name="Book Payment"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:encoding>UTF-8</con:encoding><con:endpoint>${#Project#ServiceEndpoint}/ShopFlowService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:shop="http://ecommerce.resurs.com/v4/msg/shopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <shop:bookPayment>
         <paymentSessionId>${#SessionID}</paymentSessionId>
         <preferredPaymentId>Pay-${#ID}</preferredPaymentId>
         <waitForFraudControl>true</waitForFraudControl>
         <annulIfFrozen>false</annulIfFrozen>
         <metaData>
            <key>Expressfrakt</key>
            <value>true</value>
         </metaData>
         <priority>100</priority>
      </shop:bookPayment>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:assertion type="SOAP Response"/><con:assertion type="Schema Compliance"><con:configuration/></con:assertion><con:assertion type="SOAP Fault Assertion"/><con:credentials><con:username>${#Project#BasicAuthUser}</con:username><con:password>${#Project#BasicAuthPass}</con:password><con:domain/><con:authType>No Authorization</con:authType></con:credentials><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508"/><con:wsrmConfig version="1.2"/></con:request></con:config></con:testStep><con:testStep type="transfer" name="Get Actual Payment ID" disabled="true"><con:settings/><con:config xsi:type="con:PropertyTransfersStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:transfers setNullOnMissingSource="true" transferTextContent="true" failOnError="true" ignoreEmpty="false" transferToAll="false" useXQuery="false" entitize="false" transferChildNodes="false"><con:name>Payment ID</con:name><con:sourceType>Response</con:sourceType><con:sourceStep>Book Payment</con:sourceStep><con:sourcePath>declare namespace soapenv='http://schemas.xmlsoap.org/soap/envelope/';
declare namespace shop='http://ecommerce.resurs.com/v4/msg/shopflow';
/soapenv:Envelope/soapenv:Body/shop:bookPaymentResponse/return/paymentId</con:sourcePath><con:targetType>ActualPaymentID</con:targetType><con:targetStep>#TestCase#</con:targetStep><con:targetPath/></con:transfers></con:config></con:testStep><con:testStep type="delay" name="Wait (#1)" disabled="true"><con:settings/><con:config><delay>250</delay></con:config></con:testStep><con:testStep type="request" name="Finalize Payment (By Amount)" disabled="true"><con:settings/><con:config xsi:type="con:RequestStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:interface>AfterShopFlowWebServiceImplPortBinding</con:interface><con:operation>finalizePayment</con:operation><con:request name="Finalize Payment (By Amount)"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:encoding>UTF-8</con:encoding><con:endpoint>${#Project#ServiceEndpoint}/AfterShopFlowService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:aft="http://ecommerce.resurs.com/v4/msg/aftershopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <aft:finalizePayment>
         <paymentId>${#TestCase#ActualPaymentID}</paymentId>
         <preferredTransactionId>TrD-${#ID}</preferredTransactionId>
         <partPaymentSpec>
            <totalAmount>30.00</totalAmount>
            <totalVatAmount>6.00</totalVatAmount>
         </partPaymentSpec>
         <orderId>Ord-${#ID}</orderId>
         <orderDate>${#Date}</orderDate>
         <invoiceId>DebInv-${#ID}</invoiceId>
         <invoiceDate>${#Date}</invoiceDate>
      </aft:finalizePayment>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:assertion type="SOAP Response"/><con:assertion type="Schema Compliance"><con:configuration/></con:assertion><con:assertion type="SOAP Fault Assertion"/><con:assertion type="Simple Contains" name="Contains no error"><con:configuration><token>finalizePaymentResponse</token><ignoreCase>false</ignoreCase><useRegEx>false</useRegEx></con:configuration></con:assertion><con:credentials><con:username>${#Project#BasicAuthUser}</con:username><con:password>${#Project#BasicAuthPass}</con:password><con:domain/><con:authType>No Authorization</con:authType></con:credentials><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508"/><con:wsrmConfig version="1.2"/></con:request></con:config></con:testStep><con:testStep type="delay" name="Wait (#2)" disabled="true"><con:settings/><con:config><delay>250</delay></con:config></con:testStep><con:testStep type="request" name="Credit Payment (Unspecified)" disabled="true"><con:settings/><con:config xsi:type="con:RequestStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:interface>AfterShopFlowWebServiceImplPortBinding</con:interface><con:operation>creditPayment</con:operation><con:request name="Credit Payment (Unspecified)"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:encoding>UTF-8</con:encoding><con:endpoint>${#Project#ServiceEndpoint}/AfterShopFlowService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:aft="http://ecommerce.resurs.com/v4/msg/aftershopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <aft:creditPayment>
         <paymentId>${#TestCase#ActualPaymentID}</paymentId>
         <preferredTransactionId>TrC-${#ID}</preferredTransactionId>
         <creditNoteId>CrN-${#ID}</creditNoteId>
         <creditNoteDate>${#Date}</creditNoteDate>
      </aft:creditPayment>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:assertion type="SOAP Response"/><con:assertion type="Schema Compliance"><con:configuration/></con:assertion><con:assertion type="SOAP Fault Assertion"/><con:credentials><con:username>${#Project#BasicAuthUser}</con:username><con:password>${#Project#BasicAuthPass}</con:password><con:domain/><con:authType>No Authorization</con:authType></con:credentials><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508"/><con:wsrmConfig version="1.2"/></con:request></con:config></con:testStep><con:testStep type="delay" name="Wait (#3)" disabled="true"><con:settings/><con:config><delay>250</delay></con:config></con:testStep><con:testStep type="request" name="Get Payment Details" disabled="true"><con:settings/><con:config xsi:type="con:RequestStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:interface>AfterShopFlowWebServiceImplPortBinding</con:interface><con:operation>getPayment</con:operation><con:request name="Get Payment Details"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:encoding>UTF-8</con:encoding><con:endpoint>${#Project#ServiceEndpoint}/AfterShopFlowService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:aft="http://ecommerce.resurs.com/v4/msg/aftershopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <aft:getPayment>
         <paymentId>${#TestCase#ActualPaymentID}</paymentId>
      </aft:getPayment>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:assertion type="SOAP Response"/><con:assertion type="Schema Compliance"><con:configuration/></con:assertion><con:assertion type="SOAP Fault Assertion"/><con:assertion type="XPath Match" name="Contains AUTHORIZE"><con:configuration><path>declare namespace soap='http://schemas.xmlsoap.org/soap/envelope/';
declare namespace ns3='http://ecommerce.resurs.com/v4/msg/exception';
declare namespace ns2='http://ecommerce.resurs.com/v4/msg/aftershopflow';
/soap:Envelope/soap:Body/ns2:getPaymentResponse/return/paymentDiffs[1]/type/text()</path><content>AUTHORIZE</content><allowWildcards>false</allowWildcards><ignoreNamspaceDifferences>false</ignoreNamspaceDifferences><ignoreComments>false</ignoreComments></con:configuration></con:assertion><con:assertion type="XPath Match" name="Contains DEBIT"><con:configuration><path>declare namespace ns2='http://ecommerce.resurs.com/v4/msg/exception';
declare namespace soap='http://schemas.xmlsoap.org/soap/envelope/';
declare namespace ns3='http://ecommerce.resurs.com/v4/msg/aftershopflow';
/soap:Envelope/soap:Body/ns3:getPaymentResponse/return/paymentDiffs[2]/type/text()</path><content>DEBIT</content><allowWildcards>false</allowWildcards><ignoreNamspaceDifferences>false</ignoreNamspaceDifferences><ignoreComments>false</ignoreComments></con:configuration></con:assertion><con:assertion type="XPath Match" name="Contains CREDIT"><con:configuration><path>declare namespace ns2='http://ecommerce.resurs.com/v4/msg/exception';
declare namespace soap='http://schemas.xmlsoap.org/soap/envelope/';
declare namespace ns3='http://ecommerce.resurs.com/v4/msg/aftershopflow';
/soap:Envelope/soap:Body/ns3:getPaymentResponse/return/paymentDiffs[3]/type/text()</path><content>CREDIT</content><allowWildcards>false</allowWildcards><ignoreNamspaceDifferences>false</ignoreNamspaceDifferences><ignoreComments>false</ignoreComments></con:configuration></con:assertion><con:assertion type="XPath Match" name="Total Amount is Zero"><con:configuration><path>declare namespace soap='http://schemas.xmlsoap.org/soap/envelope/';
declare namespace ns3='http://ecommerce.resurs.com/v4/msg/exception';
declare namespace ns2='http://ecommerce.resurs.com/v4/msg/aftershopflow';
/soap:Envelope/soap:Body/ns2:getPaymentResponse/return/totalAmount/number()</path><content>0.0</content><allowWildcards>false</allowWildcards><ignoreNamspaceDifferences>false</ignoreNamspaceDifferences><ignoreComments>false</ignoreComments></con:configuration></con:assertion><con:assertion type="XPath Match" name="Limit is OK"><con:configuration><path>declare namespace soap='http://schemas.xmlsoap.org/soap/envelope/';
declare namespace ns3='http://ecommerce.resurs.com/v4/msg/exception';
declare namespace ns2='http://ecommerce.resurs.com/v4/msg/aftershopflow';
/soap:Envelope/soap:Body/ns2:getPaymentResponse/return/limit/number()</path><content>3030.0</content><allowWildcards>false</allowWildcards><ignoreNamspaceDifferences>false</ignoreNamspaceDifferences><ignoreComments>false</ignoreComments></con:configuration></con:assertion><con:assertion type="XPath Match" name="Payment ID is OK"><con:configuration><path>declare namespace soap='http://schemas.xmlsoap.org/soap/envelope/';
declare namespace ns3='http://ecommerce.resurs.com/v4/msg/exception';
declare namespace ns2='http://ecommerce.resurs.com/v4/msg/aftershopflow';
/soap:Envelope/soap:Body/ns2:getPaymentResponse/return/id/text()</path><content>${#TestCase#ActualPaymentID}</content><allowWildcards>false</allowWildcards><ignoreNamspaceDifferences>false</ignoreNamspaceDifferences><ignoreComments>false</ignoreComments></con:configuration></con:assertion><con:assertion type="XPath Match" name="Debit Transaction ID is OK"><con:configuration><path>declare namespace soap='http://schemas.xmlsoap.org/soap/envelope/';
declare namespace ns3='http://ecommerce.resurs.com/v4/msg/exception';
declare namespace ns2='http://ecommerce.resurs.com/v4/msg/aftershopflow';
/soap:Envelope/soap:Body/ns2:getPaymentResponse/return/paymentDiffs[2]/transactionId/text()</path><content>TrD-${#ID}</content><allowWildcards>false</allowWildcards><ignoreNamspaceDifferences>false</ignoreNamspaceDifferences><ignoreComments>false</ignoreComments></con:configuration></con:assertion><con:assertion type="XPath Match" name="Debit Order ID is OK"><con:configuration><path>declare namespace soap='http://schemas.xmlsoap.org/soap/envelope/';
declare namespace ns3='http://ecommerce.resurs.com/v4/msg/exception';
declare namespace ns2='http://ecommerce.resurs.com/v4/msg/aftershopflow';
/soap:Envelope/soap:Body/ns2:getPaymentResponse/return/paymentDiffs[2]/orderId/text()</path><content>Ord-${#ID}</content><allowWildcards>false</allowWildcards><ignoreNamspaceDifferences>false</ignoreNamspaceDifferences><ignoreComments>false</ignoreComments></con:configuration></con:assertion><con:assertion type="XPath Match" name="Credit Transaction ID is OK"><con:configuration><path>declare namespace soap='http://schemas.xmlsoap.org/soap/envelope/';
declare namespace ns3='http://ecommerce.resurs.com/v4/msg/exception';
declare namespace ns2='http://ecommerce.resurs.com/v4/msg/aftershopflow';
/soap:Envelope/soap:Body/ns2:getPaymentResponse/return/paymentDiffs[3]/transactionId/text()</path><content>TrC-${#ID}</content><allowWildcards>false</allowWildcards><ignoreNamspaceDifferences>false</ignoreNamspaceDifferences><ignoreComments>false</ignoreComments></con:configuration></con:assertion><con:assertion type="XPath Match" name="Does not Contain Store"><con:configuration><path>declare namespace ns2='http://ecommerce.resurs.com/v4/msg/exception';
declare namespace soap='http://schemas.xmlsoap.org/soap/envelope/';
declare namespace ns3='http://ecommerce.resurs.com/v4/msg/aftershopflow';
count(/soap:Envelope/soap:Body/ns3:getPaymentResponse/return/storeId)</path><content>0</content><allowWildcards>false</allowWildcards><ignoreNamspaceDifferences>false</ignoreNamspaceDifferences><ignoreComments>false</ignoreComments></con:configuration></con:assertion><con:credentials><con:username>${#Project#BasicAuthUser}</con:username><con:password>${#Project#BasicAuthPass}</con:password><con:domain/><con:authType>No Authorization</con:authType></con:credentials><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508"/><con:wsrmConfig version="1.2"/></con:request></con:config></con:testStep><con:properties><con:property><con:name>ActualPaymentID</con:name><con:value>Pay-1364397643699-4330</con:value></con:property><con:property><con:name>SigningURL</con:name><con:value>http://dummy.esign.pte.loc/sign.html?signId=a2b63c70-09e8-4861-843b-dc72af70d1ea&amp;lang=sv</con:value></con:property><con:property><con:name>SignID</con:name><con:value>http://dummy.esign.pte.loc/sign.html?signId=8a4bce96-d6ad-45d8-beb2-d1c84d32ceb3&amp;lang=sv</con:value></con:property><con:property><con:name>StatusChangeURL</con:name><con:value>http://dummy.esign.pte.loc/changeResult.html?signId=a2b63c70-09e8-4861-843b-dc72af70d1ea&amp;lang=sv&amp;success=true</con:value></con:property></con:properties></con:testCase><con:testCase failOnError="true" failTestCaseOnErrors="true" keepSession="false" maxResults="0" name="Invoice - Book &amp; Annul" searchProperties="true" id="18af79a0-7d77-43a2-a0e4-08a640884287"><con:description>Books an invoice purchase, then annuls it.</con:description><con:settings/><con:testStep type="groovy" name="Generate Parameters"><con:settings/><con:config><script>// *** Set basic parameters
String id = System.currentTimeMillis() + "-" + (int)(Math.random() * 10000);
context.setProperty("ID", id);
context.setProperty("SessionID", "Sess-" + id)
context.setProperty("Date", new Date().format('yyyy-MM-dd'))

// *** Get parameters 
def yearFrom = Integer.parseInt(testRunner.testCase.testSuite.project.getPropertyValue("Approved_StartYear"));
def yearTo = Integer.parseInt(testRunner.testCase.testSuite.project.getPropertyValue("Approved_EndYear"));
def String[] ordinals = testRunner.testCase.testSuite.project.getPropertyValue("Ordinals_NotFrozen").split(",");

// *** Generate Swedish government identity
String governmentId = null;
Random random = new Random();
int year = yearFrom + random.nextInt(yearTo - yearFrom);
int dayOfYear = 1 + random.nextInt(365);
Calendar calendar = GregorianCalendar.getInstance();
calendar.set(Calendar.YEAR, year);
calendar.set(Calendar.DAY_OF_YEAR, dayOfYear);
int ordinal = Integer.parseInt(ordinals[random.nextInt(ordinals.length)].trim());
number = random.nextInt(100);
governmentId = String.format("%1\$ty%1\$tm%1\$td%2\$02d%3\$d", calendar.getTime(), number, ordinal);
int sum = 0;
boolean isAlternate = true;
for (int digit = governmentId.length() - 1; digit >= 0; digit--) {
	int value = Integer.parseInt(governmentId.substring(digit, digit + 1));
	if (isAlternate) {
		value *= 2;
		if (value > 9) {
			value = (value % 10) + 1;
		}
	}
sum += value;
isAlternate = !isAlternate 	
} 
int higherDec = (int) (Math.ceil(sum / 10.0f) * 10);
int luhnDigit = higherDec - sum;
governmentId = governmentId + luhnDigit;
context.setProperty("GovernmentID", governmentId);

// *** Log parameters
log.info (
	"Starting session " + context.getProperty("SessionID") + " for " + 
	context.getProperty("GovernmentID") + " on " + context.getProperty("Date"));
</script></con:config></con:testStep><con:testStep type="request" name="Start Payment Session"><con:settings/><con:config xsi:type="con:RequestStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:interface>ShopFlowWebServiceImplPortBinding</con:interface><con:operation>startPaymentSession</con:operation><con:request name="Start Payment Session"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:encoding>UTF-8</con:encoding><con:endpoint>${#Project#ServiceEndpoint}/ShopFlowService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:shop="http://ecommerce.resurs.com/v4/msg/shopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <shop:startPaymentSession>
         <preferredId>${#SessionID}</preferredId>
         <paymentMethodId>${#Project#PaymentMethodID_Invoice}</paymentMethodId>
         <customerIpAddress>127.0.0.2</customerIpAddress>
         <formAction>AFormAction</formAction>
         <paymentSpec>
            <specLines>
               <id>1</id>
               <artNo>NUT-001</artNo>
               <description>Nut (M8)</description>
               <quantity>10</quantity>
               <unitMeasure>st</unitMeasure>
               <unitAmountWithoutVat>0.80</unitAmountWithoutVat>
               <vatPct>25</vatPct>
               <totalVatAmount>2.00</totalVatAmount>
               <totalAmount>10.00</totalAmount>
            </specLines>
            <specLines>
               <id>2</id>
               <artNo>BOLT-002</artNo>
               <description>Bolt (M8x125mm)</description>
               <quantity>10</quantity>
               <unitMeasure>st</unitMeasure>
               <unitAmountWithoutVat>1.60</unitAmountWithoutVat>
               <vatPct>25</vatPct>
               <totalVatAmount>4.00</totalVatAmount>
               <totalAmount>20.00</totalAmount>
            </specLines>
            <totalAmount>30.00</totalAmount>
            <totalVatAmount>6.00</totalVatAmount>
         </paymentSpec>
      </shop:startPaymentSession>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:assertion type="SOAP Response"/><con:assertion type="Schema Compliance"><con:configuration/></con:assertion><con:assertion type="SOAP Fault Assertion"/><con:assertion type="Simple Contains" name="Contains Session Identity"><con:configuration><token>&lt;id>${#SessionID}&lt;/id></token><ignoreCase>false</ignoreCase><useRegEx>false</useRegEx></con:configuration></con:assertion><con:assertion type="Simple Contains" name="Contains Limit Application Form as Object"><con:configuration><token>(?s).*&lt;limitApplicationFormAsObjectGraph>[\S\s]*&lt;/limitApplicationFormAsObjectGraph>.*</token><ignoreCase>false</ignoreCase><useRegEx>true</useRegEx></con:configuration></con:assertion><con:assertion type="Simple Contains" name="Contains Limit Application Form as Form"><con:configuration><token>(?s).*&lt;limitApplicationFormAsCompiledForm>[\S\s]*&lt;/limitApplicationFormAsCompiledForm>.*</token><ignoreCase>false</ignoreCase><useRegEx>true</useRegEx></con:configuration></con:assertion><con:credentials><con:username>${#Project#BasicAuthUser}</con:username><con:password>${#Project#BasicAuthPass}</con:password><con:domain/><con:authType>No Authorization</con:authType></con:credentials><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508"/><con:wsrmConfig version="1.2"/></con:request></con:config></con:testStep><con:testStep type="request" name="Create Limit (OK)"><con:settings/><con:config xsi:type="con:RequestStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:interface>ShopFlowWebServiceImplPortBinding</con:interface><con:operation>submitLimitApplication</con:operation><con:request name="Create Limit (OK)"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:encoding>UTF-8</con:encoding><con:endpoint>${#Project#ServiceEndpoint}/ShopFlowService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:shop="http://ecommerce.resurs.com/v4/msg/shopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <shop:submitLimitApplication>
         <paymentSessionId>${#SessionID}</paymentSessionId>
         <yourCustomerId>Cust-${#ID}</yourCustomerId>
         <formDataResponse><![CDATA[
<resurs-response>
    <amount>300.00</amount>
    <applicant-government-id>${#GovernmentID}</applicant-government-id>
    <applicant-telephone-number></applicant-telephone-number>
    <applicant-mobile-number>0705-12 35 46</applicant-mobile-number>
    <applicant-email-address>javatest@resurs.se</applicant-email-address>
</resurs-response>
            ]]]]>><![CDATA[</formDataResponse>
      </shop:submitLimitApplication>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:assertion type="SOAP Response"/><con:assertion type="Schema Compliance"><con:configuration/></con:assertion><con:assertion type="SOAP Fault Assertion"/><con:assertion type="Simple Contains" name="Limit is Granted"><con:configuration><token>&lt;decision>GRANTED&lt;/decision></token><ignoreCase>false</ignoreCase><useRegEx>false</useRegEx></con:configuration></con:assertion><con:assertion type="Simple Contains" name="Customer is of Type Natural"><con:configuration><token>&lt;type>NATURAL&lt;/type></token><ignoreCase>false</ignoreCase><useRegEx>false</useRegEx></con:configuration></con:assertion><con:credentials><con:username>${#Project#BasicAuthUser}</con:username><con:password>${#Project#BasicAuthPass}</con:password><con:domain/><con:authType>No Authorization</con:authType></con:credentials><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508"/><con:wsrmConfig version="1.2"/></con:request></con:config></con:testStep><con:testStep type="request" name="Prepare Signing"><con:settings/><con:config xsi:type="con:RequestStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:interface>ShopFlowWebServiceImplPortBinding</con:interface><con:operation>prepareSigning</con:operation><con:request name="Prepare Signing"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:encoding>UTF-8</con:encoding><con:endpoint>${#Project#ServiceEndpoint}/ShopFlowService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:shop="http://ecommerce.resurs.com/v4/msg/shopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <shop:prepareSigning>
         <paymentSessionId>${#SessionID}</paymentSessionId>
         <successUrl>http://www.google.com/search?q=OK</successUrl>
         <failUrl>http://www.google.com/search?q=NOK</failUrl>
      </shop:prepareSigning>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:assertion type="SOAP Response"/><con:assertion type="Schema Compliance"><con:configuration/></con:assertion><con:credentials><con:username>${#Project#BasicAuthUser}</con:username><con:password>${#Project#BasicAuthPass}</con:password><con:domain/><con:authType>No Authorization</con:authType></con:credentials><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508"/><con:wsrmConfig version="1.2"/></con:request></con:config></con:testStep><con:testStep type="goto" name="Is Bad Customer"><con:settings/><con:config xsi:type="con:GotoStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:condition><con:name>Is Bad Customer</con:name><con:type>XPATH</con:type><con:expression>declare namespace soap='http://schemas.xmlsoap.org/soap/envelope/';
declare namespace ns3='http://ecommerce.resurs.com/v4/msg/exception';
declare namespace ns2='http://ecommerce.resurs.com/v4/msg/shopflow';
contains(/soap:Envelope/soap:Body/soap:Fault/detail/ns3:ECommerceError/userErrorMessage/text(), "Oklarheter kring existerande krediter")</con:expression><con:targetStep>Generate Parameters</con:targetStep></con:condition></con:config></con:testStep><con:testStep type="transfer" name="Extract Signing URL"><con:settings/><con:config xsi:type="con:PropertyTransfersStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:transfers setNullOnMissingSource="true" transferTextContent="true" failOnError="true" ignoreEmpty="false" transferToAll="false" useXQuery="false" entitize="false" transferChildNodes="false" disabled="false"><con:name>Retrieve Signing URL</con:name><con:sourceType>Response</con:sourceType><con:sourceStep>Prepare Signing</con:sourceStep><con:sourcePath>declare namespace soap='http://schemas.xmlsoap.org/soap/envelope/';
declare namespace ns3='http://ecommerce.resurs.com/v4/msg/shopflow';
//soap:Envelope/soap:Body/ns3:prepareSigningResponse/return/text()</con:sourcePath><con:targetType>SigningURL</con:targetType><con:targetStep>#TestCase#</con:targetStep><con:targetPath>
</con:targetPath></con:transfers></con:config></con:testStep><con:testStep type="groovy" name="Process Signing URL"><con:settings/><con:config><script>// *** Convert the signing URL to the sign OK/NOK URL
def fullURL = testRunner.testCase.getPropertyValue( "SigningURL" )
def statusChangeURL = fullURL.replaceAll("sign.html", "changeResult.html");
statusChangeURL=statusChangeURL+"&amp;success=true";
//log.info "statusChangeURL = " + statusChangeURL;
testRunner.testCase.setPropertyValue("StatusChangeURL", statusChangeURL);
</script></con:config></con:testStep><con:testStep type="httprequest" name="Sign Agreement (OK)"><con:settings/><con:config method="GET" xsi:type="con:HttpRequest" name="Sign Agreement (OK)" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:endpoint>${#TestCase#StatusChangeURL}</con:endpoint><con:request/><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:parameters/></con:config></con:testStep><con:testStep type="request" name="Book Payment"><con:settings/><con:config xsi:type="con:RequestStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:interface>ShopFlowWebServiceImplPortBinding</con:interface><con:operation>bookPayment</con:operation><con:request name="Book Payment"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:encoding>UTF-8</con:encoding><con:endpoint>${#Project#ServiceEndpoint}/ShopFlowService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:shop="http://ecommerce.resurs.com/v4/msg/shopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <shop:bookPayment>
         <paymentSessionId>${#SessionID}</paymentSessionId>
         <waitForFraudControl>true</waitForFraudControl>
         <annulIfFrozen>false</annulIfFrozen>
         <metaData>
            <key>Expressfrakt</key>
            <value>true</value>
         </metaData>
         <priority>100</priority>
      </shop:bookPayment>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:assertion type="SOAP Response"/><con:assertion type="Schema Compliance"><con:configuration/></con:assertion><con:assertion type="SOAP Fault Assertion"/><con:credentials><con:username>${#Project#BasicAuthUser}</con:username><con:password>${#Project#BasicAuthPass}</con:password><con:domain/><con:authType>No Authorization</con:authType></con:credentials><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508"/><con:wsrmConfig version="1.2"/></con:request></con:config></con:testStep><con:testStep type="transfer" name="Get Actual Payment ID"><con:settings/><con:config xsi:type="con:PropertyTransfersStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:transfers setNullOnMissingSource="true" transferTextContent="true" failOnError="true" ignoreEmpty="false" transferToAll="false" useXQuery="false" entitize="false" transferChildNodes="false"><con:name>Payment ID</con:name><con:sourceType>Response</con:sourceType><con:sourceStep>Book Payment</con:sourceStep><con:sourcePath>declare namespace soapenv='http://schemas.xmlsoap.org/soap/envelope/';
declare namespace shop='http://ecommerce.resurs.com/v4/msg/shopflow';
/soapenv:Envelope/soapenv:Body/shop:bookPaymentResponse/return/paymentId</con:sourcePath><con:targetType>ActualPaymentID</con:targetType><con:targetStep>#TestCase#</con:targetStep><con:targetPath/></con:transfers></con:config></con:testStep><con:testStep type="delay" name="Wait (#1)"><con:settings/><con:config><delay>250</delay></con:config></con:testStep><con:testStep type="request" name="Annul Payment (Unspecified)"><con:settings/><con:config xsi:type="con:RequestStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:interface>AfterShopFlowWebServiceImplPortBinding</con:interface><con:operation>annulPayment</con:operation><con:request name="Annul Payment (Unspecified)"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:encoding>UTF-8</con:encoding><con:endpoint>${#Project#ServiceEndpoint}/AfterShopFlowService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:aft="http://ecommerce.resurs.com/v4/msg/aftershopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <aft:annulPayment>
         <paymentId>${#TestCase#ActualPaymentID}</paymentId>
      </aft:annulPayment>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:assertion type="SOAP Response"/><con:assertion type="Schema Compliance"><con:configuration/></con:assertion><con:assertion type="SOAP Fault Assertion"/><con:credentials><con:username>${#Project#BasicAuthUser}</con:username><con:password>${#Project#BasicAuthPass}</con:password><con:domain/><con:authType>No Authorization</con:authType></con:credentials><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508"/><con:wsrmConfig version="1.2"/></con:request></con:config></con:testStep><con:testStep type="delay" name="Wait (#2)"><con:settings/><con:config><delay>250</delay></con:config></con:testStep><con:testStep type="request" name="Get Payment Details"><con:settings/><con:config xsi:type="con:RequestStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:interface>AfterShopFlowWebServiceImplPortBinding</con:interface><con:operation>getPayment</con:operation><con:request name="Get Payment Details"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:encoding>UTF-8</con:encoding><con:endpoint>${#Project#ServiceEndpoint}/AfterShopFlowService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:aft="http://ecommerce.resurs.com/v4/msg/aftershopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <aft:getPayment>
         <paymentId>${#TestCase#ActualPaymentID}</paymentId>
      </aft:getPayment>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:assertion type="SOAP Response"/><con:assertion type="Schema Compliance"><con:configuration/></con:assertion><con:assertion type="SOAP Fault Assertion"/><con:assertion type="XPath Match" name="Contains AUTHORIZE"><con:configuration><path>declare namespace soap='http://schemas.xmlsoap.org/soap/envelope/';
declare namespace ns3='http://ecommerce.resurs.com/v4/msg/exception';
declare namespace ns2='http://ecommerce.resurs.com/v4/msg/aftershopflow';
/soap:Envelope/soap:Body/ns2:getPaymentResponse/return/paymentDiffs[1]/type/text()</path><content>AUTHORIZE</content><allowWildcards>false</allowWildcards><ignoreNamspaceDifferences>false</ignoreNamspaceDifferences><ignoreComments>false</ignoreComments></con:configuration></con:assertion><con:assertion type="XPath Match" name="Contains ANNUL"><con:configuration><path>declare namespace soap='http://schemas.xmlsoap.org/soap/envelope/';
declare namespace ns3='http://ecommerce.resurs.com/v4/msg/exception';
declare namespace ns2='http://ecommerce.resurs.com/v4/msg/aftershopflow';
/soap:Envelope/soap:Body/ns2:getPaymentResponse/return/paymentDiffs[2]/type/text()</path><content>ANNUL</content><allowWildcards>false</allowWildcards><ignoreNamspaceDifferences>false</ignoreNamspaceDifferences><ignoreComments>false</ignoreComments></con:configuration></con:assertion><con:assertion type="XPath Match" name="Total Amount is 0"><con:configuration><path>declare namespace ns2='http://ecommerce.resurs.com/v4/msg/exception';
declare namespace soap='http://schemas.xmlsoap.org/soap/envelope/';
declare namespace ns3='http://ecommerce.resurs.com/v4/msg/aftershopflow';
/soap:Envelope/soap:Body/ns3:getPaymentResponse/return/totalAmount/text()</path><content>0.*</content><allowWildcards>true</allowWildcards><ignoreNamspaceDifferences>false</ignoreNamspaceDifferences><ignoreComments>false</ignoreComments></con:configuration></con:assertion><con:assertion type="XPath Match" name="Government Id is OK"><con:configuration><path>declare namespace ns2='http://ecommerce.resurs.com/v4/msg/exception';
declare namespace soap='http://schemas.xmlsoap.org/soap/envelope/';
declare namespace ns3='http://ecommerce.resurs.com/v4/msg/aftershopflow';
/soap:Envelope/soap:Body/ns3:getPaymentResponse/return/customer/governmentId/text()</path><content>${#GovernmentID}</content><allowWildcards>false</allowWildcards><ignoreNamspaceDifferences>false</ignoreNamspaceDifferences><ignoreComments>false</ignoreComments></con:configuration></con:assertion><con:assertion type="XPath Match" name="Payment Session Id is OK"><con:configuration><path>declare namespace soap='http://schemas.xmlsoap.org/soap/envelope/';
declare namespace ns3='http://ecommerce.resurs.com/v4/msg/exception';
declare namespace ns2='http://ecommerce.resurs.com/v4/msg/aftershopflow';
/soap:Envelope/soap:Body/ns2:getPaymentResponse/return/id/text()</path><content>${#SessionID}</content><allowWildcards>false</allowWildcards><ignoreNamspaceDifferences>false</ignoreNamspaceDifferences><ignoreComments>false</ignoreComments></con:configuration></con:assertion><con:credentials><con:username>${#Project#BasicAuthUser}</con:username><con:password>${#Project#BasicAuthPass}</con:password><con:domain/><con:authType>No Authorization</con:authType></con:credentials><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508"/><con:wsrmConfig version="1.2"/></con:request></con:config></con:testStep><con:properties><con:property><con:name>ActualPaymentID</con:name><con:value>Sess-1417516501345-9097</con:value></con:property><con:property><con:name>SigningURL</con:name><con:value xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">http://test.resurs.com/signicat-mock-server/sign.html?request_id=6d1b6f2c-30c8-445f-96e9-1a7d4aca34ac&amp;task_id=1</con:value></con:property><con:property><con:name>SignID</con:name><con:value>http://dummy.esign.pte.loc/sign.html?signId=8a4bce96-d6ad-45d8-beb2-d1c84d32ceb3&amp;lang=sv</con:value></con:property><con:property><con:name>StatusChangeURL</con:name><con:value>http://test.resurs.com/signicat-mock-server/changeResult.html?request_id=6d1b6f2c-30c8-445f-96e9-1a7d4aca34ac&amp;task_id=1&amp;success=true</con:value></con:property></con:properties></con:testCase><con:testCase failOnError="true" failTestCaseOnErrors="true" keepSession="false" maxResults="0" name="Invoice - Book &amp; Annul (All Unspecified)" searchProperties="true" id="8b4ad238-1daa-42f5-b383-f9044355afb2"><con:description>Books an invoice purchase, then annuls it.
No specifications are used anywhere; just amounts!</con:description><con:settings/><con:testStep type="groovy" name="Generate Parameters"><con:settings/><con:config><script>// *** Set basic parameters
String id = System.currentTimeMillis() + "-" + (int)(Math.random() * 10000);
context.setProperty("ID", id);
context.setProperty("SessionID", "Sess-" + id)
context.setProperty("Date", new Date().format('yyyy-MM-dd'))

// *** Get parameters 
def yearFrom = Integer.parseInt(testRunner.testCase.testSuite.project.getPropertyValue("Approved_StartYear"));
def yearTo = Integer.parseInt(testRunner.testCase.testSuite.project.getPropertyValue("Approved_EndYear"));
def String[] ordinals = testRunner.testCase.testSuite.project.getPropertyValue("Ordinals_NotFrozen").split(",");

// *** Generate Swedish government identity
String governmentId = null;
Random random = new Random();
int year = yearFrom + random.nextInt(yearTo - yearFrom);
int dayOfYear = 1 + random.nextInt(365);
Calendar calendar = GregorianCalendar.getInstance();
calendar.set(Calendar.YEAR, year);
calendar.set(Calendar.DAY_OF_YEAR, dayOfYear);
int ordinal = Integer.parseInt(ordinals[random.nextInt(ordinals.length)].trim());
number = random.nextInt(100);
governmentId = String.format("%1\$ty%1\$tm%1\$td%2\$02d%3\$d", calendar.getTime(), number, ordinal);
int sum = 0;
boolean isAlternate = true;
for (int digit = governmentId.length() - 1; digit >= 0; digit--) {
	int value = Integer.parseInt(governmentId.substring(digit, digit + 1));
	if (isAlternate) {
		value *= 2;
		if (value > 9) {
			value = (value % 10) + 1;
		}
	}
sum += value;
isAlternate = !isAlternate 	
} 
int higherDec = (int) (Math.ceil(sum / 10.0f) * 10);
int luhnDigit = higherDec - sum;
governmentId = governmentId + luhnDigit;
context.setProperty("GovernmentID", governmentId);

// *** Log parameters
log.info (
	"Starting session " + context.getProperty("SessionID") + " for " + 
	context.getProperty("GovernmentID") + " on " + context.getProperty("Date"));
</script></con:config></con:testStep><con:testStep type="request" name="Start Payment Session (Unspecified)"><con:settings/><con:config xsi:type="con:RequestStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:interface>ShopFlowWebServiceImplPortBinding</con:interface><con:operation>startPaymentSession</con:operation><con:request name="Start Payment Session (Unspecified)"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:encoding>UTF-8</con:encoding><con:endpoint>${#Project#ServiceEndpoint}/ShopFlowService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:shop="http://ecommerce.resurs.com/v4/msg/shopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <shop:startPaymentSession>
         <preferredId>${#SessionID}</preferredId>
         <paymentMethodId>${#Project#PaymentMethodID_Invoice}</paymentMethodId>
         <customerIpAddress>127.0.0.2</customerIpAddress>
         <formAction>AFormAction</formAction>
         <paymentSpec>
            <totalAmount>30.00</totalAmount>
            <!--totalVatAmount>6.00</totalVatAmount-->
         </paymentSpec>
      </shop:startPaymentSession>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:assertion type="SOAP Response"/><con:assertion type="Schema Compliance"><con:configuration/></con:assertion><con:assertion type="SOAP Fault Assertion"/><con:assertion type="Simple Contains" name="Contains Session Identity"><con:configuration><token>&lt;id>${#SessionID}&lt;/id></token><ignoreCase>false</ignoreCase><useRegEx>false</useRegEx></con:configuration></con:assertion><con:assertion type="Simple Contains" name="Contains Limit Application Form as Object"><con:configuration><token>(?s).*&lt;limitApplicationFormAsObjectGraph>[\S\s]*&lt;/limitApplicationFormAsObjectGraph>.*</token><ignoreCase>false</ignoreCase><useRegEx>true</useRegEx></con:configuration></con:assertion><con:assertion type="Simple Contains" name="Contains Limit Application Form as Form"><con:configuration><token>(?s).*&lt;limitApplicationFormAsCompiledForm>[\S\s]*&lt;/limitApplicationFormAsCompiledForm>.*</token><ignoreCase>false</ignoreCase><useRegEx>true</useRegEx></con:configuration></con:assertion><con:credentials><con:username>${#Project#BasicAuthUser}</con:username><con:password>${#Project#BasicAuthPass}</con:password><con:domain/><con:authType>No Authorization</con:authType></con:credentials><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508"/><con:wsrmConfig version="1.2"/></con:request></con:config></con:testStep><con:testStep type="request" name="Create Limit (OK)"><con:settings/><con:config xsi:type="con:RequestStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:interface>ShopFlowWebServiceImplPortBinding</con:interface><con:operation>submitLimitApplication</con:operation><con:request name="Create Limit (OK)"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:encoding>UTF-8</con:encoding><con:endpoint>${#Project#ServiceEndpoint}/ShopFlowService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:shop="http://ecommerce.resurs.com/v4/msg/shopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <shop:submitLimitApplication>
         <paymentSessionId>${#SessionID}</paymentSessionId>
         <yourCustomerId>Cust-${#ID}</yourCustomerId>
         <formDataResponse><![CDATA[
<resurs-response>
    <amount>300.00</amount>
    <applicant-government-id>${#GovernmentID}</applicant-government-id>
    <applicant-telephone-number></applicant-telephone-number>
    <applicant-mobile-number>0705-12 35 46</applicant-mobile-number>
    <applicant-email-address>javatest@resurs.se</applicant-email-address>
</resurs-response>
            ]]]]>><![CDATA[</formDataResponse>
      </shop:submitLimitApplication>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:assertion type="SOAP Response"/><con:assertion type="Schema Compliance"><con:configuration/></con:assertion><con:assertion type="SOAP Fault Assertion"/><con:assertion type="Simple Contains" name="Limit is Granted"><con:configuration><token>&lt;decision>GRANTED&lt;/decision></token><ignoreCase>false</ignoreCase><useRegEx>false</useRegEx></con:configuration></con:assertion><con:assertion type="Simple Contains" name="Customer is of Type Natural"><con:configuration><token>&lt;type>NATURAL&lt;/type></token><ignoreCase>false</ignoreCase><useRegEx>false</useRegEx></con:configuration></con:assertion><con:credentials><con:username>${#Project#BasicAuthUser}</con:username><con:password>${#Project#BasicAuthPass}</con:password><con:domain/><con:authType>No Authorization</con:authType></con:credentials><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508"/><con:wsrmConfig version="1.2"/></con:request></con:config></con:testStep><con:testStep type="request" name="Prepare Signing"><con:settings/><con:config xsi:type="con:RequestStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:interface>ShopFlowWebServiceImplPortBinding</con:interface><con:operation>prepareSigning</con:operation><con:request name="Prepare Signing"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:encoding>UTF-8</con:encoding><con:endpoint>${#Project#ServiceEndpoint}/ShopFlowService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:shop="http://ecommerce.resurs.com/v4/msg/shopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <shop:prepareSigning>
         <paymentSessionId>${#SessionID}</paymentSessionId>
         <successUrl>http://www.google.com/search?q=OK</successUrl>
         <failUrl>http://www.google.com/search?q=NOK</failUrl>
      </shop:prepareSigning>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:assertion type="SOAP Response"/><con:assertion type="Schema Compliance"><con:configuration/></con:assertion><con:credentials><con:username>${#Project#BasicAuthUser}</con:username><con:password>${#Project#BasicAuthPass}</con:password><con:domain/><con:authType>No Authorization</con:authType></con:credentials><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508"/><con:wsrmConfig version="1.2"/></con:request></con:config></con:testStep><con:testStep type="goto" name="Is Bad Customer"><con:settings/><con:config xsi:type="con:GotoStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:condition><con:name>Is Bad Customer</con:name><con:type>XPATH</con:type><con:expression>declare namespace soap='http://schemas.xmlsoap.org/soap/envelope/';
declare namespace ns3='http://ecommerce.resurs.com/v4/msg/exception';
declare namespace ns2='http://ecommerce.resurs.com/v4/msg/shopflow';
contains(/soap:Envelope/soap:Body/soap:Fault/detail/ns3:ECommerceError/userErrorMessage/text(), "Oklarheter kring existerande krediter")</con:expression><con:targetStep>Generate Parameters</con:targetStep></con:condition></con:config></con:testStep><con:testStep type="transfer" name="Extract Signing URL"><con:settings/><con:config xsi:type="con:PropertyTransfersStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:transfers setNullOnMissingSource="true" transferTextContent="true" failOnError="true" ignoreEmpty="false" transferToAll="false" useXQuery="false" entitize="false" transferChildNodes="false" disabled="false"><con:name>Retrieve Signing URL</con:name><con:sourceType>Response</con:sourceType><con:sourceStep>Prepare Signing</con:sourceStep><con:sourcePath>declare namespace soap='http://schemas.xmlsoap.org/soap/envelope/';
declare namespace ns3='http://ecommerce.resurs.com/v4/msg/shopflow';
//soap:Envelope/soap:Body/ns3:prepareSigningResponse/return/text()</con:sourcePath><con:targetType>SigningURL</con:targetType><con:targetStep>#TestCase#</con:targetStep><con:targetPath>
</con:targetPath></con:transfers></con:config></con:testStep><con:testStep type="groovy" name="Process Signing URL"><con:settings/><con:config><script>// *** Convert the signing URL to the sign OK/NOK URL
def fullURL = testRunner.testCase.getPropertyValue( "SigningURL" )
def statusChangeURL = fullURL.replaceAll("sign.html", "changeResult.html");
statusChangeURL=statusChangeURL+"&amp;success=true";
//log.info "statusChangeURL = " + statusChangeURL;
testRunner.testCase.setPropertyValue("StatusChangeURL", statusChangeURL);
</script></con:config></con:testStep><con:testStep type="httprequest" name="Sign Agreement (OK)"><con:settings/><con:config method="GET" xsi:type="con:HttpRequest" name="Sign Agreement (OK)" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:endpoint>${#TestCase#StatusChangeURL}</con:endpoint><con:request/><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:parameters/></con:config></con:testStep><con:testStep type="request" name="Book Payment (Unspecified)"><con:settings/><con:config xsi:type="con:RequestStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:interface>ShopFlowWebServiceImplPortBinding</con:interface><con:operation>bookPayment</con:operation><con:request name="Book Payment (Unspecified)"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:encoding>UTF-8</con:encoding><con:endpoint>${#Project#ServiceEndpoint}/ShopFlowService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:shop="http://ecommerce.resurs.com/v4/msg/shopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <shop:bookPayment>
         <paymentSessionId>${#SessionID}</paymentSessionId>
         <waitForFraudControl>true</waitForFraudControl>
         <annulIfFrozen>false</annulIfFrozen>
         <metaData>
            <key>Expressfrakt</key>
            <value>true</value>
         </metaData>
         <priority>100</priority>
      </shop:bookPayment>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:assertion type="SOAP Response"/><con:assertion type="Schema Compliance"><con:configuration/></con:assertion><con:assertion type="SOAP Fault Assertion"/><con:credentials><con:username>${#Project#BasicAuthUser}</con:username><con:password>${#Project#BasicAuthPass}</con:password><con:domain/><con:authType>No Authorization</con:authType></con:credentials><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508"/><con:wsrmConfig version="1.2"/></con:request></con:config></con:testStep><con:testStep type="transfer" name="Get Actual Payment ID"><con:settings/><con:config xsi:type="con:PropertyTransfersStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:transfers setNullOnMissingSource="true" transferTextContent="true" failOnError="true" ignoreEmpty="false" transferToAll="false" useXQuery="false" entitize="false" transferChildNodes="false"><con:name>Payment ID</con:name><con:sourceType>Response</con:sourceType><con:sourceStep>Book Payment (Unspecified)</con:sourceStep><con:sourcePath>declare namespace soapenv='http://schemas.xmlsoap.org/soap/envelope/';
declare namespace shop='http://ecommerce.resurs.com/v4/msg/shopflow';
/soapenv:Envelope/soapenv:Body/shop:bookPaymentResponse/return/paymentId</con:sourcePath><con:targetType>ActualPaymentID</con:targetType><con:targetStep>#TestCase#</con:targetStep><con:targetPath/></con:transfers></con:config></con:testStep><con:testStep type="delay" name="Wait (#1)"><con:settings/><con:config><delay>250</delay></con:config></con:testStep><con:testStep type="request" name="Annul Payment (Unspecified)"><con:settings/><con:config xsi:type="con:RequestStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:interface>AfterShopFlowWebServiceImplPortBinding</con:interface><con:operation>annulPayment</con:operation><con:request name="Annul Payment (Unspecified)"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:encoding>UTF-8</con:encoding><con:endpoint>${#Project#ServiceEndpoint}/AfterShopFlowService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:aft="http://ecommerce.resurs.com/v4/msg/aftershopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <aft:annulPayment>
         <paymentId>${#TestCase#ActualPaymentID}</paymentId>
      </aft:annulPayment>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:assertion type="SOAP Response"/><con:assertion type="Schema Compliance"><con:configuration/></con:assertion><con:assertion type="SOAP Fault Assertion"/><con:credentials><con:username>${#Project#BasicAuthUser}</con:username><con:password>${#Project#BasicAuthPass}</con:password><con:domain/><con:authType>No Authorization</con:authType></con:credentials><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508"/><con:wsrmConfig version="1.2"/></con:request></con:config></con:testStep><con:testStep type="delay" name="Wait (#2)"><con:settings/><con:config><delay>250</delay></con:config></con:testStep><con:testStep type="request" name="Get Payment Details"><con:settings/><con:config xsi:type="con:RequestStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:interface>AfterShopFlowWebServiceImplPortBinding</con:interface><con:operation>getPayment</con:operation><con:request name="Get Payment Details"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:encoding>UTF-8</con:encoding><con:endpoint>${#Project#ServiceEndpoint}/AfterShopFlowService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:aft="http://ecommerce.resurs.com/v4/msg/aftershopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <aft:getPayment>
         <paymentId>${#TestCase#ActualPaymentID}</paymentId>
      </aft:getPayment>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:assertion type="SOAP Response"/><con:assertion type="Schema Compliance"><con:configuration/></con:assertion><con:assertion type="SOAP Fault Assertion"/><con:assertion type="XPath Match" name="Contains AUTHORIZE"><con:configuration><path>declare namespace soap='http://schemas.xmlsoap.org/soap/envelope/';
declare namespace ns3='http://ecommerce.resurs.com/v4/msg/exception';
declare namespace ns2='http://ecommerce.resurs.com/v4/msg/aftershopflow';
/soap:Envelope/soap:Body/ns2:getPaymentResponse/return/paymentDiffs[1]/type/text()</path><content>AUTHORIZE</content><allowWildcards>false</allowWildcards><ignoreNamspaceDifferences>false</ignoreNamspaceDifferences><ignoreComments>false</ignoreComments></con:configuration></con:assertion><con:assertion type="XPath Match" name="Contains ANNUL"><con:configuration><path>declare namespace soap='http://schemas.xmlsoap.org/soap/envelope/';
declare namespace ns3='http://ecommerce.resurs.com/v4/msg/exception';
declare namespace ns2='http://ecommerce.resurs.com/v4/msg/aftershopflow';
/soap:Envelope/soap:Body/ns2:getPaymentResponse/return/paymentDiffs[2]/type/text()</path><content>ANNUL</content><allowWildcards>false</allowWildcards><ignoreNamspaceDifferences>false</ignoreNamspaceDifferences><ignoreComments>false</ignoreComments></con:configuration></con:assertion><con:assertion type="XPath Match" name="Total Amount is 0"><con:configuration><path>declare namespace ns2='http://ecommerce.resurs.com/v4/msg/exception';
declare namespace soap='http://schemas.xmlsoap.org/soap/envelope/';
declare namespace ns3='http://ecommerce.resurs.com/v4/msg/aftershopflow';
/soap:Envelope/soap:Body/ns3:getPaymentResponse/return/totalAmount/text()</path><content>0.*</content><allowWildcards>true</allowWildcards><ignoreNamspaceDifferences>false</ignoreNamspaceDifferences><ignoreComments>false</ignoreComments></con:configuration></con:assertion><con:assertion type="XPath Match" name="Government Id is OK"><con:configuration><path>declare namespace ns2='http://ecommerce.resurs.com/v4/msg/exception';
declare namespace soap='http://schemas.xmlsoap.org/soap/envelope/';
declare namespace ns3='http://ecommerce.resurs.com/v4/msg/aftershopflow';
/soap:Envelope/soap:Body/ns3:getPaymentResponse/return/customer/governmentId/text()</path><content>${#GovernmentID}</content><allowWildcards>false</allowWildcards><ignoreNamspaceDifferences>false</ignoreNamspaceDifferences><ignoreComments>false</ignoreComments></con:configuration></con:assertion><con:assertion type="XPath Match" name="Payment Session Id is OK"><con:configuration><path>declare namespace soap='http://schemas.xmlsoap.org/soap/envelope/';
declare namespace ns3='http://ecommerce.resurs.com/v4/msg/exception';
declare namespace ns2='http://ecommerce.resurs.com/v4/msg/aftershopflow';
/soap:Envelope/soap:Body/ns2:getPaymentResponse/return/id/text()</path><content>${#SessionID}</content><allowWildcards>false</allowWildcards><ignoreNamspaceDifferences>false</ignoreNamspaceDifferences><ignoreComments>false</ignoreComments></con:configuration></con:assertion><con:credentials><con:username>${#Project#BasicAuthUser}</con:username><con:password>${#Project#BasicAuthPass}</con:password><con:domain/><con:authType>No Authorization</con:authType></con:credentials><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508"/><con:wsrmConfig version="1.2"/></con:request></con:config></con:testStep><con:properties><con:property><con:name>ActualPaymentID</con:name><con:value>Sess-1417516504319-9787</con:value></con:property><con:property><con:name>SigningURL</con:name><con:value xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">http://test.resurs.com/signicat-mock-server/sign.html?request_id=6bbcfeba-0dd0-439f-a483-b26af3afcaf9&amp;task_id=1</con:value></con:property><con:property><con:name>SignID</con:name><con:value>http://dummy.esign.pte.loc/sign.html?signId=8a4bce96-d6ad-45d8-beb2-d1c84d32ceb3&amp;lang=sv</con:value></con:property><con:property><con:name>StatusChangeURL</con:name><con:value>http://test.resurs.com/signicat-mock-server/changeResult.html?request_id=6bbcfeba-0dd0-439f-a483-b26af3afcaf9&amp;task_id=1&amp;success=true</con:value></con:property></con:properties></con:testCase><con:testCase failOnError="true" failTestCaseOnErrors="true" keepSession="false" maxResults="0" name="Invoice - Sell &amp; Credit" searchProperties="true" id="e2acfe3d-45d0-4616-bb3b-1ce6e45e3bed"><con:description>Books an invoice purchase, then credits it.</con:description><con:settings/><con:testStep type="groovy" name="Generate Parameters"><con:settings/><con:config><script>// *** Set basic parameters
String id = System.currentTimeMillis() + "-" + (int)(Math.random() * 10000);
context.setProperty("ID", id);
context.setProperty("SessionID", "Sess-" + id)
context.setProperty("Date", new Date().format('yyyy-MM-dd'))

// *** Get parameters 
def yearFrom = Integer.parseInt(testRunner.testCase.testSuite.project.getPropertyValue("Approved_StartYear"));
def yearTo = Integer.parseInt(testRunner.testCase.testSuite.project.getPropertyValue("Approved_EndYear"));
def String[] ordinals = testRunner.testCase.testSuite.project.getPropertyValue("Ordinals_NotFrozen").split(",");

// *** Generate Swedish government identity
String governmentId = null;
Random random = new Random();
int year = yearFrom + random.nextInt(yearTo - yearFrom);
int dayOfYear = 1 + random.nextInt(365);
Calendar calendar = GregorianCalendar.getInstance();
calendar.set(Calendar.YEAR, year);
calendar.set(Calendar.DAY_OF_YEAR, dayOfYear);
int ordinal = Integer.parseInt(ordinals[random.nextInt(ordinals.length)].trim());
number = random.nextInt(100);
governmentId = String.format("%1\$ty%1\$tm%1\$td%2\$02d%3\$d", calendar.getTime(), number, ordinal);
int sum = 0;
boolean isAlternate = true;
for (int digit = governmentId.length() - 1; digit >= 0; digit--) {
	int value = Integer.parseInt(governmentId.substring(digit, digit + 1));
	if (isAlternate) {
		value *= 2;
		if (value > 9) {
			value = (value % 10) + 1;
		}
	}
sum += value;
isAlternate = !isAlternate 	
} 
int higherDec = (int) (Math.ceil(sum / 10.0f) * 10);
int luhnDigit = higherDec - sum;
governmentId = governmentId + luhnDigit;
context.setProperty("GovernmentID", governmentId);

// *** Log parameters
log.info (
	"Starting session " + context.getProperty("SessionID") + " for " + 
	context.getProperty("GovernmentID") + " on " + context.getProperty("Date"));
</script></con:config></con:testStep><con:testStep type="request" name="Start Payment Session"><con:settings/><con:config xsi:type="con:RequestStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:interface>ShopFlowWebServiceImplPortBinding</con:interface><con:operation>startPaymentSession</con:operation><con:request name="Start Payment Session"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:encoding>UTF-8</con:encoding><con:endpoint>${#Project#ServiceEndpoint}/ShopFlowService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:shop="http://ecommerce.resurs.com/v4/msg/shopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <shop:startPaymentSession>
         <preferredId>${#SessionID}</preferredId>
         <paymentMethodId>${#Project#PaymentMethodID_Invoice}</paymentMethodId>
         <customerIpAddress>127.0.0.2</customerIpAddress>
         <formAction>AFormAction</formAction>
         <paymentSpec>
            <specLines>
               <id>1</id>
               <artNo>NUT-001</artNo>
               <description>Nut (M8)</description>
               <quantity>10</quantity>
               <unitMeasure>st</unitMeasure>
               <unitAmountWithoutVat>0.80</unitAmountWithoutVat>
               <vatPct>25</vatPct>
               <totalVatAmount>2.00</totalVatAmount>
               <totalAmount>10.00</totalAmount>
            </specLines>
            <specLines>
               <id>2</id>
               <artNo>BOLT-002</artNo>
               <description>Bolt (M8x125mm)</description>
               <quantity>10</quantity>
               <unitMeasure>st</unitMeasure>
               <unitAmountWithoutVat>1.60</unitAmountWithoutVat>
               <vatPct>25</vatPct>
               <totalVatAmount>4.00</totalVatAmount>
               <totalAmount>20.00</totalAmount>
            </specLines>
            <totalAmount>30.00</totalAmount>
            <totalVatAmount>6.00</totalVatAmount>
         </paymentSpec>
      </shop:startPaymentSession>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:assertion type="SOAP Response"/><con:assertion type="Schema Compliance"><con:configuration/></con:assertion><con:assertion type="SOAP Fault Assertion"/><con:assertion type="Simple Contains" name="Contains Session Identity"><con:configuration><token>&lt;id>${#SessionID}&lt;/id></token><ignoreCase>false</ignoreCase><useRegEx>false</useRegEx></con:configuration></con:assertion><con:assertion type="Simple Contains" name="Contains Limit Application Form as Object"><con:configuration><token>(?s).*&lt;limitApplicationFormAsObjectGraph>[\S\s]*&lt;/limitApplicationFormAsObjectGraph>.*</token><ignoreCase>false</ignoreCase><useRegEx>true</useRegEx></con:configuration></con:assertion><con:assertion type="Simple Contains" name="Contains Limit Application Form as Form"><con:configuration><token>(?s).*&lt;limitApplicationFormAsCompiledForm>[\S\s]*&lt;/limitApplicationFormAsCompiledForm>.*</token><ignoreCase>false</ignoreCase><useRegEx>true</useRegEx></con:configuration></con:assertion><con:credentials><con:username>${#Project#BasicAuthUser}</con:username><con:password>${#Project#BasicAuthPass}</con:password><con:domain/><con:authType>No Authorization</con:authType></con:credentials><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508"/><con:wsrmConfig version="1.2"/></con:request></con:config></con:testStep><con:testStep type="request" name="Create Limit (OK)"><con:settings/><con:config xsi:type="con:RequestStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:interface>ShopFlowWebServiceImplPortBinding</con:interface><con:operation>submitLimitApplication</con:operation><con:request name="Create Limit (OK)"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:encoding>UTF-8</con:encoding><con:endpoint>${#Project#ServiceEndpoint}/ShopFlowService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:shop="http://ecommerce.resurs.com/v4/msg/shopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <shop:submitLimitApplication>
         <paymentSessionId>${#SessionID}</paymentSessionId>
         <yourCustomerId>Cust-${#ID}</yourCustomerId>
         <formDataResponse><![CDATA[
<resurs-response>
    <amount>300.00</amount>
    <applicant-government-id>${#GovernmentID}</applicant-government-id>
    <applicant-telephone-number></applicant-telephone-number>
    <applicant-mobile-number>0705-12 35 46</applicant-mobile-number>
    <applicant-email-address>javatest@resurs.se</applicant-email-address>
</resurs-response>
            ]]]]>><![CDATA[</formDataResponse>
      </shop:submitLimitApplication>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:assertion type="SOAP Response"/><con:assertion type="Schema Compliance"><con:configuration/></con:assertion><con:assertion type="SOAP Fault Assertion"/><con:assertion type="Simple Contains" name="Limit is Granted"><con:configuration><token>&lt;decision>GRANTED&lt;/decision></token><ignoreCase>false</ignoreCase><useRegEx>false</useRegEx></con:configuration></con:assertion><con:credentials><con:username>${#Project#BasicAuthUser}</con:username><con:password>${#Project#BasicAuthPass}</con:password><con:domain/><con:authType>No Authorization</con:authType></con:credentials><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508"/><con:wsrmConfig version="1.2"/></con:request></con:config></con:testStep><con:testStep type="request" name="Prepare Signing"><con:settings/><con:config xsi:type="con:RequestStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:interface>ShopFlowWebServiceImplPortBinding</con:interface><con:operation>prepareSigning</con:operation><con:request name="Prepare Signing"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:encoding>UTF-8</con:encoding><con:endpoint>${#Project#ServiceEndpoint}/ShopFlowService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:shop="http://ecommerce.resurs.com/v4/msg/shopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <shop:prepareSigning>
         <paymentSessionId>${#SessionID}</paymentSessionId>
         <successUrl>http://www.google.com/search?q=OK</successUrl>
         <failUrl>http://www.google.com/search?q=NOK</failUrl>
      </shop:prepareSigning>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:assertion type="SOAP Response"/><con:assertion type="Schema Compliance"><con:configuration/></con:assertion><con:credentials><con:username>${#Project#BasicAuthUser}</con:username><con:password>${#Project#BasicAuthPass}</con:password><con:domain/><con:authType>No Authorization</con:authType></con:credentials><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508"/><con:wsrmConfig version="1.2"/></con:request></con:config></con:testStep><con:testStep type="goto" name="Is Bad Customer"><con:settings/><con:config xsi:type="con:GotoStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:condition><con:name>Is Bad Customer</con:name><con:type>XPATH</con:type><con:expression>declare namespace soap='http://schemas.xmlsoap.org/soap/envelope/';
declare namespace ns3='http://ecommerce.resurs.com/v4/msg/exception';
declare namespace ns2='http://ecommerce.resurs.com/v4/msg/shopflow';
contains(/soap:Envelope/soap:Body/soap:Fault/detail/ns3:ECommerceError/userErrorMessage/text(), "Oklarheter kring existerande krediter")</con:expression><con:targetStep>Generate Parameters</con:targetStep></con:condition></con:config></con:testStep><con:testStep type="transfer" name="Extract Signing URL"><con:settings/><con:config xsi:type="con:PropertyTransfersStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:transfers setNullOnMissingSource="true" transferTextContent="true" failOnError="true" ignoreEmpty="false" transferToAll="false" useXQuery="false" entitize="false" transferChildNodes="false" disabled="false"><con:name>Retrieve Signing URL</con:name><con:sourceType>Response</con:sourceType><con:sourceStep>Prepare Signing</con:sourceStep><con:sourcePath>declare namespace soap='http://schemas.xmlsoap.org/soap/envelope/';
declare namespace ns3='http://ecommerce.resurs.com/v4/msg/shopflow';
//soap:Envelope/soap:Body/ns3:prepareSigningResponse/return/text()</con:sourcePath><con:targetType>SigningURL</con:targetType><con:targetStep>#TestCase#</con:targetStep><con:targetPath>
</con:targetPath></con:transfers></con:config></con:testStep><con:testStep type="groovy" name="Process Signing URL"><con:settings/><con:config><script>// *** Convert the signing URL to the sign OK/NOK URL
def fullURL = testRunner.testCase.getPropertyValue( "SigningURL" )
def statusChangeURL = fullURL.replaceAll("sign.html", "changeResult.html");
statusChangeURL=statusChangeURL+"&amp;success=true";
//log.info "statusChangeURL = " + statusChangeURL;
testRunner.testCase.setPropertyValue("StatusChangeURL", statusChangeURL);
</script></con:config></con:testStep><con:testStep type="httprequest" name="Sign Agreement (OK)"><con:settings/><con:config method="GET" xsi:type="con:HttpRequest" name="Sign Agreement (OK)" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:endpoint>${#TestCase#StatusChangeURL}</con:endpoint><con:request/><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:parameters/></con:config></con:testStep><con:testStep type="request" name="Book Payment"><con:settings/><con:config xsi:type="con:RequestStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:interface>ShopFlowWebServiceImplPortBinding</con:interface><con:operation>bookPayment</con:operation><con:request name="Book Payment"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:encoding>UTF-8</con:encoding><con:endpoint>${#Project#ServiceEndpoint}/ShopFlowService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:shop="http://ecommerce.resurs.com/v4/msg/shopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <shop:bookPayment>
         <paymentSessionId>${#SessionID}</paymentSessionId>
         <preferredPaymentId>Pay-${#ID}</preferredPaymentId>
         <waitForFraudControl>true</waitForFraudControl>
         <annulIfFrozen>false</annulIfFrozen>
         <metaData>
            <key>Expressfrakt</key>
            <value>true</value>
         </metaData>
         <priority>100</priority>
      </shop:bookPayment>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:assertion type="SOAP Response"/><con:assertion type="Schema Compliance"><con:configuration/></con:assertion><con:assertion type="SOAP Fault Assertion"/><con:credentials><con:username>${#Project#BasicAuthUser}</con:username><con:password>${#Project#BasicAuthPass}</con:password><con:domain/><con:authType>No Authorization</con:authType></con:credentials><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508"/><con:wsrmConfig version="1.2"/></con:request></con:config></con:testStep><con:testStep type="transfer" name="Get Actual Payment ID"><con:settings/><con:config xsi:type="con:PropertyTransfersStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:transfers setNullOnMissingSource="true" transferTextContent="true" failOnError="true" ignoreEmpty="false" transferToAll="false" useXQuery="false" entitize="false" transferChildNodes="false"><con:name>Payment ID</con:name><con:sourceType>Response</con:sourceType><con:sourceStep>Book Payment</con:sourceStep><con:sourcePath>declare namespace soapenv='http://schemas.xmlsoap.org/soap/envelope/';
declare namespace shop='http://ecommerce.resurs.com/v4/msg/shopflow';
/soapenv:Envelope/soapenv:Body/shop:bookPaymentResponse/return/paymentId</con:sourcePath><con:targetType>ActualPaymentID</con:targetType><con:targetStep>#TestCase#</con:targetStep><con:targetPath/></con:transfers></con:config></con:testStep><con:testStep type="delay" name="Wait (#1)"><con:settings/><con:config><delay>250</delay></con:config></con:testStep><con:testStep type="request" name="Finalize Payment (By Amount)"><con:settings/><con:config xsi:type="con:RequestStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:interface>AfterShopFlowWebServiceImplPortBinding</con:interface><con:operation>finalizePayment</con:operation><con:request name="Finalize Payment (By Amount)"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:encoding>UTF-8</con:encoding><con:endpoint>${#Project#ServiceEndpoint}/AfterShopFlowService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:aft="http://ecommerce.resurs.com/v4/msg/aftershopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <aft:finalizePayment>
         <paymentId>${#TestCase#ActualPaymentID}</paymentId>
         <preferredTransactionId>TrD-${#ID}</preferredTransactionId>
         <partPaymentSpec>
            <totalAmount>30.00</totalAmount>
            <!--totalVatAmount>6.00</totalVatAmount-->
         </partPaymentSpec>
         <orderId>Ord-${#ID}</orderId>
         <orderDate>${#Date}</orderDate>
         <invoiceId>DebInv-${#ID}</invoiceId>
         <invoiceDate>${#Date}</invoiceDate>
      </aft:finalizePayment>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:assertion type="SOAP Response"/><con:assertion type="Schema Compliance"><con:configuration/></con:assertion><con:assertion type="SOAP Fault Assertion"/><con:assertion type="Simple Contains" name="Contains no error"><con:configuration><token>finalizePaymentResponse</token><ignoreCase>false</ignoreCase><useRegEx>false</useRegEx></con:configuration></con:assertion><con:credentials><con:username>${#Project#BasicAuthUser}</con:username><con:password>${#Project#BasicAuthPass}</con:password><con:domain/><con:authType>No Authorization</con:authType></con:credentials><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508"/><con:wsrmConfig version="1.2"/></con:request></con:config></con:testStep><con:testStep type="delay" name="Wait (#2)"><con:settings/><con:config><delay>250</delay></con:config></con:testStep><con:testStep type="request" name="Credit Payment (Unspecified)"><con:settings/><con:config xsi:type="con:RequestStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:interface>AfterShopFlowWebServiceImplPortBinding</con:interface><con:operation>creditPayment</con:operation><con:request name="Credit Payment (Unspecified)"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:encoding>UTF-8</con:encoding><con:endpoint>${#Project#ServiceEndpoint}/AfterShopFlowService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:aft="http://ecommerce.resurs.com/v4/msg/aftershopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <aft:creditPayment>
         <paymentId>${#TestCase#ActualPaymentID}</paymentId>
         <preferredTransactionId>TrC-${#ID}</preferredTransactionId>
         <creditNoteId>CrN-${#ID}</creditNoteId>
         <creditNoteDate>${#Date}</creditNoteDate>
      </aft:creditPayment>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:assertion type="SOAP Response"/><con:assertion type="Schema Compliance"><con:configuration/></con:assertion><con:assertion type="SOAP Fault Assertion"/><con:credentials><con:username>${#Project#BasicAuthUser}</con:username><con:password>${#Project#BasicAuthPass}</con:password><con:domain/><con:authType>No Authorization</con:authType></con:credentials><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508"/><con:wsrmConfig version="1.2"/></con:request></con:config></con:testStep><con:testStep type="delay" name="Wait (#3)"><con:settings/><con:config><delay>250</delay></con:config></con:testStep><con:testStep type="request" name="Get Payment Details"><con:settings/><con:config xsi:type="con:RequestStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:interface>AfterShopFlowWebServiceImplPortBinding</con:interface><con:operation>getPayment</con:operation><con:request name="Get Payment Details"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:encoding>UTF-8</con:encoding><con:endpoint>${#Project#ServiceEndpoint}/AfterShopFlowService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:aft="http://ecommerce.resurs.com/v4/msg/aftershopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <aft:getPayment>
         <paymentId>${#TestCase#ActualPaymentID}</paymentId>
      </aft:getPayment>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:assertion type="SOAP Response"/><con:assertion type="Schema Compliance"><con:configuration/></con:assertion><con:assertion type="SOAP Fault Assertion"/><con:assertion type="XPath Match" name="Contains AUTHORIZE"><con:configuration><path>declare namespace soap='http://schemas.xmlsoap.org/soap/envelope/';
declare namespace ns3='http://ecommerce.resurs.com/v4/msg/exception';
declare namespace ns2='http://ecommerce.resurs.com/v4/msg/aftershopflow';
/soap:Envelope/soap:Body/ns2:getPaymentResponse/return/paymentDiffs[1]/type/text()</path><content>AUTHORIZE</content><allowWildcards>false</allowWildcards><ignoreNamspaceDifferences>false</ignoreNamspaceDifferences><ignoreComments>false</ignoreComments></con:configuration></con:assertion><con:assertion type="XPath Match" name="Contains DEBIT"><con:configuration><path>declare namespace ns2='http://ecommerce.resurs.com/v4/msg/exception';
declare namespace soap='http://schemas.xmlsoap.org/soap/envelope/';
declare namespace ns3='http://ecommerce.resurs.com/v4/msg/aftershopflow';
/soap:Envelope/soap:Body/ns3:getPaymentResponse/return/paymentDiffs[2]/type/text()</path><content>DEBIT</content><allowWildcards>false</allowWildcards><ignoreNamspaceDifferences>false</ignoreNamspaceDifferences><ignoreComments>false</ignoreComments></con:configuration></con:assertion><con:assertion type="XPath Match" name="Contains CREDIT"><con:configuration><path>declare namespace ns2='http://ecommerce.resurs.com/v4/msg/exception';
declare namespace soap='http://schemas.xmlsoap.org/soap/envelope/';
declare namespace ns3='http://ecommerce.resurs.com/v4/msg/aftershopflow';
/soap:Envelope/soap:Body/ns3:getPaymentResponse/return/paymentDiffs[3]/type/text()</path><content>CREDIT</content><allowWildcards>false</allowWildcards><ignoreNamspaceDifferences>false</ignoreNamspaceDifferences><ignoreComments>false</ignoreComments></con:configuration></con:assertion><con:assertion type="XPath Match" name="Total Amount is Zero"><con:configuration><path>declare namespace soap='http://schemas.xmlsoap.org/soap/envelope/';
declare namespace ns3='http://ecommerce.resurs.com/v4/msg/exception';
declare namespace ns2='http://ecommerce.resurs.com/v4/msg/aftershopflow';
/soap:Envelope/soap:Body/ns2:getPaymentResponse/return/totalAmount/number()</path><content>0.0</content><allowWildcards>false</allowWildcards><ignoreNamspaceDifferences>false</ignoreNamspaceDifferences><ignoreComments>false</ignoreComments></con:configuration></con:assertion><con:assertion type="XPath Match" name="Limit is OK"><con:configuration><path>declare namespace soap='http://schemas.xmlsoap.org/soap/envelope/';
declare namespace ns3='http://ecommerce.resurs.com/v4/msg/exception';
declare namespace ns2='http://ecommerce.resurs.com/v4/msg/aftershopflow';
/soap:Envelope/soap:Body/ns2:getPaymentResponse/return/limit/number()</path><content>3030.0</content><allowWildcards>false</allowWildcards><ignoreNamspaceDifferences>false</ignoreNamspaceDifferences><ignoreComments>false</ignoreComments></con:configuration></con:assertion><con:assertion type="XPath Match" name="Payment ID is OK"><con:configuration><path>declare namespace soap='http://schemas.xmlsoap.org/soap/envelope/';
declare namespace ns3='http://ecommerce.resurs.com/v4/msg/exception';
declare namespace ns2='http://ecommerce.resurs.com/v4/msg/aftershopflow';
/soap:Envelope/soap:Body/ns2:getPaymentResponse/return/id/text()</path><content>${#TestCase#ActualPaymentID}</content><allowWildcards>false</allowWildcards><ignoreNamspaceDifferences>false</ignoreNamspaceDifferences><ignoreComments>false</ignoreComments></con:configuration></con:assertion><con:assertion type="XPath Match" name="Debit Transaction ID is OK"><con:configuration><path>declare namespace soap='http://schemas.xmlsoap.org/soap/envelope/';
declare namespace ns3='http://ecommerce.resurs.com/v4/msg/exception';
declare namespace ns2='http://ecommerce.resurs.com/v4/msg/aftershopflow';
/soap:Envelope/soap:Body/ns2:getPaymentResponse/return/paymentDiffs[2]/transactionId/text()</path><content>TrD-${#ID}</content><allowWildcards>false</allowWildcards><ignoreNamspaceDifferences>false</ignoreNamspaceDifferences><ignoreComments>false</ignoreComments></con:configuration></con:assertion><con:assertion type="XPath Match" name="Debit Order ID is OK"><con:configuration><path>declare namespace soap='http://schemas.xmlsoap.org/soap/envelope/';
declare namespace ns3='http://ecommerce.resurs.com/v4/msg/exception';
declare namespace ns2='http://ecommerce.resurs.com/v4/msg/aftershopflow';
/soap:Envelope/soap:Body/ns2:getPaymentResponse/return/paymentDiffs[2]/orderId/text()</path><content>Ord-${#ID}</content><allowWildcards>false</allowWildcards><ignoreNamspaceDifferences>false</ignoreNamspaceDifferences><ignoreComments>false</ignoreComments></con:configuration></con:assertion><con:assertion type="XPath Match" name="Credit Transaction ID is OK"><con:configuration><path>declare namespace soap='http://schemas.xmlsoap.org/soap/envelope/';
declare namespace ns3='http://ecommerce.resurs.com/v4/msg/exception';
declare namespace ns2='http://ecommerce.resurs.com/v4/msg/aftershopflow';
/soap:Envelope/soap:Body/ns2:getPaymentResponse/return/paymentDiffs[3]/transactionId/text()</path><content>TrC-${#ID}</content><allowWildcards>false</allowWildcards><ignoreNamspaceDifferences>false</ignoreNamspaceDifferences><ignoreComments>false</ignoreComments></con:configuration></con:assertion><con:assertion type="XPath Match" name="Does not Contain Store"><con:configuration><path>declare namespace ns2='http://ecommerce.resurs.com/v4/msg/exception';
declare namespace soap='http://schemas.xmlsoap.org/soap/envelope/';
declare namespace ns3='http://ecommerce.resurs.com/v4/msg/aftershopflow';
/soap:Envelope/soap:Body/ns3:getPaymentResponse/return/storeId/text()</path><content>*</content><allowWildcards>true</allowWildcards><ignoreNamspaceDifferences>false</ignoreNamspaceDifferences><ignoreComments>false</ignoreComments></con:configuration></con:assertion><con:credentials><con:username>${#Project#BasicAuthUser}</con:username><con:password>${#Project#BasicAuthPass}</con:password><con:domain/><con:authType>No Authorization</con:authType></con:credentials><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508"/><con:wsrmConfig version="1.2"/></con:request></con:config></con:testStep><con:properties><con:property><con:name>ActualPaymentID</con:name><con:value>Pay-1417516506639-5101</con:value></con:property><con:property><con:name>SigningURL</con:name><con:value xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">http://test.resurs.com/signicat-mock-server/sign.html?request_id=f324d6ca-ad15-4448-a3b3-c9189b21ea4d&amp;task_id=1</con:value></con:property><con:property><con:name>SignID</con:name><con:value>http://dummy.esign.pte.loc/sign.html?signId=8a4bce96-d6ad-45d8-beb2-d1c84d32ceb3&amp;lang=sv</con:value></con:property><con:property><con:name>StatusChangeURL</con:name><con:value>http://test.resurs.com/signicat-mock-server/changeResult.html?request_id=f324d6ca-ad15-4448-a3b3-c9189b21ea4d&amp;task_id=1&amp;success=true</con:value></con:property></con:properties></con:testCase><con:testCase failOnError="true" failTestCaseOnErrors="true" keepSession="false" maxResults="0" name="Invoice - Sell &amp; Credit (All Unspecified)" searchProperties="true" id="e0d69f8f-5820-4ec6-8b5c-f306ee07ea0f"><con:description>Books an and sells an invoice purchase, then credits it.
No specifications are used anywhere; just amounts!</con:description><con:settings/><con:testStep type="groovy" name="Generate Parameters"><con:settings/><con:config><script>// *** Set basic parameters
String id = System.currentTimeMillis() + "-" + (int)(Math.random() * 10000);
context.setProperty("ID", id);
context.setProperty("SessionID", "Sess-" + id)
context.setProperty("Date", new Date().format('yyyy-MM-dd'))

// *** Get parameters 
def yearFrom = Integer.parseInt(testRunner.testCase.testSuite.project.getPropertyValue("Approved_StartYear"));
def yearTo = Integer.parseInt(testRunner.testCase.testSuite.project.getPropertyValue("Approved_EndYear"));
def String[] ordinals = testRunner.testCase.testSuite.project.getPropertyValue("Ordinals_NotFrozen").split(",");

// *** Generate Swedish government identity
String governmentId = null;
Random random = new Random();
int year = yearFrom + random.nextInt(yearTo - yearFrom);
int dayOfYear = 1 + random.nextInt(365);
Calendar calendar = GregorianCalendar.getInstance();
calendar.set(Calendar.YEAR, year);
calendar.set(Calendar.DAY_OF_YEAR, dayOfYear);
int ordinal = Integer.parseInt(ordinals[random.nextInt(ordinals.length)].trim());
number = random.nextInt(100);
governmentId = String.format("%1\$ty%1\$tm%1\$td%2\$02d%3\$d", calendar.getTime(), number, ordinal);
int sum = 0;
boolean isAlternate = true;
for (int digit = governmentId.length() - 1; digit >= 0; digit--) {
	int value = Integer.parseInt(governmentId.substring(digit, digit + 1));
	if (isAlternate) {
		value *= 2;
		if (value > 9) {
			value = (value % 10) + 1;
		}
	}
sum += value;
isAlternate = !isAlternate 	
} 
int higherDec = (int) (Math.ceil(sum / 10.0f) * 10);
int luhnDigit = higherDec - sum;
governmentId = governmentId + luhnDigit;
context.setProperty("GovernmentID", governmentId);

// *** Log parameters
log.info (
	"Starting session " + context.getProperty("SessionID") + " for " + 
	context.getProperty("GovernmentID") + " on " + context.getProperty("Date"));
</script></con:config></con:testStep><con:testStep type="request" name="Start Payment Session (Unspecified)"><con:settings/><con:config xsi:type="con:RequestStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:interface>ShopFlowWebServiceImplPortBinding</con:interface><con:operation>startPaymentSession</con:operation><con:request name="Start Payment Session (Unspecified)"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:encoding>UTF-8</con:encoding><con:endpoint>${#Project#ServiceEndpoint}/ShopFlowService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:shop="http://ecommerce.resurs.com/v4/msg/shopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <shop:startPaymentSession>
         <preferredId>${#SessionID}</preferredId>
         <paymentMethodId>${#Project#PaymentMethodID_Invoice}</paymentMethodId>
         <customerIpAddress>127.0.0.2</customerIpAddress>
         <formAction>AFormAction</formAction>
         <paymentSpec>
            <totalAmount>30.00</totalAmount>
            <!--totalVatAmount>6.00</totalVatAmount-->
         </paymentSpec>
      </shop:startPaymentSession>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:assertion type="SOAP Response"/><con:assertion type="Schema Compliance"><con:configuration/></con:assertion><con:assertion type="SOAP Fault Assertion"/><con:assertion type="Simple Contains" name="Contains Session Identity"><con:configuration><token>&lt;id>${#SessionID}&lt;/id></token><ignoreCase>false</ignoreCase><useRegEx>false</useRegEx></con:configuration></con:assertion><con:assertion type="Simple Contains" name="Contains Limit Application Form as Object"><con:configuration><token>(?s).*&lt;limitApplicationFormAsObjectGraph>[\S\s]*&lt;/limitApplicationFormAsObjectGraph>.*</token><ignoreCase>false</ignoreCase><useRegEx>true</useRegEx></con:configuration></con:assertion><con:assertion type="Simple Contains" name="Contains Limit Application Form as Form"><con:configuration><token>(?s).*&lt;limitApplicationFormAsCompiledForm>[\S\s]*&lt;/limitApplicationFormAsCompiledForm>.*</token><ignoreCase>false</ignoreCase><useRegEx>true</useRegEx></con:configuration></con:assertion><con:credentials><con:username>${#Project#BasicAuthUser}</con:username><con:password>${#Project#BasicAuthPass}</con:password><con:domain/><con:authType>No Authorization</con:authType></con:credentials><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508"/><con:wsrmConfig version="1.2"/></con:request></con:config></con:testStep><con:testStep type="request" name="Create Limit (OK)"><con:settings/><con:config xsi:type="con:RequestStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:interface>ShopFlowWebServiceImplPortBinding</con:interface><con:operation>submitLimitApplication</con:operation><con:request name="Create Limit (OK)"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:encoding>UTF-8</con:encoding><con:endpoint>${#Project#ServiceEndpoint}/ShopFlowService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:shop="http://ecommerce.resurs.com/v4/msg/shopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <shop:submitLimitApplication>
         <paymentSessionId>${#SessionID}</paymentSessionId>
         <yourCustomerId>Cust-${#ID}</yourCustomerId>
         <formDataResponse><![CDATA[
<resurs-response>
    <amount>300.00</amount>
    <applicant-government-id>${#GovernmentID}</applicant-government-id>
    <applicant-telephone-number></applicant-telephone-number>
    <applicant-mobile-number>0705-12 35 46</applicant-mobile-number>
    <applicant-email-address>javatest@resurs.se</applicant-email-address>
</resurs-response>
            ]]]]>><![CDATA[</formDataResponse>
      </shop:submitLimitApplication>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:assertion type="SOAP Response"/><con:assertion type="Schema Compliance"><con:configuration/></con:assertion><con:assertion type="SOAP Fault Assertion"/><con:assertion type="Simple Contains" name="Limit is Granted"><con:configuration><token>&lt;decision>GRANTED&lt;/decision></token><ignoreCase>false</ignoreCase><useRegEx>false</useRegEx></con:configuration></con:assertion><con:credentials><con:username>${#Project#BasicAuthUser}</con:username><con:password>${#Project#BasicAuthPass}</con:password><con:domain/><con:authType>No Authorization</con:authType></con:credentials><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508"/><con:wsrmConfig version="1.2"/></con:request></con:config></con:testStep><con:testStep type="request" name="Prepare Signing"><con:settings/><con:config xsi:type="con:RequestStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:interface>ShopFlowWebServiceImplPortBinding</con:interface><con:operation>prepareSigning</con:operation><con:request name="Prepare Signing"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:encoding>UTF-8</con:encoding><con:endpoint>${#Project#ServiceEndpoint}/ShopFlowService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:shop="http://ecommerce.resurs.com/v4/msg/shopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <shop:prepareSigning>
         <paymentSessionId>${#SessionID}</paymentSessionId>
         <successUrl>http://www.google.com/search?q=OK</successUrl>
         <failUrl>http://www.google.com/search?q=NOK</failUrl>
      </shop:prepareSigning>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:assertion type="SOAP Response"/><con:assertion type="Schema Compliance"><con:configuration/></con:assertion><con:credentials><con:username>${#Project#BasicAuthUser}</con:username><con:password>${#Project#BasicAuthPass}</con:password><con:domain/><con:authType>No Authorization</con:authType></con:credentials><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508"/><con:wsrmConfig version="1.2"/></con:request></con:config></con:testStep><con:testStep type="goto" name="Is Bad Customer"><con:settings/><con:config xsi:type="con:GotoStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:condition><con:name>Is Bad Customer</con:name><con:type>XPATH</con:type><con:expression>declare namespace soap='http://schemas.xmlsoap.org/soap/envelope/';
declare namespace ns3='http://ecommerce.resurs.com/v4/msg/exception';
declare namespace ns2='http://ecommerce.resurs.com/v4/msg/shopflow';
contains(/soap:Envelope/soap:Body/soap:Fault/detail/ns3:ECommerceError/userErrorMessage/text(), "Oklarheter kring existerande krediter")</con:expression><con:targetStep>Generate Parameters</con:targetStep></con:condition></con:config></con:testStep><con:testStep type="transfer" name="Extract Signing URL"><con:settings/><con:config xsi:type="con:PropertyTransfersStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:transfers setNullOnMissingSource="true" transferTextContent="true" failOnError="true" ignoreEmpty="false" transferToAll="false" useXQuery="false" entitize="false" transferChildNodes="false" disabled="false"><con:name>Retrieve Signing URL</con:name><con:sourceType>Response</con:sourceType><con:sourceStep>Prepare Signing</con:sourceStep><con:sourcePath>declare namespace soap='http://schemas.xmlsoap.org/soap/envelope/';
declare namespace ns3='http://ecommerce.resurs.com/v4/msg/shopflow';
//soap:Envelope/soap:Body/ns3:prepareSigningResponse/return/text()</con:sourcePath><con:targetType>SigningURL</con:targetType><con:targetStep>#TestCase#</con:targetStep><con:targetPath>
</con:targetPath></con:transfers></con:config></con:testStep><con:testStep type="groovy" name="Process Signing URL"><con:settings/><con:config><script>// *** Convert the signing URL to the sign OK/NOK URL
def fullURL = testRunner.testCase.getPropertyValue( "SigningURL" )
def statusChangeURL = fullURL.replaceAll("sign.html", "changeResult.html");
statusChangeURL=statusChangeURL+"&amp;success=true";
//log.info "statusChangeURL = " + statusChangeURL;
testRunner.testCase.setPropertyValue("StatusChangeURL", statusChangeURL);
</script></con:config></con:testStep><con:testStep type="httprequest" name="Sign Agreement (OK)"><con:settings/><con:config method="GET" xsi:type="con:HttpRequest" name="Sign Agreement (OK)" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:endpoint>${#TestCase#StatusChangeURL}</con:endpoint><con:request/><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:parameters/></con:config></con:testStep><con:testStep type="request" name="Book Payment"><con:settings/><con:config xsi:type="con:RequestStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:interface>ShopFlowWebServiceImplPortBinding</con:interface><con:operation>bookPayment</con:operation><con:request name="Book Payment"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:encoding>UTF-8</con:encoding><con:endpoint>${#Project#ServiceEndpoint}/ShopFlowService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:shop="http://ecommerce.resurs.com/v4/msg/shopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <shop:bookPayment>
         <paymentSessionId>${#SessionID}</paymentSessionId>
         <preferredPaymentId>Pay-${#ID}</preferredPaymentId>
         <waitForFraudControl>true</waitForFraudControl>
         <annulIfFrozen>false</annulIfFrozen>
         <metaData>
            <key>Expressfrakt</key>
            <value>true</value>
         </metaData>
         <priority>100</priority>
      </shop:bookPayment>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:assertion type="SOAP Response"/><con:assertion type="Schema Compliance"><con:configuration/></con:assertion><con:assertion type="SOAP Fault Assertion"/><con:credentials><con:username>${#Project#BasicAuthUser}</con:username><con:password>${#Project#BasicAuthPass}</con:password><con:domain/><con:authType>No Authorization</con:authType></con:credentials><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508"/><con:wsrmConfig version="1.2"/></con:request></con:config></con:testStep><con:testStep type="transfer" name="Get Actual Payment ID"><con:settings/><con:config xsi:type="con:PropertyTransfersStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:transfers setNullOnMissingSource="true" transferTextContent="true" failOnError="true" ignoreEmpty="false" transferToAll="false" useXQuery="false" entitize="false" transferChildNodes="false"><con:name>Payment ID</con:name><con:sourceType>Response</con:sourceType><con:sourceStep>Book Payment</con:sourceStep><con:sourcePath>declare namespace soapenv='http://schemas.xmlsoap.org/soap/envelope/';
declare namespace shop='http://ecommerce.resurs.com/v4/msg/shopflow';
/soapenv:Envelope/soapenv:Body/shop:bookPaymentResponse/return/paymentId</con:sourcePath><con:targetType>ActualPaymentID</con:targetType><con:targetStep>#TestCase#</con:targetStep><con:targetPath/></con:transfers></con:config></con:testStep><con:testStep type="delay" name="Wait (#1)"><con:settings/><con:config><delay>250</delay></con:config></con:testStep><con:testStep type="request" name="Finalize Payment (By Amount)"><con:settings/><con:config xsi:type="con:RequestStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:interface>AfterShopFlowWebServiceImplPortBinding</con:interface><con:operation>finalizePayment</con:operation><con:request name="Finalize Payment (By Amount)"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:encoding>UTF-8</con:encoding><con:endpoint>${#Project#ServiceEndpoint}/AfterShopFlowService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:aft="http://ecommerce.resurs.com/v4/msg/aftershopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <aft:finalizePayment>
         <paymentId>${#TestCase#ActualPaymentID}</paymentId>
         <preferredTransactionId>TrD-${#ID}</preferredTransactionId>
         <partPaymentSpec>
            <totalAmount>30.00</totalAmount>
            <!--<totalVatAmount>6.00</totalVatAmount>-->
         </partPaymentSpec>
         <orderId>Ord-${#ID}</orderId>
         <orderDate>${#Date}</orderDate>
         <invoiceId>DebInv-${#ID}</invoiceId>
         <invoiceDate>${#Date}</invoiceDate>
      </aft:finalizePayment>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:assertion type="SOAP Response"/><con:assertion type="Schema Compliance"><con:configuration/></con:assertion><con:assertion type="SOAP Fault Assertion"/><con:assertion type="Simple Contains" name="Contains no error"><con:configuration><token>finalizePaymentResponse</token><ignoreCase>false</ignoreCase><useRegEx>false</useRegEx></con:configuration></con:assertion><con:credentials><con:username>${#Project#BasicAuthUser}</con:username><con:password>${#Project#BasicAuthPass}</con:password><con:domain/><con:authType>No Authorization</con:authType></con:credentials><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508"/><con:wsrmConfig version="1.2"/></con:request></con:config></con:testStep><con:testStep type="delay" name="Wait (#2)"><con:settings/><con:config><delay>250</delay></con:config></con:testStep><con:testStep type="request" name="Credit Payment (Unspecified)"><con:settings/><con:config xsi:type="con:RequestStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:interface>AfterShopFlowWebServiceImplPortBinding</con:interface><con:operation>creditPayment</con:operation><con:request name="Credit Payment (Unspecified)"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:encoding>UTF-8</con:encoding><con:endpoint>${#Project#ServiceEndpoint}/AfterShopFlowService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:aft="http://ecommerce.resurs.com/v4/msg/aftershopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <aft:creditPayment>
         <paymentId>${#TestCase#ActualPaymentID}</paymentId>
         <preferredTransactionId>TrC-${#ID}</preferredTransactionId>
         <creditNoteId>CrN-${#ID}</creditNoteId>
         <creditNoteDate>${#Date}</creditNoteDate>
      </aft:creditPayment>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:assertion type="SOAP Response"/><con:assertion type="Schema Compliance"><con:configuration/></con:assertion><con:assertion type="SOAP Fault Assertion"/><con:credentials><con:username>${#Project#BasicAuthUser}</con:username><con:password>${#Project#BasicAuthPass}</con:password><con:domain/><con:authType>No Authorization</con:authType></con:credentials><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508"/><con:wsrmConfig version="1.2"/></con:request></con:config></con:testStep><con:testStep type="delay" name="Wait (#3)"><con:settings/><con:config><delay>250</delay></con:config></con:testStep><con:testStep type="request" name="Get Payment Details"><con:settings/><con:config xsi:type="con:RequestStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:interface>AfterShopFlowWebServiceImplPortBinding</con:interface><con:operation>getPayment</con:operation><con:request name="Get Payment Details"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:encoding>UTF-8</con:encoding><con:endpoint>${#Project#ServiceEndpoint}/AfterShopFlowService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:aft="http://ecommerce.resurs.com/v4/msg/aftershopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <aft:getPayment>
         <paymentId>${#TestCase#ActualPaymentID}</paymentId>
      </aft:getPayment>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:assertion type="SOAP Response"/><con:assertion type="Schema Compliance"><con:configuration/></con:assertion><con:assertion type="SOAP Fault Assertion"/><con:assertion type="XPath Match" name="Contains AUTHORIZE"><con:configuration><path>declare namespace soap='http://schemas.xmlsoap.org/soap/envelope/';
declare namespace ns3='http://ecommerce.resurs.com/v4/msg/exception';
declare namespace ns2='http://ecommerce.resurs.com/v4/msg/aftershopflow';
/soap:Envelope/soap:Body/ns2:getPaymentResponse/return/paymentDiffs[1]/type/text()</path><content>AUTHORIZE</content><allowWildcards>false</allowWildcards><ignoreNamspaceDifferences>false</ignoreNamspaceDifferences><ignoreComments>false</ignoreComments></con:configuration></con:assertion><con:assertion type="XPath Match" name="Contains DEBIT"><con:configuration><path>declare namespace ns2='http://ecommerce.resurs.com/v4/msg/exception';
declare namespace soap='http://schemas.xmlsoap.org/soap/envelope/';
declare namespace ns3='http://ecommerce.resurs.com/v4/msg/aftershopflow';
/soap:Envelope/soap:Body/ns3:getPaymentResponse/return/paymentDiffs[2]/type/text()</path><content>DEBIT</content><allowWildcards>false</allowWildcards><ignoreNamspaceDifferences>false</ignoreNamspaceDifferences><ignoreComments>false</ignoreComments></con:configuration></con:assertion><con:assertion type="XPath Match" name="Contains CREDIT"><con:configuration><path>declare namespace ns2='http://ecommerce.resurs.com/v4/msg/exception';
declare namespace soap='http://schemas.xmlsoap.org/soap/envelope/';
declare namespace ns3='http://ecommerce.resurs.com/v4/msg/aftershopflow';
/soap:Envelope/soap:Body/ns3:getPaymentResponse/return/paymentDiffs[3]/type/text()</path><content>CREDIT</content><allowWildcards>false</allowWildcards><ignoreNamspaceDifferences>false</ignoreNamspaceDifferences><ignoreComments>false</ignoreComments></con:configuration></con:assertion><con:assertion type="XPath Match" name="Total Amount is Zero"><con:configuration><path>declare namespace soap='http://schemas.xmlsoap.org/soap/envelope/';
declare namespace ns3='http://ecommerce.resurs.com/v4/msg/exception';
declare namespace ns2='http://ecommerce.resurs.com/v4/msg/aftershopflow';
/soap:Envelope/soap:Body/ns2:getPaymentResponse/return/totalAmount/number()</path><content>0.0</content><allowWildcards>false</allowWildcards><ignoreNamspaceDifferences>false</ignoreNamspaceDifferences><ignoreComments>false</ignoreComments></con:configuration></con:assertion><con:assertion type="XPath Match" name="Limit is OK"><con:configuration><path>declare namespace soap='http://schemas.xmlsoap.org/soap/envelope/';
declare namespace ns3='http://ecommerce.resurs.com/v4/msg/exception';
declare namespace ns2='http://ecommerce.resurs.com/v4/msg/aftershopflow';
/soap:Envelope/soap:Body/ns2:getPaymentResponse/return/limit/number()</path><content>3030.0</content><allowWildcards>false</allowWildcards><ignoreNamspaceDifferences>false</ignoreNamspaceDifferences><ignoreComments>false</ignoreComments></con:configuration></con:assertion><con:assertion type="XPath Match" name="Payment ID is OK"><con:configuration><path>declare namespace soap='http://schemas.xmlsoap.org/soap/envelope/';
declare namespace ns3='http://ecommerce.resurs.com/v4/msg/exception';
declare namespace ns2='http://ecommerce.resurs.com/v4/msg/aftershopflow';
/soap:Envelope/soap:Body/ns2:getPaymentResponse/return/id/text()</path><content>${#TestCase#ActualPaymentID}</content><allowWildcards>false</allowWildcards><ignoreNamspaceDifferences>false</ignoreNamspaceDifferences><ignoreComments>false</ignoreComments></con:configuration></con:assertion><con:assertion type="XPath Match" name="Debit Transaction ID is OK"><con:configuration><path>declare namespace soap='http://schemas.xmlsoap.org/soap/envelope/';
declare namespace ns3='http://ecommerce.resurs.com/v4/msg/exception';
declare namespace ns2='http://ecommerce.resurs.com/v4/msg/aftershopflow';
/soap:Envelope/soap:Body/ns2:getPaymentResponse/return/paymentDiffs[2]/transactionId/text()</path><content>TrD-${#ID}</content><allowWildcards>false</allowWildcards><ignoreNamspaceDifferences>false</ignoreNamspaceDifferences><ignoreComments>false</ignoreComments></con:configuration></con:assertion><con:assertion type="XPath Match" name="Debit Order ID is OK"><con:configuration><path>declare namespace soap='http://schemas.xmlsoap.org/soap/envelope/';
declare namespace ns3='http://ecommerce.resurs.com/v4/msg/exception';
declare namespace ns2='http://ecommerce.resurs.com/v4/msg/aftershopflow';
/soap:Envelope/soap:Body/ns2:getPaymentResponse/return/paymentDiffs[2]/orderId/text()</path><content>Ord-${#ID}</content><allowWildcards>false</allowWildcards><ignoreNamspaceDifferences>false</ignoreNamspaceDifferences><ignoreComments>false</ignoreComments></con:configuration></con:assertion><con:assertion type="XPath Match" name="Credit Transaction ID is OK"><con:configuration><path>declare namespace soap='http://schemas.xmlsoap.org/soap/envelope/';
declare namespace ns3='http://ecommerce.resurs.com/v4/msg/exception';
declare namespace ns2='http://ecommerce.resurs.com/v4/msg/aftershopflow';
/soap:Envelope/soap:Body/ns2:getPaymentResponse/return/paymentDiffs[3]/transactionId/text()</path><content>TrC-${#ID}</content><allowWildcards>false</allowWildcards><ignoreNamspaceDifferences>false</ignoreNamspaceDifferences><ignoreComments>false</ignoreComments></con:configuration></con:assertion><con:assertion type="XPath Match" name="Does not Contain Store"><con:configuration><path>declare namespace ns2='http://ecommerce.resurs.com/v4/msg/exception';
declare namespace soap='http://schemas.xmlsoap.org/soap/envelope/';
declare namespace ns3='http://ecommerce.resurs.com/v4/msg/aftershopflow';
/soap:Envelope/soap:Body/ns3:getPaymentResponse/return/storeId/text()</path><content>*</content><allowWildcards>true</allowWildcards><ignoreNamspaceDifferences>false</ignoreNamspaceDifferences><ignoreComments>false</ignoreComments></con:configuration></con:assertion><con:credentials><con:username>${#Project#BasicAuthUser}</con:username><con:password>${#Project#BasicAuthPass}</con:password><con:domain/><con:authType>No Authorization</con:authType></con:credentials><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508"/><con:wsrmConfig version="1.2"/></con:request></con:config></con:testStep><con:properties><con:property><con:name>ActualPaymentID</con:name><con:value>Pay-1417516510213-1054</con:value></con:property><con:property><con:name>SigningURL</con:name><con:value xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">http://test.resurs.com/signicat-mock-server/sign.html?request_id=63ce59f6-6a5d-419a-a676-01a2e3c8b86d&amp;task_id=1</con:value></con:property><con:property><con:name>SignID</con:name><con:value>http://dummy.esign.pte.loc/sign.html?signId=8a4bce96-d6ad-45d8-beb2-d1c84d32ceb3&amp;lang=sv</con:value></con:property><con:property><con:name>StatusChangeURL</con:name><con:value>http://test.resurs.com/signicat-mock-server/changeResult.html?request_id=63ce59f6-6a5d-419a-a676-01a2e3c8b86d&amp;task_id=1&amp;success=true</con:value></con:property></con:properties></con:testCase><con:testCase failOnError="true" failTestCaseOnErrors="true" keepSession="false" maxResults="0" name="New Account - Sell &amp; Credit" searchProperties="true" id="8e50145f-e57a-4dda-8395-1b9d0389c3c9"><con:settings/><con:testStep type="groovy" name="Generate Parameters"><con:settings/><con:config><script>// *** Set basic parameters
String id = System.currentTimeMillis() + "-" + (int)(Math.random() * 10000);
context.setProperty("ID", id);
context.setProperty("SessionID", "Sess-" + id)
context.setProperty("Date", new Date().format('yyyy-MM-dd'))

// *** Get parameters 
def yearFrom = Integer.parseInt(testRunner.testCase.testSuite.project.getPropertyValue("Approved_StartYear"));
def yearTo = Integer.parseInt(testRunner.testCase.testSuite.project.getPropertyValue("Approved_EndYear"));
def String[] ordinals = testRunner.testCase.testSuite.project.getPropertyValue("Ordinals_NotFrozen").split(",");

// *** Generate Swedish government identity
String governmentId = null;
Random random = new Random();
int year = yearFrom + random.nextInt(yearTo - yearFrom);
int dayOfYear = 1 + random.nextInt(365);
Calendar calendar = GregorianCalendar.getInstance();
calendar.set(Calendar.YEAR, year);
calendar.set(Calendar.DAY_OF_YEAR, dayOfYear);
int ordinal = Integer.parseInt(ordinals[random.nextInt(ordinals.length)].trim());
number = random.nextInt(100);
governmentId = String.format("%1\$ty%1\$tm%1\$td%2\$02d%3\$d", calendar.getTime(), number, ordinal);
int sum = 0;
boolean isAlternate = true;
for (int digit = governmentId.length() - 1; digit >= 0; digit--) {
	int value = Integer.parseInt(governmentId.substring(digit, digit + 1));
	if (isAlternate) {
		value *= 2;
		if (value > 9) {
			value = (value % 10) + 1;
		}
	}
sum += value;
isAlternate = !isAlternate 	
} 
int higherDec = (int) (Math.ceil(sum / 10.0f) * 10);
int luhnDigit = higherDec - sum;
governmentId = governmentId + luhnDigit;
context.setProperty("GovernmentID", governmentId);

// *** Log parameters
log.info (
	"Starting session " + context.getProperty("SessionID") + " for " + 
	context.getProperty("GovernmentID") + " on " + context.getProperty("Date"));
</script></con:config></con:testStep><con:testStep type="request" name="Start Payment Session"><con:settings/><con:config xsi:type="con:RequestStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:interface>ShopFlowWebServiceImplPortBinding</con:interface><con:operation>startPaymentSession</con:operation><con:request name="Start Payment Session"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:encoding>UTF-8</con:encoding><con:endpoint>${#Project#ServiceEndpoint}/ShopFlowService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:shop="http://ecommerce.resurs.com/v4/msg/shopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <shop:startPaymentSession>
         <preferredId>${#SessionID}</preferredId>
         <paymentMethodId>${#Project#PaymentMethodID_NewAccount}</paymentMethodId>
         <customerIpAddress>127.0.0.2</customerIpAddress>
         <formAction>AFormAction</formAction>
         <paymentSpec>
            <specLines>
               <id>1</id>
               <artNo>NUT-001</artNo>
               <description>Nut (M8)</description>
               <quantity>10</quantity>
               <unitMeasure>st</unitMeasure>
               <unitAmountWithoutVat>0.80</unitAmountWithoutVat>
               <vatPct>25</vatPct>
               <totalVatAmount>2.00</totalVatAmount>
               <totalAmount>10.00</totalAmount>
            </specLines>
            <specLines>
               <id>2</id>
               <artNo>BOLT-002</artNo>
               <description>Bolt (M8x125mm)</description>
               <quantity>10</quantity>
               <unitMeasure>st</unitMeasure>
               <unitAmountWithoutVat>1.60</unitAmountWithoutVat>
               <vatPct>25</vatPct>
               <totalVatAmount>4.00</totalVatAmount>
               <totalAmount>20.00</totalAmount>
            </specLines>
            <totalAmount>30.00</totalAmount>
            <totalVatAmount>6.00</totalVatAmount>
         </paymentSpec>
      </shop:startPaymentSession>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:assertion type="SOAP Response"/><con:assertion type="Schema Compliance"><con:configuration/></con:assertion><con:assertion type="SOAP Fault Assertion"/><con:assertion type="Simple Contains" name="Contains Session Identity"><con:configuration><token>&lt;id>${#SessionID}&lt;/id></token><ignoreCase>false</ignoreCase><useRegEx>false</useRegEx></con:configuration></con:assertion><con:assertion type="Simple Contains" name="Contains Limit Application Form as Object"><con:configuration><token>(?s).*&lt;limitApplicationFormAsObjectGraph>[\S\s]*&lt;/limitApplicationFormAsObjectGraph>.*</token><ignoreCase>false</ignoreCase><useRegEx>true</useRegEx></con:configuration></con:assertion><con:assertion type="Simple Contains" name="Contains Limit Application Form as Form"><con:configuration><token>(?s).*&lt;limitApplicationFormAsCompiledForm>[\S\s]*&lt;/limitApplicationFormAsCompiledForm>.*</token><ignoreCase>false</ignoreCase><useRegEx>true</useRegEx></con:configuration></con:assertion><con:credentials><con:username>${#Project#BasicAuthUser}</con:username><con:password>${#Project#BasicAuthPass}</con:password><con:domain/><con:authType>No Authorization</con:authType></con:credentials><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508"/><con:wsrmConfig version="1.2"/></con:request></con:config></con:testStep><con:testStep type="request" name="Create Limit (OK)"><con:settings/><con:config xsi:type="con:RequestStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:interface>ShopFlowWebServiceImplPortBinding</con:interface><con:operation>submitLimitApplication</con:operation><con:request name="Create Limit (OK)"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:encoding>UTF-8</con:encoding><con:endpoint>${#Project#ServiceEndpoint}/ShopFlowService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:shop="http://ecommerce.resurs.com/v4/msg/shopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <shop:submitLimitApplication>
         <paymentSessionId>${#SessionID}</paymentSessionId>
         <yourCustomerId>Cust-${#ID}</yourCustomerId>
         <formDataResponse><![CDATA[
<resurs-response>
    <amount>300.00</amount>
    <applicant-government-id>${#GovernmentID}</applicant-government-id>
    <applicant-telephone-number></applicant-telephone-number>
    <applicant-mobile-number>0705-12 35 46</applicant-mobile-number>
    <applicant-email-address>javatest@resurs.se</applicant-email-address>
</resurs-response>
            ]]]]>><![CDATA[</formDataResponse>
      </shop:submitLimitApplication>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:assertion type="SOAP Response"/><con:assertion type="Schema Compliance"><con:configuration/></con:assertion><con:assertion type="SOAP Fault Assertion"/><con:assertion type="Simple Contains" name="Limit is Granted"><con:configuration><token>&lt;decision>GRANTED&lt;/decision></token><ignoreCase>false</ignoreCase><useRegEx>false</useRegEx></con:configuration></con:assertion><con:credentials><con:username>${#Project#BasicAuthUser}</con:username><con:password>${#Project#BasicAuthPass}</con:password><con:domain/><con:authType>No Authorization</con:authType></con:credentials><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508"/><con:wsrmConfig version="1.2"/></con:request></con:config></con:testStep><con:testStep type="request" name="Prepare Signing"><con:settings/><con:config xsi:type="con:RequestStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:interface>ShopFlowWebServiceImplPortBinding</con:interface><con:operation>prepareSigning</con:operation><con:request name="Prepare Signing"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:encoding>UTF-8</con:encoding><con:endpoint>${#Project#ServiceEndpoint}/ShopFlowService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:shop="http://ecommerce.resurs.com/v4/msg/shopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <shop:prepareSigning>
         <paymentSessionId>${#SessionID}</paymentSessionId>
         <successUrl>http://www.google.com/search?q=OK</successUrl>
         <failUrl>http://www.google.com/search?q=NOK</failUrl>
      </shop:prepareSigning>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:assertion type="SOAP Response"/><con:assertion type="Schema Compliance"><con:configuration/></con:assertion><con:credentials><con:username>${#Project#BasicAuthUser}</con:username><con:password>${#Project#BasicAuthPass}</con:password><con:domain/><con:authType>No Authorization</con:authType></con:credentials><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508"/><con:wsrmConfig version="1.2"/></con:request></con:config></con:testStep><con:testStep type="goto" name="Is Bad Customer"><con:settings/><con:config xsi:type="con:GotoStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:condition><con:name>Is Bad Customer</con:name><con:type>XPATH</con:type><con:expression>declare namespace soap='http://schemas.xmlsoap.org/soap/envelope/';
declare namespace ns3='http://ecommerce.resurs.com/v4/msg/exception';
declare namespace ns2='http://ecommerce.resurs.com/v4/msg/shopflow';
contains(/soap:Envelope/soap:Body/soap:Fault/detail/ns3:ECommerceError/userErrorMessage/text(), "Oklarheter kring existerande krediter")</con:expression><con:targetStep>Generate Parameters</con:targetStep></con:condition></con:config></con:testStep><con:testStep type="transfer" name="Extract Signing URL"><con:settings/><con:config xsi:type="con:PropertyTransfersStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:transfers setNullOnMissingSource="true" transferTextContent="true" failOnError="true" ignoreEmpty="false" transferToAll="false" useXQuery="false" entitize="false" transferChildNodes="false" disabled="false"><con:name>Retrieve Signing URL</con:name><con:sourceType>Response</con:sourceType><con:sourceStep>Prepare Signing</con:sourceStep><con:sourcePath>declare namespace soap='http://schemas.xmlsoap.org/soap/envelope/';
declare namespace ns3='http://ecommerce.resurs.com/v4/msg/shopflow';
//soap:Envelope/soap:Body/ns3:prepareSigningResponse/return/text()</con:sourcePath><con:targetType>SigningURL</con:targetType><con:targetStep>#TestCase#</con:targetStep><con:targetPath>
</con:targetPath></con:transfers></con:config></con:testStep><con:testStep type="groovy" name="Process Signing URL"><con:settings/><con:config><script>// *** Convert the signing URL to the sign OK/NOK URL
def fullURL = testRunner.testCase.getPropertyValue( "SigningURL" )
def statusChangeURL = fullURL.replaceAll("sign.html", "changeResult.html");
statusChangeURL=statusChangeURL+"&amp;success=true";
//log.info "statusChangeURL = " + statusChangeURL;
testRunner.testCase.setPropertyValue("StatusChangeURL", statusChangeURL);
</script></con:config></con:testStep><con:testStep type="httprequest" name="Sign Agreement (OK)"><con:settings/><con:config method="GET" xsi:type="con:HttpRequest" name="Sign Agreement (OK)" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:endpoint>${#TestCase#StatusChangeURL}</con:endpoint><con:request/><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:parameters/></con:config></con:testStep><con:testStep type="request" name="Book Payment"><con:settings/><con:config xsi:type="con:RequestStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:interface>ShopFlowWebServiceImplPortBinding</con:interface><con:operation>bookPayment</con:operation><con:request name="Book Payment"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:encoding>UTF-8</con:encoding><con:endpoint>${#Project#ServiceEndpoint}/ShopFlowService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:shop="http://ecommerce.resurs.com/v4/msg/shopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <shop:bookPayment>
         <paymentSessionId>${#SessionID}</paymentSessionId>
         <preferredPaymentId>Pay-${#ID}</preferredPaymentId>
         <waitForFraudControl>true</waitForFraudControl>
         <annulIfFrozen>false</annulIfFrozen>
         <metaData>
            <key>Expressfrakt</key>
            <value>true</value>
         </metaData>
         <priority>100</priority>
      </shop:bookPayment>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:assertion type="SOAP Response"/><con:assertion type="Schema Compliance"><con:configuration/></con:assertion><con:assertion type="SOAP Fault Assertion"/><con:credentials><con:username>${#Project#BasicAuthUser}</con:username><con:password>${#Project#BasicAuthPass}</con:password><con:domain/><con:authType>No Authorization</con:authType></con:credentials><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508"/><con:wsrmConfig version="1.2"/></con:request></con:config></con:testStep><con:testStep type="transfer" name="Get Actual Payment ID"><con:settings/><con:config xsi:type="con:PropertyTransfersStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:transfers setNullOnMissingSource="true" transferTextContent="true" failOnError="true" ignoreEmpty="false" transferToAll="false" useXQuery="false" entitize="false" transferChildNodes="false"><con:name>Payment ID</con:name><con:sourceType>Response</con:sourceType><con:sourceStep>Book Payment</con:sourceStep><con:sourcePath>declare namespace soapenv='http://schemas.xmlsoap.org/soap/envelope/';
declare namespace shop='http://ecommerce.resurs.com/v4/msg/shopflow';
/soapenv:Envelope/soapenv:Body/shop:bookPaymentResponse/return/paymentId</con:sourcePath><con:targetType>ActualPaymentID</con:targetType><con:targetStep>#TestCase#</con:targetStep><con:targetPath/></con:transfers></con:config></con:testStep><con:testStep type="delay" name="Wait (#1)"><con:settings/><con:config><delay>250</delay></con:config></con:testStep><con:testStep type="request" name="Finalize Payment (By Amount)"><con:settings/><con:config xsi:type="con:RequestStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:interface>AfterShopFlowWebServiceImplPortBinding</con:interface><con:operation>finalizePayment</con:operation><con:request name="Finalize Payment (By Amount)"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:encoding>UTF-8</con:encoding><con:endpoint>${#Project#ServiceEndpoint}/AfterShopFlowService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:aft="http://ecommerce.resurs.com/v4/msg/aftershopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <aft:finalizePayment>
         <paymentId>${#TestCase#ActualPaymentID}</paymentId>
         <preferredTransactionId>TrD-${#ID}</preferredTransactionId>
         <partPaymentSpec>
            <totalAmount>30.00</totalAmount>
            <!--<totalVatAmount>6.00</totalVatAmount>-->
         </partPaymentSpec>
         <orderId>Ord-${#ID}</orderId>
      </aft:finalizePayment>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:assertion type="SOAP Response"/><con:assertion type="Schema Compliance"><con:configuration/></con:assertion><con:assertion type="SOAP Fault Assertion"/><con:assertion type="Simple Contains" name="Contains no error"><con:configuration><token>finalizePaymentResponse</token><ignoreCase>false</ignoreCase><useRegEx>false</useRegEx></con:configuration></con:assertion><con:credentials><con:username>${#Project#BasicAuthUser}</con:username><con:password>${#Project#BasicAuthPass}</con:password><con:domain/><con:authType>No Authorization</con:authType></con:credentials><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508"/><con:wsrmConfig version="1.2"/></con:request></con:config></con:testStep><con:testStep type="delay" name="Wait (#2)"><con:settings/><con:config><delay>250</delay></con:config></con:testStep><con:testStep type="request" name="Credit Payment (Unspecified)"><con:settings/><con:config xsi:type="con:RequestStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:interface>AfterShopFlowWebServiceImplPortBinding</con:interface><con:operation>creditPayment</con:operation><con:request name="Credit Payment (Unspecified)"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:encoding>UTF-8</con:encoding><con:endpoint>${#Project#ServiceEndpoint}/AfterShopFlowService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:aft="http://ecommerce.resurs.com/v4/msg/aftershopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <aft:creditPayment>
         <paymentId>${#TestCase#ActualPaymentID}</paymentId>
         <preferredTransactionId>TrC-${#ID}</preferredTransactionId>
      </aft:creditPayment>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:assertion type="SOAP Response"/><con:assertion type="Schema Compliance"><con:configuration/></con:assertion><con:assertion type="SOAP Fault Assertion"/><con:credentials><con:username>${#Project#BasicAuthUser}</con:username><con:password>${#Project#BasicAuthPass}</con:password><con:domain/><con:authType>No Authorization</con:authType></con:credentials><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508"/><con:wsrmConfig version="1.2"/></con:request></con:config></con:testStep><con:testStep type="delay" name="Wait (#3)"><con:settings/><con:config><delay>250</delay></con:config></con:testStep><con:testStep type="request" name="Get Payment Details"><con:settings/><con:config xsi:type="con:RequestStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:interface>AfterShopFlowWebServiceImplPortBinding</con:interface><con:operation>getPayment</con:operation><con:request name="Get Payment Details"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:encoding>UTF-8</con:encoding><con:endpoint>${#Project#ServiceEndpoint}/AfterShopFlowService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:aft="http://ecommerce.resurs.com/v4/msg/aftershopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <aft:getPayment>
         <paymentId>${#TestCase#ActualPaymentID}</paymentId>
      </aft:getPayment>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:assertion type="SOAP Response"/><con:assertion type="Schema Compliance"><con:configuration/></con:assertion><con:assertion type="SOAP Fault Assertion"/><con:assertion type="XPath Match" name="Contains AUTHORIZE"><con:configuration><path>declare namespace soap='http://schemas.xmlsoap.org/soap/envelope/';
declare namespace ns3='http://ecommerce.resurs.com/v4/msg/exception';
declare namespace ns2='http://ecommerce.resurs.com/v4/msg/aftershopflow';
/soap:Envelope/soap:Body/ns2:getPaymentResponse/return/paymentDiffs[1]/type/text()</path><content>AUTHORIZE</content><allowWildcards>false</allowWildcards><ignoreNamspaceDifferences>false</ignoreNamspaceDifferences><ignoreComments>false</ignoreComments></con:configuration></con:assertion><con:assertion type="XPath Match" name="Contains DEBIT"><con:configuration><path>declare namespace ns2='http://ecommerce.resurs.com/v4/msg/exception';
declare namespace soap='http://schemas.xmlsoap.org/soap/envelope/';
declare namespace ns3='http://ecommerce.resurs.com/v4/msg/aftershopflow';
/soap:Envelope/soap:Body/ns3:getPaymentResponse/return/paymentDiffs[2]/type/text()</path><content>DEBIT</content><allowWildcards>false</allowWildcards><ignoreNamspaceDifferences>false</ignoreNamspaceDifferences><ignoreComments>false</ignoreComments></con:configuration></con:assertion><con:assertion type="XPath Match" name="Contains CREDIT"><con:configuration><path>declare namespace ns2='http://ecommerce.resurs.com/v4/msg/exception';
declare namespace soap='http://schemas.xmlsoap.org/soap/envelope/';
declare namespace ns3='http://ecommerce.resurs.com/v4/msg/aftershopflow';
/soap:Envelope/soap:Body/ns3:getPaymentResponse/return/paymentDiffs[3]/type/text()</path><content>CREDIT</content><allowWildcards>false</allowWildcards><ignoreNamspaceDifferences>false</ignoreNamspaceDifferences><ignoreComments>false</ignoreComments></con:configuration></con:assertion><con:assertion type="XPath Match" name="Total Amount is Zero"><con:configuration><path>declare namespace soap='http://schemas.xmlsoap.org/soap/envelope/';
declare namespace ns3='http://ecommerce.resurs.com/v4/msg/exception';
declare namespace ns2='http://ecommerce.resurs.com/v4/msg/aftershopflow';
/soap:Envelope/soap:Body/ns2:getPaymentResponse/return/totalAmount/number()</path><content>0.0</content><allowWildcards>false</allowWildcards><ignoreNamspaceDifferences>false</ignoreNamspaceDifferences><ignoreComments>false</ignoreComments></con:configuration></con:assertion><con:assertion type="XPath Match" name="Limit is OK"><con:configuration><path>declare namespace soap='http://schemas.xmlsoap.org/soap/envelope/';
declare namespace ns3='http://ecommerce.resurs.com/v4/msg/exception';
declare namespace ns2='http://ecommerce.resurs.com/v4/msg/aftershopflow';
/soap:Envelope/soap:Body/ns2:getPaymentResponse/return/limit/number()</path><content>530.0</content><allowWildcards>false</allowWildcards><ignoreNamspaceDifferences>false</ignoreNamspaceDifferences><ignoreComments>false</ignoreComments></con:configuration></con:assertion><con:assertion type="XPath Match" name="Payment ID is OK"><con:configuration><path>declare namespace soap='http://schemas.xmlsoap.org/soap/envelope/';
declare namespace ns3='http://ecommerce.resurs.com/v4/msg/exception';
declare namespace ns2='http://ecommerce.resurs.com/v4/msg/aftershopflow';
/soap:Envelope/soap:Body/ns2:getPaymentResponse/return/id/text()</path><content>${#TestCase#ActualPaymentID}</content><allowWildcards>false</allowWildcards><ignoreNamspaceDifferences>false</ignoreNamspaceDifferences><ignoreComments>false</ignoreComments></con:configuration></con:assertion><con:assertion type="XPath Match" name="Debit Transaction ID is OK"><con:configuration><path>declare namespace soap='http://schemas.xmlsoap.org/soap/envelope/';
declare namespace ns3='http://ecommerce.resurs.com/v4/msg/exception';
declare namespace ns2='http://ecommerce.resurs.com/v4/msg/aftershopflow';
/soap:Envelope/soap:Body/ns2:getPaymentResponse/return/paymentDiffs[2]/transactionId/text()</path><content>TrD-${#ID}</content><allowWildcards>false</allowWildcards><ignoreNamspaceDifferences>false</ignoreNamspaceDifferences><ignoreComments>false</ignoreComments></con:configuration></con:assertion><con:assertion type="XPath Match" name="Debit Order ID is OK"><con:configuration><path>declare namespace soap='http://schemas.xmlsoap.org/soap/envelope/';
declare namespace ns3='http://ecommerce.resurs.com/v4/msg/exception';
declare namespace ns2='http://ecommerce.resurs.com/v4/msg/aftershopflow';
/soap:Envelope/soap:Body/ns2:getPaymentResponse/return/paymentDiffs[2]/orderId/text()</path><content>Ord-${#ID}</content><allowWildcards>false</allowWildcards><ignoreNamspaceDifferences>false</ignoreNamspaceDifferences><ignoreComments>false</ignoreComments></con:configuration></con:assertion><con:assertion type="XPath Match" name="Credit Transaction ID is OK"><con:configuration><path>declare namespace soap='http://schemas.xmlsoap.org/soap/envelope/';
declare namespace ns3='http://ecommerce.resurs.com/v4/msg/exception';
declare namespace ns2='http://ecommerce.resurs.com/v4/msg/aftershopflow';
/soap:Envelope/soap:Body/ns2:getPaymentResponse/return/paymentDiffs[3]/transactionId/text()</path><content>TrC-${#ID}</content><allowWildcards>false</allowWildcards><ignoreNamspaceDifferences>false</ignoreNamspaceDifferences><ignoreComments>false</ignoreComments></con:configuration></con:assertion><con:credentials><con:username>${#Project#BasicAuthUser}</con:username><con:password>${#Project#BasicAuthPass}</con:password><con:domain/><con:authType>No Authorization</con:authType></con:credentials><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508"/><con:wsrmConfig version="1.2"/></con:request></con:config></con:testStep><con:properties><con:property><con:name>ActualPaymentID</con:name><con:value>Pay-1417516514862-1389</con:value></con:property><con:property><con:name>SigningURL</con:name><con:value xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">http://test.resurs.com/signicat-mock-server/sign.html?request_id=24083757-fe9b-4b0e-83ce-dc91e3b3fe83&amp;task_id=1</con:value></con:property><con:property><con:name>SignID</con:name><con:value>http://dummy.esign.pte.loc/sign.html?signId=8a4bce96-d6ad-45d8-beb2-d1c84d32ceb3&amp;lang=sv</con:value></con:property><con:property><con:name>StatusChangeURL</con:name><con:value>http://test.resurs.com/signicat-mock-server/changeResult.html?request_id=24083757-fe9b-4b0e-83ce-dc91e3b3fe83&amp;task_id=1&amp;success=true</con:value></con:property></con:properties></con:testCase><con:testCase failOnError="true" failTestCaseOnErrors="true" keepSession="false" maxResults="0" name="New Account - Credit Denied (with Amount Option Check)" searchProperties="true" id="b2e51fb8-24dc-4f2e-b0c6-7b9f531df0cc"><con:description>Attempts to perform an invoice purchase, but is denied any limit.</con:description><con:settings/><con:testStep type="groovy" name="Generate Parameters"><con:settings/><con:config><script>// *** Set basic parameters
String id = System.currentTimeMillis() + "-" + (int)(Math.random() * 10000);
context.setProperty("ID", id);
context.setProperty("SessionID", "Sess-" + id)
context.setProperty("Date", new Date().format('yyyy-MM-dd'))

// *** Get parameters 
def yearFrom = Integer.parseInt(testRunner.testCase.testSuite.project.getPropertyValue("Denied_StartYear"));
def yearTo = Integer.parseInt(testRunner.testCase.testSuite.project.getPropertyValue("Denied_EndYear"));
def String[] ordinals = testRunner.testCase.testSuite.project.getPropertyValue("Ordinals_NotFrozen").split(",");

// *** Generate Swedish government identity
String governmentId = null;
Random random = new Random();
int year = yearFrom + random.nextInt(yearTo - yearFrom);
int dayOfYear = 1 + random.nextInt(365);
Calendar calendar = GregorianCalendar.getInstance();
calendar.set(Calendar.YEAR, year);
calendar.set(Calendar.DAY_OF_YEAR, dayOfYear);
int ordinal = Integer.parseInt(ordinals[random.nextInt(ordinals.length)].trim());
number = random.nextInt(100);
governmentId = String.format("%1\$ty%1\$tm%1\$td%2\$02d%3\$d", calendar.getTime(), number, ordinal);
int sum = 0;
boolean isAlternate = true;
for (int digit = governmentId.length() - 1; digit >= 0; digit--) {
	int value = Integer.parseInt(governmentId.substring(digit, digit + 1));
	if (isAlternate) {
		value *= 2;
		if (value > 9) {
			value = (value % 10) + 1;
		}
	}
sum += value;
isAlternate = !isAlternate 	
} 
int higherDec = (int) (Math.ceil(sum / 10.0f) * 10);
int luhnDigit = higherDec - sum;
governmentId = governmentId + luhnDigit;
context.setProperty("GovernmentID", governmentId);

// *** Log parameters
log.info (
	"Starting session " + context.getProperty("SessionID") + " for " + 
	context.getProperty("GovernmentID") + " on " + context.getProperty("Date"));
</script></con:config></con:testStep><con:testStep type="request" name="Start Payment Session"><con:settings/><con:config xsi:type="con:RequestStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:interface>ShopFlowWebServiceImplPortBinding</con:interface><con:operation>startPaymentSession</con:operation><con:request name="Start Payment Session"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:encoding>UTF-8</con:encoding><con:endpoint>${#Project#ServiceEndpoint}/ShopFlowService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:shop="http://ecommerce.resurs.com/v4/msg/shopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <shop:startPaymentSession>
         <preferredId>${#SessionID}</preferredId>
         <paymentMethodId>${#Project#PaymentMethodID_NewAccount}</paymentMethodId>
         <customerIpAddress>127.0.0.2</customerIpAddress>
         <formAction>AFormAction</formAction>
         <paymentSpec>
            <specLines>
               <id>1</id>
               <artNo>NUT-001</artNo>
               <description>Nut (M8)</description>
               <quantity>10000</quantity>
               <unitMeasure>st</unitMeasure>
               <unitAmountWithoutVat>0.80</unitAmountWithoutVat>
               <vatPct>25</vatPct>
               <totalVatAmount>2000.00</totalVatAmount>
               <totalAmount>10000.00</totalAmount>
            </specLines>
            <specLines>
               <id>2</id>
               <artNo>BOLT-002</artNo>
               <description>Bolt (M8x125mm)</description>
               <quantity>10</quantity>
               <unitMeasure>st</unitMeasure>
               <unitAmountWithoutVat>1.60</unitAmountWithoutVat>
               <vatPct>25</vatPct>
               <totalVatAmount>4.00</totalVatAmount>
               <totalAmount>20.00</totalAmount>
            </specLines>
            <totalAmount>10020.00</totalAmount>
            <totalVatAmount>2004.00</totalVatAmount>
         </paymentSpec>
      </shop:startPaymentSession>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:assertion type="SOAP Response"/><con:assertion type="Schema Compliance"><con:configuration/></con:assertion><con:assertion type="SOAP Fault Assertion"/><con:assertion type="Simple Contains" name="Contains Session Identity"><con:configuration><token>&lt;id>${#SessionID}&lt;/id></token><ignoreCase>false</ignoreCase><useRegEx>false</useRegEx></con:configuration></con:assertion><con:assertion type="Simple Contains" name="Contains Limit Application Form as Object"><con:configuration><token>(?s).*&lt;limitApplicationFormAsObjectGraph>[\S\s]*&lt;/limitApplicationFormAsObjectGraph>.*</token><ignoreCase>false</ignoreCase><useRegEx>true</useRegEx></con:configuration></con:assertion><con:assertion type="Simple Contains" name="Contains Limit Application Form as Form"><con:configuration><token>(?s).*&lt;limitApplicationFormAsCompiledForm>[\S\s]*&lt;/limitApplicationFormAsCompiledForm>.*</token><ignoreCase>false</ignoreCase><useRegEx>true</useRegEx></con:configuration></con:assertion><con:assertion type="Simple NotContains" name="Does Not Contain 10000 Option"><con:configuration><token>&lt;value>10000&lt;/value></token><ignoreCase>false</ignoreCase><useRegEx>false</useRegEx></con:configuration></con:assertion><con:assertion type="Simple NotContains" name="Does Not Contain 5000 Option"><con:configuration><token>&lt;value>5000&lt;/value></token><ignoreCase>false</ignoreCase><useRegEx>false</useRegEx></con:configuration></con:assertion><con:assertion type="Simple Contains" name="Contains Purchase Amount Label"><con:configuration><token>&lt;label>Köpbelopp (10020)&lt;/label></token><ignoreCase>false</ignoreCase><useRegEx>false</useRegEx></con:configuration></con:assertion><con:assertion type="Simple Contains" name="Contains Purchase Amount Value"><con:configuration><token>&lt;value>10020&lt;/value></token><ignoreCase>false</ignoreCase><useRegEx>false</useRegEx></con:configuration></con:assertion><con:credentials><con:username>${#Project#BasicAuthUser}</con:username><con:password>${#Project#BasicAuthPass}</con:password><con:domain/><con:authType>No Authorization</con:authType></con:credentials><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508"/><con:wsrmConfig version="1.2"/></con:request></con:config></con:testStep><con:testStep type="request" name="Create Limit (NOK)"><con:settings/><con:config xsi:type="con:RequestStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:interface>ShopFlowWebServiceImplPortBinding</con:interface><con:operation>submitLimitApplication</con:operation><con:request name="Create Limit (NOK)"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:encoding>UTF-8</con:encoding><con:endpoint>${#Project#ServiceEndpoint}/ShopFlowService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:shop="http://ecommerce.resurs.com/v4/msg/shopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <shop:submitLimitApplication>
         <paymentSessionId>${#SessionID}</paymentSessionId>
         <yourCustomerId>Cust-${#ID}</yourCustomerId>
         <formDataResponse><![CDATA[
<resurs-response>
    <amount>300.00</amount>
    <applicant-government-id>${#GovernmentID}</applicant-government-id>
    <applicant-telephone-number></applicant-telephone-number>
    <applicant-mobile-number>0705-12 35 46</applicant-mobile-number>
    <applicant-email-address>javatest@resurs.se</applicant-email-address>
</resurs-response>
            ]]]]>><![CDATA[</formDataResponse>
      </shop:submitLimitApplication>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:assertion type="SOAP Response"/><con:assertion type="Schema Compliance"><con:configuration/></con:assertion><con:assertion type="SOAP Fault Assertion"/><con:assertion type="Simple Contains" name="Limit is Denied"><con:configuration><token>&lt;decision>DENIED&lt;/decision></token><ignoreCase>false</ignoreCase><useRegEx>false</useRegEx></con:configuration></con:assertion><con:assertion type="Simple Contains" name="Customer is of Type Natural"><con:configuration><token>&lt;type>NATURAL&lt;/type></token><ignoreCase>false</ignoreCase><useRegEx>false</useRegEx></con:configuration></con:assertion><con:credentials><con:username>${#Project#BasicAuthUser}</con:username><con:password>${#Project#BasicAuthPass}</con:password><con:domain/><con:authType>No Authorization</con:authType></con:credentials><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508"/><con:wsrmConfig version="1.2"/></con:request></con:config></con:testStep><con:properties><con:property><con:name>ActualPaymentID</con:name><con:value>Sess-1345106096003-9805</con:value></con:property><con:property><con:name>SigningURL</con:name><con:value>http://dummy.esign.pte.loc/sign.html?signId=5eeed205-ab65-41ff-9768-297eb49e0867&amp;lang=sv</con:value></con:property><con:property><con:name>SignID</con:name><con:value>http://dummy.esign.pte.loc/sign.html?signId=8a4bce96-d6ad-45d8-beb2-d1c84d32ceb3&amp;lang=sv</con:value></con:property><con:property><con:name>StatusChangeURL</con:name><con:value>http://dummy.esign.pte.loc/changeResult.html?signId=5eeed205-ab65-41ff-9768-297eb49e0867&amp;lang=sv&amp;success=true</con:value></con:property></con:properties></con:testCase><con:testCase failOnError="true" failTestCaseOnErrors="true" keepSession="false" maxResults="0" name="New Account - Book &amp; Annul" searchProperties="true" id="12050808-6d9b-41cc-aea9-e941dcf2b269"><con:description>Books a new account purchase, then annuls it.</con:description><con:settings/><con:testStep type="groovy" name="Generate Parameters"><con:settings/><con:config><script>// *** Set basic parameters
String id = System.currentTimeMillis() + "-" + (int)(Math.random() * 10000);
context.setProperty("ID", id);
context.setProperty("SessionID", "Sess-" + id)
context.setProperty("Date", new Date().format('yyyy-MM-dd'))

// *** Get parameters 
def yearFrom = Integer.parseInt(testRunner.testCase.testSuite.project.getPropertyValue("Approved_StartYear"));
def yearTo = Integer.parseInt(testRunner.testCase.testSuite.project.getPropertyValue("Approved_EndYear"));
def String[] ordinals = testRunner.testCase.testSuite.project.getPropertyValue("Ordinals_NotFrozen").split(",");

// *** Generate Swedish government identity
String governmentId = null;
Random random = new Random();
int year = yearFrom + random.nextInt(yearTo - yearFrom);
int dayOfYear = 1 + random.nextInt(365);
Calendar calendar = GregorianCalendar.getInstance();
calendar.set(Calendar.YEAR, year);
calendar.set(Calendar.DAY_OF_YEAR, dayOfYear);
int ordinal = Integer.parseInt(ordinals[random.nextInt(ordinals.length)].trim());
number = random.nextInt(100);
governmentId = String.format("%1\$ty%1\$tm%1\$td%2\$02d%3\$d", calendar.getTime(), number, ordinal);
int sum = 0;
boolean isAlternate = true;
for (int digit = governmentId.length() - 1; digit >= 0; digit--) {
	int value = Integer.parseInt(governmentId.substring(digit, digit + 1));
	if (isAlternate) {
		value *= 2;
		if (value > 9) {
			value = (value % 10) + 1;
		}
	}
sum += value;
isAlternate = !isAlternate 	
} 
int higherDec = (int) (Math.ceil(sum / 10.0f) * 10);
int luhnDigit = higherDec - sum;
governmentId = governmentId + luhnDigit;
context.setProperty("GovernmentID", governmentId);

// *** Log parameters
log.info (
	"Starting session " + context.getProperty("SessionID") + " for " + 
	context.getProperty("GovernmentID") + " on " + context.getProperty("Date"));
</script></con:config></con:testStep><con:testStep type="request" name="Start Payment Session"><con:settings/><con:config xsi:type="con:RequestStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:interface>ShopFlowWebServiceImplPortBinding</con:interface><con:operation>startPaymentSession</con:operation><con:request name="Start Payment Session"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:encoding>UTF-8</con:encoding><con:endpoint>${#Project#ServiceEndpoint}/ShopFlowService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:shop="http://ecommerce.resurs.com/v4/msg/shopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <shop:startPaymentSession>
         <preferredId>${#SessionID}</preferredId>
         <paymentMethodId>${#Project#PaymentMethodID_NewAccount}</paymentMethodId>
         <customerIpAddress>127.0.0.2</customerIpAddress>
         <formAction>AFormAction</formAction>
         <paymentSpec>
            <specLines>
               <id>1</id>
               <artNo>NUT-001</artNo>
               <description>Nut (M8)</description>
               <quantity>10</quantity>
               <unitMeasure>st</unitMeasure>
               <unitAmountWithoutVat>0.80</unitAmountWithoutVat>
               <vatPct>25</vatPct>
               <totalVatAmount>2.00</totalVatAmount>
               <totalAmount>10.00</totalAmount>
            </specLines>
            <specLines>
               <id>2</id>
               <artNo>BOLT-002</artNo>
               <description>Bolt (M8x125mm)</description>
               <quantity>10</quantity>
               <unitMeasure>st</unitMeasure>
               <unitAmountWithoutVat>1.60</unitAmountWithoutVat>
               <vatPct>25</vatPct>
               <totalVatAmount>4.00</totalVatAmount>
               <totalAmount>20.00</totalAmount>
            </specLines>
            <totalAmount>30.00</totalAmount>
            <totalVatAmount>6.00</totalVatAmount>
         </paymentSpec>
      </shop:startPaymentSession>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:assertion type="SOAP Response"/><con:assertion type="Schema Compliance"><con:configuration/></con:assertion><con:assertion type="SOAP Fault Assertion"/><con:assertion type="Simple Contains" name="Contains Session Identity"><con:configuration><token>&lt;id>${#SessionID}&lt;/id></token><ignoreCase>false</ignoreCase><useRegEx>false</useRegEx></con:configuration></con:assertion><con:assertion type="Simple Contains" name="Contains Limit Application Form as Object"><con:configuration><token>(?s).*&lt;limitApplicationFormAsObjectGraph>[\S\s]*&lt;/limitApplicationFormAsObjectGraph>.*</token><ignoreCase>false</ignoreCase><useRegEx>true</useRegEx></con:configuration></con:assertion><con:assertion type="Simple Contains" name="Contains Limit Application Form as Form"><con:configuration><token>(?s).*&lt;limitApplicationFormAsCompiledForm>[\S\s]*&lt;/limitApplicationFormAsCompiledForm>.*</token><ignoreCase>false</ignoreCase><useRegEx>true</useRegEx></con:configuration></con:assertion><con:credentials><con:username>${#Project#BasicAuthUser}</con:username><con:password>${#Project#BasicAuthPass}</con:password><con:domain/><con:authType>No Authorization</con:authType></con:credentials><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508"/><con:wsrmConfig version="1.2"/></con:request></con:config></con:testStep><con:testStep type="request" name="Create Limit (OK)"><con:settings/><con:config xsi:type="con:RequestStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:interface>ShopFlowWebServiceImplPortBinding</con:interface><con:operation>submitLimitApplication</con:operation><con:request name="Create Limit (OK)"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:encoding>UTF-8</con:encoding><con:endpoint>${#Project#ServiceEndpoint}/ShopFlowService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:shop="http://ecommerce.resurs.com/v4/msg/shopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <shop:submitLimitApplication>
         <paymentSessionId>${#SessionID}</paymentSessionId>
         <yourCustomerId>Cust-${#ID}</yourCustomerId>
         <formDataResponse><![CDATA[
<resurs-response>
    <amount>300.00</amount>
    <applicant-government-id>${#GovernmentID}</applicant-government-id>
    <applicant-telephone-number></applicant-telephone-number>
    <applicant-mobile-number>0705-12 35 46</applicant-mobile-number>
    <applicant-email-address>javatest@resurs.se</applicant-email-address>
</resurs-response>
            ]]]]>><![CDATA[</formDataResponse>
      </shop:submitLimitApplication>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:assertion type="SOAP Response"/><con:assertion type="Schema Compliance"><con:configuration/></con:assertion><con:assertion type="SOAP Fault Assertion"/><con:credentials><con:username>${#Project#BasicAuthUser}</con:username><con:password>${#Project#BasicAuthPass}</con:password><con:domain/><con:authType>No Authorization</con:authType></con:credentials><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508"/><con:wsrmConfig version="1.2"/></con:request></con:config></con:testStep><con:testStep type="request" name="Prepare Signing"><con:settings/><con:config xsi:type="con:RequestStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:interface>ShopFlowWebServiceImplPortBinding</con:interface><con:operation>prepareSigning</con:operation><con:request name="Prepare Signing"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:encoding>UTF-8</con:encoding><con:endpoint>${#Project#ServiceEndpoint}/ShopFlowService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:shop="http://ecommerce.resurs.com/v4/msg/shopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <shop:prepareSigning>
         <paymentSessionId>${#SessionID}</paymentSessionId>
         <successUrl>http://www.google.com/search?q=OK</successUrl>
         <failUrl>http://www.google.com/search?q=NOK</failUrl>
      </shop:prepareSigning>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:assertion type="SOAP Response"/><con:assertion type="Schema Compliance"><con:configuration/></con:assertion><con:credentials><con:username>${#Project#BasicAuthUser}</con:username><con:password>${#Project#BasicAuthPass}</con:password><con:domain/><con:authType>No Authorization</con:authType></con:credentials><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508"/><con:wsrmConfig version="1.2"/></con:request></con:config></con:testStep><con:testStep type="goto" name="Is Bad Customer"><con:settings/><con:config xsi:type="con:GotoStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:condition><con:name>Is Bad Customer</con:name><con:type>XPATH</con:type><con:expression>declare namespace soap='http://schemas.xmlsoap.org/soap/envelope/';
declare namespace ns3='http://ecommerce.resurs.com/v4/msg/exception';
declare namespace ns2='http://ecommerce.resurs.com/v4/msg/shopflow';
contains(/soap:Envelope/soap:Body/soap:Fault/detail/ns3:ECommerceError/userErrorMessage/text(), "Oklarheter kring existerande krediter")</con:expression><con:targetStep>Generate Parameters</con:targetStep></con:condition></con:config></con:testStep><con:testStep type="transfer" name="Extract Signing URL"><con:settings/><con:config xsi:type="con:PropertyTransfersStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:transfers setNullOnMissingSource="true" transferTextContent="true" failOnError="true" ignoreEmpty="false" transferToAll="false" useXQuery="false" entitize="false" transferChildNodes="false" disabled="false"><con:name>Retrieve Signing URL</con:name><con:sourceType>Response</con:sourceType><con:sourceStep>Prepare Signing</con:sourceStep><con:sourcePath>declare namespace soap='http://schemas.xmlsoap.org/soap/envelope/';
declare namespace ns3='http://ecommerce.resurs.com/v4/msg/shopflow';
//soap:Envelope/soap:Body/ns3:prepareSigningResponse/return/text()</con:sourcePath><con:targetType>SigningURL</con:targetType><con:targetStep>#TestCase#</con:targetStep><con:targetPath>
</con:targetPath></con:transfers></con:config></con:testStep><con:testStep type="groovy" name="Process Signing URL"><con:settings/><con:config><script>// *** Convert the signing URL to the sign OK/NOK URL
def fullURL = testRunner.testCase.getPropertyValue( "SigningURL" )
def statusChangeURL = fullURL.replaceAll("sign.html", "changeResult.html");
statusChangeURL=statusChangeURL+"&amp;success=true";
//log.info "statusChangeURL = " + statusChangeURL;
testRunner.testCase.setPropertyValue("StatusChangeURL", statusChangeURL);
</script></con:config></con:testStep><con:testStep type="httprequest" name="Sign Agreement (OK)"><con:settings/><con:config method="GET" xsi:type="con:HttpRequest" name="Sign Agreement (OK)" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:endpoint>${#TestCase#StatusChangeURL}</con:endpoint><con:request/><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:parameters/></con:config></con:testStep><con:testStep type="request" name="Book Payment"><con:settings/><con:config xsi:type="con:RequestStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:interface>ShopFlowWebServiceImplPortBinding</con:interface><con:operation>bookPayment</con:operation><con:request name="Book Payment"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:encoding>UTF-8</con:encoding><con:endpoint>${#Project#ServiceEndpoint}/ShopFlowService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:shop="http://ecommerce.resurs.com/v4/msg/shopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <shop:bookPayment>
         <paymentSessionId>${#SessionID}</paymentSessionId>
         <waitForFraudControl>true</waitForFraudControl>
         <annulIfFrozen>false</annulIfFrozen>
         <metaData>
            <key>Expressfrakt</key>
            <value>true</value>
         </metaData>
         <priority>100</priority>
      </shop:bookPayment>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:assertion type="SOAP Response"/><con:assertion type="Schema Compliance"><con:configuration/></con:assertion><con:assertion type="SOAP Fault Assertion"/><con:credentials><con:username>${#Project#BasicAuthUser}</con:username><con:password>${#Project#BasicAuthPass}</con:password><con:domain/><con:authType>No Authorization</con:authType></con:credentials><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508"/><con:wsrmConfig version="1.2"/></con:request></con:config></con:testStep><con:testStep type="transfer" name="Get Actual Payment ID"><con:settings/><con:config xsi:type="con:PropertyTransfersStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:transfers setNullOnMissingSource="true" transferTextContent="true" failOnError="true" ignoreEmpty="false" transferToAll="false" useXQuery="false" entitize="false" transferChildNodes="false"><con:name>Payment ID</con:name><con:sourceType>Response</con:sourceType><con:sourceStep>Book Payment</con:sourceStep><con:sourcePath>declare namespace soapenv='http://schemas.xmlsoap.org/soap/envelope/';
declare namespace shop='http://ecommerce.resurs.com/v4/msg/shopflow';
/soapenv:Envelope/soapenv:Body/shop:bookPaymentResponse/return/paymentId</con:sourcePath><con:targetType>ActualPaymentID</con:targetType><con:targetStep>#TestCase#</con:targetStep><con:targetPath/></con:transfers></con:config></con:testStep><con:testStep type="delay" name="Wait (#1)"><con:settings/><con:config><delay>250</delay></con:config></con:testStep><con:testStep type="request" name="Annul Payment (Unspecified)"><con:settings/><con:config xsi:type="con:RequestStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:interface>AfterShopFlowWebServiceImplPortBinding</con:interface><con:operation>annulPayment</con:operation><con:request name="Annul Payment (Unspecified)"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:encoding>UTF-8</con:encoding><con:endpoint>${#Project#ServiceEndpoint}/AfterShopFlowService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:aft="http://ecommerce.resurs.com/v4/msg/aftershopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <aft:annulPayment>
         <paymentId>${#TestCase#ActualPaymentID}</paymentId>
      </aft:annulPayment>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:assertion type="SOAP Response"/><con:assertion type="Schema Compliance"><con:configuration/></con:assertion><con:assertion type="SOAP Fault Assertion"/><con:credentials><con:username>${#Project#BasicAuthUser}</con:username><con:password>${#Project#BasicAuthPass}</con:password><con:domain/><con:authType>No Authorization</con:authType></con:credentials><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508"/><con:wsrmConfig version="1.2"/></con:request></con:config></con:testStep><con:testStep type="delay" name="Wait (#2)"><con:settings/><con:config><delay>250</delay></con:config></con:testStep><con:testStep type="request" name="Get Payment Details"><con:settings/><con:config xsi:type="con:RequestStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:interface>AfterShopFlowWebServiceImplPortBinding</con:interface><con:operation>getPayment</con:operation><con:request name="Get Payment Details"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:encoding>UTF-8</con:encoding><con:endpoint>${#Project#ServiceEndpoint}/AfterShopFlowService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:aft="http://ecommerce.resurs.com/v4/msg/aftershopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <aft:getPayment>
         <paymentId>${#TestCase#ActualPaymentID}</paymentId>
      </aft:getPayment>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:assertion type="SOAP Response"/><con:assertion type="Schema Compliance"><con:configuration/></con:assertion><con:assertion type="SOAP Fault Assertion"/><con:assertion type="XPath Match" name="Contains AUTHORIZE"><con:configuration><path>declare namespace soap='http://schemas.xmlsoap.org/soap/envelope/';
declare namespace ns3='http://ecommerce.resurs.com/v4/msg/exception';
declare namespace ns2='http://ecommerce.resurs.com/v4/msg/aftershopflow';
/soap:Envelope/soap:Body/ns2:getPaymentResponse/return/paymentDiffs[1]/type/text()</path><content>AUTHORIZE</content><allowWildcards>false</allowWildcards><ignoreNamspaceDifferences>false</ignoreNamspaceDifferences><ignoreComments>false</ignoreComments></con:configuration></con:assertion><con:assertion type="XPath Match" name="Contains ANNUL"><con:configuration><path>declare namespace soap='http://schemas.xmlsoap.org/soap/envelope/';
declare namespace ns3='http://ecommerce.resurs.com/v4/msg/exception';
declare namespace ns2='http://ecommerce.resurs.com/v4/msg/aftershopflow';
/soap:Envelope/soap:Body/ns2:getPaymentResponse/return/paymentDiffs[2]/type/text()</path><content>ANNUL</content><allowWildcards>false</allowWildcards><ignoreNamspaceDifferences>false</ignoreNamspaceDifferences><ignoreComments>false</ignoreComments></con:configuration></con:assertion><con:assertion type="XPath Match" name="Total Amount is 0"><con:configuration><path>declare namespace ns2='http://ecommerce.resurs.com/v4/msg/exception';
declare namespace soap='http://schemas.xmlsoap.org/soap/envelope/';
declare namespace ns3='http://ecommerce.resurs.com/v4/msg/aftershopflow';
/soap:Envelope/soap:Body/ns3:getPaymentResponse/return/totalAmount/text()</path><content>0.*</content><allowWildcards>true</allowWildcards><ignoreNamspaceDifferences>false</ignoreNamspaceDifferences><ignoreComments>false</ignoreComments></con:configuration></con:assertion><con:assertion type="XPath Match" name="Government Id is OK"><con:configuration><path>declare namespace ns2='http://ecommerce.resurs.com/v4/msg/exception';
declare namespace soap='http://schemas.xmlsoap.org/soap/envelope/';
declare namespace ns3='http://ecommerce.resurs.com/v4/msg/aftershopflow';
/soap:Envelope/soap:Body/ns3:getPaymentResponse/return/customer/governmentId/text()</path><content>${#GovernmentID}</content><allowWildcards>false</allowWildcards><ignoreNamspaceDifferences>false</ignoreNamspaceDifferences><ignoreComments>false</ignoreComments></con:configuration></con:assertion><con:assertion type="XPath Match" name="Payment Session Id is OK"><con:configuration><path>declare namespace soap='http://schemas.xmlsoap.org/soap/envelope/';
declare namespace ns3='http://ecommerce.resurs.com/v4/msg/exception';
declare namespace ns2='http://ecommerce.resurs.com/v4/msg/aftershopflow';
/soap:Envelope/soap:Body/ns2:getPaymentResponse/return/id/text()</path><content>${#SessionID}</content><allowWildcards>false</allowWildcards><ignoreNamspaceDifferences>false</ignoreNamspaceDifferences><ignoreComments>false</ignoreComments></con:configuration></con:assertion><con:credentials><con:username>${#Project#BasicAuthUser}</con:username><con:password>${#Project#BasicAuthPass}</con:password><con:domain/><con:authType>No Authorization</con:authType></con:credentials><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508"/><con:wsrmConfig version="1.2"/></con:request></con:config></con:testStep><con:properties><con:property><con:name>ActualPaymentID</con:name><con:value>Sess-1417516409115-2702</con:value></con:property><con:property><con:name>SigningURL</con:name><con:value xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">http://test.resurs.com/signicat-mock-server/sign.html?request_id=a039ae01-cce4-49e2-8725-162d250254b7&amp;task_id=1</con:value></con:property><con:property><con:name>SignID</con:name><con:value>http://dummy.esign.pte.loc/sign.html?signId=8a4bce96-d6ad-45d8-beb2-d1c84d32ceb3&amp;lang=sv</con:value></con:property><con:property><con:name>StatusChangeURL</con:name><con:value>http://test.resurs.com/signicat-mock-server/changeResult.html?request_id=a039ae01-cce4-49e2-8725-162d250254b7&amp;task_id=1&amp;success=true</con:value></con:property></con:properties></con:testCase><con:testCase failOnError="true" failTestCaseOnErrors="true" keepSession="false" maxResults="0" name="Corporate Invoice - Credit Denied" searchProperties="true" id="bcd34e46-c4f7-4c13-86f7-8f1ebc181bdc"><con:description>Attempts to perform a corporate invoice purchase, but is denied any limit.</con:description><con:settings/><con:testStep type="groovy" name="Generate Parameters"><con:settings/><con:config><script>// *** Set basic parameters
String id = System.currentTimeMillis() + "-" + (int)(Math.random() * 10000);
context.setProperty("ID", id);
context.setProperty("SessionID", "Sess-" + id)
context.setProperty("Date", new Date().format('yyyy-MM-dd'))

// *** Get parameters 
def yearFrom = Integer.parseInt(testRunner.testCase.testSuite.project.getPropertyValue("Denied_StartYear"));
def yearTo = Integer.parseInt(testRunner.testCase.testSuite.project.getPropertyValue("Denied_EndYear"));
def String[] ordinals = testRunner.testCase.testSuite.project.getPropertyValue("Ordinals_NotFrozen").split(",");

// *** Generate Swedish government identity
String governmentId = null;
Random random = new Random();
int year = yearFrom + random.nextInt(yearTo - yearFrom);
int dayOfYear = 1 + random.nextInt(365);
Calendar calendar = GregorianCalendar.getInstance();
calendar.set(Calendar.YEAR, year);
calendar.set(Calendar.DAY_OF_YEAR, dayOfYear);
int ordinal = Integer.parseInt(ordinals[random.nextInt(ordinals.length)].trim());
number = random.nextInt(100);
governmentId = String.format("%1\$ty%1\$tm%1\$td%2\$02d%3\$d", calendar.getTime(), number, ordinal);
int sum = 0;
boolean isAlternate = true;
for (int digit = governmentId.length() - 1; digit >= 0; digit--) {
	int value = Integer.parseInt(governmentId.substring(digit, digit + 1));
	if (isAlternate) {
		value *= 2;
		if (value > 9) {
			value = (value % 10) + 1;
		}
	}
sum += value;
isAlternate = !isAlternate 	
} 
int higherDec = (int) (Math.ceil(sum / 10.0f) * 10);
int luhnDigit = higherDec - sum;
governmentId = governmentId + luhnDigit;
context.setProperty("GovernmentID", governmentId);

// *** Generate Swedish corporate government identity
int month = 20 + random.nextInt(80);
int day = random.nextInt(100);
number = random.nextInt(100);

String orgNo = String.format("55%1\$02d%2\$02d%3\$02d%4\$d", month, day, number, ordinal);
String orgNoWithDash = String.format("55%1\$02d%2\$02d-%3\$02d%4\$d", month, day, number, ordinal);

sum = 0;
isAlternate = true;
for (int digit = orgNo.length() - 1; digit >= 0; digit--) {
	int value = Integer.parseInt(orgNo.substring(digit, digit + 1));
	if (isAlternate) {
		value *= 2;
		if (value > 9) {
			value = (value % 10) + 1;
		}
	}
	sum += value;
	isAlternate = !isAlternate 	
} 

higherDec = (int) (Math.ceil(sum / 10.0f) * 10);
luhnDigit = higherDec - sum;
orgNo = orgNo + luhnDigit;
orgNoWithDash = orgNoWithDash + luhnDigit;
context.setProperty("OrgNo", orgNo);  

// *** Log parameters
log.info (
	"Starting session " + context.getProperty("SessionID") + " for " + 
	context.getProperty("OrgNo") + " by " +
	context.getProperty("GovernmentID") + " on " + context.getProperty("Date"));
</script></con:config></con:testStep><con:testStep type="request" name="Start Payment Session"><con:settings/><con:config xsi:type="con:RequestStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:interface>ShopFlowWebServiceImplPortBinding</con:interface><con:operation>startPaymentSession</con:operation><con:request name="Start Payment Session"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:encoding>UTF-8</con:encoding><con:endpoint>${#Project#ServiceEndpoint}/ShopFlowService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:shop="http://ecommerce.resurs.com/v4/msg/shopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <shop:startPaymentSession>
         <preferredId>${#SessionID}</preferredId>
         <paymentMethodId>${#Project#PaymentMethodID_Invoice_Corp}</paymentMethodId>
         <customerIpAddress>127.0.0.2</customerIpAddress>
         <formAction>AFormAction</formAction>
         <paymentSpec>
            <specLines>
               <id>1</id>
               <artNo>NUT-001</artNo>
               <description>Nut (M8)</description>
               <quantity>10</quantity>
               <unitMeasure>st</unitMeasure>
               <unitAmountWithoutVat>0.80</unitAmountWithoutVat>
               <vatPct>25</vatPct>
               <totalVatAmount>2.00</totalVatAmount>
               <totalAmount>10.00</totalAmount>
            </specLines>
            <specLines>
               <id>2</id>
               <artNo>BOLT-002</artNo>
               <description>Bolt (M8x125mm)</description>
               <quantity>10</quantity>
               <unitMeasure>st</unitMeasure>
               <unitAmountWithoutVat>1.60</unitAmountWithoutVat>
               <vatPct>25</vatPct>
               <totalVatAmount>4.00</totalVatAmount>
               <totalAmount>20.00</totalAmount>
            </specLines>
            <totalAmount>30.00</totalAmount>
            <totalVatAmount>6.00</totalVatAmount>
         </paymentSpec>
      </shop:startPaymentSession>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:assertion type="SOAP Response"/><con:assertion type="Schema Compliance"><con:configuration/></con:assertion><con:assertion type="SOAP Fault Assertion"/><con:assertion type="Simple Contains" name="Contains Session Identity"><con:configuration><token>&lt;id>${#SessionID}&lt;/id></token><ignoreCase>false</ignoreCase><useRegEx>false</useRegEx></con:configuration></con:assertion><con:assertion type="Simple Contains" name="Contains Limit Application Form as Object"><con:configuration><token>(?s).*&lt;limitApplicationFormAsObjectGraph>[\S\s]*&lt;/limitApplicationFormAsObjectGraph>.*</token><ignoreCase>false</ignoreCase><useRegEx>true</useRegEx></con:configuration></con:assertion><con:assertion type="Simple Contains" name="Contains Limit Application Form as Form"><con:configuration><token>(?s).*&lt;limitApplicationFormAsCompiledForm>[\S\s]*&lt;/limitApplicationFormAsCompiledForm>.*</token><ignoreCase>false</ignoreCase><useRegEx>true</useRegEx></con:configuration></con:assertion><con:credentials><con:username>${#Project#BasicAuthUser}</con:username><con:password>${#Project#BasicAuthPass}</con:password><con:domain/><con:authType>No Authorization</con:authType></con:credentials><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508"/><con:wsrmConfig version="1.2"/></con:request></con:config></con:testStep><con:testStep type="request" name="Create Limit (NOK)"><con:settings/><con:config xsi:type="con:RequestStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:interface>ShopFlowWebServiceImplPortBinding</con:interface><con:operation>submitLimitApplication</con:operation><con:request name="Create Limit (NOK)"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:encoding>UTF-8</con:encoding><con:endpoint>${#Project#ServiceEndpoint}/ShopFlowService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:shop="http://ecommerce.resurs.com/v4/msg/shopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <shop:submitLimitApplication>
         <paymentSessionId>${#SessionID}</paymentSessionId>
         <yourCustomerId>Cust-${#ID}</yourCustomerId>
         <formDataResponse><![CDATA[
<resurs-response>
    <amount>300.00</amount>
    <applicant-government-id>${#OrgNo}</applicant-government-id>
    <applicant-full-name>JavaTest XB</applicant-full-name>
    <contact-government-id>${#GovernmentID}</contact-government-id>
    <applicant-telephone-number>042-12 34 56</applicant-telephone-number>
    <applicant-mobile-number>0705-12 35 46</applicant-mobile-number>
    <applicant-email-address>javatest@resurs.se</applicant-email-address>
</resurs-response>
            ]]]]>><![CDATA[</formDataResponse>
      </shop:submitLimitApplication>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:assertion type="SOAP Response"/><con:assertion type="Schema Compliance"><con:configuration/></con:assertion><con:assertion type="SOAP Fault Assertion"/><con:assertion type="Simple Contains" name="Limit is Denied" disabled="true"><con:configuration><token>&lt;decision>.*&lt;/decision></token><ignoreCase>true</ignoreCase><useRegEx>true</useRegEx></con:configuration></con:assertion><con:assertion type="Simple Contains" name="Customer is of Type Legal"><con:configuration><token>&lt;type>LEGAL&lt;/type></token><ignoreCase>false</ignoreCase><useRegEx>false</useRegEx></con:configuration></con:assertion><con:assertion type="XPath Match" name="XPath Match"><con:configuration/></con:assertion><con:credentials><con:username>${#Project#BasicAuthUser}</con:username><con:password>${#Project#BasicAuthPass}</con:password><con:domain/><con:authType>No Authorization</con:authType></con:credentials><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508"/><con:wsrmConfig version="1.2"/></con:request></con:config></con:testStep><con:properties><con:property><con:name>ActualPaymentID</con:name><con:value>Sess-1345638839955-9592</con:value></con:property><con:property><con:name>SigningURL</con:name><con:value>http://dummy.esign.pte.loc/sign.html?signId=4aadab46-b93f-4d4d-98e1-36b6e1dc6c5d&amp;lang=sv</con:value></con:property><con:property><con:name>SignID</con:name><con:value>http://dummy.esign.pte.loc/sign.html?signId=8a4bce96-d6ad-45d8-beb2-d1c84d32ceb3&amp;lang=sv</con:value></con:property><con:property><con:name>StatusChangeURL</con:name><con:value>http://dummy.esign.pte.loc/changeResult.html?signId=4aadab46-b93f-4d4d-98e1-36b6e1dc6c5d&amp;lang=sv&amp;success=true</con:value></con:property></con:properties></con:testCase><con:testCase failOnError="true" failTestCaseOnErrors="true" keepSession="false" maxResults="0" name="Corporate Invoice - Book &amp; Annul" searchProperties="true" id="97e67df2-1a4a-4174-918a-fdc8b570f969"><con:description>Books a corporate invoice purchase, then annuls it.</con:description><con:settings/><con:testStep type="groovy" name="Generate Parameters"><con:settings/><con:config><script>// *** Set basic parameters
String id = System.currentTimeMillis() + "-" + (int)(Math.random() * 10000);
context.setProperty("ID", id);
context.setProperty("SessionID", "Sess-" + id)
context.setProperty("Date", new Date().format('yyyy-MM-dd'))

// *** Get parameters 
def yearFrom = Integer.parseInt(testRunner.testCase.testSuite.project.getPropertyValue("Approved_StartYear"));
def yearTo = Integer.parseInt(testRunner.testCase.testSuite.project.getPropertyValue("Approved_EndYear"));
def String[] ordinals = testRunner.testCase.testSuite.project.getPropertyValue("Ordinals_NotFrozen").split(",");

// *** Generate Swedish government identity
String governmentId = null;
Random random = new Random();
int year = yearFrom + random.nextInt(yearTo - yearFrom);
int dayOfYear = 1 + random.nextInt(365);
Calendar calendar = GregorianCalendar.getInstance();
calendar.set(Calendar.YEAR, year);
calendar.set(Calendar.DAY_OF_YEAR, dayOfYear);
int ordinal = Integer.parseInt(ordinals[random.nextInt(ordinals.length)].trim());
number = random.nextInt(100);
governmentId = String.format("%1\$ty%1\$tm%1\$td%2\$02d%3\$d", calendar.getTime(), number, ordinal);
int sum = 0;
boolean isAlternate = true;
for (int digit = governmentId.length() - 1; digit >= 0; digit--) {
	int value = Integer.parseInt(governmentId.substring(digit, digit + 1));
	if (isAlternate) {
		value *= 2;
		if (value > 9) {
			value = (value % 10) + 1;
		}
	}
sum += value;
isAlternate = !isAlternate 	
} 
int higherDec = (int) (Math.ceil(sum / 10.0f) * 10);
int luhnDigit = higherDec - sum;
governmentId = governmentId + luhnDigit;
context.setProperty("GovernmentID", governmentId);

// *** Generate Swedish corporate government identity
int month = 20 + random.nextInt(80);
int day = random.nextInt(100);
number = random.nextInt(100);

String orgNo = String.format("55%1\$02d%2\$02d%3\$02d%4\$d", month, day, number, ordinal);
String orgNoWithDash = String.format("55%1\$02d%2\$02d-%3\$02d%4\$d", month, day, number, ordinal);

sum = 0;
isAlternate = true;
for (int digit = orgNo.length() - 1; digit >= 0; digit--) {
	int value = Integer.parseInt(orgNo.substring(digit, digit + 1));
	if (isAlternate) {
		value *= 2;
		if (value > 9) {
			value = (value % 10) + 1;
		}
	}
	sum += value;
	isAlternate = !isAlternate 	
} 

higherDec = (int) (Math.ceil(sum / 10.0f) * 10);
luhnDigit = higherDec - sum;
orgNo = orgNo + luhnDigit;
orgNoWithDash = orgNoWithDash + luhnDigit;
context.setProperty("OrgNo", orgNo);  

// *** Log parameters
log.info (
	"Starting session " + context.getProperty("SessionID") + " for " + 
	context.getProperty("OrgNo") + " by " +
	context.getProperty("GovernmentID") + " on " + context.getProperty("Date"));
</script></con:config></con:testStep><con:testStep type="request" name="Start Payment Session"><con:settings/><con:config xsi:type="con:RequestStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:interface>ShopFlowWebServiceImplPortBinding</con:interface><con:operation>startPaymentSession</con:operation><con:request name="Start Payment Session"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:encoding>UTF-8</con:encoding><con:endpoint>${#Project#ServiceEndpoint}/ShopFlowService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:shop="http://ecommerce.resurs.com/v4/msg/shopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <shop:startPaymentSession>
         <preferredId>${#SessionID}</preferredId>
         <paymentMethodId>${#Project#PaymentMethodID_Invoice_Corp}</paymentMethodId>
         <customerIpAddress>127.0.0.2</customerIpAddress>
         <formAction>AFormAction</formAction>
         <paymentSpec>
            <specLines>
               <id>1</id>
               <artNo>NUT-001</artNo>
               <description>Nut (M8)</description>
               <quantity>10</quantity>
               <unitMeasure>st</unitMeasure>
               <unitAmountWithoutVat>0.80</unitAmountWithoutVat>
               <vatPct>25</vatPct>
               <totalVatAmount>2.00</totalVatAmount>
               <totalAmount>10.00</totalAmount>
            </specLines>
            <specLines>
               <id>2</id>
               <artNo>BOLT-002</artNo>
               <description>Bolt (M8x125mm)</description>
               <quantity>10</quantity>
               <unitMeasure>st</unitMeasure>
               <unitAmountWithoutVat>1.60</unitAmountWithoutVat>
               <vatPct>25</vatPct>
               <totalVatAmount>4.00</totalVatAmount>
               <totalAmount>20.00</totalAmount>
            </specLines>
            <totalAmount>30.00</totalAmount>
            <totalVatAmount>6.00</totalVatAmount>
         </paymentSpec>
      </shop:startPaymentSession>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:assertion type="SOAP Response"/><con:assertion type="Schema Compliance"><con:configuration/></con:assertion><con:assertion type="SOAP Fault Assertion"/><con:assertion type="Simple Contains" name="Contains Session Identity"><con:configuration><token>&lt;id>${#SessionID}&lt;/id></token><ignoreCase>false</ignoreCase><useRegEx>false</useRegEx></con:configuration></con:assertion><con:assertion type="Simple Contains" name="Contains Limit Application Form as Object"><con:configuration><token>(?s).*&lt;limitApplicationFormAsObjectGraph>[\S\s]*&lt;/limitApplicationFormAsObjectGraph>.*</token><ignoreCase>false</ignoreCase><useRegEx>true</useRegEx></con:configuration></con:assertion><con:assertion type="Simple Contains" name="Contains Limit Application Form as Form"><con:configuration><token>(?s).*&lt;limitApplicationFormAsCompiledForm>[\S\s]*&lt;/limitApplicationFormAsCompiledForm>.*</token><ignoreCase>false</ignoreCase><useRegEx>true</useRegEx></con:configuration></con:assertion><con:credentials><con:username>${#Project#BasicAuthUser}</con:username><con:password>${#Project#BasicAuthPass}</con:password><con:domain/><con:authType>No Authorization</con:authType></con:credentials><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508"/><con:wsrmConfig version="1.2"/></con:request></con:config></con:testStep><con:testStep type="request" name="Create Limit (OK)"><con:settings/><con:config xsi:type="con:RequestStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:interface>ShopFlowWebServiceImplPortBinding</con:interface><con:operation>submitLimitApplication</con:operation><con:request name="Create Limit (OK)"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:encoding>UTF-8</con:encoding><con:endpoint>${#Project#ServiceEndpoint}/ShopFlowService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:shop="http://ecommerce.resurs.com/v4/msg/shopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <shop:submitLimitApplication>
         <paymentSessionId>${#SessionID}</paymentSessionId>
         <yourCustomerId>Cust-${#ID}</yourCustomerId>
         <formDataResponse><![CDATA[
<resurs-response>
    <amount>300.00</amount>
    <applicant-government-id>${#OrgNo}</applicant-government-id>
    <applicant-full-name>JavaTest XB</applicant-full-name>
    <contact-government-id>${#GovernmentID}</contact-government-id>
    <applicant-telephone-number>042-12 34 56</applicant-telephone-number>
    <applicant-mobile-number>0705-12 35 46</applicant-mobile-number>
    <applicant-email-address>javatest@resurs.se</applicant-email-address>
</resurs-response>
            ]]]]>><![CDATA[</formDataResponse>
      </shop:submitLimitApplication>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:assertion type="SOAP Response"/><con:assertion type="Schema Compliance"><con:configuration/></con:assertion><con:assertion type="SOAP Fault Assertion"/><con:assertion type="Simple Contains" name="Limit is Granted" disabled="true"><con:configuration><token>&lt;decision>GRANTED&lt;/decision></token><ignoreCase>false</ignoreCase><useRegEx>false</useRegEx></con:configuration></con:assertion><con:assertion type="Simple Contains" name="Customer is of Type Legal"><con:configuration><token>&lt;type>LEGAL&lt;/type></token><ignoreCase>false</ignoreCase><useRegEx>false</useRegEx></con:configuration></con:assertion><con:credentials><con:username>${#Project#BasicAuthUser}</con:username><con:password>${#Project#BasicAuthPass}</con:password><con:domain/><con:authType>No Authorization</con:authType></con:credentials><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508"/><con:wsrmConfig version="1.2"/></con:request></con:config></con:testStep><con:testStep type="request" name="Prepare Signing"><con:settings/><con:config xsi:type="con:RequestStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:interface>ShopFlowWebServiceImplPortBinding</con:interface><con:operation>prepareSigning</con:operation><con:request name="Prepare Signing"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:encoding>UTF-8</con:encoding><con:endpoint>${#Project#ServiceEndpoint}/ShopFlowService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:shop="http://ecommerce.resurs.com/v4/msg/shopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <shop:prepareSigning>
         <paymentSessionId>${#SessionID}</paymentSessionId>
         <successUrl>http://www.google.com/search?q=OK</successUrl>
         <failUrl>http://www.google.com/search?q=NOK</failUrl>
      </shop:prepareSigning>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:assertion type="SOAP Response"/><con:assertion type="Schema Compliance"><con:configuration/></con:assertion><con:credentials><con:username>${#Project#BasicAuthUser}</con:username><con:password>${#Project#BasicAuthPass}</con:password><con:domain/><con:authType>No Authorization</con:authType></con:credentials><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508"/><con:wsrmConfig version="1.2"/></con:request></con:config></con:testStep><con:testStep type="goto" name="Is Bad Customer"><con:settings/><con:config xsi:type="con:GotoStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:condition><con:name>Is Bad Customer</con:name><con:type>XPATH</con:type><con:expression>declare namespace soap='http://schemas.xmlsoap.org/soap/envelope/';
declare namespace ns3='http://ecommerce.resurs.com/v4/msg/exception';
declare namespace ns2='http://ecommerce.resurs.com/v4/msg/shopflow';
contains(/soap:Envelope/soap:Body/soap:Fault/detail/ns3:ECommerceError/userErrorMessage/text(), "Oklarheter kring existerande krediter")</con:expression><con:targetStep>Generate Parameters</con:targetStep></con:condition></con:config></con:testStep><con:testStep type="transfer" name="Extract Signing URL"><con:settings/><con:config xsi:type="con:PropertyTransfersStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:transfers setNullOnMissingSource="true" transferTextContent="true" failOnError="true" ignoreEmpty="false" transferToAll="false" useXQuery="false" entitize="false" transferChildNodes="false" disabled="false"><con:name>Retrieve Signing URL</con:name><con:sourceType>Response</con:sourceType><con:sourceStep>Prepare Signing</con:sourceStep><con:sourcePath>declare namespace soap='http://schemas.xmlsoap.org/soap/envelope/';
declare namespace ns3='http://ecommerce.resurs.com/v4/msg/shopflow';
//soap:Envelope/soap:Body/ns3:prepareSigningResponse/return/text()</con:sourcePath><con:targetType>SigningURL</con:targetType><con:targetStep>#TestCase#</con:targetStep><con:targetPath>
</con:targetPath></con:transfers></con:config></con:testStep><con:testStep type="groovy" name="Process Signing URL"><con:settings/><con:config><script>// *** Convert the signing URL to the sign OK/NOK URL
def fullURL = testRunner.testCase.getPropertyValue( "SigningURL" )
def statusChangeURL = fullURL.replaceAll("sign.html", "changeResult.html");
statusChangeURL=statusChangeURL+"&amp;success=true";
//log.info "statusChangeURL = " + statusChangeURL;
testRunner.testCase.setPropertyValue("StatusChangeURL", statusChangeURL);
</script></con:config></con:testStep><con:testStep type="httprequest" name="Sign Agreement (OK)"><con:settings/><con:config method="GET" xsi:type="con:HttpRequest" name="Sign Agreement (OK)" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:endpoint>${#TestCase#StatusChangeURL}</con:endpoint><con:request/><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:parameters/></con:config></con:testStep><con:testStep type="request" name="Book Payment"><con:settings/><con:config xsi:type="con:RequestStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:interface>ShopFlowWebServiceImplPortBinding</con:interface><con:operation>bookPayment</con:operation><con:request name="Book Payment"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:encoding>UTF-8</con:encoding><con:endpoint>${#Project#ServiceEndpoint}/ShopFlowService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:shop="http://ecommerce.resurs.com/v4/msg/shopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <shop:bookPayment>
         <paymentSessionId>${#SessionID}</paymentSessionId>
         <waitForFraudControl>true</waitForFraudControl>
         <annulIfFrozen>false</annulIfFrozen>
         <metaData>
            <key>Expressfrakt</key>
            <value>true</value>
         </metaData>
         <priority>100</priority>
      </shop:bookPayment>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:assertion type="SOAP Response"/><con:assertion type="Schema Compliance"><con:configuration/></con:assertion><con:assertion type="SOAP Fault Assertion"/><con:credentials><con:username>${#Project#BasicAuthUser}</con:username><con:password>${#Project#BasicAuthPass}</con:password><con:domain/><con:authType>No Authorization</con:authType></con:credentials><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508"/><con:wsrmConfig version="1.2"/></con:request></con:config></con:testStep><con:testStep type="transfer" name="Get Actual Payment ID"><con:settings/><con:config xsi:type="con:PropertyTransfersStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:transfers setNullOnMissingSource="true" transferTextContent="true" failOnError="true" ignoreEmpty="false" transferToAll="false" useXQuery="false" entitize="false" transferChildNodes="false"><con:name>Payment ID</con:name><con:sourceType>Response</con:sourceType><con:sourceStep>Book Payment</con:sourceStep><con:sourcePath>declare namespace soapenv='http://schemas.xmlsoap.org/soap/envelope/';
declare namespace shop='http://ecommerce.resurs.com/v4/msg/shopflow';
/soapenv:Envelope/soapenv:Body/shop:bookPaymentResponse/return/paymentId</con:sourcePath><con:targetType>ActualPaymentID</con:targetType><con:targetStep>#TestCase#</con:targetStep><con:targetPath/></con:transfers></con:config></con:testStep><con:testStep type="delay" name="Wait (#1)"><con:settings/><con:config><delay>250</delay></con:config></con:testStep><con:testStep type="request" name="Annul Payment (Unspecified)"><con:settings/><con:config xsi:type="con:RequestStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:interface>AfterShopFlowWebServiceImplPortBinding</con:interface><con:operation>annulPayment</con:operation><con:request name="Annul Payment (Unspecified)"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:encoding>UTF-8</con:encoding><con:endpoint>${#Project#ServiceEndpoint}/AfterShopFlowService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:aft="http://ecommerce.resurs.com/v4/msg/aftershopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <aft:annulPayment>
         <paymentId>${#TestCase#ActualPaymentID}</paymentId>
      </aft:annulPayment>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:assertion type="SOAP Response"/><con:assertion type="Schema Compliance"><con:configuration/></con:assertion><con:assertion type="SOAP Fault Assertion"/><con:credentials><con:username>${#Project#BasicAuthUser}</con:username><con:password>${#Project#BasicAuthPass}</con:password><con:domain/><con:authType>No Authorization</con:authType></con:credentials><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508"/><con:wsrmConfig version="1.2"/></con:request></con:config></con:testStep><con:testStep type="delay" name="Wait (#2)"><con:settings/><con:config><delay>250</delay></con:config></con:testStep><con:testStep type="request" name="Get Payment Details"><con:settings/><con:config xsi:type="con:RequestStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:interface>AfterShopFlowWebServiceImplPortBinding</con:interface><con:operation>getPayment</con:operation><con:request name="Get Payment Details"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:encoding>UTF-8</con:encoding><con:endpoint>${#Project#ServiceEndpoint}/AfterShopFlowService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:aft="http://ecommerce.resurs.com/v4/msg/aftershopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <aft:getPayment>
         <paymentId>${#TestCase#ActualPaymentID}</paymentId>
      </aft:getPayment>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:assertion type="SOAP Response"/><con:assertion type="Schema Compliance"><con:configuration/></con:assertion><con:assertion type="SOAP Fault Assertion"/><con:assertion type="XPath Match" name="Contains AUTHORIZE"><con:configuration><path>declare namespace soap='http://schemas.xmlsoap.org/soap/envelope/';
declare namespace ns3='http://ecommerce.resurs.com/v4/msg/exception';
declare namespace ns2='http://ecommerce.resurs.com/v4/msg/aftershopflow';
/soap:Envelope/soap:Body/ns2:getPaymentResponse/return/paymentDiffs[1]/type/text()</path><content>AUTHORIZE</content><allowWildcards>false</allowWildcards><ignoreNamspaceDifferences>false</ignoreNamspaceDifferences><ignoreComments>false</ignoreComments></con:configuration></con:assertion><con:assertion type="XPath Match" name="Contains ANNUL"><con:configuration><path>declare namespace soap='http://schemas.xmlsoap.org/soap/envelope/';
declare namespace ns3='http://ecommerce.resurs.com/v4/msg/exception';
declare namespace ns2='http://ecommerce.resurs.com/v4/msg/aftershopflow';
/soap:Envelope/soap:Body/ns2:getPaymentResponse/return/paymentDiffs[2]/type/text()</path><content>ANNUL</content><allowWildcards>false</allowWildcards><ignoreNamspaceDifferences>false</ignoreNamspaceDifferences><ignoreComments>false</ignoreComments></con:configuration></con:assertion><con:assertion type="XPath Match" name="Total Amount is 0"><con:configuration><path>declare namespace ns2='http://ecommerce.resurs.com/v4/msg/exception';
declare namespace soap='http://schemas.xmlsoap.org/soap/envelope/';
declare namespace ns3='http://ecommerce.resurs.com/v4/msg/aftershopflow';
/soap:Envelope/soap:Body/ns3:getPaymentResponse/return/totalAmount/text()</path><content>0.*</content><allowWildcards>true</allowWildcards><ignoreNamspaceDifferences>false</ignoreNamspaceDifferences><ignoreComments>false</ignoreComments></con:configuration></con:assertion><con:assertion type="XPath Match" name="Government Id is OK"><con:configuration><path>declare namespace ns2='http://ecommerce.resurs.com/v4/msg/exception';
declare namespace soap='http://schemas.xmlsoap.org/soap/envelope/';
declare namespace ns3='http://ecommerce.resurs.com/v4/msg/aftershopflow';
/soap:Envelope/soap:Body/ns3:getPaymentResponse/return/customer/governmentId/text()</path><content>${#OrgNo}</content><allowWildcards>false</allowWildcards><ignoreNamspaceDifferences>false</ignoreNamspaceDifferences><ignoreComments>false</ignoreComments></con:configuration></con:assertion><con:assertion type="XPath Match" name="Payment Session Id is OK"><con:configuration><path>declare namespace soap='http://schemas.xmlsoap.org/soap/envelope/';
declare namespace ns3='http://ecommerce.resurs.com/v4/msg/exception';
declare namespace ns2='http://ecommerce.resurs.com/v4/msg/aftershopflow';
/soap:Envelope/soap:Body/ns2:getPaymentResponse/return/id/text()</path><content>${#SessionID}</content><allowWildcards>false</allowWildcards><ignoreNamspaceDifferences>false</ignoreNamspaceDifferences><ignoreComments>false</ignoreComments></con:configuration></con:assertion><con:credentials><con:username>${#Project#BasicAuthUser}</con:username><con:password>${#Project#BasicAuthPass}</con:password><con:domain/><con:authType>No Authorization</con:authType></con:credentials><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508"/><con:wsrmConfig version="1.2"/></con:request></con:config></con:testStep><con:properties><con:property><con:name>ActualPaymentID</con:name><con:value>Sess-1417516520766-9447</con:value></con:property><con:property><con:name>SigningURL</con:name><con:value xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">http://test.resurs.com/signicat-mock-server/sign.html?request_id=b87c8f05-5fd9-42e2-a790-9ddbc6ec180d&amp;task_id=1</con:value></con:property><con:property><con:name>SignID</con:name><con:value>http://dummy.esign.pte.loc/sign.html?signId=8a4bce96-d6ad-45d8-beb2-d1c84d32ceb3&amp;lang=sv</con:value></con:property><con:property><con:name>StatusChangeURL</con:name><con:value>http://test.resurs.com/signicat-mock-server/changeResult.html?request_id=b87c8f05-5fd9-42e2-a790-9ddbc6ec180d&amp;task_id=1&amp;success=true</con:value></con:property></con:properties></con:testCase><con:testCase failOnError="true" failTestCaseOnErrors="true" keepSession="false" maxResults="0" name="Corporate Invoice - Sell &amp; Credit" searchProperties="true" id="756aa6b7-bb49-4237-87ad-3febc7b33d4e"><con:settings/><con:testStep type="groovy" name="Generate Parameters"><con:settings/><con:config><script>// *** Set basic parameters
String id = System.currentTimeMillis() + "-" + (int)(Math.random() * 10000);
context.setProperty("ID", id);
context.setProperty("SessionID", "Sess-" + id)
context.setProperty("Date", new Date().format('yyyy-MM-dd'))

// *** Get parameters 
def yearFrom = Integer.parseInt(testRunner.testCase.testSuite.project.getPropertyValue("Approved_StartYear"));
def yearTo = Integer.parseInt(testRunner.testCase.testSuite.project.getPropertyValue("Approved_EndYear"));
def String[] ordinals = testRunner.testCase.testSuite.project.getPropertyValue("Ordinals_NotFrozen").split(",");

// *** Generate Swedish government identity
String governmentId = null;
Random random = new Random();
int year = yearFrom + random.nextInt(yearTo - yearFrom);
int dayOfYear = 1 + random.nextInt(365);
Calendar calendar = GregorianCalendar.getInstance();
calendar.set(Calendar.YEAR, year);
calendar.set(Calendar.DAY_OF_YEAR, dayOfYear);
int ordinal = Integer.parseInt(ordinals[random.nextInt(ordinals.length)].trim());
number = random.nextInt(100);
governmentId = String.format("%1\$ty%1\$tm%1\$td%2\$02d%3\$d", calendar.getTime(), number, ordinal);
int sum = 0;
boolean isAlternate = true;
for (int digit = governmentId.length() - 1; digit >= 0; digit--) {
	int value = Integer.parseInt(governmentId.substring(digit, digit + 1));
	if (isAlternate) {
		value *= 2;
		if (value > 9) {
			value = (value % 10) + 1;
		}
	}
sum += value;
isAlternate = !isAlternate 	
} 
int higherDec = (int) (Math.ceil(sum / 10.0f) * 10);
int luhnDigit = higherDec - sum;
governmentId = governmentId + luhnDigit;
context.setProperty("GovernmentID", governmentId);

// *** Generate Swedish corporate government identity
int month = 20 + random.nextInt(80);
int day = random.nextInt(100);
number = random.nextInt(100);

String orgNo = String.format("55%1\$02d%2\$02d%3\$02d%4\$d", month, day, number, ordinal);
String orgNoWithDash = String.format("55%1\$02d%2\$02d-%3\$02d%4\$d", month, day, number, ordinal);

sum = 0;
isAlternate = true;
for (int digit = orgNo.length() - 1; digit >= 0; digit--) {
	int value = Integer.parseInt(orgNo.substring(digit, digit + 1));
	if (isAlternate) {
		value *= 2;
		if (value > 9) {
			value = (value % 10) + 1;
		}
	}
	sum += value;
	isAlternate = !isAlternate 	
} 

higherDec = (int) (Math.ceil(sum / 10.0f) * 10);
luhnDigit = higherDec - sum;
orgNo = orgNo + luhnDigit;
orgNoWithDash = orgNoWithDash + luhnDigit;
context.setProperty("OrgNo", orgNo);  

// *** Log parameters
log.info (
	"Starting session " + context.getProperty("SessionID") + " for " + 
	context.getProperty("OrgNo") + " by " +
	context.getProperty("GovernmentID") + " on " + context.getProperty("Date"));
</script></con:config></con:testStep><con:testStep type="request" name="Start Payment Session"><con:settings/><con:config xsi:type="con:RequestStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:interface>ShopFlowWebServiceImplPortBinding</con:interface><con:operation>startPaymentSession</con:operation><con:request name="Start Payment Session"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:encoding>UTF-8</con:encoding><con:endpoint>${#Project#ServiceEndpoint}/ShopFlowService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:shop="http://ecommerce.resurs.com/v4/msg/shopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <shop:startPaymentSession>
         <preferredId>${#SessionID}</preferredId>
         <paymentMethodId>${#Project#PaymentMethodID_Invoice_Corp}</paymentMethodId>
         <customerIpAddress>127.0.0.2</customerIpAddress>
         <formAction>AFormAction</formAction>
         <paymentSpec>
            <specLines>
               <id>1</id>
               <artNo>NUT-001</artNo>
               <description>Nut (M8)</description>
               <quantity>10</quantity>
               <unitMeasure>st</unitMeasure>
               <unitAmountWithoutVat>0.80</unitAmountWithoutVat>
               <vatPct>25</vatPct>
               <totalVatAmount>2.00</totalVatAmount>
               <totalAmount>10.00</totalAmount>
            </specLines>
            <specLines>
               <id>2</id>
               <artNo>BOLT-002</artNo>
               <description>Bolt (M8x125mm)</description>
               <quantity>10</quantity>
               <unitMeasure>st</unitMeasure>
               <unitAmountWithoutVat>1.60</unitAmountWithoutVat>
               <vatPct>25</vatPct>
               <totalVatAmount>4.00</totalVatAmount>
               <totalAmount>20.00</totalAmount>
            </specLines>
            <totalAmount>30.00</totalAmount>
            <totalVatAmount>6.00</totalVatAmount>
         </paymentSpec>
      </shop:startPaymentSession>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:assertion type="SOAP Response"/><con:assertion type="Schema Compliance"><con:configuration/></con:assertion><con:assertion type="SOAP Fault Assertion"/><con:assertion type="Simple Contains" name="Contains Session Identity"><con:configuration><token>&lt;id>${#SessionID}&lt;/id></token><ignoreCase>false</ignoreCase><useRegEx>false</useRegEx></con:configuration></con:assertion><con:assertion type="Simple Contains" name="Contains Limit Application Form as Object"><con:configuration><token>(?s).*&lt;limitApplicationFormAsObjectGraph>[\S\s]*&lt;/limitApplicationFormAsObjectGraph>.*</token><ignoreCase>false</ignoreCase><useRegEx>true</useRegEx></con:configuration></con:assertion><con:assertion type="Simple Contains" name="Contains Limit Application Form as Form"><con:configuration><token>(?s).*&lt;limitApplicationFormAsCompiledForm>[\S\s]*&lt;/limitApplicationFormAsCompiledForm>.*</token><ignoreCase>false</ignoreCase><useRegEx>true</useRegEx></con:configuration></con:assertion><con:credentials><con:username>${#Project#BasicAuthUser}</con:username><con:password>${#Project#BasicAuthPass}</con:password><con:domain/><con:authType>No Authorization</con:authType></con:credentials><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508"/><con:wsrmConfig version="1.2"/></con:request></con:config></con:testStep><con:testStep type="request" name="Create Limit (OK)"><con:settings/><con:config xsi:type="con:RequestStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:interface>ShopFlowWebServiceImplPortBinding</con:interface><con:operation>submitLimitApplication</con:operation><con:request name="Create Limit (OK)"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:encoding>UTF-8</con:encoding><con:endpoint>${#Project#ServiceEndpoint}/ShopFlowService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:shop="http://ecommerce.resurs.com/v4/msg/shopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <shop:submitLimitApplication>
         <paymentSessionId>${#SessionID}</paymentSessionId>
         <yourCustomerId>Cust-${#ID}</yourCustomerId>
         <formDataResponse><![CDATA[
<resurs-response>
    <amount>300.00</amount>
    <applicant-government-id>${#OrgNo}</applicant-government-id>
    <applicant-full-name>JavaTest XB</applicant-full-name>
    <contact-government-id>${#GovernmentID}</contact-government-id>
    <applicant-telephone-number>042-12 34 56</applicant-telephone-number>
    <applicant-mobile-number>0705-12 35 46</applicant-mobile-number>
    <applicant-email-address>javatest@resurs.se</applicant-email-address>
</resurs-response>
            ]]]]>><![CDATA[</formDataResponse>
      </shop:submitLimitApplication>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:assertion type="SOAP Response"/><con:assertion type="Schema Compliance"><con:configuration/></con:assertion><con:assertion type="SOAP Fault Assertion"/><con:assertion type="Simple Contains" name="Limit is Granted" disabled="true"><con:configuration><token>&lt;decision>GRANTED&lt;/decision></token><ignoreCase>false</ignoreCase><useRegEx>false</useRegEx></con:configuration></con:assertion><con:credentials><con:username>${#Project#BasicAuthUser}</con:username><con:password>${#Project#BasicAuthPass}</con:password><con:domain/><con:authType>No Authorization</con:authType></con:credentials><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508"/><con:wsrmConfig version="1.2"/></con:request></con:config></con:testStep><con:testStep type="request" name="Prepare Signing"><con:settings/><con:config xsi:type="con:RequestStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:interface>ShopFlowWebServiceImplPortBinding</con:interface><con:operation>prepareSigning</con:operation><con:request name="Prepare Signing"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:encoding>UTF-8</con:encoding><con:endpoint>${#Project#ServiceEndpoint}/ShopFlowService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:shop="http://ecommerce.resurs.com/v4/msg/shopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <shop:prepareSigning>
         <paymentSessionId>${#SessionID}</paymentSessionId>
         <successUrl>http://www.google.com/search?q=OK</successUrl>
         <failUrl>http://www.google.com/search?q=NOK</failUrl>
      </shop:prepareSigning>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:assertion type="SOAP Response"/><con:assertion type="Schema Compliance"><con:configuration/></con:assertion><con:credentials><con:username>${#Project#BasicAuthUser}</con:username><con:password>${#Project#BasicAuthPass}</con:password><con:domain/><con:authType>No Authorization</con:authType></con:credentials><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508"/><con:wsrmConfig version="1.2"/></con:request></con:config></con:testStep><con:testStep type="goto" name="Is Bad Customer"><con:settings/><con:config xsi:type="con:GotoStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:condition><con:name>Is Bad Customer</con:name><con:type>XPATH</con:type><con:expression>declare namespace soap='http://schemas.xmlsoap.org/soap/envelope/';
declare namespace ns3='http://ecommerce.resurs.com/v4/msg/exception';
declare namespace ns2='http://ecommerce.resurs.com/v4/msg/shopflow';
contains(/soap:Envelope/soap:Body/soap:Fault/detail/ns3:ECommerceError/userErrorMessage/text(), "Oklarheter kring existerande krediter")</con:expression><con:targetStep>Generate Parameters</con:targetStep></con:condition></con:config></con:testStep><con:testStep type="transfer" name="Extract Signing URL"><con:settings/><con:config xsi:type="con:PropertyTransfersStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:transfers setNullOnMissingSource="true" transferTextContent="true" failOnError="true" ignoreEmpty="false" transferToAll="false" useXQuery="false" entitize="false" transferChildNodes="false" disabled="false"><con:name>Retrieve Signing URL</con:name><con:sourceType>Response</con:sourceType><con:sourceStep>Prepare Signing</con:sourceStep><con:sourcePath>declare namespace soap='http://schemas.xmlsoap.org/soap/envelope/';
declare namespace ns3='http://ecommerce.resurs.com/v4/msg/shopflow';
//soap:Envelope/soap:Body/ns3:prepareSigningResponse/return/text()</con:sourcePath><con:targetType>SigningURL</con:targetType><con:targetStep>#TestCase#</con:targetStep><con:targetPath>
</con:targetPath></con:transfers></con:config></con:testStep><con:testStep type="groovy" name="Process Signing URL"><con:settings/><con:config><script>// *** Convert the signing URL to the sign OK/NOK URL
def fullURL = testRunner.testCase.getPropertyValue( "SigningURL" )
def statusChangeURL = fullURL.replaceAll("sign.html", "changeResult.html");
statusChangeURL=statusChangeURL+"&amp;success=true";
//log.info "statusChangeURL = " + statusChangeURL;
testRunner.testCase.setPropertyValue("StatusChangeURL", statusChangeURL);
</script></con:config></con:testStep><con:testStep type="httprequest" name="Sign Agreement (OK)"><con:settings/><con:config method="GET" xsi:type="con:HttpRequest" name="Sign Agreement (OK)" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:endpoint>${#TestCase#StatusChangeURL}</con:endpoint><con:request/><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:parameters/></con:config></con:testStep><con:testStep type="request" name="Book Payment"><con:settings/><con:config xsi:type="con:RequestStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:interface>ShopFlowWebServiceImplPortBinding</con:interface><con:operation>bookPayment</con:operation><con:request name="Book Payment"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:encoding>UTF-8</con:encoding><con:endpoint>${#Project#ServiceEndpoint}/ShopFlowService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:shop="http://ecommerce.resurs.com/v4/msg/shopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <shop:bookPayment>
         <paymentSessionId>${#SessionID}</paymentSessionId>
         <preferredPaymentId>Pay-${#ID}</preferredPaymentId>
         <waitForFraudControl>true</waitForFraudControl>
         <annulIfFrozen>false</annulIfFrozen>
         <metaData>
            <key>Expressfrakt</key>
            <value>true</value>
         </metaData>
         <priority>100</priority>
      </shop:bookPayment>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:assertion type="SOAP Response"/><con:assertion type="Schema Compliance"><con:configuration/></con:assertion><con:assertion type="SOAP Fault Assertion"/><con:credentials><con:username>${#Project#BasicAuthUser}</con:username><con:password>${#Project#BasicAuthPass}</con:password><con:domain/><con:authType>No Authorization</con:authType></con:credentials><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508"/><con:wsrmConfig version="1.2"/></con:request></con:config></con:testStep><con:testStep type="transfer" name="Get Actual Payment ID"><con:settings/><con:config xsi:type="con:PropertyTransfersStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:transfers setNullOnMissingSource="true" transferTextContent="true" failOnError="true" ignoreEmpty="false" transferToAll="false" useXQuery="false" entitize="false" transferChildNodes="false"><con:name>Payment ID</con:name><con:sourceType>Response</con:sourceType><con:sourceStep>Book Payment</con:sourceStep><con:sourcePath>declare namespace soapenv='http://schemas.xmlsoap.org/soap/envelope/';
declare namespace shop='http://ecommerce.resurs.com/v4/msg/shopflow';
/soapenv:Envelope/soapenv:Body/shop:bookPaymentResponse/return/paymentId</con:sourcePath><con:targetType>ActualPaymentID</con:targetType><con:targetStep>#TestCase#</con:targetStep><con:targetPath/></con:transfers></con:config></con:testStep><con:testStep type="delay" name="Wait (#1)"><con:settings/><con:config><delay>250</delay></con:config></con:testStep><con:testStep type="request" name="Finalize Payment (By Amount)"><con:settings/><con:config xsi:type="con:RequestStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:interface>AfterShopFlowWebServiceImplPortBinding</con:interface><con:operation>finalizePayment</con:operation><con:request name="Finalize Payment (By Amount)"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:encoding>UTF-8</con:encoding><con:endpoint>${#Project#ServiceEndpoint}/AfterShopFlowService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:aft="http://ecommerce.resurs.com/v4/msg/aftershopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <aft:finalizePayment>
         <paymentId>${#TestCase#ActualPaymentID}</paymentId>
         <preferredTransactionId>TrD-${#ID}</preferredTransactionId>
         <partPaymentSpec>
            <totalAmount>30.00</totalAmount>
            <!--<totalVatAmount>6.00</totalVatAmount>-->
         </partPaymentSpec>
         <orderId>Ord-${#ID}</orderId>
         <orderDate>${#Date}</orderDate>
         <invoiceId>DebInv-${#ID}</invoiceId>
         <invoiceDate>${#Date}</invoiceDate>
      </aft:finalizePayment>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:assertion type="SOAP Response"/><con:assertion type="Schema Compliance"><con:configuration/></con:assertion><con:assertion type="SOAP Fault Assertion"/><con:assertion type="Simple Contains" name="Contains no error"><con:configuration><token>finalizePaymentResponse</token><ignoreCase>false</ignoreCase><useRegEx>false</useRegEx></con:configuration></con:assertion><con:credentials><con:username>${#Project#BasicAuthUser}</con:username><con:password>${#Project#BasicAuthPass}</con:password><con:domain/><con:authType>No Authorization</con:authType></con:credentials><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508"/><con:wsrmConfig version="1.2"/></con:request></con:config></con:testStep><con:testStep type="delay" name="Wait (#2)"><con:settings/><con:config><delay>250</delay></con:config></con:testStep><con:testStep type="request" name="Credit Payment (Unspecified)"><con:settings/><con:config xsi:type="con:RequestStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:interface>AfterShopFlowWebServiceImplPortBinding</con:interface><con:operation>creditPayment</con:operation><con:request name="Credit Payment (Unspecified)"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:encoding>UTF-8</con:encoding><con:endpoint>${#Project#ServiceEndpoint}/AfterShopFlowService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:aft="http://ecommerce.resurs.com/v4/msg/aftershopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <aft:creditPayment>
         <paymentId>${#TestCase#ActualPaymentID}</paymentId>
         <preferredTransactionId>TrC-${#ID}</preferredTransactionId>
         <creditNoteId>CrN-${#ID}</creditNoteId>
         <creditNoteDate>${#Date}</creditNoteDate>
      </aft:creditPayment>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:assertion type="SOAP Response"/><con:assertion type="Schema Compliance"><con:configuration/></con:assertion><con:assertion type="SOAP Fault Assertion"/><con:credentials><con:username>${#Project#BasicAuthUser}</con:username><con:password>${#Project#BasicAuthPass}</con:password><con:domain/><con:authType>No Authorization</con:authType></con:credentials><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508"/><con:wsrmConfig version="1.2"/></con:request></con:config></con:testStep><con:testStep type="delay" name="Wait (#3)"><con:settings/><con:config><delay>250</delay></con:config></con:testStep><con:testStep type="request" name="Get Payment Details"><con:settings/><con:config xsi:type="con:RequestStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:interface>AfterShopFlowWebServiceImplPortBinding</con:interface><con:operation>getPayment</con:operation><con:request name="Get Payment Details"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:encoding>UTF-8</con:encoding><con:endpoint>${#Project#ServiceEndpoint}/AfterShopFlowService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:aft="http://ecommerce.resurs.com/v4/msg/aftershopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <aft:getPayment>
         <paymentId>${#TestCase#ActualPaymentID}</paymentId>
      </aft:getPayment>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:assertion type="SOAP Response"/><con:assertion type="Schema Compliance"><con:configuration/></con:assertion><con:assertion type="SOAP Fault Assertion"/><con:assertion type="XPath Match" name="Contains AUTHORIZE"><con:configuration><path>declare namespace soap='http://schemas.xmlsoap.org/soap/envelope/';
declare namespace ns3='http://ecommerce.resurs.com/v4/msg/exception';
declare namespace ns2='http://ecommerce.resurs.com/v4/msg/aftershopflow';
/soap:Envelope/soap:Body/ns2:getPaymentResponse/return/paymentDiffs[1]/type/text()</path><content>AUTHORIZE</content><allowWildcards>false</allowWildcards><ignoreNamspaceDifferences>false</ignoreNamspaceDifferences><ignoreComments>false</ignoreComments></con:configuration></con:assertion><con:assertion type="XPath Match" name="Contains DEBIT"><con:configuration><path>declare namespace ns2='http://ecommerce.resurs.com/v4/msg/exception';
declare namespace soap='http://schemas.xmlsoap.org/soap/envelope/';
declare namespace ns3='http://ecommerce.resurs.com/v4/msg/aftershopflow';
/soap:Envelope/soap:Body/ns3:getPaymentResponse/return/paymentDiffs[2]/type/text()</path><content>DEBIT</content><allowWildcards>false</allowWildcards><ignoreNamspaceDifferences>false</ignoreNamspaceDifferences><ignoreComments>false</ignoreComments></con:configuration></con:assertion><con:assertion type="XPath Match" name="Contains CREDIT"><con:configuration><path>declare namespace ns2='http://ecommerce.resurs.com/v4/msg/exception';
declare namespace soap='http://schemas.xmlsoap.org/soap/envelope/';
declare namespace ns3='http://ecommerce.resurs.com/v4/msg/aftershopflow';
/soap:Envelope/soap:Body/ns3:getPaymentResponse/return/paymentDiffs[3]/type/text()</path><content>CREDIT</content><allowWildcards>false</allowWildcards><ignoreNamspaceDifferences>false</ignoreNamspaceDifferences><ignoreComments>false</ignoreComments></con:configuration></con:assertion><con:assertion type="XPath Match" name="Total Amount is Zero"><con:configuration><path>declare namespace soap='http://schemas.xmlsoap.org/soap/envelope/';
declare namespace ns3='http://ecommerce.resurs.com/v4/msg/exception';
declare namespace ns2='http://ecommerce.resurs.com/v4/msg/aftershopflow';
/soap:Envelope/soap:Body/ns2:getPaymentResponse/return/totalAmount/number()</path><content>0.0</content><allowWildcards>false</allowWildcards><ignoreNamspaceDifferences>false</ignoreNamspaceDifferences><ignoreComments>false</ignoreComments></con:configuration></con:assertion><con:assertion type="XPath Match" name="Limit is OK"><con:configuration><path>declare namespace soap='http://schemas.xmlsoap.org/soap/envelope/';
declare namespace ns3='http://ecommerce.resurs.com/v4/msg/exception';
declare namespace ns2='http://ecommerce.resurs.com/v4/msg/aftershopflow';
/soap:Envelope/soap:Body/ns2:getPaymentResponse/return/limit/number()</path><content>3030.0</content><allowWildcards>false</allowWildcards><ignoreNamspaceDifferences>false</ignoreNamspaceDifferences><ignoreComments>false</ignoreComments></con:configuration></con:assertion><con:assertion type="XPath Match" name="Payment ID is OK"><con:configuration><path>declare namespace soap='http://schemas.xmlsoap.org/soap/envelope/';
declare namespace ns3='http://ecommerce.resurs.com/v4/msg/exception';
declare namespace ns2='http://ecommerce.resurs.com/v4/msg/aftershopflow';
/soap:Envelope/soap:Body/ns2:getPaymentResponse/return/id/text()</path><content>${#TestCase#ActualPaymentID}</content><allowWildcards>false</allowWildcards><ignoreNamspaceDifferences>false</ignoreNamspaceDifferences><ignoreComments>false</ignoreComments></con:configuration></con:assertion><con:assertion type="XPath Match" name="Debit Transaction ID is OK"><con:configuration><path>declare namespace soap='http://schemas.xmlsoap.org/soap/envelope/';
declare namespace ns3='http://ecommerce.resurs.com/v4/msg/exception';
declare namespace ns2='http://ecommerce.resurs.com/v4/msg/aftershopflow';
/soap:Envelope/soap:Body/ns2:getPaymentResponse/return/paymentDiffs[2]/transactionId/text()</path><content>TrD-${#ID}</content><allowWildcards>false</allowWildcards><ignoreNamspaceDifferences>false</ignoreNamspaceDifferences><ignoreComments>false</ignoreComments></con:configuration></con:assertion><con:assertion type="XPath Match" name="Debit Order ID is OK"><con:configuration><path>declare namespace soap='http://schemas.xmlsoap.org/soap/envelope/';
declare namespace ns3='http://ecommerce.resurs.com/v4/msg/exception';
declare namespace ns2='http://ecommerce.resurs.com/v4/msg/aftershopflow';
/soap:Envelope/soap:Body/ns2:getPaymentResponse/return/paymentDiffs[2]/orderId/text()</path><content>Ord-${#ID}</content><allowWildcards>false</allowWildcards><ignoreNamspaceDifferences>false</ignoreNamspaceDifferences><ignoreComments>false</ignoreComments></con:configuration></con:assertion><con:assertion type="XPath Match" name="Credit Transaction ID is OK"><con:configuration><path>declare namespace soap='http://schemas.xmlsoap.org/soap/envelope/';
declare namespace ns3='http://ecommerce.resurs.com/v4/msg/exception';
declare namespace ns2='http://ecommerce.resurs.com/v4/msg/aftershopflow';
/soap:Envelope/soap:Body/ns2:getPaymentResponse/return/paymentDiffs[3]/transactionId/text()</path><content>TrC-${#ID}</content><allowWildcards>false</allowWildcards><ignoreNamspaceDifferences>false</ignoreNamspaceDifferences><ignoreComments>false</ignoreComments></con:configuration></con:assertion><con:credentials><con:username>${#Project#BasicAuthUser}</con:username><con:password>${#Project#BasicAuthPass}</con:password><con:domain/><con:authType>No Authorization</con:authType></con:credentials><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508"/><con:wsrmConfig version="1.2"/></con:request></con:config></con:testStep><con:properties><con:property><con:name>ActualPaymentID</con:name><con:value>Pay-1417516413003-6860</con:value></con:property><con:property><con:name>SigningURL</con:name><con:value xsi:nil="true" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"/></con:property><con:property><con:name>SignID</con:name><con:value>http://dummy.esign.pte.loc/sign.html?signId=8a4bce96-d6ad-45d8-beb2-d1c84d32ceb3&amp;lang=sv</con:value></con:property><con:property><con:name>StatusChangeURL</con:name><con:value>http://test.resurs.com/signicat-mock-server/changeResult.html?request_id=ec5b88b6-c280-4243-8a13-9f387ba96010&amp;task_id=1&amp;success=true</con:value></con:property></con:properties></con:testCase><con:properties/></con:testSuite><con:testSuite name="Events"><con:settings/><con:runType>SEQUENTIAL</con:runType><con:testCase failOnError="true" failTestCaseOnErrors="true" keepSession="false" maxResults="0" name="Event Callback - FRAUD" searchProperties="true" id="c93458ac-bb1b-4a7a-b2a3-d52a580aa2ae"><con:description>Registers a FRAUD event callback, triggers an execution,
and then removes it.</con:description><con:settings/><con:testStep type="request" name="Register FRAUD Event"><con:settings/><con:config xsi:type="con:RequestStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:interface>ConfigurationWebServiceImplPortBinding</con:interface><con:operation>registerEventCallback</con:operation><con:request name="Register FRAUD Event"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:encoding>UTF-8</con:encoding><con:endpoint>${#Project#ServiceEndpoint}/ConfigurationService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:con="http://ecommerce.resurs.com/v4/msg/configuration">
   <soapenv:Header/>
   <soapenv:Body>
      <con:registerEventCallback>
         <eventType>FRAUD</eventType>
         <uriTemplate>http://test.resurs.com/ecommerce/whatever?id={paymentId}&amp;digest={digest}</uriTemplate>
         <basicAuthUserName>username</basicAuthUserName>
         <basicAuthPassword>password</basicAuthPassword>
         <digestConfiguration>
            <digestAlgorithm>MD5</digestAlgorithm>
            <digestParameters>paymentId</digestParameters>
            <digestSalt>SaltSaltBaby</digestSalt>
         </digestConfiguration>
      </con:registerEventCallback>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:assertion type="SOAP Response"/><con:assertion type="Schema Compliance"><con:configuration/></con:assertion><con:assertion type="SOAP Fault Assertion"/><con:credentials><con:username>${#Project#BasicAuthUser}</con:username><con:password>${#Project#BasicAuthPass}</con:password><con:domain/><con:authType>No Authorization</con:authType></con:credentials><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508"/><con:wsrmConfig version="1.2"/></con:request></con:config></con:testStep><con:testStep type="request" name="Trigger FRAUD Event"><con:settings/><con:config xsi:type="con:RequestStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:interface>DeveloperWebServiceImplPortBinding</con:interface><con:operation>triggerEvent</con:operation><con:request name="Trigger FRAUD Event"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:encoding>UTF-8</con:encoding><con:endpoint>${#Project#ServiceEndpoint}/DeveloperWebService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:dev="http://ecommerce.resurs.com/v4/msg/developer">
   <soapenv:Header/>
   <soapenv:Body>
      <dev:triggerEvent>
         <eventType>FRAUD</eventType>
         <param>2002</param>
      </dev:triggerEvent>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:assertion type="SOAP Response"/><con:assertion type="Schema Compliance"><con:configuration/></con:assertion><con:assertion type="SOAP Fault Assertion"/><con:credentials><con:username>${#Project#BasicAuthUser}</con:username><con:password>${#Project#BasicAuthPass}</con:password><con:domain/><con:authType>No Authorization</con:authType></con:credentials><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508"/><con:wsrmConfig version="1.2"/></con:request></con:config></con:testStep><con:testStep type="request" name="Unregister FRAUD Event"><con:settings/><con:config xsi:type="con:RequestStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:interface>ConfigurationWebServiceImplPortBinding</con:interface><con:operation>unregisterEventCallback</con:operation><con:request name="Unregister FRAUD Event"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:encoding>UTF-8</con:encoding><con:endpoint>${#Project#ServiceEndpoint}/ConfigurationService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:con="http://ecommerce.resurs.com/v4/msg/configuration">
   <soapenv:Header/>
   <soapenv:Body>
      <con:unregisterEventCallback>
         <eventType>FRAUD</eventType>
      </con:unregisterEventCallback>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:assertion type="SOAP Response"/><con:assertion type="Schema Compliance"><con:configuration/></con:assertion><con:assertion type="SOAP Fault Assertion"/><con:credentials><con:username>${#Project#BasicAuthUser}</con:username><con:password>${#Project#BasicAuthPass}</con:password><con:domain/><con:authType>No Authorization</con:authType></con:credentials><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508"/><con:wsrmConfig version="1.2"/></con:request></con:config></con:testStep><con:properties/></con:testCase><con:testCase failOnError="true" failTestCaseOnErrors="true" keepSession="false" maxResults="0" name="Event Callback - UNFREEZE" searchProperties="true" id="2805ef37-abfb-4d8b-a477-42c0abef05ec"><con:description>Unregisters the existing UNFREEZE event callback, re-registers it, and
triggers an execution.</con:description><con:settings/><con:testStep type="request" name="Unregister UNFREEZE Event"><con:settings/><con:config xsi:type="con:RequestStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:interface>ConfigurationWebServiceImplPortBinding</con:interface><con:operation>unregisterEventCallback</con:operation><con:request name="Unregister UNFREEZE Event"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:encoding>UTF-8</con:encoding><con:endpoint>${#Project#ServiceEndpoint}/ConfigurationService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:con="http://ecommerce.resurs.com/v4/msg/configuration">
   <soapenv:Header/>
   <soapenv:Body>
      <con:unregisterEventCallback>
         <eventType>UNFREEZE</eventType>
      </con:unregisterEventCallback>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:assertion type="SOAP Response"/><con:assertion type="Schema Compliance"><con:configuration/></con:assertion><con:assertion type="SOAP Fault Assertion"/><con:credentials><con:username>${#Project#BasicAuthUser}</con:username><con:password>${#Project#BasicAuthPass}</con:password><con:domain/><con:authType>No Authorization</con:authType></con:credentials><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508"/><con:wsrmConfig version="1.2"/></con:request></con:config></con:testStep><con:testStep type="request" name="Register UNFREEZE Event"><con:settings/><con:config xsi:type="con:RequestStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:interface>ConfigurationWebServiceImplPortBinding</con:interface><con:operation>registerEventCallback</con:operation><con:request name="Register UNFREEZE Event"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:encoding>UTF-8</con:encoding><con:endpoint>${#Project#ServiceEndpoint}/ConfigurationService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:con="http://ecommerce.resurs.com/v4/msg/configuration">
   <soapenv:Header/>
   <soapenv:Body>
      <con:registerEventCallback>
         <eventType>UNFREEZE</eventType>
         <uriTemplate>http://test.resurs.com/ecommerce/whatever?id={paymentId}&amp;digest={digest}</uriTemplate>
         <digestConfiguration>
            <digestAlgorithm>MD5</digestAlgorithm>
            <digestParameters>paymentId</digestParameters>
            <digestSalt>SaltSaltBaby</digestSalt>
         </digestConfiguration>
      </con:registerEventCallback>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:assertion type="SOAP Response"/><con:assertion type="Schema Compliance"><con:configuration/></con:assertion><con:assertion type="SOAP Fault Assertion"/><con:credentials><con:username>${#Project#BasicAuthUser}</con:username><con:password>${#Project#BasicAuthPass}</con:password><con:domain/><con:authType>No Authorization</con:authType></con:credentials><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508"/><con:wsrmConfig version="1.2"/></con:request></con:config></con:testStep><con:testStep type="request" name="Trigger UNFREEZE Event"><con:settings/><con:config xsi:type="con:RequestStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:interface>DeveloperWebServiceImplPortBinding</con:interface><con:operation>triggerEvent</con:operation><con:request name="Trigger UNFREEZE Event"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:encoding>UTF-8</con:encoding><con:endpoint>${#Project#ServiceEndpoint}/DeveloperWebService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:dev="http://ecommerce.resurs.com/v4/msg/developer">
   <soapenv:Header/>
   <soapenv:Body>
      <dev:triggerEvent>
         <eventType>UNFREEZE</eventType>
         <param>1001</param>
      </dev:triggerEvent>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:assertion type="SOAP Response"/><con:assertion type="Schema Compliance"><con:configuration/></con:assertion><con:assertion type="SOAP Fault Assertion"/><con:credentials><con:username>${#Project#BasicAuthUser}</con:username><con:password>${#Project#BasicAuthPass}</con:password><con:domain/><con:authType>No Authorization</con:authType></con:credentials><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508"/><con:wsrmConfig version="1.2"/></con:request></con:config></con:testStep><con:properties/></con:testCase><con:testCase failOnError="true" failTestCaseOnErrors="true" keepSession="false" maxResults="0" name="Event Callback - PASSWORD_EXPIRATION" searchProperties="true" id="26f4b5ee-12da-4a33-b184-0d21b7378e2e"><con:description>Registers a FRAUD event callback, triggers an execution,
and then removes it.</con:description><con:settings/><con:testStep type="request" name="Unregister PASSWORD_EXPIRATION Event" disabled="true"><con:settings/><con:config xsi:type="con:RequestStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:interface>ConfigurationWebServiceImplPortBinding</con:interface><con:operation>unregisterEventCallback</con:operation><con:request name="Unregister PASSWORD_EXPIRATION Event"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:encoding>UTF-8</con:encoding><con:endpoint>${#Project#ServiceEndpoint}/ConfigurationService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:con="http://ecommerce.resurs.com/v4/msg/configuration">
   <soapenv:Header/>
   <soapenv:Body>
      <con:unregisterEventCallback>
         <eventType>PASSWORD_EXPIRATION</eventType>
      </con:unregisterEventCallback>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:assertion type="SOAP Response"/><con:assertion type="Schema Compliance"><con:configuration/></con:assertion><con:assertion type="SOAP Fault Assertion"/><con:credentials><con:username>${#Project#BasicAuthUser}</con:username><con:password>${#Project#BasicAuthPass}</con:password><con:domain/><con:authType>No Authorization</con:authType></con:credentials><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508"/><con:wsrmConfig version="1.2"/></con:request></con:config></con:testStep><con:testStep type="request" name="Register PASSWORD_EXPIRATION Event" disabled="true"><con:settings/><con:config xsi:type="con:RequestStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:interface>ConfigurationWebServiceImplPortBinding</con:interface><con:operation>registerEventCallback</con:operation><con:request name="Register PASSWORD_EXPIRATION Event"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:encoding>UTF-8</con:encoding><con:endpoint>${#Project#ServiceEndpoint}/ConfigurationService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:con="http://ecommerce.resurs.com/v4/msg/configuration">
   <soapenv:Header/>
   <soapenv:Body>
      <con:registerEventCallback>
         <eventType>PASSWORD_EXPIRATION</eventType>
         <uriTemplate>http://test.resurs.com/ecommerce/whatever?id={identifier}&amp;digest={digest}</uriTemplate>
         <basicAuthUserName>username</basicAuthUserName>
         <basicAuthPassword>password</basicAuthPassword>
         <digestConfiguration>
            <digestAlgorithm>MD5</digestAlgorithm>
            <digestParameters>identifier</digestParameters>
            <digestSalt>SaltSaltBaby</digestSalt>
         </digestConfiguration>
      </con:registerEventCallback>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:assertion type="SOAP Response"/><con:assertion type="Schema Compliance"><con:configuration/></con:assertion><con:assertion type="SOAP Fault Assertion"/><con:credentials><con:username>${#Project#BasicAuthUser}</con:username><con:password>${#Project#BasicAuthPass}</con:password><con:domain/><con:authType>No Authorization</con:authType></con:credentials><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508"/><con:wsrmConfig version="1.2"/></con:request></con:config></con:testStep><con:testStep type="request" name="Trigger PASSWORD_EXPIRATION Event" disabled="true"><con:settings/><con:config xsi:type="con:RequestStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:interface>DeveloperWebServiceImplPortBinding</con:interface><con:operation>triggerEvent</con:operation><con:request name="Trigger PASSWORD_EXPIRATION Event"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:encoding>UTF-8</con:encoding><con:endpoint>${#Project#ServiceEndpoint}/DeveloperWebService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:dev="http://ecommerce.resurs.com/v4/msg/developer">
   <soapenv:Header/>
   <soapenv:Body>
      <dev:triggerEvent>
         <eventType>PASSWORD_EXPIRATION</eventType>
         <param>Identifier1</param>
      </dev:triggerEvent>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:assertion type="SOAP Response"/><con:assertion type="Schema Compliance"><con:configuration/></con:assertion><con:assertion type="SOAP Fault Assertion"/><con:credentials><con:username>${#Project#BasicAuthUser}</con:username><con:password>${#Project#BasicAuthPass}</con:password><con:domain/><con:authType>No Authorization</con:authType></con:credentials><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508"/><con:wsrmConfig version="1.2"/></con:request></con:config></con:testStep><con:properties/></con:testCase><con:testCase failOnError="true" failTestCaseOnErrors="true" keepSession="false" maxResults="0" name="Event Callback - ANNULMENT" searchProperties="true" id="bc8ca3f2-a05b-4adf-84a0-61746410c479"><con:description>Registers a ANNULMENT event callback, triggers an execution,
and then removes it.</con:description><con:settings/><con:testStep type="request" name="Register ANNULMENT Event"><con:settings/><con:config xsi:type="con:RequestStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:interface>ConfigurationWebServiceImplPortBinding</con:interface><con:operation>registerEventCallback</con:operation><con:request name="Register ANNULMENT Event"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:encoding>UTF-8</con:encoding><con:endpoint>${#Project#ServiceEndpoint}/ConfigurationService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:con="http://ecommerce.resurs.com/v4/msg/configuration">
   <soapenv:Header/>
   <soapenv:Body>
      <con:registerEventCallback>
         <eventType>ANNULMENT</eventType>
         <uriTemplate>http://test.resurs.com/ecommerce/whatever?id={paymentId}&amp;digest={digest}</uriTemplate>
         <basicAuthUserName>username</basicAuthUserName>
         <basicAuthPassword>password</basicAuthPassword>
         <digestConfiguration>
            <digestAlgorithm>MD5</digestAlgorithm>
            <digestParameters>paymentId</digestParameters>
            <digestSalt>SaltSaltBaby</digestSalt>
         </digestConfiguration>
      </con:registerEventCallback>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:assertion type="SOAP Response"/><con:assertion type="Schema Compliance"><con:configuration/></con:assertion><con:assertion type="SOAP Fault Assertion"/><con:credentials><con:username>${#Project#BasicAuthUser}</con:username><con:password>${#Project#BasicAuthPass}</con:password><con:domain/><con:authType>No Authorization</con:authType></con:credentials><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508"/><con:wsrmConfig version="1.2"/></con:request></con:config></con:testStep><con:testStep type="request" name="Trigger ANNULMENT Event"><con:settings/><con:config xsi:type="con:RequestStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:interface>DeveloperWebServiceImplPortBinding</con:interface><con:operation>triggerEvent</con:operation><con:request name="Trigger ANNULMENT Event"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:encoding>UTF-8</con:encoding><con:endpoint>${#Project#ServiceEndpoint}/DeveloperWebService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:dev="http://ecommerce.resurs.com/v4/msg/developer">
   <soapenv:Header/>
   <soapenv:Body>
      <dev:triggerEvent>
         <eventType>ANNULMENT</eventType>
         <param>12ANNULMENT34</param>
      </dev:triggerEvent>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:assertion type="SOAP Response"/><con:assertion type="Schema Compliance"><con:configuration/></con:assertion><con:assertion type="SOAP Fault Assertion"/><con:credentials><con:username>${#Project#BasicAuthUser}</con:username><con:password>${#Project#BasicAuthPass}</con:password><con:domain/><con:authType>No Authorization</con:authType></con:credentials><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508"/><con:wsrmConfig version="1.2"/></con:request></con:config></con:testStep><con:testStep type="request" name="Unregister ANNULMENT Event"><con:settings/><con:config xsi:type="con:RequestStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:interface>ConfigurationWebServiceImplPortBinding</con:interface><con:operation>unregisterEventCallback</con:operation><con:request name="Unregister ANNULMENT Event"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:encoding>UTF-8</con:encoding><con:endpoint>${#Project#ServiceEndpoint}/ConfigurationService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:con="http://ecommerce.resurs.com/v4/msg/configuration">
   <soapenv:Header/>
   <soapenv:Body>
      <con:unregisterEventCallback>
         <eventType>ANNULMENT</eventType>
      </con:unregisterEventCallback>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:assertion type="SOAP Response"/><con:assertion type="Schema Compliance"><con:configuration/></con:assertion><con:assertion type="SOAP Fault Assertion"/><con:credentials><con:username>${#Project#BasicAuthUser}</con:username><con:password>${#Project#BasicAuthPass}</con:password><con:domain/><con:authType>No Authorization</con:authType></con:credentials><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508"/><con:wsrmConfig version="1.2"/></con:request></con:config></con:testStep><con:properties/></con:testCase><con:testCase failOnError="true" failTestCaseOnErrors="true" keepSession="false" maxResults="0" name="Event Callback - AUTOMATIC_FRAUD_CONTROL" searchProperties="true" id="a247a4e3-6a60-4e12-ae7d-6812449185a5"><con:description>Registers a AUTOMATIC_FRAUD_CONTROL event callback, triggers an execution,
and then removes it.</con:description><con:settings/><con:testStep type="request" name="Register AUTOMATIC_FRAUD_CONTROL Event"><con:settings/><con:config xsi:type="con:RequestStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:interface>ConfigurationWebServiceImplPortBinding</con:interface><con:operation>registerEventCallback</con:operation><con:request name="Register AUTOMATIC_FRAUD_CONTROL Event"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:encoding>UTF-8</con:encoding><con:endpoint>${#Project#ServiceEndpoint}/ConfigurationService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:con="http://ecommerce.resurs.com/v4/msg/configuration">
   <soapenv:Header/>
   <soapenv:Body>
      <con:registerEventCallback>
         <eventType>AUTOMATIC_FRAUD_CONTROL</eventType>
         <uriTemplate>http://test.resurs.com/ecommerce/whatever?id={paymentId}&amp;result={result}&amp;digest={digest}</uriTemplate>
         <basicAuthUserName>username</basicAuthUserName>
         <basicAuthPassword>password</basicAuthPassword>
         <digestConfiguration>
            <digestAlgorithm>MD5</digestAlgorithm>
            <digestParameters>paymentId</digestParameters>
            <digestParameters>result</digestParameters>
            <digestSalt>SaltSaltBaby</digestSalt>
         </digestConfiguration>
      </con:registerEventCallback>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:assertion type="SOAP Response"/><con:assertion type="Schema Compliance"><con:configuration/></con:assertion><con:assertion type="SOAP Fault Assertion"/><con:credentials><con:username>${#Project#BasicAuthUser}</con:username><con:password>${#Project#BasicAuthPass}</con:password><con:domain/><con:authType>No Authorization</con:authType></con:credentials><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508"/><con:wsrmConfig version="1.2"/></con:request></con:config></con:testStep><con:testStep type="request" name="Trigger AUTOMATIC_FRAUD_CONTROL Event"><con:settings/><con:config xsi:type="con:RequestStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:interface>DeveloperWebServiceImplPortBinding</con:interface><con:operation>triggerEvent</con:operation><con:request name="Trigger AUTOMATIC_FRAUD_CONTROL Event"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:encoding>UTF-8</con:encoding><con:endpoint>${#Project#ServiceEndpoint}/DeveloperWebService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:dev="http://ecommerce.resurs.com/v4/msg/developer">
   <soapenv:Header/>
   <soapenv:Body>
      <dev:triggerEvent>
         <eventType>AUTOMATIC_FRAUD_CONTROL</eventType>
         <param>2002</param>
         <param>FRAUD</param>
      </dev:triggerEvent>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:assertion type="SOAP Response"/><con:assertion type="Schema Compliance"><con:configuration/></con:assertion><con:assertion type="SOAP Fault Assertion"/><con:credentials><con:username>${#Project#BasicAuthUser}</con:username><con:password>${#Project#BasicAuthPass}</con:password><con:domain/><con:authType>No Authorization</con:authType></con:credentials><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508"/><con:wsrmConfig version="1.2"/></con:request></con:config></con:testStep><con:testStep type="request" name="Unregister AUTOMATIC_FRAUD_CONTROL Event"><con:settings/><con:config xsi:type="con:RequestStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:interface>ConfigurationWebServiceImplPortBinding</con:interface><con:operation>unregisterEventCallback</con:operation><con:request name="Unregister AUTOMATIC_FRAUD_CONTROL Event"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:encoding>UTF-8</con:encoding><con:endpoint>${#Project#ServiceEndpoint}/ConfigurationService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:con="http://ecommerce.resurs.com/v4/msg/configuration">
   <soapenv:Header/>
   <soapenv:Body>
      <con:unregisterEventCallback>
         <eventType>AUTOMATIC_FRAUD_CONTROL</eventType>
      </con:unregisterEventCallback>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:assertion type="SOAP Response"/><con:assertion type="Schema Compliance"><con:configuration/></con:assertion><con:assertion type="SOAP Fault Assertion"/><con:credentials><con:username>${#Project#BasicAuthUser}</con:username><con:password>${#Project#BasicAuthPass}</con:password><con:domain/><con:authType>No Authorization</con:authType></con:credentials><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508"/><con:wsrmConfig version="1.2"/></con:request></con:config></con:testStep><con:testStep type="request" name="Register AUTOMATIC_FRAUD_CONTROL Event (w/o Result)"><con:settings/><con:config xsi:type="con:RequestStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:interface>ConfigurationWebServiceImplPortBinding</con:interface><con:operation>registerEventCallback</con:operation><con:request name="Register AUTOMATIC_FRAUD_CONTROL Event (w/o Result)"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:encoding>UTF-8</con:encoding><con:endpoint>${#Project#ServiceEndpoint}/ConfigurationService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:con="http://ecommerce.resurs.com/v4/msg/configuration">
   <soapenv:Header/>
   <soapenv:Body>
      <con:registerEventCallback>
         <eventType>AUTOMATIC_FRAUD_CONTROL</eventType>
         <uriTemplate>http://test.resurs.com/ecommerce/whatever?id={paymentId}&amp;digest={digest}</uriTemplate>
         <basicAuthUserName>username</basicAuthUserName>
         <basicAuthPassword>password</basicAuthPassword>
         <digestConfiguration>
            <digestAlgorithm>MD5</digestAlgorithm>
            <digestParameters>paymentId</digestParameters>
            <digestSalt>SaltSaltBaby</digestSalt>
         </digestConfiguration>
      </con:registerEventCallback>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:assertion type="SOAP Response"/><con:assertion type="Schema Compliance"><con:configuration/></con:assertion><con:assertion type="SOAP Fault Assertion"/><con:credentials><con:username>${#Project#BasicAuthUser}</con:username><con:password>${#Project#BasicAuthPass}</con:password><con:domain/><con:authType>No Authorization</con:authType></con:credentials><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508"/><con:wsrmConfig version="1.2"/></con:request></con:config></con:testStep><con:testStep type="request" name="Trigger AUTOMATIC_FRAUD_CONTROL Event (w/o Result)"><con:settings/><con:config xsi:type="con:RequestStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:interface>DeveloperWebServiceImplPortBinding</con:interface><con:operation>triggerEvent</con:operation><con:request name="Trigger AUTOMATIC_FRAUD_CONTROL Event (w/o Result)"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:encoding>UTF-8</con:encoding><con:endpoint>${#Project#ServiceEndpoint}/DeveloperWebService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:dev="http://ecommerce.resurs.com/v4/msg/developer">
   <soapenv:Header/>
   <soapenv:Body>
      <dev:triggerEvent>
         <eventType>AUTOMATIC_FRAUD_CONTROL</eventType>
         <param>2002</param>
      </dev:triggerEvent>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:assertion type="SOAP Response"/><con:assertion type="Schema Compliance"><con:configuration/></con:assertion><con:assertion type="SOAP Fault Assertion"/><con:credentials><con:username>${#Project#BasicAuthUser}</con:username><con:password>${#Project#BasicAuthPass}</con:password><con:domain/><con:authType>No Authorization</con:authType></con:credentials><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508"/><con:wsrmConfig version="1.2"/></con:request></con:config></con:testStep><con:testStep type="request" name="Unregister AUTOMATIC_FRAUD_CONTROL Event (w/o Result)"><con:settings/><con:config xsi:type="con:RequestStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:interface>ConfigurationWebServiceImplPortBinding</con:interface><con:operation>unregisterEventCallback</con:operation><con:request name="Unregister AUTOMATIC_FRAUD_CONTROL Event (w/o Result)"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:encoding>UTF-8</con:encoding><con:endpoint>${#Project#ServiceEndpoint}/ConfigurationService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:con="http://ecommerce.resurs.com/v4/msg/configuration">
   <soapenv:Header/>
   <soapenv:Body>
      <con:unregisterEventCallback>
         <eventType>AUTOMATIC_FRAUD_CONTROL</eventType>
      </con:unregisterEventCallback>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:assertion type="SOAP Response"/><con:assertion type="Schema Compliance"><con:configuration/></con:assertion><con:assertion type="SOAP Fault Assertion"/><con:credentials><con:username>${#Project#BasicAuthUser}</con:username><con:password>${#Project#BasicAuthPass}</con:password><con:domain/><con:authType>No Authorization</con:authType></con:credentials><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508"/><con:wsrmConfig version="1.2"/></con:request></con:config></con:testStep><con:properties/></con:testCase><con:testCase failOnError="true" failTestCaseOnErrors="true" keepSession="false" maxResults="0" name="Event Callback - TEST" searchProperties="true" id="c1892b0a-9957-43ee-8b81-8db129fa4e8a"><con:description>Registers a TEST event callback, triggers an execution,
and then removes it.</con:description><con:settings/><con:testStep type="request" name="Register TEST Event"><con:settings/><con:config xsi:type="con:RequestStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:interface>ConfigurationWebServiceImplPortBinding</con:interface><con:operation>registerEventCallback</con:operation><con:request name="Register TEST Event"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:encoding>UTF-8</con:encoding><con:endpoint>${#Project#ServiceEndpoint}/ConfigurationService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:con="http://ecommerce.resurs.com/v4/msg/configuration">
   <soapenv:Header/>
   <soapenv:Body>
      <con:registerEventCallback>
         <eventType>TEST</eventType>
         <uriTemplate>http://test.resurs.com/ecommerce/whatever?first={param1}&amp;nr2={param2}&amp;nr3={param3}&amp;nr4={param4}&amp;last={param5}&amp;digest={digest}</uriTemplate>
         <basicAuthUserName>username</basicAuthUserName>
         <basicAuthPassword>password</basicAuthPassword>
         <digestConfiguration>
            <digestAlgorithm>MD5</digestAlgorithm>
            <digestParameters>param1</digestParameters>
            <digestParameters>param2</digestParameters>
            <digestParameters>param3</digestParameters>
            <digestParameters>param4</digestParameters>
            <digestParameters>param5</digestParameters>
            <digestSalt>SaltSaltBaby</digestSalt>
         </digestConfiguration>
      </con:registerEventCallback>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:assertion type="SOAP Response"/><con:assertion type="Schema Compliance"><con:configuration/></con:assertion><con:assertion type="SOAP Fault Assertion"/><con:credentials><con:username>${#Project#BasicAuthUser}</con:username><con:password>${#Project#BasicAuthPass}</con:password><con:domain/><con:authType>No Authorization</con:authType></con:credentials><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508"/><con:wsrmConfig version="1.2"/></con:request></con:config></con:testStep><con:testStep type="request" name="Trigger TEST Event"><con:settings/><con:config xsi:type="con:RequestStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:interface>DeveloperWebServiceImplPortBinding</con:interface><con:operation>triggerEvent</con:operation><con:request name="Trigger TEST Event"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:encoding>UTF-8</con:encoding><con:endpoint>${#Project#ServiceEndpoint}/DeveloperWebService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:dev="http://ecommerce.resurs.com/v4/msg/developer">
   <soapenv:Header/>
   <soapenv:Body>
      <dev:triggerEvent>
         <eventType>TEST</eventType>
         <param>Ett</param>
         <param>Two</param>
         <param>Drei</param>
         <param>Fire</param>
         <param>Viisi</param>
      </dev:triggerEvent>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:assertion type="SOAP Response"/><con:assertion type="Schema Compliance"><con:configuration/></con:assertion><con:assertion type="SOAP Fault Assertion"/><con:credentials><con:username>${#Project#BasicAuthUser}</con:username><con:password>${#Project#BasicAuthPass}</con:password><con:domain/><con:authType>No Authorization</con:authType></con:credentials><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508"/><con:wsrmConfig version="1.2"/></con:request></con:config></con:testStep><con:testStep type="request" name="Unregister TEST Event"><con:settings/><con:config xsi:type="con:RequestStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:interface>ConfigurationWebServiceImplPortBinding</con:interface><con:operation>unregisterEventCallback</con:operation><con:request name="Unregister TEST Event"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:encoding>UTF-8</con:encoding><con:endpoint>${#Project#ServiceEndpoint}/ConfigurationService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:con="http://ecommerce.resurs.com/v4/msg/configuration">
   <soapenv:Header/>
   <soapenv:Body>
      <con:unregisterEventCallback>
         <eventType>TEST</eventType>
      </con:unregisterEventCallback>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:assertion type="SOAP Response"/><con:assertion type="Schema Compliance"><con:configuration/></con:assertion><con:assertion type="SOAP Fault Assertion"/><con:credentials><con:username>${#Project#BasicAuthUser}</con:username><con:password>${#Project#BasicAuthPass}</con:password><con:domain/><con:authType>No Authorization</con:authType></con:credentials><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508"/><con:wsrmConfig version="1.2"/></con:request></con:config></con:testStep><con:properties/></con:testCase><con:testCase failOnError="true" failTestCaseOnErrors="true" keepSession="false" maxResults="0" name="Event Callback - Miscellaneous Errors" searchProperties="true" id="1de83161-509f-4596-8338-c69364a92556"><con:description>Performs miscellaneous invalid operations on event callbacks.</con:description><con:settings/><con:testStep type="request" name="Attempt to Create of Invalid Type"><con:settings/><con:config xsi:type="con:RequestStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:interface>ConfigurationWebServiceImplPortBinding</con:interface><con:operation>registerEventCallback</con:operation><con:request name="Attempt to Create of Invalid Type"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:encoding>UTF-8</con:encoding><con:endpoint>${#Project#ServiceEndpoint}/ConfigurationService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:con="http://ecommerce.resurs.com/v4/msg/configuration">
   <soapenv:Header/>
   <soapenv:Body>
      <con:registerEventCallback>
         <eventType>INVALID</eventType>
         <uriTemplate>http://test.resurs.com/whatever</uriTemplate>
      </con:registerEventCallback>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:assertion type="SOAP Response"/><con:assertion type="Schema Compliance"><con:configuration/></con:assertion><con:assertion type="Not SOAP Fault Assertion" name="SOAP Fault"/><con:assertion type="Simple Contains" name="Contains"><con:configuration><token>ILLEGAL_ARGUMENT</token><ignoreCase>false</ignoreCase><useRegEx>false</useRegEx></con:configuration></con:assertion><con:credentials><con:username>${#Project#BasicAuthUser}</con:username><con:password>${#Project#BasicAuthPass}</con:password><con:domain/><con:authType>No Authorization</con:authType></con:credentials><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508"/><con:wsrmConfig version="1.2"/></con:request></con:config></con:testStep><con:testStep type="request" name="Register TEST Event (OK)"><con:settings/><con:config xsi:type="con:RequestStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:interface>ConfigurationWebServiceImplPortBinding</con:interface><con:operation>registerEventCallback</con:operation><con:request name="Register TEST Event (OK)"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:encoding>UTF-8</con:encoding><con:endpoint>${#Project#ServiceEndpoint}/ConfigurationService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:con="http://ecommerce.resurs.com/v4/msg/configuration">
   <soapenv:Header/>
   <soapenv:Body>
      <con:registerEventCallback>
         <eventType>TEST</eventType>
         <uriTemplate>http://test.resurs.com/ecommerce/whatever?first={param1}&amp;nr2={param2}&amp;nr3={param3}&amp;nr4={param4}&amp;last={param5}&amp;digest={digest}</uriTemplate>
         <basicAuthUserName>username</basicAuthUserName>
         <basicAuthPassword>password</basicAuthPassword>
         <digestConfiguration>
            <digestAlgorithm>MD5</digestAlgorithm>
            <digestParameters>param1</digestParameters>
            <digestParameters>param2</digestParameters>
            <digestParameters>param3</digestParameters>
            <digestParameters>param4</digestParameters>
            <digestParameters>param5</digestParameters>
            <digestSalt>SaltSaltBaby</digestSalt>
         </digestConfiguration>
      </con:registerEventCallback>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:assertion type="SOAP Response"/><con:assertion type="Schema Compliance"><con:configuration/></con:assertion><con:assertion type="SOAP Fault Assertion"/><con:credentials><con:username>${#Project#BasicAuthUser}</con:username><con:password>${#Project#BasicAuthPass}</con:password><con:domain/><con:authType>No Authorization</con:authType></con:credentials><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508"/><con:wsrmConfig version="1.2"/></con:request></con:config></con:testStep><con:testStep type="request" name="Register TEST Event (NOK; Already Exists)"><con:settings/><con:config xsi:type="con:RequestStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:interface>ConfigurationWebServiceImplPortBinding</con:interface><con:operation>registerEventCallback</con:operation><con:request name="Register TEST Event (NOK; Already Exists)"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:encoding>UTF-8</con:encoding><con:endpoint>${#Project#ServiceEndpoint}/ConfigurationService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:con="http://ecommerce.resurs.com/v4/msg/configuration">
   <soapenv:Header/>
   <soapenv:Body>
      <con:registerEventCallback>
         <eventType>TEST</eventType>
         <uriTemplate>http://test.resurs.com/ecommerce/whatever?first={param1}&amp;nr2={param2}&amp;nr3={param3}&amp;nr4={param4}&amp;last={param5}&amp;digest={digest}</uriTemplate>
         <basicAuthUserName>username</basicAuthUserName>
         <basicAuthPassword>password</basicAuthPassword>
         <digestConfiguration>
            <digestAlgorithm>MD5</digestAlgorithm>
            <digestParameters>param1</digestParameters>
            <digestParameters>param2</digestParameters>
            <digestParameters>param3</digestParameters>
            <digestParameters>param4</digestParameters>
            <digestParameters>param5</digestParameters>
            <digestSalt>SaltSaltBaby</digestSalt>
         </digestConfiguration>
      </con:registerEventCallback>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:assertion type="SOAP Response"/><con:assertion type="Schema Compliance"><con:configuration/></con:assertion><con:assertion type="Not SOAP Fault Assertion" name="SOAP Fault"/><con:assertion type="Simple Contains" name="Error Type is OK"><con:configuration><token>ILLEGAL_ARGUMENT</token><ignoreCase>false</ignoreCase><useRegEx>false</useRegEx></con:configuration></con:assertion><con:assertion type="Simple Contains" name="Error Message OK"><con:configuration><token>Callback of type TEST already exists!</token><ignoreCase>false</ignoreCase><useRegEx>false</useRegEx></con:configuration></con:assertion><con:credentials><con:username>${#Project#BasicAuthUser}</con:username><con:password>${#Project#BasicAuthPass}</con:password><con:domain/><con:authType>No Authorization</con:authType></con:credentials><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508"/><con:wsrmConfig version="1.2"/></con:request></con:config></con:testStep><con:testStep type="request" name="Trigger TEST Event (OK)"><con:settings/><con:config xsi:type="con:RequestStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:interface>DeveloperWebServiceImplPortBinding</con:interface><con:operation>triggerEvent</con:operation><con:request name="Trigger TEST Event (OK)"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:encoding>UTF-8</con:encoding><con:endpoint>${#Project#ServiceEndpoint}/DeveloperWebService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:dev="http://ecommerce.resurs.com/v4/msg/developer">
   <soapenv:Header/>
   <soapenv:Body>
      <dev:triggerEvent>
         <eventType>TEST</eventType>
         <param>Param1</param>
         <param>Param2</param>
         <param>Param3</param>
         <param>Param4</param>
         <param>Param5</param>
      </dev:triggerEvent>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:assertion type="SOAP Response"/><con:assertion type="Schema Compliance"><con:configuration/></con:assertion><con:assertion type="SOAP Fault Assertion"/><con:credentials><con:username>${#Project#BasicAuthUser}</con:username><con:password>${#Project#BasicAuthPass}</con:password><con:domain/><con:authType>No Authorization</con:authType></con:credentials><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508"/><con:wsrmConfig version="1.2"/></con:request></con:config></con:testStep><con:testStep type="request" name="Unregister TEST Event (OK)"><con:settings/><con:config xsi:type="con:RequestStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:interface>ConfigurationWebServiceImplPortBinding</con:interface><con:operation>unregisterEventCallback</con:operation><con:request name="Unregister TEST Event (OK)"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:encoding>UTF-8</con:encoding><con:endpoint>${#Project#ServiceEndpoint}/ConfigurationService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:con="http://ecommerce.resurs.com/v4/msg/configuration">
   <soapenv:Header/>
   <soapenv:Body>
      <con:unregisterEventCallback>
         <eventType>TEST</eventType>
      </con:unregisterEventCallback>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:assertion type="SOAP Response"/><con:assertion type="Schema Compliance"><con:configuration/></con:assertion><con:assertion type="SOAP Fault Assertion"/><con:credentials><con:username>${#Project#BasicAuthUser}</con:username><con:password>${#Project#BasicAuthPass}</con:password><con:domain/><con:authType>No Authorization</con:authType></con:credentials><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508"/><con:wsrmConfig version="1.2"/></con:request></con:config></con:testStep><con:testStep type="request" name="Unregister TEST Event (NOK; Does not Exist)"><con:settings/><con:config xsi:type="con:RequestStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:interface>ConfigurationWebServiceImplPortBinding</con:interface><con:operation>unregisterEventCallback</con:operation><con:request name="Unregister TEST Event (NOK; Does not Exist)"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:encoding>UTF-8</con:encoding><con:endpoint>${#Project#ServiceEndpoint}/ConfigurationService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:con="http://ecommerce.resurs.com/v4/msg/configuration">
   <soapenv:Header/>
   <soapenv:Body>
      <con:unregisterEventCallback>
         <eventType>TEST</eventType>
      </con:unregisterEventCallback>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:assertion type="SOAP Response"/><con:assertion type="Schema Compliance"><con:configuration/></con:assertion><con:assertion type="Not SOAP Fault Assertion" name="SOAP Fault"/><con:assertion type="Simple Contains" name="Error Type is OK"><con:configuration><token>REFERENCED_DATA_DONT_EXISTS</token><ignoreCase>false</ignoreCase><useRegEx>false</useRegEx></con:configuration></con:assertion><con:assertion type="Simple Contains" name="Error Message OK"><con:configuration><token>Callback of type TEST does not exist!</token><ignoreCase>false</ignoreCase><useRegEx>false</useRegEx></con:configuration></con:assertion><con:credentials><con:username>${#Project#BasicAuthUser}</con:username><con:password>${#Project#BasicAuthPass}</con:password><con:domain/><con:authType>No Authorization</con:authType></con:credentials><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508"/><con:wsrmConfig version="1.2"/></con:request></con:config></con:testStep><con:testStep type="request" name="Trigger TEST Event (NOK; Does not Exist)"><con:settings/><con:config xsi:type="con:RequestStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:interface>DeveloperWebServiceImplPortBinding</con:interface><con:operation>triggerEvent</con:operation><con:request name="Trigger TEST Event (NOK; Does not Exist)"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:encoding>UTF-8</con:encoding><con:endpoint>${#Project#ServiceEndpoint}/DeveloperWebService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:dev="http://ecommerce.resurs.com/v4/msg/developer">
   <soapenv:Header/>
   <soapenv:Body>
      <dev:triggerEvent>
         <eventType>TEST</eventType>
         <param>Param1</param>
         <param>Param2</param>
         <param>Param3</param>
         <param>Param4</param>
         <param>Param5</param>
      </dev:triggerEvent>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:assertion type="SOAP Response"/><con:assertion type="Schema Compliance"><con:configuration/></con:assertion><con:assertion type="Not SOAP Fault Assertion" name="SOAP Fault"/><con:assertion type="Simple Contains" name="Is Illegal Argument"><con:configuration><token>ILLEGAL_ARGUMENT</token><ignoreCase>false</ignoreCase><useRegEx>false</useRegEx></con:configuration></con:assertion><con:credentials><con:username>${#Project#BasicAuthUser}</con:username><con:password>${#Project#BasicAuthPass}</con:password><con:domain/><con:authType>No Authorization</con:authType></con:credentials><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508"/><con:wsrmConfig version="1.2"/></con:request></con:config></con:testStep><con:properties/></con:testCase><con:properties/></con:testSuite><con:testSuite name="Non Flows"><con:settings/><con:runType>SEQUENTIAL</con:runType><con:testCase failOnError="true" failTestCaseOnErrors="true" keepSession="false" maxResults="0" name="Get Payment Methods" searchProperties="true" id="f334fc75-e8f7-4487-b665-5224b09e132c"><con:settings/><con:testStep type="request" name="Get payment methods"><con:settings/><con:config xsi:type="con:RequestStep" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><con:interface>ShopFlowWebServiceImplPortBinding</con:interface><con:operation>getPaymentMethods</con:operation><con:request name="Get payment methods"><con:settings><con:setting id="com.eviware.soapui.impl.wsdl.WsdlRequest@request-headers">&lt;xml-fragment/></con:setting></con:settings><con:encoding>UTF-8</con:encoding><con:endpoint>${#Project#ServiceEndpoint}/ShopFlowService</con:endpoint><con:request><![CDATA[<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:shop="http://ecommerce.resurs.com/v4/msg/shopflow">
   <soapenv:Header/>
   <soapenv:Body>
      <shop:getPaymentMethods/>
   </soapenv:Body>
</soapenv:Envelope>]]></con:request><con:credentials><con:username>${#Project#BasicAuthUser}</con:username><con:password>${#Project#BasicAuthPass}</con:password><con:domain/><con:selectedAuthProfile>Basic</con:selectedAuthProfile><con:addedBasicAuthenticationTypes>Basic</con:addedBasicAuthenticationTypes><con:authType>Global HTTP Settings</con:authType></con:credentials><con:jmsConfig JMSDeliveryMode="PERSISTENT"/><con:jmsPropertyConfig/><con:wsaConfig mustUnderstand="NONE" version="200508"/><con:wsrmConfig version="1.2"/></con:request></con:config></con:testStep><con:properties/></con:testCase><con:properties/></con:testSuite><con:properties><con:property><con:name>ServiceEndpoint</con:name><con:value>http://test.resurs.com/ecommerce-test/ws/V4</con:value></con:property><con:property><con:name>Approved_StartYear</con:name><con:value>1969</con:value></con:property><con:property><con:name>Approved_EndYear</con:name><con:value>1980</con:value></con:property><con:property><con:name>SignOption_OK</con:name><con:value>1000</con:value></con:property><con:property><con:name>SignOption_NOK</con:name><con:value>1002</con:value></con:property><con:property><con:name>Inspection_StartYear</con:name><con:value>1985</con:value></con:property><con:property><con:name>Inspection_EndYear</con:name><con:value>2000</con:value></con:property><con:property><con:name>Denied_StartYear</con:name><con:value>1955</con:value></con:property><con:property><con:name>Denied_EndYear</con:name><con:value>1964</con:value></con:property><con:property><con:name>PaymentMethodID_Card</con:name><con:value>7</con:value></con:property><con:property><con:name>PaymentMethodID_NewAccount</con:name><con:value>8</con:value></con:property><con:property><con:name>PaymentMethodID_Invoice</con:name><con:value>9</con:value></con:property><con:property><con:name>PaymentMethodID_Invoice_Corp</con:name><con:value>6</con:value></con:property><con:property><con:name>Cards_Valid</con:name><con:value>6204248717,9752222448452178;5101290384,9752222448368598</con:value></con:property><con:property><con:name>Ordinals_NotFrozen</con:name><con:value>1, 3, 5, 7, 9</con:value></con:property><con:property><con:name>Ordinals_Frozen</con:name><con:value>0, 2, 4, 6, 8</con:value></con:property><con:property><con:name>Wait_Short</con:name><con:value>100</con:value></con:property><con:property><con:name>BasicAuthUser</con:name><con:value>exshop</con:value></con:property><con:property><con:name>BasicAuthPass</con:name><con:value>g09UaWH38D</con:value></con:property></con:properties><con:wssContainer/><con:oAuth2ProfileContainer/><con:sensitiveInformation/></con:soapui-project>
```
