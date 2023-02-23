<?php


class FactoryProvider
{
    /**
     * Get all factories
     *
     * @return array
     */
    public static function getAllFactories(): array
    {
        return [new WooCommerceFactory(), new MagentoFactory()];
    }

    /**
     * Get factory by app config
     *
     * @return MagentoFactory|WooCommerceFactory
     * @throws Exception
     */
    public static function get()
    {
        switch (Config::$factory) {
            case 1:
                return new WooCommerceFactory();
            case 2:
                return new MagentoFactory();
        }

        throw new Exception('Bad config');
    }
}