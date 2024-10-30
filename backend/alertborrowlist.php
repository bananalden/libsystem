<?php

session_start();

if(isset($_SESSION['alert'])){

    switch($_SESSION['alert']){
    case 1:
?>
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>ERROR</strong> Book does not exist!
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
  <strong>ERROR</strong> Book is currently being borrowed!
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
  <strong>ERROR</strong> You cannot insert a date before the current date for the due date!
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
  <strong>SUCCESS</strong> Book has now been borrowed!
  <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

<?php
    unset($_SESSION['alert']);
    break;
    case 6:
    ?>

<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>SUCCESS</strong> Book has now been returned!
  <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

<?php
    unset($_SESSION['alert']);
    break;
    
    case 7:
?>
<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>SUCCESS</strong> Record has been deleted!
  <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<?php 
    unset($_SESSION['alert']);
    break;
    case 8:
?>

<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>ERROR</strong> Student does not exist!
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