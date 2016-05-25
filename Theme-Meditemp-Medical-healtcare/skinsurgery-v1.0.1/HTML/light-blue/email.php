<?php 
$to = 'yourid@gmail.com'; // Put in your email address here
$subject  = "Contact for skinsurgery"; // The default subject. Will appear by default in all messages. Change this if you want.

// User info (DO NOT EDIT!)
$name = stripslashes($_REQUEST['firstname']); // sender's name
$lname = stripslashes($_REQUEST['lastname']); // sender's email
$phone = stripslashes($_REQUEST['phone']); 
$email = stripslashes($_REQUEST['email']); 
$message = stripslashes($_REQUEST['message']); 

// The message you will receive in your mailbox
// Each parts are commented to help you understand what it does exaclty.
// YOU DON'T NEED TO EDIT IT BELOW BUT IF YOU DO, DO IT WITH CAUTION!
$msg .= "FirstName: ".$name."\r\n";  // add sender's name to the message
$msg .= "LastName: ".$lname."\r\n";  // add sender's email to the message
$msg .= "Phone: ".$phone."\r\n";  // add sender's email to the message
$msg .= "E-mail: ".$email."\r\n";  // add sender's email to the message
$msg .= "Message: ".$message."\r\n";  // add sender's email to the message
$msg .= "Subject: ".$subject."\r\n\n"; // add subject to the message (optional! It will be displayed in the header anyway)
$msg .= "---Message--- \r\n";
$msg .= "\r\n\n"; 

$mail = @mail($to, $subject, $msg, "From:".$email);  // This command sends the e-mail to the e-mail address contained in the $to variable

if($mail) {
	header("location:index.html");
	//This is the message that will be shown when the message is successfully send
	
} else {
	echo 'Die Nachricht konnte nicht gesendet werden.';   //This is the message that will be shown when an error occured: the message was not send
}

?>