<?php


class ProductService
{
    public function createProducts(AbstractFactoryInterface $factory)
    {
        $factory->createSimpleProduct();
        $factory->createComplexProduct();
    }
}