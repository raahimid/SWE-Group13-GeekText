
<?php $bookcode = $row['bookid']; 
?>



<div class="col-md-3">
    <div class="product-top">
        <a href="bookdetails.php?bookid=<?php echo $row['bookid']; ?>"><img class="img-responsive img-thumbnail" src="images/<?php echo $row['bookcover']; ?>"></a>
        <div class="overlay-right">
        
       <form method="GET"> <!-- @AL - LEONXL -->
        <button value = "<?php echo $bookcode ?>" type="submit" name="wishlist" class="btn btn-secondary" title="Add to Wishlist"><i class="fa fa-heart-o"></i> <!--WishList Button-->
        <button value = "<?php echo $bookcode ?>" type="submit" name="hihi" class="btn btn-secondary" title="Add to Cart"> <!--CART BUTTON -->
       </form> 

  
       <i class="fa fa-shopping-cart"></i>
</button>
       <!-- @AL - LEONXL -->
    </div>
    </div>
    <div class="product-bottom text-center">
  

    <?php  
   require_once 'init.php';
   if(!isset($_SESSION['ID'])){

   }Else{
   $id = $_SESSION['ID'];

    /* @AL - LEONXL - WISHLIST AND CART QUERIES */
       
      if(isset($_GET['wishlist'])  && $_GET['wishlist'] == $bookcode){
        $resultwish = mysqli_query($conn, "INSERT INTO `wishlist` (`UserId`,`BookId`,`quantity`,`WishlistName`) VALUES ('$id','$bookcode','1','Wishlist');");
      }
      if(isset($_GET['hihi'])  && $_GET['hihi'] == $bookcode){ 
        $result = mysqli_query($conn, "INSERT INTO `cart` (`UserId`,`BookId`,`quantity`) VALUES ('$id','$bookcode','1')");
    }
    /***********@AL - LEONXL*************/
  }
?>

<?php
      $rating = $row['bookrating'];
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
        <h3><?php echo $row['booktitle'];?> </h3>
        <h5>$<?php echo $row['price'];?></h5>
    </div>
</div>

