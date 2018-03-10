<?php
/**
 * Created by PhpStorm.
 * User: francesco
 * Date: 23/09/17
 * Time: 12:12
 */
include('Net/SFTP.php');
function copyFileServer($hostssh, $portssh, $usernamessh ,$passwordssh)
{
    $sftp = new Net_SFTP($hostssh, $portssh);
    if (!$sftp->login($usernamessh, $passwordssh)) {
        exit('Login Failed');
    }

    $sftp->get('/usr/local/etc/oscam.user', '/usr/local/etc5/oscam.user');
}

function writeOnFileLocal($newUserFile,$todayDate)
{
    $fh = fopen("/usr/local/etc/email_utenti_server_generati.txt", "a");
    fwrite($fh, "\n");
    fwrite($fh, $todayDate);
    fwrite($fh, "\n");
    fwrite($fh, $newUserFile);
    fclose($fh);
}

function writeOnFileCs ($newUserFile){
    $fh2 = fopen("/usr/local/etc/oscam.user", "a");
    $fh3 = fopen("/usr/local/etc5/oscam.user", "a");
    fwrite($fh2, $newUserFile);
    fwrite($fh3, $newUserFile);
    fclose($fh2);
    fclose($fh3);
}

function writeEmailOnFileLocal ($corpo_credenziali){
    $fh4 = fopen("/usr/local/etc/email_utenti_server_generati.txt", "a");
    $todaydate = date("Y-m-d");
    fwrite($fh4, $todaydate);
    fwrite($fh4, "\n");
    fwrite($fh4, $corpo_credenziali);
    fwrite($fh4, "\n");
    fwrite($fh4, "\n");
    fwrite($fh4, "\n");
    fclose($fh4);
}

function writeIdCodeOnFileLocal ($id_code){
    $fh5 = fopen("/usr/local/etc/id_code_list.txt", "a");
    fwrite($fh5, $id_code);
    fwrite($fh5, "\n");
    fclose($fh5);
}

function findAccountLineOnFileCs($userRenewalCs){
    $numeroLineaUtenteFile1 = exec("sed -n '/$userRenewalCs/=' /usr/local/etc/oscam.user");
    $numeroLineaDataUtenteFile1 = $numeroLineaUtenteFile1 + 3;
    if ($numeroLineaDataUtenteFile1==3) {
        exit('Account Non Trovato nel file Oscam 1');
    }

    $numeroLineaUtenteFile2 = exec("sed -n '/$userRenewalCs/=' /usr/local/etc5/oscam.user");
    $numeroLineaDataUtenteFile2 = $numeroLineaUtenteFile2 + 3;
    if ($numeroLineaDataUtenteFile2==3) {
        exit('Account Non Trovato nel file Oscam 2');
    }

    return array($numeroLineaUtenteFile1, $numeroLineaDataUtenteFile1,$numeroLineaUtenteFile2,$numeroLineaDataUtenteFile2);
}


function uploadFileAndReloadCam ($hostssh, $portssh, $usernamessh ,$passwordssh) {
    $sftp = new Net_SFTP($hostssh, $portssh);
    if (!$sftp->login($usernamessh, $passwordssh)) {
        exit('Login Failed');
    }
    $sftp->put('/usr/local/etc/oscam.user', '/usr/local/etc5/oscam.user', NET_SFTP_LOCAL_FILE);
    $sftp->chmod(0777, '/usr/local/etc/oscam.user');
    unset($sftp);

}


function sendEmailUser ($email,$corpoEmail) {
    $oggettoEmail = "SatOpen.CC - Your Data";
    $headers = "From: satopen1@gmail.com\r\n";
    $headers .= "Reply-To: satopen1@gmail.com\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

    mail($email, $oggettoEmail, $corpoEmail, $headers);
}





function delLineFromFile($fileName, $lineNum, $linea_data,$linea_description,$linea_caid,$linea_services){
    $lineNum = $lineNum + 1;
// check the file exists
    if(!is_writable($fileName))
    {
        // print an error
        print "The file $fileName is not writable";
        // exit the function
        exit;
    }
    else
    {
        // read the file into an array
        $arr = file($fileName);
    }

    // the line to delete is the line number minus 1, because arrays begin at zero
    $lineToDelete = $lineNum-1;

    // check if the line to delete is greater than the length of the file
    if($lineToDelete > sizeof($arr))
    {
        // print an error
        print "You have chosen a line number, <b>[$lineNum]</b>,  higher than the length of the file.";
        // exit the function
        exit;
    }

    //remove the line
    //unset($arr["$lineToDelete"]);
    $arr["$lineToDelete"-2] = $linea_description;
    $arr["$lineToDelete"-1] = $linea_caid;
    $arr["$lineToDelete"] 	= $linea_data;
    $arr["$lineToDelete"+3] = $linea_services;

    // open the file for reading
    if (!$fp = fopen($fileName, 'w+'))
    {
        // print an error
        print "Cannot open file ($fileName)";
        // exit the function
        exit;
    }

    // if $fp is valid
    if($fp)
    {
        // write the array to the file
        foreach($arr as $line) { fwrite($fp,$line); }

        // close the file
        fclose($fp);
    }

}
?>