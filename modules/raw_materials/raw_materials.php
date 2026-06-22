<?php
$module = "raw_materials";
$pageid = "raw_materials-read";
include("../../common/header.php");
// include("raw_material-functions.php");
?>

<div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 row-cols-lg-1 row-cols-xl-1 row-cols-xxl-1 g-4 py-3 px-2">

  <?php
  $module_pages = [
    "read" => "raw_materials",
    "update" => "raw_material-form",
    "create" => "raw_material-form",
    "delete" => "raw_material-delete"
  ];

  $pagetitle = T("Raw Materials");
  $actions_html = "";
  $actions_html .= download_xlsx($module_pages["read"]);
  $actions_html .= pagination($module_pages["read"] . ".php");
  widget_start($pagetitle, "", "", "", $actions_html); ?>

  <?php

  $tablename = "raw_materials";

  $primary_column = "id";

  // $raw_material_roles_arr = fetch_data(["table" => "raw_material_roles", "columns" => "id, raw_material_role", "condition" => "", "order" => "raw_material_role ASC", "limit" => ""]);
  // print_arr($raw_material_roles_arr);

  $display_columns = [
    ["name" => "", "column" => "", "type" => "details", "sorting" => false, "search" => false, "class" => "text-center nowrap"],
    ["name" => "Select", "column" => "", "type" => "select", "sorting" => false, "search" => false, "class" => "text-center"],
    ["name" => "ID", "column" => "id", "class" => "text-center"],
    ["name" => "Image", "column" => "image", "type" => "image-file", "sorting" => false, "search" => false, "class" => "text-center"],
    ["name" => "Raw material", "column" => "raw_material", "class" => "title nowrap"],
    // ["name" => "Contact", "column" => ["email", "phone"], "prefix" => ["Email", "Phone"], "sorting" => false],
    // ["name" => "Active", "column" => "active", "options" => get_active_arr(), "badge" => true],
    // ["name" => "Raw Material roles", "column" => "raw_material_roles", "options" => $raw_material_roles_arr, "type" => "implode", "sep" => ",", "option_id" => "id", "option_label" => "raw_material_role", "sorting" => false],
    ["name" => "Unit", "column" => "unit", "class" => "nowrap"],
    ["name" => "Description", "column" => "description", "class" => "nowrap"],
    ["name" => "Actions", "column" => "", "type" => "edit_delete", "sorting" => false, "search" => false, "class" => "nowrap", "acl" => ["edit" => "raw_materials-update", "delete" => "raw_materials-delete"]],
  ];

  $fetch_columns = [];

  $detail_columns = [
    // ["name" => "Name", "column" => "name"],
    // ["name" => "Aadhaar No.", "column" => "aadhaar"],
    // ["name" => "Address", "column" => "address"],
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