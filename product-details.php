<?php include "style/header.php";


$id_details=$_GET["id"];

$product_details = $con->query("SELECT * FROM `products` WHERE id='$id_details'")->fetch_assoc();
?>

<section class="item-details section">
    <div class="container">
        <div class="top-area">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-12 col-12">
                    <div class="product-images">
                        <main id="gallery">
                            <div class="main-img">
                                <td style="width: 17%">
                                    <?php
                                   // Split the images string into an array of filenames
                                 $images = explode(',', $product_details['images']);
                                   // print_r($images['images']);
                                   // Display the first image
                                     ?>
                                    <img src="dashboard/images/<?php echo $images[0]?>" id="current" alt="#" />
                            </div>

                            <div class="images ">
                                <?php
                            // echo $product_details['images'];
                            foreach($images as $image) :
                             // echo $image;
                               
                            ?>
                                <img src="dashboard/images/<?php echo $image?>" class="img" alt="#" />
                                <?php endforeach?>
                            </div>
                        </main>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-12">
                    <div class="product-info">
                        <h2 class="title"><?php echo $product_details["name"]?></h2>
                        <p class="category">
                            <i class="lni lni-tag"></i> <?php echo $product_details["category"]?></a>
                        </p>
                        <h3 class="price">
                            $<?php echo $product_details["price"]?><span>$<?php echo $product_details["sale"]?></span>
                        </h3>
                        <p class="info-text">
                            <?php echo $product_details["description"]?>
                        </p>
                        <div class="row">


                            <div class="col-lg-4 col-md-4 col-12">
                                <div class="form-group quantity">
                                    <label for="color">Quantity</label>

                                    <select class="form-control">
                                        <?php 
                                    // حصل على الكمية المتاحة من المنتج
                                    $availableQuantity = $product_details["quantity"];
                                
                                    // عرض خيارات الكمية المتاحة
                                    for($i = 1; $i <= $availableQuantity; $i++) {
                                        echo "<option value=\"$i\">$i</option>";
                                    }
                                
                                    ?>

                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="bottom-content">
                            <div class="row align-items-end">
                                <div class="col-lg-4 col-md-4 col-12">
                                    <div class="button cart-button">
                                        <button class="btn" style="width: 100%">
                                            Add to Cart
                                        </button>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-4 col-12">
                                    <div class="wish-button">
                                        <button class="btn">
                                            <i class="lni lni-heart"></i> To Wishlist
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="product-details-info">

            <div class="row">
                <div class="col-lg-4 col-12">
                    <div class="single-block give-review">
                        <h4>4.5 (Overall)</h4>
                        <ul>
                            <li>
                                <span>5 stars - 38</span>
                                <i class="lni lni-star-filled"></i>
                                <i class="lni lni-star-filled"></i>
                                <i class="lni lni-star-filled"></i>
                                <i class="lni lni-star-filled"></i>
                                <i class="lni lni-star-filled"></i>
                            </li>
                            <li>
                                <span>4 stars - 10</span>
                                <i class="lni lni-star-filled"></i>
                                <i class="lni lni-star-filled"></i>
                                <i class="lni lni-star-filled"></i>
                                <i class="lni lni-star-filled"></i>
                                <i class="lni lni-star"></i>
                            </li>
                            <li>
                                <span>3 stars - 3</span>
                                <i class="lni lni-star-filled"></i>
                                <i class="lni lni-star-filled"></i>
                                <i class="lni lni-star-filled"></i>
                                <i class="lni lni-star"></i>
                                <i class="lni lni-star"></i>
                            </li>
                            <li>
                                <span>2 stars - 1</span>
                                <i class="lni lni-star-filled"></i>
                                <i class="lni lni-star-filled"></i>
                                <i class="lni lni-star"></i>
                                <i class="lni lni-star"></i>
                                <i class="lni lni-star"></i>
                            </li>
                            <li>
                                <span>1 star - 0</span>
                                <i class="lni lni-star-filled"></i>
                                <i class="lni lni-star"></i>
                                <i class="lni lni-star"></i>
                                <i class="lni lni-star"></i>
                                <i class="lni lni-star"></i>
                            </li>
                        </ul>

                        <button type="button" class="btn review-btn" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            Leave a Review
                        </button>
                    </div>
                </div>
                <div class="col-lg-8 col-12">
                    <div class="single-block">
                        <div class="reviews">
                            <h4 class="title">Latest Reviews</h4>

                            <div class="single-review">
                                <img src="assets/images/blog/comment1.jpg" alt="#" />
                                <div class="review-info">
                                    <h4>
                                        Awesome quality for the price
                                        <span>Jacob Hammond </span>
                                    </h4>
                                    <ul class="stars">
                                        <li><i class="lni lni-star-filled"></i></li>
                                        <li><i class="lni lni-star-filled"></i></li>
                                        <li><i class="lni lni-star-filled"></i></li>
                                        <li><i class="lni lni-star-filled"></i></li>
                                        <li><i class="lni lni-star-filled"></i></li>
                                    </ul>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                        sed do eiusmod tempor...
                                    </p>
                                </div>
                            </div>

                            <div class="single-review">
                                <img src="assets/images/blog/comment2.jpg" alt="#" />
                                <div class="review-info">
                                    <h4>
                                        My husband love his new...
                                        <span>Alex Jaza </span>
                                    </h4>
                                    <ul class="stars">
                                        <li><i class="lni lni-star-filled"></i></li>
                                        <li><i class="lni lni-star-filled"></i></li>
                                        <li><i class="lni lni-star-filled"></i></li>
                                        <li><i class="lni lni-star-filled"></i></li>
                                        <li><i class="lni lni-star"></i></li>
                                    </ul>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                        sed do eiusmod tempor...
                                    </p>
                                </div>
                            </div>

                            <div class="single-review">
                                <img src="assets/images/blog/comment3.jpg" alt="#" />
                                <div class="review-info">
                                    <h4>
                                        I love the built quality...
                                        <span>Jacob Hammond </span>
                                    </h4>
                                    <ul class="stars">
                                        <li><i class="lni lni-star-filled"></i></li>
                                        <li><i class="lni lni-star-filled"></i></li>
                                        <li><i class="lni lni-star-filled"></i></li>
                                        <li><i class="lni lni-star-filled"></i></li>
                                        <li><i class="lni lni-star-filled"></i></li>
                                    </ul>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                        sed do eiusmod tempor...
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade review-modal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Leave a Review</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="review-name">Your Name</label>
                            <input class="form-control" type="text" id="review-name" required />
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="review-email">Your Email</label>
                            <input class="form-control" type="email" id="review-email" required />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="review-subject">Subject</label>
                            <input class="form-control" type="text" id="review-subject" required />
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="review-rating">Rating</label>
                            <select class="form-control" id="review-rating">
                                <option>5 Stars</option>
                                <option>4 Stars</option>
                                <option>3 Stars</option>
                                <option>2 Stars</option>
                                <option>1 Star</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="review-message">Review</label>
                    <textarea class="form-control" id="review-message" rows="8" required></textarea>
                </div>
            </div>
            <div class="modal-footer button">
                <button type="button" class="btn">Submit Review</button>
            </div>
        </div>
    </div>
</div>
<script>
document.addEventListener("DOMContentLoaded", function() {
    // احصل على قائمة الصور
    var images = document.querySelectorAll(".images .img");

    // قم بإضافة حدث النقر إلى كل صورة
    images.forEach(function(image) {
        image.addEventListener("mouseover", function() {
            // قم بتحديث مصدر الصورة الرئيسية بمصدر الصورة التي تم النقر عليها
            document.getElementById("current").src = this.src;
        });
    });
});
</script>
<?php include "style/footer.php"?>