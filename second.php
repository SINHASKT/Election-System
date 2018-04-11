<?php
// Get the PHP helper library from https://twilio.com/docs/libraries/php
require_once 'vendor/autoload.php'; // Loads the library
use Twilio\Rest\Client;

// Your Account Sid and Auth Token from twilio.com/user/account
$sid = "AC124f8e2f4de929552b0a7106e7e2bf0e";
$token = "f249985a75728ebfbd26c5a4d75837e7";
$client = new Client($sid, $token);

$client->messages->create(
    '+918840121877',
    array(
        'from' => '+19724262268',
        'body' => "jkjhjhhjjhjhjhjkjarsecs?"
        
    )
);

$sid = $_REQUEST['MessageSid'];
$status = $_REQUEST['MessageStatus'];

openlog("myMessageLog", LOG_PID | LOG_PERROR, LOG_USER);
syslog(LOG_INFO, "SID: $sid, Status: $status");
closelog();


?>