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

	$sql = "SELECT * FROM shipping where UserID=" . $_SESSION["ID"] . "  ";
	$result = $link->query($sql);
	while($row = mysqli_fetch_assoc($result))
		{$address1=	$row['Street_Address_1'];
		$address2=	$row['Street_Address_2'];
		$address3=	$row['Street_Address_3'];

		$apt=	$row['Apt'];
		$apt2=	$row['Apt2'];
		$apt3=	$row['Apt3'];

		$city= $row['City'];
		$city2= $row['City2'];
		$city3= $row['City3'];

		$state= $row['State'];
		$state2= $row['State2'];
		$state3= $row['State3'];

		$zip= $row['ZipCode'];
		$zip2= $row['Zipcode2'];
		$zip3= $row['Zipcode3'];
		
		}
 ?>
  <center>

 <h4>Shipping Information</h4>
 <form action="addresswritein.php" method="post">

	<table border="0" cellspacing="50">
		<tr>
		  <td>Street Address 1</td>
		  <td><input type="text" name="address" id="address" value='<?php echo $address1 ?>'><br></td>
		</tr>

		
		<tr>
			<td>Apt</td> 
			<td>	 <input type="text" name="apt" value ='<?php echo $apt ?>'><br></td></tr>
		</tr>
		<tr>
			<td>City</td> 
			<td>	 <input type="text" name="city" value ='<?php echo $city ?>'><br></td></tr>
		</tr>
		<tr>
			<td>State</td> 
			<td>	 <input type="text" name="state" value ='<?php echo $state ?>'><br></td></tr>
		</tr>
		<tr>
			<td>Zipcode</td> 
			<td>	 <input type="text" name="zip" value ='<?php echo $zip ?>'><br></td></tr>
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
									  <td>Street Address 1</td>
									  <td><input type="text" name="address2" id="address" value='<?php echo $address2 ?>'><br></td>
									</tr>

		
									<tr>
										<td>Apt</td> 
										<td>	 <input type="text" name="apt2" value ='<?php echo $apt2 ?>'><br></td></tr>
									</tr>
									<tr>
										<td>City</td> 
										<td>	 <input type="text" name="city2" value ='<?php echo $city2 ?>'><br></td></tr>
									</tr>
									<tr>
										<td>State</td> 
										<td>	 <input type="text" name="state2" value ='<?php echo $state2 ?>'><br></td></tr>
									</tr>
									<tr>
										<td>Zipcode</td> 
										<td>	 <input type="text" name="zip2" value ='<?php echo $zip2 ?>'><br></td></tr>
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
								  <td>Street Address </td>
								  <td><input type="text" name="address3" id="address" value='<?php echo $address3 ?>'><br></td>
								</tr>

		
								<tr>
									<td>Apt</td> 
									<td>	 <input type="text" name="apt3" value ='<?php echo $apt3 ?>'><br></td></tr>
								</tr>
								<tr>
									<td>City</td> 
									<td>	 <input type="text" name="city3" value ='<?php echo $city3 ?>'><br></td></tr>
								</tr>
								<tr>
									<td>State</td> 
									<td>	 <input type="text" name="state3" value ='<?php echo $state3 ?>'><br></td></tr>
								</tr>
								<tr>
									<td>Zipcode</td> 
									<td>	 <input type="text" name="zip3" value ='<?php echo $zip3 ?>'><br></td></tr>
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