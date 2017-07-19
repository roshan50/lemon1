<?php

            /**
             * Handles the creation of table `users`.
             */
            class comment
            {
                /**
                 * @inheritdoc
                 */
                public function up($conn)
                {
            
            // sql to create table
                    $sql = "CREATE TABLE comments (
                        id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY
                        )";
            
                    // use exec() because no results are returned
                    $conn->exec($sql);
                    echo "Table comments created successfully";
                }
            
                /**
                 * @inheritdoc
                 */
                public function down($conn)
                {
                    $sql = "DROP TABLE IF EXISTS comments";
                    $conn->exec($sql);
                }
            }
            