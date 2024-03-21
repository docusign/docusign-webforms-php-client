<?php

use DocuSign\WebForms\Api\FormManagementApi;
use \DocuSign\WebForms\Api\FormManagementApi\GetFormOptions;
use PHPUnit\Framework\TestCase;

class FormManagementApiUnitTest extends TestCase
{
    protected static $_formId;
    /**   
     * @var TestConfig
     */
    protected static $_testConfig;
    /**
     * oAuth
     *\DocuSign\WebForms\Api\FormManagementApi
     * @var FormManagementApi
     */
    protected static $_mgmtApi;

    //Test Initialization
    public static function setUpBeforeClass()
    {
        self::$_testConfig = TestUtils::GetTestConfig();
        self::$_mgmtApi = new FormManagementApi(self::$_testConfig->getApiClient());
        self::FillDependencies();
    }

    private static function FillDependencies()
    {
        $webforms = self::$_mgmtApi->listForms(self::$_testConfig->getAccountId());
        if ($webforms->getTotalSetSize() > 0) {
            self::$_formId = $webforms->getItems()[0]->getId();
        }
    }

    public function test_ListForms_ShouldReturnForms_WithValidAccountId()
    {
        //Arrange
        $accountId = self::$_testConfig->getAccountId();
        //Act
        $apiResponse = self::$_mgmtApi->listFormsWithHttpInfo($accountId);
        //Assert
        $this->assertNotNull($apiResponse);
        $this->assertTrue($apiResponse[0]->getTotalSetSize() >= 0);
        $this->assertInstanceOf("\DocuSign\WebForms\Model\WebFormSummaryList", $apiResponse[0]);
    }

    public function test_ListFormsWithHttpInfo_ShouldReturnInvalidArgumentException_WithAccountIdAsNull()
    {
        //Arrange
        $accountId = null;
        //Act
        try {
            $apiResponse = self::$_mgmtApi->listFormsWithHttpInfo($accountId);
            $this->fail("Exception should be thrown when accountId is null");
        } catch (Exception $exception) {
            //Assert
            $this->assertTrue($exception instanceof InvalidArgumentException);
            $this->assertEquals('Missing the required parameter $account_id when calling listForms', $exception->getMessage());
        }
    }

    public function test_GetFormWithHttpInfo_ShouldReturnForm_WithValidAccountId_FormId()
    {
        //Arrange
        $accountId = self::$_testConfig->getAccountId();
        $formId = self::$_formId;
        $getFormOptions =  new  GetFormOptions();
        $getFormOptions->setState("active");

        //Act
        $apiResponse = self::$_mgmtApi->getFormWithHttpInfo($accountId, $formId, $getFormOptions);
        //Assert
        $this->assertNotNull($apiResponse);        
        $this->assertInstanceOf("DocuSign\WebForms\Model\WebForm", $apiResponse[0]);
        $this->assertEquals(200, $apiResponse[1]);
    }

    public function test_GetFormWithHttpInfo_ShouldReturnInvalidArgumentException_WithFormIdAsNull()
    {
        //Arrange
        $accountId = self::$_testConfig->getAccountId();
        $formId = null;
        $getFormOptions =  new  GetFormOptions();
        $getFormOptions->setState("active");
        try {
            //Act
            $apiResponse = self::$_mgmtApi->getFormWithHttpInfo($accountId, $formId, $getFormOptions);
            $this->fail("Exception should be thrown when formId is null");
        } catch (InvalidArgumentException $exception) {
            //Assert
            $this->assertTrue($exception instanceof InvalidArgumentException);
            $this->assertEquals('Missing the required parameter $form_id when calling getForm', $exception->getMessage());
        }
    }

    public function test_GetFormWithHttpInfo_ShouldReturnInvalidArgumentException_WithAccountIdAsNull()
    {
        //Arrange
        $accountId = null;
        $formId = self::$_formId;
        $getFormOptions =  new  GetFormOptions();
        $getFormOptions->setState("active");

        try {
            //Act
            $apiResponse = self::$_mgmtApi->getFormWithHttpInfo($accountId, $formId, $getFormOptions);
            $this->fail("Exception should be thrown when accountId is null");
        } catch (InvalidArgumentException $exception) {
            //Assert
            $this->assertTrue($exception instanceof InvalidArgumentException);
            $this->assertEquals('Missing the required parameter $account_id when calling getForm', $exception->getMessage());
        }
    }
}
