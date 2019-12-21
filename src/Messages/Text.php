<?php

namespace ManyChat\Dynamic\Messages;

use ManyChat\Dynamic\Messages\Message;

class Text extends Message
{
    /**
     * The Message type
     *
     * @var string
     */
    protected $type = "text";

    /**
     * The Message text
     *
     * @var string
     */
    protected $text;

    /**
     * Attachment constructor
     * @param string $text
     * @param mixed $payload
     */
    public function __construct($text, $payload = null)
    {
        parent::__construct($payload);

        $this->text = $text;
    }


    /**
     * Create a new Text instance
     *
     * @param string $text
     * @return self
     */
    public static function text(string $text)
    {
        return new self($text);
    }

    /**
     * Get the Message text
     *
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Get the Block response format
     *
     * @return array
     */
    public function toResponseFormat()
    {
        return [
            'text' => $this->getText()
        ];
    }
}
