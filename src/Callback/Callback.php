<?php

namespace ManyChat\Dynamic\Callback;

use ManyChat\Dynamic\Foundation\Block;

abstract class Callback extends Block
{
    /**
     * Set Dynamic Block HTTP request header
     *
     * @param string $key
     * @param string $value
     * @return self
     */
    public function setHeader($key, $value)
    {
        $this->headers[$key] = $value;

        return $this;
    }

    /**
     * Set Dynamic Block HTTP request headers
     *
     * @param array $headers
     * @return void
     */
    public function setHeaders($headers)
    {
        if (!is_array($this->headers)) {
            $this->headers = [];
        }

        array_merge($this->headers, $headers);

        return $this;
    }

    /**
     * Set Dynamic Block HTTP request payload
     *
     * @param string $key
     * @param string $value
     * @return self
     */
    public function setPayload($key, $value)
    {
        $this->payload[$key] = $value;

        return $this;
    }

    /**
     * Set Dynamic Block HTTP request payloads
     *
     * @param array $payload
     * @return void
     */
    public function setPayloads($payload)
    {
        if (!is_array($this->payload)) {
            $this->payload = [];
        }

        array_merge($this->payload, $payload);

        return $this;
    }

    /**
     * Check if a Block can have buttons element
     *
     * @return boolean
     */
    public function hasButtonAttribute()
    {
        return false;
    }

    /**
     * Check if a Block can have actions element
     *
     * @return boolean
     */
    public function hasActionAttribute()
    {
        return true;
    }

    /**
     * Get the instance as a web accessible array.
     * This will be used within the WebDriver.
     *
     * @return array
     */
    public function toWebDriver()
    {
        return parent::toWebDriver();
    }
}
