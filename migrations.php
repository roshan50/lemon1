<?php
class Migrations
{

    public function __construct()
    {
    }


    public static function createMigrate($name)
    {
        $date = date('m-d-Y-H-i-s');
        $myfile = fopen("migrations/$date-$name.php", "w") or die("Unable to open file!");
        $name2 = $name.'s';
        $txt = "<?php

            /**
             * Handles the creation of table `users`.
             */
            class $name
            {
                /**
                 * @inheritdoc
                 */
                public function up(\$conn)
                {
            
            // sql to create table
                    \$sql = \"CREATE TABLE $name2 (
                        id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY
                        )\";
            
                    // use exec() because no results are returned
                    \$conn->exec(\$sql);
                    echo \"Table $name2 created successfully\";
                }
            
                /**
                 * @inheritdoc
                 */
                public function down(\$conn)
                {
                    \$sql = \"DROP TABLE IF EXISTS $name2\";
                    \$conn->exec(\$sql);
                }
            }
            ";
        fwrite($myfile, $txt);
        fclose($myfile);


    }
    public static function Migrate($conn)
    {
        $files = glob('migrations/*.{php}', GLOB_BRACE);
        foreach($files as $file) {
            echo "<br>\n";
            echo $file;
            require $file;
            $tableName = str_replace("migrations/","",$file);
            $tableName = str_replace(".php","",$tableName);
            $Table = new $tableName();
            $Table->up($conn);

        }

    }

    public static function MigrateRefresh($conn)
    {
        $files = glob('migrations/*.{php}', GLOB_BRACE);
        foreach($files as $file) {
            echo "<br>\n";
            echo $file;
            require $file;
            $tableName = str_replace("migrations/","",$file);
            $tableName = str_replace(".php","",$tableName);
            $Table = new $tableName();
            $Table->down($conn);
            $Table->up($conn);

        }

    }
}
?>