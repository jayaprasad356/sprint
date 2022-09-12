<?php
session_start();

// set time for session timeout
$currentTime = time() + 25200;
$expired = 3600;

// // if session not set go to login page
// if (!isset($_SESSION['user'])) {
//     header("location:index.php");
// }

// // if current time is more than session timeout back to login page
// if ($currentTime > $_SESSION['timeout']) {
//     session_destroy();
//     header("location:index.php");
// }

// destroy previous session timeout and create new one
unset($_SESSION['timeout']);
$_SESSION['timeout'] = $currentTime + $expired;

header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json");
header("Expires: 0");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");




include_once('../includes/crud.php');
;
$db = new Database();
$db->connect();












if (isset($_GET['table']) && $_GET['table'] == 'users') 
{
    $offset = 0;
    $limit = 10;
    $where = '';
    $sort = 'id';
    $order = 'DESC';
    if (isset($_GET['offset']))
        $offset = $db->escapeString($_GET['offset']);
    if (isset($_GET['limit']))
        $limit = $db->escapeString($_GET['limit']);
    if (isset($_GET['sort']))
        $sort = $db->escapeString($_GET['sort']);
    if (isset($_GET['order']))
        $order = $db->escapeString($_GET['order']);

    if (isset($_GET['search']) && !empty($_GET['search'])) {
        $search = $db->escapeString($_GET['search']);
        $where .= "WHERE name like '%" . $search . "%' OR id like '%" . $search . "%' OR email like '%" . $search . "%' OR mobile like '%" . $search . "%' ";
    }
    if (isset($_GET['sort'])){
        $sort = $db->escapeString($_GET['sort']);

    }
    if (isset($_GET['order'])){
        $order = $db->escapeString($_GET['order']);

    }
    $sql = "SELECT COUNT(`id`) as total FROM `users` " . $where;
    $db->sql($sql);
    $res = $db->getResult();
   
    
    foreach ($res as $row)
        $total = $row['total'];
       
   
    //$sql = "SELECT * FROM users $where ORDER BY $sort $order";
    $sql = "SELECT * FROM users " . $where . " ORDER BY " . $sort . " " . $order . " LIMIT " . $offset . ", " . $limit;
    $db->sql($sql);
    $res = $db->getResult();
    
    $bulkData = array();
    $bulkData['total'] = $total;
   
    
    $rows = array();
    $tempRow = array();

   
    
    foreach ($res as $row) {
        $sql="SELECT * FROM users";
        $db->sql($sql);
        $res = $db->getResult();

    
        $tempRow['id'] = $row['id'];
        $tempRow['name'] = $row['name'];
        $tempRow['email'] = $row['email'];
        $tempRow['gender'] = $row['gender'];
        $tempRow['wallet_balance'] = $row['wallet_balance'];
        $tempRow['wallet_address'] = $row['wallet_address'];
        
        
        
        $rows[] = $tempRow;
    }
    $bulkData['rows'] = $rows;
    print_r(json_encode($bulkData));
}
if (isset($_GET['table']) && $_GET['table'] == 'earnings') 
{
    $offset = 0;
    $limit = 10;
    $where = '';
    $sort = 'id';
    $order = 'DESC';
    if (isset($_GET['offset']))
        $offset = $db->escapeString($_GET['offset']);
    if (isset($_GET['limit']))
        $limit = $db->escapeString($_GET['limit']);
    if (isset($_GET['sort']))
        $sort = $db->escapeString($_GET['sort']);
    if (isset($_GET['order']))
        $order = $db->escapeString($_GET['order']);

    if (isset($_GET['search']) && !empty($_GET['search'])) {
        $search = $db->escapeString($_GET['search']);
        $where .= "AND users.name like '%" . $search . "%' OR users.id like '%" . $search . "%' OR users.email like '%" . $search . "%' ";
    }
    if (isset($_GET['sort'])){
        $sort = $db->escapeString($_GET['sort']);

    }
    if (isset($_GET['order'])){
        $order = $db->escapeString($_GET['order']);

    }
    $sql = "SELECT COUNT(rewards.id) as total FROM `users`,`rewards`  WHERE users.id = rewards.user_id " . $where;
    $db->sql($sql);
    $res = $db->getResult();
   
    
    foreach ($res as $row)
        $total = $row['total'];
       
    $sql = "SELECT *,users.id AS id,rewards.reward AS reward,rewards.steps AS steps FROM users,rewards WHERE users.id = rewards.user_id  " . $where ;
    $db->sql($sql);
    $res = $db->getResult();
    
    $bulkData = array();
    $bulkData['total'] = $total;
   
    
    $rows = array();
    $tempRow = array();

   
    
    foreach ($res as $row) {

    
        $tempRow['id'] = $row['id'];
        $tempRow['name'] = $row['name'];
        $tempRow['email'] = $row['email'];
        $tempRow['reward'] = $row['reward'];
        $tempRow['steps'] = $row['steps'];
        $tempRow['reward_date'] = $row['reward_date'];
        
        
        
        $rows[] = $tempRow;
    }
    $bulkData['rows'] = $rows;
    print_r(json_encode($bulkData));
}
if (isset($_GET['table']) && $_GET['table'] == 'notifications') {
    $where = '';
    
    $sql = "SELECT * FROM notifications";
    $db->sql($sql);
    $res = $db->getResult();
    $rows = array();
    $tempRow = array();
    foreach ($res as $row) {

        
        $tempRow['id'] = $row['id'];
        $tempRow['title'] = $row['title'];
        $tempRow['description'] = $row['description'];
        $rows[] = $tempRow;
    }
$bulkData['rows'] = $rows;
print_r(json_encode($bulkData));
}



$db->disconnect();
