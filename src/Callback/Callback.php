<?php

namespace ManyChat\Dynamic\Callback;

use ManyChat\Dynamic\Foundation\Block;

abstract class Callback extends Block
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

    /**
     * Get the instance as a web accessible array.
     * This will be used within the WebDriver.
     *
     * @return array
     */
    public function toWebDriver()
    {
        return parent::toWebDriver();
    }
}
