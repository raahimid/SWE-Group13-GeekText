<?php
ob_start();
include_once "db_connection.php";
include "wishlist.php";

$id = $_GET['BookID'];
$quantity = $_GET['quantity'];

addToCart($id, $quantity);

header("Location:wishlist.php");
ob_end_flush();
?>