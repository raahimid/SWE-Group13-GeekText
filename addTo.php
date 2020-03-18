<!DOCTYPE html>
<html lang = "en">
    <head>
        <title>Add to</title>
        <meta charset = "UTF-8" /> 
        <link rel="stylesheet" type="text/css" href="addTo.css">
    </head>
        <body>
            <form method="POST">
                <input type="submit" name="addBtn"
                        class="button" value="Add to Wishlist"/>
            </form>
            <?php
                if(isset($_POST['addBtn'])) {
                    addToWishList();
                }

                function addToWishlist() {
                    $defaultWishlist = "Your Wishlist";

                    include 'db_connection.php';
                    $conn = OpenCon();

                    $sql = "INSERT INTO wishlist (UserID, BookID, Quantity, WishlistName)
                    VALUES ('1', '0', '0', '$defaultWishlist')";

                    if ($conn->query($sql) === TRUE) {
                        echo "New record created successfully";
                    }else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                }
            ?>
        </body> 
</html>