<?php 
session_start();
// set time for session timeout
$currentTime = time() + 25200;
$expired = 900;

// if current time is more than session timeout back to login page
if ($currentTime > $_SESSION['timeout']) {
    session_destroy();
    header("location:index.php");
}
// destroy previous session timeout and create new one
unset($_SESSION['timeout']);
$_SESSION['timeout'] = $currentTime + $expired;
               

include "header.php"; ?>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Crypto Web Login</title>
    <!-- <style>
        
.box-body{
    background-color:#ac94d3!important;
}
.box-footer{
    background-color:#ac94d3!important;
}

    </style> -->
</head>

<body>

   <!-- Content Wrapper. Contains page content -->
   <div class="content-wrapper">
        <?php include('public/rewardsettings-form.php'); ?>
    </div><!-- /.content-wrapper -->
    
    
    
</body>


</html>
<?php include "footer.php"; ?>