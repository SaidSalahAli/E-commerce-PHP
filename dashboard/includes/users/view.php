<table class="table table-dark rounded">
    <?php
    if(isset($_GET['ms'])): ?>
    <div id="alertMessage" class="alert alert-success" role="alert">
        <?php echo  $_GET['ms']?$_GET['ms']:''?>
    </div>
    <?php endif ?>
    <a href='?users=add' class="btn btn-primary my-3">Add User</a>
    <thead class="rounded">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">email</th>
            <th scope="col">gander</th>
            <th scope="col">Prive</th>
            <th scope="col">Edite/Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
       $all_users = $con->query("SELECT * FROM users");
       foreach($all_users as $key => $user):
       ?>
        <tr>
            <th scope="row"><?php  echo ++$key?></th>
            <td><?php  echo $user['name']?></td>
            <td><?php  echo $user['email']?></td>
            <td><?php  echo $user['gender'] == 0 ? "male" : "female"?></td>
            <td><?php  echo $user['prive'] == 0 ? "user" : "admin"?></td>

            <td>
                <?php if ($_SESSION['login']['prive'] > 0 || $_SESSION['login']['id'] == $user['id']): ?>
                <!-- If logged in user is admin OR editing their own profile -->
                <a href="?users=edite&id=<?php echo $user['id'] ?>" class="btn btn-primary">Edite</a>
                <?php endif; ?>
                <?php include "model.php" ?>

            </td>

        </tr>

        <?php  endforeach?>
    </tbody>
</table>