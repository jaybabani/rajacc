<?php
$module = "production_batch_items";
$pageid = "production_batch_items-read";
include("../../common/header.php");
// include("production_batch_item-functions.php");
?>

<div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 row-cols-lg-1 row-cols-xl-1 row-cols-xxl-1 g-4 py-3 px-2">
  <?php

  $module_arr = get_module_pages_arr();
  $module_pages = $module_arr["production_batch_items"];

  $pagetitle = T("Production Batch items");
  $actions_html = "";
  $actions_html .= download_xlsx($module_pages["read"]);

  $query = "";
  $production_batch_status = "";
  $allow_delete = true;
  
  if (isset($_GET["production_batch"]) && $_GET["production_batch"] != "") {
    // $actions_html .= add_new_form_link(["text" => "Add new production_batch items (Bulk)", "url" => ROOT_PATH . "/modules/production_batch_items/production_batch_item-bulkform.php?production_batch=" . $_GET["production_batch"] . ""]);

    $production_batch = $_GET["production_batch"];
    $query = " production_batch = '" . $production_batch . "' ";

    // fetch production_batch status
    $production_batch_arr = fetch_data(["table" => "production_batchs", "columns" => "status", "condition" => " id = '" . $production_batch . "' ", "order" => "", "limit" => ""]);

    // print_arr($production_batch_arr);
    if (sizeof($production_batch_arr) == 1) {
      $production_batch_status = $production_batch_arr[0]["status"];
    }

    // allow delete column
    $allow_delete = in_array($production_batch_status, ["delivered"]) ? false : true;

  }

  $actions_html .= pagination($module_pages["read"] . ".php");
  widget_start($pagetitle, "", "", "", $actions_html); ?>

  <?php

  $tablename = "production_batch_items";

  $primary_column = "id";

  $raw_materials_arr = fetch_data(["table" => "raw_materials", "columns" => "id, raw_material", "condition" => "", "order" => "raw_material ASC", "limit" => ""]);    // print_arr($raw_materials_arr);
  // print_arr($raw_materials_arr);

  $display_columns = [
    ["name" => "", "column" => "", "type" => "details", "sorting" => false, "search" => false, "class" => "text-center nowrap"],
    //["name" => "Select", "column" => "", "type" => "select", "sorting" => false, "search" => false, "class" => "text-center"],
    ["name" => "ID", "column" => "id", "class" => "text-center nowrap", "id_prefix" => $module_pages["id_prefix"]],
    ["name" => "Production", "column" => "production", "class" => "text-center nowrap", "id_prefix" => get_module_id_prefix("productions")],
    ["name" => "Production Batch", "column" => "production_batch", "class" => "text-center nowrap", "id_prefix" => get_module_id_prefix("production_batchs")],
    ["name" => "Raw Material", "column" => "raw_material", "options" => $raw_materials_arr, "type" => "table_id", "option_id" => "id", "option_label" => "raw_material", "class" => "title", "module" => "raw_materials"],
    ["name" => "Quantity", "column" => "quantity", "class" => "text-center nowrap"],
    ["name" => "Raw Material Lot", "column" => "raw_material_lot", "class" => "text-center nowrap", "id_prefix" => get_module_id_prefix("raw_material_lots")],
    // ["name" => "Ordered quantity", "column" => "quantity", "class" => "nowrap"],
    // ["name" => "Rate per unit", "column" => "rate", "class" => "nowrap"],
    $allow_delete ? ["name" => "Actions", "column" => "", "type" => "delete", "sorting" => false, "search" => false, "class" => "nowrap", "acl" => ["delete" => "production_batch_items-delete"]] : [],
  ];

  $fetch_columns = [];

  $detail_columns = [
    ["name" => "Last update", "type" => "last_update_info"],
    [
      "name" => "History",
      "type" => "history",
      "history_columns" => [
        ["name" => "Quantity", "column" => "quantity"],
        // ["name" => "Rate", "column" => "rate"]
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
    "query" => $query,
    "orderby" => "raw_material ASC"
  ]);

  $load_datatable = true;

  echo $table_html;

  ?>

  <?php widget_end(); ?>

</div>

<?php include("../../common/footer.php"); ?>