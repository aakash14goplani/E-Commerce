function checkForm() 
{
	var name = document.registeration.username;
	var pass1 = document.registeration.password1;
	var pass2 = document.registeration.password2;
	var dob = document.registeration.date;
	var mail = document.registeration.email;
	var number = document.registeration.contact;
	
	if( name.value.length < 6 )
   	{
     	alert( "Username should be atleast 5+ characters!" );
     	name.focus() ;
     	return false;
   	}
   	if( pass1.value.length < 6 )
   	{
    	alert( "Password should be more than 5 characters!" );
    	pass1.focus() ;
    	return false;
   	}
   	if( pass2.value == "" )
   	{
    	alert( "Please re-enter your Password!" );
    	pass2.focus() ;
    	return false;
   	}
   	if( pass1.value != pass2.value )
   	{
    	alert( "Incorrect Password or Password mismatch!" );
    	pass2.focus() ;
    	return false;
   	}
	if( mail.value == "" )
   	{
     	alert( "Please provide your Email Address!" );
     	mail.focus() ;
     	return false;
   	}
   	if( dob.value == "" )
   	{
     	alert( "Please provide your Birth Date!" );
     	dob.focus() ;
     	return false;
   	}
	if( number.value == "" )
	{
		if( event.keyCode < 48 && event.keyCode > 57)
		{
			event.returnValue = false;
		}	
	}
   	return( true );
}

// AJAX code to check input field values when onblur event triggerd.
function validate(field, query) 
{
	var xmlhttp;
	if (window.XMLHttpRequest)// for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp = new XMLHttpRequest();
	else// for IE6, IE5
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	
	xmlhttp.onreadystatechange = function() 
	{
		if (xmlhttp.readyState != 4 && xmlhttp.status == 200)
			document.getElementById(field).innerHTML = "Validating..";
		else 
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
				document.getElementById(field).innerHTML = xmlhttp.responseText;
			else
				document.getElementById(field).innerHTML = "Error Occurred. <a href='register.php'>Reload Or Try Again</a> the page.";
	}
		xmlhttp.open("GET", "register.php?field=" + field + "&query=" + query, false);
		xmlhttp.send();
}