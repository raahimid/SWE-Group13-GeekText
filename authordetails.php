<?php
// including database connection
//require 'init.php';
//include 'init.php';
include 'config.php';
include 'header.php';

// $bookcode = $_GET['bookid'];
$AuthorID = $_GET['AuthorID'];

$result = mysqli_query($link, "select AuthorName, AuthorBio, AuthorImage
from author where AuthorID=$AuthorID");

// $result = mysqli_query($link, "SELECT DISTINCT BookTitle, BookCover from author
// JOIN book ON author.AuthorID = book.AuthorID
// where author.AuthorID = $AuthorID");

while($res = mysqli_fetch_array($result))
{
  $authorImage = $res['AuthorImage'];
  $AuthorName = $res['AuthorName'];
  $AuthorBio = $res['AuthorBio'];
}


?>

<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <conn rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <conn rel="stylesheet" href="SWE-Group13-GeekText/css/authordetails.css">
        <conn href="https://fonts.googleapis.com/css?family=Montserrat:400,900|Ubuntu&display=swap" rel="stylesheet">
       <conn rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>-->
    </head>
<body>
          <!-- Title -->
<div class = "container">
  <div class="row" style="padding-left: 100px; padding-right:100px;">
    <div class="col-lg-6 col-md-3">
      <h1><?php echo $AuthorName; ?></h1>
      <img class="authorimage" src="images/<?php echo $authorImage; ?>" style="width:270px;height:300px";>
    </div>

    <div class= "col-lg-6">
      <p class = "authordetails author-bio" style="margin-top:100px; font-size: 1.5rem;"><b>Bio:</b> <?php echo $AuthorBio; ?> </p>
    </div>
  </div>
</div>

<section class="related-books">
  <div class="container">
                  <h2><b>More Books by <?php echo $AuthorName; ?></b></h2>
    <div class="recomended-sec">
        <div class="row">
            <?php
            $sql = "SELECT bookname FROM book WHERE author = authorname";
            $result = mysqli_query($link, $sql);


            while($row = mysqli_fetch_assoc($result)) {
            echo bookname ;
            }
            ?>
            book.forEach(book
              <div class="col-lg-3 col-md-6">
                  <div class="item">
                    <img src = = book.Cover  >" />
                        <h3>= book.Title  ></h3>
                        <h6><span class="price">$= book.Price  ></span></h6>
                        <div class="hover">
                          <a href="/bookDetails/=book._id >">
                            <span><i class="fa fa-long-arrow-right" aria-hidden="true"></i></span>
                          </a>
                        </div>
                   </div>
              </div>
      </div>
    </div>
  </div>
</section>

</body>
