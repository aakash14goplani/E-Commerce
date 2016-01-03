<?php
	
	session_start();
	
	$connect = mysql_connect("localhost","root","") or die(mysql_error());
	mysql_select_db("ecom") or die("<br><br>no database found<br><br>");
	
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		
		$brandvalue = $_POST['price'];
		$brandname = $_SESSION['brandname'];
		$productname = $_SESSION['productname'];		
		$query = mysql_query("SELECT * FROM $brandname WHERE name='$productname'");
		$numrows = mysql_num_rows($query);
		if($numrows != 0)
		{
			while ($rows = mysql_fetch_assoc($query))
			{
				$mobileprice = $rows['price'];			
			}
		}
		
		if($brandvalue < $mobileprice)
		{
			echo "<center>You have entere less than the minimum prescribed amount for bidding!<br>Please re-enter your amount!";
		}
		else
		{						
			function bid()
			{
				$username = $_SESSION['username'];
				$brandname = $_SESSION['brandname'];
				$productname = $_SESSION['productname'];
				$brandvalue = $_POST['price'];
				$user1 = $brandvalue - 1000;
				$user2 = $brandvalue - 300;
				$user3 = $brandvalue - 850;
				$user4 = $brandvalue - 750;
				$max = $brandvalue;
				
				$query = mysql_query("UPDATE bid SET price=$brandvalue WHERE username='$username'");
				$query = mysql_query("UPDATE bid SET price=$user1 WHERE username='user1'");
				$query = mysql_query("UPDATE bid SET price=$user2 WHERE username='user2'");
				$query = mysql_query("UPDATE bid SET price=$user3 WHERE username='user3'");
				$query = mysql_query("UPDATE bid SET price=$user4 WHERE username='user4'");
				
				if($max < $user1)
					$max = $user1;
				else
					if($max < $user2)
						$max = $user2;
					else
						if($max < $user3)
							$max = $user3;
						else
							if($max < $user4)
								$max = $user4;
								
				$query = mysql_query("SELECT * FROM bid");
				$numrows = mysql_num_rows($query);
				
				if($numrows != 0)
				{
					echo "
						<table border='1' cellpadding='5' cellspacing='5'>
								<tr>
									<th>Bidders Name :  </th>
									<th>Bid Price : </th>
								</tr>
					";
					while ($rows = mysql_fetch_assoc($query))
					{
						$name = $rows['username'];
						$price = $rows['price'];
						echo "
							<tr>
								<th>$name : </th>
								<td>$price</td>
							</tr>
					";			
					}
					echo "</table>";	
				}
				else
					die("No results found!!!!!");
					
				echo "
					<br><b>Minimum Bid Price : </b>$brandvalue<br>
					<b>Current Winner's bidding price : </b>$max<br>
				";
				
				echo "
				<h3><font color='#FF0000'>Congratulations! You have won $productname worth $brandvalue rupees!</font></h3>
					<html>
						<body>
							<table>
								<form>
									<tr>
										<th>Bid for other Products! </th>
										<td><a href='auctiondemo.html' target='_top'><input type='button' value='Continue'></a></td>
									</tr>
									<tr>
										<th>No Thanks!</th>
									<td><a href='securedpage.php' target='_top'><input type='button' value='Leave Page'></a></td>
									</tr>
								</form>
							</table>
						</body>
					</html>
				";	
			}
			bid();
		}
	}

?>