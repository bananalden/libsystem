<?php

include('functions.php');
require('database.php');

if (isset($_POST["updatedata"])) {
    $isbn = $_POST["isbn"];
    $title = $_POST["title"];
    $author = $_POST["author"];
    $category = $_POST["category"];
    $yearpublished = $_POST["yearpublished"];
    $digitforISBN = 13;
    $digitforYear = 4;
    $curYear = date('Y');



    if(!is_numeric($isbn)){
        header('location: ../booklisting.php?error=3');
    }
    else if (!is_numeric($yearpublished)){
        header('location: ../booklisting.php?error=4'); 
    }
    else if (!validateNumberDigits($isbn, $digitforISBN)){
        header('location: ../booklisting.php?error=0'); 
    }
    else if (!validateNumberDigits($yearpublished, $digitforYear)){
        session_start();
        $_SESSION['alert'] = 4;
        header('location: ../booklisting.php?error=1'); 
    }
    else{

            $sql="UPDATE booklist SET bookname='$title', author='$author', category='$category', yearpublished='$yearpublished' WHERE isbn='$isbn';";

            if($conn->query($sql) === TRUE){
                session_start();
                $_SESSION['alert'] = 5;
                header('location: ../booklisting.php?edit=0');
            }

            else{
                header('location: ../booklisting.php?edit=1');
            }
    }
} 


else {

    header('location: ../booklisting.php');
}
