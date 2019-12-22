<?php

namespace ManyChat\Dynamic\Buttons;

use ManyChat\Dynamic\Buttons\Button;

class Url extends Button
{
    /**
     * The Button type
     *
     * @var string
     */
    protected $type = 'url';

    /**
     * The URL caption
     *
     * @var string
     */
    protected $caption;

    /**
     * The URL address
     *
     * @var string
     */
    protected $url;

    /**
     * The URL preview size
     *
     * @var string
     */
    protected $size;

    /**
     * Create a new URL instance
     * @param string $url
     * @param string $caption
     * @param mixed $payload
     */
    public function __construct($url, $caption = "External link", $size = "full", $payload = null)
    {
        parent::__construct($payload);

        $this->url = $url;
        $this->caption = $caption;
        $this->size = $size;
    }

    /**
     * Create a new URL instance
     *
     * @param string $url
     * @return self
     */
    public static function create(string $url)
    {
        return new self($url);
    }

    /**
     * Set Url webview style to full
     *
     * @return self
     */
    public function full()
    {
        $this->size = 'full';

        return $this;
    }

    /**
     * Set Url webview style to medium
     *
     * @return self
     */
    public function medium()
    {
        $this->size = 'medium';

        return $this;
    }

    /**
     * Set Url webview style to compact
     *
     * @return self
     */
    public function compact()
    {
        $this->size = 'compact';

        return $this;
    }

    /**
     * Get the URL address
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Get the URL caption
     *
     * @return string
     */
    public function getCaption()
    {
        return $this->caption;
    }

    /**
     * Get the URL size
     *
     * @return string
     */
    public function getSize()
    {
        return $this->size;
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
            'webview_size' => $this->getSize()
        ];
    }
}
