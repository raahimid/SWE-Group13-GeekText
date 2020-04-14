<?php
// including database connection
//require 'init.php';
include 'init.php';
include 'header.php';

$bookcode = $_GET['bookid'];


 if(isset($_POST['hihi'])){

  $result = mysqli_query($conn, "INSERT INTO `cart` (`UserId`,`BookId`,`quantity`) VALUES ('$id',$bookcode,'1')");

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


$result = mysqli_query($conn, "select comment,bookcover,BookTitle, PublisherName, BookRating, genre, Price,
ReleaseDate, AuthorName, book.AuthorID from book left join review on book.bookid = review.bookid JOIN publisher on book.PublisherID = publisher.PublisherID
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
  $AuthorID = $res['AuthorID'];
}


?>

<!DOCTYPE html>
<html>


<head>
  <meta charset="utf-8">
  <title>GeekText</title>
  <conn rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
   <conn rel="stylesheet" href="css/bookdetails.css">
   <conn href="https://fonts.googleapis.com/css?family=Montserrat:400,900|Ubuntu&display=swap" rel="stylesheet">
   <conn rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

   <!--rating css -->
  <conn rel="stylesheet" href="rating.css">
</head>

<body>

  <section id="title">

  <!-- <div class="container-fluid"> -->

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
<div class ="container">
      <div class="row">
        <div class="col-lg-6">
          <h2><?php echo $BookTitle; ?></h2>
          <a class="lightbox" href="#bookimage">
            <img class="img-responsive img-thumbnail" style="width:200px;height:300px display: block;
            margin-left: 140px;
            margin-right: auto;" src="images/<?php echo $cover; ?>">
          </a>
          <div class="lightbox-target" id="bookimage">
            <img src="images/<?php echo $cover; ?>"/>
          <a class="lightbox-close" href="#"></a>
          </div>
        <div class="col-lg-6" style="padding-top: 100px">
          <a href="authordetails.php?AuthorID=<?php echo $AuthorID; ?>"><b>Author: </b><?php echo $AuthorName; ?></a>
          <p class = "bookdetails" "publisher-name"><b>Publisher: </b><?php echo $PublisherName; ?></p>
          <p class = "bookdetails" "book-genre"><b>Genre: </b><?php echo $Genre; ?></p>
          <p class = "bookdetails" "avg-rating"><b>Avg. Rating: </b><?php echo $BookRating; ?></p>
          <p class = "bookdetails" "publish-date"><b>Published On: </b><?php echo $ReleaseDate; ?></p>
          <p class = "bookdetails" "book-price"><b>Price: </b><?php echo $Price; ?></p>
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
<conn rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.checked {
  color: orange;
}
</style>
<!-- CSS FOR THE DISPlAYED STARS......END HERE - LEONXL - AL  --------->

  <p>
  <?php

  /* FETCH THE BOOKS - LEONXL - AL */
  $result = mysqli_query($conn, "SELECT Rating, Comment, bookcover, UserId FROM book
  LEFT JOIN review ON book.bookid = review.bookid
  where book.bookid=$bookcode");

   /* QUERY FOR ALL USERNAMES IF USER IS NOT SIGNED IN - LEONXL - AL */
   $resultForUserName = mysqli_query($conn, "SELECT `Rating`, `Comment`, `UserFirst` FROM `user`
   LEFT JOIN review ON user.UserID = review.UserID");
   while($res=mysqli_fetch_assoc($resultForUserName)){
        $ForUserName=$res['UserFirst'];
   }


/*QUERY FOR BOOKS, USED TO VERIFY IF PERSON BOUGHT THE BOOK - LEONXL - AL */
$resultPurchased = mysqli_query($conn, "SELECT UserId, purchased.BookId, isPurchased, purchaseID FROM purchased
LEFT JOIN book ON purchased.bookid = book.bookId WHERE purchased.bookId = $bookcode;");

/*FETCH IsPurchased Column of 1's - LEONXL - AL */
while ($row = mysqli_fetch_assoc($resultPurchased)){
$isPurchased = $row['isPurchased'];
}

$purchasedFlag = 1; /*FLAG USED TO COMPARE AGAINST isPurchased Column.
                     If we assign variable to a 0 (no comment section will show) - LEONXL - AL */

echo "<h4>Reviews</h4>";

/*LOGIC: if customer bought the book, give option to comment - LEONXL - AL */
echo "<div class='entire-commentsection'>";
if($purchasedFlag == $isPurchased && $id){

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
  echo "<div class='postAs'>";
  echo "<select id='postAs' name='postAs' required>";
  echo "<option value='' disabled selected>Post as:</option>";
  echo  "<option value='Anonymous'>Anonymous</option>";
  echo  "<option value='$name'> $name </option>";
  echo "</select>" . "<br>";
  echo "</div>";

  /* TEXT AREA TO LEAVE A COMMENT */
  echo   "<textarea id='Comment' name='Comment' rows='10' cols='60' required Placeholder='Leave a comment...'></textarea>" . "<br>";
  echo   "<button value='submit'>Submit</button>";
  echo "</form>";

}
echo "</div>";



$Rating = mysqli_real_escape_string($conn, $_POST['Rating']); //SUPERGLOBAL - LEONXL - AL
$Comment = mysqli_real_escape_string($conn, $_POST['Comment']); //SUPERGLOBAL - LEONXL - AL


//INSERT COMMENT INTO DATABASE - LEONXL - AL
if(isset($_POST['postAs']) && $_POST['postAs'] == 'Anonymous'){
$sql = mysqli_query($conn,"INSERT INTO `review` (`Comment`,`Rating`,`bookId`) VALUES ('$Comment','$Rating','$bookcode');");//USING BOOKCODE DECLARED AT TOP OF FILE - LEONXL - AL
echo "<meta http-equiv='refresh' content='0'>"; //REFRESH WHEN SUBMIT COMMENT BUTTON IS CLICKED
} elseif (isset($_POST['postAs']) && $_POST['postAs'] == $name){
  $sql = mysqli_query($conn,"INSERT INTO `review` (`Comment`,`Rating`,`bookId`,`UserID`) VALUES ('$Comment','$Rating','$bookcode','$id');");
  echo "<meta http-equiv='refresh' content='0'>"; //REFRESH WHEN SUBMIT COMMENT BUTTON IS CLICKED
}

echo "<div class='displayed-rating'>";
echo "<hr class='rating-border'>";
/* FETCHING COMMENTS AND STAR RATING AMOUNT TO DISPLAY - LEONXL - AL */

if(mysqli_num_rows($result) > 0){

while($res = mysqli_fetch_assoc($result)){
$commentcheck = $res['Comment']; //IT MUST HAVE A COMMENT TO DISPLAY ANYTHING
$staramount = $res['Rating']; //RETURNS THE AMOUNT OF STARS - LEONXL - AL
$username = $res[''];

 for($x = 0; $x<$staramount;$x++){ //LOGIC: IF $x (is less than) $staramount(example:3) Result: Print 3 stars - LEONXL - AL
  echo "<span class='fa fa-star checked'></span>"; //ECHO THE STAR IMAGE - LEONXL - AL
  }

  $userId = $res['UserId'];
  if($userId == NULL && $commentcheck){
      echo "<br>" . '<strong>Anonymous</strong>' . ' ' . wordwrap($res['Comment'],50,"<br>\n",True) . "<br>";
      echo "<hr class='rating-border'>";
    }
   elseif($userId == $id && $commentcheck){
    echo "<br>" .'<strong>' . $name . '</strong>' . ' ' . wordwrap($res['Comment'],50,"<br>\n",True) . "<br>"; //SHOWS COMMENTS - LEONXL - AL
    echo "<hr class='rating-border'>";
  } else{
    echo "<br>" .'<strong>' . $ForUserName . '</strong>' . ' ' . wordwrap($res['Comment'],50,"<br>\n",True) . "<br>"; //SHOWS COMMENTS - LEONXL - AL
    echo "<hr class='rating-border'>";
  }


}

}
echo "</div>";
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
    <!-- CSS-->
    <style>
      a.lightbox img {
      border: 3px solid white;
      box-shadow: 0px 0px 8px rgba(0,0,0,.3);
      }

       Styles the lightbox, removes it from sight and adds the fade-in transition */

      .lightbox-target {
      position: fixed;
      top: -100%;
      width: 100%;
      background: rgba(0,0,0,.7);
      width: 100%;
      opacity: 0;
      -webkit-transition: opacity .5s ease-in-out;
      -moz-transition: opacity .5s ease-in-out;
      -o-transition: opacity .5s ease-in-out;
      transition: opacity .5s ease-in-out;
      overflow: hidden;
      }

      /* Styles the lightbox image, centers it vertically and horizontally, adds the zoom-in transition and makes it responsive using a combination of margin and absolute positioning */

      .lightbox-target img {
      margin: auto;
      position: absolute;
      top: 0;
      left:0;
      right:0;
      bottom: 0;
      max-height: 0%;
      max-width: 0%;
      border: 3px solid white;
      box-shadow: 0px 0px 8px rgba(0,0,0,.3);
      box-sizing: border-box;
      -webkit-transition: .5s ease-in-out;
      -moz-transition: .5s ease-in-out;
      -o-transition: .5s ease-in-out;
      transition: .5s ease-in-out;
      }

      /* Styles the close link, adds the slide down transition */

      a.lightbox-close {
      display: block;
      width:50px;
      height:50px;
      box-sizing: border-box;
      background: white;
      color: black;
      text-decoration: none;
      position: absolute;
      top: -80px;
      right: 0;
      -webkit-transition: .5s ease-in-out;
      -moz-transition: .5s ease-in-out;
      -o-transition: .5s ease-in-out;
      transition: .5s ease-in-out;
      }

      /* Provides part of the "X" to eliminate an image from the close link */

      a.lightbox-close:before {
      content: "";
      display: block;
      height: 30px;
      width: 1px;
      background: black;
      position: absolute;
      left: 26px;
      top:10px;
      -webkit-transform:rotate(45deg);
      -moz-transform:rotate(45deg);
      -o-transform:rotate(45deg);
      transform:rotate(45deg);
      }

      /* Provides part of the "X" to eliminate an image from the close link */

      a.lightbox-close:after {
      content: "";
      display: block;
      height: 30px;
      width: 1px;
      background: black;
      position: absolute;
      left: 26px;
      top:10px;
      -webkit-transform:rotate(-45deg);
      -moz-transform:rotate(-45deg);
      -o-transform:rotate(-45deg);
      transform:rotate(-45deg);
      }

      /* Uses the :target pseudo-class to perform the animations upon clicking the .lightbox-target anchor */

      .lightbox-target:target {
      opacity: 1;
      top: 0;
      bottom: 0;
      }

      .lightbox-target:target img {
      max-height: 100%;
      max-width: 100%;
      }

      .lightbox-target:target a.lightbox-close {
      top: 0px;
      }
    </style>



</body>

</html>
