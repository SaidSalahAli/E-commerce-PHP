<?php
include "../connect.php";

$messages=[];

if(isset($_POST["add_to_cart"])  ){
$user_id = $_POST["user_id"] ; 
$product_id = $_POST["product_id"];
$product_name = $_POST["product_name"];
$product_price = $_POST["product_price"];
$product_image = $_POST["product_image"];

$product_quntity = 1;



$select_cart = $con->query("SELECT * FROM `cart` WHERE name = '$product_name'")->num_rows;
if($select_cart > 0){
    header("Location: {$_SERVER['HTTP_REFERER']}");

    $messages[] ='prodect already add to cart';
}else{
    $insart_product = $con->query("INSERT INTO `cart`(`id`, `name`, `price`, `image`, `quantity`, `user_id`) 
    VALUES ('$product_id','$product_name','$product_price','$product_image','$product_quntity','$user_id')");
        header("Location: {$_SERVER['HTTP_REFERER']}");

    $messages[] ='prodect added to cart succesfull!';
    

}


}
?>