<?php
define('DEVELOPER_KEY', 'DEV KEY');

// Function to call the api to retrieve the videos from YT
function getAPICall($apiUrl = '') {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $apiUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);

    $result = json_decode($response);

    if(!empty($result->items)) {
        return $result;
    }
    else {
        return false;
    }
}