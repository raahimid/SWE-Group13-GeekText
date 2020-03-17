<!DOCTYPE html>
<html>
    <head>
        <title>wishlist.html</title>
        <meta charset = "UTF-8" />
        
        <!--<link rel="stylesheet" href="wishlist.css">-->
    </head>
    <body>
        <form method="POST" action="wishlist.php" autocomplete="off">
            <fieldset>
                <legend>Create A Wishlist</legend>
                <input type="text" name="textBox"
                        class="text" minlength="1" maxlength="18"/>
                <input type="submit" name="createBtn"
                        class="button" value="Create"/>
            </fieldset>
        </form>
        <?php
            $wishlists = array('','','');
            $index = 0;
            for($index = 0; $index <= 2; $index++) {
                if(isset($_POST['createBtn'])) {
                    $wishlists[$index] = createWishlist();
                }
                echo "The books is: " . $wishlists[$index];
            }
            
            function createWishlist() {
                $wishlistName =" ";
                if(isset($_POST['textBox'])) {
                    $wishlistName = $_POST['textBox'];
                }
            }

            function insertIntoWishlist() {
                include 'db_connection.php';
                $conn = OpenCon();

                $sql = "INSERT INTO wishlist (UserID, BookID, Quantity, WishlistName)
                VALUES ('1', '4', '1', 'placehold')";

                if ($conn->query($sql) === TRUE) {
                    echo "New record created successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            }

            function deleteFromWishlist() {
                include 'db_connection.php';
                $conn = OpenCon();

                $sql = "DELETE FROM wishlist WHERE id=1";

                if ($conn->query($sql) === TRUE) {
                    echo "Record deleted successfully";
                } else {
                    echo "Error deleting record: " . $conn->error;
                }
            }
        ?>
    </body>
</html>