<?php
//include 'header.php';
session_start();
unset($_SESSION);
session_destroy();
header("Location:test.php");
exit(); 

?>