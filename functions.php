<?php
function return_version($device){
	$allfiles = scandir($_SERVER["DOCUMENT_ROOT"] . "/firmware", SCANDIR_SORT_ASCENDING, null); // for the file format like {device}_{version}.bin
    $devicefiles = array();
    foreach ($allfiles as $string) {
        if (str_contains($string, $device)) {
            $devicefiles[] = str_replace($device."_","",str_replace(".bin","",$string));
        }
    }
	if (empty($devicefiles)) {
    return "0000";
	} else {
    return max($devicefiles);
	}
}

function return_file($filename)
{
	$attachment_location = $_SERVER["DOCUMENT_ROOT"] . "/firmware/" . $filename;
        if (file_exists($attachment_location)) {

            header($_SERVER["SERVER_PROTOCOL"] . " 200 OK");
            header("Cache-Control: public"); // needed for internet explorer
            header("Content-Type: application/octet-stream");
            header("Content-Transfer-Encoding: Binary");
            header("Content-Length:".filesize($attachment_location));
            header("Content-Disposition: attachment; filename=" . $filename);
            readfile($attachment_location);
            die();        
        } else {
            die("Error: File not found.");
        } 
}
?>