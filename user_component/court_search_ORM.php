<!-- 場地搜索 By Buffett -->
<!-- 3-1.2 場地搜索 -->

<?php
require '../eloquent.php';

use Illuminate\Database\Capsule\Manager as DB;
?>


<!DOCTYPE html>
<html>
<head>
    <title>Court_search</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <h1>Welcome Hooper's User</h1>
    <div class="container">
    <form action="court_search.php" method="post">
        <div>
            <label for="court_search">Court Search:</label>
            <select name="court_search" id="court_search">
                <?php
                    $courts = DB::table('match')->get();
                    foreach ($courts as $court) {
                        $selected = ($_POST['court_search'] ?? '') == $court->courtid ? 'selected' : '';
                        echo "<option value='{$court->courtid}' {$selected}>{$court->courtname}</option>";
                    }
                ?>
            </select>
        </div>
        <input type="submit" value="Search">
    </form>

</body>

</html>

