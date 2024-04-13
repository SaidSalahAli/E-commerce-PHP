<?php
include "../connect.php";

session_start(); 
$user_id = 0;

if(isset($_POST["user_id"])) {
    $user_id = $_POST["user_id"]; 
    $product_id = $_POST["product_id"];
    $product_name = $_POST["product_name"];
    $product_price = $_POST["product_price"];
    $product_image = $_POST["product_image"];
    $product_quantity = 1;

    $select_cart = $con->query("SELECT * FROM `cart` WHERE name = '$product_name'");
    if($select_cart->num_rows > 0){
        // Update the quantity if the product already exists in the cart
        $update_quantity_query = $con->query("UPDATE `cart` SET quantity = quantity + 1 WHERE name = '$product_name'");
        
        if($update_quantity_query){
            $_SESSION['message'] = 'Quantity updated in the cart';
            $_SESSION['messageClass'] = 'alert-success';
        } else {
            echo "Failed to update product quantity in the cart";
        }
    } else {
        // Insert new product if it doesn't exist in the cart
        $insert_product_query = $con->query("INSERT INTO `cart`(`id`, `name`, `price`, `image`, `quantity`, `user_id`) 
        VALUES ('$product_id','$product_name','$product_price','$product_image','$product_quantity','$user_id')");
        
        if($insert_product_query){
            $_SESSION['message'] = 'Product is added to the cart';
            $_SESSION['messageClass'] = 'alert-success';
        } else {
            echo "The product could not be added to the cart";
        }
    }
    
    header("Location: {$_SERVER['HTTP_REFERER']}");
    exit;
    
}

?>