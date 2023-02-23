<?php

namespace SOLID\DependencyInversion;

class MySQLConnection implements DatabaseConnectionInterface
{
    public function connect()
    {
        // Return the MySQL connection...
    }
}