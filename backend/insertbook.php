<?php


require('database.php');
include('functions.php');


if (isset($_POST["insertdata"])) {
    $isbn = $_POST["isbn"];
    $title = $_POST["title"];
    $author = $_POST["author"];
    $category = $_POST["category"];
    $yearpublished = $_POST["yearpublished"];
    $digitforISBN = 13;
    $digitforYear = 4;
    $curYear = date('Y');



    if (!validateNumberDigits($isbn, $digitforISBN)) {
        session_start();
        $_SESSION['alert'] = 1;
        header('location: ../booklisting.php?error=0');
        exit();
    } else if (!validateNumberDigits($yearpublished, $digitforYear)) {
        session_start();
        $_SESSION['alert'] = 4;
        header('location: ../booklisting.php?error=1');
        exit();
    }
    
    
    else {


        try {
           $sql = "INSERT INTO booklist (isbn, bookname, author, category, yearpublished, status) VALUES ('$isbn', '$title', '$author', '$category','$yearpublished', 'ONSITE')";

        if ($conn->query($sql) === TRUE) {
            header('location: ../booklisting.php?error=5');
        } else {
            header('location: ../booklisting.php?error=6');
        }
            exit();
        } 
        catch (mysqli_sql_exception $e) {
            if ($e->getCode() == 1062) { // 1062 is the MySQL error code for duplicate entry
                header("Location:../booklisting.php?error=yes");
                exit();
            } else {
                // Handle other database-related errors
                echo "Database error: " . $e->getMessage();
            }
        }

        
    }
} else {

    header('location: ../booklisting.php');
}
