<?php

namespace ManyChat\Dynamic\Attachments;

use ManyChat\Dynamic\Foundation\Block;

abstract class Attachment extends Block
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
