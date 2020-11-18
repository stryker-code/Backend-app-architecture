<?php

namespace SOLID\LiskovSubstitution;

/**
 * Class App
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
        $this->_getCoffeeMachine($user)->brewCoffee($selection);
    }

    private function _getCoffeeMachine(User $user)
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