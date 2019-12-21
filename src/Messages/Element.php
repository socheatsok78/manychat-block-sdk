<?php

namespace ManyChat\Dynamic\Messages;

use ManyChat\Dynamic\Foundation\Element as BaseElement;

class Element extends BaseElement
{
    /**
     * Create a new Element block
     *
     * @param array $data
     */
    public function __construct($data = null)
    {
        if ($data) {
            $this->title = $data['title'];
            $this->subTitle = $data['subTitle'];
            $this->imageUrl = $data['imageUrl'];
            $this->actionUrl = $data['actionUrl'];
        }
    }
}
