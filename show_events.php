<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Show Events</title>
        <link rel="stylesheet" href="style.css">
    </head>

    <body>
        <header>
            <h1>Upcoming Events</h1>
        </header>

        <?php include 'navbar.php'; ?>

        <main>
            <h2>Event List</h2>
            
            <?php
            // Include the database connection file.
            include('database_inc.php');

            // SQL query to select all events from the 'events' table.
            $select_query = "SELECT event_name, event_date, event_description, start_time, duration FROM events ORDER BY event_date ASC";

            // Execute the query and store the result.
            $result = $connect->query($select_query);

            // Check if any events exist.
            if ($result->num_rows > 0) {
                // Start a table to display the events.
                echo '<table border="1">';
                echo '<tr>';
                echo '<th>Event Name</th>';
                echo '<th>Event Date</th>';
                echo '<th>Description</th>';
                echo '<th>Start Time</th>';
                echo '<th>Duration (hours)</th>';
                echo '</tr>';

                // Output each row of the result as a table row.
                while ($row = $result->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>' . htmlspecialchars($row['event_name']) . '</td>';
                    echo '<td>' . htmlspecialchars($row['event_date']) . '</td>';
                    echo '<td>' . htmlspecialchars($row['event_description']) . '</td>';
                    echo '<td>' . htmlspecialchars($row['start_time']) . '</td>';
                    echo '<td>' . htmlspecialchars($row['duration']) . '</td>';
                    echo '</tr>';
                }

                echo '</table>';
            } else {
                // If no events are found, display a message.
                echo '<p>No events found.</p>';
            }

            // Close the database connection.
            $connect->close();
            ?>
        </main>

        <?php include('footer.php'); ?>
    </body>
</html>
