<?php
ob_start();
include_once "db_connection.php";
include "wishlist.php";
include "header.php";

$bookID = $_GET['BookID'];
$quantity = $_GET['quantity'];

addToCart($bookID, $quantity, $id);

header("Location:wishlist.php");
ob_end_flush();
?>