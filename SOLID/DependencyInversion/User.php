<?php

namespace SOLID\DependencyInversion;

/**
 * In this case, the UserDB class depends on directly from the MySQL database.
 * That means that if we would change the database engine in use we need
 * to rewrite this class and violate the Open-Close Principle.
 *
 * Entities must depend on abstractions not on concretions.
 * It states that the high level module must not depend on the low level module,
 * but they should depend on abstractions
 * https://levelup.gitconnected.com/solid-principles-simplified-php-examples-based-dc6b4f8861f6
 */

class User
{
    protected DatabaseConnectionInterface $dbConnection;

    // Must be IDatabaseConnection against strict MySQLConnection!
    public function __construct(DatabaseConnectionInterface $dbConnection)
    {
        $this->dbConnection = $dbConnection;
    }

    public function store(User $user)
    {
        // Store the user into a database...
    }
}