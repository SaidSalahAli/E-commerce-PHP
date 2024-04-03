<?php

include "../connect.php";
$id = $_POST['id'];
$old_img = $_POST['old_img'];
$name = $_POST['name'];
$price = $_POST['price'];
$sale = $_POST['sale'];
$count = $_POST['count'];
$category = $_POST['category'];
$img = $_FILES['img']['name'];

// $pas_hash = password_hash($password, PASSWORD_DEFAULT);

if (empty($img)){
     $update = $con->query("UPDATE `products` SET 
    `name`='$name', `price`='$price', `sale`='$sale', `count`='$count',`category`='$category' WHERE `id`='$id'");
    
    if ($update) {
        header("location:../../products.php?ms=success edite product");
    }
}else{
    if ($_FILES['img']['error'] == 0){
        $ex_img = pathinfo($img,PATHINFO_EXTENSION);
        $ex =['jpg','png','gif','jfg'];
          if (in_array($ex_img,$ex)){
            
    
            if($_FILES['img']['size'] <= 500000){
            $new_name = md5(uniqid()).".".$ex_img;
    
            move_uploaded_file($_FILES["img"]["tmp_name"],"../../images/$new_name");
            // echo"".$new_name."";
            $update = $con->query("UPDATE `products` SET 
            `name`='$name', `price`='$price', `sale`='$sale', `count`='$count',`category`='$category',`img`='$img'
             WHERE `id`='$id'");
            
            if ($update){
                unlink("../../images/$old_img");
                header("location:../../products.php?ms=Success add products");
            }else{
                header("location:../../products.php?products=add&ms=Success add products");
    
            }
    
     }else{
      header("location:../../products.php?products=add&ms=Success add products");
     }
    
     }
    }
}

 

?>