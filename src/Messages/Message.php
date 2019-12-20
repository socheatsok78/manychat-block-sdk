<?php

namespace ManyChat\Dynamic\Messages;

use ManyChat\Dynamic\Foundation\Block;

abstract class Message extends Block
{
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
