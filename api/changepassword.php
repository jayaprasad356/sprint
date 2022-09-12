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
if (empty($_POST['password'])) {
    $response['success'] = false;
    $response['message'] = "Password is Empty";
    print_r(json_encode($response));
    return false;
}
if (empty($_POST['oldpassword'])) {
    $response['success'] = false;
    $response['message'] = "Old Password is Empty";
    print_r(json_encode($response));
    return false;
}

$user_id = $db->escapeString($_POST['user_id']);
$password = $db->escapeString($_POST['password']);
$oldpassword = $db->escapeString($_POST['oldpassword']);
$sql = "SELECT * FROM users WHERE id = '" . $user_id . "'";
$db->sql($sql);
$res = $db->getResult();
$num = $db->numRows($res);
if ($num == 1) {
    $op = $res[0]['password'];
    if ($op == $oldpassword) {
        $sql = "UPDATE `users` SET `password`='$password' WHERE id=" . $user_id;
        $db->sql($sql);
        $sql = "SELECT * FROM users WHERE id = '" . $user_id . "'";
        $db->sql($sql);
        $res = $db->getResult();
        $response['success'] = true;
        $response['message'] = "Updated Successfully";
        $response['data'] = $res;
    } else {
        $response['success'] = false;
        $response['message'] = "Old Password is Wrong";
        print_r(json_encode($response));
        return false;
    }


}
else{
    $response['success'] = false;
    $response['message'] = "User Not Found";
    $response['data'] = $res;
}

print_r(json_encode($response));




