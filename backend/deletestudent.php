<?php

include('functions.php');
require('database.php');

if (isset($_POST["deletedata"])) {
    $userID = $_POST['userid_delete'];

    $sql="DELETE FROM studentlist WHERE studentID = '$userID';";

            if($conn->query($sql) === TRUE){
                session_start();
                $_SESSION['alert'] = 3;
                header('location: ../studentlist.php?edit=0');
            }

            else{
                header('location: ../studentlist.php?edit=1');
            }


} 


else {

    header('location: ../studentlist.php');
}
