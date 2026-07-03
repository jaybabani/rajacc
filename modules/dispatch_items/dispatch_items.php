<?php
$module = "dispatch_items";
$pageid = "dispatch_items-read";
include("../../common/header.php");
// include("dispatch_item-functions.php");
?>

<div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 row-cols-lg-1 row-cols-xl-1 row-cols-xxl-1 g-4 py-3 px-2">
  <?php

  $module_arr = get_module_pages_arr();
  $module_pages = $module_arr["dispatch_items"];

  $pagetitle = T("Dispatch items");
  $actions_html = "";
  $actions_html .= download_xlsx($module_pages["read"]);

  if (isset($_GET["dispatch"]) && $_GET["dispatch"] != "") {
    $actions_html .= add_new_form_link(["text" => "Add new dispatch items (Bulk)", "url" => ROOT_PATH . "/modules/dispatch_items/dispatch_item-bulkform.php?dispatch=" . $_GET["dispatch"] . ""]);
  }

  $actions_html .= pagination($module_pages["read"] . ".php");
  widget_start($pagetitle, "", "", "", $actions_html); ?>

  <?php

  $tablename = "dispatch_items";

  $primary_column = "id";

  // $purchases_arr = fetch_data(["table" => "purchases", "columns" => "id, title", "condition" => "", "order" => "created DESC", "limit" => ""]);    // print_arr($purchases_arr);
  // print_arr($purchases_arr);

  $products_arr = fetch_data(["table" => "products", "columns" => "id, product", "condition" => "", "order" => "product ASC", "limit" => ""]);    // print_arr($products_arr);
  // print_arr($products_arr);

  $display_columns = [
    ["name" => "", "column" => "", "type" => "details", "sorting" => false, "search" => false, "class" => "text-center nowrap"],
    ["name" => "Select", "column" => "", "type" => "select", "sorting" => false, "search" => false, "class" => "text-center"],
    ["name" => "ID", "column" => "id", "class" => "text-center nowrap", "id_prefix" => $module_pages["id_prefix"]],
    ["name" => "Sales Order", "column" => "order_id", "class" => "text-center nowrap", "id_prefix" => get_module_id_prefix("orders")],
    ["name" => "Dispatch", "column" => "dispatch", "class" => "text-center nowrap", "id_prefix" => get_module_id_prefix("dispatchs")],
    ["name" => "Product", "column" => "product", "options" => $products_arr, "type" => "table_id", "option_id" => "id", "option_label" => "product", "class" => "title", "module" => "products"],
    ["name" => "Quantity", "column" => "quantity", "class" => "text-center nowrap"],
    ["name" => "Product Lot", "column" => "product_lot", "class" => "text-center nowrap", "id_prefix" => get_module_id_prefix("product_lots")],
    // ["name" => "Ordered quantity", "column" => "quantity", "class" => "nowrap"],
    // ["name" => "Rate per unit", "column" => "rate", "class" => "nowrap"],
    ["name" => "Actions", "column" => "", "type" => "delete", "sorting" => false, "search" => false, "class" => "nowrap", "acl" => ["delete" => "dispatch_items-delete"]],
  ];

  $fetch_columns = [];

  $detail_columns = [
    ["name" => "Last update", "type" => "last_update_info"],
    [
      "name" => "History",
      "type" => "history",
      "history_columns" => [
        ["name" => "Quantity", "column" => "quantity"],
        ["name" => "Rate", "column" => "rate"]
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
    "query" => (isset($_GET["order_id"]) && $_GET["order_id"] != "") ? " order_id = '" . $_GET["order_id"] . "' " : "",
    "orderby" => "product ASC"
  ]);

  $load_datatable = true;

  echo $table_html;

  ?>

  <?php widget_end(); ?>

</div>

<?php include("../../common/footer.php"); ?>