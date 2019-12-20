<?php

namespace ManyChat\Dynamic\Messages;

use ManyChat\Dynamic\Foundation\ListBlock;

class LargeList extends ListBlock
{
    /**
     * The List style
     *
     * @var string
     */
    protected $style = 'large';

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
