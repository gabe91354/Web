<?php
    $db_server = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "asence";

    // Setup PDO DSN (Data Source Name)
    $dsn = "mysql:host={$db_server};dbname={$db_name}";

    // Try to establish a PDO connection
    try {
        $pdo = new PDO($dsn, $db_user, $db_pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->exec("SET time_zone = '+08:00';");
        echo "You are connected!";
    } catch (PDOException $e) {
        // Handle connection error
        echo "Could not connect: " . $e->getMessage();
    }
?>
