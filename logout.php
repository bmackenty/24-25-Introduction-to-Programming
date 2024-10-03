<!DOCTYPE html>
<?php session_start(); ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>You Have Logged Out</h1>
    </header>

<?php include('navbar.php'); ?>

    <main>
        <h2>Thank You for Visiting</h2>
        <?php
            session_unset(); // Unset all session variables
            session_destroy(); // Destroy the session
            header("Location: login.php"); // Redirect to the login page
            exit();
        ?>
        <p>You have successfully logged out. If you wish to log in again, please click <a href="login.html">here</a>.</p>
    </main>

<?php include('footer.php'); ?>

</body>
</html>
