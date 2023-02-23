<?php

//Config::$factory = 2;

$factory = FactoryProvider::get();

$service = new ProductService();

$service->createProducts($factory);