<?php
include_once('includes/functions.php');
date_default_timezone_set('Asia/Kolkata');
$function = new functions;
include_once('includes/custom-functions.php');
$fn = new custom_functions;

if (isset($_POST['btnUpdate'])){
    $error = array();
    $reward1 = $db->escapeString($fn->xss_clean($_POST['reward1']));
    $reward2 = $db->escapeString($fn->xss_clean($_POST['reward2']));
    $reward3 = $db->escapeString($fn->xss_clean($_POST['reward3']));
    $reward4 = $db->escapeString($fn->xss_clean($_POST['reward4']));
    $reward5 = $db->escapeString($fn->xss_clean($_POST['reward5']));
    $reward6 = $db->escapeString($fn->xss_clean($_POST['reward6']));
    $reward7 = $db->escapeString($fn->xss_clean($_POST['reward7']));
    $reward8 = $db->escapeString($fn->xss_clean($_POST['reward8']));
    $reward9 = $db->escapeString($fn->xss_clean($_POST['reward9']));
    $reward10 = $db->escapeString($fn->xss_clean($_POST['reward10']));
    $value1 = $db->escapeString($fn->xss_clean($_POST['value1']));
    $value2 = $db->escapeString($fn->xss_clean($_POST['value2']));
    $value3 = $db->escapeString($fn->xss_clean($_POST['value3']));
    $value4 = $db->escapeString($fn->xss_clean($_POST['value4']));
    $value5 = $db->escapeString($fn->xss_clean($_POST['value5']));
    $value6 = $db->escapeString($fn->xss_clean($_POST['value6']));
    $value7 = $db->escapeString($fn->xss_clean($_POST['value7']));
    $value8 = $db->escapeString($fn->xss_clean($_POST['value8']));
    $value9 = $db->escapeString($fn->xss_clean($_POST['value9']));
    $value10 = $db->escapeString($fn->xss_clean($_POST['value10']));
    
   
    if (empty($reward1)) {
        $error['reward1'] = " <span class='label label-danger'>Required!</span>";
    }
    if (empty($reward2)) {
        $error['reward2'] = " <span class='label label-danger'>Required!</span>";
    }
    if (empty($reward3)) {
        $error['reward3'] = " <span class='label label-danger'>Required!</span>";
    }
    if (empty($reward4)) {
        $error['reward4'] = " <span class='label label-danger'>Required!</span>";
    }
    if (empty($reward5)) {
        $error['reward5'] = " <span class='label label-danger'>Required!</span>";
    }
    if (empty($reward6)) {
        $error['reward6'] = " <span class='label label-danger'>Required!</span>";
    }
    if (empty($reward7)) {
        $error['reward7'] = " <span class='label label-danger'>Required!</span>";
    }
    if (empty($reward8)) {
        $error['reward8'] = " <span class='label label-danger'>Required!</span>";
    }
    if (empty($reward9)) {
        $error['reward9'] = " <span class='label label-danger'>Required!</span>";
    }
    if (empty($reward10)) {
        $error['reward10'] = " <span class='label label-danger'>Required!</span>";
    }
    if (empty($value1)) {
        $error['value1'] = " <span class='label label-danger'>Required!</span>";
    }
    if (empty($value2)) {
        $error['value2'] = " <span class='label label-danger'>Required!</span>";
    }
    if (empty($value3)) {
        $error['value3'] = " <span class='label label-danger'>Required!</span>";
    }
    if (empty($value4)) {
        $error['value4'] = " <span class='label label-danger'>Required!</span>";
    }
    if (empty($value5)) {
        $error['value5'] = " <span class='label label-danger'>Required!</span>";
    }
    if (empty($value6)) {
        $error['value6'] = " <span class='label label-danger'>Required!</span>";
    }
    if (empty($value7)) {
        $error['value7'] = " <span class='label label-danger'>Required!</span>";
    }
    if (empty($value8)) {
        $error['value8'] = " <span class='label label-danger'>Required!</span>";
    }
    if (empty($value9)) {
        $error['value9'] = " <span class='label label-danger'>Required!</span>";
    }
    if (empty($value10)) {
        $error['value10'] = " <span class='label label-danger'>Required!</span>";
    }

 

    if (!empty($reward1)&& !empty($reward2) && !empty($reward3)&& !empty($reward4)&& !empty($reward5)&& !empty($reward6)&& !empty($reward7)&& !empty($reward8)&& !empty($reward9) && !empty($reward10) && !empty($value1)&& !empty($value2)&& !empty($value3)&& !empty($value4)&& !empty($value5)&& !empty($value6)&& !empty($value7)&& !empty($value8)&& !empty($value9)&& !empty($value10))
    {
        $sql = "UPDATE reward_settings SET reward='$reward1' WHERE value='$value1'";
        $db->sql($sql);
        $sql = "UPDATE reward_settings SET reward='$reward2' WHERE value='$value2'";
        $db->sql($sql);
        $sql = "UPDATE reward_settings SET reward='$reward3' WHERE value='$value3'";
        $db->sql($sql);
        $sql = "UPDATE reward_settings SET reward='$reward4' WHERE value='$value4'";
        $db->sql($sql);
        $sql = "UPDATE reward_settings SET reward='$reward5' WHERE value='$value5'";
        $db->sql($sql);
        $sql = "UPDATE reward_settings SET reward='$reward6' WHERE value='$value6'";
        $db->sql($sql);
        $sql = "UPDATE reward_settings SET reward='$reward7' WHERE value='$value7'";
        $db->sql($sql);
        $sql = "UPDATE reward_settings SET reward='$reward8' WHERE value='$value8'";
        $db->sql($sql);
        $sql = "UPDATE reward_settings SET reward='$reward9' WHERE value='$value9'";
        $db->sql($sql);
        $sql = "UPDATE reward_settings SET reward='$reward10' WHERE value='$value10'";
        $db->sql($sql);
        $reward_result = $db->getResult();
        if (!empty($reward_result)) {
            $reward_result = 0;
        } else {
            $reward_result = 1;
        }
        if ($reward_result == 1) {
            $error['add_menu'] = "<section class='content-header'>
                                            <span class='label label-success'>Reward details Updated Successfully</span>
                                            <h4><small><a  href='users.php'><i class='fa fa-angle-double-left'></i>&nbsp;&nbsp;&nbsp;Back to users</a></small></h4>
                                             </section>";
        } else {
            $error['add_menu'] = " <span class='label label-danger'>Failed</span>";
        }

    }
}

