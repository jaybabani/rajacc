<?php
session_start();
session_destroy();

//$header_scripts = '<link href="assets/plugins/icheck/skins/square/orange.css" rel="stylesheet" type="text/css" media="screen"/>';
?>

<?php
$body_class = 'login_page';
?>

<?php $titletag = "Login Page"; ?>
<?php

$page_type = "login";
include("../../common/header.php"); ?>

<div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 row-cols-lg-1 row-cols-xl-1 row-cols-xxl-1 g-4 py-4 px-2">


    <?php widget_start("Login","login-wrapper"); ?>

    <?php

    $msg = "";
    if (isset($_GET['msg'])) {
        $msg = $_GET['msg'];
    }

    //echo md5("rssbvadodara");
    ?>




    <div class="">
        <div id="login" class="col-lg-offset-0 col-lg-12 col-md-offset-0 col-md-12 col-sm-offset-0 col-sm-12 col-xs-offset-0 col-xs-12">

            <form name="loginform" id="loginform" action="login-check.php" method="post">
                <p class='text-danger mb-4'><?php echo $msg; ?></p>

                <div class="col-md-12 mb-4">
                    <label for="validationCustom01" class="form-label">Username <sup>*</sup></label>
                    <input type="text" class="form-control" id="validationCustom01" value="" name="adminusername" id="user_login" required>
                </div>


                <div class="col-md-12 mb-4">
                    <label for="validationCustom01" class="form-label">Password <sup>*</sup></label>
                    <input type="password" class="form-control" id="validationCustom01" value="" name="adminpassword" id="user_pass" required>
                </div>

                <div class="col-12 mb-4">
                    <button name="submit" id="submit" class="btn btn-primary" type="submit">Sign In</button>
                </div>


            </form>

        </div>
    </div>


</div>
<?php widget_end(); ?>


<?php
//$other_scripts = '<script src="assets/plugins/icheck/icheck.min.js" type="text/javascript"></script>';
?>

<?php include("../../common/footer.php");
?>