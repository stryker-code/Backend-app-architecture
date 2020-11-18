<?php

namespace SOLID\DependencyInversion;

interface IDatabaseConnection
{
    public function connect();
}