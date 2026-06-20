<?php
session_start();
if (!isset($_SESSION['username'])) {
	echo "<script type='text/javascript'> window.location='" . ROOT_PATH . "/modules/login/login.php'; </script>";
	die();
}
include("connection.php");

header('Content-Type: text/html; charset=utf-8');

//$_SESSION['sess_user'] = 1;

date_default_timezone_set('Asia/Kolkata');

function acl_check($pageid)
{
	if (!isset($_SESSION['acl']) || $pageid == "" || ($pageid != "" && !in_array($pageid, $_SESSION['acl']))) {
		echo "<script type='text/javascript'> window.top.location='" . ROOT_PATH . "/modules/login/logout.php'; </script>";
	}
}

function acl_roles($format = "")
{
	$acl_roles = [
		["index", "View Dashboard"],
		["symbols-read", "View all symbols"],
		["symbols-update", "Update symbols"],
		["symbols-create", "Add new symbols"],
		["symbols-delete", "Delete symbols"],
		["users-read", "View all users"],
		["users-update", "Update users"],
		["users-create", "Add new users"],
		["users-delete", "Delete users"],
		["user_roles-read", "View all user roles"],
		["user_roles-update", "Update user roles"],
		["user_roles-create", "Add new user roles"],
		["user_roles-delete", "Delete user roles"],
	];

	if ($format == "raw") {
		return $acl_roles;
	}

	$r = [];
	$inc = 0;
	foreach ($acl_roles as $key => $v) {
		$inc++;
		$r[$inc]["id"] = $v[0];
		$r[$inc]["permission"] = $v[1];
	}
	return $r;
}

include("variables.php");
