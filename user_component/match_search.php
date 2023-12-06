<!-- 場地搜索 By SamJay Lin -->
<!-- 3-3.4 約戰搜尋、參與 -->

<!DOCTYPE html>
<html>
<head>
    <title>match_search</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
 
    <div class="container">
        <!-- Button to go back to the previous page -->
        <button onclick="goBack()">Previous Page</button>

        <!-- Button to go back to the main page (index page) -->
        <button onclick="goToMainPage()">Main Page</button>

        <script>
            // Back to the previous page
            function goBack() { 
                window.history.back();
            }

            // Back to the main page
            function goToMainPage() { 
                window.location.href = "../index.php"; 
            }
        </script>
    </div>
</body>

</html>

