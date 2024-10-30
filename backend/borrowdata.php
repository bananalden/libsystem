<?php 

include ('functions.php');
require ('database.php');

if (isset($_POST["insertborrowdata"])){
    $isbn = $_POST["isbn"];
    $studentID = $_POST["studentID"];
    $dueDate = $_POST["dueDate"];
    $curDate = date("Y-m-d");
    $bookTitle = grabBookTitle($conn, $isbn);
    $studentName = grabStudentName($conn, $studentID);

    if(!existingBook($conn, $isbn)){
        session_start();
        $_SESSION['alert'] = 1;
        header('Location: ../bookborrowinglist.php?error=nobook');
    }
    else if(grabBookStatus($conn, $isbn) == 'AWAY'){
        session_start();
        $_SESSION['alert'] = 4;
        header('Location: ../bookborrowinglist.php?error=bookaway');
    }

    else if(!existingStudent($conn, $studentID)){
        session_start();
        $_SESSION['alert'] = 8;
        header('Location: ../bookborrowinglist.php?error=nostudent');
    }
    else if($dueDate <= $curDate){
        session_start();
        $_SESSION['alert'] = 3;
        header('Location: ../bookborrowinglist.php?error=duedateinvalid');
    }

    else{
        $sql_insert = "INSERT INTO bookborrowlist (bookID, booktitle, studentID, studentName, dateborrowed, datedue) VALUES ('$isbn', '$bookTitle','$studentID','$studentName', CURDATE(), '$dueDate');";
        $sql_update ="UPDATE booklist SET status='AWAY' WHERE isbn='$isbn';";
        
        if ($conn->query($sql_insert) === TRUE)
        {
            if($conn->query($sql_update) === TRUE){
                session_start();
                $_SESSION['alert'] = 5;
                header('Location:../bookborrowinglist.php?error=none');
            }
        }

        else{
            echo "Error updating record: " . $conn->error;
        }

    }

}


?>