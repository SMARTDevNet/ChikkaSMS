<?php
/**
 * Chikka API
 */
class Chikka
{
	// Send / Broadcast SMS
	public function sendSMS($mobile_number, $message) 
	{
		$post = array( 	"message_type" 	=> "SEND", 
						"mobile_number" => $mobile_number, 
						"shortcode" 	=> CHIKKA_ACCESSCODE, 
						"message_id"	=> date('YmdHis'), 
						"message" 		=> urlencode($message), 
						"client_id" 	=> CHIKKA_CLIENT_ID, 
						"secret_key" 	=> CHIKKA_CLIENT_SECRET );	
		
		$result = $this->curl_request(CHIKKA_URL, $post);
		$result = json_decode($result, true);
		if ($result['status'] == '200') {
			$this->writeLog("SEND", TRUE, $mobile_number );
			return TRUE;
		} else {
			$this->writeLog("SEND", FALSE, $result['message'] . "|". $mobile_number);
			return FALSE;
		}
	}
	
	// Reply SMS
	public function replySMS($mobile_number, $request_id, $message, $price = 'P2.50') 
	{
		$post = array( 	"message_type" 	=> "REPLY", 
						"mobile_number" => $mobile_number, 
						"shortcode" 	=> CHIKKA_ACCESSCODE, 
						"message_id"	=> date('YmdHis'), 
						"message" 		=> urlencode($message), 
						"request_id" 	=> $request_id, 
						"request_cost" 	=> $price, 
						"client_id" 	=> CHIKKA_CLIENT_ID, 
						"secret_key" 	=> CHIKKA_CLIENT_SECRET );	
		
		$result = $this->curl_request(CHIKKA_URL, $post);
		$result = json_decode($result, true);
		if ($result['status'] == '200') {
			$this->writeLog("SUCCESS", TRUE, $mobile_number);
			return TRUE;
		} else {
			$this->writeLog("SEND", FALSE, $request_id . "|". $mobile_number);
			return FALSE;
		}
	}
	
	// Basic Curl Request
	protected function curl_request( $URL, $arr_post_body)
	{
		$query_string = ""; 	
		foreach($arr_post_body as $key => $frow) { 
			$query_string .= '&'.$key.'='.$frow; 
		} 
		
		$this->writeLog("QUERY", FALSE, $query_string);
		

		$curl_handler = curl_init(); 
		curl_setopt($curl_handler, CURLOPT_URL, $URL); 
		curl_setopt($curl_handler, CURLOPT_POST, count($arr_post_body)); 
		curl_setopt($curl_handler, CURLOPT_POSTFIELDS, $query_string); 
		curl_setopt($curl_handler, CURLOPT_RETURNTRANSFER, TRUE); 
		$response = curl_exec($curl_handler); 
		if(curl_errno($curl_handler))
		{
			$info = curl_getinfo($curl_handler);
			/* echo 'Took ' . $info['total_time'] . ' seconds to send a request to ' . $info['url'];
			echo "<pre>";
			print_r($info);
			echo "</pre>"; */
		}
		curl_close($curl_handler); 
		return $response;
	}
	
	// Write Log
	protected function writeLog($type, $success, $content) 
	{
		$filename = LOG_DIR ."/log-".date('Ymd').".txt";
		$status	  = ($success == TRUE) ? "SUCCESS" : "FAILED";
		$somecontent = date('m-d-Y H:i:s') ." \t $type \t $status \t $content \n";
		if (!$handle = fopen($filename, 'a+')) {
			 echo "Cannot open file ($filename)";
			 exit;
		}
		if (fwrite($handle, $somecontent) === FALSE) {
			echo "Cannot write to file ($filename)";
			exit;
		}
		fclose($handle);		
	}
	
}
?> 