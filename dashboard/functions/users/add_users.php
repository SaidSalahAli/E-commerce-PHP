<?php

include "../connect.php";

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$prive = $_POST['prive'];
$gender = $_POST['gender'];

$pas_hash = password_hash($password,PASSWORD_DEFAULT);

$num_email = $con->query("SELECT email FROM users WHERE email='$email'")->num_rows;

// Check if email is already in use
if ($num_email == 0) {
    $insart = $con->query("INSERT INTO `users`(`name`, `email`, `password`, `prive`,`gender` ) 
    VALUES ('$name','$email','$pas_hash','$prive','$gender')");
    if ($insart) {
        header("location:../../users.php?ms=success add user");
    }
} else {
        header("location:../../users.php?users=add&ms=email already in use");
}
?>