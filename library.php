<?php 
include 'config.php';
include 'header.php';
?>

<DOCTYPE html>
<html> 
<head>

</head>
<body>

<h3> Library </h3>
<?php

echo $id;

$resultPurchased = mysqli_query($link, "SELECT UserId,purchased.BookId,isPurchased,purchaseId,bookcover FROM purchased LEFT JOIN 
book ON purchased.UserId=$id AND purchased.BookId = book.BookID");

if(mysqli_num_rows($resultPurchased) > 0){

  echo "<table border='1'>
   <tr>
   <th>UserID</th>
   <th>BookID</th> 
   <th>isPuchased</th>
  </tr>";

  while($res = mysqli_fetch_assoc($resultPurchased)){

    $UserId=$res['UserId'];
    $bookId=$res['BookId'];
    $isPurchased=$res['isPurchased'];
    $purchasedId=$res['purchasedId'];
    //$bookcover = $res['bookcover'];


  echo "<tr>";
  echo "<td>" .  $name . "</td>";
  echo "<td>" . $bookId . "</td>";
  echo "<td>" . $isPurchased . "</td>";
  //echo "<td>" . $purchasedId . "</td>";
  echo "</tr>";
  echo "</table";
  }




  

} else {
  echo "NO DATA FOUND!";
}

?>

</body>
</html>