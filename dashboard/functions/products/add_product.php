<?php

include "../connect.php";

$name = $_POST['name'];
$price = $_POST['price'];
$sale = $_POST['sale'];
$count = $_POST['count'];
$category = $_POST['category'];
$img = $_FILES['img']['name'];
// print_r($_FILES['img']);
 if ($_FILES['img']['error'] == 0){
    $ex_img = pathinfo($img,PATHINFO_EXTENSION);
    $ex =['jpg','png','gif','jfg'];
      if (in_array($ex_img,$ex)){
        

        if($_FILES['img']['size'] <= 500000){
        $new_name = md5(uniqid()).".".$ex_img;

        move_uploaded_file($_FILES["img"]["tmp_name"],"../../images/$new_name");
        // echo"".$new_name."";
        $insart = $con->query("INSERT INTO `products`
        (`name`, `price`, `sale`, `count`, `category`,`img`) VALUES 
        ('$name','$price','$sale','$count','$category','$new_name')");
        if ($insart){
            header("location:../../products.php?ms=Success add products");
        }else{
            header("location:../../products.php?products=add&ms=Success add products");

        }

 }else{
  header("location:../../products.php?products=add&ms=Success add products");
 }

 }
}
?>