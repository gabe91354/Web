<?php
include 'dbConfig.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
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
    $stmt = $pdo->prepare("UPDATE users SET first_name = ?, last_name = ?, religion = ?, university = ?, gender = ?, year_level = ?, dream_job = ? WHERE id = ?");
    
    // Execute the statement
    if ($stmt->execute([$first_name, $last_name, $religion, $university, $gender, $year_level, $dream_job, $id])) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $stmt->errorInfo()[2];
    }
} else {
    $id = $_GET['id'];
    $stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
    $stmt->execute([$id]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
</head>
<body>
    <h1>Edit User</h1>
    <form method="POST" action="edit.php">
        <input type="hidden" name="id" value="<?= $user['id'] ?>">
        
        <label for="first_name">First Name:</label>
        <input type="text" id="first_name" name="first_name" value="<?= $user['first_name'] ?>" required><br>

        <label for="last_name">Last Name:</label>
        <input type="text" id="last_name" name="last_name" value="<?= $user['last_name'] ?>" required><br>

        <label for="religion">Religion:</label>
        <input type="text" id="religion" name="religion" value="<?= $user['religion'] ?>"><br>

        <label for="university">University:</label>
        <input type="text" id="university" name="university" value="<?= $user['university'] ?>"><br>

        <label>Gender:</label>
        <select name="gender" required>
            <option value="Male" <?= $user['gender'] == 'Male' ? 'selected' : '' ?>>Male</option>
            <option value="Female" <?= $user['gender'] == 'Female' ? 'selected' : '' ?>>Female</option>
        </select><br>

        <label for="year_level">Year Level:</label>
        <select id="year_level" name="year_level" required>
            <option value="1" <?= $user['year_level'] == 1 ? 'selected' : '' ?>>1st Year</option>
            <option value="2" <?= $user['year_level'] == 2 ? 'selected' : '' ?>>2nd Year</option>
            <option value="3" <?= $user['year_level'] == 3 ? 'selected' : '' ?>>3rd Year</option>
            <option value="4" <?= $user['year_level'] == 4 ? 'selected' : '' ?>>4th Year</option>
        </select><br>

        <label for="dream_job">Dream Job:</label>
        <select id="dream_job" name="dream_job" required>
            <option value="Software Developer" <?= $user['dream_job'] == 'Software Developer' ? 'selected' : '' ?>>Software Developer</option>
            <option value="Data Scientist" <?= $user['dream_job'] == 'Data Scientist' ? 'selected' : '' ?>>Data Scientist</option>
            <option value="Web Developer" <?= $user['dream_job'] == 'Web Developer' ? 'selected' : '' ?>>Web Developer</option>
            <option value="Systems Analyst" <?= $user['dream_job'] == 'Systems Analyst' ? 'selected' : '' ?>>Systems Analyst</option>
            <option value="Database Administrator" <?= $user['dream_job'] == 'Database Administrator' ? 'selected' : '' ?>>Database Administrator</option>
            <option value="Network Engineer" <?= $user['dream_job'] == 'Network Engineer' ? 'selected' : '' ?>>Network Engineer</option>
            <option value="Cybersecurity Analyst" <?= $user['dream_job'] == 'Cybersecurity Analyst' ? 'selected' : '' ?>>Cybersecurity Analyst</option>
            <option value="Mobile App Developer" <?= $user['dream_job'] == 'Mobile App Developer' ? 'selected' : '' ?>>Mobile App Developer</option>
            <option value="Game Developer" <?= $user['dream_job'] == 'Game Developer' ? 'selected' : '' ?>>Game Developer</option>
            <option value="Cloud Engineer" <?= $user['dream_job'] == 'Cloud Engineer' ? 'selected' : '' ?>>Cloud Engineer</option>
            <option value="AI/Machine Learning Engineer" <?= $user['dream_job'] == 'AI/Machine Learning Engineer' ? 'selected' : '' ?>>AI/Machine Learning Engineer</option>
            <option value="IT Project Manager" <?= $user['dream_job'] == 'IT Project Manager' ? 'selected' : '' ?>>IT Project Manager</option>
            <option value="DevOps Engineer" <?= $user['dream_job'] == 'DevOps Engineer' ? 'selected' : '' ?>>DevOps Engineer</option>
            <option value="QA Engineer" <?= $user['dream_job'] == 'QA Engineer' ? 'selected' : '' ?>>QA Engineer</option>
            <option value="Technical Support Specialist" <?= $user['dream_job'] == 'Technical Support Specialist' ? 'selected' : '' ?>>Technical Support Specialist</option>
            <option value="UI/UX Designer" <?= $user['dream_job'] == 'UI/UX Designer' ? 'selected' : '' ?>>UI/UX Designer</option>
            <option value="Web Security Analyst" <?= $user['dream_job'] == 'Web Security Analyst' ? 'selected' : '' ?>>Web Security Analyst</option>
            <option value="Blockchain Developer" <?= $user['dream_job'] == 'Blockchain Developer' ? 'selected' : '' ?>>Blockchain Developer</option>
            <option value="Data Engineer" <?= $user['dream_job'] == 'Data Engineer' ? 'selected' : '' ?>>Data Engineer</option>
            <option value="Robotics Engineer" <?= $user['dream_job'] == 'Robotics Engineer' ? 'selected' : '' ?>>Robotics Engineer</option>
            <option value="Type your precise desired dream job" <?= $user['dream_job'] == 'Type your precise desired dream job' ? 'selected' : '' ?>>Type your precise desired dream job</option>
        </select><br>

        <input type="text" id="custom_job_input" name="custom_job" placeholder="Enter your dream job" style="display: none;" value="<?= $user['dream_job'] == 'Type your precise desired dream job' ? '' : $user['dream_job'] ?>"><br>

        <input type="submit" value="Update">
    </form>
</body>
</html>
