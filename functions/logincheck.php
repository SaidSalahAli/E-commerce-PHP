<?php 
session_start();
include "connect.php";
$email =$_POST['email'];
$password =$_POST['password'];

$user = $con->query("SELECT * FROM users WHERE email='$email'");

$date =$user->fetch_assoc();

$pas_hash = $date["password"];

$num_email =$user->num_rows;
if ($num_email >0){
    if(password_verify($password,$pas_hash)){
        $_SESSION["login_users"] = $date;
        header("Location:../index.php");
        $_SESSION['message'] = 'Hello'." ".$date['name'];
        $_SESSION['messageClass'] = 'alert-success';
 
    }else{
     header("Location:../login.php");
     $_SESSION['message'] = 'Your Passord or Email incorrect';
     $_SESSION['messageClass'] = 'alert-warning ';
    }
}else{
    
    header("Location:../login.php");
    $_SESSION['message'] = 'Your Passord or Email incorrect';
    $_SESSION['messageClass'] = 'alert-warning ';

}