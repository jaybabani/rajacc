<?php
$table_users = "users";
$table_ip = "ipadd";
$table_symbols = "symbols";
$table_trades = "trades";

$GLOBALS['ALLOW_UPLOAD_TYPE'] = ['image/*'];
global $ALLOW_UPLOAD_TYPE;

function acl_roles($format = "")
{
	$acl_roles = [
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
		["customers-read", "View all customers"],
		["customers-update", "Update customers"],
		["customers-create", "Add new customers"],
		["customers-delete", "Delete customers"],
	];

	if ($format == "raw") {
		return $acl_roles;
	}

	//
	else if ($format == "ids") {
		$r = [];
		foreach ($acl_roles as $key => $v) {
			$r[] = $v[0];
		}
		return $r;
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

function get_active_arr()
{
	$arr = [
		'yes' => 'Active',
		'no' => 'Inactive',
	];
	return $arr;
}

function get_customer_category_arr()
{
	$arr = [
		"whole_seller" => "Whole Seller",
		"bulk_buyer" => "Bulk Buyer",
		"auto_rickshaw_dealer" => "Auto rickshaw Dealer",
		"exporter" => "Expoter",
		"retailer" => "Retailer"
	];

	return $arr;
}