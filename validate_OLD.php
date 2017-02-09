<?php
require "dbip-client.class.php";
if (isset($_POST["submit"])) {

	require_once('recaptchalib.php');
	  $privatekey = "6LdhjA4TAAAAADgNOLtvrd-k6mMOYvc52lmN_37B";
	  $resp = recaptcha_check_answer ($privatekey,
		                        $_SERVER["REMOTE_ADDR"],
		                        $_POST["recaptcha_challenge_field"],
		                        $_POST["recaptcha_response_field"]);

	if (!$resp->is_valid) {
	    // What happens when the CAPTCHA was entered incorrectly
	    die ("The reCAPTCHA wasn't entered correctly. Go back and try it again." .
		 "(reCAPTCHA said: " . $resp->error . ")");
		 header( "refresh:8;url=http://opensat.ddns.net/pay.php" );
	  } else {

 // require_once('recaptchalib.php'); 
$privatekey = "6LdhjA4TAAAAADgNOLtvrd-k6mMOYvc52lmN_37B";

$email = $_POST['email'];
$pay_met = $_POST['pay_met'];
$code = $_POST['code'];
$status = $_POST['status'];
$cline = $_POST['cline'];
$pwdcline = $_POST['pwdcline'];
$iptv = $_POST['iptv'];
$pwdiptv = $_POST['pwdiptv'];
$pack = $_POST['pack'];
$note = $_POST['note'];
$fh = fopen("/urs/local/etc/codici.txt", "r");
$destinatario = "satopen1@gmail.com";
$userip = ($_SERVER['X_FORWARDED_FOR']) ? $_SERVER['X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR'];

$mittente = "From: $email\r\n";
$reply = "Reply-to: $email\r\n";  


$headers = "From: " . $email . "\r\n";
$headers .= "Reply-To: ". $email . "\r\n";
$headers .= "CC: ". $email . "\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";



if(empty($_POST['code']) ) {          
$errIdCode = "<br><b>Insert Id-Code of payment!</b><br>";

}


if(empty($_POST['email']) || !filter_var($email, FILTER_VALIDATE_EMAIL) ) {         
$errEmail =  "<br><b>Insert correct email address!</b><br>";
	
}

if(empty($_POST['pay_met']) || $pay_met == "NULL") {         
$errPay_met =   "<br><b>Insert payment Method!</b><br>";
	
}



if(empty($_POST['status']) ) {
$errStatus = "<br><b>Choose New Account or Renewal!</b><br>";

}


if(empty($_POST['pack']) || $pack == "NULL") {
$errPack = "<br><b>Insert package!</b><br>";

}


if ($pack == "Full_Vip_1_Month"){
	    		$price = "12.00E";		
			$link_c2 = "http://goo.gl/j6Hxc3";			
			$link_payza = "https://secure.payza.com/checkout?AjE9eXRpdG5hdXFfcGEmPT1RWUkyTGdGK2xnUU9xRW1CL2J6ZFU1PWRpdGN1ZG9ycF9wYQI=";
			$link_paypal = "https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=MEVG5PCLYWQS2";
			$link_paypal_it = "https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=KV6ZP69NCBYTY";
			$link_credit_card = "goo.gl/f5u32w";
			$coins_conv = (int) $price * (float) $tasso_bitcoins;
			$coins_conv2 = "http://www.computersebooks.org/prodotto/1-gift-card-10e/";
			$pay_safe_card_price_en = "14.40E (12E+20%tax): Buy PIN 20E (10+10) -> You'll have 45 Days of service";
			$pay_safe_card_price_it = "14.40E (12E+20%tasse): Acquista il PIN da 20E (10+10) -> Avrai 45 Giorni di servizio";			
}


if ($pack == "Full_Vip_1_Month_+_IPTV"){
	    		$price = "20.00E";		
			$link_c2 = "http://goo.gl/j6Hxc3";			
			$link_payza = "https://secure.payza.com/checkout?AjE9eXRpdG5hdXFfcGEmPT1RWUkyTGdGK2xnUU9xRW1CL2J6ZFU1PWRpdGN1ZG9ycF9wYQI=";
			$link_paypal = "https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=MEVG5PCLYWQS2";
			$link_paypal_it = "https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=KV6ZP69NCBYTY";
			$link_credit_card = "goo.gl/SibXVj";
			$coins_conv = (int) $price * (float) $tasso_bitcoins;
			$coins_conv2 = "http://www.computersebooks.org/prodotto/1-gift-card-10e/";
			$pay_safe_card_price_en = "24E (20E+20%tax): Buy PIN 25E -> You'll have 33 Days of service";
			$pay_safe_card_price_it = "24E (20E+20%tasse): Acquista il PIN da 25E -> Avrai 33 Giorni di servizio";
						
}

if ($pack == "Full_Vip_3_Month"){
	    		$price = "30.00E";	
			$link_c2 = "http://goo.gl/OcSg5V";
			$link_payza = "https://secure.payza.com/checkout?ATA8eHNoc21gdHBeb2AlPDxQLlBLTXhXcDBSaDhyMUx2dG01dFZWPGNoc2J0Y25xb15vYAI=";
			$link_paypal = "https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=7D8CHGNH6Y2DN";
			$link_paypal_it = "https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=MH5ET3B4TXRP6";
			$link_credit_card = "goo.gl/xfCvK1";
			$coins_conv = (int) $price * (float) $tasso_bitcoins;
			$pay_safe_card_price_en = "36E (20E+20%tax): Buy PIN 35E (10+25) -> You'll have 90 Days of service";
			$pay_safe_card_price_it = "36E (20E+20%tasse): Acquista il PIN da 35E (10+25) -> Avrai 90 Giorni di servizio";
		}

if ($pack == "Full_Vip_3_Month_+_IPTV"){
	    		$price = "55.00E";	
			$link_c2 = "http://goo.gl/OcSg5V";
			$link_payza = "https://secure.payza.com/checkout?ATA8eHNoc21gdHBeb2AlPDxQLlBLTXhXcDBSaDhyMUx2dG01dFZWPGNoc2J0Y25xb15vYAI=";
			$link_paypal = "https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=7D8CHGNH6Y2DN";
			$link_paypal_it = "https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=MH5ET3B4TXRP6";
			$link_credit_card = "goo.gl/pfb9xD";
			$coins_conv = (int) $price * (float) $tasso_bitcoins;
			$pay_safe_card_price_en = "66E (55E+10%tax): Buy PIN 70E (50+10+10) -> You'll have 100 Days of service";
			$pay_safe_card_price_it = "66E (55E+20%tasse): Acquista il PIN da 70E (50+10+10) -> Avrai 100 Giorni di servizio";
		}


if ($pack == "Full_Vip_6_Month"){
	    		$price = "55.00E";
			$link_c2 = "http://goo.gl/mSblNQ";
			$link_payza = "https://secure.payza.com/checkout?BjRAfHdsd3FkeHRic2QpQEBEdEZnUlVGNm1GWjc5emcydTUzXTNoQGdsd2Z4Z3J1c2JzZAM=";
			$link_paypal = "https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=Y7A4DDRN3V7PJ";
			$link_paypal_it = "https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=3949GT2HZRPNG";
			$link_credit_card = "goo.gl/pfb9xD";
			$coins_conv = (int) $price * (float) $tasso_bitcoins;
			$pay_safe_card_price_en = "66E (55E+20%tax): Buy PIN 70E (50+10+10) -> You'll have 100 Days of service";
			$pay_safe_card_price_it = "66E (55E+20%tasse): Acquista il PIN da 70E (50+10+10) -> Avrai 100 Giorni di servizio";
		}

if ($pack == "Full_Vip_6_Month_+_IPTV"){
	    		$price = "100.00E";
			$link_c2 = "http://goo.gl/mSblNQ";
			$link_payza = "https://secure.payza.com/checkout?BjRAfHdsd3FkeHRic2QpQEBEdEZnUlVGNm1GWjc5emcydTUzXTNoQGdsd2Z4Z3J1c2JzZAM=";
			$link_paypal = "https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=Y7A4DDRN3V7PJ";
			$link_paypal_it = "https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=3949GT2HZRPNG";
			$link_credit_card = "goo.gl/DV6LBA";
			$coins_conv = (int) $price * (float) $tasso_bitcoins;
			$pay_safe_card_price_en = "120.00E (100E+20%tax): Buy PIN 120E (100+10+10) -> You'll have 180 Days of service";
			$pay_safe_card_price_it = "120.00E (100E+20%tasse):  Acquista il PIN da 120E (100+10+10) -> Avrai 180 Giorni di servizio";
		}
	



if ($pack == "Mediaset_Premium_1_Month" || $pack == "CSPAIN_Full_1_Month" || $pack == "Sky_UK_Full_1_Month" || $pack == "Sky_DE_Full_1_Month" || $pack == "Adult_1_Month" || $pack == "CSAT_Full_1_Month"){
	    		$price = "4.00E";
			$link_c2 = "goo.gl/HZoIhe";
			$link_payza = "https://secure.payza.com/checkout?BzRAfHdsd3FkeHRic2QpQEBEPFluSn13czxEdmlMMzpOSzhPSURNQGdsd2Z4Z3J1c2JzZAQ=";
			$link_paypal = "https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=8M2J67BYP7W8U";
			$link_paypal_it = "https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=7LN6D4F4FPC4U";
			$link_credit_card = "goo.gl/ZqkebD";	
			$coins_conv = (int) $price * (float) $tasso_bitcoins;
			$pay_safe_card_price_en = "4.80E (4E+20%tax): Buy PIN 10E -> You'll have 60 Days of service";
			$pay_safe_card_price_it = "4.80E (4E+20%tasse): Acquista il PIN da 10E -> Avrai 60 Giorni di servizio";
		}

if ($pack == "Mediaset_Premium_3_Month" || $pack == "CSPAIN_Full_3_Month" || $pack == "Sky_UK_Full_3_Month" || $pack == "Sky_DE_Full_3_Month" || $pack == "Adult_3_Month" || $pack == "CSAT_Full_3_Month"){
	    		$price = "10.00E";
			$link_c2 = "http://goo.gl/CjkJiS";
			$link_payza = "https://secure.payza.com/checkout?BDM/e3ZrdnBjd3NhcmMoPz9TNDJxZHVmSzZEbThXO3pzaDhsUFdLP2ZrdmV3ZnF0cmFyYwI=";
			$link_paypal = "https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=DEK9RQ5DNCQRY";
			$link_paypal_it = "https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=7HVF8WGQQWSA2";
			$link_credit_card = "goo.gl/JCv0b8";
			$coins_conv = (int) $price * (float) $tasso_bitcoins;
			$pay_safe_card_price_en = "12.00E (10E+20%tax): Buy PIN 20E (10+10) -> You'll have 150 Days of service";
			$pay_safe_card_price_it = "12.00E (10E+20%tasse): Acquista il PIN da 20E (10+10) -> Avrai 150 Giorni di servizio";

		}

if ($pack == "Mediaset_Premium_6_Month" || $pack == "CSPAIN_Full_6_Month" || $pack == "Sky_UK_Full_6_Month" || $pack == "Sky_DE_Full_6_Month" || $pack == "Adult_6_Month" || $pack == "CSAT_Full_6_Month"){
	    		$price = "20.00E";		
			$link_c2 = "http://goo.gl/j6Hxc3";			
			$link_payza = "https://secure.payza.com/checkout?AjE9eXRpdG5hdXFfcGEmPT1RWUkyTGdGK2xnUU9xRW1CL2J6ZFU1PWRpdGN1ZG9ycF9wYQI=";
			$link_paypal = "https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=MEVG5PCLYWQS2";
			$link_paypal_it = "https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=KV6ZP69NCBYTY";
			$link_credit_card = "goo.gl/SibXVj";
			$coins_conv = (int) $price * (float) $tasso_bitcoins;
			$coins_conv2 = "http://www.computersebooks.org/prodotto/1-gift-card-10e/";
			$pay_safe_card_price_en = "24E (20E+20%tax): Buy PIN 25E -> You'll have 33 Days of service";
			$pay_safe_card_price_it = "24E (20E+20%tasse): Acquista il PIN da 25E -> Avrai 33 Giorni di servizio";

		}

if ($pack == "Mediaset_Premium_12_Month" || $pack == "CSPAIN_Full_12_Month" || $pack == "Sky_UK_Full_12_Month" || $pack == "Sky_DE_Full_12_Month" || $pack == "Adult_12_Month" || $pack == "CSAT_Full_12_Month"){
	    		$price = "40.00E";
			$link_c2 = "http://goo.gl/uvFVGQ";
			$link_payza = "https://secure.payza.com/checkout?CjhE4oKse3B7dWh8eGZ3aC1ERH5rUUk5aVY6PndUXD5eV1k6Nm13VFNEa3B7anxrdnl3ZndoAw==";
			$link_paypal = "https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=F2B9USZDWR678";
			$link_paypal_it = "https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=9Y9ZGU76YX6HE";
			$link_credit_card = "http://goo.gl/EML6hJ";
			$coins_conv = (int) $price * (float) $tasso_bitcoins;
			$pay_safe_card_price_en = "48E (40E+20%tax): Buy PIN 50E -> You'll have 370 Days of service";
			$pay_safe_card_price_it = "48E (40E+20%tasse): Acquista il PIN da 50E -> Avrai 370 Giorni di servizio";

		}





if ($pack == "SRG_1_Month" || $pack == "Tivusat_1_Month" || $pack == "MaxTv_1_Month" || $pack == "NC+_1_Month" || $pack == "ORF_1_Month" || $pack == "Polsat_1_Month"){
		        $price = "2.00E";
			$link_c2 = "goo.gl/rRudFU";
			$link_payza = "https://secure.payza.com/checkout?BTVBfXhteHJleXVjdGUqQUFVVmx8aHlMS3VXcHlIWVVoXXxxaGltQWhteGd5aHN2dGN0ZQE=";
			$link_paypal = "https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=VAMRN7LM5X9FA";
			$link_paypal_it = "https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=AEN52XVGK93KU";
			$link_credit_card = "goo.gl/Jq3D4R";
			$coins_conv = (int) $price * (float) $tasso_bitcoins;
			$pay_safe_card_price_en = "2.40E (2E+20%tax): Buy PIN 10E -> You'll have 180 Days of service";
			$pay_safe_card_price_it = "2.40E (2E+20%tax): Acquista il PIN da 10E -> Avrai 180 Giorni di servizio";	

		}

if ($pack == "SRG_12_Month" || $pack == "Tivusat_12_Month" || $pack == "MaxTv_12_Month" || $pack == "NC+_12_Month" || $pack == "ORF_12_Month" || $pack == "Polsat_12_Month"){
	    		$price = "20.00E";		
			$link_c2 = "http://goo.gl/j6Hxc3";			
			$link_payza = "https://secure.payza.com/checkout?AjE9eXRpdG5hdXFfcGEmPT1RWUkyTGdGK2xnUU9xRW1CL2J6ZFU1PWRpdGN1ZG9ycF9wYQI=";
			$link_paypal = "https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=MEVG5PCLYWQS2";
			$link_paypal_it = "https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=KV6ZP69NCBYTY";
			$link_credit_card = "goo.gl/SibXVj";
			$coins_conv = (int) $price * (float) $tasso_bitcoins;
			$coins_conv2 = "http://www.computersebooks.org/prodotto/1-gift-card-10e/";
			$pay_safe_card_price_en = "24E (20E+20%tax): Buy PIN 25E -> You'll have 365 Days of service";
			$pay_safe_card_price_it = "24E (20E+20%tasse): Acquista il PIN da 25E -> Avrai 365 Giorni di servizio";


		}



if ($pack == "IPTV_1_Month"){
	    $price = "12.00E";
			$link_c2 = "http://goo.gl/o4O6CO";
			$link_payza = "https://secure.payza.com/checkout?BDRAfHdsd3FkeHRic2QpQEBEZzVlSzVIaVYyfUdGNFc8dlVIWmR6QGdsd2Z4Z3J1c2JzZAE=";
			$link_paypal = "https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=66WW53CZG7D6J";
			$link_paypal_it = "https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=EGMCAK5G66NR8";
			$link_credit_card = "goo.gl/o4O6CO";	
			$coins_conv = (int) $price * (float) $tasso_bitcoins;
			$pay_safe_card_price_en = "14.40E (12E+20%tax): Buy PIN 25E -> You'll have 60 Days of service";
			$pay_safe_card_price_it = "14.40E (12E+20%tax): Acquista il PIN da 25E -> Avrai 60 Giorni di servizio";
		}

	
if ($pack == "IPTV_3_Month"){
	    $price = "35.00E";
			$link_c2 = "http://goo.gl/XDSzzA";
			$link_payza = "https://secure.payza.com/checkout?BDRAfHdsd3FkeHRic2QpQEBEZzVlSzVIaVYyfUdGNFc8dlVIWmR6QGdsd2Z4Z3J1c2JzZAE=";
			$link_paypal = "https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=66WW53CZG7D6J";
			$link_paypal_it = "https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=EGMCAK5G66NR8";
			$link_credit_card = "goo.gl/XDSzzA";	
			$coins_conv = (int) $price * (float) $tasso_bitcoins;
			$pay_safe_card_price_en = "35E: Buy PIN 35E (25+10)";
			$pay_safe_card_price_it = "35E: Acquista il PIN da 35E (25+10)";
		}

if ($pack == "IPTV_6_Month"){
	    $price = "70.00E";
			$link_c2 = "http://goo.gl/4Eqjkm";
			$link_payza = "https://secure.payza.com/checkout?BDRAfHdsd3FkeHRic2QpQEBEZzVlSzVIaVYyfUdGNFc8dlVIWmR6QGdsd2Z4Z3J1c2JzZAE=";
			$link_paypal = "https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=66WW53CZG7D6J";
			$link_paypal_it = "https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=EGMCAK5G66NR8";
			$link_credit_card = "goo.gl/4Eqjkm";	
			$coins_conv = (int) $price * (float) $tasso_bitcoins;
			$pay_safe_card_price_en = "75.00E (70E+tax): Buy PIN 75E (50+25)";
			$pay_safe_card_price_it = "75.00E (70E+tax): Acquista il PIN da 75E (50+25)";
		}	



if ($pack == "Combo_Full_Vip_1_Month"){
		        $price = "40.00E";		
			$link_credit_card = "goo.gl/EML6hJ";
			$coins_conv = (int) $price * (float) $tasso_bitcoins;
			$pay_safe_card_price_en = "48E (40E+20%tax): Buy PIN 50E -> You'll have 33 Days of service";
			$pay_safe_card_price_it = "48E (40E+20%tasse): Acquista il PIN da 50E -> Avrai 33 Giorni di servizio";
						
		}

if ($pack == "Combo_Full_Vip_3_Month"){
	    $price = "100.00E";	
			$link_credit_card = "goo.gl/DV6LBA";
			$coins_conv = (int) $price * (float) $tasso_bitcoins;
			$pay_safe_card_price_en = "120.00E (100E+20%tax): Buy PIN 120E (100+10+10) -> You'll have 90 Days of service";
			$pay_safe_card_price_it = "120.00E (100E+20%tasse): Acquista il PIN da 120E (100+10+10) -> Avrai 90 Giorni di servizio";
		}

if ($pack == "Combo_Full_Vip_6_Month"){
	    		$price = "200.00E";
			$link_credit_card = "goo.gl/fZFPY2";
			$coins_conv = (int) $price * (float) $tasso_bitcoins;
			$pay_safe_card_price_en = "240.00E (200E+20%tax): Buy PIN 240E (100+100+10+10+10+10)-> You'll have 180 Days of service";
			$pay_safe_card_price_it = "240.00E (200E+20%tasse): Acquista il PIN da 240E (100+100+10+10+10+10) -> Avrai 180 Giorni di servizio";	
		}
	


if ($pack == "Combo_SkyDe_SkyUk_1_Month" || $pack == "Combo_Canal+Spain_Sky_Uk_1_Month"){
	    		$price = "8.00E";
			$link_c2 = "http://goo.gl/9BQcLZ";
			$link_payza = "https://secure.payza.com/checkout?BDRAfHdsd3FkeHRic2QpQEBEZzVlSzVIaVYyfUdGNFc8dlVIWmR6QGdsd2Z4Z3J1c2JzZAE=";
			$link_paypal = "https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=66WW53CZG7D6J";
			$link_paypal_it = "https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=EGMCAK5G66NR8";
			$link_credit_card = "goo.gl/PHqYAx";	
			$coins_conv = (int) $price * (float) $tasso_bitcoins;
			$pay_safe_card_price_en = "9.60E (8E+20%tax): Buy PIN 10E -> You'll have 30 Days of service";
			$pay_safe_card_price_it = "9.60E (8E+20%tasse): Acquista il PIN da 10E -> Avrai 30 Giorni di servizio";
		}
if ($pack == "Combo_SkyDe_SkyUk_3_Month" || $pack == "Combo_Canal+Spain_Sky_Uk_3_Month" ){
	    		$price = "20.00E";		
			$link_c2 = "http://goo.gl/j6Hxc3";			
			$link_payza = "https://secure.payza.com/checkout?AjE9eXRpdG5hdXFfcGEmPT1RWUkyTGdGK2xnUU9xRW1CL2J6ZFU1PWRpdGN1ZG9ycF9wYQI=";
			$link_paypal = "https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=MEVG5PCLYWQS2";
			$link_paypal_it = "https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=KV6ZP69NCBYTY";
			$link_credit_card = "goo.gl/SibXVj";
			$coins_conv = (int) $price * (float) $tasso_bitcoins;
			$coins_conv2 = "http://www.computersebooks.org/prodotto/1-gift-card-10e/";
			$pay_safe_card_price_en = "24E (20E+20%tax): Buy PIN 25E -> You'll have 33 Days of service";
			$pay_safe_card_price_it = "24E (20E+20%tasse): Acquista il PIN da 25E -> Avrai 33 Giorni di servizio";
		}

if ($pack == "Combo_SkyDe_SkyUk_6_Month" || $pack == "Combo_Canal+Spain_Sky_Uk_6_Month"){
	    		$price = "40.00E";
			$link_c2 = "http://goo.gl/uvFVGQ";
			$link_payza = "https://secure.payza.com/checkout?BDRAfHdsd3FkeHRic2QpQEBEZzVlSzVIaVYyfUdGNFc8dlVIWmR6QGdsd2Z4Z3J1c2JzZAE=";
			$link_paypal = "https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=66WW53CZG7D6J";
			$link_paypal_it = "https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=EGMCAK5G66NR8";
			$link_credit_card = "goo.gl/EML6hJ";	
			$coins_conv = (int) $price * (float) $tasso_bitcoins;
			$pay_safe_card_price_en = "48E (40E+20%tax): Buy PIN 50E -> You'll have 185 Days of service";
			$pay_safe_card_price_it = "48E (40E+20%tasse): Acquista il PIN da 50E -> Avrai 185 Giorni di servizio";
		}
	
						

if ($pack == "Combo_Tivusat_Mediaset_1_Month"){
	    		$price = "5.00E";
			$link_c2 = "http://goo.gl/hQm4EI";
			$link_payza = "https://secure.payza.com/checkout?BDM/e3ZrdnBjd3NhcmMoPz9DUkhnZzdrNG85VjdcSEo7bzlQMUpRP2ZrdmV3ZnF0cmFyYwI=";
			$link_paypal = "https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=2HNDPB7HWAKKY";
			$link_paypal_it = "https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=QMD2ZJCVVGENJ";
			$link_credit_card = "goo.gl/OXAAVJ";
			$coins_conv = (int) $price * (float) $tasso_bitcoins;
			$pay_safe_card_price_en = "6E (5E+20%tax): Buy PIN 10E -> You'll have 60 Days of service";
			$pay_safe_card_price_it = "6E (5E+20%tasse): Acquista il PIN da 10E -> Avrai 60 Giorni di servizio";
		}

if ($pack == "Combo_Tivusat_Mediaset_12_Month" || $pack == "Combo_Tivusat_Mediaset_MaxTv_12_Month"){
	    		$price = "50.00E";
			$link_c2 = "http://goo.gl/mnstUo";
			$link_payza = "https://secure.payza.com/checkout?BDE9eXRpdG5hdXFfcGEmPT1BU0J1M1pVYUZ0VjdYc1RmbmJkRjdLPWRpdGN1ZG9ycF9wYQQ=";
			$link_paypal = "https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=ZGBCNV8563656";
			$link_paypal_it = "https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=NHUPLWYBRTF8G";
			$link_credit_card = "goo.gl/ki7aMO";	
			$coins_conv = (int) $price * (float) $tasso_bitcoins;
			$pay_safe_card_price_en = "60E (50E+20%tax): Buy PIN 60E (50+10) -> You'll have 365 Days of service";
			$pay_safe_card_price_it = "60E (50E+20%tasse): Acquista il PIN da 60E (50+10) -> Avrai 365 Giorni di servizio";
		}
	






 //CONTROLLO DEL CODICE 

//CERCO CODICE

$line_number = false;
$count = 0;
while (($line = fgets($fh, 4096)) !== FALSE and !$line_number) {
				      $count++;
				      $line_number = (strpos($line, $code) !== FALSE) ? $count : $line_number;
				}

fclose($fh);




if ($line_number!=false){

$errIdCode = "<br><b>The id-code already used!</b><br>";
}	

else {

  //SE CODICE NON USATO

	if ($pay_met != "PaySafeCard"){	 
		$pay_safe_card_price_en = '';
		$pay_safe_card_price_it = '';
			}
	
	if ($pay_met != "Bitcoin"){	 
		$coins_conv = '';
	}
	
	


	
	
	//RINNOVO O NUOVA
		if ($status == "renewal"){
	 				
			
					$oggetto = "RENEWAL- VALIDATE"; 
$corpo_email = "<b>Pm:</b>  $pay_met<br>
		<b>CardSharing Username:</b> $cline <b>Password:</b> $pwdcline<br>
		<b>Iptv Username:</b> $iptv <b>Password:</b> $pwdiptv<br>
		Validate payment for<br>
		<b>Email:</b> $email<br>
		<b>ID Code:</b> $code<br>
		<b>Package:</b> $pack<br>
		<b>Price:</b> $price $coins_conv<br>$pay_safe_card_price_en<br>$pay_safe_card_price_it<br>
		<b>Note:</b> $note<br>
		<br>$userip<br>";
if (!$errIdCode && !$errEmail && !$errPay_met && !$errStatus && !$errPack){
$correct = "<br><b>Validation correctly send. Please wait 48 hours for reactivate.<br>Don't send other email before 48h time.<br>If you have problems, please contact: satopen1@gmail.com</b> <br><br><b>Validazione inviata correttamente. Attendi 48 ore per la riattivazione.<br>Non inviare altre email prima di 48 ore.<br>Se hai problemi contatta: satopen1@gmail.com</b> <br><br><b>Your payment data:</b> <br>$corpo_email <br>";
	mail($destinatario, $oggetto, $corpo_email, $headers); 

		$fh3 = fopen("/usr/local/etc/codici.txt", "ab+");				
		fwrite($fh3, $code);
		fwrite($fh3, "\n");								
		fclose($fh3);	
			
		$fh5 = fopen("/var/www/html/account_da_creare.txt", "ab+");				
		fwrite($fh5, $code."\n");
		fwrite($fh5, $email."\n");
		fwrite($fh5, $pay_met."\nRenewal:");
		fwrite($fh5, $cline."\n");
		fwrite($fh5, $pack."\n");
		fwrite($fh5, "\n\n\n\n");								
		fclose($fh5);	
}
					
			}

		else{ //NUOVA
			$oggetto = "NEW CLINE - VALIDATE";
$corpo_email = "<b>Pm:</b> $pay_met<br>
		<b>NEW CLINE</b><br>Validate payment for<br>
		<b>Email:</b> $email<br>
		<b>ID Code:</b> $code<br>
		<b>Package:</b> $pack<br>
		<b>Price:</b> $price $coins_conv<br>$pay_safe_card_price_en<br>$pay_safe_card_price_it<br>
		<b>Note:</b> $note<br>
		<br>$userip<br>";
if (!$errIdCode && !$errEmail && !$errPay_met && !$errStatus && !$errPack) {
$correct = "<b> Validation correctly send. Please wait max 48 hours to receive new Account.<br>Don't send other email before 48h time.<br>If you have problems, please contact: satopen1@gmail.com</b> <br><br><b> Validazione inviata correttamente. Attendi max 48 ore per ricevere l'account.<br>Non inviare altre email prima di 48 ore.<br>Se hai problemi contatta: satopen1@gmail.com</b> <br><br><b>Your payment data:</b> <br>$corpo_email <br>";
	mail($destinatario, $oggetto, $corpo_email, $headers); 	

	$fh3 = fopen("/usr/local/etc/codici.txt", "ab+");				
		fwrite($fh3, $code);
		fwrite($fh3, "\n");								
		fclose($fh3);	
			
		$fh5 = fopen("/var/www/html/account_da_creare.txt", "ab+");				
		fwrite($fh5, $code."\n");
		fwrite($fh5, $email."\n");
		fwrite($fh5, $pay_met."\nRenewal:");
		fwrite($fh5, $cline."\n");
		fwrite($fh5, $pack."\n");
		fwrite($fh5, "\n\n\n\n");								
		fclose($fh5);	
}
		}
	


		
//SCRIVI CODICE
		




		}






}}

