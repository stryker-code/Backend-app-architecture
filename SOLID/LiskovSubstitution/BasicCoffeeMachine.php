<?php

namespace SOLID\LiskovSubstitution;

use Exception;

class BasicCoffeeMachine implements ICoffeeMachine
{
    public function brewCoffee(string $selection): string
    {
        switch ($selection) {
            case 'ESPRESSO':
                return $this->brewEspresso();
            default:
                throw new Exception('Selection not supported');
        }
    }

    protected function brewEspresso(): string
    {
        // Brew an espresso...
        return 'hot';
    }
}
