<?php

// Builder Design Pattern

// Product
class Cookie
{
    public $name;
    public $price;
    public $quantity;
    public $addition;

}

// Concrete Products
class Order extends Cookie
{
    public function __toString()
    {
        return '<h1>//.</h1>' . '<pre>' . var_export($this, true) . '</pre>';
    }
}

// Builder Interface
interface CookieBuilder
{
    public function addName();
    public function addPrice();
    public function addQuantity();
    public function addAddition();

    public function getProduct();
}

// Concrete Builders
class OrderBuilder implements CookieBuilder
{

    private $product;
    private $options;

    public function __construct(array $options)
    {
        $this->options = $options;
        $this->product = new Order();
    }

    public function addName()
    {
        $this->product->name = $this->options['name'];
    }

    public function addPrice()
    {
        $this->product->price = $this->options['price'];
    }

    public function addQuantity()
    {
        $this->product->quantity = $this->options['quantity'];
    }

    public function addAddition()
    {
        $this->product->addition = $this->options['addition'];
    }

    public function getProduct()
    {
        return $this->product;
    }
}

// Director
class CookieCreator
{
    public function buildCookie(CookieBuilder $builder)
    {
        $builder->addName();
        $builder->addPrice();
        $builder->addQuantity();
        $builder->addAddition();

        return $builder->getProduct();
    }
}
