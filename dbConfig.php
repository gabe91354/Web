<?php
$db_server = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "DreamJob";

// Setup PDO DSN (Data Source Name)
$dsn = "mysql:host={$db_server};dbname={$db_name}";

try {
    $pdo = new PDO($dsn, $db_user, $db_pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec("SET time_zone = '+08:00';");
} catch (PDOException $e) {
    echo "Could not connect: " . $e->getMessage();
}
?>
