<html lang="en">
<head>
<meta charset="UTF-8">
<title>Books</title>
</head>
<body>


<?php
	// DB connection?
	include("header.php");
	include 'init.php';

	// Get the list of all genres in DB
	$genres = "SELECT distinct genre FROM book";
	$genresList = mysqli_query($link, $genres);
?>


<!-- div for the genres navigation bar? -->

<!--  ********** Heading section*********** -->
<div class="container">
  <h2>Books by Genre</h2>
  <p>Select tab to display genre</p>
  <ul class="nav nav-tabs">
  	<!-- Create main tab heading for all books in all genres -->
    <li class="active"><a data-toggle="tab" href="#home">All Genres</a></li>
    <!-- Create dynamic tabs heading using all available genres from db --> 
    <?php while( $genresRow=mysqli_fetch_array($genresList)){
    	echo '<li><a data-toggle="tab" href="#menu' .str_replace(' ', '', $genresRow['genre']). '">' . $genresRow['genre']. '</a></li>';
    }?>

  </ul

  <!--  ********** Data section*********** -->
 <div class="tab-content">
  	<!-- Display of All Books Tab -->
  	<br>
    <div id="home" class="tab-pane fade in active">

	    <!-- buttons used for sorting	 -->
	   

        <h3>All Genres</h3>
        <?php
		$sql = "SELECT booktitle, price, bookid, bookcover, bookrating FROM book";
		$bookList = mysqli_query($link, $sql);

		echo'<div style="display:flex; flex-wrap: wrap;">';
		while ($row=mysqli_fetch_array($bookList)) {
			// display books
			include("response.php");
		}
		?>
		</div>
	</div>

	<!-- Display of books Specific by genre -->
    <?php
    $genres = "SELECT distinct genre FROM book";
	$genresList = mysqli_query($link, $genres);
	// Echo Genre selected
	while( $genresRow=mysqli_fetch_array($genresList)) {
		$current = $genresRow['genre'];
		echo '<div id="menu'. str_replace(' ', '', $genresRow['genre']) . '"' . 'class="tab-pane fade">';


	    // buttons used for sorting
		

	 	echo '<h3>' . $genresRow['genre']. '</h3>';

		// Echo all books for the specified genre
	    $sql = "SELECT booktitle, price, bookid, bookcover, bookrating FROM book WHERE genre = '$current'";
	    $bookList = mysqli_query($link, $sql);
		echo'<div style="display:flex; flex-wrap: wrap;">';
		while ($row=mysqli_fetch_array($bookList)) {
			include("response.php");	
		}
		echo '</div>';
	  	echo '</div>';
    }
	
    ?>
</div>
<style type="text/css">
	.overlay-right
{
    display: block;
    opacity: 0;
    position: absolute;
    top: 10%;
    margin-left: 0;
    width: 70px;
}
.overlay-right .fa
{
    cursor: pointer;
    background-color: #fff;
    color: #000;
    height: 35px;
    width: 35px;
    font-size: 20px;
    padding: 7px;
    margin-top: 5%;
    margin-bottom: 5%;
}
.overlay-right .btn-secondary
{
    background: none !important;
    border: none !important;
    box-shadow: none !important;
}
.product-top:hover .overlay-right
{
    opacity: 1;
    margin-left: 5%;
    transition: 0.5s;
}

/*--------------Product-bottom-CSS---------------*/

.product-bottom .fa
{
    color: orange;
    font-size: 30px;
}
.product-bottom h3
{
    font-size: 20px;
    font-weight: bold;
}
.product-bottom h5
{
    font-size: 15px;
    padding-bottom: 10px;
}
.new-products
{
    margin: 50px 0;
}
        
    </style>
</style>

</body>
</html>