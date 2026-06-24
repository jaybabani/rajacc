<?php
$module = "raw_material_lots";
$pageid = "raw_material_lots-read";
include("../../common/header.php");
// include("raw_material_lot-functions.php");
?>

<div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 row-cols-lg-1 row-cols-xl-1 row-cols-xxl-1 g-4 py-3 px-2">

  <?php
  $module_pages = [
    "read" => "raw_material_lots",
    "update" => "raw_material_lot-form",
    "create" => "raw_material_lot-form",
    "delete" => "raw_material_lot-delete"
  ];

  $pagetitle = T("Raw Material Lots");
  $actions_html = "";
  $actions_html .= download_xlsx($module_pages["read"]);
  $actions_html .= pagination($module_pages["read"] . ".php");
  widget_start($pagetitle, "", "", "", $actions_html); ?>

  <?php

  $tablename = "raw_material_lots";

  $primary_column = "id";

  $vendors_arr = fetch_data(["table" => "vendors", "columns" => "id, firm_name", "condition" => "", "order" => "firm_name ASC", "limit" => ""]);    // print_arr($vendors_arr);
  // print_arr($vendors_arr);

  $raw_materials_arr = fetch_data(["table" => "raw_materials", "columns" => "id, raw_material", "condition" => "", "order" => "raw_material ASC", "limit" => ""]);    // print_arr($raw_materials_arr);
  // print_arr($raw_materials_arr);

echo "todo: <br>
auth user (column in db, in datatable in details row - last update: by user and time)<br>
lot status history on change of rm lot status<br>
";

  $display_columns = [
    ["name" => "", "column" => "", "type" => "details", "sorting" => false, "search" => false, "class" => "text-center nowrap"],
    ["name" => "Select", "column" => "", "type" => "select", "sorting" => false, "search" => false, "class" => "text-center"],
    ["name" => "ID", "column" => "id", "class" => "text-center"],
    ["name" => "Raw Material", "column" => "raw_material", "options" => $raw_materials_arr, "type" => "table_id", "option_id" => "id", "option_label" => "raw_material"],
    ["name" => "Quantity", "column" => "quantity", "class" => "nowrap"],
    ["name" => "Buy Date", "column" => "buy_date", "format" => "date", "class" => "nowrap"],
    ["name" => "Buy Price", "column" => "buy_price", "class" => "nowrap"],
    ["name" => "Vendor", "column" => "vendor", "options" => $vendors_arr, "type" => "table_id", "option_id" => "id", "option_label" => "firm_name"],
    ["name" => "Purchase Invoice", "column" => "purchase_invoice", "type" => "image-file", "sorting" => false, "search" => false, "class" => "text-center"],
    ["name" => "Status", "column" => "status", "options" => get_raw_materail_lot_status_arr(), "badge" => true],
    ["name" => "Actions", "column" => "", "type" => "edit_delete", "sorting" => false, "search" => false, "class" => "nowrap", "acl" => ["edit" => "raw_material_lots-update", "delete" => "raw_material_lots-delete"]],
  ];

  $fetch_columns = [];

  $detail_columns = [
    ["name" => "Notes", "column" => "notes"],
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
    "orderby" => "id DESC"
  ]);

  $load_datatable = true;

  echo $table_html;

  ?>

  <?php widget_end(); ?>

</div>

<?php include("../../common/footer.php"); ?>