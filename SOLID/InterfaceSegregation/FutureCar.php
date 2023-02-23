<?php

namespace SOLID\InterfaceSegregation;

class FutureCar implements IVehicle
{
    public function drive(): string
    {
        return 'Driving a future car!';
    }

    public function fly(): string
    {
        return 'Flying a future car!';
    }
}