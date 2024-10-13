<?php
include 'dbConfig.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Prepare SQL statement
    $stmt = $pdo->prepare("DELETE FROM users WHERE id = ?");
    
    // Execute the statement
    if ($stmt->execute([$id])) {
        header("Location: index.php"); // Redirect to index.php
        exit();
    } else {
        echo "Error: " . $stmt->errorInfo()[2];
    }
}
?>
