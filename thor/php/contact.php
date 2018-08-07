<?php

@$name = $_POST['name'];
@$email = $_POST['email'];
@$address = $_POST['message'];


echo $name AND $email AND $phone AND $address AND $city AND $cuntery AND $code;

$to = 'ahmederaqi5@gmail.com';
$subject = 'the subject';
$message = "name = : $name <br/> email is : $email <br/>phone: $phone <br/> address:  $address <br/> city : $city <br/>country : $cuntery <br/> code: $code  ";
$headers = 'From: webmaster@example.com' . "\r\n" .
        'Reply-To: webmaster@example.com' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);
?>