<?php
include 'dbConfig.php';

// Fetch all users
$stmt = $pdo->query("SELECT * FROM users ORDER BY id DESC");
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($users) {
    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Religion</th>
                <th>University</th>
                <th>Gender</th>
                <th>Year Level</th>
                <th>Dream Job</th>
                <th>Actions</th>
            </tr>";
    
    foreach ($users as $user) {
        echo "<tr>
                <td>{$user['id']}</td>
                <td>{$user['first_name']}</td>
                <td>{$user['last_name']}</td>
                <td>{$user['religion']}</td>
                <td>{$user['university']}</td>
                <td>{$user['gender']}</td>
                <td>{$user['year_level']}</td>
                <td>{$user['dream_job']}</td>
                <td>
                    <a href='edit.php?id={$user['id']}'>Edit</a>
                    <a href='delete.php?id={$user['id']}'>Delete</a>
                </td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "No records found.";
}
?>
