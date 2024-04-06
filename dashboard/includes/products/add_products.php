<form method="post" action="functions/products/add_product.php" enctype='multipart/form-data'
    style="width: 95%;margin:auto;">
    <div class="form-group">
        <label for="exampleInputEmail1">Name</label>
        <input type="text" name="name" placeholder="name" class="form-control" id="exampleInputEmail1">
    </div>

    <div class="form-group">
        <label for="exampleFormControlSelect1">All Categories</label>
        <select name="category" class="form-control" id="exampleFormControlSelect1">
            <optgroup label="Electronics">
                <option value="Digital Cameras">Digital Cameras</option>
                <option value="Camera Drones">Camera Drones</option>
                <option value="Phones">Phones</option>
                <option value="Laptop">Laptop</option>
                <option value="Smart Watches">Smart Watches</option>
                <option value="Headphones">Headphones</option>
                <option value="MP3 Players">MP3 Players</option>
                <option value="Microphones">Microphones</option>
                <option value="Chargers">Chargers</option>
                <option value="Batteries">Batteries</option>
                <option value="Speaker">Speaker</option>
            </optgroup>
            <optgroup label="Other">
                <option value="accessories">accessories</option>
                <option value="Televisions">Televisions</option>
                <option value="best selling">best selling</option>
                <option value="top 100 offer">top 100 offer</option>
                <option value="sunglass">sunglass</option>
                <option value="watch">watch</option>
                <option value="man’s product">man’s product</option>
                <option value="Home Audio & Theater">Home Audio & Theater</option>
                <option value="Computers & Tablets ">Computers & Tablets</option>
                <option value="Video Games">Video Games</option>
                <option value="Home Appliances">Home Appliances</option>


                <!-- Add more options as needed -->
            </optgroup>
        </select>
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">Price</label>
        <input type="number" required name="price" class="form-control" id="exampleInputEmail1" placeholder="price">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Sale</label>
        <input type="number" name="sale" placeholder="sale" class="form-control" id="exampleInputEmail1">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">description</label>
        <input type="text" required name="description" placeholder="description" class="form-control"
            id="exampleInputEmail1">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">quantity</label>
        <input type="number" required name="quantity" placeholder="quantity" class="form-control"
            id="exampleInputEmail1">
    </div>
    <div class="form-group">
        <label for="exampleFormControlSelect1">Stars</label>
        <select name="stars" class="form-control" id="exampleFormControlSelect1">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>

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