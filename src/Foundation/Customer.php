<?php

namespace ManyChat\Dynamic\Foundation;

use ManyChat\Dynamic\Support\Jsonable;
use ManyChat\Dynamic\Support\WebDriver;
use JsonSerializable;

class Customer implements Jsonable, WebDriver, JsonSerializable
{
    /**
     * The Customer contact name status
     *
     * @var boolean
     */
    protected $name;

    /**
     * The Customer contact phone status
     *
     * @var boolean
     */
    protected $phoneNumber;

    /**
     * The Customer shipping address status
     *
     * @var boolean
     */
    protected $shippingAddress;

    /**
     * Require Customer shipping address
     *
     * @return self
     */
    public function withShippingAddress()
    {
        $this->shippingAddress = true;

        return $this;
    }

    /**
     * Require Customer contact name
     *
     * @return self
     */
    public function withContactName()
    {
        $this->name = true;

        return $this;
    }

    /**
     * Require Customer contact phone
     *
     * @return self
     */
    public function withContactPhone()
    {
        $this->phoneNumber = true;

        return $this;
    }

    /**
     * Require Customer shipping address
     *
     * @return self
     */
    public function withoutShippingAddress()
    {
        $this->shippingAddress = false;

        return $this;
    }

    /**
     * Require Customer contact name
     *
     * @return self
     */
    public function withoutContactName()
    {
        $this->name = false;

        return $this;
    }

    /**
     * Require Customer contact phone
     *
     * @return self
     */
    public function withoutContactPhone()
    {
        $this->phoneNumber = false;

        return $this;
    }

    /**
     * Get the instance as a web accessible array.
     * This will be used within the WebDriver.
     *
     * @return array
     */
    public function toWebDriver()
    {
        $data = [
            'shipping_address' => $this->shippingAddress,
            'contact_name' => $this->name,
            'contact_phone' => $this->phoneNumber
        ];

        return $data;
    }

    /**
     * Convert the model instance to JSON.
     *
     * @param  int  $options
     * @return string
     */
    public function toJson($options = 0)
    {
        $json = json_encode($this->jsonSerialize(), $options);

        return $json;
    }

    /**
     * Convert the object into something JSON serializable.
     *
     * @return array
     */
    public function jsonSerialize()
    {
        return $this->toArray();
    }

    /**
     * Convert the model instance to an array.
     *
     * @return array
     */
    public function toArray()
    {
        return $this->toWebDriver();
    }

    /**
     * Convert the model to its string representation.
     *
     * @return string
     */
    public function __toString()
    {
        return $this->toJson();
    }
}
