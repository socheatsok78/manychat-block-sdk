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
            $this->subTitle = $data['subtitle'];
            $this->imageUrl = $data['image_url'];
            $this->actionUrl = $data['action_url'];
        }
    }
}
