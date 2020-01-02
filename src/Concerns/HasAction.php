<?php

namespace ManyChat\Dynamic\Concerns;

trait HasAction
{
    /**
     * Get the actions response
     *
     * @return array
     */
    public function getActions()
    {
        return $this->actions;
    }

    /**
     * Add an action to action response
     *
     * @param array $action
     * @return Chat
     */
    protected function addAction($action)
    {
        array_push($this->actions, $action);

        return $this;
    }

    /**
     * Add a tag to subscriber
     *
     * @param string $tag
     * @return void
     */
    public function addTag($tag)
    {
        return $this->addAction([
            'action' => 'add_tag',
            'tag_name' => $tag
        ]);
    }

    /**
     * Remove a tag from subscriber
     *
     * @param string $tag
     * @return void
     */
    public function removeTag($tag)
    {
        return $this->addAction([
            'action' => 'remove_tag',
            'tag_name' => $tag
        ]);
    }

    /**
     * Add a custom field to subscriber
     *
     * @param string $key
     * @param string $value
     * @return void
     */
    public function addField($key, $value)
    {
        return $this->addAction([
            'action' => 'set_field_value',
            'field_name' => $key,
            'value' => $value
        ]);
    }

    /**
     * Remove a custom field from subscriber
     *
     * @param string $key
     * @return void
     */
    public function removeField($key)
    {
        return $this->addAction([
            'action' => 'unset_field_value',
            'field_name' => $key
        ]);
    }

    /**
     * Add tags to subscriber
     *
     * @param array $tags
     * @return void
     */
    public function addTags($tags)
    {
        foreach ($tags as $tag) {
            $this->addTag($tag);
        }

        return $this;
    }

    /**
     * Remove tags from subscriber
     *
     * @param array $tags
     * @return void
     */
    public function removeTags($tags)
    {
        foreach ($tags as $tag) {
            $this->removeTag($tag);
        }

        return $this;
    }

    /**
     * Add custom fields to subscriber
     *
     * @param array $fields
     * @return void
     */
    public function addFields($fields)
    {
        foreach ($fields as $key => $value) {
            $this->addField($key, $value);
        }

        return $this;
    }

    /**
     * Remove custom fields from subscriber
     *
     * @param array $fields
     * @return void
     */
    public function removeFields($fields)
    {
        foreach ($fields as $key => $value) {
            $this->removeField($key, $value);
        }

        return $this;
    }
}
