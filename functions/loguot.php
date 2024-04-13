<?php
session_start();
session_destroy();
session_unset();
header("location:../login.php");
$_SESSION['message'] = 'Loguot is success';
$_SESSION['messageClass'] = 'alert-success';