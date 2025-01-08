<?php
// edit_event_process.php
// This file processes the form submission to update an event in the database.

// Include the database connection and any shared configuration.
include 'database_inc.php';

// Check if the required POST data is set.
if (!isset($_POST['id'], $_POST['title'], $_POST['date'], $_POST['description'])) {
    die('Error: Missing form data.');
}

// Sanitize and validate input data.
$event_id = intval($_POST['id']);
$title = trim($_POST['title']);
$date = trim($_POST['date']);
$description = trim($_POST['description']);

// Perform basic validation.
if (empty($title) || empty($date) || empty($description)) {
    die('Error: All fields are required.');
}

// Update the event in the database.
$query = "UPDATE events SET title = ?, date = ?, description = ? WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param('sssi', $title, $date, $description, $event_id);

// Execute the query and check for errors.
if ($stmt->execute()) {
    echo "Event updated successfully.";
    echo '<a href="view_event.php?id=' . htmlspecialchars($event_id) . '">View updated event</a>';
} else {
    die('Error: Unable to update event.');
}
?>
