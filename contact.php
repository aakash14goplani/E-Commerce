<?php

 if ($_SERVER["REQUEST_METHOD"] == "POST") 
 {
    $from = $_POST["email"]; // sender
    $subject = "Feedback";
    $message = $_POST["subject"];
    // message lines should not exceed 70 characters (PHP rule), so wrap it
    $message = wordwrap($message, 70);
    // send mail
    mail("goplaniaakash14@gmail.com",$subject,$message,"From: $from\n");
    echo "<br>Thank you for sending us feedback";
  }

?>