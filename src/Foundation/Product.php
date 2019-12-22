<?php

namespace ManyChat\Dynamic\Foundation;

use ManyChat\Dynamic\Support\Jsonable;
use ManyChat\Dynamic\Support\WebDriver;
use JsonSerializable;

class Product implements Jsonable, WebDriver, JsonSerializable
{
    /**
     * The Product name
     *
     * @var string
     */
    public $name;

    /**
     * The Product price
     *
     * @var int
     */
    public $price;

    /**
     * Get the instance as a web accessible array.
     * This will be used within the WebDriver.
     *
     * @return array
     */
    public function toWebDriver()
    {
        $data = [
            'label' => $this->name,
            'cost' => $this->price
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
