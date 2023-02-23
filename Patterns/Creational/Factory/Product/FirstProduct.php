<?php


class FirstProduct implements ProductInterface
{
    public function __construct()
    {
        var_dump($this->getName());
    }

    public function getName(): string
    {
        return 'The product from the WooCommerceFactory factory';
    }

    public function getType()
    {
        return 'WooCommerce simple product';
    }

}