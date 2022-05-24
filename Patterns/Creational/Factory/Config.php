<?php


class Config
{
    const WOOCOMMERCE_FACTORY_TYPE = 1;
    const MAGENTO_FACTORY_TYPE = 2;

    public static int $factory = self::WOOCOMMERCE_FACTORY_TYPE;
}