<?php require_once 'new/core/dbConfig.php' ; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Form</title>

</head>
<body>

<?php
$stmt = $pdo->prepare(query:'SELECT id * FROM employees');
if ($stmt->execute()) {
    print_r($stmt->fetchAll());
}
?>

</body>
</html>
