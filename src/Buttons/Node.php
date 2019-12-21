<?php

namespace ManyChat\Dynamic\Buttons;

use ManyChat\Dynamic\Buttons\Button;

class Node extends Button
{
    /**
     * The Button type
     *
     * @var string
     */
    protected $type = 'node';

    /**
     * The Node caption
     *
     * @var string
     */
    protected $caption;

    /**
     * The Node target
     *
     * @var string
     */
    protected $target;

    /**
     * Create a new Node instance
     * @param string $target
     * @param string $caption
     * @param mixed $payload
     */
    public function __construct($target, $caption = "Show", $payload = null)
    {
        parent::__construct($payload);

        $this->target = $target;
        $this->caption = $caption;
    }

    /**
     * Create a new Node instance
     *
     * @param string $target
     * @return Button
     */
    public static function target(string $target)
    {
        return new self($target);
    }

    /**
     * Get the Node phone number
     *
     * @return string
     */
    public function getTarget()
    {
        return $this->target;
    }

    /**
     * Get the Node caption
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
