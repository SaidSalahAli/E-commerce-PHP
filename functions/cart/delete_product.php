<?php
session_start();
include "../connect.php";


    $product_id = $_GET["id"];

    // استعلام لحذف المنتج من جدول السلة
    $delete_query = $con->query("DELETE FROM `cart` WHERE id = '$product_id'");
    
    if($delete_query) {
        // تمت العملية بنجاح
        $_SESSION['message'] = 'Product deleted successfully!';
        $_SESSION['messageClass'] = 'alert-success';
        header("Location: {$_SERVER['HTTP_REFERER']}");
    } else {
        // حدث خطأ في العملية
        echo "Error deleting product!";
        
    }
// } else {
//     // إذا لم يتم تمرير معرف المنتج
//     echo "Product ID is not provided!";
// }