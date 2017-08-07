<?php
/**
 * Created by PhpStorm.
 * User: francesco
 * Date: 06/02/17
 * Time: 22:10
 */

function errorMessage($status,$email,$pack,$cline)
{
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errEmail = '<div class="alert alert-warning">Failed! Insert correct email address!</div>';
    }

    if (empty($pack) || $pack==='NULL') {
        $errPack = '<div class="alert alert-warning">Failed! Insert pack!</div>';
    }

    if ($status === "renewal") {
        if (empty($cline) || $cline=="") {
            $errCline = '<div class="alert alert-warning">Failed! Insert account to renewal or choose New Account!</div>';
        }
    }

    return array($errPack,$errEmail,$errCline);
}


function errorMessageValidate($status, $email,$email2,$pack,$typeAccount,$usernameIptv,$passwordIptv,$usernameCs,$passwordCs,$codeId)
{


    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errEmail = '<div class="alert alert-warning">Failed! Insert correct email address!</div>';
    }

    if (strcmp($email, $email2) !== 0) {
        $errEmail = '<div class="alert alert-warning">Failed! Wrong Email Confirmation!</div>';
    }

    if (empty($pack) || $pack==='NULL') {
        $errPack = '<div class="alert alert-warning">Failed! Insert pack!</div>';
    }

    if ($status === "renewal") {
        if ($typeAccount === "cs")
            if (empty($usernameCs) || empty($passwordCs) || $usernameCs=="" || $passwordCs=="") {
                $errCline = '<div class="alert alert-warning">Failed! Insert CARDSHARING account to renewal or choose New Account!</div>';
            }
        if ($typeAccount === "iptv")
            if (empty($usernameIptv) || empty($passwordIptv) || $usernameIptv=="" || $passwordIptv=="") {
                $errCline = '<div class="alert alert-warning">Failed! Insert IPTV account to renewal or choose New Account!</div>';
            }
        if ($typeAccount === "combo")
            if (empty($usernameCs) || empty($passwordCs) || $usernameCs=="" || $passwordCs=="" || empty($usernameIptv) || empty($passwordIptv) || $usernameIptv == "" || $passwordIptv == "") {
                    $errCline = '<div class="alert alert-warning">Failed! Insert CARDSHARING and IPTV account to renewal or choose New Account!</div>';
            }
    }

    if (empty($codeId) || $codeId==='NULL') {
        $errIdCode = '<div class="alert alert-warning">Failed! Insert idCode!</div>';
    }

    $fileIdCode = fopen("/usr/local/etc/codici.txt", "r");
    $line_number = false;
    $count = 0;
    /* Find IdCode Already Used*/
    while (($line = fgets($fileIdCode, 4096)) !== FALSE and !$line_number) {
        $count++;
        $line_number = (strpos($line, $codeId) !== FALSE) ? $count : $line_number;
    }
    fclose($fileIdCode);
    if ($line_number!=false){
        $errIdCode = "<br><b>The id-code already used!</b><br>";
    }

    return array($errPack,$errEmail,$errCline,$errIdCode);
}
?>