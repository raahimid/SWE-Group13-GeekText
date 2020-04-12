<?php
// including database connection
require 'init.php';
include 'header.php';
if (isset($_POST['update-session'])){
    foreach ($_SESSION['cart'] as $key=>$val){
        $item = explode("~",$val);
        $book_id = $item[0];
        $_SESSION['cart'][$key] = $book_id.'~'.$_POST['quantity'.'-'.$book_id];
    }
    header("Location: cart.php");
    exit;
}

if(isset($_POST['checkout-session'])){
    unset($_SESSION['cart']);
    $checkout = 1;
}

if (isset($_GET['remove_session'])){
    $book_id = $_GET['remove_session'];
    foreach ($_SESSION['cart'] as $key=>$val){
        $item = explode("~",$val);
        if($book_id == $item[0]){
            unset($_SESSION['cart'][$key]);
        }
    }
    header("Location: cart.php");
    exit;
}

if (isset($_POST['update'])){
    foreach ($_POST as $key=>$val){
        if($key == 'update'){
            continue;
        }else{
            $book_id = explode("-",$key)[1];
            $query = "UPDATE cart SET quantity='$val' WHERE UserId='$id' AND BookId='$book_id'";
            mysqli_query($conn, $query);
        }
    }
    header("Location: cart.php");
    exit;
}

if(isset($_POST['checkout'])){
    $query = "DELETE FROM cart WHERE UserId='$id'";
    mysqli_query($conn, $query);
    $checkout = 1;
} 
if(isset($_POST['checkout'])){
    $query = "INSERT INTO `purchased`(`UserId`, `BookId`, `isPurchased`) VALUES ($id,$book_id,1);";
    mysqli_query($conn, $query);
    $checkout = 1;
} 

