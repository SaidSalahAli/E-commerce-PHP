<?php 
include "../connect.php";
$id = $_GET['id'];

$name_old_img = $con->query("SELECT images FROM products WHERE id ='$id'")->fetch_assoc()["images"];

$delete = $con->query("DELETE FROM `products` WHERE id='$id' ");

if($delete) {
    unlink("../../images/$name_old_img");
    header("location:../../products.php?ms=success deleted products");
}


?>