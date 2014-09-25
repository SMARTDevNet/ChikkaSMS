<?php 
// SMC App
$chikka = new Chikka;
switch ($keyword) {
	case 'reg':
		
		// Message -> Randy Valencia/Male
		$fields = explode('/', $message);
		
		$smc = new SMC;
		if ($smc->registerUser($mobile_number, $fields[0], $fields[1]) == true) {
			$message = "Thank you for subscribing to SMC Alerts! Subscription is valid for 30 days";
			$price = 'P15.00';
		}
		break;
	case 'info':
		$message = "Week of Sept 22-28\nSMC General Assembly\nSept. 24 Wednesday\nZambales Conf. Rm., Smart Tower\n6:30PM";
		$price = 'P5.00';
		break;
	default:
		$message = "Invalid Keyword. To register type SMC REG Name/Gender. To Get Alerts type SMC INFO and send to 292900114";
		$price = 'P2.50';
		break;
}
$chikka->replySMS($mobile_number, $request_id, $message, $price);
?>