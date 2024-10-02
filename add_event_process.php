<?php 

// Include the database connection file.
include('database_inc.php');

// Capture the form data submitted by the user.
$event_name = $_POST['event_name'];
$event_date = $_POST['event_date'];
$event_description = $_POST['event_description'];
$start_time = $_POST['start_time'];
$duration = $_POST['duration'];

// Prepare an SQL statement to insert the event data into the database.
// It is good practice to use prepared statements to prevent SQL injection.
$insert_event = $connect->prepare("INSERT INTO events (event_name, event_date, event_description, start_time, duration) VALUES (?, ?, ?, ?, ?)");

// Bind the form data to the SQL query parameters.
$insert_event->bind_param("ssssd", $event_name, $event_date, $event_description, $start_time, $duration);

// Execute the query.
if ($insert_event->execute()) {
    // If the query was successful, redirect or show a success message.
    echo "Event added successfully!";
} else {
    // If there was an error, display an error message.
    echo "Error: " . $insert_event->error;
}

// Close the prepared statement and the database connection.
$insert_event->close();
$connect->close();

?>
