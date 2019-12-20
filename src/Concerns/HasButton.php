<?php

namespace ManyChat\Dynamic\Concerns;

trait HasButton
{
    /**
     * The ManyChat buttons
     *
     * @var array
     */
    public $buttons = [];

    /**
     * Get the buttons response
     *
     * @return array
     */
    public function buttons()
    {
        return $this->buttons;
    }

    /**
     * Attach Button to a block
     *
     * @param mixed $button
     * @return self
     */
    public function withButton($button)
    {
        array_push($this->buttons, $button);

        return $this;
    }

    /**
     * Attach list of Buttons to a block
     *
     * @param array $buttons
     * @return self
     */
    public function withButtons($buttons)
    {
        foreach ($buttons as $button) {
            $this->withButton($button);
        }
    }
}
