<?php
// Get the PHP helper library from https://twilio.com/docs/libraries/php
require_once 'autoload.php'; // Loads the library
use Twilio\Rest\Client;

// Your Account Sid and Auth Token from twilio.com/user/account
$sid = "";
$token ="";
$client = new Client($sid, $token);

// Get an object from its sid. If you do not have a sid,
// check out the list resource examples on this page
$client->messages->create(
'+918939308766',
array(
'from'=>'',
'body'=>
)
);
?>
