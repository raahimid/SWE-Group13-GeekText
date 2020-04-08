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
        <?php 
        include_once 'db_connection.php';
        $conn = openCon();

        $localNames = array();
        $localNames = getWishlistName();

        
        print_r($localNames);

        $wishlist = " ";
        if(isset($_POST['createBtn'])) {
            createWishlist();
            header("Location:wishlist.php");
        }
            
        /*
        *   User types into textbox chosen wishlist name
        *   that name gets stored into a variable $wishlistName
        *   which is then used as a parameter in the helper function
        *   to create an "empty" wishlist.
        */
        function createWishlist() {
            $wishlistName =" ";
            if(isset($_POST['textBox'])) {
                $wishlistName = $_POST['textBox'];
                createWishlistHelper($wishlistName);
            }
            return $wishlistName;
        }

        /*
        *   This function inserts an empty value into the database to simulate
        *   an empty wishlist when its created by createWishlist().
        */
        function createWishlistHelper($wishlistName) {
            $conn = openCon();

            $sql = "INSERT INTO wishlist (UserID, BookID, Quantity, WishlistName)
                    VALUES (1, 0, 0, '$wishlistName')";

            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            CloseCon($conn);
        }

        /*
        *   This is a helper function for the showWishlist() function.
        *   It goes to the wishlist table and selects a wishlistname.
        *   The while loop goes through those names and gives them to showWishlist()
        *   as a parameter.
        */
        function getWishlistName() {
            $conn = openCon();
            $sql = "SELECT DISTINCT WishlistName
                    FROM wishlist
                    WHERE userid=1
                    ORDER BY 1 DESC";
            $result = mysqli_query($conn, $sql);

            $names = array();
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $names[] = $row['WishlistName'];
                    showWishlist($row['WishlistName']);
                }
            }
            return $names;
        }

        function showWishlistHelper($nameOfWishlist)
        {
            $conn = openCon();
            $result = " ";
            $sql = "SELECT DISTINCT WishlistName 
                    FROM Wishlist 
                    WHERE WishlistName != '$nameOfWishlist'
                    AND userid=1";

            $result = mysqli_query($conn, $sql);

            $names = array();
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $names[] = $row['WishlistName'];
                }
            }   
            return $names;
        }

        /*
        *   Dynamically shows wishlist data by iterating through each wishlistname
        *   in the wishlist table.
        */
        function showWishlist($nameOfWishlist) {
            $conn = openCon();
            $result = " ";

            $sql = "SELECT wishlist.BookID, Quantity, BookTitle, WishlistName FROM wishlist
                    JOIN book ON wishlist.BookID=book.BookID
                    WHERE UserID=1
                    AND wishlistname='$nameOfWishlist'";
            $result = mysqli_query($conn, $sql);

            $otherWishlists = showWishlistHelper($nameOfWishlist);

            echo "<h3>$nameOfWishlist</h3>";
            if (mysqli_num_rows($result) > 0) {
                
                echo "<table border='1' cellpadding='10'>";
                echo "<tr>
                        <th>Book Title</th>
                        <th>Quantity</th>
                        <th>Remove</th>
                        <th>Move To Wishlist</th>
                        <th>Move To Wishlist</th>
                        <th>Move To Wishlist</th>
                      </tr>";
                // output data of each row
                while($row = mysqli_fetch_assoc($result)) {
                    echo "</tr>";
                    echo "<td>" . $row['BookTitle'] . "</td>";
                    echo "<td>" . $row['Quantity'] . "</td>";
                    echo "<td><a href='Remove.php?BookID=" . $row['BookID'] . "'>Delete</td>";
                    echo "<td><a href='MoveTo.php?BookID=" . $row['BookID'] . "&WishlistName=" . $otherWishlists[0] . "'>Move</td>";
                    echo "<td><a href='MoveTo.php?BookID=" . $row['BookID'] . "&WishlistName=" . $otherWishlists[1] . "'>Move</td>";    
                    echo "<td><a href='MoveTo.php?BookID=" . $row['BookID'] . "&WishlistName=" . $otherWishlists[2] . "'>Move</td>";                                          
                    echo "</tr>";
                }
                echo "</table>";
            } else {
            echo "Add Books To Your Wishlist!";
            }
        }
        
        function updateWishlist($bookID, $nameForList) {
            $conn = openCon();
            $nameForList = $_GET['WishlistName'];
            $bookID = $_GET['BookID'];

            $sql = "UPDATE wishlist
                    SET wishlistname= '$nameForList'
                    WHERE wishlistname= wishlistname
                    AND bookid = $bookID";

            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
        CloseCon($conn);
        ?>
    </body>
</html>