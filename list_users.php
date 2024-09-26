<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Basic Layout</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <h1>Header</h1>
    </header>
    <?php include 'navbar.php'; ?>
    <main>


        <h2>List of users</h2>
        <p>This is where your main content goes.</p>


        <table>
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">User email</th>
                    <th scope="col">Encypted Password</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>

<?php
    // This line includes an external PHP file 'database_inc.php'
    // which contains the database connection details such as the hostname, username, password, and database name.
    // It ensures the database connection is available here.
    include('database_inc.php'); 

    // This line sends a SQL query to the database to retrieve all rows from the 'users' table.
    // The 'mysqli_query()' function takes two parameters: the database connection and the SQL query.
    $result = mysqli_query(
        $connect, // Database connection object provided by 'database_inc.php'
        "SELECT * FROM users;" // SQL query: Select all records from the 'users' table
    );

    // This is a loop that iterates through the result set (the rows returned by the SQL query).
    // The 'mysqli_fetch_array()' function fetches one row at a time from the result set.
    // Each row is returned as an associative array, with column names as keys.
    while ($row = mysqli_fetch_array($result)) {
?>

    <!-- The HTML part below will generate a new table row for each user in the result set -->
    <tr>
        <!-- The 'scope' attribute is used for accessibility to describe the headers in the table -->
        <!-- This line outputs the 'id' column from the current row in the result set -->
        <th scope="row"><?php echo $row['id']; ?></th>

        <!-- This line outputs the 'email' column from the current row in the result set -->
        <td><?php echo $row['email']; ?></td>

        <!-- This line outputs the 'password' column (which is expected to be encrypted/hashed) from the current row -->
        <td><?php echo $row['password']; ?></td>

        <!-- This static text provides an action (in this case, "Edit this user") -->
        <!-- You might later replace this with a button or link to edit the user -->
        <td>Edit this user</td>
    </tr>

<?php
    // End of the loop. It will continue iterating until all rows in the result set are processed.
    }
?>

            </tbody>
        </table>


    </main>

    <?php include 'footer.php'; ?>
</body>

</html>
