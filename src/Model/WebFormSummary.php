<?php
/**
 * WebFormSummary
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
 * WebFormSummary Class Doc Comment
 *
 * @category    Class
 * @description An object that summarizes an instance of a form that can be used to display a listing
 * @package     DocuSign\WebForms
 * @author      Swagger Codegen team <apihelp@docusign.com>
 * @license     The DocuSign PHP Client SDK is licensed under the MIT License.
 * @link        https://github.com/swagger-api/swagger-codegen
 */
class WebFormSummary implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'WebFormSummary';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'id' => '?string',
        'account_id' => '?string',
        'is_published' => '?bool',
        'is_enabled' => '?bool',
        'has_draft_changes' => '?bool',
        'form_state' => '\DocuSign\WebForms\Model\WebFormState',
        'form_properties' => '\DocuSign\WebForms\Model\WebFormProperties',
        'form_metadata' => '\DocuSign\WebForms\Model\WebFormMetadata'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'id' => null,
        'account_id' => null,
        'is_published' => null,
        'is_enabled' => null,
        'has_draft_changes' => null,
        'form_state' => null,
        'form_properties' => null,
        'form_metadata' => null
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
        'id' => 'id',
        'account_id' => 'accountId',
        'is_published' => 'isPublished',
        'is_enabled' => 'isEnabled',
        'has_draft_changes' => 'hasDraftChanges',
        'form_state' => 'formState',
        'form_properties' => 'formProperties',
        'form_metadata' => 'formMetadata'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'id' => 'setId',
        'account_id' => 'setAccountId',
        'is_published' => 'setIsPublished',
        'is_enabled' => 'setIsEnabled',
        'has_draft_changes' => 'setHasDraftChanges',
        'form_state' => 'setFormState',
        'form_properties' => 'setFormProperties',
        'form_metadata' => 'setFormMetadata'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'id' => 'getId',
        'account_id' => 'getAccountId',
        'is_published' => 'getIsPublished',
        'is_enabled' => 'getIsEnabled',
        'has_draft_changes' => 'getHasDraftChanges',
        'form_state' => 'getFormState',
        'form_properties' => 'getFormProperties',
        'form_metadata' => 'getFormMetadata'
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
        $this->container['id'] = isset($data['id']) ? $data['id'] : null;
        $this->container['account_id'] = isset($data['account_id']) ? $data['account_id'] : null;
        $this->container['is_published'] = isset($data['is_published']) ? $data['is_published'] : null;
        $this->container['is_enabled'] = isset($data['is_enabled']) ? $data['is_enabled'] : null;
        $this->container['has_draft_changes'] = isset($data['has_draft_changes']) ? $data['has_draft_changes'] : null;
        $this->container['form_state'] = isset($data['form_state']) ? $data['form_state'] : null;
        $this->container['form_properties'] = isset($data['form_properties']) ? $data['form_properties'] : null;
        $this->container['form_metadata'] = isset($data['form_metadata']) ? $data['form_metadata'] : null;
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
     * Gets id
     *
     * @return ?string
     */
    public function getId()
    {
        return $this->container['id'];
    }

    /**
     * Sets id
     *
     * @param ?string $id id
     *
     * @return $this
     */
    public function setId($id)
    {
        $this->container['id'] = $id;

        return $this;
    }

    /**
     * Gets account_id
     *
     * @return ?string
     */
    public function getAccountId()
    {
        return $this->container['account_id'];
    }

    /**
     * Sets account_id
     *
     * @param ?string $account_id account_id
     *
     * @return $this
     */
    public function setAccountId($account_id)
    {
        $this->container['account_id'] = $account_id;

        return $this;
    }

    /**
     * Gets is_published
     *
     * @return ?bool
     */
    public function getIsPublished()
    {
        return $this->container['is_published'];
    }

    /**
     * Sets is_published
     *
     * @param ?bool $is_published Has the form been published
     *
     * @return $this
     */
    public function setIsPublished($is_published)
    {
        $this->container['is_published'] = $is_published;

        return $this;
    }

    /**
     * Gets is_enabled
     *
     * @return ?bool
     */
    public function getIsEnabled()
    {
        return $this->container['is_enabled'];
    }

    /**
     * Sets is_enabled
     *
     * @param ?bool $is_enabled Is the form currently enabled and available for data collection
     *
     * @return $this
     */
    public function setIsEnabled($is_enabled)
    {
        $this->container['is_enabled'] = $is_enabled;

        return $this;
    }

    /**
     * Gets has_draft_changes
     *
     * @return ?bool
     */
    public function getHasDraftChanges()
    {
        return $this->container['has_draft_changes'];
    }

    /**
     * Sets has_draft_changes
     *
     * @param ?bool $has_draft_changes Does the form have draft changes that need to be published?
     *
     * @return $this
     */
    public function setHasDraftChanges($has_draft_changes)
    {
        $this->container['has_draft_changes'] = $has_draft_changes;

        return $this;
    }

    /**
     * Gets form_state
     *
     * @return \DocuSign\WebForms\Model\WebFormState
     */
    public function getFormState()
    {
        return $this->container['form_state'];
    }

    /**
     * Sets form_state
     *
     * @param \DocuSign\WebForms\Model\WebFormState $form_state form_state
     *
     * @return $this
     */
    public function setFormState($form_state)
    {
        $this->container['form_state'] = $form_state;

        return $this;
    }

    /**
     * Gets form_properties
     *
     * @return \DocuSign\WebForms\Model\WebFormProperties
     */
    public function getFormProperties()
    {
        return $this->container['form_properties'];
    }

    /**
     * Sets form_properties
     *
     * @param \DocuSign\WebForms\Model\WebFormProperties $form_properties form_properties
     *
     * @return $this
     */
    public function setFormProperties($form_properties)
    {
        $this->container['form_properties'] = $form_properties;

        return $this;
    }

    /**
     * Gets form_metadata
     *
     * @return \DocuSign\WebForms\Model\WebFormMetadata
     */
    public function getFormMetadata()
    {
        return $this->container['form_metadata'];
    }

    /**
     * Sets form_metadata
     *
     * @param \DocuSign\WebForms\Model\WebFormMetadata $form_metadata form_metadata
     *
     * @return $this
     */
    public function setFormMetadata($form_metadata)
    {
        $this->container['form_metadata'] = $form_metadata;

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

