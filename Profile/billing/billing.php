		<html>
<head>
<title>E-Commerce Website </title>
<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
</head>
<body>
<?php
   include("header.php");

	$sql = "SELECT * FROM billing where UserID=" . $_SESSION["ID"] . "  ";
	$result = $link->query($sql);
	while($row = mysqli_fetch_assoc($result))
		{$card=$row['CCNumber'];
		$card2=	$row['CCNumber2'];
		$card3=	$row['CCNumber3'];

		$first1=		$row['FirstName'];
		$first2=	$row['FirstName2'];
		$first3=	$row['FirstName3'];

		$last= $row['LastName'];
		$last2= $row['LastName2'];
		$last3= $row['LastName3'];

		$cvv= $row['CVV'];
		$cvv2= $row['CVV2'];
		$cvv3= $row['CVV3'];

		$year= $row['ExpYear'];
		$year2= $row['ExpYear2'];
		$year3= $row['ExpYear3'];

		$month= $row['ExpMonth'];
		$month2= $row['ExpMonth2'];
		$month3= $row['ExpMonth3'];

		
		}
 ?>
  <center>

 <h4>Shipping Information</h4>
 <form action="billwritein.php" method="post">

	<table border="0" cellspacing="50">
		<tr>
		  <td>Card Number</td>
		  <td><input type="number" name="ccard" id="ccard" value='<?php echo $card ?>'><br></td>
		</tr>

		
		<tr>
			<td>First Name</td> 
			<td>	 <input type="text" name="first" value ='<?php echo $first1 ?>'><br></td></tr>
		</tr>
		<tr>
			<td>Last Name</td> 
			<td>	 <input type="text" name="last" value ='<?php echo $last ?>'><br></td></tr>
		</tr>
		<tr>
			<td>CVV </td> 
			<td>	 <input type="number" name="cvv" value ='<?php echo $cvv ?>'><br></td></tr>
		</tr>
		<tr>
			<td>Expiration Date(month/year)</td> 
			<td>

			<input type="number" name="month" value ='<?php echo $month ?>' oninput="if(value.length>2)value=value.slice(0,2);if(value>12)value=12" />

			<input type="number" name="year" value ='<?php echo $year ?>' oninput="if(value.length>4)value=value.slice(0,4)"/>


<br></td></tr>
		</tr>
		
	
</table>

		<div class="panel-group" id="accordion">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion" 
						   href="#collapseOne"style="font-size:10px">
								add a new address
						</a>
					</h4>
				</div>
				<div id="collapseOne" class="panel-collapse collapse in">
					<div class="panel-body">
							<table border="0" cellspacing="50">
								<tr>
								  <td>Card Number</td>
								  <td><input type="number" name="ccard2" id="ccard2" value='<?php echo $card2 ?>'><br></td>
								</tr>

		
								<tr>
									<td>First Name</td> 
									<td>	 <input type="text" name="first2" value ='<?php echo $first2 ?>'><br></td></tr>
								</tr>
								<tr>
									<td>Last Name</td> 
									<td>	 <input type="text" name="last2" value ='<?php echo $last2 ?>'><br></td></tr>
								</tr>
								<tr>
									<td>CVV </td> 
									<td>	 <input type="number" name="cvv2" value ='<?php echo $cvv2 ?>'><br></td></tr>
								</tr>
								<tr>
										<td>Expiration Date(month/year)</td> 
			<td>
			 <input type="number" name="month2" value ='<?php echo $month2 ?>' oninput="if(value.length>2)value=value.slice(0,2);if(value>12)value=12" />

			<input type="number" name="year2" value ='<?php echo $year2 ?>' oninput="if(value.length>4)value=value.slice(0,4)"/>
<br></td></tr>
								</tr>
		
	
						</table>
						<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion" 
						href="#collapseTwo" style="font-size:10px">
							add a new address          
						</a>
					</h4>
				</div>
				<div id="collapseTwo" class="panel-collapse collapse">
				<div class="panel-body">
            					<div class="panel-body">
								<table border="0" cellspacing="50">
								<tr>
								  <td>Card Number</td>
								  <td><input type="number" name="ccard3" id="ccard3" value='<?php echo $card3 ?>'><br></td>
								</tr>

		
								<tr>
									<td>First Name</td> 
									<td>	 <input type="text" name="first3" value ='<?php echo $first3 ?>'><br></td></tr>
								</tr>
								<tr>
									<td>Last Name</td> 
									<td>	 <input type="text" name="last3" value ='<?php echo $last3 ?>'><br></td></tr>
								</tr>
								<tr>
									<td>CVV </td> 
									<td>	 <input type="number" name="cvv3" value ='<?php echo $cvv3 ?>'><br></td></tr>
								</tr>
								<tr>
										<td>Expiration Date(month/year)</td> 
			<td>
			 <input type="number" name="month3" value ='<?php echo $month3 ?>' oninput="if(value.length>2)value=value.slice(0,2);if(value>12)value=12" />

			<input type="number" name="year3" value ='<?php echo $year3 ?>' oninput="if(value.length>4)value=value.slice(0,4)"/>
<br></td></tr>
								</tr>
		
	
						</table>
				</div>
				</div>
			</div>
					</div>
				</div>
			</div>
		</div>
		<h4>       </h4>
 <input type="submit" name="test" id="test" value="Save" /><br/>
 
 </form>

</body>
 
 </html>