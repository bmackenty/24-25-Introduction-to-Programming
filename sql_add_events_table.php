<?php

// Include the database connection file to connect to the database.
include('database_inc.php');

// SQL query to create the 'events' table if it does not already exist.
// The table includes columns for the event name, date, description, start time, and duration.
$create_table_query = "
    CREATE TABLE IF NOT EXISTS events (
        id INT AUTO_INCREMENT PRIMARY KEY,
        event_name VARCHAR(255) NOT NULL,
        event_date DATE NOT NULL,
        event_description TEXT NOT NULL,
        start_time TIME NOT NULL,
        duration DECIMAL(4, 2) NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    );
";

// Execute the query to create the table.
if ($connection->query($create_table_query) === TRUE) {
    echo "Table 'events' created successfully.";
} else {
    // Display an error message if the table could not be created.
    echo "Error creating table: " . $connection->error;
}

// Close the database connection.
$connection->close();

?>
