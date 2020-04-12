<?php
// including database connection
require 'init.php';
include 'header.php';
if (!isset($_GET['book_id']) AND !isset($_POST['add'])){
    header("Location: test.php");
    exit;
}

if(isset($_POST['add'])){
    $book_id = $_POST['book_id'];
    $quantity = $_POST['quantity'];
    if(isset($user_id)) {
        $query = "INSERT INTO cart (UserId, BookId, quantity) VALUES('$user_id','$book_id','$quantity')";
        if (mysqli_query($conn, $query)) {
            header("Location: cart.php");
            exit;
        } else {
            $error = 1;
        }
    }else{
        $_SESSION['cart'][] = $book_id.'~'.$quantity;
        header("Location: cart.php");
        exit;
    }
}

$book_id = isset($_GET['book_id'])?$_GET['book_id']:$_POST['book_id'];
$book = mysqli_query($conn, "SELECT * FROM book WHERE BookID='$book_id'")->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        body{
            padding:0;
            margin: 0;
            font-family: sans-serif;
        }
        .page_link{
            display: inline-block;
            color: #222;
            border: 1px solid #ddd;
            padding: 5px 10px;
            margin: 0 5px;
            text-decoration: none;
            cursor: pointer;
        }
        .active_page{
            background-color:dodgerblue;
            color: #FFF;
            outline: none;
            border: 1px solid rgba(0,0,0,.1);
        }
        .container{
            border: 2px solid #ccc;
            padding: 10px;
        }
        .posts{
            margin: 0;
            list-style: none;
            padding: 20px;
        }
        .posts li{
            padding:10px 5px;
            border-bottom: 1px solid #ddd;
            margin: auto;

        }

        /*-------------product-top CSS----------------*/

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
</head>
<body>
<h1 style="text-align:center;">Geek Text</h1>
<div class="container">
    <div class="row">
        <div class="col-md-6 text-center">
            <img style="display: inline" src="images/<?php echo $book['BookCover']; ?>" class="img-responsive" alt="">
        </div>
        <div class="col-md-6">
            <?php if(isset($error) AND $error == 1){ ?>
                <div class="alert alert-danger">
                    Something went wrong.
                </div>
            <?php }?>
            <h2><?php echo $book['BookTitle']; ?></h2>
            <h3 class="text-muted">Price: $<?php echo $book['Price'];?> </h3>
            <form style="padding-left: 0;" action="add_to_cart.php" method="post" class="col-md-6">
                <input type="number" name="quantity" value="1" min="1" placeholder="Quantity" required="" class="form-control">
                <input type="hidden" name="book_id" value="<?php echo $book['BookID'] ?>" ><br>
                <input type="submit" name="add" value="Add To Cart" class="btn btn-primary btn-block">
            </form>
        </div>
    </div>
</div>
</body>
</html>
