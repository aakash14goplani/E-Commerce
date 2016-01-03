<?

	session_start();
	echo "<br>Welcome <b><i>" . $_SESSION['username'] . "</b></i>! Enjoy the Web Services!<br><br>";
	
	echo "<h1>Browse Mobile Products</h1>";
	echo "<h3>Available options are:</h3>";
	echo "<h4>1. windows</h4><h4>2. apple</h4><h4>3. samsung</h4>";
	echo "<table>";
	echo "<form method='POST'>";
	echo "<tr>";
	echo "<td></td>";
	echo "<td></td>";
	echo "<td></td>";
	echo "</tr>";
	echo "<tr>";
	echo "<td><b>Enter the Product Name : </b></td>";
	echo "<td><input type='text' name='name'></td>";
	echo "<td><input type='submit' name='submit' value='Get Price'></td>";
	echo "</tr>";
	echo "</form>";
	echo "</table>";
	
	if(isset($_POST['submit']))
	{
		$name = $_POST['name'];
		$url = "http://localhost/E-commerce/rest.php/?name=$name";
		
		$client = curl_init($url);
		curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
		$response = curl_exec($client);
		
		$result = json_decode($response);
		echo "<br><br>Product : $name";
		echo "<br>Status : $result->status_message";
		echo "<br>Price : $result->data";
	}

?>

<html>
	<head>
		<title>RESTful Web Services...</title>
	</head>
	<body>
		<p><br /></p>
        <table>
        	<tr>
            	<td><b>Buy Products</b></td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                <td><a href="viewproduct.php"><input type='submit' name='submit' value='BUY'></a></td>
            </tr>
             <tr>
            	<td></td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                <td></td>
            </tr>
            <tr>
            	<td><b>Back</b></td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                <td><a href="securedpage.php"><input type='submit' name='submit' value='BACK'></a></td>
            </tr>
             <tr>
            	<td></td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                <td></td>
            </tr>
        	<tr>
            	<td><b>LOGOUT</b></td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                <td><a href="logout.php"><input type='submit' name='submit' value='LogOut'></a></td>
            </tr>
        </table>
	</body>
</html>