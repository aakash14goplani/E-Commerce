<?php

	session_start();
	echo "<br>Welcome <b><i>" . $_SESSION['username'] . "</b></i>! Your Credit Card History : <br><br>";
	$username = $_SESSION['username'];
	$product = $_SESSION['product'];
	$brand = $_SESSION['brand'];
	
	$connect = mysql_connect("localhost","root","") or die(mysql_error());
	mysql_select_db("ecom") or die("<br><br>no database found<br><br>");
	
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{	
		$query = mysql_query("SELECT * FROM credit WHERE name='$username'");
		$numrows = mysql_num_rows($query);
		if($numrows == 0)
		{
			$cardnumber = $_POST['cardnumber'];
			$cardname = $_POST['cardname'];
			$edate = $_POST['edate'];
			$cvv = $_POST['cvv'];
			$address = $_POST['vaddress'];
			$contact = $_POST['contact'];
			$name = $_POST['name'];
			$balance = 500000;
			$query = "INSERT INTO credit VALUES ('".$name."','".$cardnumber."','".$cardname."','".$cvv."','".$edate."','".$address."','".$contact."','".$balance."')";
			$result = mysql_query($query) or die("<br>Query Failed  ".mysql_error()."<br><a href='buy.php'>RETRY</a>");
		}
	}
	
	echo "<center>";
			
		echo "<br><br><b>Details of Your credit card in our database</b><br><br>";	
				
		$query = mysql_query("SELECT * FROM credit WHERE name='$username'");
		$numrows = mysql_num_rows($query);
		
		if($numrows != 0)
		{
			echo "
					<table border='1' cellspacing='4' cellpadding='4'>
						<tr>
							<th>Name</th>
							<th>Card Number</th>
							<th>Card Name</th>
							<th>CVV</th>
							<th>Expiry Date</th>
							<th>Address</th>
							<th>Contact</th>
							<th>Balance</th>
						</tr>
				";
			while ($rows = mysql_fetch_assoc($query))
			{
				$c_name = $rows['name'];
				$c_cnum = $rows['cardnumber'];
				$c_ccname = $rows['cardname'];
				$c_cvv = $rows['cvv'];
				$c_edate = $rows['date'];
				$c_address = $rows['address'];
				$c_contact = $rows['contact'];
				$c_bal = $rows['Balance'];
				
					echo "
						<tr>
							<td>$c_name</td>
							<td>$c_cnum</td>
							<td>$c_ccname</td>
							<td>$c_cvv</td>
							<td>$c_edate</td>
							<td>$c_address</td>
							<td>$c_contact</td>
							<td>$c_bal</td>
						</tr>
						";	
			}
			echo "</table>";	
		}
		else
			echo "No results found!!!!!";
			
		echo "<br><br>-----------------------------------------------------------------------------------------------------------------------<br><br>";
	
		echo "<b>Your orderd Product Details </b><br>";
		
		$query = mysql_query("SELECT * FROM $brand WHERE name='$product'");
		$numrows = mysql_num_rows($query);
		
		if($numrows != 0)
		{
			echo "
					<table border='1' cellspacing='4' cellpadding='4'>
						<tr>
							<th>ID</th>
							<th>Name</th>
							<th>Price</th>
						</tr>
				";
			
			while ($rows = mysql_fetch_assoc($query))
			{
				$m_id = $rows['id'];
				$m_name = $rows['name'];
				$m_price = $rows['price'];

					echo "
						<tr>
							<td>$m_id</td>
							<td>$m_name</td>
							<td>$m_price</td>
						</tr>
						";	
			}
			echo "</table>";
			
			$c_bal = $c_bal - $m_price;
			if($c_bal > 0) 
			{
				$query = "INSERT INTO cart VALUES ('".$c_name."','".$m_name."','".$m_price."','".$c_bal."')";
				$result = mysql_query($query) or die("<br>Query Failed  ".mysql_error()."<br>");
			}
			else
				echo "<br><br><font color='red'><b>Insufficient Balance!</b></font><br><br>";
		}
		else
			echo "No results found!!!!!";
			
		if($c_bal > 0)
		{
			$query = "UPDATE credit SET Balance=$c_bal WHERE name='$username'";
			$result = mysql_query($query) or die("<br>Query Failed  ".mysql_error()."<br>");
		}
		else
		{
			$query = "UPDATE credit SET Balance=0 WHERE name='$username'";
			$result = mysql_query($query) or die("<br>Query Failed  ".mysql_error()."<br>");
		}
			
		echo "<br><br>-----------------------------------------------------------------------------------------------------------------------<br><br>";
		
		echo "<b>Your Cart Details </b><br>";
		
		$query = mysql_query("SELECT * FROM cart WHERE name='$c_name'");
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
			echo "No results found!!!!!";
			
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

		if($c_bal > 0) 
		{
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
								<th>Logout</th>
								<td><a href='logout.php'><input type='button' value='Logout'></a></td>
							</tr>
						</table>
					</form>
				</body>
			</html>
		";
		}
		else
		{
			echo "
			<html>
				<head>
					<title>Cart Details</title>
				</head>
				<body>
					<form>
						<table>
							<tr>
								<th>Please Update your Account with minimum balance!</th>
								<td></td>
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
		}
?>