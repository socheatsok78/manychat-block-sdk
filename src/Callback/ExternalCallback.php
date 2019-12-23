<?php

namespace ManyChat\Dynamic\Callback;

use ManyChat\Dynamic\Callback\Callback;

class ExternalCallback extends Callback
{
    /**
     * The Button type
     *
     * @var string
     */
    protected $type;

    /**
     * The External Callback caption
     *
     * @var string
     */
    protected $caption;

    /**
     * The External Callback url address
     *
     * @var string
     */
    protected $url;

    /**
     * The External Callback HTTP request method
     *
     * @var string
     */
    protected $method = 'post';

    /**
     * The External Callback HTTP request headers
     *
     * @var array
     */
    protected $headers;

    /**
     * The External Callback HTTP request payload
     *
     * @var array
     */
    protected $payload;

    /**
     * The External Callback HTTP request timeout
     *
     * @var int
     */
    protected $timeout = 600;

    /**
     * Create a new External Callback instance
     * @param string $url
     * @param string $caption
     * @param mixed $payload
     */
    public function __construct($url, $payload = null)
    {
        parent::__construct($payload);

        $this->url = $url;
    }

    /**
     * Create a new External Callback instance
     *
     * @param string $url
     * @return self
     */
    public static function create(string $url)
    {
        return new self($url);
    }

    /**
     * Get the External Callback address
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * The External Callback HTTP request method
     *
     * @return string
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * The External Callback HTTP request headers
     *
     * @return string
     */
    public function getHeaders()
    {
        return $this->headers;
    }

    /**
     * The External Callback HTTP request payload
     *
     * @return string
     */
    public function getPayload()
    {
        return $this->payload;
    }

    /**
     * The External Callback HTTP request timeout
     *
     * @return string
     */
    public function getTimeout()
    {
        return $this->timeout;
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
            'method' => $this->getMethod(),
            'headers' => $this->getHeaders(),
            'payload' => $this->getPayload(),
            'timeout' => $this->getTimeout()
        ];
    }

    /**
     * Get the instance as a web accessible array.
     * This will be used within the WebDriver.
     *
     * @return array
     */
    public function toWebDriver()
    {
        $data = parent::toWebDriver();

        // Remove type attribute from data
        unset($data['type']);

        return $data;
    }
}
