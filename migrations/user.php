<?php

/**
 * Handles the creation of table `users`.
 */
class user
{
    /**
     * @inheritdoc
     */
    public function up($conn)
    {

// sql to create table
        $sql = "CREATE TABLE users (
            id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR(30) NOT NULL,
            password VARCHAR(30) NOT NULL,
            email VARCHAR(50),
            reg_date TIMESTAMP
            )";

        // use exec() because no results are returned
        $conn->exec($sql);
        echo "Table users created successfully";
    }

    /**
     * @inheritdoc
     */
    public function down($conn)
    {
        $sql = "DROP TABLE IF EXISTS users";
        $conn->exec($sql);
    }
}
