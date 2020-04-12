<?php
   include("../header.php");

   

   $sql = "UPDATE billing SET 
   CCNumber='".  $_POST["ccard"] . "',CCNumber2 ='".  $_POST["ccard2"] . "',CCNumber3 ='".  $_POST["address3"] . "', 
   FirstName='".  $_POST["first"] . "',   FirstName2='".  $_POST["first2"] . "',   FirstName='".  $_POST["first2"] . "',
   LastName='".  $_POST["last"] . "',   LastName2='".  $_POST["last2"] . "',   LastName3='".  $_POST["last3"] . "',
   CVV='".  $_POST["cvv"] . "',CVV2='".  $_POST["cvv2"] . "',CVV3='".  $_POST["cvv3"] . "',
   ExpDate='".  $_POST["exp"] . "',   ExpDate2='".  $_POST["exp2"] . "',   ExpDate3='".  $_POST["exp3"] . "'

   WHERE UserID= " . $_SESSION["ID"] . "";
   mysqli_query($link,$sql);
  

 
   echo "<script>alert('saved')</script>";
header('refresh:2; url=../Profile.php');
      
 ?>