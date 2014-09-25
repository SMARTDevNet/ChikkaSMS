<?php 
// Receive Notification From Send / Reply
include_once 'includes/header.inc.php';

try { 
	$message_type = $_POST["message_type"]; 
} catch (Exception $e) { 
	echo "Error"; 
	exit(0); 
} 
	
if ($message_type == "outgoing") { 

	try { 
		$message_id 	= $_POST["message_id"]; 
		$mobile_number 	= $_POST["mobile_number"]; 
		$shortcode 		= $_POST["shortcode"]; 
		$status 		= $_POST["status"]; 
		$timestamp 		= $_POST["timestamp"]; 
		$credits_cost 	= $_POST["credits_cost"]; 
		
		// Table Fields
		$fields = array( "message_type" => "outgoing",
						"shortcode" 	=> $shortcode,
						"message_id" 	=> $message_id,
						"status" 		=> $status,
						"credits_cost" 	=> $credits_cost,
						"timestamp" 	=> $timestamp);
						
		$base = new Base;
		$base->insertNotification($fields);
		
		echo "Accepted"; 
		exit(0); 
	} catch (Exception $e) { 
		echo "Error"; exit(0); 
	} 
} else { 
	echo "Error"; exit(0); 
} 
	
?>