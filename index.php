<?php
$servername = "localhost";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$servername;dbname=test", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
}
catch(PDOException $e)
{
    echo "Connection failed: " . $e->getMessage();
}


require "migrations.php";
$migrations = new Migrations();
$migrations->MigrateRefresh($conn);

$migrations->createMigrate("comment");

$conn = null;
?>

<script src="./widget/script.js" type="text/javascript"></script>
<div id="example-widget-container"></div>
