<html>
<body>
<head>
<title>E-Commerce Website </title>
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
</head>
<body>
<?php
   session_start();

if (isset($_SESSION["id"]) && $_SESSION["id"] === true) {
    echo "loged in";
} else {
    $_SESSION["admin"] = false;
    die("no access");
}
$id = $_SESSION['ID'];
echo $id;
?>
<div class="top-nav-bar">
<div class="search-box">
<img src="images/geektext.png" class="logo">
<input type="text" class="form-control" style= "width:600px; height:40px;"/>

<span class="input-group-text"style= "width:60px; height:40px;"/><i class="fa fa-search"/></i></span>
</div> 
<div class="menu-bar"/>  
	<ul>
		
			<li><a href="#"><i class="fa fa-shopping-basket"></i>cart</a></li>
			<li><a href="#">User Name</a></li>
			<li><a href="#">Sign Out</a></li>
		
	</ul>
</div> 
</div>
<?php
    include '../init.php';
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
   $sql = "UPDATE user SET PassWord='$password' WHERE UserID= 23";
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