<?php

final class Singleton
{
    private static self $instance;

    /**
     * Protect from creation via 'new Singleton
     */
    private function __construct()
    {
    }

    /**
     * Protect from creation via unserialize
     */
    private function __wakeup()
    {
    }

    /**
     * Protect from creation via cloning
     */
    private function __clone()
    {
    }

    /**
     * Return only single instance of class
     */
    public static function getInstance(): Singleton
    {
        if (!isset(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function displayHashCode()
    {
        echo spl_object_hash(self::$instance) . PHP_EOL;
    }
}

Singleton::getInstance()->displayHashCode();
Singleton::getInstance()->displayHashCode();
Singleton::getInstance()->displayHashCode();