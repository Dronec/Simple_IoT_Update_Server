<?php
header("Content-Type:text/html");
include ("functions.php");
if (isset($_GET['device']) && $_GET['device']!="") {
	$device = $_GET['device'];
	$version = return_version($device);
	$filename =  $device . "_" . $version . ".bin";
	return_file($filename);
}else{
	die("Invalid Request");
	}
?>