<?php
declare(strict_types=1);

/**
 * FormManagementApi.
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  DocuSign\WebForms
 * @author   Swagger Codegen team <apihelp@docusign.com>
 * @license  The DocuSign PHP Client SDK is licensed under the MIT License.
 * @link     https://github.com/swagger-api/swagger-codegen
 */

/**
 * Web Forms API version 1.1
 *
 * The Web Forms API facilitates generating semantic HTML forms around everyday contracts.
 *
 * OpenAPI spec version: 1.1.0
 * Contact: devcenter@docusign.com
 * Generated by: https://github.com/swagger-api/swagger-codegen.git
 * Swagger Codegen version: 2.4.21
 */

/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace DocuSign\WebForms\Api\FormManagementApi;


/**
 * GetFormOptions Class Doc Comment
 *
 * @category Class
 * @package  DocuSign\WebForms
 * @author   Swagger Codegen team <apihelp@docusign.com>
 * @license  The DocuSign PHP Client SDK is licensed under the MIT License.
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class GetFormOptions
{
    /**
      * $state The state of the web form configuration
      * @var ?string
      */
    protected ?string $state = null;

    /**
     * Gets state
     *
     * @return ?string
     */
    public function getState(): ?string
    {
        return $this->state;
    }

    /**
     * Sets state
     * @param ?string $state The state of the web form configuration
     *
     * @return self
     */
    public function setState(?string $state): self
    {
        $this->state = $state;
        return $this;
    }
}


/**
 * ListFormsOptions Class Doc Comment
 *
 * @category Class
 * @package  DocuSign\WebForms
 * @author   Swagger Codegen team <apihelp@docusign.com>
 * @license  The DocuSign PHP Client SDK is licensed under the MIT License.
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class ListFormsOptions
{
    /**
      * $user_filter Filter which forms are returned
      * @var ?string
      */
    protected ?string $user_filter = null;

    /**
     * Gets user_filter
     *
     * @return ?string
     */
    public function getUserFilter(): ?string
    {
        return $this->user_filter;
    }

    /**
     * Sets user_filter
     * @param ?string $user_filter Filter which forms are returned
     *
     * @return self
     */
    public function setUserFilter(?string $user_filter): self
    {
        $this->user_filter = $user_filter;
        return $this;
    }
    /**
      * $is_standalone Is the form a standalone form
      * @var ?bool
      */
    protected ?bool $is_standalone = null;

    /**
     * Gets is_standalone
     *
     * @return ?bool
     */
    public function getIsStandalone(): ?bool
    {
        return $this->is_standalone;
    }

    /**
     * Sets is_standalone
     * @param ?bool $is_standalone Is the form a standalone form
     *
     * @return self
     */
    public function setIsStandalone(?bool $is_standalone): self
    {
        $this->is_standalone = $is_standalone;
        return $this;
    }
    /**
      * $is_published Has the form been published
      * @var ?bool
      */
    protected ?bool $is_published = null;

    /**
     * Gets is_published
     *
     * @return ?bool
     */
    public function getIsPublished(): ?bool
    {
        return $this->is_published;
    }

    /**
     * Sets is_published
     * @param ?bool $is_published Has the form been published
     *
     * @return self
     */
    public function setIsPublished(?bool $is_published): self
    {
        $this->is_published = $is_published;
        return $this;
    }
    /**
      * $sort_by Sort result set in mentioned sort property:order. Default is lastModifiedDateTime:desc. Default sort is descending if not mentioned.
      * @var ?string
      */
    protected ?string $sort_by = null;

    /**
     * Gets sort_by
     *
     * @return ?string
     */
    public function getSortBy(): ?string
    {
        return $this->sort_by;
    }

    /**
     * Sets sort_by
     * @param ?string $sort_by Sort result set in mentioned sort property:order. Default is lastModifiedDateTime:desc. Default sort is descending if not mentioned.
     *
     * @return self
     */
    public function setSortBy(?string $sort_by): self
    {
        $this->sort_by = $sort_by;
        return $this;
    }
    /**
      * $search Search through form names
      * @var ?string
      */
    protected ?string $search = null;

    /**
     * Gets search
     *
     * @return ?string
     */
    public function getSearch(): ?string
    {
        return $this->search;
    }

    /**
     * Sets search
     * @param ?string $search Search through form names
     *
     * @return self
     */
    public function setSearch(?string $search): self
    {
        $this->search = $search;
        return $this;
    }
    /**
      * $start_position Starting position for desired page of results.
      * @var ?string
      */
    protected ?string $start_position = null;

    /**
     * Gets start_position
     *
     * @return ?string
     */
    public function getStartPosition(): ?string
    {
        return $this->start_position;
    }

    /**
     * Sets start_position
     * @param ?string $start_position Starting position for desired page of results.
     *
     * @return self
     */
    public function setStartPosition(?string $start_position): self
    {
        $this->start_position = $start_position;
        return $this;
    }
    /**
      * $count Number of results to return per page.
      * @var ?string
      */
    protected ?string $count = null;

    /**
     * Gets count
     *
     * @return ?string
     */
    public function getCount(): ?string
    {
        return $this->count;
    }

    /**
     * Sets count
     * @param ?string $count Number of results to return per page.
     *
     * @return self
     */
    public function setCount(?string $count): self
    {
        $this->count = $count;
        return $this;
    }
}



