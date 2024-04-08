<?php
include "../connect.php";

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$prive = $_POST['prive'];
$gender = $_POST['gender'];
$pas_hash = password_hash($password,PASSWORD_DEFAULT);
$num_email = $con->query("SELECT email FROM users WHERE email='$email'")->num_rows;
$insart = $con->query("INSERT INTO `users`(`name`, `email`, `password`, `prive`,`gender` ) 
VALUES ('$name','$email','$pas_hash','$prive','$gender')");
// Check if email is already in use
if ($num_email == 0) {
    if ($insart) {
        echo "<div class='alert alert-success' role='alert'>
        Success add user
        </div>";
        exit; // Stop further execu

    } else {
        echo "<div class='alert alert-danger' role='alert'>
        Failed to add user
        </div>";
        // Add any error handling here if necessary
    }
}else {
    echo "<div class='alert alert-danger' role='alert'>
    email already in use
    </div>";
    // header("Location: ../../login.php?&ms=email already in use");
    // exit; // Stop further execution
}




// $insart = $con->query("INSERT INTO `users`(`name`, `email`, `password`, `prive`,`gender` ) 
// VALUES ('$name','$email','$pas_hash','$prive','$gender')");