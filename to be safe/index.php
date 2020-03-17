
<?php
    include 'init.php';
    include 'header.php';
     $query = 'SELECT Book.bookid, Book.booktitle, Book.price, Book.bookcover, Book.bookrating FROM Book';
    $result = mysqli_query($link, $query);
?>


    
    <?php

    if (mysqli_num_rows($result) > 0) {

        
        echo '<section class="col-md-10">
              <div class="row">';
        while ($row = mysqli_fetch_assoc($result)) {  
            echo
            '<div class="col-sm-6 col-md-4" style="height: 620px">
                <div class="thumbnail">
                    <a href="book.php?id='.$row['bookid'].'">
                        <img src="images/'.($row['bookcover'] ? $row['bookcover'] : 'default-placeholder.png').'" alt="">
                    </a>
                    <div class="caption">
                        <h3>'.$row["booktitle"].'</h3>
                        <h5>'.$row["price"].'</h5>             
                        <p><a href="book.php?id='.$row['bookid'].'" class="btn btn-primary" role="button">Details</a></p>
                    </div>
                </div>
            </div>';
        }
        echo
        '</div>
    </section>
</main>';
    }
    
?>