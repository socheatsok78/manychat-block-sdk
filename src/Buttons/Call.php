<?php

namespace ManyChat\Dynamic\Buttons;

use ManyChat\Dynamic\Buttons\Button;

class Call extends Button
{
    /**
     * The Button type
     *
     * @var string
     */
    protected $type = 'call';

    /**
     * The Call caption
     *
     * @var string
     */
    protected $caption;

    /**
     * The Call phone number
     *
     * @var string
     */
    protected $phoneNumber;

    /**
     * Create a new Call instance
     * @param string $phoneNumber
     * @param string $caption
     * @param mixed $payload
     */
    public function __construct($phoneNumber, $caption = "Make a call", $payload = null)
    {
        parent::__construct($payload);

        $this->phoneNumber = $phoneNumber;
        $this->caption = $caption;
    }

    /**
     * Create a new Call instance
     *
     * @param string $phoneNumber
     * @return self
     */
    public static function phone(string $phoneNumber)
    {
        return new self($phoneNumber);
    }

    /**
     * Get the Call phone number
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->phoneNumber;
    }

    /**
     * Get the Call caption
     *
     * @return string
     */
    public function getCaption()
    {
        return $this->caption;
    }

    /**
     * Get the Block response format
     *
     * @return array
     */
    protected function toResponseFormat()
    {
        return [
            'phone' => $this->getPhone(),
            'caption' => $this->getCaption()
        ];
    }
}
