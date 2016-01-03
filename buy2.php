<?php
	session_start();
	
    if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$_SESSION['product'] = $_POST['product'];
		$_SESSION['brand'] = $_POST['brand'];
		header('Location: cart.php');
	}
?>