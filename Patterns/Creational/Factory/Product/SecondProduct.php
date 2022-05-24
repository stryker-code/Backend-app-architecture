<?php


class SecondProduct implements ProductInterface
{
    public function __construct()
    {
        var_dump($this->getName());
    }

    public function getName(): string
    {
        return 'The product from MagentoFactory';
    }

    public function getType()
    {
        // TODO: Implement getType() method.
    }
}
