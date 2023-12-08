<!-- 場地搜索 By Buffett -->
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
            搜尋日期： <input type="date" name="date" required><br>
            <div>
                <label for="courtid"></label>
                搜尋場地： <select name="courtid" id="courtid">
                    <?php
                        $selectedCourt = $_POST['courtid'] ?? '';
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
            可接受金額上限： <input type="number" name="max_fee" required value="500" step="5"><br>
        
            <input type="submit" value="Search">
        </form>

        <button class="button previous" onclick="history.back();">Previous Page</button>
        <button class="button main" onclick="window.location.href='../index.php';">Main Page</button><br>


        <?php
            // Processing
            if (isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"] == "POST") {
                $date = $_POST['date'];
                $courtid = $_POST['courtid'];
                $fee = $_POST['max_fee'];

                $sql = "
                    SELECT *
                    FROM match m
                    Where m.date = :date
                        AND m.courtid = :courtid
                        AND m.fee <= :fee
                ";

                // Basic info processing
                try {
                    $stmt = $pdo->prepare($sql);
                    $stmt->bindParam(':date', $date);
                    $stmt->bindParam(':courtid', $courtid);
                    $stmt->bindParam(':fee', $fee);
                    $stmt->execute();
                    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    
                    if ($results) {
                        echo "<table>";
                        echo "<tr><th>Match ID</th><th>Fee</th><th>Date</th><th>Time</th><th>Reservable</th></tr>";
                        foreach ($results as $row) {
                            echo "<tr><td>" . $row['matchid'] . "</td><td>" ."$". $row['fee'] . "</td><td>" . $row['date'] . "</td><td>" . $row['time'] . "</td></tr>";
                        }
                        echo "</table>";
                    } else {
                        echo "No court found.";
                    }

                } catch (PDOException $e) {
                    echo "Error executing query: " . $e->getMessage();
                }
                


            }
        ?>
    </div>
</body>
</html>
