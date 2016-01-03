<?php

	session_start();
	$username = $_SESSION['username'];
	$product = $_SESSION['product'];
	$brand = $_SESSION['brand'];
	
	$connect = mysql_connect("localhost","root","") or die(mysql_error());
	mysql_select_db("ecom") or die("<br><br>no database found<br><br>");
	
	$query = mysql_query("SELECT * FROM cart WHERE modelname='$product'");
	$numrows = mysql_num_rows($query);
	if($numrows != 0)
	{
		while ($rows = mysql_fetch_assoc($query))
		{
			$m_price = $rows['price'];
		}
	}
	
	$query = mysql_query("DELETE FROM cart WHERE modelname='$product'");
	
	echo "<center><h1>Your Cart Details </h1><br>Product <b><i>'$product'</b></i> successfully deleted from your Cart!<br><br>";
		
	$query = mysql_query("SELECT * FROM cart WHERE name='$username'");
	$numrows = mysql_num_rows($query);
		
	if($numrows != 0)
	{
			echo "
					<table border='1' cellspacing='4' cellpadding='4'>
						<tr>
							<th>Name</th>							
							<th>Model Name</th>
							<th>Price</th>
							<th>Balance</th>
						</tr>
				";
			while ($rows = mysql_fetch_assoc($query))
			{
				$u_name = $rows['name'];
				$u_mname = $rows['modelname'];
				$u_price = $rows['price'];
				$u_balance = $rows['balance'];
				$u_balance = $u_balance + $m_price;

					echo "
						<tr>
							<td>$u_name</td>
							<td>$u_mname</td>
							<td>$u_price</td>
							<td>$u_balance</td>
						</tr>
						";	
			}
			echo "</table>";	
		}
		else
		{
			echo "No results found!!!!!<br>";
			die(mysql_error());
		}
			
		if($numrows > 0)
		{
			echo "
				<table>
					<tr>
						<th>Delete current item from Cart</th>
						<td><a href='deletecart.php'><input type='button' value='Delete'></a></td>
					</tr>
				</table>
			";	
		}	
		
			
		echo "<br><br>-----------------------------------------------------------------------------------------------------------------------<br><br>";
		
		echo "
			<html>
				<head>
					<title>Cart Details</title>
				</head>
				<body>
					<form>
						<table>
							<tr>
								<th>Continue Shopping</th>
								<td><a href='viewproduct2.php'><input type='button' value='Continue'></a></td>
							</tr>
							<tr>
								<th>GO BACK</th>
								<td><a href='cart.php'><input type='button' value='BACK'></a></td>
							</tr>
							<tr>
								<th>Logout</th>
								<td><a href='logout.php'><input type='button' value='Logout'></a></td>
							</tr>
						</table>
					</form>
				</body>
			</html>
		";

?>