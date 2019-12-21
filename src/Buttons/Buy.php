<?php

namespace ManyChat\Dynamic\Buttons;

use ManyChat\Dynamic\Buttons\Button;
use ManyChat\Dynamic\Foundation\Customer;
use ManyChat\Dynamic\Foundation\Product;

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
     * @var Customer
     */
    protected $customer;

    /**
     * The Buy product
     *
     * @var Product
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
     * @param string $product
     * @param int $cost
     * @param string $caption
     * @param mixed $payload
     */
    public function __construct($product = null, $cost = null, $caption = "Buy", $payload = null)
    {
        parent::__construct($payload);

        $this->caption = $caption;

        $this->customer = new Customer();
        $this->product = new Product();

        if ($product)
            $this->product->setName($product);

        if ($cost)
            $this->product->setPrice($cost);
    }

    /**
     * Create a new Buy instance
     *
     * @param string $product
     * @param int $cost
     * @return self
     */
    public static function create($product, $cost)
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
            $callback($this->customer);
        }

        return $this;
    }

    /**
     * Execute a callback on Product data
     *
     * @param callable $callback
     * @return self
     */
    public function withProduct(callable $callback)
    {
        if (is_callable($callback)) {
            $callback($this->product);
        }

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
