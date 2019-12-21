<?php

namespace ManyChat\Dynamic\Buttons;

use ManyChat\Dynamic\Buttons\Button;

class Buy extends Button
{
    /**
     * The Button type
     *
     * @var string
     */
    protected $type = 'buy';

    /**
     * The Buy caption
     *
     * @var string
     */
    protected $caption;

    /**
     * The Buy customer
     *
     * @var array
     */
    protected $customer = [
        "shipping_address" => false,
        "contact_name" =>     false,
        "contact_phone" =>    false
    ];

    /**
     * The Buy product
     *
     * @var array
     */
    protected $product = [
        'label' => null,
        'cost' => 0
    ];

    /**
     * The Buy success target Node
     *
     * @var string
     */
    protected $successTarget;

    /**
     * Create a new Buy instance
     * @param string $product
     * @param int $cost
     * @param string $caption
     * @param mixed $payload
     */
    public function __construct($product, $cost, $caption = "Buy", $payload = null)
    {
        parent::__construct($payload);

        if (is_string($product)) {
            $this->product['label'] = $product;
        }

        if (is_int($cost)) {
            $this->product['cost'] = $cost;
        }

        $this->caption = $caption;
    }

    /**
     * Create a new Buy instance
     *
     * @param string $product
     * @param int $cost
     * @return self
     */
    public static function create($product, $cost = null)
    {
        return new self($product, $cost);
    }

    /**
     * Get the Buy customer
     *
     * @return string
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * Get the Buy product
     *
     * @return string
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * Get the Buy caption
     *
     * @return string
     */
    public function getCaption()
    {
        return $this->caption;
    }

    /**
     * Get the Buy success target Node
     *
     * @return string
     */
    public function getSuccessTarget()
    {
        return $this->successTarget;
    }

    /**
     * Execute a callback on Customer data
     *
     * @param callable $callback
     * @return self
     */
    public function withCustomer(callable $callback)
    {
        if (is_callable($callback)) {
            $callback($this);
        }

        return $this;
    }

    /**
     * Require Customer shipping address
     *
     * @param boolean $status
     * @return self
     */
    protected function requestShippingAddress($status = true)
    {
        $this->customer['shipping_address'] = $status;

        return $this;
    }

    /**
     * Require Customer contact name
     *
     * @param boolean $status
     * @return self
     */
    protected function requestName($status = true)
    {
        $this->customer['contact_name'] = $status;

        return $this;
    }

    /**
     * Require Customer contact phone
     *
     * @param boolean $status
     * @return self
     */
    protected function requestPhoneNumber($status = true)
    {
        $this->customer['contact_phone'] = $status;

        return $this;
    }

    /**
     * Get the Block response format
     *
     * @return array
     */
    protected function toResponseFormat()
    {
        return [
            'caption' => $this->getCaption(),
            'customer' => $this->getCustomer(),
            'product' => $this->getProduct(),
            'success_target' => $this->getSuccessTarget()
        ];
    }
}
