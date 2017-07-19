<?php

/**
 * Handles the creation of table `users`.
 */
class post
{
    /**
     * @inheritdoc
     */
    public function up($conn)
    {

// sql to create table
        $sql = "CREATE TABLE posts (
            id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            title VARCHAR(30) NOT NULL,
            context VARCHAR(30) NOT NULL,
            email VARCHAR(50),
            reg_date TIMESTAMP
            )";

        // use exec() because no results are returned
        $conn->exec($sql);
        echo "Table posts created successfully";
    }

    /**
     * @inheritdoc
     */
    public function down($conn)
    {
        $sql = "DROP TABLE IF EXISTS posts";
        $conn->exec($sql);
    }
}
