<?php

namespace ManyChat\Dynamic;

use ManyChat\Dynamic\Support\Jsonable;
use JsonSerializable;

class Chat implements Jsonable, JsonSerializable
{
    use Concerns\HasChatResponse;

    /**
     * The ManyChat response version.
     *
     * @var string
     */
    const VERSION = 'v2';

    /**
     * The ManyChat messages
     *
     * @var array
     */
    protected $messages = [];

    /**
     * The ManyChat actions
     *
     * @var array
     */
    protected $actions = [];

    /**
     * The ManyChat quick replies
     *
     * @var array
     */
    protected $quickReplies = [];

    /**
     * Get the chat response array
     *
     * @return array
     */
    public function get()
    {
        return $this->toArray();
    }

    /**
     * Create a reply to the message
     *
     * @param mixed $reply
     * @return Chat
     */
    public function reply($reply)
    {
        array_push($this->messages, $reply);

        return $this;
    }

    /**
     * Get the messages response
     *
     * @return array
     */
    protected function getMessagesResponse()
    {
        return $this->evaluateChatResponse($this->messages);
    }

    /**
     * Get the actions response
     *
     * @return array
     */
    protected function getActionsResponse()
    {
        return $this->evaluateChatResponse($this->actions);
    }

    /**
     * Get the quick replies response
     *
     * @return array
     */
    protected function getQuickRepliesResponse()
    {
        return $this->evaluateChatResponse($this->quickReplies);
    }

    /**
     * Get the chat response object
     *
     * @return array
     */
    public function toWebDriver()
    {
        $version = $this->version();

        $content = [
            "messages" => $this->getMessagesResponse(),
            "actions" => $this->getActionsResponse(),
            "quick_replies" => $this->getQuickRepliesResponse()
        ];

        return [
            "version" => $version,
            "content" => $content
        ];
    }

    /**
     * Get the version number of the application.
     *
     * @return string
     */
    public function version()
    {
        return static::VERSION;
    }

    /**
     * Convert the model instance to JSON.
     *
     * @param  int  $options
     * @return string
     */
    public function toJson($options = 0)
    {
        $json = json_encode($this->jsonSerialize(), $options);

        return $json;
    }

    /**
     * Convert the object into something JSON serializable.
     *
     * @return array
     */
    public function jsonSerialize()
    {
        return $this->toArray();
    }

    /**
     * Convert the model instance to an array.
     *
     * @return array
     */
    public function toArray()
    {
        return $this->toWebDriver();
    }

    /**
     * Convert the model to its string representation.
     *
     * @return string
     */
    public function __toString()
    {
        return $this->toJson();
    }
}
