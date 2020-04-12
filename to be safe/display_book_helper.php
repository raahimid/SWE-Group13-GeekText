<?php
echo'<a class="ai" style="text-decoration:none;">

<figure>
	<form action="book_details.php" method="get">
	<button class="imgi" type="submit" value=' .$row["bookcover"]. ' img src="images/'.($row['bookcover'] ? $row['bookcover'] : 'default-placeholder.png').'" alt=""; background-size: 100% 100%; height:300px; width:200px;" name="bookid"></button>
	</form>
	<figcaption>' . $row["booktitle"] . '</figcaption>
	<figcaption>$' . $row["price"] . '</figcaption>
	<figcaption>';

echo'</figcaption></figure></a>';
?>