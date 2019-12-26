<?php

namespace ManyChat\Dynamic;

use ManyChat\Dynamic\Support\Jsonable;
use ManyChat\Dynamic\Support\WebDriver;
use ManyChat\Dynamic\Callback\ExternalCallback;
use Exception;
use JsonSerializable;

class Chat implements Jsonable, WebDriver, JsonSerializable
{
    use Concerns\HasResponse,
        Concerns\HasAction;

    /**
     * The ManyChat response version.
     *
     * @var string
     */
    const VERSION = 'v2';

    /**
     * The ManyChat HTTP User-Agent
     *
     * @var string
     */
    const UserAgent = 'ManyChat';

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
     * The ManyChat external callback
     *
     * @var ExternalCallback
     */
    protected $callback;

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
     * Create a quick reply to the message
     *
     * @param mixed $reply
     * @return Chat
     */
    public function quickReply($reply)
    {
        array_push($this->quickReplies, $reply);

        return $this;
    }

    /**
     * Create a external callback to the message
     *
     * @param mixed $reply
     * @return Chat
     */
    public function callback($callback)
    {
        if ($callback instanceof ExternalCallback) {
            $this->callback = $callback;
        } else {
            throw new Exception('Callback must be an instance of ExternalCallback');
        }

        return $this;
    }

    /**
     * Get the messages response
     *
     * @return array
     */
    protected function getMessages()
    {
        return $this->messages;
    }

    /**
     * Get the quick replies response
     *
     * @return array
     */
    protected function getQuickReplies()
    {
        return $this->quickReplies;
    }

    /**
     * Get the external callback response
     *
     * @return array
     */
    protected function getExternalCallback()
    {
        return $this->callback;
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
            "messages" => $this->getMessages(),
            "actions" => $this->getActions(),
            "quick_replies" => $this->getQuickReplies()
        ];

        if ($this->callback) {
            $content['external_message_callback'] = $this->getExternalCallback();
        }

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
