<a href="index.php">Back</a>                                                                                               
<a href="addbook.php">Add New Record</a>
<?php
// connect to the database
include('init.php');

// get the records from the database
$sql = "SELECT userid, bookid, quantity from cart where userid = 1";
if ($result = mysqli_query($conn, $sql))
{
// display records if there are records to display
if (mysqli_num_rows($result) > 0)
{
// display records in a table
echo "<table border='1' cellpadding='10'>";

// set table headers
echo "<tr>
<th>userid</th>
<th>bookid</th>
<th>quantity</th>
<th></th>
<th></th>
</tr>";

while ($row = mysqli_fetch_array($result))
{
// set up a row for each record
echo "<tr>";
echo "<td>" . $row['userid'] . "</td>";
echo "<td>" . $row['bookid'] . "</td>";
echo "<td>" . $row['quantity'] . "</td>";
echo "<td><a href='help.php?bookid=" . $row['bookid'] . "'>Delete</a></td>";
echo "<td><a href='help.php?bookid=" . $row['bookid'] . "'>Edit</a></td>";
echo "</tr>";
}

echo "</table>";
}
// if there are no records in the database, display an alert message
else
{
echo "No results to display!";
}
}
// show an error if there is an issue with the database query
else
{
echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}

// close database connection
mysqli_close($conn);

?>