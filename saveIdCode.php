<?php
/**
 * Created by PhpStorm.
 * User: francesco
 * Date: 06/02/17
 * Time: 22:10
 */


function saveIdCode($codeId,$email)
{
    $fileIdCode = fopen("/usr/local/etc/codici.txt", "ab+");
    fwrite($fileIdCode, $codeId);
    fwrite($fileIdCode, "\n");
    fwrite($fileIdCode, $email);
    fwrite($fileIdCode, "\n");
    fclose($fileIdCode);

    $fileEmail = fopen("/usr/local/etc/account_da_creare.txt", "ab+");
    fwrite($fileEmail, $email);
    fwrite($fileIdCode, "\n");
    fclose($fileIdCode);
}
?>