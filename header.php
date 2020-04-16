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
      <a class="navbar-brand" style="color:chartreuse; font-size: 24;" href="./"></a>
    </div>
    <ul class="nav navbar-nav">
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Browse Books<span class="caret"></span></a>
        <ul class="dropdown-menu">
		  <li><a href="./test.php">All</a></li>
          <li><a href="book_genre.php">Genre</a></li>
          <li><a href="book_best_seller.php"> By Best Selling</a></li>
          <li><a href="book_rating.php">Rating</a></li>

        </ul>
      </li>
    </ul>
    <ul class="nav navbar-nav navbar-right">

    <?php
    
				session_start();
				if(!isset($_SESSION['username'])){
					echo'<li><a href="./shopingcart.php"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a></li>
						 <li><a href="Profile/sign up/sign up.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
						 <li><a href="Profile/login/loginpage.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>';
				}	
				else{
					
					$id = $_SESSION['ID'];
					$name = $_SESSION['name'];
					$nickname = $_SESSION['Nickname'];
					$link = mysqli_connect("localhost:3306", "root", "", "bookdb");
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
					
					
					echo '
					<li><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> Cart - '.$headerCartItem.' item(s)</a></li>
					<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="./account.php">'. $name . '<span class="caret"></span></a>
	        				<ul class="dropdown-menu">
		          				<li><a href="Profile/Profile.php">Account</a></li>
		         			    <li><a href="logout.php">Sign Out</a></li>
							</ul>   
						 </li>
					<li><a href="library.php">Library</a></li>
					<li><a href="./wishlist.php"><span class="glyphicon glyphicon-log-in"></span> Wishlist</a>';
					
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