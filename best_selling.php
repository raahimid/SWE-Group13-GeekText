<?php
    // DB connection?
    include("header.php");
    include 'init.php';
?>
<div class="container">
  <h2 align="center">Best selling</h2>
  <!--  ********** Data section*********** -->
 <div class="tab-content">
    <!-- Display of All Books Tab -->
    <br>
    <div id="home" class="tab-pane fade in active">

        <!-- buttons used for sorting    -->
       

        
        <?php
        $sql = "SELECT booktitle, price, bookid, bookcover, bookrating FROM book limit 10";
        $bookList = mysqli_query($conn, $sql);

        echo'<div style="display:flex; flex-wrap: wrap;">';
        while ($row=mysqli_fetch_array($bookList)) {
            // display books
            include("response.php");
        }
        ?>
        </div>
    </div>

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