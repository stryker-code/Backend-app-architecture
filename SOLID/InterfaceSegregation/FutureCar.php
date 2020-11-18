<?php

namespace SOLID\InterfaceSegregation;

class FutureCar implements IVehicle
{
    public function drive()
    {
        echo 'Driving a future car!';
    }

    public function fly()
    {
        echo 'Flying a future car!';
    }
}