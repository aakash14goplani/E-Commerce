<?php

		session_start();
		echo "<br>Welcome <b><i>" . $_SESSION['username'] . "</b></i>! Buy some Products from our Website!<br><br>";
		
		$connect = mysql_connect("localhost","root","") or die(mysql_error());
		mysql_select_db("ecom") or die("<br><br>no database found<br><br>");
		
		echo "<center>";
			
		echo "<br><br><b>Details of Windows Phones in database</b><br><br>";	
				
		$query = mysql_query("SELECT * FROM windows");
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
		}
		else
			die("No results found!!!!!");
			
		echo "<br><br>-----------------------------------------------------------------------------------------------------------------------<br><br>";
		
		echo "<br><br><b>Details of Apple Phones in database</b><br><br>";	
				
		$query = mysql_query("SELECT * FROM apple");
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
		}
		else
			die("No results found!!!!!");
			
		echo "<br><br>-----------------------------------------------------------------------------------------------------------------------<br><br>";	
		
		echo "<br><br><b>Details of Samsung Phones in database</b><br><br>";	
				
		$query = mysql_query("SELECT * FROM samsung");
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
		}
		else
			die("No results found!!!!!");
			
		echo "<br><br>-----------------------------------------------------------------------------------------------------------------------<br><br>";		

?>

<html>
	<head>
		<title>View Products</title>
        <script type="text/javascript">
			function checkDetails()
			{
				var name = document.buy.product;
				var bname = document.buy.brand;
				if( name.value == "" )
				{
					alert("Please Provide Product Name!");
					name.focus();
					return false;	
				}
				if( bname.value == "" )
				{
					alert("Please Provide Product Name!");
					bname.focus();
					return false;	
				}
				return (true);	
			}
		</script>
    </head>
    <body>
    	<h1>Buy Products!</h1>
    	<table>
        	<form name="buy" action="buy2.php" method="POST" onsubmit="return(checkDetails());">
            <tr>
            	<th>Enter Product Name : </th>
                <td><input type="text" name="product"></td>
           	</tr>
            <tr>
            	<th>Enter Brand Name : </th>
                <td><input type="text" name="brand"></td>
           	</tr>
            <tr>
            	<td><input type="submit" value="BUY"></td>
                <td><input type="reset" value="Cancel"></td>
            </tr>
            </form>
        </table>
    </body>
</html>