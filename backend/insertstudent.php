<?php

include('functions.php');
require('database.php');

if (isset($_POST['insertuser'])) {

    $studentID = $_POST['studentID'];
    $name = $_POST['studentName'];
    $userIDdigit = 11;

    if (!validateNumberDigits($studentID, $userIDdigit)) {
        session_start();
        $_SESSION['alert'] = 1;
        header('location: ../studentlist.php?error=1');
    } 
    
    else {
        try {
            createStudent($conn, $studentID, $name);
            session_start();
            $_SESSION['alert'] = 0;
            header("Location:../studentlist.php?error=none");
            exit();
        } catch (mysqli_sql_exception $e) {
            if ($e->getCode() == 1062) { // 1062 is the MySQL error code for duplicate entry
                header("Location:../studentlist.php?error=yes");
                exit();
            } else {
                // Handle other database-related errors
                echo "Database error: " . $e->getMessage();
            }
        }
    }
} else {
    header('location: ../userlist.php');
}
