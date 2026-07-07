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
		// ["documents-update", "Update documents"],
		// ["documents-create", "Add new documents"],
		// ["documents-delete", "Delete documents"],

		["folders-read", "View all folders"],
		["folders-update", "Update folders"],
		["folders-create", "Add new folders"],
		["folders-delete", "Delete folders"],
		["orders-read", "View all sales orders"],
		["orders-update", "Update sales orders"],
		["orders-create", "Add new sales orders"],
		["orders-delete", "Delete sales orders"],
		["order_items-read", "View all order items"],
		["order_items-update", "Update order items"],
		["order_items-create", "Add new order items"],
		["order_items-delete", "Delete order items"],
		
		["dispatchs-read", "View all dispatchs"],
		["dispatchs-update", "Update dispatchs"],
		["dispatchs-create", "Add new dispatchs"],
		// ["dispatchs-delete", "Delete dispatchs"],
		["dispatch_items-read", "View all dispatch items"],
		["dispatch_items-update", "Update dispatch items"],
		["dispatch_items-create", "Add new dispatch items"],
		["dispatch_items-delete", "Delete dispatch items"],

		["product_movements-read", "View all product movements"],

		["invoices-read", "View all invoices"],
		["invoices-update", "Update invoices"],
		["invoices-create", "Add new invoices"],
		// ["invoices-delete", "Delete invoices"],
		["invoice_items-read", "View all invoice items"],
		["invoice_items-update", "Update invoice items"],
		["invoice_items-create", "Add new invoice items"],
		// ["invoice_items-delete", "Delete invoice items"],
		["payments-read", "View all payments"],
		["payments-update", "Update payments"],
		["payments-create", "Add new payments"],
		["payments-delete", "Delete payments"],

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

