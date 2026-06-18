<?php
session_start();
if(!isset($_SESSION['adminusername'])){
 echo "<script type='text/javascript'> window.location='".ROOT_PATH."/modules/login/login.php'; </script>";
 die();
}
include("connection.php");

header('Content-Type: text/html; charset=utf-8');

if($_SESSION["usertype"] == "admin"){
	$_SESSION['acl'] = array(
		// "schedule_generate",
		// "schedule_edit",
		// "schedule_resources_edit",
		// "member_add_edit",
		// "place_add_edit",
		// "resources_chorus_add_edit",
		// "resources_satsang_add_edit",
		// "leave_add_edit",
		// "reservation_add_edit",
		// "meeting_add_edit",
		// "block_add_edit",
		// "member_places_days"
	);
}

if($_SESSION["usertype"] == "viewer"){
	$_SESSION['acl'] = array();
}

//$_SESSION['sess_user'] = 1;

date_default_timezone_set('Asia/Kolkata');

function acl_check($pageid){

	if(!isset($_SESSION['acl'])){
		echo "<script type='text/javascript'> window.top.location='".ROOT_PATH."/modules/login/logout.php'; </script>";
	}

	if(!in_array($pageid,$_SESSION['acl'])){
		echo "<script type='text/javascript'> window.top.location='".ROOT_PATH."/modules/login/logout.php'; </script>";
	}

}


include("variables.php");
?>