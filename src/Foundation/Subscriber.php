<?php

namespace ManyChat\Dynamic\Foundation;

use Exception;
use ManyChat\Dynamic\Support\Authenticatable;

class Subscriber implements Authenticatable
{
    /** @var int */
    public $id;

    /** @var string */
    public $key;

    /** @var int */
    public $pageId;

    /** @var string */
    public $status;

    /** @var array */
    public $userRefs;

    /** @var string */
    public $firstName;

    /** @var string */
    public $lastName;

    /** @var string */
    public $name;

    /** @var string */
    public $gender;

    /** @var string */
    public $profilePic;

    /** @var string */
    public $locale;

    /** @var string */
    public $language;

    /** @var string */
    public $timezone;

    /** @var string */
    public $liveChatUrl;

    /** @var string */
    public $lastInputText;

    /** @var boolean */
    public $optInPhone;

    /** @var string */
    public $phone;

    /** @var boolean */
    public $optInPmail;

    /** @var string */
    public $email;

    /** @var boolean */
    public $isFollowupEnabled;

    /** @var string */
    public $subscribed;

    /** @var string */
    public $lastGrowthTool;

    /** @var string */
    public $lastInteraction;

    /** @var string */
    public $lastSeen;

    /** @var array */
    public $customFields;

    /**
     * A map for response data with object key
     *
     * @var array
     */
    protected $mapDataArray = [
        'id' => 'id',
        'key' => 'key',
        'pageId' => 'page_id',
        'status' => 'status',
        'userRefs' => 'user_refs',
        'name' => 'name',
        'firstName' => 'first_name',
        'lastName' => 'last_name',
        'gender' => 'gender',
        'profilePic' => 'profile_pic',
        'locale' => 'locale',
        'language' => 'language',
        'timezone' => 'timezone',
        'liveChatUrl' => 'live_chat_url',
        'lastInputText' => 'last_input_text',
        'optInPhone' => 'optin_phone',
        'phone' => 'phone',
        'optInPmail' => 'optin_email',
        'email' => 'email',
        'isFollowupEnabled' => 'is_followup_enabled',
        'subscribed' => 'subscribed',
        'lastGrowthTool' => 'last_growth_tool',
        'lastInteraction' => 'last_interaction',
        'lastSeen' => 'last_seen',
        'customFields' => 'custom_fields'
    ];

    /**
     * Create a new Subscriber instance
     *
     * @param mixed $subscriber
     */
    public function __construct($subscriber)
    {
        if (!in_array('live_chat_url', $subscriber) && !in_array('last_input_text', $subscriber)) {
            throw new Exception('Invalid Subscriber Data');
        }

        if (is_array($subscriber)) {
            $this->mapSubscriberData($subscriber);
        } else if (is_string($subscriber)) {
            $this->parseSubscriberJson($subscriber);
        }
    }

    /**
     * Create a new Subscriber instance
     *
     * @param \Illuminate\Http\Request $request
     *
     */
    static function create($payload)
    {
        return new self($payload);
    }

    /**
     * Get a custom fields key's value
     *
     * @param string $key
     * @return string|null
     */
    public function field($key)
    {
        if (in_array($key, $this->customFields)) {
            return $this->customFields[$key];
        }
    }

    /**
     * Get a custom fields key's value
     *
     * @param string $key
     * @return string|null
     */
    public function customField($key)
    {
        return $this->field($key);
    }

    /**
     * Get the name of the unique identifier for the user.
     *
     * @return string
     */
    public function getAuthIdentifierName()
    {
        return 'id';
    }

    /**
     * Get the unique identifier for the user.
     *
     * @return mixed
     */
    public function getAuthIdentifier()
    {
        return $this->{$this->getAuthIdentifierName()};
    }

    /**
     * Parse the subscriber json data
     *
     * @param string $json
     * @return void
     */
    public function parseSubscriberJson(string $json)
    {
        $subscriber = (array) json_decode($json);

        $this->mapSubscriberData($subscriber);
    }

    /**
     * Map the subscriber with data array
     *
     * @param array $subscriber
     * @return void
     */
    protected function mapSubscriberData(array $subscriber)
    {
        foreach ($this->mapDataArray as $key => $value) {
            $this->{$key} = $subscriber[$value];
        }
    }

    /**
     * Get the instance as a web accessible array.
     * This will be used within the WebDriver.
     *
     * @return array
     */
    public function toWebDriver()
    {
        $data = [];

        foreach ($this->mapDataArray as $key => $value) {
            $data[$value] = $this->{$key};
        }

        return $data;
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
