<?php
/**
 * WebFormContent
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

namespace DocuSign\WebForms\Model;

use \ArrayAccess;
use DocuSign\WebForms\ObjectSerializer;

/**
 * WebFormContent Class Doc Comment
 *
 * @category    Class
 * @description Container for the components map used during configuration and data collection
 * @package     DocuSign\WebForms
 * @author      Swagger Codegen team <apihelp@docusign.com>
 * @license     The DocuSign PHP Client SDK is licensed under the MIT License.
 * @link        https://github.com/swagger-api/swagger-codegen
 */
class WebFormContent implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'WebFormContent';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'components' => '\DocuSign\WebForms\Model\WebFormComponentsMap',
        'is_standalone' => 'bool',
        'brand_id' => '?string',
        'templates' => '\DocuSign\WebForms\Model\TemplateProperties[]'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'components' => null,
        'is_standalone' => null,
        'brand_id' => null,
        'templates' => null
    ];

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function swaggerTypes()
    {
        return self::$swaggerTypes;
    }

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function swaggerFormats()
    {
        return self::$swaggerFormats;
    }

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'components' => 'components',
        'is_standalone' => 'isStandalone',
        'brand_id' => 'brandId',
        'templates' => 'templates'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'components' => 'setComponents',
        'is_standalone' => 'setIsStandalone',
        'brand_id' => 'setBrandId',
        'templates' => 'setTemplates'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'components' => 'getComponents',
        'is_standalone' => 'getIsStandalone',
        'brand_id' => 'getBrandId',
        'templates' => 'getTemplates'
    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @return array
     */
    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @return array
     */
    public static function setters()
    {
        return self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @return array
     */
    public static function getters()
    {
        return self::$getters;
    }

    /**
     * The original name of the model.
     *
     * @return string
     */
    public function getModelName()
    {
        return self::$swaggerModelName;
    }

    

    

    /**
     * Associative array for storing property values
     *
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor
     *
     * @param mixed[] $data Associated array of property values
     *                      initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->container['components'] = isset($data['components']) ? $data['components'] : null;
        $this->container['is_standalone'] = isset($data['is_standalone']) ? $data['is_standalone'] : null;
        $this->container['brand_id'] = isset($data['brand_id']) ? $data['brand_id'] : null;
        $this->container['templates'] = isset($data['templates']) ? $data['templates'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        return $invalidProperties;
    }

    /**
     * Validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properties are valid
     */
    public function valid()
    {
        return count($this->listInvalidProperties()) === 0;
    }


    /**
     * Gets components
     *
     * @return \DocuSign\WebForms\Model\WebFormComponentsMap
     */
    public function getComponents()
    {
        return $this->container['components'];
    }

    /**
     * Sets components
     *
     * @param \DocuSign\WebForms\Model\WebFormComponentsMap $components Key/value dictionary of components that represent the form
     *
     * @return $this
     */
    public function setComponents($components)
    {
        $this->container['components'] = $components;

        return $this;
    }

    /**
     * Gets is_standalone
     *
     * @return bool
     */
    public function getIsStandalone()
    {
        return $this->container['is_standalone'];
    }

    /**
     * Sets is_standalone
     *
     * @param bool $is_standalone is_standalone
     *
     * @return $this
     */
    public function setIsStandalone($is_standalone)
    {
        $this->container['is_standalone'] = $is_standalone;

        return $this;
    }

    /**
     * Gets brand_id
     *
     * @return ?string
     */
    public function getBrandId()
    {
        return $this->container['brand_id'];
    }

    /**
     * Sets brand_id
     *
     * @param ?string $brand_id brand_id
     *
     * @return $this
     */
    public function setBrandId($brand_id)
    {
        $this->container['brand_id'] = $brand_id;

        return $this;
    }

    /**
     * Gets templates
     *
     * @return \DocuSign\WebForms\Model\TemplateProperties[]
     */
    public function getTemplates()
    {
        return $this->container['templates'];
    }

    /**
     * Sets templates
     *
     * @param \DocuSign\WebForms\Model\TemplateProperties[] $templates Optional template information that will be used to seed the form.
     *
     * @return $this
     */
    public function setTemplates($templates)
    {
        $this->container['templates'] = $templates;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param integer $offset Offset
     *
     * @return boolean
     */
    #[\ReturnTypeWillChange]
    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     *
     * @param integer $offset Offset
     *
     * @return mixed
     */
    #[\ReturnTypeWillChange]
    public function offsetGet($offset)
    {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }

    /**
     * Sets value based on offset.
     *
     * @param integer $offset Offset
     * @param mixed   $value  Value to be set
     *
     * @return void
     */
    #[\ReturnTypeWillChange]
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     *
     * @param integer $offset Offset
     *
     * @return void
     */
    #[\ReturnTypeWillChange]
    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }

    /**
     * Gets the string presentation of the object
     *
     * @return string
     */
    public function __toString()
    {
        if (defined('JSON_PRETTY_PRINT')) { // use JSON pretty print
            return json_encode(
                ObjectSerializer::sanitizeForSerialization($this),
                JSON_PRETTY_PRINT
            );
        }

        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }
}

