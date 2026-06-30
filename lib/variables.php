<?php
$table_users = "users";
$table_ip = "ipadd";
$table_symbols = "symbols";
$table_trades = "trades";

$GLOBALS['ALLOW_UPLOAD_TYPE'] = ['image/*', 'application/pdf'];
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
		["product_lots-read", "View all product lots"],
		["product_lots-update", "Update product lots"],
		["product_lots-create", "Add new product lots"],
		["product_lots-delete", "Delete product lots"],
		["attributes-read", "View all attributes"],
		["attributes-update", "Update attributes"],
		["attributes-create", "Add new attributes"],
		["attributes-delete", "Delete attributes"],
		["purchases-read", "View all purchases"],
		["purchases-update", "Update purchases"],
		["purchases-create", "Add new purchases"],
		["purchases-delete", "Delete purchases"],
		["documents-read", "View all documents"],
		["documents-update", "Update documents"],
		["documents-create", "Add new documents"],
		["documents-delete", "Delete documents"],
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

function get_module_pages_arr()
{
	$arr = [
		"purchases" => [
			"name" => "Purchases",
			"id_prefix" => "PR-",
			"read" => "purchases",
			"update" => "purchase-form",
			"create" => "purchase-form",
			"delete" => "purchase-delete",
			"form" => ROOT_PATH . "/modules/purchases/purchase-form.php?id=XXX"
		],
		"attributes" => [
			"name" => "Attributes",
			"id_prefix" => "ATR-",
			"read" => "attributes",
			"update" => "attribute-form",
			"create" => "attribute-form",
			"delete" => "attribute-delete",
			"form" => ROOT_PATH . "/modules/attributes/attribute-form.php?id=XXX"
		],
		"documents" => [
			"name" => "Documents",
			"id_prefix" => "DOC-",
			"read" => "documents",
			// "update" => "document-form",
			// "create" => "document-form",
			// "delete" => "document-delete",
			// "form" => ROOT_PATH . "/modules/documents/document-form.php?id=XXX"
		],
		"customers" => [
			"name" => "Customers",
			"id_prefix" => "C-",
			"read" => "customers",
			"update" => "customer-form",
			"create" => "customer-form",
			"delete" => "customer-delete",
			"form" => ROOT_PATH . "/modules/customers/customer-form.php?id=XXX"
		],
		"products" => [
			"name" => "Products",
			"id_prefix" => "P-",
			"read" => "products",
			"update" => "product-form",
			"create" => "product-form",
			"delete" => "product-delete",
			"form" => ROOT_PATH . "/modules/products/product-form.php?id=XXX"
		],
		"product_lots" => [
			"name" => "Product lots",
			"id_prefix" => "PL-",
			"read" => "product_lots",
			"update" => "product_lot-form",
			"create" => "product_lot-form",
			"delete" => "product_lot-delete",
			"form" => ROOT_PATH . "/modules/product_lots/product_lot-form.php?id=XXX"
		],
		"raw_materials" => [
			"name" => "Raw materials",
			"id_prefix" => "RM-",
			"read" => "raw_materials",
			"update" => "raw_material-form",
			"create" => "raw_material-form",
			"delete" => "raw_material-delete",
			"form" => ROOT_PATH . "/modules/raw_materials/raw_material-form.php?id=XXX"
		],
		"raw_material_lots" => [
			"name" => "Raw material lots",
			"id_prefix" => "RML-",
			"read" => "raw_material_lots",
			"update" => "raw_material_lot-form",
			"create" => "raw_material_lot-form",
			"delete" => "raw_material_lot-delete",
			"form" => ROOT_PATH . "/modules/raw_material_lots/raw_material_lot-form.php?id=XXX"
		],
		"symbols" => [
			"name" => "Symbols",
			"id_prefix" => "SYM-",
			"read" => "symbols",
			"update" => "symbol-form",
			"create" => "symbol-form",
			"delete" => "symbol-delete",
			"form" => ROOT_PATH . "/modules/symbols/symbol-form.php?id=XXX"
		],
		"user_roles" => [
			"name" => "User roles",
			"id_prefix" => "UR-",
			"read" => "user_roles",
			"update" => "user_role-form",
			"create" => "user_role-form",
			"delete" => "user_role-delete",
			"form" => ROOT_PATH . "/modules/user_roles/user_role-form.php?id=XXX"
		],
		"users" => [
			"name" => "Users",
			"id_prefix" => "U-",
			"read" => "users",
			"update" => "user-form",
			"create" => "user-form",
			"delete" => "user-delete",
			"form" => ROOT_PATH . "/modules/users/user-form.php?id=XXX"
		],
		"vendors" => [
			"name" => "Vendors",
			"id_prefix" => "V-",
			"read" => "vendors",
			"update" => "vendor-form",
			"create" => "vendor-form",
			"delete" => "vendor-delete",
			"form" => ROOT_PATH . "/modules/vendors/vendor-form.php?id=XXX"
		],
	];
	return $arr;
}

function get_module_details($module)
{
	$arr = [];
	$module_arr = get_module_pages_arr();
	if (isset($module_arr[$module])) {
		$arr = $module_arr[$module];
	}
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
		"document_type" => "Document Type",
	];
	return $arr;
}

function get_raw_material_lot_status_arr()
{
	$arr = [
		"order_placed" => "Order placed",
		"received" => "Raw Material Received",
		"under_process" => "Raw material under processing",
		"ready" => "Ready for production",
	];
	return $arr;
}

function get_product_lot_status_arr($source = "")
{
	$int_arr = [
		"new" => "New lot (production not started)",
		"under_production" => "Lot Under Production",
		"production_complete" => "Lot production completed",
		"under_packaging" => "Product under packaging",
		"ready" => "Ready for sale",
	];
	$ext_arr = [
		"order_placed" => "Order placed",
		"received" => "Product Received",
		"under_process" => "Product under processing",
		"ready" => "Ready for sale",
	];
	if ($source == "produced") {
		return $int_arr;
	} else if ($source == "purchased") {
		return $ext_arr;
	}
	return array_merge($int_arr, $ext_arr);
}

function get_product_lot_source_arr()
{
	$arr = [
		"produced" => "Produced in factory",
		"purchased" => "Purchased from vendor"
	];
	return $arr;
}


function get_purchase_status_arr()
{
	$arr = [
		"draft" => "Draft",
		"order_placed" => "Order placed",
		"partially_received" => "Partially received",
		"fully_received" => "Fully Received",
		"cancelled" => "Cancelled",
	];
	return $arr;
}

function get_purchase_payment_status_arr()
{
	$arr = [
		"pending" => "Payment pending",
		"on_hold" => "Payment on hold",
		"partially_paid" => "Partially paid",
		"fully_paid" => "Fully paid",
	];
	return $arr;
}
