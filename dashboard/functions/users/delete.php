<?php

include "../connect.php";
$id = $_GET['id'];
echo''.$id.'';
$delete = $con->query("DELETE FROM `users` WHERE id='$id'");
if($delete) {
    header("location:../../users.php?ms=success deleted user");
}