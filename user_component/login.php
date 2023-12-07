<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="container">
        <?php
            $host = 'localhost';
            $port = 5432; 
            $dbname = 'hooper';
            $user = 'postgres'; 
            $password = trim(file_get_contents('../db_password.txt'));

            // pdo settings
            $pdo = null; 
            try {
                $pdo = new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $user, $password);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo "Database connection failed: " . $e->getMessage();
            }

        ?>

        <h1>Search for Users</h1>
        <form action="login.php" method="post">
            <div>
                <label for="username">Username:</label><br>
                <input type="text" id="username" name="username"><br>
            </div>
            <div>
                <label for="password">Password:</label><br>
                <input type="password" id="password" name="password"><br>
            </div>
            <input type="submit" value="Login">
        </form>

        <!-- Php code here -->
        <?php
        if (isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $_POST['username'];
            $password = $_POST['password'];
    
            try {
                $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username AND password = :password");
                $stmt->execute(['username' => $username, 'password' => $password]);
                
                if ($stmt->rowCount() > 0) {
                    echo "Login successful!";
                    // Access to other profile
                } else {
                    echo "Invalid username or password.";
                }
            } catch (PDOException $e) {
                echo "Error executing query: " . $e->getMessage();
            }
        }
        ?>

    </div>
</body>
</html>
