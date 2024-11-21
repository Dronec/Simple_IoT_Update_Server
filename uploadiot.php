<?php
// uploadiot.php

// Define the folder where the files will be saved
$folderPath = __DIR__ . '/iotmetrics';

// Ensure the folder exists
if (!is_dir($folderPath)) {
    mkdir($folderPath, 0777, true);
}

// Check if the device name is provided in the query string
if (!isset($_GET['device']) || empty(trim($_GET['device']))) {
    http_response_code(400);
    echo "Error: Device name is required.";
    exit;
}

// Get the device name from the query string
$deviceName = basename(trim($_GET['device']));

// Get the POSTed data from the request body
$postData = file_get_contents('php://input');

// Check if data was sent in the POST request
if (empty($postData)) {
    http_response_code(400);
    echo "Error: No data provided.";
    exit;
}

// Define the file path where data will be saved
$filePath = $folderPath . '/' . $deviceName . '.txt';

// Save the POSTed data to the file
if (file_put_contents($filePath, $postData) !== false) {
    http_response_code(200);
    echo "Data saved successfully.";
} else {
    http_response_code(500);
    echo "Error: Failed to save data.";
}
?>