$sql = "SELECT * FROM `reward_settings`";
$db->sql($sql);
$res = $db->getResult();



?>
<section class="content-header">
    <h1>Reward settings</h1>
    <?php echo isset($error['add_menu']) ? $error['add_menu'] : ''; ?>
    <ol class="breadcrumb">
        <li><a style="color:black!important;" href="home.php"><i class="fa fa-home"></i> Home</a></li>
    </ol>

</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Reward settings</h3>
                </div>
                <div class="box-header">
                    <?php echo isset($error['cancelable']) ? '<span class="label label-danger">Till status is required.</span>' : ''; ?>
                </div>

                <!-- /.box-header -->
                <!-- form start -->
                <form id='reward_form' method="post" enctype="multipart/form-data">
                    <div class="box-body">
                        <div class="row">
                            <div class="form-group">
                                <div class='col-md-4'>
                                    <label for="exampleInputEmail1">value1</label>
                                    <input type="text" value="2000"class="form-control" name="value1" readonly>
                                </div>
                                <div class='col-md-4'>
                                    <label  for="exampleInputEmail1">reward1</label> 
                                    <input  type="text" class="form-control" name="reward1" value="<?php echo $res[0]['reward']?>" required>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="form-group">
                                <div class='col-md-4'>
                                    <label for="exampleInputEmail1">value2</label>
                                    <input type="text" value="4000"class="form-control" name="value2" readonly>
                                </div>
                                <div class='col-md-4'>
                                    <label for="exampleInputEmail1">reward2</label> 
                                    <input type="text" class="form-control"  name="reward2" value="<?php echo $res[1]['reward']?>" required >
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="form-group">
                                <div class='col-md-4'>
                                    <label for="exampleInputEmail1">value3</label>
                                    <input type="text" value="6000"class="form-control" name="value3" readonly>
                                </div>
                                <div class='col-md-4'>
                                    <label for="exampleInputEmail1">reward3</label> 
                                    <input type="text" class="form-control"  name="reward3" value="<?php echo $res[2]['reward']?>" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <div class='col-md-4'>
                                    <label for="exampleInputEmail1">value4</label>
                                    <input type="text" value="8000"class="form-control" name="value4"  readonly>
                                </div>
                                <div class='col-md-4'>
                                    <label for="exampleInputEmail1">reward4</label> 
                                    <input type="text" class="form-control"  name="reward4" value="<?php echo $res[3]['reward']?>" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <div class='col-md-4'>
                                    <label for="exampleInputEmail1">value5</label>
                                    <input type="text" value="10000"class="form-control" name="value5" readonly>
                                </div>
                                <div class='col-md-4'>
                                    <label for="exampleInputEmail1">reward5</label> 
                                    <input type="text" class="form-control" name="reward5" value="<?php echo $res[4]['reward']?>" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <div class='col-md-4'>
                                    <label for="exampleInputEmail1">value6</label>
                                    <input type="text" value="12000"class="form-control" name="value6" readonly>
                                </div>
                                <div class='col-md-4'>
                                    <label for="exampleInputEmail1">reward6</label> 
                                    <input type="text" class="form-control"  name="reward6" value="<?php echo $res[5]['reward']?>" required >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <div class='col-md-4'>
                                    <label for="exampleInputEmail1">value7</label>
                                    <input type="text" value="14000"class="form-control" name="value7" readonly>
                                </div>
                                <div class='col-md-4'>
                                    <label for="exampleInputEmail1">reward7</label> 
                                    <input type="text" class="form-control" name="reward7" value="<?php echo $res[6]['reward']?>" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <div class='col-md-4'>
                                    <label for="exampleInputEmail1">value8</label>
                                    <input type="text" value="16000"class="form-control" name="value8" readonly>
                                </div>
                                <div class='col-md-4'>
                                    <label for="exampleInputEmail1">reward8</label> 
                                    <input type="text" class="form-control"  name="reward8" value="<?php echo $res[7]['reward']?>" required >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <div class='col-md-4'>
                                    <label for="exampleInputEmail1">value9</label>
                                    <input type="text" value="18000"class="form-control" name="value9" readonly>
                                </div>
                                <div class='col-md-4'>
                                    <label for="exampleInputEmail1">reward9</label> 
                                    <input type="text" class="form-control" name="reward9" value="<?php echo $res[8]['reward']?>" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <div class='col-md-4'>
                                    <label for="exampleInputEmail1">value10</label>
                                    <input type="text" value="20000"class="form-control" name="value10" readonly >
                                </div>
                                <div class='col-md-4'>
                                    <label for="exampleInputEmail1">reward10</label> 
                                    <input type="text" class="form-control" name="reward10" value="<?php echo $res[9]['reward']?>" required>
                                </div>
                            </div>
                        </div>
                        
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <input type="submit" class="btn-primary btn" value="Update" name="btnUpdate" />&nbsp;
                        <!--<div  id="res"></div>-->
                    </div>
                </form>
            </div>
            <!-- /.box -->
        </div>
    </div>
</section>
<div class="separator"> </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
