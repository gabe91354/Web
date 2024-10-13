<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Input Form</title>
    <script>
        function toggleJobInput() {
            const jobSelect = document.getElementById("dream_job");
            const customJobInput = document.getElementById("custom_job_input");
            if (jobSelect.value === "Type your precise desired dream job") {
                customJobInput.style.display = "block";
                customJobInput.value = ""; // Clear the input
            } else {
                customJobInput.style.display = "none"; // Hide input
            }
        }
    </script>
</head>
<body>
    <h1>Dream Job by Gabriel Asence</h1>
    <form method="POST" action="submit.php">
        <label for="first_name">First Name:</label>
        <input type="text" id="first_name" name="first_name" required><br>

        <label for="last_name">Last Name:</label>
        <input type="text" id="last_name" name="last_name" required><br>

        <label for="religion">Religion:</label>
        <input type="text" id="religion" name="religion"><br>

        <label for="university">University:</label>
        <input type="text" id="university" name="university"><br>

        <label>Gender:</label>
        <select name="gender" required>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select><br>

        <label for="year_level">Year Level:</label>
        <select id="year_level" name="year_level" required>
            <option value="1">1st Year</option>
            <option value="2">2nd Year</option>
            <option value="3">3rd Year</option>
            <option value="4">4th Year</option>
        </select><br>

        <label for="dream_job">Dream Job:</label>
        <select id="dream_job" name="dream_job" required onchange="toggleJobInput()">
            <option value="">Select your dream job</option>
            <option value="Software Developer">Software Developer</option>
            <option value="Data Scientist">Data Scientist</option>
            <option value="Web Developer">Web Developer</option>
            <option value="Systems Analyst">Systems Analyst</option>
            <option value="Database Administrator">Database Administrator</option>
            <option value="Network Engineer">Network Engineer</option>
            <option value="Cybersecurity Analyst">Cybersecurity Analyst</option>
            <option value="Mobile App Developer">Mobile App Developer</option>
            <option value="Game Developer">Game Developer</option>
            <option value="Cloud Engineer">Cloud Engineer</option>
            <option value="AI/Machine Learning Engineer">AI/Machine Learning Engineer</option>
            <option value="IT Project Manager">IT Project Manager</option>
            <option value="DevOps Engineer">DevOps Engineer</option>
            <option value="QA Engineer">QA Engineer</option>
            <option value="Technical Support Specialist">Technical Support Specialist</option>
            <option value="UI/UX Designer">UI/UX Designer</option>
            <option value="Web Security Analyst">Web Security Analyst</option>
            <option value="Blockchain Developer">Blockchain Developer</option>
            <option value="Data Engineer">Data Engineer</option>
            <option value="Robotics Engineer">Robotics Engineer</option>
            <option value="Type your precise desired dream job">Type your precise desired dream job</option>
        </select><br>

        <input type="text" id="custom_job_input" name="custom_job" placeholder="Enter your dream job" style="display: none;"><br>

        <input type="submit" value="Submit">
    </form>

    <h2>Users List</h2>
    <div id="user_list">
        <?php include 'display.php'; ?>
    </div>
</body>
</html>
