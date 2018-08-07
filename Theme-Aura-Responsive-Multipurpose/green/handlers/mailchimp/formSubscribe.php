<?php
include_once('MailChimp.php');

$api_key = 'f165592fb351731bba436a58e0a1127e-us8';
$list_id = '633f9eab5f';

$success_message = 'Your email address has been subscribed successfully!';
// Error messages are taken from MailChimp

$MailChimp = new MailChimp($api_key);

$result = $MailChimp->call('lists/subscribe', array(
	'id'                => $list_id,
	'email'             => array('email'=> $_REQUEST['email']),
	'merge_vars'        => array('FNAME'=> $_REQUEST['fname'], 'LNAME'=> $_REQUEST['lname']),
	'double_optin'      => true,
	'update_existing'   => true,
	'replace_interests' => false,
	'send_welcome'      => true
));

if(empty($result['error'])){
	print_r('<div class="pi-alert-success fade in"><button type="button" class="pi-close" data-dismiss="alert"><i class="icon-cancel"></i></button><p>'.$success_message.'</p></div>');
} else {
	print_r('<div class="pi-alert-danger fade in"><button type="button" class="pi-close" data-dismiss="alert"><i class="icon-cancel"></i></button><p>Attention! You have enter an invalid e-mail address, try again.</p></div>');
}