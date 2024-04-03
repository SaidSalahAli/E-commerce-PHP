<?php
$id_edite =$_GET['id'];


$product = $con->query("SELECT `id`, `name`, `price`, `sale`, `count`, `category`, `img` FROM `products` WHERE  id='$id_edite'")->fetch_assoc();

?>



<form method="post" action="functions/products/edite_product.php" enctype='multipart/form-data'
    style="width: 95%;margin:auto;">
    <div class="form-group">
        <input type="hidden" value="<?= $id_edite ?>" name="id">
        <input type="hidden" value="<?= $product["img"] ?>" name="old_img">
        <label for="exampleInputEmail1">Name</label>
        <input type="text" value="<?php echo $product['name']?>" name="name" placeholder="name" class="form-control"
            id="exampleInputEmail1">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Price</label>
        <input type="number" value="<?php echo $product['price']?>" name="price" class="form-control"
            id="exampleInputEmail1" placeholder="price">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Sale</label>
        <input type="number" value="<?php echo $product['sale']?>" name="sale" placeholder="sale" class="form-control"
            id="exampleInputEmail1">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Count</label>
        <input type="number" value="<?php echo $product['count']?>" name="count" placeholder="count"
            class="form-control" id="exampleInputEmail1">
    </div>

    <div class="form-group">
        <label for="exampleFormControlSelect1">Categorys</label>
        <select name="category" class="form-control" id="exampleFormControlSelect1">
            <option value="phone" <?php echo $product['category'] =="phone"?"selected":""?>>Phone</option>
            <option value="labs" <?php echo $product['category'] =="labs"?"selected":""?>>labs</option>
            <option value="elctronic" <?php echo $product['category'] =="elctronic"?"selected":""?>>Elctronic</option>

        </select>
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1"> Img</label>
        <input type="file" name="img" placeholder="file" class="form-control" id="exampleInputEmail1">
    </div>
    <br>
    <input type="submit" name="submit" class="btn btn-primary" value="Edite Product">
    <!--   <button type="submit" class="btn btn-primary">Submit</button> -->
</form>
<br>