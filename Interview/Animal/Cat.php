<?php


class Cat extends Animal
{
    function getMeow(): string
    {
        return "Cat {$this->name} is saying meow";
    }
}