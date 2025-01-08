<?php
// edit_event.php
// This file allows users to edit a specific event by displaying its details in a form.

// Include the database connection and any shared configuration.
include 'database_inc.php';

// Check if an event ID is provided in the URL.
if (!isset($_GET['id']) || empty($_GET['id'])) {
    die('Error: No event ID provided.');
}

// Sanitize the event ID to prevent SQL injection.
$event_id = intval($_GET['id']);

// Retrieve the event details from the database.
$query = "SELECT * FROM events WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param('i', $event_id);
$stmt->execute();
$result = $stmt->get_result();

// Check if the event exists.
if ($result->num_rows === 0) {
    die('Error: Event not found.');
}

$event = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Event</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Edit Event</h1>
    <form action="edit_event_process.php" method="post">
        <!-- Hidden field to pass the event ID -->
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($event['id']); ?>">
        
        <label for="title">Title:</label>
        <input type="text" name="title" id="title" value="<?php echo htmlspecialchars($event['title']); ?>" required>
        
        <label for="date">Date:</label>
        <input type="date" name="date" id="date" value="<?php echo htmlspecialchars($event['date']); ?>" required>
        
        <label for="description">Description:</label>
        <textarea name="description" id="description" required><?php echo htmlspecialchars($event['description']); ?></textarea>
        
        <button type="submit">Update Event</button>
    </form>
</body>
</html>
