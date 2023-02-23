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
    private string $email;

    /**
     * Store attributes into a database...
     * This method should be in another class;
     */
    public function store(): void
    {
    }
}