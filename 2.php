<?php

		$connect = mysql_connect("localhost","root","") or die(mysql_error());
		mysql_select_db("ecom") or die("<br><br>no database found<br><br>");
		
		echo "<center>";
			
		echo "<br><br><b>Details of Phones between 1000 and 20000 in database</b><br><br>";	
				
		$query = mysql_query("SELECT samsung.name, samsung.price FROM samsung WHERE samsung.price BETWEEN 5000 AND 10000");
		$numrows = mysql_num_rows($query);
		
		if($numrows != 0)
		{
			echo "
					<table border='1' cellspacing='4' cellpadding='4'>
						<tr>
							<th>Name</th>
							<th>Price</th>
						</tr>
				";
			while ($rows = mysql_fetch_assoc($query))
			{
				$s_name = $rows['name'];
				$s_price = $rows['price'];

					echo "
						<tr>
							<td>$s_name</td>
							<td>$s_price</td>
						</tr>
						";	
			}	
		}
			
		$query = mysql_query("SELECT windows.name, windows.price FROM windows WHERE windows.price BETWEEN 1000 AND 20000");
		$numrows = mysql_num_rows($query);
		
		if($numrows != 0)
		{
			while ($rows = mysql_fetch_assoc($query))
			{
				$w_name = $rows['name'];
				$w_price = $rows['price'];

					echo "
						<tr>
							<td>$w_name</td>
							<td>$w_price</td>
						</tr>
						";	
			}	
		}
			
		$query = mysql_query("SELECT apple.name, apple.price FROM apple WHERE apple.price BETWEEN 10000 AND 20000");
		$numrows = mysql_num_rows($query);
		
		if($numrows != 0)
		{
			while ($rows = mysql_fetch_assoc($query))
			{
				$a_name = $rows['name'];
				$a_price = $rows['price'];

					echo "
						<tr>
							<td>$a_name</td>
							<td>$a_price</td>
						</tr>
						";	
			}
			echo "</table>";	
		}

?>

<html>
	<head>
    	<script type="text/javascript">
			function checkDetails()
			{
				var name = document.two.name;
				var price = document.two.price;
				var bname = document.two.brand;
				if( name.value == "" )
				{
					alert("Please Provide Product Name!");
					name.focus();
					return false;	
				}
				if( price.value == "" )
				{
					alert("Please Provide Minimum Price!");
					price.focus();
					return false;	
				}
				if( bname.value == "" )
				{
					alert("Please Provide Brand Name!");
					bname.focus();
					return false;	
				}
				return (true);	
			}
			function numbersOnly()
			{
				if(event.keyCode < 48 || event.keyCode > 57)
					event.returnValue = false;	
			}
		</script>
	</head>
    
    <body>
    	<h3>Start Bidding...</h3>
        
        <table>
        	<form name="two" action="bid.php" method="POST" onsubmit="return(checkDetails());">
            	<tr>
                	<th>Enter Mobile Name : </th>
                    <td><input type="text" name="name"></td>
                </tr>
                <tr>
                	<th>Enter Minimum Price : </th>
                    <td><input type="text" name="price" onKeyPress="numbersOnly()"></td>
                </tr>
                <tr>
                	<th>Brand : </th>
                    <td><input type="text" name="brand" ></td>
                </tr>
                <tr>
                	<td><input type="submit" value="BUY"></td>
                	<td><input type="reset" value="Cancel"></td>
                </tr>
            </form>
        </table>
    </body>
</html>