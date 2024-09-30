<?php 

include('database_inc.php');

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];
$status = "active";

$insert_query = "INSERT INTO users (username, email, password, status) VALUES ('$username', '$email', '$password', '$status');";
$sql_result = mysqli_query($connect, $insert_query);
 ?>
