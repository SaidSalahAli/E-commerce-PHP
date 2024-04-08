<?php

include "../connect.php";
$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$gender = $_POST['gender'];
$prive = $_POST['prive'];

// $pas_hash = password_hash($password, PASSWORD_DEFAULT);



    $insart = $con->query("UPDATE `users` SET 
    `name`='$name', `email`='$email', `gender`='$gender', `prive`='$prive' WHERE `id`='$id'");
    
    if ($insart) {
        header("location:../../users.php?ms=success edite user");
    }

?>