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
if (empty($_POST['name'])) {
    $response['success'] = false;
    $response['message'] = "Name is Empty";
    print_r(json_encode($response));
    return false;
}
if (empty($_POST['email'])) {
    $response['success'] = false;
    $response['message'] = "Email is Empty";
    print_r(json_encode($response));
    return false;
}

$user_id = $db->escapeString($_POST['user_id']);
$name = (isset($_POST['name']) && !empty(trim($_POST['name']))) ? $db->escapeString(trim($_POST['name'])) : '';
$email = (isset($_POST['email']) && !empty(trim($_POST['email']))) ? $db->escapeString(trim($_POST['email'])) : '';
$weight = (isset($_POST['weight']) && !empty(trim($_POST['weight']))) ? $db->escapeString(trim($_POST['weight'])) : '';
$height = (isset($_POST['height']) && !empty(trim($_POST['height']))) ? $db->escapeString(trim($_POST['height'])) : '';
$age = (isset($_POST['age']) && !empty(trim($_POST['age']))) ? $db->escapeString(trim($_POST['age'])) : '';
$sql = "SELECT * FROM users WHERE id = '" . $user_id . "'";
$db->sql($sql);
$res = $db->getResult();
$num = $db->numRows($res);
if ($num == 1) {
    $sql = "UPDATE `users` SET `name`='$name',`email`='$email',`weight`='$weight',`height`='$height',`age`='$age' WHERE id=" . $user_id;
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




