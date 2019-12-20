<?php

namespace ManyChat\Dynamic\Foundation;

use ManyChat\Dynamic\Concerns\HasChatResponse;
use ManyChat\Dynamic\Support\WebDriver;
use ManyChat\Dynamic\Support\BlockInterface;

abstract class Block implements BlockInterface, WebDriver
{
    use HasChatResponse;

    /**
     * The attachment type
     *
     * @var string
     */
    protected $type;

    /**
     * The attachment payload
     *
     * @var mixed
     */
    protected $payload;

    /**
     * Attachment constructor
     * @param mixed $payload
     */
    public function __construct($payload = null)
    {
        $this->payload = $payload;
    }

    /**
     * Get the Attachment type
     *
     * @return string
     */
    public function type()
    {
        return $this->type;
    }

    /**
     * Get the Attachment payload
     *
     * @return boolean|array
     */
    public function payload()
    {
        return $this->payload;
    }

    /**
     * Get the Attachement elements
     *
     * @return array
     */
    abstract protected function elements();

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
        $data = array_merge(['type' => $this->type()], $this->elements());

        if ($this->payload()) {
            $data = array_merge($data, $this->payload());
        }

        return $data;
    }
}
