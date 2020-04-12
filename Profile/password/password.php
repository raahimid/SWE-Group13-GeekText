<html>
<body>
<head>
<title>E-Commerce Website </title>

</head>
<body>



<?php
   include("header.php");

    #include 'header.php';
  $query = "SELECT * FROM User";

  $result = mysqli_query($link, $query);
?>
<form method="post">

<h4>Change Your password</h4>

<table border="0" cellspacing="50">
<tr>
  <td>New Password</td>
  <td><input type="password" name="password1"><br></td>
</tr>

<tr>
	<td>Enter Your password again</td> 
	<td>	 <input type="password" name="password2" ><br></td></tr>
</tr>
</table>
<div$a=$_POST["password1"]>
<div$b=$_POST["password2"]>
<input type="submit" name="test" id="test" value="RUN" /><br/>

</form>
<?php

function write($link)
{
$password = isset($_POST['password1'])?$_POST['password1']:"";
$hash = password_hash($password, PASSWORD_DEFAULT);
   $sql = "UPDATE user SET PassWord='$hash' WHERE UserID= " . $_SESSION["ID"] . "";
  if ($link->query($sql) === TRUE) {
 } else {
   echo "Error: " . $sql . "<br>" . $link->error;
} }
 if(array_key_exists('test',$_POST)){
  if($_POST["password1"]===$_POST["password2"]){
   write($link);
   	echo "Your new password is saved.";
}
   else {
	echo "You entered the defferent password the second time.";
}}?>
</body>
</html>