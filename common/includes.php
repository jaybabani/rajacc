<?php

ini_set('log_errors', 'On');
$loghost = str_replace(":",".",$_SERVER['HTTP_HOST']);
ini_set('error_log', __DIR__ . '/logs/php_error_admin.'.$loghost.'.log');

include_once __DIR__ . '/define.php';
if (isset($page_type) && $page_type == "login") {
} else {
    include_once ROOT_DIR . '/lib/auth.php';
} 

include_once ROOT_DIR . '/lib/functions.php';
?>

<?php global $conn; ?>

<?php if (isset($widget_pagetype) && $widget_pagetype == "widget-demo") {
    include_once("widget-variables.php");
}

include_once( __DIR__ . "/variables.php");
$other_scripts = "";

if (!isset($layout)) {
    $layout = "";
}

include_once("functions.php"); 
include_once("widget_functions.php"); 
?>