<?php
	session_start();

	// Check, if user is already login, then jump to secured page
	if (isset($_SESSION['username']))
		header('Location: securedpage.php');
	
	//Database Connectivity
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		if($username && $password)
		{
			$connect = mysql_connect("localhost","root","") or die(mysql_error());
			mysql_select_db("ecom") or die("<br><br>no database found<br><br>");
		}
		else
			die("<br><br>Please provide username/password!<br><br>");
		
		$query = mysql_query("SELECT * FROM customer WHERE name = '$username'");
		$numrows = mysql_num_rows($query);
		
		if($numrows != 0)
		{
			while ($rows = mysql_fetch_assoc($query))
			{
				$dbusername = $rows['name'];
				$dbpassword = $rows['password'];
			}
			
			if($username == $dbusername && $password == $dbpassword)
			{			
				echo "<br>Welcome <b><i>$username</b></i> ! You have successfully Logged in!<br><br>";
				$_SESSION['username'] = $username;
				$_SESSION['password'] = $password;
				header('Location: securedpage.php');
			}
			else
			{
				echo "<br><br>Incorrect Password!<br><br>";
				echo "<p><a href='main_login.html'>RETRY!</a></p>";
			}
		}
		else
		{
			echo "<br><br>Username does not exist!<br><br>";
			echo "<p><a href='main_login.html'>RETRY!</a></p>";
		}
	}
?>