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

  $display_columns = [
    ["name" => "", "column" => "", "type" => "details", "sorting" => false, "search" => false, "class" => "text-center nowrap"],
    ["name" => "Select", "column" => "", "type" => "select", "sorting" => false, "search" => false, "class" => "text-center"],
    ["name" => "ID", "column" => "id", "class" => "text-center"],
    ["name" => "Image", "column" => "image", "type" => "image-file", "sorting" => false, "search" => false, "class" => "text-center"],
    ["name" => "Raw Material Lot", "column" => "raw_material_lot", "class" => "title nowrap"],
    ["name" => "Category", "column" => "category", "attributes" => get_attributes_arr("raw_material_lot_category"), "badge" => true],
    ["name" => "Unit", "column" => "unit", "class" => "nowrap"],
    ["name" => "Description", "column" => "description", "class" => "nowrap"],
    ["name" => "Actions", "column" => "", "type" => "edit_delete", "sorting" => false, "search" => false, "class" => "nowrap", "acl" => ["edit" => "raw_material_lots-update", "delete" => "raw_material_lots-delete"]],
  ];

  $fetch_columns = [];

  $detail_columns = [];


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