<?php
header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json");
header("Expires: 0");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
date_default_timezone_set('Asia/Kolkata');
include_once('../includes/crud.php');
$db = new Database();
$db->connect();
if (empty($_POST['month'])) {
    $response['success'] = false;
    $response['message'] = "Month is Empty";
    print_r(json_encode($response));
    return false;
}
if (empty($_POST['user_id'])) {
    $response['success'] = false;
    $response['message'] = "User Id is Empty";
    print_r(json_encode($response));
    return false;
}
$user_id= $db->escapeString($_POST['user_id']);
$month= $db->escapeString($_POST['month']);
$sql = "SELECT * FROM `steps` WHERE DATE_FORMAT(date, '%m') = $month AND user_id ='$user_id' ORDER BY date DESC";
// $sql = "SELECT * FROM steps where substring(date, 9, 2) = $month and user_id = '$user_id' ORDER BY date DESC";
$db->sql($sql);
$res = $db->getResult();
$num = $db->numRows($res);
if ($num > 0) {
    $response['success'] = true;
    $response['message'] = "Success";
    $response['data'] = $res;
    print_r(json_encode($response));
} else {
    $response['success'] = false;
    $response['message'] = "No Data Found";
    $response['data'] = $res;
    print_r(json_encode($response));
}



?>