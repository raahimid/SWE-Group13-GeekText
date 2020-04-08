<?php
include_once "db_connection.php";
include "wishlist.php";

$id = $_GET['BookID'];
$nameForList = $_GET['WishlistName'];

updateWishlist($id, $nameForList);

header("Location:wishlist.php");

?>