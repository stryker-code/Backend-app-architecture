<?php

namespace SOLID\InterfaceSegregation;

/**
 * Interface IVehicle
 *
 * @package SOLID\InterfaceSegregation
 *
 * This principle defines that a class should never implement
 * an interface that does not go to use.
 * In that case, means that in our implementations
 * we will have methods that don’t need.
 * The solution is to develop specific interfaces
 * instead of general-purpose interfaces
 */

interface IVehicle
{
    public function drive(): string;
    public function fly(): string;
}