<?php
session_start();
if(!isset($_SESSION['adminusername'])){
 echo "<script type='text/javascript'> window.location='".ROOT_PATH."/modules/login/login.php'; </script>";
 die();
}
include("connection.php");

header('Content-Type: text/html; charset=utf-8');

//$_SESSION['sess_user'] = 1;

date_default_timezone_set('Asia/Kolkata');

function acl_check($pageid){
	if(!isset($_SESSION['acl']) || $pageid == "" || ($pageid != "" && !in_array($pageid,$_SESSION['acl']))){
		echo "<script type='text/javascript'> window.top.location='".ROOT_PATH."/modules/login/logout.php'; </script>";
	}
}


include("variables.php");
?>