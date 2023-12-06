<!-- 場地搜索 By Buffett Not done yet -->
<!-- 3-1.2 場地搜索 -->
<!DOCTYPE html>
<html>
<head>
<title>Hooper Court Search</title>
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

        $pdo = null; // PDO is an access layer to multiple database
        try {
            $pdo = new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $user, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Database connection failed: " . $e->getMessage();
        }
    ?>

    <h1>Search Courts - User</h1>
    <form action="court_search.php" method="post">
        <div>
            <label for="court_search">Court search:</label>
            <select name="court_search" id="court_search">
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
      
        <input type="submit" value="Search">
    </form>

    <?php
    //   if (isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"] == "POST") {
	// 	$start_station = $_POST['start_station'];
	// 	$end_station = $_POST['end_station'];
	// 	$departure_time = $_POST['departure_time'] ?? '00:00';

	// 	$sql = "SELECT p1.trip_id, p1.depart_Time as departure_Time, p2.arrive_time as arrival_time 
	// 			FROM PASS p1 
	// 			JOIN PASS p2 ON p1.trip_id = p2.trip_id 
	// 			WHERE p1.station_id = :start_station 
	// 			  AND p2.station_id = :end_station 
	// 			  AND p1.depart_Time > :departure_time 
	// 			  AND p1.depart_Time < p2.arrive_time
	// 			ORDER BY p1.depart_Time 
	// 			LIMIT 10";

	// 	try {
	// 		$statement = $pdo->prepare($sql);
	// 		$statement->bindParam(':start_station', $start_station);
	// 		$statement->bindParam(':end_station', $end_station);
	// 		$statement->bindParam(':departure_time', $departure_time);
	// 		$statement->execute();
	// 		$results = $statement->fetchAll(PDO::FETCH_ASSOC);

	// 		if ($results) {
	// 			echo "<table>";
	// 			echo "<tr><th>Trip ID</th><th>Departure Time</th><th>Arrival Time</th></tr>";
	// 			foreach ($results as $row) {
	// 				echo "<tr><td>" . $row['trip_id'] . "</td><td>" . $row['departure_time'] . "</td><td>" . $row['arrival_time'] . "</td></tr>";
	// 			}
	// 			echo "</table>";
	// 		} else {
	// 			echo "No trains found.";
	// 		}
	// 	} catch (PDOException $e) {
	// 		echo "Error executing query: " . $e->getMessage();
	// 	}
    // }
    ?>
     </div>
</body>
</html>
