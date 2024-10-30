<?php 
include('functions.php');
include('database.php');

$isbn = "9780747548478";

$value = existingBook($conn, $isbn);

echo $value;

?>