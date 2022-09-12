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
if (empty($_POST['type'])) {
    $response['success'] = false;
    $response['message'] = "Type is Empty";
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
$type= $db->escapeString($_POST['type']);

if($type == 'weekly'){
    $day = date('w');
    $fromdate = date('Y-m-d', strtotime('-'.$day.' days'));
    $todate = date('Y-m-d', strtotime('+'.(6-$day).' days'));
    $sql = "SELECT SUM(steps) AS steps,SUM(calories) AS calories FROM steps WHERE user_id = '$user_id' AND date BETWEEN '$fromdate' and '$todate'";
    $db->sql($sql);
    $res = $db->getResult();
    $num = $db->numRows($res);
    $steps = $res[0]['steps'];
    $calories = $res[0]['calories'];
    if ($steps != NULL && $calories != NULL) {
        $response['success'] = true;
        $response['message'] = "Weekly Steps Retrived Successfully";
        $response['steps'] = $steps;
        $response['calories'] = $calories;
        print_r(json_encode($response));

    }
    else{
        $response['success'] = false;
        $response['message'] = "No Steps Found";
        $response['steps'] = 0;
        $response['calories'] = 0;
        print_r(json_encode($response));

    }

}
if($type == 'monthly'){
    $fromdate = date('Y-m-01');
    $todate = date('Y-m-t');
    $sql = "SELECT SUM(steps) AS steps,SUM(calories) AS calories FROM steps WHERE user_id = '$user_id' AND date BETWEEN '$fromdate' and '$todate'";
    $db->sql($sql);
    $res = $db->getResult();
    $num = $db->numRows($res);
    $steps = $res[0]['steps'];
    $calories = $res[0]['calories'];
    if ($steps != NULL && $calories != NULL) {
        $response['success'] = true;
        $response['message'] = "Monthly Steps Retrived Successfully";
        $response['steps'] = $steps;
        $response['calories'] = $calories;
        print_r(json_encode($response));

    }
    else{
        $response['success'] = false;
        $response['message'] = "No Steps Found";
        $response['steps'] = 0;
        $response['calories'] = 0;
        print_r(json_encode($response));

    }

}



?>