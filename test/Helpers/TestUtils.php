<?php 

use DocuSign\WebForms\Configuration;
use DocuSign\WebForms\Client\ApiClient;


class TestUtils
{
    private static $WEBFORMS_SCOPES = ["signature","impersonation",'webforms_read',"webforms_write","webforms_instance_read","webforms_instance_write"];

    public static function GetTestConfig(){
        $testConfig = new TestConfig();

        $config = new Configuration();
        $config->setHost($testConfig->getHost());

        $testConfig->setApiClient(new ApiClient($config));
        $testConfig->getApiClient()->getOAuth()->setBasePath($testConfig->getHost());

        $token = $testConfig->getApiClient()->requestJWTUserToken($testConfig->getIntegratorKey(),$testConfig->getUserId(), $testConfig->getClientKey(),self::$WEBFORMS_SCOPES);       

        $user = $testConfig->getApiClient()->getUserInfo($token[0]['access_token']);
       
        $loginAccount = $user[0]['accounts'][0];
        $accountId = $loginAccount->getAccountId();

        $testConfig->setAccountId($accountId);

        return $testConfig;
    }
}

?>