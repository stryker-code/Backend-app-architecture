<?php

final class Singleton
{
    private static $_instance;

    // Protect from creation via 'new Singleton'
    private function __construct()
    {
    }

    // Protect from creation via unserialize
    private function __wakeup()
    {
    }

    // Protect from creation via cloning
    private function __clone()
    {
    }

    // Return only single instance of class
    public static function getInstance(): Singleton
    {
        if (!isset(self::$_instance)) {
            self::$_instance = new self();
        }

        return self::$_instance;
    }

    public function displayHashCode()
    {
        echo spl_object_hash(self::$_instance).PHP_EOL;
    }
}

Singleton::getInstance()->displayHashCode();
Singleton::getInstance()->displayHashCode();
Singleton::getInstance()->displayHashCode();