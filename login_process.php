<?php 

$username = $_POST['username'];
$password = $_POST['password'];

$real_password="chainsaw_kitten";

if($password == $real_password){
    echo "Welcome $username";
}else{
    echo "Incorrect password";
}

?>
