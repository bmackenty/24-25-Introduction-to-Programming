<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results Page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Search Results Page</h1>
    </header>

    <?php 
    include 'navbar.php'; 
    ?>

    <main>
        <h2>Enter Your Search</h2>

        <!-- 
        The form below collects a search query and sends it to a PHP script named "search.php" using the GET method. 
        The "GET" method is used here because search queries typically do not alter server state.
        -->
        <form action="search_process.php" method="GET">
            <label for="search">Search:</label>
            <input type="text" id="search" name="query" placeholder="Enter search phrase" required>
            <button type="submit">Search</button>
        </form>
    
    
    
    </main>

<?php include 'footer.php'; ?>
</body>
</html>
