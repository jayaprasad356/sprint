<?php
header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json");
header("Expires: 0");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
include_once('../includes/crud.php');
include_once('../includes/variables.php');
$db = new Database();
$db->connect();

$sql = "SELECT * FROM app_settings";
$db->sql($sql);
$res = $db->getResult();
$response['success'] = true;
$response['message'] = "Settings Retrived Successfully";
$response['data'] = $res;
print_r(json_encode($response));
?>


