<?php

namespace ManyChat\Dynamic\Attachments;

use ManyChat\Dynamic\Attachments\Attachment;

class File extends Attachment
{
    /**
     * The Attachment type
     *
     * @var string
     */
    protected $type = "file";

    /**
     * The File url
     *
     * @var string
     */
    protected $url;

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
     * Create a new File instance
     *
     * @param string $url
     * @return File
     */
    public static function url(string $url)
    {
        return new self($url);
    }

    /**
     * Get the File url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Get the Block response format
     *
     * @return array
     */
    public function toResponseFormat()
    {
        return [
            'url' => $this->getUrl()
        ];
    }
}
