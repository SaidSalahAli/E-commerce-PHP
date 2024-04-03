<a href='?products=add' class='btn btn-primary'>Add Product</a>
<table class="table table-dark rounded">
    <thead class="rounded">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col">sale</th>
            <th scope="col">Count</th>
            <th scope="col">category</th>
            <th scope="col">img</th>
            <th scope="col">Edite/Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
       $all_product =$con->query("SELECT * FROM products");
       foreach($all_product as $key =>$product):
       ?>
        <tr>
            <th scope="row"><?php  echo ++$key?></th>
            <td><?php  echo $product['name']?></td>
            <td><?php  echo $product['price']?></td>
            <td><?php  echo $product['sale'] ?></td>
            <td><?php  echo $product['count']?></td>
            <td><?php  echo $product['category']?></td>
            <td style="width: 17%"> <img src="images/<?php echo $product['img']?>" style="width: 37%" alt="sas"></td>

            <td>
                <a href="?products=edite&id=<?php echo $product['id'] ?>" class="btn btn-primary">Edite</a>
                <a href="functions/products/delete_product.php?id=<?php echo $product['id'] ?>"
                    class="btn btn-primary">Delete</a>


            </td>

        </tr>

        <?php  endforeach?>
    </tbody>
</table>