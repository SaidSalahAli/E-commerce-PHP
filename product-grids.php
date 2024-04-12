<?php 
include "style/header.php";
$name_category = isset($_GET['category']) ? $_GET['category'] : '';
$search_name = isset($_GET['search']) ? $_GET['search'] : '';
$result ;
?>

<section class="product-grids section">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-12">
                <div class="product-sidebar">
                    <div class="single-widget search">
                        <h3>Search Product</h3>
                        <form action="" method='get'>
                            <input type="text" name='search' value="<?php echo htmlspecialchars($search_name); ?>"
                                placeholder="Search Here..." />
                            <button type="submit">
                                <i class="lni lni-search-alt"></i>
                            </button>
                        </form>
                    </div>

                    <div class="single-widget">
                        <h3>All Categories</h3>
                        <ul class="list">
                            <?php 
                              foreach ($all_categories as $category) :       
                            ?>
                            <li><a href="product-grids.php?category=<?php echo $category?>"><?php echo $category?></a>
                            </li>
                            <?php endforeach?>
                        </ul>
                    </div>



                    <div class="single-widget condition">
                        <h3>Filter by Price</h3>
                        <form action="" method="GET">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="50-100" name="price"
                                    id="flexCheckDefault1"
                                    <?php if(isset($_GET['price']) && $_GET['price'] == '50-100') echo 'checked'; ?> />
                                <label class="form-check-label" for="flexCheckDefault1">
                                    $50 - $100 (208)
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="100-500" name="price"
                                    id="flexCheckDefault2"
                                    <?php if(isset($_GET['price']) && $_GET['price'] == '100-500') echo 'checked'; ?> />
                                <label class="form-check-label" for="flexCheckDefault2">
                                    $100 - $500 (311)
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="500-1000" name="price"
                                    id="flexCheckDefault3"
                                    <?php if(isset($_GET['price']) && $_GET['price'] == '500-1000') echo 'checked'; ?> />
                                <label class="form-check-label" for="flexCheckDefault3">
                                    $500 - $1,000 (485)
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1000-5000" name="price"
                                    id="flexCheckDefault4"
                                    <?php if(isset($_GET['price']) && $_GET['price'] == '1000-5000') echo 'checked'; ?> />
                                <label class="form-check-label" for="flexCheckDefault4">
                                    $1,000 - $5,000 (213)
                                </label>
                            </div>
                            <button type="submit" class="btn btn-primary">Apply Filters</button>
                        </form>
                    </div>



                </div>
            </div>
            <div class="col-lg-9 col-12">
                <div class="product-grids-head">
                    <div class="product-grid-topbar">
                        <div class="row align-items-center">
                            <div class="col-lg-7 col-md-8 col-12">
                                <div class="product-sorting">
                                    <label for="sorting">Sort by:</label>
                                    <h3 class="total-show-product">
                                        Showing: <span>1 - <?php echo isset($result) ? $result->num_rows : '0'; ?>
                                        </span>
                                    </h3>
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-4 col-12">
                                <nav>
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                        <button class="nav-link active" id="nav-grid-tab" data-bs-toggle="tab"
                                            data-bs-target="#nav-grid" type="button" role="tab" aria-controls="nav-grid"
                                            aria-selected="true">
                                            <i class="lni lni-grid-alt"></i>
                                        </button>
                                        <button class="nav-link" id="nav-list-tab" data-bs-toggle="tab"
                                            data-bs-target="#nav-list" type="button" role="tab" aria-controls="nav-list"
                                            aria-selected="false">
                                            <i class="lni lni-list"></i>
                                        </button>
                                    </div>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-grid" role="tabpanel"
                            aria-labelledby="nav-grid-tab">
                            <div class="row">
                                <?php
                                  // Build the SQL query based on the category, search name, and price range
                                  $sql = "SELECT * FROM `products` WHERE 1=1";

                                  // Check if a category is selected
                                  if (!empty($name_category)) {
                                      $sql .= " AND category ='$name_category'";
                                  }

                                  // Check if a search query is provided
                                  if (!empty($search_name)) {
                                      $sql .= " AND name LIKE '%$search_name%'";
                                  }

                                  // Check the selected price range and modify the SQL query accordingly
                                  if (!empty($_GET['price'])) {
                                      $price_range = $_GET['price'];
                                      switch ($price_range) {
                                          case '50-100':
                                              $sql .= " AND price BETWEEN 50 AND 100";
                                              break;
                                          case '100-500':
                                              $sql .= " AND price BETWEEN 100 AND 500";
                                              break;
                                          case '500-1000':
                                              $sql .= " AND price BETWEEN 500 AND 1000";
                                              break;
                                          case '1000-5000':
                                              $sql .= " AND price BETWEEN 1000 AND 5000";
                                              break;
                                          default:
                                              // Handle other cases or set a default behavior
                                              break;
                                      }
                                  }

                                  // Execute the query
                                  $result = $con->query($sql);

                                  // Check if there are results
                                  if ($result->num_rows > 0) {
                                      // Loop through the results and display the products
                                      while ($product = $result->fetch_assoc()) {
                                          ?>

                                <div class="col-lg-3 col-md-6 col-12">
                                    <form action="functions/cart/addToCart.php" class="" method="POST">
                                        <input type="hidden" name="product_name" value="<?php echo $product['name'] ?>">
                                        <input type="hidden" name="product_id" value="<?php echo $product['id'] ?>">
                                        <input type="hidden" name="user_id" value="<?php echo $user_id ?>">
                                        <input type="hidden" name="product_price"
                                            value="<?php echo $product['price'] ?>">
                                        <div class="single-product">
                                            <div class="product-image">
                                                <?php
                                                // Split the images string into an array of filenames
                                                $images = explode(',', $product['images']);
                                                // Display the first image
                                                ?>
                                                <input type="hidden" name="product_image"
                                                    value="<?php echo $images[0] ?>">
                                                <img src="dashboard/images/<?php echo $images[0] ?>" alt="#" />
                                                <div class="button">
                                                    <button type="submit" name="add_to_cart" class="btn add_to_cart"><i
                                                            class="lni lni-cart"></i> Add to Cart</button>
                                                </div>
                                            </div>
                                            <div class="product-info">
                                                <span class="category"></span>
                                                <h4 class="title">
                                                    <a
                                                        href="product-details.php?id=<?php echo $product['id'] ?>"><?php echo $product['name'] ?></a>
                                                </h4>
                                                <ul class="review" style="padding: 0;">
                                                    <?php
                                // Display filled stars based on the number of stars
                                $filledStars = intval($product['stars']);
                                for ($i = 0; $i < $filledStars; $i++) {
                                    echo '<li style="font-size: larger;"><i class="lni lni-star-filled"></i></li>';
                                }
                                // Display empty stars for the remaining
                                $emptyStars = 5 - $filledStars;
                                for ($i = 0; $i < $emptyStars; $i++) {
                                    echo '<li><i class="lni lni-star"></i></li>';
                                }
                                ?>
                                                    <li><span><?php echo $product['stars'] ?>.0 Review(s)</span></li>
                                                </ul>
                                                <div class="price">
                                                    <span>$<?php echo $product['price'] ?>.00</span>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <?php
        }
    } else {
        // If no products found
        echo "No products found.";
    }
    ?>
                            </div>



                            <div class="row">
                                <div class="col-12">
                                    <div class="pagination left">
                                        <ul class="pagination-list">
                                            <li><a href="javascript:void(0)">1</a></li>
                                            <li class="active">
                                                <a href="javascript:void(0)">2</a>
                                            </li>
                                            <li><a href="javascript:void(0)">3</a></li>
                                            <li><a href="javascript:void(0)">4</a></li>
                                            <li>
                                                <a href="javascript:void(0)"><i class="lni lni-chevron-right"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-list" role="tabpanel" aria-labelledby="nav-list-tab">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-12">
                                    <div class="single-product">
                                        <div class="row align-items-center">
                                            <div class="col-lg-4 col-md-4 col-12">
                                                <div class="product-image">
                                                    <img src="assets/images/products/product-1.jpg" alt="#" />
                                                    <div class="button">
                                                        <a href="product-details.html" class="btn"><i
                                                                class="lni lni-cart"></i> Add to Cart</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-8 col-md-8 col-12">
                                                <div class="product-info">
                                                    <span class="category">Watches</span>
                                                    <h4 class="title">
                                                        <a href="product-grids.html">Xiaomi Mi Band 5</a>
                                                    </h4>
                                                    <ul class="review">
                                                        <li><i class="lni lni-star-filled"></i></li>
                                                        <li><i class="lni lni-star-filled"></i></li>
                                                        <li><i class="lni lni-star-filled"></i></li>
                                                        <li><i class="lni lni-star-filled"></i></li>
                                                        <li><i class="lni lni-star"></i></li>
                                                        <li><span>4.0 Review(s)</span></li>
                                                    </ul>
                                                    <div class="price">
                                                        <span>$199.00</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-12">
                                    <div class="single-product">
                                        <div class="row align-items-center">
                                            <div class="col-lg-4 col-md-4 col-12">
                                                <div class="product-image">
                                                    <img src="assets/images/products/product-2.jpg" alt="#" />
                                                    <span class="sale-tag">-25%</span>
                                                    <div class="button">
                                                        <a href="product-details.html" class="btn"><i
                                                                class="lni lni-cart"></i> Add to Cart</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-8 col-md-8 col-12">
                                                <div class="product-info">
                                                    <span class="category">Speaker</span>
                                                    <h4 class="title">
                                                        <a href="product-grids.html">Big Power Sound Speaker</a>
                                                    </h4>
                                                    <ul class="review">
                                                        <li><i class="lni lni-star-filled"></i></li>
                                                        <li><i class="lni lni-star-filled"></i></li>
                                                        <li><i class="lni lni-star-filled"></i></li>
                                                        <li><i class="lni lni-star-filled"></i></li>
                                                        <li><i class="lni lni-star-filled"></i></li>
                                                        <li><span>5.0 Review(s)</span></li>
                                                    </ul>
                                                    <div class="price">
                                                        <span>$275.00</span>
                                                        <span class="discount-price">$300.00</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-12">
                                    <div class="single-product">
                                        <div class="row align-items-center">
                                            <div class="col-lg-4 col-md-4 col-12">
                                                <div class="product-image">
                                                    <img src="assets/images/products/product-3.jpg" alt="#" />
                                                    <div class="button">
                                                        <a href="product-details.html" class="btn"><i
                                                                class="lni lni-cart"></i> Add to Cart</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-8 col-md-8 col-12">
                                                <div class="product-info">
                                                    <span class="category">Camera</span>
                                                    <h4 class="title">
                                                        <a href="product-grids.html">WiFi Security Camera</a>
                                                    </h4>
                                                    <ul class="review">
                                                        <li><i class="lni lni-star-filled"></i></li>
                                                        <li><i class="lni lni-star-filled"></i></li>
                                                        <li><i class="lni lni-star-filled"></i></li>
                                                        <li><i class="lni lni-star-filled"></i></li>
                                                        <li><i class="lni lni-star-filled"></i></li>
                                                        <li><span>5.0 Review(s)</span></li>
                                                    </ul>
                                                    <div class="price">
                                                        <span>$399.00</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-12">
                                    <div class="single-product">
                                        <div class="row align-items-center">
                                            <div class="col-lg-4 col-md-4 col-12">
                                                <div class="product-image">
                                                    <img src="assets/images/products/product-4.jpg" alt="#" />
                                                    <span class="new-tag">New</span>
                                                    <div class="button">
                                                        <a href="product-details.html" class="btn"><i
                                                                class="lni lni-cart"></i> Add to Cart</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-8 col-md-8 col-12">
                                                <div class="product-info">
                                                    <span class="category">Phones</span>
                                                    <h4 class="title">
                                                        <a href="product-grids.html">iphone 6x plus</a>
                                                    </h4>
                                                    <ul class="review">
                                                        <li><i class="lni lni-star-filled"></i></li>
                                                        <li><i class="lni lni-star-filled"></i></li>
                                                        <li><i class="lni lni-star-filled"></i></li>
                                                        <li><i class="lni lni-star-filled"></i></li>
                                                        <li><i class="lni lni-star-filled"></i></li>
                                                        <li><span>5.0 Review(s)</span></li>
                                                    </ul>
                                                    <div class="price">
                                                        <span>$400.00</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-12">
                                    <div class="single-product">
                                        <div class="row align-items-center">
                                            <div class="col-lg-4 col-md-4 col-12">
                                                <div class="product-image">
                                                    <img src="assets/images/products/product-7.jpg" alt="#" />
                                                    <span class="sale-tag">-50%</span>
                                                    <div class="button">
                                                        <a href="product-details.html" class="btn"><i
                                                                class="lni lni-cart"></i> Add to Cart</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-8 col-md-8 col-12">
                                                <div class="product-info">
                                                    <span class="category">Headphones</span>
                                                    <h4 class="title">
                                                        <a href="product-grids.html">PX7 Wireless Headphones</a>
                                                    </h4>
                                                    <ul class="review">
                                                        <li><i class="lni lni-star-filled"></i></li>
                                                        <li><i class="lni lni-star-filled"></i></li>
                                                        <li><i class="lni lni-star-filled"></i></li>
                                                        <li><i class="lni lni-star-filled"></i></li>
                                                        <li><i class="lni lni-star"></i></li>
                                                        <li><span>4.0 Review(s)</span></li>
                                                    </ul>
                                                    <div class="price">
                                                        <span>$100.00</span>
                                                        <span class="discount-price">$200.00</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="pagination left">
                                        <ul class="pagination-list">
                                            <li><a href="javascript:void(0)">1</a></li>
                                            <li class="active">
                                                <a href="javascript:void(0)">2</a>
                                            </li>
                                            <li><a href="javascript:void(0)">3</a></li>
                                            <li><a href="javascript:void(0)">4</a></li>
                                            <li>
                                                <a href="javascript:void(0)"><i class="lni lni-chevron-right"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php 




// session_start();
include "style/footer.php";
?>