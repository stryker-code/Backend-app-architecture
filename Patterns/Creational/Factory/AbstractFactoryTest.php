<?php

require_once dirname(__FILE__, 4) . DIRECTORY_SEPARATOR . 'Autoloader.php';

Autoloader::register();


$factory = FactoryProvider::get();

var_dump($factory);
exit;

$service = new ProductService();

$service->createProducts($factory);


