<?php
session_start();
?>

<nav>
    <ul>
        <li><a href="default_template.php">Home</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Services</a></li>
        <li><a href="#">Contact</a></li>

        <?php
        // Check if a user is logged in by checking the session.
        if (isset($_SESSION['username'])) {
            // If the user is logged in, display their username and show a "Logout" link.
            echo '<li><a href="#">Welcome, ' . htmlspecialchars($_SESSION['username']) . '</a></li>';
            echo '<li><a href="add_event.php">Add event</a></li>';
            echo '<li><a href="list_events.php">List events</a></li>';
            echo '<li><a href="logout.php">Logout</a></li>';
        } else {
            // If no user is logged in, show the "Login" and "Register" links.
            echo '<li><a href="login.php">Login</a></li>';
            echo '<li><a href="register.php">Register</a></li>';
        }
        ?>
    </ul>
</nav>
