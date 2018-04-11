<?php
// Get the PHP helper library from https://twilio.com/docs/libraries/php
require_once 'autoload.php'; // Loads the library
use Twilio\Rest\Client;

// Your Account Sid and Auth Token from twilio.com/user/account
$sid = "ACafad5d248afd2e8263adb66217a4d26e";
$token = "5ab77eae305dcc05067ce28d2fde25d1";
$client = new Client($sid, $token);

// Get an object from its sid. If you do not have a sid,
// check out the list resource examples on this page
$client->messages->create(
'+918939308766',
array(
'from'=>'+1 309-271-0875 ',
'body'=>'Motherfucker'
)
);
?>