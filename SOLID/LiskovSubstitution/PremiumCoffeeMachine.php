<?php

namespace SOLID\LiskovSubstitution;

use Exception;

class PremiumCoffeeMachine extends BasicCoffeeMachine
{
    /**
     * @throws Exception
     */
    public function brewCoffee($selection): string
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

    protected function brewVanillaCoffee(): string
    {
        // Brew a vanilla coffee...
        return 'vanilla';
    }
}