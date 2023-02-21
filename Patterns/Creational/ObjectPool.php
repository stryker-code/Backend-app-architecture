<?php

/**
 * Pool of objects
 */
class Factory
{
    /**
     * @var Product[]
     */
    protected static array $products = array();

    /**
     * Add product to pool
     *
     * @param Product $product
     * @return void
     */
    public static function pushProduct(Product $product)
    {
        self::$products[$product->getId()] = $product;
    }

    /**
     * Return product from pool
     *
     * @param integer|string $id - product identifier
     * @return Product $product
     */
    public static function getProduct($id): ?Product
    {
        return self::$products[$id] ?? null;
    }

    /**
     * Delete product from pool
     *
     * @param integer|string $id - product identifier
     * @return void
     */
    public static function removeProduct($id)
    {
        if (array_key_exists($id, self::$products)) {
            unset(self::$products[$id]);
        }
    }
}

class Product
{

    /**
     * @var integer|string
     */
    protected $id;


    public function __construct($id) {
        $this->id = $id;
    }

    /**
     * @return integer|string
     */
    public function getId()
    {
        return $this->id;
    }
}

Factory::pushProduct(new Product('first'));
Factory::pushProduct(new Product('second'));

print_r(Factory::getProduct('first'));