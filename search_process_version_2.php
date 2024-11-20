<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Search Results</h1>
    </header>

    <?php
    include 'navbar.php';
    include 'database_inc.php';

    // Retrieve and sanitize search inputs
    // the ? : operator is a ternary operator that is a shorthand for an if-else statement
    $query = isset($_GET['query']) ? mysqli_real_escape_string($connect, $_GET['query']) : '';
    $category = isset($_GET['category']) ? mysqli_real_escape_string($connect, $_GET['category']) : 'all';
    $filters = isset($_GET['filters']) ? $_GET['filters'] : [];

    // Construct the SQL query with the additional filters
    // Change your table name from products to the name of your table!!
    $sql = "SELECT * FROM products WHERE name LIKE '%$query%'";

    // Apply category filter if selected
    // the .= operator appends the string to the existing string, so we are BUILDING the query
    if ($category !== 'all') {
        $sql .= " AND category = '$category'";
    }

    // Apply additional filters
    // Switch / case is a control structure that allows you to test the value of
    //  a variable and compare it with multiple values
    if (!empty($filters)) {
        foreach ($filters as $filter) {
            switch ($filter) {
                case 'recent':
                    $sql .= " AND created_at >= NOW() - INTERVAL 30 DAY"; // Example recent filter
                    break;
                case 'popular':
                    $sql .= " AND views > 1000"; // Example popular filter
                    break;
                case 'free':
                    $sql .= " AND price = 0"; // Example free filter
                    break;
                case 'rated':
                    $sql .= " AND rating >= 4"; // Example highly rated filter
                    break;
            }
        }
    }

    // Execute the query
    $result = mysqli_query($connect, $sql);
    ?>

    <main>
        <h2>Search Results for: "<?php echo htmlspecialchars($query); ?>"</h2>
        <ul>
            <?php
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<li><a href='product.php?id=" . $row['id'] . "'>" . htmlspecialchars($row['name']) . "</a> - " . htmlspecialchars($row['category']) . "</li>";
                }
            } else {
                echo "<div class='notification'><p>No results found. Please try another search or adjust your filters.</p></div>";
            }
            ?>
        </ul>
    </main>

    <?php include 'footer.php'; ?>
</body>
</html>
