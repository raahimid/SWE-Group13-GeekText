<?php
// including database connection
require 'init.php';
//include 'config.php';
include 'header.php';

$bookcode = $_GET['bookid'];


 if(isset($_POST['hihi'])){

  $result = mysqli_query($link, "INSERT INTO `cart` (`UserId`,`BookId`,`quantity`) VALUES ('$id',$bookcode,'1')");

  if($result->num_rows > 0){

    while ($row = mysqli_fetch_assoc($result))
             {
               echo "<tr>";
     echo "<td>" . $row['UserId'] . "</td>";
     echo "<td>" . $row['BookId'] . "</td>";
     echo "<td>" . $row['quantity']. "</td>";
 echo "</tr>";

  }
}
echo "<meta http-equiv='refresh' content='0'>"; /* REFRESH PAGE WHEN ADD TO CART GETS CLICKED */

} 


$result = mysqli_query($link, "select comment,bookcover,BookTitle, PublisherName, BookRating, genre, Price,
ReleaseDate, AuthorName from book left join review on book.bookid = review.bookid JOIN publisher on book.PublisherID = publisher.PublisherID
JOIN author on book.AuthorID = author.AuthorID
where book.bookid=$bookcode");
while($res = mysqli_fetch_array($result))
{
  $comment = $res['comment'];
  $cover = $res['bookcover'];
  $BookTitle = $res['BookTitle'];
  $PublisherName = $res['PublisherName'];
  $Price = $res['Price'];
  $Genre = $res['genre'];
  $ReleaseDate = $res['ReleaseDate'];
  $BookRating = $res['BookRating'];
  $AuthorName = $res['AuthorName'];
}


?>

<!DOCTYPE html>
<html>


<head>
  <meta charset="utf-8">
  <title>GeekText</title>
  <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script> -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> 
  <!-- <link rel="stylesheet" href="css/bookdetails.css"> -->
   <link href="https://fonts.googleapis.com/css?family=Montserrat:400,900|Ubuntu&display=swap" rel="stylesheet"> 
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous"> 
   
   <!--rating css -->
   <link rel="stylesheet" href="css/cmmtrating.css"> 

</head>

<body>

  <section id="title">

    <div class="container-fluid">

      <!-- Nav Bar -->
      <!-- <nav class="navbar navbar-expand-lg navbar-dark">

        <a class="navbar-brand" href="">GeekText</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">

          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-conn" href="">Cart</a>
            </li>
            <li class="nav-item">
              <a class="nav-conn" href="">Sign Up</a>
            </li>
            <li class="nav-item">
              <a class="nav-conn" href="">Login</a></a>
            </li>
          </ul>
        </div>
      </nav>
     -->



<!-- Title -->
    <div class="row">
      <div class="col-lg-6">
        <h1><?php echo $BookTitle; ?></h1>
        <img class="img-responsive img-thumbnail" src="images/<?php echo $cover; ?>">
       </div>
      <div class="col-lg-6">
        <p class = "bookdetails" "author-name">Author: <?php echo $AuthorName; ?></p>
        <p class = "bookdetails" "publisher-name">Publisher: <?php echo $PublisherName; ?></p>
        <p class = "bookdetails" "book-genre">Genre: <?php echo $Genre; ?></p>
        <p class = "bookdetails" "avg-rating">Avg. Rating: <?php echo $BookRating; ?></p>
        <p class = "bookdetails" "publish-date">Published On: <?php echo $ReleaseDate; ?></p>
        <p class = "bookdetails" "book-price">Price: <?php echo $Price; ?></p>
      </div>
    </div>
</div>


    </div>
  </section>




  <!------------------------- Features  ------------------>


<!-- Add to Cart Button -->
<form method="POST">
     <input type="submit" name="hihi" title="Add to Cart" value="Add to Cart"> <!-- Add Cart</button> -->
  </form>


<!---------Review Section ------>


<section id="reviews">
<!-- <div class="row">
 <h4>Reviews</h4> 
</div> -->

<!--CSS FOR THE DISPLAYED STARS NEXT TO THE COMMENTS STARTS HERE - LEONXL - AL --> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
<style>
.checked {
  color: orange;
}
</style>
<!-- CSS FOR THE DISPlAYED STARS......END HERE - LEONXL - AL  --------->

  <p>
  <?php

  /* FETCH THE BOOKS - LEONXL - AL */
  $result = mysqli_query($link, "SELECT Rating, Comment, bookcover, UserId FROM book
  LEFT JOIN review ON book.bookid = review.bookid
  where book.bookid=$bookcode");

  




/*QUERY FOR BOOKS, USED TO VERIFY IF PERSON BOUGHT THE BOOK - LEONXL - AL */
$resultPurchased = mysqli_query($link, "SELECT UserId, purchased.BookId, isPurchased, purchaseID FROM purchased 
LEFT JOIN book ON purchased.bookid = book.bookId WHERE purchased.bookId = $bookcode;");

/*FETCH IsPurchased Column of 1's - LEONXL - AL */
while ($row = mysqli_fetch_assoc($resultPurchased)){
$isPurchased = $row['isPurchased']; 
}

$purchasedFlag = 1; /*FLAG USED TO COMPARE AGAINST isPurchased Column.  
                     If we assign variable to a 0 (no comment section will show) - LEONXL - AL */

echo "<h4>Reviews</h4>";

/*LOGIC: if customer bought the book, give option to comment - LEONXL - AL */
if($purchasedFlag == $isPurchased){  

  echo "<form method ='POST'>";
  echo "<div class='rating'>";
  echo "<input type='radio' name='Rating' id='fivestar' value ='5'>";
  echo "<label for='fivestar'></label>";
  echo "<input type='radio' name='Rating' id='fourstar' value ='4'>";
  echo "<label for='fourstar'></label>";
  echo "<input type='radio' name='Rating' id='threestar' value ='3'>";
  echo "<label for='threestar'></label>";
  echo "<input type='radio' name='Rating' id='twostar' value ='2'>";
  echo "<label for='twostar'></label>";
  echo "<input type='radio' name='Rating' id='onestar' value ='1' required>";
  echo "<label for='onestar'></label>";
  echo "</div>";

  /* DROPDOWN FOR POSTING ANONYMOUS OR NICKNAME */
  echo "<select id='postAs' name='postAs' required>";
  echo "<option value='' disabled selected>Post as:</option>";
  echo  "<option value='Anonymous'>Anonymous</option>";
  echo  "<option value='$name'> $name </option>";
  echo "</select>" . "<br>";

  /* TEXT AREA TO LEAVE A COMMENT */
  echo   "<textarea id='Comment' name='Comment' rows='10' cols='60' required Placeholder='Leave a comment...'></textarea>" . "<br>";
  echo   "<button>Submit</button>";
  echo "</form>";
  
}



$Rating = mysqli_real_escape_string($link, $_POST['Rating']); //SUPERGLOBAL - LEONXL - AL
$Comment = mysqli_real_escape_string($link, $_POST['Comment']); //SUPERGLOBAL - LEONXL - AL 


//INSERT COMMENT INTO DATABASE - LEONXL - AL 
if(isset($_POST['postAs']) && $_POST['postAs'] == 'Anonymous'){
$sql = mysqli_query($link,"INSERT INTO `review` (`Comment`,`Rating`,`bookId`) VALUES ('$Comment','$Rating','$bookcode');");//USING BOOKCODE DECLARED AT TOP OF FILE - LEONXL - AL 
echo "<meta http-equiv='refresh' content='0'>"; //REFRESH WHEN SUBMIT COMMENT BUTTON IS CLICKED
} elseif (isset($_POST['postAs']) && $_POST['postAs'] == $name){
  $sql = mysqli_query($link,"INSERT INTO `review` (`Comment`,`Rating`,`bookId`,`UserID`) VALUES ('$Comment','$Rating','$bookcode','$id');");
  echo "<meta http-equiv='refresh' content='0'>"; //REFRESH WHEN SUBMIT COMMENT BUTTON IS CLICKED
}


/* FETCHING COMMENTS AND STAR RATING AMOUNT TO DISPLAY - LEONXL - AL */
while($res = mysqli_fetch_assoc($result)){

$staramount = $res['Rating']; //RETURNS THE AMOUNT OF STARS - LEONXL - AL 

  for($x = 0; $x<$staramount;$x++){ //LOGIC: IF $x (is less than) $staramount(example:3) Result: Print 3 stars - LEONXL - AL 
  echo "<span class='fa fa-star checked'></span>"; //ECHO THE STAR IMAGE - LEONXL - AL 
    }
   
  $userId = $res['UserId'];
  if($userId == NULL){
      echo "<br>" . 'Anonymous' . ' ' . $res['Comment'] . "<br>";
    }
   else{
    echo "<br>" . $name . ' ' . $res['Comment'] . "<br>"; //SHOWS COMMENTS - LEONXL - AL 
   }
    
}

?>  


</p>
</section>

    <!-- Footer -->

    <footer id="footer">
      <div class="footer-box container-fluid">
        <div class= "social-media-emoji">
          <i class="fab fa-twitter"></i>
          <i class="fab fa-facebook-f"></i>
          <i class="fab fa-instagram"></i>
          <i class="fas fa-envelope"></i>
        </div>
        <p class="footer-text">© Copyright 2020 GeekText</p>
      </div>

    </footer>


</body>

</html>
