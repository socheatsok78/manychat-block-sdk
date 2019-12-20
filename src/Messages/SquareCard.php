<?php

namespace ManyChat\Dynamic\Messages;

use ManyChat\Dynamic\Foundation\CardBlock;

class SquareCard extends CardBlock
{
    /**
     * The List style
     *
     * @var string
     */
    protected $style = 'square';

    /**
     * Create a new List instance
     *
     * @param array $items
     * @return self
     */
    public static function create(array $items)
    {
        return new self($items);
    }
}
