<?php
use DocuSign\WebForms\Api\FormInstanceManagementApi;
use DocuSign\WebForms\Api\FormManagementApi;
use DocuSign\WebForms\Model\AuthenticationMethod;
use DocuSign\WebForms\Model\CreateInstanceRequestBody;
use PHPUnit\Framework\TestCase;
class FormInstanceManagementApiUnitTests extends TestCase {
    
    protected static $_formId;
    protected static $_webFormInstanceId;     
    /**
     * @var TestConfig
     */
    protected static $_testConfig;       
    /**
     * oAuth
     *\DocuSign\WebForms\Api\FormInstanceManagementApi
     * @var FormInstanceManagementApi
     */
    protected static $_mgmtInstanceApi;
    /**
     * oAuth
     *\DocuSign\WebForms\Api\FormManagementApi
     * @var FormManagementApi
     */
    protected static $_mgmtApi;

    //Test Initialization
    public static function setUpBeforeClass() {
        self::$_testConfig = TestUtils::GetTestConfig();
        self::$_mgmtApi = new FormManagementApi(self::$_testConfig->getApiClient());
        self::$_mgmtInstanceApi = new FormInstanceManagementApi(self::$_testConfig->getApiClient());
        self::FillDependencies();
    }

    private static function FillDependencies() {
        $webforms = self::$_mgmtApi->listForms(self::$_testConfig->getAccountId());
        $publishedWebForms = [];
        foreach ($webforms->getItems() as $form) {
            if ($form->getIsPublished() == true) {
                array_push($publishedWebForms, $form);
            }
        }
        if (count($publishedWebForms) > 0) {
            self::$_formId = $webforms->getItems() [0]->getId();
        }       
        $tags = [];
        array_push($tags, "loan_application", "finance_dept");
        $createInstanceRequestBody = new CreateInstanceRequestBody();
        $createInstanceRequestBody->setClientUserId("customer_id@domain.com");
        $createInstanceRequestBody->setAuthenticationInstant(date('Y-m-d H:i:s'));        
        $createInstanceRequestBody->setAuthenticationMethod(AuthenticationMethod::BIOMETRIC);
        $createInstanceRequestBody->setAssertionId("client-1");
        $createInstanceRequestBody->setSecurityDomain("domain.com");
        $createInstanceRequestBody->setReturnUrl("www.domain.com");
        $createInstanceRequestBody->setExpirationOffset(120);
        $createInstanceRequestBody->setTags($tags);
        $webFormInstance = self::$_mgmtInstanceApi->createInstance(self::$_testConfig->getAccountId(), self::$_formId, $createInstanceRequestBody);
        self::$_webFormInstanceId = $webFormInstance->getId();
    }

    public function testListInstancesWithHttpInfo_ShouldReturnInstances_WithValidAccountId_FormId() {
        //Arrange
        $accountId = self::$_testConfig->getAccountId();
        $formId = self::$_formId;
        //Act
        $apiResponse = self::$_mgmtInstanceApi->listInstancesWithHttpInfo($accountId, $formId);
        //Assert
        $this->assertNotNull($apiResponse);
        $this->assertNotNull($apiResponse[0]);
        $this->assertTrue(count($apiResponse[0]->getItems()) >= 0);
        $this->assertEquals($apiResponse[1], 200);
    }

    public function testGetFormInstanceWithHttpInfo_ShouldReturnFormInstance_WithValidRequestParams() {
        //Arrange
        $accountId = self::$_testConfig->getAccountId();
        $formId = self::$_formId;
        $instanceId = self::$_webFormInstanceId;
        //Act
        $apiResponse = self::$_mgmtInstanceApi->getInstanceWithHttpInfo($accountId, $formId, $instanceId);
        //Assert
        $this->assertNotNull($apiResponse);
        $this->assertNotNull($apiResponse[0]);
        $this->assertEquals($formId, $apiResponse[0]->getFormId());
        $this->assertEquals($accountId, $apiResponse[0]->getAccountId());
    }

    public function testGetFormInstanceWithHttpInfo_ShouldReturnInvalidArgumentException_WithAccountIdAsNull() {
        //Arrange
        $accountId = null;
        $formId = self::$_formId;
        $instanceId = self::$_webFormInstanceId;
        try {
            //Act
            $apiResponse = self::$_mgmtInstanceApi->getInstanceWithHttpInfo($accountId, $formId, $instanceId);
            $this->fail("Exception should be thrown when accountid is null");
        }
        catch(Exception $exception) {
            //Assert
            $this->assertTrue($exception instanceof InvalidArgumentException);
            $this->assertEquals('Missing the required parameter $account_id when calling getInstance', $exception->getMessage());
        }
    }

