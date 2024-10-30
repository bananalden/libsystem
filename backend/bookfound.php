<?php 

require ('database.php');

if(isset($_POST['bookfound'])){

    $isbn = $_POST['found_isbn'];
    $title = $_POST['found_title'];
    $author = $_POST['found_author'];
    $category = $_POST['found_category'];
    $year = $_POST['found_year'];
    $status = $_POST['found_status'];

    $sqlINS = "INSERT INTO booklist (isbn, bookname, author, category, yearpublished, status) VALUES ('$isbn', '$title', '$author', '$category','$year', '$status')";
    $sqlDEL = "DELETE FROM recyclebin WHERE isbn = '$isbn'";

    
    if($conn->query($sqlINS) == TRUE){
        if($conn->query($sqlDEL) == TRUE){
            session_start();
            $_SESSION['alert'] = 6;
            header('location: ../recyclebin.php?delete=0');
        
        }
        else{
            header('location: ../recyclebin.php?delete=1');
        }
   }

    else{
        header('location: ../recyclebin.php?delete=1');
    }
}

else{
    header('location: ../booklisting.php');
}



?>