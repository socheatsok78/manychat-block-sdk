<?php

namespace ManyChat\Dynamic\Support;

interface BlockInterface
{
    /**
     * Get the Block type
     *
     * @return string
     */
    public function type();

    /**
     * Get the Block payload
     *
     * @return boolean|array
     */
    public function payload();

    /**
     * Check if a Block can have buttons element
     *
     * @return boolean
     */
    public function hasButtonAttribute();

    /**
     * Check if a Block can have actions element
     *
     * @return boolean
     */
    public function hasActionAttribute();
}
