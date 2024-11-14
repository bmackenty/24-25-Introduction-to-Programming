<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event List</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Event List</h1>
    </header>
    
    <?php include 'navbar.php'; ?>
    
    <main>
        <h2>Upcoming Events</h2>
        
        <?php
        include 'database_inc.php';

        // Fetch events from the database
        $query = "SELECT id, event_name, event_date, event_description, start_time, duration, created_at FROM events ORDER BY event_date ASC";
        $result = mysqli_query($connect, $query);

        if (mysqli_num_rows($result) > 0) {
            echo '<table>';
            echo '<tr><th>Event Name</th><th>Date</th><th>Start Time</th><th>Duration</th><th>Actions</th></tr>';
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<tr>';
                echo '<td>' . htmlspecialchars($row['event_name']) . '</td>';
                echo '<td>' . htmlspecialchars($row['event_date']) . '</td>';
                echo '<td>' . htmlspecialchars($row['start_time']) . '</td>';
                echo '<td>' . htmlspecialchars($row['duration']) . '</td>';
                echo '<td>';
                echo '<a href="view_event.php?id=' . $row['id'] . '">View</a> | ';
                echo '<a href="edit_event.php?id=' . $row['id'] . '">Edit</a> | ';
                echo '<a href="delete_event.php?id=' . $row['id'] . '" onclick="return confirm(\'Are you sure you want to delete this event?\');">Delete</a>';
                echo '</td>';
                echo '</tr>';
            }
            echo '</table>';
        } else {
            echo '<p>No events found.</p>';
        }

        mysqli_close($connect);
        ?>
    </main>

<?php include('footer.php'); ?>
</body>
</html>
