<?php

include 'config.php';
/*
$servername = "localhost:3306";
$username = "root";
$password = "thetrap888";
$dbname = "bookdb";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 

*/

$ratingID = mysqli_real_escape_string ($conn, $_POST['ratingID']); //super global - takes data from form and assigned to variable $bookCode
$bookID  =  mysqli_real_escape_string($conn, $_POST['bookID']);
$userID = mysqli_real_escape_string($conn, $_POST['userID']);
$Rating = mysqli_real_escape_string($conn, $_POST['Rating']);
$Comment = mysqli_real_escape_string($conn, $_POST['Comment']);


//$sql = "INSERT INTO `review` (`ratingID`, `bookID`, `userID`, `Rating`, `Comment`) VALUES
//('$ratingID', '$bookID', '$userID', '$Rating', '$Comment');";

$sql = "INSERT INTO `review` (`Comment`,`Rating`) VALUES ('$Comment','$Rating');";

//I can use: 
//$result = $conn->query($sql);
//OR
mysqli_query($conn,$sql);
//EITHER ONE WILL WORK 
   
//$conn->close();

?> 

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="cmmtrating.css">
 <!-- <link rel="stylesheet" href="newrating.css">  -->
 <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"> 

    </head>
    <body>

<!------------- MY STAR RATING FOR PRODUCT ---------------------------------->
<label for="Comment"><strong>Review product:</strong></label>
<form method = "post">
<div class="rating">
<input type="radio" name="Rating" id="fivestar" value ="5">
<label for="fivestar"></label>
<input type="radio" name="Rating" id="fourstar" value ="4">
<label for="fourstar"></label>
<input type="radio" name="Rating" id="threestar" value ="3">
<label for="threestar"></label>
<input type="radio" name="Rating" id="twostar" value ="2">
<label for="twostar"></label>
<input type="radio" name="Rating" id="onestar" value ="1" required>
<label for="onestar"></label>
<!-- <input id="submit" name="submit" type="submit"> -->
</div>
<!-- <button>Submit</button> -->

<!-- </form> -->
<!----------------------------------------------------------------------------------------->


<!-- MY TEST AREA FOR COMMENTS USING HTML -->
<!-- <label for="Comment"><strong>Review product:</strong></label> -->
    <!-- <form method="post"> -->
    <textarea id="Comment" name="Comment" rows="10" cols="60" required></textarea>
    <!-- <input id="sumbit" name="submit" type="submit"> -->
    <button>Submit</button>
    </form>

</body>
</html>

<!-- THIS FOR DISPLAYING THE COMMENTS USING A SELECT QUERY 
SHOULD CREATE A DATABASE CONNECTION FILE SO I CAN JUST USE INCLUDE ONCE -->
<?php
include 'config.php';
/* 
$servername = "localhost:3306";
$username = "root";
$password = "thetrap888";
$dbname = "bookdb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}  */


$sql = "SELECT ratingID, Rating, Comment FROM review";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
   
    echo "<table>";
           echo "<tr>";
               //echo "<th>ratingID</th>";
               //echo "<th>bookID</th>";
               //echo "<th>userID</th>";
               echo "<th>Rating</th>"; 
               echo "<th>Comment</th>";
           echo "</tr>";
         
   while($row = $result->fetch_array()) {
       echo "<tr>";
       //echo "<td>" . $row["ratingID"] . "</td>";
       //echo "<td>" . $row["bookID"] . "</td>"; 
       //echo "<td>" . $row["userID"]. "</td>";
       echo "<td align='center'>" . $row["Rating"] . "</td>"; //Added Align here for formatting 3/1/2020
      echo "<td align='center'>" . $row["Comment"] . "</td>"; //Added Align here for formatting 3/1/2020
      echo "</tr>";
   }
   echo "</table>";
   // Free result set
   mysqli_free_result($result);
   }
   else {
   echo "0 results";
   }
   
   $conn->close();
   
?>

    

