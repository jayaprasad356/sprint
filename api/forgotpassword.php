<?php
header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json");
header("Expires: 0");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

include_once('../includes/crud.php');
$db = new Database();
$db->connect();
if (empty($_POST['email'])) {
    $response['success'] = false;
    $response['message'] = "Email is Empty";
    print_r(json_encode($response));
    return false;
}
$email = $db->escapeString($_POST['email']);
$sql = "SELECT * FROM users WHERE email ='$email'";
$db->sql($sql);
$res = $db->getResult();
$num = $db->numRows($res);
if ($num == 1){
    $password = $res[0]['password'];
    $from ="verify@greymatterworks.in";
    $subject="account-password";
    $message=strval($password) . " is your account password";
    $headers="From:" .$from;
    if(mail($email,$subject,$message,$headers)){
        $response['success'] = true;
        $response['message'] = "Password Sent Your Email";
        $response['data'] = NULL;
        print_r(json_encode($response));
    }
    else{
        $response['success'] = false;
        $response['message'] = "Password Sent Failed";
        $response['data'] = NULL;
        print_r(json_encode($response));

    }
}
else{
    $response['success'] = false;
    $response['message'] = "User Not Found";
    $response['data'] = $res;
    print_r(json_encode($response));





}
   


?>
