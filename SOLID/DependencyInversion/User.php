<?php
/**
 * In this case, the UserDB class depends directly from the MySQL database.
 * That means that if we would change the database engine in use we need
 * to rewrite this class and violate the Open-Close Principle.
 * https://levelup.gitconnected.com/solid-principles-simplified-php-examples-based-dc6b4f8861f6
 */

class User
{
    private $_dbConnection;

    // Must be DBConnectionInterface against DBConnectionInterface
    public function __construct(MySQLConnection $dbConnection) {
        $this->_dbConnection = $dbConnection;
    }

    public function store(User $user) {
        // Store the user into a database...
    }
}