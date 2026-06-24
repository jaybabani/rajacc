<?php
$table_users = "users";
$table_ip = "ipadd";
$table_symbols = "symbols";
$table_trades = "trades";

$GLOBALS['ALLOW_UPLOAD_TYPE'] = ['image/*','application/pdf'];
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
		["vendors-read", "View all vendors"],
		["vendors-update", "Update vendors"],
		["vendors-create", "Add new vendors"],
		["vendors-delete", "Delete vendors"],
		["raw_materials-read", "View all raw materials"],
		["raw_materials-update", "Update raw materials"],
		["raw_materials-create", "Add new raw materials"],
		["raw_materials-delete", "Delete raw materials"],
		["raw_material_lots-read", "View all raw material lots"],
		["raw_material_lots-update", "Update raw material lots"],
		["raw_material_lots-create", "Add new raw material lots"],
		["raw_material_lots-delete", "Delete raw material lots"],
		["products-read", "View all products"],
		["products-update", "Update products"],
		["products-create", "Add new products"],
		["products-delete", "Delete products"],
		["attributes-read", "View all attributes"],
		["attributes-update", "Update attributes"],
		["attributes-create", "Add new attributes"],
		["attributes-delete", "Delete attributes"],
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

function get_attribute_category_arr()
{
	$arr = [
		"customer_category" => "Customer category",
		"vendor_category" => "Vendor category",
		"raw_material_category" => "Raw material category",
		"product_category" => "Product category",
		"product_quality" => "Product quality",
	];
	return $arr;
}

function get_raw_materail_lot_status_arr(){
	$arr = [
		"order_placed" => "Order placed",
		"received" => "Raw Material Received",
		"under_process" => "Raw material under processing",
		"ready" => "Ready for production",
	];
	return $arr;
}