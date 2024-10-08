<?php
/**
 * WebFormComponentType
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
 * WebFormComponentType Class Doc Comment
 *
 * @category    Class
 * @description Type of components used in the web form
 * @package     DocuSign\WebForms
 * @author      Swagger Codegen team <apihelp@docusign.com>
 * @license     The Docusign PHP Client SDK is licensed under the MIT License.
 * @link        https://github.com/swagger-api/swagger-codegen
 */
class WebFormComponentType
{
    /**
     * Possible values of this enum
     */
    const CHECKBOX_GROUP = 'CheckboxGroup';
    const DATE = 'Date';
    const EMAIL = 'Email';
    const NUMBER = 'Number';
    const RADIO_BUTTON_GROUP = 'RadioButtonGroup';
    const SELECT = 'Select';
    const TEXT_BOX = 'TextBox';
    
    /**
     * Gets allowable values of the enum
     * @return string[]
     */
    public static function getAllowableEnumValues()
    {
        return [
            self::CHECKBOX_GROUP,
            self::DATE,
            self::EMAIL,
            self::NUMBER,
            self::RADIO_BUTTON_GROUP,
            self::SELECT,
            self::TEXT_BOX,
        ];
    }
}

