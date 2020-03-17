<html>
<head>
<title>E-Commerce Website </title>
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
</head>
<body>
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
    include 'init.php';
    #include 'header.php';
  $query = "SELECT * FROM User,shipping ";
  $result = mysqli_query($link, $query);
?>


<h4>Account Information</h4>
<form method="post">
<table border="0" cellspacing="50">
<tr>
  <td>UserID</td>
  <td><input type="number" name="id"><br></td>
</tr>

<tr>
	<td>Nickname(The name shows to others)</td> 
	<td>	 <input type="text" name="nickname" value =""><br></td></tr>
</tr>
<tr>
	<td>Username(The name for logging in)</td> 
	<td>	 <input type="text" name="username" value =""><br></td></tr>
</tr>
</table>
<a href="password.php">Change Your password</a>

<h4>       </h4>


<h4>Personal Information</h4>
<table border="0" cellspacing="50">
<tr>
  <td>First Name</td>
  <td><input type="text" name="first"><br></td>
</tr>

<tr>
	<td>Middle Name</td> 
	<td>	 <input type="text" name="mid" value =""><br></td></tr>
</tr>

<tr>
	<td>Last Name</td> 
	<td>	 <input type="text" name="last"><br></td></tr>
</tr>
<tr>
	<td>Cell Phone</td> 
	<td>	 <input type="num" name="phone"><br></td></tr>
</tr>
<tr>
	<td>Email</td> 
	<td>	 <input type="text" name="email"><br></td></tr>
</tr>
</table>
<h4>       </h4>


  <h4>Shipping Information</h4>
<table border="0" cellspacing="50">
<tr>
  <td>Street Address 1</td>
  <td><input type="number" name="address1"><br></td>
</tr>

<tr>
	<td>Street Address 2</td> 
	<td>	 <input type="text" name="address2" value =""><br></td></tr>
</tr>
<tr>
	<td>Username(The name for logging in)</td> 
	<td>	 <input type="text" name="3" value =""><br></td></tr>
</tr>
</table>

 <input type="submit" name="test" id="test" value="RUN" /><br/>

</form>

<?php
function write($link)
{
   echo "Your information is saved" ;
   $sql = "UPDATE user SET UserFirst='".  $_POST["first"] . "',  UserLast='".  $_POST["last"] . "', UserMiddle='".  $_POST["mid"] . "',Email = '".  $_POST["email"] . "',Nickname = '".  $_POST["nickname"] . "', Username='".  $_POST["username"] . "', Phone='".  $_POST["phone"] . "' WHERE UserID=" . $_POST["id"] . "";
  if ($link->query($sql) === TRUE) {
     echo "New record created successfully";
 } else {
   echo "Error: " . $sql . "<br>" . $link->error;
} }
  if(array_key_exists('test',$_POST)){
   write($link);
}?>