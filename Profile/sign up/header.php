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
				define('DB_SERVER', 'localhost');
				define('DB_USERNAME', 'root');
				define('DB_PASSWORD', '');
				define('DB_NAME', 'book store');

				/* Attempt to connect to MySQL database */
				$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
				
			
					
				
					
				
				
    ?>

     <li style="float:right;">
        <a style="display:block; color:white; text-align:center; padding:15px 25px; text-decoration:none;" href="./shopping_cart.php"></a>
     </li>	
    </ul>
  </div>
</nav>
</body>
</html>