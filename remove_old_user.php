<?php
/**
 * Created by PhpStorm.
 * User: francesco
 * Date: 22/09/17
 * Time: 23:21
 */


$numero_linea_data = "NULL";

$fh_oscam1 = "/usr/local/etc/oscam.user";
$date_find = "2016";

while (exec("grep -n -m 1 $date_find $fh_oscam1 |cut -f1 -d:")!= null ) {
$numero_linea_data = exec("grep -n -m 1 $date_find $fh_oscam1 |cut -f1 -d:");

$line_to_remove = $numero_linea_data + 1;
delLineFromFile($fh_oscam1, $line_to_remove);
echo "Line removed: $line_to_remove <br>";
}

function delLineFromFile($fileName, $lineNum){
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
    unset($arr["$lineToDelete"-7]);
    unset($arr["$lineToDelete"-6]);
    unset($arr["$lineToDelete"-5]);
    unset($arr["$lineToDelete"-4]);
    unset($arr["$lineToDelete"-3]);
    unset($arr["$lineToDelete"-2]);
    unset($arr["$lineToDelete"-1]);
    unset($arr["$lineToDelete"]);
    unset($arr["$lineToDelete"+1]);
    unset($arr["$lineToDelete"+2]);
    unset($arr["$lineToDelete"+3]);
    unset($arr["$lineToDelete"+4]);


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