namespace DocuSign\WebForms\Api;

use DocuSign\WebForms\Client\ApiClient;
use DocuSign\WebForms\Client\ApiException;
use DocuSign\WebForms\Configuration;
use DocuSign\WebForms\ObjectSerializer;

/**
 * FormManagementApi Class Doc Comment
 *
 * @category Class
 * @package  DocuSign\WebForms
 * @author   Swagger Codegen team <apihelp@docusign.com>
 * @license  The DocuSign PHP Client SDK is licensed under the MIT License.
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class FormManagementApi
{
    /**
     * API Client
     *
     * @var ApiClient instance of the ApiClient
     */
    protected ApiClient $apiClient;

    /**
     * Constructor
     *
     * @param ApiClient|null $apiClient The api client to use
     *
     * @return void
     */
    public function __construct(ApiClient $apiClient = null)
    {
        $this->apiClient = $apiClient ?? new ApiClient();
    }

    /**
     * Get API client
     *
     * @return ApiClient get the API client
     */
    public function getApiClient(): ApiClient
    {
        return $this->apiClient;
    }

    /**
     * Set the API client
     *
     * @param ApiClient $apiClient set the API client
     *
     * @return self
     */
    public function setApiClient(ApiClient $apiClient): self
    {
        $this->apiClient = $apiClient;
        return $this;
    }

    /**
    * Update $resourcePath with $
    *
    * @param string $resourcePath the resource path to use
    * @param string $baseName the base name param
    * @param string $paramName the parameter name
    *
    * @return string
    */
    public function updateResourcePath(string $resourcePath, string $baseName, string $paramName): string
    {
        return str_replace(
            "{" . $baseName . "}",
            $this->apiClient->getSerializer()->toPathValue($paramName),
            $resourcePath
        );
    }


    /**
     * Operation getForm
     *
     * Get Form
     *
     * @param ?string $account_id Account identifier in which the web form resides
     * @param ?string $form_id Unique identifier for a web form that is consistent for it&#39;s lifetime
     * @param  \DocuSign\WebForms\Api\FormManagementApi\GetFormOptions  $options for modifying the behavior of the function. (optional)
     *
     * @throws ApiException on non-2xx response
     * @return \DocuSign\WebForms\Model\WebForm
     */
    public function getForm($account_id, $form_id, \DocuSign\WebForms\Api\FormManagementApi\GetFormOptions $options = null)
    {
        list($response) = $this->getFormWithHttpInfo($account_id, $form_id, $options);
        return $response;
    }

    /**
     * Operation getFormWithHttpInfo
     *
     * Get Form
     *
     * @param ?string $account_id Account identifier in which the web form resides
     * @param ?string $form_id Unique identifier for a web form that is consistent for it&#39;s lifetime
     * @param  \DocuSign\WebForms\Api\FormManagementApi\GetFormOptions  $options for modifying the behavior of the function. (optional)
     *
     * @throws ApiException on non-2xx response
     * @return array of \DocuSign\WebForms\Model\WebForm, HTTP status code, HTTP response headers (array of strings)
     */
    public function getFormWithHttpInfo($account_id, $form_id, \DocuSign\WebForms\Api\FormManagementApi\GetFormOptions $options = null): array
    {
        // verify the required parameter 'account_id' is set
        if ($account_id === null) {
            throw new \InvalidArgumentException('Missing the required parameter $account_id when calling getForm');
        }
        // verify the required parameter 'form_id' is set
        if ($form_id === null) {
            throw new \InvalidArgumentException('Missing the required parameter $form_id when calling getForm');
        }
        if ($options != null && !is_null($options->getstate()) &&(strlen($options->getstate()) > 15)) {
            throw new \InvalidArgumentException('invalid length for "$state" when calling FormManagementApi.getForm, must be smaller than or equal to 15.');
        }

        // parse inputs
        $resourcePath = "/accounts/{account_id}/forms/{form_id}";
        $httpBody = $_tempBody ?? ''; // $_tempBody is the method argument, if present
        $queryParams = $headerParams = $formParams = [];
        $headerParams['Accept'] ??= $this->apiClient->selectHeaderAccept(['application/json']);
        $headerParams['Content-Type'] = $this->apiClient->selectHeaderContentType(['application/json']);

        if ($options != null)
        {
            // query params
            if ($options->getState() != 'null') {
                $queryParams['state'] = $this->apiClient->getSerializer()->toQueryValue($options->getState());
            }
        }

        // path params
        if ($account_id !== null) {
            $resourcePath = self::updateResourcePath($resourcePath, "account_id", $account_id);
        }
        // path params
        if ($form_id !== null) {
            $resourcePath = self::updateResourcePath($resourcePath, "form_id", $form_id);
        }

        // default format to json
        $resourcePath = str_replace("{format}", "json", $resourcePath);
        
        // for model (json/xml)
        if (isset($_tempBody)) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present
        } elseif (count($formParams) > 0) {
            $httpBody = $formParams; // for HTTP post (form)
        }
        // this endpoint requires OAuth (access token)
        if (strlen($this->apiClient->getConfig()->getAccessToken()) !== 0) {
            $headerParams['Authorization'] = 'Bearer ' . $this->apiClient->getConfig()->getAccessToken();
        }
        // make the API Call
        try {
            list($response, $statusCode, $httpHeader) = $this->apiClient->callApi(
                $resourcePath,
                'GET',
                $queryParams,
                $httpBody,
                $headerParams,
                '\DocuSign\WebForms\Model\WebForm',
                '/accounts/{account_id}/forms/{form_id}'
            );

            return [$this->apiClient->getSerializer()->deserialize($response, '\DocuSign\WebForms\Model\WebForm', $httpHeader), $statusCode, $httpHeader];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\DocuSign\WebForms\Model\WebForm', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\DocuSign\WebForms\Model\HttpError', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\DocuSign\WebForms\Model\HttpError', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 500:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\DocuSign\WebForms\Model\HttpError', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
            }

            throw $e;
        }
    }

    /**
     * Operation listForms
     *
     * List Forms
     *
     * @param ?string $account_id Account identifier in which the webform resides
     * @param  \DocuSign\WebForms\Api\FormManagementApi\ListFormsOptions  $options for modifying the behavior of the function. (optional)
     *
     * @throws ApiException on non-2xx response
     * @return \DocuSign\WebForms\Model\WebFormSummaryList
     */
    public function listForms($account_id, \DocuSign\WebForms\Api\FormManagementApi\ListFormsOptions $options = null)
    {
        list($response) = $this->listFormsWithHttpInfo($account_id, $options);
        return $response;
    }

    /**
     * Operation listFormsWithHttpInfo
     *
     * List Forms
     *
     * @param ?string $account_id Account identifier in which the webform resides
     * @param  \DocuSign\WebForms\Api\FormManagementApi\ListFormsOptions  $options for modifying the behavior of the function. (optional)
     *
     * @throws ApiException on non-2xx response
     * @return array of \DocuSign\WebForms\Model\WebFormSummaryList, HTTP status code, HTTP response headers (array of strings)
     */
    public function listFormsWithHttpInfo($account_id, \DocuSign\WebForms\Api\FormManagementApi\ListFormsOptions $options = null): array
    {
        // verify the required parameter 'account_id' is set
        if ($account_id === null) {
            throw new \InvalidArgumentException('Missing the required parameter $account_id when calling listForms');
        }
        if ($options != null && !is_null($options->getsortBy()) &&(strlen($options->getsortBy()) > 50)) {
            throw new \InvalidArgumentException('invalid length for "$sort_by" when calling FormManagementApi.listForms, must be smaller than or equal to 50.');
        }

        // parse inputs
        $resourcePath = "/accounts/{account_id}/forms";
        $httpBody = $_tempBody ?? ''; // $_tempBody is the method argument, if present
        $queryParams = $headerParams = $formParams = [];
        $headerParams['Accept'] ??= $this->apiClient->selectHeaderAccept(['application/json']);
        $headerParams['Content-Type'] = $this->apiClient->selectHeaderContentType(['application/json']);

        if ($options != null)
        {
            // query params
            if ($options->getUserFilter() != 'null') {
                $queryParams['user_filter'] = $this->apiClient->getSerializer()->toQueryValue($options->getUserFilter());
            }
            if ($options->getIsStandalone() != 'null') {
                $queryParams['is_standalone'] = $this->apiClient->getSerializer()->toQueryValue($options->getIsStandalone());
            }
            if ($options->getIsPublished() != 'null') {
                $queryParams['is_published'] = $this->apiClient->getSerializer()->toQueryValue($options->getIsPublished());
            }
            if ($options->getSortBy() != 'null') {
                $queryParams['sort_by'] = $this->apiClient->getSerializer()->toQueryValue($options->getSortBy());
            }
            if ($options->getSearch() != 'null') {
                $queryParams['search'] = $this->apiClient->getSerializer()->toQueryValue($options->getSearch());
            }
            if ($options->getStartPosition() != 'null') {
                $queryParams['start_position'] = $this->apiClient->getSerializer()->toQueryValue($options->getStartPosition());
            }
            if ($options->getCount() != 'null') {
                $queryParams['count'] = $this->apiClient->getSerializer()->toQueryValue($options->getCount());
            }
        }

        // path params
        if ($account_id !== null) {
            $resourcePath = self::updateResourcePath($resourcePath, "account_id", $account_id);
        }

        // default format to json
        $resourcePath = str_replace("{format}", "json", $resourcePath);
        
        // for model (json/xml)
        if (isset($_tempBody)) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present
        } elseif (count($formParams) > 0) {
            $httpBody = $formParams; // for HTTP post (form)
        }
        // this endpoint requires OAuth (access token)
        if (strlen($this->apiClient->getConfig()->getAccessToken()) !== 0) {
            $headerParams['Authorization'] = 'Bearer ' . $this->apiClient->getConfig()->getAccessToken();
        }
        // make the API Call
        try {
            list($response, $statusCode, $httpHeader) = $this->apiClient->callApi(
                $resourcePath,
                'GET',
                $queryParams,
                $httpBody,
                $headerParams,
                '\DocuSign\WebForms\Model\WebFormSummaryList',
                '/accounts/{account_id}/forms'
            );

            return [$this->apiClient->getSerializer()->deserialize($response, '\DocuSign\WebForms\Model\WebFormSummaryList', $httpHeader), $statusCode, $httpHeader];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\DocuSign\WebForms\Model\WebFormSummaryList', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\DocuSign\WebForms\Model\HttpError', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\DocuSign\WebForms\Model\HttpError', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\DocuSign\WebForms\Model\HttpError', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 500:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\DocuSign\WebForms\Model\HttpError', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
            }

            throw $e;
        }
    }
}
