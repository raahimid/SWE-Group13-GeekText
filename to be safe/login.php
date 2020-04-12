<?php
   include("init.php");


   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($link,$_POST['username']);
      $mypassword = mysqli_real_escape_string($link,$_POST['password']); 
      
      $sql = "SELECT userid,userpassword,userfirst FROM user WHERE email = '$myusername' and userpassword = '$mypassword'";
      $result = mysqli_query($link,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         
         
         $_SESSION['username'] = $myusername;//email
	   	 $_SESSION['password'] = $mypassword;//password
         $_SESSION['name'] = $row['userfirst'];//users first name
         $_SESSION['ID'] = $row['userid'];
         header("location: test.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>

<html lang="en">
<head>
<meta charset="UTF-8">
<title>Sign In</title>
</head>
<body>
<center><p style="font-size:3.5em;"><b>Sign In</b></p></center>
<hr>
<br>
<center>
<form action="" method="post">
    <p><input type="text" name="username" placeholder="User ID"></p>
    <br>
	<p><input type="password" name="password" placeholder="Password"></p>
	<br>
    <input type="submit" value="Sign In">
    <br>
    <br>
</form>
<p>Don't have an account?<a href="#"> Sign Up!</a>
</center>
</body>
</html>