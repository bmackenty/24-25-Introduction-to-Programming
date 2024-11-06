<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Search Page</h1>
    </header>

    <?php include 'navbar.php'; ?>

    <main>
        <h2>Enter Your Search</h2>

        <!-- Search Form with Dropdowns and Checkboxes -->
        <form action="search_process_version_2.php" method="GET">
            <!-- Search Query Input -->
            <label for="search">Search:</label>
            <input type="text" id="search" name="query" placeholder="Enter search phrase" required>

            <!-- Dropdown for Category Selection -->
            <label for="category">Category:</label>
            <select id="category" name="category">
                <option value="all">All Categories</option>
                <option value="books">Books</option>
                <option value="articles">Articles</option>
                <option value="videos">Videos</option>
                <option value="blogs">Blogs</option>
            </select>

            <!-- Checkbox Filters -->
            <fieldset>
                <legend>Filters:</legend>
                <label>
                    <input type="checkbox" name="filters[]" value="recent"> Recent
                </label>
                <label>
                    <input type="checkbox" name="filters[]" value="popular"> Popular
                </label>
                <label>
                    <input type="checkbox" name="filters[]" value="free"> Free
                </label>
                <label>
                    <input type="checkbox" name="filters[]" value="rated"> Highly Rated
                </label>
            </fieldset>

            <!-- Submit Button -->
            <button type="submit">Search</button>
        </form>
    </main>

    <?php include 'footer.php'; ?>
</body>
</html>
