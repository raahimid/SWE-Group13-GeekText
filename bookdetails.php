<?php
// including database connection
require 'init.php';

$bookcode = $_GET['bookid'];

if(isset($_POST['hihi'])){


  $result = mysqli_query($conn, "INSERT INTO `cart` (`UserId`,`BookId`,`quantity`) VALUES ('1',$bookcode,'1')");

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


}


$result = mysqli_query($conn, "select comment,bookcover,BookTitle, PublisherName, BookRating, genre, Price,
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
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
   <link rel="stylesheet" href="css/bookdetails.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,900|Ubuntu&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

</head>

<body>

  <section id="title">

    <div class="container-fluid">

      <!-- Nav Bar -->
      <nav class="navbar navbar-expand-lg navbar-dark">

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




      <!-- Title -->
    <div class="row">
      <div class="col-lg-6">
        <h1><?php echo $BookTitle; ?></h1>
        <!-- INCASE YOU WANT TO CHANGE THE SIZE OF THE BOOK COVER IN BOOK DETAILS PAGE ADD: width="" height="" attributes in img tag-->
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


<!-- Add to Cart Button -->
<form method="POST">
     <input type="submit" name="hihi" title="Add to Cart" value="Add to Cart"> <!-- Add Cart</button> -->
  </form>

  <!-- Features -->

  <section id="reviews">
    <div class="row">
      <h4>Reviews</h4>
    </div>

  <p>
  <?php

  $result = mysqli_query($conn, "SELECT Rating,Comment,bookcover FROM book
  LEFT JOIN review ON book.bookid = review.bookid
  where book.bookid=$bookcode");

  while($res = mysqli_fetch_assoc($result))
  //while($res = $result->fetch_assoc())
  {
    echo $res['Rating'] . ' ' . $res['Comment'] . "<br>";
  }

  ?> </p>
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