function get_gst_type_arr()
{
	$arr = [
		'inter' => 'Inter State (CGST + SGST)',
		'outer' => 'Outer State (IGST)'
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
		"payments" => [
			"name" => "Payments",
			"id_prefix" => "PAY-",
			"read" => "payments",
			"update" => "payment-form",
			"create" => "payment-form",
			"delete" => "payment-delete",
			"form" => ROOT_PATH . "/modules/payments/payment-form.php?id=XXX"
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
		"folders" => [
			"name" => "Folders",
			"id_prefix" => "FLD-",
			"read" => "folders",
			"update" => "folder-form",
			"create" => "folder-form",
			"delete" => "folder-delete",
			"form" => ROOT_PATH . "/modules/folders/folder-form.php?id=XXX"
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
		"orders" => [
			"name" => "Sales Orders",
			"id_prefix" => "SO-",
			"read" => "orders",
			"update" => "order-form",
			"create" => "order-form",
			"delete" => "order-delete",
			"form" => ROOT_PATH . "/modules/orders/order-form.php?id=XXX"
		],
		"order_items" => [
			"name" => "Order Items",
			"id_prefix" => "SOI-",
			"read" => "order_items",
			"update" => "order_item-form",
			"create" => "order_item-form",
			"bulk_update" => "order_item-bulkform",
			"bulk_create" => "order_item-bulkform",
			"delete" => "order_item-delete",
			"form" => ROOT_PATH . "/modules/order_items/order_item-form.php?id=XXX"
		],
		"dispatchs" => [
			"name" => "dispatchs",
			"id_prefix" => "DP-",
			"read" => "dispatchs",
			"update" => "dispatch-form",
			"create" => "dispatch-form",
			// "delete" => "dispatch-delete",
			"form" => ROOT_PATH . "/modules/dispatchs/dispatch-form.php?id=XXX"
		],
		"dispatch_items" => [
			"name" => "dispatch items",
			"id_prefix" => "DPI-",
			"read" => "dispatch_items",
			// "update" => "dispatch_item-form",
			// "create" => "dispatch_item-form",
			"bulk_update" => "dispatch_item-bulkform",
			"bulk_create" => "dispatch_item-bulkform",
			"delete" => "dispatch_item-delete",
			"form" => ROOT_PATH . "/modules/dispatch_items/dispatch_item-form.php?id=XXX"
		],
		"product_movements" => [
			"name" => "product_movements",
			"id_prefix" => "PMOV-",
			"read" => "product_movements",
			// "update" => "dispatch-form",
			// "create" => "dispatch-form",
			// "delete" => "dispatch-delete",
			// "form" => ROOT_PATH . "/modules/product_movements/product_movement-form.php?id=XXX"
		],
		"invoices" => [
			"name" => "invoices",
			"id_prefix" => "INV-",
			"read" => "invoices",
			"update" => "invoice-form",
			"create" => "invoice-form",
			"delete" => "invoice-delete",
			"form" => ROOT_PATH . "/modules/invoices/invoice-form.php?id=XXX"
		],
		"invoice_items" => [
			"name" => "invoice items",
			"id_prefix" => "DPI-",
			"read" => "invoice_items",
			// "update" => "invoice_item-form",
			// "create" => "invoice_item-form",
			"bulk_update" => "invoice_item-bulkform",
			"bulk_create" => "invoice_item-bulkform",
			"delete" => "invoice_item-delete",
			"form" => ROOT_PATH . "/modules/invoice_items/invoice_item-form.php?id=XXX"
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

function get_attribute_category_id_prefix($sm){
	$arr = [];
	// $module_arr = get_module_pages_arr();
	foreach ($sm as $key => $value) {
		$arr[$key] = $value["id_prefix"];
	}
	return $arr;
}

function get_module_id_prefix($mod){
	$pf = "";
	$module_arr = get_module_pages_arr();
	if(isset($module_arr[$mod])){
		$pf = $module_arr[$mod]["id_prefix"];
	}
	return $pf;
}


function get_attribute_category_arr()
{
	$arr = [
		"customer_category" => "Customer category",
		"vendor_category" => "Vendor category",
		"raw_material_category" => "Raw material category",
		"folder_category" => "Folder category",
		"product_category" => "Product category",
		"product_quality" => "Product quality",
		"document_type" => "Document Type",
		"bank_account" => "Bank Account",
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


function get_order_payment_status_arr()
{
	$arr = [
		"pending" => "Payment pending",
		"on_hold" => "Payment on hold",
		"partially_paid" => "Partially paid",
		"fully_paid" => "Fully paid",
	];
	return $arr;
}

function get_order_status_arr()
{
	$arr = [
		"order_placed" => "Order placed",
		"order_confirmed" => "Order confirmed",
		"partially_dispatched" => "Partially dispatched",
		"fully_dispatched" => "Fully dispatched",
		"completed" => "Completed",
		"cancelled" => "Cancelled",
	];
	return $arr;
}

function get_dispatch_status_arr(){
	$arr = [
		"new" => "New Dispatch",
		"packed_and_ready" => "Packed and Ready",
		"invoice_generated" => "Invoice Generated",
		"dispatched" => "Dispatched",
		// "dispatch_returned" => "Returned back after dispatch",
		"cancelled" => "Cancelled",
	];
	return $arr;
}

function get_product_movement_action_arr()
{
	$arr = [
		"reserve" => "Product Reserved",
		"unreserve" => "Product Unreserved",
		"consume" => "Product Consumed",
	];
	return $arr;
}

function get_invoice_status_arr(){
	$arr = [
		"draft" => "Draft",
		"generated" => "Generated",
		"cancelled" => "Cancelled",
	];
	return $arr;
}

function get_payment_status_arr()
{
	$arr = [
		"pending" => "Payment pending",
		"completed" => "Payment completed",
		"cancelled" => "Partially cancelled"
	];
	return $arr;
}

function get_payment_type_arr()
{
	$arr = [
		"received" => "Payment received",
		"sent" => "Payment sent",
	];
	return $arr;
}


function get_payment_mode_arr(){
	$arr = [
		"cash" => "Cash",
		"bank_transfer" => "Bank Transfer",
		"card" => "Credit / Debit Card",
		"cheque" => "Cheque",
		"UPI" => "UPI",
		"other" => "Other",
	];
	return $arr;
}


function get_transaction_type_arr(){
	$arr = [
		"regular" => "Regular",
		"advance" => "Advance",
		"adjustment" => "Adjustment",
		"refund" => "Refund",
		"other" => "Other",
	];
	return $arr;
}

