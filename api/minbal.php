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

// if (empty($_POST['balance'])) {
//     $response['success'] = false;
//     $response['message'] = "Balance is Empty";
//     print_r(json_encode($response));
//     return false;
// }
$balance = '50';
$sql = "SELECT * FROM app_settings";
$db->sql($sql);
$res = $db->getResult();
$minbalance = $res[0]['min_balance'];

if($minbalance <= $balance){
    $response['success'] = true;
    $response['message'] = "Login Successfully";

}
else{
    $response['success'] = false;
    $response['message'] = "Minimum $minbalance Balance Need for Login";

}

print_r(json_encode($response));
?>



