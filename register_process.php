<?php 

include('database_inc.php');

// Capture the data from the POST request, which is submitted via a form.
// 'username', 'email', 'password', and 'confirm_password' are expected as input field names in the form.

// Storing the username entered by the user.
$username = $_POST['username']; 

// Storing the email entered by the user.
$email = $_POST['email']; 

// Storing the password entered by the user.
$password = $_POST['password']; 

// Storing the confirmation password entered by the user.
$confirm_password = $_POST['confirm_password']; 

// for now we will assume every user is active, but if we want to change this to "pending" later we can. 
$status = "active";

// Verify if the password and confirm password fields match
if ($password !== $confirm_password) {
    // If passwords do not match, terminate script execution and return an error message.
    die('Passwords do not match. Please go back and try again.');
}


// Hash the password using PHP's password_hash() function.
// The PASSWORD_DEFAULT constant uses the bcrypt algorithm by default.
// This ensures that the password is securely hashed before being stored in the database.

$hashed_password = password_hash($password, PASSWORD_DEFAULT);


$insert_query = "INSERT INTO users (username, email, password, status) VALUES ('$username', '$email', '$hased_password', '$status');";
$sql_result = mysqli_query($connect, $insert_query);
 ?>
