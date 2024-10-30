<?php 

include('functions.php');
require('database.php');

if(isset($_POST['returnbook'])){

    $refID = $_POST["ref_id"];
    $isbn = $_POST["isbn_return"];


    if(!existingBook($conn, $isbn)){
        session_start();
        $_SESSION['alert'] = 1;
        header('Location: ../bookborrowinglist.php?error=nobook');
    }

    else if(grabBookStatus($conn, $isbn) == 'ONSITE'){
        session_start();
        $_SESSION['alert'] = 7;
        header('location:../bookborrowinglist.php?error=bookonsite');
    }

    

    else{
        $sql_datereturn = "UPDATE bookborrowlist SET datereturned = CURDATE() WHERE refID = '$refID'";
        $sql_booklistreturn = "UPDATE booklist SET status='ONSITE' WHERE isbn = '$isbn'";

        if ($conn->query($sql_datereturn) === TRUE)
        {
            if($conn->query($sql_booklistreturn) === TRUE){
                session_start();
                $_SESSION['alert'] = 6;
                header('Location: ../bookborrowinglist.php?error=none');
            }
        }
        else{
            header('Location:../bookborrowinglist.php?error=databaseissue');
        }
    }

}
else{
    header('location:../bookborrowinglist.php');
}

?>