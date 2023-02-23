<?php

namespace SOLID\SingleResponsibility;

/**
 * Class Client
 * @package SOLID\SingleResponsibility
 *
 * A class should have one and only one reason to change,
 * meaning that a class should have only one job
 */

class Client
{
    private $email;

    public function store()
    {
        // Store attributes into a database...
        // This method should be in another class;
    }
}