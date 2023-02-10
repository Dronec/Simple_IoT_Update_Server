<?php
header("Content-Type:text/html");
include ("functions.php");
if (isset($_GET['device']) && $_GET['device']!="") {
	$device = $_GET['device'];
$target_dir = "uploads/";
$datum = mktime(date('H')+0, date('i'), date('s'), date('m'), date('d'), date('y'));
$target_file = $datum . "_" . $device . ".log";

file_put_contents("uploads/" . $target_file, file_get_contents('php://input'));
echo("Uploaded!");
}else{
	die("Invalid Request");
	}
?>