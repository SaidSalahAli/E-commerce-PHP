<?php 
session_start();


include "functions/connect.php";
$user_id = null;
if (isset($_SESSION["login_users"]) && !empty($_SESSION["login_users"])){
    $data = $_SESSION["login_users"];
    $user_id =$data['id'];
}

$count_query =$con->query("SELECT * FROM cart WHERE user_id ='$user_id'") or die('query feiled') ;
// $resu
$total_products = mysqli_num_rows( $count_query ) ;



$all_categories_query = $con->query("SELECT DISTINCT category FROM products") or die('query failed');
$all_categories = array(); 

while ($row = $all_categories_query->fetch_assoc()) {
    $all_categories[] = $row['category'];
}




?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>
        Single Product - ShopGrids Bootstrap 5 eCommerce HTML Template.
    </title>
    <meta name="description" content="" />
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1" /> -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.svg" />
    <link rel="stylesheet" href="assets/css/main.css" />
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/LineIcons.3.0.css" />
    <link rel="stylesheet" href="assets/css/tiny-slider.css" />
    <link rel="stylesheet" href="assets/css/glightbox.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>


<body>
    <!-- <div class="preloader">
        <div class="preloader-inner">
            <div class="preloader-icon">
                <span></span>
                <span></span>
            </div>
        </div>
    </div> -->
    <header class="header navbar-area">
        <div class="topbar">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 col-md-4 col-12">
                        <div class="top-left">
                            <ul class="menu-top-link">
                                <li>
                                    <div class="select-position">
                                        <select id="select4">
                                            <option value="0" selected>$ USD</option>
                                            <option value="1">€ EURO</option>
                                            <option value="2">$ CAD</option>
                                            <option value="3">₹ INR</option>
                                            <option value="4">¥ CNY</option>
                                            <option value="5">৳ BDT</option>
                                        </select>
                                    </div>
                                </li>
                                <li>
                                    <div class="select-position">
                                        <select id="select5">
                                            <option value="0" selected>English</option>
                                            <option value="1">Español</option>
                                            <option value="2">Filipino</option>
                                            <option value="3">Français</option>
                                            <option value="4">العربية</option>
                                            <option value="5">हिन्दी</option>
                                            <option value="6">বাংলা</option>
                                        </select>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-12">
                        <div class="top-middle">
                            <ul class="useful-links">
                                <li><a href="index.php">Home</a></li>
                                <li><a href="about-us.php">About Us</a></li>
                                <li><a href="contact.php">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-12">
                        <div class="top-end">
                            <div class="user">
                                <i class="lni lni-user"></i>
                                <?php echo isset( $data['name']) ? $data['name']:"Hello"?>
                            </div>
                            <ul class="user-login">

                                <?php
                                    // Check if user data exists in session
                                    if (isset($_SESSION["login_users"])) {
                                        // User data exists, so display the user's name
                                        echo "<li><a href='functions/loguot.php'>Log out</a></li>";

                                    } else {
                                        // User data doesn't exist, display a generic welcome message
                                        echo " <li>
                                        <a href='login.php'>Sign In</a>
                                    </li>
                                    <li>
                                        <a href='register.php'>Register</a>
                                    </li>";
                                    }
                                    ?>


                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="header-middle">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-3 col-7">
                        <a class="navbar-brand" href="index-2.html">
                            <img src="assets/images/logo/logo.svg" alt="Logo" />
                        </a>
                    </div>
                    <div class="col-lg-5 col-md-7 d-xs-none">
                        <div class="main-menu-search">
                            <div class="navbar-search search-style-5">
                                <div class="search-select">
                                    <div class="select-position">
                                        <select id="select1">
                                            <option selected>All</option>
                                            <option value="1">option 01</option>
                                            <option value="2">option 02</option>
                                            <option value="3">option 03</option>
                                            <option value="4">option 04</option>
                                            <option value="5">option 05</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="search-input">
                                    <input type="text" placeholder="Search" />
                                </div>
                                <div class="search-btn">
                                    <button><i class="lni lni-search-alt"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-2 col-5">
                        <div class="middle-right-area">
                            <div class="nav-hotline">
                                <i class="lni lni-phone"></i>
                                <h3>
                                    Hotline:
                                    <span>(+100) 123 456 7890</span>
                                </h3>
                            </div>
                            <div class="navbar-cart">
                                <div class="wishlist">
                                    <a href="javascript:void(0)">
                                        <i class="lni lni-heart"></i>
                                        <span class="total-items">0</span>
                                    </a>
                                </div>
                                <div class="cart-items">
                                    <a href="javascript:void(0)" class="main-btn">
                                        <i class="lni lni-cart"></i>
                                        <span class="total-items"><?php echo $total_products; ?></span>
                                    </a>

                                    <div class="shopping-item">
                                        <div class="dropdown-cart-header">
                                            <span><?php echo $total_products; ?></span>
                                            <a href="cart.php">View Cart</a>
                                        </div>
                                        <ul class="shopping-list">
                                            <?php
                                             $total_price = 0;
                                           // لام لاسترداد السجلات كمصفوفة
                                            $cart_query = $con->query("SELECT * FROM `cart` WHERE user_id ='$user_id'");
                                            
                                            if ($cart_query) {
                                                // التأكد من أن النتائج غير فارغة
                                                if ($cart_query->num_rows > 0) {
                                                    // حلقة foreach لعرض كل سجل في النتائج
                                                    while ($cart_item = $cart_query->fetch_assoc()) {   
                                                        $total_price += $cart_item["price"];                                                             
                                             ?>
                                            <li>
                                                <a href="functions/cart/delete_product.php?id=<?php echo $cart_item["id"]?>"
                                                    class="remove" title="Remove this item"><i
                                                        class="lni lni-close"></i></a>

                                                <div class="cart-img-head">
                                                    <a class="cart-img" href="product-details.php"><img
                                                            src="dashboard/images/<?php echo $cart_item["image"]?>"
                                                            alt="#" /></a>
                                                </div>
                                                <div class="content">
                                                    <h4>
                                                        <a href="product-details.php?id=<?php echo $cart_item["id"]?>">
                                                            <?php echo $cart_item["name"]?>
                                                        </a>
                                                    </h4>
                                                    <p class="quantity">
                                                        <?php echo $cart_item["quantity"]?><span
                                                            class="amount">$<?php echo $cart_item["price"]?></span>
                                                    </p>
                                                </div>
                                            </li>
                                            <?php
                                                   }
                                                } else {
                                                
                                                    echo "No items in cart";
                                                }
                                            } else {                                              echo "Error executing query: " . $con->error;
                                                 } 
                                             ?>
                                        </ul>
                                        <div class="bottom">
                                            <div class="total">
                                                <span>Total</span>
                                                <span class="total-amount">$<?php echo $total_price?></span>
                                            </div>
                                            <div class="button">
                                                <a href="checkout.html" class="btn animate">Checkout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8 col-md-6 col-12">
                    <div class="nav-inner">
                        <div class="mega-category-menu">
                            <span class="cat-button"><i class="lni lni-menu"></i>All Categories</span>
                            <ul class="sub-category">
                                <?php 
                                    foreach ($all_categories as $category) :
                           
                                   
                                    
                                    
                                    ?>
                                <li><a
                                        href="product-grids.php?category=<?php echo $category?>"><?php echo $category?></a>
                                </li>
                                <?php endforeach?>

                            </ul>
                        </div>

                        <nav class="navbar navbar-expand-lg">
                            <button class="navbar-toggler mobile-menu-btn" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                                <ul id="nav" class="navbar-nav ms-auto">
                                    <li class="nav-item">
                                        <a href="index.php" aria-label="Toggle navigation">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="dd-menu collapsed" href="javascript:void(0)" data-bs-toggle="collapse"
                                            data-bs-target="#submenu-1-2" aria-controls="navbarSupportedContent"
                                            aria-expanded="false" aria-label="Toggle navigation">Pages</a>
                                        <ul class="sub-menu collapse" id="submenu-1-2">
                                            <li class="nav-item">
                                                <a href="about-us.html">About Us</a>
                                            </li>
                                            <li class="nav-item"><a href="faq.html">Faq</a></li>
                                            <li class="nav-item"><a href="login.html">Login</a></li>
                                            <li class="nav-item">
                                                <a href="register.html">Register</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="mail-success.html">Mail Success</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="404.html">404 Error</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="nav-item">
                                        <a class="dd-menu active collapsed" href="javascript:void(0)"
                                            data-bs-toggle="collapse" data-bs-target="#submenu-1-3"
                                            aria-controls="navbarSupportedContent" aria-expanded="false"
                                            aria-label="Toggle navigation">Shop</a>
                                        <ul class="sub-menu collapse" id="submenu-1-3">
                                            <li class="nav-item">
                                                <a href="product-grids.html">Shop Grid</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="product-list.html">Shop List</a>
                                            </li>
                                            <li class="nav-item active">
                                                <a href="product-details.html">shop Single</a>
                                            </li>
                                            <li class="nav-item"><a href="cart.html">Cart</a></li>
                                            <li class="nav-item">
                                                <a href="checkout.html">Checkout</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="nav-item">
                                        <a class="dd-menu collapsed" href="javascript:void(0)" data-bs-toggle="collapse"
                                            data-bs-target="#submenu-1-4" aria-controls="navbarSupportedContent"
                                            aria-expanded="false" aria-label="Toggle navigation">Blog</a>
                                        <ul class="sub-menu collapse" id="submenu-1-4">
                                            <li class="nav-item">
                                                <a href="blog-grid-sidebar.html">Blog Grid Sidebar</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="blog-single.html">Blog Single</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="blog-single-sidebar.html">Blog Single Sibebar</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="nav-item">
                                        <a href="contact.html" aria-label="Toggle navigation">Contact Us</a>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="nav-social">
                        <h5 class="title">Follow Us:</h5>
                        <ul>
                            <li>
                                <a href="javascript:void(0)"><i class="lni lni-facebook-filled"></i></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><i class="lni lni-twitter-original"></i></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><i class="lni lni-instagram"></i></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><i class="lni lni-skype"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>