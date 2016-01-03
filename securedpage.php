<?php
	// Inialize session
	session_start();

	// Check, if username session is NOT set then this page will jump to login page
	if (!isset($_SESSION['username']))
		header('Location: main_login.html');
	
	echo "<br>Welcome <b><i>" . $_SESSION['username'] . "</b></i>! You have successfully Logged in!<br><br>";
	
	//Assigning a session id
	$sessionId = session_id(  );
	echo "Your Session_id is :  $sessionId<br><br>";
	session_regenerate_id();
	
	$_SESSION['LAST_ACTIVITY'] = time();
	if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 60)) 
	{
		// last request was more than 30 seconds ago
		session_unset(); // unset $_SESSION variable for the run-time
		session_destroy(); // destroy session data in storage
	}
	
	if (!isset($_SESSION['CREATED']))
	{
		$_SESSION['CREATED'] = time();
	}
	else 
		if (time() - $_SESSION['CREATED'] > 60) 
		{
			// session started more than 30 seconds ago
			session_regenerate_id(true); // change session ID for the current session an invalidate old session ID
			$_SESSION['CREATED'] = time(); // update creation time
		}
	
	$result = $_SESSION['LAST_ACTIVITY'] - $_SESSION['CREATED'];
	echo "Total Time in this page : $result seconds<br><br>";
	
	//creating a session for user count
	if(isset($_SESSION['views']))
		$_SESSION['views']=$_SESSION['views']+1;
	else
		$_SESSION['views']=1;
	echo "Your total visits in this page = ". $_SESSION['views']."<br><br>";
?>

<html>
	<head>
		<title>Logged In!</title>
	</head>
	<body>
		<table>
        	<tr>
            	<td><b>Web Services</b></td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                <td><a href="restindex.php"><input type='submit' name='submit' value='WebService'></a></td>
            </tr>
            <tr>
            	<td></td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                <td></td>
            </tr>
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
            	<td><b>Web Auctions</b></td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                <td><a href="auctiondemo.html"><input type='submit' name='submit' value='Auctions'></a></td>
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