<?php

namespace SOLID\DependencyInversion;

interface DatabaseConnectionInterface
{
    public function connect();
}