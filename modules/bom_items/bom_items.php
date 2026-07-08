<?php
$module = "bom_items";
$pageid = "bom_items-read";
include("../../common/header.php");
// include("bom_item-functions.php");
?>

<div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 row-cols-lg-1 row-cols-xl-1 row-cols-xxl-1 g-4 py-3 px-2">
  <?php

  $module_arr = get_module_pages_arr();
  $module_pages = $module_arr["bom_items"];

  $pagetitle = T("Sales BOM items");
  $actions_html = "";
  $actions_html .= download_xlsx($module_pages["read"]);

  $query = "";
  if (isset($_GET["bom"]) && $_GET["bom"] != "") {
    $actions_html .= add_new_form_link(["text" => "Add new BOM items (Bulk)", "url" => ROOT_PATH . "/modules/bom_items/bom_item-bulkform.php?bom=" . $_GET["bom"] . ""]);
    $actions_html .= add_new_form_link(["text" => "Add new BOM item (Single)", "url" => ROOT_PATH . "/modules/bom_items/bom_item-form.php?bom=" . $_GET["bom"] . ""]);

    $bom = $_GET["bom"];
    $query = " bom = '" . $bom . "' ";
    
  }

  $actions_html .= pagination($module_pages["read"] . ".php");
  widget_start($pagetitle, "", "", "", $actions_html); ?>

  <?php

  $tablename = "bom_items";

  $primary_column = "id";

  // $purchases_arr = fetch_data(["table" => "purchases", "columns" => "id, title", "condition" => "", "order" => "created DESC", "limit" => ""]);    // print_arr($purchases_arr);
  // print_arr($purchases_arr);

  $raw_materials_arr = fetch_data(["table" => "raw_materials", "columns" => "id, raw_material, unit", "condition" => "", "order" => "raw_material ASC", "limit" => ""]);    // print_arr($raw_materials_arr);
  // print_arr($raw_materials_arr);

  $display_columns = [
    ["name" => "", "column" => "", "type" => "details", "sorting" => false, "search" => false, "class" => "text-center nowrap"],
    ["name" => "Select", "column" => "", "type" => "select", "sorting" => false, "search" => false, "class" => "text-center"],
    ["name" => "ID", "column" => "id", "class" => "text-center nowrap", "id_prefix" => $module_pages["id_prefix"]],
    ["name" => "BOM ID", "column" => "bom", "class" => "text-center nowrap", "id_prefix" => get_module_id_prefix("boms")],
    ["name" => "Raw Material", "column" => "raw_material", "options" => $raw_materials_arr, "type" => "table_id", "option_id" => "id", "option_label" => "raw_material", "class" => "title", "module" => "raw_materials"],
    ["name" => "Unit", "column" => "raw_material", "options" => $raw_materials_arr, "type" => "table_id", "option_id" => "id", "option_label" => "unit", "class" => "title", "module" => ""],
    ["name" => "Quantity", "column" => "quantity", "class" => "nowrap"],
    ["name" => "Wastage Quantity", "column" => "wastage_quantity", "class" => "nowrap"],
    // ["name" => "Rate per unit", "column" => "rate", "class" => "nowrap"],
    ["name" => "Actions", "column" => "", "type" => "edit_delete", "sorting" => false, "search" => false, "class" => "nowrap", "acl" => ["edit" => "bom_items-update", "delete" => "bom_items-delete"]],
  ];

  $fetch_columns = [];

  $detail_columns = [
    ["name" => "Last update", "type" => "last_update_info"],
    [
      "name" => "History",
      "type" => "history",
      "history_columns" => [
        ["name" => "Quantity", "column" => "quantity"],
        ["name" => "Wastage Quantity", "column" => "wastage_quantity"],
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
    "orderby" => "id DESC"
  ]);

  $load_datatable = true;

  echo $table_html;

  ?>

  <?php widget_end(); ?>

</div>

<?php include("../../common/footer.php"); ?>