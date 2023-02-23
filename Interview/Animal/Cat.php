<?php


class Cat extends Animal
{
    protected function getMeow(): string
    {
        return "Cat {$this->name} is saying meow";
    }
}