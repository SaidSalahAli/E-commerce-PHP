<?php

include "connect.php";

$id_ms = $_POST["id_ms"];
$updateMass =$con->query("UPDATE `messages` SET `status`= '1' WHERE id='$id_ms'");

echo  $con->query("SELECT * FROM `messages` WHERE status='0'")->num_rows;