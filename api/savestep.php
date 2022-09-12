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

if (empty($_POST['user_id'])) {
    $response['success'] = false;
    $response['message'] = "User Id is Empty";
    print_r(json_encode($response));
    return false;
}
if (empty($_POST['today_step_count'])) {
    $response['success'] = false;
    $response['message'] = "Today Step Count is Empty";
    print_r(json_encode($response));
    return false;
}
if (empty($_POST['calories'])) {
    $response['success'] = false;
    $response['message'] = "Calories is Empty";
    print_r(json_encode($response));
    return false;
}
if (empty($_POST['date'])) {
    $response['success'] = false;
    $response['message'] = "Date is Empty";
    print_r(json_encode($response));
    return false;
}
$user_id= $db->escapeString($_POST['user_id']);
$steps= $db->escapeString($_POST['today_step_count']);
$calories= $db->escapeString($_POST['calories']);
$date= $db->escapeString($_POST['date']);

$sql = "SELECT * FROM users WHERE id ='$user_id'";
$db->sql($sql);
$res = $db->getResult();
$num = $db->numRows($res);
if ($num == 1){
    $sql = "SELECT * FROM reward_settings";
    $db->sql($sql);
    $res = $db->getResult();
    $reward1 = $res[0]['reward'];
    $reward2 = $res[1]['reward'];
    $reward3 = $res[2]['reward'];
    $reward4 = $res[3]['reward'];
    $reward5 = $res[4]['reward'];
    $reward6 = $res[5]['reward'];
    $reward7 = $res[6]['reward'];
    $reward8 = $res[7]['reward'];
    $reward9 = $res[8]['reward'];
    $reward10 = $res[9]['reward'];


    if ($steps >= 0 && $steps <= $reward1){
        $reward = $reward1;
    }elseif ($steps > $reward1 && $steps <= $reward2){
        $reward = $reward2;
    }elseif ($steps > $reward2 && $steps <= $reward3){
        $reward = $reward3;
    }elseif ($steps > $reward3 && $steps <= $reward4){
        $reward = $reward4;
    }elseif ($steps > $reward4 && $steps <= $reward5){
        $reward = $reward5;
    }elseif ($steps > $reward5 && $steps <= $reward6){
        $reward = $reward6;
    }elseif ($steps > $reward6 && $steps <= $reward7){
        $reward = $reward7;
    }elseif ($steps > $reward7 && $steps <= $reward8){
        $reward = $reward8;
    }elseif ($steps > $reward8 && $steps <= $reward9){
        $reward = $reward9;
    }elseif ($steps > $reward9 && $steps <= $reward10){
        $reward = $reward10;
    }else{
        $reward = 0;
    }
    $sql = "UPDATE `users` SET `steps`= steps + $steps,`reward` = '$reward' WHERE id=" . $user_id;
    $db->sql($sql);
    $sql = "SELECT * FROM steps WHERE date ='$date'";
    $db->sql($sql);
    $res = $db->getResult();
    $num = $db->numRows($res);
    if ($num == 1){
        $sql = "UPDATE `steps` SET `steps`= steps + $steps,`calories` = calories + $calories,`earn` = earn + $steps WHERE date='$date'";
        $db->sql($sql);
    }else{
        $sql = "INSERT INTO steps(`user_id`,`date`,`steps`,`calories`,`earn`)VALUES('$user_id','$date','$steps','$calories','$steps')";
        $db->sql($sql);
    }

    $response['success'] = true;
    $response['message'] = "Steps Saved Successfully";
    $response['data'] = NULL;
    print_r(json_encode($response));
}
else{
    $response['success'] = false;
    $response['message'] = "User Not Found";
    $response['data'] = NULL;
    print_r(json_encode($response));
}



?>