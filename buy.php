<?php
	session_start();
	
    if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$_SESSION['product'] = $_POST['product'];
		$_SESSION['brand'] = $_POST['brand'];
	}
?>
<!DOCTYPE html>
    <head>
    	<title>Online Payment!</title>
        <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
        
        <script type="text/javascript">
		function numberOnly()
		{
			if(event.keyCode < 48 || event.keyCode > 57)
				event.returnValue = false;	
		}
		
		function checkDetails() 
		{
			var cnum = document.purchase.cardnumber;
			var cname = document.purchase.cardname;
			var cvv = document.purchase.cvv;
			var expdate = document.purchase.edate;
			var address = document.purchase.vaddress;
			var number = document.purchase.contact;
			var username = document.purchase.name;
			
			if( cnum.value.length < 16 )
			{
				alert( "Invalid Credit Card Number!" );
				cnum.focus() ;
				return false;
			}
			if( cvv.value.length < 3 )
			{
				alert( "Invalid cvv number!" );
				cvv.focus() ;
				return false;
			}
			if( address.value == "" )
			{
				alert( "Please Provide Address!" );
				address.focus() ;
				return false;
			}
			if( number.value.length < 10 )
			{
				alert( "Invalid Contact Number!" );
				number.focus() ;
				return false;
			}
			if( expdate.value == "" )
			{
				alert( "Please provide Expiry Date!" );
				expdate.focus() ;
				return false;
			}
			if( cname.value == "" )
			{
				alert( "Invalid Card Name!" );
				cname.focus() ;
				return false;
			}
			if( username.value == "" )
			{
				alert( "Invalid Card Name!" );
				username.focus() ;
				return false;
			}
			return( true );
		}
	</script>
    </head>
    
    <body>
    	<div id="cointainer_body">
            <div id="container">
                <h1><font color="#FFD700">Secure Online Payment</font></h1><br> 	
                <form  name="purchase" action="cart.php" method="POST" onsubmit="return(checkDetails());">
                    <center><table>
                    <tr>
                        <th>Card Number<star>*</star></th>
                        <td><input type="text" name="cardnumber" onKeyPress="numberOnly()" maxlength="16"></td>
                    </tr>
                    <tr>
                        <th>Card Type<star>*</star></th>
                        <td><select name="cardname">
                                <option value="">&nbsp;</option>
                                <option value="Visa">Visa</option>
                                <option value="Master Card">Master Card</option>
                                <option value="American Express">American Express</option>
                        	</select>
                    	</td>
                    </tr>
                    <tr>
                        <th>Expiration Date<star>*</star></th>
                        <td><input type="date" name="edate"></td>
                    </tr>
                    <tr>
                        <th>CVV<star>*</star></th>
                        <td><input type="text" name="cvv" onkeypress="numberOnly()" maxlength="3"></td>
                    </tr>
                    <tr>
                        <th>Address<star>*</star></th>
                        <td><textarea name="vaddress" rows="5" cols="16"></textarea></td>
                    </tr>
                    <tr>
                        <th>Contact No.<star>*</star></th>
                        <td><input type="tel" name="contact" onkeypress="numberOnly()" maxlength="10"></td>
                    </tr>
                    <tr>
                        <th>Card Holder Name<star>*</star></th>
                        <td><input type="text" name="name"></td>
                    </tr>
                    <tr>
                        <td><input type="submit" name="submit" value="PAY"></td>
                        <td><input type="reset" name="reset" value="Cancel"></td>
                    </tr>
                    </table></center>
            	</form>
			</div>
               <center> 
               		<font color="#FF0000">Fields marked with * are mandatory fields</font> 
               		<br /><br />
                    <p font style="font-size:18px; color:#F00; "><a href="main_login.html">Go Back!</a></p>
               </center>
		</div>
    </body>
</html>
