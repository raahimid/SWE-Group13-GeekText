<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body> 

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" style="color:chartreuse; font-size: 30;" href="./"></a>
    </div>
    <ul class="nav navbar-nav">
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Browse Books<span class="caret"></span></a>

        <ul class="dropdown-menu">
          <li><a href="book_rating.php">Rating</a></li>

        </ul>
      </li>
    </ul>
    <ul class="nav navbar-nav navbar-right">

    <?php		
				session_start();
				define('DB_SERVER', 'localhost');
				define('DB_USERNAME', 'root');
				define('DB_PASSWORD', '');
				define('DB_NAME', 'book store');
 				$username = $_SESSION['username'];	

				/* Attempt to connect to MySQL database */
				$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
				$sql = "SELECT UserID FROM user where UserName= '$username' ";
			$result = $link->query($sql);
				while($row = mysqli_fetch_assoc($result))
		
		{
		
					$_SESSION['id']=$row['UserID'];
					}
				if($_SESSION['islogin']!=1){
					echo'<li><a href="../shopingcart.php"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a></li>
						 <li><a href="sign up/sign up.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
						 <li><a href="login/loginpage.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>';
				}	
				else{
					
				$id = $_SESSION['id'];
					$sql = "SELECT SUM(quantity) AS sum FROM cart WHERE userid ='$id'";
					$result1 = mysqli_query($link, $sql);
					$count1=mysqli_num_rows($result1);
					$row1=mysqli_fetch_array($result1);		
					if ($row1['sum'] != NULL ) {
						$headerCartItem = $row1['sum'];	
					}
					else {
						$headerCartItem = 0;
					}			
					
					echo'
					<li><a href="./shopingcart.php"><span class="glyphicon glyphicon-shopping-cart"></span> Cart - '.$headerCartItem.' item(s)</a></li>
					<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="./Profile.php">'.$_SESSION['username']. '<span class="caret"></span></a>
	        				<ul class="dropdown-menu">
		          				<li><a href="Profile.php">Account</a></li>
		         			    <li><a href="../logout.php">Sign Out</a></li>
	        				</ul>
						 </li>
				    <li><a href="../library.php">Library</a></li>';
				}
    ?>

     <li style="float:right;">
        <a style="display:block; color:white; text-align:center; padding:15px 25px; text-decoration:none;" href="./shopping_cart.php"></a>
     </li>	
    </ul>
  </div>
</nav>
</body>
</html>