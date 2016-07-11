<?php
session_start();
require_once("twitteroauth/twitteroauth.php");

// Replace the keys below - Go to https://dev.twitter.com/apps to create the Application
$consumerkey = "CpwgP5noqMAJmfnN8kJs3MRvd";
$consumersecret = "WMQfy71UusRzRjE6V8poewJkVke0xI6I2bI8QP5YXgUDVRGLCm";
$accesstoken = "2711914566-7IDVMfKUzWGr0OOpLcck0ECkmIO1LxkggeSikNj";
$accesssecret = "ReDcpKln7fq4D6xmGgoJm26JXt2Pxo99DdAo3tzOyccA8";


$twitteruser = $_GET['twitteruser'];
$notweets = $_GET['notweets'];

function getConnectionWithAccessToken($cons_key, $cons_secret, $oauth_token, $oauth_token_secret) {
	$connection = new TwitterOAuth($cons_key, $cons_secret, $oauth_token, $oauth_token_secret);
	return $connection;
}

$connection = getConnectionWithAccessToken($consumerkey, $consumersecret, $accesstoken, $accesssecret);
$tweets = $connection->get("https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=".$twitteruser."&count=".$notweets);

echo json_encode($tweets);
?>