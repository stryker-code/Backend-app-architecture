<?php

namespace SOLID\LiskovSubstitution;

interface ICoffeeMachine
{
    public function brewCoffee(string $selection);
}