<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Event</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Event Details</h1>
    </header>
    
    <?php include 'navbar.php'; ?>
    
    <main>
        <?php
        include 'database_inc.php';

        // Check if an event ID is passed in the URL
        if (isset($_GET['id'])) {
            $event_id = intval($_GET['id']);

            // Query to fetch the event data from the database
            $query = "SELECT event_name, event_date, event_description, start_time, duration, created_at FROM events WHERE id = ?";
            $stmt = mysqli_prepare($connect, $query);
            mysqli_stmt_bind_param($stmt, "i", $event_id);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if (mysqli_num_rows($result) > 0) {
                // Fetch and display event data in a table
                $row = mysqli_fetch_assoc($result);
                echo '<table>';
                echo '<tr><th>Field</th><th>Details</th></tr>';
                echo '<tr><td><strong>Event Name</strong></td><td>' . htmlspecialchars($row['event_name']) . '</td></tr>';
                echo '<tr><td><strong>Date</strong></td><td>' . htmlspecialchars($row['event_date']) . '</td></tr>';
                echo '<tr><td><strong>Start Time</strong></td><td>' . htmlspecialchars($row['start_time']) . '</td></tr>';
                echo '<tr><td><strong>Duration</strong></td><td>' . htmlspecialchars($row['duration']) . ' hours</td></tr>';
                echo '<tr><td><strong>Description</strong></td><td>' . htmlspecialchars($row['event_description']) . '</td></tr>';
                echo '<tr><td><strong>Created At</strong></td><td>' . htmlspecialchars($row['created_at']) . '</td></tr>';
                echo '</table>';

                // Action buttons
                echo '<div class="actions">';
                echo '<a href="edit_event.php?id=' . $event_id . '" class="button">Edit Event</a> ';
                echo '<a href="delete_event.php?id=' . $event_id . '" class="button" onclick="return confirm(\'Are you sure you want to delete this event?\');">Delete Event</a>';
                echo '</div>';
            } else {
                echo '<p>Event not found.</p>';
            }

            mysqli_stmt_close($stmt);
        } else {
            echo '<p>No event selected.</p>';
        }

        mysqli_close($connect);
        ?>
    </main>

<?php include 'footer.php'; ?>
</body>
</html>
