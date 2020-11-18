<?php

namespace SOLID\LiskovSubstitution;

class BasicCoffeeMachine
{
    public function brewCoffee($selection)
    {
        switch ($selection) {
            case 'ESPRESSO':
                return $this->brewEspresso();
            default:
                throw new Exception('Selection not supported');
        }
    }

    protected function brewEspresso()
    {
        // Brew an espresso...
    }
}