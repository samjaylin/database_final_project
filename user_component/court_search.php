<!-- 場地搜索 By Buffett not done yet -->
<!-- 3-1.2 場地搜索 -->

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


<!DOCTYPE html>
<html>
<head>
    <title>Hooper Court Search</title>
    <link rel="stylesheet" href="user.css">
</head>

<body>
    <div class="container">
        <h1>Search Courts - User</h1>
        <form action="court_search.php" method="post">
            搜尋日期： <input type="date" name="select_date" required><br>
            <div>
                <label for="court_search"></label>
                搜尋場地： <select name="court_search" id="court_search">
                    <?php
                        $selectedCourt = $_POST['court_search'] ?? '';
                        try {
                            $stmt = $pdo->query("SELECT * FROM court");
                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                $selected = ($row['courtid'] == $selectedCourt) ? 'selected' : '';
                                echo "<option value='" . $row['courtid'] . "' $selected>" . $row['courtname'] . "</option>";
                            }
                        } catch (PDOException $e) {
                            echo "Error: " . $e->getMessage();
                        }
                    ?>
                </select>
            </div>
            可接受金額上限： <input type="number" name="max_fee" required><br>
        
            <input type="submit" value="Search">
        </form>

        <button class="button previous" onclick="history.back();">Previous Page</button>
        <button class="button main" onclick="window.location.href='../index.php';">Main Page</button><br>


        <?php
            // Processing
            if (isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"] == "POST") {
                $court_search = $_POST[''];
                


            }
        ?>
    </div>
</body>
</html>
