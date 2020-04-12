<?php
ob_start();
include_once "db_connection.php";
include "wishlist.php";


$bookID = $_GET['BookID'];
$nameForList = $_GET['WishlistName'];

if(isset($_POST['amount'])) {
    $amount = $_POST['amount'];
    updateQuantity($bookID, $nameForList, $amount);
}
header("Location: wishlist.php");
ob_end_flush();
?>