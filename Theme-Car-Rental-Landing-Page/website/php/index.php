<?php

require_once 'vendor/autoload.php';
$config = require_once 'config.php';

// Contact Form
if ($_POST['action'] == 'send_contact_form') {
    echo sendContactForm($_POST, $config);
}

// Appointment Form
if ($_POST['action'] == 'send_inquiry_form') {
    echo sendInquiryForm($_POST, $config);
}

// Newsletter Form
if ($_POST['action'] == 'send_newsletter_form') {

    // Mailchimp Support
    if ($config['mailchimp_support'] === true) {
        $result = sendMailchimp($_POST, $config);
    } else {
        $result = sendNewsletterForm($_POST, $config);
    }
    echo $result;
}


function sendContactForm($formData, $config){
    $validated = GUMP::is_valid($formData, array(
        'first-name' => 'required',
        'last-name' => 'required',
        'telephone' => 'required',
        'email' => 'required|valid_email',
        'message' => 'required'
    ));

    if ($validated === true) {

        $transport = getMailType($config);

        $body = createMailBody('mail-templates/new-contact.html', $formData);
        $body = createMailBody('mail-templates/new-contact.html', $formData);
        $mailer = Swift_Mailer::newInstance($transport);

        // Create a message
        $message = Swift_Message::newInstance($config['contact_form_subject'])
            ->setFrom(array($formData['email'] => $formData['first-name'].' '.$formData['last-name']))
            ->setTo(array($config['sender_email'] => $config['sender_name']))
            ->setBody($body, 'text/html');

        // Send the message
        if ($mailer->send($message)) {
            $result = array('result' => 'success', 'msg' => array('Success! Your contact request has been send.'));
            return json_encode($result);
        } else {
            $result = array('result' => 'error', 'msg' => 'Mail can not send! Check mail configs.');
            return json_encode($result);
        }
    } else {
        $result = array('result' => 'error', 'msg' => $validated);
        return json_encode($result);
    }
}


function sendInquiryForm($formData, $config){
    $validated = GUMP::is_valid($formData, array(
        'first-name' => 'required',
        'last-name' => 'required',
        'phone-number' => 'required',
        'email-address' => 'required|valid_email',
        'email-address-confirm' => 'required|contains,'.$_POST['email-address'],
        'address' => 'required',
        'city' => 'required',
        'zip-code' => 'required'
    ));

    if ($validated === true) {

        $transport = getMailType($config);
        $mailer = Swift_Mailer::newInstance($transport);

        $body = createMailBody('mail-templates/new-inquiry.html', $formData);

        // Create a message
        $message = Swift_Message::newInstance($config['inquiry_form_subject'])
            ->setFrom(array($formData['email-address'] => $formData['first-name'].' '.$formData['last-name']))
            ->setTo(array($config['sender_email'] => $config['sender_name']))
            ->setBody($body, 'text/html');


        $bodyAutoresponder = createMailBody('mail-templates/autoresponder-inquiry.html', $formData);

        // Message Autoresponder
        $messageAutoresponder = Swift_Message::newInstance($config['inquiry_autoresponder_subject'])
            ->setFrom(array($config['sender_email'] => $config['sender_name']))
            ->setTo(array($formData['email-address'] => $formData['first-name'].' '.$formData['last-name']))
            ->setBody($bodyAutoresponder, 'text/html');

        // Send the message
        if ($mailer->send($message) && $mailer->send($messageAutoresponder)) {
            $result = array('result' => 'success', 'msg' => array('Success! Your contact request has been send.'));
            return json_encode($result);
        } else {
            $result = array('result' => 'error', 'msg' => 'Mail can not send! Check mail configs.');
            return json_encode($result);
        }
    } else {
        $result = array('result' => 'error', 'msg' => $validated);
        return json_encode($result);
    }
}


function sendNewsletterForm($formData, $config){
    $validated = GUMP::is_valid($formData, array(
        'newsletter-email' => 'required|valid_email'
    ));

    if ($validated === true) {

        $transport = getMailType($config);

        $body = createMailBody('mail-templates/new-newsletter.html', $formData);
        $mailer = Swift_Mailer::newInstance($transport);

        // Create a message
        $message = Swift_Message::newInstance($config['newsletter_form_subject'])
            ->setFrom(array($config['sender_email'] => $config['sender_name']))
            ->setTo(array($config['sender_email'] => $config['sender_name']))
            ->setBody($body, 'text/html');

        // Send the message
        if ($mailer->send($message)) {
            $result = array('result' => 'success', 'msg' => array('Success! Your contact request has been send.'));
            return json_encode($result);
        } else {
            $result = array('result' => 'error', 'msg' => 'Mail can not send! Check mail configs.');
            return json_encode($result);
        }
    } else {
        $result = array('result' => 'error', 'msg' => $validated);
        return json_encode($result);
    }
}


function getMailType($config){
    switch ($config['mail_type']) {
        case 'smtp' :
            $transport = Swift_SmtpTransport::newInstance($config['smtp_server'], $config['smtp_port'])
                ->setUsername($config['smtp_user'])
                ->setPassword($config['smtp_password']);
            break;
        case 'mail' :
            $transport = Swift_MailTransport::newInstance();
            break;
        default:
            $transport = Swift_MailTransport::newInstance();
    }
    return $transport;
}


function sendMailchimp($formData, $config){
    $validated = GUMP::is_valid($formData, array(
        'newsletter-email' => 'required|valid_email'
    ));

    if ($validated === true) {
        $Mailchimp = new Mailchimp($config['mailchimp_api_key']);
        $Mailchimp_Lists = new Mailchimp_Lists($Mailchimp);

        $email = $formData['newsletter-email']; //replace with a test email

        try {
            $subscriber = $Mailchimp_Lists->subscribe($config['mailchimp_list_id'], array('email' => $email)); //pass the list id and email to mailchimp
        } catch (Exception $e) {
            $result = array('result' => 'error', 'msg' => $e->getMessage());
            return json_encode($result);
        }

        // check that we've succeded
        if (!empty($subscriber['leid'])) {
            $result = array('result' => 'success', 'msg' => array('Success! Thank you for signing up to our newsletter.'));
            return json_encode($result);
        }
    } else {
        $result = array('result' => 'error', 'msg' => $validated);
        return json_encode($result);
    }

}


function createMailBody($file, $data) {
    if (!file_exists($file)) {
        return "Error loading template file ($file).";
    }
    $output = file_get_contents($file);

    foreach ($data as $key => $value) {
        $tagToReplace = "[@$key]";
        $output = str_replace($tagToReplace, $value, $output);
    }

    // Clean empty placeholder
    $pattern = "/\[+@+[a-zA-Z0-9_-]+\]/";
    $output = preg_replace($pattern, '', $output);

    return $output;
}