<?php
// Sender API 
include_once 'includes/header.inc.php';

$chikka_api = new Chikka;
$min 		= "639189620441";
$message 	= "This is a test message";

if ( $chikka_api->sendSMS($min, $message) == TRUE) {
	echo "Successfully sent SMS to $min";
} else {
	echo "ERROR";
}
?>