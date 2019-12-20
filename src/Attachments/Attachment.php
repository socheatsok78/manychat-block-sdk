<?php

namespace ManyChat\Dynamic\Attachments;

abstract class Attachment
{
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
    protected function type()
    {
        return $this->type;
    }

    /**
     * Get the Attachment payload
     *
     * @return array
     */
    protected function payload()
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
     * Get the instance as a web accessible array.
     * This will be used within the WebDriver.
     *
     * @return array
     */
    public function toWebDriver()
    {
        $data = array_merge(['type' => $this->type()], $this->elements());

        if ($this->payload) {
            $data = array_merge($data, $this->payload());
        }

        return $data;
    }
}
