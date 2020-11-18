<?php

namespace SOLID\DependencyInversion;

class MySQLConnection implements IDatabaseConnection
{
    public function connect()
    {
        // Return the MySQL connection...
    }
}