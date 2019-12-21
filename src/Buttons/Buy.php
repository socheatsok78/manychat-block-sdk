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
     * @var string
     */
    protected $customer;

    /**
     * The Buy product
     *
     * @var string
     */
    protected $product;

    /**
     * The Buy success target Node
     *
     * @var string
     */
    protected $successTarget;

    /**
     * Create a new Buy instance
     * @param string $target
     * @param string $caption
     * @param mixed $payload
     */
    public function __construct($product, $caption = "Buy", $payload = null)
    {
        parent::__construct($payload);

        $this->product = $product;
        $this->caption = $caption;
    }

    /**
     * Create a new Buy instance
     *
     * @param string $product
     * @return Button
     */
    public static function create(string $product)
    {
        return new self($product);
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
