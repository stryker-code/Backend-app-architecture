<?php

namespace Patterns\Structural;
/**
 * Registry is hash
 */
class Product
{
    /**
     * @var array
     */
    protected static array $data = [];

    /**
     * Adding value to registry
     *
     * @param string $key
     * @param mixed $value
     * @return void
     */
    public static function set(string $key, $value)
    {
        self::$data[$key] = $value;
    }

    /**
     * Get value by key from registry
     *
     * @param string $key
     * @return mixed
     */
    public static function get(string $key)
    {
        return self::$data[$key] ?? null;
    }

    /**
     * Remove value from registry by key
     *
     * @param string $key
     * @return void
     */
    final public static function removeProduct(string $key)
    {
        if (array_key_exists($key, self::$data)) {
            unset(self::$data[$key]);
        }
    }
}

Product::set('name', 'First product');
print_r(Product::get('name'));