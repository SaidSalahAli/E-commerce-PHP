<?php

include "../connect.php";
$id_edite = $_POST["id"];
$old_img = $_POST["old_img"];
$name = $_POST['name'];
$category = $_POST['category'];
$price = $_POST['price'];
$sale = $_POST['sale'];
$description = $_POST['description'];
$quantity = $_POST['quantity'];
$stars = $_POST['stars'];

$locations ='../../images/';

$image_names = []; // Array to hold uploaded file names

if (!empty($_FILES['images']['name'])) {
    $file_count = count($_FILES['images']['name']);
    
    // Loop through each uploaded file
    for ($i = 0; $i < $file_count; $i++) {
        $original_image_name = $_FILES['images']['name'][$i];
        echo''. $original_image_name .'<br>';
        $file_extension = pathinfo($original_image_name, PATHINFO_EXTENSION);
        // Generate a unique filename
        $unique_image_name = uniqid() . '_' . $i . '.' . $file_extension;
        $targetPath = $locations . $unique_image_name;
        move_uploaded_file($_FILES['images']['tmp_name'][$i], $targetPath);
        $image_names[] = $unique_image_name; // Store unique filename in array
    }

    $image_names_str = implode(',', $image_names); // Convert array to comma-separated string
    echo $image_names_str.'<br>';

    // Update query syntax correction and missing field replacement
    $update_query = "UPDATE `products` SET id= `name`='$name', `category`='$category', `price`='$price', `sale`='$sale', `description`='$description', `quantity`='$quantity', `images`='$image_names_str', `stars`='$stars' WHERE id='$id_edite'";

    $update = $con->query($update_query);

    if ($update) {
        // echo "yes";
        // Remove old image
        unlink("../../images/$old_img");
        header("location:../../products.php?ms=Success add products");
    } else {
        // echo "no";
        header("location:../../products.php?products=add&ms=Failed to add products");
    }
} else {
    echo "no";
}

?>