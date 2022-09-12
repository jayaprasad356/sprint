<?php
include_once('includes/functions.php');
date_default_timezone_set('Asia/Kolkata');
$function = new functions;
include_once('includes/custom-functions.php');
$fn = new custom_functions;



if (isset($_POST['btnAdd'])) {
        $error = array();
        $max_user = $db->escapeString($fn->xss_clean($_POST['max_user']));
        $min_bal = $db->escapeString($fn->xss_clean($_POST['min_bal']));
        $app_version = $db->escapeString($fn->xss_clean($_POST['app_version']));
        $update_type = $db->escapeString($fn->xss_clean($_POST['update_type']));
        $app_description = $db->escapeString($fn->xss_clean($_POST['app_description']));
        $app_link = $db->escapeString($fn->xss_clean($_POST['app_link']));
        
        
        
       
        if (empty($max_user)) {
            $error['max_user'] = " <span class='label label-danger'>Required!</span>";
        }
      

        if (!empty($max_user))
        {
            $sql = "UPDATE app_settings SET max_users = '$max_user',min_balance = '$min_bal',app_version = $app_version,update_type = '$update_type',app_description = '$app_description',app_link = '$app_link' WHERE id = 1";
			$db->sql($sql);
            $settings_result = $db->getResult();
            if (!empty($settings_result)) {
                $settings_result = 0;
            } else {
                $settings_result = 1;
            }
            if ($settings_result == 1) {
                $error['add_menu'] = "<section class='content-header'>
                                                <span class='label label-success'>Settings Updated Successfully</span>
                                                
                                                 </section>";
            } else {
                $error['add_menu'] = " <span class='label label-danger'>Failed</span>";
            }

        }
}
$sql_query = "SELECT * FROM app_settings WHERE id = 1";
$db->sql($sql_query);
$res = $db->getResult();
?>
<section class="content-header">
    <h1>Settings</h1>
    <?php echo isset($error['add_menu']) ? $error['add_menu'] : ''; ?>
    <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-home"></i> Home</a></li>
    </ol>

</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header">
                    <?php echo isset($error['cancelable']) ? '<span class="label label-danger">Till status is required.</span>' : ''; ?>
                </div>

                <!-- /.box-header -->
                <!-- form start -->
                <form id='notification_form' method="post"  enctype="multipart/form-data">
                    <div class="box-body">
                        <div class="row">
                            <div class="form-group">
                                <div class='col-md-4'>
                                    <label for="exampleInputEmail1">Maximum Users per day</label> <i class="text-danger asterik">*</i><?php echo isset($error['max_user']) ? $error['max_user'] : ''; ?>
                                    <input type="text" class="form-control" name="max_user" value="<?php echo $res[0]['max_users'] ?>" required>
                                </div>
                            </div>

                        </div>

                        <hr>
                        <div class="row">
                            <div class="form-group">
                                <div class='col-md-4'>
                                    <label for="exampleInputEmail1">Minimum Wallet Balance</label> <i class="text-danger asterik">*</i><?php echo isset($error['min_bal']) ? $error['min_bal'] : ''; ?>
                                    <input type="text" class="form-control" name="min_bal" value="<?php echo $res[0]['min_balance'] ?>" required>
                                </div>
                            </div>

                        </div>
                        
                        <hr>
                        <div class="row">
                            <div class="form-group">
                                <div class='col-md-4'>
                                    <label for="exampleInputEmail1">Current App Version</label> <i class="text-danger asterik">*</i><?php echo isset($error['app_version']) ? $error['app_version'] : ''; ?>
                                    <input type="number" class="form-control" name="app_version" value="<?php echo $res[0]['app_version'] ?>" required>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="form-group">
                                <div class='col-md-4'>
                                    <label for="exampleInputEmail1">Update Type</label> <i class="text-danger asterik">*</i><?php echo isset($error['update_type']) ? $error['update_type'] : ''; ?>
                                    <?php $selected = ' selected="selected" '; ?>
                                    <select id='update_type' name="update_type" class='form-control' required>
                                        <option value="normal" <?php if($res[0]['update_type']=='normal') echo $selected; ?>>Normal</option>
                                        <option value="force" <?php if($res[0]['update_type']=='force') echo $selected; ?>>Force</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="form-group">
                                <div class='col-md-4'>
                                    <label for="exampleInputEmail1">What's New</label> <i class="text-danger asterik">*</i><?php echo isset($error['app_description']) ? $error['app_description'] : ''; ?>
                                    <input type="text" class="form-control" name="app_description" value="<?php echo $res[0]['app_description'] ?>" required>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="form-group">
                                <div class='col-md-4'>
                                    <label for="exampleInputEmail1">App Download Link</label> <i class="text-danger asterik">*</i><?php echo isset($error['app_link']) ? $error['app_link'] : ''; ?>
                                    <input type="text" class="form-control" name="app_link" value="<?php echo $res[0]['app_link'] ?>" required>
                                </div>
                            </div>
                        </div>


                    <!-- /.box-body -->
                    <div class="box-footer">
                        <input type="submit" class="btn-primary btn" value="Update" name="btnAdd" />&nbsp;
                        <!-- <input type="reset" class="btn-danger btn" value="Clear" id="btnClear" /> -->
                        <!--<div  id="res"></div>-->
                    </div>
                </form>
                <div id="result"></div>
            </div>
            <!-- /.box -->
        </div>
    </div>
</section>
<div class="separator"> </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>