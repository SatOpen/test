<?php
/**
 * Created by PhpStorm.
 * User: francesco
 * Date: 23/09/17
 * Time: 11:04
 */

include __DIR__ . '/../vendor/autoload.php';

use graham192\OSCam\OSCam;

$oscam = new OSCam();

try {
    $oscam->setConnection("5.189.188.120",600)->setAuth("root","cbb96116de73e8dd4a5b80fa436f7fb59471d546");

    var_export($oscam->getStatus());
    var_export($oscam->getStatusWithLog());
    var_export($oscam->getReaderStats("my_reader"));
    var_export($oscam->getReaderEntitlements("my_reader"));
    var_export($oscam->getUserStats());
    var_export($oscam->getUserStats("my_user"));

    echo $oscam->getStatus();
}catch(Exception $e){
    echo $e->getMessage()."\n";
    die();
}

?>