<?php
   include("../header.php");



   $sql = "UPDATE shipping SET 
   Street_Address_1='".  $_POST["address"] . "',Street_Address_2 ='".  $_POST["address2"] . "',Street_Address_3 ='".  $_POST["address3"] . "', 
   Apt= '".  $_POST["apt"] . "',Apt2= '".  $_POST["apt2"] . "',Apt3= '".  $_POST["apt3"] . "',
   City='".  $_POST["city"] . "',City2='".  $_POST["city2"] . "',City3='".  $_POST["city3"] . "',
   state='".  $_POST["state"] . "',state2='".  $_POST["state2"] . "',state3='".  $_POST["state3"] . "',
   ZipCode='".  $_POST["zip"] . "',Zipcode2='".  $_POST["zip2"] . "',Zipcode3='".  $_POST["zip3"] . "'
   WHERE UserID= " . $_SESSION["id"] . "";
   mysqli_query($link,$sql);
  

 
   echo "<script>alert('saved')</script>";
header('refresh:2; url=../Profile.php');
      
 ?>