<?php
 $id_edite =$_GET['id'];
 $product = $con->query("SELECT * FROM `products` WHERE id='$id_edite'")->fetch_assoc();

?>




<form method="post" action="functions/products/edite_product.php" enctype='multipart/form-data'
    style="width: 95%;margin:auto;">
    <input type="hidden" value="<?= $product["images"] ?>" name="old_img">
    <input type="hidden" value="<?= $id_edite ?>" name="id">
    <div class="form-group">
        <label for="exampleInputEmail1">Name</label>
        <input type="text" value="<?php echo $product['name']?>" name="name" placeholder="name" class="form-control"
            id="exampleInputEmail1">
    </div>

    <div class="form-group">
        <label for="exampleFormControlSelect1">All Categories</label>
        <select name="category" class="form-control" id="exampleFormControlSelect1">
            <option value="Digital Cameras" <?php echo $product['category'] == "Digital Cameras"? "selected" :"" ?>>
                Digital Cameras</option>
            <option value="Camera Drones" <?php echo $product['category'] == "Camera Drones"? "selected" :"" ?>>Camera
                Drones</option>
            <option value="Smart Watches" <?php echo $product['category'] == "Smart Watches"? "selected" :"" ?>>Smart
                Watches</option>
            <option value="Headphones" <?php echo $product['category'] == "Headphones"? "selected" :"" ?>>Headphones
            </option>
            <option value="MP3 Players" <?php echo $product['category'] == "MP3 Players"? "selected" :"" ?>>MP3 Players
            </option>
            <option value="Microphones" <?php echo $product['category'] == "Microphones"? "selected" :"" ?>>Microphones
            </option>
            <option value="Chargers" <?php echo $product['category'] == "Chargers"? "selected" :"" ?>>Chargers</option>
            <option value="Batteries" <?php echo $product['category'] == "Batteries"? "selected" :"" ?>>Batteries
            </option>
        </select>
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Price</label>
        <input type="number" value="<?php echo $product['price']?>" required name="price" class="form-control"
            id="exampleInputEmail1" placeholder="price">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Sale</label>
        <input type="number" value="<?php echo $product['sale']?>" required name="sale" placeholder="sale"
            class="form-control" id="exampleInputEmail1">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">description</label>
        <input type="text" required value="<?php echo $product['description']?>" name="description"
            placeholder="description" class="form-control" id="exampleInputEmail1">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">quantity</label>
        <input type="number" required value="<?php echo $product['quantity']?>" name="quantity" placeholder="quantity"
            class="form-control" id="exampleInputEmail1">
    </div>
    <div class="form-group">
        <label for="exampleFormControlSelect1">Stars</label>
        <select name="stars" class="form-control" id="exampleFormControlSelect1">
            <option value="1" <?php echo $product['stars'] == 1? "selected" :"" ?>>1</option>
            <option value="2" <?php echo $product['stars'] == 2? "selected" :"" ?>>2</option>
            <option value="3" <?php echo $product['stars'] == 3? "selected" :"" ?>>3</option>
            <option value="4" <?php echo $product['stars'] == 4? "selected" :"" ?>>4</option>
            <option value="5" <?php echo $product['stars'] == 5? "selected" :"" ?>>5</option>

        </select>
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">Images</label>
        <input type="file" required name="images[]" placeholder="file" class="form-control" id="exampleInputEmail1"
            multiple>
    </div>
    <br>
    <input type="submit" name="submit" class="btn btn-primary" value="Add Product">
    <!--   <button type="submit" class="btn btn-primary">Submit</button> -->
</form>
<br>