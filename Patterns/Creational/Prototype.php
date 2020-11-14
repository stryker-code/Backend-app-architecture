<?php

/** Prototype - a pre-initialized and saved object.
If necessary, it is cloned
Some fabric */

class Factory
{
    /**
     * @var Product
     */
    private $product;

    /**
     * @param Product $product
     */
    public function __construct(StdClass $product)
    {
        $this->product = $product;
    }

    /**
     * Return new product via clone exist product
     *
     * @return Product
     */
    public function getProduct()
    {
        return clone $this->product;
    }
}

$prototypeFactory = new Factory(new StdClass());

$firstProduct = $prototypeFactory->getProduct();
$firstProduct->name = 'The first product';

$secondProduct = $prototypeFactory->getProduct();
$secondProduct->name = 'Second product';

print_r($firstProduct->name);
// The first product

print_r($secondProduct->name);
// Second product