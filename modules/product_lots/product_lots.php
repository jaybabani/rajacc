<?php
$module = "product_lots";
$pageid = "product_lots-read";
include("../../common/header.php");
// include("product_lot-functions.php");
?>

<div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 row-cols-lg-1 row-cols-xl-1 row-cols-xxl-1 g-4 py-3 px-2">

  <?php
  $module_arr = get_module_pages_arr();
  $module_pages = $module_arr["product_lots"];

  $pagetitle = T("Product Lots");
  $actions_html = "";
  $actions_html .= download_xlsx($module_pages["read"]);
  $actions_html .= pagination($module_pages["read"] . ".php");
  widget_start($pagetitle, "", "", "", $actions_html); ?>

  <?php

  $tablename = "product_lots";

  $primary_column = "id";

  // $vendors_arr = fetch_data(["table" => "vendors", "columns" => "id, firm_name", "condition" => "", "order" => "firm_name ASC", "limit" => ""]);    // print_arr($vendors_arr);
  // // print_arr($vendors_arr);

  $purchases_arr = fetch_data(["table" => "purchases", "columns" => "id, title", "condition" => "", "order" => "created DESC", "limit" => ""]);    // print_arr($purchases_arr);
  // print_arr($purchases_arr);

  $products_arr = fetch_data(["table" => "products", "columns" => "id, product", "condition" => "", "order" => "product ASC", "limit" => ""]);    // print_arr($products_arr);
  // print_arr($products_arr);

  $display_columns = [
    ["name" => "", "column" => "", "type" => "details", "sorting" => false, "search" => false, "class" => "text-center nowrap"],
    ["name" => "Select", "column" => "", "type" => "select", "sorting" => false, "search" => false, "class" => "text-center"],
    ["name" => "ID", "column" => "id", "class" => "text-center nowrap", "id_prefix" => $module_pages["id_prefix"]],
    ["name" => "Product", "column" => "product", "options" => $products_arr, "type" => "table_id", "option_id" => "id", "option_label" => "product", "class" => "title", "module" => "products"],
    ["name" => "Source", "column" => "source", "options" => get_product_lot_source_arr(), "badge" => true],
    ["name" => "Available Qty", "column" => "available_quantity", "class" => "nowrap"],
    ["name" => "Reserved Qty", "column" => "reserved_quantity", "class" => "nowrap"],
    ["name" => "Consumed Qty", "column" => "consumed_quantity", "class" => "nowrap"],
    // ["name" => "Quantity", "column" => "quantity", "class" => "nowrap"],
    // ["name" => "Buy Date", "column" => "buy_date", "format" => "date", "class" => "nowrap"],
    // ["name" => "Buy Price", "column" => "buy_price", "class" => "nowrap"],
    // ["name" => "Vendor", "column" => "vendor", "options" => $vendors_arr, "type" => "table_id", "option_id" => "id", "option_label" => "firm_name", "module" => "vendors"],
    // ["name" => "Purchase Invoice", "column" => "purchase_invoice", "type" => "image-file", "sorting" => false, "search" => false, "class" => "text-center"],
    ["name" => "Status", "column" => "status", "options" => get_product_lot_status_arr(), "badge" => true],
    [
      "name" => "Actions",
      "column" => "",
      "type" => "edit_delete",
      "sorting" => false,
      "search" => false,
      "class" => "nowrap",
      "acl" => ["edit" => "product_lots-update", "delete" => "product_lots-delete"],
      "links" => [
        ["text" => "Inventory Movement", "icon" => "clipboard", "url" => ROOT_PATH . "/modules/product_movements/product_movements.php?product_lot={id}", "acl" => "product_movements-read", "class" => "prod-move-link"],
      ]
    ],
  ];

  $fetch_columns = [];

  $detail_columns = [
    ["name" => "Notes", "column" => "notes"],
    ["name" => "Ordered quantity", "column" => "ordered_quantity"],
    ["name" => "Received quantity", "column" => "received_quantity"],
    ["name" => "Accepted quantity", "column" => "accepted_quantity"],
    ["name" => "Rejected quantity", "column" => "rejected_quantity"],
    ["name" => "Buy Price", "column" => "buy_price", "show_only" => [["source" => "purchased"]]],
    // ["name" => "Buy Date", "column" => "buy_date", "format" => "date", "class" => "nowrap"],
    // ["name" => "Vendor", "column" => "vendor", "options" => $vendors_arr, "type" => "table_id", "option_id" => "id", "option_label" => "firm_name", "module" => "vendors"],
    // ["name" => "Purchase Invoice", "column" => "purchase_invoice", "type" => "image-file", "class" => "text-center"],
    ["name" => "Purchase Details", "column" => "purchase", "options" => $purchases_arr, "type" => "table_id", "option_id" => "id", "option_label" => "title", "module" => "purchases", "show_only" => [["source" => "purchased"]]],
    ["name" => "Last update", "type" => "last_update_info"],
    [
      "name" => "History",
      "type" => "history",
      "history_columns" => [
        ["name" => "Status", "column" => "status", "options" => get_product_lot_status_arr(), "badge" => true],
        // ["name" => "Quantity", "column" => "quantity"]
      ],
    ]
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
    "query" => "",
    "orderby" => "product ASC"
  ]);

  $load_datatable = true;

  echo $table_html;

  ?>

  <?php widget_end(); ?>

</div>

<?php include("../../common/footer.php"); ?>