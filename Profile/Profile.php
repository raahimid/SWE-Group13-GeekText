<html>
<head>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Books</title>
</head>
<body>


<?php
	// DB connection?
	include("header.php");
;

	// Get the list of all genres in DB
	
?>


<!-- div for the genres navigation bar? -->

<!--  ********** Heading section*********** -->
<div class="container" >
  <h2>Account Infromation</h2>
 
<title>E-Commerce Website </title>

</head>
<body>

<?php
	if($_SESSION['islogin']!==1)
		{
		        header("Location:login/loginpage.php");

		}
		$username=$_SESSION['username'];
		
		$sql="SELECT * FROM user WHERE UserName= '$username'";
		$result = $link->query($sql);

		while($row = mysqli_fetch_assoc($result)){
		
		$_SESSION['ID']=$row['UserID'];
		$_SESSION['first']=$row['UserFirst'];
		$_SESSION['mid']=$row['UserMiddle'];
		$_SESSION['last']=$row['UserLast'];
		$_SESSION['email']=$row['Email'];
		$_SESSION['nick']=$row['Nickname'];
		$_SESSION['phone']=$row['Phone'];}
		
    #include 'header.php';
  $query = "SELECT * FROM User,shipping ";
  $result = mysqli_query($link, $query);
?>


<form method="post"style="line-height:26px"/>
<table border="0" cellspacing="100">
<tr>
  <td><font size="5" >UserID</td>
  <td><font size="5" ><?php echo $_SESSION['ID'] ?><br></td>
</tr>

<tr>
	<td><font size="4" >Nickname(The name shows to others)</td> 
	<td><font size="4" ><input type="text" name="nickname" value ='<?php echo $_SESSION['nick'] ?>'><br></td></tr>
</tr>
<tr>
	<td><font size="4" >Username(The name for logging in)</td> 
	<td><font size="4" ><input type="text" name="username" value ='<?php echo $_SESSION['username'] ?>'><br></td></tr>
</tr>
</table>
<a href="password/password.php"	>Change Your password</a>

<h4>       </h4>


  <h2>Personal Infromation</h2>
<table border="0" cellspacing="100">
	<tr>
	  <td><font size="4" >First Name</td>
	  <td><font size="4" ><input type="text" name="first" value ='<?php echo $_SESSION['first'] ?>'><br></td>
	</tr>

	<tr>
		<td><font size="4" >Middle Name</td> 
		<td>	<font size="4" > <input type="text" name="mid" value ='<?php echo $_SESSION['mid'] ?>'><br></td></tr>
	</tr>

	<tr>
		<td><font size="4" >Last Name</td> 
		<td>	<font size="4" > <input type="text" name="last" value ='<?php echo $_SESSION['last'] ?>'><br></td></tr>
	</tr>
	<tr>
		<td><font size="4" >Cell Phone</td> 
		<td>	<font size="4" > <input type="num" name="phone" value ='<?php echo $_SESSION['phone'] ?>'><br></td></tr>
	</tr>
	<tr>
		<td><font size="4" >Email</td> 
		<td>	<font size="4" > <input type="text" name="email" value ='<?php echo $_SESSION['email'] ?>'><br></td></tr>
	</tr>
	</table>
	<a href="address/addresses.php" >Change Your Mailing information</a>

	<a href="billing/billing.php" >Change Your billing information</a>


<h4>       </h4>


 

<h4>       </h4>
 <input type="submit" name="test" id="test" value="Save" /><br/>

</form>


<?php

function write($link)
{ 
   echo "Your information is saved" ;
   $sql = "UPDATE user SET UserFirst='".  $_POST["first"] . "',  UserLast='".  $_POST["last"] . "', UserMiddle='".  $_POST["mid"] . "',Email = '".  $_POST["email"] . "',Nickname = '".  $_POST["nickname"] . "', Username='".  $_POST["username"] . "', Phone='".  $_POST["phone"] . "' WHERE UserID=" . $_SESSION["ID"] . "";
  if ($link->query($sql) === TRUE) {
	 echo "<script>alert('New record created successfully')</script>";
	 header('refresh:3; url=Profile.php');

 } else {
   echo "Error: " . $sql . "<br>" . $link->error;
} }
  if(array_key_exists('test',$_POST)){
   write($link);
}?>