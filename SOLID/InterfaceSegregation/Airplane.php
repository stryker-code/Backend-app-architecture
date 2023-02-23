<?php

namespace SOLID\InterfaceSegregation;

use Exception;

class Airplane implements IVehicle
{
    public function drive()
    {
        throw new Exception('Not implemented method');
    }

    public function fly(): string
    {
        return 'Flying an airplane!';
    }
}