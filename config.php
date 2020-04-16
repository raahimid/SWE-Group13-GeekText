<?php

$host = "localhost:3306"; /* Host name */
$user = "root"; /* User */
$password = ""; /* Password */
$dbname = "bookdb"; /* Database name */

//Create connection
// $conn = mysqli_connect($host, $user, $password,$dbname);
$link = new mysqli($host, $user, $password, $dbname);

// Check connection

if($link->connect_error){
    die("Connection failed: " . $link->connect_error);
}


/* if (!$conn) {
 die("Connection failed: " . mysqli_connect_error());
} */

?>
