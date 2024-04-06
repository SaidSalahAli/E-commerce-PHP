<?php

include "../connect.php";

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
    $insert_query = "INSERT INTO `products`
        (`name`, `category`, `price`, `sale`, `description`, `quantity`, `images`, `stars`) VALUES 
        ('$name','$category','$price','$sale','$description','$quantity','$image_names_str','$stars')";

    $insert_result = $con->query($insert_query);

    if ($insert_result) {
        // echo "yes";
        header("location:../../products.php?ms=Success add products");
    } else {
        // echo "no";
        header("location:../../products.php?products=add&ms=Failed to add products");
    }
} else {
    echo "no";
}

?>