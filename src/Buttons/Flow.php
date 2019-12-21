<?php

namespace ManyChat\Dynamic\Buttons;

use ManyChat\Dynamic\Buttons\Button;

class Flow extends Button
{
    /**
     * The Button type
     *
     * @var string
     */
    protected $type = 'flow';

    /**
     * The Flow caption
     *
     * @var string
     */
    protected $caption;

    /**
     * The Flow target
     *
     * @var string
     */
    protected $target;

    /**
     * Create a new Flow instance
     * @param string $target
     * @param string $caption
     * @param mixed $payload
     */
    public function __construct($target, $caption = "Go", $payload = null)
    {
        parent::__construct($payload);

        $this->target = $target;
        $this->caption = $caption;
    }

    /**
     * Create a new Flow instance
     *
     * @param string $target
     * @return self
     */
    public static function create(string $target)
    {
        return new self($target);
    }

    /**
     * Get the Flow phone number
     *
     * @return string
     */
    public function getTarget()
    {
        return $this->target;
    }

    /**
     * Get the Flow caption
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
            'target' => $this->getTarget(),
            'caption' => $this->getCaption()
        ];
    }
}
