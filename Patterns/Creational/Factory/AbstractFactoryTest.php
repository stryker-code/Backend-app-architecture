<?php


require_once __DIR__ . DIRECTORY_SEPARATOR.'Autoloader.php';


Autoloader::register();


        $factory = FactoryProvider::get();

        var_dump($factory);
        exit;

        $service = new ProductService();

        $service->createProducts($factory);


