<?php
header("Access-Control-Allow-Origin: http://localhost:80");

if (empty($_GET['api_key']) && $_GET['api_key'] !== getenv("API_KEY")) {
    http_response_code(401);
    exit;
}

if (empty($_GET['city'])) {
    echo "missing required parameter: city";
    http_response_code(400);
    exit;
}

if (empty($_GET['state'])) {
    echo "missing required parameter: state";
    http_response_code(400);
    exit;
}

$city = strtolower(str_replace("+", "_", $_GET['city']));
$state = strtolower($_GET['state']);
$filename = "$city-$state.json";

$data = file_get_contents('../data/' . $filename);

echo $data;