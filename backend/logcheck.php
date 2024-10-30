<?php 

require('database.php');
include('functions.php');

if(isset($_POST["login"])){

$username = $_POST["username"];
$password = $_POST["password"];
$hashPwd = grabAssocPassword($conn, $username);

if (!existingUsername($conn, $username)){
    header('Location: ../index.php?error=wronglogin');
}

$pass_result = password_verify($password, $hashPwd);

if($pass_result == TRUE){
    session_start();
    $_SESSION["username"] = $username;
    header('location: ../mainpage.php');
}

else{
    header('location:../index.php?error=wronglogin');
}



}


else{

    header('location:../index.php');

}


?>