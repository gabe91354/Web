<?php
include 'dbConfig.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $religion = $_POST['religion'];
    $university = $_POST['university'];
    $gender = $_POST['gender'];
    $year_level = $_POST['year_level'];
    
    // Check if a custom job is entered
    if (!empty($_POST['custom_job'])) {
        $dream_job = $_POST['custom_job'];
    } else {
        $dream_job = $_POST['dream_job'];
    }

    // Prepare SQL statement
    $stmt = $pdo->prepare("INSERT INTO users (first_name, last_name, religion, university, gender, year_level, dream_job) VALUES (?, ?, ?, ?, ?, ?, ?)");
    
    // Execute the statement
    if ($stmt->execute([$first_name, $last_name, $religion, $university, $gender, $year_level, $dream_job])) {
        header("Location: index.php"); // Redirect to index.php
        exit();
    } else {
        echo "Error: " . $stmt->errorInfo()[2];
    }
}
?>
