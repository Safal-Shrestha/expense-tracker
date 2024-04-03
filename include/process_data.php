<?php

// Function to retrieve cookie value by name
function getCookie($name) {
    if (isset($_COOKIE[$name])) {
        return $_COOKIE[$name];
    }

    else{
        date_default_timezone_set('Asia/Kathmandu');
    
        $currentTimestamp = time();
        $mnth = date("m", $currentTimestamp);
        $yr = date("Y", $currentTimestamp);
    
        $obj = new stdClass();
        $obj->month = $mnth;
        $obj->year = $yr;
    
        $default = json_encode($obj);
        return $default;
    }
}

// Read JSON data from cookie
$cookieData = getCookie("jsonDate");

// Parse JSON string back to JSON object
$jsonData = json_decode($cookieData);

$dispMonth = $jsonData->month;
$dispYear = $jsonData->year;

echo $jsonData->month;