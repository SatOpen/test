<?php
/**
 * Created by PhpStorm.
 * User: francesco
 * Date: 06/02/17
 * Time: 21:11
 */


function generateEmailValidate($email,$status,$country, $pack, $paySystem, $price, $coinsPrice,$paysafecardEn, $paysafecardIt, $codeId,$usernameIptv,$passwordIptv,$usernameCs,$passwordCs,$note,$ip_addr)
{
    /*Global Variable*/
    $headers = "From: satopenvalidate@gmail.com\r\n";
    $headers .= "Reply-To: satopenvalidate@gmail.com\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

    if ($country === "IT")
        $successMessage = '<br><b>Validazione inviata correttamente. Attendi 48 ore per la riattivazione.<br>Non inviare altre email prima di 48 ore.<br>Se hai problemi contatta: satopen1@gmail.com</b>';
    else
        $successMessage = '<br><b>Validation correctly send. Please wait 48 hours for reactivate.<br>Don\'t send other email before 48h time.<br>If you have problems, please contact: satopen1@gmail.com</b>';

    /* Email Object */
    if ($status === "renewal") {
            $emailObject = "Renewal Account - Validate";
            $renewalMessage = "<b>CardSharing Username:</b> $usernameCs <b>Password:</b> $passwordCs<br>
                               <b>Iptv Username:</b> $usernameIptv <b>Password:</b> $passwordIptv<br>";
        }
    else {
            $emailObject = "New Account - Validate";
            $renewalMessage = '';
        }
    /* Email Body */
    
    $bodyEmail = "
            <b>Pm:</b>  $paySystem<br>
            Validate payment<br>
            $renewalMessage
            <b>Email:</b> $email<br>
            <b>ID Code:</b> $codeId<br>
            <b>Package:</b> $pack<br>
            <b>Price:</b> $price $coinsPrice<br>$paysafecardEn<br>
            <b>Note:</b> $note<br>
            <br>$ip_addr<br>
            <br><b>Validation correctly send. Please wait 48 hours for Activation.<br>Don't send other email before 48h time.</b><br>";

    return array($bodyEmail, $emailObject,$headers,$successMessage);
}

?>