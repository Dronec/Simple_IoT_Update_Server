<?php
// Set content type to text/plain to return a string
header('Content-Type: text/plain');

// Get the timezone and format from the request parameters
$timezone = isset($_GET['timezone']) ? $_GET['timezone'] : 'UTC';
$format = isset($_GET['format']) ? $_GET['format'] : 'Y-m-d H:i:s';

try {
    // Create a DateTime object in the specified timezone
    $date = new DateTime("now", new DateTimeZone($timezone));
    
    // Format the date and return it as a string
    echo $date->format($format);
} catch (Exception $e) {
    // Handle invalid timezone or format
    echo "Error: " . $e->getMessage();
}
?>