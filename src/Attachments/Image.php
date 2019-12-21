<?php

namespace ManyChat\Dynamic\Attachments;

use ManyChat\Dynamic\Attachments\Attachment;

class Image extends Attachment
{
    /**
     * The Attachment type
     *
     * @var string
     */
    protected $type = "image";

    /**
     * The Image url
     *
     * @var string
     */
    protected $url;

    /**
     * The Image title
     *
     * @var string
     */
    protected $title;

    /**
     * Attachment constructor
     * @param string $url
     * @param mixed $payload
     */
    public function __construct($url, $payload = null)
    {
        parent::__construct($payload);

        $this->url = $url;
    }

    /**
     * Create a new Image instance
     *
     * @param string $url
     * @return File
     */
    public static function url(string $url)
    {
        return new self($url);
    }

    /**
     * Get the Image url
     *
     * @return void
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Get the Image title
     *
     * @return void
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the Image title
     *
     * @param string $value
     * @return void
     */
    public function setTitle($value)
    {
        $this->title = $value;
    }

    /**
     * Get the Block response format
     *
     * @return array
     */
    protected function toResponseFormat()
    {
        return [
            'url' => $this->getUrl(),
            'title' => $this->getTitle()
        ];
    }
}
