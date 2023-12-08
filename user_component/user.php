<!-- USER PAGE LOGIN OR REGISTER USE -->
<!DOCTYPE html>
<html>
<head>
    <title>User page Login or Register</title>
    <link rel="stylesheet" href="user.css">
    
</head>

<body>
    <div class="container">
        <h1>Welcome Hooper's User</h1>
        <!-- <h2>NTUIM 112-1 Database Management Final Project</h2> -->
        <div class="link-container">
            <a href="register.php" class="search-link">使用者註冊</a>
            <a href="login.php" class="search-link">使用者登入</a>
            <a href="court_search.php" class="search-link">場地搜索</a>
            <a href="court_display.php" class="search-link">場地查看</a>
            <!-- <a href="court_search_ORM.php" class="search-link">場地搜索ORM</a> -->
            <a href="match_search.php" class="search-link">約戰發起</a>
            <!-- <a href="review.php" class="search-link">評價系統</a> -->
        </div>
    </div>

    <div class="container">
        <!-- Button to go back to the previous page and main page (index page) -->
        <button class="button previous" onclick="history.back();">Previous Page</button>
        <button class="button main" onclick="window.location.href='../index.php';">Main Page</button>
    </div>
</body>

</html>

