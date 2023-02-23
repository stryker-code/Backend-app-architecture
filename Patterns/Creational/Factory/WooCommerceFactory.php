<?php


class WooCommerceFactory implements AbstractFactoryInterface
{
    public function createSimpleProduct(): FirstProduct
    {
        return new FirstProduct();
    }

    public function createComplexProduct(): string
    {
        $message =  __CLASS__.' not implemented'.__FUNCTION__;
        var_dump($message);
        return $message;
    }
}