<!-- USER PAGE LOGIN OR REGISTER USE -->
<!DOCTYPE html>
<html>
<head>
    <title>User page Login or Register</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <div class="container">
        <h1>Welcome Hooper's User</h1>
        <!-- <h2>NTUIM 112-1 Database Management Final Project</h2> -->
        <div class="link-container">
            <a href="register.php" class="search-link">使用者註冊</a>
            <a href="login.php" class="search-link">使用者登入</a>
            <a href="court_search.php" class="search-link">場地搜索</a>
            <a href="match_search.php" class="search-link">約戰發起</a>
            <!-- <a href="review.php" class="search-link">評價系統</a> -->
        </div>
    </div>

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

