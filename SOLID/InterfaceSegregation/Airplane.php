<?php

namespace SOLID\InterfaceSegregation;

use Exception;

class Airplane implements IVehicle
{
    /**
     * Redundant interface method implementation
     *
     * @throws Exception
     */
    public function drive(): string
    {
        throw new Exception('Airplane could not drive');
    }

    public function fly(): string
    {
        return 'Flying an airplane!';
    }
}
