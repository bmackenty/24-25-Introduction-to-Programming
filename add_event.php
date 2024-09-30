<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Add Event</title>
        <link rel="stylesheet" href="style.css">
    </head>

    <body>
        <header>
            <h1>Add a New Event</h1>
        </header>

        <?php include 'navbar.php'; ?>

        <main>
            <h2>Event Details</h2>
            <!-- This form will take input from the user for the event's name, date, description, start time, and duration -->
            <form action="add_event_process.php" method="POST">
                <!-- Event Name Field -->
                <label for="event_name">Event Name:</label>
                <input type="text" id="event_name" name="event_name" required><br><br>

                <!-- Event Date Field -->
                <label for="event_date">Event Date:</label>
                <input type="date" id="event_date" name="event_date" required><br><br>

                <!-- Event Description Field -->
                <label for="event_description">Event Description:</label><br>
                <textarea id="event_description" name="event_description" rows="4" cols="50" required></textarea><br><br>

                <!-- Event Start Time Field -->
                <label for="start_time">Start Time:</label>
                <input type="time" id="start_time" name="start_time" required><br><br>

                <!-- Event Duration Field -->
                <label for="duration">Duration (in hours):</label>
                <input type="number" id="duration" name="duration" min="0.5" step="0.5" required><br><br>

                <!-- Submit Button -->
                <input type="submit" value="Add Event">
            </form>
        </main>

        <?php include('footer.php'); ?>
    </body>
</html>
