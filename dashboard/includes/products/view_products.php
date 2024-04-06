<a href='?products=add' class='btn btn-primary my-3'>Add Product</a>
<table class="table table-dark rounded">
    <thead class="rounded">
        <tr>
            <th scope="col">#</th>
            <th scope="col">imags</th>
            <th scope="col">name</th>
            <th scope="col">category</th>
            <th scope="col">price</th>
            <th scope="col">sale</th>
            <th scope="col">quantity</th>
            <th scope="col">stars</th>
            <th scope="col">Edite/Delete</th>
        </tr>
    </thead>
    <!-- (`name`, `category`, `price`, `sale`, `description`, `quantity`, `imags`, `stars`) VALUES  -->

    <tbody>
        <?php
       $all_product =$con->query("SELECT * FROM products");
       foreach($all_product as $key =>$product):
       ?>
        <tr>
            <th scope="row"><?php  echo ++$key?></th>
            <td style="width: 17%">
                <?php
            // Split the images string into an array of filenames
            $images = explode(',', $product['images']);
            // Display the first image
            ?>
                <img src="images/<?php echo $images[0] ?>" style="width: 100px" alt="Product Image">
            </td>
            <td><?php  echo $product['name']?></td>
            <td><?php  echo $product['category']?></td>
            <td>$<?php  echo $product['price'] ?></td>
            <td>$<?php  echo $product['sale']?></td>
            <td><?php  echo $product['quantity']?></td>

            <td><?php  echo $product['stars']?></td>
            <td>
                <?php if ($_SESSION['login']['prive'] > 0 || $_SESSION['login']['id'] == $user['id']): ?>
                <!-- If logged in user is admin OR editing their own profile -->
                <a href="?products=edite&id=<?php echo $product['id'] ?>" class="btn btn-primary">Edite</a>
                <?php endif; ?>
                <?php include "model.php" ?>

            </td>


        </tr>

        <?php  endforeach?>
    </tbody>
</table>