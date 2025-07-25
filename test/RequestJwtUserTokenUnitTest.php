<?php

use DocuSign\WebForms\Configuration;
use DocuSign\WebForms\Client\ApiClient;
use PHPUnit\Framework\TestCase;

class RequestJwtUserTokenUnitTest extends TestCase
{
    private static $WEBFORMS_SCOPES = ["signature", "impersonation", "webforms_read", "webforms_instance_read", "webforms_instance_write", ];
    public function testLogin()
    {
        $testConfig = new TestConfig();

        $config = new Configuration();
        $config->setHost($testConfig->getHost());

        $testConfig->setApiClient(new ApiClient($config));
        $testConfig->getApiClient()
            ->getOAuth()
            ->setBasePath($testConfig->getHost());

        $token = $testConfig->getApiClient()
            ->requestJWTUserToken($testConfig->getIntegratorKey() , $testConfig->getUserId() , $testConfig->getClientKey() , self::$WEBFORMS_SCOPES);

        $this->assertInstanceOf("DocuSign\WebForms\Client\Auth\OAuthToken", $token[0]);
        $this->assertArrayHasKey("access_token", $token[0]);

        $user = $testConfig->getApiClient()
            ->getUserInfo($token[0]["access_token"]);

        $this->assertNotEmpty($user);
        $this->assertEquals($user[1], 200);

        $this->assertInstanceOf("DocuSign\WebForms\Client\Auth\UserInfo", $user[0]);
        $this->assertNotEmpty($user[0]);

        $this->assertArrayHasKey("accounts", $user[0]);
        $loginAccount = $user[0]["accounts"][0];
        $accountId = $loginAccount->getAccountId();

        $this->assertNotEmpty($accountId);
    }
}

?>
