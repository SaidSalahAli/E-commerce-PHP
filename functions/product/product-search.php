<?php
include "../connect.php";

// استقبال البيانات المرسلة من صفحة jQuery
$search = $_GET['search'];
$category = $_GET['category'];

// استعلام SQL لاسترداد المنتجات المطابقة
$all_product = $con->query("SELECT * FROM `products` WHERE category = '$category' AND name LIKE '%$search%'");

// عرض المنتجات
foreach($all_product as $product):
    // يمكنك عرض كل منتج هنا بناءً على الاستجابة التي تم إرجاعها
endforeach;
?>