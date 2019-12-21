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

    /**
     * Set the Element title
     *
     * @param string $title
     * @return self
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Set the Element sub-title
     *
     * @param string $subTitle
     * @return self
     */
    public function setSubTitle($subTitle)
    {
        $this->subTitle = $subTitle;

        return $this;
    }

    /**
     * Set the Element image
     *
     * @param string $url
     * @return self
     */
    public function setImage($url)
    {
        $this->imageUrl = $url;

        return $this;
    }

    /**
     * Set the Element action
     *
     * @param string $action
     * @return self
     */
    public function setAction($action)
    {
        $this->actionUrl = $action;

        return $this;
    }
}
