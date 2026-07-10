<?php
$module = "raw_material_movements";
$pageid = "raw_material_movements-read";
include("../../common/header.php");
// include("raw_material_movement-functions.php");
?>

<div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 row-cols-lg-1 row-cols-xl-1 row-cols-xxl-1 g-4 py-3 px-2">
  <?php

  $query = "";

  $qcon = [];
  if(isset($_GET["production"]) && $_GET["production"] != ""){
    $qcon[] = " production = '" . $_GET["production"] . "' ";
  }
  if(isset($_GET["production_batch"]) && $_GET["production_batch"] != ""){
    $qcon[] = " production_batch = '" . $_GET["production_batch"] . "' ";
  }
  if(isset($_GET["raw_material"]) && $_GET["raw_material"] != ""){
    $qcon[] = " raw_material = '" . $_GET["raw_material"] . "' ";
  }
  if(isset($_GET["raw_material_lot"]) && $_GET["raw_material_lot"] != ""){
    $qcon[] = " raw_material_lot = '" . $_GET["raw_material_lot"] . "' ";
  }
  if(sizeof($qcon) > 0){
    $query = implode(" AND ", $qcon);
  }

  // echo $query;
  // die;



  $module_arr = get_module_pages_arr();
  $module_pages = $module_arr["raw_material_movements"];

  $pagetitle = T("Raw Material Inventory Movements");
  $actions_html = "";
  $actions_html .= download_xlsx($module_pages["read"]);

  // if (isset($_GET["production_batch"]) && $_GET["production_batch"] != "") {
    // $actions_html .= add_new_form_link(["text" => "Add new production batch items (Bulk)", "url" => ROOT_PATH . "/modules/raw_material_movements/raw_material_movement-bulkform.php?production_batch=" . $_GET["production_batch"] . ""]);
  // }

  $actions_html .= pagination($module_pages["read"] . ".php");
  widget_start($pagetitle, "", "", "", $actions_html); ?>

  <?php

  $tablename = "raw_material_movements";

  $primary_column = "id";

  // $purchases_arr = fetch_data(["table" => "purchases", "columns" => "id, title", "condition" => "", "order" => "created DESC", "limit" => ""]);    // print_arr($purchases_arr);
  // print_arr($purchases_arr);

  $raw_materials_arr = fetch_data(["table" => "raw_materials", "columns" => "id, raw_material", "condition" => "", "order" => "raw_material ASC", "limit" => ""]);    // print_arr($raw_materials_arr);
  // print_arr($raw_materials_arr);

  $display_columns = [
    ["name" => "", "column" => "", "type" => "details", "sorting" => false, "search" => false, "class" => "text-center nowrap"],
    //["name" => "Select", "column" => "", "type" => "select", "sorting" => false, "search" => false, "class" => "text-center"],
    ["name" => "ID", "column" => "id", "class" => "text-center nowrap", "id_prefix" => $module_pages["id_prefix"]],
    ["name" => "Production", "column" => "production", "class" => "text-center nowrap", "id_prefix" => get_module_id_prefix("productions")],
    ["name" => "Production batch", "column" => "production_batch", "class" => "text-center nowrap", "id_prefix" => get_module_id_prefix("production_batchs")],
    ["name" => "Raw Material", "column" => "raw_material", "options" => $raw_materials_arr, "type" => "table_id", "option_id" => "id", "option_label" => "raw_material", "class" => "title", "module" => "raw_materials"],
    ["name" => "Quantity", "column" => "quantity", "class" => "text-center nowrap"],
    ["name" => "Raw Material Lot", "column" => "raw_material_lot", "class" => "text-center nowrap", "id_prefix" => get_module_id_prefix("raw_material_lots")],
    ["name" => "Activity", "column" => "action", "options" => get_raw_material_movement_action_arr(), "badge" => true],
    ["name" => "Activity Date", "column" => "action_date", "format" => "ts_to_dt", "class" => "nowrap"],
    // ["name" => "Activity User", "column" => "created", "format" => "created_by_user", "class" => "nowrap"],
    // ["name" => "Rate per unit", "column" => "rate", "class" => "nowrap"],
    // ["name" => "Actions", "column" => "", "type" => "delete", "sorting" => false, "search" => false, "class" => "nowrap", "acl" => ["delete" => "raw_material_movements-delete"]],
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
    "orderby" => "raw_material ASC"
  ]);

  $load_datatable = true;

  echo $table_html;

  ?>

  <?php widget_end(); ?>

</div>

<?php include("../../common/footer.php"); ?>