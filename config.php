<?php

$host = "localhost:3306"; /* Host name */
$user = "root"; /* User */
$password = "thetrap888"; /* Password */
$dbname = "bookdb"; /* Database name */

$conn = mysqli_connect($host, $user, $password,$dbname);
// Check connection
if (!$conn) {
 die("Connection failed: " . mysqli_connect_error());
}

?>
