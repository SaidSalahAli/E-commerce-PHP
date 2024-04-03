<?php 
include "../connect.php";
$id = $_GET['id'];

$name_old_img = $con->query("SELECT img FROM products WHERE id ='$id'")->fetch_assoc()["img"];

$delete = $con->query("DELETE FROM `products` WHERE id='$id' ");

if($delete) {
    unlink("../../images/$name_old_img");
    header("location:../../products.php?ms=success deleted products");
}


?>