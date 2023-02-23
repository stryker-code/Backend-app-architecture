<?php

namespace SOLID\LiskovSubstitution;

/**
 * Class App
 *
 * @package SOLID\LiskovSubstitution
 *
 * The principle says that objects must be replaceable
 * by instances of their subtypes without altering
 * the correct functioning of our system.
 */

class App
{
    public function __construct(User $user, $selection)
    {
        $this->getCoffeeMachine($user)->brewCoffee($selection);
    }

    private function getCoffeeMachine(User $user)
    {
        switch ($user->getPlan()) {
            case 'PREMIUM':
                $machine = new PremiumCoffeeMachine();
                break;
            default:
                $machine = new BasicCoffeeMachine();
        }

        return $machine;
    }
}