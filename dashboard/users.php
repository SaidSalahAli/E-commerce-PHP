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
          
          if(!isset($_GET['users'])){
            include "includes/users/view.php";
          }elseif( $_GET['users'] == "add"){
            include "includes/users/add.php";
          }elseif( $_GET['users'] == "edite"){
            include "includes/users/edite.php";
          }
          ?>
            <?php include "style/footer.php"?>