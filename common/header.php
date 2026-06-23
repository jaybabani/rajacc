<?php 
include_once("includes.php");
?>
<!DOCTYPE html>
<html class="<?php if (isset($html_class)) {
                    echo $html_class;
                } ?>">

<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8" />
    <title>Raj Accessories <?php if (isset($titletag)) {
                            echo ": " . $titletag;
                        } else {
                            echo "";
                        } ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta content="" name="description" />
    <meta content="" name="author" />

    <!-- CORE CSS FRAMEWORK - START -->

    <script src="<?php echo ROOT_PATH; ?>/assets/js/jquery.min.js" type="text/javascript"></script>
    <link href="<?php echo ROOT_PATH; ?>/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo ROOT_PATH; ?>/assets/plugins/overlayscrollbars/css/OverlayScrollbars.min.css" rel="stylesheet">
    <script src="<?php echo ROOT_PATH; ?>/assets/icons/feather/feather.min.js"></script>
    <link href="<?php echo ROOT_PATH; ?>/assets/icons/fileicons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&amp;family=Poppins:ital,wght@0,500;1,500&amp;display=swap" rel="stylesheet">

    <?php if (isset($header_scripts)) {
        echo $header_scripts;
    } ?>

    <link href="<?php echo ROOT_PATH; ?>/assets/css/variables.css" rel="stylesheet" type="text/css" />
    <?php if (isset($layout) && $layout == "layout1") { ?>
        <link href="<?php echo ROOT_PATH; ?>/assets/css/layout1.css" rel="stylesheet" type="text/css" />
    <?php } else { ?>
        <link href="<?php echo ROOT_PATH; ?>/assets/css/layout.css" rel="stylesheet" type="text/css" />
    <?php } ?>

    <link href="<?php echo ROOT_PATH; ?>/assets/css/style.css" rel="stylesheet" type="text/css" />
    <!-- CORE CSS TEMPLATE - END -->

    <!-- CHART  JS - START -->
    <script>
        window.Promise ||
            document.write(
                '<script src="https://cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.min.js"><\/script>'
            )
        window.Promise ||
            document.write(
                '<script src="https://cdn.jsdelivr.net/npm/eligrey-classlist-js-polyfill@1.2.20171210/classList.min.js"><\/script>'
            )
        window.Promise ||
            document.write(
                '<script src="https://cdn.jsdelivr.net/npm/findindex_polyfill_mdn"><\/script>'
            )
    </script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <!-- CHART  JS - END -->

</head>
<!-- END HEAD -->

<!-- BEGIN BODY -->

<body class=" <?php echo ((isset($body_class)) ? $body_class : ""); ?>">
    <main>
        <?php
        if (isset($page_type) && $page_type == "login") {
            //include("sidebar.php"); 
            echo '<div class="content-area container-fluid">';
            //include("topbar.php"); 
        } else {
            if (isset($layout) && $layout == "layout1") {

                include("sidebar.php");
                echo '<div class="content-area container-fluid">';
                include("topbar.php");
            } else {

                include("sidebar.php");
                echo '<div class="content-area container-fluid">';
                include("topbar.php");
            }
        } 
        
        display_notifications();
        
        ?>