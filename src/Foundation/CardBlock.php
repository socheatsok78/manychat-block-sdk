<?php

namespace ManyChat\Dynamic\Foundation;

abstract class CardBlock extends Block
{
    /**
     * The Block type
     *
     * @var string
     */
    protected $type = 'cards';

    /**
     * The List style
     *
     * @var string
     */
    protected $style;

    /**
     * The List elements
     *
     * @var array
     */
    protected $items = [];

    /**
     * Block constructor
     * @param mixed $payload
     */
    public function __construct($items, $payload = null)
    {
        parent::__construct($payload);

        $this->items = $items;
    }

    /**
     * Create a new List instance
     *
     * @param array $items
     * @return self
     */
    abstract public static function create(array $items);

    /**
     * Get the List style
     *
     * @return string
     */
    public function style()
    {
        return $this->style;
    }

    /**
     * Get the List elements
     *
     * @return array
     */
    public function items()
    {
        return $this->items;
    }

    /**
     * Get the Message elements
     *
     * @return array
     */
    protected function elements()
    {
        return [
            'image_aspect_ratio' => $this->style(),
            'elements' => $this->items(),
        ];
    }

    /**
     * Check if a Block can have buttons element
     *
     * @return boolean
     */
    public function hasButtonAttribute()
    {
        return true;
    }

    /**
     * Check if a Block can have actions element
     *
     * @return boolean
     */
    public function hasActionAttribute()
    {
        return false;
    }
}
