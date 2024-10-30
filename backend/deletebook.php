<?php 

require('database.php');

if(isset($_POST['deletedata'])){

    $isbn = $_POST['isbn_delete'];
    $title = $_POST['missing_title'];
    $author = $_POST['missing_author'];
    $category = $_POST['missing_category'];
    $year = $_POST['missing_year'];
    $status = $_POST['missing_status'];

    $sqlINS = "INSERT INTO recyclebin (isbn, bookname, author, category, yearpublished, status) VALUES ('$isbn', '$title', '$author', '$category','$year', '$status')";
    $sqlDEL = "DELETE FROM booklist WHERE isbn = '$isbn'";

    if($conn->query($sqlINS) == TRUE){
        if($conn->query($sqlDEL) == TRUE){
            session_start();
            $_SESSION['alert'] = 3;
            header('location: ../booklisting.php?delete=0');
        
        }
        else{
            header('location: ../booklisting.php?delete=1');
        }
   }

    else{
        header('location: ../booklisting.php?delete=1');
    }
        
}
else{
    header('location: ../booklisting.php');
}


?>