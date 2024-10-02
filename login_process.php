<?php 

// Include the database connection file to access the database.
include('database_inc.php');

// Capture the data from the POST request (form submission).
$username = $_POST['username'];
$password = $_POST['password'];

// Prepared statement to select the user data from the 'users' table based on the username.
// This helps prevent SQL injection attacks by using placeholders for user input.
$login_query = $connect->prepare("SELECT username, password FROM users WHERE username = ?");

// Bind the username to the placeholder in the query.
$login_query->bind_param("s", $username);

// Execute the query.
$login_query->execute();

// Store the result from the query.
$login_query->store_result();

// Check if the username exists in the database.
if ($login_query->num_rows > 0) {
    
    // Bind the result to variables (fetch the hashed password from the database).
    $login_query->bind_result($db_username, $db_hashed_password);
    $login_query->fetch();

    // Verify the entered password against the stored hashed password using password_verify().
    if (password_verify($password, $db_hashed_password)) {
        // If the password is correct, greet the user.
        echo "Welcome $username!";
    } else {
        // If the password is incorrect, show an error message.
        echo "Error: The password you entered is incorrect.";
    }

} else {
    // If the username doesn't exist, show an error message.
    echo "Error: This user is not authorized.";
}

// Close the prepared statement and the database connection.
$login_query->close();
$connect->close();

?>
