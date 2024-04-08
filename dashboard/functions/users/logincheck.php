<?php 
session_start();
include "../connect.php";
$email =$_POST['email'];
$password =$_POST['password'];

$user = $con->query("SELECT * FROM users WHERE email='$email'");

$date =$user->fetch_assoc();

$pas_hash = $date["password"];

$num_email =$user->num_rows;
if ($num_email >0){
    if(password_verify($password,$pas_hash)){
     if ($date["prive"] > 0 || $date["prive"] == null){
        $_SESSION["login"] = $date;
        header("Location:../../index.php");
     }else{
     header("Location:../../login.php?ms=You not admin");

     }
 
    }else{
     header("Location:../../login.php?ms=Your Passord or Email incorrect");
    }
}else{
    header("Location:../../login.php?ms=Your Passord or Email incorrect");

}