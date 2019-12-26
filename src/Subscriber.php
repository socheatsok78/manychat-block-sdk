<?php

namespace ManyChat\Dynamic;

use ManyChat\Dynamic\Foundation\Subscriber as BaseSubscriber;

class Subscriber extends BaseSubscriber
{
    /**
     * Create a new Subscriber instance
     *
     * @param mixed $subscriber
     */
    public function __construct($subscriber)
    {
        parent::__construct($subscriber);
    }
}
