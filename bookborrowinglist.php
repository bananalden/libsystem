<?php
require 'backend/adminauthcheck.php';
error_reporting(E_ERROR | E_PARSE);
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Book Return</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css" />
  <link rel="stylesheet" href="./css folder/borrowlist.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">




</head>

<body style="background-color: #f0ece2;">
  <!---- ###### NAVBAR ##### ---->
  <div class="sidebar">

    <ul>
      <li><a href="mainpage.php">Home</a></li>
      <li><a href="booklisting.php"><i class="bi bi-journal-bookmark"></i>Book List</a></li>
      <li><a href="recyclebin.php"><i class="bi bi-trash"></i>Trash</a></li>
      <li><a href="userlist.php"><i class="bi bi-person"></i>User List</a></li>
      <li><a href="studentlist.php"><i class="bi bi-mortarboard"></i>Student List</a></li>
      <li><a href="bookborrowinglist.php"><i class="bi bi-book"></i> Borrowing List</a></li>
      <li><a class="log-btn" href="backend/userlogout.php">Log out</a></li>
    </ul>
  </div>
  <!---- ###### NAVBAR ##### ---->

  <!---- ###### MAIN CONTENT ##### ---->
  <div class="content">
  <div class="container">
    <!---- ###### TITLE AND INSERT ##### ---->
    <div class="container">
      <?php include 'backend/alertborrowlist.php'; ?>

    </div>
    <!---- ###### TITLE AND INSERT ##### ---->
    <div class="row">
      <div class="table-responsive">
        <h1>Borrowing List</h1>
        <button type="button" class="btn btn-primary mt-1 mb-3" data-bs-toggle="modal" data-bs-target="#insertmodal">Borrow Book</button>
        <table id="myTable" class="table table-bordered">
          <thead class="thead-dark">
            <tr>
              <th scope="col">Reference ID</th>
              <th scope="col">ISBN</th>
              <th scope="col">Book Name</th>
              <th scope="col">Student ID</th>
              <th scope="col">Student Name</th>
              <th scope="col">Date Borrowed</th>
              <th scope="col">Date Due</th>
              <th scope="col">Date Returned</th>
              <th scope="col">ACTION</th>
            </tr>
          </thead>
          <tbody>
            <?php
            require('backend/database.php');
            $query = "SELECT * FROM bookborrowlist";
            $run_query = mysqli_query($conn, $query);

            if (mysqli_num_rows($run_query) > 0) {
              foreach ($run_query as $row) :
            ?>

                <tr>
                  <td><?= $row['refID'] ?></td>
                  <td><?= $row['bookID'] ?></td>
                  <td><?= $row['booktitle'] ?></td>
                  <td><?= $row['studentID'] ?></td>
                  <td><?= $row['studentName'] ?></td>
                  <td><?= $row['dateborrowed'] ?></td>
                  <td><?= $row['datedue'] ?></td>
                  <td><?= $row['datereturned'] ?></td>
                  
                  <td>
                    <div class="btn-group">
                      <?php if ($row['datereturned'] == '0000-00-00') : ?>
                        <button type="button" class="btn-edit editbtn">RETURN BOOK</button>
                      <?php else : ?>
                        <button type="button" class="btn-edit editbtn" disabled>RETURN BOOK</button>
                      <?php endif; ?>
                      <button type="button" class="btn-delete deletebtn">DELETE RECORD</button>
                    </div>
                  </td>
                </tr>
            <?php
              endforeach;
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
    </div>

  </div>
  <!---- ###### INSERT MODAL ##### ---->
  <div class="modal fade" id="insertmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Borrowing Book Form</h5>
        </div>

        <div class="modal-body">
          <div class="container">
         
              <div class="col-sm-9">
                <div class="form-group">
                <form action="./backend/borrowdata.php" method="post">
                    <label>ISBN</label>
                    <input type="number" name="isbn" class="form-control" required></input>
                </div>
                <div class="form-group">
                  <label>Student ID</label>
                  <input type="text" name="studentID" class="form-control" required></input>
                </div>
                <div class="form-group">
                  <label>Due Date</label>
                  <input type="date" name="dueDate" class="form-control" required></input>
                </div>
            

            
                <h4>Students</h4>
              <table id="studentTable" class="table table-bordered">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">Student ID</th>
                    <th scope="col">Student Name</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  require('backend/database.php');
                  $query = "SELECT * FROM studentlist";
                  $run_query = mysqli_query($conn, $query);

                        if (mysqli_num_rows($run_query) > 0) {
                          foreach ($run_query as $row) {
                        ?>

                            <tr>
                              <td><?= $row['studentID'] ?></td>
                              <td><?= $row['studentName'] ?></td>
                            </tr>
                        <?php

                    }
                  }
                  ?>
                </tbody>
              </table>
           
           
                <h4>Books</h4>
              <table id="bookTable" class="table table-bordered">
            <thead class="thead-dark">
              <tr>
                <th scope="col">ISBN</th>
                <th scope="col">Title</th>
                <th scope="col">Author</th>
                <th scope="col">Category</th>
                <th scope="col">Year Published</th>
              </tr>
            </thead>
            <tbody>
              <?php
              require('backend/database.php');
              $query = "SELECT * FROM booklist";
              $run_query = mysqli_query($conn, $query);

              if (mysqli_num_rows($run_query) > 0) {
                foreach ($run_query as $row) {
              ?>
                  <tr>
                    <td><?= $row['isbn'] ?></td>
                    <td><?= $row['bookname'] ?></td>
                    <td><?= $row['author'] ?></td>
                    <td><?= $row['category'] ?></td>
                    <td><?= $row['yearpublished'] ?></td>
                  </tr>
              <?php
                }
              }
              ?>
            </tbody>
          </table>
         
            
            
              
          
          </div>

        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" name="insertborrowdata" class="btn btn-primary">Borrow Book</button>
      </form>
        </div>

      </div>
    </div>
  </div>
            </div>
  <!---- ###### INSERT MODAL ##### ---->

  <!---- ###### RETURN MODAL ##### ---->
  <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Return Book Confirmation</h5>
        </div>

        <div class="modal-body">

          <form action="backend/returnbook.php" method="post">
            <div class="form-group">
              <input type="hidden" name="ref_id" id="ref_id" class="form-control"></input>
              <input type="hidden" name="isbn_return" id="isbn_return" class="form-control" required></input>

            </div>
            <h5>Would you like to return the book now?</h5>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" name="returnbook" class="btn btn-primary">Return Book</button>
        </div>
        </form>
      </div>
    </div>
  </div>
  <!---- ###### RETURN MODAL ##### ---->

  <!---- ###### DELETE RECORD MODAL ##### ---->
  <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation</h5>
        </div>

        <div class="modal-body">

          <form action="backend/deleterecord.php" method="post">
            <h4>Do you want to delete this record?</h4>
            <input type="hidden" name="refID" id="refID">
            <input type="hidden" name="recordisbn" id="recordisbn">

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" name="deleterecord" class="btn btn-danger">Delete Book</button>
        </div>
        </form>
      </div>
    </div>
  </div>
  <!---- ###### DELETE RECORD MODAL ##### ---->


  <!---- ###### MAIN CONTENT ##### ---->

  <!---- ###### SCRIPTS ##### ---->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
  <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
  

<script src="./backend/bookborrowlist.js"></script>
  <!---- ###### SCRIPTS ##### ---->
</body>

</html>