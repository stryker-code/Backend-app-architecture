<?php

namespace SOLID\InterfaceSegregation;

use Exception;

class Car implements IVehicle
{
    public function drive()
    {
        echo 'Driving a car!';
    }

    public function fly()
    {
        throw new Exception('Not implemented method');
    }
}