if (isset($_GET['remove'])){
    $book_id = $_GET['remove'];
    $query = "DELETE FROM cart WHERE UserId='$id' AND BookId='$book_id'";
    mysqli_query($conn, $query);
    header("Location: cart.php");
    exit;
}
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
        <div class="col-md-12">
            <div class="cart content-wrapper">
                <h3 class="text-muted text-center">Shopping Cart</h3>
                <hr>
                <?php if(!isset($id)): ?>
                    <form action="cart.php" method="post">
                        <table class="table">
                            <thead>
                            <tr>
                                <td colspan="2">Books In Cart</td>
                                <td class="rhide">Price</td>
                                <td>Quantity</td>
                                <td>Total</td>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if(isset($checkout) AND $checkout == 1): ?>
                                <tr class="text-center">
                                    <td colspan="5" class="text-center">
                                        Thank you for your purchase. <a href="cart.php" class="btn btn-primary">Refresh</a>
                                    </td>
                                </tr>
                            <?php else: ?>
                                <?php
                                $cart = isset($_SESSION['cart'])?$_SESSION['cart']:[];
                                ?>
                                <?php if(count($cart) > 0): ?>
                                    <?php
                                    $total = 0;
                                    foreach ($cart as $item):
                                        $item = explode("~",$item);
                                        $book_id = $item[0];
                                        $book = mysqli_query($conn, "SELECT * FROM book WHERE BookID='$book_id'")->fetch_assoc();
                                        ?>
                                        <tr>
                                            <td class="img">
                                                <a href="bookdetails.php?bookid=<?php echo $book['BookID'] ?>">
                                                    <img src="images/<?php echo $book['BookCover']; ?>" width="50" height="50" alt="<?php echo $book['BookTitle']; ?>">
                                                </a>
                                            </td>
                                            <td>
                                                <a href="bookdetails.php?bookid=<?php echo $book['BookID'] ?>""><?php echo $book['BookTitle']; ?></a>
                                                <br>
                                                <a class="btn btn-danger" href="cart.php?remove_session=<?php echo $book['BookID']; ?>" class="remove">Remove</a>
                                            </td>
                                            <td class="price">$<?= $book['Price'] ?></td>
                                            <td class="quantity">
                                                <input style="max-width: 60px;padding: 5px;" type="number" name="quantity-<?php echo $book['BookID'] ?>" value="<?php echo $item[1] ?>" min="1" class="form-control" placeholder="Quantity" required="">
                                            </td>
                                            <td class="price">$<?php echo $sub_total = $book['Price']*$item[1]; ?></td>
                                            <?php $total += $sub_total;?>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr class="text-center">
                                        <td colspan="5" class="text-center">
                                            No book in cart. <a href="test.php" class="btn btn-primary">Go to shop</a>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            <?php endif; ?>
                            </tbody>
                        </table>
                        <?php if(isset($cart) AND count($cart)>0): ?>
                            <div class="pull-right">
                                <div class="subtotal">
                                    <span class="text">Total</span>
                                    <span class="price">$<?php echo $total; ?></span>
                                </div>
                                <div class="buttons">
                                    <input type="submit" class="btn btn-primary" value="Update" name="update-session">
                                    <input type="submit" class="btn btn-primary" value="Checkout" name="checkout-session">
                                </div>
                            </div>
                        <?php endif; ?>
                    </form>
                <?php else: ?>
                <form action="cart.php" method="post">
                    <table class="table">
                        <thead>
                        <tr>
                            <td colspan="2">Books In Cart</td>
                            <td class="rhide">Price</td>
                            <td>Quantity</td>
                            <td>Total</td>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if(isset($checkout) AND $checkout == 1): ?>
                        <tr class="text-center">
                            <td colspan="5" class="text-center">
                                Thank you for your purchase. <a href="cart.php" class="btn btn-primary">Refresh</a>
                            </td>
                        </tr>
                        <?php else: ?>
                        <?php
                            $cart = [];
                            $query = "SELECT * FROM cart WHERE UserId='$id'";
                            $res = mysqli_query($conn, $query);
                            while($row = mysqli_fetch_assoc($res)){
                                $cart[] = $row;
                            }
                            $total = 0;
                            ?>
                        <?php if(count($cart) > 0): ?>
                        <?php
                            foreach ($cart as $item):
                                $book_id = $item['BookId'];
                                $book = mysqli_query($conn, "SELECT * FROM book WHERE BookID='$book_id'")->fetch_assoc();
                        ?>
                        <tr>
                            <td class="img">
                                <a href="bookdetails.php?bookid=<?php echo $book['BookID'] ?>">
                                    <img src="images/<?php echo $book['BookCover']; ?>" width="50" height="50" alt="<?php echo $book['BookTitle']; ?>">
                                </a>
                            </td>
                            <td>
                                <a href="bookdetails.php?bookid=<?php echo $book['BookID'] ?>""><?php echo $book['BookTitle']; ?></a>
                                <br>
                                <a class="btn btn-danger" href="cart.php?remove=<?php echo $book['BookID']; ?>" class="remove">Remove</a>
                            </td>
                            <td class="price">$<?= $book['Price'] ?></td>
                            <td class="quantity">
                                <input style="max-width: 60px;padding: 5px;" type="number" name="quantity-<?php echo $book['BookID'] ?>" value="<?php echo $item['quantity'] ?>" min="1" class="form-control" placeholder="Quantity" required="">
                            </td>
                            <td class="price">$<?php echo $sub_total = $book['Price']*$item['quantity']; ?></td>
                            <?php $total += $sub_total;?>
                        </tr>
                        <?php endforeach; ?>
                        <?php else: ?>
                            <tr class="text-center">
                                <td colspan="5" class="text-center">
                                    No book in cart. <a href="test.php" class="btn btn-primary">Go to shop</a>
                                </td>
                            </tr>
                        <?php endif; ?>
                        <?php endif; ?>
                        </tbody>
                    </table>
                    <?php if(isset($cart) AND count($cart)>0): ?>
                        <div class="pull-right">
                            <div class="subtotal">
                                <span class="text">Total</span>
                                <span class="price">$<?php echo $total; ?></span>
                            </div>
                            <div class="buttons">
                                <input type="submit" class="btn btn-primary" value="Update" name="update">
                                <input type="submit" class="btn btn-primary" value="Checkout" name="checkout">
                            </div>
                        </div>
                    <?php endif; ?>
                </form>
                <?php endif; ?>
            </div>

        </div>
    </div>
</div>
</body>
</html>
