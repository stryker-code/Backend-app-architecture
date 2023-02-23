<?php

echo '<Pre>';

$catName = 'garfield';
$cat = new Cat($catName);

if ($cat->getName() === $catName) {
    echo "Cat name is '{$catName}'" . PHP_EOL;
}

if ($cat->meow() === "Cat {$catName} is saying meow") {
    echo "YES - '{$catName} is saying meow'";
}