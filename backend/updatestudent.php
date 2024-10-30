<?php

include('functions.php');
require('database.php');

if (isset($_POST["updatedata"])) {
    $userID = $_POST['id_update'];
    $name = $_POST['update_name'];


    $sql="UPDATE studentlist SET studentName = '$name' WHERE studentID = '$userID';";

            if($conn->query($sql) === TRUE){
                session_start();
                $_SESSION['alert'] = 5;
                header('location: ../studentlist.php?edit=0');
            }

            else{
                header('location: ../studentlist.php?edit=1');
            }


} 


else {

    header('location: ../studentlist.php');
}
