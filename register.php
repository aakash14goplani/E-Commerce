<?php

	//Database Connectivity
	$connect = mysql_connect("localhost","root","") or die(mysql_error());
	mysql_select_db("ecom") or die("no database found");

	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$a=$b=$c=$d=$e=$f=true;
		
		// Check Valid or Invalid user name when user enters user name in username input field.
		if($_POST['username'] == "" || strlen($_POST['username']) < 6 || !preg_match("/^[a-zA-Z0-9 ]*$/",$_POST['username'])) 
		{
			echo "<br>USERNAME must be 5+ alphanumeric letters!<br>";
			echo "<br>Not a valid usrename!<br>";
			$a = false;
		}
		else
		{
			echo "<br><span>USERNAME is Valid!</span><br>";
			$username = $_POST['username'];
		}
		
		// Check Valid or Invalid password when user enters password in password input field.
		if (strlen($_POST['password1']) < 6)
		{
			echo "<br>Password too short!<br>";
			$b = false;
		}
		else
		{
			echo "<br><span>PASSWORD Strong!</span><br>";
		}
			
		if ($_POST['password1'] != $_POST['password2'])
		{
			echo "<br>Password seems to be incorrect!<br>";
			$b = false;
		}
		else
		{
			echo "<br><span>PASSWORD Looks Good!</span><br>";
			$password = $_POST['password2'];
		}
						
		// Check Valid or Invalid email when user enters email in email input field.
		if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$_POST['email']))
		{
			echo "<br>Invalid email!!!<br>";
			$c = false;
		}
		else
		{
			echo "<br><span>Valid EMAIL!</span><br>";
			$email = $_POST['email'];
		}
		
		// Check Valid or Invalid birth date.
		if ($_POST['date'] == "")
		{
			echo "<br>Please enter your birthdate!<br>";
			$d = false;
		}
		else
		{		
			echo "<br><span>Valid BirthDate!</span><br>";
			$dob = $_POST['date'];
		}
		
		//validating contact no
		if($_POST['contact'] =="")
		{
			$contact = "";
		}
		else
			$contact = $_POST['contact'];
			
		//validating address
		if($_POST['address'] == "")
		{			
			$address = "";
		}
		else 
			$address = $_POST['address'];
		
		//Inserting into database
		if($a == true && $b == true && $c == true && $d == true && $e == true && $f == true)
		{
			$query = "INSERT INTO customer VALUES ('".$username."','".$password."','".$email."','".$dob."','.$contact.','".$address."')";
			$result = mysql_query($query) or die("<br>Query Failed  ".mysql_error()."<br><a href='login.html'>RETRY</a>");
			echo "<br><br>Welcome $username, You have been registered Successfully!";
			echo "<br><br>To enjoy our services <a href='main_login.html'>click here</a>";
		}
		else
			echo "<br><br>Please Re-register!<br><a href='login.html'>RETRY</a>";	
		
	}
		
?>