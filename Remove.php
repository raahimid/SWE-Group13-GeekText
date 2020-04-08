<?php
//including the database connection file
include 'db_connection.php';
$conn = openCon();

//getting id of the data from url
$id = $_GET['BookID'];

//deleting the row from table
$sql = "DELETE FROM wishlist WHERE BookID='$id'";
$data = mysqli_query($conn,$sql);

//redirecting to the display page
header("Location:wishlist.php");
?>