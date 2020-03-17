<html>
<head>
<title>E-Commerce Website </title>
<link rel="stylesheet" href="booksort.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
</head>
<?php
    include 'init.php';
    #include 'header.php';
  $query = "SELECT bookid, bookcover, booktitle, price, bookrating FROM book";
  $result = mysqli_query($conn, $query);
?>


<section class="on-sale">
<div class="container">
    <div class="title-box">
    <h2>On Sale</h2>
    <?php for($i = 0; $i < mysqli_num_rows($result); $i++){ ?>
    </div>
    <div class="row">
    <?php while($query_row = mysqli_fetch_assoc($result)){ ?>
    <div class="col-md-3">
    <div class="product-top">
        <img class="img-responsive img-thumbnail" src="images/<?php echo $query_row['bookcover']; ?>">
        <div class="overlay-right">
        <button type="button" class="btn btn-secondary" title="Add to Wishlist">
           <i class="fa fa-heart-o"></i>
        </button>
            <button type="button" class="btn btn-secondary" title="Add to Cart">
           <i class="fa fa-shopping-cart"></i>
        </button>
        </div>
    </div>
    <div class="product-bottom text-center">
  <?php
      $rating = $query_row['bookrating'];
      $rating_fill = 5 - ceil($rating);

while($rating > 0)  {
    if ($rating < 1) {
        ?>
        <i class="fa fa-star-half-o"></i>
        <?php
        $rating = 0;
        }

    else {
        ?>
        <i class="fa fa-star"></i>
        <?php
        $rating = $rating - 1;
    }
        if($rating == 0 && $rating_fill > 0 ){
        While($rating_fill>0){
        ?>
        <i class="fa fa-star-o"></i>
        <?php
        $rating_fill = $rating_fill - 1;
        }

    }
} ?>
        <h3><?php echo $query_row['booktitle'];?> </h3>
        <h5>$<?php echo $query_row['price'];?></h5>
    </div>
    </div>
<?php } ?>
<?php }
