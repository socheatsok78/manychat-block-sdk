<?php

namespace ManyChat\Dynamic\Foundation;

use ManyChat\Dynamic\Concerns\HasResponse;
use ManyChat\Dynamic\Concerns\HasButton;
use ManyChat\Dynamic\Concerns\HasAction;
use ManyChat\Dynamic\Support\Jsonable;
use ManyChat\Dynamic\Support\WebDriver;
use ManyChat\Dynamic\Support\BlockInterface;
use JsonSerializable;

abstract class Block implements BlockInterface, Jsonable, WebDriver, JsonSerializable
{
    use HasResponse,
        HasButton,
        HasAction;

    /**
     * The Block type
     *
     * @var string
     */
    protected $type;

    /**
     * The Block payload
     *
     * @var mixed
     */
    protected $payload;

    /**
     * The ManyChat actions
     *
     * @var array
     */
    protected $actions = [];

    /**
     * Block constructor
     * @param mixed $payload
     */
    public function __construct($payload = null)
    {
        $this->payload = $payload;
    }

    /**
     * Get the Block type
     *
     * @return string
     */
    public function type()
    {
        return $this->type;
    }

    /**
     * Get the Block payload
     *
     * @return boolean|array
     */
    public function getPayload()
    {
        if ($this->hasButtonAttribute() && !empty($this->buttons())) {
            $this->payload['buttons'] = $this->buttons();
        }

        if ($this->hasActionAttribute() && !empty($this->getActions())) {
            $this->payload['actions'] = $this->getActions();
        }

        return $this->payload;
    }

    /**
     * Get the Block response format
     *
     * @return array
     */
    abstract public function toResponseFormat();

    /**
     * Check if a Block can have buttons element
     *
     * @return boolean
     */
    abstract public function hasButtonAttribute();

    /**
     * Check if a Block can have actions element
     *
     * @return boolean
     */
    abstract public function hasActionAttribute();

    /**
     * Get the instance as a web accessible array.
     * This will be used within the WebDriver.
     *
     * @return array
     */
    public function toWebDriver()
    {
        $data = array_merge(['type' => $this->type()], $this->toResponseFormat());

        if ($this->getPayload()) {
            $data = array_merge($data, $this->getPayload());
        }

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
