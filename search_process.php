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
    include('database_inc.php');
    $query = $_GET['query'];
    // sanitize query: 
    $query = mysqli_real_escape_string($connect, $query);

    ?>
    <main>
        <h2>Search Results</h2>
        <p>Results for: <?php echo $query; ?></p>
        <ul>
            <?php
            // this is an important - this query looks at a table named "products" and a column named "name". Is that what you want to work through?
            $sql = "SELECT * FROM products WHERE name LIKE '%$query%'";
            $result = mysqli_query($connect, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<li><a href='product.php?id=" . $row['id'] . "'>" . $row['name'] . "</a></li>";
                }
            } else {
            ?>
                <div class="notification">
                    <p>No results found. Please try your search <a href="search.php">again</a></p>
                </div>

            <?php
            }
            ?>
        </ul>
        <main>




        </main>

        <?php include 'footer.php'; ?>
</body>

</html>
