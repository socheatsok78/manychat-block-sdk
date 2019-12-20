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
     * The file url
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
     * @return void
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Get the Attachement elements
     *
     * @return array
     */
    protected function elements()
    {
        return [
            'url' => $this->getUrl()
        ];
    }
}
