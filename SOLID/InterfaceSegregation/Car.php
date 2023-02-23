<?php

namespace SOLID\InterfaceSegregation;

use Exception;

class Car implements IVehicle
{
    public function drive(): string
    {
        return 'Driving a car!';
    }

    /**
     * Redundant interface method implementation
     *
     */
    public function fly(): string
    {
        throw new Exception('Not implemented method');
    }
}