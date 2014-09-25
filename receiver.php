<?php 
// Message Receiver
include_once 'includes/header.inc.php';

try { 
	$message_type = $_POST["message_type"]; 
} catch (Exception $e) { 
	echo "Error"; 
	exit(0); 
} 
	
if ($message_type == "incoming") { 

	try { 
		
		$message 		= $_POST["message"]; 
		$mobile_number 	= $_POST["mobile_number"]; 
		$shortcode 		= $_POST["shortcode"]; 
		$timestamp 		= $_POST["timestamp"]; 
		$request_id 	= $_POST["request_id"]; 
		
		// Explode Message 
		$msgpart = explode(" ", urldecode($message));
		$app 	 = strtolower($msgpart[0]); // APPS e.g. SMC, MENU, FLARE
		$keyword = strtolower($msgpart[1]); // Keyword e.g. REG, ALERT
		$message = $msgpart[2];
		$file = APPS_DIR .'/'.$app.'.app.php';
		
		if(file_exists($file)) {
		
			// Include File
			include_once $file;
			
		} else {
	
			// Invalid Keyword
			$sms = new Chikka;
			$message = "Sorry. Invalid keyword.";
			$sms->replySMS($mobile_number, $request_id, $message, 'P1.00');
		}
		
		echo "Accepted"; 
		exit(0); 
	} catch (Exception $e) { 
		echo "Error"; exit(0); 
	} 
} else { 
	echo "Error"; exit(0); 
} 
	
?>