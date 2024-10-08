<?php
/**
 * InstanceStatus
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  DocuSign\WebForms
 * @author   Swagger Codegen team <apihelp@docusign.com>
 * @license  The Docusign PHP Client SDK is licensed under the MIT License.
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

namespace DocuSign\WebForms\Model;
use DocuSign\WebForms\ObjectSerializer;

/**
 * InstanceStatus Class Doc Comment
 *
 * @category    Class
 * @description The status of Web Form Instance. If the form status is INITIATED, it means the form is accessible until it is submitted or expired. If the form status is SUBMITTED, it means the form is submitted already and hence, cannot be opened again.
 * @package     DocuSign\WebForms
 * @author      Swagger Codegen team <apihelp@docusign.com>
 * @license     The Docusign PHP Client SDK is licensed under the MIT License.
 * @link        https://github.com/swagger-api/swagger-codegen
 */
class InstanceStatus
{
    /**
     * Possible values of this enum
     */
    const INITIATED = 'INITIATED';
    const IN_PROGRESS = 'IN_PROGRESS';
    const SUBMITTED = 'SUBMITTED';
    const EXPIRED = 'EXPIRED';
    const FAILED = 'FAILED';
    
    /**
     * Gets allowable values of the enum
     * @return string[]
     */
    public static function getAllowableEnumValues()
    {
        return [
            self::INITIATED,
            self::IN_PROGRESS,
            self::SUBMITTED,
            self::EXPIRED,
            self::FAILED,
        ];
    }
}