?>










<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="SatOpen.cc Best Cardsharing Server">
    <meta name="author" content="SatOpen.cc">
	 <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <title>Require Pay info</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
	<style media="screen" type="text/css">
				body, html {background:#FFFFFF; }

		/* The CSS */
		select {
		    padding:1px;
		    margin: 0;
		    -webkit-border-radius:1px;
		    -moz-border-radius:2px;
		    border-radius:2px;
		    -webkit-box-shadow: 0 3px 0 #ccc, 0 -1px #fff inset;
		    -moz-box-shadow: 0 3px 0 #ccc, 0 -1px #fff inset;
		    box-shadow: 0 3px 0 #ccc, 0 -1px #fff inset;
		    background: #f8f8f8;
		    color:#888;
		    border:none;
		    outline:none;
		    display: inline-block;
		    -webkit-appearance:none;
		    -moz-appearance:none;
		    appearance:none;
		    cursor:pointer;
		}

		/* Targetting Webkit browsers only. FF will show the dropdown arrow with so much padding. */
		@media screen and (-webkit-min-device-pixel-ratio:0) {
		    select {padding-right:5px}
		}

		

	</style>
  </head>



  

  <body>



  	<div class="container">
  		<div class="row">
  			<div class="col-md-6 col-md-offset-1">

				<div class="form-group">
						<div class="stack">
							<?php echo "<div class='alert alert-success'> $correct</div>"; ?>	
			
						</div>
					


  				<h1 class="page-header text-center">Validate your Payment</h1>
				<form class="form-horizontal" role="form" method="post" action="validate.php">
					
						<label for="email" class="col-sm-5 control-label">Email</label>
						<div class="col-sm-5">
							<input type="email" class="form-control" id="email" name="email" placeholder="example@domain.com" value="<?php echo htmlspecialchars($_POST['email']); ?>">
							<?php echo "<p class='text-danger'>$errEmail</p>";?>
						  
						</div>
					

						<label for="email" class="col-sm-5 control-label">Confirm Email Address</label>
						<div class="col-sm-5">
							 <input name="emailConfirm"  class="form-control" type="email" id="confemail" placeholder="example@domain.com" onpaste="return false;" onblur="confirmEmail()"/>
						  
						</div>
					


					
						<label for="pay_met" class="col-sm-5 control-label">Payment method</label>
						<div class="col-sm-5">
							<select onchange="update_status_pay()"  size="1" name="pay_met" id="pay_met" class="required">
							
							<option value="CreditCardMyCommerce">Credit Card by Mycommerce.com</option>
							<option value="Neteller">Neteller</option>
							<option value="Skrill">Skrill</option>				
							<option value="Bitcoin">Bitcoin</option>				
							<option value="PaySafeCard">PaySafe Card</option> 
							</select>							 
							<?php echo "<p class='text-danger'>$errPay_met </p>";?>
						</div>
					


					
						<label for="code" class="col-sm-5 control-label">Your id code transaction- Codice transazione<br><a href="info.html"><span><b>Where find it? Dove lo trovo?</b></span></a></b></label>
						
						<div class="col-sm-5">
							<input type="text" name="code" id="code" class="required" />
							<?php echo "<p class='text-danger'>$errIdCode </p>";?>
						</div>
					

					
						<label for="status" class="col-sm-5 control-label">New Account | Renewal</label>
						<div class="col-sm-5">
							<select onchange="update_status()"  size="1" name="status" id="status" class="required">
							<option value="new">New Account - Nuovo Account</option>
							<option value="renewal">Renewal Account- Rinnovo Account</option>
							</select>
							 <?php echo "<p class='text-danger'>$errStatus </p>";?>
						</div>
					
						<label for="cline" class="col-sm-5 control-label" id="clinetxt">Username</label>
						<label for="pwdcline" class="col-sm-5 control-label" id="pwdclinetxt">Password C-Line to renewal</label>
						<div class="col-sm-5">
							<input type="text" id="cline" name="cline"  />   
							<input type="text" id="pwdcline" name="pwdcline"  />   
						
						</div>
					
						<label for="iptv" class="col-sm-5 control-label" id="iptvtxt">Username<br></label>
						<label for="pwdiptv" class="col-sm-5 control-label" id="pwdiptvtxt">Password IPTV to renewal<br></label>
						<div class="col-sm-5">
							<input type="text" id="iptv" name="iptv"  />  
							<input type="text" id="pwdiptv" name="pwdiptv"  />  
			
						</div>
						

					
					<label for="pack" class="col-sm-5 control-label">Package</label>
					<div class="col-sm-5">
							
					<select onchange="update_status_pack()" class="required" id="pack" name="pack" size="1">
					<option value="NULL">                                         </option>
					<option value="NULL">*******CARDSHARING FULL VIP OFFER *******</option>
					<option value="NULL">                                         </option>
					<option value="Full_Vip_1_Month">* CardSharing FULL VIP 1 MONTH *</option>					
					<option value="Full_Vip_3_Month">* CardSharing FULL VIP 3 MONTHS *</option>					
					<option value="Full_Vip_6_Month">* CardSharing FULL VIP 6 MONTHS *</option>
					<option value="NULL">                                               </option>
					<option value="NULL">*******CARDSHARING FULL VIP OFFER + IPTV*******</option>
					<option value="NULL">                                               </option>
					<option value="Full_Vip_1_Month_+_IPTV">* CardSharing FULL VIP 1 MONTH + IPTV *</option>
					<option value="Full_Vip_3_Month_+_IPTV">* CardSharing FULL VIP 3 MONTHS + IPTV *</option>
					<option value="Full_Vip_6_Month_+_IPTV">* CardSharing FULL VIP 6 MONTHS + IPTV *</option>
					<option value="NULL">                                             </option>
					<option value="NULL">*******CARDSHARING  SINGLE PACK OFFER *******</option>
					<option value="NULL">                                             </option>
					<option value="Sky_UK_Full_1_Month">CardSharing SKY UK 1 MONTH</option>
					<option value="Sky_UK_Full_3_Month">CardSharing SKY UK 3 MONTHS</option>
					<option value="Sky_UK_Full_6_Month">CardSharing SKY UK 6 MONTHS</option>
					<option value="Sky_UK_Full_12_Month">CardSharing SKY UK 12 MONTHS</option>
					<option value="NULL">                                             </option>
					<option value="Sky_DE_Full_1_Month">CardSharing SKY DE BASE 1 MONTH</option>
					<option value="Sky_DE_Full_3_Month">CardSharing SKY DE BASE 3 MONTHS</option>
					<option value="Sky_DE_Full_6_Month">CardSharing SKY DE BASE 6 MONTHS</option>
					<option value="Sky_DE_Full_12_Month">CardSharing SKY DE BASE 12 MONTHS</option>
					<option value="NULL">                                            </option>	
					<option value="CSAT_Full_1_Month">CARDSHARING CANALSAT - FULL PACK - 1 MONTH</option>
					<option value="CSAT_Full_3_Month">CARDSHARING CANALSAT - FULL PACK - 3 MONTHS</option>
					<option value="CSAT_Full_6_Month">CARDSHARING CANALSAT- FULL PACK - 6 MONTHS</option>
					<option value="CSAT_Full_12_Month">CARDSHARING CANALSAT - FULL PACK - 12 MONTHS</option>
					<option value="NULL">                                             </option>
					<option value="Mediaset_Premium_1_Month">CardSharing MEDIASET 1 MONTH</option>
					<option value="Mediaset_Premium_3_Month">CardSharing MEDIASET 3 MONTHS</option>
					<option value="Mediaset_Premium_6_Month">CardSharing MEDIASET 6 MONTHS</option>
					<option value="Mediaset_Premium_12_Month">CardSharing MEDIASET 12 MONTHS</option>
					<option value="NULL">                                             </option>
					<option value="Tivusat_1_Month">CardSharing TIVUSAT FULL 1 MONTH</option>
					<option value="Tivusat_12_Month">CardSharing TIVUSAT FULL 12 MONTHS</option>
					<option value="NULL">                                             </option>
					<option value="NC+_1_Month">CARDSHARING NC+ 1 MONTH</option>
					<option value="NC+_12_Month">CARDSHARING NC+ 12 MONTHS</option>						
					<option value="NULL">                                            </option>
					<option value="ORF_1_Month">CARDSHARING ORF 1 MONTH </option>
					<option value="ORF_12_Month">CARDSHARING ORF 12 MONTHS</option>						
					<option value="NULL">                                            </option>
					<option value="Polsat_1_Month">CARDSHARING POLSAT 1 MONTH</option>
					<option value="Polsat_12_Month">CARDSHARING POLSAT 12 MONTHS</option>						
					<option value="NULL">                                            </option>	
					<option value="MaxTv_1_Month">CardSharing MAXTV 1 MONTH</option>
					<option value="MaxTv_12_Month">CardSharing MAXTV 12 MONTHS</option>
					<option value="NULL">                                             </option>
					<option value="CSPAIN_Full_1_Month">CardSharing DIGITAL SPAIN FULL 1 MONTH</option>
					<option value="CSPAIN_Full_3_Month">CardSharing DIGITAL SPAIN FULL 3 MONTH</option>
					<option value="CSPAIN_Full_6_Month">CardSharing DIGITAL SPAIN FULL 6 MONTHS</option>
					<option value="CSPAIN_Full_12_Month">CardSharing DIGITAL SPAIN FULL 12 MONTHS</option>
					<option value="NULL">                                             </option>
					<option value="SRG_1_Month">CardSharing SRG 1 MONTH</option>
					<option value="SRG_12_Month">CardSharing SRG 12 MONTHS</option>
					<option value="NULL">                                            </option>		
					<option value="Adult_1_Month">CARDSHARING ADULT PACK - FULL PACK - 1 MONTH</option>	
					<option value="Adult_6_Month">CARDSHARING ADULT PACK - FULL PACK - 3 MONTHS</option>
					<option value="Adult_6_Month">CARDSHARING ADULT PACK - FULL PACK - 6 MONTHS</option>			
					<option value="Adult_12_Month">CARDSHARING ADULT PACK - FULL PACK - 12 MONTHS</option>
					<option value="NULL">                                      </option>
					<option value="NULL">                                       </option>
					<option value="NULL">*******CARDSHARING  COMBO OFFER *******</option>
					<option value="NULL">                                      </option>
					<option value="Combo_Full_Vip_1_Month">CARDSHARING COMBO: 5 FULLVIP PACK - 1 MONTH</option>
					<option value="Combo_Full_Vip_3_Month">CARDSHARING COMBO: 5 FULLVIP PACK - 3 MONTH</option>
					<option value="Combo_Full_Vip_6_Month">CARDSHARING COMBO: 5 FULLVIP PACK - 6 MONTH</option>
					<option value="NULL">                                      </option>
					<option value="Combo_SkyDe_SkyUk_1_Month">CARDSHARING COMBO: SKY DE + SKY UK - 1 MONTH</option>
					<option value="Combo_SkyDe_SkyUk_3_Month">CARDSHARING COMBO: SKY DE + SKY UK - 3 MONTH</option>
					<option value="Combo_SkyDe_SkyUk_6_Month">CARDSHARING COMBO: SKY DE + SKY UK - 6 MONTH</option>
					<option value="NULL">                                      </option>
					<option value="Combo_Canal+Spain_Sky_Uk_1_Month">CARDSHARING COMBO: CANAL+ SPAIN + SKY UK - 1 MONTH</option>
					<option value="Combo_Canal+Spain_Sky_Uk_3_Month">CARDSHARING COMBO: CANAL+ SPAIN + SKY UK - 3 MONTH</option>
					<option value="Combo_Canal+Spain_Sky_Uk_6_Month">CARDSHARING COMBO: CANAL+ SPAIN + SKY UK - 6 MONTH</option>
					<option value="NULL">                                                             </option>
					<option value="Combo_Tivusat_Mediaset_1_Month">CARDSHARING COMBO: TIVUSAT + MEDIASET PREMIUM - 1 MONTH/option>
					<option value="Combo_Tivusat_Mediaset_12_Month">CARDSHARING COMBO: TIVUSAT + MEDIASET PREMIUM - 12 MONTH</option>
					<option value="NULL">                                                             </option>
					<option value="Combo_Tivusat_Mediaset_MaxTv_12_Month">CARDSHARING COMBO: TIVUSAT + MEDIASET PREMIUM + MAXTV - 12 MONTH -</option>
					<option value="NULL">                                                             </option>
					<option value="NULL">*******    IPTV OFFER     *******</option>
					<option value="NULL">                                 </option>
					<option value="IPTV_1_Month">IPTV - 1 MONTH - 12E</option>
					<option value="IPTV_3_Month">IPTV - 3 MONTHS - 35E</option>
					<option value="IPTV_6_Month">IPTV - 6 MONTHS - 70E</option>
					<option value="NULL">                                 </option>
					<option value="NULL">*******CARDSHARING  RESELLER FULL VIP OFFER *******</option>
					<option value="NULL">                                          </option>					
					<option value="CS_20_Account_Full_Vip_1_Month">*CARDSHARING  FULL VIP - 20 ACCOUNT X 1 MONTH - 160E* (8E/ACCOUNT)*</option>
					<option value="CS_20_Account_Full_Vip_3_Month">*CARDSHARING  FULL VIP - 20 ACCOUNT X 3 MONTH - 360E* (6E/ACCOUNT)*</option>
					<option value="CS_50_Account_Full_Vip_1_Month">*CARDSHARING  FULL VIP - 50 ACCOUNT X 1 MONTH - 300E* (6E/ACCOUNT)</option>
					<option value="CS_50_Account_Full_Vip_3_Month">*CARDSHARING  FULL VIP - 50 ACCOUNT X 3 MONTH - 600E* (4E/ACCOUNT)</option>
					<option value="NULL">                                                </option>
					</select>
					<?php echo "<p class='text-danger'>$errPack </p>";?>
					</div>

					
						<label for="note" class="col-sm-5 control-label" >Additional notes - Note addizionali</label>

							
						<div class="col-sm-5">
							<textarea cols="40" rows="3" name="note" id="note"></textarea>
						</div>
					<div class="col-sm-5" id="devicetxt" style="color:#ff0000">
							<b>In case of IPTV Package write here your device (If MAG device write here your MAC address)</b>
						</div>

<div class="col-sm-5" id="paysafetxt" style="color:#ff0000">
							<b>In case of PaySafeCard paymenth with more of one Pin write here all other Pin (with the amount to be withdrawn from it)</b>
						</div>
	

					 <?php
          				require_once('recaptchalib.php');
          					$publickey = "6LdhjA4TAAAAALCToFKJAgFXb54FkYIGRYR6Kt2Z"; // you got this from the signup page
          					echo recaptcha_get_html($publickey);
        	 			?>
			

					
						<div class="col-sm-5 col-sm-offset-2" style="float: right;">
							<input id="submit"  name="submit" type="submit" value="Validate Payment" class="btn btn-primary">
						</div>
					</div>
					
				</form> 
			</div>
		</div>
	</div>   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>


<script>

       document.getElementById("cline").style.visibility = "hidden";
	document.getElementById("pwdcline").style.visibility = "hidden";
	document.getElementById("pwdclinetxt").style.visibility = "hidden";
	document.getElementById("clinetxt").style.visibility = "hidden";


	document.getElementById("iptv").style.visibility = "hidden";
	document.getElementById("iptvtxt").style.visibility = "hidden";
	document.getElementById("pwdiptv").style.visibility = "hidden";
	document.getElementById("pwdiptvtxt").style.visibility = "hidden";

	document.getElementById("devicetxt").style.visibility = "hidden";
	document.getElementById("paysafetxt").style.visibility = "hidden";

	
</script>

<script>
  function update_status() {
    if (document.getElementById("status").value == "renewal") {
	if(  document.getElementById("pack").value == "IPTV_1_Month" || document.getElementById("pack").value == "IPTV_3_Month"|| document.getElementById("pack").value == "IPTV_6_Month")  {
	       document.getElementById("cline").style.visibility = "hidden";
	document.getElementById("pwdcline").style.visibility = "hidden";
	document.getElementById("pwdclinetxt").style.visibility = "hidden";
	document.getElementById("clinetxt").style.visibility = "hidden";

		document.getElementById("iptv").style.visibility = "visible";
		document.getElementById("iptvtxt").style.visibility = "visible";
	document.getElementById("pwdiptv").style.visibility = "visible";
	document.getElementById("pwdiptvtxt").style.visibility = "visible";

	}
	
	
	else if (document.getElementById("pack").value == "Full_Vip_1_Month_+_IPTV" || document.getElementById("pack").value == "Full_Vip_3_Month_+_IPTV" || document.getElementById("pack").value == "Full_Vip_6_Month_+_IPTV"  ) {
	
	
	 document.getElementById("cline").style.visibility = "visible";
	document.getElementById("pwdcline").style.visibility = "visible";
	document.getElementById("pwdclinetxt").style.visibility = "visible";
	document.getElementById("clinetxt").style.visibility = "visible";


	document.getElementById("iptv").style.visibility = "visible";
	document.getElementById("iptvtxt").style.visibility = "visible";
	document.getElementById("pwdiptv").style.visibility = "visible";
	document.getElementById("pwdiptvtxt").style.visibility = "visible";
    }
	
	 else if (document.getElementById("pack").value != "NULL"  ){
			 document.getElementById("cline").style.visibility = "visible";
			document.getElementById("pwdcline").style.visibility = "visible";
			document.getElementById("pwdclinetxt").style.visibility = "visible";
			document.getElementById("clinetxt").style.visibility = "visible";
	document.getElementById("iptv").style.visibility = "hidden";
	document.getElementById("iptvtxt").style.visibility = "hidden";
	document.getElementById("pwdiptv").style.visibility = "hidden";
	document.getElementById("pwdiptvtxt").style.visibility = "hidden";

	}


    }
    
 else 	{
	 document.getElementById("cline").style.visibility = "hidden";
	document.getElementById("pwdcline").style.visibility = "hidden";
	document.getElementById("pwdclinetxt").style.visibility = "hidden";
	document.getElementById("clinetxt").style.visibility = "hidden";
	document.getElementById("iptv").style.visibility = "hidden";
	document.getElementById("iptvtxt").style.visibility = "hidden";
	document.getElementById("pwdiptv").style.visibility = "hidden";
	document.getElementById("pwdiptvtxt").style.visibility = "hidden";
	}

  }

</script>


<script>
  function update_status_pack() {
    if (document.getElementById("pack").value == "Full_Vip_1_Month_+_IPTV" || document.getElementById("pack").value == "Full_Vip_3_Month_+_IPTV" || document.getElementById("pack").value == "Full_Vip_6_Month_+_IPTV" || document.getElementById("pack").value == "IPTV_1_Month" || document.getElementById("pack").value == "IPTV_3_Month"|| document.getElementById("pack").value == "IPTV_6_Month" ) {
	
	
	document.getElementById("devicetxt").style.visibility = "visible";
    }
    else {
 
	document.getElementById("devicetxt").style.visibility = "hidden";
    }

if (document.getElementById("status").value == "renewal") {
if (document.getElementById("pack").value == "Full_Vip_1_Month_+_IPTV" || document.getElementById("pack").value == "Full_Vip_3_Month_+_IPTV" || document.getElementById("pack").value == "Full_Vip_6_Month_+_IPTV"  ) {
	
	
		 document.getElementById("cline").style.visibility = "visible";
	document.getElementById("pwdcline").style.visibility = "visible";
	document.getElementById("pwdclinetxt").style.visibility = "visible";
	document.getElementById("clinetxt").style.visibility = "visible";


	document.getElementById("iptv").style.visibility = "visible";
	document.getElementById("iptvtxt").style.visibility = "visible";
	document.getElementById("pwdiptv").style.visibility = "visible";
	document.getElementById("pwdiptvtxt").style.visibility = "visible";
    }
  
 	
else if(  document.getElementById("pack").value == "IPTV_1_Month" || document.getElementById("pack").value == "IPTV_3_Month"|| document.getElementById("pack").value == "IPTV_6_Month")  {
			       document.getElementById("cline").style.visibility = "hidden";
	document.getElementById("pwdcline").style.visibility = "hidden";
	document.getElementById("pwdclinetxt").style.visibility = "hidden";
	document.getElementById("clinetxt").style.visibility = "hidden";

		document.getElementById("iptv").style.visibility = "visible";
		document.getElementById("iptvtxt").style.visibility = "visible";
	document.getElementById("pwdiptv").style.visibility = "visible";
	document.getElementById("pwdiptvtxt").style.visibility = "visible";

	}

 else {
		 document.getElementById("cline").style.visibility = "visible";
			document.getElementById("pwdcline").style.visibility = "visible";
			document.getElementById("pwdclinetxt").style.visibility = "visible";
			document.getElementById("clinetxt").style.visibility = "visible";
	document.getElementById("iptv").style.visibility = "hidden";
	document.getElementById("iptvtxt").style.visibility = "hidden";
	document.getElementById("pwdiptv").style.visibility = "hidden";
	document.getElementById("pwdiptvtxt").style.visibility = "hidden";

	}


}


  }

</script>


<script>
  function update_status_pay() {
    if (document.getElementById("pay_met").value == "PaySafeCard"  ) {
	

	document.getElementById("paysafetxt").style.visibility = "visible";
    }
    else {
 
	document.getElementById("paysafetxt").style.visibility = "hidden";
    }
  }

</script>


<script type="text/javascript">
    function confirmEmail() {
        var email = document.getElementById("email").value
        var confemail = document.getElementById("confemail").value
        if(email != confemail) {
            alert('Email Not Matching!');
		document.getElementById("submit").style.visibility = "hidden";
        }
	else 
		document.getElementById("submit").style.visibility = "visible";
    }
</script>


  </body>





</html>


