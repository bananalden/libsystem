<?php

include('functions.php');
require('database.php');

if (isset($_POST['insertuser'])) {

    $userID = $_POST['userID'];
    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
    $userIDdigit = 11;

    if (!validateNumberDigits($userID, $userIDdigit)) {
        session_start();
        $_SESSION['alert'] = 1;
        header('location: ../userlist.php?error=1');
    } 
    
    else if (existingUsername($conn, $username)){
        session_start();
        $_SESSION['alert'] = 4;
        header('location:../userlist.php?error=4');
    }
    
    
    
    else {
        try {
            createUser($conn, $userID, $name, $username, $hashedPwd);
            session_start();
            $_SESSION['alert'] = 0;
            header("Location:../userlist.php?error=none");
            exit();
        } catch (mysqli_sql_exception $e) {
            if ($e->getCode() == 1062) { // 1062 is the MySQL error code for duplicate entry
                header("Location:../userlist.php?error=yes");
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
