<?php

namespace ManyChat\Dynamic\Foundation;

use ManyChat\Dynamic\Support\Jsonable;
use ManyChat\Dynamic\Support\WebDriver;
use ManyChat\Dynamic\Support\BlockInterface;
use ManyChat\Dynamic\Concerns\HasButton;
use JsonSerializable;

class Element implements BlockInterface, Jsonable, WebDriver, JsonSerializable
{
    use HasButton;

    /**
     * The Element title
     *
     * @var string
     */
    public $title;

    /**
     * The Element sub-title
     *
     * @var string
     */
    public $subTitle;

    /**
     * The Element image url
     *
     * @var string
     */
    public $imageUrl;

    /**
     * The Element action url
     *
     * @var string
     */
    public $actionUrl;

    /**
     * The Block payload
     *
     * @var mixed
     */
    protected $payload;

    /**
     * Check if a Block can have buttons element
     *
     * @return boolean
     */
    public function hasButtonAttribute()
    {
        return true;
    }

    /**
     * Check if a Block can have actions element
     *
     * @return boolean
     */
    public function hasActionAttribute()
    {
        return false;
    }

    /**
     * Get the Block type
     *
     * @return string
     */
    public function type()
    {
        return;
    }

    /**
     * Get the Block response format
     *
     * @return array
     */
    public function toResponseFormat()
    {
        return;
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

        return $this->payload;
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
            'title' => $this->title,
            'subtitle' => $this->subTitle,
            'image_url' => $this->imageUrl,
            'action_url' => $this->actionUrl
        ];

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
