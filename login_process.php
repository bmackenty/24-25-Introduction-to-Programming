<?php 

$username = $_POST['username'];
$password = $_POST['password'];

$secret_password="chainsaw_kitten";
$authorized_user = "test_user";

if($password == $secret_password){
    echo "Welcome $username";
} elseif ($username != $authorized_user) {
    echo "Error: This user is not authorized";
} else {
    echo "Error: this user's password is not correct.";
}

?>
