<?php

namespace SOLID\LiskovSubstitution;

class PremiumCoffeeMachine extends BasicCoffeeMachine
{
    public function brewCoffee($selection)
    {
        switch ($selection) {
            case 'ESPRESSO':
                return $this->brewEspresso();
            case 'VANILLA':
                return $this->brewVanillaCoffee();
            default:
                throw new Exception('Selection not supported');
        }
    }

    protected function brewVanillaCoffee()
    {
        // Brew a vanilla coffee...
    }
}