    public function testGetFormInstanceWithHttpInfo_ShouldReturnInvalidArgumentException_WithFormIdAsNull() {
        //Arrange
        $accountId = self::$_testConfig->getAccountId();
        $formId = null;
        $instanceId = self::$_webFormInstanceId;
        try {
            //Act
            $apiResponse = self::$_mgmtInstanceApi->getInstanceWithHttpInfo($accountId, $formId, $instanceId);
            $this->fail("Exception should be thrown when accountid is null");
        }
        catch(Exception $exception) {
            //Assert
            $this->assertTrue($exception instanceof InvalidArgumentException);
            $this->assertEquals('Missing the required parameter $form_id when calling getInstance', $exception->getMessage());
        }
    }

    public function testGetFormInstanceWithHttpInfo_ShouldReturnInvalidArgumentException_WithInstanceIdAsNull() {
        //Arrange
        $accountId = self::$_testConfig->getAccountId();
        $formId = self::$_formId;
        $instanceId = null;
        try {
            //Act
            $apiResponse = self::$_mgmtInstanceApi->getInstanceWithHttpInfo($accountId, $formId, $instanceId);
            $this->fail("Exception should be thrown when accountid is null");
        }
        catch(Exception $exception) {
            //Assert
            $this->assertTrue($exception instanceof InvalidArgumentException);
            $this->assertEquals('Missing the required parameter $instance_id when calling getInstance', $exception->getMessage());
        }
    }

    /* Refresh Token API */
    private function createWebFormInstance() {
        $tags = [];
        array_push($tags, "loan_application", "finance_dept");
        $createInstanceRequestBody = new CreateInstanceRequestBody();
        $createInstanceRequestBody->setClientUserId("customer_id@domain.com");
        $createInstanceRequestBody->setAuthenticationInstant(date('Y-m-d H:i:s'));
        $createInstanceRequestBody->setAuthenticationMethod(AuthenticationMethod::KERBEROS);
        $createInstanceRequestBody->setAssertionId("client-1");
        $createInstanceRequestBody->setSecurityDomain("domain.com");
        $createInstanceRequestBody->setReturnUrl("www.domain.com");
        $createInstanceRequestBody->setExpirationOffset(120);
        $createInstanceRequestBody->setTags($tags);
        $webFormInstance = self::$_mgmtInstanceApi->createInstance(self::$_testConfig->getAccountId(), self::$_formId, $createInstanceRequestBody);
        return $webFormInstance;
    }

    public function testRefreshInstanceTokenWithHttpInfo_ShouldReturnWebFormInstanceOfNewToken_WithValidParams() {
        //Arrange
        $accountId = self::$_testConfig->getAccountId();
        $formId = self::$_formId;
        $existingWebFormInstance = self::createWebFormInstance();
        $instanceId = $existingWebFormInstance->getId();
        //Act
        $apiResponse = self::$_mgmtInstanceApi->refreshTokenWithHttpInfo($accountId, $formId, $instanceId);
        //Assert
        $this->assertEquals($apiResponse[1], 200);
        $this->assertNotEquals($existingWebFormInstance->getInstanceToken(), $apiResponse[0]->getInstanceToken());
    }

    public function testRefreshInstanceTokenWithHttpInfo_ShouldReturnInvalidArguemntException_WithAccountIdAsNull() {
        //Arrange
        $accountId = null;
        $formId = self::$_formId;
        $instanceId = self::$_webFormInstanceId;
        try {
            //Act
            $apiResponse = self::$_mgmtInstanceApi->refreshTokenWithHttpInfo($accountId, $formId, $instanceId);
            $this->fail("Exception should be thrown when accountid is null");
        }
        catch(Exception $exception) {
            //Assert
            $this->assertTrue($exception instanceof InvalidArgumentException);
            $this->assertEquals('Missing the required parameter $account_id when calling refreshToken', $exception->getMessage());
        }
    }

    public function testRefreshInstanceTokenWithHttpInfo_ShouldReturnInvalidArguemntException_WithFormIdAsNull() {
        //Arrange
        $accountId = self::$_testConfig->getAccountId();
        $formId = null;
        $instanceId = self::$_webFormInstanceId;
        try {
            //Act
            $apiResponse = self::$_mgmtInstanceApi->refreshTokenWithHttpInfo($accountId, $formId, $instanceId);
            $this->fail("Exception should be thrown when accountid is null");
        }
        catch(Exception $exception) {
            //Assert
            $this->assertTrue($exception instanceof InvalidArgumentException);
            $this->assertEquals('Missing the required parameter $form_id when calling refreshToken', $exception->getMessage());
        }
    }

    public function testRefreshInstanceTokenWithHttpInfo_ShouldReturnInvalidArguemntException_WithInstanceIdAsNull() {
        //Arrange
        $accountId = self::$_testConfig->getAccountId();
        $formId = self::$_formId;
        $instanceId = null;
        try {
            //Act
            $apiResponse = self::$_mgmtInstanceApi->refreshTokenWithHttpInfo($accountId, $formId, $instanceId);
            $this->fail("Exception should be thrown when accountid is null");
        }
        catch(Exception $exception) {
            //Assert
            $this->assertTrue($exception instanceof InvalidArgumentException);
            $this->assertEquals('Missing the required parameter $instance_id when calling refreshToken', $exception->getMessage());
        }
    }
}
