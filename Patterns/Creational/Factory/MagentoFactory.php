<?php


class MagentoFactory implements AbstractFactoryInterface
{
    public function createSimpleProduct(): string
    {
        $message =  __CLASS__.' not implemented'.__FUNCTION__;
        var_dump($message);
        return $message;
    }

    public function createComplexProduct(): SecondProduct
    {
        return new SecondProduct();
    }
}