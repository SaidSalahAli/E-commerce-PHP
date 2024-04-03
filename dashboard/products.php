<?php include "style/header.php"?>
<div id="wrapper">

    <!-- Sidebar -->

    <?php include "style/sidebar.php"?>

    <div id="content-wrapper">

        <div class="container-fluid">

            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Overview</li>
            </ol>

            <?php 
          
          if(!isset($_GET['products'])){
            include "includes/products/view_products.php";
          }elseif( $_GET['products'] == "add"){
            include "includes/products/add_products.php";
          }elseif( $_GET['products'] == "edite"){
            include "includes/products/edite_products.php";
          }
          ?>
            <?php include "style/footer.php"?>