<!-- 場地搜索 By Buffett -->
<!-- 3-1.2 場地搜索 -->

<!DOCTYPE html>
<html>
<head>
    <title>court_search</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
 
    <div class="container">
        <!-- Button to go back to the previous page -->
        <button onclick="goBack()">Previous Page</button>

        <!-- Button to go back to the main page (index page) -->
        <button onclick="goToMainPage()">Main Page</button>

        <script>
            function goBack() { // Back to the previous page
                window.history.back();
            }

            function goToMainPage() { // Back to the main page
                window.location.href = "../index.php"; 
            }
        </script>
    </div>
</body>

</html>

