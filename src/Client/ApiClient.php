<?php
/**
 * ApiClient
 *
 * PHP version 5
 *
 * @category Class
 * @package  DocuSign\WebForms
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */

/**
 * DocuSign REST API
 *
 * The DocuSign REST API provides you with a powerful, convenient, and simple Web services API for interacting with DocuSign.
 *
 * OpenAPI spec version: v2
 * Contact: devcenter@docusign.com
 * Generated by: https://github.com/swagger-api/swagger-codegen.git
 */

/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace DocuSign\WebForms\Client;

use DocuSign\WebForms\Client\Auth\OAuth;
use \DocuSign\WebForms\Configuration;
use \DocuSign\WebForms\ObjectSerializer;
use SebastianBergmann\RecursionContext\InvalidArgumentException;
use Firebase\JWT\JWT;


/**
 * ApiClient Class Doc Comment
 *
 * @category Class
 * @package  DocuSign\WebForms
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class ApiClient
{
    public static $PATCH = "PATCH";
    public static $POST = "POST";
    public static $GET = "GET";
    public static $HEAD = "HEAD";
    public static $OPTIONS = "OPTIONS";
    public static $PUT = "PUT";
    public static $DELETE = "DELETE";



    public static $SCOPE_SIGNATURE = "signature";
    public static $SCOPE_EXTENDED = "extended";
    public static $SCOPE_IMPERSONATION = "impersonation";

    public static $GRANT_TYPE_JWT = "urn:ietf:params:oauth:grant-type:jwt-bearer";

    /**
     * Configuration
     *
     * @var Configuration
     */
    protected $config;

    /**
     * oAuth
     *\DocuSign\WebForms\Client\ApiException
     * @var OAuth
     */
    protected $oAuth;

    /**
     * Object Serializer
     *
     * @var ObjectSerializer
     */
    protected $serializer;

    /**
     * Constructor of the class
     *
     * @param Configuration $config Rest API config for this ApiClient
     * @param OAuth $oAuth OAuth config for this ApiClient
     */
    public function __construct(Configuration $config = null, OAuth $oAuth = null)
    {
        if ($config === null) {
            $config = Configuration::getDefaultConfiguration();
        }

        if ($oAuth === null) {
            $oAuth = new OAuth();
        }

        $this->config = $config;
        $this->oAuth = $oAuth;
        $this->serializer = new ObjectSerializer();
    }

    /**
     * Get the config
     *
     * @return Configuration
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * Get the oAuth
     *
     * @return OAuth
     */
    public function getOAuth()
    {
        return $this->oAuth;
    }

    /**
     * Get the serializer
     *
     * @return ObjectSerializer
     */
    public function getSerializer()
    {
        return $this->serializer;
    }

    /**
     * Get API key (with prefix if set)
     *
     * @param string $apiKeyIdentifier name of apikey
     *
     * @return string API key with the prefix
     */
    public function getApiKeyWithPrefix($apiKeyIdentifier)
    {
        $prefix = $this->config->getApiKeyPrefix($apiKeyIdentifier);
        $apiKey = $this->config->getApiKey($apiKeyIdentifier);

        if (!isset($apiKey)) {
            return null;
        }

        if (isset($prefix)) {
            $keyWithPrefix = $prefix." ".$apiKey;
        } else {
            $keyWithPrefix = $apiKey;
        }

        return $keyWithPrefix;
    }

    /**
     * Make the HTTP call (Sync)
     *
     * @param string $resourcePath path to method endpoint
     * @param string $method       method to call
     * @param array  $queryParams  parameters to be place in query URL
     * @param array  $postData     parameters to be placed in POST body
     * @param array  $headerParams parameters to be place in request header
     * @param string $responseType expected response type of the endpoint
     * @param string $endpointPath path to method endpoint before expanding parameters
     * @param bool   $oAuth        pass true in case of oAuth requests
     *
     * @throws ApiException on a non 2xx response
     * @return mixed
     */
    public function callApi($resourcePath, $method, $queryParams, $postData, $headerParams, $responseType = null, $endpointPath = null, $oAuth = false)
    {
        $headers = [];

        // DocuSign: Add DocuSign tracking headers
        $this->config->addDefaultHeader("X-DocuSign-SDK", "PHP");

        $url = $this->config->getHost() . $resourcePath;
        if ($oAuth) {
            $url = 'https://' . $this->oAuth->getOAuthBasePath() . $resourcePath;
        } else {
            // construct the http header
            $headerParams = array_merge(
                (array)$this->config->getDefaultHeaders(),
                (array)$headerParams
            );
        }

        foreach ($headerParams as $key => $val) {
            $headers[] = "$key: $val";
        }

        // form data
        if ($postData and in_array('Content-Type: application/x-www-form-urlencoded', $headers, true)) {
            $postData = http_build_query($postData);
        } elseif ((is_object($postData) or is_array($postData)) and !in_array('Content-Type: multipart/form-data', $headers, true)) { // json model
            $postData = json_encode(ObjectSerializer::sanitizeForSerialization($postData));
        }

        if (in_array('Content-Type: multipart/form-data', $headers, true))
        {            
            foreach($postData as $property => $value)
            {
                if($postData[$property] instanceof \CURLFile)
                {
                    $headers[] = 'Content-Disposition: form-data; name="file"; filename="' . $postData[$property]->getFileName() . '"';
                    $postData = file_get_contents($postData[$property]->getFileName());
                    break;
                }
            }            
        }

        $curl = curl_init();
        // set timeout, if needed
        if ($this->config->getCurlTimeout() !== 0) {
            curl_setopt($curl, CURLOPT_TIMEOUT, $this->config->getCurlTimeout());
        }
        // set connect timeout, if needed
        if ($this->config->getCurlConnectTimeout() != 0) {
            curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, $this->config->getCurlConnectTimeout());
        }

        // return the result on success, rather than just true
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

        // disable SSL verification, if needed
        if ($this->config->getSSLVerification() === false) {
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        }

        if ($this->config->getCurlProxyHost()) {
            curl_setopt($curl, CURLOPT_PROXY, $this->config->getCurlProxyHost());
        }

        if ($this->config->getCurlProxyPort()) {
            curl_setopt($curl, CURLOPT_PROXYPORT, $this->config->getCurlProxyPort());
        }

        if ($this->config->getCurlProxyType()) {
            curl_setopt($curl, CURLOPT_PROXYTYPE, $this->config->getCurlProxyType());
        }

        if ($this->config->getCurlProxyUser()) {
            curl_setopt($curl, CURLOPT_PROXYUSERPWD, $this->config->getCurlProxyUser() . ':' .$this->config->getCurlProxyPassword());
        }

        if (!empty($queryParams)) {
            $url = ($url . '?' . http_build_query($queryParams));
        }

        if ($method === self::$POST) {
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $postData);
        } elseif ($method === self::$HEAD) {
            curl_setopt($curl, CURLOPT_NOBODY, true);
        } elseif ($method === self::$OPTIONS) {
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "OPTIONS");
            curl_setopt($curl, CURLOPT_POSTFIELDS, $postData);
        } elseif ($method === self::$PATCH) {
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PATCH");
            curl_setopt($curl, CURLOPT_POSTFIELDS, $postData);
        } elseif ($method === self::$PUT) {
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
            curl_setopt($curl, CURLOPT_POSTFIELDS, $postData);
        } elseif ($method === self::$DELETE) {
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
            curl_setopt($curl, CURLOPT_POSTFIELDS, $postData);
        } elseif ($method !== self::$GET) {
            throw new ApiException('Method ' . $method . ' is not recognized.');
        }
        curl_setopt($curl, CURLOPT_URL, $url);

        // Set user agent
        curl_setopt($curl, CURLOPT_USERAGENT, $this->config->getUserAgent());

        // debugging for curl
        if ($this->config->getDebug()) {
            error_log("[DEBUG] HTTP Request body  ~BEGIN~".PHP_EOL.print_r($postData, true).PHP_EOL."~END~".PHP_EOL, 3, $this->config->getDebugFile());

            curl_setopt($curl, CURLOPT_VERBOSE, 1);
            curl_setopt($curl, CURLOPT_STDERR, fopen($this->config->getDebugFile(), 'a'));
        } else {
            curl_setopt($curl, CURLOPT_VERBOSE, 0);
        }

        // obtain the HTTP response headers
        curl_setopt($curl, CURLOPT_HEADER, 1);

        // Make the request
        $response = curl_exec($curl);
        $http_header_size = curl_getinfo($curl, CURLINFO_HEADER_SIZE);
        $http_header = $this->httpParseHeaders(substr($response, 0, $http_header_size));
        $http_body = substr($response, $http_header_size);
        $response_info = curl_getinfo($curl);

        // debug HTTP response body
        if ($this->config->getDebug()) {
            error_log("[DEBUG] HTTP Response body ~BEGIN~".PHP_EOL.print_r($http_body, true).PHP_EOL."~END~".PHP_EOL, 3, $this->config->getDebugFile());
        }

        // Handle the response
        if ($response_info['http_code'] === 0) {
            $curl_error_message = curl_error($curl);

            // curl_exec can sometimes fail but still return a blank message from curl_error().
            if (!empty($curl_error_message)) {
                $error_message = "API call to $url failed: $curl_error_message";
            } else {
                $error_message = "API call to $url failed, but for an unknown reason. " .
                    "This could happen if you are disconnected from the network.";
            }

            $exception = new ApiException($error_message, 0, null, null);
            $exception->setResponseObject($response_info);
            throw $exception;
        } elseif ($response_info['http_code'] >= 200 && $response_info['http_code'] <= 299) {
            // return raw body if response is a file
            if ($responseType === '\SplFileObject' || $responseType === 'string') {
                return [$http_body, $response_info['http_code'], $http_header];
            }

            $data = json_decode($http_body);
            if (json_last_error() > 0) { // if response is a string
                $data = $http_body;
            }
        } else {
            $data = json_decode($http_body);
            $serializedData = $data;
            if (json_last_error() > 0) { // if response is a string
                $data = $http_body;
            }
            if(is_object($serializedData)){
                $serializedData = serialize($serializedData);
            }

            throw new ApiException(
                "Error while requesting server, received a non successful HTTP code [".$response_info['http_code']."] with response Body:  $serializedData",
                $response_info['http_code'],
                $http_header,
                $data
            );
        }
        return [$data, $response_info['http_code'], $http_header];
    }

    /**
     * Return the header 'Accept' based on an array of Accept provided
     *
     * @param string[] $accept Array of header
     *
     * @return string Accept (e.g. application/json)
     */
    public function selectHeaderAccept($accept)
    {
        if (count($accept) === 0 or (count($accept) === 1 and $accept[0] === '')) {
            return null;
        } elseif (preg_grep("/application\/json/i", $accept)) {
            return 'application/json';
        } else {
            return implode(',', $accept);
        }
    }

    /**
     * Return the content type based on an array of content-type provided
     *
     * @param string[] $content_type Array fo content-type
     *
     * @return string Content-Type (e.g. application/json)
     */
    public function selectHeaderContentType($content_type)
    {
        if (count($content_type) === 0 or (count($content_type) === 1 and $content_type[0] === '')) {
            return 'application/json';
        } elseif (preg_grep("/application\/json/i", $content_type)) {
            return 'application/json';
        } else {
            return implode(',', $content_type);
        }
    }

    /**
     * Return an array of HTTP response headers
     *
     * @param string $raw_headers A string of raw HTTP response headers
     *
     * @return string[] Array of HTTP response heaers
     */
    protected function httpParseHeaders($raw_headers)
    {
        // ref/credit: http://php.net/manual/en/function.http-parse-headers.php#112986
        $headers = [];
        $key = '';

        foreach (explode("\n", $raw_headers) as $h) {
            $h = explode(':', $h, 2);

            if (isset($h[1])) {
                if (!isset($headers[$h[0]])) {
                    $headers[$h[0]] = trim($h[1]);
                } elseif (is_array($headers[$h[0]])) {
                    $headers[$h[0]] = array_merge($headers[$h[0]], [trim($h[1])]);
                } else {
                    $headers[$h[0]] = array_merge([$headers[$h[0]]], [trim($h[1])]);
                }

                $key = $h[0];
            } else {
                if (substr($h[0], 0, 1) === "\t") {
                    $headers[$key] .= "\r\n\t".trim($h[0]);
                } elseif (!$key) {
                    $headers[0] = trim($h[0]);
                }
                trim($h[0]);
            }
        }

        return $headers;
    }

    /**
     * Helper method to configure the OAuth accessCode/implicit flow parameters
     *
     * @param string $client_id DocuSign OAuth Client Id(AKA Integrator Key)
     * @param string|array $scopes the list of requested scopes.  Client applications may be scoped to a limited set of system access.
     * @param string $redirect_uri This determines where to deliver the response containing the authorization code
     * @param string $response_type Determines the response type of the authorization request, NOTE: these response types are
     *              mutually exclusive for a client application. A public/native client application may only request a response type
     *              of "token". A private/trusted client application may only request a response type of "code".
     * @param string $state Allows for arbitrary state that may be useful to your application.
     *              The value in this parameter will be round-tripped along with the response so you can make sure it didn't change.
     *              Will be round-tripped along with the response so you can make sure it didn't change.
     *
     * @return string
     */
    public function getAuthorizationURI($client_id, $scopes, $redirect_uri, $response_type, $state = null)
    {
        $replace = array(
            '{oauth_base_path}' => $this->oAuth->getOAuthBasePath(),
            '{response_type}' => $response_type,
            '{scope}' => rawurlencode(is_array($scopes) ? implode(" ", $scopes) : $scopes),
            '{client_id}' => $client_id,
            '{redirect_uri}' => $redirect_uri,
            '{state}' => $state,
        );
        $resourcePath = "https://{oauth_base_path}/oauth/auth?response_type={response_type}&scope={scope}&client_id={client_id}&redirect_uri={redirect_uri}";
        if ($state) {
            $resourcePath .= '&state={state}';
        }
        return str_replace(
            array_keys($replace),
            array_values($replace),
            $resourcePath
        );
    }

    /**
     * GenerateAccessToken will exchange the authorization code for an access token and refresh tokens.
     *
     * @param string $client_id DocuSign OAuth Client Id(AKA Integrator Key)
     * @param string $client_secret The secret key you generated when you set up the integration in DocuSign Admin console.
     * @param string $code The authorization code
     *
     * @return array
     * @throws ApiException
     * @throws InvalidArgumentException
     */
    public function generateAccessToken($client_id = null, $client_secret = null, $code = null)
    {
        if (!$client_id) {
            throw new \InvalidArgumentException('Missing the required parameter $client_id when calling generateAccessToken');
        }
        if (!$client_secret) {
            throw new \InvalidArgumentException('Missing the required parameter $client_secret when calling generateAccessToken');
        }
        if (!$code) {
            throw new \InvalidArgumentException('Missing the required parameter $code when calling generateAccessToken');
        }

        $resourcePath = "/oauth/token";
        $queryParams = [];
        $integrator_and_secret_key = "Basic " . utf8_decode(base64_encode("{$client_id}:{$client_secret}"));
        $headers = [
            "Authorization" => $integrator_and_secret_key,
            "Content-Type" => "application/x-www-form-urlencoded",
        ];
        $postData = [
            "grant_type" => "authorization_code",
            "code" => $code
        ];
        list($response, $statusCode, $httpHeader) = $this->callApi($resourcePath, self::$POST, $queryParams, $postData, $headers, null, null, true);
        if(isset($response->access_token))
            $this->config->addDefaultHeader("Authorization", "{$response->token_type} {$response->access_token}");
        return [$this->getSerializer()->deserialize($response, '\DocuSign\WebForms\Client\Auth\OAuthToken', $httpHeader), $statusCode, $httpHeader];
    }
    
    /**
     * Refresh Access Token
     *
     * @param string $client_id DocuSign OAuth Client Id(AKA Integrator Key)
     * @param string $client_secret The secret key you generated when you set up the integration in DocuSign Admin console.
     * @param string $code The authorization code
     *
     * @return array
     * @throws ApiException
     * @throws InvalidArgumentException
     */
    public function refreshAccessToken($client_id = null, $client_secret = null, $refresh_token = null)
    { 
        if (!$client_id) { 
            throw new \InvalidArgumentException('Missing the required parameter $client_id when calling refreshAccessToken'); 
        } 
        if (!$client_secret) { 
            throw new \InvalidArgumentException('Missing the required parameter $client_secret when calling refreshAccessToken'); 
        } 
        if (!$refresh_token) { 
            throw new \InvalidArgumentException('Missing the required parameter $refresh_token when calling refreshAccessToken'); 
        }
        $resourcePath = "/oauth/token"; 
        $queryParams = []; 
        $integrator_and_secret_key = "Basic " . utf8_decode(base64_encode("{$client_id}:{$client_secret}")); 
        $headers = [ 
            "Authorization" => $integrator_and_secret_key, 
            "Content-Type" => "application/x-www-form-urlencoded", 
        ];
        $postData = [ 
            "grant_type" => "refresh_token", 
            "refresh_token" => $refresh_token, 
        ];
        list($response, $statusCode, $httpHeader) = $this->callApi($resourcePath, self::$POST, $queryParams, $postData, $headers, null, null, true);
        if (isset($response->access_token))  
            $this->config->addDefaultHeader("Authorization", "{$response->token_type} {$response->access_token}");  
        return [$this->getSerializer()->deserialize($response, '\DocuSign\WebForms\Client\Auth\OAuthToken', $httpHeader), $statusCode, $httpHeader]; 
    }

    /**
     * Request JWT User Token
     *
     * @param  string $client_id DocuSign OAuth Client Id(AKA Integrator Key)
     * @param  string $rsa_private_key the RSA private key
     * @param  string|string[] $scopes array optional The list of requested scopes may include (but not limited to) You can also pass any advanced scope.
     * @param  string $user_id
     * @param  int $expires_in Number of minutes token will be valid
     * @return array
     * @throws ApiException
     * @throws InvalidArgumentException
     */
    public function requestJWTUserToken($client_id, $user_id, $rsa_private_key, $scopes = null, $expires_in = 60)
    {
        if (!$client_id) {
            throw new \InvalidArgumentException('Missing the required parameter $client_id when calling requestJWTUserToken');
        }
        if (!$user_id) {
            throw new \InvalidArgumentException('Missing the required parameter $user_id when calling requestJWTUserToken');
        }
        if (!$rsa_private_key) {
            throw new \InvalidArgumentException('Missing the required parameter $rsa_private_key when calling requestJWTUserToken');
        }

        if (empty($scopes)) {
            $scopes = self::$SCOPE_SIGNATURE;
        }
        if ((int)$expires_in > 60) {
            //expires max number can be 60 minutes
            $expires_in = 60;
        }
        $now = time();

        $claim = [
            "iss" => $client_id,
            "sub" => $user_id,
            "aud" => $this->oAuth->getOAuthBasePath(),
            "iat" => $now,
            "exp" => $now + (int)$expires_in*60,
            "scope" => is_array($scopes)?implode(" ", $scopes): $scopes
        ];

        $jwt = JWT::encode($claim, $rsa_private_key, 'RS256');

        $resourcePath = "/oauth/token";
        $queryParams = [];
        $headers = [
            "Content-Type" => "application/x-www-form-urlencoded",
        ];
        $postData = [
            "assertion" => $jwt,
            "grant_type" => self::$GRANT_TYPE_JWT
        ];
        list($response, $statusCode, $httpHeader) = $this->callApi($resourcePath, self::$POST, $queryParams, $postData, $headers, null, null, true);

        if(isset($response->access_token))
            $this->config->addDefaultHeader("Authorization", "{$response->token_type} {$response->access_token}");

        return [$this->getSerializer()->deserialize($response, '\DocuSign\WebForms\Client\Auth\OAuthToken', $httpHeader), $statusCode, $httpHeader];
    }

    /**
     * Request JWT Application Token
     *
     * @param string $client_id DocuSign OAuth Client Id(AKA Integrator Key)
     * @param string $rsa_private_key the RSA private key
     * @param string|string[] $scopes array optional The list of requested scopes may include (but not limited to) You can also pass any advanced scope.
     * @param int $expires_in int Number of minutes token will be valid
     *
     * @return array
     *
     * @throws ApiException
     */
    public function requestJWTApplicationToken($client_id, $rsa_private_key, $scopes = null, $expires_in = 60)
    {
        if (!$client_id) {
            throw new \InvalidArgumentException('Missing the required parameter $client_id when calling requestJWTApplicationToken');
        }
        if (!$rsa_private_key) {
            throw new \InvalidArgumentException('Missing the required parameter $rsa_private_key when calling requestJWTApplicationToken');
        }

        if (empty($scopes)) {
            $scopes = self::$SCOPE_SIGNATURE;
        }
        if ((int)$expires_in > 60) {
            //expires max number can be 60 minutes
            $expires_in = 60;
        }
        $now = time();
        $claim = [
            "iss" => $client_id,
            "aud" => $this->oAuth->getOAuthBasePath(),
            "iat" => $now,
            "exp" => $now + (int)$expires_in*60,
            "scope" => is_array($scopes)?implode(" ", $scopes):$scopes
        ];

        $jwt = JWT::encode($claim, $rsa_private_key, 'RS256');

        $resourcePath = "/oauth/token";
        $queryParams = [];
        $headers = ["Content-Type" => "application/x-www-form-urlencoded"];
        $postData = [
            "assertion" => $jwt,
            "grant_type" => self::$GRANT_TYPE_JWT
        ];
        list($response, $statusCode, $httpHeader) = $this->callApi($resourcePath, self::$POST, $queryParams, $postData, $headers, null, null, true);

        return [$this->getSerializer()->deserialize($response, '\DocuSign\WebForms\Client\Auth\OAuthToken', $httpHeader), $statusCode, $httpHeader];
    }

    /**
     * Get User Info method takes the accessToken to retrieve User Account Data.
     *
     * @param $access_token
     *
     * @return array
     *
     * @throws ApiException
     */
    public function getUserInfo($access_token)
    {
        if (!$access_token) {
            throw new \InvalidArgumentException('Cannot find a valid access token. Make sure OAuth is configured before you try again.');
        }

        $resourcePath = "/oauth/userinfo";
        $queryParams = [];
        $headers = [
            "Authorization" => 'Bearer '.$access_token,
        ];
        $postData = [];
        list($response, $statusCode, $httpHeader) = $this->callApi(
            $resourcePath,
            self::$GET,
            $queryParams,
            $postData,
            $headers,
            null,
            null,
            true
        );
        return [
            $this->getSerializer()->deserialize(
                $response,
                '\DocuSign\WebForms\Client\Auth\UserInfo',
                $httpHeader
            ),
            $statusCode,
            $httpHeader
        ];
    }
}
