<?php

namespace ManyChat\Dynamic\Callback;

use ManyChat\Dynamic\Callback\Callback;

class DynamicBlock extends Callback
{
    /**
     * The Button type
     *
     * @var string
     */
    protected $type = 'dynamic_block_callback';

    /**
     * The Dynamic Block caption
     *
     * @var string
     */
    protected $caption;

    /**
     * The Dynamic Block url address
     *
     * @var string
     */
    protected $url;

    /**
     * The Dynamic Block HTTP request method
     *
     * @var string
     */
    protected $method = 'post';

    /**
     * The Dynamic Block HTTP request headers
     *
     * @var array
     */
    protected $headers;

    /**
     * The Dynamic Block HTTP request payload
     *
     * @var array
     */
    protected $payload;

    /**
     * Create a new Dynamic Block instance
     * @param string $url
     * @param string $caption
     * @param mixed $payload
     */
    public function __construct($url, $caption = "Dynamic content", $payload = null)
    {
        parent::__construct($payload);

        $this->url = $url;
        $this->caption = $caption;
    }

    /**
     * Create a new Dynamic Block instance
     *
     * @param string $url
     * @return self
     */
    public static function create(string $url)
    {
        return new self($url);
    }

    /**
     * Get the Dynamic Block address
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Get the Dynamic Block caption
     *
     * @return string
     */
    public function getCaption()
    {
        return $this->caption;
    }

    /**
     * The Dynamic Block HTTP request method
     *
     * @return string
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * The Dynamic Block HTTP request headers
     *
     * @return string
     */
    public function getHeaders()
    {
        return $this->headers;
    }

    /**
     * The Dynamic Block HTTP request payload
     *
     * @return string
     */
    public function getPayload()
    {
        return $this->payload;
    }

    /**
     * Set Dynamic Block caption
     *
     * @param string $caption
     * @return self
     */
    public function setCaption($caption)
    {
        $this->caption = $caption;

        return $this;
    }

    /**
     * Get the Block response format
     *
     * @return array
     */
    public function toResponseFormat()
    {
        return [
            'url' => $this->getUrl(),
            'caption' => $this->getCaption(),
            'method' => $this->getMethod(),
            'headers' => $this->getHeaders(),
            'payload' => $this->getPayload()
        ];
    }
}
