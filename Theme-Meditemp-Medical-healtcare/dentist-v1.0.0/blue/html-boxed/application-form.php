<?php 
$to = 'chauhanjeet3@gmail.com'; // Put in your email address here
$subject  = "Application Form"; // The default subject. Will appear by default in all messages. Change this if you want.

// User info (DO NOT EDIT!)
$name = stripslashes($_REQUEST['name']); // sender's name
$email = stripslashes($_REQUEST['email']); 
$phone = stripslashes($_REQUEST['phone']); 
$mobile = stripslashes($_REQUEST['mobile']); 
$address = stripslashes($_REQUEST['address']); 
$city = stripslashes($_REQUEST['city']); 
$state = stripslashes($_REQUEST['state']); 
$country = stripslashes($_REQUEST['country']); 
$zipcode = stripslashes($_REQUEST['zipcode']); 
$job = stripslashes($_REQUEST['job']); 
$salaryexpectation = stripslashes($_REQUEST['salaryexpectation']); 
$message = stripslashes($_REQUEST['message']); 

// The message you will receive in your mailbox
// Each parts are commented to help you understand what it does exaclty.
// YOU DON'T NEED TO EDIT IT BELOW BUT IF YOU DO, DO IT WITH CAUTION!
$msg .= "Name: ".$name."\r\n";  // add sender's name to the message
$msg .= "E-mail: ".$email."\r\n";  // add sender's email to the message
$msg .= "Phone: ".$phone."\r\n";  // add sender's phone to the message
$msg .= "Mobile: ".$mobile."\r\n\n";  // add sender's mobile to the message
$msg .= "Address: ".$address."\r\n";  // add sender's mobile to the message
$msg .= "City: ".$city."\r\n";  // add sender's city to the message
$msg .= "State: ".$state."\r\n";  // add sender's state to the message
$msg .= "Country: ".$country."\r\n";  // add sender's zip code to the message
$msg .= "Zip Code: ".$zipcode."\r\n\n";  // add sender's email to the message
$msg .= "Job: ".$job."\r\n";  // add sender's job to the message
$msg .= "Salary Expectation: ".$salaryexpectation."\r\n";  // add sender's salary expectation to the message
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