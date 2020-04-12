<?php
ob_start();
//including the database connection file
include 'db_connection.php';
include 'wishlist.php';
$conn = openCon();

//getting id of the data from url
$id = $_GET['BookID'];

//deleting the row from table
removeFromWishlist($id);

//redirecting to the display page
header("Location:wishlist.php");
ob_end_flush();
?>