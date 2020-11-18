<?php

namespace SOLID\InterfaceSegregation;

class Airplane implements IVehicle
{
    public function drive()
    {
        throw new Exception('Not implemented method');
    }

    public function fly()
    {
        echo 'Flying an airplane!';
    }
}