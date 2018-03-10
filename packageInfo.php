<?php
/**
 * Created by PhpStorm.
 * User: francesco
 * Date: 06/02/17
 * Time: 21:05
 */


function packageInfo($pack)
{

//    ini_set('display_startup_errors', 1);
//    ini_set('display_errors', 1);
//    error_reporting(-1);
    $tasso_bitcoins = '0,00025';
    $tasso_bitcoins = file_get_contents('https://blockchain.info/tobtc?currency=EUR&value=1');
    $tasso_bitcoins = bcdiv($tasso_bitcoins, '1.7', 6);
    //CoinApi set Params
//    $requestCryptoValue = new HttpRequest();
//    $requestCryptoValue->setUrl('https://rest.coinapi.io/v1/exchangerate/EUR/USD');
//    $requestCryptoValue->setMethod(HTTP_METH_GET);
//    $requestCryptoValue->setHeaders(array(
//        'X-CoinAPI-Key' => '83A2CD84-78AE-43EA-95C1-DC31FD3DF478'
//    ));
//    $requestCryptoValue = $requestCryptoValue->send();
//    echo $requestCryptoValue->getBody();

    if ($pack == "Promo_CS_1_Year") {
        $price = "20.00E";
        $link_c2 = "http://goo.gl/j6Hxc3";
        $link_payza = "https://secure.payza.com/checkout?AjE9eXRpdG5hdXFfcGEmPT1RWUkyTGdGK2xnUU9xRW1CL2J6ZFU1PWRpdGN1ZG9ycF9wYQI=";
        $link_paypal = "https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=MEVG5PCLYWQS2";
        $link_paypal_it = "https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=KV6ZP69NCBYTY";
        $link_credit_card = "goo.gl/SibXVj";
        $coins_conv = (int)$price * (float)$tasso_bitcoins;
        $coins_conv2 = "http://www.computersebooks.org/prodotto/1-gift-card-10e/";
        $pay_safe_card_price_en = "25 Euro Pin. NOTE: Different amount Pins will be rejected!";
        $pay_safe_card_price_it = "25 Euro Pin. NOTA: Pin di diversi importi saranno rifiutati!";
        $cryptocurrency = "https://www.coinpayments.net/index.php?cmd=_pay&reset=1&merchant=1e91d4ce23f865ab4d4e6b8ff516de28&item_name=server020&currency=EUR&amountf=20.00000000&quantity=1&allow_quantity=0&want_shipping=0&allow_extra=1&";

    }

    if ($pack == "Full_Vip_1_Month") {
        $price = "12.00E";
        $link_c2 = "http://goo.gl/j6Hxc3";
        $link_payza = "https://secure.payza.com/checkout?AjE9eXRpdG5hdXFfcGEmPT1RWUkyTGdGK2xnUU9xRW1CL2J6ZFU1PWRpdGN1ZG9ycF9wYQI=";
        $link_paypal = "https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=MEVG5PCLYWQS2";
        $link_paypal_it = "https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=KV6ZP69NCBYTY";
        $link_credit_card = "goo.gl/f5u32w";
        $coins_conv = (int)$price * (float)$tasso_bitcoins;
        $coins_conv2 = "http://www.computersebooks.org/prodotto/1-gift-card-10e/";
        $pay_safe_card_price_en = "20 Euro Pin. NOTE: Different amount Pins will be rejected!.  You'll have 2 Months of service";
        $pay_safe_card_price_it = "20 Euro Pin. NOTA: Pin di diversi importi saranno rifiutati!. Avrai 2 Mesi di servizio";
        $cryptocurrency = "https://www.coinpayments.net/index.php?cmd=_pay&reset=1&merchant=1e91d4ce23f865ab4d4e6b8ff516de28&item_name=server012&currency=EUR&amountf=12.00000000&quantity=1&allow_quantity=0&want_shipping=0&allow_extra=1&";

    }


    if ($pack == "Full_Vip_1_Month_+_IPTV") {
        $price = "20.00E";
        $link_c2 = "http://goo.gl/j6Hxc3";
        $link_payza = "https://secure.payza.com/checkout?AjE9eXRpdG5hdXFfcGEmPT1RWUkyTGdGK2xnUU9xRW1CL2J6ZFU1PWRpdGN1ZG9ycF9wYQI=";
        $link_paypal = "https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=MEVG5PCLYWQS2";
        $link_paypal_it = "https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=KV6ZP69NCBYTY";
        $link_credit_card = "goo.gl/SibXVj";
        $coins_conv = (int)$price * (float)$tasso_bitcoins;
        $coins_conv2 = "http://www.computersebooks.org/prodotto/1-gift-card-10e/";
        $pay_safe_card_price_en = "25 Euro Pin. NOTE: Different amount Pins will be rejected!";
        $pay_safe_card_price_it = "25 Euro Pin. NOTA: Pin di diversi importi saranno rifiutati!";
        $cryptocurrency = "https://www.coinpayments.net/index.php?cmd=_pay&reset=1&merchant=1e91d4ce23f865ab4d4e6b8ff516de28&item_name=server020&currency=EUR&amountf=20.00000000&quantity=1&allow_quantity=0&want_shipping=0&allow_extra=1&";


    }

    if ($pack == "Full_Vip_3_Month") {
        $price = "30.00E";
        $link_c2 = "http://goo.gl/OcSg5V";
        $link_payza = "https://secure.payza.com/checkout?ATA8eHNoc21gdHBeb2AlPDxQLlBLTXhXcDBSaDhyMUx2dG01dFZWPGNoc2J0Y25xb15vYAI=";
        $link_paypal = "https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=7D8CHGNH6Y2DN";
        $link_paypal_it = "https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=MH5ET3B4TXRP6";
        $link_credit_card = "goo.gl/xfCvK1";
        $coins_conv = (int)$price * (float)$tasso_bitcoins;
        $pay_safe_card_price_en = "35 Euro Pin (25+10). NOTE: Different amount Pins will be rejected!";
        $pay_safe_card_price_it = "35 Euro Pin (25+10). NOTA: Pin di diversi importi saranno rifiutati!";
        $cryptocurrency = "https://www.coinpayments.net/index.php?cmd=_pay&reset=1&merchant=1e91d4ce23f865ab4d4e6b8ff516de28&item_name=server030&currency=EUR&amountf=30.00000000&quantity=1&allow_quantity=0&want_shipping=0&allow_extra=1&";

    }

    if ($pack == "Full_Vip_3_Month_+_IPTV") {
        $price = "55.00E";
        $link_c2 = "http://goo.gl/OcSg5V";
        $link_payza = "https://secure.payza.com/checkout?ATA8eHNoc21gdHBeb2AlPDxQLlBLTXhXcDBSaDhyMUx2dG01dFZWPGNoc2J0Y25xb15vYAI=";
        $link_paypal = "https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=7D8CHGNH6Y2DN";
        $link_paypal_it = "https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=MH5ET3B4TXRP6";
        $link_credit_card = "goo.gl/pfb9xD";
        $coins_conv = (int)$price * (float)$tasso_bitcoins;
        $pay_safe_card_price_en = "55 Euro Pin (25+10+10+10). NOTE: Different amount Pins will be rejected!";
        $pay_safe_card_price_it = "55 Euro Pin (25+10+10+10). NOTA: Pin di diversi importi saranno rifiutati!";
        $cryptocurrency = "https://www.coinpayments.net/index.php?cmd=_pay&reset=1&merchant=1e91d4ce23f865ab4d4e6b8ff516de28&item_name=server055&currency=EUR&amountf=55.00000000&quantity=1&allow_quantity=0&want_shipping=0&allow_extra=1&";

    }


    if ($pack == "Full_Vip_6_Month") {
        $price = "55.00E";
        $link_c2 = "http://goo.gl/mSblNQ";
        $link_payza = "https://secure.payza.com/checkout?BjRAfHdsd3FkeHRic2QpQEBEdEZnUlVGNm1GWjc5emcydTUzXTNoQGdsd2Z4Z3J1c2JzZAM=";
        $link_paypal = "https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=Y7A4DDRN3V7PJ";
        $link_paypal_it = "https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=3949GT2HZRPNG";
        $link_credit_card = "goo.gl/pfb9xD";
        $coins_conv = (int)$price * (float)$tasso_bitcoins;
        $pay_safe_card_price_en = "55 Euro Pin (25+10+10+10). NOTE: Different amount Pins will be rejected!";
        $pay_safe_card_price_it = "55 Euro Pin (25+10+10+10). NOTA: Pin di diversi importi saranno rifiutati!";
        $cryptocurrency = "https://www.coinpayments.net/index.php?cmd=_pay&reset=1&merchant=1e91d4ce23f865ab4d4e6b8ff516de28&item_name=server055&currency=EUR&amountf=55.00000000&quantity=1&allow_quantity=0&want_shipping=0&allow_extra=1&";

    }

    if ($pack == "Full_Vip_6_Month_+_IPTV") {
        $price = "100.00E";
        $link_c2 = "http://goo.gl/mSblNQ";
        $link_payza = "https://secure.payza.com/checkout?BjRAfHdsd3FkeHRic2QpQEBEdEZnUlVGNm1GWjc5emcydTUzXTNoQGdsd2Z4Z3J1c2JzZAM=";
        $link_paypal = "https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=Y7A4DDRN3V7PJ";
        $link_paypal_it = "https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=3949GT2HZRPNG";
        $link_credit_card = "goo.gl/DV6LBA";
        $coins_conv = (int)$price * (float)$tasso_bitcoins;
        $pay_safe_card_price_en = "120 Euro Pin (100+10+10). NOTE: Different amount Pins will be rejected!";
        $pay_safe_card_price_it = "120 Euro Pin (100+10+10). NOTA: Pin di diversi importi saranno rifiutati!";
        $cryptocurrency = "https://www.coinpayments.net/index.php?cmd=_pay&reset=1&merchant=1e91d4ce23f865ab4d4e6b8ff516de28&item_name=server100&currency=EUR&amountf=100.00000000&quantity=1&allow_quantity=0&want_shipping=0&allow_extra=1&";

    }


    if ($pack == "Mediaset_Premium_1_Month" || $pack == "CSPAIN_Full_1_Month" || $pack == "Sky_UK_Full_1_Month" || $pack == "Sky_DE_Full_1_Month" || $pack == "Adult_1_Month" || $pack == "CSAT_Full_1_Month" || $pack == "CDIGITAAL_Full_1_Month") {
        $price = "4.00E";
        $link_c2 = "goo.gl/HZoIhe";
        $link_payza = "https://secure.payza.com/checkout?BzRAfHdsd3FkeHRic2QpQEBEPFluSn13czxEdmlMMzpOSzhPSURNQGdsd2Z4Z3J1c2JzZAQ=";
        $link_paypal = "https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=8M2J67BYP7W8U";
        $link_paypal_it = "https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=7LN6D4F4FPC4U";
        $link_credit_card = "goo.gl/ZqkebD";
        $coins_conv = (int)$price * (float)$tasso_bitcoins;
        $pay_safe_card_price_en = "10 Euro Pin. NOTE: Different amount Pins will be rejected!. You'll have 3 Months of service";
        $pay_safe_card_price_it = "10 Euro Pin. NOTA: Pin di diversi importi saranno rifiutati!. Avrai 3 Mesi di servizio";
        $cryptocurrency = "https://www.coinpayments.net/index.php?cmd=_pay&reset=1&merchant=1e91d4ce23f865ab4d4e6b8ff516de28&item_name=server004&currency=EUR&amountf=4.00000000&quantity=1&allow_quantity=0&want_shipping=0&allow_extra=1&";

    }


    if ($pack == "Mediaset_Premium_3_Month" || $pack == "CSPAIN_Full_3_Month" || $pack == "Sky_UK_Full_3_Month" || $pack == "Sky_DE_Full_3_Month" || $pack == "Adult_3_Month" || $pack == "CSAT_Full_3_Month" || $pack == "CDIGITAAL_Full_3_Month") {
        $price = "10.00E";
        $link_c2 = "http://goo.gl/CjkJiS";
        $link_payza = "https://secure.payza.com/checkout?BDM/e3ZrdnBjd3NhcmMoPz9TNDJxZHVmSzZEbThXO3pzaDhsUFdLP2ZrdmV3ZnF0cmFyYwI=";
        $link_paypal = "https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=DEK9RQ5DNCQRY";
        $link_paypal_it = "https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=7HVF8WGQQWSA2";
        $link_credit_card = "goo.gl/JCv0b8";
        $coins_conv = (int)$price * (float)$tasso_bitcoins;
        $pay_safe_card_price_en = "25 Euro Pin. NOTE: Different amount Pins will be rejected!. You'll have 2 Months of service";
        $pay_safe_card_price_it = "25 Euro Pin. NOTA: Pin di diversi importi saranno rifiutati!. Avrai 2 Mesi di servizio";
        $cryptocurrency = "https://www.coinpayments.net/index.php?cmd=_pay&reset=1&merchant=1e91d4ce23f865ab4d4e6b8ff516de28&item_name=server010&currency=EUR&amountf=10.00000000&quantity=1&allow_quantity=0&want_shipping=0&allow_extra=1&";


    }

    if ($pack == "Mediaset_Premium_6_Month" || $pack == "CSPAIN_Full_6_Month" || $pack == "Sky_UK_Full_6_Month" || $pack == "Sky_DE_Full_6_Month" || $pack == "Adult_6_Month" || $pack == "CSAT_Full_6_Month" || $pack == "CDIGITAAL_Full_6_Month") {
        $price = "20.00E";
        $link_c2 = "http://goo.gl/j6Hxc3";
        $link_payza = "https://secure.payza.com/checkout?AjE9eXRpdG5hdXFfcGEmPT1RWUkyTGdGK2xnUU9xRW1CL2J6ZFU1PWRpdGN1ZG9ycF9wYQI=";
        $link_paypal = "https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=MEVG5PCLYWQS2";
        $link_paypal_it = "https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=KV6ZP69NCBYTY";
        $link_credit_card = "goo.gl/SibXVj";
        $coins_conv = (int)$price * (float)$tasso_bitcoins;
        $coins_conv2 = "http://www.computersebooks.org/prodotto/1-gift-card-10e/";
        $pay_safe_card_price_en = "25 Euro Pin. NOTE: Different amount Pins will be rejected!";
        $pay_safe_card_price_it = "25 Euro Pin. NOTA: Pin di diversi importi saranno rifiutati!";
        $cryptocurrency = "https://www.coinpayments.net/index.php?cmd=_pay&reset=1&merchant=1e91d4ce23f865ab4d4e6b8ff516de28&item_name=server020&currency=EUR&amountf=20.00000000&quantity=1&allow_quantity=0&want_shipping=0&allow_extra=1&";


    }

    if ($pack == "Mediaset_Premium_12_Month" || $pack == "CSPAIN_Full_12_Month" || $pack == "Sky_UK_Full_12_Month" || $pack == "Sky_DE_Full_12_Month" || $pack == "Adult_12_Month" || $pack == "CSAT_Full_12_Month" || $pack == "CDIGITAAL_Full_12_Month") {
        $price = "40.00E";
        $link_c2 = "http://goo.gl/uvFVGQ";
        $link_payza = "https://secure.payza.com/checkout?CjhE4oKse3B7dWh8eGZ3aC1ERH5rUUk5aVY6PndUXD5eV1k6Nm13VFNEa3B7anxrdnl3ZndoAw==";
        $link_paypal = "https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=F2B9USZDWR678";
        $link_paypal_it = "https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=9Y9ZGU76YX6HE";
        $link_credit_card = "http://goo.gl/EML6hJ";
        $coins_conv = (int)$price * (float)$tasso_bitcoins;
        $pay_safe_card_price_en = "50 Euro Pin (25+50). NOTE: Different amount Pins will be rejected!.";
        $pay_safe_card_price_it = "50 Euro Pin (25+50). NOTA: Pin di diversi importi saranno rifiutati!.";
        $cryptocurrency = "https://www.coinpayments.net/index.php?cmd=_pay&reset=1&merchant=1e91d4ce23f865ab4d4e6b8ff516de28&item_name=server040&currency=EUR&amountf=40.00000000&quantity=1&allow_quantity=0&want_shipping=0&allow_extra=1&";


    }


    if ($pack == "SRG_1_Month" || $pack == "Tivusat_1_Month" || $pack == "MaxTv_1_Month" || $pack == "NC+_1_Month" || $pack == "ORF_1_Month" || $pack == "Polsat_1_Month") {
        $price = "2.00E";
        $link_c2 = "goo.gl/rRudFU";
        $link_payza = "https://secure.payza.com/checkout?BTVBfXhteHJleXVjdGUqQUFVVmx8aHlMS3VXcHlIWVVoXXxxaGltQWhteGd5aHN2dGN0ZQE=";
        $link_paypal = "https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=VAMRN7LM5X9FA";
        $link_paypal_it = "https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=AEN52XVGK93KU";
        $link_credit_card = "goo.gl/Jq3D4R";
        $coins_conv = (int)$price * (float)$tasso_bitcoins;
        $pay_safe_card_price_en = "10 Euro Pin. NOTE: Different amount Pins will be rejected!. You'll have 6 Months of service";
        $pay_safe_card_price_it = "10 Euro Pin. NOTA: Pin di diversi importi saranno rifiutati!. Avrai 6 Mesi di servizio";
        $cryptocurrency = "https://www.coinpayments.net/index.php?cmd=_pay&reset=1&merchant=1e91d4ce23f865ab4d4e6b8ff516de28&item_name=server002&currency=EUR&amountf=2.00000000&quantity=1&allow_quantity=0&want_shipping=0&allow_extra=1&";


    }

    if ($pack == "SRG_12_Month" || $pack == "Tivusat_12_Month" || $pack == "MaxTv_12_Month" || $pack == "NC+_12_Month" || $pack == "ORF_12_Month" || $pack == "Polsat_12_Month") {
        $price = "20.00E";
        $link_c2 = "http://goo.gl/j6Hxc3";
        $link_payza = "https://secure.payza.com/checkout?AjE9eXRpdG5hdXFfcGEmPT1RWUkyTGdGK2xnUU9xRW1CL2J6ZFU1PWRpdGN1ZG9ycF9wYQI=";
        $link_paypal = "https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=MEVG5PCLYWQS2";
        $link_paypal_it = "https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=KV6ZP69NCBYTY";
        $link_credit_card = "goo.gl/SibXVj";
        $coins_conv = (int)$price * (float)$tasso_bitcoins;
        $coins_conv2 = "http://www.computersebooks.org/prodotto/1-gift-card-10e/";
        $pay_safe_card_price_en = "25 Euro Pin. NOTE: Different amount Pins will be rejected!";
        $pay_safe_card_price_it = "25 Euro Pin. NOTA: Pin di diversi importi saranno rifiutati!";
        $cryptocurrency = "https://www.coinpayments.net/index.php?cmd=_pay&reset=1&merchant=1e91d4ce23f865ab4d4e6b8ff516de28&item_name=server020&currency=EUR&amountf=20.00000000&quantity=1&allow_quantity=0&want_shipping=0&allow_extra=1&";



    }

    if ($pack == "IPTV_1_Month") {
        $price = "12.00E";
        $link_c2 = "http://goo.gl/o4O6CO";
        $link_payza = "https://secure.payza.com/checkout?BDRAfHdsd3FkeHRic2QpQEBEZzVlSzVIaVYyfUdGNFc8dlVIWmR6QGdsd2Z4Z3J1c2JzZAE=";
        $link_paypal = "https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=66WW53CZG7D6J";
        $link_paypal_it = "https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=EGMCAK5G66NR8";
        $link_credit_card = "goo.gl/o4O6CO";
        $coins_conv = (int)$price * (float)$tasso_bitcoins;
        $pay_safe_card_price_en = "25 Euro Pin. NOTE: Different amount Pins will be rejected!. You'll have 2 Months of service";
        $pay_safe_card_price_it = "25 Euro Pin. NOTA: Pin di diversi importi saranno rifiutati!. Avrai 2 Mesi di servizio";
        $cryptocurrency = "https://www.coinpayments.net/index.php?cmd=_pay&reset=1&merchant=1e91d4ce23f865ab4d4e6b8ff516de28&item_name=server012&currency=EUR&amountf=12.00000000&quantity=1&allow_quantity=0&want_shipping=0&allow_extra=1&";

    }


    if ($pack == "IPTV_3_Month") {
        $price = "35.00E";
        $link_c2 = "http://goo.gl/XDSzzA";
        $link_payza = "https://secure.payza.com/checkout?BDRAfHdsd3FkeHRic2QpQEBEZzVlSzVIaVYyfUdGNFc8dlVIWmR6QGdsd2Z4Z3J1c2JzZAE=";
        $link_paypal = "https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=66WW53CZG7D6J";
        $link_paypal_it = "https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=EGMCAK5G66NR8";
        $link_credit_card = "goo.gl/XDSzzA";
        $coins_conv = (int)$price * (float)$tasso_bitcoins;
        $pay_safe_card_price_en = "35 Euro Pin (25+10). NOTE: Different amount Pins will be rejected!.";
        $pay_safe_card_price_it = "35 Euro Pin (25+10). NOTA: Pin di diversi importi saranno rifiutati!.";
        $cryptocurrency = "https://www.coinpayments.net/index.php?cmd=_pay&reset=1&merchant=1e91d4ce23f865ab4d4e6b8ff516de28&item_name=server035&currency=EUR&amountf=35.00000000&quantity=1&allow_quantity=0&want_shipping=0&allow_extra=1&";

    }

    if ($pack == "IPTV_6_Month") {
        $price = "70.00E";
        $link_c2 = "http://goo.gl/4Eqjkm";
        $link_payza = "https://secure.payza.com/checkout?BDRAfHdsd3FkeHRic2QpQEBEZzVlSzVIaVYyfUdGNFc8dlVIWmR6QGdsd2Z4Z3J1c2JzZAE=";
        $link_paypal = "https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=66WW53CZG7D6J";
        $link_paypal_it = "https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=EGMCAK5G66NR8";
        $link_credit_card = "goo.gl/4Eqjkm";
        $coins_conv = (int)$price * (float)$tasso_bitcoins;
        $pay_safe_card_price_en = "75 Euro Pin (25+50). NOTE: Different amount Pins will be rejected!.";
        $pay_safe_card_price_it = "75 Euro Pin (25+50). NOTA: Pin di diversi importi saranno rifiutati!.";
        $cryptocurrency = "https://www.coinpayments.net/index.php?cmd=_pay&reset=1&merchant=1e91d4ce23f865ab4d4e6b8ff516de28&item_name=server070&currency=EUR&amountf=70.00000000&quantity=1&allow_quantity=0&want_shipping=0&allow_extra=1&";

    }


    if ($pack == "Combo_Full_Vip_1_Month") {
        $price = "40.00E";
        $link_credit_card = "goo.gl/EML6hJ";
        $coins_conv = (int)$price * (float)$tasso_bitcoins;
        $pay_safe_card_price_en = "50 Euro Pin. NOTE: Different amount Pins will be rejected!.";
        $pay_safe_card_price_it = "50 Euro Pin. NOTA: Pin di diversi importi saranno rifiutati!.";
        $cryptocurrency = "https://www.coinpayments.net/index.php?cmd=_pay&reset=1&merchant=1e91d4ce23f865ab4d4e6b8ff516de28&item_name=server040&currency=EUR&amountf=40.00000000&quantity=1&allow_quantity=0&want_shipping=0&allow_extra=1&";

    }

    if ($pack == "Combo_Full_Vip_3_Month") {
        $price = "100.00E";
        $link_credit_card = "goo.gl/DV6LBA";
        $coins_conv = (int)$price * (float)$tasso_bitcoins;
        $pay_safe_card_price_en = "120 Euro Pin (100+10+10). NOTE: Different amount Pins will be rejected!.";
        $pay_safe_card_price_it = "120 Euro Pin (100+10+10). NOTA: Pin di diversi importi saranno rifiutati!.";
        $cryptocurrency = "https://www.coinpayments.net/index.php?cmd=_pay&reset=1&merchant=1e91d4ce23f865ab4d4e6b8ff516de28&item_name=server100&currency=EUR&amountf=100.00000000&quantity=1&allow_quantity=0&want_shipping=0&allow_extra=1&";

    }

    if ($pack == "Combo_Full_Vip_6_Month") {
        $price = "200.00E";
        $link_credit_card = "goo.gl/fZFPY2";
        $coins_conv = (int)$price * (float)$tasso_bitcoins;
        $pay_safe_card_price_en = "240.00E (200E+20%tax): Buy PIN 240E (100+100+10+10+10+10)-> You'll have 180 Days of service";
        $pay_safe_card_price_it = "240.00E (200E+20%tasse): Acquista il PIN da 240E (100+100+10+10+10+10) -> Avrai 180 Giorni di servizio";
        $cryptocurrency = "https://www.coinpayments.net/index.php?cmd=_pay&reset=1&merchant=1e91d4ce23f865ab4d4e6b8ff516de28&item_name=server200&currency=EUR&amountf=200.00000000&quantity=1&allow_quantity=0&want_shipping=0&allow_extra=1&";

    }


    if ($pack == "Combo_SkyDe_SkyUk_1_Month" || $pack == "Combo_Canal+Spain_Sky_Uk_1_Month") {
        $price = "8.00E";
        $link_c2 = "http://goo.gl/9BQcLZ";
        $link_payza = "https://secure.payza.com/checkout?BDRAfHdsd3FkeHRic2QpQEBEZzVlSzVIaVYyfUdGNFc8dlVIWmR6QGdsd2Z4Z3J1c2JzZAE=";
        $link_paypal = "https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=66WW53CZG7D6J";
        $link_paypal_it = "https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=EGMCAK5G66NR8";
        $link_credit_card = "goo.gl/PHqYAx";
        $coins_conv = (int)$price * (float)$tasso_bitcoins;
        $pay_safe_card_price_en = "9.60E (8E+20%tax): Buy PIN 10E -> You'll have 30 Days of service";
        $pay_safe_card_price_it = "9.60E (8E+20%tasse): Acquista il PIN da 10E -> Avrai 30 Giorni di servizio";
        $cryptocurrency = "https://www.coinpayments.net/index.php?cmd=_pay&reset=1&merchant=1e91d4ce23f865ab4d4e6b8ff516de28&item_name=server008&currency=EUR&amountf=8.00000000&quantity=1&allow_quantity=0&want_shipping=0&allow_extra=1&";

    }

    if ($pack == "Combo_SkyDe_SkyUk_3_Month" || $pack == "Combo_Canal+Spain_Sky_Uk_3_Month") {
        $price = "20.00E";
        $link_c2 = "http://goo.gl/j6Hxc3";
        $link_payza = "https://secure.payza.com/checkout?AjE9eXRpdG5hdXFfcGEmPT1RWUkyTGdGK2xnUU9xRW1CL2J6ZFU1PWRpdGN1ZG9ycF9wYQI=";
        $link_paypal = "https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=MEVG5PCLYWQS2";
        $link_paypal_it = "https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=KV6ZP69NCBYTY";
        $link_credit_card = "goo.gl/SibXVj";
        $coins_conv = (int)$price * (float)$tasso_bitcoins;
        $coins_conv2 = "http://www.computersebooks.org/prodotto/1-gift-card-10e/";
        $pay_safe_card_price_en = "24E (20E+20%tax): Buy PIN 25E -> You'll have 33 Days of service";
        $pay_safe_card_price_it = "24E (20E+20%tasse): Acquista il PIN da 25E -> Avrai 33 Giorni di servizio";
        $cryptocurrency = "https://www.coinpayments.net/index.php?cmd=_pay&reset=1&merchant=1e91d4ce23f865ab4d4e6b8ff516de28&item_name=server020&currency=EUR&amountf=20.00000000&quantity=1&allow_quantity=0&want_shipping=0&allow_extra=1&";

    }

    if ($pack == "Combo_SkyDe_SkyUk_6_Month" || $pack == "Combo_Canal+Spain_Sky_Uk_6_Month") {
        $price = "40.00E";
        $link_c2 = "http://goo.gl/uvFVGQ";
        $link_payza = "https://secure.payza.com/checkout?BDRAfHdsd3FkeHRic2QpQEBEZzVlSzVIaVYyfUdGNFc8dlVIWmR6QGdsd2Z4Z3J1c2JzZAE=";
        $link_paypal = "https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=66WW53CZG7D6J";
        $link_paypal_it = "https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=EGMCAK5G66NR8";
        $link_credit_card = "goo.gl/EML6hJ";
        $coins_conv = (int)$price * (float)$tasso_bitcoins;
        $pay_safe_card_price_en = "48E (40E+20%tax): Buy PIN 50E -> You'll have 185 Days of service";
        $pay_safe_card_price_it = "48E (40E+20%tasse): Acquista il PIN da 50E -> Avrai 185 Giorni di servizio";
        $cryptocurrency = "https://www.coinpayments.net/index.php?cmd=_pay&reset=1&merchant=1e91d4ce23f865ab4d4e6b8ff516de28&item_name=server040&currency=EUR&amountf=40.00000000&quantity=1&allow_quantity=0&want_shipping=0&allow_extra=1&";

    }


    if ($pack == "Combo_Tivusat_Mediaset_1_Month") {
        $price = "5.00E";
        $link_c2 = "http://goo.gl/hQm4EI";
        $link_payza = "https://secure.payza.com/checkout?BDM/e3ZrdnBjd3NhcmMoPz9DUkhnZzdrNG85VjdcSEo7bzlQMUpRP2ZrdmV3ZnF0cmFyYwI=";
        $link_paypal = "https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=2HNDPB7HWAKKY";
        $link_paypal_it = "https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=QMD2ZJCVVGENJ";
        $link_credit_card = "goo.gl/OXAAVJ";
        $coins_conv = (int)$price * (float)$tasso_bitcoins;
        $pay_safe_card_price_en = "6E (5E+20%tax): Buy PIN 10E -> You'll have 60 Days of service";
        $pay_safe_card_price_it = "6E (5E+20%tasse): Acquista il PIN da 10E -> Avrai 60 Giorni di servizio";
        $cryptocurrency = "https://www.coinpayments.net/index.php?cmd=_pay&reset=1&merchant=1e91d4ce23f865ab4d4e6b8ff516de28&item_name=server005&currency=EUR&amountf=5.00000000&quantity=1&allow_quantity=0&want_shipping=0&allow_extra=1&";

    }

    if ($pack == "Combo_Tivusat_Mediaset_12_Month" || $pack == "Combo_Tivusat_Mediaset_MaxTv_12_Month") {
        $price = "50.00E";
        $link_c2 = "http://goo.gl/mnstUo";
        $link_payza = "https://secure.payza.com/checkout?BDE9eXRpdG5hdXFfcGEmPT1BU0J1M1pVYUZ0VjdYc1RmbmJkRjdLPWRpdGN1ZG9ycF9wYQQ=";
        $link_paypal = "https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=ZGBCNV8563656";
        $link_paypal_it = "https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=NHUPLWYBRTF8G";
        $link_credit_card = "goo.gl/ki7aMO";
        $coins_conv = (int)$price * (float)$tasso_bitcoins;
        $pay_safe_card_price_en = "60E (50E+20%tax): Buy PIN 60E (50+10) -> You'll have 365 Days of service";
        $pay_safe_card_price_it = "60E (50E+20%tasse): Acquista il PIN da 60E (50+10) -> Avrai 365 Giorni di servizio";
        $cryptocurrency = "https://www.coinpayments.net/index.php?cmd=_pay&reset=1&merchant=1e91d4ce23f865ab4d4e6b8ff516de28&item_name=server050&currency=EUR&amountf=50.00000000&quantity=1&allow_quantity=0&want_shipping=0&allow_extra=1&";

    }

    return array($price, $coins_conv,$link_credit_card,$pay_safe_card_price_en,$pay_safe_card_price_it,$cryptocurrency);
}
?>