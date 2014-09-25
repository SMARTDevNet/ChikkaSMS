<?php 
// SMC App
$chikka = new Chikka;
switch ($keyword) {
	case '12A':
		$message = "SADOCE ATP\nSayote\nTawilis\nPrk Liver Steak\nDaing Bangus\nSpicy Squid";
		$price = 'P5.00';
		break;
	case '12B':
		$message = "SADOCE SS\nBeef Salpicao\nSS Meatballs\nPrk Sarciado\nPrk Adobo\nPininyahang Manok";
		$price = 'P5.00';
		break;
	default:
		$message = "Invalid Keyword. To Get the latest menu type MENU 12A or 12B and send to 292900114";
		$price = 'P2.50';
		break;
}
$chikka->replySMS($mobile_number, $request_id, $message, $price);
?>