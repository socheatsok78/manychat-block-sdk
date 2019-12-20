<?php

namespace ManyChat\Dynamic\Buttons;

use ManyChat\Dynamic\Foundation\Block;

abstract class Button extends Block
{
    /**
     * Check if a Block can have buttons element
     *
     * @return boolean
     */
    public function hasButtonAttribute()
    {
        return false;
    }

    /**
     * Check if a Block can have actions element
     *
     * @return boolean
     */
    public function hasActionAttribute()
    {
        return true;
    }
}
