<?php 

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

$insert_query = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password');";
$sql_result = mysqli_query($connect, $insert_query);

?>
