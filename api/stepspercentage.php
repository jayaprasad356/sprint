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
$user_id = $db->escapeString($_POST['user_id']);
$sql = "SELECT * FROM users WHERE id = '" . $user_id . "'";
$db->sql($sql);
$res = $db->getResult();
$num = $db->numRows($res);
if ($num == 1) {
    $sql = "SELECT SUM(steps) AS steps FROM steps WHERE user_id = '" . $user_id . "'";
    $db->sql($sql);
    $res = $db->getResult();
    $totalsteps = $res[0]['steps'];

    $calsteps = ($totalsteps / 20000) * 100;
    $response['success'] = true;
    $response['message'] = "Successfully";
    $response['steps'] = strval(round($calsteps));
    $response['totalsteps'] = strval(round($totalsteps));
    $response['data'] = NULL;


}
else{
    $response['success'] = false;
    $response['message'] = "User Not Found";
    $response['data'] = $res;
}

print_r(json_encode($response));




