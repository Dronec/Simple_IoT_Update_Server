<?php
header("Content-Type:text/html");
include ("functions.php");
if (isset($_GET['device']) && $_GET['device']!="") {
	$device = $_GET['device'];
	echo return_version($device);
}else{
	die("Invalid Request");
	}
?>