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
if (empty($_POST['user_id'])) {
    $response['success'] = false;
    $response['message'] = "User Id is Empty";
    print_r(json_encode($response));
    return false;
}
if (empty($_POST['wallet_address'])) {
    $response['success'] = false;
    $response['message'] = "Wallet Address is Empty";
    print_r(json_encode($response));
    return false;
}

$user_id = $db->escapeString($_POST['user_id']);

$wallet_balance = (isset($_POST['wallet_balance']) && !empty(trim($_POST['wallet_balance']))) ? $db->escapeString(trim($_POST['wallet_balance'])) : '0';
$wallet_address = $db->escapeString($_POST['wallet_address']);
$sql = "SELECT * FROM users WHERE id = '" . $user_id . "'";
$db->sql($sql);
$res = $db->getResult();
$num = $db->numRows($res);
if ($num == 1) {
    $sql = "UPDATE `users` SET `wallet_balance`='$wallet_balance',`wallet_address`='$wallet_address' WHERE id=" . $user_id;
    $db->sql($sql);
    $sql = "SELECT * FROM users WHERE id = '" . $user_id . "'";
    $db->sql($sql);
    $res = $db->getResult();
    $response['success'] = true;
    $response['message'] = "Updated Successfully";
    $response['data'] = $res;
 


}
else{
    $response['success'] = false;
    $response['message'] = "User Not Found";
    $response['data'] = $res;
}

print_r(json_encode($response));




