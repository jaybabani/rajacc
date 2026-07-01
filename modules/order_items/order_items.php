<?php
$module = "order_items";
$pageid = "order_items-read";
include("../../common/header.php");
// include("order_item-functions.php");
?>

<div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 row-cols-lg-1 row-cols-xl-1 row-cols-xxl-1 g-4 py-3 px-2">
<br><br>
  edit and redirect to this page<br>
  delete and redirect to this page<br>
  add new individual order item

  <?php

  $module_arr = get_module_pages_arr();
  $module_pages = $module_arr["order_items"];

  $pagetitle = T("Sales Order Items");
  $actions_html = "";
  $actions_html .= download_xlsx($module_pages["read"]);
  $actions_html .= pagination($module_pages["read"] . ".php");
  widget_start($pagetitle, "", "", "", $actions_html); ?>

  <?php

  $tablename = "order_items";

  $primary_column = "id";

  $purchases_arr = fetch_data(["table" => "purchases", "columns" => "id, title", "condition" => "", "order" => "created DESC", "limit" => ""]);    // print_arr($purchases_arr);
  // print_arr($purchases_arr);

  $products_arr = fetch_data(["table" => "products", "columns" => "id, product", "condition" => "", "order" => "product ASC", "limit" => ""]);    // print_arr($products_arr);
  // print_arr($products_arr);

  $display_columns = [
    ["name" => "", "column" => "", "type" => "details", "sorting" => false, "search" => false, "class" => "text-center nowrap"],
    ["name" => "Select", "column" => "", "type" => "select", "sorting" => false, "search" => false, "class" => "text-center"],
    ["name" => "ID", "column" => "id", "class" => "text-center nowrap", "id_prefix" => $module_pages["id_prefix"]],
    ["name" => "Sales Order ID", "column" => "order_id", "class" => "text-center nowrap", "id_prefix" => get_module_id_prefix("orders")],
    ["name" => "Product", "column" => "product", "options" => $products_arr, "type" => "table_id", "option_id" => "id", "option_label" => "product", "class" => "title", "module" => "products"],
    ["name" => "Ordered quantity", "column" => "quantity", "class" => "nowrap"],
    ["name" => "Rate per unit", "column" => "rate", "class" => "nowrap"],
    // ["name" => "Consumed Qty", "column" => "consumed_quantity", "class" => "nowrap"],
    // ["name" => "Buy Date", "column" => "buy_date", "format" => "date", "class" => "nowrap"],
    // ["name" => "Buy Price", "column" => "buy_price", "class" => "nowrap"],
    // ["name" => "Vendor", "column" => "vendor", "options" => $vendors_arr, "type" => "table_id", "option_id" => "id", "option_label" => "firm_name", "module" => "vendors"],
    // ["name" => "Purchase Invoice", "column" => "purchase_invoice", "type" => "image-file", "sorting" => false, "search" => false, "class" => "text-center"],
    // ["name" => "Status", "column" => "status", "options" => get_order_item_status_arr(), "badge" => true],
    ["name" => "Actions", "column" => "", "type" => "edit_delete", "sorting" => false, "search" => false, "class" => "nowrap", "acl" => ["edit" => "order_items-update", "delete" => "order_items-delete"]],
  ];

  $fetch_columns = [];

  $detail_columns = [
    // ["name" => "Notes", "column" => "notes"],
    // ["name" => "Ordered quantity", "column" => "ordered_quantity"],
    // ["name" => "Received quantity", "column" => "received_quantity"],
    // ["name" => "Accepted quantity", "column" => "accepted_quantity"],
    // ["name" => "Rejected quantity", "column" => "rejected_quantity"],
    // ["name" => "Purchase Details", "column" => "purchase", "options" => $purchases_arr, "type" => "table_id", "option_id" => "id", "option_label" => "title", "module" => "purchases"],
    ["name" => "Last update", "type" => "last_update_info"],
    // [
    //   "name" => "History",
    //   "type" => "history",
    //   "history_columns" => [
    //     // ["name" => "Status", "column" => "status", "options" => get_order_item_status_arr(), "badge" => true],
    //     // ["name" => "Quantity", "column" => "quantity"]
    //   ],
    // ]
  ];

  $table_html = crud_read([
    "module_pages" => $module_pages,
    "tablename" => $tablename,
    "primary_column" => $primary_column,
    "display_columns" => $display_columns,
    "fetch_columns" => $fetch_columns,
    "detail_columns" => $detail_columns,
    "datatable" => true,
    "pagination" => true,
    "pagelimit" => 100,
    "query" => (isset($_GET["order_id"]) && $_GET["order_id"] != "") ? " order_id = '".$_GET["order_id"]."' " : "",
    "orderby" => "product ASC"
  ]);

  $load_datatable = true;

  echo $table_html;

  ?>

  <?php widget_end(); ?>

</div>

<?php include("../../common/footer.php"); ?>