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
if (empty($_POST['password'])) {
    $response['success'] = false;
    $response['message'] = "Password is Empty";
    print_r(json_encode($response));
    return false;
}
if (empty($_POST['gender'])) {
    $response['success'] = false;
    $response['message'] = "Gender is Empty";
    print_r(json_encode($response));
    return false;
}
if (empty($_POST['weight'])) {
    $response['success'] = false;
    $response['message'] = "Weight is Empty";
    print_r(json_encode($response));
    return false;
}
if (empty($_POST['height'])) {
    $response['success'] = false;
    $response['message'] = "Height is Empty";
    print_r(json_encode($response));
    return false;
}
if (empty($_POST['age'])) {
    $response['success'] = false;
    $response['message'] = "Age is Empty";
    print_r(json_encode($response));
    return false;
}
$name = $db->escapeString($_POST['name']);
$email = $db->escapeString($_POST['email']);
$password = $db->escapeString($_POST['password']);
$gender = $db->escapeString($_POST['gender']);
$weight = $db->escapeString($_POST['weight']);
$height = $db->escapeString($_POST['height']);
$age = $db->escapeString($_POST['age']);
$registered_date =date("Y-m-d");
$sql = "SELECT * FROM users WHERE email ='$email'";
$db->sql($sql);
$res = $db->getResult();
$num = $db->numRows($res);
if ($num == 1){
    $response['success'] = false;
    $response['message'] = "Email ID Already Registered";
    $response['data'] = NULL;
    print_r(json_encode($response));
}
else{
    $sql = "INSERT INTO users(`name`,`email`,`password`,`gender`,`registered_date`,`steps`,`reward`,`weight`,`height`,`age`)VALUES('$name','$email','$password','$gender','$registered_date',0,0,'$weight','$height','$age')";
    $db->sql($sql);
    $res = $db->getResult();
    $sql = "SELECT * FROM users WHERE email ='$email'";
    $db->sql($sql);
    $res = $db->getResult();
    foreach ($res as $row) {
        $temp['id'] = $row['id'];
        $temp['name'] = $row['name'];
        $temp['email'] = $row['email'];
        $temp['password'] = $row['password'];
        $temp['registered_date'] = $row['registered_date'];
        $temp['steps'] = $row['steps'];
        $temp['reward'] = $row['reward'];
        $temp['weight'] = $row['weight'];
        $temp['height'] = $row['height'];
        $temp['age'] = $row['age'];
        $rows[] = $temp;
    }
    $response['success'] = true;
    $response['message'] = "Successfully Registered";
    $response['data'] = $rows;
    print_r(json_encode($response));

}




?>