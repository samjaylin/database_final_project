<!-- Using ORM to deal with it by Buffett -->

<?php
// Handle registration logic here
// Example: insert data into a database

// For demonstration, using simple echo
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password']; // In a real-world scenario, hash the password

    echo "Registration successful for: " . $username;
    // Here, you would normally insert the data into a database
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
</head>
<body>
    <h2>Register</h2>
    <form method="post">
        Username: <input type="text" name="username"><br>
        Password: <input type="password" name="password"><br>
        <input type="submit" value="Register">
    </form>
</body>
</html>