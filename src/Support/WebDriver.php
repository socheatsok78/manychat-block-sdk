<?php

namespace ManyChat\Dynamic\Support;

interface WebDriver
{
    /**
     * Get the instance as a web accessible array.
     * This will be used within the WebDriver.
     *
     * @return array
     */
    public function toWebDriver();
}
