<?php 
$to = 'chauhanjeet3@gmail.com'; // Put in your email address here
$subject  = "Appoinment Form"; // The default subject. Will appear by default in all messages. Change this if you want.

// User info (DO NOT EDIT!)
$name = stripslashes($_REQUEST['name']); // sender's name
$email = stripslashes($_REQUEST['email']); 
$phone = stripslashes($_REQUEST['phone']); 
$mobile = stripslashes($_REQUEST['mobile']); 
$gender = stripslashes($_REQUEST['gender']);
$city = stripslashes($_REQUEST['city']); 
$country = stripslashes($_REQUEST['country']); 
$zipcode = stripslashes($_REQUEST['zipcode']); 
$day = stripslashes($_REQUEST['day']); 
$timeday = stripslashes($_REQUEST['timeday']); 
$message = stripslashes($_REQUEST['message']); 

// The message you will receive in your mailbox
// Each parts are commented to help you understand what it does exaclty.
// YOU DON'T NEED TO EDIT IT BELOW BUT IF YOU DO, DO IT WITH CAUTION!
$msg .= "FirstName: ".$name."\r\n";  // add sender's name to the message
$msg .= "E-mail: ".$email."\r\n";  // add sender's email to the message
$msg .= "Phone: ".$phone."\r\n";  // add sender's phone to the message
$msg .= "Mobile: ".$mobile."\r\n";  // add sender's mobile to the message
$msg .= "Gender: ".$gender."\r\n";  // add sender's female to the message
$msg .= "City: ".$city."\r\n";  // add sender's city to the message
$msg .= "Country: ".$country."\r\n";  // add sender's zip code to the message
$msg .= "Zip Code: ".$zipcode."\r\n";  // add sender's email to the message
$msg .= "Day: ".$day."\r\n";  // add sender's job to the message
$msg .= "Time Day: ".$timeday."\r\n";  // add sender's salary expectation to the message
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