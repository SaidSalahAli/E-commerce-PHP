<form method="post" action="functions/products/add_product.php" enctype='multipart/form-data'
    style="width: 95%;margin:auto;">
    <div class="form-group">

        <label for="exampleInputEmail1">Name</label>
        <input type="text" name="name" placeholder="name" class="form-control" id="exampleInputEmail1">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Price</label>
        <input type="number" name="price" class="form-control" id="exampleInputEmail1" placeholder="price">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Sale</label>
        <input type="number" name="sale" placeholder="sale" class="form-control" id="exampleInputEmail1">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Count</label>
        <input type="number" name="count" placeholder="count" class="form-control" id="exampleInputEmail1">
    </div>

    <div class="form-group">
        <label for="exampleFormControlSelect1">Categorys</label>
        <select name="category" class="form-control" id="exampleFormControlSelect1">
            <option value="phone">Phone</option>
            <option value="labs">labs</option>
            <option value="elctronic">Elctronic</option>

        </select>
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1"> Img</label>
        <input type="file" name="img" placeholder="file" class="form-control" id="exampleInputEmail1">
    </div>
    <br>
    <input type="submit" name="submit" class="btn btn-primary" value="Add Product">
    <!--   <button type="submit" class="btn btn-primary">Submit</button> -->
</form>
<br>