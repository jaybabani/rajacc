<?php
$module = "product_movements";
$pageid = "product_movements-read";
include("../../common/header.php");
// include("product_movement-functions.php");
?>

<div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 row-cols-lg-1 row-cols-xl-1 row-cols-xxl-1 g-4 py-3 px-2">
  <?php

  $query = "";

  $qcon = [];
  if(isset($_GET["order_id"]) && $_GET["order_id"] != ""){
    $qcon[] = " order_id = '" . $_GET["order_id"] . "' ";
  }
  if(isset($_GET["dispatch"]) && $_GET["dispatch"] != ""){
    $qcon[] = " dispatch = '" . $_GET["dispatch"] . "' ";
  }
  if(isset($_GET["product"]) && $_GET["product"] != ""){
    $qcon[] = " product = '" . $_GET["product"] . "' ";
  }
  if(isset($_GET["product_lot"]) && $_GET["product_lot"] != ""){
    $qcon[] = " product_lot = '" . $_GET["product_lot"] . "' ";
  }
  if(sizeof($qcon) > 0){
    $query = implode(" AND ", $qcon);
  }

  // echo $query;
  // die;



  $module_arr = get_module_pages_arr();
  $module_pages = $module_arr["product_movements"];

  $pagetitle = T("Product Inventory Movements");
  $actions_html = "";
  $actions_html .= download_xlsx($module_pages["read"]);

  // if (isset($_GET["dispatch"]) && $_GET["dispatch"] != "") {
    // $actions_html .= add_new_form_link(["text" => "Add new dispatch items (Bulk)", "url" => ROOT_PATH . "/modules/product_movements/product_movement-bulkform.php?dispatch=" . $_GET["dispatch"] . ""]);
  // }

  $actions_html .= pagination($module_pages["read"] . ".php");
  widget_start($pagetitle, "", "", "", $actions_html); ?>

  <?php

  $tablename = "product_movements";

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
    ["name" => "Activity", "column" => "action", "options" => get_product_movement_action_arr(), "badge" => true],
    ["name" => "Activity Date", "column" => "action_date", "format" => "ts_to_dt", "class" => "nowrap"],
    // ["name" => "Activity User", "column" => "created", "format" => "created_by_user", "class" => "nowrap"],
    // ["name" => "Rate per unit", "column" => "rate", "class" => "nowrap"],
    // ["name" => "Actions", "column" => "", "type" => "delete", "sorting" => false, "search" => false, "class" => "nowrap", "acl" => ["delete" => "product_movements-delete"]],
  ];

  $fetch_columns = [];

  $detail_columns = [
    // ["name" => "Last update", "type" => "last_update_info"],
    ["name" => "Activity", "type" => "created_info"],
    // [
    //   "name" => "History",
    //   "type" => "history",
    //   "history_columns" => [
    //     ["name" => "Quantity", "column" => "quantity"],
    //     ["name" => "Rate", "column" => "rate"]
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
    "query" => $query,
    "orderby" => "product ASC"
  ]);

  $load_datatable = true;

  echo $table_html;

  ?>

  <?php widget_end(); ?>

</div>

<?php include("../../common/footer.php"); ?>