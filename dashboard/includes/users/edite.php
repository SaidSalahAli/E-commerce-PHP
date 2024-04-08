<?php
$id_edite =$_GET['id'];

$user = $con->query("SELECT id,name,email,gender,prive FROM users WHERE id='$id_edite'")->fetch_assoc();

?>


<form method="post" action="functions/users/edite_users.php" style="width: 95%;margin:auto;">
    <div class="form-group">
        <input type="hidden" value="<?= $id_edite ?>" name="id">
        <label for="exampleInputEmail1">Name</label>
        <input type="text" name="name" placeholder="name" class="form-control" id="exampleInputEmail1"
            value="<?php echo $user['name']?>">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" name="email" placeholder="email" class="form-control" id="exampleInputEmail1"
            value="<?php echo $user['email']?>">
        <?php
    if(isset($_GET['ms'])): ?>

        <div class="alert alert-danger" role="alert">
            <?php echo  $_GET['ms']?$_GET['ms']:''?>
        </div>
        <?php endif ?>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="gender" id="inlineRadio1"
            <?php echo $user['gender']== 0?"checked":""?>>
        <label class="form-check-label" for="inlineRadio1">Male</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="gender" id="inlineRadio2"
            <?php echo $user['gender']== 1?"checked":""?>>
        <label class="form-check-label" for="inlineRadio2">Female</label>
    </div>
    <br>

    <div class="form-group">
        <label for="exampleFormControlSelect1">Access</label>
        <select name="prive" class="form-control" id="exampleFormControlSelect1">
            <option <?php echo $user['prive']>= 1?"selected":""?> selected>Admin</option>
            <option <?php echo $user['prive']== 0?"selected":""?>>User</option>

        </select>
    </div>

    <input type="submit" name="submit" class="btn btn-primary" value="Add">
    <!--   <button type="submit" class="btn btn-primary">Submit</button> -->
</form>
<br>