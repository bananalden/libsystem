<?php

include('functions.php');
require('database.php');

if (isset($_POST["updatedata"])) {
    $userID = $_POST['id_update'];
    $name = $_POST['update_name'];
    $username = $_POST['update_username'];
    $password = $_POST['password_update'];
    $pwdHashed = password_hash($password, PASSWORD_DEFAULT);



    $sql="UPDATE admin SET adminName = '$name', username = '$username', password='$pwdHashed' WHERE adminID='$userID';";

            if($conn->query($sql) === TRUE){
                session_start();
                $_SESSION['alert'] = 5;
                header('location: ../userlist.php?edit=0');
            }

            else{
                header('location: ../userlist.php?edit=1');
            }


} 


else {

    header('location: ../userlist.php');
}
