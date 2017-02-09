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
?>