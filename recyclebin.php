<!DOCTYPE html>
<html lang="en">
<?php 
require 'backend/adminauthcheck.php';
error_reporting(E_ERROR | E_PARSE);
?>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Book List</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css" />
  <link rel="stylesheet" href="./css folder/trash.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css">
  <link
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
      rel="stylesheet"
    />
  
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

<!---- ##### MAIN CONTENT ####---->
<div class="content">
<div class="container">
<?php include 'backend/alertbooklist.php';?>
<div class="trash mb-4">
  <h1>Trash</h1>
</div>

<div class="row">
  <div class="col">
  <div class="table-container">
  <div class="table-responsive">
  <table id="recycleTable" class="table table-bordered">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">ISBN</th>
                    <th scope="col">Title</th>
                    <th scope="col">Author</th>
                    <th scope="col">Category</th>
                    <th scope="col">Year Published</th>
                    <th scope="col">STATUS</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  require('backend/database.php');
                  $query = "SELECT * FROM recyclebin";
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
                        <td><?= $row['status'] ?></td>
                        <td>
                          <button type="button" class="btn-find-book foundbtn">FIND BOOK</button>
                        </td>
                      </tr>
                  <?php

                    }
                  }
                  ?>
                </tbody>
              </table>
  </div>
  
      </div>
  </div>
</div>
</div>
</div>
<!---- ##### MAIN CONTENT ####---->


<!------- #### FOUND BOOK MODAL #### ------>
<div class="modal fade" id="foundbtn" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation</h5>
              </div>

              <div class="modal-body">

                <form action="backend/bookfound.php" method="post">
                  <h4>Set book as found?</h4>
                  <input type="hidden" name="found_isbn" id="found_isbn">
                  <input type="hidden" name="found_title" id="found_title">
                  <input type="hidden" name="found_author" id="found_author">
                  <input type="hidden" name="found_category" id="found_category">
                  <input type="hidden" name="found_year" id="found_year">
                  <input type="hidden" name="found_status" id="found_status">
                  


              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" name="bookfound" class="btn btn-danger">Delete Book</button>
              </div>
              </form>
            </div>
          </div>
        </div>
<!------- #### FOUND BOOK MODAL #### ------>

<!------- ##### SCRIPTS HERE ##### ------->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
  <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#myTable').DataTable();
      $('#recycleTable').DataTable();
    });
  </script>
  <script>
    $(document).ready(function() {
      $('.editbtn').on('click', function() {

        $('#editmodal').modal('show');
        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function() {
          return $(this).text();
        })

        console.log(data);

        $('#isbn_update').val(data[0]);
        $('#title_update').val(data[1]);
        $('#author_update').val(data[2]);
        $('#category_update').val(data[3]);
        $('#yearpublished_update').val(data[4])

      })


    });
  </script>
   <script>
    $(document).ready(function() {
      $('.deletebtn').on('click', function() {

        $('#deletemodal').modal('show');

        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function() {
          return $(this).text();
        })

        console.log(data);

        $('#isbn_delete').val(data[0]);
        $('#missing_title').val(data[1]);
        $('#missing_author').val(data[2]);
        $('#missing_category').val(data[3])
        $('#missing_year').val(data[4]);
        $('#missing_status').val(data[5]);
      })


    });
  </script>
  <script>
    $(document).ready(function() {
      $('.foundbtn').on('click', function() {

        $('#foundbtn').modal('show');

        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function() {
          return $(this).text();
        })

        console.log(data);

        $('#found_isbn').val(data[0]);
        $('#found_title').val(data[1]);
        $('#found_author').val(data[2]);
        $('#found_category').val(data[3])
        $('#found_year').val(data[4]);
        $('#found_status').val(data[5]);
      })


    });
  </script>

</body>
</html>