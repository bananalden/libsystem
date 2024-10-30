<?php

session_start();

if(isset($_SESSION['alert'])){

    switch($_SESSION['alert']){
    case 1:
?>
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>ERROR</strong> Invalid number of digits on Admin ID
  <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

<?php
    unset($_SESSION['alert']);
    break;

    case 4:
?>

<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>ERROR</strong> Admin username already exists, please choose another.
  <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

<?php 
    unset($_SESSION['alert']);
    break;
    
    case 3:
?>

<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>SUCCESS</strong> Admin user has been deleted.
  <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

<?php
    unset($_SESSION['alert']);
    break;
    
    case 5:
?>

<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>SUCCESS</strong> Admin user details have been edited.
  <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

<?php
    unset($_SESSION['alert']);
    break;

    }
}
?>