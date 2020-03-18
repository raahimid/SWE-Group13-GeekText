<!DOCTYPE html>
<html>
    <head>
        <title>Your Wishlist</title>
        <meta charset = "UTF-8" />
        <link rel="stylesheet" type="text/css" href="wishlist.css">
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
            <h1>Your Wishlist</h1>
            <ul id="wishlistHead">
                <li>Book</li>
                <li>Quantity</li>
                <li>Remove</li>
                <li>Add To Shopping Cart</li>
            </ul>
            <?php showWishlist() ?>
        <?php
            $wishlist = " ";
            if(isset($_POST['createBtn'])) {
                    $wishlist = createWishlist();
            }
            
            function createWishlist() {
                $wishlistName =" ";
                if(isset($_POST['textBox'])) {
                    $wishlistName = $_POST['textBox'];
                }
            }

            function showWishlist() {
                $result = " ";

                include 'db_connection.php';
                $conn = openCon();

                $sql = "SELECT BookID, Quantity FROM wishlist";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                // output data of each row
                    while($row = mysqli_fetch_assoc($result)) {
                        echo "<p class='data'> BookID: " . $row["BookID"] . " Quantity: " . $row["Quantity"].  "<br>", "</p>";
                    }
                } else {
                echo "0 results";
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